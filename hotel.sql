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
  KEY `FK_detailpemesanan_tipekamar` (`tipe_kamar`),
  KEY `FK_detailpemesanan_kamar` (`kamar_id`),
  KEY `FK_detailpemesanan_pemesanan` (`pemesanan_id`),
  CONSTRAINT `FK_detailpemesanan_kamar` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`kamar_id`),
  CONSTRAINT `FK_detailpemesanan_pemesanan` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`pemesanan_id`),
  CONSTRAINT `FK_detailpemesanan_tipekamar` FOREIGN KEY (`tipe_kamar`) REFERENCES `tipekamar` (`tipe_kamar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table hotel.detailpemesanan: ~0 rows (approximately)
REPLACE INTO `detailpemesanan` (`detail_pemesanan_id`, `pemesanan_id`, `kamar_id`, `tipe_kamar`, `harga_kamar_per_malam`, `fasilitas_plus`) VALUES
	(1, 810890, 'SDB-001', 2, 2400000.00, 'Sarapan'),
	(2, 896559, 'SDB-001', 2, 2400000.00, 'Sarapan'),
	(3, 819618, 'SDB-002', 2, 700000.00, 'Tanpa Sarapan'),
	(4, 441755, 'SDB-002', 2, 1600000.00, 'Sarapan');

-- Dumping structure for table hotel.kamar
CREATE TABLE IF NOT EXISTS `kamar` (
  `kamar_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_kamar` int NOT NULL,
  `tipe_kamar_id` int DEFAULT NULL,
  `booking_date` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '[]',
  PRIMARY KEY (`kamar_id`),
  KEY `tipe_kamar_id` (`tipe_kamar_id`),
  CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`tipe_kamar_id`) REFERENCES `tipekamar` (`tipe_kamar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table hotel.kamar: ~2 rows (approximately)
REPLACE INTO `kamar` (`kamar_id`, `nomor_kamar`, `tipe_kamar_id`, `booking_date`) VALUES
	('SDB-001', 1, 2, '["2024-05-13","2024-05-14","2024-05-15","2024-05-13","2024-05-14","2024-05-15"]'),
	('SDB-002', 2, 2, '["2024-05-13","2024-05-14","2024-05-15"]');

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

-- Dumping data for table hotel.pegawai: ~0 rows (approximately)

-- Dumping structure for table hotel.pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `pemesanan_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `jumlah_tamu` int NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status_pemesanan` enum('proses','dikonfirmasi','batal','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`pemesanan_id`),
  KEY `FK_pemesanan_user` (`user_id`),
  CONSTRAINT `FK_pemesanan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table hotel.pemesanan: ~0 rows (approximately)
REPLACE INTO `pemesanan` (`pemesanan_id`, `user_id`, `tanggal_pesan`, `tanggal_checkin`, `tanggal_checkout`, `jumlah_tamu`, `total_harga`, `status_pemesanan`) VALUES
	(441755, 122094, '2024-05-13', '2024-05-14', '2024-05-16', 2, 1600000.00, 'proses'),
	(810890, 529630, '2024-05-13', '2024-05-13', '2024-05-16', 2, 2400000.00, 'proses'),
	(819618, 313601, '2024-05-13', '2024-05-13', '2024-05-14', 1, 700000.00, 'proses'),
	(896559, 199909, '2024-05-13', '2024-05-13', '2024-05-16', 2, 2400000.00, 'proses');

-- Dumping structure for table hotel.posisi
CREATE TABLE IF NOT EXISTS `posisi` (
  `posisi_id` int NOT NULL AUTO_INCREMENT,
  `posisi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`posisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table hotel.posisi: ~0 rows (approximately)
REPLACE INTO `posisi` (`posisi_id`, `posisi`) VALUES
	(1, 'Pimpinan');

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

-- Dumping data for table hotel.tipekamar: ~6 rows (approximately)
REPLACE INTO `tipekamar` (`tipe_kamar_id`, `slug`, `nama_tipe`, `jmlh_tamu`, `deskripsi`, `ukuran`, `harga`, `image`) VALUES
	(1, 'superiortwin', 'Superior-Twin Bed', 2, 'Tipe Kamar yang memakai dua bed single', 27, 700000, 'stb1'),
	(2, 'Superior', 'Superior-Double Bed', 2, 'tipe kamar ini menggunakan satu king bed', 27, 700000, 'sdb1'),
	(3, 'deluxetwin', 'Deluxe-Twin Bed', 2, 'kamar ini memakai dua single bed', 30, 830000, 'dtb2'),
	(4, 'deluxe', 'Deluxe-Double Bed', 2, 'kamar ini memakai satu king bed', 30, 830000, 'ddb1'),
	(5, 'family', 'Family Room', 2, 'tipe kamar yang lebih luas dan cocok untuk 3 orang', 32, 1000000, 'family2'),
	(6, 'tematik', 'Tematik Room', 2, 'Tipe kamar yang luas dan diberi kesan nusantara didalamnya', 32, 1000000, 'tematik1');

-- Dumping structure for table hotel.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL DEFAULT '0',
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table hotel.user: ~0 rows (approximately)
REPLACE INTO `user` (`user_id`, `nik`, `email`, `nama`, `alamat`, `no_telepon`) VALUES
	(122094, '987654321631', 'test@gmail.com', 'Rent', 'Asahan', '245436346346'),
	(199909, '1209224910100001', 'test@gmail.com', 'Ponsel Kita', 'Medan', '08973328262'),
	(313601, '12345678986', 'm.bobbyoktaviano@gmail.com', 'Muhammad Bobby', 'Asahan', '08973328262'),
	(529630, '22091020230003', 'test@gmail.com', 'Ponsel Kita', 'Medan', '08973328262');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
