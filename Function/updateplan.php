<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan formulir dikirimkan menggunakan metode POST
    $planId = $_POST['id'];
    $waktu = $_POST["waktu"];
    $nama_plan = $_POST["nama_plan"];
    $hargaplan = $_POST["harga"];
    // Sekarang Anda dapat melakukan apa pun dengan nilai-nilai ini, seperti menyimpannya ke database atau mengirim email.
    
    
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updatePlan',
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'id'=> $planId,
            'nama_plan' => $nama_plan,
            'harga' => $hargaplan,
            'periode' => $waktu
        ))
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    if ($response == true) {
        header('Location: ../plan_admin');
    } else {
        // Tampilkan pesan kesalahan atau tetap di halaman saat ini
        echo '<script>alert("Gagal mengupdate Plan);window.location.href = "../plan_admin";</script>';
    }
}
exit();
?>
