-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 02:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Table structure for table `buah`
--

CREATE TABLE `buah` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buah`
--

INSERT INTO `buah` (`id`, `nama`, `harga`, `deskripsi`, `gambar`, `tanggal`) VALUES
('84cfb', 'Pepaya', 25000, 'Kalau Kamu bohong terus gimana Aku mau PEPAYA', 'pepaya.jpg', '2022-11-29 12:41:11'),
('8f4dd', 'Anggur', 30000, 'Walaupun ANGGUR lebih mahal dari apel. tepi lebih enak di-Apel-in dari pada di-ANGGUR-IN', 'anggur.jpg', '2022-11-29 12:38:42'),
('9bd22', 'Mangga', 15000, 'Enaknya ngomong sama orang sunda. Bilang Punten, dikasih MANGGA', '-', '2022-11-29 12:38:19'),
('c599a', 'Pisang', 15000, 'Pohon PISANG kalau dikagetin, jantungnya copot ngga ya? Serius nanya.', '-', '2022-11-29 12:38:19'),
('d09ff', 'Jambu', 10000, 'Buah apa yang pernah dipake perang? JAMBU runcing', 'jambu.jpg', '2022-11-29 12:40:30'),
('de2da', 'Durian', 70000, 'Buah apa yang isinya DURIAN, tapi luarnya berduri?', 'durian.jpg', '2022-11-29 12:38:54'),
('ebd19', 'Leci', 25000, 'Buah apa yang bisa nampung banyak barang? LECI Meja.', '-', '2022-11-29 12:38:19'),
('f73c5', 'Salak', 15000, 'Di matamu aku selalu SALAK', 'salak.jpg', '2022-11-29 12:40:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buah`
--
ALTER TABLE `buah`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
