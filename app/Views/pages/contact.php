<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<!-- Favicon -->
<link href="../img/logoMe.png" rel="icon">

<body>

    <div class="container">

        <h1 class="brand">
            <img src="../img/logoMe.png" alt="CurhatKuy Logo" class="logo">
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

            <!-- CONTACT FORM -->
            <div class="contact">
                <h3>CONTACT US</h3>

                <form id="contact-form" action="../contact/send" method="POST">

                    <p>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"  required>
                    </p>

                    <p>
                        <label for="company">Phone Number</label>
                        <input type="text" name="phone" id="phone">
                    </p>

                    <p>
                        <label for="email">E-mail Address</label>
                        <input type="email" name="email" id="email" required>
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
 