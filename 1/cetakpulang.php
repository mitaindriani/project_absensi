<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSISWA - List Pendaftar Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <header class="text-center">
        <div class="container">
            <img src="kanesa.png" alt="Logo SMKN 1 Kepanjen" class="img-fluid mb-3">
            <h3>List Absen Masuk</h3>
        </div>
    </header>

    <script>
        window.print();
    </script>

    <div class="container mt-4">
        <table class="table table-bordered black">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Mapel</th>
                    <th>Jurusan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
         <?php
            $sql = "SELECT * FROM tb_absen";
            $query = mysqli_query($conn, $sql);
            $i = 1;
             ?>

             <?php while ($siswa = mysqli_fetch_array($query)) : ?>
                 <tr>
                    <td><?php echo $i ?> </td>
                    <td><?php echo $siswa['nama'] ?></td>
                    <td><?php echo $siswa['kelas'] ?></td>
                    <td><?php echo $siswa['mapel'] ?></td>
                    <td><?php echo $siswa['jurusan'] ?></td>
                    <td><?php echo $siswa['tanggal'] ?></td>
                    <td><?php echo $siswa['time'] ?></td>

                </tr>
                <?php $i++ ?>
                <?php endwhile; ?>
             </tbody>
     </table>

     <p>Total Siswa Pulang: <?php echo mysqli_num_rows($query) ?></p>
    </div>
</body>
</html>