<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSISWA - List Pendaftar Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        @media print {
            body {
                margin: 0; 
                font-size: 12pt; 
            }

            .container {
                max-width: 100%; 
                padding: 0; 
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid black; 
                padding: 8px; 
                text-align: left; 
            }

            img {
                max-width: 80px; 
                height: auto;
            }

            .no-print {
                display: none; 
            }

            .header {
                text-align: center; 
                margin-bottom: 20px;
            }

            .header img {
                max-width: 150px; 
                margin-bottom: 10px;
            }

            .footer {
                margin-top: 20px;
                text-align: left; 
            }
        }

        
        body {
            font-size: 10pt; 
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
            border: 1px solid #dee2e6; 
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .late-entry {
            color: red; 
        }

        .table th, .table td {
            border: 2px solid black;
        }

        .table tbody tr.late-entry:hover {
            color: red;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="Logo SMKN 1 Kepanjen" class="img-fluid">
            <h2>SMK NEGERI 1 KEPANJEN</h2>
            <h6>Jl. Raya Kedungpedaringan, Kepanjen, Malang, Jawa Timur 65163</h6>
            <hr><h4 class="report-title">Laporan Absen Masuk Guru</h4>
            <h6>Periode: Januari 2025</h6>
        </div>

        <div class="no-print">  <form method="GET" action="">
                <div class="row mb-3">
                    
                    <div class="col-auto" id="bulan_select">
                        <select class="form-select" name="bulan">
                            <option value="">-- Pilih Bulan --</option>
                            <?php
                            $bulan = array(
                                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                            );
                            for ($i = 1; $i <= 12; $i++) {
                                $selected = (isset($_GET['bulan']) && $_GET['bulan'] == $i) ? 'selected' : '';
                                echo '<option value="' . $i . '" ' . $selected . '>' . $bulan[$i - 1] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="tahun">
                            <option value="">-- Pilih Tahun --</option>
                            <?php
                            $tahun_awal = 2020;
                            $tahun_akhir = date("Y");
                            for ($tahun = $tahun_awal; $tahun <= $tahun_akhir; $tahun++) {
                                $selected_tahun = (isset($_GET['tahun']) && $_GET['tahun'] == $tahun) ? 'selected' : '';
                                echo "<option value='$tahun' $selected_tahun>$tahun</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>  <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $filter_by = isset($_GET['filter_by']) ? $_GET['filter_by'] : 'bulan';
                $bulan_dipilih = isset($_GET['bulan']) ? $_GET['bulan'] : '';
                $tahun_dipilih = isset($_GET['tahun']) ? $_GET['tahun'] : '';

                $sql = "SELECT * FROM tb_guru";
                $where_clause = "";

                if ($filter_by == 'bulan') {
                    if (!empty($bulan_dipilih)) {
                        $where_clause .= "MONTH(tanggal) = '$bulan_dipilih'";
                    }
                }

                if (!empty($tahun_dipilih)) {
                    if (!empty($where_clause)) {
                        $where_clause .= " AND ";
                    }
                    $where_clause .= "YEAR(tanggal) = '$tahun_dipilih'";
                }

                if (!empty($where_clause)) {
                    $sql .= " WHERE " . $where_clause;
                }

                $query = mysqli_query($conn, $sql);
                $i = 1;
                while ($siswa = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $siswa['nama'] ?></td>
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

        <div class="no-print"> <a href="datasiswa.php" class="btn btn-primary btn-md">Kembali</a>
                <a href="cetakmasuk.php" class="btn btn-success">Cetak</a>
            </div>

    </div>

    <script>
        const filterBySelect = document.getElementById('filter_by');
        const bulanSelect = document.getElementById('bulan_select');
        const kelasSelect = document.getElementById('kelas_select');

        filterBySelect.addEventListener('change', function() {
            if (this.value === 'bulan') {
                bulanSelect.style.display = 'block';
                kelasSelect.style.display = 'none';
            }
        });
    </script>

</body>

</html>