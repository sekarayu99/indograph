-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2023 at 07:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cetak`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`) VALUES
(1, 'Lem Putih'),
(2, 'Lem Hot Meltglue'),
(3, 'Kertas Art Paper'),
(4, 'Kertas HVS'),
(5, 'Kertas Art Carton'),
(6, 'Kertas Ivory'),
(7, 'Buku'),
(8, 'Yasin'),
(9, 'Undangan'),
(10, 'Flyer');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `npwp` varchar(16) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` varchar(255) DEFAULT '0',
  `total` varchar(255) NOT NULL,
  `ppn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `tanggal`, `nama`, `npwp`, `id_barang`, `harga`, `qty`, `diskon`, `total`, `ppn`) VALUES
(1, '2023-08-01', 'Anggrek', '1234567890987654', 1, '20000', 2, NULL, '40000', '4400'),
(6, '2023-08-02', 'Anggrek', '1234567890987654', 2, '20000', 4, '5', '80000', '8360'),
(7, '2023-08-03', 'Mawar', '1236545632123654', 4, '25000', 2, '', '50000', '5500');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(256) NOT NULL,
  `npwp` varchar(16) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` varchar(255) DEFAULT NULL,
  `total` varchar(256) NOT NULL,
  `ppn` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `nama`, `npwp`, `id_barang`, `harga`, `qty`, `diskon`, `total`, `ppn`) VALUES
(6, '2023-08-01', 'Isna', '1234567890987654', 2, '20000', 5, '5', '100000', '10450'),
(7, '2023-08-02', 'Melati', '1232143254325435', 5, '15000', 5, '', '75000', '8250'),
(8, '2023-08-03', 'Mawar', '1236545632123654', 7, '15000', 8, '10', '120000', '11880');

-- --------------------------------------------------------

--
-- Table structure for table `ppn`
--

CREATE TABLE `ppn` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `pajak_keluaran` varchar(256) NOT NULL,
  `pajak_masukan` varchar(256) NOT NULL,
  `bayar_pajak` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ppn`
--

INSERT INTO `ppn` (`id`, `tanggal`, `pajak_keluaran`, `pajak_masukan`, `bayar_pajak`) VALUES
(5, '1-3 Agustus 2023', '30580', '18260', '12320');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `status`) VALUES
(1, 'Paiju', 'admin@gmail.com', '$2y$10$U5AiE6rZgVggA5YVTYPC9OKoT9wjqJhy8ZofgTrPwldfimPlFqQz6', 1, 1),
(2, 'Admin', 'admin@mail.com', '$2y$10$rdfO8ViF1YpNRGaC39UI/OzkLbkXJ76Ybk0g5fDht4HyZqr72568e', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `nama`, `role_id`) VALUES
(1, 'Super Admin', 1),
(2, 'Administrator', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppn`
--
ALTER TABLE `ppn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ppn`
--
ALTER TABLE `ppn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
