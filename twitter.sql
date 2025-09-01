-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2025 at 12:31 PM
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
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(100) NOT NULL,
  `tweet_text` varchar(1000) NOT NULL,
  `tweet_media_name` varchar(500) NOT NULL,
  `tweet_media_ext` varchar(10) NOT NULL,
  `tweet_media_link` varchar(500) NOT NULL,
  `tweet_media_thumb_link` varchar(500) NOT NULL,
  `tweet_by` varchar(30) NOT NULL,
  `tweet_day` varchar(10) NOT NULL,
  `tweet_month` varchar(10) NOT NULL,
  `tweet_year` varchar(5) NOT NULL,
  `tweet_hour` varchar(3) NOT NULL,
  `tweet_minute` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `tweet_text`, `tweet_media_name`, `tweet_media_ext`, `tweet_media_link`, `tweet_media_thumb_link`, `tweet_by`, `tweet_day`, `tweet_month`, `tweet_year`, `tweet_hour`, `tweet_minute`) VALUES
(2, 'Write your Post 2!', '', '', '', '', 'Hamza', '26', '8', '2025', '12', '11'),
(3, 'Write your Post 2!', '', '', '', '', 'Hamza', '26', '8', '2025', '12', '12'),
(4, 'Write your Post!', '', '', '', '', 'Hamza', '26', '8', '2025', '12', '23'),
(47, 'pretty nice', '', '', '', '', 'Hamza', '26', '8', '2025', '1', '04'),
(48, 'Write your Post!', '', '', 'user_data/favicon.ico', '', 'Hamza', '27', '8', '2025', '11', '31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `cover_photo` varchar(500) NOT NULL,
  `profile_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_id`, `user_password`, `user_gender`, `user_email`, `cover_photo`, `profile_photo`) VALUES
(30, 'Hamza', '', 'letmein', 'Male', 'some@gmail.com', '', ''),
(31, 'Hamza1', '', 'whatever', 'Male', 'fake@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
