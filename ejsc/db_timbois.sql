-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 06:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_timbois`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `ID_BANK` varchar(10) NOT NULL,
  `ID_MITRA` char(10) NOT NULL,
  `NAMA_BANK` varchar(40) NOT NULL,
  `NOMER_REKENING` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID_BANK`, `ID_MITRA`, `NAMA_BANK`, `NOMER_REKENING`) VALUES
('BNK', 'MTR0000001', 'BNI', '623501017'),
('BNK0000001', 'MTR0000001', 'BRI', '623501017464531'),
('BNK0000003', 'MTR0000002', 'BCA', '6235010174645');

-- --------------------------------------------------------

--
-- Table structure for table `detail_fitur`
--

CREATE TABLE `detail_fitur` (
  `ID_PRODUK` varchar(10) NOT NULL,
  `ID_FITUR` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_fitur`
--

INSERT INTO `detail_fitur` (`ID_PRODUK`, `ID_FITUR`) VALUES
('PRD0000001', 'FTR0000001'),
('PRD0000002', 'FTR0000001');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `ID_TRANSAKSI` varchar(10) NOT NULL,
  `ID_PRODUK` varchar(10) NOT NULL,
  `SUB_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`ID_TRANSAKSI`, `ID_PRODUK`, `SUB_TOTAL`) VALUES
('TRS0000001', 'PRD0000001', 0),
('TRS0000002', 'PRD0000002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `ID_FITUR` varchar(10) NOT NULL,
  `NAMA_FITUR` varchar(40) NOT NULL,
  `HARGA_FITUR` int(11) NOT NULL,
  `STATUS_FITUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`ID_FITUR`, `NAMA_FITUR`, `HARGA_FITUR`, `STATUS_FITUR`) VALUES
('FTR0000001', 'JILID SOFT COVER', 3000, 1),
('FTR0000002', 'JILID HARD COVER', 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `ID_HALAMAN` varchar(10) NOT NULL,
  `KAT_HALAMAN` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`ID_HALAMAN`, `KAT_HALAMAN`) VALUES
('HLM0000001', 'ALL'),
('HLM0000002', 'RANGE'),
('HLM0000003', 'KHUSUS');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mitra`
--

CREATE TABLE `jadwal_mitra` (
  `ID_JADWAL` varchar(10) NOT NULL,
  `ID_MITRA` char(10) NOT NULL,
  `JADWAL_BUKA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_mitra`
--

INSERT INTO `jadwal_mitra` (`ID_JADWAL`, `ID_MITRA`, `JADWAL_BUKA`) VALUES
('JDW0000001', 'MTR0000001', 'SENIN - JUMAT TUTUP\r\nSABTU - MINGGU BUKA JAM 23.00 - 04.00'),
('JWD0000002', 'MTR0000002', 'SENIN - JUMAT 06.30 - 21.00\r\nSABTU - MINGGU 09.00 - 14.00');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `ID_METODE` varchar(10) NOT NULL,
  `NAMA_METODE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`ID_METODE`, `NAMA_METODE`) VALUES
('MBY0000001', 'SALDO'),
('MBY0000002', 'TUNAI');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `ID_MITRA` char(10) NOT NULL,
  `NAMA_MITRA` varchar(40) NOT NULL,
  `EMAIL_MITRA` varchar(100) NOT NULL,
  `NO_HP_MITRA` varchar(13) NOT NULL,
  `TELEPHONE_MITRA` varchar(13) NOT NULL,
  `ALAMAT_MITRA` text NOT NULL,
  `FOTO_PROFILE` varchar(200) NOT NULL,
  `COVER` varchar(200) NOT NULL,
  `STATUS_MITRA` int(11) NOT NULL,
  `SALDO_MITRA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`ID_MITRA`, `NAMA_MITRA`, `EMAIL_MITRA`, `NO_HP_MITRA`, `TELEPHONE_MITRA`, `ALAMAT_MITRA`, `FOTO_PROFILE`, `COVER`, `STATUS_MITRA`, `SALDO_MITRA`) VALUES
('MTR0000001', 'Setengah Enam Pagi', 'admin@sep.com', '081222111333', '(0331)323233', 'Ya cari sendiri lah coy', 'no_profil.jpg', 'no_cover.jpg', 1, 0),
('MTR0000002', 'Iqbal Ramadhan', 'iqbal@gmail.com', '085333765990', '(0331)887655', 'Trunojoyo, Banyuwangi', 'no_profil.jpg', 'no_cover.jpg', 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ID_PRODUK` varchar(10) NOT NULL,
  `ID_UKURAN` varchar(10) NOT NULL,
  `ID_HALAMAN` varchar(10) NOT NULL,
  `ID_WARNA` varchar(10) NOT NULL,
  `NAMA_PRODUK` varchar(40) NOT NULL,
  `FILE_PRODUK` varchar(200) NOT NULL,
  `JML_HAL_PRODUK` int(11) NOT NULL,
  `JML_DUPLICATE_PRODUK` int(11) NOT NULL,
  `JML_WARNA_PRODUK` int(11) NOT NULL,
  `CATATAN_PRODUK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ID_PRODUK`, `ID_UKURAN`, `ID_HALAMAN`, `ID_WARNA`, `NAMA_PRODUK`, `FILE_PRODUK`, `JML_HAL_PRODUK`, `JML_DUPLICATE_PRODUK`, `JML_WARNA_PRODUK`, `CATATAN_PRODUK`) VALUES
('PRD0000001', 'UKN0000001', 'HLM0000001', 'WRN0000003', 'PRINT', 'print.pdf', 26, 1, 6, 'Jilid Warna Biru,\r\nDepan Mika'),
('PRD0000002', 'UKN0000002', 'HLM0000002', 'WRN0000002', 'PRINT', 'cetak.pdf', 18, 1, 18, 'Cover Warna Kuning\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `thumbnail_mitra`
--

CREATE TABLE `thumbnail_mitra` (
  `ID_THUMB_MITRA` varchar(10) NOT NULL,
  `ID_MITRA` char(10) NOT NULL,
  `FOTO_THUMB_MITRA` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thumbnail_mitra`
--

INSERT INTO `thumbnail_mitra` (`ID_THUMB_MITRA`, `ID_MITRA`, `FOTO_THUMB_MITRA`) VALUES
('TMT0000001', 'MTR0000001', 'mitra-1.jpg'),
('TMT0000002', 'MTR0000001', 'mitra-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `top_up_mitra`
--

CREATE TABLE `top_up_mitra` (
  `ID_TOP_UP_MITRA` varchar(10) NOT NULL,
  `ID_MITRA` char(10) NOT NULL,
  `TGL_TOP_UP_MITRA` datetime NOT NULL,
  `JUMLAH_TOP_UP_MITRA` int(11) NOT NULL,
  `BUKTI_TOP_UP_MITRA` varchar(200) NOT NULL,
  `STATUS_TOP_UP_MITRA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `top_up_user`
--

CREATE TABLE `top_up_user` (
  `ID_TOP_UP_USER` varchar(10) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `ID_MITRA` varchar(10) NOT NULL,
  `TGL_TOP_UP_USER` datetime NOT NULL,
  `JUMLAH_TOP_UP_USER` int(11) NOT NULL,
  `STATUS_TOP_UP_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(10) NOT NULL,
  `ID_METODE` varchar(10) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `ID_MITRA` char(10) DEFAULT NULL,
  `TGL_TRANSAKSI` datetime NOT NULL,
  `TOTAL_TRANSAKSI` int(11) NOT NULL,
  `STATUS_TRANSAKSI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_METODE`, `ID_USER`, `ID_MITRA`, `TGL_TRANSAKSI`, `TOTAL_TRANSAKSI`, `STATUS_TRANSAKSI`) VALUES
('TRS0000001', 'MBY0000001', 'USR0000001', 'MTR0000001', '2019-11-15 23:59:59', 0, 0),
('TRS0000002', 'MBY0000002', 'USR0000001', 'MTR0000002', '2019-11-16 09:24:27', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `ID_UKURAN` varchar(10) NOT NULL,
  `KAT_UKURAN` varchar(40) NOT NULL,
  `HARGA_UKURAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`ID_UKURAN`, `KAT_UKURAN`, `HARGA_UKURAN`) VALUES
('UKN0000001', 'A4', 150),
('UKN0000002', 'F4', 150);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` char(10) NOT NULL,
  `NAMA_USER` varchar(40) NOT NULL,
  `STATUS_USER` int(11) NOT NULL,
  `SALDO_USER` int(11) NOT NULL,
  `FOTO_IDENTITAS` varchar(200) DEFAULT NULL,
  `EMAIL_USER` varchar(100) NOT NULL,
  `NO_HP_USER` varchar(13) NOT NULL,
  `ALAMAT_USER` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `STATUS_USER`, `SALDO_USER`, `FOTO_IDENTITAS`, `EMAIL_USER`, `NO_HP_USER`, `ALAMAT_USER`) VALUES
('USR0000001', 'Nur Hadi', 1, 0, 'no_profil.jpg', 'no_cover.jpg', '081554973376', 'Kendal, Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `ID_WARNA` varchar(10) NOT NULL,
  `KAT_WARNA` varchar(40) NOT NULL,
  `HARGA_WARNA` int(11) NOT NULL,
  `STATUS_WARNA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`ID_WARNA`, `KAT_WARNA`, `HARGA_WARNA`, `STATUS_WARNA`) VALUES
('WRN0000001', 'FULL WARNA', 850, 1),
('WRN0000002', 'HITAM PUTIH', 50, 1),
('WRN0000003', 'HITAM PUTIH DAN WARNA', 850, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_mitra`
--

CREATE TABLE `withdraw_mitra` (
  `ID_WITHDRAW_MITRA` varchar(10) NOT NULL,
  `ID_MITRA` char(10) NOT NULL,
  `JUMLAH_WITHDRAW` int(11) NOT NULL,
  `TGL_WITHDRAW_MITRA` datetime NOT NULL,
  `STATUS_WITHDRAW_MITRA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_BANK`),
  ADD KEY `FK_MEMILIKI_BANK` (`ID_MITRA`);

--
-- Indexes for table `detail_fitur`
--
ALTER TABLE `detail_fitur`
  ADD KEY `AK_IDENTIFIER_1` (`ID_PRODUK`,`ID_FITUR`),
  ADD KEY `FK_DETAIL_FITUR2` (`ID_FITUR`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `AK_IDENTIFIER_1` (`ID_TRANSAKSI`,`ID_PRODUK`),
  ADD KEY `FK_DETAIL_PEMESANAN2` (`ID_PRODUK`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`ID_FITUR`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`ID_HALAMAN`);

--
-- Indexes for table `jadwal_mitra`
--
ALTER TABLE `jadwal_mitra`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_MEMILIKI_JADWAL` (`ID_MITRA`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`ID_METODE`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`ID_MITRA`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID_PRODUK`),
  ADD KEY `FK_MEMILIKI_HALAMAN` (`ID_HALAMAN`),
  ADD KEY `FK_MEMILIKI_UKURAN` (`ID_UKURAN`),
  ADD KEY `FK_MEMILIKI_WARNA` (`ID_WARNA`);

--
-- Indexes for table `thumbnail_mitra`
--
ALTER TABLE `thumbnail_mitra`
  ADD PRIMARY KEY (`ID_THUMB_MITRA`),
  ADD KEY `FK_MEMILIKI_THUMBNAIL` (`ID_MITRA`);

--
-- Indexes for table `top_up_mitra`
--
ALTER TABLE `top_up_mitra`
  ADD PRIMARY KEY (`ID_TOP_UP_MITRA`),
  ADD KEY `FK_MELAKUKAN_TOP_UP_MITRA` (`ID_MITRA`);

--
-- Indexes for table `top_up_user`
--
ALTER TABLE `top_up_user`
  ADD PRIMARY KEY (`ID_TOP_UP_USER`),
  ADD UNIQUE KEY `FK_MELAYANI_TOP_UP` (`ID_MITRA`),
  ADD KEY `FK_MELAKUKAN_TOP_UP` (`ID_USER`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_MELAKUKAN` (`ID_USER`),
  ADD KEY `FK_MELAYANI` (`ID_MITRA`),
  ADD KEY `ID_METODE` (`ID_METODE`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`ID_UKURAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`ID_WARNA`);

--
-- Indexes for table `withdraw_mitra`
--
ALTER TABLE `withdraw_mitra`
  ADD PRIMARY KEY (`ID_WITHDRAW_MITRA`),
  ADD KEY `FK_MELAKUKAN_WITHDRAW` (`ID_MITRA`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `FK_MEMILIKI_BANK` FOREIGN KEY (`ID_MITRA`) REFERENCES `mitra` (`ID_MITRA`);

--
-- Constraints for table `detail_fitur`
--
ALTER TABLE `detail_fitur`
  ADD CONSTRAINT `FK_DETAIL_FITUR` FOREIGN KEY (`ID_PRODUK`) REFERENCES `produk` (`ID_PRODUK`),
  ADD CONSTRAINT `FK_DETAIL_FITUR2` FOREIGN KEY (`ID_FITUR`) REFERENCES `fitur` (`ID_FITUR`);

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `FK_DETAIL_PEMESANAN` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi` (`ID_TRANSAKSI`),
  ADD CONSTRAINT `FK_DETAIL_PEMESANAN2` FOREIGN KEY (`ID_PRODUK`) REFERENCES `produk` (`ID_PRODUK`);

--
-- Constraints for table `jadwal_mitra`
--
ALTER TABLE `jadwal_mitra`
  ADD CONSTRAINT `FK_MEMILIKI_JADWAL` FOREIGN KEY (`ID_MITRA`) REFERENCES `mitra` (`ID_MITRA`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_MEMILIKI_HALAMAN` FOREIGN KEY (`ID_HALAMAN`) REFERENCES `halaman` (`ID_HALAMAN`),
  ADD CONSTRAINT `FK_MEMILIKI_UKURAN` FOREIGN KEY (`ID_UKURAN`) REFERENCES `ukuran` (`ID_UKURAN`),
  ADD CONSTRAINT `FK_MEMILIKI_WARNA` FOREIGN KEY (`ID_WARNA`) REFERENCES `warna` (`ID_WARNA`);

--
-- Constraints for table `thumbnail_mitra`
--
ALTER TABLE `thumbnail_mitra`
  ADD CONSTRAINT `FK_MEMILIKI_THUMBNAIL` FOREIGN KEY (`ID_MITRA`) REFERENCES `mitra` (`ID_MITRA`);

--
-- Constraints for table `top_up_mitra`
--
ALTER TABLE `top_up_mitra`
  ADD CONSTRAINT `FK_MELAKUKAN_TOP_UP_MITRA` FOREIGN KEY (`ID_MITRA`) REFERENCES `mitra` (`ID_MITRA`);

--
-- Constraints for table `top_up_user`
--
ALTER TABLE `top_up_user`
  ADD CONSTRAINT `FK_MELAKUKAN_TOP_UP` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `top_up_user_ibfk_1` FOREIGN KEY (`ID_MITRA`) REFERENCES `mitra` (`ID_MITRA`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_MELAYANI` FOREIGN KEY (`ID_MITRA`) REFERENCES `mitra` (`ID_MITRA`),
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_METODE`) REFERENCES `metode_bayar` (`ID_METODE`);

--
-- Constraints for table `withdraw_mitra`
--
ALTER TABLE `withdraw_mitra`
  ADD CONSTRAINT `FK_MELAKUKAN_WITHDRAW` FOREIGN KEY (`ID_MITRA`) REFERENCES `mitra` (`ID_MITRA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
