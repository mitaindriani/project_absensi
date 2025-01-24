<?php
include("conn.php");

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$mapel = $_POST['mapel'];
$tanggal = date('Y-m-d');
$time = date('H:i:s');

// Handle file upload (jika ada file yang diunggah)
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "uploads/"; // Sesuaikan dengan direktori penyimpanan foto Anda
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Cek ekstensi file yang diizinkan (sesuaikan dengan kebutuhan Anda)
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Jika tidak ada error, upload file
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Hapus foto lama jika ada
            $sql_old_foto = "SELECT foto FROM tb_absen WHERE id=$id";
            $result_old_foto = mysqli_query($conn, $sql_old_foto);
            $row_old_foto = mysqli_fetch_assoc($result_old_foto);
            if ($row_old_foto['foto'] != "" && file_exists($row_old_foto['foto'])) {
                unlink($row_old_foto['foto']);
            }

            // Update data siswa di database, termasuk foto baru
            $sql = "UPDATE tb_absen SET nama='$nama', kelas='$kelas', jurusan='$jurusan', mapel='$mapel', tanggal='$tanggal', time='$time', foto='$target_file' WHERE id=$id";
        }
    }
} else {
    // Jika tidak ada file baru diunggah, hanya update data yang lain
    $sql = "UPDATE tb_absen SET nama='$nama', kelas='$kelas', jurusan='$jurusan', mapel='$mapel', tanggal='$tanggal', time='$time' WHERE id=$id";
}

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: listmasuk.php?status=success");
} else {
    header("Location: listmasuk.php?status=error");
}
?>