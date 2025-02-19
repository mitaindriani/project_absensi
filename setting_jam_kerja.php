<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Jam Kerja</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
    nav {
      background-color: #333;
      color: white;
      padding: 20px;
      top: 0px;
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
      font-family: sans-serif;
      background-image: url("nesa.jpeg");
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      overflow-y: auto;
      background-attachment: fixed;
    }

        .setting-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin: 20px auto; 
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
      <li><a href="setting_jam_kerja.php"><i class='bx bx-log-in'></i>Master Jadwal</a></li>
      <li><a href="contact.php"><i class='bx bxs-cog'></i> Contact</a></li>
      <li><a href="login.php"><i class='bx bx-log-in'></i> Logout</a></li>
    </ul>
  </nav>
    <div class="content">
        <div class="container">
            <div class="setting-box">
                <h2>Setting Jam Absen</h2>
                <form method="POST" action="save_jam_kerja.php">
                    <?php
                    $days = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");

                    foreach ($days as $day) :
                        $sql = "SELECT jam_masuk, jam_pulang FROM master_jadwal WHERE hari = '$day'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        // Tambahkan pengecekan NULL
                        $jam_masuk = $row !== null ? $row['jam_masuk'] : '';
                        $jam_pulang = $row !== null ? $row['jam_pulang'] : '';
                    ?>
                        <div class="mb-3">
                            <label for="<?php echo strtolower($day); ?>_masuk" class="form-label"><?php echo $day; ?>:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="time" class="form-control" id="<?php echo strtolower($day); ?>_masuk"
                                        name="<?php echo strtolower($day); ?>_masuk" value="<?php echo $jam_masuk; ?>">
                                </div>
                                <div class="col">
                                    <input type="time" class="form-control" id="<?php echo strtolower($day); ?>_pulang"
                                        name="<?php echo strtolower($day); ?>_pulang" value="<?php echo $jam_pulang; ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>