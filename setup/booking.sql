-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Apr 04, 2023 at 11:40 PM
-- Server version: 8.0.26
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raheem Armstrong', 'admin@email.com', '$2y$10$qZ7XblAtHZQrAzqTR4xqtOyeD2NvYxqHny4gVrVHpO9K1Wy888MjS', 1, 'Fd2T7ynY6z', '2023-04-04 09:59:31', '2023-04-04 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `number`, `plate_number`, `capacity`, `created_at`, `updated_at`) VALUES
(1, '9037080', '1388 ngy', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(2, '1357162', '3291 gcg', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(3, '4146367', '3557 yjj', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(4, '5684786', '7067 yuv', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(5, '7970700', '3300 vzv', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(6, '2917707', '3822 iax', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(7, '9126863', '4040 uro', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(8, '6774514', '7446 cgy', 12, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(9, '3609008', '4820 fpu', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(10, '4591243', '0313 lkg', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(11, '7448234', '2008 fum', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(12, '9989461', '5776 zin', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(13, '4441423', '9397 mgz', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(14, '7735908', '8988 vyo', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(15, '2746299', '7040 wyx', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(16, '5906450', '2326 hme', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(17, '1099295', '8435 sum', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(18, '4641671', '2910 cwe', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(19, '5348210', '1028 yti', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(20, '5956480', '8855 zyn', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(21, '6474844', '6882 zka', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(22, '9204711', '3724 vgg', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(23, '4614422', '5532 hwd', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(24, '3955759', '6786 dov', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(25, '9622433', '3939 bos', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(26, '6767771', '4025 rfa', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(27, '6526555', '9770 lyq', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(28, '3352012', '7333 ntc', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(29, '7148362', '0574 tqq', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(30, '9999207', '5333 zsw', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(31, '5872796', '7954 tly', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(32, '4707945', '2681 hcq', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(33, '9663080', '2430 tta', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(34, '1601149', '4090 vgz', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(35, '1375170', '3641 kos', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(36, '2188166', '9327 spw', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(37, '3064162', '3286 irj', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(38, '5189490', '5420 rpg', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(39, '9553826', '4593 pzs', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(40, '7153643', '9947 ldu', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(41, '8239129', '4409 uhf', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(42, '9743118', '6279 rpf', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(43, '4611662', '2340 fgv', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(44, '3591648', '5344 wsy', 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(45, '9327523', '93827 khw', 12, '2023-04-04 16:24:03', '2023-04-04 16:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governrates`
--

CREATE TABLE `governrates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governrates`
--

INSERT INTO `governrates` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Alexandria', 'alexandria', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(2, 'Assiut', 'assiut', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(3, 'Aswan', 'aswan', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(4, 'Beheira', 'beheira', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(5, 'Bani Suef', 'bani_suef', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(6, 'Cairo', 'cairo', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(7, 'Daqahliya', 'daqahliya', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(8, 'Damietta', 'damietta', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(9, 'Fayyoum', 'fayyoum', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(10, 'Gharbiya', 'gharbiya', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(11, 'Giza', 'giza', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(12, 'Helwan', 'helwan', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(13, 'Ismailia', 'ismailia', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(14, 'Kafr El Sheikh', 'kafr_el_sheikh', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(15, 'Luxor', 'luxor', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(16, 'Marsa Matrouh', 'marsa_matrouh', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(17, 'Minya', 'minya', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(18, 'Monofiya', 'monofiya', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(19, 'New Valley', 'new_valley', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(20, 'North Sinai', 'north_sinai', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(21, 'Port Said', 'port_said', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(22, 'Qalioubiya', 'qalioubiya', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(23, 'Qena', 'qena', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(24, 'Red Sea', 'red_sea', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(25, 'Sharqiya', 'sharqiya', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(26, 'Sohag', 'sohag', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(27, 'South Sinai', 'south_sinai', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(28, 'Suez', 'suez', '2023-04-04 09:59:38', '2023-04-04 09:59:38'),
(29, 'Tanta', 'tanta', '2023-04-04 09:59:38', '2023-04-04 09:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_03_055708_create_admins_table', 1),
(6, '2023_04_03_095806_create_governrates_table', 1),
(7, '2023_04_03_100840_create_buses_table', 1),
(8, '2023_04_03_100914_create_trips_table', 1),
(9, '2023_04_03_105744_create_seats_table', 1),
(10, '2023_04_03_113123_create_stations_table', 1),
(11, '2023_04_03_114148_create_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin', 1, 'API TOKEN', 'a8f982ccaa0518059a92191225bef12db41111886dd731e1509a3e829e5ab953', '[\"*\"]', '2023-04-04 21:34:34', NULL, '2023-04-04 10:00:02', '2023-04-04 21:34:34'),
(2, 'App\\Models\\User', 11, 'API TOKEN', '1ef02201a1ce55c6e5d7cf4b24079adec20e8e8998b7b17e5a74b400da955754', '[\"*\"]', '2023-04-04 13:45:50', NULL, '2023-04-04 13:25:17', '2023-04-04 13:45:50'),
(3, 'App\\Models\\Admin', 1, 'API TOKEN', '408e0232d6db1b1c4ee869c2620f3f7d1f35a90785609d4ddd2c3b3c82458624', '[\"*\"]', '2023-04-04 23:12:47', NULL, '2023-04-04 21:37:39', '2023-04-04 23:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_id` bigint UNSIGNED NOT NULL,
  `from_station_id` bigint UNSIGNED DEFAULT NULL,
  `to_station_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `seat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `amount`, `status`, `notes`, `trip_id`, `from_station_id`, `to_station_id`, `user_id`, `seat_id`, `created_at`, `updated_at`) VALUES
(1, 508.00, 3, 'Consequatur velit esse sint laborum nesciunt.', 4, 3, 2, 1, 1, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(2, 602.00, 3, 'Veniam dolorum a aut excepturi voluptatem exercitationem.', 4, 12, 11, 2, 3, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(3, 864.00, 0, 'Veniam quo ea sunt velit voluptate odio voluptatum.', 4, 15, 14, 3, 4, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(4, 705.00, 0, 'Ratione quia ipsum quod.', 4, 18, 17, 4, 5, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(5, 661.00, 2, 'Quaerat molestiae dolorem reiciendis sint nemo quod.', 4, 21, 20, 5, 6, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(6, 705.00, 3, 'Qui assumenda expedita cupiditate porro nobis.', 4, 24, 23, 6, 7, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(7, 346.00, 4, 'Magnam ipsa nostrum soluta et ut eius.', 4, 27, 26, 7, 8, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(8, 722.00, 2, 'Veritatis officiis officia quo quia voluptas unde.', 4, 30, 29, 8, 9, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(9, 31.00, 2, 'Aspernatur nobis iusto aut unde repellat sed.', 4, 33, 32, 9, 10, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(10, 781.00, 0, 'Et iusto explicabo ipsum maxime.', 4, 36, 35, 10, 11, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(12, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 11, '2023-04-04 22:14:15', '2023-04-04 22:14:15'),
(13, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 11, '2023-04-04 22:15:05', '2023-04-04 22:15:05'),
(14, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 11, '2023-04-04 22:15:06', '2023-04-04 22:15:06'),
(15, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 11, '2023-04-04 22:15:24', '2023-04-04 22:15:24'),
(16, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 11, '2023-04-04 22:15:26', '2023-04-04 22:15:26'),
(17, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 1, '2023-04-04 22:17:04', '2023-04-04 22:17:04'),
(18, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 1, '2023-04-04 22:22:06', '2023-04-04 22:22:06'),
(19, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 1, '2023-04-04 22:22:10', '2023-04-04 22:22:10'),
(20, 100.00, 0, 'some notes ...', 1, 1, 2, 11, 1, '2023-04-04 22:22:11', '2023-04-04 22:22:11'),
(21, 100.00, 0, 'some notes edited ...', 1, 1, 2, 11, 1, '2023-04-04 22:22:13', '2023-04-04 22:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` tinyint NOT NULL,
  `bus_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `number`, `order`, `bus_id`, `created_at`, `updated_at`) VALUES
(1, 'a3', 10, 1, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(2, 'a4', 12, 1, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(3, 'b3', 5, 1, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(4, 'a3', 10, 16, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(5, 'b6', 10, 20, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(6, 'a3', 8, 24, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(7, 'a5', 5, 28, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(8, 'b1', 10, 32, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(9, 'a5', 3, 36, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(10, 'a1', 4, 40, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(11, 'a5', 7, 44, '2023-04-04 09:59:46', '2023-04-04 09:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` bigint UNSIGNED NOT NULL,
  `estimated_time` int NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `governrate_id` bigint UNSIGNED NOT NULL,
  `trip_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `estimated_time`, `parent_id`, `governrate_id`, `trip_id`, `created_at`, `updated_at`) VALUES
(1, 44, NULL, 9, 1, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(2, 44, 1, 9, 1, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(3, 55, NULL, 14, 3, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(4, 64, NULL, 21, 5, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(5, 0, NULL, 28, 6, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(6, 91, NULL, 6, 7, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(7, 64, 4, 21, 4, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(8, 0, 5, 28, 4, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(9, 91, 6, 6, 4, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(10, 3, NULL, 4, 8, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(11, 3, 10, 4, 9, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(12, 98, NULL, 14, 10, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(13, 71, NULL, 24, 11, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(14, 71, 13, 24, 12, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(15, 92, NULL, 17, 13, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(16, 87, NULL, 22, 14, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(17, 87, 16, 22, 15, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(18, 31, NULL, 28, 16, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(19, 9, NULL, 27, 17, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(20, 9, 19, 27, 18, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(21, 65, NULL, 18, 19, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(22, 46, NULL, 11, 20, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(23, 46, 22, 11, 21, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(24, 22, NULL, 6, 22, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(25, 29, NULL, 12, 23, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(26, 29, 25, 12, 24, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(27, 36, NULL, 13, 25, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(28, 86, NULL, 6, 26, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(29, 86, 28, 6, 27, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(30, 66, NULL, 21, 28, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(31, 54, NULL, 16, 29, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(32, 54, 31, 16, 30, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(33, 27, NULL, 8, 31, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(34, 76, NULL, 13, 32, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(35, 76, 34, 13, 33, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(36, 74, NULL, 6, 34, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(41, 180, NULL, 1, 37, '2023-04-04 21:38:42', '2023-04-04 21:38:42'),
(42, 240, 41, 4, 37, '2023-04-04 21:38:42', '2023-04-04 21:38:42'),
(43, 180, 42, 2, 37, '2023-04-04 21:38:42', '2023-04-04 21:38:42'),
(44, 360, 43, 3, 37, '2023-04-04 21:38:42', '2023-04-04 21:38:42'),
(53, 180, NULL, 1, 36, '2023-04-04 23:08:12', '2023-04-04 23:08:12'),
(54, 240, 53, 4, 36, '2023-04-04 23:08:12', '2023-04-04 23:08:12'),
(55, 180, 54, 2, 36, '2023-04-04 23:08:12', '2023-04-04 23:08:12'),
(56, 380, 55, 3, 36, '2023-04-04 23:08:12', '2023-04-04 23:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `departure_at` timestamp NOT NULL,
  `estimated_arrival_at` timestamp NULL DEFAULT NULL,
  `bus_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `number`, `status`, `departure_at`, `estimated_arrival_at`, `bus_id`, `created_at`, `updated_at`) VALUES
(1, 'Ea quod pariatur maiores nostrum nemo.', '46847704', 2, '1972-04-04 16:02:11', '1972-04-04 21:02:11', 1, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(2, 'Fugit architecto voluptatem sint et nihil ut architecto.', '11310393', 3, '2010-12-08 14:45:44', '2010-12-08 17:45:44', 2, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(3, 'Voluptas repudiandae blanditiis voluptatum impedit iure nihil voluptatem esse.', '95086565', 0, '1974-04-16 09:06:21', '1974-04-16 15:06:21', 3, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(4, 'Accusamus tenetur fugit hic veritatis commodi.', '16335013', 0, '1976-05-30 18:59:47', '1976-05-30 19:59:47', 5, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(5, 'Ipsum consequatur accusantium est nisi aliquid fugit vero.', '66467285', 3, '2019-04-13 02:58:14', '2019-04-13 06:58:14', 6, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(6, 'Asperiores odio sed reiciendis temporibus quae recusandae ut.', '16622656', 2, '1988-01-06 17:52:27', '1988-01-07 01:52:27', 7, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(7, 'Quae qui quo temporibus quia fugiat deleniti.', '27085002', 3, '1971-01-17 22:16:48', '1971-01-18 07:16:48', 8, '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(8, 'Quia corrupti sint ut voluptas aliquam nostrum illo ex.', '20484138', 2, '1975-08-26 05:22:35', '1975-08-26 06:22:35', 9, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(9, 'Odio incidunt ducimus in nisi.', '95983524', 2, '1980-05-15 13:54:26', '1980-05-15 16:54:26', 10, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(10, 'Ab enim ipsum nam voluptatem.', '46776335', 1, '1970-10-01 09:19:17', '1970-10-01 11:19:17', 11, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(11, 'Nisi excepturi quos tempore eos.', '98719406', 0, '1990-08-25 23:55:20', '1990-08-26 06:55:20', 13, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(12, 'Vero velit alias expedita cumque dolor autem.', '46200831', 1, '2021-06-03 10:50:20', '2021-06-03 14:50:20', 14, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(13, 'Fugit velit similique porro omnis qui sint.', '64037243', 1, '1992-12-16 09:48:40', '1992-12-16 10:48:40', 15, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(14, 'Voluptate vero quaerat temporibus voluptatem ut mollitia dolorem.', '95896463', 2, '1983-09-03 00:41:17', '1983-09-03 09:41:17', 17, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(15, 'Ut atque incidunt voluptatem nulla.', '65647621', 3, '1982-12-16 19:36:32', '1982-12-16 21:36:32', 18, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(16, 'Cumque excepturi quaerat labore autem nam.', '70212595', 1, '2002-11-15 11:40:53', '2002-11-15 14:40:53', 19, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(17, 'Eum ut aut hic qui porro autem.', '76470715', 1, '2001-10-20 23:10:26', '2001-10-21 03:10:26', 21, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(18, 'Voluptatem iure et officia inventore non qui porro.', '16307494', 1, '2016-10-29 07:17:18', '2016-10-29 08:17:18', 22, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(19, 'Fuga cum sint et dolor.', '40206028', 2, '1987-09-28 14:32:22', '1987-09-28 18:32:22', 23, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(20, 'Laudantium nisi provident enim consequatur.', '93024277', 2, '2015-05-10 11:32:11', '2015-05-10 18:32:11', 25, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(21, 'Impedit et illo asperiores.', '34909559', 0, '2010-08-19 13:52:50', '2010-08-19 15:52:50', 26, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(22, 'Voluptatem illum non omnis eveniet.', '74862959', 2, '2001-05-27 15:02:47', '2001-05-27 19:02:47', 27, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(23, 'Fugiat enim corrupti magni.', '55734546', 4, '2019-06-28 18:46:51', '2019-06-28 21:46:51', 29, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(24, 'A illum quibusdam quas laudantium.', '78234765', 3, '2004-08-10 15:25:49', '2004-08-10 18:25:49', 30, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(25, 'Dolorum rerum rem earum atque quis.', '32770309', 2, '1998-09-03 02:02:43', '1998-09-03 05:02:43', 31, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(26, 'Quos sunt fugit nobis et excepturi est officia.', '29081862', 4, '1980-02-02 12:48:21', '1980-02-02 13:48:21', 33, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(27, 'Expedita quam vero voluptate.', '76102695', 4, '1978-11-04 15:37:02', '1978-11-04 16:37:02', 34, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(28, 'Vitae quia sunt voluptates a eos et aut.', '53255589', 0, '2011-11-22 21:48:34', '2011-11-23 04:48:34', 35, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(29, 'Voluptates qui inventore quibusdam dolor et non cumque.', '33014008', 0, '1997-07-12 00:50:05', '1997-07-12 03:50:05', 37, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(30, 'Aut quod eos asperiores distinctio et commodi.', '88890317', 4, '1981-08-27 23:34:28', '1981-08-28 00:34:28', 38, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(31, 'Eos et laudantium minima ea eos.', '19666240', 0, '2017-05-03 08:33:22', '2017-05-03 12:33:22', 39, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(32, 'Culpa et tempora nostrum rerum dolores.', '41716099', 4, '1979-08-17 09:01:59', '1979-08-17 15:01:59', 41, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(33, 'Inventore corrupti ducimus ratione nihil.', '15815229', 0, '1986-04-14 15:18:53', '1986-04-14 16:18:53', 42, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(34, 'Expedita quos ab est fugit totam quam nesciunt.', '75443151', 1, '2002-03-20 14:58:18', '2002-03-20 19:58:18', 43, '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(36, 'new trip title', '9327523', 0, '2023-12-12 12:12:00', '2023-12-13 04:32:00', 1, '2023-04-04 21:34:34', '2023-04-04 21:39:36'),
(37, 'new trip title', '93278523', 0, '2023-12-12 12:12:00', '2023-12-13 04:12:00', 1, '2023-04-04 21:38:42', '2023-04-04 21:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fabiola Crist', 'dibbert.rubye@example.org', '2023-04-04 09:59:45', '$2y$10$MFMs8sd/BNQz3bMyCMMuvOBr1WV79Ve2xSsmkT7qDSfLTZdg3M4Y2', 'GhB54NqCke', '2023-04-04 09:59:45', '2023-04-04 09:59:45'),
(2, 'Mariano O\'Keefe', 'cpacocha@example.org', '2023-04-04 09:59:45', '$2y$10$uy/KZb05QXvzGEdkZ9AqSOBRIS5M15kUEujMkBftSC34MZOUeu5c6', '0MaMtnBQvz', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(3, 'Dr. Irwin Collins', 'sam03@example.net', '2023-04-04 09:59:45', '$2y$10$WuEIMYQ5ayabWp5rUBTV0O7AIA07u2hwlNGakVAKi9SSMrHq./4Y.', 'nXHB8HATN3', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(4, 'Guy Toy DVM', 'ibernier@example.org', '2023-04-04 09:59:45', '$2y$10$.NexVNMcSAws2pNKGi8cEOStQEVqBjN4NO85F5imdtZooh3XNR5gi', 'MeDkP80xRE', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(5, 'Mac Durgan MD', 'otho92@example.com', '2023-04-04 09:59:45', '$2y$10$3e07TXmD4AuQp6G9F9THDO38qKeKu9t8D./h3GZwMV2k6lqRgq.sK', 'IgOU9VWDxG', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(6, 'Jacquelyn Willms', 'white.antonette@example.net', '2023-04-04 09:59:45', '$2y$10$9xFwqrhWEsw0z1h1R32AUeEQ2yMc0zdC9LLjrL8g5Lb7l17L9vyge', 'gYRuM57MgU', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(7, 'Dr. Jesse Kreiger', 'yost.cheyanne@example.com', '2023-04-04 09:59:45', '$2y$10$vW0n6Y5VRLV1nvY5wC3ECuhvrMi.lDsF5yaaM.tAgpMZa8i5N4qBC', 'sWBvLKj316', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(8, 'Prof. Nellie Little IV', 'ramon.crooks@example.org', '2023-04-04 09:59:45', '$2y$10$1bIJPRZ8XdyQ1JwnJ.T6F.R9T4My6pCCx/NeNR0dDz/Si1Ia3IdTO', 'o6LrtRmoqp', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(9, 'Ms. Catalina Harvey Sr.', 'xjakubowski@example.org', '2023-04-04 09:59:45', '$2y$10$oU473n/bYC2ojXVo2GSj2eBMWFftd9SRU/2clQLxRXwH8HJZl24LK', 'MRNoIFCLim', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(10, 'Tristin Trantow', 'skiles.keanu@example.org', '2023-04-04 09:59:45', '$2y$10$jqSS.60/8ALe0CGoxnrpWeYlUHyVZ/yHyLEkUSFRG.idhM09xPmFu', 'Wy2G4HoQ4L', '2023-04-04 09:59:46', '2023-04-04 09:59:46'),
(11, 'Ahmed', 'me@email.com', NULL, '$2y$10$Y/g0IyCECRHyt3k4WRQc3O4wWJFMcbnz3hRAjAXDqs04NkmrcjI0i', NULL, '2023-04-04 13:25:17', '2023-04-04 13:25:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buses_number_unique` (`number`),
  ADD UNIQUE KEY `buses_plate_number_unique` (`plate_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `governrates`
--
ALTER TABLE `governrates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `governrates_name_unique` (`name`),
  ADD UNIQUE KEY `governrates_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_trip_id_foreign` (`trip_id`),
  ADD KEY `reservations_from_station_id_foreign` (`from_station_id`),
  ADD KEY `reservations_to_station_id_foreign` (`to_station_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_seat_id_foreign` (`seat_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stations_parent_id_foreign` (`parent_id`),
  ADD KEY `stations_governrate_id_foreign` (`governrate_id`),
  ADD KEY `stations_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governrates`
--
ALTER TABLE `governrates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_from_station_id_foreign` FOREIGN KEY (`from_station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_to_station_id_foreign` FOREIGN KEY (`to_station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_governrate_id_foreign` FOREIGN KEY (`governrate_id`) REFERENCES `governrates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stations_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
