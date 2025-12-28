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

    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/styleSchedule.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/psikolog.css') ?>" rel="stylesheet">
</head>
<body>

    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="#" class="navbar-brand">
                    <h1 class="m-0 text-primary d-flex align-items-center">
                        <img src="<?= base_url('img/logoMe.png') ?>" alt="logo" style="width: 100px; height: 100px;"> 
                        Hello, <?= session()->get('nama_lengkap') ?> !
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?= base_url('index3/index') ?>" class="nav-item nav-link">Home</a>
                        <a href="<?= base_url('index3/about') ?>" class="nav-item nav-link">About Us</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Konsultasikan Sekarang</a>
                            <div class="dropdown-menu dropdown-menu-custom m-0 shadow-sm border-0">
                                <a href="<?= base_url('kuyCurhat') ?>" class="dropdown-item">Kuy Curhat</a>
                                <a href="<?= base_url('coupleCurhat') ?>" class="dropdown-item">Couple Curhat</a>
                                <a href="<?= base_url('paketCurhat') ?>" class="dropdown-item">Family Curhat</a>
                            </div>
                        </div>
                        <a href="<?= base_url('login/logout')?>" class="nav-item nav-link">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

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
                    
                    <p class="service-price">Harga: <strong>Rp <?= number_format($harga, 0, ',', '.') ?></strong></p>

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
                                <tbody id="calendarBody"></tbody>
                            </table>
                        </div>

                        <div class="time-slots-and-button">
                            <div class="time-availability-header" id="availabilityHeader">Select a date to see availability</div>
                            <div class="time-slots" id="timeSlotsContainer">
                                <p class="text-muted" style="font-size: 14px; margin: 10px 0;">Pilih tanggal yang tersedia (ditandai hijau) di kalender.</p>
                            </div>
                            <button class="lanjut-button" id="lanjutButton" disabled>Lanjut</button>
                        </div>
                    </div>
                </div>

                <div class="service-details-row">
                    <div class="service-details-box">
                        <span class="psikolog-name" id="display-nama-psikolog"><?= $psikolog ?></span>
                        <a href="javascript:void(0)" class="more-details-link" id="toggleDetails">
                            More details <span class="arrow-down">▼</span>
                        </a>
                        <div id="detailsContent" style="display: none; padding-top: 10px; font-size: 14px; color: #555;">
                            <p><strong>Layanan:</strong> <?= $layanan ?></p>
                            <p>Sesi ini bersama <strong><?= $psikolog ?></strong> akan berlangsung selama 60 menit melalui platform video conference.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white py-5 footer">...</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- 1. LOGIKA DETAIL DROPDOWN ---
        const detailsLink = document.getElementById('toggleDetails');
        const detailsContent = document.getElementById('detailsContent');
        if (detailsLink) {
            detailsLink.addEventListener('click', () => {
                const isHidden = detailsContent.style.display === 'none';
                detailsContent.style.display = isHidden ? 'block' : 'none';
                detailsLink.querySelector('span').innerText = isHidden ? '▲' : '▼';
            });
        }

        // --- 2. LOGIKA KALENDER ---
        moment.locale('id');
        let currentDate = moment(); 
        let selectedDate = null;
        let selectedTime = null;

        const calendarBody = document.getElementById('calendarBody');
        const currentMonthYear = document.getElementById('currentMonthYear');
        const slotsContainer = document.getElementById('timeSlotsContainer');
        const availabilityHeader = document.getElementById('availabilityHeader');
        const lanjutButton = document.getElementById('lanjutButton');

        // Data database availability (Bisa disesuaikan)
        const availabilityData = <?= $availabilityData ?>;
        const idPsikolog = <?= $id_psikolog ?>;

        function renderCalendar() {
            calendarBody.innerHTML = ''; 
            currentMonthYear.textContent = currentDate.format('MMMM YYYY');
            const startOfMonth = currentDate.clone().startOf('month');
            const daysInMonth = currentDate.daysInMonth();
            const startDay = startOfMonth.day();
            const today = moment().startOf('day');

            let date = 1;
            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');
                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('td');
                    if (i === 0 && j < startDay || date > daysInMonth) {
                        cell.classList.add('disabled-month');
                    } else {
                        const currentDay = startOfMonth.clone().date(date);
                        const dateKey = currentDay.format('YYYY-MM-DD');
                        cell.textContent = date;
                        
                        if (availabilityData[dateKey]) {
                            cell.classList.add('available');
                            cell.onclick = () => {
                                document.querySelectorAll('.calendar td').forEach(td => td.classList.remove('active-date'));
                                cell.classList.add('active-date');
                                selectedDate = currentDay;
                                updateTimeSlots(dateKey);
                            };
                        } else {
                            cell.classList.add('disabled');
                        }
                        date++;
                    }
                    row.appendChild(cell);
                }
                calendarBody.appendChild(row);
                if (date > daysInMonth) break;
            }
        }

        function updateTimeSlots(dateKey) {
            slotsContainer.innerHTML = '';
            availabilityHeader.textContent = `Availability for ${moment(dateKey).format('D MMMM YYYY')}`;
            availabilityData[dateKey].forEach(slot => {
                const btn = document.createElement('button');
                btn.className = 'time-slot btn btn-outline-primary m-1';
                btn.textContent = slot.jam + ' WIB';

                btn.onclick = () => {
                    selectedSlotId = slot.id_jadwal;
                    selectedTime = slot.jam;
                    lanjutButton.disabled = false;
                };

                slotsContainer.appendChild(btn);
            });
        }

        // --- 3. LOGIKA REDIRECT KE PAYMENT (SINKRONISASI AKHIR) ---
        lanjutButton.addEventListener('click', () => {
            if (selectedDate && selectedTime) {
                // Mengambil data PHP ke JavaScript
                const namaPsikolog = "<?= $psikolog ?>";
                const hargaPsikolog = "<?= $harga ?>";
                const layananPaket = "<?= $layanan ?>";
                const tglBooking = selectedDate.format('YYYY-MM-DD');

                const checkoutUrl = `<?= base_url('index3/payment') ?>` + 
                                    `?psikolog=${encodeURIComponent(namaPsikolog)}` +
                                    `&harga=${hargaPsikolog}` +
                                    `&layanan=${encodeURIComponent(layananPaket)}` + 
                                    `&tgl=${tglBooking}` +
                                    `&jam=${selectedTime}`;
                                    
                window.location.href = checkoutUrl;
            }
        });

        renderCalendar();
        document.getElementById('nextMonth').onclick = () => { currentDate.add(1, 'month'); renderCalendar(); };
        document.getElementById('prevMonth').onclick = () => { currentDate.subtract(1, 'month'); renderCalendar(); };
    });
    </script>
</body>
</html>