<?php
    $accesFilePath = __DIR__ . '/../Function/acces.php';
    
    // Include file acces.php
    include $accesFilePath;
    $username = $_SESSION['username'];
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/cariUsernamePengguna?username='.$username,

        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);

    $userPremium = json_decode($response);

    curl_close($cUrl);
?>