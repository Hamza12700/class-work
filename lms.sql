-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2025 at 10:01 AM
-- Server version: 12.0.2-MariaDB
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_info`
--

CREATE TABLE `address_info` (
  `id` int(11) NOT NULL,
  `address_name` varchar(100) NOT NULL,
  `address_location` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_info`
--

INSERT INTO `address_info` (`id`, `address_name`, `address_location`) VALUES
(1, 'Bahria Town Phase 8 Sector C Rawalpindi', 'https://www.google.com/maps?q=33.4940522,73.0761701&z=17&hl=en');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `guardian_mobile_no` varchar(50) NOT NULL,
  `admission_day` varchar(50) NOT NULL,
  `admission_month` varchar(50) NOT NULL,
  `admission_year` varchar(50) NOT NULL,
  `end_day` varchar(50) NOT NULL,
  `end_month` varchar(50) NOT NULL,
  `end_year` varchar(50) NOT NULL,
  `student_photo` varchar(550) NOT NULL,
  `student_photo_thumb` varchar(550) NOT NULL,
  `total_course_fee` varchar(100) NOT NULL,
  `fee_receipt` varchar(200) NOT NULL,
  `course_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `student_name`, `student_email`, `guardian_name`, `course_code`, `roll_no`, `password`, `mobile_no`, `gender`, `dob`, `address`, `guardian_mobile_no`, `admission_day`, `admission_month`, `admission_year`, `end_day`, `end_month`, `end_year`, `student_photo`, `student_photo_thumb`, `total_course_fee`, `fee_receipt`, `course_status`) VALUES
(160, 'Muhammad Shahid', 'some@gmail.com', 'Humayoun Khan', '1', '11111', 'siriftikhar', '', 'Male', '', 'Not mentioned', '', '', '', '', '', '', '', 'user_data/162/user.png', 'student_photos/thumbs/IMG_20250127_110826_800.jpg', '', '', 'Completed'),
(161, 'Bilal Sufi', '', 'Sher Muhammad', '18', '11458', 'fits', '', '', '', '', '', '', '', '', '', '', '', 'user_data/162/user.png', '', '', '', ''),
(162, 'Rehmat Iqbal', '', 'Mehardad Khan', '1', '11450', 'fits', '', 'Male', '', '', '', '', '', '', '', '', '', 'user_data/162/user.png', 'student_photos/thumbs/rehmat_iqbal.jpg', '', '', 'Completed'),
(163, 'Muzammil', '', 'Muhammad Punnah', '18', '11452', 'fits', '03263325383', 'Male', '06-01-2004', '', '', '', '', '', '', '', '', 'user_data/162/user.png', 'student_photos/thumbs/IMG_20250109_113708_470.jpg', '', '', 'Continue'),
(164, 'Basharat Ullah', '', 'Abdul Wadood', '1', '11451', 'fits', '', 'Male', '', '', '', '', '', '', '', '', '', 'user_data/162/user.png', 'student_photos/thumbs/basharat_ullah.jpg', '', '', 'Completed'),
(165, 'Asad Hayat Naul', '', 'Muhammad Riaz Naul', '16', '11479', 'fits', '', '', '', '', '', '', '', '', '', '', '', 'user_data/162/user.png', '', '', '', ''),
(166, 'Badar Shakeel', '', 'Shakeel Asghar', '1', '11477', 'fits', '', 'Male', '', '', '', '', '', '', '', '', '', 'user_data/162/user.png', 'student_photos/thumbs/badar_shakeel.jpg', '', '', 'Completed'),
(704, 'Hamza Rashid', 'nice@gmail.com', 'Rashid', '001,002,003', '11479', 'nice', '13413241324', 'Male', 'something', 'somewhere', '314313241324', '22', '9', '2025', '0', '0', '0', 'user_data/704/pfp.png', '', '6', 'images/cheque.png', 'Continue');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `roll_no` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `month` int(20) NOT NULL,
  `day` varchar(10) NOT NULL,
  `hour` int(100) NOT NULL,
  `pm_or_am` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `roll_no`, `name`, `year`, `month`, `day`, `hour`, `pm_or_am`) VALUES
(17, 11479, 'Hamza Rashid', '2025', 25, 'Thu', 3, 'PM'),
(18, 0, 'Muhammad Shahid', '2025', 25, 'Thu', 8, 'PM'),
(19, 11479, 'Hamza Rashid', '2025', 26, 'Fri', 3, 'PM'),
(20, 11111, 'Muhammad Shahid', '2025', 26, 'Fri', 3, 'PM'),
(21, 11479, 'Hamza Rashid', '2025', 29, 'Mon', 10, 'AM'),
(22, 11111, 'Muhammad Shahid', '2025', 29, 'Mon', 10, 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `landline_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `mobile_no`, `whatsapp`, `landline_no`, `email`, `web_email`) VALUES
(1, '+923003050936', '+923003050936', '0515918266', 'siriftikharacademy@gmail.com', 'info@speaknact.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_short_name` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_duration` varchar(10) NOT NULL,
  `course_fee` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_short_name`, `course_code`, `course_duration`, `course_fee`, `image`, `description`) VALUES
(1, 'English Language Basic', 'ENG-1', '001', '1 Month', '5000', 'images/english-speaking.png', 'it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(2, 'English Language Premium', 'ENG-2', '002', '1 Month', '8000', 'images/advance-english-speaking.jpg', 'it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(3, 'Public Speaking', 'PS', '003', '1 Month', '2999', 'images/public-speaking.jpg', 'it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(4, 'Acting', 'ACT', '004', '1 Month', '3999', 'images/acting.jpg', 'it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `roll_no` int(100) NOT NULL,
  `total_marks` int(100) NOT NULL DEFAULT 0,
  `obtain_marks` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `roll_no`, `total_marks`, `obtain_marks`) VALUES
(1, 11479, 100, 90);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_cover` varchar(100) NOT NULL,
  `site_language` varchar(10) NOT NULL,
  `site_theme` varchar(100) NOT NULL,
  `results_per_page` varchar(10) NOT NULL,
  `welcome_text` varchar(1000) NOT NULL,
  `browser_tab_title` varchar(50) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `cover_photo` varchar(500) NOT NULL,
  `site_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_logo`, `site_favicon`, `site_cover`, `site_language`, `site_theme`, `results_per_page`, `welcome_text`, `browser_tab_title`, `site_name`, `cover_photo`, `site_address`) VALUES
(1, 'images/logo3.png', 'images/fav.png', '', 'en', 'light', '150', 'Welcome to LMS', 'LMS', 'Sir Iftikhar', 'Cover Photo', 'islamicestore.com');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(11) NOT NULL,
  `youtube_account` varchar(100) NOT NULL,
  `facebook_account` varchar(100) NOT NULL,
  `linkedin_account` varchar(100) NOT NULL,
  `tiktok_account` varchar(100) NOT NULL,
  `whatsapp_account` varchar(100) NOT NULL,
  `x_account` varchar(100) NOT NULL,
  `instagram_account` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `youtube_account`, `facebook_account`, `linkedin_account`, `tiktok_account`, `whatsapp_account`, `x_account`, `instagram_account`) VALUES
(3, 'https://youtube.com/@speaknact360?si=_OpZp5iuXnKA2jjn\n', 'https://www.facebook.com/share/17Lb9yTNGu/\n', 'https://www.linked.com', 'https://www.tiktok.com/@siriftikhar?_t=ZS-8zn39Njlbso&_r=1', 'https://wa.me/923003050936', 'https://www.x.com', 'https://www.instagram.com/speak_n_act?igsh=MTk2bWdxcWNsdWMxOQ==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_info`
--
ALTER TABLE `address_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_info`
--
ALTER TABLE `address_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=705;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12242;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
