<?php
include_once "acces.php";

// Mendapatkan ID produk dari sesi
$selectedProductID = $_SESSION['id_produk'];

// Menyimpan waktu saat ini
$currentTime = time();

// Mengecek apakah waktu sesi sudah diset atau tidak
if (!isset($_SESSION['session_start_time'])) {
    // Jika belum, set waktu sesi sekarang
    $_SESSION['session_start_time'] = $currentTime;
}

// Membandingkan waktu sekarang dengan waktu sesi
$elapsedTime = $currentTime - $_SESSION['session_start_time'];

// Jika waktu telah berlalu lebih dari 2 menit, kembalikan ke halaman premium
if ($elapsedTime > 120) {
    // Reset waktu sesi
    unset($_SESSION['session_start_time']);
    // Redirect ke halaman premium
    header("Location: ../premium");
    exit(); // Pastikan untuk menghentikan eksekusi script setelah melakukan redirect
}

// Melakukan pengambilan data dari MongoDB hanya jika waktu sesi masih valid
if ($elapsedTime <= 120) {
    $cUrl = curl_init();
    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/getPlanByID?id='.$selectedProductID,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($cUrl, $options);
    $response = curl_exec($cUrl);
    $BeliPlan = json_decode($response);
    curl_close($cUrl);
    $waktu = $BeliPlan[0]->periode;
    if ($waktu == 1) {
        $waktu = 'Seminggu';
    } else if ($waktu == 2) {
        $waktu = 'Sebulan';
    } else if ($waktu == 3) {
        $waktu = 'Setahun';
    } else {
        $waktu = 'Masa aktif plan belum ditentukan, silahkan hubungi +62 851 XXXX XXXX untuk konfirmasi';
    }

    // Lanjutkan dengan pemrosesan data atau tampilkan informasi produk
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Form Pembayaran</title>
  <style>
    body {
      background-color: #101010;
    }
  </style>
</head>
<body>

<div class="container mt-5">
    <div class="card-container mx-md-5 mx-sm-3 my-md-5">
        <div class="row">
            <!-- Kolom Informasi Plan -->
            <div class="col-md-8 my-md-2">
                <div class="card bg-dark text-white rounded-4">
                    <h2 class="ms-5 mt-5 text-danger">Informasi Plan</h2>
                    <div class="card-body ms-3 mb-5">
                        <h3 class="mx-3"><?php echo $BeliPlan[0]->nama_plan; ?></h3>
                        <p class="mx-3"><?php echo $waktu; ?></p>
                        <p class="mx-3">Harga: <?php echo $BeliPlan[0]->harga; ?> ;-</p>
                    </div>
                </div>
            </div>
            <!-- Kolom QRIS Pembayaran -->
            <div class="col-md-4 mt-2">
                <div class="card bg-dark text-white rounded-4">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div>
                            <h1 class="h3 py-3 my-1 text-danger">QRIS Pembayaran</h1>
                            <img class="img-fluid mx-auto d-block my-4" src="../assets/img/qris.png" alt="QR Code">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row untuk Countdown dan Form Pembayaran -->
        <div class="row mt-3">
            <!-- Kolom untuk Countdown dan Form Pembayaran -->
            <div class="col-md-12">
                <div class="card bg-dark text-white rounded-4">
                    <div class="card-body">
                        <!-- Countdown -->
                        <div class="countdown text-danger">
                            <?php
                            $remainingTime = max(0, 120 - $elapsedTime);
                            echo "Waktu tersisa: " . gmdate("i:s", $remainingTime);
                            ?>
                        </div>
                        <!-- Form Pembayaran -->
                        <form id="payment-proof-form" action="upload.php" method="post" enctype="multipart/form-data">
                            <label for="payment-proof">Upload Bukti Pembayaran:</label>
                            <input type="file" name="file" id="payment-proof" accept="">
                            <input type="text" name="nama_plan" value="<?= $BeliPlan[0]->nama_plan?> " hidden>
                            <input type="text" name="harga_plan" value="<?= $BeliPlan[0]->harga?> " hidden>
                            <input type="text" name="periode" value="<?= $BeliPlan[0]->periode?> " hidden>
                            <button type="submit" name="bukti_bayar" class="btn btn-primary mt-2">Submit Bukti Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function purchase() {
        alert("Pembelian berhasil!");
    }

    // Update countdown every second
    setInterval(updateCountdown, 1000);

    function updateCountdown() {
        const countdownElement = document.querySelector('.countdown');
        const remainingTime = <?php echo max(0, 120 - $elapsedTime); ?>;

        const minutes = Math.floor(remainingTime / 60);
        const seconds = remainingTime % 60;

        countdownElement.textContent = `Waktu tersisa: ${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }
</script>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
