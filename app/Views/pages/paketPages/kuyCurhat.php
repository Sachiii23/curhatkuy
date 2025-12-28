
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="<?= base_url('img/curhatkuy_logo_new.png') ?>" rel="icon">

    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/psikolog.css') ?>" rel="stylesheet">
    <title>Curhatkuy</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <!-- Navbar Starts -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="#" class="navbar-brand">
                    <h1 class="m-0  text-primary d-flex align-items-center">
                        <img src="<?= base_url('img/logoMe.png') ?>" alt="clinic-icon" class="clinic-icon" style="width: 100px; height: 100px;"> Hello, <?= session()->get('nama_lengkap') ?> !
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?php echo base_url('index3/index') ?>" class="nav-item nav-link">Home</a>
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
    <!-- Navbar Ends -->

       
    <section class="psychologist-list-section">
    <div class="background-shapes">
        <img src="<?= base_url('img/shape1.png') ?>" alt="Shape Latar Belakang Kiri" class="shape-image blue-left-top">
        <img src="<?= base_url('img/shape2.png') ?>" alt="Shape Latar Belakang Kanan" class="shape-image green-right-top">
    </div>
    <div class="container">
        <div class="container pb-5">
        <div class="container pb-5">
    
        <h1 class="page-title text-center mb-3">Kuy Curhat</h1>

        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <p class="section-description" style="color: #666; font-size: 1.1rem;">
                    Temukan psikolog profesional yang siap mendengarkan dan membantumu. 
                    Pilih profil untuk melihat detail atau langsung jadwalkan konsultasi.
                </p>
            </div>
        </div>

     <div class="row g-4 justify-content-center">
    </div>
</div>

        <div class="row g-4 justify-content-center">
            <?php if (!empty($psikolog)) : ?>
            <?php foreach ($psikolog as $p) : ?>
            <div class="col-md-6 col-lg-4">
                <div class="profile-card">
                    <div class="profile-img-wrapper">
                        <img src="<?php echo base_url('img/psiko-'. $p['nama'] .'.png'); ?>" alt="<?= esc($p['nama']); ?>" class="profile-img">
                    </div>
                    <h3 class="profile-name"><?= esc($p['nama']); ?></h3>
                    <p class="profile-role">Psikolog Klinis</p>
                    <p class="profile-role">
                        Rp.<?= number_format($p['harga'], 0, ',', '.'); ?>/jam
                    </p>
                    <div class="action-buttons-wrapper">
                        <a href="<?php echo base_url('index3/profilPsikolog/'. $p['id_psikolog'] .''); ?>" class="btn-profile-action">Lihat profil</a>
                        <a href="<?= base_url('schedule/' . (int)$p['id_psikolog']) ?>" class="btn-profile-blue">Konsultasi</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Psikolog belum tersedia.</p>
                </div>
            <?php endif; ?>
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
    </body>
</html>