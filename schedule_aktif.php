<?php

session_start();
date_default_timezone_set('Asia/Jakarta');
$startTimestamp = isset($_SESSION['startTimestamp']) ? $_SESSION['startTimestamp'] : null;
$duration = $_SESSION['duration'];
// if ($duration === null) {
//     header('Location: schedule_user');
// }
$endTimestamp = $startTimestamp + $duration * 3600;
// = isset($_SESSION['duration']) ? $_SESSION['duration'] : null;
if (isset($_SESSION['startTimestamp']) && isset($_SESSION['duration'])) {
    $startTimestamp = $_SESSION['startTimestamp'];
    $duration = $_SESSION['duration'];
    $endTimestamp = $startTimestamp + $duration * 3600;

    if (time() > $endTimestamp) {
        // Time is up, clear the schedule
        unset($_SESSION['startTimestamp']);
        unset($_SESSION['duration']);
        
        // Add code here to delete the row from your database
        // For example, you might use a function like deleteScheduleFromDatabase($_SESSION['user_id']);
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
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
        /* CSS untuk tampilan hitung mundur */
        body {
            background-color: black; /* Ganti latar belakang menjadi hitam */
            color: white; /* Ganti warna teks menjadi putih */
        }
        .alert-box{
            border-radius: 25px;
        }

        .countdown {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        .p {
            height: auto;
            width: auto;
            margin-top: 0;
            font-size: 32px;
            font-weight: 600;
        }

        /* Kotak untuk jam, menit, dan detik */
        .countdown-box {
            margin: 0 10px;
            padding: 40px;
            border-radius: 25px;
            width: 100px;
            text-align: center;
            background: linear-gradient(#222, #555);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #555;
        }

        /* Teks dalam kotak */
        .countdown-box span {
            font-size: 64px;
            font-weight: bold;
            color: white; /* Ganti warna teks dalam kotak countdown menjadi putih */
        }

        /* CSS untuk pesan "Anda akan mulai puasa pada..." */
        .start-message {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #FFA500; /* Ganti warna aksen menjadi oranye */
        }

        /* CSS untuk form */
        form {
            background-color: #444; /* Ganti warna latar form menjadi abu-abu lebih tua */
            border: 2px solid #555; /* Ganti warna border form menjadi abu-abu lebih tua */
            padding: 30px;
            border-radius: 30px; /* Ganti border-radius menjadi 30px */
        }

        .input-container {
            display: inline-block;
            width: 200px; /* Sesuaikan lebar sesuai kebutuhan */
            height: 40px; /* Sesuaikan tinggi sesuai kebutuhan */
            position: relative;
        }

        .input-container input {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }


        /* CSS untuk tombol "Mulai Puasa" */
        .btn-primary {
            padding: 15px;
            background-color: #FFA500; /* Ganti warna latar tombol menjadi oranye */
            border-color: #FFA500; /* Ganti warna border tombol menjadi oranye */
            border-radius: 15px; /* Ganti border-radius menjadi 30px */
        }

        .btn-secondary {
            padding: 15px;
            background-color: #9EB8D9; /* Ganti warna latar tombol menjadi oranye */
            border-color: #9EB8D9; /* Ganti warna border tombol menjadi oranye */
            border-radius: 15px; /* Ganti border-radius menjadi 30px */
        }

        .btn-primary:hover {
            background-color: #FF6347; /* Ganti warna latar tombol saat hover menjadi merah oranye */
            border-color: #FF6347; /* Ganti warna border tombol saat hover menjadi merah oranye */
            border-radius: 15px; /* Ganti border-radius saat hover menjadi 30px */
        }
        .navbar-toggler-icon {
            background-color: #FFA500; /* Ganti warna ikon toggler menjadi oranye */
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
                        echo '<li><a href="Menu" class="notification"><span class="notification-dot"></span>Menu</a></li>';
                    } else {
                        echo '<li><a href="Menu">Menu</a></li>';
                    }
                    ?>
                <li><a href="kalkulator">Kalkulator</i></a></li>
                <li><a href="profile_user">Profile</a></li>
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <!-- ... (your existing navbar code) -->
</nav>

<section>
    <div class="container mt-2">
        <h1 class="mb-4">Pengingat Puasa</h1>
        <form method="post" action="Function/schedule">
        <div class="mb-3">
            <label for="start-time" class="form-label">Mulai puasa pada:</label>
            <input type="datetime-local" class="form-control" name="start-time" id="start-time" style="background-color: black; color: white; border-radius: 15px; pointer-events: none;" value="<?php echo $startTimestamp ? date('Y-m-d\TH:i', $startTimestamp) : ''; ?>">
        </div>

            <div class="mb-3">
                <select class="form-select" name="duration" id="duration"  style="background-color: black;color: white;border-radius:15px;" hidden>
                    <option value="14" <?php echo ($duration == 14) ? 'selected' : ''; ?>>14 Jam</option>
                    <option value="16" <?php echo ($duration == 16) ? 'selected' : ''; ?>>16 Jam</option>
                    <option value="20" <?php echo ($duration == 20) ? 'selected' : ''; ?>>20 Jam</option>
                </select>
            </div>
            <div class="mb-3">
                <div class="countdown" id="countdown"></div>
                <div class="alert-box" id="alert-box"></div>
                <div class="start-message" id="start-message"></div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="start-button">Mulai Puasa</button>
                <a href="Function/clearSchedule" class="btn btn-secondary ms-3">Set Puasa Baru</a>
            </div>
        </form>
    </div>
    </section>
    <script>
        const startTimeInput = document.getElementById('start-time');
        const durationSelect = document.getElementById('duration');
        const countdownDisplay = document.getElementById('countdown');
        const startMessageDisplay = document.getElementById('start-message');
        const alertBox = document.getElementById('alert-box');
        if ('Notification' in window) {
            Notification.requestPermission().then(function(permission) {
                // Lakukan sesuatu berdasarkan izin (dapat menjadi console.log)
                console.log('Izin notifikasi diberikan:', permission);
            });
        }
        function updateStatus() {
            const duration = parseInt(durationSelect.value, 10);
            const startTimestamp = new Date(startTimeInput.value).getTime();
            const endTimestamp = startTimestamp + duration * 3600 * 1000;
            const currentTime = new Date().getTime();

            if (isNaN(startTimestamp)) {
                // Jika waktu belum dipilih
                startMessageDisplay.innerText = '';
                countdownDisplay.style.display = 'none';
                alertBox.innerHTML = '<div class="alert alert-warning" role="alert">Silahkan pilih waktu mulai terlebih dahulu.</div>';
                return;
            }

            if (currentTime < startTimestamp) {
                // Jika waktu belum dimulai
                const selectedTime = new Date(startTimestamp).toLocaleString();
                startMessageDisplay.innerText = `Anda akan mulai puasa pada waktu ${selectedTime}`;
                countdownDisplay.style.display = 'none';
                alertBox.innerHTML = ''; // Kosongkan pesan alert saat waktu belum dimulai
            } else {
                // Jika waktu telah dimulai
                const timeLeft = endTimestamp - currentTime;

                if (timeLeft <= 0) {
                    startMessageDisplay.style.display = 'none';
                    countdownDisplay.style.display = 'none';
                    // Menampilkan pesan puasa telah selesai
                    alertBox.innerHTML = `
                        <div class="alert alert-success">
                            Selamat puasa Anda selesai, silahkan makan.
                        </div>
                    `;

                    if (permission === 'granted') {
                    const notification = new Notification('Puasa Selesai', {
                        body: 'Selamat puasa Anda selesai, silahkan makan.',
                    });
                }
                
                } else {
                    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                    countdownDisplay.innerHTML = `
                        <div class="row mx-1">
                            <div class="col countdown-box mx-1 my-1">
                                <span>${hours}</span>
                                <div class="p">Jam</div>
                            </div>
                            <div class="col countdown-box mx-1 my-1">
                                <span>${minutes}</span>
                                <div class="p">Menit</div>
                            </div>
                            <div class="col countdown-box mx-1 my-1">
                                <span>${seconds}</span>
                                <div class="p">Detik</div>
                            </div>
                        </div>
                    `;
                    startMessageDisplay.style.display = 'none';
                    countdownDisplay.style.display = 'block';
                    alertBox.innerHTML = ''; // Kosongkan pesan alert saat waktu masih berjalan
                }
            }
        }

        // Panggil updateStatus() setiap detik
        setInterval(updateStatus, 1000);

        // Panggil updateStatus() saat halaman dimuat
        window.onload = function() {
            if (<?php echo isset($_SESSION['startTimestamp']) ? 'true' : 'false'; ?>) {
                updateStatus();
            }
        };
        
    </script>

</body>
</html>
