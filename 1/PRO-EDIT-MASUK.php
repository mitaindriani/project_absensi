<?php
include("conn.php");

// Ambil data dari form
$id = $_POST['id'];
$id_guru = $_POST['id_guru'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$time = $_POST['time'];

// Update data siswa di database
$sql = "UPDATE tb_guru SET id='$id', id_guru='$id_guru', nama='$nama', tanggal='$tanggal', time='$time' WHERE id=$id";
$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: LIST-M-GURU.php?status=success");
} else {
    header("Location: LIST-M-GURU.php?status=error");
}
?>