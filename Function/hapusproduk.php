
<?php
if(isset($_GET["id"])){
    $planID = $_GET["id"] ;
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://ap-southeast-1.aws.data.mongodb-api.com/app/fastplanner-kozlx/endpoint/DeleteProduk?id='.$planID,
        CURLOPT_CUSTOMREQUEST => 'DELETE'
    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);
    
    curl_close($cUrl);

    if($response === false){
        echo '<script>alert("Gagal menghapus data");window.location.href = "../plan_admin";</script>';
    }
    else{
        header("Location:  ../produk_mitra");
    }

}
exit();
    
?>