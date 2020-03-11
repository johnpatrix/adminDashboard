-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 07:29 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nic_administration`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_fuel_expenditure`
--

CREATE TABLE `bill_office_expenditure` (
  `Bill_id` bigint(20) UNSIGNED NOT NULL,
  `Batch_id` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Bill_Sl_No` int(11) NOT NULL,
  `Bill_No` varchar(40) COLLATE armscii8_bin NOT NULL,
  `Bill_Date` date NOT NULL,
  `Particulars` varchar(20000) COLLATE armscii8_bin NOT NULL,
  `Quantity` mediumint(8) UNSIGNED NOT NULL,
  `Rate` decimal(10,0) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `office_copy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `bill_fuel_expenditure`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_fuel_expenditure`
--
ALTER TABLE `bill_office_expenditure`
  ADD PRIMARY KEY (`Bill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_fuel_expenditure`
--
ALTER TABLE `bill_office_expenditure`
  MODIFY `Bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
