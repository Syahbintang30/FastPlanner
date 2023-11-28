<?php
    $accesFilePath = __DIR__ . '/../Model/UserPremium.php';
    include $accesFilePath;

    if($userPremium->status_plan == 2){

    }else{
        echo "<script>
        alert('Silahkan beli plan premium terlebih dahulu');
        document.location = '../latweb/premium';
    </script>";
    }
?>
