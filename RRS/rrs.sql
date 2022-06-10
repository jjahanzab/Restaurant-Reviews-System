-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 07:13 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `restaurant_id` int(100) DEFAULT NULL,
  `rating` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `restaurant_id`, `rating`, `created_at`) VALUES
(1, 5, 1, 1, '2020-08-08 19:00:00'),
(2, 2, 2, 2, '2020-08-09 05:02:53'),
(3, 1, 3, 3, '2020-08-09 05:05:10'),
(5, 3, 5, 4, '2020-08-09 05:06:50'),
(6, 4, 4, 5, '2020-08-09 02:14:25'),
(14, 1, 6, 3, '2020-08-10 01:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `email`, `phone`, `address`, `city`, `created_at`) VALUES
(1, 'CAFE 007', 'cafe007@@gmail.com', '0300 6238007', 'Stadium Road, Burewala, Vehari, Punjab', 'Burewala', '2020-08-08 21:12:20'),
(2, 'Aroma Restaurant', 'aromacafe@gmail.com', '(067) 3770283', '9, C Block, Burewala, Vehari, Punjab', 'Burewala', '2020-08-08 23:20:28'),
(3, 'Merina', 'merina@gmail.com', '0334 7632001', 'stadium road Burewala, Vehari, Punjab', 'Burewala', '2020-08-09 06:06:11'),
(4, 'Flame & Coal', 'flamecoal@gmail.com', '(067)3772701', 'Lahore road Burewala, Vehari, Punjab', 'Burewala', '2020-08-09 11:24:37'),
(5, 'Fri-Chicks', 'frichicks@gmail.com', '(067)3773034', 'Stadium Rd, Burewala, Vehari, Punjab', 'Burewala', '2020-08-09 15:12:40'),
(6, 'Karachi Foods', 'karachifoods@gmail.com', '0345 0997060', 'Vehari Bazar, G Block Burewala, Vehari, Punjab', 'Burewala', '2020-08-09 09:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`) VALUES
(1, 'admin', '2020-08-07 19:00:00'),
(2, 'user', '2020-08-07 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', 1, '2020-08-07 19:00:00'),
(2, 'user', 'user@gmail.com', '123456', 2, '2020-08-07 19:00:00'),
(3, 'john', 'john@gmail.com', '123456', 2, '2020-08-07 19:00:00'),
(4, 'doe', 'doe@gmail.com', '123456', 2, '2020-08-09 08:11:15'),
(5, 'arshad', 'arshad@gmail.com', '123456', 2, '2020-08-09 19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
