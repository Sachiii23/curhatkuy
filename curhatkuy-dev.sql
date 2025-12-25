-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2025 at 07:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curhatkuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nama_lengkap`, `email`, `password`) VALUES
('admin baru', 'adminbaru@gmail.com', 'adminbaru'),
('Admin Curhat Kuy', 'curhat.kuy23@gmail.com', 'rungkad123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_id` char(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `package` enum('Sesi Curhat','Couple Curhat','Paket Plong','') NOT NULL,
  `amount` double NOT NULL,
  `payment_type` enum('bca','bni','','') NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`order_id`, `nama_lengkap`, `email`, `package`, `amount`, `payment_type`, `payment_date`) VALUES
('668e8bc15fda3', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Paket Plong', 150000, 'bni', '2024-07-10 13:25:21'),
('668e918c26e55', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Paket Plong', 150000, 'bni', '2024-07-10 13:50:04'),
('668e967cb851b', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-10 14:11:08'),
('668e96cf1e83e', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-10 14:12:31'),
('668e98cd16b8c', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Couple Curhat', 100000, 'bca', '2024-07-10 14:21:01'),
('668e9b946b83a', 'kelompok genz', 'kelompokgenz@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-10 14:32:52'),
('668ea0f84329b', 'kelompok genz', 'kelompokgenz@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-10 14:55:52'),
('66a30d58999db', 'damar pratama', 'damar@gmail.com', 'Couple Curhat', 100000, 'bni', '2024-07-26 02:43:36'),
('66a313d560634', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-26 03:11:17'),
('66a316c9714db', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Couple Curhat', 100000, 'bca', '2024-07-26 03:23:53'),
('66a319332704f', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-26 03:34:11'),
('66a31c8e37b6f', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Couple Curhat', 100000, 'bni', '2024-07-26 03:48:30'),
('66a343c24e25b', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-26 06:35:46'),
('66a3479c0e51c', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-07-26 06:52:12'),
('67296d18a01d0', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Couple Curhat', 100000, 'bni', '2024-11-05 00:55:52'),
('673a895ec7a3f', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-11-18 00:25:02'),
('673ab3ec1d7f6', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bni', '2024-11-18 03:26:36'),
('674dcc5b4959a', 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'Sesi Curhat', 50000, 'bca', '2024-12-02 15:03:55'),
('67a467bc7cd94', 'erlangga', 'erlangga@gmail.com', 'Couple Curhat', 100000, 'bca', '2025-02-06 07:41:48'),
('68005617eb20f', 'damar pratama', 'damar@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-04-17 01:15:03'),
('680059cc452bb', 'damar pratama', 'damar@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-04-17 01:30:52'),
('6800b36467802', 'damar pratama', 'damar@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-04-17 07:53:08'),
('6800b90007805', 'damar pratama', 'damar@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-04-17 08:17:04'),
('6841c426479b3', 'Rayhan A', 'rayhan@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-06-05 16:21:58'),
('68501694111d8', 'Rayhan A', 'rayhan@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-06-16 13:05:24'),
('6850181262c45', 'Rayhan A', 'rayhan@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-06-16 13:11:46'),
('6853ab389f0c3', 'Rayhan A', 'rayhan@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-06-19 06:16:24'),
('6853b50379d85', 'Rayhan A', 'rayhan@gmail.com', 'Sesi Curhat', 50000, 'bca', '2025-06-19 06:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `psikolog`
--

CREATE TABLE `psikolog` (
  `id_psikolog` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `spesialisasi` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psikolog`
--

INSERT INTO `psikolog` (`id_psikolog`, `nama`, `spesialisasi`, `harga`, `role`) VALUES
(1, 'Syachra Shafa Kamila', 'Kuy Curhat', 400000, 'psikolog'),
(2, 'Sufyaan Gymnastiar', 'Kuy Curhat', 280000, 'psikolog'),
(3, 'Adelilya Salsabila Sujatmoko', 'Couple Curhat', 280000, 'psikolog'),
(4, 'Manda Aulia', 'Paket Curhat', 400000, 'psikolog'),
(5, 'Adinda Deswita', 'Couple Curhat', 400000, 'psikolog');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `name`, `email`, `rate`, `message`) VALUES
(1, 'Erlangga Dafa Pratama', '', '5', 'keren bgt'),
(2, 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', '4', 'dikit'),
(3, 'kelompok genz', 'kelompokgenz@gmail.com', '5', 'pelayanannya sangat bagus dan psikolognya ramah'),
(4, 'kelompok genz', 'kelompokgenz@gmail.com', '5', 'pelayanannya sangat bagus dan psikolognya ramah'),
(5, 'kelompok 5', 'kelompok5@gmail.com', '5', 'sangat bagus '),
(6, 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', '5', 'Sangat MEmbantu'),
(7, 'Erlangga Dafa Pratama', 'curhat.kuy23@gmail.com', '5', 'mantull'),
(8, 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', '5', 'sangat bagus sekali pelayanannya :)'),
(9, 'erlangga', 'erlangga@gmail.com', '5', 'pelayanan sangat baik'),
(10, 'Rayhan A', 'rayhananugrah007@gmail.com', '4', 'Konsultasi Berjalan Dengan Baik'),
(11, 'Rayhan A', 'rayhan@gmail.com', '4', 'Psikolog dapat menangani masalah mental saya dengan baik'),
(12, 'Rayhan A', 'rayhan@gmail.com', '5', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT 'user',
  `j_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tlp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `password`, `role`, `j_kelamin`, `alamat`, `tgl_lahir`, `tlp`) VALUES
(1, 'damar pratama', 'damar@gmail.com', 'damar123', 'user', 'Laki-laki', 'mercubuana', '2024-07-21', '082312845432'),
(2, 'erlangga', 'erlangga@gmail.com', 'erlangga123', 'user', 'Laki-laki', 'Jl.Masjid Al Ikhlas Blok D51', '2025-02-06', '08123'),
(3, 'Erlangga Dafa Pratama', 'erlanggadafa.p@gmail.com', 'erlangga123', 'user', 'Laki-laki', 'Jl.Masjid Al Ikhlas Blok D51', '2020-06-10', '081234567890'),
(4, 'Kelompok 5', 'kelompok5@gmail.com', 'kelompok123', 'user', 'Laki-laki', 'Mercu Buana', '2024-07-09', '081234567890'),
(5, 'kelompok genz', 'kelompokgenz@gmail.com', 'kelompokgenz', 'user', 'Laki-laki', 'meruya selatan', '2024-07-09', '081234567890'),
(6, 'Rayhan A', 'rayhan@gmail.com', '1234', 'user', 'Laki-laki', 'Tangerang', '2000-11-11', '12341241'),
(7, 'davin', 'davin@gmail.com', 'davin123', 'user', 'Laki-laki', 'Jl.Masjid Al Ikhlas', '2025-07-10', '081234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `psikolog`
--
ALTER TABLE `psikolog`
  ADD PRIMARY KEY (`id_psikolog`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `psikolog`
--
ALTER TABLE `psikolog`
  MODIFY `id_psikolog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
