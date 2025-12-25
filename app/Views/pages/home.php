<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curhat Kuy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/curhatkuy_logo_new.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="css/custom_style.css" rel="stylesheet"> -->
    <link href="css/psikolog.css" rel="stylesheet">
    
    <?php
    if (!function_exists('base_url')) { helper('url'); }
    $STYLE_HREF = base_url('assets/css/style.css?v=4');
    ?>
    <link rel="stylesheet" href="<?= esc($STYLE_HREF) ?>" />

</head>

<body>
    
    <!-- Navbar Starts -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container px-5">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="img/curhatkuy_logo_new.png" alt="Curhatkuy Logo" class="clinic-icon" style="width: 40px; height: 40px;">
                    <h1 class="m-0 text-primary d-flex align-items-center ps-2">CurhatKuy!</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="home/about" class="nav-item nav-link">About Us</a>
                        <a href="home/psikolog" class="nav-link">Psikolog</a>
                        <a href="home/login" class="nav-item nav-link btn btn-primary text-white ms-lg-3 py-2 px-4 d-none d-lg-block rounded-pill">
                            Login
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar Ends -->

    <!-- Hero Section Starts -->
    <section id="home" class="hero-section">
    <div class="container-fluid px-5">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="hero-illustration">
                    <img src="img/herobackground.png" alt="Ilustrasi Konsultasi Online" class="img-fluid">
                    </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                    <h1 class="display-4 mb-4">Yuk, Mulai Perjalanan Kesehatan Mental Kamu Bersama <span class="text-primary">CurhatKuy!</span></h1>
                    <p class="lead mb-4">Kamu tidak harus menghadapi semuanya sendiri. Kami hadir untuk memberikan layanan konseling online dengan psikolog profesional dan berlisensi.</p>
                    <div class="d-flex gap-3">
                        <a href="home/login" class="btn btn-primary btn-lg rounded-pill">Konsultasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section Ends -->

 <!-- Pilihan Paket Starts -->
    <section id="konsultasi-sekarang" class="konsultasi-section">
    <div class="container text-center">
        <h3 class="fw-bold text-secondary mb-5">Konsultasi Sekarang</h3>
        <div class="d-flex flex-wrap justify-content-center gap-4">
            
            <a href="home/login" class="card text-center p-4 konsultasi-card-new text-decoration-none text-reset">
                <div class="card-image-wrapper mb-3">
                    <img src="<?= base_url('img/couple-kuy.png'); ?>" alt="Kuy Curhat" class="card-illustration">
                </div>
                <h5 class="fw-bold text-primary mb-2">Kuy Curhat</h5>
                <p class="text-muted small">Konsultasi bersama psikolog yang siap bikin hati kamu lebih plong!</p>
            </a>
            
            <a href="home/login" class="card text-center p-4 konsultasi-card-new text-decoration-none text-reset">
                <div class="card-image-wrapper mb-3">
                    <img src="<?= base_url('img/paket-kuy.png'); ?>" alt="Couple Curhat" class="card-illustration">
                </div>
                <h5 class="fw-bold text-primary mb-2">Couple Curhat</h5>
                <p class="text-muted small">Konsultasi berdua bareng pasangan untuk hubungan yang lebih plong!</p>
            </a>
            
            <a href="home/login" class="card text-center p-4 konsultasi-card-new text-decoration-none text-reset">
                <div class="card-image-wrapper mb-3">
                    <img src="<?= base_url('img/duo-kuy.png'); ?>" alt="Paket Kuy" class="card-illustration">
                </div>
                <h5 class="fw-bold text-primary mb-2">Paket Kuy</h5>
                <p class="text-muted small">Paket konsultasi yang bikin hati kamu plong tanpa bikin dompet bolong!</p>
            </a>

        </div>
    </div>
</section>
    <!-- Pilihan Paket Ends -->


    <!-- Values Starts -->
    <section class="features-section">
    <div class="container">
        <h2 class="features-title">CurhatKuy! siap untuk...</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <div class="feature-card">
                    <div class="feature-icon-circle">
                        <i class="fas fa-video"></i>
                    </div>
                    <p class="feature-text">Memberikan konsultasi tatap muka via video chat dengan nyaman</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card">
                    <div class="feature-icon-circle">
                        <i class="fas fa-lock"></i>
                    </div>
                    <p class="feature-text">Menjaga dan menjamin privasi kamu</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card">
                    <div class="feature-icon-circle">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <p class="feature-text">Menerapkan standar profesionalisme tertinggi demi kenyamanan kamu</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card">
                    <div class="feature-icon-circle">
                        <i class="fas fa-heart"></i>
                    </div>
                    <p class="feature-text">Mengutamakan kebutuhan kamu dan selalu memberikan pelayanan terbaik.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
    <!-- Values Ends -->

    <!-- Psikolog Starts -->
<section class="psychologist-list-section psikolog-v2">
    <div class="container">
            <h1 class="page-title">Temukan Psikologmu</h1>
            <div class="container pb-5">
                <div class="row g-4 justify-content-center">
                    
                    <div class="col-md-6 col-lg-4">
                        <div class="profile-card">
                            <div class="profile-img-wrapper">
                                <img src="<?php echo base_url('img/psiko-Syachra Shafa Kamila.png'); ?>" alt="Syahcra Shafa Kamila" class="profile-img">
                            </div>
                            <h3 class="profile-name">Syahcra Shafa Kamila</h3>
                            <p class="profile-role">Psikolog Klinis</p>
                            <a href="<?= base_url('profil-psikolog/1'); ?>" class="btn-profile-action">Lihat profil</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="profile-card">
                            <div class="profile-img-wrapper">
                                <img src="<?php echo base_url('img/psiko-Adelilya Salsabila Sujatmoko.png'); ?>" alt="Adelilya Salsabila Sujatmoko" class="profile-img">
                            </div>
                            <h3 class="profile-name">Adellya Salsabila Sujatmoko</h3>
                            <p class="profile-role">Psikolog Klinis</p>
                            <a href="<?= base_url('profil-psikolog/2'); ?>" class="btn-profile-action"">Lihat profil</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="profile-card">
                            <div class="profile-img-wrapper">
                                <img src="<?php echo base_url('img/psiko-Sufyaan Gymnastiar.png'); ?>" alt="Sufyaan Gymnastiar" class="profile-img">
                            </div>
                            <h3 class="profile-name">Sufyaan Gymnastiar</h3>
                            <p class="profile-role">Psikolog Klinis</p>
                            <a href="<?= base_url('profil-psikolog/3'); ?>" class="btn-profile-action"">Lihat profil</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="profile-card">
                            <div class="profile-img-wrapper">
                                <img src="<?php echo base_url('img/psiko-Manda Aulia.png'); ?>" alt="Manda Aulia" class="profile-img">
                            </div>
                            <h3 class="profile-name">Manda Aulia</h3>
                            <p class="profile-role">Psikolog Klinis</p>
                            <a href="<?= base_url('profil-psikolog/4'); ?>" class="btn-profile-action"">Lihat profil</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="profile-card">
                            <div class="profile-img-wrapper">
                                <img src="<?php echo base_url('img/psiko-Adinda Deswita.png'); ?>" alt="Adinda Deswita" class="profile-img">
                            </div>
                            <h3 class="profile-name">Adinda Deswita</h3>
                            <p class="profile-role">Psikolog Klinis</p>
                            <a href="<?= base_url('profil-psikolog/5'); ?>" class="btn-profile-action">Lihat profil</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="profile-card">
                            <div class="profile-img-wrapper">
                                <img src="<?php echo base_url('img/Yulia-Direzkia.jpg'); ?>" alt="Yulia Direzkia" class="profile-img">
                            </div>
                            <h3 class="profile-name">Yulia Direzkia, M.Si.</h3>
                            <p class="profile-role">Psikolog Klinis</p>
                            <a href="<?= base_url('profil-psikolog/6'); ?>" class="btn-profile-action"">Lihat profil</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
    <!-- Psikolog Ends -->


    <section id="tentang-kami" class="about-us-section py-5">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-6 order-lg-1">
                    <span class="badge-about-us text-uppercase rounded-pill mb-3">Tentang Kami</span>
                    <h2 class="title-about-us">Hai! Salam Kenal dari <br><span class="text-primary">CurhatKuy</span></h2>
                    <p class="text-about-us">
                        CurhatKuy adalah layanan kesehatan mental online yang siap 
                        memberikan konsultasi aman dan nyaman untuk kamu. Dengan 
                        kemajuan teknologi di era sekarang, kami akan membantu konsultasi 
                        kesehatan mental kalian melalui dunia digital.
                    </p>
                    <p class="text-about-us">
                        Jadi, cerita kamu pasti aman bersama kami!
                    </p>
                    <p class="text-about-us mt-3">
                        Yuk, jangan ragu untuk *sharing* bersama CurhatKuy!
                    </p>
                </div>
                
                <div class="col-lg-6 order-lg-2 mt-4 mt-lg-0">
                    <div class="image-wrapper">
                        <img src="img\Shafaa.png" alt="Model CurhatKuy" class="img-fluid about-us-img">
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Footer Starts -->
    <footer class="bg-white py-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0 contact-info">
                    <div class="footer-logo">
                        <img src="img/curhatkuy_logo_new.png" alt="CurhatKuy Logo" class="mb-3" style="max-width: 100px;">
                        <h5 class="footer-brand">CurhatKuy</h5>
                    </div>
                    <p class="text-muted small">
                        PT. Resanoma Inovasi Sehat<br>
                        Gedung AD Premier lt. 9<br>
                        Jl. TB Simatupang No. 5<br>
                        Jakarta Selatan
                    </p>
                    <p class="text-muted small">
                        Tel(WA): **0857 3856 4594**<br>
                        Email: <a href="mailto:cs@curhatkuy.com" class="text-decoration-none">cs@curhatkuy.com</a>
                    </p>
                </div>

                <div class="col-md-2 mb-4 mb-md-0">
                    <h5 class="footer-title">Layanan Konsumen</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-muted text-decoration-none">Hubungi Kami</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">FAQ's</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h5 class="footer-title">Tautan Penting</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-muted text-decoration-none">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Syarat dan Ketentuan</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Emergency Service</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Tentang Kami</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Bergabung Dengan HaloPlong</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h5 class="footer-title mb-3">Follow Us</h5>
                    <div class="social-links d-flex gap-3">
                        <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-pinterest"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="text-muted small mb-0">Copyright © 2025 CurhatKuy.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Ends -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
    <?php
    // Chatbot Script
    $API_BASE  = function_exists('env') ? env('CK_API') : getenv('CK_API');
    $ADMIN_URL = function_exists('env') ? env('CK_ADMIN_URL') : getenv('CK_ADMIN_URL');
    $API_BASE  = $API_BASE  ?: 'http://127.0.0.1:8000';
    $ADMIN_URL = $ADMIN_URL ?: 'https://wa.me/62xxxxxxxxxx';
    ?>
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
    <button class="ck-launcher" id="ck-launcher" aria-label="Buka Chatbot" aria-expanded="false">
    <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M20 2H4a2 2 0 0 0-2 2v14l4-4h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" fill="currentColor"/>
    </svg>
    </button>

<div class="ck-chat" id="ck-chat" role="dialog" aria-modal="false" aria-labelledby="ck-title" aria-hidden="true">
        <div class="ck-header-new">
            <div class="bot-info">
                <img src="img/curhatkuy_logo_new.png" alt="Bot Icon" class="bot-icon">
                <div class="text-info">
                    <div class="ck-title-new" id="ck-title">Bot Curhat</div>
                    <div class="status-online">● Online</div>
                </div>
            </div>
            <button class="ck-close" id="ck-close" aria-label="Tutup">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path d="M18 6L6 18M6 6l12 12" stroke="#fff" stroke-width="2" fill="none"/>
                </svg>
            </button>
        </div>

        <div class="ck-body-new">
            <div class="bot-illustration"></div>

            <div class="ck-welcome-content">
                <div class="welcome-message bot-message">Halo aku adalah Botkuy,bot yang akan menangni masalahmu</div>
                <button class="welcome-option-btn">Sil</button>
                <button class="welcome-option-btn">VisionBot is an artificial-intelligence Chatbot which can process text and image</button>
            </div>

            <div class="ck-box" id="ck-box"></div>

            <div class="ck-actions" id="ck-actions">
                <button id="ck-admin" class="ck-btn sm hidden">Hubungi Admin</button>
                <button id="ck-new"   class="ck-btn sm hidden">Mulai Sesi Baru</button>
            </div>
        </div>

        <div class="ck-input-new">
            <input id="ck-input" type="text" placeholder="Hello there!" autocomplete="off" />
            <div class="input-actions">
                <button class="icon-button"><i class="fas fa-camera"></i></button> <button id="ck-send" class="ck-send-new">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" fill="currentColor"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

<script>
    (() => {
        const API       = "<?= esc($API_BASE) ?>";
        const ADMIN_URL = "<?= esc($ADMIN_URL) ?>";
        const launcher  = document.getElementById("ck-launcher");
        const chat      = document.getElementById("ck-chat");
        const closeBtn  = document.getElementById("ck-close");
        const box       = document.getElementById("ck-box");
        const input     = document.getElementById("ck-input");
        const sendBtn   = document.getElementById("ck-send");
        const actions   = document.getElementById("ck-actions");
        const btnAdmin  = document.getElementById("ck-admin");
        const btnNew    = document.getElementById("ck-new");
        // const badge    = document.getElementById("ck-badge"); // Badge dihapus di UI baru

        // Elemen UI Baru
        const ckWelcomeContent = document.querySelector('.ck-welcome-content');
        
        const SID_KEY = "ck_session_id";
        const CHAT_KEY = "ck_messages_v1";
        const OPEN_KEY = "ck_open"; 
        
        let sessionId = sessionStorage.getItem(SID_KEY);
        if (!sessionId) {
            sessionId = (crypto?.randomUUID?.() || (Date.now()+"-"+Math.random().toString(16).slice(2)));
            sessionStorage.setItem(SID_KEY, sessionId);
        }
        let sessionState = { end: false, remaining: 5 };
        let messages = [];

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

        // Render-only: adds DOM node but does NOT persist
        function renderMsg(text, who="bot"){
            const el = document.createElement("div");
            el.className = "ck-msg " + who;
            el.innerHTML = (who==="bot") ? renderMarkdownLite(text) : escapeHtml(text);
            box.appendChild(el);
            box.scrollTop = box.scrollHeight;
        }

        // Append + persist
        function appendMsg(text, who="bot"){
            renderMsg(text, who);
            try{
                messages.push({ who: who, text: String(text||"") });
                sessionStorage.setItem(CHAT_KEY, JSON.stringify(messages));
            }catch(e){ /* ignore storage errors */ }
        }

        function loadChatFromSession(){
            try{
                const raw = sessionStorage.getItem(CHAT_KEY);
                if(raw){
                    messages = JSON.parse(raw) || [];
                    for(const m of messages){ renderMsg(m.text, m.who); }
                }
            }catch(e){ messages = []; }
        }

        // Fungsi ini tidak lagi digunakan karena badge dihapus dari UI
        // function setRemaining(n){
        //     const c = Math.max(0, Math.min(5, Number(n||0)));
        //     badge.textContent = `Sisa: ${c}/5`;
        // }

        function endUI(){
            input.disabled = true; sendBtn.disabled = true;
            input.placeholder = "Sesi telah berakhir."; // Tambahan placeholder akhir sesi
            actions.classList.add("show");
            btnNew.classList.remove("hidden");
        }

        // --- Typing indicator handling ---
        let typingEl = null;
        function showTyping(){
            if (typingEl) return;
            typingEl = document.createElement("div");
            typingEl.className = "ck-msg bot ck-typing";
            typingEl.setAttribute("aria-live", "polite");
            typingEl.innerHTML = '<span class="dot"></span><span class="dot"></span><span class="dot"></span>';
            box.appendChild(typingEl);
            box.scrollTop = box.scrollHeight;
        }
        function hideTyping(){
            if (typingEl && typingEl.parentNode) typingEl.parentNode.removeChild(typingEl);
            typingEl = null;
        }
        
        // FUNGSI INI DIBUAT PASIF UNTUK UI BARU KARENA PESAN SAMBUTAN SUDAH ADA DI HTML
        function welcome(){
            if (box.dataset.hasWelcome === "1") return;
            box.dataset.hasWelcome = "1";
        }

        function openChat(){
            chat.classList.add("open");
            try{ launcher.setAttribute("aria-expanded","true"); }catch(e){}
            try{ chat.setAttribute("aria-hidden","false"); }catch(e){}
            try{ sessionStorage.setItem(OPEN_KEY, "1"); }catch(e){}

            // LOGIKA BARU UNTUK UI DESAIN BARU (PENGELOLAAN TAMPILAN)
            if (messages.length === 0) { // Jika belum ada pesan yang terkirim/diterima
                if (ckWelcomeContent) ckWelcomeContent.style.display = 'flex'; // Tampilkan welcome content
                if (box) box.style.display = 'none';           // Sembunyikan ck-box
                welcome(); 
            } else { // Jika sudah ada riwayat chat
                if (ckWelcomeContent) ckWelcomeContent.style.display = 'none';
                if (box) box.style.display = 'flex'; // Tampilkan ck-box
            }
            // AKHIR LOGIKA BARU

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
                const res = await fetch(`${API}/status`, {
                    method: "POST",
                    headers: {"Content-Type":"application/json"},
                    body: JSON.stringify({ session_id: sessionId })
                });
                let data;
                try { data = await res.json(); }
                catch { let raw = await res.text(); data = JSON.parse(raw.replace(/^\uFEFF/,"").trim()); }

                sessionState.end = !!data.end;
                sessionState.remaining = typeof data.remaining === "number" ? data.remaining : 5;
                // setRemaining(sessionState.remaining); // Dihapus karena badge dihapus

                if (sessionState.end) {
                    endUI();
                } else {
                    input.disabled = false; sendBtn.disabled = false;
                    actions.classList.remove("show");
                    btnNew.classList.add("hidden");
                }
            }catch(e){
                // setRemaining(5); // Dihapus karena badge dihapus
            }
        }

        async function send(){
            const msg = input.value.trim();
            if (!msg) return;

            // LOGIKA PENTING: PENGALIHAN TAMPILAN DARI WELCOME KE CHAT BOX
            // Ini yang memperbaiki chat tidak muncul!
            if (ckWelcomeContent && box) {
                ckWelcomeContent.style.display = 'none'; // Sembunyikan konten selamat datang
                box.style.display = 'flex';           // Tampilkan ck-box
            }
            // AKHIR LOGIKA PENGALIHAN

            appendMsg(msg, "user"); 
            input.value = "";
            // disable input during request dan show typing animation
            input.disabled = true; sendBtn.disabled = true;
            input.placeholder = "Menyusun jawaban…";
            showTyping();

            try{
                const res = await fetch(`${API}/chat`, {
                    method: "POST",
                    headers: {"Content-Type":"application/json"},
                    body: JSON.stringify({ message: msg, session_id: sessionId })
                });
                let data;
                try { data = await res.json(); }
                catch { let raw = await res.text(); data = JSON.parse(raw.replace(/^\uFEFF/,"").trim()); }

                if (typeof data.reply === "string") appendMsg(data.reply, "bot");
                // if (typeof data.remaining !== "undefined") setRemaining(data.remaining); // Dihapus
                if (data.handoff) { actions.classList.add("show"); btnAdmin.classList.remove("hidden"); }
                if (data.end) endUI();

            }catch(e){
                appendMsg(`❌ Gagal menghubungi server: ${e?.message||e}`, "bot");
            } finally {
                hideTyping();
                if (!sessionState.end) {
                    input.disabled = false; sendBtn.disabled = false;
                    input.placeholder = "Hello there!"; // Placeholder baru
                    input.focus();
                }
            }
        }

        // Toggle chat open/close when launcher is clicked
        launcher.addEventListener("click", () => {
            if (chat.classList.contains('open')) closeChat(); else openChat();
        });
        closeBtn.addEventListener("click", closeChat);
        sendBtn.addEventListener("click", send);
        input.addEventListener("keydown", e => { if(e.key==="Enter") send(); });
        btnAdmin.addEventListener("click", () => window.open(ADMIN_URL, "_blank"));
        
        btnNew.addEventListener("click", async () => {
            // clear session-level data to start a fresh session
            sessionStorage.removeItem(SID_KEY);
            sessionStorage.removeItem(CHAT_KEY);
            sessionStorage.removeItem(OPEN_KEY);
            sessionId = (crypto?.randomUUID?.() || (Date.now()+"-"+Math.random().toString(16).slice(2)));
            sessionStorage.setItem(SID_KEY, sessionId);
            messages = [];

            box.innerHTML = "";
            delete box.dataset.hasWelcome;
            actions.classList.remove("show");
            btnAdmin.classList.add("hidden");
            btnNew.classList.add("hidden");
            input.disabled = false; sendBtn.disabled = false;
            input.placeholder = "Hello there!";
            
            // LOGIKA BARU UNTUK UI DESAIN BARU (MENGEMBALIKAN KE TAMPILAN WELCOME)
            if (ckWelcomeContent) ckWelcomeContent.style.display = 'flex';
            if (box) box.style.display = 'none';
            // AKHIR LOGIKA BARU

            await fetchStatus();
            openChat();
        });

        // load any saved chat from sessionStorage (persists across reloads but cleared on tab close)
        loadChatFromSession();
        // restore open/closed UI preference (session-scoped)
        try{
            if (sessionStorage.getItem(OPEN_KEY) === "1") openChat();
        }catch(e){}

        fetchStatus();
    })();
    </script>

</body>

</html>