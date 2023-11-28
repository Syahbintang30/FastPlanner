<?php
$nama_produk = $_POST['nama_produk'];
echo $nama_produk;
$nama_mitra = $_POST['nama_mitra'];
echo $nama_mitra;
$nmFiles = $_FILES['gambar']['name'];
echo $nmFiles;

if(isset($_POST["nama_produk"])){
    //ekstensi file yang diizinkan
    $acces = array('png','jpg','jpeg','pdf');
    $img = explode('.', $nmFiles);
    $ekstensi = strtolower(end($img));

    $ukuran = $_FILES['gambar']['size'];//mendapat ukuran file
    $file_tmp = $_FILES['gambar']['tmp_name'];//mendapat file sementara yang akan di upload

    //cek ektensi file
    if(in_array($ekstensi, $acces) === true ){
        echo "ekstensi sesuai";
        // cek ukuran file
        if ($ukuran < 1044070){
            echo "ukuran sesuai";
            // simpan gambar ke dalam folder file_bayar
            move_uploaded_file($file_tmp, '../assets/src/'.$nmFiles);
            $cUrl = curl_init();

            $options = array(
                CURLOPT_URL => 'https://ap-southeast-1.aws.data.mongodb-api.com/app/fastplanner-kozlx/endpoint/AddProdukMitra',
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'nama_produk' => $nama_produk,
                    'nama_mitra' => $nama_mitra,
                    'gambar' => $nmFiles,
                ))
            );

            curl_setopt_array($cUrl, $options);

            $response = curl_exec($cUrl);
            echo "terupload";
            header('Location: ../produk_mitra');
        } else {
            echo "<script>
                    alert('Ukuran file terlalu besar');
                    document.location = '../addproduk';
                </script>";
        }
    } else {
        //ekstensi file yang diupload tidak sesuai
        echo "<script>
                alert('Periksa kembali ekstensi file anda, max 1 mb');
                document.location = '../addproduk';
            </script>";
    }
}
?>
