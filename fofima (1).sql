-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 10:18 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2021_09_16_073135_create_users_table', 1),
(3, '2021_09_16_073423_create_failed_jobs_table', 1),
(4, '2021_09_16_073619_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 14),
(1, 'App\\User', 17),
(1, 'App\\User', 19),
(1, 'App\\User', 23),
(2, 'App\\User', 21),
(2, 'App\\User', 22),
(3, 'App\\User', 20),
(4, 'App\\User', 24);

-- --------------------------------------------------------

--
-- Table structure for table `nomor_perkiraan`
--

CREATE TABLE `nomor_perkiraan` (
  `nmr_perkiraan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nomor_perkiraan`
--

INSERT INTO `nomor_perkiraan` (`nmr_perkiraan`, `keterangan_nomor`, `kode_kategori`) VALUES
('1001', 'Kas SMK', '1000'),
('1002', 'Kas Asrama', '1000'),
('1003', 'Kas Yayasan', '1000'),
('1021', 'BCA 796-076777', '1000'),
('1022', 'BCA 426-2121121', '1000'),
('1023', 'Permata', '1000'),
('1024', 'Mandiri 135.00.1111119.0', '1000'),
('1051', 'Piutang Siswa', '1000'),
('1052', 'Piutang Alumni', '1000'),
('1053', 'Piutang Lain-lain', '1000'),
('1321', 'Bangunan SMK', '1081'),
('1322', 'Peralatan kantor dll SMK & ktr Yayasan', '1081'),
('1323', 'Peralatan RPL', '1081'),
('1324', 'Peralatan MM', '1081'),
('1325', 'Peralatan BKP', '1081'),
('1326', 'Peralatan TKRO', '1081'),
('1327', 'Peralatan TB', '1081'),
('1328', 'Kendaraan', '1081'),
('1401', 'Akum Peny Bangunan', '1081'),
('1402', 'Akum Peny Peralatan kantor SMK & kantor Yayasan', '1081'),
('1403', 'Akum Peny Peralatan RPL', '1081'),
('1404', 'Akum Peny Peralatan MM', '1081'),
('1405', 'Akum Peny Peralatan BKP', '1081'),
('1406', 'Akum Peny Peralatan TKRO', '1081'),
('1407', 'Akum Peny Peralatan TB', '1081'),
('1408', 'Akum Peny Kendaraan', '1081'),
('1710', 'Biaya Perijinan Ditangguhkan', '1081'),
('1720', 'Biaya Renovasi Ditangguhkan', '1081'),
('2021', 'Hutang Biaya', '1081'),
('2031', 'PPh 21', '1081'),
('2032', 'PPh 29', '1081'),
('2033', 'PPN Keluaran', '1081'),
('2034', 'PPh Final ps 4 ay 2', '1081'),
('2080', 'Hutang Lain-lain', '1081'),
('2090', 'Hutang Jangka Panjang', '1081'),
('3001', 'Modal Hibah', '1081'),
('3002', 'Tambah Hibah', '1081'),
('3003', 'Surplus (defisit) tahun lalu (sd thn 2019)', '1081'),
('3004', 'Surplus (defisit) tahun 2020', '1081'),
('3005', 'Surplus (defisit) Tahun Berjalan', '1081'),
('4001', 'Donatur BCA 796-076777', '4000'),
('4002', 'Donatur BCA 426-2121121', '4000'),
('4003', 'Donatur Permata', '4000'),
('4004', '\r\nDonatur Mandiri 135.00.1111119.0', '4000'),
('4101', 'Uang Pendaftaran', '4000'),
('4102', 'SPI', '4000'),
('4103', 'Seragam', '4000'),
('4104', 'Asrama', '4000'),
('4105', 'Lain-lain', '4000'),
('4200', 'DANA BOS', '4000'),
('4300', 'Penerimaan Lain-lain', '4000'),
('5101', 'Gaji Guru Karyawan SMKBN', '5000'),
('5102', 'THR', '5000'),
('5103', 'Kegiatan Ekstrakulikuler', '5000'),
('5104', 'Lembur & Bi.KB-KB', '5000'),
('5201', 'Service Komputer', '5000'),
('5203', 'Service Printer', '5000'),
('5204', 'Service AC', '5000'),
('5205', 'Service LCD', '5000'),
('5206', 'Service Elektronik', '5000'),
('5207', 'Service Bus/Mobil', '5000'),
('5208', 'Service Motor', '5000'),
('5209', 'Service Genset', '5000'),
('5210', 'Perawatan Gedung', '5000'),
('5211', 'Perawatan Taman', '5000'),
('5212', 'Perawatan KIR Bis', '5000'),
('5212', 'Pemeliharaan Penunjang Pendididkan', '5000'),
('5214', 'Pemeliharaan Peralatan Boga', '5000'),
('5201', 'ATK', '5000'),
('5302', 'FC & Jilid', '5000'),
('5304', 'RTK/Kebersihan', '5000'),
('5305', 'Listrik', '5000'),
('5306', 'Telp.', '5000'),
('5307', 'Konsumsi rapat dll', '5000'),
('5308', 'Iuran Gugus/MPK/PKG', '5000'),
('5309', 'Obat-obatan/UKS', '5000'),
('5310', 'Sumbangan/Hadiah/DanSos', '5000'),
('5311', 'Majalah/Koran', '5000'),
('5312', 'Perjalanan Dinas', '5000'),
('5313', 'BBM Bus/Mobil', '5000'),
('5314', 'BBM Motor', '5000'),
('5315', 'Pajak Bis ,motor', '5000'),
('5316', 'Bi.Ekspedisi/TU', '5000'),
('5317', 'Bi.Ekspedisi/HUMAR', '5000'),
('5318', 'Bi.KB-KB', '5000'),
('5319', 'Parkir/Tol', '5000'),
('5320', 'Bi.Bank', '5000'),
('5401', 'Seragam Guru', '5000'),
('5402', 'Buku Guru RPL', '5000'),
('5403', 'Buku Guru MM', '5000'),
('5404', 'Buku Guru TKR', '5000'),
('5405', 'Buku Guru BOGA', '5000'),
('5406', 'Bahan Praktik Lab.Multimedia', '5000'),
('5407', 'Bahan Praktik Lab.Komp(KKPI,RPL,TKJ)', '5000'),
('5408', 'Bahan Praktik Lab.TKR', '5000'),
('5409', 'Bahan Praktek Lab.TKBB', '5000'),
('5410', 'Bahan Praltek Lab.Jasa Boga', '5000'),
('5411', 'Bahan Praktek Lab.IPA', '5000'),
('5412', 'Retret/pembinaan rohani', '5000'),
('5413', 'Pembinaan Guru Karyawan', '5000'),
('5414', 'Guru tamu', '5000'),
('5415', 'Humas(DU/DI)', '5000'),
('5416', 'Ulangan Harian/Kurikulum', '5000'),
('5417', 'Ulangan Tengah Semester/Kurikulum', '5000'),
('5418', 'Ulangan Akhir Semester/Kurikulum', '5000'),
('5419', 'Ulangan Nasional (UN).try out,UPK', '5000'),
('5420', 'Ulangan Sekolah (US)/Kurikulum', '5000'),
('5421', 'Raport Peserta Didik/Kurikulum', '5000'),
('5422', 'Kurikulum/Akreditasi', '5000'),
('5423', 'Study Banding/Pelatihan guru dll/Kurikulum', '5000'),
('5424', 'BK', '5000'),
('5425', 'Kesiswaan :PPDB', '5000'),
('5426', 'Keiswaan :HUT', '5000'),
('5427', 'Kesiswaan :Pramuka,Osis,Lomba,MPLS,dll', '5000'),
('5428', 'Ekstrakulikuler/Kesiswaan', '5000'),
('529', 'Seminar,pelatihan dll', '5000'),
('5430', 'Program Perpustakaan /TKBB', '5000'),
('5431', 'Program Perpustakaan /TKR', '5000'),
('5432', 'Program Perpustakaan/Boga', '5000'),
('5433', 'Biaya lain-lain', '5000'),
('5434', 'Pembelian sarana dan prasarana', '5000'),
('6101', 'Gaji Karyawan Asrama', '6000'),
('6102', 'THR', '6000'),
('6103', 'Biaya Lembur/honor', '6000'),
('6201', 'Lauk Pauk', '6000'),
('6202', 'Beras', '6000'),
('6203', 'Gas', '6000'),
('6204', 'Air', '6000'),
('6301', 'Kebutuhan Rumah Tangga', '6000'),
('6302', 'Kebutuhan Siswa', '6000'),
('6303', 'Koran dan Majalah', '6000'),
('6304', 'ATK/meterai/Percetakan', '6000'),
('6305', 'Kesehatan', '6000'),
('6306', 'Snack', '6000'),
('6307', 'Kebersihan', '6000'),
('6308', 'Listrik & telp.', '6000'),
('6309', 'Transport/Bensin', '6000'),
('6310', 'Service/Pemeliharaan asrama dll', '6000'),
('6311', 'Perlengkapan asrama/dll', '6000'),
('6312', 'Pengeluaran Lain-lain', '6000'),
('7101', 'Gaji staf & pegawai Yayasan', '7000'),
('7102', 'THR', '7000'),
('7103', 'PPh psl 21 yang ditanggung yayasan', '7000'),
('7104', 'BPJS Kesehatan', '7000'),
('7105', 'BPJS Ketenagakerjaan', '7000'),
('7201', 'ATK', '7000'),
('7202', 'Tali Asih,Tanda kasih,Uang Duka dll', '7000'),
('7203', 'RTK', '7000'),
('7204', 'Biaya Langganan Internet & Telepon', '7000'),
('7205', 'Cetak Profile,Kop Surat,buletin dll', '7000'),
('7206', 'Seragam Satpam/driver,pelatihan satpam', '7000'),
('7207', 'Dispenser/Kulkas dll', '7000'),
('7208', 'Maintenance Fotocopy', '7000'),
('7209', 'Printer+Voice Recorder', '7000'),
('7210', 'Pembelian laptop,meja,UPS,pasang CCTV dll', '7000'),
('7211', 'Service Komputer/ac dll', '7000'),
('7212', 'Biaya sewa foto copy', '7000'),
('7213', 'Perbaikan gedung/instalasi & perawatan Kebun', '7000'),
('7214', 'Rapat Kerja,Rekreasi,Seminar dll', '7000'),
('7215', 'Biaya pendidikan/pengembangan guru', '7000'),
('7216', 'Biaya Audient Independent', '7000'),
('7217', 'Beasisiswa SD', '7000'),
('7218', 'Seragam siswa', '7000'),
('7219', 'PPDB', '7000'),
('7220', 'Biaya Pengindukan Siswa', '7000'),
('7221', 'Biaya HUT dan Pelepasan Siswa,dll', '7000'),
('7222', 'Biaya Perpanjangan STNK', '7000'),
('7223', 'Parcel', '7000'),
('7224', 'Penggantian transport/Perjalanan dinas', '7000'),
('7225', 'Biaya pelatihan guru/siswa, out bond, VL,dll', '7000'),
('7226', 'Service Mobil,Bis.dll', '7000'),
('7227', 'Biaya umum dll', '7000'),
('8001', 'Peny.Bangunan', '8000'),
('8002', 'Peny.Peralatan kantor SMK & ktr yayasan', '8000'),
('8003', 'Peny.Peralatan RPL', '8000'),
('8004', 'Peny.Peralatan MM', '8000'),
('8005', 'Peny.Peralatan BKP', '8000'),
('8006', 'Peny.Peralatan TKRO', '8000'),
('8007', 'Peny.Peralatan TB', '8000'),
('8008', 'Peny.Kendaraan', '8000'),
('9001', 'Pendapatan Bunga', '9000'),
('9002', 'Pendapatan Lain-lain', '9000'),
('9101', 'Bi Administrasi Bank', '9100'),
('9102', 'Bi Bunga (Pajak) Bank', '9100'),
('9103', 'Bi Lain-lain', '9100'),
('9104', 'PPh Final ps 4 ay 2', '9100'),
('9105', 'PPh 21', '9100'),
('9106', 'PPh 23', '9100'),
('9107', 'Ikhtisar Rugi Laba', '9100');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dezoditing012@gmail.com', '$2y$10$LqEvZGG4NmLIdr.Qbw6jeO6xjATTaVcPbEf/paRMRV/HS.ehyNHQG', '2021-10-05 00:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_kategori`
--

CREATE TABLE `p_kategori` (
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_kategori`
--

INSERT INTO `p_kategori` (`kategori`, `kode_kategori`) VALUES
('Aktiva Lancar', '1000'),
('Biaya Dibayar Dimuka', '1081'),
('PEMASUKAN', '4000'),
('PENGELUARAN (BIAYA-BIAYA) SMK BAGIMU NEGERIKU', '5000'),
('ASRAMA', '6000'),
('YAYASAN', '7000'),
('Biaya Aktiva', '8000'),
('PEMASUKAN LAIN-LAIN', '9000'),
('BIAYA LAIN-LAIN', '9100');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'yayasan', 'web', NULL, NULL),
(2, 'smk', 'web', NULL, NULL),
(3, 'asrama', 'web', NULL, NULL),
(4, 'pengguna', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `kode_perk` int(11) NOT NULL,
  `tipe` enum('awal','akhir') NOT NULL,
  `nominal` int(11) NOT NULL,
  `tahun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `kode_perk`, `tipe`, `nominal`, `tahun`) VALUES
(331, 1001, 'awal', 803560, '2021-10-06'),
(332, 1002, 'awal', 21439675, '2021-10-06'),
(333, 1003, 'awal', 34903338, '2021-10-06'),
(334, 1021, 'awal', 199637186, '2021-10-06'),
(335, 1022, 'awal', 14893752, '2021-10-06'),
(336, 1023, 'awal', 10703166, '2021-10-06'),
(337, 1024, 'awal', 1469000, '2021-10-06'),
(338, 1051, 'awal', 198760000, '2021-10-06'),
(339, 1052, 'awal', 137721000, '2021-10-06'),
(340, 1053, 'awal', 0, '2021-10-06'),
(341, 1321, 'awal', 250000000, '2021-10-06'),
(342, 1322, 'awal', 674662450, '2021-10-06'),
(343, 1323, 'awal', 287405846, '2021-10-06'),
(344, 1324, 'awal', 287405846, '2021-10-06'),
(345, 1325, 'awal', 569870000, '2021-10-06'),
(346, 1326, 'awal', 62805500, '2021-10-06'),
(347, 1327, 'awal', 867695800, '2021-10-06'),
(348, 1328, 'awal', 1673836500, '2021-10-06'),
(349, 1401, 'awal', 1056000000, '2021-10-06'),
(350, 1402, 'awal', 0, '2021-10-06'),
(351, 1403, 'awal', 0, '2021-10-06'),
(352, 1404, 'awal', 0, '2021-10-06'),
(353, 1405, 'awal', 0, '2021-10-06'),
(354, 1406, 'awal', 0, '2021-10-06'),
(355, 1407, 'awal', 0, '2021-10-06'),
(356, 1408, 'awal', 0, '2021-10-06'),
(357, 1710, 'awal', 0, '2021-10-06'),
(358, 1720, 'awal', 0, '2021-10-06'),
(359, 2021, 'awal', 0, '2021-10-06'),
(360, 2031, 'awal', 0, '2021-10-06'),
(361, 2032, 'awal', 0, '2021-10-06'),
(362, 2033, 'awal', 0, '2021-10-06'),
(363, 2034, 'awal', 0, '2021-10-06'),
(364, 2080, 'awal', 0, '2021-10-06'),
(365, 2090, 'awal', 0, '2021-10-06'),
(366, 3001, 'awal', 0, '2021-10-06'),
(367, 3002, 'awal', 0, '2021-10-06'),
(368, 3003, 'awal', 0, '2021-10-06'),
(369, 3004, 'awal', 0, '2021-10-06'),
(370, 3005, 'awal', 0, '2021-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `id_user`, `tanggal`) VALUES
(3, 0, '2021-09-17'),
(4, 0, '2021-09-21'),
(5, 0, '2021-09-22'),
(6, 0, '2021-09-22'),
(7, 1, '2021-09-22'),
(8, 1, '2021-09-22'),
(9, 1, '2021-09-22'),
(10, 1, '2021-09-22'),
(11, 1, '2021-09-22'),
(12, 1, '2021-09-23'),
(13, 1, '2021-09-23'),
(14, 1, '2021-09-23'),
(15, 1, '2021-09-23'),
(16, 1, '2021-09-23'),
(17, 14, '2021-09-24'),
(18, 14, '2021-09-24'),
(19, 14, '2021-09-24'),
(20, 13, '2021-09-27'),
(21, 14, '2021-09-28'),
(22, 19, '2021-09-28'),
(23, 19, '2021-09-28'),
(24, 19, '2021-09-29'),
(25, 19, '2021-01-29'),
(26, 19, '2021-09-26'),
(27, 19, '2021-09-19'),
(28, 19, '2021-09-03'),
(29, 19, '2021-09-29'),
(30, 19, '2021-09-30'),
(31, 19, '2021-09-30'),
(32, 19, '2021-02-28'),
(33, 19, '2021-09-30'),
(34, 19, '2021-10-04'),
(35, 19, '2021-10-04'),
(37, 19, '2021-10-05'),
(38, 19, '2021-10-05'),
(39, 19, '2021-10-05'),
(40, 21, '2021-10-05'),
(41, 21, '2021-10-05'),
(42, 21, '2021-10-05'),
(43, 21, '2021-10-05'),
(44, 19, '2021-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Dionisius Setya Hermawan', 'admin@role.test', NULL, '$2y$10$w2.NEl6RvLgwmUCcf22PfOz86.ll3YxYbA5jdMPoJ7GGHB33846Uy', NULL, '2021-09-23 20:12:21', '2021-09-23 20:12:21'),
(14, 'Dionisius Setya Hermawan', 'ikan@gmail.com', NULL, '$2y$10$RdbWy.vU2Bf5ecomluvkSuwgbnsASL/Z.GYF99fRVNr7UBIk2pla2', NULL, '2021-09-23 20:13:22', '2021-09-23 20:13:22'),
(15, 'Ikan Mas', 'ikanmas@gmail.com', NULL, '$2y$10$WIddYg3/3E/TotcDFCFFs.r2voHxPVEq0/PJY8BmZqR/9ahae6Qy2', NULL, '2021-09-26 20:00:14', '2021-09-26 20:00:14'),
(17, 'asrama', 'asrama@test.test', NULL, '$2y$10$1Z0WIm6acElf.T94kcXFyOks5abzX42xVgAe1keZxsCScDBs/ycdi', NULL, '2021-09-26 20:48:08', '2021-09-26 20:48:08'),
(19, 'Ahmad Ismail', 'ai@role.test', NULL, '$2y$10$BDuR0u/Gk17jbOUw0iH16erWNn6SPKyxmVghweu4vMOm23K8NBs7S', NULL, '2021-09-27 19:24:44', '2021-09-27 19:24:44'),
(20, 'Miki', 'miki@gmail.com', NULL, '$2y$10$Njr6v8.PfqttGHvIen5vOuPU18UzSFuXjEr1PGTzNvhzKGbOdhCe.', NULL, '2021-09-27 21:26:17', '2021-09-27 21:26:17'),
(21, 'kodularq', 'test@saja.ini', NULL, '$2y$10$rk.QcaDv1TsJEprVQsYD9OkJnMJNnhiQ/3YP0JIzP8gPaqg3G0PN6', NULL, '2021-09-27 21:36:34', '2021-09-27 21:36:34'),
(22, 'Akun', 'baru@role.test', NULL, '$2y$10$O5u8Hxf4ums0jAWQkAOBeec/oS0qJ9xCieKUJBTzS3vZUObbh6Ssq', NULL, '2021-09-28 18:29:03', '2021-09-28 18:29:03'),
(24, 'Dionisius Setya Hermawan', 'dezoditing012@gmail.com', NULL, '$2y$10$2Z0iT3USiZExlxK.f7tmWeAIIQdPhHu6MHCdmbWUVQDCnybRdqBdu', NULL, '2021-10-05 20:12:46', '2021-10-05 20:12:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_besar`
--
ALTER TABLE `buku_besar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_besar`
--
ALTER TABLE `buku_besar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
