-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 03:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `survey_date` datetime NOT NULL,
  `survey_by` int(50) NOT NULL,
  `notes` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `census_survey`
--

INSERT INTO `census_survey` (`surveyID`, `householdID`, `survey_date`, `survey_by`, `notes`) VALUES
(1, 1, '0000-00-00 00:00:00', 123450, ''),
(2, 2, '0000-00-00 00:00:00', 123450, 'dsadwa'),
(3, 3, '0000-00-00 00:00:00', 123450, ''),
(4, 4, '0000-00-00 00:00:00', 123450, 'sdanjwn'),
(5, 5, '0000-00-00 00:00:00', 123450, 'sdanjwn'),
(6, 6, '0000-00-00 00:00:00', 123450, 'sdanjwn');

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

--
-- Dumping data for table `demographics`
--

INSERT INTO `demographics` (`demographicsID`, `householdID`, `ethnicity`, `religion`, `primary_language`, `secondary_language`) VALUES
(1, 1, 'dsadwa', 'dsadwa', 'dsadwa', 'dsadwa'),
(2, 2, 'dsadwa', 'sdadwa', 'sadwdwa', 'mdkma'),
(3, 3, 'dsadwa', 'sdadwa', 'sadwdwa', 'mdkma'),
(4, 4, 'dsad', 'dwa', 'dad', 'dwa'),
(5, 5, 'dsad', 'dwa', 'dad', 'dwa'),
(6, 6, 'dsad', 'dwa', 'dad', 'dwa');

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

--
-- Dumping data for table `education_data`
--

INSERT INTO `education_data` (`educationID`, `memberID`, `highest_level_completed`, `currently_enrolled`, `school_name`) VALUES
(1, 1, '', 0, 'dsadwa'),
(2, 2, '', 0, 'njkdnwak'),
(3, 3, '', 0, 'njkdnwak'),
(4, 4, 'Primary', 0, 'njkdw'),
(5, 5, 'Primary', 0, 'njkdw'),
(6, 6, 'Primary', 0, 'njkdw');

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

--
-- Dumping data for table `emplyment_data`
--

INSERT INTO `emplyment_data` (`employementID`, `memberID`, `employment_status`, `job_title`, `monthly_income`) VALUES
(1, 1, 1, 'dsadwa', 12312),
(2, 2, 1, 'dnjakw', 1238129),
(3, 3, 1, 'dnjakw', 1238129),
(4, 4, 1, 'dwanjk', 1232),
(5, 5, 1, 'dwanjk', 1232),
(6, 6, 1, 'dwanjk', 1232);

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

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`memberID`, `householdID`, `first_name`, `last_name`, `middle_name`, `relationship_to_head`, `gender`, `birthdate`, `occupation`, `education_level`, `income`, `is_head_of_household`) VALUES
(1, 1, 'dsadwa', 'dsadw', 'dsadw', 'Spouse', 'Male', '2024-12-02', 'sadawdw', '', 12312, 1),
(2, 2, 'dsajb', 'hbjh', 'jbj', 'Spouse', 'Male', '2024-12-02', '.,mdkjsan', '', 1238129, 1),
(3, 3, 'dsajb', 'hbjh', 'jbj', 'Spouse', 'Male', '2024-12-02', '.,mdkjsan', '', 1238129, 1),
(4, 4, 'dmakndwkj', 'kjnnj', 'ndjn', 'Spouse', 'Male', '2024-12-02', 'ndjawk', 'Primary', 1232, 1),
(5, 5, 'dmakndwkj', 'kjnnj', 'ndjn', 'Spouse', 'Male', '2024-12-02', 'ndjawk', 'Primary', 1232, 1),
(6, 6, 'dmakndwkj', 'kjnnj', 'ndjn', 'Spouse', 'Male', '2024-12-02', 'ndjawk', 'Primary', 1232, 1);

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

--
-- Dumping data for table `health_data`
--

INSERT INTO `health_data` (`healthID`, `memberID`, `has_disability`, `pre_existing_condition`, `covid_vaccinated`) VALUES
(1, 1, 1, 'dsadaw', 1),
(2, 2, 1, 'dnsajk', 1),
(3, 3, 1, 'dnsajk', 1),
(4, 4, 1, 'dsad', 1),
(5, 5, 1, 'dsad', 1),
(6, 6, 1, 'dsad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `householdID` int(50) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `household_income` int(20) NOT NULL,
  `household_email` varchar(50) DEFAULT NULL,
  `household_phone` varchar(20) DEFAULT NULL,
  `house_type` varchar(50) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`householdID`, `family_name`, `address`, `household_income`, `household_email`, `household_phone`, `house_type`, `ownership`, `image`) VALUES
(1, 'dsad', 'dsadaw', 12312, 'dwasdsadwa', '213213', 'Apartment', 'Rented', '674d1701944c2_Untitled.png'),
(2, 'dsadw', 'uug', 1231, 'gyg@gmail.com', '12312', 'Apartment', 'Owned', '674d18c08f555_Untitled.png'),
(3, 'dsadw', 'uug', 1231, 'gyg@gmail.com', '12312', 'Apartment', 'Owned', '674d18f1704cc_Untitled.png'),
(4, 'ndwj', 'dwnajd', 12321, 'dnwja@gmail.com', '12u983', 'Apartment', 'Rented', '674d19f953431_Untitled.png'),
(5, 'ndwj', 'dwnajd', 12321, 'dnwja@gmail.com', '12u983', 'Apartment', 'Rented', '674d1a61b151b_Untitled.png'),
(6, 'ndwj', 'dwnajd', 12321, 'dnwja@gmail.com', '12u983', 'Apartment', 'Rented', '674d1a9b190d4_Untitled.png');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `utilityID` int(11) NOT NULL,
  `householdID` int(50) NOT NULL,
  `has_electricity` tinyint(1) NOT NULL DEFAULT 0,
  `has_water` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`utilityID`, `householdID`, `has_electricity`, `has_water`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1);

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
  MODIFY `surveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `demographics`
--
ALTER TABLE `demographics`
  MODIFY `demographicsID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `education_data`
--
ALTER TABLE `education_data`
  MODIFY `educationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emplyment_data`
--
ALTER TABLE `emplyment_data`
  MODIFY `employementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `family_member`
--
ALTER TABLE `family_member`
  MODIFY `memberID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `health_data`
--
ALTER TABLE `health_data`
  MODIFY `healthID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `householdID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `utilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
