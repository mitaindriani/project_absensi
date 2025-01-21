<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Side Navigation Menu</title>
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
          <li class="active">
            <i class='bx bxs-user-circle'></i>
            <a href="absenmasuk.php">Absen Masuk</a>
          </li>
          <li >
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
    <div class="absen-box">
        <h1>Absen Masuk SMKN 1 Kepanjen</h1>
        <div class="subject_buttons">
            <button onclick="location.href='GURUMASUK.php'">Absen Guru</button>
            <button onclick="location.href='formabsen.php'">Absen Siswa</button>
        </div>
    </div>
</div>
  </div>
</body>
<style>
  .content {
  font-family: sans-serif;
  background-image: url('blue.jpeg'); /* Ganti dengan path gambar latar belakang Anda */
  background-size: cover; /* Mengatur gambar agar menutupi seluruh latar belakang */
  background-position: center; /* Memusatkan gambar */
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden; /* Menyembunyikan overflow */
}
</style>
</html>