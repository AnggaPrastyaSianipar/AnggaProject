-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 12:16 PM
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
-- Database: `buahangga`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayarann`
--

CREATE TABLE `pembayarann` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembeliann`
--

CREATE TABLE `pembeliann` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status_pembayaran` enum('Belum Dibayar','Sudah Dibayar') NOT NULL DEFAULT 'Belum Dibayar',
  `status_pengiriman` varchar(20) DEFAULT 'Belum Dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeliann`
--

INSERT INTO `pembeliann` (`id`, `nama`, `harga`, `jumlah`, `total`, `tanggal_pembelian`, `status_pembayaran`, `status_pengiriman`) VALUES
(1, 'Jeruk', 15000, 4, 60000, '0000-00-00', 'Sudah Dibayar', 'Sudah Dikirim'),
(2, 'Apel', 20000, 3, 60000, '0000-00-00', 'Sudah Dibayar', 'Sudah Dikirim'),
(3, 'Anggur', 35000, 3, 100000, '0000-00-00', 'Sudah Dibayar', 'Belum Dikirim'),
(4, 'Anggur', 35000, 3, 105000, '0000-00-00', 'Sudah Dibayar', 'Sudah Dikirim'),
(5, 'Buah 1', 10000, 2, 20000, '0000-00-00', 'Belum Dibayar', 'Belum Dikirim'),
(6, 'Jeruk', 100000, 2, 200000, '0000-00-00', 'Sudah Dibayar', 'Belum Dikirim'),
(7, 'Apel', 20000, 3, 60000, '0000-00-00', 'Belum Dibayar', 'Belum Dikirim'),
(8, 'Jeruk', 15000, 3, 45000, '0000-00-00', 'Belum Dibayar', 'Belum Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_pembelian`, `tanggal_pengiriman`, `status`) VALUES
(2, 1, '2024-07-16', 'Sudah Dikirim'),
(3, 1, '2024-07-16', 'Sudah Dikirim'),
(4, 1, '2024-07-16', 'Sudah Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `gambar`) VALUES
(2, 'Jeruk', 15000, 'https://via.placeholder.com/150?text=Jeruk'),
(3, 'Mangga', 25000, 'https://via.placeholder.com/150?text=Mangga'),
(4, 'Pisang', 10000, 'https://via.placeholder.com/150?text=Pisang'),
(5, 'Strawberry', 30000, 'https://via.placeholder.com/150?text=Strawberry'),
(6, 'Anggur', 35000, 'https://via.placeholder.com/150?text=Anggur'),
(7, 'Jeruk', 140000, 'https://example.com/path/to/logo.png'),
(8, 'Mangga', 140000, 'https://example.com/path/to/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `is_approved`, `created_at`) VALUES
(1, 'angga', '$2y$10$uAc8MDIHzrsx4qo7VKy0oeJJLFE.kF2d.DB9Gt7e3GmqhSaGo3592', 'user', 1, '2024-07-14 06:37:13'),
(2, 'sianipar', '$2y$10$RTcbEgzafsx.fPZRb.kvVuAI1vM9frTnRBkrhs9jWk0KV6liQ49Y.', 'admin', 1, '2024-07-14 06:43:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayarann`
--
ALTER TABLE `pembayarann`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembeliann`
--
ALTER TABLE `pembeliann`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayarann`
--
ALTER TABLE `pembayarann`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeliann`
--
ALTER TABLE `pembeliann`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayarann`
--
ALTER TABLE `pembayarann`
  ADD CONSTRAINT `pembayarann_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembeliann` (`id`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembeliann` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
