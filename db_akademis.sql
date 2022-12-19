-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2022 at 10:05 AM
-- Server version: 8.0.31-0ubuntu0.20.04.2
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'paqih', 'e6b5ddf8ebf9f52a7f6f4ce3e3acfe17');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int NOT NULL,
  `stok` int NOT NULL,
  `link_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_barang`, `stok`, `link_gambar`) VALUES
(2, 'Kaos Belang', 45000, 80, 'Screenshot_20221026_094417.png'),
(3, 'Keyboard', 1200000, 8, 'Screenshot_20221029_113333.png'),
(4, 'Handphone Android', 900000, 17, 'code.png'),
(5, 'HeadPhone', 120000, 28, 'headset-120521151310.jpg'),
(6, 'Buku Sejarah', 50000, 12, 'Screenshot (3).png'),
(7, 'Meja Belajar', 100000, 10, 'Screenshot 2022-10-24 222714.jpg'),
(8, 'Macbook', 16000000, 6, 'Screenshot_20221024_104148.png'),
(9, 'Tupperware', 100000, 90, 'Virtual Background.png'),
(10, 'Jaket', 100000, 12, 'image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `kode_transaksi` int NOT NULL,
  `kode_barang` int NOT NULL,
  `jumlah_jual` int NOT NULL,
  `harga_penjualan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`kode_transaksi`, `kode_barang`, `jumlah_jual`, `harga_penjualan`) VALUES
(33, 8, 2, 16000000),
(33, 9, 1, 100000),
(34, 6, 3, 50000),
(35, 2, 1, 45000),
(35, 3, 1, 1200000),
(35, 5, 4, 120000),
(36, 2, 1, 45000),
(36, 3, 1, 1200000),
(36, 5, 4, 120000),
(37, 3, 1, 1200000),
(38, 4, 1, 900000),
(39, 3, 1, 1200000),
(39, 4, 2, 900000),
(40, 5, 2, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `tgl_transaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_transaksi` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `total_transaksi`, `nama`, `no_hp`, `kecamatan`, `kota`, `alamat`) VALUES
(26, '2022-12-03 17:21:58', 2100000, 'asda', '3424', 'sdfsvsd', 'vsdv', 'dsfsdf'),
(27, '2022-12-03 17:23:02', 2100000, 'asda', '3424', 'sdfsvsd', 'vsdv', 'dsfsdf'),
(28, '2022-12-03 17:25:39', 2100000, 'asda', '3424', 'sdfsvsd', 'vsdv', 'dsfsdf'),
(29, '2022-12-03 17:26:38', 2100000, 'asda', '3424', 'sdfsvsd', 'vsdv', 'dsfsdf'),
(30, '2022-12-03 17:29:08', 2100000, 'asda', '3424', 'sdfsvsd', 'vsdv', 'dsfsdf'),
(31, '2022-12-03 17:32:16', 2100000, 'asda', '3424', 'sdfsvsd', 'vsdv', 'dsfsdf'),
(32, '2022-12-03 17:33:04', 32100000, 'amy', '0990902909', 'cibogo', 'sukasari', 'sumedang'),
(33, '2022-12-03 17:35:02', 32100000, 'amyyyyy', '32423', 'fsd', 'sdf', 'sdfsd'),
(34, '2022-12-03 17:37:13', 32100000, 'amyyyy', '32432', 'ghsf', 'dfdgb', 'bdfbd'),
(35, '2022-12-03 17:37:46', 150000, 'amy ayang', '324234', 'gtregre', 'hteffg', 'werwerwe'),
(36, '2022-12-04 00:26:28', 1725000, 'paqih', '008090548', 'cikeuyeup', 'pamulihan', 'sumedang'),
(37, '2022-12-04 00:31:01', 1725000, 'wer', '34523', 'fgddf', 'dfgdf', 'dfgdf'),
(38, '2022-12-04 19:49:29', 1200000, 'paqih', '3243', 'asda', 'dasd', 'adas'),
(39, '2022-12-04 19:49:52', 900000, 'sada', '213123', 'aqq', 'fff', 'aas'),
(40, '2022-12-04 19:52:27', 3000000, 'paqih', '08930308', 'cikubang', 'pamulihan', 'smd'),
(41, '2022-12-04 20:00:54', 240000, 'wqfew', '22', 'sfdsf', 'sdfs', 'fdsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`kode_transaksi`,`kode_barang`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
