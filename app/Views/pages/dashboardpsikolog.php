<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psikolog Dashboard | CurhatKuy</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #1e293b; }
        .navbar { background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border-bottom: 1px solid rgba(255,255,255,0.1); }
        .welcome-section { background: white; border-radius: 24px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 40px; border: 1px solid #f1f5f9; }
        .patient-card { border: 1px solid #f1f5f9; border-radius: 24px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); background: white; overflow: hidden; height: 100%; }
        .avatar-circle { width: 60px; height: 60px; border-radius: 18px; display: flex; align-items: center; justify-content: center; background: #f0fdfa; color: #0d9488; font-weight: 700; font-size: 1.25rem; }
        .info-badge { background: #f8fafc; border-radius: 16px; padding: 16px; margin-bottom: 20px; }
        .status-online { background: #f0fdf4; color: #166534; font-size: 0.8rem; padding: 8px 16px; border-radius: 50px; font-weight: 600; border: 1px solid #dcfce7; }
        
        .btn-chat-modern { 
            border: none; border-radius: 16px; padding: 14px; font-weight: 700; width: 100%; 
            display: flex; align-items: center; justify-content: center; gap: 10px; transition: all 0.3s ease; 
        }
        .btn-active { background: #0d9488; color: white; }
        .btn-active:hover { background: #0f766e; color: white; transform: scale(1.02); box-shadow: 0 10px 15px rgba(13, 148, 136, 0.2); }
        .btn-disabled { background: #e2e8f0; color: #94a3b8; cursor: not-allowed; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="#">
            <i class="bi bi-heart-pulse-fill me-2 text-warning"></i> CurhatKuy
        </a>
        <div class="ms-auto d-flex align-items-center">
            <div class="text-white text-end me-3 d-none d-md-block">
                <small class="d-block opacity-75">Halo, Dokter</small>
                <span class="fw-bold"><?= session()->get('nama') ?></span>
            </div>
            <a href="<?= base_url('login/logout') ?>" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm">
                Keluar <i class="bi bi-box-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="welcome-section d-md-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold mb-2">Daftar Konsultasi Aktif</h2>
            <p class="text-muted mb-0">Monitor dan kelola sesi chat dengan pasien Anda hari ini.</p>
        </div>
        <div class="mt-3 mt-md-0">
            <span class="status-online">
                <i class="bi bi-circle-fill me-2" style="font-size: 8px;"></i> Online & Siap Melayani
            </span>
        </div>
    </div>

    <div class="row g-4">
        <?php if (!empty($pasien)): ?>
            <?php foreach ($pasien as $p): ?>
                <?php 
                    date_default_timezone_set('Asia/Jakarta');
                    
                    // 1. PEMBERSIHAN DATA (VITAL): Hilangkan spasi agar URL tidak rusak
                    $patient_email = trim($p['email']); 
                    
                    // 2. LOGIKA WAKTU (SINKRON DENGAN 22:00 WIB)
                    $startTime = strtotime($p['tgl_konsultasi'] . ' ' . $p['jam_konsultasi']);
                    $endTime = $startTime + 3600; // Durasi 1 jam
                    $now = time();

                    $is_active = ($now >= $startTime && $now <= $endTime);
                    $is_expired = ($now > $endTime);
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card patient-card shadow-sm" style="<?= $is_active ? 'border: 2px solid #0d9488;' : '' ?>">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="avatar-circle">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-1 text-truncate" style="max-width: 180px;"><?= $p['nama_lengkap'] ?></h5>
                                    <span class="badge bg-soft-primary text-primary fw-600" style="font-size: 0.7rem; background: #e0f2fe;">
                                        <?= $p['package'] ?>
                                    </span>
                                </div>
                            </div>

                            <div class="info-badge">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted small">Status Sesi</span>
                                    <span class="small fw-bold">
                                        <?php if($is_active): ?> <span class="text-success">Sedang Berlangsung</span>
                                        <?php elseif($is_expired): ?> <span class="text-danger">Sudah Selesai</span>
                                        <?php else: ?> <span class="text-muted">Belum Waktunya</span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted small">Waktu</span>
                                    <span class="fw-bold small text-teal"><i class="bi bi-clock-history me-1"></i> <?= $p['jam_konsultasi'] ?></span>
                                </div>
                            </div>

                            <?php if($is_active && !empty($patient_email)): ?>
                                <a href="<?= base_url('chat/index/' . $patient_email) ?>" class="btn-chat-modern btn-active text-decoration-none">
                                    <i class="bi bi-chat-text-fill"></i> Mulai Konsultasi
                                </a>
                            <?php elseif($is_expired): ?>
                                <button class="btn-chat-modern btn-disabled" disabled>
                                    <i class="bi bi-check-circle-fill"></i> Sesi Selesai
                                </button>
                            <?php else: ?>
                                <button class="btn-chat-modern btn-disabled" disabled>
                                    <i class="bi bi-lock-fill"></i> Belum Dibuka
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 empty-state text-center py-5">
                <div class="empty-icon mb-3">
                    <i class="bi bi-chat-dots fs-1 text-muted"></i>
                </div>
                <h4 class="fw-bold">Belum Ada Pasien</h4>
                <p class="text-muted">Pasien Anda akan muncul di sini sesuai jadwal.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>