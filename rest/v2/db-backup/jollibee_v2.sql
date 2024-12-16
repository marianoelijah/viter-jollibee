-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 08:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jollibee_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `jollibee_category`
--

CREATE TABLE `jollibee_category` (
  `category_aid` int(11) NOT NULL,
  `category_is_active` tinyint(1) NOT NULL,
  `category_image` varchar(30) NOT NULL,
  `category_title` varchar(30) NOT NULL,
  `category_datetime` varchar(20) NOT NULL,
  `category_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jollibee_category`
--

INSERT INTO `jollibee_category` (`category_aid`, `category_is_active`, `category_image`, `category_title`, `category_datetime`, `category_created`) VALUES
(8, 1, 'palabok-1.webp', 'Palabok', '2024-12-16 08:03:10', 2024),
(9, 1, 'sides-1.webp', 'Sides', '2024-12-16 08:03:30', 2024),
(10, 1, 'dessert-1.webp', 'Dessert', '2024-12-16 08:04:17', 2024),
(11, 1, 'nav-spaghetti.webp', 'Spaghetti', '2024-12-16 08:04:46', 2024),
(12, 1, 'chicken-1.webp', 'Chicken', '2024-12-16 08:05:06', 2024),
(13, 1, 'burger-1.webp', 'Burger', '2024-12-16 08:05:21', 2024),
(14, 1, 'value-meal-1.webp', 'Value Meal', '2024-12-16 08:28:29', 2024),
(15, 1, 'steak-1.webp', 'Burger Steak', '2024-12-16 09:05:28', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `jollibee_food`
--

CREATE TABLE `jollibee_food` (
  `food_aid` int(11) NOT NULL,
  `food_is_active` tinyint(1) NOT NULL,
  `food_image` varchar(20) NOT NULL,
  `food_title` varchar(30) NOT NULL,
  `food_price` int(20) NOT NULL,
  `food_category_id` int(11) NOT NULL,
  `food_datetime` varchar(30) NOT NULL,
  `food_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jollibee_food`
--

INSERT INTO `jollibee_food` (`food_aid`, `food_is_active`, `food_image`, `food_title`, `food_price`, `food_category_id`, `food_datetime`, `food_created`) VALUES
(1, 1, '', '2pc Chickejoy Solo', 180, 1, '', 0),
(4, 1, '', '1pc Burger Steak', 180, 2, '', 0),
(5, 1, '', 'Spicy Chicken', 100, 1, '2024-12-11 11:00:24', 2024),
(6, 1, '', 'Spicy Chicken Noodles', 250, 1, '2024-12-11 11:01:22', 2024),
(7, 1, '', 'Beef', 200, 0, '', 0),
(8, 0, '', '', 0, 0, '', 0),
(9, 0, '20', 'Beef', 0, 0, '', 0),
(10, 1, '', 'Chick', 122, 2, '2024-12-11 11:44:04', 2024),
(11, 1, '', 'Beef Steak', 350, 2, '2024-12-11 11:51:42', 2024),
(12, 1, '', 'Nuggets', 90, 1, '2024-12-11 12:16:22', 2024),
(13, 1, 'chicken-1.webp', '2pc Chickenjoy', 200, 12, '2024-12-16 08:27:06', 2024),
(14, 1, 'chicken-2.webp', '3pc Chickenjoy', 270, 12, '2024-12-16 08:27:40', 2024),
(15, 1, 'chicken-3.webp', '2x Fries Bucket Chickenjoy', 270, 12, '2024-12-16 08:28:01', 2024),
(16, 1, 'value-meal-1.webp', 'Chicken Burger w/ Fries', 550, 14, '2024-12-16 08:28:57', 2024),
(17, 1, 'value-meal-2.webp', 'Cheezee Chicken Burger', 250, 14, '2024-12-16 08:29:17', 2024),
(18, 1, 'value-meal-3.webp', 'Cheezee Chicken Burger', 550, 14, '2024-12-16 08:29:39', 2024),
(19, 1, 'burger-1.webp', 'Yum Burger', 50, 13, '2024-12-16 08:29:59', 2024),
(20, 1, 'burger-2.webp', 'Yum Burger w/ Fries', 90, 13, '2024-12-16 08:45:40', 2024),
(21, 1, 'burger-3.webp', 'Cheezee Yum Burger', 150, 13, '2024-12-16 08:46:09', 2024),
(22, 1, 'dessert-1.webp', 'Peach Mango Pie', 50, 10, '2024-12-16 08:46:30', 2024),
(23, 1, 'dessert-2.webp', 'Ube Pie', 50, 10, '2024-12-16 08:46:54', 2024),
(24, 1, 'palabok-1.webp', 'Palabok', 50, 8, '2024-12-16 08:47:17', 2024),
(25, 1, 'palabok-2.webp', 'Palabok w/ drinks', 50, 8, '2024-12-16 08:47:39', 2024),
(26, 1, 'spag-1.webp', 'Spaghetti', 99, 11, '2024-12-16 09:01:27', 2024),
(27, 1, 'spag-2.webp', 'Spaghetti w/ Chickenjoy', 250, 11, '2024-12-16 09:04:55', 2024),
(28, 1, 'steak-1.webp', '3pc Burger Steak', 150, 15, '2024-12-16 09:05:51', 2024),
(29, 1, 'steak-2.webp', 'Special Burger Steak', 130, 15, '2024-12-16 09:06:18', 2024),
(30, 1, 'sides-1.webp', 'Large Fries', 70, 9, '2024-12-16 09:06:44', 2024),
(31, 1, 'sides-2.webp', 'Mashed Potato', 70, 9, '2024-12-16 09:07:06', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `jollibee_settings_role`
--

CREATE TABLE `jollibee_settings_role` (
  `role_aid` int(11) NOT NULL,
  `role_is_active` tinyint(1) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` text NOT NULL,
  `role_created` datetime NOT NULL,
  `role_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jollibee_category`
--
ALTER TABLE `jollibee_category`
  ADD PRIMARY KEY (`category_aid`);

--
-- Indexes for table `jollibee_food`
--
ALTER TABLE `jollibee_food`
  ADD PRIMARY KEY (`food_aid`);

--
-- Indexes for table `jollibee_settings_role`
--
ALTER TABLE `jollibee_settings_role`
  ADD PRIMARY KEY (`role_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jollibee_category`
--
ALTER TABLE `jollibee_category`
  MODIFY `category_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jollibee_food`
--
ALTER TABLE `jollibee_food`
  MODIFY `food_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jollibee_settings_role`
--
ALTER TABLE `jollibee_settings_role`
  MODIFY `role_aid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
