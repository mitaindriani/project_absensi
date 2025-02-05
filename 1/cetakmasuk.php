<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSISWA - Cetak Absen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        @media print {
            body {
                margin: 0; /* Remove default margins */
                font-size: 12pt; /* Set font size for printing */
            }

            .container {
                max-width: 100%; /* Make container full width */
                padding: 0; /* Remove container padding */
            }

            table {
                width: 100%; /* Make table full width */
                border-collapse: collapse; /* Collapse table borders */
            }

            th,
            td {
                border: 1px solid black; /* Add borders to cells */
                padding: 8px; /* Add padding to cells */
                text-align: left; /* Align text to the left */
            }

            img {
                max-width: 80px; /* Limit image width for printing */
                height: auto;
            }

            .no-print {
                display: none; /* Hide elements with class "no-print" */
            }

            .header {
                text-align: center; /* Center header content */
                margin-bottom: 20px;
            }

            .header img {
                max-width: 150px; /* Adjust logo size as needed */
                margin-bottom: 10px;
            }

            .footer {
                margin-top: 20px;
                text-align: left; /* Align footer text to the left */
            }
        }

        /* Styling for display (non-print) */
        body {
            font-size: 10pt; /* Set default font size */
        }

        .container {
            margin-top: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 200px;
            margin-bottom: 10px;
        }

        .table-bordered {
            border: 1px solid #dee2e6; /* Add border to the table */
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6; /* Add border to table cells */
            padding: 8px; /* Add padding to cells */
        }

        img {
            max-width: 100px;
            height: auto;
        }
        .header {
        text-align: center; /* Judul dan alamat di tengah */
        margin-bottom: 20px; /* Spasi di bawah judul */
        }

        .header img {
        max-width: 150px; /* Ukuran logo */
        margin-bottom: 10px;
        }

        .header .report-title {
            font-weight: bold;
            margin-bottom: 5px; /* Adjust spacing */
        }
        table.table-bordered {
        border: 1px solid black; /* Black border for the table */
        }

        table.table-bordered th,
        table.table-bordered td {
        border: 1px solid black; /* Black borders for table cells */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="Logo SMKN 1 Kepanjen" class="img-fluid">
            <h2>SMK NEGERI 1 KEPANJEN</h2>
            <h6>Jl. Raya Kedungpedaringan, Kepanjen, Malang, Jawa Timur 65163</h6>
            <hr><h4 class="report-title">Laporan Absen Masuk Siswa</h4>
            <h6>Periode: Januari 2025</h6>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Mapel</th>
                    <th>Jurusan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_absen";
                $query = mysqli_query($conn, $sql);
                $i = 1;
                while ($siswa = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['kelas'] ?></td>
                        <td><?= $siswa['mapel'] ?></td>
                        <td><?= $siswa['jurusan'] ?></td>
                        <td><?= $siswa['tanggal'] ?></td>
                        <td><?= $siswa['time'] ?></td>
                        <td><img src="images/<?= $siswa['foto']; ?>" alt="Absen Photo"></td>
                    </tr>
                    <?php $i++;
                endwhile; ?>
            </tbody>
        </table>

        <div class="footer">
            <h6>Total Siswa: <?= mysqli_num_rows($query) ?></h6>
            <h6>Tanggal Cetak: <?= date('Y-m-d') ?></h6>
        </div>

        <button class="btn btn-primary no-print" onclick="window.print()">Cetak</button>
    </div>
</body>

</html>