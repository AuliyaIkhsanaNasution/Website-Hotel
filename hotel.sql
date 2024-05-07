-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hotel
CREATE DATABASE IF NOT EXISTS `hotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hotel`;

-- Dumping structure for table hotel.detailpemesanan
CREATE TABLE IF NOT EXISTS `detailpemesanan` (
  `detail_pemesanan_id` int NOT NULL AUTO_INCREMENT,
  `pemesanan_id` int DEFAULT NULL,
  `kamar_id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipe_kamar` int NOT NULL,
  `harga_kamar_per_malam` decimal(10,2) NOT NULL,
  `fasilitas_plus` enum('Sarapan','Tanpa Sarapan') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`detail_pemesanan_id`),
  KEY `pemesanan_id` (`pemesanan_id`),
  KEY `FK_detailpemesanan_tipekamar` (`tipe_kamar`),
  KEY `FK_detailpemesanan_kamar` (`kamar_id`),
  CONSTRAINT `detailpemesanan_ibfk_1` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`pemesanan_id`),
  CONSTRAINT `FK_detailpemesanan_kamar` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`kamar_id`),
  CONSTRAINT `FK_detailpemesanan_tipekamar` FOREIGN KEY (`tipe_kamar`) REFERENCES `tipekamar` (`tipe_kamar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table hotel.kamar
CREATE TABLE IF NOT EXISTS `kamar` (
  `kamar_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_kamar` int NOT NULL,
  `tipe_kamar_id` int DEFAULT NULL,
  `harga_kamar` int NOT NULL,
  `fasilitas` enum('Tanpa Sarapan','Sarapan','','') COLLATE utf8mb4_general_ci NOT NULL,
  `status_kamar` enum('tersedia','dipesan','ditempati') COLLATE utf8mb4_general_ci DEFAULT 'tersedia',
  PRIMARY KEY (`kamar_id`),
  KEY `tipe_kamar_id` (`tipe_kamar_id`),
  CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`tipe_kamar_id`) REFERENCES `tipekamar` (`tipe_kamar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table hotel.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `pegawai_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `posisi_id` int DEFAULT NULL,
  PRIMARY KEY (`pegawai_id`),
  KEY `posisi_id` (`posisi_id`),
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`posisi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table hotel.pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `pemesanan_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `jumlah_tamu` int NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status_pemesanan` enum('dikonfirmasi','batal','selesai') COLLATE utf8mb4_general_ci DEFAULT 'dikonfirmasi',
  PRIMARY KEY (`pemesanan_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table hotel.posisi
CREATE TABLE IF NOT EXISTS `posisi` (
  `posisi_id` int NOT NULL AUTO_INCREMENT,
  `posisi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`posisi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table hotel.tipekamar
CREATE TABLE IF NOT EXISTS `tipekamar` (
  `tipe_kamar_id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_tipe` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jmlh_tamu` int DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `ukuran` int DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`tipe_kamar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table hotel.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
