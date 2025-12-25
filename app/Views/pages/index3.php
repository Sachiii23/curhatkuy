<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Curhat Kuy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/logoMe.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/psikolog.css" rel="stylesheet">
</head>

<body>


    <!-- Navbar Start -->
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
                    <a href="#" class="nav-item nav-link active">Home</a>
                    <a href="<?php echo base_url('index3/about') ?>" class="nav-item nav-link">About Us</a>
                        <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Konsultasikan Sekarang</a>
                                <div class="dropdown-menu dropdown-menu-custom m-0 shadow-sm border-0">
                                    <a href="<?php echo base_url('kuyCurhat') ?>" class="dropdown-item">Kuy Curhat</a>
                                    <a href="<?php echo base_url('coupleCurhat') ?>" class="dropdown-item">Couple Curhat</a>
                                    <a href="<?php echo base_url('paketCurhat') ?>" class="dropdown-item">Paket Curhat</a>
                                </div>
                        </div>
                    <a href="<?php echo base_url('consult/history') ?>" class="nav-item nav-link">Riwayat Konsultasi</a>
                    <a href="<?php echo base_url('login/logout')?>" class="nav-item nav-link">Logout</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Hero Section Starts -->
    <section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="hero-illustration">
                    <img src="../img/herobackground.png" alt="Ilustrasi Konsultasi Online" class="img-fluid">
                    </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                    <h1 class="display-4 mb-4">Yuk, Mulai Perjalanan Kesehatan Mental Kamu Bersama <span class="text-primary">CurhatKuy!</span></h1>
                    <p class="lead mb-4">Kamu tidak harus menghadapi semuanya sendiri. Kami hadir untuk memberikan layanan konseling online dengan psikolog profesional dan berlisensi.</p>
                    <div class="d-flex gap-3">
                        <a href="<?php echo base_url('paket/kuyCurhat') ?>" class="btn btn-primary btn-lg rounded-pill">Konsultasi Sekarang</a>
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
            
            <a href="<?= base_url('paket/kuyCurhat'); ?>" class="card text-center p-4 konsultasi-card-new text-decoration-none text-reset">
                <div class="card-image-wrapper mb-3">
                    <img src="<?= base_url('img/couple-kuy.png'); ?>" alt="Kuy Curhat" class="card-illustration">
                </div>
                <h5 class="fw-bold text-primary mb-2">Kuy Curhat</h5>
                <p class="text-muted small">Konsultasi bersama psikolog yang siap bikin hati kamu lebih plong!</p>
            </a>
            
            <a href="<?= base_url('paket/coupleCurhat'); ?>" class="card text-center p-4 konsultasi-card-new text-decoration-none text-reset">
                <div class="card-image-wrapper mb-3">
                    <img src="<?= base_url('img/paket-kuy.png'); ?>" alt="Couple Curhat" class="card-illustration">
                </div>
                <h5 class="fw-bold text-primary mb-2">Couple Curhat</h5>
                <p class="text-muted small">Konsultasi berdua bareng pasangan untuk hubungan yang lebih plong!</p>
            </a>
            
            <a href="<?= base_url('paket/paketCurhat'); ?>" class="card text-center p-4 konsultasi-card-new text-decoration-none text-reset">
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
                        <a href="<?= base_url('profil-psikolog-login/1'); ?>" class="btn-profile-action">Lihat profil</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="profile-card">
                        <div class="profile-img-wrapper">
                            <img src="<?php echo base_url('img/psiko-Adelilya Salsabila Sujatmoko.png'); ?>" alt="Adellya Salsabila" class="profile-img">
                        </div>
                        <h3 class="profile-name">Adellya Salsabila Sujatmoko</h3>
                        <p class="profile-role">Psikolog Klinis</p>
                        <a href="<?= base_url('profil-psikolog-login/2'); ?>" class="btn-profile-action"">Lihat profil</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="profile-card">
                        <div class="profile-img-wrapper">
                            <img src="<?php echo base_url('img/psiko-Sufyaan Gymnastiar.png'); ?>" alt="Sufyaan Gymnastiar" class="profile-img">
                        </div>
                        <h3 class="profile-name">Sufyaan Gymnastiar</h3>
                        <p class="profile-role">Psikolog Klinis</p>
                        <a href="<?= base_url('profil-psikolog-login/3'); ?>" class="btn-profile-action"">Lihat profil</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="profile-card">
                        <div class="profile-img-wrapper">
                            <img src="<?php echo base_url('img/psiko-Manda Aulia.png'); ?>" alt="Manda Aulia" class="profile-img">
                        </div>
                        <h3 class="profile-name">Manda Aulia</h3>
                        <p class="profile-role">Psikolog Klinis</p>
                        <a href="<?= base_url('profil-psikolog-login/4'); ?>" class="btn-profile-action"">Lihat profil</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="profile-card">
                        <div class="profile-img-wrapper">
                            <img src="<?php echo base_url('img/psiko-Adinda Deswita.png'); ?>" alt="Adinda Deswita" class="profile-img">
                        </div>
                        <h3 class="profile-name">Adinda Deswita</h3>
                        <p class="profile-role">Psikolog Klinis</p>
                        <a href="<?= base_url('profil-psikolog-login/5'); ?>" class="btn-profile-action">Lihat profil</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="profile-card">
                        <div class="profile-img-wrapper">
                            <img src="<?php echo base_url('img/Yulia-Direzkia.jpg'); ?>" alt="Yulia Direzkia" class="profile-img">
                        </div>
                        <h3 class="profile-name">Yulia Direzkia, M.Si.</h3>
                        <p class="profile-role">Psikolog Klinis</p>
                        <a href="<?= base_url('profil-psikolog-login/6'); ?>" class="btn-profile-action"">Lihat profil</a>
                    </div>
                </div>

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


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    
    <!-- Include chatbot partial -->
    <?= $this->include('partials/chatbot') ?>
</body>

</html>
 