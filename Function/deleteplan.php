
<?php
if(isset($_GET["planid"])){
    $planID = $_GET["planid"] ;
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/deletePlan?id='.$planID,
        CURLOPT_CUSTOMREQUEST => 'DELETE'
    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);
    
    curl_close($cUrl);

    if($response === false){
        echo '<script>alert("Gagal menghapus data");window.location.href = "../plan_admin";</script>';
    }
    else{
        header("Location:  ../plan_admin");
    }

}
exit();
    
?>