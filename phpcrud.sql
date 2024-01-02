-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 11:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stokbarang2`
--

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `idbarangbarang` int(5) NOT NULL,
  `namabarangbarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stok` char(3) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`idbarang`, `namabarang`, `deskripsi`, `stok`) VALUES
(1, 'Iman K', 'duhaweb@gmail.com', '081391225070', 'Karyawan Swasta'),
(3, 'Arif', 'arif@gmail.com', '081324567709', 'Karyawan Swasta'),
(4, 'Andi', 'andi@gmail.com', '083274355769', 'Pengusaha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
