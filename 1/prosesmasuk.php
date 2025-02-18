<?php
include("conn.php");
date_default_timezone_set('Asia/Jakarta');

function getHari() {
    return date('w');
}

if (getHari() == 6 || getHari() == 0) {
    echo "<script>
            alert('Tidak dapat melakukan absensi pada hari Sabtu dan Minggu.');
            document.location.href = 'formabsen.php';
          </script>";
    exit();
}

if (isset($_POST['daftar'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $tanggal = date('Y-m-d');
    $time = date('H:i:s');

    // Get the current day of the week
    $hari = date('l'); // Get the current day in English
    $jam_sql = "SELECT jam_masuk FROM master_jadwal WHERE hari = '$hari'";
    $jam_result = mysqli_query($conn, $jam_sql);
    $jam_row = mysqli_fetch_assoc($jam_result);
    $jam_masuk = $jam_row ? $jam_row['jam_masuk'] : '07:00'; // Default jam masuk

    // Check if the student is late
    if (strtotime($time) > strtotime($jam_masuk)) {
        $status = 'Terlambat';
    } else {
        $status = 'Tepat Waktu';
    }

    // Validasi input (contoh sederhana)
    if (empty($nama) || empty($kelas) || empty($jurusan) || empty($mapel) || empty($keterangan) || empty($_FILES["foto"]["name"])) {
        echo "<script>alert('Semua field harus diisi.'); history.back();</script>";
        exit();
    }

    // Validasi file foto
    $foto = $_FILES["foto"]["name"];
    $tmp_foto = $_FILES["foto"]["tmp_name"];
    $ukuran_foto = $_FILES["foto"]["size"];
    $tipe_foto = $_FILES["foto"]["type"];

    if ($ukuran_foto > 2 * 1024 * 1024) { // 2MB
        echo "<script>alert('Ukuran foto terlalu besar (maksimal 2MB).'); history.back();</script>";
        exit();
    }

    $allowed_types = array("image/jpeg", "image/png", "image/gif");
    if (!in_array($tipe_foto, $allowed_types)) {
        echo "<script>alert('Tipe file foto tidak valid. (jpg, png, gif).'); history.back();</script>";
        exit();
    }

    try {
        // Upload foto
        if (!move_uploaded_file($tmp_foto, "images/" . $foto)) {
            throw new Exception("Gagal mengunggah foto.");
        }

        $sql = "INSERT INTO tb_absen (nama, kelas, jurusan, mapel, tanggal, time, foto, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssssss", $nama, $kelas, $jurusan, $mapel, $tanggal, $time, $foto, $keterangan);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                header('Location: listmasuk.php');
                exit();
            } else {
                echo "<script>alert('Gagal menyimpan data. Silakan coba lagi.'); history.back();</script>";
                exit();
            }

            $stmt->close();
        } else {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
    } catch (Exception $e) {
        echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "'); history.back();</script>";
        exit();
    }    

    $conn->close();
} else {
    die("Akses dilarang...");
}
?>