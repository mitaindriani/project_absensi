<?php
include("conn.php"); // Asumsikan file koneksi sudah ada

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $nama = htmlspecialchars($_POST['nama']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $jurusan = htmlspecialchars($_POST['jurusan']);
  $mapel = htmlspecialchars($_POST['mapel']);
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $time = htmlspecialchars($_POST['time']);
  $foto = $_FILES["foto"]["name"]; // Get the file name
  $tmp_foto = $_FILES["foto"]["tmp_name"]; // Get the temporary file path

  // Move the uploaded file to a designated folder (replace 'images' with your desired folder)
  move_uploaded_file($tmp_foto, "images/".$foto);

  // Construct the SQL query with the foto column
  $sql = "INSERT INTO tb_absen (nama, kelas, jurusan ,mapel, tanggal, time, foto)
          VALUES ('$nama', '$kelas', '$jurusan', '$mapel', '$tanggal', '$time', '$foto')";

  $result = $conn->query($sql);

  if ($result) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: listmasuk.php');
  } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
  }
} else {
  die("Akses dilarang...");
}
?>