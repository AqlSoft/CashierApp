-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2025 at 03:13 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_profiles`
--

INSERT INTO `admin_profiles` (`id`, `admin_id`, `first_name`, `last_name`, `country`, `image`, `city`, `address`, `phone`, `created_at`, `updated_at`, `id_number`) VALUES
(1, 1, 'Yosra  Ziad', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '104528736'),
(2, 2, 'AtefAql', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '1025369874'),
(3, 3, 'AtefAql1', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '1025436985'),
(4, 4, 'AtefAql102', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '1254369870'),
(5, 5, 'ali atef', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2488802541'),
(6, 6, 'ali atef9', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2411158639'),
(7, 7, 'yoyo', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2401236987'),
(8, 8, 'yoyo11', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2566663987'),
(9, 9, 'Yousra_20', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2586973654'),
(10, 10, 'Yousra_2099', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2563436666'),
(11, 11, 'Yousra_2', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-11 13:30:18', '2355114689'),
(12, 12, 'Mohamed', 'Ali Abdelzaher', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:14:54', '2025-04-11 13:30:18', '2488802741'),
(13, 13, 'Mokhtar', 'Nazmi', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:17:16', '2025-04-07 16:17:16', NULL),
(14, 14, 'Ahmed', 'Algammal', NULL, NULL, NULL, NULL, NULL, '2025-04-16 17:00:50', '2025-04-16 17:00:50', '2553641936');

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
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'كود الفرع (فريد)',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اسم الفرع بالعربية',
  `branch_type` enum('main','sub','virtual') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main' COMMENT 'نوع الفرع',
  `tax_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الرقم الضريبي',
  `commercial_register` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'السجل التجاري',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL COMMENT 'خط العرض',
  `longitude` decimal(11,8) DEFAULT NULL COMMENT 'خط الطول',
  `currency_id` int UNSIGNED NOT NULL,
  `timezone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Asia/Riyadh',
  `fiscal_start_date` date DEFAULT NULL COMMENT 'بداية السنة المالية',
  `fiscal_end_date` date DEFAULT NULL COMMENT 'نهاية السنة المالية',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_online` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'متصل بالنظام المركزي',
  `opening_date` date NOT NULL COMMENT 'تاريخ الافتتاح',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='فروع المطاعم';

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
  `name_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_ar` (`name_ar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'AqlSof', '00001122334455', '0001238760', '0588454263580', 'logo-icon.png', '2025-03-27 20:41:14', '2025-03-30 15:38:21', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(16, 'default', '{\"uuid\":\"235f9bdd-eb76-48b1-a0a7-eaecce3f6bb1\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:30;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745218382, 1745218382);

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
  `POS` bigint UNSIGNED DEFAULT NULL,
  `shift_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `processing_by` bigint UNSIGNED DEFAULT NULL,
  `processing_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parties_created_by` (`created_by`),
  KEY `fk_parties_updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_sn`, `order_date`, `customer_id`, `notes`, `created_at`, `updated_at`, `deleted_at`, `status`, `delivery_method`, `wait_no`, `POS`, `shift_id`, `created_by`, `updated_by`, `processing_by`, `processing_time`) VALUES
(16, '00000001', '2025-03-18 00:00:00', 1, NULL, '2025-03-18 16:15:01', '2025-03-29 19:11:08', NULL, 3, 1, 'OUT0001', NULL, 0, 10, 10, NULL, NULL),
(17, '00000002', '2025-03-18 00:00:00', 1, NULL, '2025-03-18 16:20:59', '2025-03-18 16:37:54', NULL, 2, NULL, NULL, NULL, 0, 10, 10, NULL, NULL),
(18, '00000003', '2025-03-22 23:02:26', 1, NULL, '2025-03-22 20:02:26', '2025-03-31 12:10:13', NULL, 3, 1, 'OUT0003', NULL, 0, 10, 9, NULL, NULL),
(19, '00000004', '2025-03-23 19:51:25', 1, NULL, '2025-03-23 16:51:25', '2025-03-31 16:06:32', NULL, 3, NULL, 'OUT0004', NULL, 0, 10, 9, NULL, NULL),
(20, '00000005', '2025-03-23 20:23:07', 1, NULL, '2025-03-23 17:23:07', '2025-04-05 15:57:09', NULL, 2, 1, 'OUT0005', NULL, 0, 10, 9, NULL, NULL),
(21, '00000006', '2025-03-23 20:58:03', 1, NULL, '2025-03-23 17:58:03', '2025-03-23 17:58:03', NULL, 2, NULL, 'new', NULL, 0, 10, NULL, NULL, NULL),
(22, '00000007', '2025-03-23 21:07:02', 1, NULL, '2025-03-23 18:07:02', '2025-04-20 07:05:43', NULL, 6, NULL, 'OUT0007', NULL, 0, 10, 14, 14, '2025-04-20 10:05:34'),
(23, '00000008', '2025-03-23 21:08:51', 1, NULL, '2025-03-23 18:08:51', '2025-03-23 18:26:38', NULL, 2, NULL, 'new', NULL, 0, 10, 10, NULL, NULL),
(24, '00000009', '2025-03-28 21:03:19', 1, NULL, '2025-03-28 18:03:19', '2025-03-30 18:27:02', NULL, 2, NULL, 'new', NULL, 0, 10, 10, NULL, NULL),
(25, '00000010', '2025-03-29 22:08:08', 1, NULL, '2025-03-29 19:08:08', '2025-03-29 19:09:32', NULL, 3, 1, 'OUT0010', NULL, 0, 10, 10, NULL, NULL),
(26, '00000011', '2025-03-29 22:15:33', 1, NULL, '2025-03-29 19:15:33', '2025-03-29 19:15:54', NULL, 3, 1, 'OUT0011', NULL, 0, 10, 10, NULL, NULL),
(27, '00000012', '2025-03-29 22:17:14', 1, NULL, '2025-03-29 19:17:14', '2025-03-29 19:17:51', NULL, 3, 1, 'OUT0012', NULL, 0, 10, 10, NULL, NULL),
(28, '00000013', '2025-04-16 17:19:57', 1, NULL, '2025-04-16 14:19:57', '2025-04-20 08:50:45', NULL, 5, NULL, 'OUT0013', NULL, 13, 14, 14, 14, '2025-04-20 11:41:09'),
(29, '00000014', '2025-04-20 10:01:44', 1, NULL, '2025-04-20 07:01:44', '2025-04-20 07:01:44', NULL, 2, NULL, 'new', NULL, 13, 14, NULL, NULL, NULL),
(30, '00000015', '2025-04-21 06:52:16', 1, NULL, '2025-04-21 03:52:16', '2025-04-21 03:53:01', NULL, 4, NULL, '0015', NULL, 14, 9, 9, 9, '2025-04-21 06:53:01'),
(31, '00000016', '2025-04-21 06:52:39', 1, NULL, '2025-04-21 03:52:39', '2025-04-21 03:52:45', NULL, 3, NULL, '0016', NULL, 14, 9, 9, NULL, '2025-04-21 06:52:45'),
(32, '00000017', '2025-05-01 05:12:15', 1, NULL, '2025-05-01 02:12:15', '2025-05-01 02:12:15', NULL, 2, NULL, 'new', NULL, 14, 9, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(81, 46, 4, 31, 60, 1, 1, 700.00, NULL, '2025-04-21 03:52:43', '2025-04-21 03:52:45', 9, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `vat_number`, `name`, `phone`, `email`, `address`, `type`, `is_default`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '0000000001', 'عميل افتراضي', '0000000000', 'default@example.com', NULL, 'customer', 0, '2025-03-11 15:11:34', '2025-03-13 18:24:54', NULL, 10),
(3, '12345', 'Atef Aql', '0547660005', NULL, 'Egypt', 'customer', 0, '2025-03-03 06:47:13', '2025-03-03 06:47:13', 10, NULL),
(4, '098766', 'Ali  Aql', '0547660005999', NULL, 'Egypt', 'customer', 0, '2025-03-03 08:55:10', '2025-03-03 08:55:10', 10, NULL),
(6, '111222339', 'Atef Aql', '05486768419', NULL, 'Egypt', 'customer', 0, '2025-03-11 16:33:16', '2025-03-13 18:17:41', 10, 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(49, 31, 60, 1, NULL, NULL, '2025-04-21 06:52:45', 1, NULL, NULL, 'سند سلفة', '2025-04-21 03:52:45', '2025-04-21 03:52:45', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اسم طريقة الدفع بالعربية',
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اسم طريقة الدفع بالإنجليزية',
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'كود فريد لطريقة الدفع',
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'أيقونة الطريقة',
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
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printer_name` bigint UNSIGNED NOT NULL,
  `printer_ip` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `branch_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `quantity` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
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

INSERT INTO `products` (`id`, `name`, `image`, `cost_price`, `sale_price`, `quantity`, `status`, `category_id`, `unit_id`, `created_at`, `description`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, 'Kebab', 'product47.jpg', 300.00, 400.00, 4, 1, 1, 1, '2025-02-23 12:31:07', NULL, 1, 1, '2025-02-23 12:31:07'),
(3, 'Grilled Meat', 'product48.png', 300.00, 500.00, 4, 1, 1, 1, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10'),
(4, 'Coffee', 'product58.jpg', 300.00, 700.00, 4, 1, 46, 1, '2025-02-23 12:31:20', NULL, 1, 1, '2025-02-23 12:31:20'),
(5, 'Tea', 'product47.jpg', 300.00, 350.00, 4, 1, 46, 1, '2025-02-23 12:31:20', NULL, 1, 1, '2025-02-23 12:31:20'),
(6, 'Cappuccino', 'product48.png', 400.00, 355.00, 4, 0, 46, 1, '2025-02-23 12:54:47', NULL, 1, 10, '2025-02-23 16:29:53'),
(8, 'Espresso', 'product58.jpg', 300.00, 450.00, 4, 1, 46, 1, '2025-02-23 12:54:49', NULL, 1, 1, '2025-02-23 12:54:49'),
(13, 'Grilled Fish', 'product47.jpg', 300.00, 400.00, 4, 1, 1, 1, '2025-02-23 12:31:07', NULL, 1, 1, '2025-02-23 12:31:07'),
(14, 'Grilled Fish', 'product48.png', 300.00, 500.00, 4, 1, 1, 1, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10'),
(15, 'Grilled Fish', '123.jpg', 300.00, 500.00, 4, 1, 1, 1, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10');

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
  `name_ar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`id`, `order_sn`, `client_id`, `vat_number`, `vat_amount`, `due_date`, `payment_method`, `payment_date`, `order_id`, `total_amount`, `amount`, `invoice_date`, `type`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `invoice_number`) VALUES
(53, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, 400.15, 400.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 16:50:56', '2025-03-31 16:50:56', 9, NULL, 'INV-202503-0001'),
(54, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, 900.15, 900.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 16:51:57', '2025-03-31 16:51:57', 9, NULL, 'INV-202503-0002'),
(55, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, 1600.15, 1600.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 17:04:24', '2025-03-31 17:04:24', 9, NULL, 'INV-202503-0003'),
(56, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, 1600.15, 1600.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 17:04:39', '2025-03-31 17:04:39', 9, NULL, 'INV-202503-0004'),
(57, NULL, 1, '0000000001', 0.15, '2025-03-31', 1, '2025-03-31', 22, 2100.15, 2100.00, '2025-03-31 00:00:00', 'sales', 0, '2025-03-31 17:31:53', '2025-03-31 17:31:53', 9, NULL, 'INV-202503-0005'),
(58, NULL, 1, '0000000001', 0.15, '2025-04-16', 1, '2025-04-16', 28, 1300.15, 1300.00, '2025-04-16 00:00:00', 'sales', 0, '2025-04-16 14:45:37', '2025-04-16 14:45:37', 14, NULL, 'INV-202504-0001'),
(59, NULL, 1, '0000000001', 0.15, '2025-04-21', 1, '2025-04-21', 30, 1800.15, 1800.00, '2025-04-21 00:00:00', 'sales', 0, '2025-04-21 03:52:23', '2025-04-21 03:52:23', 9, NULL, 'INV-202504-0002'),
(60, NULL, 1, '0000000001', 0.15, '2025-04-21', 1, '2025-04-21', 31, 1050.15, 1050.00, '2025-04-21 00:00:00', 'sales', 0, '2025-04-21 03:52:45', '2025-04-21 03:52:45', 9, NULL, 'INV-202504-0003');

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
('3Gtagrgxww1mIB6JWSmiaJysPfLzbTIB9yyd6gty', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMlp6V0t6RGVTcmxXdkxsb0U1RXE0dk5XS3RsTWRCbVdsaXc1TWhDNSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovL3d3dy5jYXNoaWVyLmxvY2FsL2FkbWluL3JvbGVzL2xpc3QiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cDovL3d3dy5jYXNoaWVyLmxvY2FsL2FkbWluL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjY6ImxvY2FsZSI7czoyOiJhciI7fQ==', 1746423543),
('LFttlikAJ8zjfNQXvQ4cFko6FKcysU4UtJWf7eaA', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOW9uSmRpMDBMQ1FJd2RkVFhIUFY2ZXZ3RUxlTFE3R3ltZ2pNMDRsbyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cDovL3d3dy5jYXNoaWVyLmxvY2FsL2FkbWluL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vd3d3LmNhc2hpZXIubG9jYWwvYWRtaW4vcG9zL2luZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O3M6NjoibG9jYWxlIjtzOjI6ImFyIjt9', 1746457515);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
CREATE TABLE IF NOT EXISTS `shifts` (
  `id` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `monybox_id`, `admin_id`, `opening_balance`, `closing_balance`, `start_time`, `end_time`, `status`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(12, 2, 2, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-06 17:09:37', 0, NULL, '2025-04-05 15:45:12', '2025-04-06 14:09:37', 9, 9),
(11, 1, 1, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-05 19:25:22', 0, NULL, '2025-04-05 15:36:12', '2025-04-05 16:25:22', 9, 9),
(13, 4, 14, 0.00, NULL, '2025-04-16 00:00:00', NULL, 1, 'Mourning shift - Cashier 3', '2025-04-16 14:09:33', '2025-04-16 14:09:33', 9, NULL),
(14, 1, 9, 0.00, NULL, '2025-04-21 07:30:00', NULL, 1, NULL, '2025-04-21 03:48:14', '2025-04-21 03:48:14', 9, NULL);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
