-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 01:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lcss_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `lcss_children`
--

CREATE TABLE `lcss_children` (
  `children_aid` int(11) NOT NULL,
  `children_is_active` tinyint(1) NOT NULL,
  `children_name` varchar(50) NOT NULL,
  `children_address` text NOT NULL,
  `children_email` varchar(50) NOT NULL,
  `children_datetime` varchar(20) NOT NULL,
  `children_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_children`
--

INSERT INTO `lcss_children` (`children_aid`, `children_is_active`, `children_name`, `children_address`, `children_email`, `children_datetime`, `children_created`) VALUES
(1, 0, 'Kamote', 'Kamote', 'Kamote', '', '2024-04-05 15:41:24'),
(2, 1, 'Apple', 'Apple', 'Apple', '2024-04-11 13:11:09', '2024-04-11 13:11:09'),
(3, 1, 'Banan', 'Abanana', 'Banana', '2024-04-11 13:12:27', '2024-04-11 13:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `lcss_companyinfo`
--

CREATE TABLE `lcss_companyinfo` (
  `company_aid` int(11) NOT NULL,
  `company_is_active` tinyint(1) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_phone` varchar(50) NOT NULL,
  `company_street` varchar(50) NOT NULL,
  `company_city` varchar(50) NOT NULL,
  `company_province` varchar(50) NOT NULL,
  `company_postal` int(10) NOT NULL,
  `company_country` varchar(30) NOT NULL,
  `navigation_bgc` varchar(20) NOT NULL,
  `submenu_color` varchar(20) NOT NULL,
  `accent_color` varchar(20) NOT NULL,
  `company_logo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_companyinfo`
--

INSERT INTO `lcss_companyinfo` (`company_aid`, `company_is_active`, `company_name`, `company_email`, `company_phone`, `company_street`, `company_city`, `company_province`, `company_postal`, `company_country`, `navigation_bgc`, `submenu_color`, `accent_color`, `company_logo`) VALUES
(1, 1, 'Frontline Business Solutions', 'info@frontlinebusiness.com.ph', '(049) 539 2574 | (+63) 917 328 3159', 'Baloc Road, Brgy. San Ignacio', 'San Pablo City', 'Laguna', 899778, 'Philippines', '#9f11659', '#e33589', '#f7e300a', 'fbs-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `lcss_departments`
--

CREATE TABLE `lcss_departments` (
  `departments_aid` int(11) NOT NULL,
  `departments_is_active` tinyint(1) NOT NULL,
  `departments_name` varchar(50) NOT NULL,
  `departments_datetime` varchar(20) NOT NULL,
  `departments_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_departments`
--

INSERT INTO `lcss_departments` (`departments_aid`, `departments_is_active`, `departments_name`, `departments_datetime`, `departments_created`) VALUES
(60, 1, 'Sapot Development', '2024-06-04 09:58:38', '2024-05-06 13:42:41'),
(61, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(62, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(63, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(64, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(65, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(66, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(67, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(68, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(69, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(70, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(71, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(72, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(73, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(74, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(75, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(76, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(77, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(78, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(79, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(80, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(81, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(82, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(83, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(84, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(85, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(86, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(87, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(88, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(89, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(90, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(91, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(92, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(93, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(94, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(95, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(96, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(97, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(98, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(99, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(100, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(101, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(102, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(103, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(104, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(105, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(106, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(107, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(108, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(109, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(110, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(111, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(112, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(113, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(114, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(115, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(116, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(117, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(118, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(119, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(120, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(121, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(122, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(123, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(124, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(125, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(126, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(127, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(128, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(129, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(130, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(131, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(132, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(133, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(134, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(135, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(136, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(137, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(138, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(139, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(140, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(141, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(142, 1, 'Virtual Office', '2024-05-06 13:42:53', '2024-05-06 13:42:53'),
(143, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(144, 1, 'Enagic', '2024-05-06 13:43:05', '2024-05-06 13:43:05'),
(145, 1, 'Web Development', '2024-05-06 13:42:41', '2024-05-06 13:42:41'),
(146, 1, 'Learning Center Solutions', '2024-05-06 13:42:48', '2024-05-06 13:42:48'),
(148, 1, 'Accounting', '2024-05-06 13:42:59', '2024-05-06 13:42:59'),
(149, 1, 'Enagic', '', '2024-05-06 13:43:05'),
(150, 1, 'Cake', '2024-05-08 09:31:17', '2024-05-08 08:47:21'),
(151, 1, 'Portal', '2024-06-04 12:35:55', '2024-06-04 12:35:47'),
(152, 1, 'Zone', '2024-06-04 12:36:04', '2024-06-04 12:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `lcss_employees`
--

CREATE TABLE `lcss_employees` (
  `employees_aid` int(11) NOT NULL,
  `employees_number` varchar(50) NOT NULL,
  `employees__is_active` tinyint(1) NOT NULL,
  `employees_last_name` varchar(200) NOT NULL,
  `employees_first_name` varchar(200) NOT NULL,
  `employees_middle_name` varchar(200) NOT NULL,
  `employees_work_email` varchar(200) NOT NULL,
  `employees_job_title_id` varchar(200) NOT NULL,
  `employees_job_level_id` varchar(20) NOT NULL,
  `employees_date_employed` varchar(20) NOT NULL,
  `employees_birthday` varchar(20) NOT NULL,
  `employees_gender` varchar(50) NOT NULL,
  `employees_marital_status` varchar(50) NOT NULL,
  `employees_street` varchar(200) NOT NULL,
  `employees_city` varchar(200) NOT NULL,
  `employees_province` varchar(200) NOT NULL,
  `employees_country` varchar(50) NOT NULL,
  `employees_postal_code` varchar(20) NOT NULL,
  `employees_mobile_number` varchar(50) NOT NULL,
  `employees_telephone_number` varchar(50) NOT NULL,
  `employees_personal_email` varchar(200) NOT NULL,
  `employees_department_id` int(11) NOT NULL,
  `employees_supervisor_id` int(11) NOT NULL,
  `employees_regularizd_date` varchar(20) NOT NULL,
  `employees_separated_date` varchar(20) NOT NULL,
  `employees_tin_number` varchar(200) NOT NULL,
  `employees_created` datetime NOT NULL,
  `employees_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_employees`
--

INSERT INTO `lcss_employees` (`employees_aid`, `employees_number`, `employees__is_active`, `employees_last_name`, `employees_first_name`, `employees_middle_name`, `employees_work_email`, `employees_job_title_id`, `employees_job_level_id`, `employees_date_employed`, `employees_birthday`, `employees_gender`, `employees_marital_status`, `employees_street`, `employees_city`, `employees_province`, `employees_country`, `employees_postal_code`, `employees_mobile_number`, `employees_telephone_number`, `employees_personal_email`, `employees_department_id`, `employees_supervisor_id`, `employees_regularizd_date`, `employees_separated_date`, `employees_tin_number`, `employees_created`, `employees_updated`) VALUES
(1, '', 1, 'Gregana', 'Ansbert', 'Fajardo', 'ansbert.gregana@frontlinebusiness.com.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '2024-06-24 02:27:08', '2024-06-24 02:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `lcss_joblevel`
--

CREATE TABLE `lcss_joblevel` (
  `joblevel_aid` int(11) NOT NULL,
  `joblevel_is_active` tinyint(1) NOT NULL,
  `joblevel_name` varchar(50) NOT NULL,
  `joblevel_datetime` varchar(20) NOT NULL,
  `joblevel_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_joblevel`
--

INSERT INTO `lcss_joblevel` (`joblevel_aid`, `joblevel_is_active`, `joblevel_name`, `joblevel_datetime`, `joblevel_created`) VALUES
(121, 1, 'Managerial Level', '', 2024),
(122, 1, 'Junior Level', '2024-05-09 15:31:37', 2024),
(123, 1, 'Entry Level', '', 2024),
(124, 1, 'Supervisor Level', '', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `lcss_jobtitle`
--

CREATE TABLE `lcss_jobtitle` (
  `jobtitle_aid` int(11) NOT NULL,
  `jobtitle_is_active` tinyint(1) NOT NULL,
  `jobtitle_joblevel_id` int(11) NOT NULL,
  `jobtitle_name` varchar(50) NOT NULL,
  `jobtitle_datetime` varchar(20) NOT NULL,
  `jobtitle_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_jobtitle`
--

INSERT INTO `lcss_jobtitle` (`jobtitle_aid`, `jobtitle_is_active`, `jobtitle_joblevel_id`, `jobtitle_name`, `jobtitle_datetime`, `jobtitle_created`) VALUES
(18, 1, 121, 'Operations Manager', '2024-06-04 14:00:13', 2024),
(19, 1, 122, 'IT Trainer', '2024-06-04 13:54:20', 2024),
(20, 1, 124, 'Department Supervisor', '2024-06-03 12:21:16', 2024),
(21, 0, 122, 'Fullstack Web Developer', '', 2024),
(23, 0, 123, 'Accounting Trainer', '', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `lcss_parents`
--

CREATE TABLE `lcss_parents` (
  `parents_aid` int(11) NOT NULL,
  `parents_is_active` tinyint(1) NOT NULL,
  `parents_name` varchar(50) NOT NULL,
  `parents_address` text NOT NULL,
  `parents_email` varchar(50) NOT NULL,
  `parents_datetime` varchar(20) NOT NULL,
  `parents_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_parents`
--

INSERT INTO `lcss_parents` (`parents_aid`, `parents_is_active`, `parents_name`, `parents_address`, `parents_email`, `parents_datetime`, `parents_created`) VALUES
(1, 1, 'Thea', '1234Manila', '123@gmail.com', '', ''),
(2, 1, 'Mommy Theaaaaa', 'Rizal', 'mommyt@gmail.com', '', '2024-04-05 13:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `lcss_position`
--

CREATE TABLE `lcss_position` (
  `position_aid` int(11) NOT NULL,
  `position_is_active` tinytext NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `position_department` varchar(50) NOT NULL,
  `position_supervisor` varchar(50) NOT NULL,
  `position_datetime` int(20) NOT NULL,
  `position_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lcss_services`
--

CREATE TABLE `lcss_services` (
  `services_aid` int(11) NOT NULL,
  `services_is_active` tinyint(1) NOT NULL,
  `services_name` varchar(50) NOT NULL,
  `services_department` varchar(50) NOT NULL,
  `services_datetime` int(20) NOT NULL,
  `services_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lcss_users_role`
--

CREATE TABLE `lcss_users_role` (
  `role_aid` int(11) NOT NULL,
  `role_is_active` tinyint(1) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(50) NOT NULL,
  `role_datetime` varchar(20) NOT NULL,
  `role_created` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcss_users_role`
--

INSERT INTO `lcss_users_role` (`role_aid`, `role_is_active`, `role_name`, `role_description`, `role_datetime`, `role_created`) VALUES
(1, 1, 'Developer', 'Web Developer', '2024-06-04 12:31:28', '12312312'),
(10, 1, 'FBS Employee', 'HR Staff', '2024-06-04 13:22:16', '2024-06-04 '),
(11, 0, 'Viewer', 'Viewer', '', '2024-06-04 '),
(12, 1, 'Admin', 'Client Admin', '2024-06-05 08:26:20', '2024-06-05 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lcss_children`
--
ALTER TABLE `lcss_children`
  ADD PRIMARY KEY (`children_aid`);

--
-- Indexes for table `lcss_companyinfo`
--
ALTER TABLE `lcss_companyinfo`
  ADD PRIMARY KEY (`company_aid`);

--
-- Indexes for table `lcss_departments`
--
ALTER TABLE `lcss_departments`
  ADD PRIMARY KEY (`departments_aid`);

--
-- Indexes for table `lcss_employees`
--
ALTER TABLE `lcss_employees`
  ADD PRIMARY KEY (`employees_aid`);

--
-- Indexes for table `lcss_joblevel`
--
ALTER TABLE `lcss_joblevel`
  ADD PRIMARY KEY (`joblevel_aid`);

--
-- Indexes for table `lcss_jobtitle`
--
ALTER TABLE `lcss_jobtitle`
  ADD PRIMARY KEY (`jobtitle_aid`);

--
-- Indexes for table `lcss_parents`
--
ALTER TABLE `lcss_parents`
  ADD PRIMARY KEY (`parents_aid`);

--
-- Indexes for table `lcss_position`
--
ALTER TABLE `lcss_position`
  ADD PRIMARY KEY (`position_aid`);

--
-- Indexes for table `lcss_services`
--
ALTER TABLE `lcss_services`
  ADD PRIMARY KEY (`services_aid`);

--
-- Indexes for table `lcss_users_role`
--
ALTER TABLE `lcss_users_role`
  ADD PRIMARY KEY (`role_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lcss_children`
--
ALTER TABLE `lcss_children`
  MODIFY `children_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lcss_companyinfo`
--
ALTER TABLE `lcss_companyinfo`
  MODIFY `company_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lcss_departments`
--
ALTER TABLE `lcss_departments`
  MODIFY `departments_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `lcss_employees`
--
ALTER TABLE `lcss_employees`
  MODIFY `employees_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lcss_joblevel`
--
ALTER TABLE `lcss_joblevel`
  MODIFY `joblevel_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `lcss_jobtitle`
--
ALTER TABLE `lcss_jobtitle`
  MODIFY `jobtitle_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lcss_parents`
--
ALTER TABLE `lcss_parents`
  MODIFY `parents_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lcss_position`
--
ALTER TABLE `lcss_position`
  MODIFY `position_aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lcss_services`
--
ALTER TABLE `lcss_services`
  MODIFY `services_aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lcss_users_role`
--
ALTER TABLE `lcss_users_role`
  MODIFY `role_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
