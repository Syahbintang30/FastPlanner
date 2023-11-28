<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);

$startTimestamp = null;
$duration = $_POST['duration'];
$_SESSION['duration'] = $duration;
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['start-button'])) {
        $startTimestamp = strtotime($_POST['start-time']);
        $duration = $_POST['duration']; // Set $duration when form is submitted

        $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/updatePuasaPengguna';
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'username' => $username,
                'waktu_mulai' => $startTimestamp,
                'durasi_puasa' => $duration

            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
        session_start();
        $_SESSION['startTimestamp'] = $startTimestamp;
        
    } else {
        session_start();
        if (isset($_SESSION['startTimestamp']) && isset($_SESSION['duration'])) {
            $startTimestamp = $_SESSION['startTimestamp'];
            $duration = $_SESSION['duration']; // Set $duration when loading from session
        }
    }
}
if (isset($_SESSION['startTimestamp']) && isset($_SESSION['duration'])) {
    $startTimestamp = $_SESSION['startTimestamp'];
    $duration = $_SESSION['duration'];
    $endTimestamp = $startTimestamp + $duration * 3600;

    if (time() > $endTimestamp) {
        // Time is up, clear the schedule
        unset($_SESSION['startTimestamp']);
        unset($_SESSION['duration']);
        
        // Add code here to delete the row from your database
        // For example, you might use a function like deleteScheduleFromDatabase($_SESSION['user_id']);
    }
}

$endTimestamp = $startTimestamp + $duration * 3600;
echo time();
echo "::::";
echo $endTimestamp;
header('Location: ../schedule_aktif')
?>
