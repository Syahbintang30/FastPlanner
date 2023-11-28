<?php
include_once "acces.php";

$transaksiID = $_GET['id'];
$cUrl = curl_init();

$options = array(
    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/ambillTransaksiByID?id=' . $transaksiID,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true
);

curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$data = json_decode($response);

curl_close($cUrl);
$nmFiles = $data[0]->bukti_pembayaran;
$periode = $data[0]->periode;
$username = $data[0]->username;
$nama_plan = $data[0]->nama_plan;
if ($response == TRUE) {
    // Inisialisasi tanggal kedaluwarsa
    
    $expiredDate = date('Y-m-d', strtotime('+1 week')); // Default to 1 week

    if ($periode == 2) {
        $expiredDate = date('Y-m-d', strtotime('+1 month'));
    } elseif ($periode == 3) {
        $expiredDate = date('Y-m-d', strtotime('+1 year'));
    }
} echo $expiredDate;

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/aktivasiPlanPengguna',
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'username' => $username,
            'nama_plan' => $nama_plan,
            'status_plan' => 2,
            'exp_date' => 'Masa Aktif Sampai '.$expiredDate.'',

        ))
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);
    if($response == TRUE){
        
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/hapusTransaksi?id='.$transaksiID,
            CURLOPT_CUSTOMREQUEST => 'DELETE'
        );

        curl_setopt_array($cUrl,$options);

        $response = curl_exec($cUrl);
        
        curl_close($cUrl);
    }

    $filepath = 'file_bayar/'.$nmFiles;
    unlink($filepath);

    header('Location: ../order_admin');
    exit();

    // Sekarang $expiredDate berisi tanggal kedaluwarsa berdasarkan periode

?>
