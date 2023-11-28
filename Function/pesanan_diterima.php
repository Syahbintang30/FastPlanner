<?php
$pesenanID = $_GET['id'];

$username = $_GET['username'];
// echo  $pesenanID;
// echo $username;
// echo $nama_produk;
// echo $gambar;

$cUrl = curl_init();

$options = array(
    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updateStatusPemesananPengguna',
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => http_build_query(array(
        'username' => $username,
        'nama_produk' => '',
        'status_pemesanan' => 0,
        'gambar' => '',

    ))
);

curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

curl_close($cUrl);
if($response == TRUE){
    
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updateTransaksiProdukOlehPengguna',
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'username' => $username,
            'status_pemesanan' => 4,
    
        ))
        

    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);
    
    curl_close($cUrl);
}

// $filepath = 'file_bayar/'.$nmFiles;
// unlink($filepath);

header('Location: ../menu');
exit();
?>