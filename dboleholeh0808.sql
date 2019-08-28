-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 05:30 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dboleholeh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` tinyint(4) NOT NULL,
  `nama_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
(1, 'BRI'),
(2, 'Mandiri'),
(3, 'BCA'),
(4, 'BNI'),
(5, 'Danamon');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(8) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` float NOT NULL,
  `stok` smallint(6) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `id_kategori` tinyint(4) NOT NULL,
  `id_toko` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `berat`, `stok`, `deskripsi_barang`, `id_kategori`, `id_toko`) VALUES
('PR000003', 'RENDANG PARU BASAH SITI NURBAYA', 75000, 1.2, 54, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor elit sed vulputate mi sit amet mauris commodo quis. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. A iaculis at erat pellent', 1, 'TOK000002'),
('PR000004', 'Sambal Naknan', 75000, 0.5, 92, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor elit sed vulputate mi sit amet mauris commodo quis. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. A iaculis at erat pellent', 3, 'TOK000002'),
('PR000005', 'KACANG MATAHARI TERBIT RASA BAWANG PUTIH BIJI KECIL ISI 2 PA', 26000, 0.25, 0, 'Kacang lezat bertekstur renyah yang satu ini sangat dicari ketika berkunjung ke Bali. Diolah dari kacang berualitas dengan citarasa yang lezat membuat siapapun yang mencobanya akan ketagihan. Yuk selalu siap sedia Kacang Matahari Terbit untuk waktu kumpul bersama orang-orang terdekat. Masa Ketahanan : 5 Bulan', 1, 'TOK000009'),
('PR000006', 'KACANG RASA BAWANG PUTIH BIJI BESAR ISI 2 PACK', 28000, 0.5, 48, 'Kacang lezat bertekstur renyah yang satu ini sangat dicari ketika berkunjung ke Bali. Diolah dari kacang berualitas dengan citarasa yang lezat membuat siapapun yang mencobanya akan ketagihan. Yuk selalu siap sedia Kacang Matahari Terbit untuk waktu kumpul bersama orang-orang terdekat. Masa Ketahanan : 5 Bulan ', 1, 'TOK000009'),
('PR000008', 'KACANG RASA ASIN BIJI BESAR ISI 2 PACK', 28000, 0.5, 96, 'Kacang lezat bertekstur renyah yang satu ini sangat dicari ketika berkunjung ke Bali. Diolah dari kacang berualitas dengan citarasa yang lezat membuat siapapun yang mencobanya akan ketagihan. Yuk selalu siap sedia Kacang Matahari Terbit untuk waktu kumpul bersama orang-orang terdekat. Masa Ketahanan : 5 Bulan ', 1, 'TOK000009');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` tinyint(4) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_barang` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `foto`, `id_barang`) VALUES
(88, 'item-190625-016ecebffb.jpg', 'PR000003'),
(89, 'item-190625-ce7b073624.jpg', 'PR000003'),
(90, 'item-190625-f6aff894da.jpg', 'PR000003'),
(91, 'item-190625-34cfa481b9.jpg', 'PR000004'),
(119, 'item-190731-7af8a6c249.jpg', 'PR000005'),
(120, 'item-190731-ff353035fd.jpg', 'PR000005'),
(121, 'item-190731-f1277a5607.jpg', 'PR000006'),
(122, 'item-190731-c3b47fe481.jpg', 'PR000006'),
(125, 'item-190731-b21f657e6f.jpg', 'PR000008'),
(126, 'item-190731-4791b5ac65.jpg', 'PR000008');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` tinyint(4) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Bumbu & Sambal'),
(4, 'Kerajinan');

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` char(15) NOT NULL,
  `id_transaksi` char(14) NOT NULL,
  `id_barang` char(8) DEFAULT NULL,
  `tgl_komplain` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `komplain` text NOT NULL,
  `tgl_balas` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `balasan` text,
  `status_read` varchar(35) NOT NULL,
  `id_pembeli` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `id_transaksi`, `id_barang`, `tgl_komplain`, `komplain`, `tgl_balas`, `balasan`, `status_read`, `id_pembeli`) VALUES
('KOM201908010001', 'TR201907310016', 'PR000005', '2019-08-01 05:48:32', 'hgduysguygd', '2019-08-05 17:07:39', NULL, 'Belum Dibaca', 'CUS000009'),
('KOM201908010002', 'TR201908010023', 'PR000004', '2019-08-01 16:23:23', 'ini kenapa barangnya belum dikirim ya, saya belum transfer. kenapa belum dikirim juga?', '2019-08-05 17:07:49', NULL, 'Belum Dibaca', 'CUS000002'),
('KOM201908050003', 'TR201908050025', 'PR000003', '2019-08-05 15:34:39', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tempor nec feugiat nisl pretium fusce id velit. Felis eget velit aliquet sagittis id consectetur purus ut. ', '2019-08-05 17:08:47', NULL, 'Belum Dibaca', 'CUS000009'),
('KOM201908050004', 'TR201908050024', 'PR000003', '2019-08-05 15:35:13', 'Pharetra diam sit amet nisl. Eget nunc lobortis mattis aliquam faucibus purus. Lacus sed viverra tellus in hac. Proin sed libero enim sed. Posuere urna nec tincidunt praesent semper feugiat. Posuere urna nec tincidunt praesent semper feugiat nibh sed pulvinar.', '2019-08-05 17:08:57', NULL, 'Belum Dibaca', 'CUS000009'),
('KOM201908050005', 'TR201908050025', 'PR000004', '2019-08-05 15:35:44', 'Varius quam quisque id diam vel. Vivamus arcu felis bibendum ut. In nisl nisi scelerisque eu ultrices vitae auctor eu. Integer eget aliquet nibh praesent tristique magna sit amet.', '2019-08-05 17:17:43', 'Adipiscing elit pellentesque habitant morbi tristique senectus et netus et. Lacinia at quis risus sed vulputate odio. ', 'Sudah Dibalas', 'CUS000009'),
('KOM201908060006', 'TR201908050028', 'PR000008', '2019-08-05 22:58:14', '', '2019-08-05 22:58:14', NULL, 'Belum Dibalas', 'CUS000003');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` char(9) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp_pembeli` varchar(15) NOT NULL,
  `id_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `alamat`, `no_hp_pembeli`, `id_user`) VALUES
('CUS000002', 'nusa puri permai b.32', '089778667222', 5),
('CUS000003', 'jalan mahendradata no 8', '087861235688', 6),
('CUS000004', '', '', 7),
('CUS000005', 'jalan dharmawangsa no 22', '089778667222', 10),
('CUS000006', '', '', 11),
('CUS000007', '', '', 12),
('CUS000008', '', '', 13),
('CUS000009', 'Jalan Kedondong No 15x', '087763456992', 15),
('CUS000010', '', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` char(15) NOT NULL,
  `tgl_review` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ulasan` text,
  `status_terima` tinyint(4) NOT NULL,
  `bintang` int(11) NOT NULL,
  `id_barang` char(8) NOT NULL,
  `id_transaksi` char(14) NOT NULL,
  `id_pembeli` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `tgl_review`, `ulasan`, `status_terima`, `bintang`, `id_barang`, `id_transaksi`, `id_pembeli`) VALUES
('REV201907270006', '2019-07-26 23:27:43', 'beda', 1, 3, 'PR000001', 'TR201907270014', 'CUS000005'),
('REV201908060007', '2019-08-06 00:42:03', 'Posuere urna nec tincidunt praesent semper feugiat. Posuere urna nec tincidunt praesent semper feugiat nibh sed pulvinar. Sagittis vitae et leo duis ut diam quam nulla. Aenean et tortor at risus viverra. ', 1, 3, 'PR000004', 'TR201908050029', 'CUS000003');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` char(9) NOT NULL,
  `nama_toko` varchar(60) DEFAULT NULL,
  `alamat_toko` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `deskripsi_toko` text,
  `id_bank` tinyint(4) DEFAULT NULL,
  `pemilik_rek` varchar(60) DEFAULT NULL,
  `no_rek` varchar(30) DEFAULT NULL,
  `rating_toko` float DEFAULT NULL,
  `id_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `no_hp`, `deskripsi_toko`, `id_bank`, `pemilik_rek`, `no_rek`, `rating_toko`, `id_user`) VALUES
('TOK000002', 'Cinta Oleh-oleh', 'Jalan Tukad Batanghari, No 15x', '087998789666', 'toko serba ada', 2, 'Nina Yanti', '01002333455', 3, 5),
('TOK000003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
('TOK000004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
('TOK000005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
('TOK000006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
('TOK000007', 'Pie Susu Dian', '', '', '', NULL, '', '', NULL, 12),
('TOK000008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
('TOK000009', 'Kacang Matahari Terbit - Denpasar', 'Denpasar', '087998789666', 'Jual kacang matahari terbit yang best seller sekali di Bali', 2, 'Gina Pebri', '01122010101', NULL, 15),
('TOK000010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(14) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_harga` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `id_bank` tinyint(4) DEFAULT NULL,
  `nama_pemilik_rek` varchar(100) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `status_barang` varchar(150) NOT NULL,
  `id_pembeli` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `total_harga`, `bukti_pembayaran`, `id_bank`, `nama_pemilik_rek`, `no_rekening`, `tgl_bayar`, `status_bayar`, `status_barang`, `id_pembeli`) VALUES
('TR201907050001', '2019-07-17 09:18:21', 75000, 'bukti-190705-e72da64ff0.jpg', 1, 'Darmiati', '123444555555', '2019-07-25', 'Sudah Bayar', 'Sudah Diterima', 'CUS000005'),
('TR201907310016', '2019-07-30 23:07:44', 208000, NULL, NULL, NULL, NULL, NULL, 'Belum Bayar', 'Belum Dikirim', 'CUS000009'),
('TR201907310017', '2019-07-15 03:50:41', 140000, 'bukti-190731-3c3f1f7391.jpg', 1, 'Fikri', '1234567819', '2019-07-31', 'Sudah Bayar', 'Sudah Diterima', 'CUS000002'),
('TR201908010018', '2019-07-31 22:58:05', 28000, NULL, NULL, NULL, NULL, NULL, 'Belum Bayar', 'Belum Dikirim', 'CUS000002'),
('TR201908010019', '2019-07-31 23:08:19', 28000, NULL, NULL, NULL, NULL, NULL, 'Bukti Invalid', 'Belum Dikirim', 'CUS000002'),
('TR201908010020', '2019-07-31 23:32:25', 309000, 'bukti-190801-5d39aaa95d.jpg', 3, 'cinta rahma', '10112344102', '2019-08-01', 'Sudah Bayar', 'Sudah Diterima', 'CUS000002'),
('TR201908010021', '2019-08-01 01:26:25', 75000, NULL, NULL, NULL, NULL, NULL, 'Belum Bayar', 'Belum Dikirim', 'CUS000002'),
('TR201908010022', '2019-08-01 01:30:08', 375000, NULL, NULL, NULL, NULL, NULL, 'Sudah Upload Bukti', 'Belum Dikirim', 'CUS000002'),
('TR201908010023', '2019-08-01 14:39:41', 450000, NULL, NULL, NULL, NULL, NULL, 'Sudah Bayar', 'Sudah Diterima', 'CUS000002'),
('TR201908050024', '2019-08-05 15:32:59', 900000, NULL, NULL, NULL, NULL, NULL, 'Belum Bayar', 'Belum Dikirim', 'CUS000009'),
('TR201908050025', '2019-08-05 15:33:53', 600000, NULL, NULL, NULL, NULL, NULL, 'Belum Bayar', 'Belum Dikirim', 'CUS000009'),
('TR201908050026', '2019-08-05 18:53:25', 525000, 'bukti-190805-0b686557cb.jpg', 4, 'cinta rahma', '123444555555', '2019-08-07', 'Sudah Bayar', 'Belum Dikirim', 'CUS000003'),
('TR201908050027', '2019-08-05 19:21:10', 131000, NULL, NULL, NULL, NULL, NULL, 'Sudah Upload Bukti', 'Belum Dikirim', 'CUS000003'),
('TR201908050028', '2019-06-25 19:21:32', 112000, 'bukti-190806-14601f0b8a.jpg', 3, 'nana dianti', '111122222', '2019-08-07', 'Sudah Upload Bukti', 'Sudah Diterima', 'CUS000003'),
('TR201908050029', '2019-08-05 19:28:18', 150000, 'bukti-190805-81a022cff6.jpg', 3, 'nana dianti', '10112344102', '2019-08-07', 'Sudah Upload Bukti', 'Sudah Diterima', 'CUS000003');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksidetail` tinyint(4) NOT NULL,
  `id_transaksi` char(14) NOT NULL,
  `id_barang` char(8) NOT NULL,
  `jumlah` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksidetail`, `id_transaksi`, `id_barang`, `jumlah`) VALUES
(31, 'TR201907050001', 'PR000004', 1),
(53, 'TR201907310016', 'PR000005', 8),
(54, 'TR201907310017', 'PR000006', 5),
(55, 'TR201908010018', 'PR000006', 1),
(56, 'TR201908010019', 'PR000006', 1),
(57, 'TR201908010020', 'PR000008', 2),
(58, 'TR201908010020', 'PR000004', 3),
(59, 'TR201908010020', 'PR000006', 1),
(60, 'TR201908010021', 'PR000004', 1),
(61, 'TR201908010022', 'PR000004', 5),
(62, 'TR201908010023', 'PR000004', 6),
(63, 'TR201908050024', 'PR000003', 12),
(64, 'TR201908050025', 'PR000003', 3),
(65, 'TR201908050025', 'PR000004', 5),
(66, 'TR201908050026', 'PR000003', 6),
(67, 'TR201908050026', 'PR000004', 1),
(68, 'TR201908050027', 'PR000003', 1),
(69, 'TR201908050027', 'PR000006', 2),
(70, 'TR201908050028', 'PR000008', 4),
(71, 'TR201908050029', 'PR000004', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `foto_akun` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `foto_akun`, `status`) VALUES
(5, 'cinta@gmail.com', '1bbd886460827015e5d605ed44252251', 'Cinta Tiara', 'item-190625-0c17140df3.jpg', 'Active'),
(6, 'nanadianti@gmail.com', '1bbd886460827015e5d605ed44252251', 'Nana', NULL, 'Active'),
(7, 'subawakardika@gmail.com', '1bbd886460827015e5d605ed44252251', 'Subawa', NULL, 'Non Active'),
(10, 'mahardika77@gmail.com', '1bbd886460827015e5d605ed44252251', 'I Nyoman Mahardika', 'item-190629-7ddd595f48.jpg', 'Active'),
(11, 'adi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'adi gunawan', NULL, 'Active'),
(12, 'nana@gmail.com', '1bbd886460827015e5d605ed44252251', 'Vino', NULL, 'Active'),
(13, 'nnn@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', 'AdiWahyu', NULL, 'Non Active'),
(14, 'admin@gagapanbali.com', '0192023a7bbd73250516f069df18b500', 'Administrator', NULL, 'Active'),
(15, 'ginapebri22@gmail.com', '1bbd886460827015e5d605ed44252251', 'Ginarein', 'item-190731-62768cea4d.jpg', 'Active'),
(16, 'munawidnyana@gmail.com', '69d6b26e992a229322e0435fd2ba2b6d', 'Muna Ganteng', NULL, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_barang_2` (`id_barang`,`id_transaksi`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksidetail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksidetail` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `komplain_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komplain_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komplain_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toko_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
