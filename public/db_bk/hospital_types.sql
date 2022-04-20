-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 10:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eres`
--

--
-- Dumping data for table `hospital_types`
--

INSERT INTO `hospital_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HSC', '2022-04-19 14:41:58', '2022-04-19 14:41:58'),
(2, 'PHC', '2022-04-19 14:41:59', '2022-04-19 14:41:59'),
(3, 'UPHC', '2022-04-19 14:41:59', '2022-04-19 14:41:59'),
(4, 'GH', '2022-04-19 14:41:59', '2022-04-19 14:41:59'),
(5, 'T- Hospital', '2022-04-19 14:42:00', '2022-04-19 14:42:00'),
(6, 'Pvt Hospital', '2022-04-19 14:42:00', '2022-04-19 14:42:00'),
(7, 'Other District', '2022-04-19 14:42:00', '2022-04-19 14:42:00'),
(8, 'Other State', '2022-04-19 14:42:00', '2022-04-19 14:42:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
