<?php include("conn.php"); ?>
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
    <label for="click">
      <i class='menu-btn bx bx-menu'></i>
      <i class='close-btn bx bx-x-circle'></i>
    </label>

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
<header class="form-control">
<h3>List Absen Masuk Siswa</h3>
</header><br>
<nav class="position-absolute top-10 start-50 translate-middle">
<a href="datasiswa.php" class="btn btn-primary btn-md">Kembali</a>
<a href="cetakmasuk.php" class="btn btn-success">Cetak</a>
</nav>
<div class="container">
    <table class="table table-striped table-hover table-bordered mt-5">
    <thead class="table-dark">
<th>No</th>
<th>Nama</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Mapel</th>
<th>Tanggal</th>
<th>Time</th>
<th>Tindakan</th>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM tb_absen";
$query = mysqli_query($conn, $sql);
$i = 1;
?>
<?php while ($siswa = mysqli_fetch_array($query)) : ?>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $siswa['nama'] ?></td>
<td><?php echo $siswa['kelas'] ?></td>
<td><?php echo $siswa['jurusan'] ?></td>
<td><?php echo $siswa['mapel'] ?></td>
<td><?php echo $siswa['tanggal'] ?></td>
<td><?php echo $siswa['time'] ?></td>
<td>
<div class='row'>   
<div class='col d-flex justify-content-center'>
<a href ="form-edit-masuk.php?id=<?php echo $siswa['id']?>" class='btn btn-sm btn-warning'>Edit</a>
</div>
<div class='col d-flex justify-content-center'>
<a href ="hapusmasuk.php?id=<?php echo $siswa['id']?>" class='btn btn-sm btn-danger'>Hapus</a>
</div>
</td>
</tr>
<?php $i++ ?>
<?php endwhile; ?>
</tbody>
</table>
<p>Total Siswa Absen: <?php echo mysqli_num_rows($query) ?></p>
</div>
</body>
</html>
</body>
</html>