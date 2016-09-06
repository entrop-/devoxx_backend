-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2016 at 01:05 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devox`
--
CREATE DATABASE IF NOT EXISTS `devox` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `devox`;

-- --------------------------------------------------------

--
-- Table structure for table `beacons`
--

CREATE TABLE `beacons` (
  `id` int(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beacons`
--

INSERT INTO `beacons` (`id`, `color`, `image`) VALUES
(2, 'ice', 'CGI_Jay_ZX.png'),
(3, 'ice', 'elsa-frozen-disney-04.png'),
(4, 'beetroot', 'merida'),
(5, 'beetroot', 'Merida.png'),
(6, 'mint', 'CGI_Jay_ZX.png'),
(7, 'blueberry', 'LloydTechno.png'),
(8, 'candy', 'Cole_ZX1.png'),
(9, 'lemon', '5Pikachu.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beacons`
--
ALTER TABLE `beacons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beacons`
--
ALTER TABLE `beacons`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
