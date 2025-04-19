-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 03:22 PM
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
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `finish_time` time DEFAULT NULL,
  `todays_date` date NOT NULL,
  `create_ts` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `user_id`, `start_time`, `finish_time`, `todays_date`, `create_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(1, 10003, '13:30:00', '18:30:00', '2024-02-08', '2024-02-08 12:31:31', 'neha', '2024-02-14 12:26:12', 'neha'),
(2, 10001, '06:56:36', '00:00:00', '2024-02-20', '2024-02-20 11:26:49', 'Ria', '2024-02-20 11:26:49', 'Ria'),
(3, 10001, '06:56:36', '00:00:00', '2024-02-20', '2024-02-20 11:27:05', 'Ria', '2024-02-20 11:27:05', 'Ria'),
(4, 10001, '06:56:36', '00:00:00', '2024-02-20', '2024-02-20 11:27:55', 'Ria', '2024-02-20 11:27:55', 'Ria'),
(5, 10001, '06:56:36', '00:00:00', '2024-02-20', '2024-02-20 11:29:02', 'Ria', '2024-02-20 11:29:02', 'Ria'),
(6, 10001, '07:20:09', '00:00:00', '2024-02-20', '2024-02-20 11:50:20', 'Ria', '2024-02-20 11:50:20', 'Ria'),
(7, 10001, '07:20:09', '00:00:00', '2024-02-20', '2024-02-20 11:51:47', 'Ria', '2024-02-20 11:51:47', 'Ria'),
(8, 10001, '07:20:09', NULL, '2024-02-20', '2024-02-20 11:56:08', 'Ria', '2024-02-20 11:56:08', 'Ria'),
(9, 10001, '11:56:08', NULL, '2024-02-20', '2024-02-20 11:56:14', 'Ria', '2024-02-20 11:56:14', 'Ria'),
(10, 10001, '11:56:08', NULL, '2024-02-20', '2024-02-20 11:56:57', 'Ria', '2024-02-20 11:56:57', 'Ria'),
(11, 10001, '11:56:08', NULL, '2024-02-20', '2024-02-20 12:06:55', 'Ria', '2024-02-20 12:06:55', 'Ria'),
(12, 10002, '12:51:06', NULL, '2024-02-20', '2024-02-20 12:51:13', 'sia', '2024-02-20 12:51:13', 'sia'),
(13, 10002, '12:51:06', NULL, '2024-02-20', '2024-02-20 13:00:02', 'sia', '2024-02-20 13:00:02', 'sia'),
(14, 0, '12:51:06', NULL, '2024-02-21', '2024-02-21 11:00:54', 'sia', '2024-02-21 11:00:54', 'sia'),
(15, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 21:33:50', 'Ria', '2024-04-02 21:33:50', 'Ria'),
(16, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 21:35:33', 'Ria', '2024-04-02 21:35:33', 'Ria'),
(17, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 21:39:08', 'Ria', '2024-04-02 21:39:08', 'Ria'),
(18, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 21:40:20', 'Ria', '2024-04-02 21:40:20', 'Ria'),
(19, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 21:43:19', 'Ria', '2024-04-02 21:43:19', 'Ria'),
(20, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 21:43:49', 'Ria', '2024-04-02 21:43:49', 'Ria'),
(21, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 21:44:25', 'Ria', '2024-04-02 21:44:25', 'Ria'),
(22, 10001, '09:32:57', NULL, '2024-04-02', '2024-04-02 23:37:08', 'Ria', '2024-04-02 23:37:08', 'Ria'),
(23, 10006, '12:00:51', NULL, '2024-04-09', '2024-04-09 12:01:30', 'priya', '2024-04-09 12:01:30', 'priya'),
(24, 10001, '05:11:19', NULL, '2024-04-28', '2024-04-28 17:11:43', 'Ria', '2024-04-28 17:11:43', 'Ria'),
(25, 10001, '05:11:19', NULL, '2024-04-28', '2024-04-28 17:12:33', 'Ria', '2024-04-28 17:12:33', 'Ria');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'IT'),
(2, 'Finance'),
(3, 'Complaint');

-- --------------------------------------------------------

--
-- Table structure for table `client_category`
--

CREATE TABLE `client_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_category`
--

INSERT INTO `client_category` (`category_id`, `category_name`) VALUES
(1, 'Finance'),
(2, 'IT'),
(3, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(220) NOT NULL,
  `email` varchar(110) NOT NULL,
  `address` varchar(220) NOT NULL,
  `address_line_1` varchar(220) NOT NULL,
  `address_line_2` varchar(220) NOT NULL,
  `city` varchar(220) NOT NULL,
  `state` varchar(220) NOT NULL,
  `pincode` int(100) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `incorporation_type_id` int(11) NOT NULL,
  `POC_name` varchar(220) NOT NULL,
  `POC_phone` bigint(11) NOT NULL,
  `POC_designation` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`client_id`, `client_name`, `email`, `address`, `address_line_1`, `address_line_2`, `city`, `state`, `pincode`, `phone`, `category_id`, `incorporation_type_id`, `POC_name`, `POC_phone`, `POC_designation`, `status_id`, `created_by`, `created_ts`, `last_updated_by`, `last_updated_ts`) VALUES
(13, 'edujar private limited', 'edujar.hr@gmail.com', '', 'ranchi', 'ranchi', 'ranchi', 'jharkhand', 834001, 9504475460, 2, 2, 'rahul', 8504475899, 'executive manager', 20, 'admin', '2024-04-04 17:53:33', 'admin', '2024-04-05 13:13:24'),
(14, 'set foundaiton', 'roha@gmail.com', '', 'D21 officer colony dugda Bokaro', 'fgfg', 'Bokaro', 'Jharkhand', 828404, 0, 2, 1, '', 9999454053, '', 20, 'admin', '2024-04-04 18:17:37', 'admin', '2024-04-04 18:17:37'),
(15, 'rahul', 'ajwertfg@gmail.com', '', 'D/21 officer colony', '', 'dugda', 'Jharkhand', 828404, 456765432, 1, 5, 'nishu', 8294372130, 'asedrfthgmbn', 20, 'admin', '2024-04-04 18:41:22', 'admin', '2024-04-04 18:41:22'),
(16, 'rahul', 'ajwertfg@gmail.com', '', 'D/21 officer colony', '', 'dugda', 'Jharkhand', 828404, 456765432, 1, 3, 'nishu', 8294372130, 'asedrfthgmbn', 20, 'admin', '2024-04-04 21:59:50', 'admin', '2024-04-04 21:59:50'),
(17, 'sonam', 'nehakumarigupta2322@gmail.com', '', 'D/21 officer colony dugda bokaro', 'wertyhjbvc', 'Bokaro', 'Jharkhand', 828404, 8709383308, 2, 4, 'priya', 8294372130, '', 20, 'admin', '2024-04-05 12:41:52', 'admin', '2024-04-05 12:41:52'),
(18, 'priyanka', 'nehakumarigupta2322@gmail.com', '', 'D/21 officer colony dugda bokaro', '', 'Bokaro', 'Jharkhand', 828404, 6754321345, 2, 1, 'priti', 8294372130, '', 20, 'admin', '2024-04-05 12:49:01', 'admin', '2024-04-05 12:49:01'),
(22, 'puja', 'roha@gmail.com', '', 'AMARI ANANT BIGHA', 'fgfg', 'AURANGABAD', 'BIHAR', 824101, 0, 2, 5, 'nishu', 3453798392, 'designer', 20, 'admin', '2024-04-05 14:40:13', 'admin', '2024-04-05 14:40:13'),
(23, 'Pragya Singh', 'pragyasingh1538@gmail.com', '', 'Birsa Chowk', 'Hinoo', 'RANCHI', 'Jharkhand', 834002, 9431096988, 1, 1, 'Neha Kumari', 8987240437, 'Developer', 20, 'admin', '2024-04-05 15:02:57', 'admin', '2024-04-05 15:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee_detail`
--

CREATE TABLE `employee_detail` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(220) NOT NULL,
  `last_name` varchar(220) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `date_of_joining` date NOT NULL,
  `role` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `emergency_phone` bigint(20) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `address` varchar(220) NOT NULL,
  `address_line_1` varchar(500) NOT NULL,
  `address_line_2` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_detail`
--

INSERT INTO `employee_detail` (`employee_id`, `first_name`, `last_name`, `image`, `email`, `date_of_joining`, `role`, `designation`, `phone`, `gender`, `emergency_phone`, `blood_group`, `status`, `address`, `address_line_1`, `address_line_2`, `city`, `state`, `pincode`, `created_by`, `created_ts`, `last_updated_by`, `last_updated_ts`) VALUES
(10001, 'Ria', 'Singh', 'colour-wheel_ver_1.jpg', 'ria@gmail.com', '2023-11-10', 'Executive', 'Employee', 2343434342, 'Female', 3422442213, 'B-', 'Active', 'Piska Mor, Ratu Road, Ranchi', 'sedrtfygjhgfv', 'ASDFGHJ', 'bokaro', 'gfhj', 554534, 'admin', '2023-11-10 16:29:52', 'Executive', '2024-04-25 15:50:48'),
(10006, 'Priya', 'Murmu', 'colour-wheel_ver_1.jpg', 'priya@gmail.com', '2024-01-29', 'Employee', 'wed developer', 9999999999, 'Female', 9711111111, 'B-', 'Active', 'wertjhgbfvcwerthg', 'D/21 officer colony', 'adrhfg', 'dugda', 'Jharkhand', 828404, 'admin', '2024-02-07 13:07:14', 'admin', '2024-04-25 16:24:26'),
(10010, 'neha', 'kumari', NULL, 'acsrohitprit@gmail.com', '2024-04-01', 'Employee', 'wed developer', 9952000000, 'Female', 9500000000, 'O+', 'Active', 'ranchi', 'ranchi', 'ranchi', 'ranchi', 'jharkhnad', 8340015, 'admin', '2024-04-04 18:07:40', 'Executive', '2024-04-09 12:35:13'),
(10011, 'Menka', 'Murmu', NULL, 'menka@gmail.com', '2024-04-25', 'Employee', 'Employee', 0, 'Female', 1212332211, 'AB+', 'Active', 'Kanke Road, Ranci', 'sas', 'sdad', 'Ranchi', 'Jharkhand', 834008, 'admin', '2024-04-25 15:38:35', 'admin', '2024-04-25 15:38:35'),
(10012, 'Sunita', 'Singh', 'colour-wheel_ver_1.jpg', 'menkamurmu.mm@gmail.com', '0000-00-00', 'Select Role', 'Employee', 8002308358, 'Select Gend', 2344321231, 'Select Bloo', 'Active', 'Qtr no B/12 Gandhinagar Colony, Kanke Road, Ranci', 'Ranchi', 'Jharkhand', 'Ranchi', 'Jharkhand', 834008, 'admin', '2024-04-27 16:15:08', 'admin', '2024-04-27 16:15:08'),
(10013, 'Pragati', 'Singh', 'Untitled.jpg', 'pragati@gmail.com', '2024-03-31', 'Employee', 'Employee', 8002308358, 'Female', 2344321231, 'O+', 'Active', 'Gandhinagar Colony, Kanke Road, Ranchi', 'Ranchi', 'Jharkhand', 'Ranchi', 'Jharkhand', 834008, 'admin', '2024-04-27 16:18:18', 'admin', '2024-04-27 16:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `incorporation_type`
--

CREATE TABLE `incorporation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incorporation_type`
--

INSERT INTO `incorporation_type` (`id`, `name`) VALUES
(1, 'Public Limited Companies'),
(2, 'Private Limited Companies'),
(3, 'One Person Companies'),
(4, 'Partnership Firms'),
(5, 'Limited Liability Partnerships'),
(6, 'Sole Proprietorships'),
(7, 'Company Registration'),
(8, 'Section 8'),
(9, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `mast_task_list`
--

CREATE TABLE `mast_task_list` (
  `master_task_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_ts` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mast_task_list`
--

INSERT INTO `mast_task_list` (`master_task_id`, `name`, `created_ts`, `created_by`) VALUES
(1, 'itr filling', '2024-01-18 18:39:33', 'admin'),
(3, 'web development', '2024-01-20 17:26:06', 'admin'),
(4, 'app development', '2024-01-20 17:26:15', 'admin'),
(5, 'itr filling 2024-25', '2024-01-25 17:24:08', 'admin'),
(6, 'bloging', '2024-04-02 15:10:18', 'admin'),
(7, '1234', '2024-04-02 15:24:23', 'admin'),
(9, 'freelancing', '2024-04-05 12:11:59', 'admin'),
(10, 'blog', '2024-04-05 12:16:41', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `address` varchar(220) NOT NULL,
  `pincode` int(11) NOT NULL,
  `address_line_1` varchar(220) NOT NULL,
  `address_line_2` varchar(220) NOT NULL,
  `city` varchar(220) NOT NULL,
  `state` varchar(220) NOT NULL,
  `country` varchar(220) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ts` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(220) NOT NULL,
  `client_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `assigned_by` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `created_by` varchar(220) NOT NULL,
  `created_ts` datetime NOT NULL,
  `last_updated_by` varchar(220) NOT NULL,
  `last_updated_ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`project_id`, `project_name`, `client_id`, `category_id`, `start_date`, `end_date`, `description`, `assigned_by`, `status_id`, `deal_id`, `created_by`, `created_ts`, `last_updated_by`, `last_updated_ts`) VALUES
(4, 'Web development', 1, 2, '2023-10-13', '2023-11-24', '', 'Executive', 230, 1, 'admin', '2023-11-11 16:14:05', 'admin', '2023-11-11 16:14:05'),
(5, 'Android Development', 1, 2, '2023-10-12', '2023-11-12', 'sdrghbvc', '', 230, 1, 'admin', '2023-11-11 16:14:49', 'admin', '2024-04-02 12:46:10'),
(6, 'Application Development', 2, 2, '2023-11-21', '2023-11-30', '', '', 200, 1, 'admin', '2023-11-21 15:28:25', 'admin', '2023-11-21 15:28:25'),
(7, 'ITR Filing', 1, 1, '2022-04-02', '2024-01-05', '', '', 210, NULL, 'admin', '2023-12-30 12:48:28', 'admin', '2023-12-30 12:48:28'),
(10, 'Android Development', 1, 2, NULL, NULL, '', '', 220, NULL, 'admin', '2023-12-30 13:10:04', 'admin', '2023-12-30 13:10:04'),
(11, 'IT Institute', 9, 3, NULL, NULL, '', '', 240, NULL, 'admin', '2023-12-30 13:15:05', 'admin', '2023-12-30 13:15:05'),
(12, 'ITR Filing', 9, 2, '2023-04-05', '2024-01-05', 'jbjbjhvbdjfhvbdjvbdvbdjfvdfvfvd', 'Executive', 230, 1, 'admin', '2024-01-05 18:02:17', 'admin', '2024-01-05 18:02:17'),
(13, 'ITR Filing', 9, 2, '2023-04-05', '2024-01-05', 'jbjbjhvbdjfhvbdjvbdvbdjfvdfvfvd', 'Executive', 240, 1, 'admin', '2024-01-05 18:04:33', 'admin', '2024-01-05 18:04:33'),
(14, 'ITR Filing', 9, 2, '2023-04-05', '2024-01-05', 'jbjbjhvbdjfhvbdjvbdvbdjfvdfvfvd', 'Executive', 210, 1, 'admin', '2024-01-05 18:09:15', 'admin', '2024-01-05 18:09:15'),
(15, 'ITR Filing', 9, 2, '2023-04-05', '2024-01-05', 'jbjbjhvbdjfhvbdjvbdvbdjfvdfvfvd', 'Executive', 0, 1, 'admin', '2024-01-05 18:44:47', 'admin', '2024-01-05 18:44:47'),
(16, 'ITR Filing', 7, 2, '2023-04-05', '2024-01-05', 'jbjbjhvbdjfhvbdjvbdvbdjfvdfvfvd', 'Executive', 230, 1, 'admin', '2024-01-08 16:06:10', 'admin', '2024-01-08 16:06:10'),
(17, 'ITR Filing', 9, 2, '2023-04-05', '2024-01-05', 'jbjbjhvbdjfhvbdjvbdvbdjfvdfvfvd', 'Executive', 210, 1, 'admin', '2024-01-09 17:40:15', 'admin', '2024-01-09 17:40:15'),
(18, 'ITR Filing', 9, 2, '2023-04-05', '2024-01-05', 'jbjbjhvbdjfhvbdjvbdvbdjfvdfvfvd', 'Executive', 220, 1, 'admin', '2024-01-09 17:40:40', 'admin', '2024-01-09 17:40:40'),
(19, 'Web development', 9, 2, '2023-12-31', '2024-01-12', 'jhkjhkjhkjaS', 'Supervisor', 240, 1, 'admin', '2024-01-09 17:46:55', 'admin', '2024-01-09 17:46:55'),
(20, 'task_manger', 0, 2, '2024-01-17', '2024-01-30', 'all function in detail', 'executive', 240, 1, 'admin', '2024-01-17 13:16:35', 'admin', '2024-01-17 13:16:35'),
(21, 'neha_default', 10, 2, '2024-01-19', '0000-00-00', NULL, 'executive', 200, NULL, 'admin', '2024-01-19 14:20:08', 'admin', '2024-01-19 14:20:08'),
(22, 'sonam_default', 11, 2, '2024-01-19', '2044-01-19', NULL, 'executive', 210, NULL, 'admin', '2024-01-19 14:27:48', 'admin', '2024-01-19 14:27:48'),
(23, 'rahul_default', 12, 2, '2024-01-20', '2044-01-20', NULL, 'executive', 200, NULL, 'admin', '2024-01-20 18:28:05', 'admin', '2024-01-20 18:28:05'),
(24, 'anurag project', 6, 0, '2024-02-03', '2024-03-30', NULL, 'Executive', 200, NULL, 'admin', '2024-02-02 12:24:40', 'admin', '2024-02-02 12:24:40'),
(25, 'edujar private limited_default', 13, 2, '2024-04-04', '2044-04-04', NULL, 'executive', 200, NULL, 'admin', '2024-04-04 17:53:33', 'admin', '2024-04-04 17:53:33'),
(26, 'set foundaiton_default', 14, 2, '2024-04-04', '2044-04-04', NULL, 'executive', 200, NULL, 'admin', '2024-04-04 18:17:37', 'admin', '2024-04-04 18:17:37'),
(29, 'sonam_default', 17, 2, '2024-04-05', '2044-04-05', NULL, 'executive', 200, NULL, 'admin', '2024-04-05 12:41:52', 'admin', '2024-04-05 12:41:52'),
(30, 'priyanka_default', 18, 2, '2024-04-05', '2044-04-05', NULL, 'executive', 200, NULL, 'admin', '2024-04-05 12:49:01', 'admin', '2024-04-05 12:49:01'),
(31, 'priyanka_default', 19, 2, '2024-04-05', '2044-04-05', NULL, 'executive', 200, NULL, 'admin', '2024-04-05 12:49:35', 'admin', '2024-04-05 12:49:35'),
(32, 'priyanka_default', 20, 2, '2024-04-05', '2044-04-05', NULL, 'executive', 200, NULL, 'admin', '2024-04-05 12:51:48', 'admin', '2024-04-05 12:51:48'),
(33, 'priyanka_default', 21, 2, '2024-04-05', '2044-04-05', NULL, 'executive', 200, NULL, 'admin', '2024-04-05 12:52:07', 'admin', '2024-04-05 12:52:07'),
(34, 'puja_default', 22, 2, '2024-04-05', '2044-04-05', NULL, 'executive', 200, NULL, 'admin', '2024-04-05 14:40:13', 'admin', '2024-04-05 14:40:13'),
(35, 'Pragya Singh_default', 23, 1, '2024-04-05', '2044-04-05', NULL, 'executive', 200, NULL, 'admin', '2024-04-05 15:02:57', 'admin', '2024-04-05 15:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `recurring_relation`
--

CREATE TABLE `recurring_relation` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_ts` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recurring_relation`
--

INSERT INTO `recurring_relation` (`id`, `task_id`, `client_id`, `created_ts`, `created_by`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', 'admin'),
(2, 1, 2, '0000-00-00 00:00:00', 'admin'),
(3, 1, 3, '0000-00-00 00:00:00', 'admin'),
(4, 1, 5, '0000-00-00 00:00:00', 'admin'),
(5, 1, 6, '0000-00-00 00:00:00', 'admin'),
(6, 1, 7, '0000-00-00 00:00:00', 'admin'),
(7, 1, 8, '0000-00-00 00:00:00', 'admin'),
(8, 1, 9, '0000-00-00 00:00:00', 'admin'),
(9, 2, 1, '2024-01-18 14:37:10', 'admin'),
(10, 2, 2, '2024-01-18 14:37:10', 'admin'),
(11, 2, 3, '2024-01-18 14:37:10', 'admin'),
(12, 2, 5, '2024-01-18 14:37:10', 'admin'),
(13, 2, 6, '2024-01-18 14:37:10', 'admin'),
(14, 2, 7, '2024-01-18 14:37:10', 'admin'),
(15, 2, 8, '2024-01-18 14:37:10', 'admin'),
(16, 2, 9, '2024-01-18 14:37:10', 'admin'),
(17, 3, 1, '2024-01-18 18:38:25', 'admin'),
(18, 3, 2, '2024-01-18 18:38:25', 'admin'),
(19, 3, 3, '2024-01-18 18:38:25', 'admin'),
(20, 3, 5, '2024-01-18 18:38:25', 'admin'),
(21, 3, 6, '2024-01-18 18:38:25', 'admin'),
(22, 3, 7, '2024-01-18 18:38:25', 'admin'),
(23, 3, 8, '2024-01-18 18:38:25', 'admin'),
(24, 3, 9, '2024-01-18 18:38:25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` smallint(6) NOT NULL,
  `status_desc` varchar(500) NOT NULL,
  `instance` varchar(15) DEFAULT NULL,
  `created_ts` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated_ts` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `last_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_desc`, `instance`, `created_ts`, `last_updated_ts`, `created_by`, `last_updated_by`) VALUES
(20, 'ACTIVE', 'client', '2022-10-21 09:10:09', '2022-10-21 09:10:09', 'admin', 'admin'),
(30, 'INACTIVE', 'client', '2022-10-21 09:10:09', '2022-10-21 09:10:09', 'admin', 'admin'),
(200, 'NEW', 'project', '2022-10-21 09:10:09', '2022-10-21 09:10:09', 'admin', 'admin'),
(210, 'STARTED', 'project', '2024-01-19 16:22:22', '2024-01-19 16:22:22', '', ''),
(230, 'HOLD/CANCEL', 'project', '2024-01-19 16:23:25', '2024-01-19 16:23:25', '', ''),
(240, 'COMPLETED', 'project', '2022-10-21 09:10:09', '2022-10-21 09:10:09', 'admin', 'admin'),
(300, 'NEW', 'task', '2022-10-21 09:10:09', '2022-10-21 09:10:09', 'admin', 'admin'),
(310, 'STARTED', 'task', '2024-01-19 16:24:57', '2024-01-19 16:24:57', '', ''),
(330, 'HOLD', 'task', '2024-01-19 16:24:57', '2024-01-19 16:24:57', '', ''),
(340, 'COMPLETED', 'task', '2024-01-19 14:40:53', '2024-01-19 14:40:53', '', ''),
(350, 'CANCEL', 'task', '2024-01-29 12:49:22', '2024-01-29 12:49:22', '', ''),
(400, 'NEW', 'employee', '2022-10-21 09:10:09', '2022-10-21 09:10:09', 'admin', 'admin'),
(410, 'ON LEAVE', 'employee', '2024-01-19 16:27:17', '2024-01-19 16:27:17', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(220) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`category_id`, `subcategory_id`, `subcategory_name`, `description`, `status`, `created_by`, `created_ts`, `last_updated_by`, `last_updated_ts`) VALUES
(1, 1, 'ITR Filing', '', '', '', '2023-08-12 09:11:41', '', '2023-08-12 09:11:41'),
(1, 2, 'Compliance Filing', '', '', '', '2023-08-12 09:14:06', '', '2023-08-12 09:14:06'),
(2, 3, 'Software Development', '', '', '', '2023-08-12 09:14:06', '', '2023-08-12 09:14:06'),
(2, 4, 'Website Development', '', '', '', '2023-08-12 09:17:24', '', '2023-08-12 09:17:24'),
(2, 5, 'Android Development', '', '', '', '2023-08-12 09:17:58', '', '2023-08-12 09:17:58'),
(2, 6, 'IT Institute', '', '', '', '2023-08-12 09:19:41', '', '2023-08-12 09:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `sub_task_details`
--

CREATE TABLE `sub_task_details` (
  `subtask_id` int(11) NOT NULL,
  `subtask_name` varchar(220) NOT NULL,
  `assigned_by` varchar(220) NOT NULL,
  `assign_to` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `created_ts` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_task_details`
--

INSERT INTO `sub_task_details` (`subtask_id`, `subtask_name`, `assigned_by`, `assign_to`, `status_id`, `task_id`, `due_date`, `created_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(1, 'part1', '10001', '10003', 300, 43, '2024-01-17', '2024-01-29 12:38:03', 'sia', '2024-02-05 10:47:31', 'neha'),
(2, 'part5', '10001', '10002', 340, 30, '2024-01-08', '2024-01-29 12:45:56', 'sia', '2024-01-29 12:45:56', 'sia'),
(3, 'paert4', '10003', '10001', 300, 43, '2024-01-24', '2024-01-29 14:28:04', 'sia', '2024-01-29 14:28:04', 'sia'),
(4, '234', '10001', '10005', 340, 4, '2024-04-19', '2024-04-04 12:02:48', 'Ria', '2024-04-04 12:02:48', 'Ria');

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

CREATE TABLE `task_details` (
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_name` varchar(220) NOT NULL,
  `due_date` date NOT NULL,
  `reminder_day` tinyint(50) NOT NULL,
  `assigned_to` varchar(220) DEFAULT NULL,
  `assigned_by` varchar(220) NOT NULL,
  `incorporation_type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `reason` varchar(1000) DEFAULT NULL,
  `created_by` varchar(220) NOT NULL,
  `created_ts` datetime NOT NULL,
  `last_updated_by` varchar(220) NOT NULL,
  `last_updated_ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_details`
--

INSERT INTO `task_details` (`task_id`, `project_id`, `task_name`, `due_date`, `reminder_day`, `assigned_to`, `assigned_by`, `incorporation_type_id`, `category_id`, `status_id`, `reason`, `created_by`, `created_ts`, `last_updated_by`, `last_updated_ts`) VALUES
(73, 25, 'itr filling', '2024-04-16', 5, '10001', 'executive', NULL, NULL, 310, '', 'admin', '2024-04-04 18:02:22', '10001', '2024-04-23 17:24:42'),
(74, 25, 'app development', '2024-04-10', 5, '10010', 'executive', 2, NULL, 300, 'adertjgh', 'admin', '2024-04-04 18:34:22', 'admin', '2024-04-05 13:37:33'),
(76, 25, 'blog', '2024-05-01', 7, '10006', 'executive', 2, NULL, 300, NULL, 'admin', '2024-04-05 12:17:06', '2024-04-09 12:35:58', '0000-00-00 00:00:00'),
(77, 35, 'designing', '2024-04-12', 5, '10001', 'Executive', NULL, NULL, 310, NULL, 'admin', '2024-04-05 15:05:20', 'Executive', '2024-04-13 18:09:30'),
(78, 25, 'web development', '2024-04-12', 4, '10010', 'executive', 2, NULL, 300, NULL, 'admin', '2024-04-05 15:07:28', '2024-04-08 17:49:36', '0000-00-00 00:00:00'),
(79, 26, '1234', '2024-04-24', 7, '10006', 'executive', 1, NULL, 300, NULL, 'admin', '2024-04-05 15:45:31', 'admin', '2024-04-05 15:45:31'),
(80, 30, '1234', '2024-04-24', 7, '10006', 'executive', 1, NULL, 300, NULL, 'admin', '2024-04-05 15:45:31', '2024-04-26 13:40:30', '0000-00-00 00:00:00'),
(81, 35, '1234', '2024-04-13', 7, '10006', 'executive', 1, NULL, 300, NULL, 'admin', '2024-04-05 15:45:31', 'admin', '2024-04-05 15:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `task_log`
--

CREATE TABLE `task_log` (
  `task_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `from_status` int(11) NOT NULL,
  `to_status` int(11) NOT NULL,
  `from_assigned_to` int(11) NOT NULL,
  `to_assigned_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_table`
--

CREATE TABLE `task_table` (
  `task_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `assign_to` varchar(12) NOT NULL,
  `assign_by` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `due_date` date NOT NULL,
  `reminder_date` date NOT NULL,
  `created_ts` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_table`
--

INSERT INTO `task_table` (`task_id`, `name`, `assign_to`, `assign_by`, `status`, `due_date`, `reminder_date`, `created_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(1, 'ITR Filling', 'All Client', 'executive', 'Started', '2024-01-27', '2024-01-24', '2024-01-18 13:02:05', 'admin', '2024-01-18 13:02:05', 'admin'),
(2, 'Income Tax Return', 'All Client', 'executive', 'Started', '2024-01-24', '2024-01-18', '2024-01-18 14:37:10', 'admin', '2024-01-18 14:37:10', 'admin'),
(3, 'itr filling', '', '', '', '0000-00-00', '0000-00-00', '2024-01-18 18:38:25', 'admin', '2024-01-18 18:38:25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_ts` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login_ts` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login_id`, `password`, `role`, `created_ts`, `last_login_ts`) VALUES
(1, 'executive', '1234', 'Executive', '2023-11-16 15:23:08', '2023-11-16 15:23:08'),
(2, 'supervisor', '1234', 'Supervisor', '2023-11-16 15:23:45', '2023-11-16 15:23:45'),
(3, '10001', '12345', 'employee', '2023-11-16 15:24:29', '2023-11-16 15:24:29'),
(8, '10007', '1234', 'Employee', '2024-02-07 13:07:52', '2024-02-07 13:07:52'),
(11, '10010', 'Neha@123', 'Employee', '2024-04-04 18:07:40', '2024-04-04 18:07:40'),
(12, '10006', '1234', 'employee', '2024-04-08 17:31:55', '2024-04-08 17:31:55'),
(13, '10011', '1234', 'Employee', '2024-04-25 15:38:35', '2024-04-25 15:38:35'),
(14, '10012', '1234', 'Employee', '2024-04-27 16:15:08', '2024-04-27 16:15:08'),
(15, '10013', '1234', 'Employee', '2024-04-27 16:18:18', '2024-04-27 16:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client_category`
--
ALTER TABLE `client_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `employee_detail`
--
ALTER TABLE `employee_detail`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `incorporation_type`
--
ALTER TABLE `incorporation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mast_task_list`
--
ALTER TABLE `mast_task_list`
  ADD PRIMARY KEY (`master_task_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `recurring_relation`
--
ALTER TABLE `recurring_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `sub_task_details`
--
ALTER TABLE `sub_task_details`
  ADD PRIMARY KEY (`subtask_id`);

--
-- Indexes for table `task_details`
--
ALTER TABLE `task_details`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_table`
--
ALTER TABLE `task_table`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_category`
--
ALTER TABLE `client_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee_detail`
--
ALTER TABLE `employee_detail`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10014;

--
-- AUTO_INCREMENT for table `incorporation_type`
--
ALTER TABLE `incorporation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mast_task_list`
--
ALTER TABLE `mast_task_list`
  MODIFY `master_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `recurring_relation`
--
ALTER TABLE `recurring_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_task_details`
--
ALTER TABLE `sub_task_details`
  MODIFY `subtask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_details`
--
ALTER TABLE `task_details`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `task_table`
--
ALTER TABLE `task_table`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
