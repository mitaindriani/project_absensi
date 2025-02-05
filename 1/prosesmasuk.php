<?php
include("conn.php");

// Fungsi untuk mendapatkan hari saat ini (0 = Minggu, 6 = Sabtu)
function getHari() {
    return date('w');
}

// Cek apakah hari ini Sabtu atau Minggu
if (getHari() == 6 || getHari() == 0) {
    echo "<script>
            alert('Tidak dapat melakukan absensi pada hari Sabtu dan Minggu.');
            document.location.href = 'formabsen.php'; // Atau halaman lain yang sesuai
          </script>";
    exit(); // Hentikan eksekusi kode selanjutnya
}

// Cek apakah form telah dikirim
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $nama = htmlspecialchars($_POST['nama']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $jurusan = htmlspecialchars($_POST['jurusan']);
  $mapel = htmlspecialchars($_POST['mapel']);
  $tanggal = date('Y-m-d');
  $time = date('H:i:s');
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