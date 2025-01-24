<?php
include("conn.php"); // Asumsikan file koneksi sudah ada

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $nama = htmlspecialchars($_POST['nama']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $jurusan = htmlspecialchars($_POST['jurusan']);
  $tanggal = date('Y-m-d');
$time = date('H:i:s');
  // Simpan data ke database (tanpa gambar)
  $sql = "INSERT INTO tb_pulang (nama, kelas, jurusan , tanggal, time)
          VALUES ('$nama', '$kelas', '$jurusan', '$tanggal', '$time')";

  $result = $conn->query($sql);

  if ($result) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'listpulang.php';
         </script>";
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
    } else {
    die("Akses dilarang...");
    }