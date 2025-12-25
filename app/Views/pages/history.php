<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="../css/psikolog.css" rel="stylesheet"> 
    <title>Konsultasi Yu</title>
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
                    <a href="<?php echo base_url('index3/psikolog')?>" class="nav-item nav-link">Psikolog</a>
                        <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Konsultasikan Sekarang</a>
                                <div class="dropdown-menu dropdown-menu-custom m-0 shadow-sm border-0">
                                    <a href="<?php echo base_url('kuyCurhat') ?>" class="dropdown-item">Kuy Curhat</a>
                                    <a href="<?php echo base_url('coupleCurhat') ?>" class="dropdown-item">Couple Curhat</a>
                                    <a href="<?php echo base_url('  paketCurhat') ?>" class="dropdown-item">Paket Curhat</a>
                                </div>
                        </div>
                    <a href="#" class="nav-item nav-link active">Riwayat Konsultasi</a>
                    <a href="<?php echo base_url('login/logout')?>" class="nav-item nav-link">Logout</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar Ends -->







            <section class="psychologist-list-section" style="padding-top: 60px; padding-bottom: 80px; position: relative;">
    
    <div class="background-shapes">
        <img src="../img/shape1.png" alt="Shape Kiri" class="shape-image blue-left-top" style="top: 0; left: 0;">
        <img src="../img/shape2.png" alt="Shape Kanan" class="shape-image green-right-top" style="top: 0; right: 0;">
    </div>

    <div class="container text-center">
        <h1 class="page-title" style="margin-top: 20px; margin-bottom: 80px; font-weight: 700;">
            Temukan Psikologmu
        </h1>
        
        <div class="px-lg-5 text-start" style="margin-top: 40px;">
            
            <a href="javascript:history.back()" class="back-link mb-4" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; color: #333;">
                <i class="bi bi-arrow-left"></i> Psikolog
            </a>

            <div class="row g-4">
                
                <div class="col-md-6">
                    <div class="consultation-card shadow-sm" style="background: #fff; border-radius: 15px; padding: 20px; display: flex; align-items: center; justify-content: space-between;">
                        <div class="d-flex align-items-center">
                            <img src="" class="psikolog-img me-3" style="width: 80px; height: 80px; border-radius: 10px; object-fit: cover;" alt="Psikolog">
                            <div>
                                <h6 class="mb-0 fw-bold">Syachra Shafa Kamila</h6>
                                <small class="text-muted d-block mb-1">Psikolog Klinis</small>
                                <div class="time-badge mb-1" style="background: #f1f1f1; padding: 2px 8px; border-radius: 5px; font-size: 11px; display: inline-block;">10:00</div>
                                <div class="fw-bold" style="font-size: 13px; color: #333;">KuyCurhat</div>
                            </div>
                        </div>
                        <button class="btn btn-chat" style="background-color: #94C64E; color: white; border-radius: 8px; padding: 8px 20px; border: none; font-weight: 600;">Chat</button>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="consultation-card shadow-sm" style="background: #fff; border-radius: 15px; padding: 20px; display: flex; align-items: center; justify-content: space-between;">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/80" class="psikolog-img me-3" style="width: 80px; height: 80px; border-radius: 10px; object-fit: cover;" alt="Psikolog">
                            <div>
                                <h6 class="mb-0 fw-bold">Adel</h6>
                                <small class="text-muted d-block mb-1">Psikolog Anak</small>
                                <div class="time-badge mb-1" style="background: #f1f1f1; padding: 2px 8px; border-radius: 5px; font-size: 11px; display: inline-block;">10:00</div>
                                <div class="fw-bold" style="font-size: 13px; color: #333;">KuyCurhat</div>
                            </div>
                        </div>
                        <button class="btn btn-chat" style="background-color: #94C64E; color: white; border-radius: 8px; padding: 8px 20px; border: none; font-weight: 600;">Chat</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

    <footer class="bg-white py-5 footer border-top">
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
                        Tel(WA): <b>0857 3856 4594</b><br>
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
                        <a href="#" class="text-muted"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-linkedin"></i></a>
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