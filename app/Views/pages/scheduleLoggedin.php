<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule | CurhatKuy!</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <link href="<?= base_url('../css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('../css/styleSchedule.css') ?>" rel="stylesheet">
    <link href="<?= base_url('../css/psikolog.css') ?>" rel="stylesheet">
    
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
                <!-- <a href="<?php echo base_url('index3/payment')?>" class="nav-item nav-link">Psikolog</a> -->
                <a href="<?php echo base_url('index3/psikolog')?>" class="nav-item nav-link">Psikolog</a>
                <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Konsultasikan Sekarang</a>
                <div class="dropdown-menu dropdown-menu-custom m-0 shadow-sm border-0">
                    <a href="<?php echo base_url('paket/kuyCurhat') ?>" class="dropdown-item">Kuy Curhat</a>
                    <a href="<?php echo base_url('paket/coupleCurhat') ?>" class="dropdown-item">Couple Curhat</a>
                    <a href="<?php echo base_url('paket/paketCurhat') ?>" class="dropdown-item">Paket Curhat</a>
                </div>
        </div>
    <a href="<?php echo base_url('login/logout')?>" class="nav-item nav-link">Logout</a>
    </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

<div class="main-content">
    <div class="background-shape-left"></div> 
    <div class="background-shape-right"></div>
    
    <div class="schedule-container">
        <h1>Schedule your service</h1>
        <p>Check out our availability and book the date and time that works for you</p>
        
        <div class="scheduling-area">
            
            <div class="select-datetime">
                <span class="label">Select a Date and Time</span>
                <span class="timezone">Coordinated Universal Time (UTC)</span>
                
                <?php if (!empty($selected_psikolog['harga'])): ?>
                    <p class="service-price">Harga: **<?= $selected_psikolog['harga'] ?>**</p>
                <?php endif; ?>

                <div class="calendar-and-time">
                    <div class="calendar-box">
                        <div class="calendar-header">
                            <span class="arrow-left" id="prevMonth">‹</span>
                            <span class="month-year" id="currentMonthYear"></span>
                            <span class="arrow-right" id="nextMonth">›</span>
                        </div>
                        <table class="calendar">
                            <thead>
                                <tr>
                                    <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
                                </tr>
                            </thead>
                            <tbody id="calendarBody">
                            </tbody>
                        </table>
                    </div>

                    <div class="time-slots-and-button">
                        <div class="time-availability-header" id="availabilityHeader">Select a date to see availability</div>
                        <div class="time-slots" id="timeSlotsContainer">
                            <p class="text-muted" style="font-size: 14px; margin: 10px 0;">Pilih tanggal yang tersedia (ditandai hijau) di kalender.</p>
                        </div>
                        <!-- <button class="lanjut-button" id="lanjutButton" disabled>Lanjut</button> -->

                        <button class="lanjut-button" id="lanjutButton" onclick="window.location.href='<?php echo base_url('index3/payment')?>'">Lanjut</button>
                    </div>
                </div>
            </div>

            <div class="service-details-row">
                <div class="service-details-box">
                    <span class="psikolog-name">
                        <?= $selected_psikolog['nama'] ?? 'Nama Psikolog' ?>
                    </span>
                    <a href="#" class="more-details-link">More details <span class="arrow-down">▼</span></a>
                </div>
            </div>

        </div>
    </div>
</div>
<footer class="bg-white py-5 footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0 contact-info">
                <div class="footer-logo">
                    <img src="<?= base_url('img/curhatkuy_logo_new.png') ?>" alt="CurhatKuy Logo" class="mb-3" style="max-width: 100px;">
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mengatur bahasa Moment.js ke Indonesia
        moment.locale('id', {
            months: 'Januari_Februari_Maret_April_Mei_Juni_Juli_Agustus_September_Oktober_November_Desember'.split('_'),
            monthsShort: 'Jan_Feb_Mar_Apr_Mei_Jun_Jul_Agu_Sep_Okt_Nov_Des'.split('_'),
            weekdays: 'Minggu_Senin_Selasa_Rabu_Kamis_Jumat_Sabtu'.split('_'),
            weekdaysShort: 'Min_Sen_Sel_Rab_Kam_Jum_Sab'.split('_'),
            weekdaysMin: 'Min_Sen_Sel_Rab_Kam_Jum_Sab'.split('_')
        });

        let currentDate = moment(); // Tanggal saat ini (misal: Desember 2025)

        const calendarBody = document.getElementById('calendarBody');
        const currentMonthYear = document.getElementById('currentMonthYear');
        const prevMonthBtn = document.getElementById('prevMonth');
        const nextMonthBtn = document.getElementById('nextMonth');
        const slotsContainer = document.getElementById('timeSlotsContainer');
        const availabilityHeader = document.getElementById('availabilityHeader');
        const lanjutButton = document.getElementById('lanjutButton');

        let selectedDate = null;
        let selectedTime = null;

        // DATA DUMMY KETERSEDIAAN (Sesuaikan dengan data PHP Anda)
        // Format kunci: YYYY-MM-DD
        const availabilityData = {
            '2025-12-05': ['10:00', '12:00', '14:00', '16:00'], // Tanggal Aktif default (seperti di gambar)
            '2025-12-09': ['10:00', '14:00'],
            '2025-12-10': ['10.00'],
            '2025-12-12': ['12:00', '16:00'],
            '2025-12-16': ['10:00', '14:00', '16:00'],
            '2025-12-23': ['09:00', '11:00', '13:00'],
            '2025-12-31': ['10:00'],
            // Tambahkan data ketersediaan psikolog lainnya di sini
        };
        
        function renderCalendar() {
            // Hapus semua baris yang sudah ada
            calendarBody.innerHTML = ''; 

            // Set tampilan bulan/tahun 
            currentMonthYear.textContent = currentDate.format('MMMM YYYY');
            
            const startOfMonth = currentDate.clone().startOf('month');
            const startDay = startOfMonth.day(); // Hari dalam seminggu (0=Minggu, 6=Sabtu)
            const daysInMonth = currentDate.daysInMonth(); 
            const today = moment().startOf('day');
            
            let date = 1;
            
            for (let i = 0; i < 6; i++) { 
                const row = document.createElement('tr');

                for (let j = 0; j < 7; j++) { 
                    const cell = document.createElement('td');
                    
                    // 1. Sel Kosong Awal Bulan
                    if (i === 0 && j < startDay) {
                        cell.classList.add('disabled-month'); 
                        cell.textContent = ''; // Pastikan sel kosong tidak ada angka
                    } 
                    // 2. Sel Kosong Akhir Bulan
                    else if (date > daysInMonth) {
                        cell.classList.add('disabled-month');
                        cell.textContent = ''; // Pastikan sel kosong tidak ada angka
                    } 
                    // 3. Sel Berisi Tanggal
                    else {
                        const currentDay = startOfMonth.clone().date(date);
                        const formattedDate = currentDay.format('YYYY-MM-DD');
                        const isAvailable = availabilityData[formattedDate] && availabilityData[formattedDate].length > 0;

                        // *** BAGIAN PENTING: Menambahkan angka tanggal ***
                        cell.textContent = date; 
                        
                        // Cek apakah tanggal ini sudah berlalu atau hari yang diblokir
                        if (currentDay.isBefore(today, 'day')) { 
                            cell.classList.add('disabled');
                        } 
                        // Cek apakah tanggal tersedia
                        else if (isAvailable) {
                            cell.classList.add('available');
                            cell.dataset.date = formattedDate; // Tambahkan data attribute
                            
                            cell.addEventListener('click', (e) => {
                                // Pastikan hanya tanggal yang available yang bisa di-klik
                                if (e.currentTarget.classList.contains('available')) {
                                    handleDateClick(e.currentTarget, currentDay);
                                }
                            });
                        }
                        // Cek apakah tanggal hari ini tapi tidak tersedia
                        else if (currentDay.isSame(today, 'day') && !isAvailable) {
                             cell.classList.add('disabled');
                        }
                        // Tanggal di masa depan tapi tidak tersedia
                        else {
                            cell.classList.add('disabled');
                        }
                        
                        // Jika sudah terpilih sebelumnya, beri kelas aktif
                        if (selectedDate && currentDay.isSame(selectedDate, 'day')) {
                             cell.classList.add('active-date');
                        }
                        
                        // Jika tanggal hari ini, tambahkan kelas today-date
                        if (currentDay.isSame(today, 'day')) {
                             cell.classList.add('today-date');
                        }


                        date++;
                    }
                    row.appendChild(cell);
                }
                
                calendarBody.appendChild(row);
                if (date > daysInMonth) break; 
            }
        }

        function handleDateClick(cell, selectedDay) {
            // Reset kelas aktif dari semua sel
            document.querySelectorAll('.calendar td').forEach(td => {
                td.classList.remove('active-date');
                // Hapus kelas today-date jika tanggal aktif yang dipilih bukan hari ini
                if (!moment(td.dataset.date).isSame(moment(), 'day')) {
                    td.classList.remove('today-date');
                }
            });
            
            // Set kelas aktif pada tanggal yang dipilih
            cell.classList.add('active-date');
            selectedDate = selectedDay;
            selectedTime = null; // Reset waktu yang dipilih
            lanjutButton.disabled = true; // Nonaktifkan tombol lanjut
            lanjutButton.textContent = 'Lanjut';


            // Update slot waktu
            updateTimeSlots(selectedDay.format('YYYY-MM-DD'), selectedDay.format('dddd, D MMMM'));
        }

        function updateTimeSlots(dateKey, displayDate) {
            slotsContainer.innerHTML = '';
            availabilityHeader.textContent = `Availability for ${displayDate}`;

            const times = availabilityData[dateKey] || [];

            if (times.length === 0) {
                slotsContainer.innerHTML = '<p class="text-muted" style="font-size: 14px; margin: 10px 0;">Tidak ada slot waktu tersedia.</p>';
            } else {
                times.forEach(time => {
                    const button = document.createElement('button');
                    button.classList.add('time-slot');
                    button.textContent = `${time} WIB`;
                    button.dataset.time = time;

                    button.addEventListener('click', (e) => {
                        // Reset kelas aktif pada slot waktu
                        document.querySelectorAll('.time-slot').forEach(btn => {
                            btn.classList.remove('active-time');
                        });
                        
                        // Set kelas aktif pada waktu yang dipilih
                        e.currentTarget.classList.add('active-time');
                        selectedTime = time;

                        // Aktifkan tombol Lanjut
                        lanjutButton.disabled = false;
                        lanjutButton.textContent = `Lanjut (${selectedTime} WIB)`;
                    });

                    slotsContainer.appendChild(button);
                });
            }
        }

        // Event Listeners untuk navigasi bulan
        prevMonthBtn.addEventListener('click', () => {
            currentDate.subtract(1, 'month');
            // Jika pindah ke bulan yang sudah lewat, blokir navigasi
            if (currentDate.isBefore(moment(), 'month')) {
                currentDate = moment().startOf('month');
            }
            renderCalendar();
            // Kosongkan slot waktu saat pindah bulan
            slotsContainer.innerHTML = '<p class="text-muted" style="font-size: 14px; margin: 10px 0;">Pilih tanggal yang tersedia (ditandai biru) di kalender.</p>';
            availabilityHeader.textContent = `Select a date to see availability`;
            lanjutButton.disabled = true;
            lanjutButton.textContent = 'Lanjut';

        });

        nextMonthBtn.addEventListener('click', () => {
            currentDate.add(1, 'month');
            renderCalendar();
             // Kosongkan slot waktu saat pindah bulan
            slotsContainer.innerHTML = '<p class="text-muted" style="font-size: 14px; margin: 10px 0;">Pilih tanggal yang tersedia (ditandai biru) di kalender.</p>';
            availabilityHeader.textContent = `Select a date to see availability`;
            lanjutButton.disabled = true;
            lanjutButton.textContent = 'Lanjut';
        });

        // Event Listener untuk Tombol Lanjut
        lanjutButton.addEventListener('click', () => {
            if (selectedDate && selectedTime) {
                const finalDate = selectedDate.format('YYYY-MM-DD');
                alert(`Anda memilih tanggal: ${finalDate} pada pukul ${selectedTime} WIB. Siap untuk melanjutkan!`);
                
                // Ganti dengan navigasi ke halaman checkout
                // window.location.href = `checkout.php?psikolog_id=<?= $selected_psikolog['id'] ?? '' ?>&date=${finalDate}&time=${selectedTime}`;
            } else {
                alert('Silakan pilih tanggal dan slot waktu.');
            }
        });


        // Inisialisasi kalender dan set tanggal aktif default (misal hari ini jika tersedia)
        renderCalendar();
        
        // Coba set tanggal aktif default ke tanggal 5 Desember 2025 (seperti contoh)
        const defaultDateKey = '2025-12-05';
        const defaultDate = moment(defaultDateKey);

        if (availabilityData[defaultDateKey]) {
            // Cari sel tanggal yang sesuai
            const defaultCell = document.querySelector(`td[data-date="${defaultDateKey}"]`);
            if (defaultCell) {
                handleDateClick(defaultCell, defaultDate);
            }
        } else {
            // Jika tanggal default tidak ada/tersedia, tampilkan pesan default
            slotsContainer.innerHTML = '<p class="text-muted" style="font-size: 14px; margin: 10px 0;">Pilih tanggal yang tersedia (ditandai biru) di kalender.</p>';
            availabilityHeader.textContent = `Select a date to see availability`;
        }

    });
</script>

</body>
</html>