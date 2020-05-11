-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 06:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Add SQL
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbkk_final_project_individu`
--

-- --------------------------------------------------------

--
-- Table structure for table `changelogs`
--

CREATE TABLE `changelogs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `activated_pages` varchar(1000) NOT NULL,
  `setted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `changelogs`
--

INSERT INTO `changelogs` (`id`, `username`, `title`, `activated_pages`, `setted`, `created_at`) VALUES
(6, 'derjavo2', 'Version 2.0', '[\"8\",\"9\"]', 0, '2020-04-28 01:04:55'),
(7, 'derjavo2', 'Version 3.0', '[\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]', 0, '2020-04-28 01:05:08'),
(8, 'derjavo2', 'SELECT ALL Version', '[\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]', 0, '2020-04-28 01:47:27'),
(9, 'admin', 'Version 4.0', '[\"10\"]', 0, '2020-04-29 20:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `username`, `content`) VALUES
(2, 8, 'derjavo2', 'halooo'),
(3, 8, 'derjavo2', 'testasd'),
(4, 8, 'derjavo2', 'zxczxczxc');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `subtitle`, `content`, `active`, `created_at`) VALUES
(9, 'derjavo2', 'bbbbbbbbbb', 'cccccccc', 'aaaaaa', 0, '2020-04-27 23:30:41'),
(10, 'derjavo2', 'cccccccccccccc', 'dddddddddd', 'eeeeeeee', 0, '2020-04-27 23:30:49'),
(11, 'derjavo2', 'ddddddddddddd', 'eeeeeeeeeee', 'fffffffffffff', 0, '2020-04-27 23:30:55'),
(12, 'derjavo2', 'eeeeeeeeee', 'fffffffffffff', 'gggggggggg', 0, '2020-04-27 23:54:04'),
(13, 'derjavo2', 'asdasdasd', 'zxczxczxc', 'asdasdasd', 0, '2020-04-28 00:25:23'),
(14, 'admin', 'halo', 'sub-halo', '12345', 0, '2020-04-29 19:40:06'),
(15, 'admin', 'halohalo', 'subhalo', '12343245345', 0, '2020-04-29 19:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `active`) VALUES
(3, 'derjavo2', 'dnaspeedmania@gmail.com', '$2y$10$YVBvdTNCVDVkVnRvSzMzYu6u8uuc5zkuPnokSZ.oocz1dAv/j5rgy', 1, 1),
(4, 'derjavo', 'test@test.com', '$2y$10$ODAyRnpzTHJHVThIVlpESObsuLC5m1u5I3kyTdgEPCG5QMpxymv/e', 0, 1),
(5, 'admin', 'admin@admin.com', '$2y$10$eTR1L1ltTERMSnA5Z3NUU.XjsY3EpfgxmHf/egukijjJk.0DN4rz2', 1, 1),
(8, 'member', 'member@member.com', '$2y$10$dzJGVjIvUzcrZlRQM053aejqW2S9b48ZIY8Oo8oMrkQlc2EZU12pi', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `changelogs`
--
ALTER TABLE `changelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `changelogs`
--
ALTER TABLE `changelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
