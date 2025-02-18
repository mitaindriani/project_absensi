<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $days = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");

    foreach ($days as $day) {
        $masuk_key = strtolower($day) . "_masuk";
        $pulang_key = strtolower($day) . "_pulang";

        $jam_masuk = isset($_POST[$masuk_key]) ? $_POST[$masuk_key] : null;
        $jam_pulang = isset($_POST[$pulang_key]) ? $_POST[$pulang_key] : null;

        $sql = "INSERT INTO master_jadwal (hari, jam_masuk, jam_pulang) 
                VALUES ('$day', '$jam_masuk', '$jam_pulang')
                ON DUPLICATE KEY UPDATE jam_masuk = '$jam_masuk', jam_pulang = '$jam_pulang'";
        mysqli_query($conn, $sql);
    }

    header("Location: setting_jam_kerja.php"); // Redirect kembali ke halaman setting
    exit();
} else {
    header("Location: setting_jam_kerja.php"); // Redirect jika akses langsung
    exit();
}
?>