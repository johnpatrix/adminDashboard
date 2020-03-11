-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 10:22 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

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

CREATE TABLE `bill_fuel_expenditure` (
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

INSERT INTO `bill_fuel_expenditure` (`Bill_id`, `Batch_id`, `Bill_Sl_No`, `Bill_No`, `Bill_Date`, `Particulars`, `Quantity`, `Rate`, `Amount`, `office_copy`) VALUES
(1, 'asdfasd', 1, 'asdf', '2019-08-22', 'Diesel', 12, '12', '144', 0),
(4, 'October', 1, '336', '2020-03-09', 'Diesel', 10, '72', '720', 0),
(5, 'October', 2, '336', '2020-03-08', 'Diesel', 10, '72', '720', 0),
(6, 'October', 3, '336', '2020-03-10', 'Diesel', 10, '72', '720', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_office_expenditure`
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
  `Bill_type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `bill_office_expenditure`
--

INSERT INTO `bill_office_expenditure` (`Bill_id`, `Batch_id`, `Bill_Sl_No`, `Bill_No`, `Bill_Date`, `Particulars`, `Quantity`, `Rate`, `Amount`, `Bill_type`) VALUES
(1, '23', 1, '33652', '2020-03-09', 'Newbook', 5, '326', '1630', 1),
(2, '23', 2, '33651', '2020-03-09', 'Infotec', 3, '30', '90', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_type`
--

CREATE TABLE `bill_type` (
  `Bill_id` smallint(6) NOT NULL,
  `Bill_Type_Name` varchar(300) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `bill_type`
--

INSERT INTO `bill_type` (`Bill_id`, `Bill_Type_Name`) VALUES
(1, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) COLLATE armscii8_bin NOT NULL,
  `user_password` varchar(500) COLLATE armscii8_bin NOT NULL,
  `user_type` varchar(30) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`user_id`, `user_name`, `user_password`, `user_type`) VALUES
(1, 'root', 'toor', 'admin'),
(2, 'viseno', 'nicmom', 'admin_branch'),
(3, 'chandeno', 'nicdaughter', 'admin_branch'),
(4, 'viseno', 'nicmom', 'admin_branch'),
(5, 'chandeno', 'nicdaughter', 'admin_branch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_fuel_expenditure`
--
ALTER TABLE `bill_fuel_expenditure`
  ADD PRIMARY KEY (`Bill_id`);

--
-- Indexes for table `bill_office_expenditure`
--
ALTER TABLE `bill_office_expenditure`
  ADD PRIMARY KEY (`Bill_id`);

--
-- Indexes for table `bill_type`
--
ALTER TABLE `bill_type`
  ADD PRIMARY KEY (`Bill_id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_fuel_expenditure`
--
ALTER TABLE `bill_fuel_expenditure`
  MODIFY `Bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bill_office_expenditure`
--
ALTER TABLE `bill_office_expenditure`
  MODIFY `Bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_type`
--
ALTER TABLE `bill_type`
  MODIFY `Bill_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
