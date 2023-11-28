<?php


$pesenanID = $_GET['id'];
$username = $_GET['username'];
$nama_produk= $_GET['nama_produk'];
$gambar= $_GET['gambar'];
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
        'nama_produk' => $nama_produk,
        'status_pemesanan' => 2,
        'gambar' => $gambar,

    ))
);

curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

curl_close($cUrl);
if($response == TRUE){
    
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updateTransaksiProduk',
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'id' => $pesenanID,
            'status_pemesanan' => 2,
    
        ))
        

    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);
    
    curl_close($cUrl);
}



header('Location: ../pesanan_mitra');
exit();
?>