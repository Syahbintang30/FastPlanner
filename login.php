<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FastPlanner</title>
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
    <main>
    <div class="container-mt-5">
        <div class="container-fluid">
            <div class="row" style="background-color: #101010; color: white;">

                <!-- Bagian Kiri -->
                <div class="col-md-2 d-flex align-items-center justify-content-start flex-column" style="margin: auto; margin-top: 80px;">
                    <div class="d-flex align-items-center">
                        <img src="assets/img/logo.svg" class="img-fluid" alt="">
                        <div style="color: white; font-size: 25px; font-style: italic; font-weight: 700; margin-left: 10px;">FastPlanner</div>
                    </div>
                    <h2 class="text-center" style="color: white; font-size: 23px; font-weight: 500; margin-top: 30px; margin-left: 40px; width: max-content;">Log Into Your Account</h2>
                    <form id="form_login" action="Function/login" method="POST">
                        <div class="form-outline form-white" style="width: 250px; margin-top: 40px; margin-left: 50px;">
                            <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username"/>
                        </div>
                        <div class="form-outline form-white" style="width: 250px; margin-top: 25px; margin-left: 50px;">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                        </div>  
                    </form>
                    <div class="d-flex justify-content-start align-items-center">
                        <div style="color: white; font-size: 15px; font-weight: 500; margin-top: 15px; margin-left: 40px; max-width: max-content; white-space: nowrap;">Don’t have an account? <a href="registrasi" style="color: white;"><b>Sign Up</b></a></div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" style="border-radius: 15px; background-color: #FF8700; width: 100px; margin-left: 45px;" form="form_login">Log In</button>
                    <div class="d-flex-1 justify-content-start align-items-center">
                        <div style="color: white; font-size: 15px; font-weight: 500; margin-left: 40px; max-width: max-content; white-space: nowrap;">Are u admin? <a href="" style="color: white;"><b>Sign Up</a></b></div>
                    </div>
                </div>
                
                <!-- Bagian Kanan -->
                <div class="col-md-8" style="background-color: #282828; color: white; margin-left: auto;">
                    <div class="global-container">
                    <div style="width: 100%; height: 100%; position: relative;">
                        <div style="width: 317px; text-align: center; font-size: 32px; font-weight: 700;  margin: 80px 30px 0px;">Get ready with us</div>
                        <div style="width: 415px; font-size:  18px; font-weight: 400; line-height: 31.86px;  margin: 18px 50px 0px;">FastPlanner adalah aplikasi yang dirancang khusus untuk membantu individu menjalani pola makan dengan pendekatan Intermittent Fasting.</div>
                        <div style="margin-top: 60px;"><img src="assets/img/signin.svg" class="img-fluid" alt=""></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>
</html>