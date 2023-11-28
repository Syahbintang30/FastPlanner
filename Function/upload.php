<?php
include_once "acces.php";
    $namaplan = $_POST["nama_plan"];
    $masaaktif = $_POST["periode"];
    $hargaplan = $_POST["harga_plan"];
    $username = $_SESSION["username"];

    if(isset($_POST["bukti_bayar"])){
        //ekstensi file yang diizinkan
        $acces = array('png','jpg','jpeg','pdf');
        $nmFiles = $_FILES['file']['name'];
        $img = explode('.', $nmFiles);
        $ekstensi = strtolower(end($img));

        $ukuran = $_FILES['file']['size'];//mendapat ukuran file
        $file_tmp = $_FILES['file']['tmp_name'];//mendapat file sementara yang akan di upload


        //cek ektensi file
        if(in_array($ekstensi, $acces) === true ){
            // cek ukuran file
            if ($ukuran < 1044070){
                // simpan gambar ke dalam folder file_bayar
                move_uploaded_file($file_tmp, 'file_bayar/'.$nmFiles);
                $cUrl = curl_init();

                $options = array(
                    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/addPlan',
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => http_build_query(array(
                        'nama_plan' => $namaplan,
                        'username' => $username,
                        'bukti_pembayaran' => $nmFiles,
                        'periode' => $masaaktif

                    ))
                );
                curl_setopt_array($cUrl, $options);

                $response = curl_exec($cUrl);
                if ($response == TRUE) {

                    // echo 'berhasil';
                   
                    $cUrl = curl_init();
            
                    $options = array(
                        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/uppdateStatusPlanPengguna',
                        CURLOPT_CUSTOMREQUEST => 'PUT',
                        CURLOPT_POSTFIELDS => http_build_query(array(
                            'username' => $username,
                            'status_plan' => '1'
                        ))
                    );
            
                    curl_setopt_array($cUrl, $options);
            
                    $response = curl_exec($cUrl);
                }

                header('Location: ../profile_user');
            } else{
                echo "<script>
                        alert('Ukuran file terlalu besar');
                        document.location = 'getPlanByID';
                    </script>";
            }
        } else {
            //ekstensi file yang diupload tidak sesuai
            echo "<script>
                    alert('Periksa kembali ekstensi file anda, max 1 mb');
                    document.location = 'getPlanByID';
                </script>";
        }

    }
?>