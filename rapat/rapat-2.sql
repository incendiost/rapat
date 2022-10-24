-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 05:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `level`, `password`, `nama`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'boy2.png'),
(8, 'notulen', 'notulen', 'notulen', 'notulen', 'girl2.png');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `iddaftar` int(11) NOT NULL,
  `idrapat` int(11) NOT NULL,
  `namaanggota` varchar(255) NOT NULL,
  `status` enum('Belum Absen','Kosong','Hadir','Izin') NOT NULL DEFAULT 'Belum Absen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`iddaftar`, `idrapat`, `namaanggota`, `status`) VALUES
(3, 2, 'Bayu', 'Kosong'),
(4, 2, 'Aji', 'Izin'),
(5, 2, 'Agus', 'Izin'),
(6, 3, 'Amin', 'Kosong'),
(7, 3, 'Aris', 'Kosong'),
(8, 3, 'Bagus', 'Izin'),
(9, 3, 'Aji', 'Izin'),
(10, 3, 'Anam', 'Hadir'),
(11, 3, 'Anggi', 'Hadir'),
(12, 4, 'Maya', 'Belum Absen'),
(13, 4, 'Aris', 'Belum Absen'),
(14, 4, 'Andik', 'Belum Absen'),
(15, 4, 'Agung', 'Belum Absen'),
(16, 5, 'Ani', 'Izin'),
(17, 5, 'Arsyad', 'Hadir'),
(18, 5, 'Emil', 'Hadir'),
(19, 6, 'RENDY SUROJO', 'Belum Absen'),
(20, 6, 'GALEH', 'Belum Absen'),
(21, 7, 'RENDY SUROJO', 'Belum Absen'),
(22, 7, 'SUGITO', 'Belum Absen'),
(23, 7, 'AKMALL', 'Belum Absen');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `idprofil` int(11) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `ikon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`idprofil`, `nama`, `logo`, `ikon`) VALUES
(1, 'APLIKASI RAPAT', 'bekasi.png', 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `idrapat` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tglrapat` date NOT NULL,
  `jamrapat` varchar(255) NOT NULL,
  `status` enum('Segera','Berlangsung','Selesai') NOT NULL DEFAULT 'Segera',
  `catatan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`idrapat`, `judul`, `tglrapat`, `jamrapat`, `status`, `catatan`) VALUES
(2, 'Rapat Kampus', '2021-08-09', '13:00', 'Selesai', ''),
(3, 'Rapat Sekolah', '2021-08-19', '13:50', 'Selesai', 'namaba'),
(4, 'Rapat Kordinasi', '2021-09-01', '18:30', 'Berlangsung', ''),
(5, 'Rapat Harian', '2021-09-01', '18:30', 'Selesai', '<p style=\"text-align:center\"><strong>RAPAT HARIAN</strong></p>\r\n\r\n<p>Rapat harian dilakukan setiap hari untuk membahas agenda harian pada organisasi</p>\r\n'),
(6, 'RAPAT PROJECT APLIKASI KASIR POS', '2021-09-29', '15:30', 'Selesai', '<p><strong>project aplikasi deal 100 juta</strong></p>\r\n'),
(7, 'Rapat kerja antar cabang tahunan', '2021-12-23', '16:30', 'Berlangsung', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`iddaftar`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idprofil`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`idrapat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `iddaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `idprofil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
  MODIFY `idrapat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
