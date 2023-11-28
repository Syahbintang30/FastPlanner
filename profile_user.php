<?php
include __DIR__  . DIRECTORY_SEPARATOR . 'Model/UserPremium.php';
$status_plan = $userPremium->status_plan;
if($status_plan == 0){
    $status = "<b class ='text-warning'>Dietisien Biasa</b>";
} else if($status_plan == 1){
    $status = "<b class ='text-danger'>Menunggu Konfirmasi</b>";
} else if($status_plan == 2){
    $status = "<b class ='text-success'>Dietisien Pro</b>";
} else{
    $status = "";
}
$role = $_SESSION['hakmasuk'];
if ($role == 1){
    header('Location: profile admin');  
}else if ($role == 2){
    header('Location: profile_mitra');
}
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
    <style>
    /* Style for the notification dot */
        .notification-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: #FF6347; /* Change the background color as per your design */
            border-radius: 50%; /* Make it a circle */
            margin-right: 5px; /* Adjust the margin as needed */
        }
    </style>
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
        <h3 style="margin-left: 90px"><b>Profile</b></h3>

        <div class="container position-relative">
        <div class="container text-center">
            <div class="boxp" style>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="boxprofile">
                            <img src="assets/img/profile.svg" class="img-fluid rounded-4 my-5" alt="profile user">
                            <h3 class="my-4" style="font-size: 25px;"><b><?= $userPremium->nama ?></b></h3>
                            <p class="my-2" style="color: #898989;">Status : <?= $status ?></p>
                            <a href="Function/logout" class="btnp my-5"><img src="assets/img/logout.svg" style="float: right;">Logout</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="boxprofile" style="width: 100%;">
                            <h3 style="text-align: start; font-size: 20px;"><b>Pengaturan Utama</b></h3>
                            <a href="personal_user" class="btnpu" style="display: flex; align-items: center; margin-bottom: 10px;">
                                <img src="assets/img/iconp1.svg" style="float: left; margin-right: 5px;">
                                <span style="flex: 1; text-align: start;">Personal Data</span>
                                <img src="assets/img/next.svg" style="float: right; margin-left: 5px;">
                            </a>
                            <a href="akun_user" class="btnpu" style="display: flex; align-items: center; margin-bottom: 10px;">
                                <img src="assets/img/iconp.svg" style="float: left; margin-right: 5px;">
                                <span style="flex: 1; text-align: start;">Informasi Akun</span>
                                <img src="assets/img/next.svg" style="float: right; margin-left: 5px;">
                            </a>
                            <a href="premium" class="btnpu" style="display: flex; align-items: center; margin-bottom: 10px;">
                                <img src="assets/img/iconp2.svg" style="float: left; margin-right: 5px;">
                                <span style="flex: 1; text-align: start;">Premium Plan</span>
                                <img src="assets/img/next.svg" style="float: right; margin-left: 5px;">
                            </a>
                            <h3 style="text-align: start; font-size: 20px;"><b>Pengaturan Lainnya</b></h3>
                            <a href="notif_user" class="btnpu" style="display: flex; align-items: center; margin-bottom: 10px;">
                                <img src="assets/img/iconp3.svg" style="float: left; margin-right: 5px;">
                                <span style="flex: 1; text-align: start;">Notifikasi</span>
                                <img src="assets/img/next.svg" style="float: right; margin-left: 5px;">
                            </a>
                        </div>
                    </div>
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