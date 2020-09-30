-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2020 at 12:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` int(20) NOT NULL AUTO_INCREMENT,
  `barang_nama` varchar(100) NOT NULL,
  `barang_harga` int(11) NOT NULL,
  `barang_qnty` int(11) NOT NULL,
  `barang_kategori` varchar(100) NOT NULL,
  `barang_inpdate` date NOT NULL,
  `barang_expdate` date NOT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-08-19-005506', 'App\\Database\\Migrations\\Profil', 'default', 'App', 1598327811, 1),
(2, '2020-08-19-010926', 'App\\Database\\Migrations\\Pinjaman', 'default', 'App', 1598327811, 1),
(3, '2020-08-19-011218', 'App\\Database\\Migrations\\Angsuran', 'default', 'App', 1598327811, 1),
(4, '2020-08-19-011626', 'App\\Database\\Migrations\\Simpanan', 'default', 'App', 1598327811, 1),
(5, '2020-08-19-080622', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1598327811, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `pelanggan_id` varchar(20) NOT NULL,
  `pelanggan_nama` varchar(100) NOT NULL,
  `pelanggan_tgllahir` date NOT NULL,
  `pelanggan_jk` varchar(100) NOT NULL,
  `pelanggan_email` varchar(100) NOT NULL,
  `pelanggan_phone` varchar(20) NOT NULL,
  `pelanggan_password` varchar(50) NOT NULL,
  `pelanggan_alamat` varchar(200) NOT NULL,
  `pelanggan_level` int(1) DEFAULT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` varchar(20) NOT NULL,
  `transaksi_pid` varchar(100) NOT NULL,
  `transaksi_bid` int(100) NOT NULL,
  `transaksi_harga` int(11) NOT NULL,
  `transaksi_qnty` int(11) NOT NULL,
  `transaksi_total` int(11) NOT NULL,
  `transaksi_date` datetime NOT NULL DEFAULT current_timestamp(),
  `transaksi_metodepembayaran` varchar(50) NOT NULL,
  `transaksi_pembayaran` varchar(50) NOT NULL,
  `transaksi_kembalian` int(11) NOT NULL,
  PRIMARY KEY (`transaksi_id`),
  KEY `transaksi_pid` (`transaksi_pid`),
  KEY `transaksi_bid` (`transaksi_bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
