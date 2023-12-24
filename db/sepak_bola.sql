-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2023 at 07:28 AM
-- Server version: 5.7.33
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepak_bola`
--

-- --------------------------------------------------------

--
-- Table structure for table `klasemen`
--

CREATE TABLE `klasemen` (
  `id` int(11) NOT NULL,
  `id_klub` int(11) NOT NULL,
  `menang` bigint(5) DEFAULT NULL,
  `kalah` bigint(5) DEFAULT NULL,
  `seri` bigint(5) DEFAULT NULL,
  `bermain` bigint(5) DEFAULT NULL,
  `goal_menang` bigint(5) DEFAULT NULL,
  `goal_kalah` bigint(5) DEFAULT NULL,
  `point` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasemen`
--

INSERT INTO `klasemen` (`id`, `id_klub`, `menang`, `kalah`, `seri`, `bermain`, `goal_menang`, `goal_kalah`, `point`, `created_at`) VALUES
(29, 1, 2, 1, 0, 3, 7, 3, 6, '2023-12-24 05:38:24'),
(30, 2, 0, 1, 0, 1, 0, 2, 0, '2023-12-24 05:38:24'),
(31, 3, 1, 1, 0, 2, 7, 4, 3, '2023-12-24 05:38:24'),
(32, 4, 1, 1, 0, 2, 4, 3, 3, '2023-12-24 05:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `klub_bola`
--

CREATE TABLE `klub_bola` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kota_asal` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klub_bola`
--

INSERT INTO `klub_bola` (`id`, `nama`, `kota_asal`, `gambar`, `created_at`) VALUES
(1, 'Persikabo', 'bogor', '1703312543-Klubjpg', '2023-12-23 06:22:23'),
(2, 'Persija', 'Jakarta', '1703315336-Klubpng', '2023-12-23 07:08:56'),
(3, 'Pesebaya', 'Surabaya', '1703317400-Klubpng', '2023-12-23 07:43:20'),
(4, 'PSS', 'Jogja', '1703317439-Klubpng', '2023-12-23 07:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pertandingan`
--

CREATE TABLE `riwayat_pertandingan` (
  `id` int(11) NOT NULL,
  `klub_1` int(11) DEFAULT NULL,
  `klub_2` int(11) DEFAULT NULL,
  `score_klub1` int(11) DEFAULT NULL,
  `score_klub2` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pertandingan`
--

INSERT INTO `riwayat_pertandingan` (`id`, `klub_1`, `klub_2`, `score_klub1`, `score_klub2`, `created_at`) VALUES
(30, 1, 2, 4, 2, '2023-12-24 05:38:24'),
(31, 1, 3, 3, 5, '2023-12-24 05:38:24'),
(32, 1, 4, 3, 1, '2023-12-24 05:38:24'),
(33, 4, 3, 4, 2, '2023-12-24 07:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(2, NULL, 'jipang@gmail.com', '$2y$10$oqLeSKsQNXmRe9K7EXCfDuPNizb1Bm.vgA5qjO1BIC9jLXoUPsHcO', '2023-12-23 17:32:12'),
(3, 'hihi', 'hihi@gmail.com', '$2y$10$FQFVQ1IlPbYXl85AFCjH.OKcmyLWsYDu3w2El6THg6m3yySf3QNDW', '2023-12-23 17:35:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klasemen`
--
ALTER TABLE `klasemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klub_bola`
--
ALTER TABLE `klub_bola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pertandingan`
--
ALTER TABLE `riwayat_pertandingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klasemen`
--
ALTER TABLE `klasemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `klub_bola`
--
ALTER TABLE `klub_bola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_pertandingan`
--
ALTER TABLE `riwayat_pertandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
