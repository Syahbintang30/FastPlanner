<?php
    session_start();
    unset($_SESSION['startTimestamp']);
    unset($_SESSION['duration']);
    $username = $_SESSION['username'];
    $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updatePuasaPengguna';
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'username' => $username,
                'waktu_mulai' => 1,
                'durasi_puasa' => 1

            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);
    header('Location: ../schedule_user');
    exit();

?>