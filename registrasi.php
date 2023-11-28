<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/regis.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Jadi Dietisien</title>
    <link href="assets/img/logo.svg" rel="icon">
</head>

<body style="background-color: #101010;">

<section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <form id="signup" action="Function/daftar" method="POST">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <h2 class="mb-5"><b>Informasi Umum</b></h2>

                                        <div class="row">
                                            <div class="mb-2 pb-2">
                                                <div class="form-outline">
                                                    <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                                                    <input type="text" id="namaLengkap" name="namaLengkap" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="usia">Usia</label>
                                                <input type="text" id="usia" name="usia" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="mb-2 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="gender">Gender</label>
                                                <input type="text" id="gender" name="gender" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="mb-2 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="beratBadan">Berat Badan</label>
                                                <input type="text" id="beratBadan" name="beratBadan" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="mb-2 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="tinggiBadan">Tinggi Badan</label>
                                                <input type="text" id="tinggiBadan" name="tinggiBadan" class="form-control" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6 bg-indigo text-white">
                                    <div class="p-5">
                                        <h2 class="mb-5">Akun Detail</h2>

                                        <div class="mb-2 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" id="username" name="username" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="mb-2 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="nomorTelepon">Nomor Telepon</label>
                                                <input type="text" id="nomorTelepon" name="nomorTelepon" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="mb-2 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="text" id="email" name="email" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="mb-5 pb-2">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="text" id="password" name="password" class="form-control" />
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-warning btn-lg" data-mdb-ripple-color="dark">Register</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
