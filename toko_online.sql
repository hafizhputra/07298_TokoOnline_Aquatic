-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 11:55 PM
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
  `jumlah_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `jumlah_produk`) VALUES
(1, 16, 1),
(1, 10, 2),
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(2, 2, 1),
(2, 6, 1),
(2, 11, 1),
(2, 13, 1);

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
(1, 14, 'Golden Checkerboard Discus.jpg', 'Golden Checkerboard Discus', '100000', '6'),
(2, 14, 'Red Melon Discus.jpg', 'Red Melon Discus', '100000', '5'),
(3, 14, 'Red Checkerboard Discus .jpg', 'Red Checkerboard Discus ', '100000', '7'),
(4, 14, 'Red Turquoise Discus.jpg', 'Red Turquoise Discus', '100000', '7'),
(5, 14, 'Blue Diamond Discus.jpg', 'Blue Diamond Discus', '150000', '4'),
(6, 14, 'Chinese Algae Eater.jpg', 'Chinese Algae Eater', '8000', '10'),
(7, 14, 'corydoras albino.jpg', 'corydoras albino', '8000', '10'),
(8, 14, 'Synodontis alga eater.jpg', 'Synodontis alga eater', '5000', '10'),
(10, 15, 'Tropical Fish Pelet.jpg', 'Tropical Fish Pelet', '12000', '20'),
(11, 15, 'Ocean Free Super Guppy.jpg', 'Ocean Free Super Guppy', '50000', '8'),
(12, 16, 'Garam Ikan.jpg', 'Garam Ikan', '5000', '12'),
(13, 16, 'Acriflavine obat Kuning.jpg', 'Acriflavine obat Kuning', '8000', '8'),
(14, 14, 'Japan Blue.jpg', 'Japan Blue', '15000', '20'),
(15, 14, 'red moscow.jpg', 'red moscow', '90000', '10'),
(16, 14, 'black moscow .jpg', 'black moscow ', '20000', '40');

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
(1, 3, '2022-06-13 21:47:14', 2),
(2, 6, '2022-06-13 21:49:20', 2);

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
