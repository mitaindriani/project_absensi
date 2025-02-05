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
  $tanggal = date('Y-m-d');
  $time = date('H:i:s');
  // Simpan data ke database (tanpa gambar)
  $sql = "INSERT INTO tb_pulang (nama, kelas, jurusan , tanggal, time)
          VALUES ('$nama', '$kelas', '$jurusan', '$tanggal', '$time')";

  $result = $conn->query($sql);

  if ($result) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: listpulang.php');
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
    } else {
    die("Akses dilarang...");
    }