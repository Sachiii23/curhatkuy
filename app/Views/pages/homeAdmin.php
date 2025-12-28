<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | CurhatKuy</title>
    <link rel="icon" href="../img/logoMe.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-color: #f8f9fa;
            --primary-purple: #6f42c1;
            --text-gray: #6c757d;
        }

        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styling */
        #sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #fff;
            border-right: 1px solid #dee2e6;
            transition: all 0.3s;
            z-index: 1000;
        }

        .brand-section {
            padding: 30px;
            text-align: center;
        }

        .brand-section img {
            width: 100px;
        }

        .nav-link {
            color: var(--primary-purple);
            font-weight: 500;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            text-decoration: none;
        }

        .nav-link:hover, .nav-link.active {
            background: #f0ebfa;
            color: var(--primary-purple);
        }

        .nav-link i {
            font-size: 20px;
        }

        /* Content Styling */
        #content-wrapper {
            margin-left: 250px;
            padding: 30px;
        }

        .top-nav {
            background: #fff;
            padding: 15px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .section-card {
            background: #fff;
            border-radius: 15px;
            padding: 0;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .section-header {
            background: #64b5f6;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .table thead {
            background-color: #34495e;
            color: #fff;
        }

        .content-section { display: none; }
        .content-section.active { display: block; }
        
        .badge-status { padding: 8px 12px; border-radius: 20px; font-size: 0.75rem; }
        .badge-layanan { font-size: 10px; border-radius: 5px; padding: 3px 8px; margin: 2px; }
    </style>
</head>
<body>

    <nav id="sidebar">
        <div class="brand-section">
            <img src="<?= base_url('img/curhatkuy_logo_new.png') ?>" alt="Logo">
        </div>
        
        <div class="nav flex-column">
            <a class="nav-link active" onclick="showContent('dashboard', this)">
                <i class='bx bxs-dashboard'></i> Dashboard
            </a>
            <a class="nav-link" onclick="showContent('psikolog', this)">
                <i class='bx bxs-user-voice'></i> Data Psikolog
            </a>
            <a class="nav-link" onclick="showContent('payment', this)">
                <i class='bx bxs-credit-card'></i> Payment
            </a>
            <a class="nav-link" onclick="showContent('rating', this)">
                <i class='bx bxs-star'></i> Rating
            </a>
            <a class="nav-link" onclick="showContent('contact', this)">
                <i class='bx bxs-message-dots'></i> Contact Us
            </a>
            <hr>
            <a class="nav-link text-danger" href="<?= base_url('login/logout') ?>">
                <i class='bx bxs-log-out'></i> Logout
            </a>
        </div>
    </nav>

    <div id="content-wrapper">
        <div class="top-nav">
            <i class='bx bx-menu fs-4' style="cursor: pointer;"></i>
            <div class="d-flex align-items-center gap-3">
                <span class="fw-bold">Admin CurhatKuy</span>
                <img src="<?= base_url('img/ficent.png') ?>" class="rounded-circle" width="40" height="40">
            </div>
        </div>

        <?php if(session()->getFlashdata('message')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class='bx bxs-check-circle me-2'></i> <?= session()->getFlashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class='bx bxs-error-circle me-2'></i> <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div id="dashboard" class="content-section active">
            <div class="section-card">
                <div class="section-header">Table Users</div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $users): ?>
                            <tr>
                                <td><?= $users['nama_lengkap'] ?></td>
                                <td><?= $users['email'] ?></td>
                                <td><?= $users['j_kelamin'] ?></td>
                                <td><?= $users['tlp'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="psikolog" class="content-section">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Manajemen Psikolog</h4>
                <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahPsikolog">
                    <i class='bx bx-plus'></i> Tambah Psikolog
                </button>
            </div>
            
            <div class="section-card">
                <div class="section-header" style="background-color: #0d9488;">Daftar Psikolog Terdaftar</div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center align-middle">
                        <thead>
                            <tr>                                
                                <th>Nama & Spesialisasi</th>
                                <th>Harga/Sesi</th>
                                <th>Layanan</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($list_psikolog)): foreach($list_psikolog as $ps): ?>
                            <tr>
                                <td>
                                    <strong><?= $ps['nama'] ?></strong><br>
                                    <small class="text-muted"><?= $ps['title'] ?? 'Psikolog Umum' ?></small>
                                </td>
                                <td><span class="text-success fw-bold">Rp <?= number_format($ps['harga'] ?? 0, 0, ',', '.') ?></span></td>
                                <td>
                                    <?php 
                                        if(!empty($ps['spesialisasi'])) {
                                            $tags = explode(', ', $ps['spesialisasi']);
                                            foreach($tags as $t) echo "<span class='badge bg-info text-dark badge-layanan'>$t</span>";
                                        } else {
                                            echo "<small class='text-muted'>Belum diatur</small>";
                                        }
                                    ?>
                                </td>
                                <td><?= $ps['email'] ?></td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <button class="btn btn-sm btn-outline-primary" onclick='editPsikolog(<?= json_encode($ps) ?>)'>
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                        <a href="<?= base_url('admin/delete_psikolog/'.$ps['email']) ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus psikolog ini?')">
                                            <i class='bx bxs-trash'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                                <tr><td colspan="6" class="p-4 text-muted">Belum ada psikolog yang didaftarkan.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="payment" class="content-section">
            <div class="section-card">
                <div class="section-header" style="background-color: #5c6bc0;">Table Payment & Approval</div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center align-middle">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Paket & Psikolog</th> 
                                <th>Jadwal Konsultasi</th> 
                                <th>Total</th>
                                <th>Bukti</th> 
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($payment)): foreach($payment as $p): ?>
                            <tr>
                                <td><?= $p['nama_lengkap'] ?></td>
                                <td>
                                    <span class="fw-bold"><?= $p['package'] ?></span><br>
                                    <small class="text-primary fw-bold"><?= $p['psikolog'] ?? '-' ?></small>
                                </td>
                                <td>
                                    <?php if(!empty($p['tgl_konsultasi'])): ?>
                                        <div class="fw-bold small"><?= $p['tgl_konsultasi'] ?></div>
                                        <div class="badge bg-info text-dark" style="font-size: 10px;"><?= $p['jam_konsultasi'] ?></div>
                                    <?php else: ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="text-success fw-bold">Rp <?= number_format($p['amount'], 0, ',', '.') ?></span></td>
                                <td>
                                    <?php if(!empty($p['bukti_bayar'])): ?>
                                        <a href="<?= base_url('uploads/bukti_bayar/'.$p['bukti_bayar']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class='bx bx-search-alt'></i> Lihat
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">No File</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                        $statusClass = 'bg-warning text-dark';
                                        if($p['transaction_status'] == 'success') $statusClass = 'bg-success text-white';
                                        if($p['transaction_status'] == 'canceled') $statusClass = 'bg-danger text-white';
                                    ?>
                                    <span class="badge badge-status <?= $statusClass ?> text-capitalize">
                                        <?= $p['transaction_status'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if($p['transaction_status'] == 'pending'): ?>
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="<?= base_url('admin/update_status/'.$p['order_id'].'/success') ?>" 
                                               class="btn btn-sm btn-success" 
                                               onclick="return confirm('Setujui pembayaran ini?')">
                                               <i class='bx bx-check'></i>
                                            </a>
                                            <a href="<?= base_url('admin/update_status/'.$p['order_id'].'/canceled') ?>" 
                                               class="btn btn-sm btn-danger" 
                                               onclick="return confirm('Tolak pembayaran ini?')">
                                               <i class='bx bx-x'></i>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <i class='bx bxs-lock-alt text-muted'></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                                <tr><td colspan="7" class="p-4 text-muted">Belum ada data pembayaran.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="rating" class="content-section">
            <div class="section-card">
                <div class="section-header" style="background-color: #66bb6a;">Table Rating</div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rating as $r): ?>
                            <tr>
                                <td><?= $r['name'] ?></td>
                                <td><?= $r['email'] ?></td>
                                <td>
                                    <?php for($i=0; $i<$r['rate']; $i++) echo "<i class='bx bxs-star text-warning'></i>"; ?>
                                </td>
                                <td><?= $r['message'] ?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahPsikolog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Registrasi Psikolog Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/save_psikolog') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Syachra S.Psi" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Harga per Sesi (Rp)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 375000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email (Login)</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Layanan Curhat:</label>
                            <div class="d-flex flex-wrap gap-3 p-2 bg-light rounded border">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="spesialisasi[]" value="Kuy Curhat" id="t1">
                                    <label class="form-check-label" for="t1">Kuy Curhat</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="spesialisasi[]" value="Couple Curhat" id="t2">
                                    <label class="form-check-label" for="t2">Couple Curhat</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="spesialisasi[]" value="Family Curhat" id="t3">
                                    <label class="form-check-label" for="t3">Family Curhat</label>
                                </div>
                            </div>
                        </div>            
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4">Simpan Psikolog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditPsikolog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title fw-bold">Edit Data Psikolog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/update_psikolog') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body p-4">
                        <input type="hidden" name="email_lama" id="edit_email_hidden">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Harga per Sesi (Rp)</label>
                            <input type="number" name="harga" id="edit_harga" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Layanan:</label>
                            <div class="d-flex flex-wrap gap-3 p-2 bg-light rounded border">
                                <div class="form-check">
                                    <input class="form-check-input edit-layanan-check" type="checkbox" name="spesialisasi[]" value="Kuy Curhat" id="e1">
                                    <label class="form-check-label" for="e1">Kuy Curhat</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input edit-layanan-check" type="checkbox" name="spesialisasi[]" value="Couple Curhat" id="e2">
                                    <label class="form-check-label" for="e2">Couple Curhat</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input edit-layanan-check" type="checkbox" name="spesialisasi[]" value="Family Curhat" id="e3">
                                    <label class="form-check-label" for="e3">Family Curhat</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning px-4">Update Psikolog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function showContent(sectionId, element) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');

            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            element.classList.add('active');
        }

        // JS UPDATED TO MAP TITLE & HARGA
        function editPsikolog(data) {
            document.getElementById('edit_email_hidden').value = data.email;
            document.getElementById('edit_nama').value = data.nama;
            
            // Mapping Data Baru
            document.getElementById('edit_harga').value = data.harga || 0;

            // Reset dan Set Checkbox Layanan
            document.querySelectorAll('.edit-layanan-check').forEach(cb => cb.checked = false);
            if(data.spesialisasi) {
                const layananArr = data.spesialisasi.split(', ');
                layananArr.forEach(val => {
                    document.querySelectorAll('.edit-layanan-check').forEach(cb => {
                        if(cb.value === val) cb.checked = true;
                    });
                });
            }

            var editModal = new bootstrap.Modal(document.getElementById('modalEditPsikolog'));
            editModal.show();
        }
    </script>
</body>
</html>