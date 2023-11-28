<?php

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/getAllTransaksi',
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);

    $dataPesanan = json_decode($response);
    curl_close($cUrl);
?>