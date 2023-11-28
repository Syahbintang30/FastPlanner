<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan formulir dikirimkan menggunakan metode POST

    // Mengambil nilai dari elemen <select>
    $waktu = $_POST["waktu"];
    $nama_plan = $_POST["nama_plan"];
    $hargaplan = $_POST["harga"];
    // Sekarang Anda dapat melakukan apa pun dengan nilai-nilai ini, seperti menyimpannya ke database atau mengirim email.
    
    $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/tambahDataPlan';
    $customrequest = 'POST';
    
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'nama_plan' => $nama_plan,
            'harga' => $hargaplan,
            'periode' => $waktu
        ))
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    // Tutup cURL
    curl_close($cUrl);
    if ($response === true) {
        $_SESSION['username'] = $username;
        header('Location: ../plan_admin');
    } else {
        // Tampilkan pesan kesalahan atau tetap di halaman saat ini
        echo '<script>alert("Gagal menambahkan Plan);window.location.href = "../plan_admin";</script>';
    }
}
exit();
?>
