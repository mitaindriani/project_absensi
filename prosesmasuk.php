<?php
include("conn.php");

if (isset($_POST['daftar'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $tanggal_waktu_string = $_POST['tanggal_waktu'];
    $dateTime = new DateTime($tanggal_waktu_string);
    $foto = $_FILES["foto"]["name"];
    $tmp_foto = $_FILES["foto"]["tmp_name"];
    move_uploaded_file($tmp_foto, "images/" . $foto);

    $hari = $dateTime->format('l');

    $check_sql = "SELECT jam_masuk FROM master_jadwal WHERE hari = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $hari);
    $stmt->execute();
    $check_result = $stmt->get_result();

    $jam_masuk = null;

    if ($check_result && $check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();
        $jam_masuk = DateTime::createFromFormat('H:i:s', $row['jam_masuk']);
        if ($jam_masuk) {
            $jam_masuk->setDate($dateTime->format('Y'), $dateTime->format('m'), $dateTime->format('d'));
        }
    }

    if ($hari == 'Saturday' || $hari == 'Sunday') {
        die("Tidak bisa absen pada hari libur.");
    }

    $status = 'tepat-waktu';

    if ($jam_masuk) {
        if ($dateTime > $jam_masuk) {
            $status = 'terlambat';
        }
    }

    $sql = "INSERT INTO tb_absen (nama, kelas, jurusan, tanggal_waktu, foto, keterangan, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nama, $kelas, $jurusan, $tanggal_waktu_string, $foto, $keterangan, $status);

    if ($stmt->execute()) {
        header('Location: listmasuk.php');
    } else {
        die("Gagal menyimpan perubahan: " . $stmt->error);
    }
} else {
    die("Akses dilarang...");
}
?>