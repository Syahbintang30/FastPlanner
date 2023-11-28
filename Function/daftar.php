<?php
// Cek apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari setiap input menggunakan $_POST
    $namaLengkap = $_POST["namaLengkap"];
    $usia = $_POST["usia"];
    $gender = $_POST["gender"];
    $beratBadan = $_POST["beratBadan"];
    $tinggiBadan = $_POST["tinggiBadan"];
    $username = $_POST["username"];
    $nomorTelepon = $_POST["nomorTelepon"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Pengecekan jika ada isian yang kosong
    if (empty($namaLengkap) || empty($usia) || empty($gender) || empty($beratBadan) || empty($tinggiBadan) ||
        empty($username) || empty($nomorTelepon) || empty($email) || empty($password)) {
        echo '<script>alert("Tidak boleh ada data yang kosong");window.location.href = "../registrasi";</script>';
        exit; // Menghentikan eksekusi skrip jika ada isian yang kosong
    }

    // Sekarang Anda dapat melakukan apa pun dengan nilai-nilai ini, seperti menyimpannya ke database atau mengirim email.
    
    $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-hckdc/endpoint/tambahPengguna';
    $customrequest = 'POST';
    
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'nama' => $namaLengkap,
            'usia' => $usia,
            'jenis_kelamin' => $gender,
            'berat_badan' => $beratBadan,
            'tinggi_badan' => $tinggiBadan,
            'username' => $username,
            'telepon' => $nomorTelepon,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ))
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    // Tutup cURL
    curl_close($cUrl);

    if ($response === true) {
        $_SESSION['username'] = $username;
        header('Location: ../index');
    } else {
        // Tampilkan pesan kesalahan atau tetap di halaman saat ini
        echo '<script>alert("Ada kesalahan, mohon coba lagi");window.location.href = "../registrasi";</script>';
    }
}
exit();

?>
