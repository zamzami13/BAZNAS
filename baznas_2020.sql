-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 04:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baznas_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftbank`
--

CREATE TABLE `daftbank` (
  `id` int(10) UNSIGNED NOT NULL,
  `kodebank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `norekbank` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmrekbank` char(123) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soawal` decimal(19,2) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumberdana` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftbank`
--

INSERT INTO `daftbank` (`id`, `kodebank`, `namabank`, `singkatan`, `norekbank`, `nmrekbank`, `soawal`, `alamat`, `telpon`, `sumberdana`, `created_at`, `updated_at`) VALUES
(1, 'B001', 'Bank Pembangunan Daerah Jambi', 'Rek Zakat BPD', '501303388', 'Baznas Zakat Batang Hari', '2500000.00', 'Muara Bulian', '221022', 'Zakat', NULL, '2020-12-18 10:56:12'),
(2, 'B002', 'Bank Pembangunan Daerah Jambi', 'Rek Infaq BPD', '3000193371', 'Infaq Baznas Batang hari', '0.00', 'Muara Bulian', '211022', 'Infaq', NULL, '2020-11-11 12:37:16'),
(3, 'B003', 'Bank Syariah Mandiri', 'Rek Zakat BSM', '7125379979', 'Rek Zakat Baznas Batang Hari', '0.00', 'Rengas Condong, Muara Bulian, kabupaten Batang Hari', '33123', 'Zakat', NULL, '2020-11-11 12:37:26'),
(11, 'B004', 'Bank Syariah Mandiri', 'Rek Infaq BSM', '7125380403', 'Baznas Kabupaten Batang Hari', '0.00', 'Jalan Gajah Mada Muara Bulian', '223234', 'Infaq', '2020-10-26 07:59:23', '2020-11-11 12:37:38'),
(12, 'B005', 'Bank Rakyat Indonesia', 'Rek Zakat BRI', '0315-01-001273-30-8', 'Baznas Kabupaten Batang Hari', '0.00', 'Muara Bulian', '20232340', 'Zakat', '2020-10-27 04:37:03', '2020-11-11 12:37:51'),
(13, '0000', 'Tunai', 'Tunai', 'Tunai', 'Tunai', '0.00', '-', '-', 'Zakat', '2020-10-28 04:39:54', '2020-11-17 00:17:25'),
(14, 'B006', 'Bank Rakyat Indonesia', 'Rek Infaq BRI', '0315-01-000159-30-7', 'Baznas Kabupaten Batang Hari', '0.00', 'Muara Bulian', '20232340', 'Infaq', '2020-10-27 04:37:03', '2020-11-17 00:17:34'),
(15, 'B007', 'BPD Syariah', 'Rek Zakat BPD Syariah', '7001249058', 'Baznas Zakat Batang Hari', '0.00', 'Muara Bulian', '221022', 'Zakat', NULL, '2020-11-11 12:38:21'),
(16, 'B008', 'BPD Syariah', 'Rek Infaq BPD Syariah', '7001249047', 'Baznas infaq Batang Hari', '0.00', 'Muara Bulian', '221022', 'Infaq', NULL, '2020-11-11 12:38:30'),
(17, 'B009', 'Bank Rakyat Indonesia', 'Rek AMIL BRI', '031501001410308', 'Baznas AMIL Batang Hari', '0.00', 'Muara Bulian', '221022', 'Semua', NULL, '2020-11-17 00:17:44'),
(18, 'B009', 'Bank Pembangunan Daerah Jambi', 'Rek Hibah BPD', '501303917', 'Baznas Kab Batang Hari', '0.00', 'Muara Bulian', '221022', 'Hibah', NULL, '2020-11-17 00:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `matangd`
--

CREATE TABLE `matangd` (
  `id` int(10) UNSIGNED NOT NULL,
  `kdrek` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmrek` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('H','D','S') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdlevel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matangd`
--

INSERT INTO `matangd` (`id`, `kdrek`, `nmrek`, `type`, `kdlevel`, `created_at`, `updated_at`) VALUES
(1, '4.', 'PENERIMAAN', 'H', 1, NULL, '2020-11-01 13:16:33'),
(2, '4.1.', 'PENERIMAAN BAZNAS', 'H', 2, '2020-11-01 06:52:08', '2020-11-01 13:17:43'),
(3, '4.1.1.', 'PENERIMAAN DARI MUZAKKI', 'H', 3, '2020-11-01 06:55:27', '2020-11-01 13:18:05'),
(4, '4.1.1.01.', 'Penerimaan Zakat', 'D', 4, '2020-11-01 06:55:56', '2020-11-01 13:18:49'),
(5, '4.1.1.02.', 'Penerimaan Infaq', 'D', 4, '2020-11-01 06:56:22', '2020-11-01 13:19:00'),
(6, '4.1.2.', 'PENERIMAAN HIBAH', 'H', 3, '2020-11-01 06:57:32', '2020-11-01 13:18:33'),
(7, '4.1.2.01.', 'Penerimaan Hibah dari Pemerintah Pusat', 'D', 4, '2020-11-01 06:58:25', '2020-11-01 13:19:19'),
(8, '4.1.2.02.', 'Penerimaan Hibah dari Pemerintah Daerah', 'D', 4, '2020-11-01 06:58:57', '2020-11-01 13:19:29'),
(9, '4.1.2.03.', 'Penerimaan Hibah dari Lembaga/Organisasi', 'D', 4, '2020-11-01 06:59:55', '2020-11-01 13:19:40'),
(10, '4.1.2.04.', 'Penerimaan Hibah dari Individu/Orang', 'D', 4, '2020-11-01 07:01:02', '2020-11-01 13:19:51'),
(17, '1.1.2.', 'Saldo Bank', 'H', 3, NULL, '2020-12-02 08:20:05'),
(18, '6.', 'PEMBIAYAAN', 'H', 1, NULL, NULL),
(19, '6.1.', 'PEMBIAYAAN PENERIMAAN', 'H', 2, NULL, NULL),
(20, '6.1.1.', 'Hak Amil', 'S', 3, NULL, NULL),
(21, '4.2.', 'PENERIMAAN LAIN-LAIN', 'H', 2, '2020-11-27 02:37:55', '2020-11-27 02:37:55'),
(22, '4.2.1.', 'LAIN-LAIN PENDAPATAN', 'H', 3, '2020-11-27 02:48:05', '2020-11-27 02:49:01'),
(23, '4.2.1.01.', 'Bagi Hasil Bank', 'D', 4, '2020-11-27 02:49:27', '2020-11-27 02:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `matangr`
--

CREATE TABLE `matangr` (
  `id` int(10) UNSIGNED NOT NULL,
  `kdrek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmrek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdlevel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matangr`
--

INSERT INTO `matangr` (`id`, `kdrek`, `nmrek`, `type`, `kdlevel`, `created_at`, `updated_at`) VALUES
(1, '5.', 'Pengeluaran', 'H', 1, NULL, '2020-11-01 06:08:00'),
(2, '5.2.', 'Belanja', 'H', 2, NULL, '2020-11-01 06:08:16'),
(3, '5.2.1.', 'Belanja Pegawai', 'H', 3, '2020-10-22 12:31:21', '2020-10-22 12:31:21'),
(4, '5.2.1.01.', 'Honorarium Staf Sekretariat', 'D', 4, '2020-10-22 12:32:02', '2020-10-22 12:32:02'),
(5, '5.2.2.', 'Belanja Barang dan Jasa', 'H', 3, '2020-10-22 12:32:52', '2020-10-22 12:32:52'),
(6, '5.2.1.02.', 'Uang Lembur', 'D', 4, '2020-10-22 12:33:42', '2020-10-22 12:33:42'),
(7, '5.1.', 'Penyaluran', 'H', 2, '2020-11-01 05:01:42', '2020-11-01 06:07:48'),
(9, '5.1.1.', 'Penyaluran Dana', 'H', 3, '2020-11-01 06:10:05', '2020-11-01 06:10:05'),
(10, '5.1.1.01.', 'Penyaluran Dana Zakat', 'D', 4, '2020-11-01 06:10:57', '2020-11-01 06:10:57'),
(11, '5.2.2.01.', 'Belanja Alat Tulis Kantor', 'D', 4, '2020-11-01 06:12:32', '2020-11-01 06:12:32'),
(12, '5.1.1.02.', 'Penyaluran Dana Infaq', 'D', 4, '2020-11-01 06:13:39', '2020-11-01 06:13:39'),
(13, '5.2.2.02.', 'Belanja Langganan Listrik', 'D', 4, '2020-11-01 06:16:01', '2020-11-01 06:16:01'),
(14, '5.2.2.03.', 'Belanja Langganan Telpon, Internet', 'D', 4, '2020-11-01 06:23:10', '2020-11-01 06:35:39'),
(16, '1.1.1.', 'Saldo Tunai', 'S', 3, NULL, '2020-11-01 06:08:00'),
(17, '5.2.2.04.', 'Belanja Langganan Air', 'D', 4, '2020-11-17 01:08:02', '2020-11-17 01:08:02'),
(18, '5.3.', 'HIBAH', 'H', 2, '2020-11-17 01:08:31', '2020-11-17 01:08:31'),
(19, '5.3.1.', 'Belanja Hibah', 'D', 3, '2020-11-17 01:09:09', '2020-11-17 01:09:09'),
(20, '5.2.2.05.', 'Belanja Administrasi Bank', 'D', 4, NULL, NULL),
(21, '5.2.2.06.', 'Biaya Pengiriman/Paket', 'D', 4, NULL, NULL),
(22, '5.2.2.07.', 'Belanja Bahan Kebersihan', 'D', 4, NULL, NULL),
(23, '5.2.2.08.', 'Biaya Fotocopy/Jilid', 'D', 4, NULL, NULL),
(24, '5.2.2.09.', 'Belanja Cetak', 'D', 4, NULL, NULL),
(25, '5.2.2.10.', 'Belanja Dokumentasi/Publikasi', 'D', 4, NULL, NULL),
(26, '5.2.2.11.', 'Belanja Sewa', 'D', 4, NULL, NULL),
(27, '5.2.2.12.', 'Honorarium Nara Sumber', 'D', 4, NULL, NULL),
(28, '5.2.2.13.', 'Honorarium Moderator', 'D', 4, NULL, NULL),
(29, '5.2.2.14.', 'Honorarium Panitia', 'D', 4, NULL, NULL),
(30, '5.2.2.15.', 'Uang Transportasi Peserta', 'D', 4, NULL, NULL),
(31, '5.2.2.16.', 'Uang Saku Peserta', 'D', 4, NULL, NULL),
(32, '5.2.2.17.', 'Belanja Perlengkapan Kegiatan', 'D', 4, NULL, NULL),
(33, '5.2.2.18.', 'Belanja Pakaian Seragam', 'D', 4, NULL, NULL),
(34, '5.2.2.19.', 'Belanja Makan dan Minum', 'D', 4, NULL, NULL),
(35, '5.2.3.', 'Belanja Modal', 'H', 3, NULL, NULL),
(36, '5.2.3.01.', 'Belanja Modal Gedung', 'D', 4, NULL, NULL),
(37, '5.2.3.02.', 'Belanja Modal Komputer / PC', 'D', 4, NULL, NULL),
(38, '5.2.3.03.', 'Belanja Modal Laptop', 'D', 4, NULL, NULL),
(39, '5.2.3.04.', 'Belanja Modal Kendaraan Bermotor', 'D', 4, NULL, NULL),
(40, '5.2.3.05.', 'Belanja Modal Peralatan dan Perlengkapan Kantor', 'D', 4, NULL, NULL),
(41, '5.2.2.20.', 'Biaya Perjalanan Dinas', 'D', 4, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_10_21_110016_create_daftbank_table', 1),
(4, '2020_10_21_112957_create_matangr_table', 2),
(5, '2020_11_01_084609_create_matangd_table', 3),
(6, '2020_11_01_171551_create_penerimaan_table', 4),
(7, '2020_11_01_173500_create_penerimaandet_table', 5),
(8, '2020_11_13_003330_create_pergeseran_table', 6),
(9, '2020_11_30_143347_create_saldoawaltunai_table', 7),
(10, '2020_12_21_205700_create_pejabat_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id`, `jabatan`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'KETUA', 'Drs. H. BAIHAQI', NULL, NULL),
(2, 'BENDAHARA', 'ZARTINI, SE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenistransaksi` enum('Transfer','Tunai','Pergeseran','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomasuk` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `donatur` char(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftbank_id` int(11) NOT NULL,
  `rekpengirim` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `jenistransaksi`, `nomasuk`, `tanggal`, `donatur`, `daftbank_id`, `rekpengirim`, `bukti`, `uraian`, `created_at`, `updated_at`) VALUES
(54, 'Transfer', 'M-001', '2020-12-01', 'Pemda Batang Hari', 1, 'BPD 1009031011', 'Slip Transfer BPD 20202034', 'Zakat ASN Bulan November', '2020-12-01 09:31:13', '2020-12-02 06:42:44'),
(60, 'Transfer', 'MdK-001', '2020-12-02', 'Baznas Batanghari', 17, 'Rek Zakat BPD - 501303388', '-', 'Hak Amil OKtober-November', '2020-12-02 06:42:10', '2020-12-02 06:42:10'),
(61, 'Transfer', 'M-003', '2020-12-02', 'Pemda Batang Hari', 18, 'BPD 1009031011', 'SP2D NO 20200/LS/2020', 'Hibah dari Pemda Batang Hari', '2020-12-02 08:31:20', '2020-12-02 08:31:20'),
(62, 'Transfer', 'M-006', '2020-12-02', 'Pak Bejo', 11, '-', '-', 'Infaq Bejo', '2020-12-02 08:44:16', '2020-12-02 08:44:16'),
(63, 'Transfer', 'M-212', '2020-12-02', 'BANK', 1, 'BPD 1009031011', '-', 'Bunga Bank BPD', '2020-12-02 09:00:23', '2020-12-02 09:00:23'),
(64, 'Transfer', 'M-077', '2020-12-07', 'Kantor Kemenag', 12, 'BRI 33490930', '-', 'Zakat dari ASN Kantor KEMENAG Batang Hari bulan Desember', '2020-12-07 12:07:06', '2020-12-07 12:07:06'),
(65, 'Transfer', 'M-398', '2020-12-09', 'Baznas', 14, '-', '-', 'Bunga Bank', '2020-12-09 15:24:46', '2020-12-09 15:24:46'),
(66, 'Transfer', 'M-229', '2020-12-09', '-', 12, '-', '-', 'Bunga Bank Rek Zakat BRI', '2020-12-09 15:26:35', '2020-12-09 15:26:35'),
(67, 'Transfer', 'M-341', '2020-12-10', 'Bank', 18, '-', '-', 'Pendapatan Bunga dari Rekening Hibah', '2020-12-09 20:38:13', '2020-12-09 20:38:13'),
(68, 'Transfer', 'M-543', '2020-12-10', '-', 17, '-', '-', 'Bunga Rek Amil', '2020-12-10 02:47:24', '2020-12-10 02:47:24'),
(69, 'Transfer', 'M-520', '2020-12-18', 'Kantor Pengadilan Agama', 1, '-', '-', 'Penerimaan Zakat dari Kantor PA', '2020-12-18 05:12:36', '2021-01-31 20:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaandet`
--

CREATE TABLE `penerimaandet` (
  `id` int(10) UNSIGNED NOT NULL,
  `penerimaan_id` int(11) NOT NULL,
  `matangd_id` int(11) NOT NULL,
  `jumlah` decimal(19,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimaandet`
--

INSERT INTO `penerimaandet` (`id`, `penerimaan_id`, `matangd_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(72, 54, 4, '500000000.00', '2020-12-01 09:31:13', '2020-12-02 06:42:44'),
(78, 60, 20, '20000000.00', '2020-12-02 06:42:10', '2020-12-02 06:42:10'),
(79, 61, 8, '200000000.00', '2020-12-02 08:31:21', '2020-12-02 08:31:21'),
(80, 62, 5, '22000000.00', '2020-12-02 08:44:16', '2020-12-02 08:44:16'),
(81, 63, 23, '4210000.00', '2020-12-02 09:00:23', '2020-12-02 09:00:23'),
(82, 64, 4, '17000000.00', '2020-12-07 12:07:06', '2020-12-07 12:07:06'),
(83, 65, 23, '25000.00', '2020-12-09 15:24:46', '2020-12-09 15:24:46'),
(84, 66, 23, '32000.00', '2020-12-09 15:26:35', '2020-12-09 15:26:35'),
(85, 67, 23, '55500.00', '2020-12-09 20:38:13', '2020-12-09 20:38:13'),
(86, 68, 23, '10000000.00', '2020-12-10 02:47:24', '2020-12-10 02:47:24'),
(87, 69, 4, '2000000.00', '2020-12-18 05:12:36', '2021-01-31 20:11:53'),
(88, 69, 5, '330000.00', '2020-12-18 05:12:36', '2021-01-31 20:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `jenistransaksi` enum('Transfer','Tunai','Pergeseran','') NOT NULL,
  `nokeluar` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `daftbank_id` int(11) NOT NULL,
  `rekpenerima` varchar(50) DEFAULT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `uraian` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `jenistransaksi`, `nokeluar`, `tanggal`, `penerima`, `daftbank_id`, `rekpenerima`, `bukti`, `uraian`, `created_at`, `updated_at`) VALUES
(51, 'Transfer', 'K-001', '2020-12-02', 'AMIL - BAZNAS', 1, 'Rek AMIL BPD - 40021120', '-', 'Hak Amil OKtober-November', '2020-12-02 06:42:10', '2020-12-02 06:42:10'),
(52, 'Tunai', 'K-002', '2020-12-02', 'PLN dan PDM', 13, '-', 'Kwitansi 21288', 'Bayar Telpon dan listrik', '2020-12-02 06:46:29', '2020-12-02 06:46:29'),
(53, 'Tunai', 'K-004', '2020-12-02', 'Mas Joko', 13, '-', 'Kwitansi 21288', 'Honorarium Petugas Baznas Bulan Oktober', '2020-12-02 08:35:36', '2020-12-02 08:35:36'),
(54, 'Transfer', 'K-005', '2020-12-02', 'Muhammad abduh', 18, 'BPD-209093', 'Slip Transfer BPD 208888', 'Pembelian Alat Tulis Kantor', '2020-12-02 08:38:18', '2020-12-02 08:38:18'),
(56, 'Tunai', 'K-006', '2020-12-02', 'Masyarakat Kecamatan Muara Bulian', 13, '-', '-', 'Penyaluran Zakat untuk Masyarakat Kecamatan Muara Bulian', '2020-12-02 08:42:17', '2020-12-02 08:42:17'),
(57, 'Tunai', 'K-014', '2020-12-02', 'Rombongan Jamaah', 13, '-', '-', 'Penyaluran Dana Infaq', '2020-12-02 08:53:20', '2020-12-02 08:53:20'),
(58, 'Transfer', 'K-015', '2020-12-02', 'Madrasah Aliyah', 11, 'BPD-209093', '-', 'Transfer Penyaluran Infaq  Ke MAN BUlian', '2020-12-02 08:57:21', '2020-12-02 08:57:21'),
(59, 'Transfer', 'K-016', '2020-12-02', '-', 1, 'BPD-209093', '-', 'Biaya Administrasi Bank', '2020-12-02 09:03:19', '2020-12-02 09:03:19'),
(60, 'Tunai', 'K-018', '2020-12-02', '-', 13, '-', '-', 'Pemanfaatan BUnga bank untuk Hibah  Pembangunan WC pontresn', '2020-12-02 09:24:28', '2020-12-02 09:24:28'),
(63, 'Tunai', 'K-020', '2020-12-05', 'Budi', 13, '-', '-', 'Penyaluran Infaq', '2020-12-05 07:17:16', '2020-12-05 07:17:16'),
(69, 'Tunai', 'K-222', '2020-12-05', 'Muhammad abduh', 13, '-', '-', 'Honorarium  Bulan Agustus', '2020-12-05 15:23:46', '2020-12-05 15:23:46'),
(70, 'Transfer', 'K-295', '2020-12-09', '-', 12, '-', '-', 'Biaya Administrasi Bank', '2020-12-09 15:31:29', '2020-12-09 15:31:29'),
(72, 'Transfer', 'K-332', '2020-12-10', '-', 18, '-', '-', 'Biaya Administrasi Bank', '2020-12-09 20:56:03', '2020-12-09 20:56:03'),
(73, 'Transfer', 'K-879', '2020-12-10', '-', 17, '-', '-', 'Biaya ADM Bank', '2020-12-10 02:57:59', '2020-12-10 02:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluarandet`
--

CREATE TABLE `pengeluarandet` (
  `id` int(11) NOT NULL,
  `pengeluaran_id` int(11) NOT NULL,
  `matangr_id` int(11) NOT NULL,
  `jumlah` decimal(19,2) NOT NULL,
  `sumberdana` enum('Z','I','H','A') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluarandet`
--

INSERT INTO `pengeluarandet` (`id`, `pengeluaran_id`, `matangr_id`, `jumlah`, `sumberdana`, `created_at`, `updated_at`) VALUES
(61, 51, 10, '20000000.00', 'Z', '2020-12-02 06:42:10', '2020-12-02 13:42:10'),
(62, 52, 13, '1000000.00', 'A', '2020-12-02 06:46:29', '2020-12-02 13:46:29'),
(63, 52, 14, '1000000.00', 'A', '2020-12-02 06:46:29', '2020-12-02 13:46:29'),
(64, 53, 4, '2000000.00', 'H', '2020-12-02 08:35:36', '2020-12-02 15:35:36'),
(65, 53, 6, '1000000.00', 'H', '2020-12-02 08:35:36', '2020-12-02 15:35:36'),
(66, 54, 11, '12000000.00', 'H', '2020-12-02 08:38:18', '2020-12-02 15:38:18'),
(67, 56, 10, '185750000.00', 'Z', '2020-12-02 08:42:17', '2020-12-02 15:42:17'),
(68, 57, 12, '10000000.00', 'I', '2020-12-02 08:53:20', '2020-12-02 15:53:20'),
(69, 58, 12, '7500000.00', 'I', '2020-12-02 08:57:21', '2020-12-02 15:57:21'),
(70, 59, 20, '210000.00', 'A', '2020-12-02 09:03:19', '2020-12-02 16:03:19'),
(71, 60, 19, '1000000.00', 'A', '2020-12-02 09:24:28', '2020-12-02 16:24:28'),
(73, 63, 12, '1500000.00', 'I', '2020-12-05 07:17:16', '2020-12-05 14:17:16'),
(80, 69, 4, '2500000.00', 'H', '2020-12-05 15:23:46', '2020-12-05 22:23:46'),
(81, 70, 20, '2000.00', 'A', '2020-12-09 15:31:29', '2020-12-09 22:31:29'),
(83, 72, 20, '5500.00', 'A', '2020-12-09 20:56:03', '2020-12-10 03:56:03'),
(84, 73, 20, '500000.00', 'A', '2020-12-10 02:57:59', '2020-12-10 09:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `pergeseran`
--

CREATE TABLE `pergeseran` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenistransaksi` enum('kebank','ketunai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodetrans` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `daftbank_id` int(11) NOT NULL,
  `bukti` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` decimal(19,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pergeseran`
--

INSERT INTO `pergeseran` (`id`, `jenistransaksi`, `nomor`, `kodetrans`, `tanggal`, `daftbank_id`, `bukti`, `uraian`, `jumlah`, `created_at`, `updated_at`) VALUES
(22, 'ketunai', 'BT-001', NULL, '2020-12-02', 17, '-', 'Penarikan Dana hak amil untuk belanja opeasional', '15000000.00', '2020-12-02 06:45:02', '2020-12-02 06:45:02'),
(23, 'ketunai', 'BT-002', NULL, '2020-12-02', 18, 'Slip Penarikan BPD 20202034', 'Pergeseran Dana Hibah', '100000000.00', '2020-12-02 08:32:27', '2020-12-02 08:32:27'),
(24, 'ketunai', 'BT-003', NULL, '2020-12-02', 1, '-', 'Penarikan untuk Penyaluran Zakat untuk Kecamatan Muara Bulian', '300000000.00', '2020-12-02 08:39:44', '2020-12-02 08:39:44'),
(25, 'ketunai', 'BT-004', NULL, '2020-12-02', 11, '-', 'Penarikan Dana Infaq', '12000000.00', '2020-12-02 08:52:20', '2020-12-02 08:52:20'),
(26, 'ketunai', 'BT-009', 1, '2020-12-02', 1, '-', 'Pergeseran Bunga Bank ke Tunai', '1000000.00', '2020-12-02 09:20:10', '2020-12-02 09:20:10'),
(27, 'kebank', 'TB-001', NULL, '2020-12-07', 1, '-', 'Penyetoran sisa Dana Zakat yang belum disalurkan', '10000000.00', '2020-12-07 12:02:32', '2020-12-07 12:02:32'),
(28, 'ketunai', 'TB-491', 1, '2020-12-10', 18, '-', 'Geser Bank Ke Tunai', '50000.00', '2020-12-09 22:35:29', '2020-12-09 22:35:29'),
(30, 'ketunai', 'TB-444', 1, '2020-12-10', 12, '-', 'Penarikan Tunai Bunga Rek zakat BRI', '30000.00', '2020-12-10 00:02:35', '2020-12-10 00:37:09'),
(31, 'ketunai', 'TB-229', 1, '2020-12-10', 17, '-', 'Penarikan Bunga Rekening', '5000000.00', '2020-12-10 02:55:05', '2020-12-10 02:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `saldoawaltunai`
--

CREATE TABLE `saldoawaltunai` (
  `id` int(10) UNSIGNED NOT NULL,
  `namasaldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` decimal(19,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saldoawaltunai`
--

INSERT INTO `saldoawaltunai` (`id`, `namasaldo`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 'Zakat', '100.00', NULL, NULL),
(2, 'Infaq', '200.00', NULL, NULL),
(3, 'Hibah', '300.00', NULL, NULL),
(4, 'Amil', '400.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$hXTMFAe9keG0PKDmHURLi.ayun97fVnasanGymd4hSzmWbk4ahBs2', 'Drmhl5wbkT2ywBXmfrERQQCT6QcKmOEbGsm1XpEtjeoAXcQrdQYKmoFM7LNN', '2020-10-23 05:13:17', '2020-10-23 05:13:17'),
(2, 'bendahara', 'Zartini', 'bendahara@gmail.com', NULL, '$2y$10$xig0t7KwNa3.N4XvAlneHuQWheJ3W4pneSf7Nuw/UylrcNQqp4wTi', 'PJMo05WGYYfechwKqnysjGSpU4XtSEFI99B2HP3AkZxPT96YbQmifPhmbviy', '2020-10-23 10:03:46', '2020-10-24 08:29:02'),
(5, 'pimpinan', 'H. Baihaqi Syam', 'baih@gmail.com', NULL, '$2y$10$7h8RYm8elkOk.X.M6HEGwePM5t4ZxsCnxbn5/ecEgAMgIxW77xz1m', '9JI4278213Ri27WvzfpjLdeNgbQbHWV9mkHM6KFthTAA1RFi8bMyEe6m3oQy', '2020-10-24 06:19:42', '2020-10-24 11:01:27'),
(9, 'auditor', 'HAR Zamzami', 'mik@gmail.com', NULL, '$2y$10$QH1CFylQKpKrZiI.6ibYS.D7m8BKpGKIR4kT3j8AC7q.VzldjOjjO', 'bgMoMYMtRi4TuRskRpB7TBWkukfksS8LYkxllVMLmjmO5GNdp3jR600ZQfdJ', '2020-10-24 11:09:34', '2020-10-24 11:11:32'),
(10, 'pimpinan', 'H. M. Amin S', 'amin@gmail.com', NULL, '$2y$10$GQifk6cr1l07rgs1QdD1A.Tc8TU.qMyRZAPZ/tMr9/yROKy7r81/m', 'TbtXgSNCXktv7CeXAGrvPkRrCQERt2DZ9GUJSxQCBktRDtqu7RqCAdlZavLE', '2020-10-24 11:10:03', '2020-10-24 11:14:07'),
(11, 'pimpinan', 'Maulana', 'maul@gmail.com', NULL, '$2y$10$IQOJcGVOb/u9baqcxXV/EeokC59Z7OjWnaU.e98McWgDIeWCN9v26', 'l0zJojHbDGsrIAPslzX0sggCtLL8NKQPA04yJQA3726o7ceJTUdG9nrsy1QG', '2020-10-26 06:19:06', '2020-10-26 06:19:06'),
(12, 'pimpinan', 'Feri Warsa', 'feri@gmail.com', NULL, '$2y$10$n39vJO9a/3yKWZI6IoHRuuF1/7wvpSs6xXXBoWXlKvsahjECpCfIi', 'Q20gW5SGTKgz2W6obrwixf1DPcGqyTpZt6cXluRbzJwhj6meqTOPLwa51vl9', '2020-10-26 06:22:41', '2020-10-26 06:22:41'),
(13, 'pimpinan', 'bunjamin', 'bunjamin@gmail.com', NULL, '$2y$10$dzv7HYwNPG1vfjESGvQTX.Ik2WFvZVw2mgEZpD99iTSb3VpPvw75C', 'uVMEBTxOXuBtEZN5ABmRhF1JMCyIysRcGYG3MLkgeVyRn3ER0jOkfKKK3Mo5', '2020-10-26 06:23:25', '2020-10-26 06:23:25'),
(14, 'auditor', 'auditor', 'auditor@gmail.com', NULL, '$2y$10$Wx0ar7ol/hro321/7Bd.0eF0I8Ll/rpJZ/ftvjFA1mVI3mdsfYeFS', 'IfFo2iPBCNoHnEsUY1Xs1bFd8kKAOoCM7Ebuuor8TDbacftAghAcbLhvLTPo', '2020-10-26 06:25:16', '2020-10-26 06:25:16'),
(20, 'pimpinan', 'Jono', 'jon@gmail.com', NULL, '$2y$10$eZHJm9PeAAsrSxCPV8lqcuIl07Q4P3Aq/UYgIJZkHJYEgKasWotmO', 'R3zOkSkCHgtZHegKkfzPgO4WDF9sZ8SsV5uSSwapSx1t21ngO6ga2LNdiWL9', '2020-11-01 02:10:41', '2020-11-01 02:10:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftbank`
--
ALTER TABLE `daftbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matangd`
--
ALTER TABLE `matangd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kdrek` (`kdrek`);

--
-- Indexes for table `matangr`
--
ALTER TABLE `matangr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kdrek` (`kdrek`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomasuk` (`nomasuk`);

--
-- Indexes for table `penerimaandet`
--
ALTER TABLE `penerimaandet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokeluarunique` (`nokeluar`);

--
-- Indexes for table `pengeluarandet`
--
ALTER TABLE `pengeluarandet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pergeseran`
--
ALTER TABLE `pergeseran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldoawaltunai`
--
ALTER TABLE `saldoawaltunai`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `daftbank`
--
ALTER TABLE `daftbank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `matangd`
--
ALTER TABLE `matangd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `matangr`
--
ALTER TABLE `matangr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `penerimaandet`
--
ALTER TABLE `penerimaandet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pengeluarandet`
--
ALTER TABLE `pengeluarandet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `pergeseran`
--
ALTER TABLE `pergeseran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `saldoawaltunai`
--
ALTER TABLE `saldoawaltunai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
