-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 08:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apk2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('RPL','TKJ','TKR','TBSM','TEI') NOT NULL,
  `mapel` enum('mtk','big','bin','ipa','pkn','sejarah') NOT NULL,
  `tanggal` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `nama`, `kelas`, `jurusan`, `mapel`, `tanggal`, `time`) VALUES
(1, 'aaaa', 'XI', 'RPL', 'mtk', '2025-01-30', '15:12:00'),
(3, 'aaaa', 'X', 'RPL', 'mtk', '2025-01-14', '09:49:00'),
(4, 'dddd', 'XI', 'RPL', 'big', '2025-01-14', '14:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`) VALUES
('a', '111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pulang`
--

CREATE TABLE `tb_pulang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('rpl','tkj','tkr','tbsm','tei') NOT NULL,
  `tanggal` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pulang`
--

INSERT INTO `tb_pulang` (`id`, `nama`, `kelas`, `jurusan`, `tanggal`, `time`) VALUES
(1, 'bbb', 'XII', 'tbsm', '2025-01-10', '15:15:00'),
(2, 'aaaa', 'XI', 'tkj', '2025-01-14', '14:19:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pulang`
--
ALTER TABLE `tb_pulang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pulang`
--
ALTER TABLE `tb_pulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
