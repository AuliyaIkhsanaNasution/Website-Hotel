-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 02:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpemesanan`
--

CREATE TABLE `detailpemesanan` (
  `detail_pemesanan_id` int(11) NOT NULL,
  `pemesanan_id` int(11) DEFAULT NULL,
  `kamar_id` varchar(50) DEFAULT NULL,
  `tipe_kamar` int(11) NOT NULL,
  `harga_kamar_per_malam` decimal(10,2) NOT NULL,
  `fasilitas_plus` enum('Sarapan','Tanpa Sarapan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpemesanan`
--

INSERT INTO `detailpemesanan` (`detail_pemesanan_id`, `pemesanan_id`, `kamar_id`, `tipe_kamar`, `harga_kamar_per_malam`, `fasilitas_plus`) VALUES
(7, 1111, 'SDB-001', 6, 1000000.00, 'Sarapan'),
(9, 11, 'KMR-4', 6, 1000000.00, 'Sarapan'),
(12, 568556, 'STB-2', 1, 700000.00, 'Sarapan'),
(14, 500814, 'STB-1', 1, 800000.00, 'Sarapan'),
(15, 708657, 'STB-1', 1, 800000.00, 'Sarapan'),
(16, 702174, 'SDB-001', 2, 800000.00, 'Sarapan');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` varchar(50) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `tipe_kamar_id` int(11) DEFAULT NULL,
  `booking_date` varchar(500) DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `nomor_kamar`, `tipe_kamar_id`, `booking_date`) VALUES
('FAMILY100', 5, 5, '[]'),
('KMR-4', 4, 6, '[\"2024-05-15\",\"2024-05-15\",\"2024-05-15\"]'),
('SDB-001', 1, 2, '[\"2024-05-13\",\"2024-05-14\",\"2024-05-15\",\"2024-05-13\",\"2024-05-14\",\"2024-05-15\",\"2024-05-22\",\"2024-05-15\",\"2024-05-16\"]'),
('SDB-002', 2, 2, '[\"2024-05-13\",\"2024-05-14\",\"2024-05-15\",\"2024-05-16\"]'),
('STB-1', 3, 1, '[\"2024-06-07\",\"2024-05-19\",\"2024-06-04\"]'),
('STB-2', 6, 1, '[\"2024-06-07\"]');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `posisi_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `email`, `nama`, `alamat`, `no_telepon`, `posisi_id`, `username`, `password`) VALUES
(1, 'edy@gmail.com', 'Edy Susanto', 'Jl.Sisinga Mangaraja', '087678754567', 1, 'pimpinan123', '12345'),
(2, 'Anto@gmail.com', 'anto', 'jl.petisah', '64646474', 3, 'antokun', 'anto12'),
(7, 'anisa@gmail.com', 'Anisa Rahma', 'jl.Sunggal Belok Kanan', '087812345678', 2, 'Resepsionis22', '000');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `jumlah_tamu` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status_pemesanan` enum('proses','dikonfirmasi','batal','selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `user_id`, `tanggal_pesan`, `tanggal_checkin`, `tanggal_checkout`, `jumlah_tamu`, `total_harga`, `status_pemesanan`) VALUES
(11, 529630, '2024-05-14', '2024-05-15', '2024-05-16', 2, 1100000.00, 'selesai'),
(1111, 122094, '2024-05-14', '2024-05-15', '2024-05-16', 2, 1100000.00, 'selesai'),
(500814, 859050, '2024-05-15', '2024-05-19', '2024-05-20', 2, 800000.00, 'selesai'),
(568556, 313601, '2024-05-15', '2024-06-07', '2024-06-08', 2, 800000.00, 'proses'),
(702174, 161282, '2024-05-15', '2024-05-16', '2024-05-17', 2, 800000.00, 'proses'),
(708657, 766968, '2024-05-15', '2024-06-04', '2024-06-05', 2, 800000.00, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `posisi_id` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`posisi_id`, `posisi`) VALUES
(1, 'Pimpinan'),
(2, 'Resepsionis'),
(3, 'Room Service');

-- --------------------------------------------------------

--
-- Table structure for table `tipekamar`
--

CREATE TABLE `tipekamar` (
  `tipe_kamar_id` int(11) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `nama_tipe` varchar(100) NOT NULL,
  `jmlh_tamu` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ukuran` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipekamar`
--

INSERT INTO `tipekamar` (`tipe_kamar_id`, `slug`, `nama_tipe`, `jmlh_tamu`, `deskripsi`, `ukuran`, `harga`, `image`) VALUES
(1, 'superiortwin', 'Superior-Twin Bed', 2, 'Tipe Kamar yang memakai dua bed single', 27, 700000, 'stb1'),
(2, 'Superior', 'Superior-Double Bed', 2, 'tipe kamar ini menggunakan satu king bed', 27, 700000, 'sdb1'),
(3, 'deluxetwin', 'Deluxe-Twin Bed', 2, 'kamar ini memakai dua single bed', 30, 830000, 'dtb2'),
(4, 'deluxe', 'Deluxe-Double Bed', 2, 'kamar ini memakai satu king bed', 30, 830000, 'ddb1'),
(5, 'family', 'Family Room', 2, 'tipe kamar yang lebih luas dan cocok untuk 3 orang', 32, 1000000, 'family2'),
(6, 'tematik', 'Tematik Room', 2, 'Tipe kamar yang luas dan diberi kesan nusantara didalamnya', 32, 1000000, 'tematik1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL DEFAULT 0,
  `nik` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nik`, `email`, `nama`, `alamat`, `no_telepon`) VALUES
(122094, '987654321631', 'test@gmail.com', 'Rent', 'Asahan', '245436346346'),
(161282, '1207214607040001', 'auliyanasti06@gmail.com', 'Auliya Ikhsana', 'Jalan EFG No. 808, Kota P', '085159968152'),
(199909, '1209224910100001', 'test@gmail.com', 'Ponsel Kita', 'Medan', '08973328262'),
(313601, '12345678986', 'm.bobbyoktaviano@gmail.com', 'Muhammad Bobby', 'Asahan', '08973328262'),
(529630, '22091020230003', 'test@gmail.com', 'Ponsel Kita', 'Medan', '08973328262'),
(766968, '123456789', 'selaagustina@gmail.com', 'Sela Agustina', 'jl.Sunggal Medan', '085156787654'),
(859050, '867572539203', 'auliyanasti06@gmail.com', 'auliya ikhsana', 'medan', '2222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
  ADD PRIMARY KEY (`detail_pemesanan_id`),
  ADD KEY `FK_detailpemesanan_tipekamar` (`tipe_kamar`),
  ADD KEY `FK_detailpemesanan_kamar` (`kamar_id`),
  ADD KEY `FK_detailpemesanan_pemesanan` (`pemesanan_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`),
  ADD KEY `tipe_kamar_id` (`tipe_kamar_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD KEY `posisi_id` (`posisi_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `FK_pemesanan_user` (`user_id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`posisi_id`);

--
-- Indexes for table `tipekamar`
--
ALTER TABLE `tipekamar`
  ADD PRIMARY KEY (`tipe_kamar_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
  MODIFY `detail_pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `posisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipekamar`
--
ALTER TABLE `tipekamar`
  MODIFY `tipe_kamar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
  ADD CONSTRAINT `FK_detailpemesanan_kamar` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`kamar_id`),
  ADD CONSTRAINT `FK_detailpemesanan_pemesanan` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`pemesanan_id`),
  ADD CONSTRAINT `FK_detailpemesanan_tipekamar` FOREIGN KEY (`tipe_kamar`) REFERENCES `tipekamar` (`tipe_kamar_id`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`tipe_kamar_id`) REFERENCES `tipekamar` (`tipe_kamar_id`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`posisi_id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_pemesanan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
