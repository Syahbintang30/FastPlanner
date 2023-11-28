<?php
    $id = $_GET['id'];
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/nonaktifkanPlanPengguna',
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'id' => $id,
            'nama_plan' => '',
            'status_plan' => 0,
            'exp_date'=> 0,
        ))
    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    header('Location: ../data_userAktif');
    exit();

?>