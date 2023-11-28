<?php
session_start();
$username = $_SESSION['username'];
 $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updateInfromasiDataDiriPengguna';
 $nama = $_POST['nama'];
 $usia = $_POST['usia'];
 $jenis_kelamin = $_POST['jenis_kelamin'];
 $berat_badan = $_POST['berat_badan'];
 $tinggiBadan = $_POST['tinggi_badan'];

 $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'username' => $username,
            'nama'=> $nama,
            'usia' => $usia,
            'jenis_kelamin' => $jenis_kelamin,
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggiBadan
        ))
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);
    header('Location: ../personal_user');
    exit();
 ?>