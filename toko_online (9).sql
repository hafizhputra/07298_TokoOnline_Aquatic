-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 11:37 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah_produk` int(11) DEFAULT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `jumlah_produk`, `total_bayar`) VALUES
(1, 2, 1, 100000),
(2, 11, 1, 58000),
(2, 13, 1, 58000),
(3, 3, 1, 108000),
(3, 13, 1, 108000),
(4, 6, 1, 8000),
(5, 2, 1, 108000),
(5, 6, 1, 108000),
(6, 6, 1, 8000),
(7, 2, 1, 100000),
(8, 5, 1, 150000),
(9, 1, 1, 100000),
(10, 1, 1, 100000),
(11, 2, 1, 100000),
(12, 1, 1, 100000),
(13, 1, 1, 0),
(13, 2, 1, 0),
(14, 1, 1, 0),
(14, 2, 1, 0),
(14, 3, 1, 0),
(15, 1, 1, 0),
(15, 2, 1, 0),
(16, 2, 1, 0),
(16, 3, 1, 0),
(17, 1, 1, 0),
(17, 2, 1, 0),
(18, 1, 1, 0),
(18, 2, 1, 0),
(19, 1, 1, 0),
(19, 2, 1, 0),
(20, 1, 1, 0),
(20, 2, 1, 0),
(21, 1, 1, 0),
(22, 1, 1, 0),
(22, 2, 1, 0),
(23, 1, 1, 0),
(23, 2, 1, 0),
(24, 1, 1, 0),
(25, 1, 1, 100000),
(26, 1, 1, 100000),
(27, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(14, 'ikan hias air tawar'),
(15, 'pakan ikan'),
(16, 'obat ikan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `gambar_produk` varchar(100) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` varchar(100) DEFAULT NULL,
  `stok_produk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `gambar_produk`, `nama_produk`, `harga_produk`, `stok_produk`) VALUES
(1, 14, 'Golden Checkerboard Discus.jpg', 'Golden Checkerboard Discus', '100000', '1'),
(2, 14, 'Red Melon Discus.jpg', 'Red Melon Discus', '100000', '5'),
(3, 14, 'Red Checkerboard Discus .jpg', 'Red Checkerboard Discus ', '100000', '6'),
(4, 14, 'Red Turquoise Discus.jpg', 'Red Turquoise Discus', '100000', '7'),
(5, 14, 'Blue Diamond Discus.jpg', 'Blue Diamond Discus', '150000', '4'),
(6, 14, 'Chinese Algae Eater.jpg', 'Chinese Algae Eater', '8000', '10'),
(7, 14, 'corydoras albino.jpg', 'corydoras albino', '8000', '10'),
(8, 14, 'Synodontis alga eater.jpg', 'Synodontis alga eater', '5000', '10'),
(10, 15, 'Tropical Fish Pelet.jpg', 'Tropical Fish Pelet', '12000', '20'),
(11, 15, 'Ocean Free Super Guppy.jpg', 'Ocean Free Super Guppy', '50000', '7'),
(12, 16, 'Garam Ikan.jpg', 'Garam Ikan', '5000', '11'),
(13, 16, 'Acriflavine obat Kuning.jpg', 'Acriflavine obat Kuning', '8000', '8'),
(14, 14, 'Japan Blue.jpg', 'Japan Blue', '15000', '20'),
(15, 14, 'red moscow.jpg', 'red moscow', '90000', '10'),
(16, 14, 'black moscow.jpg', 'black moscow', '20000', '40');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(12) DEFAULT NULL,
  `password_member` varchar(10) DEFAULT NULL,
  `username_member` varchar(20) DEFAULT NULL,
  `notelp_member` varchar(15) DEFAULT NULL,
  `alamat_member` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id_member`, `nama_member`, `password_member`, `username_member`, `notelp_member`, `alamat_member`) VALUES
(3, 'hafizh putra', '123', 'hafizh123', '081', 'perak'),
(6, 'fabio putra', '123', 'fabio123', '081', 'jl jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_member`, `tgl_transaksi`, `status_transaksi`) VALUES
(1, 3, '2022-06-14 17:19:27', 3),
(2, 3, '2022-06-15 07:09:27', 3),
(3, 3, '2022-06-14 16:57:53', 3),
(4, 3, '2022-06-15 07:09:31', 3),
(5, 6, '2022-06-14 17:10:26', 3),
(6, 6, '2022-06-14 17:28:24', 2),
(7, 6, '2022-06-14 18:14:33', 3),
(8, 6, '2022-06-14 17:54:41', 2),
(9, 6, '2022-06-14 18:13:40', 2),
(10, 6, '2022-06-15 09:00:51', 3),
(11, 6, '2022-06-14 18:28:47', 3),
(12, 6, '2022-06-14 18:28:57', 3),
(13, 3, '2022-06-15 07:21:04', 1),
(14, 3, '2022-06-15 07:31:12', 1),
(15, 3, '2022-06-15 07:41:54', 1),
(16, 3, '2022-06-15 07:42:26', 1),
(17, 3, '2022-06-15 07:44:05', 1),
(18, 3, '2022-06-15 07:44:59', 1),
(19, 3, '2022-06-15 07:46:11', 1),
(20, 3, '2022-06-15 07:50:36', 1),
(21, 3, '2022-06-15 07:51:40', 1),
(22, 3, '2022-06-15 07:52:54', 1),
(23, 3, '2022-06-15 07:56:22', 1),
(24, 3, '2022-06-15 07:57:08', 1),
(25, 3, '2022-06-15 09:22:41', 4),
(26, 3, '2022-06-15 09:01:20', 3),
(27, 3, '2022-06-15 09:30:41', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `fk_idtransaksi` (`id_transaksi`),
  ADD KEY `fk_idproduk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_idkategori` (`id_kategori`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_idmember` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_idproduk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `fk_idtransaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_idkategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_idmember` FOREIGN KEY (`id_member`) REFERENCES `register` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
