<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - CurhatKuy</title>
    <link rel="icon" href="img/curhatkuy_logo_new.png">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?= base_url('css/stylePayment.css?v=' . time()); ?>">
</head>

<body>

    <div class="container">
        <div class="payment-container">
            <h1 class="page-title">Payment</h1>
            
            <?php if(session()->getFlashdata('msg')): ?>
                <div class="alert alert-danger rounded-lg"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            
            <form action="../payment/createPayment" method="post" enctype="multipart/form-data" id="paymentForm">
                
                <h4 class="section-title">Personal details</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_lengkap">Name</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" 
                               value="<?= session()->get('nama_lengkap') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?= session()->get('email') ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="nomor_handphone">No Handphone</label>
                        <input type="tel" class="form-control" id="nomor_handphone" name="nomor_handphone" 
                               placeholder="08xxxxxxxxx" required>
                    </div>
                </div>

                <h4 class="section-title">Payment methods</h4>
                <div class="payment-methods-group mb-4"> 
                    <label>
                        <input type="radio" name="payment_method" value="gopay" class="payment-option" onclick="showDetails('gopay')">
                        <div class="payment-label">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" alt="GoPay">
                        </div>
                    </label>

                    <label>
                        <input type="radio" name="payment_method" value="qris" class="payment-option" onclick="showDetails('qris')">
                        <div class="payment-label">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="QRIS">
                        </div>
                    </label>

                    <label>
                        <input type="radio" name="payment_method" value="ovo" class="payment-option" onclick="showDetails('ovo')">
                        <div class="payment-label">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg" alt="OVO">
                        </div>
                    </label>
                </div>

                <div id="payment-details" style="display: none; border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #f9f9f9; margin-bottom: 20px;">
                    <div id="detail-content">
                        </div>
                    
                    <hr>
                    
                    <div class="upload-section">
                        <label style="font-weight: bold; display: block; margin-bottom: 10px;">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_bayar" accept="image/*" class="form-control" required>
                        <small class="text-muted">Format: JPG, PNG (Maks. 2MB)</small>
                    </div>
                </div>

                <style>
                    /* Menghilangkan radio button asli agar hanya kotaknya yang terlihat */
                    .payment-option { display: none; }
                    
                    .payment-label {
                        border: 2px solid #eee;
                        padding: 10px;
                        border-radius: 8px;
                        cursor: pointer;
                        display: inline-block;
                        transition: 0.3s;
                    }

                    .payment-label img { height: 30px; }

                    /* Efek saat dipilih */
                    .payment-option:checked + .payment-label {
                        border-color: #8cc63f; /* Warna hijau seperti tombol submit Anda */
                        background-color: #f0f9e8;
                    }
                </style>

                <h4 class="section-title">Curhat Details</h4>
                
                <div class="form-group mb-3">
                    <label>Type Curhat</label>
                    <input type="text" class="form-control" name="package" 
                           value="<?= session()->get('selected_package') ?? 'Kuy Curhat' ?>" readonly>
                </div>

                <div class="form-group mb-3">
                    <label>Psikolog</label>
                    <input type="text" class="form-control" name="psikolog" 
                           value="<?= session()->get('selected_psychologist') ?? 'Syachra Shafa Kamila' ?>" readonly>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Date</label>
                        <input type="text" class="form-control" name="date" 
                               value="11/11/2025" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Time Booked</label>
                        <input type="text" class="form-control" name="time" 
                               value="10:00" readonly>
                    </div>
                </div>


                <!-- <button type="button" class="btn-submit" onclick="window.location.href='<?= base_url('consult/index') ?>'">
                    Submit
                </button> -->
                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; border: none; padding: 30px;">
            <div class="modal-body text-center">
                <h2 style="font-weight: bold;">
                    <span style="color: #00aeef;">Curhat</span><span style="color: #8cc63f;">Kuy!</span>
                </h2>
                
                <p class="mt-4" style="font-size: 18px; color: #333;">Selamat Payment Anda Telah Berhasil</p>
                
                <div class="my-4">
                    <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="45" stroke="#8cc63f" stroke-width="5"/>
                        <path d="M30 50L45 65L70 35" stroke="#8cc63f" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                
                <a href="<?= base_url('consult/history') ?>" class="btn btn-link" style="color: #00aeef; text-decoration: none; font-weight: 500;">
                    Klik Disini Untuk Curhat Langsung
                </a>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/payment.js"></script>   
    

 
</body>
</html>

