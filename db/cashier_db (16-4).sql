-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2025 at 10:17 PM
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
  `job_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userName`, `email`, `role_name`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `last_login_ip`, `last_login_at`, `job_title`) VALUES
(1, 'Yosra  Ziad', 'yosra0029@gmail.com', 'cashier', NULL, '$2y$12$9.2mcFjTpjxTs.c27bSkh.XX9KwThZYJU/5ALcobIfh6LrCFPMQ4K', NULL, 1, NULL, NULL, '2025-02-05 11:37:40', '2025-02-05 11:37:42', NULL, NULL, 'cashier2'),
(2, 'AtefAql', 'atefaql@gmail.com', 'admin', NULL, '$2y$12$/qznLKZNt2iym9QWkwgNBOJjKgdMcIxfxYGIDwUa6MBU4BzAZmmL.', NULL, 1, NULL, NULL, '2025-02-05 11:40:22', '2025-02-05 11:40:22', NULL, NULL, 'cashier1'),
(3, 'AtefAql1', 'atefaql00@gmail.com', 'worker', NULL, '$2y$12$95Z/r54xHMvLSmSEnhOUWerysmJrDlVDgfspFCZKGH34BE8K/O60G', NULL, 1, NULL, NULL, '2025-02-05 11:52:06', '2025-02-05 11:52:06', NULL, NULL, 'cashier3'),
(4, 'AtefAql102', 'atefaql00882@gmail.com', 'worker', NULL, '$2y$12$MpQAYxEa8D.2Pwyxc2MY9uOqHcugjURiEMZHrR7qzbKTbVLEjrYRu', NULL, 1, NULL, NULL, '2025-02-05 15:33:46', '2025-02-05 15:33:47', NULL, NULL, 'cashier4'),
(5, 'ali atef', 'atefaql777@gmail.com', 'cashier', NULL, '$2y$12$Jh7YIsGAVsJfe8wIMYpvd.zyl.eresCKLxfEYneRDmtbuqWBLYWle', NULL, 1, NULL, NULL, '2025-02-05 15:48:52', '2025-02-05 15:48:52', NULL, NULL, 'cashier5'),
(6, 'ali atef9', 'atefaql7787@gmail.com', 'worker', NULL, '$2y$12$JCyvigYwWbguLBK87UDOIOZ2sAVSwe9qZL.DqBybSXFU/ZP5Ukyvi', NULL, 1, NULL, NULL, '2025-02-05 15:50:05', '2025-02-05 15:50:05', NULL, NULL, 'cashier6'),
(7, 'yoyo', 'yoyoatef@gmail.com', 'cashier', NULL, '$2y$12$ut5D.T.lM99aX1sXeGcS5eSlaGDCfFvjzUcTsrqEJL6pFuAmU0Eri', NULL, 1, NULL, NULL, '2025-02-05 15:51:13', '2025-02-05 15:51:13', NULL, NULL, 'cashier8'),
(8, 'yoyo11', 'yoyoatef1@gmail.com', 'cashier', NULL, '$2y$12$u95ua9VMbhujVMfY10EFGu33frP/I6XRHlEHztcn1.B7Exp2qIGDa', NULL, 1, NULL, NULL, '2025-02-05 15:53:21', '2025-02-05 15:53:21', NULL, NULL, 'cashier10'),
(9, 'Yousra_20', 'atefakl80@gmail.com', 'super_admin', NULL, '$2y$12$/qznLKZNt2iym9QWkwgNBOJjKgdMcIxfxYGIDwUa6MBU4BzAZmmL.', NULL, 1, NULL, NULL, '2025-02-06 14:03:54', '2025-02-06 14:03:54', NULL, NULL, 'cashier20'),
(10, 'Yousra_2099', 'atefakl80999@gmail.com', 'worker', NULL, '$2y$12$cnp09R7JYY/HKV63NRLGoO6DqDZsVMEA0nIImbT7UkXq5UXxxD2M6', NULL, 1, NULL, NULL, '2025-02-06 14:12:58', '2025-02-06 14:12:58', NULL, NULL, 'cashier88'),
(11, 'Yousra_2', 'yousra@ziad.com', 'worker', NULL, '$2y$12$HrI8F2rmiQsAYCtZjI/f8OfR4CY3pazMQY5W45k6tXd3jOaFGlz96', NULL, 0, NULL, NULL, '2025-03-05 19:46:14', NULL, NULL, NULL, NULL),
(12, 'AlZaher', 'mohamed@ali.com', 'worker', NULL, '$2y$12$ILUF3SpWVS3eg5pj2I/ILOGjRY1GolfstdaxQLU7jKLMzE2KsnZ.i', NULL, 1, 9, 9, '2025-04-07 13:14:54', '2025-04-07 13:14:54', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_profiles`
--

INSERT INTO `admin_profiles` (`id`, `admin_id`, `first_name`, `last_name`, `country`, `image`, `city`, `address`, `phone`, `created_at`, `updated_at`, `id_number`) VALUES
(1, 1, 'Yosra  Ziad', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(2, 2, 'AtefAql', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(3, 3, 'AtefAql1', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(4, 4, 'AtefAql102', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(5, 5, 'ali atef', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(6, 6, 'ali atef9', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(7, 7, 'yoyo', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(8, 8, 'yoyo11', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(9, 9, 'Yousra_20', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(10, 10, 'Yousra_2099', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(11, 11, 'Yousra_2', NULL, 150, NULL, NULL, NULL, NULL, '2025-04-07 14:16:24', '2025-04-07 14:16:24', NULL),
(12, 12, 'Mohamed', 'Ali Abdelzaher', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:14:54', '2025-04-07 16:14:54', NULL),
(13, 13, 'Mokhtar', 'Nazmi', NULL, NULL, NULL, NULL, NULL, '2025-04-07 16:17:16', '2025-04-07 16:17:16', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"36507c77-a161-4cb7-8c1d-aaa3e4e6eff6\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:61;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744751550, 1744751550),
(2, 'default', '{\"uuid\":\"573b1671-3f53-49e5-81cd-a7557b9a9b57\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:61;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744751553, 1744751553),
(3, 'default', '{\"uuid\":\"4811e23a-2a2c-42b4-ad3d-055ecf9e95a3\",\"displayName\":\"App\\\\Events\\\\OrderUpdated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:62;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744754726, 1744754726),
(4, 'default', '{\"uuid\":\"84a0131a-d0c7-4c21-a62a-da627e83eee0\",\"displayName\":\"App\\\\Listeners\\\\SendOrderUpdateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":20:{s:5:\\\"class\\\";s:41:\\\"App\\\\Listeners\\\\SendOrderUpdateNotification\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\OrderUpdated\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:62;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1744754726, 1744754726);

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
  `shift_id` bigint UNSIGNED DEFAULT NULL,
  `prepared_by` bigint UNSIGNED DEFAULT NULL,
  `preparation_started_at` datetime DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parties_created_by` (`created_by`),
  KEY `fk_parties_updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_sn`, `order_date`, `customer_id`, `notes`, `created_at`, `updated_at`, `deleted_at`, `status`, `delivery_method`, `wait_no`, `POS`, `shift_id`, `prepared_by`, `preparation_started_at`, `created_by`, `updated_by`) VALUES
(58, '00000001', '2025-04-15 14:11:41', 1, NULL, '2025-04-15 11:11:41', '2025-04-14 21:00:00', NULL, 5, NULL, 'OUT0001', NULL, 18, 9, '2025-04-15 18:02:06', 9, 9),
(59, '00000002', '2025-04-15 14:12:25', 1, NULL, '2025-04-15 11:12:25', '2025-04-14 21:00:00', NULL, 5, NULL, 'OUT0002', NULL, 18, 9, '2025-04-15 14:24:29', 9, 9),
(60, '00000003', '2025-04-15 14:15:25', 1, NULL, '2025-04-15 11:15:25', '2025-04-14 21:00:00', NULL, 5, NULL, 'OUT0003', NULL, 18, 9, '2025-04-15 18:52:13', 9, 9),
(61, '00000004', '2025-04-15 14:20:56', 1, NULL, '2025-04-15 11:20:56', '2025-04-14 21:00:00', NULL, 3, NULL, 'OUT0004', NULL, 18, 9, '2025-04-15 20:25:24', 9, 9),
(62, '00000005', '2025-04-15 18:22:51', 1, NULL, '2025-04-15 15:22:51', '2025-04-14 21:00:00', NULL, 3, NULL, 'OUT0005', NULL, 18, 9, '2025-04-15 20:27:52', 9, 9),
(63, '00000006', '2025-04-15 18:23:34', 1, NULL, '2025-04-15 15:23:34', '2025-04-15 17:28:44', NULL, 2, NULL, 'OUT0006', NULL, 18, 9, '2025-04-15 20:28:44', 9, 9),
(64, '00000007', '2025-04-15 18:23:37', 1, NULL, '2025-04-15 15:23:37', '2025-04-15 15:23:37', NULL, 3, NULL, 'new', NULL, 18, NULL, NULL, 9, NULL),
(65, '00000008', '2025-04-15 18:24:03', 1, NULL, '2025-04-15 15:24:03', '2025-04-15 15:24:03', NULL, 3, NULL, 'new', NULL, 18, NULL, NULL, 9, NULL),
(66, '00000009', '2025-04-15 18:24:20', 1, NULL, '2025-04-15 15:24:20', '2025-04-15 15:24:20', NULL, 3, NULL, 'new', NULL, 18, NULL, NULL, 9, NULL),
(67, '00000010', '2025-04-15 19:14:05', 1, NULL, '2025-04-15 16:14:05', '2025-04-15 16:14:05', NULL, 2, NULL, 'new', NULL, 18, NULL, NULL, 9, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `category_id`, `product_id`, `order_id`, `invoice_id`, `quantity`, `unit_id`, `price`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(69, 1, 1, 22, 57, 1, 1, 400.00, NULL, '2025-03-31 16:50:34', '2025-03-31 17:31:53', 9, 9),
(70, 1, 3, 22, 57, 2, 1, 500.00, NULL, '2025-03-31 16:51:38', '2025-03-31 17:31:53', 9, 9),
(71, 46, 4, 22, 57, 1, 1, 700.00, NULL, '2025-03-31 17:03:14', '2025-03-31 17:31:53', 9, 9),
(72, 1, 1, 20, NULL, 1, 1, 400.00, NULL, '2025-04-05 15:57:09', '2025-04-05 15:57:09', 9, NULL),
(73, 1, 1, 32, NULL, 1, 1, 400.00, NULL, '2025-04-11 12:16:13', '2025-04-11 12:16:13', 9, NULL),
(74, 1, 3, 32, NULL, 1, 1, 500.00, NULL, '2025-04-11 12:16:18', '2025-04-11 12:16:18', 9, NULL),
(75, 46, 4, 32, NULL, 1, 1, 700.00, NULL, '2025-04-11 12:18:05', '2025-04-11 12:18:05', 9, NULL),
(76, 46, 5, 32, NULL, 1, 1, 350.00, NULL, '2025-04-11 12:18:52', '2025-04-11 12:18:52', 9, NULL),
(77, 1, 1, 33, NULL, 1, 1, 400.00, NULL, '2025-04-11 14:05:22', '2025-04-11 14:05:22', 9, NULL),
(78, 1, 1, 46, 60, 1, 1, 400.00, NULL, '2025-04-11 15:20:55', '2025-04-11 15:21:12', 9, 9),
(79, 1, 3, 46, 60, 1, 1, 500.00, NULL, '2025-04-11 15:20:58', '2025-04-11 15:21:12', 9, 9),
(80, 1, 1, 50, 62, 1, 1, 400.00, NULL, '2025-04-12 11:43:47', '2025-04-13 17:38:36', 9, 9),
(81, 1, 3, 50, 62, 1, 1, 500.00, NULL, '2025-04-12 11:43:52', '2025-04-13 17:38:36', 9, 9),
(82, 46, 4, 50, 62, 1, 1, 700.00, NULL, '2025-04-13 17:38:23', '2025-04-13 17:38:36', 9, 9),
(83, 46, 5, 50, 62, 1, 1, 350.00, NULL, '2025-04-13 17:38:25', '2025-04-13 17:38:36', 9, 9),
(84, 1, 1, 58, 63, 1, 1, 400.00, NULL, '2025-04-15 11:11:51', '2025-04-15 11:12:06', 9, 9),
(85, 1, 1, 59, 64, 1, 1, 400.00, NULL, '2025-04-15 11:12:38', '2025-04-15 11:20:21', 9, 9),
(86, 1, 1, 60, 67, 1, 1, 400.00, NULL, '2025-04-15 15:24:45', '2025-04-15 15:26:28', 9, 9),
(87, 1, 1, 61, 69, 1, 1, 400.00, NULL, '2025-04-15 16:14:23', '2025-04-15 16:15:29', 9, 9),
(88, 1, 1, 62, 70, 1, 1, 400.00, NULL, '2025-04-15 16:16:26', '2025-04-15 16:16:39', 9, 9),
(89, 1, 1, 63, 71, 1, 1, 400.00, NULL, '2025-04-15 16:17:02', '2025-04-15 16:17:14', 9, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `invoice_id`, `payment_method`, `amount_from`, `amount_to`, `payment_date`, `status`, `from_account`, `to_account`, `note`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(42, 22, 53, 1, NULL, NULL, '2025-03-31 19:50:57', 1, NULL, NULL, 'سند سلفة', '2025-03-31 16:50:57', '2025-03-31 16:50:57', 9, NULL),
(43, 22, 54, 1, NULL, NULL, '2025-03-31 19:51:57', 1, NULL, NULL, 'سند سلفة', '2025-03-31 16:51:57', '2025-03-31 16:51:57', 9, NULL),
(44, 22, 55, 1, NULL, NULL, '2025-03-31 20:04:27', 1, NULL, NULL, 'سند سلفة', '2025-03-31 17:04:27', '2025-03-31 17:04:27', 9, NULL),
(45, 22, 56, 1, NULL, NULL, '2025-03-31 20:04:46', 1, NULL, NULL, 'سند سلفة', '2025-03-31 17:04:46', '2025-03-31 17:04:46', 9, NULL),
(46, 22, 57, 1, NULL, NULL, '2025-03-31 20:31:53', 1, NULL, NULL, 'سند سلفة', '2025-03-31 17:31:53', '2025-03-31 17:31:53', 9, NULL),
(47, 24, 58, 1, NULL, NULL, '2025-04-10 21:54:06', 1, NULL, NULL, 'سند سلفة', '2025-04-10 18:54:06', '2025-04-10 18:54:06', 9, NULL),
(48, 46, 59, 1, NULL, NULL, '2025-04-11 18:21:11', 1, NULL, NULL, 'سند سلفة', '2025-04-11 15:21:12', '2025-04-11 15:21:12', 9, NULL),
(49, 46, 60, 1, NULL, NULL, '2025-04-11 18:21:12', 1, NULL, NULL, 'سند سلفة', '2025-04-11 15:21:12', '2025-04-11 15:21:12', 9, NULL),
(50, 50, 61, 1, NULL, NULL, '2025-04-12 14:44:07', 1, NULL, NULL, 'سند سلفة', '2025-04-12 11:44:07', '2025-04-12 11:44:07', 9, NULL),
(51, 50, 62, 1, NULL, NULL, '2025-04-13 20:38:37', 1, NULL, NULL, 'سند سلفة', '2025-04-13 17:38:37', '2025-04-13 17:38:37', 9, NULL),
(52, 58, 63, 1, NULL, NULL, '2025-04-15 14:12:08', 1, NULL, NULL, 'سند سلفة', '2025-04-15 11:12:08', '2025-04-15 11:12:08', 9, NULL),
(53, 59, 64, 1, NULL, NULL, '2025-04-15 14:20:21', 1, NULL, NULL, 'سند سلفة', '2025-04-15 11:20:21', '2025-04-15 11:20:21', 9, NULL),
(54, 60, 65, 1, NULL, NULL, '2025-04-15 18:25:54', 1, NULL, NULL, 'سند سلفة', '2025-04-15 15:25:54', '2025-04-15 15:25:54', 9, NULL),
(55, 60, 66, 1, NULL, NULL, '2025-04-15 18:26:28', 1, NULL, NULL, 'سند سلفة', '2025-04-15 15:26:28', '2025-04-15 15:26:28', 9, NULL),
(56, 60, 67, 1, NULL, NULL, '2025-04-15 18:26:28', 1, NULL, NULL, 'سند سلفة', '2025-04-15 15:26:28', '2025-04-15 15:26:28', 9, NULL),
(57, 61, 68, 1, NULL, NULL, '2025-04-15 19:15:25', 1, NULL, NULL, 'سند سلفة', '2025-04-15 16:15:25', '2025-04-15 16:15:25', 9, NULL),
(58, 61, 69, 1, NULL, NULL, '2025-04-15 19:15:29', 1, NULL, NULL, 'سند سلفة', '2025-04-15 16:15:29', '2025-04-15 16:15:29', 9, NULL),
(59, 62, 70, 1, NULL, NULL, '2025-04-15 19:16:39', 1, NULL, NULL, 'سند سلفة', '2025-04-15 16:16:39', '2025-04-15 16:16:39', 9, NULL),
(60, 63, 71, 1, NULL, NULL, '2025-04-15 19:17:14', 1, NULL, NULL, 'سند سلفة', '2025-04-15 16:17:14', '2025-04-15 16:17:14', 9, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`id`, `order_sn`, `client_id`, `vat_number`, `vat_amount`, `due_date`, `payment_method`, `payment_date`, `order_id`, `total_amount`, `amount`, `invoice_date`, `type`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `invoice_number`) VALUES
(63, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 58, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 11:12:06', '2025-04-15 11:12:06', 9, NULL, 'INV-202504-0001'),
(64, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 59, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 11:20:21', '2025-04-15 11:20:21', 9, NULL, 'INV-202504-0002'),
(65, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 60, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 15:25:43', '2025-04-15 15:25:43', 9, NULL, 'INV-202504-0003'),
(66, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 60, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 15:26:27', '2025-04-15 15:26:27', 9, NULL, 'INV-202504-0004'),
(67, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 60, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 15:26:27', '2025-04-15 15:26:27', 9, NULL, 'INV-202504-0005'),
(68, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 61, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 16:15:25', '2025-04-15 16:15:25', 9, NULL, 'INV-202504-0006'),
(69, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 61, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 16:15:29', '2025-04-15 16:15:29', 9, NULL, 'INV-202504-0007'),
(70, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 62, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 16:16:39', '2025-04-15 16:16:39', 9, NULL, 'INV-202504-0008'),
(71, NULL, 1, '0000000001', 0.15, '2025-04-15', 1, '2025-04-15', 63, 400.15, 400.00, '2025-04-15 00:00:00', 'sales', 0, '2025-04-15 16:17:14', '2025-04-15 16:17:14', 9, NULL, 'INV-202504-0009');

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
('4EY66UvwshmicNzRnKMRv51e87p0fefJACZqwB3g', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicmJLSm1OT0JodGFPRDBnMW96bzVQVWZKWVg0RndNYktXMjlJQVVmOSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cDovL3d3dy5jYXNoaWVybmV3LmNvbS9hZG1pbi9raXRjaGVuL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vd3d3LmNhc2hpZXJuZXcuY29tL2FkbWluL2tpdGNoZW4vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O30=', 1744755267);

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `monybox_id`, `admin_id`, `opening_balance`, `closing_balance`, `start_time`, `end_time`, `status`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(12, 2, 2, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-06 17:09:37', 0, NULL, '2025-04-05 15:45:12', '2025-04-06 14:09:37', 9, 9),
(11, 1, 1, 2.00, NULL, '2025-04-05 00:00:00', '2025-04-05 19:25:22', 0, NULL, '2025-04-05 15:36:12', '2025-04-05 16:25:22', 9, 9),
(13, 1, 1, 2.00, NULL, '2025-04-11 00:00:00', NULL, 1, NULL, '2025-04-11 11:21:45', '2025-04-11 11:21:45', 9, NULL),
(14, 2, 9, 1.00, NULL, '2025-04-11 00:00:00', '2025-04-11 14:51:32', 0, NULL, '2025-04-11 11:25:05', '2025-04-11 11:51:32', 9, 9),
(15, 3, 9, 2.00, NULL, '2025-04-11 00:00:00', '2025-04-11 18:04:36', 0, NULL, '2025-04-11 11:52:04', '2025-04-11 15:04:36', 9, 9),
(16, 3, 9, 2.00, NULL, '2025-04-11 00:00:00', '2025-04-11 18:54:50', 0, NULL, '2025-04-11 15:05:55', '2025-04-11 15:54:50', 9, 9),
(17, 4, 2, 2.00, NULL, '2025-04-11 00:00:00', '2025-04-11 18:54:46', 0, NULL, '2025-04-11 15:24:19', '2025-04-11 15:54:46', 9, 9),
(18, 4, 9, 2.00, NULL, '2025-04-11 00:00:00', NULL, 1, NULL, '2025-04-11 15:55:10', '2025-04-11 15:55:10', 9, NULL),
(19, 2, 10, 3.00, NULL, '2025-04-11 00:00:00', NULL, 1, NULL, '2025-04-11 16:23:22', '2025-04-11 16:23:22', 10, NULL);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
