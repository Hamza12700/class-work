-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2025 at 12:10 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `course_duration` varchar(50) NOT NULL,
  `guardian_mobile_no` varchar(50) NOT NULL,
  `admission_day` varchar(50) NOT NULL,
  `admission_month` varchar(50) NOT NULL,
  `admission_year` varchar(50) NOT NULL,
  `end_day` varchar(50) NOT NULL,
  `end_month` varchar(50) NOT NULL,
  `end_year` varchar(50) NOT NULL,
  `student_photo` varchar(550) NOT NULL,
  `student_photo_thumb` varchar(550) NOT NULL,
  `fee_status` varchar(50) NOT NULL,
  `total_course_fee` varchar(100) NOT NULL,
  `received_course_fee` varchar(100) NOT NULL,
  `pending_course_fee` varchar(100) NOT NULL,
  `course_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `student_name`, `guardian_name`, `course`, `course_code`, `roll_no`, `password`, `mobile_no`, `gender`, `dob`, `address`, `course_duration`, `guardian_mobile_no`, `admission_day`, `admission_month`, `admission_year`, `end_day`, `end_month`, `end_year`, `student_photo`, `student_photo_thumb`, `fee_status`, `total_course_fee`, `received_course_fee`, `pending_course_fee`, `course_status`) VALUES
(160, 'Muhammad Shahid', 'Humayoun Khan', 'English spoken Course', '1', '11457', 'fits', '', 'Male', '', '', '2 Months', '', '', '', '', '', '', '', 'IMG_20250127_110826_800.jpg', 'student_photos/thumbs/IMG_20250127_110826_800.jpg', 'Cleared', '', '', '', 'Completed'),
(161, 'Bilal Sufi', 'Sher Muhammad', 'Mobile Hardware and Software', '18', '11458', 'fits', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, 'Rehmat Iqbal', 'Mehardad Khan', 'English spoken Course', '1', '11450', 'fits', '', 'Male', '', '', '45 Days', '', '', '', '', '', '', '', 'student_photos/rehmat_iqbal.jpg', 'student_photos/thumbs/rehmat_iqbal.jpg', 'Cleared', '', '', '', 'Completed'),
(163, 'Muzammil', 'Muhammad Punnah', 'Mobile Phone Repairing (Hardware/Software)', '18', '11452', 'fits', '03263325383', 'Male', '06-01-2004', '', '45 Days', '', '', '', '', '', '', '', 'IMG_20250109_113708_470.jpg', 'student_photos/thumbs/IMG_20250109_113708_470.jpg', 'Cleared', '', '', '', 'Continue'),
(164, 'Basharat Ullah', 'Abdul Wadood', 'English spoken Course', '1', '11451', 'fits', '', 'Male', '', '', '45 Days', '', '', '', '', '', '', '', 'student_photos/basharat_ullah.jpg', 'student_photos/thumbs/basharat_ullah.jpg', 'Cleared', '', '', '', 'Completed'),
(165, 'Asad Hayat Naul', 'Muhammad Riaz Naul', 'Typing', '16', '11479', 'fits', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, 'Badar Shakeel', 'Shakeel Asghar', 'English spoken Course', '1', '11477', 'fits', '', 'Male', '', '', '45 Days', '', '', '', '', '', '', '', 'student_photos/badar_shakeel.jpg', 'student_photos/thumbs/badar_shakeel.jpg', 'Cleared', '', '', '', 'Completed'),
(167, 'Qasim', 'Muhammad Naeem', 'Spoken english', '1', '11473', 'fits', '', 'Male', '', '', '45 Days', '', '', '', '', '', '', '', '', '', 'Cleared', '', '', '', 'Completed'),
(206, 'Sajjad Akbar khan', 'Nasir Ali ', 'Mobile Phone Repairing (Hardware/Software)', '18', '11470', 'fits', '03039665437', 'Male', '03-07-1999', '', '45 Days', '', '', '', '', '', '', '', 'IMG_20250108_161938_217.jpg', 'student_photos/thumbs/IMG_20250108_161938_217.jpg', 'Cleared', '', '', '', 'Continue'),
(242, 'Rafi ur Rehman ', 'Allah  Ditta', 'Spoken English, MS office ', '1,16', '11508', 'fits', '03407487022', 'Male ', '29/11/2002', 'Khanna pull', '3 Months', '', '', '', '', '', '', '', 'student_photos/no_photo.jpg', 'student_photos/no_photo.jpg', '', '', '', '', ''),
(243, 'Azaan Ali', 'M Rasheed ', 'Mobile Hardware & Software ', '18', '11503', 'fits', '03444090035', 'Male ', '', '', '3 Months', '', '', '', '', '', '', '', 'student_photos/no_photo.jpg', 'student_photos/no_photo.jpg', '', '', '', '', ''),
(244, 'Naif Shafiq ', 'M Shafiq', 'English spoken Course', '1', '11504', 'fits', '03185973003', 'Male', '', '', '3 Months', '', '', '', '', '', '', '', 'student_photos/naif_shafiq.jpg', 'student_photos/thumbs/naif_shafiq.jpg', 'Cleared', '', '', '', 'Completed'),
(245, 'Muhammad Sami ', 'Muhammad  Khursheed ', 'English spoken Course', '1', '11505', 'fits', '03425224760', 'Male', '', '', '3 Months', '', '', '', '', '', '', '', 'student_photos/Muhammad_sami.jpg', 'student_photos/thumbs/Muhammad_sami.jpg', 'Cleared', '', '', '', 'Completed'),
(246, 'Haider Ali Rathore', 'Abdul Waheed Rathore ', 'Mobile Hardware Software ', '18', '11506', 'fits', '031654722197', 'Male ', '', '', '3 Months', '', '', '', '', '', '', '', 'student_photos/haider_ali_rathore.jpg', 'student_photos/thumbs/haider_ali_rathore.jpg', '', '', '', '', ''),
(247, 'M Farhan ', 'M Imran ', 'Mobile Phone Repairing (Hardware/Software)', '18', '11510', 'fits', '03405007170', 'Male', '', '', '3 Months', '', '', '', '', '', '', '', 'student_photos/Muhammad_farhan.jpg', 'student_photos/thumbs/Muhammad_farhan.jpg', 'Cleared', '', '', '', 'Continue'),
(295, 'Usman Ali Khan', 'Zamurad Khan', 'English spoken Course', '1', '41', 'fits', '03185915308', 'Male', '14- 2-2001', 'Shoron colony swan Rawalpindi ', '2 Months', '03105460053', '1-11-24', '', '', '', '', '', 'student_photos/1733825393304468609865527213493.jpg', 'student_photos/thumbs/1733825393304468609865527213493.jpg', '', '', '', '', ''),
(296, 'Muhammad shahzad ', 'Abdul Hakeem ', 'English spoken Course', '1', '45', 'fits', '03068925250', 'Male', '05 / 15 / 2001', 'Rwp Sadiq abad abad ', '2 Months', '03005048736', '7-11-2024', '', '', '', '', '', 'student_photos/17338326497563995043799573084859.jpg', 'student_photos/thumbs/17338326497563995043799573084859.jpg', '', '', '', '', ''),
(297, 'Zain ul abdeen ', 'Raja qadeer', 'English spoken Course', '1', '77', 'fits', '03265653851', 'Male ', '16-09-2006', '6th road dhok pracha Rawalpindi ', '2 Months', '03328520385', '19_11_2024', '', '', '', '', '', 'student_photos/17338328860626474807741553639800.jpg', 'student_photos/thumbs/17338328860626474807741553639800.jpg', '', '', '', '', ''),
(298, 'Mirzaman Khan ', 'Gulzaman Khan ', 'Mobile Phone Repairing (Hardware/Software)', '18', '11547', 'fits', '03035262152', 'Male', '01/01/2001', 'Sohan Islamabad ', '2 Months', '03260639377', '10/12/2024', '', '', '', '', '', '17357961677105203010279672028968.jpg', 'student_photos/thumbs/17357961677105203010279672028968.jpg', 'Pending', '', '', '', 'Continue'),
(299, 'Hashir Shah ', 'Farooq Shah ', 'English spoken Course', '1', '11548', 'fits', '03145408152', 'Male', '', 'Adyal House 748 Street 28-A Rawalpindi', '2 Months', '', '10/12/2024', '', '', '', '', '', 'student_photos/hashir_shah.jpg', 'student_photos/thumbs/hashir_shah.jpg', 'Pending', '', '', '', 'Completed'),
(369, 'Faiz Ullah ', 'M Askari', 'Graphic Designing', '4', '11592', 'fits', '03554219810', 'Male', '15-01-2006', '', '2 Months', '', '7', '1', '2025', '', '', '', 'WhatsApp Image 2025-01-10 at 10.29.33 AM.jpeg', 'student_photos/thumbs/WhatsApp Image 2025-01-10 at 10.29.33 AM.jpeg', 'Cleared', '', '', '', 'Completed'),
(370, 'Sardar Aqeel ', 'Shamas ud Din Johair', 'Mobile Phone Repairing (Hardware/Software)', '18', '11593', 'fits', '03278653499', 'Male', '16-07-2004', '', '2 Months', '', '7', '1', '2025', '', '', '', 'student_photos/no_photo.jpg', 'student_photos/no_photo.jpg', '', '', '', '', 'Continue'),
(371, 'Saad Ali ', 'Muhammad Azeem Khan ', 'Mobile Phone Repairing (Hardware/Software)', '18', '11549', 'fits', '03475975412', 'Male', '14-06-2000', '', '2 Months', '', '8', '1', '2025', '', '', '', 'IMG_20250127_150144_070.jpg', 'student_photos/thumbs/IMG_20250127_150144_070.jpg', 'Cleared', '', '', '', 'Continue'),
(373, 'Saad Khalid ', 'Raja Khalid Mehmood ', 'Web Development', '22', '11596', 'fits', '03209833076', 'Male', '21-01-2006', '', '2 Months', '', '9', '1', '2025', '', '', '', 'IMG_20250110_122138_981.jpg', 'student_photos/thumbs/IMG_20250110_122138_981.jpg', 'Cleared', '', '', '', 'Completed'),
(374, 'Muteeb Zahid ', 'Zahid Mehmood ', 'Mobile Phone Repairing (Hardware/Software)', '18', '11594', 'fits', '03345541289', 'Male', '08-05-2000', '', '2 Months', '', '9', '1', '2025', '', '', '', 'student_photos/IMG_20250109_164850_239.jpg', 'student_photos/thumbs/IMG_20250109_164850_239.jpg', '', '', '', '', 'Continue'),
(375, 'Yaseen ', 'Yasir Latif ', 'English spoken Course', '19', '11597', 'fits', '03155057572', 'Male', '23-09-2003', '', '2 Months', '', '15', '1', '2025', '', '', '', 'student_photos/17369251970506410217199912499717.jpg', 'student_photos/thumbs/17369251970506410217199912499717.jpg', 'Cleared', '', '', '', 'Completed');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `mobile_no`, `whatsapp`, `landline_no`, `email`, `web_email`) VALUES
(1, '0312-00000', '03420000000', '051-00000', 'dummymail@gmail.com', 'info@federalinstituteofskills.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_short_name` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_short_name`, `course_code`, `image`, `description`) VALUES
(1, 'English spoken Course', 'English', '1', '', 'Enhance your language skills with our Spoken English Language Course, designed to improve fluency an'),
(2, 'English Grammar Course', 'English', '2', '', ''),
(3, 'IELTS', 'IELTS', '3', '', ''),
(4, 'Graphic Designing', 'Graphic', '4', '', ''),
(5, 'Video Editing', 'Video', '5', '', ''),
(6, 'Video Animation 2D-3D', 'Animation', '6', '', ''),
(7, 'Ui Ux Designing', 'Ui - Ux', '7', '', ''),
(16, 'Basic Computer Ms Office Typing', 'Basic', '16', '', ''),
(17, 'DIT', 'DIT', '17', '', ''),
(88, 'Web Development', 'Web', '22', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_logo`, `site_favicon`, `site_cover`, `site_language`, `site_theme`, `results_per_page`, `welcome_text`, `browser_tab_title`, `site_name`, `cover_photo`, `site_address`) VALUES
(1, 'images/logo.png', 'images/fav.png', '', 'en', 'light', '150', 'Welcome to LMS', 'LMS', 'LMS', 'Cover Photo', 'islamicestore.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
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
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=698;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12238;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
