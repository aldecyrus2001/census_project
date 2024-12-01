-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 03:10 AM
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
-- Database: `census_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adminID` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminID`, `firstname`, `middlename`, `lastname`, `email`, `password`, `role`, `phone`, `profile_picture`, `last_login`, `created_at`, `update_at`, `token`) VALUES
(123450, 'admin', NULL, 'admin', 'admin@gmail.com', 'admin', 'administrator', '+631234456', 'admin.jpg', '2024-11-23 13:42:34', '2024-11-23 13:42:34', '2024-11-23 13:42:34', ''),
(123451, 'postman', 'postman', 'postman', 'postman@gmail.com', '17b91a317cdc1db107b6a3b57eee7b3b', 'administrator', '312312', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-23 14:07:17', '2024-11-23 14:07:17', '2024-11-23 14:07:17', '904af3ab128b9f9565be805781fa4539e98696b5ff116b3a24cfc7ff2d539993'),
(123452, 'test', 'test', 'test', 'test', '17b91a317cdc1db107b6a3b57eee7b3b', 'Administrator', 'test', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-23 15:26:57', '2024-11-23 15:26:57', '2024-11-23 15:26:57', 'f4ff14ccf8dd7d250b75ad27f4902bb3f827ec012ecfec6ae49baefca8491d30'),
(123453, 'test', 'test', 'test', 'test@gmail.com', '17b91a317cdc1db107b6a3b57eee7b3b', 'Administrator', '421312', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-23 15:28:45', '2024-11-23 15:28:45', '2024-11-23 15:28:45', 'ace096027f5071e511ea710da8ce8a6933026bc3d197f7673413eb5297494732'),
(123454, 'test', 'test', 'test', 'test@gmail.com', '17b91a317cdc1db107b6a3b57eee7b3b', 'Administrator', '21312', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-23 15:38:23', '2024-11-23 15:38:23', '2024-11-23 15:38:23', '04d93f4151298521e1c96e52ace341bc0a3cea5faa7be4950683aec86dd8ea90'),
(123455, 'test', 'test', 'test', 'test@gmail.com', '17b91a317cdc1db107b6a3b57eee7b3b', 'Administrator', '43214', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-23 15:40:29', '2024-11-23 15:40:29', '2024-11-23 15:40:29', '05b06f445fcf27b477714c95413fd2ae3c01aed3d53ef618cce67f0bd587cc8c'),
(123456, 'test', 'test', 'test', 'test', '17b91a317cdc1db107b6a3b57eee7b3b', 'Administrator', 'test', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-23 15:46:20', '2024-11-23 15:46:20', '2024-11-23 15:46:20', '99f20f5d97541e0bcdc81bbf0097b0cb8f58da338cc2eccef5d96a197d5ba978'),
(123457, 'dsadwa', 'dwad', 'wadwa', 'dwa@gmail.com', '17b91a317cdc1db107b6a3b57eee7b3b', 'Administrator', '321321', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-23 15:47:30', '2024-11-23 15:47:30', '2024-11-23 15:47:30', 'e2ef6cf0d2caa8bff33b3382523adb3460632972420198fe9e0bfd346d708ce5'),
(123458, 'dwadw', 'adwad', 'wadwadwa', 'dwadwa', '17b91a317cdc1db107b6a3b57eee7b3b', 'Administrator', 'dwadwa', 'happy-young-cute-illustration-face-profile-png.png', '2024-11-24 00:58:11', '2024-11-24 00:58:11', '2024-11-24 00:58:11', '179cef991dc7c74345ed3f2a5806daf0fcec12de5087cf522584d68b2cdb60de');

-- --------------------------------------------------------

--
-- Table structure for table `census_survey`
--

CREATE TABLE `census_survey` (
  `surveyID` int(11) NOT NULL,
  `householdID` int(50) NOT NULL,
  `survey_date` date NOT NULL,
  `survey_by` int(50) NOT NULL,
  `notes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demographics`
--

CREATE TABLE `demographics` (
  `demographicsID` int(50) NOT NULL,
  `householdID` int(50) NOT NULL,
  `ethnicity` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `primary_language` varchar(50) NOT NULL,
  `secondary_language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_data`
--

CREATE TABLE `education_data` (
  `educationID` int(11) NOT NULL,
  `memberID` int(50) NOT NULL,
  `highest_level_completed` enum('None','Primary','Secondary','Tertiary','Postgraduate') NOT NULL,
  `currently_enrolled` tinyint(1) DEFAULT 0,
  `school_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emplyment_data`
--

CREATE TABLE `emplyment_data` (
  `employementID` int(11) NOT NULL,
  `memberID` int(50) NOT NULL,
  `employment_status` tinyint(1) NOT NULL DEFAULT 0,
  `job_title` varchar(50) NOT NULL,
  `monthly_income` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE `family_member` (
  `memberID` int(50) NOT NULL,
  `householdID` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `relationship_to_head` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `education_level` enum('None','Primary','Secondary','Tertiary','Postgraduate') NOT NULL,
  `income` int(50) DEFAULT NULL,
  `is_head_of_household` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_data`
--

CREATE TABLE `health_data` (
  `healthID` int(11) NOT NULL,
  `memberID` int(50) NOT NULL,
  `has_disability` tinyint(1) NOT NULL DEFAULT 0,
  `pre_existing_condition` varchar(100) NOT NULL,
  `covid_vaccinated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `householdID` int(50) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `household_income` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `utilityID` int(11) NOT NULL,
  `householdID` int(50) NOT NULL,
  `has_electricity` tinyint(1) NOT NULL DEFAULT 0,
  `has_water` tinyint(1) NOT NULL DEFAULT 0,
  `internet_access` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `census_survey`
--
ALTER TABLE `census_survey`
  ADD PRIMARY KEY (`surveyID`);

--
-- Indexes for table `demographics`
--
ALTER TABLE `demographics`
  ADD PRIMARY KEY (`demographicsID`);

--
-- Indexes for table `education_data`
--
ALTER TABLE `education_data`
  ADD PRIMARY KEY (`educationID`);

--
-- Indexes for table `emplyment_data`
--
ALTER TABLE `emplyment_data`
  ADD PRIMARY KEY (`employementID`);

--
-- Indexes for table `family_member`
--
ALTER TABLE `family_member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `health_data`
--
ALTER TABLE `health_data`
  ADD PRIMARY KEY (`healthID`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`householdID`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`utilityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123459;

--
-- AUTO_INCREMENT for table `census_survey`
--
ALTER TABLE `census_survey`
  MODIFY `surveyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demographics`
--
ALTER TABLE `demographics`
  MODIFY `demographicsID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_data`
--
ALTER TABLE `education_data`
  MODIFY `educationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emplyment_data`
--
ALTER TABLE `emplyment_data`
  MODIFY `employementID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_member`
--
ALTER TABLE `family_member`
  MODIFY `memberID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_data`
--
ALTER TABLE `health_data`
  MODIFY `healthID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `householdID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `utilityID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
