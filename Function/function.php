<?php
function api_connect($url, $method, $data = [])
{
    $curl = curl_init();

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_RETURNTRANSFER => true,
    ];

    if ($method === 'POST' && !empty($data)) {
        $options[CURLOPT_POSTFIELDS] = http_build_query($data);
    }

    curl_setopt_array($curl, $options);

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response);
}
?>
