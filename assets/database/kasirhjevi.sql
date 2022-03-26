-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 02:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirhjevi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek`
--

CREATE TABLE `cek` (
  `id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `ket` varchar(121) DEFAULT NULL,
  `brg` varchar(121) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cek`
--

INSERT INTO `cek` (`id`, `nilai`, `ket`, `brg`, `date`) VALUES
(102, 1, 'awal', NULL, '2022-03-23 10:21:36'),
(103, 1, 'awal', NULL, '2022-03-23 10:22:52'),
(104, 1, 'awal', 'Indomie goreng rendang', '2022-03-23 10:24:52'),
(105, 1, 'insert', 'Spidol Snowman Hitam Biasa', '2022-03-23 11:42:53'),
(106, 1, 'insert', 'Marlboro Black 16 batang', '2022-03-23 11:43:05'),
(107, 1, 'insert', 'Marlboro Black 16 batang', '2022-03-23 11:43:05'),
(108, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:14:37'),
(109, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:14:37'),
(110, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:14:37'),
(111, 1, 'insert', 'Spidol Snowman Hitam Biasa', '2022-03-23 12:19:06'),
(112, 2, 'update', 'Spidol Snowman Hitam Biasa', '2022-03-23 12:19:06'),
(113, 1, 'insert', 'Spidol Snowman Hitam Biasa', '2022-03-23 12:19:06'),
(114, 1, 'insert', 'Spidol Snowman Hitam Biasa', '2022-03-23 12:19:06'),
(115, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:19:57'),
(116, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:19:57'),
(117, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:19:57'),
(118, 2, 'update', 'AMh Jahe kuning Pcs', '2022-03-23 12:19:57'),
(119, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:20:23'),
(120, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:20:23'),
(121, 1, 'insert', 'AMh Jahe kuning Pcs', '2022-03-23 12:20:23'),
(122, 2, 'update', 'AMh Jahe kuning Pcs', '2022-03-23 12:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barcode` varchar(16) DEFAULT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_harjul_grosir` double DEFAULT NULL,
  `barang_stok` int(11) DEFAULT 0,
  `barang_min_stok` int(11) DEFAULT 0,
  `barang_tgl_input` timestamp NULL DEFAULT current_timestamp(),
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL,
  `barang_satuan_id` int(11) DEFAULT NULL,
  `barang_suplier_id` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `id` int(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barcode`, `barang_nama`, `barang_harpok`, `barang_harjul`, `barang_harjul_grosir`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`, `barang_satuan_id`, `barang_suplier_id`, `active`, `id`) VALUES
('BR000001', '8992761164485', 'Pulpy Minute Maid Natadecoco 300Ml', 7800, 9800, 9000, 146, 1, '2022-03-21 06:44:10', NULL, 6, 1, 10, 7, '1', 1),
('BR000002', '4970129727514', 'Spidol Snowman Hitam Biasa', 6700, 7400, 7200, 26, 1, '2022-03-21 06:45:50', NULL, 8, 1, 10, 7, '1', 2),
('BR000003', '8997018259549', 'AMh Jahe kuning Pcs', 1000, 1500, 1200, 146, 1, '2022-03-21 06:47:31', '2022-03-22 01:05:34', 6, 1, 10, 7, '1', 3),
('BR000004', '089686910704', 'Indomie goreng rendang', 1890, 2500, 2200, 155, 1, '2022-03-21 17:13:16', NULL, 7, 1, 10, 8, '1', 4),
('BR000005', '8999909002821', 'Marlboro Black 16 batang', 22000, 24300, 24000, 151, 1, '2022-03-22 12:59:59', NULL, 8, 1, 10, 8, '1', 5),
('BR000006', '8999168211330', 'Esse Punch POP Manggo 16', 21000, 24300, 23000, 27, 1, '2022-03-24 09:43:09', '2022-03-24 16:45:04', 8, 4, 10, 8, '1', 6),
('BR000007', 'BR000007', 'Nivea Men cool kick green 50Ml', 17000, 21000, 19500, 138, 1, '2022-03-25 09:17:56', NULL, 9, 1, 10, 8, '1', 7),
('BR000008', 'BR000008', 'Nuvo Handsanitizer 50ML', 5400, 6500, 6200, 143, 1, '2022-03-25 22:53:13', '2022-03-26 05:53:38', 10, 2, 10, 8, '1', 8),
('BR000009', 'BR000009', 'Kayu Putih 15Ml Caplang ', 7200, 8100, 8000, 121, 1, '2022-03-25 22:56:45', '2022-03-26 05:57:37', 10, 2, 10, 7, '1', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_beli`
--

INSERT INTO `tbl_beli` (`beli_nofak`, `beli_tanggal`, `beli_suplier_id`, `beli_user_id`, `beli_kode`) VALUES
('PYT45221321321', '2022-03-23', 8, 1, 'BL230322000001'),
('KJH88742098', '2022-03-23', 8, 1, 'BL230322000002'),
('KJH887421214', '2022-03-25', 8, 1, 'BL250322000001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_beli`
--

INSERT INTO `tbl_detail_beli` (`d_beli_id`, `d_beli_nofak`, `d_beli_barang_id`, `d_beli_harga`, `d_beli_jumlah`, `d_beli_total`, `d_beli_kode`) VALUES
(15, 'PYT45221321321', 'BR000005', 22000, 12, 264000, 'BL230322000001'),
(16, 'PYT45221321321', 'BR000003', 1000, 21, 21000, 'BL230322000001'),
(17, 'KJH88742098', 'BR000001', 7800, 12, 93600, 'BL230322000002'),
(18, 'KJH88742098', 'BR000004', 18900, 21, 396900, 'BL230322000002'),
(19, 'KJH887421214', 'BR000005', 22000, 9, 198000, 'BL250322000001'),
(20, 'KJH887421214', 'BR000002', 6700, 2, 13400, 'BL250322000001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(151, '240322000001', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24300, 3, 0, 72900),
(152, '240322000001', 'BR000003', 'AMh Jahe kuning Pcs', 'Pcs', 1000, 1500, 1, 0, 1500),
(153, '240322000001', 'BR000004', 'Indomie goreng rendang', 'Pcs', 18900, 2500, 1, 0, 2500),
(154, '240322000001', 'BR000001', 'Pulpy Minute Maid Natadecoco 300Ml', 'Pcs', 7800, 9800, 1, 0, 9800),
(155, '240322000001', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7400, 1, 0, 7400),
(156, '240322000003', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24300, 1, 0, 24300),
(157, '240322000003', 'BR000004', 'Indomie goreng rendang', 'Pcs', 18900, 2500, 1, 0, 2500),
(158, '240322000003', 'BR000001', 'Pulpy Minute Maid Natadecoco 300Ml', 'Pcs', 7800, 9800, 1, 0, 9800),
(159, '240322000004', 'BR000001', 'Pulpy Minute Maid Natadecoco 300Ml', 'Pcs', 7800, 9800, 1, 0, 9800),
(160, '240322000004', 'BR000004', 'Indomie goreng rendang', 'Pcs', 18900, 2500, 1, 0, 2500),
(161, '240322000004', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24300, 1, 0, 24300),
(162, '240322000005', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7400, 1, 0, 7400),
(163, '240322000006', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24000, 1, 0, 24000),
(164, '240322000006', 'BR000004', 'Indomie goreng rendang', 'Pcs', 18900, 2200, 1, 0, 2200),
(165, '240322000006', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7200, 1, 0, 7200),
(166, '240322000007', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7200, 1, 0, 7200),
(167, '240322000007', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24000, 1, 0, 24000),
(168, '240322000008', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7400, 1, 0, 7400),
(169, '240322000008', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24300, 1, 0, 24300),
(170, '240322000009', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24300, 1, 0, 24300),
(171, '240322000010', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7400, 1, 0, 7400),
(172, '250322000001', 'BR000003', 'AMh Jahe kuning Pcs', 'Pcs', 1000, 1500, 1, 0, 1500),
(173, '250322000001', 'BR000006', 'Esse Punch POP Manggo 16', 'Pcs', 21000, 24300, 1, 0, 24300),
(174, '250322000001', 'BR000004', 'Indomie goreng rendang', 'Pcs', 1890, 2500, 1, 0, 2500),
(175, '250322000002', 'BR000003', 'AMh Jahe kuning Pcs', 'Pcs', 1000, 1500, 1, 0, 1500),
(176, '250322000002', 'BR000006', 'Esse Punch POP Manggo 16', 'Pcs', 21000, 24300, 1, 0, 24300),
(177, '250322000003', 'BR000001', 'Pulpy Minute Maid Natadecoco 300Ml', 'Pcs', 7800, 9800, 1, 0, 9800),
(178, '250322000003', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24300, 1, 0, 24300),
(179, '250322000003', 'BR000006', 'Esse Punch POP Manggo 16', 'Pcs', 21000, 24300, 1, 0, 24300),
(180, '260322000001', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7400, 1, 0, 7400),
(181, '260322000001', 'BR000001', 'Pulpy Minute Maid Natadecoco 300Ml', 'Pcs', 7800, 9800, 1, 0, 9800),
(182, '260322000001', 'BR000004', 'Indomie goreng rendang', 'Pcs', 1890, 2500, 1, 0, 2500),
(183, '260322000002', 'BR000007', 'Nivea Men cool kick green 50Ml', 'Pcs', 17000, 21000, 1, 0, 21000),
(184, '260322000002', 'BR000006', 'Esse Punch POP Manggo 16', 'Pcs', 21000, 24300, 1, 0, 24300),
(185, '260322000002', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24300, 1, 0, 24300),
(186, '260322000003', 'BR000003', 'AMh Jahe kuning Pcs', 'Pcs', 1000, 1500, 2, 0, 3000),
(187, '260322000003', 'BR000007', 'Nivea Men cool kick green 50Ml', 'Pcs', 17000, 21000, 1, 0, 21000),
(188, '260322000003', 'BR000001', 'Pulpy Minute Maid Natadecoco 300Ml', 'Pcs', 7800, 9800, 1, 0, 9800),
(189, '260322000004', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7200, 1, 0, 7200),
(190, '260322000004', 'BR000003', 'AMh Jahe kuning Pcs', 'Pcs', 1000, 1200, 1, 0, 1200),
(191, '260322000004', 'BR000005', 'Marlboro Black 16 batang', 'Pcs', 22000, 24000, 1, 0, 24000),
(192, '260322000005', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7200, 1, 0, 7200),
(193, '260322000005', 'BR000004', 'Indomie goreng rendang', 'Pcs', 1890, 2200, 1, 0, 2200),
(194, '260322000006', 'BR000004', 'Indomie goreng rendang', 'Pcs', 1890, 2500, 1, 0, 2500),
(195, '260322000006', 'BR000001', 'Pulpy Minute Maid Natadecoco 300Ml', 'Pcs', 7800, 9800, 1, 0, 9800),
(196, '260322000006', 'BR000002', 'Spidol Snowman Hitam Biasa', 'Pcs', 6700, 7400, 1, 0, 7400),
(197, '260322000007', 'BR000003', 'AMh Jahe kuning Pcs', 'Pcs', 1000, 1200, 1, 0, 1200),
(198, '260322000007', 'BR000007', 'Nivea Men cool kick green 50Ml', 'Pcs', 17000, 19500, 1, 0, 19500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL,
  `jual_member_id` int(11) DEFAULT NULL,
  `jual_deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`, `jual_member_id`, `jual_deskripsi`) VALUES
('240322000001', '2022-03-23 23:14:05', 94100, 100000, 5900, 1, 'eceran', NULL, NULL),
('240322000002', '2022-03-23 23:16:05', 94100, 100000, 5900, 1, 'eceran', NULL, NULL),
('240322000003', '2022-03-23 23:37:06', 36600, 50000, 13400, 1, 'eceran', 13, NULL),
('240322000004', '2022-03-23 23:47:50', 36600, 40000, 3400, 1, 'eceran', 12, NULL),
('240322000005', '2022-03-23 23:51:42', 7400, 8000, 600, 1, 'eceran', NULL, NULL),
('240322000006', '2022-03-24 00:26:07', 33400, 35000, 1600, 1, 'eceran', 13, NULL),
('240322000007', '2022-03-24 00:29:34', 31200, 35000, 3800, 1, 'grosir', 13, NULL),
('240322000008', '2022-03-24 09:18:04', 31700, 35000, 3300, 1, 'eceran', NULL, NULL),
('240322000009', '2022-03-24 09:48:52', 24300, 25000, 700, 4, 'eceran', NULL, NULL),
('240322000010', '2022-03-24 09:55:21', 7400, 10000, 2600, 4, 'eceran', NULL, NULL),
('250322000001', '2022-03-25 09:46:09', 28300, 35000, 6700, 1, 'eceran', 12, NULL),
('250322000002', '2022-03-25 09:47:01', 25800, 50000, 24200, 1, 'eceran', NULL, NULL),
('250322000003', '2022-03-25 09:48:02', 58400, 60000, 1600, 1, 'eceran', 13, NULL),
('260322000001', '2022-03-25 22:32:37', 19700, 19700, 0, 1, 'eceran', 13, 'Hutang '),
('260322000002', '2022-03-25 22:33:33', 69600, 69600, 0, 1, 'eceran', NULL, ''),
('260322000003', '2022-03-25 22:35:23', 33800, 37000, 3200, 1, 'eceran', 12, ''),
('260322000004', '2022-03-25 22:43:22', 32400, 32400, 0, 1, 'grosir', NULL, 'Hutang sebsar 2500'),
('260322000005', '2022-03-25 22:44:36', 9400, 10000, 600, 1, 'grosir', 12, ''),
('260322000006', '2022-03-25 22:47:07', 19700, 20000, 300, 2, 'eceran', 13, 'Apa apa aja'),
('260322000007', '2022-03-25 22:47:33', 20700, 30000, 9300, 2, 'grosir', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL,
  `active` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`, `active`) VALUES
(6, 'Minuman', '1'),
(7, 'Makanan', '1'),
(8, 'Roko', '1'),
(9, 'Atk', '1'),
(10, 'Obat-obatan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `kode`, `nama`, `notelp`, `alamat`, `nik`, `point`, `active`) VALUES
(12, 'PLG220001', 'Aditya Ahmad', '0220987654321', 'Jl cikole', '1234567890098766', 192, '1'),
(13, 'PLG220002', 'Aksyal Abe', '08965603219', 'Jl Sekeloa Utara', '1234567890123459', 120, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur`
--

CREATE TABLE `tbl_retur` (
  `retur_id` int(11) NOT NULL,
  `retur_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `retur_barang_id` varchar(15) DEFAULT NULL,
  `retur_barang_nama` varchar(150) DEFAULT NULL,
  `retur_barang_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` int(11) DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(35) DEFAULT NULL,
  `active` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`satuan_id`, `satuan_nama`, `active`) VALUES
(10, 'Pcs', '1'),
(11, 'Kg', '1'),
(12, 'Btl', '1'),
(13, 'Liter', '1'),
(14, 'Cardus', '0'),
(15, 'Karton', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL,
  `active` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_notelp`, `active`) VALUES
(7, 'Cv Adhi Mekar Tjaya', 'Jl Tebet Dalam ', '089654892131', '1'),
(8, 'CV Wiraswasta', 'Jl Sekeloa', '08965603215', '1'),
(9, 'PD Toko Cipta', 'Jl Sekeloa Utara', '08965603215', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `minPoint` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `jumUang` int(255) NOT NULL,
  `uang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_toko`
--

INSERT INTO `tbl_toko` (`id`, `nama`, `alamat`, `minPoint`, `point`, `jumUang`, `uang`) VALUES
(1, 'Toko kelontong Hj Evi ', 'Jl Barat Daya Cirebon No 123 RT02/32', 210, 2, 26000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tukar_point`
--

CREATE TABLE `tbl_tukar_point` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `id_pelanggan` varchar(255) DEFAULT NULL,
  `tukar_point` int(11) DEFAULT NULL,
  `jumlah_uangkeluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tukar_point`
--

INSERT INTO `tbl_tukar_point` (`id`, `tanggal`, `id_pelanggan`, `tukar_point`, `jumlah_uangkeluar`) VALUES
(7, '2022-03-25 16:59:50', 'PLG220002', 210, 2000),
(8, '2022-03-25 17:03:44', 'PLG220001', 210, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'Admin ', 'admin', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', '1', '1'),
(2, 'Kasir Umum', 'kasir', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', '2', '1'),
(4, 'Aditya Ahmad', 'aditage', '$2y$10$1QU/f1xVeGBev93Xd0rgZOtjLZ5M3SIXH4u5fFHBIG9lFC4TdrE8O', '1', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek`
--
ALTER TABLE `cek`
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_user_id` (`barang_user_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`),
  ADD KEY `barang_satuan_id` (`barang_satuan_id`),
  ADD KEY `barang_suplier_id` (`barang_suplier_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`beli_kode`),
  ADD KEY `beli_user_id` (`beli_user_id`),
  ADD KEY `beli_suplier_id` (`beli_suplier_id`),
  ADD KEY `beli_id` (`beli_kode`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD PRIMARY KEY (`d_beli_id`),
  ADD KEY `d_beli_barang_id` (`d_beli_barang_id`),
  ADD KEY `d_beli_nofak` (`d_beli_nofak`),
  ADD KEY `d_beli_kode` (`d_beli_kode`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`),
  ADD KEY `jual_member_id` (`jual_member_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_tukar_point`
--
ALTER TABLE `tbl_tukar_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cek`
--
ALTER TABLE `cek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tukar_point`
--
ALTER TABLE `tbl_tukar_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`barang_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`barang_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_3` FOREIGN KEY (`barang_satuan_id`) REFERENCES `tbl_satuan` (`satuan_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_4` FOREIGN KEY (`barang_suplier_id`) REFERENCES `tbl_suplier` (`suplier_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD CONSTRAINT `tbl_beli_ibfk_1` FOREIGN KEY (`beli_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_beli_ibfk_2` FOREIGN KEY (`beli_suplier_id`) REFERENCES `tbl_suplier` (`suplier_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD CONSTRAINT `tbl_detail_beli_ibfk_1` FOREIGN KEY (`d_beli_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_beli_ibfk_2` FOREIGN KEY (`d_beli_kode`) REFERENCES `tbl_beli` (`beli_kode`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD CONSTRAINT `tbl_detail_jual_ibfk_1` FOREIGN KEY (`d_jual_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jual_ibfk_2` FOREIGN KEY (`d_jual_nofak`) REFERENCES `tbl_jual` (`jual_nofak`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD CONSTRAINT `tbl_jual_ibfk_1` FOREIGN KEY (`jual_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jual_ibfk_2` FOREIGN KEY (`jual_member_id`) REFERENCES `tbl_member` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tukar_point`
--
ALTER TABLE `tbl_tukar_point`
  ADD CONSTRAINT `tbl_tukar_point_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_member` (`kode`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
