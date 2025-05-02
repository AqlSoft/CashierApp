-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2025 at 02:09 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `parent_id`, `type`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `admin_id`, `role_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(21, 9, 13, 9, '2025-04-13 17:17:41', 9, '2025-04-13 17:17:41'),
(22, 9, 46, 9, '2025-04-13 17:17:55', 9, '2025-04-13 17:17:55'),
(25, 1, 4, 9, '2025-04-13 17:56:21', 9, '2025-04-13 17:56:21'),
(26, 9, 3, 9, '2025-04-13 17:57:58', 9, '2025-04-13 17:57:58'),
(27, 1, 8, 9, '2025-04-25 19:50:21', 9, '2025-04-25 19:50:21'),
(28, 10, 8, 9, '2025-04-25 19:50:55', 9, '2025-04-25 19:50:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_categories`
--

INSERT INTO `items_categories` (`id`, `cat_name`, `cat_brief`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Food', 'Main Dishes', 1, 1, '2024-12-03 18:57:34', '2024-12-03 18:57:34', NULL),
(2, 'Beverages', 'Beverages', 1, 1, '2024-12-03 18:57:34', '2024-12-03 18:57:34', NULL),
(3, 'Desserts', 'Desserts', 1, 1, '2024-12-03 18:57:34', '2024-12-03 18:57:34', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'default', '{\"uuid\":\"bea6509f-7ccb-4832-9f45-b2d70ddc391a\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744895315, 1744895315),
(8, 'default', '{\"uuid\":\"9fd76188-7413-475c-a7f4-a6205d9a4b4f\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744895316, 1744895316),
(9, 'default', '{\"uuid\":\"5294c225-a492-4a55-bc62-4a7ab9efb2ec\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744895585, 1744895585),
(10, 'default', '{\"uuid\":\"c6f68360-9130-460e-a090-7aec5986d139\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744895585, 1744895585),
(11, 'default', '{\"uuid\":\"4e70b8f7-a256-42b0-8335-424293cc6c26\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744895755, 1744895755),
(12, 'default', '{\"uuid\":\"fd1fecf4-f96f-461f-bab5-057953f6e2b1\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744895755, 1744895755),
(13, 'default', '{\"uuid\":\"c2fe91c2-7d52-4571-9365-c01b475914dd\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896287, 1744896287),
(14, 'default', '{\"uuid\":\"dd0decb9-300f-4665-9324-101815ffbf1d\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896287, 1744896287),
(15, 'default', '{\"uuid\":\"64e166d0-9bf6-48b8-a794-943944329b5a\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896575, 1744896575),
(16, 'default', '{\"uuid\":\"cd8ef0f4-5930-49a4-8f80-a5c6a2358f02\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896575, 1744896575),
(17, 'default', '{\"uuid\":\"58f3cde0-10c5-465c-b237-1e4432a96813\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896891, 1744896891),
(18, 'default', '{\"uuid\":\"e22c66e2-217a-43db-a008-0f704bb8d7e3\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896892, 1744896892),
(19, 'default', '{\"uuid\":\"510cd907-f7e4-4396-b84b-e347d6ee54cb\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896908, 1744896908),
(20, 'default', '{\"uuid\":\"0bcc3f6d-7fee-493f-9f9a-d643bdf0d306\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744896909, 1744896909),
(21, 'default', '{\"uuid\":\"5a9b201b-2e59-4218-94c8-710a74c4b873\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897105, 1744897105),
(22, 'default', '{\"uuid\":\"112fe120-edfb-4bd2-800b-932be28f0455\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897105, 1744897105),
(23, 'default', '{\"uuid\":\"daac1d02-b304-4a05-8e61-7b533f7644a8\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897149, 1744897149),
(24, 'default', '{\"uuid\":\"5a795374-5003-4fdf-aaf1-dfedf1d5af81\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897149, 1744897149),
(25, 'default', '{\"uuid\":\"d97943cc-7947-425b-82d2-765cfc0a4b28\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897779, 1744897779),
(26, 'default', '{\"uuid\":\"246a6ed7-705c-4659-a24d-9604cac49e67\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897780, 1744897780),
(27, 'default', '{\"uuid\":\"270263ac-995d-4ee8-b2b2-2ac73c559f47\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897800, 1744897800),
(28, 'default', '{\"uuid\":\"c46c4f2a-74d1-486a-9a3f-fc01f367cea4\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744897800, 1744897800),
(29, 'default', '{\"uuid\":\"eb61c994-7a33-48e0-803b-ade53b460362\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744898015, 1744898015),
(30, 'default', '{\"uuid\":\"d5dff423-50c3-4740-8df7-1ee263c913d1\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744898016, 1744898016),
(31, 'default', '{\"uuid\":\"9ec3429b-79fc-4371-885d-4d31b2307fc8\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:72;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744915694, 1744915694),
(32, 'default', '{\"uuid\":\"c0d812d4-c8da-4412-909b-a39e155c2ffe\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:72;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744915695, 1744915695),
(33, 'default', '{\"uuid\":\"77acae77-3c49-4991-b305-9bb70302143f\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744916349, 1744916349),
(34, 'default', '{\"uuid\":\"5b459884-57e1-490f-9c72-d9b2424e95d3\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744916349, 1744916349),
(35, 'default', '{\"uuid\":\"ad61bb34-5f9d-424f-b2fe-0e430f30e5a2\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:73;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744916808, 1744916808),
(36, 'default', '{\"uuid\":\"1eb9ad64-4325-4b55-b9a1-7e82420bb950\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:73;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744916808, 1744916808),
(37, 'default', '{\"uuid\":\"17dcadeb-13e1-4c65-8582-a56c2a7d14df\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744916927, 1744916927),
(38, 'default', '{\"uuid\":\"be1c8c0e-362e-45ee-8d2c-e2ab52c88dd7\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744916927, 1744916927),
(39, 'default', '{\"uuid\":\"e993c916-04c7-4553-ac34-e27777d63097\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744920080, 1744920080),
(40, 'default', '{\"uuid\":\"c4ca8cda-2fae-488a-86cc-47edce6b972a\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744920081, 1744920081),
(41, 'default', '{\"uuid\":\"63f21791-4e70-4c8e-876e-ef225dd8654f\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:71;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744921099, 1744921099);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(42, 'default', '{\"uuid\":\"110584c9-7aa2-4aad-a551-acf2d5b3a7c3\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:71;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744921100, 1744921100),
(43, 'default', '{\"uuid\":\"994ad1d8-4436-4d16-9216-03c1dd20b65b\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744921181, 1744921181),
(44, 'default', '{\"uuid\":\"17155ecd-3c80-4d34-87dd-0c43b43b08dc\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744921182, 1744921182),
(45, 'default', '{\"uuid\":\"8685d751-690a-495f-90fb-f6620704c8ce\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744923970, 1744923970),
(46, 'default', '{\"uuid\":\"0a1aa8e8-4e1a-4cef-a73e-11391a502d4e\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744923971, 1744923971),
(47, 'default', '{\"uuid\":\"5622e7ba-2ae9-4353-84bd-297811a76a46\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:73;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744924083, 1744924083),
(48, 'default', '{\"uuid\":\"11d356cb-3aa0-45ab-a3f9-ffe20814666c\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:73;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744924084, 1744924084),
(49, 'default', '{\"uuid\":\"c1531316-f68c-42c0-a644-b9223d2c4008\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:72;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744924199, 1744924199),
(50, 'default', '{\"uuid\":\"6ea127d6-3bc3-4bf6-b2c4-2a4052147e25\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:72;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744924200, 1744924200),
(51, 'default', '{\"uuid\":\"37de615e-3d1e-4975-8e64-bb9ce4f51706\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745089014, 1745089014),
(52, 'default', '{\"uuid\":\"2697e6f2-7df1-4c1f-a59a-535dc94b4920\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745089022, 1745089022),
(53, 'default', '{\"uuid\":\"b58e1885-e5aa-42ae-a4aa-fcbc2f498de3\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172178, 1745172178),
(54, 'default', '{\"uuid\":\"30ebd6a7-7b08-4bb2-9e00-424d72523129\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172179, 1745172179),
(55, 'default', '{\"uuid\":\"ee47ad61-5682-4f7f-bf30-0c64c2c1b736\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172189, 1745172189),
(56, 'default', '{\"uuid\":\"1a834856-85c8-44fa-a1b7-3f1d8891f709\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172189, 1745172189),
(57, 'default', '{\"uuid\":\"bc1693df-6eb1-4bc6-8e5c-a955b833a4c1\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172215, 1745172215),
(58, 'default', '{\"uuid\":\"968728a3-28d9-43b9-ac10-c9afb01cea62\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172215, 1745172215),
(59, 'default', '{\"uuid\":\"5021b267-b739-423e-9e77-350628b7a121\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172226, 1745172226),
(60, 'default', '{\"uuid\":\"a48357d5-3560-4048-8e74-3cf166dd6fb4\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172227, 1745172227),
(61, 'default', '{\"uuid\":\"3a220175-9b20-4703-892c-06f9f5c44297\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172230, 1745172230),
(62, 'default', '{\"uuid\":\"8e9c92d3-ed2f-44b4-b228-0fb47e5c8874\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172231, 1745172231),
(63, 'default', '{\"uuid\":\"cd037d73-8f42-45ea-87d2-832e905351ec\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:71;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172272, 1745172272),
(64, 'default', '{\"uuid\":\"83152b89-820e-4bab-996c-7982f374b306\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:71;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172272, 1745172272),
(65, 'default', '{\"uuid\":\"303670f4-bd34-424c-a055-8f9e57c4172e\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172395, 1745172395),
(66, 'default', '{\"uuid\":\"34498d9b-1824-4d40-8acd-8b6351a5ab25\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745172395, 1745172395),
(67, 'default', '{\"uuid\":\"b4dd7cd0-8b05-4c2f-b82e-470aed736ab8\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745174675, 1745174675),
(68, 'default', '{\"uuid\":\"4469908d-d8a4-4fbd-a93c-083983ebd975\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:69;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745174676, 1745174676),
(69, 'default', '{\"uuid\":\"9b33206b-0b11-48f8-a12f-a55885538b38\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745181424, 1745181424),
(70, 'default', '{\"uuid\":\"5ac1ae5d-cf48-425a-af44-954e0b2eb3ce\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:70;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745181425, 1745181425),
(71, 'default', '{\"uuid\":\"1193ccea-e4ce-4cec-b37e-e9d211f53009\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:72;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745181971, 1745181971),
(72, 'default', '{\"uuid\":\"25c66cd5-36f3-42e6-8521-cd9ce13e0966\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:72;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745181972, 1745181972),
(73, 'default', '{\"uuid\":\"dc50f9f3-b0a3-406e-b483-23802c0775f9\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:73;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182052, 1745182052),
(74, 'default', '{\"uuid\":\"10abd01c-dc51-46df-9074-20cc07fe8778\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:73;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182053, 1745182053),
(75, 'default', '{\"uuid\":\"c8f0d17e-4397-4dc7-9cb8-b7653a961131\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182097, 1745182097),
(76, 'default', '{\"uuid\":\"ac5e3ae4-2d2a-4f7b-affe-41e5aea876a1\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182097, 1745182097),
(77, 'default', '{\"uuid\":\"6f60fabb-5e1e-46d9-8448-80a5dfb7b571\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182123, 1745182123),
(78, 'default', '{\"uuid\":\"f65d083c-681a-48ef-a337-c2622290c18f\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182123, 1745182123),
(79, 'default', '{\"uuid\":\"5844e46d-0bb6-4892-bdde-3af1ce6e18b7\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182142, 1745182142),
(80, 'default', '{\"uuid\":\"9f1c3fc7-e6e0-4c82-a1ed-2d8d6a0a20f4\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:28;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182142, 1745182142);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(81, 'default', '{\"uuid\":\"4bd79b2a-9a44-4068-97b5-9c61a079ce35\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182153, 1745182153),
(82, 'default', '{\"uuid\":\"0e0ef184-0fd8-435a-a2b1-07f7608d0c4d\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1745182153, 1745182153);

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
  `customer_id` bigint DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `delivery_method` bigint UNSIGNED DEFAULT NULL,
  `wait_no` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `POS` bigint UNSIGNED DEFAULT NULL,
  `shift_id` bigint UNSIGNED DEFAULT NULL,
  `table_id` bigint UNSIGNED DEFAULT NULL,
  `delivery_id` bigint UNSIGNED DEFAULT NULL,
  `processing_by` bigint UNSIGNED DEFAULT NULL,
  `processing_time` time DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parties_created_by` (`created_by`),
  KEY `fk_parties_updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_sn`, `order_date`, `customer_id`, `notes`, `created_at`, `updated_at`, `deleted_at`, `status`, `delivery_method`, `wait_no`, `POS`, `shift_id`, `table_id`, `delivery_id`, `processing_by`, `processing_time`, `created_by`, `updated_by`) VALUES
(81, '00000027', '2025-04-23 18:30:03', 1, NULL, '2025-04-23 15:30:03', '2025-04-27 12:31:58', NULL, 3, 2, 'LOC0027', NULL, 14, 2, NULL, NULL, '00:09:32', 9, 9),
(82, '00000028', '2025-04-23 18:31:05', 1, NULL, '2025-04-23 15:31:05', '2025-04-27 12:13:35', NULL, 3, 2, 'LOC0028', NULL, 14, 1, NULL, NULL, '00:01:24', 9, 9),
(83, '00000029', '2025-04-24 13:09:07', 1, NULL, '2025-04-24 10:09:07', '2025-04-24 10:09:39', NULL, 3, 3, 'TWY0029', NULL, 14, NULL, NULL, NULL, '00:01:24', 9, 9),
(84, '00000030', '2025-04-24 13:30:13', 1, NULL, '2025-04-24 10:30:13', '2025-04-24 10:30:33', NULL, 3, 3, 'TWY0030', NULL, 14, NULL, NULL, NULL, '00:01:24', 9, 9),
(93, '00000031', '2025-04-25 20:13:11', 1, NULL, '2025-04-25 17:13:11', '2025-04-25 18:22:51', NULL, 3, 2, 'DVR0031', NULL, 14, NULL, NULL, NULL, '00:00:00', 9, 9),
(95, '00000033', '2025-04-25 22:03:38', NULL, NULL, '2025-04-25 19:03:38', '2025-04-25 19:04:14', NULL, 3, NULL, 'DVR0033', NULL, 14, NULL, NULL, NULL, '00:00:20', 9, 9),
(97, '00000034', '2025-04-26 13:14:42', 1, NULL, '2025-04-26 10:14:42', '2025-04-26 11:11:01', NULL, 3, 3, 'TWY0034', NULL, 14, NULL, NULL, NULL, '01:00:00', 9, 9),
(98, '00000035', '2025-04-26 14:17:48', 1, NULL, '2025-04-26 11:17:48', '2025-04-26 11:21:34', NULL, 2, 3, 'TWY0035', NULL, 14, NULL, NULL, NULL, '00:00:10', 9, 9),
(99, '00000036', '2025-04-26 14:21:41', 1, NULL, '2025-04-26 11:21:41', '2025-04-26 11:32:04', NULL, 3, 3, 'TWY0036', NULL, 14, NULL, NULL, NULL, '00:00:10', 9, 9),
(100, '00000037', '2025-04-26 14:37:33', 1, NULL, '2025-04-26 11:37:33', '2025-04-27 06:09:40', NULL, 2, 3, 'DVR0037', NULL, 14, NULL, NULL, NULL, '00:30:00', 9, 9),
(101, '00000038', '2025-04-27 09:10:50', 4, NULL, '2025-04-27 06:10:50', '2025-04-27 06:11:41', NULL, 3, NULL, 'DVR0038', NULL, 14, NULL, NULL, NULL, NULL, 9, 9),
(102, '00000039', '2025-04-27 12:33:13', 1, NULL, '2025-04-27 09:33:13', '2025-04-27 09:33:14', NULL, 1, NULL, 'DVR0039', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(103, '00000040', '2025-04-27 12:33:34', 1, NULL, '2025-04-27 09:33:34', '2025-04-27 09:33:34', NULL, 1, NULL, 'DVR0040', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(104, '00000041', '2025-04-27 12:33:44', 1, NULL, '2025-04-27 09:33:44', '2025-04-27 09:39:31', NULL, 2, 3, 'DVR0041', NULL, 14, NULL, NULL, NULL, NULL, 9, 9),
(105, '00000042', '2025-04-27 12:33:59', 1, NULL, '2025-04-27 09:33:59', '2025-04-27 11:49:13', NULL, 1, 1, 'TWY0042', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(106, '00000043', '2025-04-27 12:34:34', 8, NULL, '2025-04-27 09:34:34', '2025-04-27 11:39:47', NULL, 2, 2, 'LOC0043', NULL, 14, NULL, NULL, NULL, NULL, 9, 9),
(107, '00000044', '2025-04-27 18:36:16', 1, NULL, '2025-04-27 15:36:16', '2025-04-27 15:36:26', NULL, 1, NULL, 'DVR0044', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(108, '00000045', '2025-04-27 19:51:10', 1, NULL, '2025-04-27 16:51:10', '2025-04-27 16:51:10', NULL, 1, NULL, 'DVR0045', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(109, '00000046', '2025-04-28 13:07:43', 1, NULL, '2025-04-28 10:07:43', '2025-04-28 10:07:43', NULL, 1, NULL, 'DVR0046', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(110, '00000047', '2025-04-28 14:17:06', 1, NULL, '2025-04-28 11:17:06', '2025-04-28 11:46:59', NULL, 3, 3, 'DVR0047', NULL, 14, 1, NULL, NULL, NULL, 9, 9),
(111, '00000048', '2025-04-28 18:51:34', 1, NULL, '2025-04-28 15:51:34', '2025-04-28 15:51:35', NULL, 1, NULL, 'DVR0048', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(112, '00000049', '2025-04-28 19:04:25', 1, NULL, '2025-04-28 16:04:25', '2025-04-28 16:05:21', NULL, 2, NULL, 'DVR0049', NULL, 14, NULL, NULL, NULL, NULL, 9, 9),
(113, '00000050', '2025-05-02 12:11:37', 1, NULL, '2025-05-02 09:11:37', '2025-05-02 09:11:38', NULL, 1, NULL, 'DVR0050', NULL, 14, NULL, NULL, NULL, NULL, 9, NULL),
(114, '00000051', '2025-05-02 12:38:45', 1, NULL, '2025-05-02 09:38:45', '2025-05-02 10:55:22', NULL, 3, 2, 'LOC0051', NULL, 14, 2, NULL, NULL, NULL, 9, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(76, 1, 1, 68, 59, 1, 1, 400.00, NULL, '2025-04-17 11:02:12', '2025-04-17 11:02:33', 9, 9),
(77, 1, 3, 68, 59, 1, 1, 500.00, NULL, '2025-04-17 11:02:20', '2025-04-17 11:02:33', 9, 9),
(78, 1, 1, 69, 60, 1, 1, 400.00, NULL, '2025-04-17 11:05:34', '2025-04-17 11:05:55', 9, 9),
(79, 1, 1, 70, 61, 1, 1, 400.00, NULL, '2025-04-17 11:08:23', '2025-04-17 11:08:45', 9, 9),
(80, 1, 15, 70, 61, 1, 1, 500.00, NULL, '2025-04-17 11:08:34', '2025-04-17 11:08:45', 9, 9),
(81, 1, 1, 71, 62, 1, 1, 400.00, NULL, '2025-04-17 15:44:47', '2025-04-17 15:45:04', 9, 9),
(82, 1, 1, 72, 63, 1, 1, 400.00, NULL, '2025-04-17 15:46:11', '2025-04-17 15:46:26', 9, 9),
(83, 1, 13, 72, 63, 1, 1, 400.00, NULL, '2025-04-17 15:46:15', '2025-04-17 15:46:26', 9, 9),
(84, 46, 4, 73, 64, 1, 1, 700.00, NULL, '2025-04-17 15:49:33', '2025-04-17 15:49:58', 9, 9),
(85, 46, 8, 73, 64, 1, 1, 450.00, NULL, '2025-04-17 15:49:42', '2025-04-17 15:49:58', 9, 9),
(86, 1, 1, 74, 65, 1, 1, 400.00, NULL, '2025-04-22 18:46:55', '2025-04-22 18:47:26', 9, 9),
(87, 1, 1, 75, 66, 1, 1, 400.00, NULL, '2025-04-23 10:55:53', '2025-04-23 10:56:10', 9, 9),
(88, 1, 1, 76, 67, 1, 1, 400.00, NULL, '2025-04-23 11:01:01', '2025-04-23 11:01:13', 9, 9),
(89, 1, 1, 77, 72, 1, 1, 400.00, NULL, '2025-04-23 11:06:22', '2025-04-23 14:47:44', 9, 9),
(90, 1, 1, 78, 73, 1, 1, 400.00, NULL, '2025-04-23 14:48:58', '2025-04-23 14:49:22', 9, 9),
(91, 1, 15, 78, 73, 1, 1, 500.00, NULL, '2025-04-23 14:49:08', '2025-04-23 14:49:22', 9, 9),
(92, 1, 3, 79, 74, 1, 1, 500.00, NULL, '2025-04-23 14:52:07', '2025-04-23 14:52:45', 9, 9),
(93, 1, 1, 80, 78, 1, 1, 400.00, NULL, '2025-04-23 14:54:08', '2025-04-23 15:09:31', 9, 9),
(94, 1, 1, 81, 95, 1, 1, 400.00, NULL, '2025-04-23 15:30:18', '2025-04-27 12:31:57', 9, 9),
(95, 1, 1, 82, 94, 1, 1, 400.00, NULL, '2025-04-23 15:31:12', '2025-04-27 12:13:31', 9, 9),
(96, 1, 1, 83, 81, 1, 1, 400.00, NULL, '2025-04-24 10:09:21', '2025-04-24 10:09:38', 9, 9),
(97, 46, 4, 84, 82, 1, 1, 700.00, NULL, '2025-04-24 10:30:22', '2025-04-24 10:30:33', 9, 9),
(98, 1, 1, 93, 83, 1, 1, 400.00, NULL, '2025-04-25 18:17:25', '2025-04-25 18:22:47', 9, 9),
(99, 1, 1, 94, 85, 1, 1, 400.00, NULL, '2025-04-25 18:30:56', '2025-04-25 18:34:50', 9, 9),
(100, 1, 3, 95, 86, 1, 1, 500.00, NULL, '2025-04-25 19:03:49', '2025-04-25 19:04:14', 9, 9),
(101, 1, 1, 97, 88, 1, 1, 400.00, NULL, '2025-04-26 10:54:03', '2025-04-26 11:11:00', 9, 9),
(102, 46, 4, 97, 88, 1, 1, 700.00, NULL, '2025-04-26 10:59:12', '2025-04-26 11:11:00', 9, 9),
(103, 1, 1, 98, 89, 1, 1, 400.00, NULL, '2025-04-26 11:18:43', '2025-04-26 11:19:14', 9, 9),
(104, 1, 3, 98, NULL, 1, 1, 500.00, NULL, '2025-04-26 11:21:34', '2025-04-26 11:21:34', 9, NULL),
(105, 1, 1, 99, 90, 1, 1, 400.00, NULL, '2025-04-26 11:31:52', '2025-04-26 11:32:04', 9, 9),
(106, 1, 1, 100, NULL, 1, 1, 400.00, NULL, '2025-04-26 11:37:48', '2025-04-26 11:37:48', 9, NULL),
(107, 1, 1, 101, 91, 1, 1, 400.00, NULL, '2025-04-27 06:11:19', '2025-04-27 06:11:40', 9, 9),
(108, 1, 1, 104, NULL, 1, 1, 400.00, NULL, '2025-04-27 09:36:16', '2025-04-27 09:36:16', 9, NULL),
(109, 1, 1, 106, 93, 1, 1, 400.00, NULL, '2025-04-27 09:39:56', '2025-04-27 09:43:53', 9, 9),
(110, 46, 4, 106, 93, 1, 1, 700.00, NULL, '2025-04-27 09:43:28', '2025-04-27 09:43:53', 9, 9),
(111, 46, 5, 106, NULL, 1, 1, 350.00, NULL, '2025-04-27 11:39:47', '2025-04-27 11:39:47', 9, NULL),
(112, 1, 3, 81, 95, 1, 1, 500.00, NULL, '2025-04-27 11:46:22', '2025-04-27 12:31:57', 9, 9),
(113, 1, 3, 82, 94, 1, 1, 500.00, NULL, '2025-04-27 12:02:52', '2025-04-27 12:13:31', 9, 9),
(114, 1, 1, 110, 97, 2, 1, 400.00, NULL, '2025-04-28 11:17:35', '2025-04-28 11:24:00', 9, 9),
(115, 1, 1, 112, NULL, 1, 1, 400.00, NULL, '2025-04-28 16:05:21', '2025-04-28 16:05:21', 9, NULL),
(116, 1, 1, 114, 98, 2, 1, 400.00, NULL, '2025-05-02 10:30:39', '2025-05-02 10:55:12', 9, 9),
(117, 2, 5, 114, 98, 1, 1, 350.00, NULL, '2025-05-02 10:31:09', '2025-05-02 10:55:12', 9, 9),
(118, 3, 15, 114, 98, 1, 1, 500.00, NULL, '2025-05-02 10:31:23', '2025-05-02 10:55:12', 9, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `vat_number`, `name`, `phone`, `email`, `address`, `type`, `is_default`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '0000000001', 'عميل افتراضي', '0000000000', 'default@example.com', NULL, 'customer', 0, '2025-03-11 15:11:34', '2025-03-13 18:24:54', NULL, 10),
(3, '12345', 'Atef Aql', '0547660005', NULL, 'Egypt', 'customer', 0, '2025-03-03 06:47:13', '2025-03-03 06:47:13', 10, NULL),
(4, '098766', 'Ali  Aql', '0547660005999', NULL, 'Egypt', 'customer', 0, '2025-03-03 08:55:10', '2025-03-03 08:55:10', 10, NULL),
(6, '111222339', 'Atef Aql', '05486768419', NULL, 'Egypt', 'customer', 0, '2025-03-11 16:33:16', '2025-03-13 18:17:41', 10, 10),
(7, '11122233', 'atefoooo', '0548676841', NULL, 'street 45', 'customer', 0, '2025-04-25 17:21:48', '2025-04-25 17:21:48', 9, NULL),
(8, '11122233', 'atefyy', '0548676841', NULL, 'street 45', 'customer', 0, '2025-04-25 19:23:58', '2025-04-25 19:23:58', 9, NULL);

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
  `payment_method` bigint UNSIGNED DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(48, 68, 59, 1, NULL, NULL, '2025-04-17 14:02:34', 1, NULL, NULL, 'سند سلفة', '2025-04-17 11:02:34', '2025-04-17 11:02:34', 9, NULL),
(49, 69, 60, 1, NULL, NULL, '2025-04-17 14:05:55', 1, NULL, NULL, 'سند سلفة', '2025-04-17 11:05:55', '2025-04-17 11:05:55', 9, NULL),
(50, 70, 61, 1, NULL, NULL, '2025-04-17 14:08:46', 1, NULL, NULL, 'سند سلفة', '2025-04-17 11:08:46', '2025-04-17 11:08:46', 9, NULL),
(51, 71, 62, 1, NULL, NULL, '2025-04-17 18:45:04', 1, NULL, NULL, 'سند سلفة', '2025-04-17 15:45:04', '2025-04-17 15:45:04', 9, NULL),
(52, 72, 63, 1, NULL, NULL, '2025-04-17 18:46:26', 1, NULL, NULL, 'سند سلفة', '2025-04-17 15:46:26', '2025-04-17 15:46:26', 9, NULL),
(53, 73, 64, 1, NULL, NULL, '2025-04-17 18:49:58', 1, NULL, NULL, 'سند سلفة', '2025-04-17 15:49:58', '2025-04-17 15:49:58', 9, NULL),
(54, 74, 65, 1, NULL, NULL, '2025-04-22 21:47:26', 1, NULL, NULL, 'سند سلفة', '2025-04-22 18:47:26', '2025-04-22 18:47:26', 9, NULL),
(55, 75, 66, 1, NULL, NULL, '2025-04-23 13:56:10', 1, NULL, NULL, 'سند سلفة', '2025-04-23 10:56:10', '2025-04-23 10:56:10', 9, NULL),
(56, 76, 67, 1, NULL, NULL, '2025-04-23 14:01:14', 1, NULL, NULL, 'سند سلفة', '2025-04-23 11:01:14', '2025-04-23 11:01:14', 9, NULL),
(57, 77, 68, 1, NULL, NULL, '2025-04-23 14:06:43', 1, NULL, NULL, 'سند سلفة', '2025-04-23 11:06:43', '2025-04-23 11:06:43', 9, NULL),
(58, 77, 69, 1, NULL, NULL, '2025-04-23 17:32:29', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:32:29', '2025-04-23 14:32:29', 9, NULL),
(59, 77, 70, 1, NULL, NULL, '2025-04-23 17:39:42', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:39:42', '2025-04-23 14:39:42', 9, NULL),
(60, 77, 71, 1, NULL, NULL, '2025-04-23 17:43:14', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:43:14', '2025-04-23 14:43:14', 9, NULL),
(61, 77, 72, 1, NULL, NULL, '2025-04-23 17:47:45', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:47:45', '2025-04-23 14:47:45', 9, NULL),
(62, 78, 73, 1, NULL, NULL, '2025-04-23 17:49:22', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:49:22', '2025-04-23 14:49:22', 9, NULL),
(63, 79, 74, 1, NULL, NULL, '2025-04-23 17:52:45', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:52:45', '2025-04-23 14:52:45', 9, NULL),
(64, 80, 75, 1, NULL, NULL, '2025-04-23 17:54:21', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:54:21', '2025-04-23 14:54:21', 9, NULL),
(65, 80, 76, 1, NULL, NULL, '2025-04-23 17:56:01', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:56:01', '2025-04-23 14:56:01', 9, NULL),
(66, 80, 77, 1, NULL, NULL, '2025-04-23 17:57:16', 1, NULL, NULL, 'سند سلفة', '2025-04-23 14:57:16', '2025-04-23 14:57:16', 9, NULL),
(67, 80, 78, 1, NULL, NULL, '2025-04-23 18:09:31', 1, NULL, NULL, 'سند سلفة', '2025-04-23 15:09:31', '2025-04-23 15:09:31', 9, NULL),
(68, 81, 79, 1, NULL, NULL, '2025-04-23 18:30:32', 1, NULL, NULL, 'سند سلفة', '2025-04-23 15:30:32', '2025-04-23 15:30:32', 9, NULL),
(69, 82, 80, 1, NULL, NULL, '2025-04-23 18:31:24', 1, NULL, NULL, 'سند سلفة', '2025-04-23 15:31:24', '2025-04-23 15:31:24', 9, NULL),
(70, 83, 81, 1, NULL, NULL, '2025-04-24 13:09:39', 1, NULL, NULL, 'سند سلفة', '2025-04-24 10:09:39', '2025-04-24 10:09:39', 9, NULL),
(71, 84, 82, 1, NULL, NULL, '2025-04-24 13:30:33', 1, NULL, NULL, 'سند سلفة', '2025-04-24 10:30:33', '2025-04-24 10:30:33', 9, NULL),
(72, 93, 83, 1, NULL, NULL, '2025-04-25 21:22:48', 1, NULL, NULL, 'سند سلفة', '2025-04-25 18:22:48', '2025-04-25 18:22:48', 9, NULL),
(73, 94, 84, 1, NULL, NULL, '2025-04-25 21:32:07', 1, NULL, NULL, 'سند سلفة', '2025-04-25 18:32:07', '2025-04-25 18:32:07', 9, NULL),
(74, 94, 85, 1, NULL, NULL, '2025-04-25 21:34:50', 1, NULL, NULL, 'سند سلفة', '2025-04-25 18:34:50', '2025-04-25 18:34:50', 9, NULL),
(75, 95, 86, 1, NULL, NULL, '2025-04-25 22:04:14', 1, NULL, NULL, 'سند سلفة', '2025-04-25 19:04:14', '2025-04-25 19:04:14', 9, NULL),
(76, 97, 87, 1, NULL, NULL, '2025-04-26 13:59:33', 1, NULL, NULL, 'سند سلفة', '2025-04-26 10:59:33', '2025-04-26 10:59:33', 9, NULL),
(77, 97, 88, 1, NULL, NULL, '2025-04-26 14:11:00', 1, NULL, NULL, 'سند سلفة', '2025-04-26 11:11:00', '2025-04-26 11:11:00', 9, NULL),
(78, 98, 89, 1, NULL, NULL, '2025-04-26 14:19:14', 1, NULL, NULL, 'سند سلفة', '2025-04-26 11:19:14', '2025-04-26 11:19:14', 9, NULL),
(79, 99, 90, 1, NULL, NULL, '2025-04-26 14:32:04', 1, NULL, NULL, 'سند سلفة', '2025-04-26 11:32:04', '2025-04-26 11:32:04', 9, NULL),
(80, 101, 91, 1, NULL, NULL, '2025-04-27 09:11:41', 1, NULL, NULL, 'سند سلفة', '2025-04-27 06:11:41', '2025-04-27 06:11:41', 9, NULL),
(81, 106, 92, 1, NULL, NULL, '2025-04-27 12:40:17', 1, NULL, NULL, 'سند سلفة', '2025-04-27 09:40:17', '2025-04-27 09:40:17', 9, NULL),
(82, 106, 93, 1, NULL, NULL, '2025-04-27 12:43:53', 1, NULL, NULL, 'سند سلفة', '2025-04-27 09:43:53', '2025-04-27 09:43:53', 9, NULL),
(83, 82, 94, 1, NULL, NULL, '2025-04-27 15:13:34', 1, NULL, NULL, 'سند سلفة', '2025-04-27 12:13:34', '2025-04-27 12:13:34', 9, NULL),
(84, 81, 95, 1, NULL, NULL, '2025-04-27 15:31:58', 1, NULL, NULL, 'سند سلفة', '2025-04-27 12:31:58', '2025-04-27 12:31:58', 9, NULL),
(85, 110, 97, NULL, NULL, NULL, '2025-04-28 14:24:00', 1, NULL, NULL, 'سند سلفة', '2025-04-28 11:24:00', '2025-04-28 11:24:00', 9, NULL),
(86, 114, 98, NULL, NULL, NULL, '2025-05-02 13:55:22', 1, NULL, NULL, 'سند سلفة', '2025-05-02 10:55:22', '2025-05-02 10:55:22', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `processing_time` time DEFAULT NULL,
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

INSERT INTO `products` (`id`, `name`, `image`, `cost_price`, `sale_price`, `processing_time`, `quantity`, `status`, `category_id`, `unit_id`, `created_at`, `description`, `created_by`, `updated_by`, `updated_at`) VALUES
(1, 'Kebab', 'about.jpg', 300.00, 400.00, '00:00:10', 4, 1, 1, 1, '2025-02-23 12:31:07', NULL, 1, 1, '2025-02-23 12:31:07'),
(3, 'Grilled Meat', 'bt4.jpg', 300.00, 500.00, '00:00:20', 4, 1, 1, 1, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10'),
(4, 'Dessert1', 'bt1.jpg', 300.00, 700.00, '01:00:00', 4, 1, 3, 1, '2025-02-23 12:31:20', NULL, 1, 1, '2025-02-23 12:31:20'),
(5, 'Cappuccino2', 'blog1.jpg', 300.00, 350.00, '00:00:30', 4, 1, 2, 1, '2025-02-23 12:31:20', NULL, 1, 1, '2025-02-23 12:31:20'),
(6, 'Cappuccino', 'blog1.jpg', 400.00, 355.00, '00:00:40', 4, 0, 2, 1, '2025-02-23 12:54:47', NULL, 1, 10, '2025-02-23 16:29:53'),
(8, 'Espresso', 'blog1.jpg', 300.00, 450.00, '00:00:50', 4, 1, 2, 1, '2025-02-23 12:54:49', NULL, 1, 1, '2025-02-23 12:54:49'),
(13, 'Grilled Fish', 'blog3.jpg', 300.00, 400.00, '00:00:25', 4, 1, 1, 1, '2025-02-23 12:31:07', NULL, 1, 1, '2025-02-23 12:31:07'),
(14, 'Dessert2', 'bt2.jpg', 300.00, 500.00, '00:00:35', 4, 1, 3, 1, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10'),
(15, 'Dessert3', 'bt3.jpg', 300.00, 500.00, '00:00:45', 4, 1, 3, 1, '2025-02-23 12:31:10', NULL, 1, 1, '2025-02-23 12:31:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `brief`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'super-admin', 'Super-Admin: Top-tier admin role with full, unrestricted access & control over all system features, data, settings, and user management. Ultimate authority.', 9, 9, '2025-04-12 06:39:19', '2025-04-13 07:16:23', 1),
(3, 'cashier', 'New Role with no description', 9, 9, '2025-04-12 06:47:11', '2025-04-12 06:47:11', 1),
(4, 'chief', 'New Role with no description', 9, 9, '2025-04-12 06:48:08', '2025-04-12 06:48:08', 1),
(5, 'worker', 'New Role with no description', 9, 9, '2025-04-12 06:59:41', '2025-04-12 06:59:41', 1),
(6, 'accountant', 'New Role with no description', 9, 9, '2025-04-12 06:59:52', '2025-04-12 06:59:52', 1),
(7, 'fin', 'houjp', 9, 9, '2025-04-13 17:47:50', '2025-04-13 17:47:50', 1),
(8, 'delivery', 'Adirondack Chair, Folding Chair 100.00', 9, 9, '2025-04-25 18:50:34', '2025-04-25 18:50:34', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(59, NULL, 1, '0000000001', 0.15, '2025-04-17', 1, '2025-04-17', 68, 900.15, 900.00, '2025-04-17 00:00:00', 'sales', 0, '2025-04-17 11:02:33', '2025-04-17 11:02:33', 9, NULL, 'INV-202504-0002'),
(60, NULL, 1, '0000000001', 0.15, '2025-04-17', 1, '2025-04-17', 69, 400.15, 400.00, '2025-04-17 00:00:00', 'sales', 0, '2025-04-17 11:05:55', '2025-04-17 11:05:55', 9, NULL, 'INV-202504-0003'),
(61, NULL, 1, '0000000001', 0.15, '2025-04-17', 1, '2025-04-17', 70, 900.15, 900.00, '2025-04-17 00:00:00', 'sales', 0, '2025-04-17 11:08:45', '2025-04-17 11:08:45', 9, NULL, 'INV-202504-0004'),
(62, NULL, 1, '0000000001', 0.15, '2025-04-17', 1, '2025-04-17', 71, 400.15, 400.00, '2025-04-17 00:00:00', 'sales', 0, '2025-04-17 15:45:04', '2025-04-17 15:45:04', 9, NULL, 'INV-202504-0005'),
(63, NULL, 1, '0000000001', 0.15, '2025-04-17', 1, '2025-04-17', 72, 800.15, 800.00, '2025-04-17 00:00:00', 'sales', 0, '2025-04-17 15:46:26', '2025-04-17 15:46:26', 9, NULL, 'INV-202504-0006'),
(64, NULL, 1, '0000000001', 0.15, '2025-04-17', 1, '2025-04-17', 73, 1150.15, 1150.00, '2025-04-17 00:00:00', 'sales', 0, '2025-04-17 15:49:57', '2025-04-17 15:49:57', 9, NULL, 'INV-202504-0007'),
(65, NULL, 1, '0000000001', 0.15, '2025-04-22', 1, '2025-04-22', 74, 400.15, 400.00, '2025-04-22 00:00:00', 'sales', 0, '2025-04-22 18:47:26', '2025-04-22 18:47:26', 9, NULL, 'INV-202504-0008'),
(66, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 75, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 10:56:10', '2025-04-23 10:56:10', 9, NULL, 'INV-202504-0009'),
(67, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 76, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 11:01:13', '2025-04-23 11:01:13', 9, NULL, 'INV-202504-0010'),
(68, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 77, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 11:06:42', '2025-04-23 11:06:42', 9, NULL, 'INV-202504-0011'),
(69, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 77, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:32:28', '2025-04-23 14:32:28', 9, NULL, 'INV-202504-0012'),
(70, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 77, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:39:41', '2025-04-23 14:39:41', 9, NULL, 'INV-202504-0013'),
(71, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 77, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:43:14', '2025-04-23 14:43:14', 9, NULL, 'INV-202504-0014'),
(72, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 77, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:47:44', '2025-04-23 14:47:44', 9, NULL, 'INV-202504-0015'),
(73, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 78, 900.15, 900.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:49:22', '2025-04-23 14:49:22', 9, NULL, 'INV-202504-0016'),
(74, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 79, 500.15, 500.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:52:45', '2025-04-23 14:52:45', 9, NULL, 'INV-202504-0017'),
(75, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 80, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:54:21', '2025-04-23 14:54:21', 9, NULL, 'INV-202504-0018'),
(76, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 80, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:56:00', '2025-04-23 14:56:00', 9, NULL, 'INV-202504-0019'),
(77, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 80, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 14:57:16', '2025-04-23 14:57:16', 9, NULL, 'INV-202504-0020'),
(78, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 80, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 15:09:30', '2025-04-23 15:09:30', 9, NULL, 'INV-202504-0021'),
(79, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 81, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 15:30:31', '2025-04-23 15:30:31', 9, NULL, 'INV-202504-0022'),
(80, NULL, 1, '0000000001', 0.15, '2025-04-23', 1, '2025-04-23', 82, 400.15, 400.00, '2025-04-23 00:00:00', 'sales', 0, '2025-04-23 15:31:24', '2025-04-23 15:31:24', 9, NULL, 'INV-202504-0023'),
(81, NULL, 1, '0000000001', 0.15, '2025-04-24', 1, '2025-04-24', 83, 400.15, 400.00, '2025-04-24 00:00:00', 'sales', 0, '2025-04-24 10:09:38', '2025-04-24 10:09:38', 9, NULL, 'INV-202504-0024'),
(82, NULL, 1, '0000000001', 0.15, '2025-04-24', 1, '2025-04-24', 84, 700.15, 700.00, '2025-04-24 00:00:00', 'sales', 0, '2025-04-24 10:30:33', '2025-04-24 10:30:33', 9, NULL, 'INV-202504-0025'),
(83, NULL, 1, '0000000001', 0.15, '2025-04-25', 1, '2025-04-25', 93, 400.15, 400.00, '2025-04-25 00:00:00', 'sales', 0, '2025-04-25 18:22:47', '2025-04-25 18:22:47', 9, NULL, 'INV-202504-0026'),
(84, NULL, 1, '0000000001', 0.15, '2025-04-25', 1, '2025-04-25', 94, 400.15, 400.00, '2025-04-25 00:00:00', 'sales', 0, '2025-04-25 18:32:07', '2025-04-25 18:32:07', 9, NULL, 'INV-202504-0027'),
(85, NULL, 1, '0000000001', 0.15, '2025-04-25', 1, '2025-04-25', 94, 400.15, 400.00, '2025-04-25 00:00:00', 'sales', 0, '2025-04-25 18:34:50', '2025-04-25 18:34:50', 9, NULL, 'INV-202504-0028'),
(86, NULL, 1, '0000000001', 0.15, '2025-04-25', 1, '2025-04-25', 95, 500.15, 500.00, '2025-04-25 00:00:00', 'sales', 0, '2025-04-25 19:04:13', '2025-04-25 19:04:13', 9, NULL, 'INV-202504-0029'),
(87, NULL, 1, '0000000001', 0.15, '2025-04-26', 1, '2025-04-26', 97, 1100.15, 1100.00, '2025-04-26 00:00:00', 'sales', 0, '2025-04-26 10:59:31', '2025-04-26 10:59:31', 9, NULL, 'INV-202504-0030'),
(88, NULL, 1, '0000000001', 165.00, '2025-04-26', 1, '2025-04-26', 97, 1265.00, 1100.00, '2025-04-26 00:00:00', 'sales', 1, '2025-04-26 11:11:00', '2025-04-26 11:11:00', 9, NULL, 'INV-202504-0031'),
(89, NULL, 1, '0000000001', 60.00, '2025-04-26', 1, '2025-04-26', 98, 460.00, 400.00, '2025-04-26 00:00:00', 'sales', 1, '2025-04-26 11:19:14', '2025-04-26 11:19:14', 9, NULL, 'INV-202504-0032'),
(90, NULL, 1, '0000000001', 60.00, '2025-04-26', 1, '2025-04-26', 99, 460.00, 400.00, '2025-04-26 00:00:00', 'sales', 1, '2025-04-26 11:32:04', '2025-04-26 11:32:04', 9, NULL, 'INV-202504-0033'),
(91, NULL, 1, '0000000001', 60.00, '2025-04-27', 1, '2025-04-27', 101, 460.00, 400.00, '2025-04-27 00:00:00', 'sales', 1, '2025-04-27 06:11:40', '2025-04-27 06:11:40', 9, NULL, 'INV-202504-0034'),
(92, NULL, 1, '0000000001', 60.00, '2025-04-27', 1, '2025-04-27', 106, 460.00, 400.00, '2025-04-27 00:00:00', 'sales', 1, '2025-04-27 09:40:16', '2025-04-27 09:40:16', 9, NULL, 'INV-202504-0035'),
(93, NULL, 7, '11122233', 165.00, '2025-04-27', 1, '2025-04-27', 106, 1265.00, 1100.00, '2025-04-27 00:00:00', 'sales', 1, '2025-04-27 09:43:53', '2025-04-27 09:43:53', 9, NULL, 'INV-202504-0036'),
(94, NULL, 1, '0000000001', 135.00, '2025-04-27', 1, '2025-04-27', 82, 1035.00, 900.00, '2025-04-27 00:00:00', 'sales', 1, '2025-04-27 12:13:31', '2025-04-27 12:13:31', 9, NULL, 'INV-202504-0037'),
(95, NULL, 1, '0000000001', 135.00, '2025-04-27', 1, '2025-04-27', 81, 1035.00, 900.00, '2025-04-27 00:00:00', 'sales', 1, '2025-04-27 12:31:57', '2025-04-27 12:31:57', 9, NULL, 'INV-202504-0038'),
(96, NULL, 1, '0000000001', 120.00, '2025-04-28', 1, '2025-04-28', 110, 920.00, 800.00, '2025-04-28 00:00:00', 'sales', 1, '2025-04-28 11:20:58', '2025-04-28 11:20:58', 9, NULL, 'INV-202504-0039'),
(97, NULL, 1, '0000000001', 120.00, '2025-04-28', 1, '2025-04-28', 110, 920.00, 800.00, '2025-04-28 00:00:00', 'sales', 1, '2025-04-28 11:23:59', '2025-04-28 11:23:59', 9, NULL, 'INV-202504-0040'),
(98, NULL, 1, '0000000001', 247.50, '2025-05-02', 1, '2025-05-02', 114, 1897.50, 1650.00, '2025-05-02 00:00:00', 'sales', 1, '2025-05-02 10:55:11', '2025-05-02 10:55:11', 9, NULL, 'INV-202505-0001');

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
('Hdynl47iOO6mpQYtlrIwh3ZJ0Dbw2snnzZJ5d6T0', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibDBGWFpDbFJuaWwyNjlLNHZIZEcyMlhJcWFxOEdlMjFRTW9nQ21QbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NzoiaHR0cDovL3d3dy5jYXNoaWVybmV3LmNvbS9hZG1pbi91c2Vycy9wcm9maWxlLzkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2NDoiaHR0cDovL3d3dy5jYXNoaWVybmV3LmNvbS9hZG1pbi9vcmRlckl0ZW1zL2NyZWF0ZS8xMTQ/Y2F0ZWdvcnk9MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1746194675);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `monybox_id`, `admin_id`, `opening_balance`, `closing_balance`, `start_time`, `end_time`, `status`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(12, 2, 2, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-06 17:09:37', 0, NULL, '2025-04-05 15:45:12', '2025-04-06 14:09:37', 9, 9),
(11, 1, 1, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-05 19:25:22', 0, NULL, '2025-04-05 15:36:12', '2025-04-05 16:25:22', 9, 9),
(13, 4, 14, 0.00, NULL, '2025-04-16 00:00:00', NULL, 1, 'Mourning shift - Cashier 3', '2025-04-16 14:09:33', '2025-04-16 14:09:33', 9, NULL),
(14, 1, 9, 2.00, NULL, '2025-04-17 00:00:00', NULL, 1, NULL, '2025-04-17 11:01:41', '2025-04-17 11:01:41', 9, NULL),
(15, 3, 1, 48.00, NULL, '2025-04-20 14:01:00', NULL, 1, NULL, '2025-04-20 08:01:59', '2025-04-20 08:01:59', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'المنطقة/الزاوية',
  `is_occupied` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `number`, `capacity`, `location`, `is_occupied`, `created_at`, `updated_at`) VALUES
(1, 'T01', 4, 'Window Side', 1, '2025-04-24 11:16:42', '2025-04-28 11:24:00'),
(2, 'T02', 2, 'Corner', 1, '2025-04-24 11:16:42', '2025-05-02 10:55:22'),
(3, 'T03', 6, 'Center', 1, '2025-04-24 11:16:42', NULL),
(4, 'T04', 4, 'Terrace', 0, '2025-04-24 11:16:42', NULL),
(5, 'T05', 8, 'VIP Section', 1, '2025-04-24 11:16:42', NULL);

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
