-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 10:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fofima`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_besar`
--

CREATE TABLE `buku_besar` (
  `id` int(10) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` enum('debet','kredit','penyusutan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'debet',
  `nmr_perkiraan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku_besar`
--

INSERT INTO `buku_besar` (`id`, `id_transaksi`, `tanggal`, `tipe`, `nmr_perkiraan`, `nominal`, `keterangan_transaksi`) VALUES
(61, 22, '2021-09-28', 'debet', '6101', 1000000, 'Membeli Gula'),
(62, 22, '2021-09-28', 'kredit', '1001', 1000000, 'Membeli Gula'),
(63, 23, '2021-09-28', 'debet', '1001', 2000000, 'Membeli Gula'),
(64, 23, '2021-09-28', 'kredit', '1001', 2000000, 'Membeli Gula'),
(65, 24, '2021-09-29', 'debet', '5313', 100000, 'Pembelian BBM bis'),
(66, 24, '2021-09-29', 'kredit', '1001', 100000, 'Pembelian BBM bis'),
(67, 25, '2021-01-29', 'debet', '5408', 100000, 'membeli bensin'),
(68, 25, '2021-01-29', 'kredit', '1001', 100000, 'membeli bensin'),
(69, 26, '2021-09-26', 'debet', '5313', 10000, 'membeli bensin bis'),
(70, 26, '2021-09-26', 'kredit', '1001', 10000, 'membeli bensin bis'),
(71, 27, '2021-09-19', 'debet', '5313', 2500000, 'BKK 021 Pembelian bensin mobil xenia'),
(72, 27, '2021-09-19', 'kredit', '1001', 2500000, 'BKK 021 Pembelian bensin mobil xenia'),
(73, 28, '2021-09-03', 'debet', '1001', 20000000, 'BKM 001 Biaya opreasional Bln Sept 21'),
(74, 28, '2021-09-03', 'kredit', '1021', 20000000, 'BKM 001 Biaya opreasional Bln Sept 21'),
(75, 29, '2021-09-29', 'debet', '1021', 1000000, 'Membeli Gula'),
(76, 29, '2021-09-29', 'kredit', '1001', 1000000, 'Membeli Gula'),
(77, 30, '2021-09-30', 'debet', '1001', 100000000, 'isi kas smk'),
(78, 30, '2021-09-30', 'kredit', '4001', 100000000, 'isi kas smk'),
(79, 31, '2021-09-30', 'debet', '1003', 1000000000, 'mengisi kas yayasan'),
(80, 31, '2021-09-30', 'kredit', '4002', 1000000000, 'mengisi kas yayasan'),
(81, 32, '2021-02-28', 'debet', '1002', 1000000000, 'Mengisi kas asrama'),
(82, 32, '2021-02-28', 'kredit', '4004', 1000000000, 'Mengisi kas asrama'),
(83, 33, '2021-09-30', 'debet', '5401', 10000000, 'membeli kaos trainning'),
(84, 33, '2021-09-30', 'kredit', '1001', 10000000, 'membeli kaos trainning'),
(87, 35, '2021-10-04', 'debet', '1001', 1000000, 'isi kas smk'),
(88, 35, '2021-10-04', 'kredit', '1003', 1000000, 'isi kas smk'),
(90, 37, '2021-10-05', 'penyusutan', '8003', 1000000, 'penyusutan'),
(91, 38, '2021-10-05', 'penyusutan', '8005', 200000000, 'penyusutan'),
(92, 39, '2021-10-05', 'debet', '9102', 1000000, 'bunga'),
(93, 39, '2021-10-05', 'kredit', '1024', 1000000, 'bunga'),
(96, 41, '2021-10-05', 'debet', '1001', 200000, '1000000'),
(97, 41, '2021-10-05', 'kredit', '1001', 200000, '1000000'),
(98, 43, '2021-10-05', 'debet', '1001', 20000, 'Membeli Gula'),
(99, 43, '2021-10-05', 'kredit', '1001', 20000, 'Membeli Gula'),
(100, 44, '2021-10-05', 'debet', '1021', 5000000, 'donasi dari pak wijaya'),
(101, 44, '2021-10-05', 'kredit', '4001', 5000000, 'donasi dari pak wijaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_besar`
--
ALTER TABLE `buku_besar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_besar`
--
ALTER TABLE `buku_besar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
