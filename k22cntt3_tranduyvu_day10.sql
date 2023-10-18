-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 03:55 PM
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
-- Database: `k22cntt3_tranduyvu_day10`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog_tdv`
--

CREATE TABLE `catalog_tdv` (
  `CATALOG_TDV` char(10) NOT NULL,
  `NAME_TDV` varchar(50) NOT NULL,
  `TRANGTHAI_TDV` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `catalog_tdv`
--

INSERT INTO `catalog_tdv` (`CATALOG_TDV`, `NAME_TDV`, `TRANGTHAI_TDV`) VALUES
('2210900138', 'Trần Duy Vũ', 1),
('2210900138', '', 1),
('2210900137', 'abc', 1),
('2210900137', 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tdv`
--

CREATE TABLE `product_tdv` (
  `PROID_TDV` char(10) NOT NULL,
  `PRONAME_TDV` varchar(50) NOT NULL,
  `QUANTITY_TDV` int(11) NOT NULL,
  `PRICE_TDV` float NOT NULL,
  `TRANGTHAI_TDV` tinyint(1) NOT NULL,
  `CAT_TDV` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_tdv`
--

INSERT INTO `product_tdv` (`PROID_TDV`, `PRONAME_TDV`, `QUANTITY_TDV`, `PRICE_TDV`, `TRANGTHAI_TDV`, `CAT_TDV`) VALUES
('2210900138', 'Trần Duy Vũ', 123, 100000000, 1, '2210900138'),
('1', '1', 1, 1, 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
