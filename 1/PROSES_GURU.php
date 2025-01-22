<?php
include("conn.php"); // Asumsikan file koneksi sudah ada

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $id_guru = htmlspecialchars($_POST['id_guru']);
  $nama = htmlspecialchars($_POST['nama']);
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $time = htmlspecialchars($_POST['time']);
  $foto = $_FILES["foto"]["name"]; // Get the file name
  $tmp_foto = $_FILES["foto"]["tmp_name"]; // Get the temporary file path

  // Move the uploaded file to a designated folder (replace 'images' with your desired folder)
  move_uploaded_file($tmp_foto, "images/".$foto);
  // Simpan data ke database (tanpa gambar)
  $sql = "INSERT INTO tb_guru (id_guru, nama, tanggal, time, foto)
          VALUES ('$id_guru', '$nama', '$tanggal', '$time', '$foto')";

  $result = $conn->query($sql);

  if ($result) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: LIST-M-GURU.php');
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
    } else {
    die("Akses dilarang...");
    }