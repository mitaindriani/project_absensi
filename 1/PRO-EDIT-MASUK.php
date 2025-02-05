<?php
include("conn.php");
$id = $_POST['id'];
$id_guru = $_POST['id_guru'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$time = $_POST['time'];
$foto_lama = $_POST['foto_lama'];

// Cek apakah ada file foto baru yang diupload
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    // Proses upload foto baru
    $foto = 'path/to/upload/' . $_FILES['foto']['name']; // Ganti dengan path yang sesuai
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    $sql = "UPDATE tb_guru SET id='$id', id_guru='$id_guru', nama='$nama', tanggal='$tanggal', time='$time', foto='$foto' WHERE id=$id";
} else {
    // Jika tidak ada foto baru, gunakan foto lama
    $sql = "UPDATE tb_guru SET id='$id', id_guru='$id_guru', nama='$nama', tanggal='$tanggal', time='$time', foto='$foto_lama' WHERE id=$id";
}

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: LIST-M-GURU.php?status=success");
} else {
    header("Location: LIST-M-GURU.php?status=error");
}
?>