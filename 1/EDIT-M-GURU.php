<?php
include("conn.php");

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data siswa berdasarkan ID
$sql = "SELECT * FROM tb_guru WHERE id = $id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_array($query);

if (!$siswa) {
    die("Data tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Side Navigation Menu</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
 .container {
    background-color: #D9EAFD;
}
body{
  background-color:#D9EAFD;
}
.form-control{
  background-color:#FFFFFF;
}
</style>

</style>
<body>
  <div class="container">
    <input type="checkbox" id="click">
    <label for="click">
      <i class='menu-btn bx bx-menu'></i>
      <i class='close-btn bx bx-x-circle'></i>
    </label>

    <div class="sidenav">
      <div class="logo">
        <h2>SMKN 1 KEPANJEN</h2>
        <img src="kanesa.png" width="50px" height="50px">
      </div>

      <div class="icon_items">
        <ul>
            <li>
            <i class='bx bxs-home'></i>
            <a href="index.html">Home</a>
          </li>
          <li>
            <i class='bx bxs-user-circle'></i>
            <a href="absenmasuk.php">Absen Masuk</a>
          </li>
          <li>
            <i class='bx bxs-message-dots'></i>
            <a href="absenpulang.php">Absen Pulang</a>
          </li>
            <li class="active">
            <i class='bx bxs-bar-chart-alt-2'></i>
            <a href="datasiswa.php">Data Absensi</a>
          </li>
          <li>
            <i class='bx bxs-cog'></i>
            <a href="#">Setting</a>
          </li>
          <li>
            <i class='bx bx-log-in'></i>
            <a href="login.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
    <header >
        <h1>Edit Absen Masuk</h1>
        </header>
      <div class="w-50 mx-auto border p-2 mt-1">
    <form action="PRO-EDIT-MASUK.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
        <div class="mb-3">
            <ol for="id_guru" >ID Guru</ol>
            <input type="text" class="form-control" id="id_guru" name="id_guru" value="<?php echo $siswa['id_guru']; ?>" required>
        </div>
        <div class="mb-3">
            <ol for="nama" >Nama</ol>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $siswa['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <ol for="tanggal">Tanggal</ol>
            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('d/m/Y'); ?>" readonly >
        </div>
        <div class="mb-3">
            <ol for="time">Jam</ol>
            <input type="text" class="form-control" id="time" name="time" value="<?php echo date('H:i:s'); ?>" readonly>
        </div>
        <div class="mb-3">
        <ol for="foto">Foto Guru</ol>
        <input type="file" class="form-control" id="foto" name="foto"> 
        <img src="images/<?php echo $siswa['foto']; ?>" alt="Foto Guru" width="100"> 
    </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="LIST-M-GURU.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
<style>
.container .sidenav {
    
    width: 115px;
    height: 100vh;
    overflow: hidden;
    position: fixed;
    padding: 40px 16px;
    background-color: #000;
    transition: width 0.6s, left 0.6s;
    left: -20px;
    bottom: 0px;
    /* Adjust the value for desired leftward shift */
}
</style>

</html>