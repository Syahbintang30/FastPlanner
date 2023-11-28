<?php
    include_once "acces.php";
    $selectedProductID = $_GET['id'];
    $username = $_SESSION['username'];
    $_SESSION['id_produk'] = $selectedProductID;
    $namaProduk = $_GET['nama_produk'];
    $cUrl = curl_init();

    $options = [
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/cariUsernamePengguna?username='.$username,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
    ];

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);
    $status_pesanan = $data->status_pemesanan;

    if ($status_pesanan == 0) {
        // echo 'Boleh beli lanjut';
        // echo $namaProduk;
        // Lakukan penambahan ke collection transaksi Plan
        $cUrl = curl_init();

                $options = array(
                    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/tambahMakananKePesanan',
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => http_build_query(array(
                        'nama_produk' => $namaProduk,
                        'username' => $username,
                        'status_pemesanan' => 1,

                    ))
                );
                curl_setopt_array($cUrl, $options);

                $response = curl_exec($cUrl);
                if ($response == TRUE) {

                    // echo 'berhasil';
                   
                    $cUrl = curl_init();
            
                    $options = array(
                        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updateStatusPemesananPengguna',
                        CURLOPT_CUSTOMREQUEST => 'PUT',
                        CURLOPT_POSTFIELDS => http_build_query(array(
                            'username' => $username,
                            'status_pemesanan' => '1',
                            'nama_produk' => $namaProduk
                        ))
                    );
            
                    curl_setopt_array($cUrl, $options);
            
                    $response = curl_exec($cUrl);
                }

                header('Location: ../menu');
    } else if( $status_pesanan == 1) {
        // User is in an active period, display an alert message
        echo '<script>alert("Kamu belum mengkonfirmasi pesananmu");window.location.href = "../menu";</script>';
        
    }else if( $status_pesanan == 2) {
        // User is in an active period, display an alert message
        echo '<script>alert("Tunggu yaa pesanan sedang dibuat, periksa setiap saat keranjang anda");window.location.href = "../menu";</script>';
        
    }else if( $status_pesanan == 3) {
        // User is in an active period, display an alert message
        echo '<script>alert("Tunggu yaa pesanan sedang dikirim, periksa setiap saat keranjang anda");window.location.href = "../menu";</script>';
    }
    exit();

?>