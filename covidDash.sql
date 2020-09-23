-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: rds1.ccp8pntuhe7m.ap-south-1.rds.amazonaws.com
-- Generation Time: Sep 23, 2020 at 05:25 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.22-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidDash`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `taluka` varchar(56) NOT NULL,
  `positive` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `discharge` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `death` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `active` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_master`
--

CREATE TABLE `hospital_master` (
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `hospital_code` varchar(64) NOT NULL,
  `hospital_name` varchar(1024) NOT NULL,
  `type` varchar(1024) NOT NULL,
  `is_gov` tinyint(1) NOT NULL,
  `taluka` varchar(128) NOT NULL,
  `number_of_beds` int(10) UNSIGNED NOT NULL,
  `number_of_o2_beds` int(10) UNSIGNED NOT NULL,
  `number_of_ventilator_beds` int(10) UNSIGNED NOT NULL,
  `number_of_occ_beds` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(1024) NOT NULL,
  `contact_person` varchar(256) NOT NULL,
  `contact_number` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_wise_daily_report`
--

CREATE TABLE `hospital_wise_daily_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `occupied_beds` int(10) UNSIGNED DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progressive`
--

CREATE TABLE `progressive` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `tests` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `positive` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `discharge` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `death` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `active` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_on`) VALUES
(1, 'sadmin', 'a03a094ba9b70b73496cac44caa8c510', '2020-09-20 16:07:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_master`
--
ALTER TABLE `hospital_master`
  ADD PRIMARY KEY (`hospital_id`),
  ADD UNIQUE KEY `hospital_code` (`hospital_code`),
  ADD UNIQUE KEY `hospital_code_2` (`hospital_code`);

--
-- Indexes for table `hospital_wise_daily_report`
--
ALTER TABLE `hospital_wise_daily_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `progressive`
--
ALTER TABLE `progressive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_master`
--
ALTER TABLE `hospital_master`
  MODIFY `hospital_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_wise_daily_report`
--
ALTER TABLE `hospital_wise_daily_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progressive`
--
ALTER TABLE `progressive`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hospital_wise_daily_report`
--
ALTER TABLE `hospital_wise_daily_report`
  ADD CONSTRAINT `hospital_wise_daily_report_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital_master` (`hospital_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
