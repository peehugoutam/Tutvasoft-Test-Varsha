-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2021 at 06:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `recurrence_type` varchar(255) NOT NULL,
  `repeat_1` int(11) NOT NULL,
  `repeat_2` int(11) NOT NULL,
  `repeat_on_1` int(11) NOT NULL,
  `repeat_on_2` int(11) NOT NULL,
  `repeat_on_3` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `recurrence_type`, `repeat_1`, `repeat_2`, `repeat_on_1`, `repeat_on_2`, `repeat_on_3`, `created_at`, `updated_at`) VALUES
(3, 'hhh', '2021-10-11', '2021-10-11', '', 0, 0, 0, 0, 0, '2021-10-11 20:44:07', '2021-10-11 20:44:07'),
(4, 'dfdfdfdfdf', '2021-10-11', '2021-10-11', '1', 1, 1, 0, 0, 0, '2021-10-11 20:56:46', '2021-10-11 21:04:50'),
(5, 'ssfsfsf', '2021-10-11', '2021-10-15', '1', 1, 1, 0, 0, 0, '2021-10-11 22:18:51', '2021-10-11 22:18:51'),
(6, 'fdf', '2021-10-19', '2021-10-19', '1', 1, 1, 0, 0, 0, '2021-10-11 22:19:17', '2021-10-11 22:19:17'),
(7, 'fdf', '2021-10-19', '2021-10-19', '1', 1, 1, 0, 0, 0, '2021-10-11 22:20:14', '2021-10-11 22:20:14'),
(8, 'fdf', '2021-10-19', '2021-10-19', '1', 1, 1, 0, 0, 0, '2021-10-11 22:20:49', '2021-10-11 22:20:49'),
(9, 'sdsdsd', '2021-10-12', '2021-10-16', '1', 1, 1, 0, 0, 0, '2021-10-11 22:21:37', '2021-10-11 22:21:37'),
(10, 'sdsdsd', '2021-10-12', '2021-10-16', '1', 1, 1, 0, 0, 0, '2021-10-11 22:22:42', '2021-10-11 22:22:42'),
(11, 'fdfdf', '2021-10-11', '2021-10-16', '1', 1, 1, 0, 0, 0, '2021-10-11 22:23:12', '2021-10-11 22:23:12'),
(12, 're', '2021-10-12', '2021-10-22', '1', 1, 1, 0, 0, 0, '2021-10-11 22:24:12', '2021-10-11 22:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `event_calendar`
--

CREATE TABLE `event_calendar` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_calendar`
--

INSERT INTO `event_calendar` (`id`, `event_id`, `event_date`) VALUES
(1, 12, '2021-10-12'),
(2, 12, '2021-10-13'),
(3, 12, '2021-10-14'),
(4, 12, '2021-10-15'),
(5, 12, '2021-10-16'),
(6, 12, '2021-10-17'),
(7, 12, '2021-10-18'),
(8, 12, '2021-10-19'),
(9, 12, '2021-10-20'),
(10, 12, '2021-10-21'),
(11, 12, '2021-10-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_calendar`
--
ALTER TABLE `event_calendar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event_calendar`
--
ALTER TABLE `event_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
