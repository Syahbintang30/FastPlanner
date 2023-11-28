<?php
$cUrl = curl_init();
$url1 = "https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/cariSemuaMakanan";
$url2 ="https://ap-southeast-1.aws.data.mongodb-api.com/app/fastplanner-kozlx/endpoint/GetAllProduk";
$options = array(
    CURLOPT_URL => $url2,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true
);

curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

$dataMakanan = json_decode($response);
// var_dump($data);


curl_close($cUrl);
?>