-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2021 at 10:52 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajahs`
--

DROP TABLE IF EXISTS `ajahs`;
CREATE TABLE IF NOT EXISTS `ajahs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpublished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ajahs`
--

INSERT INTO `ajahs` (`id`, `admin`, `caption`, `details`, `movie`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '<p>TREASURE</p>', 'This article introduces the basic elements of the new Microsoft Office Fluent user interface in Microsoft Office Word 2007. It also provides lists of commands that you may already be familiar with in Microsoft Office Word 2003, showing you how to accomplish the same results in Office Word 2007This article introduces the basic elements of the new Microsoft Office Fluent user interface in Microsoft Office Word 2007. It', 'Cinema/ajahCinema/1622284901_VID-20210423-WA0008.mp4', '2021-05-15', '16:41:00', 'published', '2021-05-29 17:41:41', '2021-05-29 17:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `ikejas`
--

DROP TABLE IF EXISTS `ikejas`;
CREATE TABLE IF NOT EXISTS `ikejas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpublished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ikejas`
--

INSERT INTO `ikejas` (`id`, `admin`, `caption`, `details`, `movie`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '<p>PASTOR SAYING FACT</p>', 'This article introduces the basic elements of the new Microsoft Office Fluent user interface in Microsoft Office Word 2007. It also provides lists of commands that you may already be familiar with in Microsoft Office Word 2003, showing you how to accomplish the same results in Office Word 2007This article introduces the basic elements of the new Microsoft Office Fluent user interface in Microsoft Office Word 2007. It', 'Cinema/ikejaCinema/1622285090_VID-20210219-WA0005.mp4', '2021-05-15', '17:46:00', 'published', '2021-05-29 17:44:50', '2021-05-29 17:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `lekkis`
--

DROP TABLE IF EXISTS `lekkis`;
CREATE TABLE IF NOT EXISTS `lekkis` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpublished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lekkis`
--

INSERT INTO `lekkis` (`id`, `admin`, `caption`, `details`, `movie`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '<p>FUNNY GUY</p>', 'This article introduces the basic elements of the new Microsoft Office Fluent user interface in Microsoft Office Word 2007. It also provides lists of commands that you may already be familiar with in Microsoft Office Word 2003, showing you how to accomplish the same results in Office Word 2007This article introduces the basic elements of the new Microsoft Office Fluent user interface in Microsoft Office Word 2007. It', 'Cinema/lekkiCinema/1622285147_VID-20200906-WA0004.mp4', '2021-05-06', '03:48:00', 'published', '2021-05-29 17:45:47', '2021-05-29 17:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_25_132708_create_cinemas_table', 1),
(2, '2021_05_25_133631_create_movies_table', 2),
(3, '2021_05_25_132833_create_users_table', 3),
(4, '2021_05_26_163250_create_lekkis_table', 4),
(5, '2021_05_26_163423_create_ajahs_table', 4),
(6, '2021_05_26_163501_create_ikejas_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$gi2/KOjKMOTEwLPgaOEZbe.M8VeRv6kMG5bVQNc0NCeGpTk0t3H1K', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
