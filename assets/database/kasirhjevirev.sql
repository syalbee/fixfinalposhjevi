-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 04:19 PM
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
  `barang_stok` float DEFAULT 0,
  `barang_min_stok` float DEFAULT 0,
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
('BR000001', 'BR000001', 'Kripik Singkong Balado', 126000, 29000, 145000, 120.25, 5, '2022-04-02 09:05:31', NULL, 11, 1, 16, 10, '1', 11),
('BR000002', 'BR000002', 'Kripik Singkong Pedas', 100000, 24000, 120000, 123, 5, '2022-04-02 09:20:13', NULL, 11, 1, 16, 10, '1', 12),
('BR000003', 'BR000003', 'Basreng Balado', 110000, 21666, 130000, 729.667, 6, '2022-04-02 09:22:59', NULL, 11, 1, 16, 10, '1', 13),
('BR000004', 'BR000004', 'Basreng Pedas gurih', 160000, 30000, 180000, 792, 6, '2022-04-02 09:25:58', NULL, 11, 1, 16, 10, '1', 14),
('BR000005', 'BR000005', 'Kue Bawang', 170000, 30833, 185000, 783.5, 6, '2022-04-02 09:26:48', '2022-04-02 16:33:19', 11, 1, 16, 10, '1', 15),
('BR000006', 'BR000006', 'Coklat Botuna', 125000, 15556, 140000, 1286.56, 9, '2022-04-02 10:12:16', NULL, 11, 1, 17, 10, '1', 16),
('BR000007', 'BR000007', 'Wafer curah coklat', 120000, 23333, 140000, 132, 6, '2022-04-03 06:09:21', NULL, 11, 1, 16, 10, '1', 17),
('BR000008', 'BR000008', 'Wafer Nabati Astor', 230001, 20501, 245001, 130.75, 11, '2022-04-12 06:27:02', '2022-04-14 21:15:14', 11, 1, 17, 10, '1', 18);

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
('KJH88742', '2022-04-02', 10, 1, 'BL020422000001');

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
(27, 'KJH88742', 'BR000002', 100000, 9, 900000, 'BL020422000001'),
(28, 'KJH88742', 'BR000005', 170000, 4, 680000, 'BL020422000001');

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
  `d_jual_qty` float DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(211, '020422000001', 'BR000001', 'Kripik Singkong Balado', 'Ball', 126000, 145000, 2, 0, 290000),
(212, '020422000002', 'BR000003', 'Basreng Balado', 'Ball', 110000, 21666, 1, 0, 21666),
(213, '020422000002', 'BR000001', 'Kripik Singkong Balado', 'Ball', 126000, 29000, 1, 0, 14500),
(214, '020422000003', 'BR000001', 'Kripik Singkong Balado', 'Ball', 126000, 29000, 0.25, 0, 7250),
(215, '020422000003', 'BR000005', 'Kue Bawang', 'Ball', 170000, 30833, 2, 0, 61666),
(216, '020422000004', 'BR000003', 'Basreng Balado', 'Ball', 110000, 21666, 4, 0, 86664),
(217, '020422000004', 'BR000005', 'Kue Bawang', 'Ball', 170000, 30833, 5, 0, 154165),
(218, '020422000004', 'BR000001', 'Kripik Singkong Balado', 'Ball', 126000, 29000, 7, 0, 203000),
(219, '020422000005', 'BR000002', 'Kripik Singkong Pedas', 'Ball', 100000, 24000, 3, 0, 72000),
(220, '020422000006', 'BR000003', 'Basreng Balado', 'Ball', 110000, 21666, 4, 0, 86664),
(221, '020422000006', 'BR000005', 'Kue Bawang', 'Ball', 170000, 30833, 3, 0, 92499),
(222, '020422000006', 'BR000002', 'Kripik Singkong Pedas', 'Ball', 100000, 24000, 5, 0, 120000),
(223, '020422000006', 'BR000006', 'Coklat Botuna', 'Kardus', 125000, 15556, 4, 0, 62224),
(224, '120422000001', 'BR000008', 'Wafer Nabati', 'Pcs', 230000, 20500, 3, 0, 61500),
(225, '120422000001', 'BR000003', 'Basreng Balado', 'Kg', 110000, 21666, 10, 0, 216660),
(226, '140422000001', 'BR000008', 'Wafer Nabati Astor', 'Pcs', 230001, 20501, 11, 3000, 192511);

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
('020422000001', '2022-04-02 09:12:34', 290000, 290000, 0, 1, 'grosir', NULL, 'w'),
('020422000002', '2022-04-02 10:24:41', 36166, 37000, 834, 1, 'eceran', NULL, 'Hai'),
('020422000003', '2022-04-02 10:28:25', 68916, 70000, 1084, 1, 'eceran', NULL, ''),
('020422000004', '2022-04-02 11:48:12', 443829, 443829, 0, 1, 'eceran', NULL, ''),
('020422000005', '2022-04-02 11:49:15', 72000, 80000, 8000, 1, 'eceran', NULL, ''),
('020422000006', '2022-04-02 11:57:58', 361387, 361387, 0, 1, 'eceran', NULL, ''),
('120422000001', '2022-04-12 10:24:46', 278160, 278160, 0, 1, 'eceran', NULL, ''),
('140422000001', '2022-04-14 14:16:56', 192511, 192511, 0, 1, 'eceran', NULL, '');

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
(11, 'Makanan', '1');

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
  `satuan_turunan` varchar(35) DEFAULT NULL,
  `active` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`satuan_id`, `satuan_nama`, `satuan_turunan`, `active`) VALUES
(16, 'Ball', 'Kg', '1'),
(17, 'Kardus', 'Pcs', '1');

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
(10, 'PD. Terang Bulan', 'Jl Sabtu Minggu', '08965603215', '1');

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
(4, 'Aditya Ahmad', 'aditage', '$2y$10$1QU/f1xVeGBev93Xd0rgZOtjLZ5M3SIXH4u5fFHBIG9lFC4TdrE8O', '1', '0'),
(5, 'Aksyal', 'abe123', '$2y$10$vJfl2U2GdcdCQRmER73WE.zuZiyTkydQWPZEAfyUcONzscKsfvyOq', '1', '1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_tukar_point`
--
ALTER TABLE `tbl_tukar_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
