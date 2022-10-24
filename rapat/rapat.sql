-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 28 Sep 2021 pada 17.43
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `level`, `password`, `nama`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'boy2.png'),
(2, 'Notulen', 'notulen', 'notulen', 'Notulen', 'man.png'),
(4, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar`
--

CREATE TABLE `daftar` (
  `iddaftar` int(11) NOT NULL,
  `idrapat` int(11) NOT NULL,
  `namaanggota` varchar(255) NOT NULL,
  `status` enum('Belum Absen','Kosong','Hadir','Izin') NOT NULL DEFAULT 'Belum Absen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar`
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
(18, 5, 'Emil', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `idprofil` int(11) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `ikon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`idprofil`, `nama`, `logo`, `ikon`) VALUES
(1, 'DJAZULI', 'logo2.png', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapat`
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
-- Dumping data untuk tabel `rapat`
--

INSERT INTO `rapat` (`idrapat`, `judul`, `tglrapat`, `jamrapat`, `status`, `catatan`) VALUES
(2, 'Rapat Kampus', '2021-08-09', '13:00', 'Selesai', ''),
(3, 'Rapat Sekolah', '2021-08-19', '13:50', 'Selesai', 'namaba'),
(4, 'Rapat Kordinasi', '2021-09-01', '18:30', 'Berlangsung', ''),
(5, 'Rapat Harian', '2021-09-01', '18:30', 'Selesai', '<p style=\"text-align:center\"><strong>RAPAT HARIAN</strong></p>\r\n\r\n<p>Rapat harian dilakukan setiap hari untuk membahas agenda harian pada organisasi</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`iddaftar`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idprofil`);

--
-- Indeks untuk tabel `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`idrapat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `daftar`
--
ALTER TABLE `daftar`
  MODIFY `iddaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `idprofil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rapat`
--
ALTER TABLE `rapat`
  MODIFY `idrapat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
