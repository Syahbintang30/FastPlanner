<?php
include __DIR__ . DIRECTORY_SEPARATOR .'Model/dataUser.php';
// Check if the properties exist in $dataUser
if (!isset($_SESSION['username'])) {
  // If no username session, redirect to login
  header('Location: login');
  exit();
}

// Check if dataUser has valid values
if ($dataUser->durasi_puasa != 1) {
  // Save values to session
  $_SESSION['duration'] = $_POST['duration'];
  $_SESSION['startTimestamp'] = $dataUser->waktu_mulai;

  // Redirect to the schedule_aktif page
  header('Location: schedule_aktif');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
      <a href="index" class="logo d-flex align-items-center">
          <img src="assets/img/logo.svg" alt="Logo FastPlanner">
          <h1>FastPlanner</h1>
      </a>
      <nav id="navbar" class="navbar">
          <ul>
              <li><a href="index">Beranda</a></li>
              <li><a href="schedule_user" class="active">Puasa</a></li>
              <?php
              include __DIR__  . DIRECTORY_SEPARATOR . 'Function/status_pesanan.php';
              if ($status_pesanan == 1) {
                  echo '<li><a href="menu" class="notification"><span class="notification-dot"></span>Menu</a></li>';
              } else {
                  echo '<li><a href="menu" class="active">Menu</a></li>';
              }
              ?>
              <li><a href="kalkulator">Kalkulator</a></li>
              <li><a href="profile_user">Profile</a></li>
          </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

  </div>
</header>
  <!-- End Header -->

  <section id="pengingat" class="pengingat">
    <div class="container position-relative">
      <h2>Pengingat Jadwal Puasa</h2>
    </div>
    <div class="container text-center">
      <div class="box">
        <h3 style="margin-top: 25px;">Pilih Jadwal Puasamu</h3>
        <div class="row">
          <!-- First Column -->
          <div class="col-md-4">
            <form action="Function/schedule" method="POST" id="fastingForm1">
              <div class="pengingatbox">
                <h2><b>14-10</b></h2>
                <p>Anda akan berpuasa selama 14 jam dan waktu bebas makan selama 10 jam dalam sehari</p>
                <input type="hidden" name="duration" value="14">
                <button type="submit" class="btnbox">Mulai</button>
              </div>
            </form>
          </div>

          <!-- Second Column -->
          <div class="col-md-4">
            <form action="Function/schedule" method="POST" id="fastingForm2">
              <div class="pengingatbox">
                <h2><b>16-8</b></h2>
                <p>Anda akan berpuasa selama 16 jam dan waktu bebas makan selama 8 jam dalam sehari</p>
                <input type="number" name="duration" value="16" hidden>
                <button type="submit" class="btnbox">Mulai</button>
              </div>
            </form>
          </div>

          <!-- Third Column -->
          <div class="col-md-4">
            <form action="Function/schedule" method="POST" id="fastingForm3">
              <div class="pengingatbox">
                <h2><b>20-4</b></h2>
                <p>Anda akan berpuasa selama 20 jam dan waktu bebas makan selama4 jam dalam sehari</p>
                <input type="hidden" name="duration" value="20">
                <button type="submit" class="btnbox">Mulai</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
    
<!-- pengingat puasa -->
  <!-- <section id="pengingat" class="pengingat">
    <div class="container position-relative">
      <h2>Pengingat Jadwal Puasa</h2>
    </div>
    <div class="container text-center">
      <div class="box">
        <h3 style="margin-top: 25px;">Pilih Jadwal Puasamu</h3>
        <div class="row">
            <form action="process.php" method="post" id="fastingForm">
              <div class="col-md-4">
                <div class="pengingatbox">
                  <p><strong>14-10</strong>: Anda akan berpuasa selama 14 jam dan waktu bebas makan selama 10 jam dalam sehari</p>
                  <input type="hidden" name="schedule" value="1">
                  <button type="submit" class="btnbox">Mulai</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="pengingatbox">
                  <p><strong>14-10</strong>: Anda akan berpuasa selama 14 jam dan waktu bebas makan selama 10 jam dalam sehari</p>
                  <input type="hidden" name="schedule" value="1">
                  <button type="submit" class="btnbox">Mulai</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="pengingatbox">
                  <p><strong>14-10</strong>: Anda akan berpuasa selama 14 jam dan waktu bebas makan selama 10 jam dalam sehari</p>
                  <input type="hidden" name="schedule" value="1">
                  <button type="submit" class="btnbox">Mulai</button>
                </div>
              </div>

            </form>
          <div class="col-md-4">
            <div class="pengingatbox">
              <h2><b>16-8</b></h2>
              <p>Anda akan berpuasa selama 16 jam dan waktu bebas makan selama 8 jam dalam sehari.</p>
              <a href="#" class="btnbox">Mulai</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pengingatbox">
              <h2><b>20-4</b></h2>
              <p>Anda akan berpuasa selama 20 jam dan waktu bebas makan selama 4 jam dalam sehari</p>
              <a href="#" class="btnbox">Mulai</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- end pengingat puasa -->

    <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
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