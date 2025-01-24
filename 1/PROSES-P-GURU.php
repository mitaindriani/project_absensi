<?php
include("conn.php"); // Asumsikan file koneksi sudah ada

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $id_guru = htmlspecialchars($_POST['id_guru']);
  $nama = htmlspecialchars($_POST['nama']);
  $tanggal = date('Y-m-d');
  $time = date('H:i:s');
  // Simpan data ke database (tanpa gambar)
  $sql = "INSERT INTO tb_guru2 (id_guru, nama, tanggal, time)
          VALUES ('$id_guru', '$nama', '$tanggal', '$time')";

  $result = $conn->query($sql);

  if ($result) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'LIST-P-GURU.php';
         </script>";
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
    } else {
    die("Akses dilarang...");
    }