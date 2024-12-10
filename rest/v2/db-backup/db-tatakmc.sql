-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 09:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-tatakmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_aid` int(11) NOT NULL,
  `client_is_active` tinyint(1) NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `client_email` varchar(225) NOT NULL,
  `client_phone` varchar(225) NOT NULL,
  `client_address` varchar(225) NOT NULL,
  `client_created` datetime NOT NULL,
  `client_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`client_aid`, `client_is_active`, `client_name`, `client_email`, `client_phone`, `client_address`, `client_created`, `client_datetime`) VALUES
(2, 1, 'Ramon Plaza', 'ramon.plaza@frontlinebusiness.com.ph', '09752155214', 'San Pablo City', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Mc', 'mark.bumagat@gmail.com', '09752155213', 'San Miguel', '2023-10-06 14:01:42', '2023-10-06 14:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_aid` int(11) NOT NULL,
  `order_is_active` tinyint(1) NOT NULL,
  `order_service_id` varchar(20) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_price` varchar(50) NOT NULL,
  `order_payment_status` varchar(50) NOT NULL,
  `order_client_id` varchar(20) NOT NULL,
  `order_created` datetime NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_aid`, `order_is_active`, `order_service_id`, `order_status`, `order_price`, `order_payment_status`, `order_client_id`, `order_created`, `order_datetime`) VALUES
(1, 1, '3', 'Pending', '350', 'Paid', '2', '2023-10-06 12:42:30', '0000-00-00 00:00:00'),
(3, 1, '3', 'Pending', '350', 'Paid', '3', '2023-10-06 12:44:51', '2023-10-06 12:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_services`
--

CREATE TABLE `tbl_settings_services` (
  `service_aid` int(11) NOT NULL,
  `service_is_active` tinyint(1) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `service_created` datetime NOT NULL,
  `service_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_settings_services`
--

INSERT INTO `tbl_settings_services` (`service_aid`, `service_is_active`, `service_type`, `service_created`, `service_datetime`) VALUES
(2, 1, 'Mug Print', '2023-10-06 12:06:53', '0000-00-00 00:00:00'),
(3, 1, 'DTF Print', '2023-10-06 12:15:18', '2023-10-06 12:15:18'),
(5, 1, 'Silkscreen', '2023-10-06 14:36:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_aid`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_aid`);

--
-- Indexes for table `tbl_settings_services`
--
ALTER TABLE `tbl_settings_services`
  ADD PRIMARY KEY (`service_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_settings_services`
--
ALTER TABLE `tbl_settings_services`
  MODIFY `service_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
