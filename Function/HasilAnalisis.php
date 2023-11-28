<?php
include_once "acces.php";   

// Inisialisasi variabel dengan nilai default 0
$totalCalories = 0;
$totalFat = 0;
$totalSaturatedFat = 0;
$totalFiber = 0;
$totalCarbohydrates = 0;
$totalProtein = 0;
$totalVitaminA = 0;
$showNutritionalData = false;

// Cek dan isi variabel jika session tidak kosong
if (isset($_SESSION['totalCalories'])) {
    $totalCalories += $_SESSION['totalCalories'];
}

if (isset($_SESSION['totalFat'])) {
    $totalFat += $_SESSION['totalFat'];
}

if (isset($_SESSION['totalSaturatedFat'])) {
    $totalSaturatedFat += $_SESSION['totalSaturatedFat'];
}

if (isset($_SESSION['totalFiber'])) {
    $totalFiber += $_SESSION['totalFiber'];
}

if (isset($_SESSION['totalCarbohydrates'])) {
    $totalCarbohydrates += $_SESSION['totalCarbohydrates'];
}

if (isset($_SESSION['totalProtein'])) {
    $totalProtein += $_SESSION['totalProtein'];
}

if (isset($_SESSION['totalVitaminA'])) {
    $totalVitaminA += $_SESSION['totalVitaminA'];
}

if (isset($_SESSION['dataNutrisi'])) {
    $showNutritionalData = $_SESSION['dataNutrisi'];
}
if (isset($_SESSION['namaBahan'])) {
    $ingredientsArray = $_SESSION['namaBahan'];
    $output = '';

    foreach ($ingredientsArray as $namabahan) {
        // Assuming you want to concatenate each element to $output
        $output .='<br> '. $namabahan;
    }
    

    // Rest of your code...
} else {
    // Handle the case where $_SESSION['namaBahan'] is not set
    $output = 'Ingredients array is not set in the session.';
}





?>
