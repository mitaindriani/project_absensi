<?php
include("conn.php"); // Asumsikan file koneksi sudah ada

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $id_guru = htmlspecialchars($_POST['id_guru']);
  $nama = htmlspecialchars($_POST['nama']);
  $foto = $_FILES["foto"]["name"]; // Get the file name
  $tmp_foto = $_FILES["foto"]["tmp_name"]; // Get the temporary file path
  $tanggal = date('Y-m-d');
  $time = date('H:i:s');
  // Move the uploaded file to a designated folder (replace 'images' with your desired folder)
  move_uploaded_file($tmp_foto, "images/".$foto);
  // Simpan data ke database (tanpa gambar)
  $sql = "INSERT INTO tb_guru (id_guru, nama, tanggal, time, foto)
          VALUES ('$id_guru', '$nama', '$tanggal', '$time', '$foto')";

  $result = $conn->query($sql);

  if ($result) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'LIST-M-GURU.php';
         </script>";
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
    }