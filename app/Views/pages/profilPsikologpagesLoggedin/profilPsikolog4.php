<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Psikolog - Syachra Shafa Kamila</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="<?php echo base_url('css/profilPsikolog.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
</head>
<body>

    <!-- Navbar Starts -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="#" class="navbar-brand">
                    <h1 class="m-0  text-primary d-flex align-items-center">
                        <img src="../img/logoMe.png" alt="clinic-icon" class="clinic-icon" style="width: 100px; height: 100px;"> Hello, <?= session()->get('nama_lengkap') ?> !
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?php echo base_url('index3/index') ?>" class="nav-item nav-link">Home</a>
                    <a href="<?php echo base_url('index3/about') ?>" class="nav-item nav-link">About Us</a>
                    <a href="#" class="nav-item nav-link active">Psikolog</a>
                        <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Konsultasikan Sekarang</a>
                                <div class="dropdown-menu dropdown-menu-custom m-0 shadow-sm border-0">
                                    <a href="<?php echo base_url('paket/kuyCurhat') ?>" class="dropdown-item">Kuy Curhat</a>
                                    <a href="<?php echo base_url('paket/coupleCurhat') ?>" class="dropdown-item">Couple Curhat</a>
                                    <a href="<?php echo base_url('paket/paketCurhat') ?>" class="dropdown-item">Paket Curhat</a>
                                </div>
                        </div>
                    <a href="<?php echo base_url('consult/history') ?>" class="nav-item nav-link">Riwayat Konsultasi</a>
                    <a href="<?php echo base_url('login/logout')?>" class="nav-item nav-link">Logout</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar Ends -->

        <div class="header-banner-wrapper">
    
    <div class="decoration-left">
        <svg class="wave-left" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 L150,0 C150,0 120,80 80,100 C40,120 0,180 0,180 Z" />
        </svg>
        <div class="circle-ring-green"></div>
    </div>

    <h1 class="header-banner-title">Profile Psikolog</h1>

    <div class="decoration-right">
        <div class="circle-solid-green"></div>
        <svg class="wave-right" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path d="M200,200 L50,200 C50,200 80,120 120,100 C160,80 200,20 200,20 Z" />
        </svg>
    </div>
</div>


    <section class="profile-detail-section">
        <div class="container">
            
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    
                    <div class="profile-header-wrapper">
                        <div class="dots-decoration"></div>
                        
                        <img src="<?php echo base_url('img/psikologmanda.png'); ?>" alt="Syachra Shafa Kamila" class="main-profile-img">
                    </div>

                    <h1 class="profile-name-large">Manda Aulia</h1>
                    <p class="profile-title-large">Psikolog Klinis</p>

                </div>
            </div>

            <div class="row justify-content-center content-section text-center">
                <div class="col-md-10 col-lg-8">
                    <i class="bi bi-person-circle section-icon"></i>
                    
                    <h3 class="section-title">Tentang Saya</h3>
                    
                    <p class="section-text">
                        Halo Sobat Kuy,
                        <br><br>
                        Saya adalah psikolog klinis yang berfokus pada pendekatan humanistik. 
                        Saya percaya bahwa setiap individu memiliki potensi untuk tumbuh dan berkembang. 
                        Pengalaman saya mencakup menangani kecemasan, depresi, dan masalah hubungan interpersonal. 
                        Saya siap mendengarkan cerita Anda dengan empati dan tanpa penghakiman untuk membantu Anda menemukan solusi terbaik.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center content-section text-center">
                <div class="col-md-10 col-lg-8">
                    <i class="bi bi-briefcase-fill section-icon"></i>
                    
                    <h3 class="section-title">Kasus Yang Di tangani</h3>
                    
                    <p class="section-text">
                        Kecemasan Umum (Generalized Anxiety), Depresi Ringan hingga Sedang, 
                        Manajemen Stres, Masalah Kepercayaan Diri (Self-Esteem), 
                        Konflik Keluarga, Trauma Masa Kecil, dan Pengembangan Diri.
                        Saya menggunakan pendekatan Cognitive Behavioral Therapy (CBT) dan Mindfulness dalam sesi konseling.
                    </p>
                </div>
            </div>

        </div>
    </section>
</section>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>