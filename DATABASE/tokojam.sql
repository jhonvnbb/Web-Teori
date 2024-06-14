-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2024 at 06:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teoriweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$AIy0X1Ep6alaHDTofiChGeqq7k/d1Kc8vKQf1JZo0mKrzkkj6M626');

-- --------------------------------------------------------

--
-- Table structure for table `bom_produk`
--

CREATE TABLE `bom_produk` (
  `kode_bom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_bk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kebutuhan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama`, `email`, `username`, `password`, `telp`) VALUES
('C0006', 'Jhon V Nababan', 'tinonababan3@gmail.com', 'jhonn', '$2y$10$eRbRhYN8cRGhVPEi2sbc9.NeD1gHazsrE5uiOIAm/tuiqV/G5LkUK', '+62 81375839812'),
('C0007', 'Zainab Aqilah', 'zainabb31864@gmail.com', 'zainab', '$2y$10$3WArTxOiRJzaGEd6YiBOg.F8r/AodTIuNZ/fVNK2K0KCPXsq35jSW', '+62 89633451402');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `kode_bk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `qty` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `satuan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`kode_bk`, `nama`, `qty`, `satuan`, `harga`, `tanggal`) VALUES
('M0001', 'Tepung', '76', 'Kg', 1000, '2020-07-26'),
('M0002', 'Pengembang', '0', 'Kg', 1000, '2020-07-27'),
('M0003', 'Cream', '17', 'Kg', 3000, '2020-07-26'),
('M0004', 'Keju', '82', 'Kg', 4000, '2020-07-26'),
('M0005', 'Coklat', '0', 'Kg', 5000, '2020-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int NOT NULL,
  `kode_customer` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`) VALUES
(16, 'C0003', 'P0002', 'Maryam', 5, 15000),
(17, 'C0003', 'P0003', 'Kue tart coklat', 2, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama`, `image`, `deskripsi`, `harga`) VALUES
('P0005', '[Women] Jam Tangan Badaii', '664f7f52ee3e7.jpg', 'Bagus', 2600000),
('P0006', '[Women] Jam Elegan Anti Petir ', '664f7ff17458b.jpg', '			Keren', 1780000),
('P0008', '[Women] Jam Tangan Mahal ', '664f83ba24d6a.jpg', '', 1500000),
('P0009', '[Women] Jam Tangan Bisa Pelet Cowo', '4jam.jpg', 'wowww', 2000000),
('P0010', '[Men] Jam Tangan Anti Air White', '666696a9c1b91.jpg', '\r\n			', 1800000),
('P0011', '[Men] Jam Tangan Stainless Steel', '666697bd1a6ea.jpg', '', 1000000),
('P0012', '[Men] Jam Tangan Woww', '3jam.jpg', 'wowwowwow', 2000000),
('P0013', '[Men] Jam tangan Anti Air Black', '66669645f2adf.jpg', '', 1800000),
('P0014', '[RARE] Jam Tangan Limited Edition', 'Rolex-Watch-PNG-Photos.png', 'Segera Dapatkan! Slot Terbatas!!!', 9999999),
('P0015', '[RARE] Jam Tangan Limited Edition', 'Watch-PNG-Transparent-HD-Photo.png', 'Hampir Punah! Dapatkan  Segera!!!', 9999999),
('P0016', '[RARE] Jam Tangan Limited Edition', 'Watch-PNG-Pic.png', 'Hanya Ada 5 di Dunia! Pesan Sekarang!!!', 9999999),
('P0017', '[RARE] Jam Tangan Limited Edition', 'Watch-PNG-Clipart.png', 'Mengandung Emas 24 Karat! Jangan Sampai Ketinggalan', 9999999);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_order` int NOT NULL,
  `invoice` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_customer` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `provinsi` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kota` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pos` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `terima` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `tolak` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `cek` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_order`, `invoice`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`, `status`, `tanggal`, `provinsi`, `kota`, `alamat`, `kode_pos`, `terima`, `tolak`, `cek`) VALUES
(18, 'INV0001', 'C0006', 'P0010', '[Men] Jam Tangan Anti Air White', 1, 1800000, '0', '2424-06-10', 'Kab. Tapanuli Utara', 'Kab. Tapanuli Utara', 'Siborongborong', '22474', '1', '0', 0),
(19, 'INV0002', 'C0006', 'P0006', '[Women] Jam Elegan', 1, 1780000, '0', '2024-06-13', 'Kab. Tapanuli Utara', 'Kab. Tapanuli Utara', 'Siborongborong', '22474', '1', '0', 0),
(20, 'INV0002', 'C0006', 'P0008', '[Women] Jam Tangan Mahal ', 2, 1500000, '0', '2024-06-13', 'Kab. Tapanuli Utara', 'Kab. Tapanuli Utara', 'Siborongborong', '22474', '1', '0', 0),
(21, 'INV0003', 'C0006', 'P0011', '[Men] Jam Tangan Stainless Steel', 1, 1000000, 'Pesanan Baru', '2024-06-13', 'Kab. Tapanuli Utara', 'Kab. Tapanuli Utara', 'KAKAKKA', '22474', '2', '1', 0),
(22, 'INV0004', 'C0006', 'P0005', '[Women] Jam Bagus', 1, 2600000, 'Pesanan Baru', '2024-06-13', '', '', '', '', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report_cancel`
--

CREATE TABLE `report_cancel` (
  `id_report_cancel` int NOT NULL,
  `id_order` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_inventory`
--

CREATE TABLE `report_inventory` (
  `id_report_inv` int NOT NULL,
  `kode_bk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_bahanbaku` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jml_stok_bk` int NOT NULL,
  `tanggal` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_omset`
--

CREATE TABLE `report_omset` (
  `id_report_omset` int NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `total_omset` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report _penjualan`
--

CREATE TABLE `report _penjualan` (
  `id_report_sell` int NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_terjual` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_produksi`
--

CREATE TABLE `report_produksi` (
  `id_report_prd` int NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_profit`
--

CREATE TABLE `report_profit` (
  `id_report_profit` int NOT NULL,
  `kode_bom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `total_profit` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`kode_bk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `report_cancel`
--
ALTER TABLE `report_cancel`
  ADD PRIMARY KEY (`id_report_cancel`);

--
-- Indexes for table `report_inventory`
--
ALTER TABLE `report_inventory`
  ADD PRIMARY KEY (`id_report_inv`);

--
-- Indexes for table `report_omset`
--
ALTER TABLE `report_omset`
  ADD PRIMARY KEY (`id_report_omset`);

--
-- Indexes for table `report _penjualan`
--
ALTER TABLE `report _penjualan`
  ADD PRIMARY KEY (`id_report_sell`);

--
-- Indexes for table `report_produksi`
--
ALTER TABLE `report_produksi`
  ADD PRIMARY KEY (`id_report_prd`);

--
-- Indexes for table `report_profit`
--
ALTER TABLE `report_profit`
  ADD PRIMARY KEY (`id_report_profit`),
  ADD UNIQUE KEY `kode_bom` (`kode_bom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `report_cancel`
--
ALTER TABLE `report_cancel`
  MODIFY `id_report_cancel` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_inventory`
--
ALTER TABLE `report_inventory`
  MODIFY `id_report_inv` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_omset`
--
ALTER TABLE `report_omset`
  MODIFY `id_report_omset` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report _penjualan`
--
ALTER TABLE `report _penjualan`
  MODIFY `id_report_sell` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_produksi`
--
ALTER TABLE `report_produksi`
  MODIFY `id_report_prd` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_profit`
--
ALTER TABLE `report_profit`
  MODIFY `id_report_profit` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
