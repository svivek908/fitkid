-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 17, 2020 at 09:38 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitkid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` enum('superadmin','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'avatar-2.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `type`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$ge8DEh6jOEXRuFlkPxG8ceiHyVwO38DDDeFflVw6Y1vdO5J6QvK9y', 'ufTLq9YMiuDD6dMRkLYfvlXF8Y7pe9j9rcBkIvLEogrZSoxEjotHsm6lGXg2', 'admin', NULL, '2020-03-06 00:40:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'We Create Your Safety', '26f2dfe98eb569bb6aadaae66c6c7ed7.jpg', '2020-03-06 01:02:11', '2020-03-06 01:02:11'),
(2, 'Best Institute For Karate', '2d190e2d908aa6be95b25a1f5a1cbaaf.jpg', '2020-03-06 01:03:07', '2020-03-06 01:22:27'),
(3, 'We Make Your Kids Fit', 'b208a5edff5483cc41890c371160bbd2.jpg', '2020-03-06 01:03:33', '2020-03-06 01:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(25) NOT NULL DEFAULT '0',
  `open_time` varchar(25) NOT NULL,
  `close_time` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `expiry_day` int(25) NOT NULL DEFAULT '0',
  `class_size` int(255) NOT NULL DEFAULT '0',
  `status` enum('expire','not_expire') NOT NULL DEFAULT 'not_expire',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `course_id`, `open_time`, `close_time`, `start_date`, `end_date`, `expiry_day`, `class_size`, `status`, `created_at`) VALUES
(1, 4, '01:00', '02:00', '2020-05-01', '2020-06-01', 31, 20, 'not_expire', '2020-03-17 03:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(25) DEFAULT '0',
  `course_id` int(25) NOT NULL DEFAULT '0',
  `batch_id` int(25) NOT NULL DEFAULT '0',
  `start_from` date NOT NULL,
  `expiry_days` int(25) NOT NULL DEFAULT '0',
  `status` enum('not_expire','expire') NOT NULL DEFAULT 'not_expire',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `student_id`, `course_id`, `batch_id`, `start_from`, `expiry_days`, `status`, `created_at`) VALUES
(1, 1, 1, 2, '2020-03-11', 30, 'not_expire', '2020-03-11 01:08:03'),
(2, 1, 1, 1, '2020-03-11', 30, 'not_expire', '2020-03-11 01:18:50'),
(3, 1, 1, 2, '2020-03-17', 30, 'not_expire', '2020-03-17 01:42:28'),
(4, 1, 1, 2, '2020-03-17', 30, 'not_expire', '2020-03-17 01:42:49'),
(5, 1, 1, 2, '2020-03-17', 30, 'not_expire', '2020-03-17 01:42:49'),
(6, 1, 1, 2, '2020-03-17', 30, 'not_expire', '2020-03-17 01:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(55) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`) VALUES
(1, 'Vikas Rathor', 'vikas.laabhaa@gmail.com', '01234567890', 'Zero Hour -Promotion Codesdfsdf', 'ddvfxgvdf', '2020-03-12 04:37:41'),
(2, 'Vikas Rathor', 'vikas.laabhaa@gmail.com', '01234567890', 'Zero Hour -USERNAME', 'esfsgfd', '2020-03-12 04:38:17'),
(3, 'Vikas Rathor', 'vikas.laabhaa@gmail.com', '01234567890', 'Domain Reneval Issues www.itservicepark.com', 'fdscsv', '2020-03-12 04:38:49'),
(4, 'deepika', 'admin@gmail.com', '9109285994', 'demo', 'hi', '2020-03-17 00:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `fees` int(55) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `age_from` int(15) NOT NULL DEFAULT '0',
  `age_to` int(15) NOT NULL DEFAULT '0',
  `class_size` int(15) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `image`, `fees`, `description`, `age_from`, `age_to`, `class_size`, `created_at`, `updated_at`) VALUES
(1, 'Imagination Classes', '7d870982d38558e05e203c577c6e889c.jpg', 20, 'test', 2, 5, 20, '2020-03-06 03:15:08', '2020-03-06 03:15:32'),
(4, 'Gaming Classes', 'f19574f91c778f54a63cccf1e4fb4566.jpg', 30, 'test\r\n                                \r\n                                ', 2, 6, 20, '2020-03-11 01:43:48', '2020-03-17 01:26:58'),
(5, 'Learning Classes', 'f06f33d6c23d6c875721e5fe6ab13fcd.jpg', 25, 'test\r\n                                ', 2, 20, 30, '2020-03-11 01:44:16', '2020-03-11 01:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `created_at`, `updated_at`) VALUES
(3, 'd4efe06656fd5431ffa51ffc1f5aab2f.jpg', '2020-03-06 01:25:00', '2020-03-06 01:25:00'),
(4, '13917f0b7cd75efaac7289ce3598a03b.jpg', '2020-03-06 01:25:06', '2020-03-06 01:25:06'),
(5, '2ff50c4230436340a1c5fafc172cb536.jpg', '2020-03-06 01:25:11', '2020-03-06 01:25:11'),
(6, '3d34f93c93af62830d193e4f496ac3c8.jpg', '2020-03-06 01:25:15', '2020-03-06 01:25:15'),
(7, '0fc3229e7a699f2dc0d24b34435d2246.jpg', '2020-03-06 01:25:20', '2020-03-06 01:25:20'),
(8, 'e882ab9d50d42448284954cbaabea3b9.jpg', '2020-03-06 01:25:25', '2020-03-06 01:25:25'),
(9, 'fd712578e2f1e2e1e108a0dbf4c3acf1.jpg', '2020-03-06 01:25:30', '2020-03-06 01:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(55) NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `education` varchar(255) NOT NULL,
  `status` enum('pending','approved','blocked','disabled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `course_id`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `education`, `status`, `created_at`) VALUES
(1, 1, 'User11', 'user@gmail.com', '$2y$10$DUddYI5JixdsnAjPpEvcJeWZLhW3eOgmPOLAseiavs1vBdKtdxARu', '01234567890', 'Indore', 'Male', 'scd', 'approved', '2020-03-06 04:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `description`, `name`, `designation`, `created_at`, `updated_at`) VALUES
(3, 'Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam', 'Johnathen', 'Businessman', '2020-03-16 01:02:34', '2020-03-16 01:02:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
