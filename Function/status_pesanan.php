<?php
    // Pengecekan apakah $_SESSION['username'] memiliki nilai
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/cariUsernamePengguna?username='.$username,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        // Pengecekan apakah response berhasil diambil dan merupakan JSON yang valid
        if ($response !== false) {
            $dataUser = json_decode($response);

            // Pengecekan apakah properti status_pemesanan ada dalam dataUser
            $status_pesanan = isset($dataUser->status_pemesanan) ? $dataUser->status_pemesanan : null;

            // Tutup cURL
            curl_close($cUrl);
        } else {
            // Handle kesalahan saat mengambil data
            // Misalnya, tampilkan pesan atau lakukan tindakan yang sesuai
            $status_pesanan = null;
        }
    } else {
        // Jika $_SESSION['username'] tidak memiliki nilai, atur $status_pesanan menjadi null atau nilai default lainnya
        $status_pesanan = null;
    }
?>
