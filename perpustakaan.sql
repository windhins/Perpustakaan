-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 06:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` varchar(32) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `bahasa` varchar(16) NOT NULL,
  `tahunterbit` int(16) NOT NULL,
  `kategoribuku` varchar(3) NOT NULL,
  `deskripsi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `penerbit`, `pengarang`, `bahasa`, `tahunterbit`, `kategoribuku`, `deskripsi`) VALUES
('2312123', 'Belajar Lagi', 'Erlangga', 'Sintya', 'indonesia', 2009, '010', 'Stock Menipis'),
('2312123df', 'Terbitlah Terang', 'Erlangga', 'Sirajudin', 'indonesia', 2009, '000', 'Stock Banyak'),
('2312123k', 'Siapa Suka', 'Tiga Serangkai', 'Syaifullan', 'inggris', 2009, '010', 'Buku Lama'),
('C135654', 'Psikologi Perkembangan Remaja', 'PT. PeduliBangsa', 'Ria Iraawan', 'indonesia', 2001, '150', 'Buku Baru');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `kdkategori` varchar(3) NOT NULL,
  `namakategori` varchar(64) NOT NULL,
  `lokasirak` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`kdkategori`, `namakategori`, `lokasirak`) VALUES
('000', 'Publikasi Umum dan komputer', 'A12'),
('010', 'Bibiliografi', 'A21'),
('020', 'Perpustakaan dan informasi', 'B09'),
('050', ' Majalah dan Jurnal', 'B11'),
('150', 'Psikologi', 'C02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `keykategori` (`kategoribuku`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`kdkategori`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategoribuku`) REFERENCES `kategoribuku` (`kdkategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
