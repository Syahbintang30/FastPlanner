<?php
$id = $_GET['id'];
echo $id;
$url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/selesaikanPesananProduk?id='.$id;
$cUrl = curl_init();

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_CUSTOMREQUEST => 'DELETE'
);
curl_setopt_array($cUrl,$options);

$response = curl_exec($cUrl);
        
curl_close($cUrl);
$filepath = 'file_bayar/'.$nmFiles;
unlink($filepath);

header('Location: ../pesanan_mitra');
exit();
?>