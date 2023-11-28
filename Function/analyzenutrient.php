<?php
include_once "acces.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $showNutritionalData = false;
        $totalCalories = 0; // Inisialisasi total kalori
        $totalFat = 0; // Inisialisasi total lemak
        $totalProtein = 0; // Inisialisasi total protein
                
        if (isset($_GET["ingredients"])) {
            $ingr = $_GET["ingredients"];
            $ingredientsArray = explode("\n", $ingr);;
            $appid = "4082c5e0";
            $appkey = "404181e2ca23be658f1523847938a4fb";
                
            foreach ($ingredientsArray as $ingredient) {
                $apiUrl = "https://api.edamam.com/api/nutrition-data?app_id=$appid&app_key=$appkey&ingr=" . urlencode($ingredient);
                
                $response = file_get_contents($apiUrl);
                
                if ($response === FALSE) {
                    echo "Gagal mengambil data dari API Edamam untuk bahan: " . $ingredient . "<br>";
                } else {
                    $dataNutrisi = json_decode($response);
                    
                    $totalCalories += $dataNutrisi->totalNutrients->ENERC_KCAL->quantity;
                    $totalFat += $dataNutrisi->totalNutrients->FAT->quantity;
                    $totalSaturatedFat += $dataNutrisi->totalNutrients->FASAT->quantity;
                    $totalFiber += $dataNutrisi->totalNutrients->FIBTG->quantity;
                    $totalCarbohydrates += $dataNutrisi->totalNutrients->CHOCDF->quantity;
                    $totalProtein += $dataNutrisi->totalNutrients->PROCNT->quantity;
                    $totalVitaminA += $dataNutrisi->totalNutrients->VITA_RAE->quantity;        
                    $showNutritionalData = true;
                
                    }
                    
                }

            session_start();

            $_SESSION['namaBahan'] = $ingredientsArray;        
            $_SESSION['totalCalories'] = $totalCalories;
            $_SESSION['totalFat'] = $totalFat;
            $_SESSION['totalSaturatedFat'] = $totalSaturatedFat;
            $_SESSION['totalFiber'] = $totalFiber;
            $_SESSION['totalCarbohydrates'] = $totalCarbohydrates;
            $_SESSION['totalProtein'] = $totalProtein;
            $_SESSION['totalVitaminA'] = $totalVitaminA;
            $_SESSION['dataNutrisi'] = $showNutritionalData;

            echo "Total Calories: " . number_format($totalCalories, 0, '.', '') . " kcal<br>";
            echo "Total Fat: " . number_format($totalFat, 2, '.', '') . " g<br>";
            echo "Total Saturated Fat: " . number_format($totalSaturatedFat, 2, '.', '') . " g<br>";
            echo "Total Fiber: " . number_format($totalFiber, 2, '.', '') . " g<br>";
            echo "Total Carbohydrates: " . number_format($totalCarbohydrates, 2, '.', '') . " g<br>";
            echo "Total Protein: " . number_format($totalProtein, 2, '.', '') . " g<br>";
            echo "Total Vitamin A: " . number_format($totalVitaminA, 2, '.', '') . " µg<br>";
            header("Location: ../kalkulator");
        }
    }
    exit();
?>