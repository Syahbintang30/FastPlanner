<?php
require_once "function.php";

session_start();

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $response = api_connect(
        $url = "https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/samakanPengguna?username=$username",
        $method = 'GET',
    );

    $userRole = $response->role;
    $_SESSION['hakmasuk'] = $userRole;

    if($response && password_verify($password, $response->password)){
        $_SESSION['username'] = $username;
        if($userRole == 1){           
            header('Location: ../admin');
        }else if($userRole == 2){
            header('Location: ../admin');
        }else{
            header('Location: ../index');
        }
    }
    else {
        echo "<script>
                alert('Username atau password salah');
                window.location.href = '../login';
            </script>";
    }
}

?>