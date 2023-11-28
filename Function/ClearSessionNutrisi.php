<?php
include_once "acces.php";
unset($_SESSION['totalCalories']);
unset($_SESSION['totalFat']);
unset($_SESSION['totalSaturatedFat']);
unset($_SESSION['totalFiber']);
unset($_SESSION['totalCarbohydrates']);
unset($_SESSION['totalProtein']);
unset($_SESSION['totalVitaminA']);
unset($_SESSION['dataNutrisi']);

// Redirect ke halaman lain jika perlu
header("Location: ../kalkulator");
exit();
?>