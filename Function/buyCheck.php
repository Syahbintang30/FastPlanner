<?php
include_once "acces.php";
$selectedProductID = $_GET['id'];
$username = $_SESSION['username'];
$_SESSION['id_produk'] = $selectedProductID;
$cUrl = curl_init();

$options = [
    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/cariUsernamePengguna?username='.$username,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true,
];

curl_setopt_array($cUrl,$options);

$response = curl_exec($cUrl);

$data = json_decode($response);
$status_plan = $data->status_plan;

if ($status_plan == 0) {
    // header('Location: ../konfirmasi');
    header('Location: getPlanByID');
} else if( $status_plan == 1) {
    // User is in an active period, display an alert message
    echo '<script>alert("Tunggu sampai admin mengkonfirmasi pembayaranmu");window.location.href = "../premium";</script>';
    
}else if( $status_plan == 2) {
    // User is in an active period, display an alert message
    echo '<script>alert("Anda sedang dalam masa aktif plan");window.location.href = "../premium";</script>';
    
}
exit();
?>
