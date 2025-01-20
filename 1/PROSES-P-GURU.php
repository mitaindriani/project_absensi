<?php
include("conn.php"); // Asumsikan file koneksi sudah ada

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $id_guru = htmlspecialchars($_POST['id_guru']);
  $nama = htmlspecialchars($_POST['nama']);
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $jam = htmlspecialchars($_POST['jam']);
  // Simpan data ke database (tanpa gambar)
  $sql = "INSERT INTO tb_guru (id_guru, nama, tanggal, jam)
          VALUES ('$id_guru', '$nama', '$tanggal', '$jam')";

  $result = $conn->query($sql);

  if ($result) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: datasiswa.php');
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
    } else {
    die("Akses dilarang...");
    }