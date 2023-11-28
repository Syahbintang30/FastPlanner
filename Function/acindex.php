<?php
// Start the session
session_start();
 
if (isset($_SESSION['hakmasuk'])) {
    $userRole = $_SESSION['hakmasuk'];

    if ($userRole == 1 && $userRole ==2) {
        header('Location: ../admin');
        exit();
    } 
} else {
    header('Location: index');
    exit();
}
?>