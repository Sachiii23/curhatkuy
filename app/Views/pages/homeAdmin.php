<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/admin.css">
    <title>Curhat Kuy</title>
    <link href="../img/logoMe.png" rel="icon">
</head>
</body>

</html>
 
        <a href="#" class="brand" style="display: flex; align-items: center;">
            <img src="../img/logoMe.png" alt="AdminHub Logo" style="height: 140px; width: 140px; margin-left: 70px; margin-top: 70px;">
        </a>
        <ul class="side-menu top">
            <li class="active" onclick="showContent('dashboard')">
                <a href="#">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li onclick="showContent('payment')">
                <a href="#">
                    <i class='bx bxl-paypal'></i>
                    <span class="text">Payment</span>
                </a>
            </li>
            <li onclick="showContent('rating')">
                <a href="#">
                    <i class='bx bxs-star-half'></i>
                    <span class="text">Rating</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog' ></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('login/logout') ?>" class="logout">
                    <i class='bx bx-log-out'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="profile">
                <img src="../img/ficent.png" class="profile-img">
            </a>
        </nav>
        <!-- NAVBAR -->
        <!-- MAIN CONTENT -->
        <div id="main-content">
            <div id="dashboard" class="content-section active">
                <h2>Dashboard Table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Password</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Telepon</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($user as $users): ?>
        <tr>
            <td><?= $users['nama_lengkap'] ?></td>
            <td><?= $users['email'] ?></td>
            <td><?= $users['password'] ?></td>
            <td><?= $users['j_kelamin'] ?></td>
            <td><?= $users['alamat'] ?></td>
            <td><?= $users['tgl_lahir'] ?></td>
            <td><?= $users['tlp'] ?></td>
        </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>
            </div>
            <div id="payment" class="content-section">
                <h2>Payment Content</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Order Id</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Paket</th>
            <th>Total Pembayaran</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal Pembayaran</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($payment as $payment): ?>
        <tr>
            <td><?= $payment['order_id'] ?></td>
            <td><?= $payment['nama_lengkap'] ?></td>
            <td><?= $payment['email'] ?></td>
            <td><?= $payment['package'] ?></td>
            <td><?= $payment['amount'] ?></td>
            <td><?= $payment['payment_type'] ?></td>
            <td><?= $payment['payment_date'] ?></td>
        </tr>
        <?php endforeach;?>
        <tbody>
    </table>
</div>
            </div>
            <div id="artikel" class="content-section">
                <h1>Artikel Content</h1>
            </div>
            <div id="rating" class="content-section">
                <h2>Table Rating</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($rating as $rating): ?>
        <tr>
            <td><?= $rating['name'] ?></td>
            <td><?= $rating['email'] ?></td>
            <td><?= $rating['rate'] ?></td>
            <td><?= $rating['message'] ?></td>
        </tr>
        <?php endforeach;?>
        <tbody>
    </table>
</div>
            </div>
            <div id="contactus" class="content-section">
                <h2>Table Contact Us</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($contact as $contact): ?>
        <tr>
            <td><?= $contact['name'] ?></td>
            <td><?= $contact['phone'] ?></td>
            <td><?= $contact['email'] ?></td>
            <td><?= $contact['message'] ?></td>
        </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>
            </div>
        </div>
    </section>
    <!-- CONTENT -->

    <script src="../js/admin.js"></script>
</body>
</html>
