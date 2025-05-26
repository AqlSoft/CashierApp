-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2025 at 04:42 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashier_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL,
  `type` enum('debit','credit') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `parent_id`, `type`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(0, 'Root', 0, 'debit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(1, 'Sales', 0, 'debit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(2, 'Purchases', 1, 'credit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(3, 'Expenses', 2, 'debit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(4, 'Salaries', 3, 'credit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(5, 'Loans', 4, 'debit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(6, 'Bank', 5, 'credit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(7, 'Cash', 6, 'debit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(8, 'client_1', 7, 'credit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(9, 'client_2', 8, 'debit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54'),
(10, 'supplier_1', 9, 'credit', 1, 1, '2025-03-07 02:20:54', 1, '2025-03-07 02:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userName` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'worker',
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userName`, `email`, `role_name`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `last_login_ip`, `last_login_at`) VALUES
(1, 'Yosra  Ziad', 'yosra0029@gmail.com', 'cashier', '0123456789', NULL, '$2y$12$9.2mcFjTpjxTs.c27bSkh.XX9KwThZYJU/5ALcobIfh6LrCFPMQ4K', NULL, 1, NULL, NULL, '2025-02-05 11:37:40', '2025-02-05 11:37:42', NULL, NULL),
(2, 'AtefAql', 'atefaql@gmail.com', 'admin', '0123654987', NULL, '$2y$12$/qznLKZNt2iym9QWkwgNBOJjKgdMcIxfxYGIDwUa6MBU4BzAZmmL.', NULL, 1, NULL, NULL, '2025-02-05 11:40:22', '2025-02-05 11:40:22', NULL, NULL),
(3, 'AtefAql1', 'atefaql00@gmail.com', 'worker', '0125346789', NULL, '$2y$12$95Z/r54xHMvLSmSEnhOUWerysmJrDlVDgfspFCZKGH34BE8K/O60G', NULL, 1, NULL, NULL, '2025-02-05 11:52:06', '2025-02-05 11:52:06', NULL, NULL),
(4, 'AtefAql102', 'atefaql00882@gmail.com', 'worker', '0102354698', NULL, '$2y$12$MpQAYxEa8D.2Pwyxc2MY9uOqHcugjURiEMZHrR7qzbKTbVLEjrYRu', NULL, 1, NULL, NULL, '2025-02-05 15:33:46', '2025-02-05 15:33:47', NULL, NULL),
(5, 'ali atef', 'atefaql777@gmail.com', 'cashier', '0102563498', NULL, '$2y$12$Jh7YIsGAVsJfe8wIMYpvd.zyl.eresCKLxfEYneRDmtbuqWBLYWle', NULL, 1, NULL, NULL, '2025-02-05 15:48:52', '2025-02-05 15:48:52', NULL, NULL),
(6, 'ali atef9', 'atefaql7787@gmail.com', 'worker', '0152364773', NULL, '$2y$12$JCyvigYwWbguLBK87UDOIOZ2sAVSwe9qZL.DqBybSXFU/ZP5Ukyvi', NULL, 1, NULL, NULL, '2025-02-05 15:50:05', '2025-02-05 15:50:05', NULL, NULL),
(7, 'yoyo', 'yoyoatef@gmail.com', 'cashier', '0158632947', NULL, '$2y$12$ut5D.T.lM99aX1sXeGcS5eSlaGDCfFvjzUcTsrqEJL6pFuAmU0Eri', NULL, 1, NULL, NULL, '2025-02-05 15:51:13', '2025-02-05 15:51:13', NULL, NULL),
(8, 'yoyo11', 'yoyoatef1@gmail.com', 'cashier', '0106789543', NULL, '$2y$12$u95ua9VMbhujVMfY10EFGu33frP/I6XRHlEHztcn1.B7Exp2qIGDa', NULL, 1, NULL, NULL, '2025-02-05 15:53:21', '2025-02-05 15:53:21', NULL, NULL),
(9, 'Yousra_20', 'atefakl80@gmail.com', 'super_admin', '0113652932', NULL, '$2y$12$/qznLKZNt2iym9QWkwgNBOJjKgdMcIxfxYGIDwUa6MBU4BzAZmmL.', NULL, 1, NULL, NULL, '2025-02-06 14:03:54', '2025-02-06 14:03:54', NULL, NULL),
(10, 'Yousra_2099', 'atefakl80999@gmail.com', 'worker', '0120548636', NULL, '$2y$12$cnp09R7JYY/HKV63NRLGoO6DqDZsVMEA0nIImbT7UkXq5UXxxD2M6', NULL, 1, NULL, NULL, '2025-02-06 14:12:58', '2025-02-06 14:12:58', NULL, NULL),
(11, 'Yousra_2', 'yousra@ziad.com', 'worker', '0152436987', NULL, '$2y$12$HrI8F2rmiQsAYCtZjI/f8OfR4CY3pazMQY5W45k6tXd3jOaFGlz96', NULL, 0, NULL, NULL, '2025-03-05 19:46:14', NULL, NULL, NULL),
(12, 'AlZaher', 'mohamed@ali.com', 'worker', '0157896456', NULL, '$2y$12$ILUF3SpWVS3eg5pj2I/ILOGjRY1GolfstdaxQLU7jKLMzE2KsnZ.i', NULL, 1, 9, 9, '2025-04-07 13:14:54', '2025-04-07 13:14:54', NULL, NULL),
(14, 'Gammal', 'ahmed@gammal.com', 'worker', NULL, NULL, '$2y$12$EyFosUdt942IGZHrdvq8cOiUS3/xrG5yXAYEzIv9WCpw5v95QOTl2', NULL, 1, 9, 9, '2025-04-16 14:00:50', '2025-04-16 14:00:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_profiles`
--

DROP TABLE IF EXISTS `admin_profiles`;
CREATE TABLE IF NOT EXISTS `admin_profiles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_number` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_profiles`
--

INSERT INTO `admin_profiles` (`id`, `admin_id`, `first_name`, `last_name`, `country`, `image`, `city`, `address`, `phone`, `created_at`, `updated_at`, `id_number`, `branch_id`) VALUES
(1, 1, 'Yosra  Ziad', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '104528736', NULL),
(2, 2, 'AtefAql', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '1025369874', NULL),
(3, 3, 'AtefAql1', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '1025436985', NULL),
(4, 4, 'AtefAql102', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '1254369870', NULL),
(5, 5, 'ali atef', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2488802541', NULL),
(6, 6, 'ali atef9', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2411158639', NULL),
(7, 7, 'yoyo', NULL, 150, 'avatar-04.jpg', NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2401236987', NULL),
(8, 8, 'yoyo11', NULL, 150, 'avatar-04.jpg', NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2566663987', NULL),
(9, 9, 'Yousra_20', 'atefff', 150, '1747232905_{C7B60666-1076-4B30-8568-78AD48B1B5FC}.png.jpg', 'eygptooo', 'adress11', '1234567890', '2025-04-07 14:16:24', '2025-05-14 14:28:25', '2586973654', 1),
(10, 10, 'Yousra_2099', 'atef', 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2563436666', NULL),
(11, 11, 'Yousra_2', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2355114689', NULL),
(12, 12, 'Mohamed', 'Ali Abdelzaher', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:14:54', '2025-04-11 13:30:18', '2488802741', NULL),
(13, 13, 'Mokhtar', 'Nazmi', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:17:16', '2025-04-07 16:17:16', NULL, NULL),
(14, 14, 'Ahmed', 'Algammal', NULL, NULL, NULL, NULL, NULL, '2025-04-16 17:00:50', '2025-04-16 17:00:50', '2553641936', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `admin_id`, `role_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(21, 9, 13, 9, '2025-04-13 17:17:41', 9, '2025-04-13 17:17:41'),
(22, 9, 46, 9, '2025-04-13 17:17:55', 9, '2025-04-13 17:17:55'),
(25, 1, 4, 9, '2025-04-13 17:56:21', 9, '2025-04-13 17:56:21'),
(26, 9, 3, 9, '2025-04-13 17:57:58', 9, '2025-04-13 17:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

DROP TABLE IF EXISTS `app_settings`;
CREATE TABLE IF NOT EXISTS `app_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'كود الفرع (فريد)',
  `name_ar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اسم الفرع بالعربية',
  `name_en` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'اسم الفرع بالعربية',
  `branch_type` enum('main','sub','virtual') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main' COMMENT 'نوع الفرع',
  `tax_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الرقم الضريبي',
  `commercial_register` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'السجل التجاري',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT '150',
  `region_id` bigint UNSIGNED DEFAULT '4',
  `city_id` bigint UNSIGNED DEFAULT '15',
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL COMMENT 'خط العرض',
  `longitude` decimal(11,8) DEFAULT NULL COMMENT 'خط الطول',
  `currency_id` int UNSIGNED DEFAULT NULL,
  `timezone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Asia/Riyadh',
  `fiscal_start_date` date DEFAULT NULL COMMENT 'بداية السنة المالية',
  `fiscal_end_date` date DEFAULT NULL COMMENT 'نهاية السنة المالية',
  `is_active` tinyint(1) DEFAULT '1',
  `is_online` tinyint(1) DEFAULT '0' COMMENT 'متصل بالنظام المركزي',
  `opening_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'تاريخ الافتتاح',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='فروع المطاعم';

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `code`, `name_ar`, `name_en`, `branch_type`, `tax_number`, `commercial_register`, `phone`, `mobile`, `email`, `website`, `country_id`, `region_id`, `city_id`, `address`, `postal_code`, `latitude`, `longitude`, `currency_id`, `timezone`, `fiscal_start_date`, `fiscal_end_date`, `is_active`, `is_online`, `opening_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BR00123', 'بريدة المركزى', 'Buraydah Centeral', 'main', '30012345621540003', NULL, '00966547660005', '0124563987', 'ahmed@gamal.com', 'https://abbad.org', 1, 1, 15, 'Adnani St. building 13 flat 2, front of vellege markets', '12523', 26.34220669, 43.96943092, NULL, '288', '2025-01-01', '2025-12-31', 1, 1, '2024-10-10 00:00:00', '2025-05-07 01:48:10', '2025-05-07 10:41:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `region_id` bigint UNSIGNED NOT NULL,
  `name_ar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_ar` (`name_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `region_id`, `name_ar`, `name_en`, `latitude`, `longitude`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'الرياض', 'Riyadh', 24.71360000, 46.67530000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(2, 1, 'الخرج', 'Al Kharj', 24.15540000, 47.33460000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(3, 1, 'الدوادمي', 'Dawadmi', 24.50770000, 44.39240000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(4, 1, 'المجمعة', 'Majmaah', 25.90360000, 45.34550000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(5, 1, 'القويعية', 'Quwayiyah', 24.06670000, 45.28330000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(6, 2, 'مكة المكرمة', 'Makkah', 21.38910000, 39.85790000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(7, 2, 'جدة', 'Jeddah', 21.54350000, 39.17300000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(8, 2, 'الطائف', 'Taif', 21.43730000, 40.51270000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(9, 2, 'القنفذة', 'Al Qunfudhah', 19.12640000, 41.07890000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(10, 2, 'الليث', 'Al Lith', 20.16330000, 40.28890000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(11, 3, 'المدينة المنورة', 'Madinah', 24.52470000, 39.56920000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(12, 3, 'ينبع', 'Yanbu', 24.08950000, 38.06180000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(13, 3, 'العلا', 'Al Ula', 26.60850000, 37.92320000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(14, 3, 'المهد', 'Mahd', 23.50000000, 40.50000000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(15, 4, 'بريدة', 'Buraidah', 26.33600000, 43.96320000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(16, 4, 'عنيزة', 'Unaizah', 26.09070000, 43.98570000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(17, 4, 'الرس', 'Ar Rass', 25.85150000, 43.52230000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(18, 5, 'الدمام', 'Dammam', 26.39270000, 49.97770000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(19, 5, 'الخبر', 'Khobar', 26.21720000, 50.19710000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(20, 5, 'الظهران', 'Dhahran', 26.23610000, 50.03930000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(21, 5, 'الجبيل', 'Jubail', 27.03750000, 49.66370000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9),
(22, 5, 'الأحساء', 'Al Ahsa', 25.38940000, 49.58640000, 1, '2025-05-06 03:09:11', '2025-05-06 03:09:11', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` enum('phone','email','whatsapp','mobile','fax') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'phone',
  `person_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `contact`, `category_name`, `person_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Mobile number', '0548676841', 'mobile', 9, 9, 9, '2025-05-09 20:44:33', '2025-05-09 20:44:33', 1),
(2, 'whatsapp', '0548676842', 'whatsapp', 9, 9, 9, '2025-05-09 21:04:31', '2025-05-09 21:04:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arabic_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso2` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_code` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `arabic_name`, `iso2`, `iso3`, `call_code`) VALUES
(1, 'Afghanistan', 'أفغانستان', 'AF', 'AFG', '+93'),
(2, 'Albania', 'ألبانيا', 'AL', 'ALB', '+355'),
(3, 'Algeria', 'الجزائر', 'DZ', 'DZA', '+213'),
(4, 'Andorra', 'أندورا', 'AD', 'AND', '+376'),
(5, 'Angola', 'أنغولا', 'AO', 'AGO', '+244'),
(6, 'Antigua and Barbuda', 'أنتيغوا وباربودا', 'AG', 'ATG', '+1-268'),
(7, 'Argentina', 'الأرجنتين', 'AR', 'ARG', '+54'),
(8, 'Armenia', 'أرمينيا', 'AM', 'ARM', '+374'),
(9, 'Australia', 'أستراليا', 'AU', 'AUS', '+61'),
(10, 'Austria', 'النمسا', 'AT', 'AUT', '+43'),
(11, 'Azerbaijan', 'أذربيجان', 'AZ', 'AZE', '+994'),
(12, 'Bahamas', 'الباهاما', 'BS', 'BHS', '+1-242'),
(13, 'Bahrain', 'البحرين', 'BH', 'BHR', '+973'),
(14, 'Bangladesh', 'بنغلاديش', 'BD', 'BGD', '+880'),
(15, 'Barbados', 'بربادوس', 'BB', 'BRB', '+1-246'),
(16, 'Belarus', 'بيلاروسيا', 'BY', 'BLR', '+375'),
(17, 'Belgium', 'بلجيكا', 'BE', 'BEL', '+32'),
(18, 'Belize', 'بليز', 'BZ', 'BLZ', '+501'),
(19, 'Benin', 'بنين', 'BJ', 'BEN', '+229'),
(20, 'Bhutan', 'بوتان', 'BT', 'BTN', '+975'),
(21, 'Bolivia', 'بوليفيا', 'BO', 'BOL', '+591'),
(22, 'Bosnia and Herzegovina', 'البوسنة والهرسك', 'BA', 'BIH', '+387'),
(23, 'Botswana', 'بوتسوانا', 'BW', 'BWA', '+267'),
(24, 'Brazil', 'البرازيل', 'BR', 'BRA', '+55'),
(25, 'Brunei', 'بروناي', 'BN', 'BRN', '+673'),
(26, 'Bulgaria', 'بلغاريا', 'BG', 'BGR', '+359'),
(27, 'Burkina Faso', 'بوركينا فاسو', 'BF', 'BFA', '+226'),
(28, 'Burundi', 'بوروندي', 'BI', 'BDI', '+257'),
(29, 'Cabo Verde', 'الرأس الأخضر', 'CV', 'CPV', '+238'),
(30, 'Cambodia', 'كمبوديا', 'KH', 'KHM', '+855'),
(31, 'Cameroon', 'الكاميرون', 'CM', 'CMR', '+237'),
(32, 'Canada', 'كندا', 'CA', 'CAN', '+1'),
(33, 'Central African Republic', 'جمهورية أفريقيا الوسطى', 'CF', 'CAF', '+236'),
(34, 'Chad', 'تشاد', 'TD', 'TCD', '+235'),
(35, 'Chile', 'تشيلي', 'CL', 'CHL', '+56'),
(36, 'China', 'الصين', 'CN', 'CHN', '+86'),
(37, 'Colombia', 'كولومبيا', 'CO', 'COL', '+57'),
(38, 'Comoros', 'جزر القمر', 'KM', 'COM', '+269'),
(39, 'Congo (Congo-Brazzaville)', 'الكونغو', 'CG', 'COG', '+242'),
(40, 'Costa Rica', 'كوستاريكا', 'CR', 'CRI', '+506'),
(41, 'Croatia', 'كرواتيا', 'HR', 'HRV', '+385'),
(42, 'Cuba', 'كوبا', 'CU', 'CUB', '+53'),
(43, 'Cyprus', 'قبرص', 'CY', 'CYP', '+357'),
(44, 'Czechia (Czech Republic)', 'التشيك', 'CZ', 'CZE', '+420'),
(45, 'Democratic Republic of the Congo', 'جمهورية الكونغو الديمقراطية', 'CD', 'COD', '+243'),
(46, 'Denmark', 'الدنمارك', 'DK', 'DNK', '+45'),
(47, 'Djibouti', 'جيبوتي', 'DJ', 'DJI', '+253'),
(48, 'Dominica', 'دومينيكا', 'DM', 'DMA', '+1-767'),
(49, 'Dominican Republic', 'جمهورية الدومينيكان', 'DO', 'DOM', '+1-809'),
(50, 'Ecuador', 'الإكوادور', 'EC', 'ECU', '+593'),
(51, 'Egypt', 'مصر', 'EG', 'EGY', '+20'),
(52, 'El Salvador', 'السلفادور', 'SV', 'SLV', '+503'),
(53, 'Equatorial Guinea', 'غينيا الاستوائية', 'GQ', 'GNQ', '+240'),
(54, 'Eritrea', 'إريتريا', 'ER', 'ERI', '+291'),
(55, 'Estonia', 'إستونيا', 'EE', 'EST', '+372'),
(56, 'Eswatini (fmr. \"Swaziland\")', 'إسواتيني', 'SZ', 'SWZ', '+268'),
(57, 'Ethiopia', 'إثيوبيا', 'ET', 'ETH', '+251'),
(58, 'Fiji', 'فيجي', 'FJ', 'FJI', '+679'),
(59, 'Finland', 'فنلندا', 'FI', 'FIN', '+358'),
(60, 'France', 'فرنسا', 'FR', 'FRA', '+33'),
(61, 'Gabon', 'الغابون', 'GA', 'GAB', '+241'),
(62, 'Gambia', 'غامبيا', 'GM', 'GMB', '+220'),
(63, 'Georgia', 'جورجيا', 'GE', 'GEO', '+995'),
(64, 'Germany', 'ألمانيا', 'DE', 'DEU', '+49'),
(65, 'Ghana', 'غانا', 'GH', 'GHA', '+233'),
(66, 'Greece', 'اليونان', 'GR', 'GRC', '+30'),
(67, 'Grenada', 'غرينادا', 'GD', 'GRD', '+1-473'),
(68, 'Guatemala', 'غواتيمالا', 'GT', 'GTM', '+502'),
(69, 'Guinea', 'غينيا', 'GN', 'GIN', '+224'),
(70, 'Guinea-Bissau', 'غينيا بيساو', 'GW', 'GNB', '+245'),
(71, 'Guyana', 'غيانا', 'GY', 'GUY', '+592'),
(72, 'Haiti', 'هايتي', 'HT', 'HTI', '+509'),
(73, 'Honduras', 'هندوراس', 'HN', 'HND', '+504'),
(74, 'Hungary', 'المجر', 'HU', 'HUN', '+36'),
(75, 'Iceland', 'آيسلندا', 'IS', 'ISL', '+354'),
(76, 'India', 'الهند', 'IN', 'IND', '+91'),
(77, 'Indonesia', 'إندونيسيا', 'ID', 'IDN', '+62'),
(78, 'Iran', 'إيران', 'IR', 'IRN', '+98'),
(79, 'Iraq', 'العراق', 'IQ', 'IRQ', '+964'),
(80, 'Ireland', 'أيرلندا', 'IE', 'IRL', '+353'),
(81, 'Israel', 'إسرائيل', 'IL', 'ISR', '+972'),
(82, 'Italy', 'إيطاليا', 'IT', 'ITA', '+39'),
(83, 'Jamaica', 'جامايكا', 'JM', 'JAM', '+1-876'),
(84, 'Japan', 'اليابان', 'JP', 'JPN', '+81'),
(85, 'Jordan', 'الأردن', 'JO', 'JOR', '+962'),
(86, 'Kazakhstan', 'كازاخستان', 'KZ', 'KAZ', '+7'),
(87, 'Kenya', 'كينيا', 'KE', 'KEN', '+254'),
(88, 'Kiribati', 'كيريباتي', 'KI', 'KIR', '+686'),
(89, 'Kuwait', 'الكويت', 'KW', 'KWT', '+965'),
(90, 'Kyrgyzstan', 'قيرغيزستان', 'KG', 'KGZ', '+996'),
(91, 'Laos', 'لاوس', 'LA', 'LAO', '+856'),
(92, 'Latvia', 'لاتفيا', 'LV', 'LVA', '+371'),
(93, 'Lebanon', 'لبنان', 'LB', 'LBN', '+961'),
(94, 'Lesotho', 'ليسوتو', 'LS', 'LSO', '+266'),
(95, 'Liberia', 'ليبيريا', 'LR', 'LBR', '+231'),
(96, 'Libya', 'ليبيا', 'LY', 'LBY', '+218'),
(97, 'Liechtenstein', 'ليختنشتاين', 'LI', 'LIE', '+423'),
(98, 'Lithuania', 'ليتوانيا', 'LT', 'LTU', '+370'),
(99, 'Luxembourg', 'لوكسمبورغ', 'LU', 'LUX', '+352'),
(100, 'Madagascar', 'مدغشقر', 'MG', 'MDG', '+261'),
(101, 'Malawi', 'مالاوي', 'MW', 'MWI', '+265'),
(102, 'Malaysia', 'ماليزيا', 'MY', 'MYS', '+60'),
(103, 'Maldives', 'المالديف', 'MV', 'MDV', '+960'),
(104, 'Mali', 'مالي', 'ML', 'MLI', '+223'),
(105, 'Malta', 'مالطا', 'MT', 'MLT', '+356'),
(106, 'Marshall Islands', 'جزر مارشال', 'MH', 'MHL', '+692'),
(107, 'Mauritania', 'موريتانيا', 'MR', 'MRT', '+222'),
(108, 'Mauritius', 'موريشيوس', 'MU', 'MUS', '+230'),
(109, 'Mexico', 'المكسيك', 'MX', 'MEX', '+52'),
(110, 'Micronesia', 'ميكرونيزيا', 'FM', 'FSM', '+691'),
(111, 'Moldova', 'مولدوفا', 'MD', 'MDA', '+373'),
(112, 'Monaco', 'موناكو', 'MC', 'MCO', '+377'),
(113, 'Mongolia', 'منغوليا', 'MN', 'MNG', '+976'),
(114, 'Montenegro', 'الجبل الأسود', 'ME', 'MNE', '+382'),
(115, 'Morocco', 'المغرب', 'MA', 'MAR', '+212'),
(116, 'Mozambique', 'موزمبيق', 'MZ', 'MOZ', '+258'),
(117, 'Myanmar (formerly Burma)', 'ميانمار', 'MM', 'MMR', '+95'),
(118, 'Namibia', 'ناميبيا', 'NA', 'NAM', '+264'),
(119, 'Nauru', 'ناورو', 'NR', 'NRU', '+674'),
(120, 'Nepal', 'نيبال', 'NP', 'NPL', '+977'),
(121, 'Netherlands', 'هولندا', 'NL', 'NLD', '+31'),
(122, 'New Zealand', 'نيوزيلندا', 'NZ', 'NZL', '+64'),
(123, 'Nicaragua', 'نيكاراغوا', 'NI', 'NIC', '+505'),
(124, 'Niger', 'النيجر', 'NE', 'NER', '+227'),
(125, 'Nigeria', 'نيجيريا', 'NG', 'NGA', '+234'),
(126, 'North Korea', 'كوريا الشمالية', 'KP', 'PRK', '+850'),
(127, 'North Macedonia', 'مقدونيا الشمالية', 'MK', 'MKD', '+389'),
(128, 'Norway', 'النرويج', 'NO', 'NOR', '+47'),
(129, 'Oman', 'عمان', 'OM', 'OMN', '+968'),
(130, 'Pakistan', 'باكستان', 'PK', 'PAK', '+92'),
(131, 'Palau', 'بالاو', 'PW', 'PLW', '+680'),
(132, 'Palestine State', 'فلسطين', 'PS', 'PSE', '+970'),
(133, 'Panama', 'بنما', 'PA', 'PAN', '+507'),
(134, 'Papua New Guinea', 'بابوا غينيا الجديدة', 'PG', 'PNG', '+675'),
(135, 'Paraguay', 'باراغواي', 'PY', 'PRY', '+595'),
(136, 'Peru', 'بيرو', 'PE', 'PER', '+51'),
(137, 'Philippines', 'الفلبين', 'PH', 'PHL', '+63'),
(138, 'Poland', 'بولندا', 'PL', 'POL', '+48'),
(139, 'Portugal', 'البرتغال', 'PT', 'PRT', '+351'),
(140, 'Qatar', 'قطر', 'QA', 'QAT', '+974'),
(141, 'Romania', 'رومانيا', 'RO', 'ROU', '+40'),
(142, 'Russia', 'روسيا', 'RU', 'RUS', '+7'),
(143, 'Rwanda', 'رواندا', 'RW', 'RWA', '+250'),
(144, 'Saint Kitts and Nevis', 'سانت كيتس ونيفيس', 'KN', 'KNA', '+1-869'),
(145, 'Saint Lucia', 'سانت لوسيا', 'LC', 'LCA', '+1-758'),
(146, 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', 'VC', 'VCT', '+1-784'),
(147, 'Samoa', 'ساموا', 'WS', 'WSM', '+685'),
(148, 'San Marino', 'سان مارينو', 'SM', 'SMR', '+378'),
(149, 'Sao Tome and Principe', 'ساو تومي وبرينسيبي', 'ST', 'STP', '+239'),
(150, 'Saudi Arabia', 'المملكة العربية السعودية', 'SA', 'SAU', '+966'),
(151, 'Senegal', 'السنغال', 'SN', 'SEN', '+221'),
(152, 'Serbia', 'صربيا', 'RS', 'SRB', '+381'),
(153, 'Seychelles', 'سيشيل', 'SC', 'SYC', '+248'),
(154, 'Sierra Leone', 'سيراليون', 'SL', 'SLE', '+232'),
(155, 'Singapore', 'سنغافورة', 'SG', 'SGP', '+65'),
(156, 'Slovakia', 'سلوفاكيا', 'SK', 'SVK', '+421'),
(157, 'Slovenia', 'سلوفينيا', 'SI', 'SVN', '+386'),
(158, 'Solomon Islands', 'جزر سليمان', 'SB', 'SLB', '+677'),
(159, 'Somalia', 'الصومال', 'SO', 'SOM', '+252'),
(160, 'South Africa', 'جنوب أفريقيا', 'ZA', 'ZAF', '+27'),
(161, 'South Korea', 'كوريا الجنوبية', 'KR', 'KOR', '+82'),
(162, 'South Sudan', 'جنوب السودان', 'SS', 'SSD', '+211'),
(163, 'Spain', 'إسبانيا', 'ES', 'ESP', '+34'),
(164, 'Sri Lanka', 'سريلانكا', 'LK', 'LKA', '+94'),
(165, 'Sudan', 'السودان', 'SD', 'SDN', '+249'),
(166, 'Suriname', 'سورينام', 'SR', 'SUR', '+597'),
(167, 'Sweden', 'السويد', 'SE', 'SWE', '+46'),
(168, 'Switzerland', 'سويسرا', 'CH', 'CHE', '+41'),
(169, 'Syria', 'سوريا', 'SY', 'SYR', '+963'),
(170, 'Tajikistan', 'طاجيكستان', 'TJ', 'TJK', '+992'),
(171, 'Tanzania', 'تنزانيا', 'TZ', 'TZA', '+255'),
(172, 'Thailand', 'تايلاند', 'TH', 'THA', '+66'),
(173, 'Timor-Leste', 'تيمور الشرقية', 'TL', 'TLS', '+670'),
(174, 'Togo', 'توغو', 'TG', 'TGO', '+228'),
(175, 'Tonga', 'تونغا', 'TO', 'TON', '+676'),
(176, 'Trinidad and Tobago', 'ترينيداد وتوباغو', 'TT', 'TTO', '+1-868'),
(177, 'Tunisia', 'تونس', 'TN', 'TUN', '+216'),
(178, 'Turkey', 'تركيا', 'TR', 'TUR', '+90'),
(179, 'Turkmenistan', 'تركمانستان', 'TM', 'TKM', '+993'),
(180, 'Tuvalu', 'توفالو', 'TV', 'TUV', '+688'),
(181, 'Uganda', 'أوغندا', 'UG', 'UGA', '+256'),
(182, 'Ukraine', 'أوكرانيا', 'UA', 'UKR', '+380'),
(183, 'United Arab Emirates', 'الإمارات العربية المتحدة', 'AE', 'ARE', '+971'),
(184, 'United Kingdom', 'المملكة المتحدة', 'GB', 'GBR', '+44'),
(185, 'United States of America', 'الولايات المتحدة الأمريكية', 'US', 'USA', '+1'),
(186, 'Uruguay', 'أوروغواي', 'UY', 'URY', '+598'),
(187, 'Uzbekistan', 'أوزبكستان', 'UZ', 'UZB', '+998'),
(188, 'Vanuatu', 'فانواتو', 'VU', 'VUT', '+678'),
(189, 'Vatican City', 'مدينة الفاتيكان', 'VA', 'VAT', '+379'),
(190, 'Venezuela', 'فنزويلا', 'VE', 'VEN', '+58'),
(191, 'Vietnam', 'فيتنام', 'VN', 'VNM', '+84'),
(192, 'Yemen', 'اليمن', 'YE', 'YEM', '+967'),
(193, 'Zambia', 'زامبيا', 'ZM', 'ZMB', '+260'),
(194, 'Zimbabwe', 'زيمبابوي', 'ZW', 'ZWE', '+263');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ISO 4217 currency code',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Currency name',
  `symbol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Currency symbol',
  `symbol_position` enum('before','after') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'before' COMMENT 'Position of symbol relative to amount',
  `decimal_places` tinyint UNSIGNED DEFAULT '2' COMMENT 'Number of decimal places to display',
  `decimal_separator` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '.' COMMENT 'Decimal separator character',
  `thousands_separator` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT ',' COMMENT 'Thousands separator character',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '1 if this is the default currency',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '1 if currency is active',
  `icon` varchar(72) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(15,6) DEFAULT '1.000000' COMMENT 'Exchange rate relative to default currency',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL COMMENT 'User who created the record',
  `updated_by` int UNSIGNED DEFAULT NULL COMMENT 'User who last updated the record',
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_code_unique` (`code`),
  KEY `currencies_is_default_index` (`is_default`),
  KEY `currencies_is_active_index` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='System currencies table';

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `symbol_position`, `decimal_places`, `decimal_separator`, `thousands_separator`, `is_default`, `is_active`, `icon`, `exchange_rate`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 'EGP', 'Egyption Pound', 'ج.م', 'before', 2, '.', ',', 1, 1, '1746789954_9813049.png', 1.000000, '2025-05-09 08:25:54', '2025-05-09 13:03:29', NULL, NULL),
(4, 'SAR', 'الريال السعودى', 'ر.س', 'before', 2, '.', ',', 1, 1, '1746810652_Saudi_Riyal_Symbol.svg.png', 1.000000, '2025-05-09 14:09:53', '2025-05-09 14:10:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

DROP TABLE IF EXISTS `general_setting`;
CREATE TABLE IF NOT EXISTS `general_setting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_number` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_registration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `company_name`, `tax_number`, `commercial_registration`, `phone`, `logo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'AqlSoft', '00001122334455', '0001238760', '0588454263580', 'logo-icon.png', '2025-03-27 20:41:14', '2025-05-06 03:32:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_categories`
--

DROP TABLE IF EXISTS `items_categories`;
CREATE TABLE IF NOT EXISTS `items_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cat_brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_categories`
--

INSERT INTO `items_categories` (`id`, `cat_name`, `cat_brief`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Main Dishes', 'Main Dishes', 1, 1, '2024-12-03 18:57:34', '2024-12-03 18:57:34', NULL),
(46, 'Beverages', 'Beverages', 1, 1, '2024-12-03 18:57:34', '2024-12-03 18:57:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"ac4b26ab-e15e-47ef-a8d1-d28f9e038a68\",\"displayName\":\"App\\\\Events\\\\TestBroadcastEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:29:\\\"App\\\\Events\\\\TestBroadcastEvent\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744735337, 1744735337),
(2, 'default', '{\"uuid\":\"18e20d81-8fe7-4fa4-88b7-621a5e61d026\",\"displayName\":\"App\\\\Events\\\\TestBroadcastEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:29:\\\"App\\\\Events\\\\TestBroadcastEvent\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744735499, 1744735499),
(3, 'default', '{\"uuid\":\"57a88043-c2bc-4b23-924e-9dfe8bc0d55c\",\"displayName\":\"App\\\\Events\\\\TestBroadcastEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:29:\\\"App\\\\Events\\\\TestBroadcastEvent\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744736251, 1744736251),
(4, 'default', '{\"uuid\":\"a11eb2c2-fb29-4af0-b927-8ff60ce538fb\",\"displayName\":\"App\\\\Events\\\\TestBroadcastEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:29:\\\"App\\\\Events\\\\TestBroadcastEvent\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744736322, 1744736322),
(5, 'default', '{\"uuid\":\"fadd9a62-e816-4fd3-b963-f7a0c82c4a07\",\"displayName\":\"App\\\\Events\\\\TestBroadcastEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:29:\\\"App\\\\Events\\\\TestBroadcastEvent\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744736508, 1744736508),
(6, 'default', '{\"uuid\":\"7d6688a6-034c-4d1a-8169-fc1ff6cf24fa\",\"displayName\":\"App\\\\Events\\\\TestBroadcastEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:29:\\\"App\\\\Events\\\\TestBroadcastEvent\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744736972, 1744736972),
(7, 'default', '{\"uuid\":\"bcbeec18-a753-487f-91f4-354b9ffedd60\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745143535, 1745143535),
(8, 'default', '{\"uuid\":\"1502e03a-5084-448c-a80c-9bb99f85e80f\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745143535, 1745143535),
(9, 'default', '{\"uuid\":\"49348318-99ed-40f9-9b5e-36495d4c7c6d\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745143543, 1745143543),
(10, 'default', '{\"uuid\":\"6e2c6893-d2c6-4b39-88ba-a3492baab761\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745143543, 1745143543),
(11, 'default', '{\"uuid\":\"58ca5a08-791b-4369-a757-8069975cc4bb\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745149269, 1745149269),
(12, 'default', '{\"uuid\":\"426d8e36-956f-4da2-b8fd-47274749c2e7\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745149269, 1745149269),
(13, 'default', '{\"uuid\":\"1158b6f4-d7a1-421e-b6ea-2e218dee5cc4\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745149845, 1745149845),
(14, 'default', '{\"uuid\":\"d8cc729e-ee50-49ca-8ac1-cd4b3953b38e\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745149845, 1745149845),
(15, 'default', '{\"uuid\":\"a8ae000c-e29f-41b8-9888-eb1b76d76d40\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:30;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745218382, 1745218382),
(16, 'default', '{\"uuid\":\"235f9bdd-eb76-48b1-a0a7-eaecce3f6bb1\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:30;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745218382, 1745218382),
(17, 'default', '{\"uuid\":\"f2b27cbc-0f3b-479e-a73f-af25dcc65b97\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747310100, 1747310100),
(18, 'default', '{\"uuid\":\"fd07231b-7957-4360-a5e3-4325a3eb2866\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747310519, 1747310519),
(19, 'default', '{\"uuid\":\"21883877-94e9-4937-b519-55aebe5595f0\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747310589, 1747310589),
(20, 'default', '{\"uuid\":\"27666bb0-2521-40db-bd21-ab7df27adc54\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747310804, 1747310804),
(21, 'default', '{\"uuid\":\"93d36ef1-543e-4cde-b64c-a563f8ff32ce\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747310819, 1747310819),
(22, 'default', '{\"uuid\":\"c070a8af-e580-4f52-8a52-47c34fa4a51c\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747310831, 1747310831),
(23, 'default', '{\"uuid\":\"8c378455-d667-4381-933c-71cc40551775\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747856733, 1747856733),
(24, 'default', '{\"uuid\":\"02647f63-060f-4b48-9d74-80a8bff5cf64\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747857069, 1747857069),
(25, 'default', '{\"uuid\":\"298de2f3-1d75-4f2d-8039-cb73b4ba1921\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747857108, 1747857108),
(26, 'default', '{\"uuid\":\"0c080444-8583-4021-883f-e6bc09ea448f\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747857223, 1747857223),
(27, 'default', '{\"uuid\":\"41f5ff5e-4c82-4975-b2bd-868f5ecb7190\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747857238, 1747857238),
(28, 'default', '{\"uuid\":\"bfe6ff93-bc7f-470b-8c30-04e79c11e513\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747857332, 1747857332),
(29, 'default', '{\"uuid\":\"682acd6d-1cb2-48a9-8c99-6e6e15a71c5e\",\"displayName\":\"App\\\\Events\\\\TestBroadcast\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:24:\\\"App\\\\Events\\\\TestBroadcast\\\":1:{s:7:\\\"message\\\";s:18:\\\"Hello from Reverb!\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1747857358, 1747857358);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_05_133410_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mony_boxes`
--

DROP TABLE IF EXISTS `mony_boxes`;
CREATE TABLE IF NOT EXISTS `mony_boxes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_isal_exhcange` bigint UNSIGNED DEFAULT NULL,
  `last_isal_collect` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mony_boxes`
--

INSERT INTO `mony_boxes` (`id`, `name`, `last_isal_exhcange`, `last_isal_collect`, `status`, `date`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'main', 0, 0, 1, '2025-04-03 13:35:17', '2025-04-03 13:35:52', '2025-04-03 13:35:52', NULL, NULL),
(2, 'cashier1', 0, 0, 1, '2025-04-03 13:35:17', '2025-04-03 13:35:52', '2025-04-03 13:35:52', NULL, NULL),
(3, 'cashier2', 0, 0, 1, '2025-04-03 13:35:17', '2025-04-03 13:35:52', '2025-04-03 13:35:52', NULL, NULL),
(4, 'cashier3', 0, 0, 1, '2025-04-03 13:35:17', '2025-04-03 13:35:52', '2025-04-03 13:35:52', NULL, NULL),
(5, 'cash', 12, 100, 1, '2025-04-05 00:00:00', '2025-04-05 15:25:26', '2025-04-05 15:25:26', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `order_sn` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `customer_id` bigint NOT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `delivery_method` bigint UNSIGNED DEFAULT NULL,
  `wait_no` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_id` bigint UNSIGNED DEFAULT NULL,
  `POS` bigint UNSIGNED DEFAULT NULL,
  `sales_session_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `processing_by` bigint UNSIGNED DEFAULT NULL,
  `processing_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parties_created_by` (`created_by`),
  KEY `fk_parties_updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_sn`, `order_date`, `customer_id`, `notes`, `created_at`, `updated_at`, `deleted_at`, `status`, `delivery_method`, `wait_no`, `table_id`, `POS`, `sales_session_id`, `created_by`, `updated_by`, `processing_by`, `processing_time`) VALUES
(16, '00000001', '2025-03-18 00:00:00', 1, NULL, '2025-03-18 16:15:01', '2025-03-29 19:11:08', NULL, 3, 1, 'OUT0001', NULL, NULL, 0, 10, 10, NULL, NULL),
(17, '00000002', '2025-03-18 00:00:00', 1, NULL, '2025-03-18 16:20:59', '2025-03-18 16:37:54', NULL, 2, NULL, NULL, NULL, NULL, 0, 10, 10, NULL, NULL),
(18, '00000003', '2025-03-22 23:02:26', 1, NULL, '2025-03-22 20:02:26', '2025-03-31 12:10:13', NULL, 3, 1, 'OUT0003', NULL, NULL, 0, 10, 9, NULL, NULL),
(19, '00000004', '2025-03-23 19:51:25', 1, NULL, '2025-03-23 16:51:25', '2025-03-31 16:06:32', NULL, 3, NULL, 'OUT0004', NULL, NULL, 0, 10, 9, NULL, NULL),
(20, '00000005', '2025-03-23 20:23:07', 1, NULL, '2025-03-23 17:23:07', '2025-04-05 15:57:09', NULL, 2, 1, 'OUT0005', NULL, NULL, 0, 10, 9, NULL, NULL),
(21, '00000006', '2025-03-23 20:58:03', 1, NULL, '2025-03-23 17:58:03', '2025-03-23 17:58:03', NULL, 2, NULL, 'new', NULL, NULL, 0, 10, NULL, NULL, NULL),
(22, '00000007', '2025-03-23 21:07:02', 1, NULL, '2025-03-23 18:07:02', '2025-04-20 07:05:43', NULL, 6, NULL, 'OUT0007', NULL, NULL, 0, 10, 14, 14, '2025-04-20 10:05:34'),
(23, '00000008', '2025-03-23 21:08:51', 1, NULL, '2025-03-23 18:08:51', '2025-03-23 18:26:38', NULL, 2, NULL, 'new', NULL, NULL, 0, 10, 10, NULL, NULL),
(24, '00000009', '2025-03-28 21:03:19', 1, NULL, '2025-03-28 18:03:19', '2025-03-30 18:27:02', NULL, 2, NULL, 'new', NULL, NULL, 0, 10, 10, NULL, NULL),
(25, '00000010', '2025-03-29 22:08:08', 1, NULL, '2025-03-29 19:08:08', '2025-03-29 19:09:32', NULL, 3, 1, 'OUT0010', NULL, NULL, 0, 10, 10, NULL, NULL),
(26, '00000011', '2025-03-29 22:15:33', 1, NULL, '2025-03-29 19:15:33', '2025-03-29 19:15:54', NULL, 3, 1, 'OUT0011', NULL, NULL, 0, 10, 10, NULL, NULL),
(27, '00000012', '2025-03-29 22:17:14', 1, NULL, '2025-03-29 19:17:14', '2025-03-29 19:17:51', NULL, 3, 1, 'OUT0012', NULL, NULL, 0, 10, 10, NULL, NULL),
(28, '00000013', '2025-04-16 17:19:57', 1, NULL, '2025-04-16 14:19:57', '2025-04-20 08:50:45', NULL, 5, NULL, 'OUT0013', NULL, NULL, 13, 14, 14, 14, '2025-04-20 11:41:09'),
(29, '00000014', '2025-04-20 10:01:44', 1, NULL, '2025-04-20 07:01:44', '2025-04-20 07:01:44', NULL, 2, NULL, 'new', NULL, NULL, 13, 14, NULL, NULL, NULL),
(30, '00000015', '2025-04-21 06:52:16', 1, NULL, '2025-04-21 03:52:16', '2025-04-21 03:53:01', NULL, 4, NULL, '0015', NULL, NULL, 14, 9, 9, 9, '2025-04-21 06:53:01'),
(31, '00000016', '2025-04-21 06:52:39', 1, NULL, '2025-04-21 03:52:39', '2025-04-21 03:52:45', NULL, 3, NULL, '0016', NULL, NULL, 14, 9, 9, NULL, '2025-04-21 06:52:45'),
(32, '00000017', '2025-05-01 05:12:15', 1, NULL, '2025-05-01 02:12:15', '2025-05-01 02:12:15', NULL, 2, NULL, 'new', NULL, NULL, 14, 9, NULL, NULL, NULL),
(33, '00000018', '2025-05-17 18:38:16', 1, NULL, '2025-05-17 15:38:16', '2025-05-21 16:03:28', NULL, 3, 1, 'TWY0018', NULL, NULL, 16, 9, 9, NULL, NULL),
(34, '00000019', '2025-05-17 18:47:02', 1, NULL, '2025-05-17 15:47:02', '2025-05-17 15:49:40', NULL, 2, 2, 'LOC0019', NULL, NULL, 16, 9, 9, NULL, NULL),
(35, '00000020', '2025-05-21 18:43:12', 1, NULL, '2025-05-21 15:43:12', '2025-05-21 16:04:53', NULL, 3, NULL, 'DVR0020', NULL, NULL, 16, 9, 9, NULL, NULL),
(36, '00000021', '2025-05-21 18:45:30', 1, NULL, '2025-05-21 15:45:30', '2025-05-21 16:00:37', NULL, 3, 1, 'TWY0021', NULL, NULL, 16, 9, 9, NULL, NULL),
(37, '00000022', '2025-05-21 19:02:12', 1, NULL, '2025-05-21 16:02:12', '2025-05-21 16:02:58', NULL, 3, 1, 'TWY0022', NULL, NULL, 16, 9, 9, NULL, NULL),
(38, '00000023', '2025-05-21 19:29:53', 1, NULL, '2025-05-21 16:29:53', '2025-05-21 16:29:53', NULL, 1, NULL, 'DVR0023', NULL, NULL, 16, 9, NULL, NULL, NULL),
(39, '00000024', '2025-05-25 00:00:00', 1, NULL, '2025-05-25 12:25:48', '2025-05-25 12:25:48', NULL, 1, 1, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `invoice_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` tinyint DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `category_id`, `product_id`, `order_id`, `invoice_id`, `quantity`, `unit_id`, `price`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(69, 1, 1, 22, 57, 1, 1, 400.00, NULL, '2025-03-31 16:50:34', '2025-03-31 17:31:53', 9, 9),
(70, 1, 3, 22, 57, 2, 1, 500.00, NULL, '2025-03-31 16:51:38', '2025-03-31 17:31:53', 9, 9),
(71, 46, 4, 22, 57, 1, 1, 700.00, NULL, '2025-03-31 17:03:14', '2025-03-31 17:31:53', 9, 9),
(72, 1, 1, 20, NULL, 1, 1, 400.00, NULL, '2025-04-05 15:57:09', '2025-04-05 15:57:09', 9, NULL),
(73, 1, 1, 28, 58, 1, 1, 400.00, NULL, '2025-04-16 14:20:26', '2025-04-16 14:45:37', 14, 14),
(74, 1, 3, 28, 58, 1, 1, 500.00, NULL, '2025-04-16 14:20:29', '2025-04-16 14:45:37', 14, 14),
(75, 1, 13, 28, 58, 1, 1, 400.00, NULL, '2025-04-16 14:20:44', '2025-04-16 14:45:37', 14, 14),
(76, 1, 1, 30, 59, 1, 1, 400.00, NULL, '2025-04-21 03:52:18', '2025-04-21 03:52:23', 9, 9),
(77, 1, 13, 30, 59, 1, 1, 400.00, NULL, '2025-04-21 03:52:18', '2025-04-21 03:52:23', 9, 9),
(78, 1, 3, 30, 59, 1, 1, 500.00, NULL, '2025-04-21 03:52:19', '2025-04-21 03:52:23', 9, 9),
(79, 1, 14, 30, 59, 1, 1, 500.00, NULL, '2025-04-21 03:52:20', '2025-04-21 03:52:23', 9, 9),
(80, 46, 5, 31, 60, 1, 1, 350.00, NULL, '2025-04-21 03:52:42', '2025-04-21 03:52:45', 9, 9),
(81, 46, 4, 31, 60, 1, 1, 700.00, NULL, '2025-04-21 03:52:43', '2025-04-21 03:52:45', 9, 9),
(82, 1, 1, 34, NULL, 1, 1, 400.00, NULL, '2025-05-17 15:49:40', '2025-05-17 15:49:40', 9, NULL),
(83, 1, 1, 36, 64, 1, 1, 400.00, NULL, '2025-05-21 15:50:38', '2025-05-21 16:00:37', 9, 9),
(84, 1, 3, 36, 64, 1, 1, 500.00, NULL, '2025-05-21 15:50:40', '2025-05-21 16:00:37', 9, 9),
(85, 1, 13, 36, 64, 1, 1, 400.00, NULL, '2025-05-21 15:50:41', '2025-05-21 16:00:37', 9, 9),
(86, 1, 1, 37, 65, 1, 1, 400.00, NULL, '2025-05-21 16:02:45', '2025-05-21 16:02:58', 9, 9),
(87, 46, 4, 37, 65, 1, 1, 700.00, NULL, '2025-05-21 16:02:46', '2025-05-21 16:02:58', 9, 9),
(88, 1, 3, 37, 65, 1, 1, 500.00, NULL, '2025-05-21 16:02:47', '2025-05-21 16:02:58', 9, 9),
(89, 46, 5, 33, 66, 1, 1, 350.00, NULL, '2025-05-21 16:03:16', '2025-05-21 16:03:28', 9, 9),
(90, 46, 4, 33, 66, 1, 1, 700.00, NULL, '2025-05-21 16:03:17', '2025-05-21 16:03:28', 9, 9),
(91, 46, 6, 33, 66, 1, 1, 355.00, NULL, '2025-05-21 16:03:18', '2025-05-21 16:03:28', 9, 9),
(92, 46, 6, 35, 67, 1, 1, 355.00, NULL, '2025-05-21 16:04:48', '2025-05-21 16:04:53', 9, 9),
(93, 46, 8, 35, 67, 1, 1, 450.00, NULL, '2025-05-21 16:04:49', '2025-05-21 16:04:53', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

DROP TABLE IF EXISTS `parties`;
CREATE TABLE IF NOT EXISTS `parties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vat_number` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('customer','supplier') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parties_created_by` (`created_by`),
  KEY `fk_parties_updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `vat_number`, `name`, `phone`, `email`, `address`, `type`, `is_default`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '0000000001', 'عميل افتراضي', '0000000000', 'default@example.com', NULL, 'customer', 0, '2025-03-11 15:11:34', '2025-03-13 18:24:54', NULL, 10),
(3, '12345', 'Atef Aql', '0547660005', NULL, 'Egypt', 'customer', 0, '2025-03-03 06:47:13', '2025-03-03 06:47:13', 10, NULL),
(4, '098766', 'Ali  Aql', '0547660005999', NULL, 'Egypt', 'customer', 0, '2025-03-03 08:55:10', '2025-03-03 08:55:10', 10, NULL),
(6, '111222339', 'Atef Aql', '05486768419', NULL, 'Egypt', 'customer', 0, '2025-03-11 16:33:16', '2025-03-13 18:17:41', 10, 10),
(7, '3465765437', 'gdhgd', '534673656', NULL, 'vzxcbvcbvmj,', 'customer', 0, '2025-05-25 17:38:59', '2025-05-25 17:38:59', 9, NULL),
(8, '422357423475', 'gxnnxnx', '4752875747', NULL, 'xnxnxbn', 'customer', 0, '2025-05-25 17:39:33', '2025-05-25 17:39:33', 9, NULL),
(9, '5452562356', 'Ahmed Ali Agmed', '6191616', NULL, 'Yamen', 'customer', 0, '2025-05-25 17:41:17', '2025-05-25 17:41:17', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `invoice_id` bigint UNSIGNED DEFAULT NULL,
  `payment_method` bigint UNSIGNED NOT NULL,
  `amount_from` decimal(10,2) DEFAULT NULL,
  `amount_to` decimal(10,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `status` tinyint NOT NULL,
  `from_account` bigint DEFAULT NULL,
  `to_account` bigint DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `invoice_id`, `payment_method`, `amount_from`, `amount_to`, `payment_date`, `status`, `from_account`, `to_account`, `note`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(42, 22, 53, 1, NULL, NULL, '2025-03-31 19:50:57', 1, NULL, NULL, 'سند سلفة', '2025-03-31 16:50:57', '2025-03-31 16:50:57', 9, NULL),
(43, 22, 54, 1, NULL, NULL, '2025-03-31 19:51:57', 1, NULL, NULL, 'سند سلفة', '2025-03-31 16:51:57', '2025-03-31 16:51:57', 9, NULL),
(44, 22, 55, 1, NULL, NULL, '2025-03-31 20:04:27', 1, NULL, NULL, 'سند سلفة', '2025-03-31 17:04:27', '2025-03-31 17:04:27', 9, NULL),
(45, 22, 56, 1, NULL, NULL, '2025-03-31 20:04:46', 1, NULL, NULL, 'سند سلفة', '2025-03-31 17:04:46', '2025-03-31 17:04:46', 9, NULL),
(46, 22, 57, 1, NULL, NULL, '2025-03-31 20:31:53', 1, NULL, NULL, 'سند سلفة', '2025-03-31 17:31:53', '2025-03-31 17:31:53', 9, NULL),
(47, 28, 58, 1, NULL, NULL, '2025-04-16 17:45:37', 1, NULL, NULL, 'سند سلفة', '2025-04-16 14:45:37', '2025-04-16 14:45:37', 14, NULL),
(48, 30, 59, 1, NULL, NULL, '2025-04-21 06:52:23', 1, NULL, NULL, 'سند سلفة', '2025-04-21 03:52:23', '2025-04-21 03:52:23', 9, NULL),
(49, 31, 60, 1, NULL, NULL, '2025-04-21 06:52:45', 1, NULL, NULL, 'سند سلفة', '2025-04-21 03:52:45', '2025-04-21 03:52:45', 9, NULL),
(50, 36, 62, 1, NULL, NULL, '2025-05-21 18:58:09', 1, NULL, NULL, 'سند سلفة', '2025-05-21 15:58:09', '2025-05-21 15:58:09', 9, NULL),
(51, 36, 63, 1, NULL, NULL, '2025-05-21 18:59:01', 1, NULL, NULL, 'سند سلفة', '2025-05-21 15:59:01', '2025-05-21 15:59:01', 9, NULL),
(52, 36, 64, 1, NULL, NULL, '2025-05-21 19:00:37', 1, NULL, NULL, 'سند سلفة', '2025-05-21 16:00:37', '2025-05-21 16:00:37', 9, NULL),
(53, 37, 65, 1, NULL, NULL, '2025-05-21 19:02:58', 1, NULL, NULL, 'سند سلفة', '2025-05-21 16:02:58', '2025-05-21 16:02:58', 9, NULL),
(54, 33, 66, 1, NULL, NULL, '2025-05-21 19:03:28', 1, NULL, NULL, 'سند سلفة', '2025-05-21 16:03:28', '2025-05-21 16:03:28', 9, NULL),
(55, 35, 67, 1, 1800.00, NULL, '2025-05-21 19:04:53', 1, NULL, NULL, 'سند سلفة', '2025-05-21 16:04:53', '2025-05-21 16:04:53', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اسم طريقة الدفع بالعربية',
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اسم طريقة الدفع بالإنجليزية',
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'كود فريد لطريقة الدفع',
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'أيقونة الطريقة',
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 إذا كانت مفعلة، 0 إذا غير مفعلة',
  `sort_order` int NOT NULL DEFAULT '0' COMMENT 'ترتيب الظهور',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_methods_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name_ar`, `name_en`, `code`, `icon`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'نقدي', 'Cash', 'cash', 'fa-money-bill-wave', 1, 1, '2025-05-03 06:55:51', '2025-05-03 06:55:51'),
(2, 'بطاقة ائتمان', 'Credit Card', 'credit_card', 'fa-credit-card', 1, 2, '2025-05-03 06:55:51', '2025-05-03 06:55:51'),
(3, 'مدى', 'Mada', 'mada', 'fa-credit-card', 1, 3, '2025-05-03 06:55:51', '2025-05-03 06:55:51'),
(4, 'تحويل بنكي', 'Bank Transfer', 'bank_transfer', 'fa-university', 1, 4, '2025-05-03 06:55:51', '2025-05-03 06:55:51'),
(5, 'سداد', 'Sadad', 'sadad', 'fa-money-check', 1, 5, '2025-05-03 06:55:51', '2025-05-03 06:55:51'),
(6, 'الدفع الآجل', 'Credit', 'credit', 'fa-calendar-plus', 1, 6, '2025-05-03 06:55:51', '2025-05-03 06:55:51'),
(7, 'محفظة إلكترونية', 'E-Wallet', 'e_wallet', 'fa-wallet', 1, 7, '2025-05-03 06:55:51', '2025-05-03 06:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'New Admin Role Description',
  `module` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'permission',
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `brief`, `module`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'create-new-permission', 'Insert new pwermissions to database', 'permissions', 9, 9, '2025-04-12 11:43:50', '2025-04-12 11:43:50', 1),
(2, 'edit-permission-info', 'Edit specific permission details', 'permissions', 9, 9, '2025-04-12 11:48:46', '2025-04-12 11:48:46', 1),
(3, 'destroy-permission-info', 'Delete all permission info from database', 'permissions', 9, 9, '2025-04-12 11:58:33', '2025-04-12 11:58:33', 1),
(4, 'display-permission-list', 'Display all permissions in the application as an indexed list', 'permissions', 9, 9, '2025-04-12 11:59:40', '2025-04-12 11:59:40', 1),
(5, 'get-permission-by-name', 'search for a permission with search query that matches permission name', 'permissions', 9, 9, '2025-04-12 12:19:28', '2025-04-12 12:19:28', 1),
(6, 'display-admins-list', 'display a complete list of admins registered in this application', 'admins', 9, 9, '2025-04-12 12:20:24', '2025-04-12 12:20:24', 1),
(7, 'edit-admin-info', 'Edit specific admin details', 'admins', 9, 9, '2025-04-12 12:21:22', '2025-04-12 12:21:22', 1),
(8, 'display-admin-info', 'Display an admin details like general info, roles, permissions ETC', 'admins', 9, 9, '2025-04-12 12:24:43', '2025-04-12 12:24:43', 1),
(9, 'create-new-admin-role', 'New Permission with no description', 'admin-roles', 9, 9, '2025-04-12 13:45:10', '2025-04-12 13:45:10', 1),
(10, 'edit-role-info', 'Edit and update a specific role info', 'admin-roles', 9, 9, '2025-04-12 17:31:10', '2025-04-12 17:31:10', 1),
(11, 'display-role-info', 'Display a specific role and related details', 'admin-roles', 9, 9, '2025-04-12 17:34:04', '2025-04-12 17:34:04', 1),
(12, 'destroy-role-info', 'Delete role from database and related info', 'admin-roles', 9, 9, '2025-04-12 17:40:25', '2025-04-12 17:40:25', 1),
(13, 'get-role-by-name', 'Search for a specific role according to name', 'admin-roles', 9, 9, '2025-04-12 17:41:59', '2025-04-12 17:41:59', 1),
(14, 'display-roles-list', 'Display all roles registered in the application in indexed list', 'admin-roles', 9, 9, '2025-04-12 17:43:45', '2025-04-12 17:43:45', 1),
(15, 'display-product-list', 'display products list', 'products', 9, 9, '2025-04-12 19:01:11', '2025-04-12 19:01:11', 1),
(16, 'create-new-product', 'New Permission with no description', 'products', 9, 9, '2025-04-12 19:01:41', '2025-04-12 19:01:41', 1),
(17, 'display-product-info', 'New Permission with no description', 'products', 9, 9, '2025-04-12 19:02:25', '2025-04-12 19:02:25', 1),
(18, 'edit-product-info', 'New Permission with no description', 'products', 9, 9, '2025-04-12 19:02:47', '2025-04-12 19:02:47', 1),
(19, 'destroy-product-info', 'New Permission with no description', 'products', 9, 9, '2025-04-12 19:03:21', '2025-04-12 19:03:21', 1),
(21, 'display-orders-list', 'New Permission with no description', 'orders', 9, 9, '2025-04-12 19:07:04', '2025-04-12 19:07:04', 1),
(22, 'display-order-info', 'New Permission with no description', 'orders', 9, 9, '2025-04-12 19:07:28', '2025-04-12 19:07:28', 1),
(23, 'create-new-order', 'New Permission with no description', 'orders', 9, 9, '2025-04-12 19:08:15', '2025-04-12 19:08:15', 1),
(24, 'destroy-order-info', 'New Permission with no description', 'orders', 9, 9, '2025-04-12 19:09:22', '2025-04-12 19:09:22', 1),
(25, 'edit-order-info', 'New Permission with no description', 'orders', 9, 9, '2025-04-12 19:09:40', '2025-04-12 19:09:40', 1),
(26, 'cancel-order', 'New Permission with no description', 'orders', 9, 9, '2025-04-12 19:10:38', '2025-04-12 19:10:38', 1),
(27, 'add-meals-to-orders', 'New Permission with no description', 'orders', 9, 9, '2025-04-13 02:43:52', '2025-04-13 02:43:52', 1),
(28, 'edit-order-meals', 'New Permission with no description', 'orders', 9, 9, '2025-04-13 02:44:19', '2025-04-13 02:44:19', 1),
(29, 'change-order-status', 'New Permission with no description', 'orders', 9, 9, '2025-04-13 02:45:50', '2025-04-13 02:45:50', 1),
(30, 'process-orders', 'New Permission with no description', 'orders', 9, 9, '2025-04-13 02:46:05', '2025-04-13 02:46:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `points_of_sale`
--

DROP TABLE IF EXISTS `points_of_sale`;
CREATE TABLE IF NOT EXISTS `points_of_sale` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `printer_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `printer_ip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `branch_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points_of_sale`
--

INSERT INTO `points_of_sale` (`id`, `name`, `code`, `location`, `printer_name`, `printer_ip`, `is_active`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'مبيعات الصالة الرئيسية 2', 'POS-002', 'first_floor', 'HP 1112', '192.168.8.21', 1, 1, NULL, NULL, '2025-05-09 18:22:50', '2025-05-09 18:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `tax` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT '1',
  `updated_by` bigint UNSIGNED DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `cost_price`, `sale_price`, `status`, `category_id`, `unit_id`, `tax`, `created_at`, `description`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, 'Kebab', 'product47.jpg', 300.00, 400.00, 1, 1, 1, 10, '2025-02-23 12:31:07', NULL, 1, 1, '2025-02-23 12:31:07'),
(3, 'Grilled Meat', 'product48.png', 300.00, 500.00, 1, 1, 1, 15, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10'),
(4, 'Coffee', 'product58.jpg', 300.00, 700.00, 1, 46, 1, 12, '2025-02-23 12:31:20', NULL, 1, 1, '2025-02-23 12:31:20'),
(5, 'Tea', 'product47.jpg', 300.00, 350.00, 1, 46, 1, 8, '2025-02-23 12:31:20', NULL, 1, 1, '2025-02-23 12:31:20'),
(6, 'Cappuccino', 'product48.png', 400.00, 355.00, 0, 46, 1, 70, '2025-02-23 12:54:47', NULL, 1, 10, '2025-02-23 16:29:53'),
(8, 'Espresso', 'product58.jpg', 300.00, 450.00, 1, 46, 1, 55, '2025-02-23 12:54:49', NULL, 1, 1, '2025-02-23 12:54:49'),
(13, 'Grilled Fish', 'product47.jpg', 300.00, 400.00, 1, 1, 1, 7, '2025-02-23 12:31:07', NULL, 1, 1, '2025-02-23 12:31:07'),
(14, 'Grilled Fish', 'product48.png', 300.00, 500.00, 1, 1, 1, 15, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10'),
(15, 'Grilled Fish', '123.jpg', 300.00, 500.00, 1, 1, 1, 10, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

DROP TABLE IF EXISTS `purchase_invoices`;
CREATE TABLE IF NOT EXISTS `purchase_invoices` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `supplier_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_ar` (`name_ar`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_ar`, `name_en`, `is_active`, `code`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'الرياض', 'Riyadh', 1, 'RY', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(2, 'مكة المكرمة', 'Makkah', 1, 'MK', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(3, 'المدينة المنورة', 'Madinah', 1, 'MD', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(4, 'القصيم', 'Qassim', 1, 'QS', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(5, 'الشرقية', 'Eastern Province', 1, 'EP', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(6, 'عسير', 'Asir', 1, 'AS', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(7, 'تبوك', 'Tabuk', 1, 'TB', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(8, 'حائل', 'Hail', 1, 'HL', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(9, 'الحدود الشمالية', 'Northern Borders', 1, 'NB', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(10, 'جازان', 'Jazan', 1, 'JZ', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(11, 'نجران', 'Najran', 1, 'NR', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(12, 'الباحة', 'Al Bahah', 1, 'BH', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9),
(13, 'الجوف', 'Al Jawf', 1, 'JF', '2025-05-05 13:33:21', '2025-05-05 13:33:21', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'New Admin Role Description',
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `brief`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'super-admin', 'Super-Admin: Top-tier admin role with full, unrestricted access & control over all system features, data, settings, and user management. Ultimate authority.', 9, 9, '2025-04-12 06:39:19', '2025-04-13 07:16:23', 1),
(3, 'cashier', 'New Role with no description', 9, 9, '2025-04-12 06:47:11', '2025-04-12 06:47:11', 1),
(4, 'chief', 'New Role with no description', 9, 9, '2025-04-12 06:48:08', '2025-04-12 06:48:08', 1),
(5, 'worker', 'New Role with no description', 9, 9, '2025-04-12 06:59:41', '2025-04-12 06:59:41', 1),
(6, 'accountant', 'New Role with no description', 9, 9, '2025-04-12 06:59:52', '2025-04-12 06:59:52', 1),
(7, 'fin', 'houjp', 9, 9, '2025-04-13 17:47:50', '2025-04-13 17:47:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 9, 9, '2025-04-13 10:58:30', '2025-04-13 10:58:30'),
(12, 1, 8, 9, 9, '2025-04-13 11:26:42', '2025-04-13 11:26:42'),
(13, 1, 12, 9, 9, '2025-04-13 11:28:26', '2025-04-13 11:28:26'),
(16, 1, 13, 9, 9, '2025-04-13 11:30:14', '2025-04-13 11:30:14'),
(18, 1, 6, 9, 9, '2025-04-13 13:06:55', '2025-04-13 13:06:55'),
(28, 1, 3, 9, 9, '2025-04-13 13:26:16', '2025-04-13 13:26:16'),
(37, 1, 5, 9, 9, '2025-04-13 13:40:29', '2025-04-13 13:40:29'),
(43, 1, 30, 9, 9, '2025-04-13 13:48:59', '2025-04-13 13:48:59'),
(44, 1, 25, 9, 9, '2025-04-13 13:50:39', '2025-04-13 13:50:39'),
(45, 1, 27, 9, 9, '2025-04-13 13:50:41', '2025-04-13 13:50:41'),
(46, 1, 29, 9, 9, '2025-04-13 13:50:47', '2025-04-13 13:50:47'),
(47, 7, 1, 9, 9, '2025-04-13 14:48:11', '2025-04-13 14:48:11'),
(48, 7, 4, 9, 9, '2025-04-13 14:48:15', '2025-04-13 14:48:15'),
(49, 3, 21, 9, 9, '2025-04-13 14:54:34', '2025-04-13 14:54:34'),
(50, 3, 22, 9, 9, '2025-04-13 14:54:35', '2025-04-13 14:54:35'),
(51, 3, 25, 9, 9, '2025-04-13 14:54:39', '2025-04-13 14:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `sales-session`
--

DROP TABLE IF EXISTS `sales-session`;
CREATE TABLE IF NOT EXISTS `sales-session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monybox_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `opening_balance` decimal(15,2) NOT NULL DEFAULT '0.00',
  `closing_balance` decimal(15,2) DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales-session`
--

INSERT INTO `sales-session` (`id`, `name`, `device_name`, `monybox_id`, `admin_id`, `opening_balance`, `closing_balance`, `start_time`, `end_time`, `status`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(11, 'sales-sessions2', NULL, 1, 1, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-05 19:25:22', 0, NULL, '2025-04-05 15:36:12', '2025-04-05 16:25:22', 9, 9),
(12, 'sales-sessions1', NULL, 2, 2, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-06 17:09:37', 0, NULL, '2025-04-05 15:45:12', '2025-04-06 14:09:37', 9, 9),
(13, 'sales-sessions3', NULL, 4, 14, 0.00, NULL, '2025-04-16 00:00:00', NULL, 1, 'Mourning shift - Cashier 3', '2025-04-16 14:09:33', '2025-04-16 14:09:33', 9, NULL),
(14, 'sales-sessions4', NULL, 1, 9, 0.00, NULL, '2025-04-21 07:30:00', '2025-05-15 14:15:07', 0, NULL, '2025-04-21 03:48:14', '2025-05-15 11:15:07', 9, 9),
(15, 'Session Name', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 3, 1, 0.00, NULL, '2025-05-22 17:14:00', NULL, 1, 'uuuu', '2025-05-15 11:14:39', '2025-05-15 11:14:39', 9, NULL),
(16, 'Session Name', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 1, 9, 90.00, NULL, '2025-05-14 17:15:00', NULL, 1, '\'Notes 5', '2025-05-15 11:15:40', '2025-05-15 11:15:40', 9, NULL),
(17, 'Session Name', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 2, 4, 66.00, NULL, '2025-05-21 17:45:00', NULL, 1, '\'Notes 5', '2025-05-21 11:46:11', '2025-05-21 11:46:11', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

DROP TABLE IF EXISTS `sales_invoices`;
CREATE TABLE IF NOT EXISTS `sales_invoices` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `order_sn` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint DEFAULT NULL,
  `vat_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vat_amount` decimal(10,2) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `payment_method` bigint UNSIGNED DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `order_id` bigint NOT NULL,
  `sales_session_id` bigint UNSIGNED DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `invoice_date` datetime DEFAULT NULL,
  `type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `invoice_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_number` (`invoice_number`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`id`, `order_sn`, `client_id`, `vat_number`, `vat_amount`, `due_date`, `payment_method`, `payment_date`, `order_id`, `sales_session_id`, `total_amount`, `amount`, `invoice_date`, `type`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `invoice_number`) VALUES
(53, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, NULL, 400.15, 400.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 16:50:56', '2025-03-31 16:50:56', 9, NULL, 'INV-202503-0001'),
(54, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, NULL, 900.15, 900.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 16:51:57', '2025-03-31 16:51:57', 9, NULL, 'INV-202503-0002'),
(55, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, NULL, 1600.15, 1600.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 17:04:24', '2025-03-31 17:04:24', 9, NULL, 'INV-202503-0003'),
(56, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, NULL, 1600.15, 1600.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 17:04:39', '2025-03-31 17:04:39', 9, NULL, 'INV-202503-0004'),
(57, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, NULL, 2100.15, 2100.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 17:31:53', '2025-03-31 17:31:53', 9, NULL, 'INV-202503-0005'),
(58, NULL, 1, '0000000001', 0.15, '2025-04-16', 1, '2025-04-16', 28, NULL, 1300.15, 1300.00, '2025-04-16 00:00:00', 'sales', 0, '2025-04-16 14:45:37', '2025-04-16 14:45:37', 14, NULL, 'INV-202504-0001'),
(59, NULL, 1, '0000000001', 0.15, '2025-04-21', 1, '2025-04-21', 30, NULL, 1800.15, 1800.00, '2025-04-21 00:00:00', 'sales', 0, '2025-04-21 03:52:23', '2025-04-21 03:52:23', 9, NULL, 'INV-202504-0002'),
(60, NULL, 1, '0000000001', 0.15, '2025-04-21', 1, '2025-04-21', 31, NULL, 1050.15, 1050.00, '2025-04-21 00:00:00', 'sales', 0, '2025-04-21 03:52:45', '2025-04-21 03:52:45', 9, NULL, 'INV-202504-0003'),
(61, NULL, 1, '0000000001', 195.00, '2025-05-21', 1, '2025-05-21', 36, NULL, 1495.00, 1300.00, '2025-05-21 00:00:00', 'sales', 1, '2025-05-21 15:54:54', '2025-05-21 15:54:54', 9, NULL, 'INV-202505-0001'),
(62, NULL, 1, '0000000001', 195.00, '2025-05-21', 1, '2025-05-21', 36, NULL, 1495.00, 1300.00, '2025-05-21 00:00:00', 'sales', 1, '2025-05-21 15:58:09', '2025-05-21 15:58:09', 9, NULL, 'INV-202505-0002'),
(63, NULL, 1, '0000000001', 195.00, '2025-05-21', 1, '2025-05-21', 36, NULL, 1495.00, 1300.00, '2025-05-21 00:00:00', 'sales', 1, '2025-05-21 15:59:01', '2025-05-21 15:59:01', 9, NULL, 'INV-202505-0003'),
(64, NULL, 1, '0000000001', 195.00, '2025-05-21', 1, '2025-05-21', 36, 16, 1495.00, 1300.00, '2025-05-21 00:00:00', 'sales', 1, '2025-05-21 16:00:37', '2025-05-21 16:00:37', 9, NULL, 'INV-202505-0004'),
(65, NULL, 1, '0000000001', 240.00, '2025-05-21', 1, '2025-05-21', 37, 16, 1840.00, 1600.00, '2025-05-21 00:00:00', 'sales', 1, '2025-05-21 16:02:58', '2025-05-21 16:02:58', 9, NULL, 'INV-202505-0005'),
(66, NULL, 1, '0000000001', 210.75, '2025-05-21', 1, '2025-05-21', 33, 16, 1615.75, 1405.00, '2025-05-21 00:00:00', 'sales', 1, '2025-05-21 16:03:28', '2025-05-21 16:03:28', 9, NULL, 'INV-202505-0006'),
(67, NULL, 1, '0000000001', 120.75, '2025-05-21', 1, '2025-05-21', 35, 16, 925.75, 805.00, '2025-05-21 00:00:00', 'sales', 1, '2025-05-21 16:04:53', '2025-05-21 16:04:53', 9, NULL, 'INV-202505-0007');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9eat4XLXc7QuolkMOhNK6dk5TEn68ytEwNKUFC87', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid1VoU3NNOHdxdGZ0YnJDaHBqWDl2NjdyblNpekZMRmVUb1hlamNNTiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NjoiaHR0cDovL3d3dy5jYXNoaWVyLmxvY2FsL2FkbWluL3VzZXJzL3Byb2ZpbGUvOSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vd3d3LmNhc2hpZXIubG9jYWwvYWRtaW4vdGF4ZXMvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O30=', 1748207043),
('c1gzqCn6bq0tFZbhkpcH5qIwQNuaOd1iikHvzKDN', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTGNiYkloZlloQUhWQTRLY3prcnBiNVZmNmhUR1Y5aElUSEZDbkhhbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NjoiaHR0cDovL3d3dy5jYXNoaWVyLmxvY2FsL2FkbWluL3VzZXJzL3Byb2ZpbGUvOSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vd3d3LmNhc2hpZXIubG9jYWwvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748234529);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `location` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'المنطقة/الزاوية',
  `is_occupied` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tax_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` decimal(10,4) NOT NULL,
  `tax_type` enum('PERCENTAGE','FIXED_AMOUNT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_inclusive` tinyint(1) DEFAULT '0' COMMENT 'Whether tax is included in the item price',
  `effective_from` date NOT NULL,
  `effective_to` date DEFAULT NULL,
  `gl_account_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'General Ledger account code for tax collection',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_code` (`tax_code`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `idx_tax_code` (`tax_code`),
  KEY `idx_effective_dates` (`effective_from`,`effective_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_groups`
--

DROP TABLE IF EXISTS `tax_groups`;
CREATE TABLE IF NOT EXISTS `tax_groups` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_code` (`group_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_group_details`
--

DROP TABLE IF EXISTS `tax_group_details`;
CREATE TABLE IF NOT EXISTS `tax_group_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tax_group_id` bigint UNSIGNED NOT NULL,
  `tax_id` bigint UNSIGNED NOT NULL,
  `display_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_tax_in_group` (`tax_group_id`,`tax_id`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

DROP TABLE IF EXISTS `timezones`;
CREATE TABLE IF NOT EXISTS `timezones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tz_value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tz_group` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id`, `name_en`, `name_ar`, `tz_value`, `tz_group`, `created_at`, `updated_at`) VALUES
(1, 'Midway', 'ميدواي', '(UTC-11:00)', 'Pacific', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(2, 'Niue', 'نيوي', '(UTC-11:00)', 'Pacific', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(3, 'Pago_Pago', 'باغو باغو', '(UTC-11:00)', 'Pacific', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(4, 'Adak', 'أداك', '(UTC-10:00)', 'America', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(5, 'Honolulu', 'هونولولو', '(UTC-10:00)', 'America', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(6, 'Johnston', 'جونستون', '(UTC-10:00)', 'America', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(7, 'Rarotonga', 'راروتونغا', '(UTC-10:00)', 'Pacific', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(8, 'Tahiti', 'تاتي', '(UTC-10:00)', 'Pacific', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(9, 'Marquesas', 'ماركيساس', '(UTC-09:30)', 'Pacific', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(10, 'Anchorage', 'انكorage', '(UTC-09:00)', 'America', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(11, 'Gambier', 'غانبير', '(UTC-09:00)', 'Pacific', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(12, 'Juneau', 'جونيو', '(UTC-09:00)', 'America', '2025-05-07 05:54:59', '2025-05-07 05:54:59'),
(13, 'Nome', 'نوم', '(UTC-09:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(14, 'Sitka', 'سيتكا', '(UTC-09:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(15, 'Yakutat', 'ياكتات', '(UTC-09:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(16, 'Dawson', 'داسون', '(UTC-08:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(17, 'Los_Angeles', 'لوس أنجلوس', '(UTC-08:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(18, 'Metlakatla', 'متلاكتلا', '(UTC-08:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(19, 'Pitcairn', 'بيت كيرن', '(UTC-08:00)', 'Pacific', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(20, 'Santa_Isabel', 'سانتا إيزابيل', '(UTC-08:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(21, 'Tijuana', 'تيجاوانا', '(UTC-08:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(22, 'Vancouver', 'فينكوان', '(UTC-08:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(23, 'Whitehorse', 'وايت هورس', '(UTC-08:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(24, 'Boise', 'بيوسي', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(25, 'Cambridge_Bay', 'كامبريدج باي', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(26, 'Chihuahua', 'شيكو', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(27, 'Creston', 'كاسترون', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(28, 'Dawson_Creek', 'داسون كريك', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(29, 'Denver', 'دنفر', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(30, 'Edmonton', 'إدمونتون', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(31, 'Hermosillo', 'هيرميسيلو', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(32, 'Inuvik', 'ينفيك', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(33, 'Mazatlan', 'مازاتلان', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(34, 'Ojinaga', 'أوجينا', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(35, 'Phoenix', 'فنيكس', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(36, 'Shiprock', 'شيبروك', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(37, 'Yellowknife', 'أويلنفاي', '(UTC-07:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(38, 'Bahia_Banderas', 'بيهيا باندراس', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(39, 'Belize', 'بيليز', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(40, 'North_Dakota', 'بيولا', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(41, 'Cancun', 'كانكون', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(42, 'North_Dakota', 'مركز شمال داكوتا', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(43, 'Chicago', 'شيكاغو', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(44, 'Costa_Rica', 'كosta Rica', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(45, 'Easter', 'إستير', '(UTC-06:00)', 'Pacific', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(46, 'El_Salvador', 'إل ساليفادور', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(47, 'Galapagos', 'Galapagos', '(UTC-06:00)', 'Pacific', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(48, 'Guatemala', 'غواتيمالا', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(49, 'Indiana', 'كونغ', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(50, 'Managua', 'ماناغا', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(51, 'Menominee', 'مانوميني', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(52, 'Merida', 'ميرايدا', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(53, 'Mexico_City', 'مكسيكو سيتي', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(54, 'Monterrey', 'مونترري', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(55, 'North_Dakota', 'نيو ساليم', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(56, 'Rainy_River', 'ريني رير', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(57, 'Rankin_Inlet', 'رانيكين إينلت', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(58, 'Regina', 'ريجينا', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(59, 'Resolute', 'ريزلوتي', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(60, 'Swift_Current', 'swift current', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(61, 'Tegucigalpa', 'تيغوسيغالبا', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(62, 'Indiana', 'تيل سيتي', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(63, 'Winnipeg', 'WINNIP', '(UTC-06:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(64, 'Atikokan', 'اتيكوكان', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(65, 'Bogota', 'بوغاتا', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(66, 'Cayman', 'كايمن', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(67, 'Detroit', 'ديتريت', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(68, 'Grand_Turk', 'جراند تورك', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(69, 'Guayaquil', 'غواياغيل', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(70, 'Havana', ' هافانا', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(71, 'Indiana', 'إندياناپوليس', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(72, 'Iqaluit', 'إقاليوت', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(73, 'Jamaica', 'جامايكا', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(74, 'Lima', 'ليما', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(75, 'Kentucky', 'لويسفيل', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(76, 'Indiana', 'مارنغو', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(77, 'Kentucky', 'مونتيكело', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(78, 'Montreal', 'مونتريال', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(79, 'Nassau', 'ناسو', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(80, 'New_York', 'نيويورك', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(81, 'Nipigon', 'نيپيجون', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(82, 'Panama', 'بنما', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(83, 'Pangnirtung', 'PNG', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(84, 'Indiana', 'بيترسبورغ', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(85, 'Port-au-Prince', 'بورت-أو-برينس', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(86, 'Thunder_Bay', 'ثوندر باي', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(87, 'Toronto', 'تورنتو', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(88, 'Indiana', 'فييفاي', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(89, 'Indiana', 'فيننس', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(90, 'Indiana', 'WINMAC', '(UTC-05:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(91, 'Caracas', 'كاراكاس', '(UTC-04:30)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(92, 'Anguilla', 'انغويليا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(93, 'Antigua', 'انتيغوا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(94, 'Aruba', 'اروبا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(95, 'Asuncion', 'اسانكون', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(96, 'Barbados', 'باربادوس', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(97, 'Bermuda', 'برمودا', '(UTC-04:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(98, 'Blanc-Sablon', 'بلانك سابلون', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(99, 'Boa_Vista', 'بوا فيستا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(100, 'Campo_Grande', 'كامبو غراند', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(101, 'Cuiaba', 'كويابا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(102, 'Curacao', 'كوراكو', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(103, 'Dominica', 'دومينيكا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(104, 'Eirunepe', 'إيرنيبه', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(105, 'Glace_Bay', 'גלيس باي', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(106, 'Goose_Bay', 'غوست باي', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(107, 'Grenada', 'grenada', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(108, 'Guadeloupe', 'غوادلوبيه', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(109, 'Guyana', 'غيانا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(110, 'Halifax', 'هالفاكس', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(111, 'Kralendijk', 'كرالينديك', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(112, 'La_Paz', 'لا پاز', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(113, 'Lower_Princes', 'لوور برنسز', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(114, 'Manaus', 'ماناوس', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(115, 'Marigot', 'ماريجو', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(116, 'Martinique', 'مارينيكي', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(117, 'Moncton', 'مونكتون', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(118, 'Montserrat', 'مونتسرت', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(119, 'Palmer', 'بالميير', '(UTC-04:00)', 'Antarctica', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(120, 'Port_of_Spain', 'بورت', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(121, 'Porto_Velho', 'بورتو فيله', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(122, 'Puerto_Rico', 'بورت ريو', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(123, 'Rio_Branco', 'ريو براanco', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(124, 'Santiago', 'سانتياغو', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(125, 'Santo_Domingo', 'سانتو دومينغو', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(126, 'St_Barthelemy', 'ست بارثليمي', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(127, 'St_Kitts', 'ست كيتز', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(128, 'St_Lucia', 'ست لوسيا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(129, 'St_Thomas', 'ست توماس', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(130, 'St_Vincent', 'ست فينسنت', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(131, 'Thule', 'ثول', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(132, 'Tortola', 'تورتولا', '(UTC-04:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(133, 'St_Johns', 'ست Johns', '(UTC-03:30)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(134, 'Araguaina', 'أراغوانا', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(135, 'Bahia', 'باها', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(136, 'Belem', 'بيليم', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(137, 'Argentina', 'بوينوس أيريس', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(138, 'Argentina', 'كاتماركا', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(139, 'Cayenne', 'كاييني', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(140, 'Argentina', 'كودوبا', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(141, 'Fortaleza', 'فورتaleza', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(142, 'Godthab', 'غوثراب', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(143, 'Argentina', 'جوجوي', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(144, 'Argentina', 'لا ريوجا', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(145, 'Maceio', 'ماسيو', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(146, 'Argentina', 'مندوغا', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(147, 'Miquelon', 'ميكيلون', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(148, 'Montevideo', 'مونتيفيديو', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(149, 'Paramaribo', '.Paramaribo', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(150, 'Recife', 'ريفيه', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(151, 'Argentina', 'ريو غالاغوس', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(152, 'Rothera', 'روثريرا', '(UTC-03:00)', 'Antarctica', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(153, 'Argentina', 'سالتا', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(154, 'Argentina', 'سان جوان', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(155, 'Argentina', 'سان ليوس', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(156, 'Santarem', 'سانترام', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(157, 'Sao_Paulo', 'ساو پاولو', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(158, 'Stanley', 'ستانلي', '(UTC-03:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(159, 'Argentina', 'توكمان', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(160, 'Argentina', 'وشايا', '(UTC-03:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(161, 'Noronha', 'نورونها', '(UTC-02:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(162, 'South_Georgia', 'غريغوري', '(UTC-02:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(163, 'South_Georgia', 'غريغوري', '(UTC-02:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(164, 'Cape_Verde', 'الرأس الأخضر', '(UTC-01:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(165, 'Scoresbysund', 'سكورسبايسوند', '(UTC-01:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(166, 'Abidjan', 'أبيدجان', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(167, 'Accra', 'أكرا', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(168, 'Bamako', 'باماكو', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(169, 'Banjul', 'بانجول', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(170, 'Bissau', 'بيساو', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(171, 'Canary', 'جزر الكناري', '(UTC+00:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(172, 'Casablanca', 'الدار البيضاء', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(173, 'Conakry', 'كوناكري', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(174, 'Dakar', 'داكار', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(175, 'Danmarkshavn', 'دانماركشافن', '(UTC+00:00)', 'America', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(176, 'Dublin', 'دبلن', '(UTC+00:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(177, 'El_Aaiun', 'العيون', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(178, 'Faroe', 'فارو', '(UTC+00:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(179, 'Freetown', 'فريتاون', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(180, 'Guernsey', 'غيرنسي', '(UTC+00:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(181, 'Isle_of_Man', 'جزيرة مان', '(UTC+00:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(182, 'Jersey', 'جيرسي', '(UTC+00:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(183, 'Lisbon', 'لشبونة', '(UTC+00:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(184, 'Lome', 'لومي', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(185, 'London', 'لندن', '(UTC+00:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(186, 'Madeira', 'ماديرا', '(UTC+00:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(187, 'Monrovia', 'مونروفيا', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(188, 'Nouakchott', 'نواكشوط', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(189, 'Ouagadougou', 'واجادوجو', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(190, 'Reykjavik', 'ريكيافيك', '(UTC+00:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(191, 'Sao_Tome', 'ساو تومي', '(UTC+00:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(192, 'St_Helena', 'سانت هيلانة', '(UTC+00:00)', 'Atlantic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(193, 'UTC', 'التوقيت العالمي', '(UTC+00:00)', 'UTC', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(194, 'Algiers', 'الجزائر', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(195, 'Amsterdam', 'أمستردام', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(196, 'Andorra', 'أندورا', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(197, 'Bangui', 'bangui', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(198, 'Belgrade', 'بلغراد', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(199, 'Berlin', 'برلين', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(200, 'Bratislava', 'براتيسلافا', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(201, 'Brazzaville', 'برازواي', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(202, 'Brussels', 'بروكسل', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(203, 'Budapest', ' بودابست', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(204, 'Busingen', ' بوسينغ', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(205, 'Ceuta', 'Ceuta', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(206, 'Copenhagen', ' كوبنهاغن', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(207, 'Douala', ' دوولا', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(208, 'Gibraltar', ' جيبرالتار', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(209, 'Kinshasa', ' كينشاسا', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(210, 'Lagos', ' لاغوس', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(211, 'Libreville', ' ليفريبل', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(212, 'Ljubljana', ' لوبلاجيانا', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(213, 'Longyearbyen', ' لونيربيرن', '(UTC+01:00)', 'Arctic', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(214, 'Luanda', 'لواندا', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(215, 'Luxembourg', 'لوكسمبورغ', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(216, 'Madrid', 'مدريد', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(217, 'Malabo', 'مالابو', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(218, 'Malta', 'مالطا', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(219, 'Monaco', 'موناكو', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(220, 'Ndjamena', 'ندجامينا', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(221, 'Niamey', 'نيامي', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(222, 'Oslo', 'أوسلو', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(223, 'Paris', 'باريس', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(224, 'Podgorica', 'بوغوريكا', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(225, 'Porto-Novo', 'بورتو-نو', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(226, 'Prague', 'براغ', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(227, 'Rome', 'روما', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(228, 'San_Marino', 'سان مارينو', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(229, 'Sarajevo', 'ساراجوو', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(230, 'Skopje', 'سكوبجيه', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(231, 'Stockholm', 'ستوكهولم', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(232, 'Tirane', 'تياران', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(233, 'Tripoli', 'تريبولي', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(234, 'Tunis', 'تونس', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(235, 'Vaduz', 'فادوز', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(236, 'Vatican', 'فاتيكان', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(237, 'Vienna', 'فيينا', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(238, 'Warsaw', 'وارسو', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(239, 'Windhoek', 'Windhoek', '(UTC+01:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(240, 'Zagreb', 'zagreb', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(241, 'Zurich', 'زوريخ', '(UTC+01:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(242, 'Athens', 'أثينا', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(243, 'Beirut', 'بيروت', '(UTC+02:00)', 'Asia', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(244, 'Blantyre', 'بلانتير', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(245, 'Bucharest', 'بوشتر', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(246, 'Bujumbura', 'بوومبورا', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(247, 'Cairo', 'كairo', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(248, 'Chisinau', 'تشيناو', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(249, 'Damascus', 'داماسك', '(UTC+02:00)', 'Asia', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(250, 'Gaborone', 'غابورون', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(251, 'Gaza', 'غازا', '(UTC+02:00)', 'Asia', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(252, 'Harare', 'هاارار', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(253, 'Hebron', 'هبرون', '(UTC+02:00)', 'Asia', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(254, 'Helsinki', 'هيلسكي', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:00', '2025-05-07 05:55:00'),
(255, 'Istanbul', 'اسطنبول', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(256, 'Jerusalem', 'جيرسولوم', '(UTC+02:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(257, 'Johannesburg', 'ジョهانسبرج', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(258, 'Kiev', 'كيف', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(259, 'Kigali', 'كيلي', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(260, 'Lubumbashi', 'لوومباشي', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(261, 'Lusaka', 'لوسكا', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(262, 'Maputo', 'مابوتو', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(263, 'Mariehamn', 'ماري هامن', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(264, 'Maseru', 'ماسيرا', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(265, 'Mbabane', 'مباباني', '(UTC+02:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(266, 'Nicosia', 'نيكوسيا', '(UTC+02:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(267, 'Riga', 'ريغا', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(268, 'Simferopol', 'سيمفارولو', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(269, 'Sofia', 'سويفا', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(270, 'Tallinn', 'تالين', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(271, 'Uzhgorod', 'وژغود', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(272, 'Vilnius', 'فيلنيوس', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(273, 'Zaporozhye', 'زابوروزييه', '(UTC+02:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(274, 'Addis_Ababa', 'أديس أبابا', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(275, 'Aden', 'ادن', '(UTC+03:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(276, 'Amman', 'عمان', '(UTC+03:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(277, 'Antananarivo', 'انتاناناريفو', '(UTC+03:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(278, 'Asmara', 'أسمارا', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(279, 'Baghdad', 'بغداد', '(UTC+03:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(280, 'Bahrain', 'بحرين', '(UTC+03:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(281, 'Comoro', 'كومورو', '(UTC+03:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(282, 'Dar_es_Salaam', 'دار إس سالام', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(283, 'Djibouti', 'جيبوتي', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(284, 'Juba', 'جوبا', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(285, 'Kaliningrad', 'كالينينراد', '(UTC+03:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(286, 'Kampala', 'كامبلا', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(287, 'Khartoum', 'كارتووم', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(288, 'Kuwait', 'كويت', '(UTC+03:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(289, 'Mayotte', 'مايتوت', '(UTC+03:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(290, 'Minsk', 'مينسك', '(UTC+03:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(291, 'Mogadishu', 'موجاديشو', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(292, 'Moscow', 'موسكو', '(UTC+03:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(293, 'Nairobi', 'نيروبي', '(UTC+03:00)', 'Africa', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(294, 'Qatar', 'قطر', '(UTC+03:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(295, 'Riyadh', 'ريالدا', '(UTC+03:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(296, 'Syowa', 'سيووا', '(UTC+03:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(297, 'Tehran', 'تهران', '(UTC+03:30)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(298, 'Baku', 'باكو', '(UTC+04:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(299, 'Dubai', 'دبي', '(UTC+04:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(300, 'Mahe', 'مايه', '(UTC+04:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(301, 'Mauritius', 'موريتانيا', '(UTC+04:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(302, 'Muscat', 'ماسكت', '(UTC+04:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(303, 'Reunion', 'ريونيون', '(UTC+04:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(304, 'Samara', 'سامارا', '(UTC+04:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(305, 'Tbilisi', 'تبيليسي', '(UTC+04:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(306, 'Volgograd', 'ولغograd', '(UTC+04:00)', 'Europe', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(307, 'Yerevan', 'يريفان', '(UTC+04:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(308, 'Kabul', 'كابول', '(UTC+04:30)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(309, 'Aqtau', 'أكتاو', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(310, 'Aqtobe', 'أكتوب', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(311, 'Ashgabat', 'اشغابات', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(312, 'Dushanbe', 'دشنبه', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(313, 'Karachi', 'كارachi', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(314, 'Kerguelen', 'كيرويلن', '(UTC+05:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(315, 'Maldives', 'مالديف', '(UTC+05:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(316, 'Mawson', 'ماوسون', '(UTC+05:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(317, 'Oral', 'أورال', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(318, 'Samarkand', 'ساماركند', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(319, 'Tashkent', 'تاشكنت', '(UTC+05:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(320, 'Colombo', 'كولombo', '(UTC+05:30)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(321, 'Kolkata', 'كولombo', '(UTC+05:30)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(322, 'Kathmandu', 'كولombo', '(UTC+05:45)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(323, 'Almaty', 'الالماتي', '(UTC+06:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(324, 'Bishkek', 'bishkek', '(UTC+06:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(325, 'Bishkek', 'bishkek', '(UTC+06:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(326, 'Chagos', 'تشاغوس', '(UTC+06:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(327, 'Dhaka', 'دكا', '(UTC+06:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(328, 'Qyzylorda', 'قيزيلوردا', '(UTC+06:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(329, 'Thimphu', 'تيمفو', '(UTC+06:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(330, 'Vostok', 'فوستوك', '(UTC+06:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(331, 'Yekaterinburg', 'يكاترينبورغ', '(UTC+06:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(332, 'Cocos', 'جزر كوكوس', '(UTC+06:30)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(333, 'Rangoon', 'رانغون', '(UTC+06:30)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(334, 'Bangkok', 'بانكوك', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(335, 'Christmas', 'جزيرة الكريسماس', '(UTC+07:00)', 'Indian', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(336, 'Davis', 'ديفيس', '(UTC+07:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(337, 'Ho_Chi_Minh', 'هو تشي منه', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(338, 'Hovd', 'هوفد', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(339, 'Jakarta', 'جاكرتا', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(340, 'Novokuznetsk', 'نوفوكوزنتسك', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(341, 'Novosibirsk', 'نوفوسيبرسك', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(342, 'Omsk', 'أومسك', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(343, 'Phnom_Penh', 'بنوم بنه', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(344, 'Pontianak', 'بونتياناك', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(345, 'Vientiane', 'فيينتيان', '(UTC+07:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(346, 'Brunei', 'بروناي', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(347, 'Casey', 'كيسي', '(UTC+08:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(348, 'Choibalsan', 'تشويبالسان', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(349, 'Chongqing', 'تشونغتشينغ', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(350, 'Harbin', 'هاربين', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(351, 'Hong_Kong', 'هونغ كونغ', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(352, 'Kashgar', 'كاشغر', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(353, 'Krasnoyarsk', 'كراسنويارسك', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(354, 'Kuala_Lumpur', 'كوالالمبور', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(355, 'Kuching', 'كوتشينغ', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(356, 'Macau', 'ماكاو', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(357, 'Makassar', 'ماكاسار', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(358, 'Manila', 'مانيلا', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(359, 'Perth', 'بيرث', '(UTC+08:00)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(360, 'Shanghai', 'شنغهاي', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(361, 'Singapore', 'سنغافورة', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(362, 'Taipei', 'تايبيه', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(363, 'Ulaanbaatar', 'أولان باتور', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(364, 'Urumqi', 'أورومتشي', '(UTC+08:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(365, 'Eucla', 'يوكلا', '(UTC+08:45)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(366, 'Dili', 'ديلي', '(UTC+09:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(367, 'Irkutsk', 'إيركوتسك', '(UTC+09:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(368, 'Jayapura', 'جايا بورا', '(UTC+09:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(369, 'Palau', 'بالاو', '(UTC+09:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(370, 'Pyongyang', 'بيونغيانغ', '(UTC+09:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(371, 'Seoul', 'سيول', '(UTC+09:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(372, 'Tokyo', 'طوكيو', '(UTC+09:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(373, 'Adelaide', 'أديلايد', '(UTC+09:30)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(374, 'Broken_Hill', 'بروكن هيل', '(UTC+09:30)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(375, 'Darwin', 'داروين', '(UTC+09:30)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(376, 'Brisbane', 'بريسبان', '(UTC+10:00)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(377, 'Chuuk', 'تشوك', '(UTC+10:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(378, 'Currie', 'كوري', '(UTC+10:00)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(379, 'DumontDUrville', 'ديومون ديورفيل', '(UTC+10:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(380, 'Guam', 'غوام', '(UTC+10:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(381, 'Hobart', 'هوبارت', '(UTC+10:00)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(382, 'Khandyga', 'خانديغا', '(UTC+10:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(383, 'Lindeman', 'ليندمان', '(UTC+10:00)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(384, 'Melbourne', 'ملبورن', '(UTC+10:00)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(385, 'Port_Moresby', 'بورت موريسبي', '(UTC+10:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(386, 'Saipan', 'سايبان', '(UTC+10:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(387, 'Sydney', 'سيدني', '(UTC+10:00)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(388, 'Yakutsk', 'ياكوتسك', '(UTC+10:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(389, 'Lord_Howe', 'لورد هاو', '(UTC+10:30)', 'Australia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(390, 'Efate', 'إيفات', '(UTC+11:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(391, 'Guadalcanal', 'غوادالكانال', '(UTC+11:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(392, 'Kosrae', 'كوسراي', '(UTC+11:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(393, 'Macquarie', 'ماكواري', '(UTC+11:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(394, 'Noumea', 'نومي', '(UTC+11:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(395, 'Pohnpei', 'بونبي', '(UTC+11:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(396, 'Sakhalin', 'ساخالين', '(UTC+11:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(397, 'Ust-Nera', 'أوست-نيرا', '(UTC+11:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(398, 'Vladivostok', 'فلاديفوستوك', '(UTC+11:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(399, 'Norfolk', 'نورفولك', '(UTC+11:30)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(400, 'Anadyr', 'أنادير', '(UTC+12:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(401, 'Auckland', 'أوكلاند', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(402, 'Fiji', 'فيجي', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(403, 'Funafuti', 'فونافوتي', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(404, 'Kamchatka', 'كامشاتكا', '(UTC+12:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(405, 'Kwajalein', 'كواجالين', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(406, 'Magadan', 'ماغادان', '(UTC+12:00)', 'Asia', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(407, 'Majuro', 'ماجورو', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(408, 'McMurdo', 'ماكموردو', '(UTC+12:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(409, 'Nauru', 'ناورو', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(410, 'South_Pole', 'القطب الجنوبي', '(UTC+12:00)', 'Antarctica', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(411, 'Tarawa', 'تاراوا', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(412, 'Wake', 'ويك', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(413, 'Wallis', 'واليس', '(UTC+12:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(414, 'Chatham', 'تشاتام', '(UTC+12:45)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(415, 'Apia', 'أبيا', '(UTC+13:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(416, 'Enderbury', 'إندربيري', '(UTC+13:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(417, 'Fakaofo', 'فاكاوفو', '(UTC+13:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(418, 'Tongatapu', 'تونغاتابو', '(UTC+13:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01'),
(419, 'Kiritimati', 'كيريتيمايتي', '(UTC+14:00)', 'Pacific', '2025-05-07 05:55:01', '2025-05-07 05:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brief` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `brief`, `short_name`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'kg', 'meter', 'm', 1, NULL, NULL, NULL, NULL),
(2, 'Piece', 'Piece', 'pcs', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taxes`
--
ALTER TABLE `taxes`
  ADD CONSTRAINT `taxes_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `taxes_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tax_group_details`
--
ALTER TABLE `tax_group_details`
  ADD CONSTRAINT `tax_group_details_ibfk_1` FOREIGN KEY (`tax_group_id`) REFERENCES `tax_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tax_group_details_ibfk_2` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
