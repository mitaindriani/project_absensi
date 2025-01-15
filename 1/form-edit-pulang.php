<?php
include("conn.php");

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data siswa berdasarkan ID
$sql = "SELECT * FROM tb_absen WHERE id = $id";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="container">
    <input type="checkbox" id="click">
    <ol for="click">
      <i class='menu-btn bx bx-menu'></i>
      <i class='close-btn bx bx-x-circle'></i>
    </ol>

    <div class="sidenav">
      <div class="logo">
        <h2>SMKN 1 KEPANJEN</h2><div class="right_area">
      </div><img src="kanesa.png" width="50px" height="50px">
      </div>

      <div class="icon_items">
        <ul>
            <li>
            <i class='bx bxs-home'></i>
            <a href="index.html">Home</a>
          </li>
          <li>
            <i class='bx bxs-user-circle'></i>
            <a href="formabsen.php">Absen Masuk</a>
          </li>
          <li>
            <i class='bx bxs-message-dots'></i>
            <a href="formpulang.php">Absen Pulang</a>
          </li>
            <li class="active">
            <i class='bx bxs-bar-chart-alt-2'></i>
            <a href="datasiswa.php">Data Siswa</a>
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
    <div class="container mt-5">
    <h2>Edit Data Siswa</h2>
    <form action="update-pulang.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
        <div class="mb-3">
            <ol for="nama" class="form-control">Nama</ol>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $siswa['nama']; ?>" required>
        </div>
        <div class="mb-3">
              <ol for="kelas" class="form-control">Kelas</ol>
              <select class="form-select" id="kelas" name="kelas" required>
                  <option value="X" <?php echo ($siswa['kelas'] == 'X') ? 'selected' : ''; ?>>X</option>
                  <option value="XI" <?php echo ($siswa['kelas'] == 'XI') ? 'selected' : ''; ?>>XI</option>
                  <option value="XII" <?php echo ($siswa['kelas'] == 'XII') ? 'selected' : ''; ?>>XII</option>
              </select>
        </div>
        <div class="mb-3">
              <ol for="jurusan" class="form-control">Jurusan</ol>
              <select class="form-select" id="jurusan" name="jurusan" required>
                  <option value="rpl" <?php echo ($siswa['jurusan'] == 'rpl') ? 'selected' : ''; ?>>RPL</option>
                  <option value="tkj" <?php echo ($siswa['jurusan'] == 'tkj') ? 'selected' : ''; ?>>TKJ</option>
                  <option value="tkr" <?php echo ($siswa['jurusan'] == 'tkr') ? 'selected' : ''; ?>>TKR</option>
                  <option value="tbsm" <?php echo ($siswa['jurusan'] == 'tbsm') ? 'selected' : ''; ?>>TBSM</option>
                  <option value="tei" <?php echo ($siswa['jurusan'] == 'tei') ? 'selected' : ''; ?>>TEI</option>
              </select>
        </div>
        <div class="mb-3">
            <ol for="tanggal" class="form-control">Tanggal</ol>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $siswa['tanggal']; ?>" required>
        </div>
        <div class="mb-3">
            <ol for="time" class="form-control">Time</ol>
            <input type="time" class="form-control" id="time" name="time" value="<?php echo $siswa['time']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="listpulang.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>