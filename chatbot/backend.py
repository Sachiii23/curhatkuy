from fastapi import FastAPI, Request, HTTPException
from fastapi.middleware.cors import CORSMiddleware
# Load environment variables from a .env file (optional)
import pathlib
try:
    from dotenv import load_dotenv
    # Try chatbot/.env first, then fallback to project root .env
    here = pathlib.Path(__file__).resolve().parent
    project_root = here.parent
    chatbot_env = here / '.env'
    root_env = project_root / '.env'
    if chatbot_env.exists():
        load_dotenv(dotenv_path=str(chatbot_env))
    elif root_env.exists():
        load_dotenv(dotenv_path=str(root_env))
    else:
        load_dotenv()  # default behavior (may still load from environment)
except Exception:
    # If python-dotenv is not installed, we'll simply rely on OS env vars.
    pass
import uuid, time, re, json, os, pathlib, logging
from typing import Dict, List, Any
from datetime import datetime

# Setup logging (optional, untuk debugging)
DEBUG_LOGGING = os.environ.get("DEBUG_LOGGING", "false").lower() == "true"
if DEBUG_LOGGING:
    logging.basicConfig(level=logging.DEBUG, format='%(asctime)s - %(name)s - %(levelname)s - %(message)s')
    logger = logging.getLogger("chatbot")
else:
    logger = logging.getLogger("chatbot")
    logger.addHandler(logging.NullHandler())


# ==== Gemini ====
import google.generativeai as genai

# ---------- Config Loader ----------
CONFIG_DIR = pathlib.Path(os.environ.get("CONFIG_DIR", "config")).resolve()

def _read_json(path: pathlib.Path, default: Any):
    try:
        return json.loads(path.read_text(encoding="utf-8"))
    except Exception:
        return default

def _read_text(path: pathlib.Path, default: str):
    try:
        return path.read_text(encoding="utf-8")
    except Exception:
        return default

def _template(s: str, ctx: dict) -> str:
    # templating sederhana {{a.b}}
    def repl(m):
        parts = m.group(1).split(".")
        val = ctx
        for p in parts:
            if isinstance(val, dict) and p in val:
                val = val[p]
            else:
                return m.group(0)
        return str(val)
    return re.sub(r"\{\{\s*([a-zA-Z0-9_.]+)\s*\}\}", repl, s)

class Config:
    def __init__(self):
        self.mtimes = {}
        self.data = {}
        self.reload(force=True)

    def _load_all(self):
        settings = _read_json(CONFIG_DIR / "settings.json", {})
        clinic = settings.get("clinic", {})
        ctx = {"clinic": clinic, "settings": settings}

        crisis = _read_json(CONFIG_DIR / "crisis.json", {"keywords": [], "message": ""})
        crisis["message"] = _template(crisis.get("message",""), ctx)

        faq = _read_json(CONFIG_DIR / "faq.json", {})
        # render template di jawaban FAQ
        for k,v in list(faq.items()):
            faq[k] = _template(str(v), ctx)

        faq_keys = _read_json(CONFIG_DIR / "faq_keys.json", {})
        psy_words = _read_json(CONFIG_DIR / "psy_words.json", [])

        system_prompt = _read_text(CONFIG_DIR / "system_prompt.md", "").strip()
        system_prompt = _template(system_prompt, ctx)

        suggestions = _read_json(CONFIG_DIR / "suggestions.json", {})
        closing = _template(_read_text(CONFIG_DIR / "closing.txt", "").strip(), ctx)

        patterns = _read_json(CONFIG_DIR / "patterns.json", {})
        return {
            "settings": settings,
            "clinic": clinic,
            "crisis": crisis,
            "faq": faq,
            "faq_keys": faq_keys,
            "psy_words": psy_words,
            "system_prompt": system_prompt,
            "suggestions": suggestions,
            "closing": closing,
            "patterns": patterns,
        }

    def reload(self, force=False):
        changed = False
        for fn in ["settings.json","crisis.json","faq.json","faq_keys.json","psy_words.json",
                   "system_prompt.md","suggestions.json","closing.txt","patterns.json"]:
            p = CONFIG_DIR / fn
            mt = p.stat().st_mtime if p.exists() else -1
            if force or self.mtimes.get(fn) != mt:
                self.mtimes[fn] = mt
                changed = True
        if changed or force:
            self.data = self._load_all()

    def ctx(self):  # konteks untuk templating
        return {"clinic": self.data.get("clinic", {}), "settings": self.data.get("settings", {})}

CFG = Config()

# ---------- App ----------
app = FastAPI()

# CORS dari settings
cors = CFG.data["settings"].get("cors_origins", ["http://127.0.0.1:5500","http://localhost:5500"])
app.add_middleware(
    CORSMiddleware,
    allow_origins=cors,
    allow_credentials=False,
    allow_methods=["GET","POST","PUT","OPTIONS"],
    allow_headers=["*"],
)

# ---------- Util bawaan ----------
def parse_json_obj(s: str) -> dict:
    m = re.search(r"\{.*\}", s, flags=re.S)
    if not m: return {}
    try: return json.loads(m.group(0))
    except json.JSONDecodeError: return {}

def is_crisis(text: str) -> bool:
    t = (text or "").lower()
    kws = CFG.data["crisis"]["keywords"]
    return any(k in t for k in kws)

def crisis_message() -> str:
    return CFG.data["crisis"]["message"]

def match_faq(text: str):
    """
    FAQ matching dengan scoring system untuk menghindari false positive.
    Menggunakan absolute scoring dengan prioritas exact phrase match.
    """
    t = (text or "").lower().strip()
    if not t:
        return None
    
    faq = CFG.data["faq"]
    keys = CFG.data["faq_keys"]
    
    # Minimum score threshold (absolute, bukan normalized)
    MIN_SCORE = 2.5  # Minimal 1 exact phrase match atau beberapa substring
    
    best_match = None
    best_score = 0.0
    
    for category, keywords in keys.items():
        score = 0.0
        matched_keywords = []
        has_exact_match = False
        
        # 1. Exact phrase matching (highest priority)
        for kw in keywords:
            # Word boundary check untuk exact match
            if f" {kw} " in f" {t} " or t.startswith(kw + " ") or t.endswith(" " + kw) or t == kw:
                score += 3.0  # Exact phrase match (word boundary)
                matched_keywords.append(kw)
                has_exact_match = True
            elif kw in t:
                score += 0.3  # Substring match (much lower priority)
                matched_keywords.append(kw)
        
        # 2. Multi-keyword bonus (jika > 1 keyword match)
        if len(matched_keywords) > 1:
            score += 1.0
        
        # 3. Question word bonus (FAQ biasanya pertanyaan)
        question_words = ["apa", "apakah", "bagaimana", "berapa", "kapan", "dimana", "di mana", "bisakah", "bisa", "boleh"]
        if any(qw in t for qw in question_words):
            score += 0.5
        
        if matched_keywords:
            logger.debug(f"FAQ '{category}': matched {matched_keywords}, score={score:.2f}, exact={has_exact_match}")
            
            if score > best_score:
                best_score = score
                best_match = category
    
    # Return only if score meets threshold
    if best_match and best_score >= MIN_SCORE:
        logger.debug(f"FAQ selected: '{best_match}' with score {best_score:.2f}")
        return faq.get(best_match)
    
    logger.debug(f"No FAQ match (best score: {best_score:.2f}, threshold: {MIN_SCORE})")
    return None



def _compile_patterns():
    pat = CFG.data["patterns"]
    def c(name):
        s = pat.get(name, "")
        return re.compile(s, re.I) if s else None
    return {
        "greet": c("greeting"),
        "thanks": c("thanks"),
        "ack": c("ack"),
        "who": c("who"),
        "can": c("can"),
        "about": c("about"),
    }
PATS = _compile_patterns()

def is_smalltalk(text: str) -> bool:
    """
    Deteksi small talk murni (greeting/thanks/ack tanpa konten substantif).
    Returns True hanya jika pesan HANYA berisi greeting/thanks/ack.
    """
    t = (text or "").strip()
    if not t: 
        return True
    
    # Check if matches greeting/thanks/ack patterns
    has_pattern = any(p and p.search(t) for p in [PATS["greet"], PATS["thanks"], PATS["ack"]])
    
    if not has_pattern:
        return False
    
    # If message is very short (< 15 chars), likely pure small talk
    if len(t) < 15:
        return True
    
    # Check if there's substantive content (question words, psychology keywords)
    substantive_indicators = [
        "kenapa", "mengapa", "bagaimana", "gimana", "apa", "apakah",
        "cara", "tips", "saran", "bantuan", "tolong", "bisa",
        "masalah", "problem", "susah", "sulit", "bingung"
    ]
    
    t_lower = t.lower()
    if any(indicator in t_lower for indicator in substantive_indicators):
        logger.debug(f"Not small talk: has substantive content ('{t[:50]}...')")
        return False
    
    # Pure greeting/thanks/ack
    logger.debug(f"Small talk detected: '{t}'")
    return True


def match_meta_query(text: str):
    t = (text or "").strip()
    if not t: return None
    if PATS["who"] and PATS["who"].search(t): return "who"
    if PATS["can"] and PATS["can"].search(t): return "can"
    if PATS["about"] and PATS["about"].search(t): return "about"
    if ("kamu" in t.lower() or "curhatkuy" in t.lower()) and any(w in t.lower() for w in ["siapa","apa","jelaskan","tentang","perkenalkan","kenalan"]):
        if any(w in t.lower() for w in ["bisa","fitur","kemampuan","fungsi"]): return "can"
        if "curhatkuy" in t.lower(): return "about"
        return "who"
    return None

# ---------- Sesi ----------
chat_sessions: Dict[str, dict] = {}
def get_sess(sid: str):
    now = time.time()
    s = chat_sessions.get(sid)
    if not s:
        s = chat_sessions[sid] = {"turns": 0, "texts": [], "ended": False, "ts": now}
    else:
        s["ts"] = now
    # TTL ringan
    if len(chat_sessions) % 100 == 0:
        cutoff = now - 60*60
        for k in list(chat_sessions.keys()):
            if chat_sessions[k]["ts"] < cutoff or chat_sessions[k]["ended"]:
                del chat_sessions[k]
    return s

# ---------- Gemini ----------
GEMINI_API_KEY = os.environ.get("GEMINI_API_KEY")
genai.configure(api_key=GEMINI_API_KEY) if GEMINI_API_KEY else None
def gemini_model():
    mdl = CFG.data["settings"].get("model") or os.environ.get("GEMINI_MODEL") or "gemini-1.5-flash"
    sys = CFG.data["system_prompt"]
    return genai.GenerativeModel(model_name=mdl, system_instruction=sys) if GEMINI_API_KEY else None

def gemini_generate(user_text: str) -> str:
    m = gemini_model()
    if not m:
        return "⚠️ Server belum dikonfigurasi dengan GEMINI_API_KEY. Hubungi admin."
    try:
        resp = m.generate_content(user_text)
        return (resp.text or "").strip()
    except Exception as e:
        return f"⚠️ Terjadi kendala saat memproses jawaban: {e}"

# ---------- Routes ----------
@app.get("/")
async def root():
    return {"message": f"{CFG.data['clinic'].get('name','CurhatKuy')} bot aktif.", "config_dir": str(CONFIG_DIR)}

@app.post("/status")
async def status(request: Request):
    CFG.reload()  # hot-reload ringan
    try:
        data = await request.json()
    except Exception:
        data = {}
    session_id = data.get("session_id") or str(uuid.uuid4())
    sess = get_sess(session_id)
    max_turns = int(CFG.data["settings"].get("max_turns", 5))
    remaining = 0 if sess["ended"] else max(0, max_turns - sess["turns"])
    return {"session_id": session_id, "remaining": remaining, "end": sess["ended"]}

@app.post("/chat")
async def chat(request: Request):
    CFG.reload()  # hot-reload ringan
    try:
        data = await request.json()
    except Exception:
        data = {}
    user_message = (data.get("message") or "").strip()
    session_id = data.get("session_id") or str(uuid.uuid4())
    sess = get_sess(session_id)

    max_turns = int(CFG.data["settings"].get("max_turns", 5))
    conf_thr  = float(CFG.data["settings"].get("classify_confidence", 0.4))
    suggestions = CFG.data["suggestions"]
    closing = CFG.data["closing"] or f"Sesi chat berakhir (kebijakan {max_turns} pesan). Kamu bisa mulai sesi baru kapan saja."
    fallback = CFG.data["settings"].get("reply_fallback","Baik, terima kasih sudah berbagi.")

    if sess["ended"]:
        return {"reply": "Sesi ini sudah berakhir. Klik 'Mulai Sesi Baru' untuk memulai lagi.", "end": True, "session_id": session_id, "remaining": 0}

    if is_crisis(user_message):
        logger.info(f"Crisis detected in message: {user_message[:50]}...")
        sess["ended"] = True
        return {"reply": crisis_message(), "handoff": True, "end": True, "session_id": session_id, "remaining": 0}

    # FAQ (dihitung 1 turn — ubah sesuai kebijakan)
    faq_ans = match_faq(user_message)
    if faq_ans:
        logger.debug(f"FAQ matched for: {user_message[:50]}...")
        sess["turns"] += 1; sess["texts"].append(user_message)
        remaining = max(0, max_turns - sess["turns"])
        return {"reply": faq_ans, "end": False, "session_id": session_id, "remaining": remaining}

    # Meta (who/can/about) → tidak mengurangi jatah
    meta = match_meta_query(user_message)
    if meta:
        if meta == "who":
            reply = f"### Aku asisten {CFG.data['clinic'].get('name','CurhatKuy')} 🤖\nAku membantu topik **psikologi** dan **FAQ** klinik."
        elif meta == "can":
            reply = "### Yang bisa kulakukan\n1. Menjawab pertanyaan psikologi & langkah awal yang aman.\n2. Menjawab **FAQ** (jam, lokasi, layanan, tarif, booking).\n3. Setelah **5 pesan**, mengklasifikasikan topik & menyarankan tipe psikolog."
        else:
            reply = f"### Tentang {CFG.data['clinic'].get('name','CurhatKuy')}\nLayanan klinik psikologi. Bot membantu menyaring kebutuhan sebelum buat janji."
        remaining = max(0, max_turns - sess["turns"])
        return {"reply": reply, "end": False, "session_id": session_id, "remaining": remaining}

    # Small talk → tidak mengurangi jatah
    if is_smalltalk(user_message):
        reply = ("Halo! 😊\n\nAku siap bantu seputar **psikologi** (kecemasan, tidur anak, hubungan, burnout) "
                 "atau **FAQ** klinik (jam, lokasi, layanan, tarif, booking). Ceritakan singkat yang ingin kamu bahas, ya.")
        remaining = max(0, max_turns - sess["turns"])
        return {"reply": reply, "end": False, "session_id": session_id, "remaining": remaining}

    # Pesan bermakna
    if user_message:
        sess["turns"] += 1
        sess["texts"].append(user_message)

    if not is_psychology_domain(sess["texts"]):
        # Fallback untuk kasus relasi/pernikahan yang mungkin belum trigger keyword
        if re.search(r"\b(istri|suami|pasangan|rumah\s*tangga|hubungan|menikah|nikah)\b", user_message.lower()):
            logger.debug(f"Domain fallback triggered for relationship keywords in: {user_message[:50]}...")
            reply = gemini_generate(user_message) or fallback
        else:
            logger.debug(f"Message rejected - not psychology domain: {user_message[:50]}...")
            reply = ("Maaf, aku fokus pada topik psikologi & FAQ klinik. Kalau ada kebutuhan lain, Admin bisa membantu. "
                     "Boleh ceritakan topik psikologi yang kamu pikirkan?")
    else:
        logger.debug(f"Psychology domain detected, generating response for: {user_message[:50]}...")
        reply = gemini_generate(user_message) or fallback

    remaining = max(0, max_turns - sess["turns"])

    # Tutup sesi bila sudah mencapai max_turns → klasifikasi
    if sess["turns"] >= max_turns:
        combined = " ".join(sess["texts"][-max_turns:])
        cls_prompt = (
            "Klasifikasikan topik obrolan berikut ke salah satu label:\n"
            + ", ".join(list(suggestions.keys()) + ["non_psikologi"]) +
            ".\nBalas ONLY dalam JSON: {\"category\":\"<label>\", \"confidence\": <0..1>}\n\n"
            f"OBROLAN:\n{combined}"
        )
        cat_raw = gemini_generate(cls_prompt) or "{}"
        dataj = parse_json_obj(cat_raw)
        category = dataj.get("category","non_psikologi")
        confidence = dataj.get("confidence", None)
        try:
            confidence = float(confidence) if confidence is not None else None
        except Exception:
            confidence = None

        if category in suggestions and (confidence is None or confidence >= conf_thr):
            reply = f"{reply}\n\nDari obrolan kita, sepertinya kamu cocok berkonsultasi dengan **{suggestions[category]}**. Mau jadwalkan sesi?\n{closing}"
        else:
            reply = f"{reply}\n\n{closing}"

        sess["ended"] = True
        return {"reply": reply, "end": True, "category": category, "confidence": (round(confidence,3) if isinstance(confidence,(int,float)) else None), "session_id": session_id, "remaining": 0}

    return {"reply": reply, "end": False, "session_id": session_id, "remaining": remaining}

# ---------- Endpoint Admin (opsional sederhana; gunakan token) ----------
def _require_admin(req: Request):
    if not CFG.data["settings"].get("admin_enabled", False):
        raise HTTPException(403, "admin endpoints disabled")
    token = req.headers.get("X-Admin-Token") or ""
    want = CFG.data["settings"].get("admin_token","")
    if not want or token != want:
        raise HTTPException(401, "unauthorized")

ALLOWED_FILES = {
    "settings.json","crisis.json","faq.json","faq_keys.json","psy_words.json",
    "system_prompt.md","suggestions.json","closing.txt","patterns.json"
}

@app.get("/admin/config")
async def admin_get_config(request: Request):
    _require_admin(request)
    CFG.reload()
    return CFG.data

@app.post("/admin/reload")
async def admin_reload(request: Request):
    _require_admin(request)
    CFG.reload(force=True)
    return {"reloaded_at": datetime.utcnow().isoformat()+"Z"}

@app.put("/admin/config")
async def admin_put_config(request: Request):
    _require_admin(request)
    payload = await request.json()
    fname = payload.get("file"); data = payload.get("data")
    if fname not in ALLOWED_FILES:
        raise HTTPException(400, f"file not allowed: {fname}")
    path = CONFIG_DIR / fname
    path.parent.mkdir(parents=True, exist_ok=True)
    if fname.endswith(".json"):
        path.write_text(json.dumps(data, ensure_ascii=False, indent=2), encoding="utf-8")
    else:
        # .md / .txt
        path.write_text(str(data or ""), encoding="utf-8")
    CFG.reload(force=True)
    return {"saved": fname, "mtime": path.stat().st_mtime}


# --- Hybrid domain detection: Keywords + LLM ---

# Cache untuk LLM classification results (session-based)
_domain_classification_cache = {}

def _load_psy_categories():
    """Load psychology keyword categories"""
    try:
        cat_file = CONFIG_DIR / "psy_categories.json"
        if cat_file.exists():
            return _read_json(cat_file, {})
    except Exception:
        pass
    
    # Fallback: use psy_words as weak signals
    return {
        "strong_signals": [],
        "relationship_signals": [],
        "weak_signals": CFG.data.get("psy_words", []),
        "context_required": []
    }

def _classify_with_llm(texts: List[str]) -> bool:
    """
    Gunakan LLM untuk klasifikasi domain psychology.
    Hanya dipanggil untuk kasus ambiguous (weak signals).
    """
    combined = " ".join(texts[-3:])  # Last 3 messages for context
    
    # Check cache
    cache_key = combined[:100]  # Use first 100 chars as key
    if cache_key in _domain_classification_cache:
        cached_result = _domain_classification_cache[cache_key]
        logger.debug(f"LLM classification (cached): {cached_result}")
        return cached_result
    
    prompt = f"""Apakah percakapan berikut termasuk topik PSIKOLOGI/KONSELING MENTAL?

Topik PSIKOLOGI: kesehatan mental, emosi, stres, kecemasan, depresi, hubungan interpersonal, konflik keluarga, kepercayaan diri, trauma, terapi, konseling.

BUKAN psikologi: chitchat biasa, informasi umum, bisnis, teknologi, berita, cuaca, makanan (kecuali eating disorder).

Percakapan: "{combined}"

Jawab HANYA dengan: YES atau NO"""
    
    try:
        response = gemini_generate(prompt).strip().upper()
        result = "YES" in response
        
        # Cache result (max 100 entries)
        if len(_domain_classification_cache) > 100:
            _domain_classification_cache.clear()
        _domain_classification_cache[cache_key] = result
        
        logger.info(f"LLM classification: {result} (response: {response})")
        return result
    except Exception as e:
        logger.error(f"LLM classification error: {e}")
        # Fallback: accept if we got this far (has weak signals)
        return True

def is_psychology_domain(texts: List[str]) -> bool:
    """
    Hybrid domain detection:
    1. Strong signals → immediate accept (fast path)
    2. Relationship signals → immediate accept
    3. Weak signals → LLM classification (context-aware)
    4. No signals → reject
    """
    t = " ".join(texts).lower()
    t_clean = re.sub(r"\s+", " ", t)
    
    categories = _load_psy_categories()
    
    # 1. Check STRONG signals (immediate accept)
    strong = categories.get("strong_signals", [])
    for keyword in strong:
        if keyword.lower() in t:
            logger.debug(f"Domain detected: STRONG signal '{keyword}'")
            return True
    
    # 2. Check RELATIONSHIP signals (immediate accept)
    relationship = categories.get("relationship_signals", [])
    relationship_count = 0
    for keyword in relationship:
        if keyword.lower() in t:
            relationship_count += 1
    
    if relationship_count >= 1:  # At least 1 relationship keyword
        logger.debug(f"Domain detected: RELATIONSHIP signals (count={relationship_count})")
        return True
    
    # 3. Check WEAK signals (need LLM classification)
    weak = categories.get("weak_signals", [])
    weak_matches = []
    for keyword in weak:
        if keyword.lower() in t:
            weak_matches.append(keyword)
    
    if weak_matches:
        logger.debug(f"Weak signals found: {weak_matches[:3]}... → LLM classification")
        # Use LLM to determine if it's actually psychology
        return _classify_with_llm(texts)
    
    # 4. Fuzzy matching as last resort (for typos)
    try:
        from difflib import SequenceMatcher
        all_keywords = strong + relationship + weak
        tokens = re.findall(r"[a-z0-9\-]+", t_clean)
        
        for tok in tokens:
            if len(tok) < 4:
                continue
            for kw in all_keywords:
                if len(kw) < 4:
                    continue
                ratio = SequenceMatcher(None, tok, kw.lower()).ratio()
                if ratio >= 0.85:
                    logger.debug(f"Domain detected: fuzzy match '{tok}' ~ '{kw}' (ratio={ratio:.2f})")
                    return True
    except Exception as e:
        logger.debug(f"Fuzzy matching error: {e}")
    
    # 5. No signals found
    logger.debug("Domain NOT detected: no psychology signals found")
    return False


