
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../img/curhatkuy_logo_new.png" rel="icon">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/psikolog.css" rel="stylesheet">
    <title>Curhatkuy</title>
</head>
<body>

    <!-- Navbar Starts -->
   <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container px-5">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="../img/curhatkuy_logo_new.png" alt="Curhatkuy Logo" class="clinic-icon" style="width: 40px; height: 40px;">
                    <h1 class="m-0 text-primary d-flex align-items-center ps-2">CurhatKuy!</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?php echo base_url() ?>" class="nav-item nav-link ">Home</a>
                        <a href="<?php echo base_url('home/about') ?>" class="nav-item nav-link">About Us</a>
                        <a href="#" class="nav-item nav-link active">Psikolog</a>
                        <a href="<?php echo base_url('home/login') ?>" class="nav-item nav-link btn btn-primary text-white ms-lg-3 py-2 px-4 d-none d-lg-block rounded-pill">
                            Login
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar Ends -->

       
    <section class="psychologist-list-section">
    <div class="background-shapes">
        <img src="..\img\shape1.png" alt="Shape Latar Belakang Kiri" class="shape-image blue-left-top">
        <img src="..\img\shape2.png" alt="Shape Latar Belakang Kanan" class="shape-image green-right-top">
    </div>
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
                        <a href="<?= base_url('profil-psikolog/1'); ?>" class="btn-profile-action"">Lihat profil</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="profile-card">
                        <div class="profile-img-wrapper">
                            <img src="<?php echo base_url('img/psiko-Adelilya Salsabila Sujatmoko.png'); ?>" alt="Adellya Salsabila" class="profile-img">
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
                        <a href="<?= base_url('profil-psikolog/5'); ?>" class="btn-profile-action"">Lihat profil</a>
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
    </div>


</section>
    <footer class="bg-white py-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0 contact-info">
                    <div class="footer-logo">
                        <img src="../img/curhatkuy_logo_new.png" alt="CurhatKuy Logo" class="mb-3" style="max-width: 100px;">
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
    </body>
</html>