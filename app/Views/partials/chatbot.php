<?php
// Partial view: chatbot popup (shared across pages)
// Determine API and admin URLs from env or use defaults
$API_BASE  = function_exists('env') ? env('CK_API') : getenv('CK_API');
$ADMIN_URL = function_exists('env') ? env('CK_ADMIN_URL') : getenv('CK_ADMIN_URL');
$API_BASE  = $API_BASE  ?: 'http://127.0.0.1:8000';
$ADMIN_URL = $ADMIN_URL ?: 'https://wa.me/62xxxxxxxxxx';
?>

<!-- CurhatKuy Chatbot Popup (shared partial) -->
<style>
    /* Typing indicator dots */
    .ck-msg.bot.ck-typing { opacity: 0.9; }
    .ck-msg.bot.ck-typing .dot {
        display:inline-block; width:8px; height:8px; margin:0 2px; background:#cfd8dc; border-radius:50%;
        animation: ck-typing-bounce 1.2s infinite ease-in-out both;
    }
    .ck-msg.bot.ck-typing .dot:nth-child(2) { animation-delay: .2s; }
    .ck-msg.bot.ck-typing .dot:nth-child(3) { animation-delay: .4s; }
    @keyframes ck-typing-bounce {
        0%, 80%, 100% { transform: scale(0); opacity: .6; }
        40% { transform: scale(1); opacity: 1; }
    }
</style>

<!-- Ensure launcher/chat sit above debug toolbar or other fixed UI elements -->
<style>
  /* Debug toolbar uses z-index:10000; make chatbot higher so it's clickable */
  .ck-launcher { z-index: 10010 !important; }
  .ck-chat    { z-index: 10009 !important; }
</style>

<button class="ck-launcher" id="ck-launcher" aria-label="Buka Chatbot">
  <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
    <path d="M20 2H4a2 2 0 0 0-2 2v14l4-4h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" fill="currentColor"/>
  </svg>
</button>

<div class="ck-chat" id="ck-chat" role="dialog" aria-modal="false" aria-labelledby="ck-title">
  <div class="ck-header">
    <div class="ck-title" id="ck-title">Chatbot Curhatkuy</div>
    <div class="ck-right">
      <div class="ck-badge" id="ck-badge">Sisa: …</div>
      <button class="ck-close" id="ck-close" aria-label="Tutup">
        <svg width="18" height="18" viewBox="0 0 24 24">
          <path d="M18 6L6 18M6 6l12 12" stroke="#fff" stroke-width="2" fill="none"/>
        </svg>
      </button>
    </div>
  </div>

  <div class="ck-body">
    <div class="ck-box" id="ck-box"></div>

    <div class="ck-actions" id="ck-actions">
      <button id="ck-admin" class="ck-btn sm hidden">Hubungi Admin</button>
      <button id="ck-new"   class="ck-btn sm hidden">Mulai Sesi Baru</button>
    </div>

    <div class="ck-input">
      <input id="ck-input" type="text" placeholder="Tulis pesan..." autocomplete="off" />
      <button id="ck-send" class="ck-btn primary">Kirim</button>
    </div>
  </div>
</div>

<script>
(function(){
  try{ console.log('chatbot partial injected'); document.documentElement.classList.add('ck-partial-injected'); }catch(e){}
  const API       = "<?= esc($API_BASE) ?>";
  const ADMIN_URL = "<?= esc($ADMIN_URL) ?>";
  const launcher = document.getElementById("ck-launcher");
  try{ if(launcher) launcher.dataset.ckInjected = '1'; }catch(e){}
  const chat     = document.getElementById("ck-chat");
  const closeBtn = document.getElementById("ck-close");
  const box      = document.getElementById("ck-box");
  const input    = document.getElementById("ck-input");
  const sendBtn  = document.getElementById("ck-send");
  const actions  = document.getElementById("ck-actions");
  const btnAdmin = document.getElementById("ck-admin");
  const btnNew   = document.getElementById("ck-new");
  const badge    = document.getElementById("ck-badge");

  // --- FIX: define keys used with sessionStorage (were missing) ---
  const SID_KEY = "ck_session_id";
  const CHAT_KEY = "ck_messages_v1";
  const OPEN_KEY = "ck_open"; // '1' = open, '0' = closed

  // session id and persisted messages
  let sessionId = sessionStorage.getItem(SID_KEY);
  if (!sessionId) {
    sessionId = (crypto?.randomUUID?.() || (Date.now()+"-"+Math.random().toString(16).slice(2)));
    sessionStorage.setItem(SID_KEY, sessionId);
  }
  let messages = [];

  // session state (declare before usage)
  let sessionState = { end: false, remaining: 5 };

  function escapeHtml(s){return s.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;");}
  function linkify(s){return s.replace(/https?:\/\/[^\s)]+/g,m=>`<a href="${m}" target="_blank" rel="noopener noreferrer">${m}</a>`);}
  function inlineFormat(t){
    t = escapeHtml(t);
    t = t.replace(/\*\*(.+?)\*\*/g,'<strong>$1</strong>');
    t = t.replace(/\*(.+?)\*/g,'<em>$1</em>');
    return linkify(t);
  }
  function renderMarkdownLite(md){
    const lines = String(md||"").replace(/\r\n?/g,"\n").split("\n");
    let html="", inOl=false, inUl=false, para=[];
    const flushPara=()=>{ if(para.length){ const text=para.join(" ").trim(); if(text) html+=`<p>${inlineFormat(text)}</p>`; para=[]; } };
    const closeLists=()=>{ if(inOl){html+="</ol>"; inOl=false;} if(inUl){html+="</ul>"; inUl=false;} };
    for(let raw of lines){
      const line = raw.trim();
      if(!line){ flushPara(); closeLists(); continue; }
      let m;
      if((m=line.match(/^#{1,6}\s*:?\s+(.*)$/))){ flushPara(); closeLists(); html+=`<h3>${inlineFormat(m[1])}</h3>`; continue; }
      if((m=line.match(/^(?:#{2,6}\s+)?(\d+)\.\s+(.*)$/))){ flushPara(); if(inUl){html+="</ul>"; inUl=false;} if(!inOl){html+="<ol>"; inOl=true;} html+=`<li>${inlineFormat(m[2])}</li>`; continue; }
      if((m=line.match(/^(?:#{2,6}\s+)?(?:[-\*\u2022])\s+(.*)$/))){ flushPara(); if(inOl){html+="</ol>"; inOl=false;} if(!inUl){html+="<ul>"; inUl=true;} html+=`<li>${inlineFormat(m[1])}</li>`; continue; }
      para.push(line);
    }
    flushPara(); closeLists();
    return html;
  }

  function renderMsg(text, who="bot"){ const el = document.createElement("div"); el.className = "ck-msg " + who; el.innerHTML = (who==="bot") ? renderMarkdownLite(text) : escapeHtml(text); box.appendChild(el); box.scrollTop = box.scrollHeight; }
  function appendMsg(text, who="bot"){ renderMsg(text, who); try{ messages.push({ who: who, text: String(text||"") }); sessionStorage.setItem(CHAT_KEY, JSON.stringify(messages)); }catch(e){} }
  function loadChatFromSession(){ try{ const raw = sessionStorage.getItem(CHAT_KEY); if(raw){ messages = JSON.parse(raw) || []; for(const m of messages) renderMsg(m.text, m.who); } }catch(e){ messages = []; } }

  function setRemaining(n){ const c = Math.max(0, Math.min(5, Number(n||0))); badge.textContent = `Sisa: ${c}/5`; }
  function endUI(){ input.disabled = true; sendBtn.disabled = true; actions.classList.add("show"); btnNew.classList.remove("hidden"); }

  let typingEl = null;
  function showTyping(){ if (typingEl) return; typingEl = document.createElement("div"); typingEl.className = "ck-msg bot ck-typing"; typingEl.setAttribute("aria-live", "polite"); typingEl.innerHTML = '<span class="dot"></span><span class="dot"></span><span class="dot"></span>'; box.appendChild(typingEl); box.scrollTop = box.scrollHeight; }
  function hideTyping(){ if (typingEl && typingEl.parentNode) typingEl.parentNode.removeChild(typingEl); typingEl = null; }

  function welcome(){ if (box.dataset.hasWelcome === "1") return; appendMsg(`### Hai! 👋\nAku asisten CurhatKuy. Aku fokus pada **psikologi** & **FAQ** (jam, lokasi, layanan, tarif, booking).\nKondisi darurat? Hubungi **112/119**.\n\n- Maksimal **5 pesan** per sesi\n- Bahas seperlunya, jaga privasi ya 😊`, "bot"); box.dataset.hasWelcome = "1"; }

  function openChat(){
    chat.classList.add("open");
    try{ launcher.setAttribute("aria-expanded","true"); }catch(e){}
    try{ chat.setAttribute("aria-hidden","false"); }catch(e){}
    try{ sessionStorage.setItem(OPEN_KEY, "1"); }catch(e){}
    if (box.childElementCount === 0 && box.dataset.hasWelcome !== "1" && !sessionState.end) {
      if(messages.length === 0) welcome();
    }
    input.focus();
  }

  function closeChat(){
    chat.classList.remove("open");
    try{ launcher.setAttribute("aria-expanded","false"); }catch(e){}
    try{ chat.setAttribute("aria-hidden","true"); }catch(e){}
    try{ sessionStorage.setItem(OPEN_KEY, "0"); }catch(e){}
  }

  async function fetchStatus(){ 
    try{ 
      const res = await fetch(`${API}/status`, { method: "POST", headers: {"Content-Type":"application/json"}, body: JSON.stringify({ session_id: sessionId }) });
      let data;
      try { data = await res.json(); } catch { let raw = await res.text(); data = JSON.parse(raw.replace(/^\uFEFF/,"").trim()); }
      sessionState.end = !!data.end;
      sessionState.remaining = typeof data.remaining === "number" ? data.remaining : 5;
      setRemaining(sessionState.remaining);
      if (sessionState.end) { endUI(); } else { input.disabled = false; sendBtn.disabled = false; actions.classList.remove("show"); btnNew.classList.add("hidden"); }
    }catch(e){ setRemaining(5); }
  }

  async function send(){ 
    const msg = input.value.trim(); if (!msg) return;
    appendMsg(msg, "user");
    input.value = ""; input.disabled = true; sendBtn.disabled = true; input.placeholder = "Menyusun jawaban…"; showTyping();
    try{
      const res = await fetch(`${API}/chat`, { method: "POST", headers: {"Content-Type":"application/json"}, body: JSON.stringify({ message: msg, session_id: sessionId }) });
      let data;
      try { data = await res.json(); } catch { let raw = await res.text(); data = JSON.parse(raw.replace(/^\uFEFF/,"").trim()); }
      if (typeof data.reply === "string") appendMsg(data.reply, "bot");
      if (typeof data.remaining !== "undefined") setRemaining(data.remaining);
      if (data.handoff) { actions.classList.add("show"); btnAdmin.classList.remove("hidden"); }
      if (data.end) endUI();
    }catch(e){ appendMsg(`❌ Gagal menghubungi server: ${e?.message||e}`, "bot"); }
    finally { hideTyping(); if (!sessionState.end) { input.disabled = false; sendBtn.disabled = false; input.placeholder = "Tulis pesan..."; input.focus(); } }
  }

  // Toggle chat open/close when launcher is clicked
  if (launcher) {
    launcher.addEventListener("click", () => {
      if (chat.classList.contains('open')) closeChat(); else openChat();
    });
  }

  if (closeBtn) closeBtn.addEventListener("click", closeChat);
  if (sendBtn) sendBtn.addEventListener("click", send);
  if (input) input.addEventListener("keydown", e => { if(e.key==="Enter") send(); });
  if (btnAdmin) btnAdmin.addEventListener("click", () => window.open(ADMIN_URL, "_blank"));
  if (btnNew) btnNew.addEventListener("click", async () => {
    sessionStorage.removeItem(SID_KEY);
    sessionStorage.removeItem(CHAT_KEY);
    sessionId = (crypto?.randomUUID?.() || (Date.now()+"-"+Math.random().toString(16).slice(2)));
    sessionStorage.setItem(SID_KEY, sessionId);
    box.innerHTML = "";
    messages = [];
    delete box.dataset.hasWelcome;
    actions.classList.remove("show");
    btnAdmin.classList.add("hidden");
    btnNew.classList.add("hidden");
    input.disabled = false; sendBtn.disabled = false;
    input.placeholder = "Tulis pesan...";
    await fetchStatus();
    openChat();
  });

  loadChatFromSession();

  // restore open/closed UI preference (session-scoped)
  try{
    if (sessionStorage.getItem(OPEN_KEY) === "1") openChat();
  }catch(e){}

  fetchStatus();
})();
</script>
