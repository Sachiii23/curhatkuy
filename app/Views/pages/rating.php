<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>
    <link rel="stylesheet" href="../css/styleRating.css">
</head>

<!-- Favicon -->
<link href="../img/logoMe.png" rel="icon">

<body>

    <div class="container">

        <h1 class="brand">
            <img src="../img/curhatkuy_logo_new.png" alt="CurhatKuy Logo" class="logo">
            <span>Curhat Kuy</span>
        </h1>

        <div class="wrapper">

            <!-- COMPANY INFORMATION -->
            <div class="company-info">
                <h3>Curhat Kuy</h3>

                <ul>
                    <li><i class="fa fa-road"></i> Meruya, Jakarta Barat</li>
                    <li><i class="fa fa-phone"></i> (+62) 81398205635</li>
                    <li><i class="fa fa-envelope"></i> CurhatKuy@gmail.com</li>
                </ul>
            </div>

            <!-- End .company-info -->

            <!-- Rating FORM -->
            <div class="contact">
                <h3>Rating</h3>

                <form id="contact-form" action="../rating/send" method="POST">
                    <p>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?= session()->get('nama_lengkap') ?>" required>
                    </p>    
                    <p>
                      <label for="email">E-mail Address</label>
                      <input type="email" name="email" id="email" <?= session()->get('email') ?> required>
                    </p>
                    <p>
                        <label for="company">Rating (1-5)</label>
                        <input type="text" name="rate" id="rate">
                    </p>
                    <p class="full">
                        <label for="message">Message</label>
                        <textarea name="message" rows="5" id="message"></textarea>
                    </p>
                    <p class="full">
                        <button type="submit">Submit</button>
                    </p>
                </form>
                <!-- End #contact-form -->
            </div>
            <!-- End .contact -->

        </div>
        <!-- End .wrapper -->
    </div>
    <!-- End .container -->

</body>

</html>
 