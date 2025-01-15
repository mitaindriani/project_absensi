<?php
include("conn.php"); // Asumsikan file koneksi sudah ada

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $nama = htmlspecialchars($_POST['nama']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $jurusan = htmlspecialchars($_POST['jurusan']);
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $time = htmlspecialchars($_POST['time']);
  // Simpan data ke database (tanpa gambar)
  $sql = "INSERT INTO tb_pulang (nama, kelas, jurusan , tanggal, time)
          VALUES ('$nama', '$kelas', '$jurusan', '$tanggal', '$time')";

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