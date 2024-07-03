-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 10:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_risun`
--
CREATE DATABASE IF NOT EXISTS `db_risun` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_risun`;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `view` int(20) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `itemdetails`
--

DROP TABLE IF EXISTS `itemdetails`;
CREATE TABLE IF NOT EXISTS `itemdetails` (
  `id_barang` int(100) NOT NULL AUTO_INCREMENT,
  `gambar_produk` text NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `sisa_stok` int(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `alamat2` varchar(255) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  KEY `gambar_produk` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemdetails`
--

INSERT INTO `itemdetails` (`id_barang`, `gambar_produk`, `kategori_barang`, `nama_barang`, `harga`, `merek`, `sisa_stok`, `alamat`, `alamat2`, `deskripsi_produk`, `jenis_produk`) VALUES
(22, 'http://localhost/sunipaste/assets/uploads/_6682746a539b4.jpg', 'Elektronik', 'DEEPCOOL PSU 1100W 80+GOLD', 'Rp.10.300.000', 'DeepCool', 1, '', '', 'Power Supply sobat PLN ', 'Elektronik'),
(23, 'http://localhost/sunipaste/assets/uploads/23.jpg', 'Laptop/PC', 'POWER SUPPLY', 'Rp.1.700.000', 'DEEPCOOL', 1, '', '', 'Power Supply sobat pln', 'Laptop/PC Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(255) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(15) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` char(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `level`, `created_at`) VALUES
(1, 'Dimas', 'risun', 'risun@superadm.in', '202cb962ac59075b964b07152d234b70', '1', '2024-06-30 05:11:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
