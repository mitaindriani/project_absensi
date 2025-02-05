<?php
include("conn.php"); date_default_timezone_set('Asia/Jakarta');

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
  <title>Navbar Example</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    nav {
      background-color: #333;
      color: white;
      padding: 20px;
      top:0px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      width: 100%;
      z-index: 100;
    }

    nav ul {
      list-style: none;
      margin: 10px;
      padding: 2px;
      display: flex;
    }

    nav li {
      margin-left: 20px;
      font-size: large;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 5px;
      transition: background-color 0.5s ease;
    }

    nav a:hover {
      background-color: #555;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      margin-right: 10px;
    }

    .content {
      padding: 20px;
      margin-top: 70px;
      /* Adjust to navbar height + some extra */
      font-family: sans-serif;
      background-color: #cadef5;
      /* Blue background */
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      overflow-y: auto;
    }

    .header-title {
      text-align: center; 
      margin-top: 20px; 
    }

    .card {
      background-color: rgba(255, 255, 255, 0.8); 
      border: none; 
      border-radius: 15px; 
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); 
      margin-top: 40px;
    }

    .form-control {
      border-radius: 10px; 
    }

    .btn {
      border-radius: 10px; 
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo">
      <img src="kanesa.png" width="50px" height="50px">
      <h2>SMKN 1 KEPANJEN</h2>
    </div>
    <ul>
      <li><a href="index.html"><i class='bx bxs-home'></i> Home</a></li>
      <li><a href="absenmasuk.php"><i class='bx bxs-user-circle'></i> Absen Masuk</a></li>
      <li><a href="absenpulang.php"><i class='bx bxs-message-dots'></i> Absen Pulang</a></li>
      <li><a href="datasiswa.php"><i class='bx bxs-bar-chart-alt-2'></i> Data Absensi</a></li>
      <li><a href="#"><i class='bx bxs-cog'></i> Setting</a></li>
      <li><a href="login.php"><i class='bx bx-log-in'></i> Logout</a></li>
    </ul>
  </nav>

    <div class="content">
    <div class="card w-50 mx-auto p-4">
    <header  class="header-title">
        <h1>Edit Absen Pulang</h1>
        </header>
    <form action="PRO-EDIT-PULANG.php" method="POST">
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
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $siswa['tanggal']; ?>" required>
        </div>
        <div class="mb-3">
            <ol for="time">Jam</ol>
            <input type="time" class="form-control" id="time" name="time" value="<?php echo $siswa['time']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="LIST-P-GURU.php" class="btn btn-secondary">Kembali</a>
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