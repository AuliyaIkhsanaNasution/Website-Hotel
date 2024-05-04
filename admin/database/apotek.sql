-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 01:47 AM
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
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `no_faktur` char(10) DEFAULT NULL,
  `id_obat` int(11) DEFAULT 0,
  `jumlah` int(11) DEFAULT 0,
  `harga` int(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `no_faktur`, `id_obat`, `jumlah`, `harga`) VALUES
(1, 'PBL001', 11, 30, 150000),
(2, 'PBL002', 12, 20, 260000),
(3, 'PBL005', 4, 20, 200000),
(4, 'PBL007', 10, 3, 45000),
(5, 'PBL007', 11, 2, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` char(10) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_obat`, `jumlah`, `harga`) VALUES
(1, 'PLN001', 12, 2, 26000),
(2, 'PLN002', 11, 5, 25000),
(3, 'PLN003', 11, 15, 75000),
(4, 'PLN004', 6, 5, 50000),
(5, 'PLN005', 5, 12, 96000),
(6, 'PLN006', 5, 1, 8000),
(7, 'PLN006', 6, 2, 20000),
(8, 'PLN006', 8, 1, 12000),
(9, 'PLN006', 12, 1, 13000),
(10, 'PBL008', 5, 2, 16000),
(11, 'PBL008', 6, 2, 20000),
(12, 'PBL008', 7, 1, 8000),
(13, 'PBL008', 8, 1, 12000),
(14, 'PBL008', 9, 2, 36000),
(15, 'PBL008', 10, 1, 15000),
(16, 'PBL008', 11, 2, 10000),
(17, 'PBL008', 12, 2, 26000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` char(10) NOT NULL DEFAULT '',
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `no_telepon`) VALUES
('KRYN01', 'Seraphina Everhart', 'Jl. Raya Barat No. 8', '082165432789'),
('KRYN02', 'Nova Emberlyn', 'Jl. Merdeka No. 10', '081234567890'),
('KRYN03', 'Zephyr Nightingale', 'Jl. Kenangan Indah No. 5', '087654321098'),
('KRYN04', 'Lyra Starlight', 'Jl. Cendana No. 7', '087812345678'),
('KRYN05', 'Aurora', 'Jl. Maju Terus No. 3', '081345678901'),
('KRYN06', 'Phoenix Stormrider', 'Jl. Pahlawan No. 15', '085678901234'),
('KRYN07', 'Orion Blaze', 'Jl. Ceria No. 4', '081987654321'),
('KRYN08', 'Caspian Wilder', 'Jl. Damai No. 6', '087654321987');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_supplier` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `harga`, `stok`, `id_supplier`) VALUES
(4, 'Omeprazole', 'cair', 10000, 50, 'SUPP06'),
(5, 'Amoxicillin', 'tablet', 8000, 35, 'SUPP06'),
(6, 'paracetamol', 'tablet', 10000, 25, 'SUPP06'),
(7, 'Loratadine', 'tetes', 8000, 34, 'SUPP05'),
(8, 'Metoprolol', 'tetes', 12000, 44, 'SUPP05'),
(9, 'Codeine', 'tetes', 18000, 36, 'SUPP05'),
(10, 'Diphenhydramine', 'Kapsul', 15000, 14, 'SUPP04'),
(11, 'Oralit', 'cair', 5000, 30, 'SUPP04'),
(12, 'Ibuprofen', 'tablet', 13000, 60, 'SUPP02');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(10) NOT NULL DEFAULT 'APTK',
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `usia` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `jenis_kelamin`, `pekerjaan`, `usia`) VALUES
('APTK001', 'Ahmad', 'Jl. Merdeka No. 10, Medan Sumut', 'laki-laki', 'Wiraswasta', 38),
('APTK002', 'Siti', ' Jl. Raya Kebun Jeruk No. 5, Medan', 'perempuan', 'Guru', 28),
('APTK003', 'Budi', 'Jl. Cendana No. 7, SUMUT', 'laki-laki', 'Mahasiswa', 22),
('APTK004', 'Rina', 'Jl. Mangga Dua No. 3,', 'perempuan', 'Dokter', 40),
('APTK005', 'Joko', 'Jl. Pahlawan No. 15', 'laki-laki', 'Pengusaha', 45),
('APTK006', 'Adi', 'Jl. Gajah Mada No. 8, Medan', 'laki-laki', 'Akuntan', 30),
('APTK007', 'Dewi', 'Jl. Melati No. 20', 'perempuan', 'Penulis', 32),
('APTK008', 'Dian', 'Jl. Gatot Subroto No. 25', 'perempuan', 'Insinyur', 29),
('APTK010', 'Rudi', 'Jl. Sudirman No. 19', 'laki-laki', 'Arsitek', 33),
('APTK011', 'Eko', 'Jl. Diponegoro No. 5', 'laki-laki', 'Pengusaha', 42),
('APTK012', 'Ana', 'Jl. Merak No. 18', 'perempuan', 'Marketing', 27),
('APTK013', 'Rini', 'Jl. Pemuda No. 9', 'perempuan', 'Dokter', 35),
('APTK014', 'Hadi', 'Jl. Ganesha No. 3', 'laki-laki', 'Programmer', 29);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_faktur` char(10) NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `id_karyawan` char(10) DEFAULT NULL,
  `id_supplier` char(10) DEFAULT NULL,
  `total_bayar` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_faktur`, `tanggal`, `id_karyawan`, `id_supplier`, `total_bayar`) VALUES
('PBL001', '2023-12-03', 'KRYN04', 'SUPP04', 150000),
('PBL002', '2023-03-02', 'KRYN03', 'SUPP02', 260000),
('PBL005', '2023-03-02', 'KRYN04', 'SUPP06', 200000),
('PBL007', '2023-12-20', 'KRYN04', 'SUPP04', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` char(10) NOT NULL DEFAULT '',
  `id_pelanggan` char(10) DEFAULT NULL,
  `id_karyawan` char(10) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tanggal_penjualan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `id_karyawan`, `total_bayar`, `tanggal_penjualan`) VALUES
('PBL008', 'APTK014', 'KRYN02', 143000, '2023-12-04'),
('PLN001', 'APTK007', 'KRYN05', 26000, '2023-12-02'),
('PLN002', 'APTK014', 'KRYN05', 25000, '2023-12-02'),
('PLN003', 'APTK001', 'KRYN04', 75000, '2023-12-02'),
('PLN004', 'APTK002', 'KRYN01', 50000, '2023-12-02'),
('PLN005', 'APTK002', 'KRYN01', 96000, '2023-12-02'),
('PLN006', 'APTK005', 'KRYN01', 53000, '2023-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` char(10) NOT NULL DEFAULT '',
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telepon`) VALUES
('SUPP01', 'PT Multiverse Anugerah Chemindo', 'Jl. Hasyim Ashari No.118,Golden City ', '087812345678'),
('SUPP02', 'PT. Isotekindo Intertama', 'Jalan Raya Kebayoran Lama no 309-C', '081345678901'),
('SUPP04', 'PT Jaya Utama Santikah', 'SMART MARKET DAAN MOGOT BLOK B NO 8', '082165432789'),
('SUPP05', 'Dunia Cakrawala Abadi', 'jl.Hayam Wuruk No.127 Lantai GF2 , Jakarta Barat', '087654321098'),
('SUPP06', 'CV. Zara Tech Achievement', 'No 74 RT 002/009 Kel. Kedaung, Depok', '087812345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`),
  ADD KEY `obat_detail` (`id_obat`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `obat_detailjual` (`id_obat`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `sup` (`id_supplier`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_faktur`) USING BTREE,
  ADD KEY `pembelian_karyawan` (`id_karyawan`),
  ADD KEY `pembelian_supplier` (`id_supplier`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `pelangan_penjualan` (`id_pelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `obat_detail` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `obat_detailjual` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `sup` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pembelian_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `pelangan_penjualan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
