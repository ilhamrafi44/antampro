-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2024 at 06:16 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antampro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `balance` double(20,2) NOT NULL DEFAULT '0.00',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `balance`, `name`, `photo`, `email`, `email_verified_at`, `password`, `type`, `phone`, `salary_date`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1228014.38, 'Admin', '/public/admin/assets/images/profile/1718027679PrH.png', 'admin@gmail.com', '2022-08-30 07:44:48', '$2y$10$WeGoCTO6js/39rxnXG9LAOD20udyOgUHTCjouW./UgU16ECN.9Yme', 'admin', '01300205214', '2024-01-17', 'Dhaka, Bangladesh', '$2y$10$qh3wo7Jh29n9vWqvpW973eOtvsteuRR1wLA0aF9RkYOQ5uwn2ID72', '2021-12-26 07:37:05', '2024-06-10 20:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_ledgers`
--

CREATE TABLE `admin_ledgers` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perticulation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `debit` double NOT NULL DEFAULT '0',
  `credit` double NOT NULL DEFAULT '0',
  `status` enum('pending','approved','rejected','default') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_ledgers`
--

INSERT INTO `admin_ledgers` (`id`, `admin_id`, `reason`, `perticulation`, `amount`, `debit`, `credit`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 'payment_charge', 'Withdraw approval charge', 2861000, 214575, 0, 'approved', '30-05-2024 13:18', '2024-05-30 13:18:17', '2024-05-30 13:18:17'),
(2, 1, 'payment_charge', 'Withdraw approval charge', 4215000, 316125, 0, 'approved', '30-05-2024 16:07', '2024-05-30 16:07:37', '2024-05-30 16:07:37'),
(3, 1, 'payment_charge', 'Withdraw approval charge', 54200, 4065, 0, 'approved', '31-05-2024 12:49', '2024-05-31 12:49:06', '2024-05-31 12:49:06'),
(4, 1, 'payment_charge', 'Withdraw approval charge', 65000, 4875, 0, 'approved', '31-05-2024 12:49', '2024-05-31 12:49:15', '2024-05-31 12:49:15'),
(5, 1, 'payment_charge', 'Withdraw approval charge', 54000, 4050, 0, 'approved', '31-05-2024 12:50', '2024-05-31 12:50:16', '2024-05-31 12:50:16'),
(6, 1, 'payment_charge', 'Withdraw approval charge', 50000, 3750, 0, 'approved', '31-05-2024 12:50', '2024-05-31 12:50:24', '2024-05-31 12:50:24'),
(7, 1, 'payment_charge', 'Withdraw approval charge', 61000, 4575, 0, 'approved', '31-05-2024 12:50', '2024-05-31 12:50:29', '2024-05-31 12:50:29'),
(8, 1, 'payment_charge', 'Withdraw approval charge', 378000, 28350, 0, 'approved', '31-05-2024 12:59', '2024-05-31 12:59:07', '2024-05-31 12:59:07'),
(9, 1, 'payment_charge', 'Withdraw approval charge', 55400, 4155, 0, 'approved', '31-05-2024 12:59', '2024-05-31 12:59:13', '2024-05-31 12:59:13'),
(10, 1, 'payment_charge', 'Withdraw approval charge', 77000, 5775, 0, 'approved', '31-05-2024 12:59', '2024-05-31 12:59:18', '2024-05-31 12:59:18'),
(11, 1, 'payment_charge', 'Withdraw approval charge', 53000, 3975, 0, 'approved', '31-05-2024 13:06', '2024-05-31 13:06:39', '2024-05-31 13:06:39'),
(12, 1, 'payment_charge', 'Withdraw approval charge', 65000, 4875, 0, 'approved', '31-05-2024 17:57', '2024-05-31 17:57:18', '2024-05-31 17:57:18'),
(13, 1, 'payment_charge', 'Withdraw approval charge', 72000, 5400, 0, 'approved', '31-05-2024 17:57', '2024-05-31 17:57:23', '2024-05-31 17:57:23'),
(14, 1, 'payment_charge', 'Withdraw approval charge', 57000, 4275, 0, 'approved', '31-05-2024 18:06', '2024-05-31 18:06:11', '2024-05-31 18:06:11'),
(15, 1, 'payment_charge', 'Withdraw approval charge', 606000, 45450, 0, 'approved', '31-05-2024 18:06', '2024-05-31 18:06:16', '2024-05-31 18:06:16'),
(16, 1, 'payment_charge', 'Withdraw approval charge', 60000, 4500, 0, 'approved', '31-05-2024 18:06', '2024-05-31 18:06:20', '2024-05-31 18:06:20'),
(17, 1, 'payment_charge', 'Withdraw approval charge', 90000, 6750, 0, 'approved', '31-05-2024 18:06', '2024-05-31 18:06:24', '2024-05-31 18:06:24'),
(18, 1, 'payment_charge', 'Withdraw approval charge', 77000, 5775, 0, 'approved', '02-06-2024 18:50', '2024-06-02 18:50:09', '2024-06-02 18:50:09'),
(19, 1, 'payment_charge', 'Withdraw approval charge', 4160000, 312000, 0, 'approved', '02-06-2024 19:32', '2024-06-02 19:32:16', '2024-06-02 19:32:16'),
(20, 1, 'payment_charge', 'Withdraw approval charge', 2407000, 180525, 0, 'approved', '04-06-2024 10:03', '2024-06-04 10:03:29', '2024-06-04 10:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `bankCode` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `code`, `bankCode`, `logo`, `is_active`) VALUES
(1, 'DANA', 'DANA', '10002', 'dana.png', 1),
(2, 'OVO', 'OVO', '10001', 'ovo.png', 1),
(3, 'GOPAY', 'GOPAY', '10003', 'gopay1.png', 1),
(46, 'Mandiri Syariah', 'MANDIRI_SYR', '451', 'mandiri_syariah.png', 1),
(49, 'Bank Mega', 'MEGA', '426', 'mega.png', 1),
(52, 'BTPN', 'TABUNGAN_PENSIUNAN_NASIONAL', '213', 'btpn.png', 1),
(55, 'BTN', 'BTN', '200', 'btn.png', 1),
(94, 'BJB', 'BJB', '110', 'bjb.png', 1),
(129, 'CIMB Niaga', 'CIMB', '022', 'cimb.png', 1),
(133, 'Bank BCA', 'BCA', '014', 'bca.png', 1),
(134, 'Permata Bank', 'PERMATA', '13', 'permata.png', 1),
(135, 'Bank Danamon', 'DANAMON', '011', 'danamon.png', 1),
(136, 'Bank BNI', 'BNI', '009', 'bni.png', 1),
(137, 'Bank Mandiri', 'MANDIRI', '008', 'mandiri.png', 1),
(139, 'Bank BRI', 'BRI', '002', 'bri.png', 1),
(140, 'Shopeepay', 'SHOPEEPAY', '10008', 'shopeepay.png', 1),
(141, 'Linkaja', 'LINKAJA', '10009', 'linkaja.png', 1),
(142, 'Bank Panin', 'PANIN', '019', 'panin.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `id` bigint UNSIGNED NOT NULL,
  `bonus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int DEFAULT '0' COMMENT 'user get service count',
  `set_service_counter` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_ledgers`
--

CREATE TABLE `bonus_ledgers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bonus_id` bigint UNSIGNED NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT '0.00',
  `bonus_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT '0.00',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `method_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'User Deposit Amount',
  `final_amount` double(20,2) NOT NULL DEFAULT '0.00',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','rejected','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_16_074227_create_admins_table', 1),
(6, '2023_03_17_123007_create_packages_table', 2),
(8, '2023_03_27_103153_create_payment_methods_table', 3),
(10, '2023_03_28_074201_create_deposits_table', 4),
(11, '2023_03_28_142734_create_user_ledgers_table', 5),
(12, '2023_03_28_142802_create_admin_ledgers_table', 6),
(13, '2023_03_30_071745_create_vip_sliders_table', 7),
(14, '2023_03_30_150139_create_settings_table', 8),
(15, '2023_04_01_185541_create_bonuses_table', 9),
(16, '2023_04_01_205009_create_bonus_ledgers_table', 10),
(17, '2023_04_05_203304_create_purchases_table', 11),
(18, '2023_04_09_200835_create_minings_table', 12),
(19, '2023_06_17_105403_create_usdts_table', 13),
(20, '2023_12_23_120509_create_recharges_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'count days',
  `commission_with_avg_amount` double NOT NULL DEFAULT '0' COMMENT 'user get average amount after validity',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_default` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `title`, `photo`, `price`, `validity`, `commission_with_avg_amount`, `status`, `is_default`, `desc`, `created_at`, `updated_at`) VALUES
(28, 'AntamPro SPECIAL', NULL, '/public/upload/package/1716834605Q3e.png', 200000, '3', 300000, 'active', '0', NULL, '2024-05-28 01:30:05', '2024-05-28 01:30:05'),
(29, 'AntamPro SPECIAL', NULL, '/public/upload/package/1716834605Q3e.png', 500000, '3', 750000, 'active', '0', NULL, '2024-05-28 01:30:05', '2024-05-28 01:30:05'),
(30, 'AntamPro SPECIAL', NULL, '/public/upload/package/1716834605Q3e.png', 1000000, '3', 1500000, 'active', '0', NULL, '2024-05-28 01:30:05', '2024-05-28 01:30:05'),
(31, 'AntamPro SPECIAL', NULL, '/public/upload/package/1716834605Q3e.png', 5000000, '3', 7500000, 'active', '0', NULL, '2024-05-28 01:30:05', '2024-05-28 01:30:05'),
(32, 'AntamPro SPECIAL', NULL, '/public/upload/package/1716834605Q3e.png', 10000000, '3', 15000000, 'active', '0', NULL, '2024-05-28 01:30:05', '2024-05-28 01:30:05'),
(33, 'AntamPro 0,1GR', NULL, '/public/upload/package/1716834149tOP.png', 60000, '7', 84000, 'active', '0', NULL, '2024-05-28 01:22:30', '2024-05-28 01:22:30'),
(34, 'AntamPro 0,25GR', NULL, '/public/upload/package/1716834208YkD.png', 140000, '10', 210000, 'active', '0', NULL, '2024-05-28 01:23:28', '2024-05-28 01:23:28'),
(35, 'AntamPro 0,3GR', NULL, '/public/upload/package/1716834248rQK.png', 380000, '15', 570000, 'active', '0', NULL, '2024-05-28 01:24:08', '2024-05-28 01:24:08'),
(36, 'AntamPro 0,5GR', NULL, '/public/upload/package/1716834328HxS.png', 700000, '30', 1207500, 'active', '0', NULL, '2024-05-28 01:25:28', '2024-05-28 01:25:28'),
(37, 'AntamPro 1GR', NULL, '/public/upload/package/1716834402PYG.png', 1325000, '30', 2285625, 'active', '0', NULL, '2024-05-28 01:26:42', '2024-05-28 01:26:42'),
(38, 'AntamPro 2GR', NULL, '/public/upload/package/1716834476hxT.png', 2600000, '30', 4485000, 'active', '0', NULL, '2024-05-28 01:27:56', '2024-05-28 01:27:56'),
(39, 'AntamPro 3GR', NULL, '/public/upload/package/1716834519NR7.png', 3800000, '30', 6840000, 'active', '0', NULL, '2024-05-28 01:28:39', '2024-05-28 01:28:39'),
(40, 'AntamPro 5GR', NULL, '/public/upload/package/17168345713xO.png', 6300000, '30', 11340000, 'active', '0', NULL, '2024-05-28 01:29:31', '2024-05-28 01:29:31'),
(41, 'AntamPro 10GR', NULL, '/public/upload/package/1716834605Q3e.png', 12750000, '30', 26775000, 'active', '0', NULL, '2024-05-28 01:30:05', '2024-05-28 01:30:05'),
(42, 'AntamPro 25GR', NULL, '/public/upload/package/1716834647OCw.png', 31000000, '30', 65100000, 'active', '0', NULL, '2024-05-28 01:30:47', '2024-05-28 01:30:47'),
(43, 'AntamPro 50GR', NULL, '/public/upload/package/1716834680Ftr.png', 64000000, '30', 144000000, 'active', '0', NULL, '2024-05-28 01:31:20', '2024-05-28 01:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `phone`, `otp`, `created_at`) VALUES
(938, '888888', '555919', '2024-06-09 03:32:43'),
(941, '82240358210', '692147', '2024-04-21 14:32:04'),
(948, '85348185717', '349950', '2024-04-30 22:01:55'),
(949, '8562629393', '320434', '2024-04-21 19:17:22'),
(950, '85207421597', '425700', '2024-04-21 20:41:02'),
(951, '85298652472', '849833', '2024-04-21 20:42:19'),
(952, '82322292712', '701731', '2024-04-21 20:45:38'),
(953, '8990339988', '167000', '2024-04-22 05:28:27'),
(954, '81361666338', '926338', '2024-04-22 06:14:52'),
(958, '85932216879', '199428', '2024-05-05 16:04:15'),
(961, '81287803151', '385191', '2024-04-22 20:55:51'),
(966, '85290692469', '279275', '2024-04-23 08:28:41'),
(968, '82240319759', '871171', '2024-04-23 11:49:30'),
(971, '811431717', '950862', '2024-04-23 21:19:00'),
(972, '85813412064', '979043', '2024-04-24 06:45:24'),
(974, '85230679409', '589137', '2024-04-24 18:52:46'),
(978, '82114283833', '925167', '2024-04-24 17:48:55'),
(983, '81272662473', '482839', '2024-04-26 10:00:28'),
(984, '85261507609', '348683', '2024-04-26 11:32:38'),
(985, '85255651859', '444385', '2024-04-26 12:22:50'),
(987, '82261562969', '918735', '2024-04-26 18:32:33'),
(990, '83850143942', '640651', '2024-04-27 04:31:49'),
(992, '81242554287', '610251', '2024-04-27 09:11:20'),
(996, '85742566442', '425379', '2024-04-27 20:02:33'),
(997, '82236320331', '726277', '2024-04-27 20:23:17'),
(1001, '85781777950', '811902', '2024-04-28 13:37:17'),
(1003, '8118404886', '694913', '2024-04-28 21:12:45'),
(1019, '81520428513', '226766', '2024-04-30 10:03:08'),
(1023, '82127138233', '294226', '2024-04-30 22:32:58'),
(1024, '83159014499', '581986', '2024-04-30 22:33:55'),
(1025, '81808031154', '636025', '2024-05-06 08:37:46'),
(1026, '85792046471', '346371', '2024-05-09 08:45:52'),
(1027, '895604823060', '832223', '2024-05-01 09:35:23'),
(1028, '88228659115', '142913', '2024-05-01 09:38:05'),
(1029, '88221613304', '302440', '2024-05-01 10:01:22'),
(1030, '85348607169', '289781', '2024-05-01 13:27:05'),
(1031, '85754201230', '533903', '2024-05-01 14:33:47'),
(1032, '82252685824', '570784', '2024-05-01 15:59:41'),
(1033, '82280250382', '566060', '2024-05-01 17:33:46'),
(1034, '817228900', '734698', '2024-05-01 20:32:58'),
(1035, '81367009793', '738359', '2024-05-02 02:00:42'),
(1040, '83809921810', '901504', '2024-05-02 19:08:36'),
(1041, '83829894694', '212843', '2024-05-04 07:26:26'),
(1045, '85651004188', '551286', '2024-05-04 09:25:07'),
(1046, '85388995511', '146951', '2024-05-04 11:29:29'),
(1051, '82176048278', '956249', '2024-05-04 22:42:43'),
(1053, '81325135253', '379055', '2024-05-05 09:14:40'),
(1055, '85887481454', '801336', '2024-05-05 12:15:58'),
(1056, '88740516233', '298602', '2024-05-05 12:52:19'),
(1059, '83115831385', '247611', '2024-05-05 19:50:49'),
(1060, '87794221877', '520505', '2024-05-05 22:08:38'),
(1065, '81222679321', '807433', '2024-05-07 06:31:14'),
(1066, '85839232500', '794481', '2024-05-07 07:32:35'),
(1070, '81243113273', '856196', '2024-05-08 14:33:17'),
(1071, '82229402019', '938949', '2024-05-08 18:03:01'),
(1073, '82336083336', '248486', '2024-05-08 19:19:54'),
(1074, '88976465977', '544511', '2024-05-09 23:07:02'),
(1075, '81256184954', '384494', '2024-05-10 04:04:01'),
(1080, '82140429900', '854427', '2024-05-10 14:49:38'),
(1088, '85697436878', '888165', '2024-05-11 18:15:07'),
(1089, '81245276604', '202460', '2024-05-11 19:09:44'),
(1090, '85296947555', '246787', '2024-05-11 22:07:32'),
(1091, '85810861723', '693640', '2024-05-12 21:54:06'),
(1093, '8123456', '618926', '2024-05-24 13:59:12'),
(1097, '082131388550', '562387', '2024-05-29 13:20:02'),
(1098, '082155852009', '472536', '2024-05-29 16:42:49'),
(1099, '087840930337', '400472', '2024-05-29 17:09:21'),
(1101, '081466760470', '904813', '2024-05-29 21:45:05'),
(1102, '085223213134', '928921', '2024-05-29 22:58:26'),
(1103, '0895392667070', '936984', '2024-05-30 05:58:29'),
(1104, '085892183194', '378162', '2024-05-30 00:59:59'),
(1105, '085691735699', '823126', '2024-05-30 03:03:03'),
(1107, '87841341058', '676269', '2024-06-01 04:18:53'),
(1108, '08999458833', '343840', '2024-05-30 07:16:02'),
(1109, '85793617536', '782640', '2024-05-30 07:46:02'),
(1110, '085861496349', '548676', '2024-05-30 10:47:00'),
(1111, '085820278781', '921694', '2024-05-30 08:39:28'),
(1112, '081210085206', '424560', '2024-05-30 19:19:24'),
(1113, '085359853997', '952349', '2024-05-30 09:36:05'),
(1115, '087724341353', '919287', '2024-05-30 10:38:45'),
(1116, '085797583288', '480780', '2024-05-30 10:55:50'),
(1127, '083112171008', '928894', '2024-05-30 14:40:12'),
(1131, '083153752451', '387389', '2024-05-30 18:13:47'),
(1158, '081933070270', '157936', '2024-05-31 18:23:58'),
(1167, '0895342095589', '654458', '2024-06-01 00:01:10'),
(1168, '085210146616', '477500', '2024-06-01 01:10:36'),
(1169, '87735502749', '547245', '2024-06-01 01:58:55'),
(1171, '81515921902', '896632', '2024-06-01 05:44:36'),
(1173, '082294394634', '493575', '2024-06-01 06:56:59'),
(1174, '082255994327', '655587', '2024-06-01 07:27:16'),
(1176, '083836828224', '458596', '2024-06-01 08:51:21'),
(1179, '082115163324', '786826', '2024-06-01 09:37:51'),
(1181, '081367009793', '937040', '2024-06-01 09:42:04'),
(1182, '085780910789', '589921', '2024-06-01 10:12:50'),
(1186, '089509430109', '210516', '2024-06-01 13:19:42'),
(1191, '081548032909', '880766', '2024-06-01 16:12:42'),
(1202, '082114388383', '191958', '2024-06-10 07:45:35'),
(1207, '088246300741', '408530', '2024-06-02 09:42:49'),
(1219, '085961557987', '254718', '2024-06-02 08:31:04'),
(1225, '82166398383', '368284', '2024-06-02 11:56:20'),
(1234, '82132361572', '309978', '2024-06-02 16:14:48'),
(1237, '087815354962', '216963', '2024-06-02 17:25:58'),
(1253, '81572350105', '793238', '2024-06-03 08:34:14'),
(1264, '085810228851', '611424', '2024-06-03 13:42:30'),
(1265, '081234567891', '588576', '2024-06-03 13:45:42'),
(1283, '0882022403319', '768033', '2024-06-03 22:02:22'),
(1284, '083841129141', '609840', '2024-06-03 22:43:48'),
(1299, '081312669901', '703738', '2024-06-04 09:33:02'),
(1300, '082353535405', '713833', '2024-06-04 09:54:56'),
(1302, '83871999815', '755728', '2024-06-04 12:14:02'),
(1305, '085694315770', '777618', '2024-06-04 14:26:19'),
(1312, '083116793412', '451791', '2024-06-04 18:29:16'),
(1313, '089687287155', '329268', '2024-06-04 18:42:24'),
(1315, '088221740913', '768904', '2024-06-08 08:35:10'),
(1320, '083834568828', '212956', '2024-06-04 23:17:05'),
(1325, '083802893688', '777760', '2024-06-05 01:13:15'),
(1328, '085640088315', '411756', '2024-06-05 05:40:01'),
(1329, '895370855563', '382536', '2024-06-05 06:07:52'),
(1333, '085883748501', '542197', '2024-06-05 14:48:43'),
(1336, '089647470123', '246269', '2024-06-05 10:02:54'),
(1338, '0858292561', '250587', '2024-06-05 10:35:51'),
(1341, '085977595637', '663283', '2024-06-05 11:19:04'),
(1343, '083101728391', '674460', '2024-06-05 11:54:44'),
(1345, '085765425321', '364363', '2024-06-10 20:57:07'),
(1352, '083894872242', '201898', '2024-06-05 16:22:18'),
(1355, '081298626392', '174970', '2024-06-05 18:12:24'),
(1360, '088291395838', '991819', '2024-06-05 22:11:46'),
(1367, '0895391643624', '139905', '2024-06-06 07:31:39'),
(1369, '089530181773', '700252', '2024-06-06 08:43:39'),
(1370, '085770058461', '638777', '2024-06-06 09:10:31'),
(1371, '081287500675', '461513', '2024-06-06 09:16:27'),
(1372, '62895385515250', '207514', '2024-06-06 10:39:43'),
(1375, '081377869213', '734059', '2024-06-06 11:15:34'),
(1380, '085382899088', '365370', '2024-06-06 14:52:05'),
(1381, '82268258491', '233137', '2024-06-06 15:15:46'),
(1382, '081327865395', '865429', '2024-06-06 15:53:31'),
(1385, '085882246487', '573642', '2024-06-06 17:46:55'),
(1398, '082174409194', '706755', '2024-06-07 00:06:22'),
(1400, '081266957951', '567284', '2024-06-07 12:37:35'),
(1401, '082268687660', '741957', '2024-06-07 07:45:14'),
(1405, '087850327167', '664757', '2024-06-07 09:34:03'),
(1419, '083818718811', '353513', '2024-06-07 15:31:28'),
(1425, '085234455077', '867785', '2024-06-07 18:25:49'),
(1428, '087819955041', '828838', '2024-06-07 19:59:15'),
(1431, '0831603231', '129996', '2024-06-07 21:19:27'),
(1439, '81349275170', '143386', '2024-06-08 06:18:10'),
(1440, '087861798012', '548908', '2024-06-08 06:25:06'),
(1447, '085524921944', '880505', '2024-06-08 10:38:51'),
(1461, '085694539055', '829860', '2024-06-09 12:53:05'),
(1473, '082349212942', '667608', '2024-06-08 23:18:11'),
(1474, '082112881612', '438304', '2024-06-08 23:31:07'),
(1475, '085220050394', '630167', '2024-06-09 08:44:20'),
(1476, '0895335671800', '606909', '2024-06-09 00:42:51'),
(1477, '085714752713', '157326', '2024-06-09 05:40:13'),
(1478, '087784076411', '743466', '2024-06-09 06:26:32'),
(1479, '085864136846', '932696', '2024-06-09 01:20:32'),
(1480, '081290206631', '716917', '2024-06-09 01:30:23'),
(1481, '089661683371', '377030', '2024-06-09 05:50:21'),
(1482, '085785117983', '287114', '2024-06-09 09:17:16'),
(1483, '085864420903', '998401', '2024-06-09 06:33:07'),
(1484, '085655909056', '374417', '2024-06-09 06:37:09'),
(1485, '085828173800', '453514', '2024-06-09 06:54:42'),
(1486, '085883507649', '520374', '2024-06-09 07:14:55'),
(1487, '082297417523', '598888', '2024-06-09 07:46:13'),
(1489, '088986225619', '935812', '2024-06-09 07:49:06'),
(1490, '81371452030', '319559', '2024-06-09 08:25:09'),
(1492, '085932216879', '146688', '2024-06-10 09:17:18'),
(1493, '085852781315', '413905', '2024-06-09 10:41:16'),
(1494, '083870189854', '139603', '2024-06-09 10:46:42'),
(1496, '0895339351551', '399265', '2024-06-09 11:22:07'),
(1497, '08567903225', '829568', '2024-06-09 12:18:22'),
(1498, '082245859733', '155359', '2024-06-09 11:35:19'),
(1499, '085603150397', '756301', '2024-06-09 11:49:53'),
(1500, '083812370028', '162351', '2024-06-09 11:49:32'),
(1501, '085712553056', '501269', '2024-06-09 11:53:58'),
(1502, '83112406541', '971087', '2024-06-09 12:36:33'),
(1503, '085330397571', '477021', '2024-06-09 12:15:45'),
(1504, '8567903225', '260930', '2024-06-09 12:26:09'),
(1505, '081361579102', '198745', '2024-06-09 12:25:19'),
(1506, '082322291896', '792586', '2024-06-09 12:32:45'),
(1507, '082242745303', '625481', '2024-06-09 13:28:06'),
(1508, '085692545933', '973544', '2024-06-09 13:53:16'),
(1509, '6281373474096', '673373', '2024-06-09 14:37:23'),
(1510, '085717726663', '636299', '2024-06-09 14:44:00'),
(1511, '082217219521', '483701', '2024-06-09 14:49:44'),
(1512, '089526863967', '880494', '2024-06-09 15:07:40'),
(1513, '082393300985', '120461', '2024-06-09 15:02:01'),
(1514, '085795071499', '208112', '2024-06-09 15:10:42'),
(1515, '087715635655', '598243', '2024-06-09 15:13:43'),
(1516, '082137623088', '531042', '2024-06-09 15:21:37'),
(1518, '085641114387', '822437', '2024-06-09 15:25:32'),
(1519, '081995572359', '444139', '2024-06-09 15:31:30'),
(1520, '081546805485', '950814', '2024-06-09 16:40:57'),
(1521, '082188882828', '619869', '2024-06-09 15:41:30'),
(1522, '082290321291', '235346', '2024-06-09 15:47:34'),
(1523, '081226958855', '352099', '2024-06-09 16:03:33'),
(1524, '881026705992', '318763', '2024-06-09 16:19:38'),
(1525, '08997186403', '894668', '2024-06-09 17:04:40'),
(1531, '89520202093', '554653', '2024-06-09 18:43:08'),
(1533, '85158422930', '857090', '2024-06-09 19:41:13'),
(1538, '085735921165', '264720', '2024-06-09 20:32:47'),
(1544, '085770919047', '127915', '2024-06-09 21:33:12'),
(1545, '085212596512', '851863', '2024-06-09 22:12:14'),
(1554, '085861021004', '112011', '2024-06-10 04:37:44'),
(1560, '085377399011', '291362', '2024-06-10 07:05:15'),
(1561, '8970750591', '571493', '2024-06-10 07:13:07'),
(1562, '082142978303', '439327', '2024-06-10 08:43:59'),
(1566, '085394468364', '297689', '2024-06-10 08:37:40'),
(1578, '085713713119', '560191', '2024-06-10 16:04:14'),
(1589, '085242320250', '293612', '2024-06-10 19:05:09'),
(1593, '085214141966', '870786', '2024-06-10 20:10:37'),
(1595, '081585620281', '656129', '2024-06-10 20:29:13'),
(1598, '082281614657', '298314', '2024-06-10 21:08:29'),
(1600, '085731495698', '913955', '2024-06-10 21:30:03'),
(1604, '089509308785', '778906', '2024-06-10 23:31:04'),
(1608, '601140621059', '669272', '2024-06-11 01:10:38'),
(1612, '083170845539', '998486', '2024-06-11 02:06:06'),
(1618, '0895328775615', '743871', '2024-06-11 05:06:11'),
(1623, '085372642972', '462658', '2024-06-11 08:54:58'),
(1625, '082286615410', '947757', '2024-06-11 09:35:08'),
(1632, '081997206631', '224518', '2024-06-11 10:21:58'),
(1633, '089528593776', '314416', '2024-06-11 10:27:23'),
(1634, '081936733262', '678421', '2024-06-11 10:41:08'),
(1636, '0895375658810', '634682', '2024-06-11 11:01:59'),
(1641, '0895620860700', '781037', '2024-06-11 12:09:05'),
(1648, '085758084025', '917271', '2024-06-11 13:32:39'),
(1649, '082154340018', '730827', '2024-06-11 14:05:06'),
(1653, '088297217264', '460855', '2024-06-11 15:14:09'),
(1665, '082334330807', '967918', '2024-06-11 21:14:25'),
(1666, '081387305002', '309190', '2024-06-11 21:29:59'),
(1673, '089514160257', '281659', '2024-06-11 22:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `photo`, `address`, `status`, `created_at`, `updated_at`) VALUES
(12, 'USDT', '/public/upload/setting/1714848008COy.png', 'Pc5GzYPM3.txAMnpi87.T5v3i5Q7eAiNWbC9ovdwq', 'active', '2023-09-15 10:48:03', '2024-05-04 17:40:08'),
(15, 'UHT', '/public/upload/setting/1714848015Mie.png', 'Pc5GzYPM3.txAMnpi87.T5v3i5Q7eAiNWbC9ovdwq', 'active', '2023-11-02 09:50:36', '2024-05-04 17:40:15');

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

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `daily_income` double(20,2) NOT NULL DEFAULT '0.00',
  `hourly` double(20,2) DEFAULT '0.00',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `final_status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recharges`
--

CREATE TABLE `recharges` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `minimum_deposit` double(20,2) DEFAULT NULL,
  `maximum_deposit` double(20,2) DEFAULT NULL,
  `minimum_withdraw` double(20,3) NOT NULL DEFAULT '0.000',
  `maximum_withdraw` double(20,3) NOT NULL DEFAULT '0.000',
  `withdraw_charge` double(20,3) NOT NULL DEFAULT '0.000',
  `minimum_recharge` double(20,3) NOT NULL DEFAULT '0.000',
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_channel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_ref` double(20,2) NOT NULL DEFAULT '0.00',
  `second_ref` double(20,2) NOT NULL DEFAULT '0.00',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_ref` double(20,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin` double(20,3) NOT NULL DEFAULT '0.000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notice` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicepay` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `minimum_deposit`, `maximum_deposit`, `minimum_withdraw`, `maximum_withdraw`, `withdraw_charge`, `minimum_recharge`, `telegram`, `telegram_group`, `telegram_channel`, `first_ref`, `second_ref`, `logo`, `third_ref`, `currency`, `checkin`, `created_at`, `updated_at`, `notice`, `nicepay`) VALUES
(1, 50000.00, 50000000.00, 50000.000, 1.000, 7.500, 50000.000, NULL, 'https://telegram.org/', NULL, 15.00, 5.00, '/public/upload/logo/1716403190XBV.png', 1.00, 'Rp', 1000.000, '2022-01-18 11:03:22', '2024-06-11 20:36:42', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium atque autem, blanditiis deleniti                 distinctio facere impedit inventore ipsam labore laborum magnam maiores mollitia odit perspiciatis quis                 quos rem rerum sapiente temporibus totam. Aliquid, earum explicabo impedit quos sit totam veritatis?                 Animi aperiam atque autem dignissimos doloribus dolorum, eligendi error facilis labore, maiores minima                 odio odit quae quia quidem reiciendis rem saepe sapiente similique soluta suscipit velit voluptatum.                 Distinctio, doloribus enim est expedita fugit ipsa itaque magnam minima nisi, nobis nostrum perferendis                 quas ratione rem similique sit voluptate. Aliquid animi ea eveniet ipsa laudantium officia repellendus                 sint sunt tempora, vero. Unde.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `invest` double NOT NULL DEFAULT '0',
  `bonus` double NOT NULL DEFAULT '0',
  `team_size` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `invest`, `bonus`, `team_size`, `created_at`, `updated_at`) VALUES
(1, 1000000, 100000, 0, '2024-04-09 23:01:08', '2024-05-25 22:34:37'),
(2, 2000000, 250000, 0, '2024-04-09 23:01:34', '2024-05-25 22:34:12'),
(3, 3000000, 500000, 0, '2024-04-09 23:02:06', '2024-04-30 00:54:21'),
(4, 5000000, 600000, 0, '2024-04-30 00:54:55', '2024-04-30 00:54:55'),
(5, 10000000, 1250000, 0, '2024-04-30 00:56:30', '2024-04-30 00:56:30'),
(6, 20000000, 2500000, 0, '2024-06-03 17:32:45', '2024-06-03 17:32:45'),
(7, 50000000, 5500000, 0, '2024-06-03 17:32:45', '2024-06-03 17:32:45'),
(8, 100000000, 15000000, 0, '2024-06-03 17:32:45', '2024-06-03 17:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `task_requests`
--

CREATE TABLE `task_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `team_invest` double NOT NULL DEFAULT '0',
  `team_size` bigint NOT NULL DEFAULT '0',
  `bonus` double(20,2) NOT NULL DEFAULT '0.00',
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `ref_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int NOT NULL DEFAULT '1' COMMENT 'default when user registration',
  `balance` double(20,4) NOT NULL DEFAULT '0.0000',
  `receive_able_amount` double(20,4) NOT NULL DEFAULT '0.0000',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usdt_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usdt_number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usdt_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bdt_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_ledgers`
--

CREATE TABLE `user_ledgers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deposit_id` int DEFAULT NULL,
  `withdraw_id` int DEFAULT NULL,
  `get_balance_from_user_id` bigint DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perticulation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `debit` double NOT NULL DEFAULT '0',
  `credit` double NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `step` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ord_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deduct_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vip_sliders`
--

CREATE TABLE `vip_sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `page_type` enum('home_page','vip_page') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home_page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vip_sliders`
--

INSERT INTO `vip_sliders` (`id`, `photo`, `status`, `page_type`, `created_at`, `updated_at`) VALUES
(32, '/public/upload/slider/17164943721JF.png', 'active', 'home_page', '2024-03-07 10:28:03', '2024-05-23 19:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platOrderNum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `usdt` double(20,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(20,2) NOT NULL DEFAULT '0.00',
  `charge` decimal(20,2) NOT NULL DEFAULT '0.00',
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `after_charge` decimal(20,2) NOT NULL DEFAULT '0.00',
  `withdraw_information` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkins_user_id_foreign` (`user_id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_package_id_foreign` (`package_id`);

--
-- Indexes for table `recharges`
--
ALTER TABLE `recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_requests`
--
ALTER TABLE `task_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `ref_id` (`ref_id`),
  ADD UNIQUE KEY `ref_id_2` (`ref_id`);

--
-- Indexes for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1674;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recharges`
--
ALTER TABLE `recharges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_requests`
--
ALTER TABLE `task_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
