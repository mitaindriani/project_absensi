<?php include("conn.php"); date_default_timezone_set('Asia/Jakarta');?>
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
.button-container {
    text-align: center; /* Center buttons horizontally */
  }
  .button-container button {
    margin-right: 10px; /* Add spacing between buttons */
  }
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
          <li class="active">
            <i class='bx bxs-user-circle'></i>
            <a href="absenmasuk.php">Absen Masuk</a>
          </li>
          <li>
            <i class='bx bxs-message-dots'></i>
            <a href="absenpulang.php">Absen Pulang</a>
          </li>
            <li>
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
        <h1>Absen Masuk Siswa</h1>
      </header>
      <div class="w-50 mx-auto border p-2 mt-1">
        <form action="prosesmasuk.php" method="POST" enctype="multipart/form-data">
          <fieldset>
            <div class="mb-3">
              <ol for="nama">Nama:</ol>
              <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required />
            </div>
            <div class="mb-3">
              <ol for="kelas">Kelas:</ol>
              <select name="kelas" id="kelas" class="form-select" required>
                <option value="">Pilih Kelas</option>   
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
              </select>
            </div>
            <div class="mb-3">
              <ol for="mapel">Mapel:</ol>
              <select name="mapel" id="mapel" class="form-select" required>
                <option value="">Pilih Mapel</option>   
                <option value="MTK">MTK</option>
                <option value="BING">BING</option>
                <option value="IPA">IPA</option>
                 <option value="BIN">BIN</option>
                  <option value="PKN">PKN</option> 
                  <option value="SEJARAH">SEJARAH</option>
              </select>
            </div>
            <div class="mb-3">
              <ol for="jurusan">Jurusan:</ol>
              <select name="jurusan" id="jurusan" class="form-select" required>
                <option value="">Pilih Jurusan</option>   
                <option value="rpl">RPL</option>
                <option value="tkj">TKJ</option>
                <option value="tkr">TKR</option>
                <option value="tbsm">TBSM</option>
                <option value="tei">TEI</option>
                </select></div>
                <div class="mb-3">
                <ol for="tanggal">Tanggal:</ol>
                <input type="text" name="tanggal" class="form-control" value="<?php echo date('d/m/Y'); ?>" readonly />
                </div>
                <div class="mb-3">
                <ol for="time">Jam:</ol>
                <input type="text" name="time" class="form-control" value="<?php echo date('H:i:s'); ?>" readonly/>
                </div>
                <div class="mb-3">
    <ol for="foto">Foto Siswa:</ol>
    <input type="file" class="form-control" id="foto" name="foto">
  </div>
  <button type="submit" value="Absen" name="daftar" class="btn btn-primary">Absen</button>
  <a href="absenmasuk.php" class="btn btn-secondary">Kembali</a>
                </fieldset>
          </form>
</body>
</html>
