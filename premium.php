<?php
include __DIR__  . DIRECTORY_SEPARATOR . 'Model/DataPlan.php';
include __DIR__ . DIRECTORY_SEPARATOR .'Function/acces.php';

$username = $_SESSION['username'];
?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="assets/img/logo.svg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
<!-- Start Header -->
    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index_user.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.svg" alt="Logo FastPlanner">
            <h1>FastPlanner</h1>
        </a>
        <nav id="navbar" class="navbar">
        <ul>
                <li><a href="index">Beranda</a></li>
                <li><a href="schedule_user">Puasa</a></li>
                <?php
                    include __DIR__  . DIRECTORY_SEPARATOR . 'Function/status_pesanan.php';
                    if ($status_pesanan == 1) {
                        echo '<li><a href="Menu" class="notification"><span class="notification-dot"></span>Menu</a></li>';
                    } else {
                        echo '<li><a href="Menu">Menu</a></li>';
                    }
                    ?>
                <li><a href="kalkulator">Kalkulator</i></a></li>
                <li><a href="profile_user" class="active">Profile</a></li>
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
<!-- End Header -->
    
  <!-- Profile -->
  <section class="sectionprofile">
    <div style="display: flex; align-items: center;">
        <h3 style="margin-left: 90px"><a href="profile_user.php" style="color: white;"><b>Profile</b></a></h3>
        <img src="assets/img/next.svg" style="margin-left: 10px; margin-bottom:8px;">
        <h3 style="margin-left: 10px"><b>Premium Plan</b></a></h3>
    </div>
    <div class="container position-relative">
    <div class="container text-center">
        <div class="boxp" style>
            <div class="row">
            <?php
                        if(!empty($dataPlan)) {
                        foreach ($dataPlan as $row):
                            if (!empty($row->nama_plan) && !empty($row->harga)&& !empty($row->periode)) {
                                $periode = $row->periode;
                                if ($periode == 1) {
                                    $infoplan = 'Mingguan';
                                } elseif ($periode == 2) {
                                    $infoplan = 'Bulanan';
                                } elseif ($periode == 3) {
                                    $infoplan = 'Tahunan';
                                } else {
                                    // Handle other cases if needed
                                    $infoplan = 'Periode Belum Ditentukan';
                                }
                        ?>
                <div class="col-md-4 col-xs-12">
                    <div class="boxpremium" style="border-radius: 15px; height: auto; padding: 20px; background-color: #2F2F2F;">
                        <img src="assets/img/premium.svg" style="size:10px; margin-bottom:20px;">
                        <h3 style="margin-bottom: 20px; font-size: 30px; color: white; font-weight: 1000;"><?= $infoplan ?></h3>
                        <h3 style="font-size:15px; color: white; font-weight:100px;"><?= $row->nama_plan ?></h3>
                        <h3 style="font-size:15px; color: white; font-weight:100px;"><?= $row->harga ?></h3>
                        <a href="Function/buyCheck?id=<?= $row->_id ?>" class="btn btn-primary mt-3" style="border-radius: 15px; background-color: #FF8700; width: 100px; text-align:center;" style="color: white;">Beli</a>
                    </div>
                </div>
                <?php
                         } else {
                            // Handle the case where the required data is missing in the current row
                            echo '<div class="alert alert-warning">Data tidak lengkap untuk row ini. Mohon Periksa database anda</div>';
                        }
                        endforeach;
                    } else {
                        echo'<div class="card card bg-2F text-light mb-3 px-5 py-5 radius-15">
                                <h2> Data tidak tersedia, mohon tambahkan data terlebih dahulu</h2>
                            </div>';
                    }
                        ?>
            </div>
        </div>
    </div>
    </section>
      <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.svg" alt="Logo FastPlanner">
                <span>FastPlanner</span>
            </a>
            <p>FastPlanner memberikan Anda solusi kesempurnaan diet dalam genggaman Anda. Dengan banyak fitur luar biasa, Anda akan merasakan perbedaannya sejak hari pertama.</p>
            <div class="social-links d-flex mt-4">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Schedule</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
                A108 Adam Street <br>
                New York, NY 535022<br>
                United States <br><br>
                <strong>Phone:</strong> +62-212-3102-0023<br>
                <strong>Email:</strong> fastplanner@gmail.com<br>
            </p>

            </div>
        
        </div>
        </div>

        <div class="container mt-4">
        <div class="copyright">
            &copy; 2023 <strong><span>- W COMPANY</span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
            All Rights Reserved powered by FastPlanner.com
        </div>
        </div>

    </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>