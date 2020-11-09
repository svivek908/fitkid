-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2020 at 08:19 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsergzs_fitkid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` enum('superadmin','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar-2.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `type`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$ge8DEh6jOEXRuFlkPxG8ceiHyVwO38DDDeFflVw6Y1vdO5J6QvK9y', 'wSCAssyKKzVxizWw1KOp6tWuZPOnQhVnRp2VQLWNIJ5PNZh6xquFYOzxeNbv', 'admin', NULL, '2020-03-17 07:04:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `student_id` int(55) NOT NULL DEFAULT '0',
  `batch_id` int(55) NOT NULL DEFAULT '0',
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `days` int(55) NOT NULL DEFAULT '0',
  `reason` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `student_id`, `batch_id`, `date_from`, `date_to`, `days`, `reason`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2020-03-14', '2020-03-16', 2, 'csd', '2020-03-21 13:18:59', '2020-03-21 13:18:59'),
(5, 1, 1, '2020-03-21', '2020-03-21', 1, 'dvdfvfdbf', '2020-03-21 13:31:28', '2020-03-21 13:31:28'),
(6, 1, 1, '2020-03-04', '2020-03-06', 2, 'efrdg', '2020-03-21 14:04:52', '2020-03-21 14:04:52'),
(7, 1, 1, '2020-03-10', '2020-03-11', 1, 'zxdvfdgdf', '2020-03-21 14:14:41', '2020-03-21 14:14:41'),
(8, 2, 1, '2020-03-18', '2020-03-21', -16, 'dfds', '2020-03-21 14:15:56', '2020-03-21 20:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'We transfer weakness to strength', '340de3f33c1682d8f9db24a5edacd4ae.JPG', '2020-03-06 01:02:11', '2020-08-29 04:56:51'),
(2, 'We increase self-confidence and self-esteem.', '3517c8da90a9e3125e3df18cf556e105.jpg', '2020-03-06 01:03:07', '2020-08-29 04:58:56'),
(3, 'We create social environment', 'd4b4dfd242b6b6dadb6034cf1d8039a4.JPG', '2020-03-06 01:03:33', '2020-08-29 04:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `course_id` int(25) NOT NULL DEFAULT '0',
  `open_time` varchar(25) NOT NULL,
  `close_time` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `expiry_day` int(25) NOT NULL DEFAULT '0',
  `class_size` int(255) NOT NULL DEFAULT '0',
  `days` varchar(255) DEFAULT NULL,
  `status` enum('expire','not_expire') NOT NULL DEFAULT 'not_expire',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `course_id`, `open_time`, `close_time`, `start_date`, `end_date`, `expiry_day`, `class_size`, `days`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, '15:21', '17:21', '2020-06-01', '2020-06-30', 29, 20, 'Monday,Tuesday,Wednesday', 'not_expire', '2020-05-02 02:44:33', '2020-09-08 19:48:51'),
(5, 8, '16:30', '17:30', '2020-08-29', '2020-09-30', 32, 25, NULL, 'not_expire', '2020-08-29 05:27:39', '2020-08-29 05:27:39'),
(6, 1, '13:48', '13:49', '2020-09-15', '2020-10-15', 30, 25, 'Saturday,Sunday', 'not_expire', '2020-09-08 08:19:38', '2020-09-08 09:49:26'),
(7, 1, '13:00', '15:00', '2020-09-11', '2020-10-11', 30, 30, 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', 'not_expire', '2020-09-08 09:38:44', '2020-09-08 09:38:44'),
(8, 11, '08:00', '09:00', '2020-09-09', '2020-10-08', 29, 25, 'Monday,Tuesday', 'not_expire', '2020-09-08 11:27:25', '2020-09-08 11:27:25'),
(9, 12, '08:00', '10:00', '2020-09-14', '2020-10-16', 32, 25, 'Monday,Wednesday,Friday', 'not_expire', '2020-09-08 18:06:42', '2020-09-08 18:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `student_id` int(25) DEFAULT '0',
  `course_id` int(25) NOT NULL DEFAULT '0',
  `batch_id` int(25) NOT NULL DEFAULT '0',
  `start_from` date NOT NULL,
  `expiry_days` int(25) NOT NULL DEFAULT '0',
  `status` enum('not_expire','expire') NOT NULL DEFAULT 'not_expire',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_type`
--

CREATE TABLE `class_type` (
  `id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_type`
--

INSERT INTO `class_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Weekly classes', '2020-04-24 07:40:16', '2020-04-24 07:40:16'),
(2, 'Alternate', '2020-04-24 07:47:09', '2020-04-24 07:47:09'),
(3, 'Regular Class', '2020-09-08 10:46:07', '2020-09-08 10:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(55) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(55) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Vikas Rathor', 'vikas.laabhaa@gmail.com', '01234567890', 'Zero Hour -Promotion Codesdfsdf', 'ddvfxgvdf', '2020-03-12 04:37:41', '2020-03-21 13:36:18'),
(2, 'Vikas Rathor', 'vikas.laabhaa@gmail.com', '01234567890', 'Zero Hour -USERNAME', 'esfsgfd', '2020-03-12 04:38:17', '2020-03-21 13:36:18'),
(3, 'Vikas Rathor', 'vikas.laabhaa@gmail.com', '01234567890', 'Domain Reneval Issues www.itservicepark.com', 'fdscsv', '2020-03-12 04:38:49', '2020-03-21 13:36:18'),
(4, 'deepika', 'admin@gmail.com', '9109285994', 'demo', 'hi', '2020-03-17 00:35:56', '2020-03-21 13:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `document` text,
  `fees` int(55) NOT NULL DEFAULT '0',
  `gender` enum('boy','girl','unisex') NOT NULL DEFAULT 'boy',
  `class_type` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `age_from` int(15) NOT NULL DEFAULT '0',
  `age_to` int(15) NOT NULL DEFAULT '0',
  `class_size` int(15) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `image`, `document`, `fees`, `gender`, `class_type`, `description`, `age_from`, `age_to`, `class_size`, `created_at`, `updated_at`) VALUES
(1, 'Imagination Classes', '7d870982d38558e05e203c577c6e889c.jpg', NULL, 20, 'boy', 'Alternate', 'test\r\n                                ', 2, 5, 20, '2020-03-06 03:15:08', '2020-04-24 07:47:38'),
(4, 'Gaming Classes', 'f19574f91c778f54a63cccf1e4fb4566.jpg', 'd943570e645371cb4aeeaec5a456de1d.pdf', 30, 'boy', 'Weekly classes', 'test\r\n                                \r\n                                \r\n                                \r\n                                \r\n                                ', 2, 6, 20, '2020-03-11 01:43:48', '2020-04-24 07:46:34'),
(5, 'Learning Classes', 'f06f33d6c23d6c875721e5fe6ab13fcd.jpg', '75855f1137c92c7b522f5aae07c6c8b4.pdf', 25, 'girl', '', 'test\r\n                                ', 2, 20, 30, '2020-03-11 01:44:16', '2020-03-11 01:48:08'),
(8, 'TAEK', '71daaa37db07ba8a5bde57acc69a4b5a.jpg', '71daaa37db07ba8a5bde57acc69a4b5a.jpg', 55, 'unisex', 'Alternate', 'This class focus on boosting / increasing level of self confidence by providing the basic of taekwondo\r\nsyllabus.it also focuses on improving student fitness ability as well as their flexibility', 5, 8, 25, '2020-08-29 05:23:20', '2020-08-29 05:23:20'),
(9, 'WON', '6b1c5b4baea8e0bc6816073da3e0d3fb.jpg', '6b1c5b4baea8e0bc6816073da3e0d3fb.jpg', 55, 'unisex', 'Alternate', 'This class focus on beginners to advance Taekwondo syllabus. As it is focus on improving self confidence\r\nand self esteem. This class also concentrate on the basic to the highest level of Taekwondo kiks , self-\r\ndefense ,and higher fitness and flexibility', 12, 15, 25, '2020-08-29 05:37:04', '2020-08-29 05:37:04'),
(10, 'DO group', '7eda628baddedf64030574059a728e2a.jpg', '7eda628baddedf64030574059a728e2a.jpg', 55, 'unisex', 'Alternate', 'Sun / Tue from 5:50 – 6:30 pm\r\nMon / Wed from 5-6 pm &amp; 6-7 pm\r\nThur / Sat from 5-6 pm &amp; 6-7 pm &amp; 7-8 pm', 9, 12, 25, '2020-08-29 05:41:43', '2020-08-29 05:41:43'),
(11, 'Taekando', '38cbee1ccb659db377f400d45449aff3.png', '61fcbcff931255652c474ee8c6bd379c.png', 25, 'boy', 'Weekly classes', 'This is taekando', 8, 14, 25, '2020-09-07 13:43:07', '2020-09-07 13:43:07'),
(12, 'Jumba', '8d930da3688636f94264836540e68b98.jpg', '8d930da3688636f94264836540e68b98.jpg', 25, 'unisex', 'Alternate', 'This is Jumba classes for all.', 10, 18, 25, '2020-09-08 18:01:32', '2020-09-08 18:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(255) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `amount`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'Traniee', '100', '2020-04-28 17:42:30', '2020-04-28 17:42:30', 1),
(2, 'Traniee', '100', '2020-05-05 17:42:30', '2020-04-28 17:42:30', 1),
(3, 'Traniee', '100', '2020-05-05 17:42:30', '2020-04-28 17:42:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `created_at`, `updated_at`) VALUES
(20, '2f5161d8991452fd7e0edbbe2083cafa.JPG', '2020-05-04 04:00:31', '2020-05-04 04:00:31'),
(21, '173c9351bbd2277e81b284db4151c980.JPG', '2020-05-04 04:01:02', '2020-05-04 04:01:02'),
(19, '6fedf7ae373d2152e48dcdc1ffd10836.JPG', '2020-05-04 03:58:34', '2020-05-04 03:58:34'),
(18, '80c451cc2944743a8f1dfeee2d86f3e6.JPG', '2020-05-04 03:57:57', '2020-05-04 03:57:57'),
(17, '47bdfccb3e24248bb0ff8cd6cb4aee90.jpg', '2020-05-04 03:52:18', '2020-05-04 03:52:18'),
(13, '57d682e5b51c8a9d09c84127850219f0.JPG', '2020-05-03 03:12:10', '2020-05-03 03:12:10'),
(15, 'b28ffc2617196489173d7c0f7a2ac324.jpg', '2020-05-04 03:51:17', '2020-05-04 03:51:17'),
(24, '130739c6fe2fd8b5fe4ad88791d145d0.JPG', '2020-05-04 04:04:20', '2020-05-04 04:04:20'),
(25, 'a6e86de845531df6b70e5cd06d1e905a.JPG', '2020-05-04 04:04:38', '2020-05-04 04:04:38'),
(31, '88c7eecc722d967313a99986444e8bd9.JPG', '2020-06-12 06:17:36', '2020-06-12 06:17:36'),
(30, '51210616a64500fd4a5b5e060c2a62fc.JPG', '2020-06-12 06:08:28', '2020-06-12 06:08:28'),
(29, '4ca955126db0d433bb0a667f39ebbb39.JPG', '2020-06-12 06:08:00', '2020-06-12 06:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL DEFAULT '0',
  `course_id` int(55) NOT NULL DEFAULT '0',
  `batch_id` int(11) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `login_id` int(55) NOT NULL DEFAULT '0',
  `payment_token` varchar(255) DEFAULT NULL,
  `paid_on` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `course_id`, `batch_id`, `price`, `login_id`, `payment_token`, `paid_on`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(6, '100202024897336669', 8, NULL, '55', 1, '64159920526454935744575', '2020-09-04+10:44:34', 'Failed', '2020-09-04 07:41:04', '2020-09-04 08:57:51', 1),
(7, '100202024894781488', 8, NULL, '55', 1, '64159921035257373445426', '2020-09-04+12:07:29', 'Failed', '2020-09-04 09:05:52', '2020-09-04 09:07:45', 1),
(8, '0', 1, NULL, '20', 1, NULL, NULL, 'Pending', '2020-09-04 11:29:40', '2020-09-04 11:29:40', 1),
(9, '0', 1, NULL, '20', 1, NULL, NULL, 'Pending', '2020-09-04 11:30:05', '2020-09-04 11:30:05', 1),
(10, '0', 1, NULL, '20', 1, NULL, NULL, 'Pending', '2020-09-04 11:31:37', '2020-09-04 11:31:37', 1),
(11, '0', 1, NULL, '20', 1, NULL, NULL, 'Pending', '2020-09-04 11:33:42', '2020-09-04 11:33:42', 1),
(12, '0', 1, NULL, '20', 1, NULL, NULL, 'Pending', '2020-09-04 11:40:44', '2020-09-04 11:40:44', 1),
(13, '100202025230811407', 1, 7, '20', 1, '64159956155763647675463', '2020-09-08+13:40:12', 'Failed', '2020-09-08 10:39:17', '2020-09-08 10:40:25', 1),
(14, '0', 8, 5, '55', 11, NULL, NULL, 'Pending', '2020-09-09 08:01:31', '2020-09-09 08:01:31', 1),
(15, '0', 1, 7, '20', 12, NULL, NULL, 'Pending', '2020-09-09 14:14:36', '2020-09-09 14:14:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `course_id` int(55) NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `education` varchar(255) NOT NULL,
  `status` enum('pending','approved','blocked','disabled') NOT NULL DEFAULT 'pending',
  `privacy_policy` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `course_id`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `education`, `status`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, 4, 'User11', 'user@gmail.com', '$2y$10$DUddYI5JixdsnAjPpEvcJeWZLhW3eOgmPOLAseiavs1vBdKtdxARu', '01234567890', 'Indore', 'Male', 'scd', 'approved', '0', '2020-03-06 04:59:15', '2020-09-09 14:04:26'),
(2, 4, 'User22', 'user1@gmail.com', '$2y$10$DUddYI5JixdsnAjPpEvcJeWZLhW3eOgmPOLAseiavs1vBdKtdxARu', '01234567890', 'Indore', 'Male', 'scd', 'approved', '0', '2020-03-06 04:59:15', '2020-03-21 19:46:18'),
(3, 0, 'Nawaf', 'redblood_393@hotmail.com', '$2y$10$g.Vp/pEa9s9Eekc4Qivt1ea2aozvHcoPZUUdrDs0u9S3y2KL/hJ8S', '88888888', 'ghgnhmb', 'Male', 'vghbg', 'approved', '0', '2020-04-20 23:43:13', '2020-04-20 23:55:07'),
(4, 0, 'deepika', 'deepikadubey8827@gmail.com', '$2y$10$YNPsi1XOYPdE.tD/Xnnk0OMBLMJw9s8fN7JFYeCmU4NNbtyPvrt.y', '23', 'go', 'Female', 'ba', 'approved', '0', '2020-04-27 09:49:34', '2020-06-11 06:15:53'),
(8, 0, 'Adventure', 'admin@gmail.com', '$2y$10$f3E6NCfSvJRR5R3XsJWSfujNqgAfeDf5iQW4P8LFb1j8v8PFEXacW', '989338786', 'indai', 'Male', 'ba', 'blocked', '1', '2020-05-01 09:09:23', '2020-06-11 06:18:00'),
(9, 0, 'yousef', 'amalawadhi1985@gmail.com', '$2y$10$PqqJytPst4qvPnah8beByOLjl7Uo1mOC8IwASoCAHQTn2I1PpZBnS', '56437929', 'yarmouk block 1', 'Male', '1 grade', 'approved', '1', '2020-06-11 05:48:28', '2020-06-11 06:18:03'),
(10, 0, 'Pankaj', 'Pankaj.laabhaa@Gmail.Com', '$2y$10$E5QbcDJlkv.WB3ciT/GHuu/iZLoUS.5Gurxbwb4.zeBMs16GeAU1C', '7896452310', 'Indore', 'Male', '12', 'pending', '1', '2020-08-27 16:25:28', '2020-08-27 16:25:28'),
(11, 0, 'Ali M A', 'ali@gmail.com', '$2y$10$aQiGEQyADFbevXPaFzdd1e21O3jt0AlS7ZiwbTik3imRNBMTZLTue', '97853339', 'Hghyjyjky', 'Male', '2', 'pending', '1', '2020-09-09 08:00:43', '2020-09-09 08:00:43'),
(12, 0, 'Afrah Al Awadi', 'afrah@gmail.com', '$2y$10$K3cVSagv.L83d5ouHBkbx.B.4Nblj/eOWHu7AAGwFEdlGfy5iIoEy', '99999999', 'Tjyjytghukj', 'Male', '6', 'pending', '1', '2020-09-09 14:12:19', '2020-09-09 14:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `description`, `name`, `designation`, `created_at`, `updated_at`) VALUES
(5, '                                                                                                                                                                        \r\n\r\nالحمدالله وايد مستمتعين ويروحون التدريب ومتشوقين ينطرون شنو الجديد الي بيتعلمونه ومتحمسين للقتال الي بيصير مع أصدقائهم وجو المرح الي يصبر وقت التدريب \r\nاستفادوا تعلموا يواجهون خصمهم ويحاولون يتفاضون معاه قبل مايستخدمون العنف واذا استخدموه يكون بأضيق الحدود لانه صار عندهم ثقة بنفسهم وبقوتهم على مواجهة الخصم هالشي خلى الرهبة تروح منهم الحمدالله\r\n                                                    \r\n                                                    \r\n                                                    ', 'ام فهد  العبد الهادي', 'ولي امر فهد - حمد العبدالهادي', '2020-06-12 06:01:01', '2020-06-12 06:24:35'),
(6, 'شخصية حسين اصبحت قوية و يعتمد على نفسه و اصبح يدافع عن نفسه دون خوف و الحمد الله \r\nو التدريب ممتاز الكوش حريصه على تدريبهم بافضل صوره و بناء شخصيتهم و حثهم على الالتزام بالوقت و التزام النظام و المعهد نظيف و منظم', 'يونس حاجي الحسين', 'ولي امر حسين الحسين', '2020-06-12 07:36:10', '2020-06-12 07:36:10'),
(7, 'تقدم ممتاز لشخصيته لبنيته ايضا تعلم احترام الوقت ومخالطه الأطفال من غير تردد فكل الشكر للكابتن أفراح العوضي وبالنسبه للمكان السابق رائع والحالي أروع وقواكم الله', 'الدكتور خالد العوضي', 'ولي امر شاهين خالد العوضي', '2020-06-12 07:41:47', '2020-06-12 07:41:47'),
(8, 'حبيت اشكرچ على التدريبات وعلى اهتماچ باطفالنا  ولدي جدا مستانس وفخور بوجوده معاكم \r\nيعطيچ الف عافيه', 'ام منصور نزر', 'ولي امر المشترك منصور', '2020-06-12 08:29:22', '2020-06-12 08:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `link`, `created_at`, `updated_at`) VALUES
(7, 'https://youtu.be/gw8vGwumIW4', '2020-06-12 06:57:58', '2020-06-12 06:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_type`
--
ALTER TABLE `class_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_type`
--
ALTER TABLE `class_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
