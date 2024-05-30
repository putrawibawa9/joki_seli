-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2024 at 10:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangunan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(6, 'American Burger'),
(12, 'Japanese Burger'),
(16, 'Burger Bali');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_produk` text COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` int NOT NULL,
  `harga_produk` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok_produk` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan_produk`, `gambar`, `id_kategori`, `harga_produk`, `stok_produk`) VALUES
(17, 'Balinesedream', 'Balineseis number 1', '6601846a71223.jpg', 16, '30', 117),
(19, 'American Delight', 'dasda', '6601923c1ca90.jpeg', 12, '2', -1);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `lokasi_proyek` varchar(100) NOT NULL,
  `foto_proyek` varchar(100) NOT NULL,
  `deskripsi_proyek` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_proyek` date NOT NULL,
  `status_proyek` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `lokasi_proyek`, `foto_proyek`, `deskripsi_proyek`, `tanggal_proyek`, `status_proyek`) VALUES
(4, 'Proyek Delta', 'Yogyakarta', '665847152f050.jpeg', 'Proyek pengadaan perangkat keras baru', '2024-06-07', 'Berhasil'),
(6, 'Proyek Zeta', 'Denpasar', '665847335ce0a.jpeg', 'Proyek pengembangan produk inovatif', '2024-06-12', 'Mangkrak'),
(7, 'Proyek Kappa', 'Balikpapan', '66584739dd6d3.jpeg', 'Proyek pengadaan peralatan laboratorium baru', '2024-06-22', 'Revisi pondasi'),
(8, 'Proyek Theta', 'Medan', '66584741b24a0.jpeg', 'Proyek pembangunan pusat perbelanjaan baru', '2024-06-18', 'Mangkrak'),
(9, 'Proyek Iota', 'Palembang', '6658474938ce3.jpeg', 'Proyek pengembangan sistem keamanan baru', '2024-06-20', 'Gagal dikit'),
(10, 'Proyek Kappa', 'Balikpapan', '665847501b02f.jpeg', 'Proyek pengadaan peralatan laboratorium baru', '2024-06-22', 'Revisi pondasi');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `isDisplay` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `deskripsi`, `isDisplay`) VALUES
(1, 'Bagus Banget', 1),
(2, 'Kurang Memuaskan', 0),
(3, 'Cukup Memuaskan', 0),
(4, 'Lumayan Memuaskan', 0),
(5, 'bagus banget sih', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`username`, `password`) VALUES
('adien', '123'),
('admin', '123'),
('arjana', '123'),
('putra', '123'),
('putrawibawa9', '123'),
('win', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
