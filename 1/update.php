<?php
include("conn.php");

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$mapel = $_POST['mapel'];
$tanggal = $_POST['tanggal'];
$time = $_POST['time'];

// Update data siswa di database
$sql = "UPDATE tb_absen SET nama='$nama', kelas='$kelas', jurusan='$jurusan', mapel='$mapel', tanggal='$tanggal', time='$time' WHERE id=$id";
$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: listmasuk.php?status=success");
} else {
    header("Location: listmasuk.php?status=error");
}
?>