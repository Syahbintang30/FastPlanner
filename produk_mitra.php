<?php
include __DIR__  . DIRECTORY_SEPARATOR . 'Model/DataFood.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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
  .rounded-image {
    border-radius: 5%;
  }
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
          <li><a href="admin">Home</a></li>
          <li><a href="produk_mitra">Produk</a></li>
          <li><a href="order_mitra">Transaksi</a></li>
          <li><a href="profile_mitra" class="active">Profile</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
  <!-- End Header -->

    
<!-- pengingat puasa -->
  <section id="pengingat" class="pengingat">
    <div class="container position-relative">
      <div class="container position-relative d-flex justify-content-end">
      <a href="addproduk" class="btn btn-primary">Tambah Produk</a>
    </div>

      <h2>Daftar Produk</h2>
    </div>
    <div class="container text-center">
      <div class="box">
        <!-- <h3 style="margin-top: 25px;">Pilih Jadwal Puasamu</h3> -->
        <div class="row">
            
          <?php foreach ($dataMakanan as $food): ?>
              <div class="col-md-4">
                <div class="pengingatbox">
                  <div class="portfolio-wrap">
                    <img src="assets/src/<?php echo $food->gambar ?>" class="img-fluid rounded-image" alt="">
                    <div class="portfolio-info">
                        <h4 style="text-align: left; margin-top: 10px"><a href="portfolio-details.html" title="More Details"><?php echo $food->nama_produk ?></a></h4>
                      <p style="text-align: left;"><?php echo $food->nama_mitra?></p>
                      <a href="addproduk?id=<?php echo $food->_id ?>" class="btn btn-warning">Ubah</a>
                      <a href="Function/hapusproduk?id=<?php echo $food->_id ?>" class="btn btn-danger"> Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
      </div>
    </div>
    
    <div class="col-md-4 w-100 m-auto text-center">
      <a href="#" class="btnbox" style="margin: auto;">Kalkulator Gizi</a>
    </div>
  </section>

  
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