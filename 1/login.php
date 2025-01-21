<?php

// Koneksi ke database
$servername = "localhost"; // Ganti dengan nama host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "db_apk2"; // Nama database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mode = $_POST["mode"];

  if ($mode === "login") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query untuk mengambil data pengguna dari database
    $sql = "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Login berhasil, arahkan ke halaman dashboard
      header("Location: index.html");
      exit();
    } else {
      // Login gagal
      echo "<script>alert('Username atau password salah.');</script>";
    }
  }
}

$conn->close(); // Tutup koneksi database setelah selesai

?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body {
  font-family: sans-serif;
  background-image: url('blue.jpeg'); /* Ganti dengan path gambar latar belakang Anda */
  background-size: cover; /* Mengatur gambar agar menutupi seluruh latar belakang */
  background-position: center; /* Memusatkan gambar */
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  position: relative; /* Menambahkan posisi relatif untuk pseudo-element */
  overflow: hidden; /* Menyembunyikan overflow */
}

body::before {
  content: ""; /* Membuat pseudo-element */
  /* Memposisikan pseudo-element */
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(255, 255, 255, 0.2); /* Warna gelap dengan transparansi */
  z-index: 1; /* Menempatkan pseudo-element di belakang konten */
}

.container {
  background-color: transparent;
  padding: 40px 100px;
  border-radius: 10px;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.9);
  position: relative; /* Menambahkan posisi relatif untuk kontainer */
  z-index: 2; /* Menempatkan kontainer di atas pseudo-element */
}

.logo {
  width: 200px;
  height: 180px;
  margin-bottom: 20px;
}

.title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.input {
  width: 100%;
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 15px;
  border-radius: 5px;
}

.button {
  background-color: #001A6E;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.toggle-text {
  margin-top: 20px;
  color: #001A6E;
}
</style>
</head>
<body>

<div class="container">
  <img src="kanesa.png" class="logo">
  <h2 class="title">Login</h2> 

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    <input type="hidden" name="mode" value="login"> 
    <input type="text" name="username" class="input" placeholder="Username" required><br>
    <input type="password" name="password" class="input" placeholder="Password" required><br>
    <button type="submit" class="button">Login</button>
  </form>

  <p class="toggle-text">Belum punya akun? <a href="register.php">Register</a></p>
</div>

</body>
</html>