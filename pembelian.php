<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pembelian</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/310ccd6629.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
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
    <body class="bg-black text-white">
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index_user.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.svg" alt="Logo FastPlanner">
                <h1>FastPlanner</h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                <li><a href="index">Home</a></li>
                <li><a href="schedule_user">Schedule</a></li>
                <li><a href="menu_user">Menu</a></li>
                <li><a href="Pembelian">Pembelian</i></a></li>
                <li><a href="profile_user">Profile</a></li>
                </ul>
            </nav><!-- .navbar -->
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
        </header>
          <div class="container">
            <h1 class="h3 py-4 mt-2 mb-2">Keranjang</h1>
            <div class="row">
                <div class="col-sm-8 mb-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <table class="table table-borderless table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Info Barang</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="35px">1</td>
                                        <td><div class="row">
                                                <div class="col-sm-3 d-flex justify-content-center">
                                                    <img src="https://dummyimage.com/100x100" height="75" alt="">
                                                </div>
                                                <div class="col-sm-9">
                                                    <h6>Intel Core i3 12100 4Core 8Thread</h6>
                                                    <div>Processor</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="80px">
                                            <input type="number" class="form-control form-control-sm" value="1">
                                        </td>
                                        <td>
                                            Rp 1,299.000 ;-
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35px">2</td>
                                        <td><div class="row">
                                                <div class="col-sm-3 d-flex justify-content-center">
                                                    <img src="https://dummyimage.com/100x100" height="75" alt="">
                                                </div>
                                                <div class="col-sm-9">
                                                    <h6>Intel Core i5 12400 6Core 12Thread</h6>
                                                    <div>Processor</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="80px">
                                            <input type="number" class="form-control form-control-sm" value="1">
                                        </td>
                                        <td>
                                            Rp 2,899.000 ;-
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mb-4 bg-dark text-white">
                        <div class="card-body">
                            <h3 class="py-2 mb-2 px-2">Total :</h3>
                            <h4 class="mb-4 px-2">Rp 4,199.000 ;-</h4>
                            <hr>
                            <div class="d-grid gap-2">
                                <a href="checkout.html" class="btn btn-danger d-grid">Bayar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="py-2 mb-2 px-2 text-center">+62 851 XXXX XXXX</h5>
                            <hr>
                            Hubungi contact berikut untuk informasi terkait pengiriman atau pembayaran.
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="bg-black boder-black ">
            <div class="container py-4">
                <div class="row">
                    <footer class="py-3 my-4">
                        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
                          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Features</a></li>
                          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                          <li class="nav-item"><a href="#" class="nav-link px-2 text-white">About</a></li>
                        </ul>
                        <p class="text-center text-muted">© 2022 Company, Inc</p>
                      </footer>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
        </body>
    </html>