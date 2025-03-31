-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2025 at 02:39 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userName`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `last_login_ip`, `last_login_at`, `job_title`) VALUES
(1, 'Yosra  Ziad', 'yosra0029@gmail.com', NULL, '$2y$12$9.2mcFjTpjxTs.c27bSkh.XX9KwThZYJU/5ALcobIfh6LrCFPMQ4K', NULL, 1, NULL, NULL, '2025-02-05 11:37:40', '2025-02-05 11:37:42', NULL, NULL, NULL),
(2, 'AtefAql', 'atefaql@gmail.com', NULL, '$2y$12$CAHgRv8PFfcw54R2dLLb7OUXTRLx62WLkc/9sa929Cyl9g71WM7rW', NULL, 1, NULL, NULL, '2025-02-05 11:40:22', '2025-02-05 11:40:22', NULL, NULL, NULL),
(3, 'AtefAql1', 'atefaql00@gmail.com', NULL, '$2y$12$95Z/r54xHMvLSmSEnhOUWerysmJrDlVDgfspFCZKGH34BE8K/O60G', NULL, 1, NULL, NULL, '2025-02-05 11:52:06', '2025-02-05 11:52:06', NULL, NULL, NULL),
(4, 'AtefAql102', 'atefaql00882@gmail.com', NULL, '$2y$12$MpQAYxEa8D.2Pwyxc2MY9uOqHcugjURiEMZHrR7qzbKTbVLEjrYRu', NULL, 1, NULL, NULL, '2025-02-05 15:33:46', '2025-02-05 15:33:47', NULL, NULL, NULL),
(5, 'ali atef', 'atefaql777@gmail.com', NULL, '$2y$12$Jh7YIsGAVsJfe8wIMYpvd.zyl.eresCKLxfEYneRDmtbuqWBLYWle', NULL, 1, NULL, NULL, '2025-02-05 15:48:52', '2025-02-05 15:48:52', NULL, NULL, NULL),
(6, 'ali atef9', 'atefaql7787@gmail.com', NULL, '$2y$12$JCyvigYwWbguLBK87UDOIOZ2sAVSwe9qZL.DqBybSXFU/ZP5Ukyvi', NULL, 1, NULL, NULL, '2025-02-05 15:50:05', '2025-02-05 15:50:05', NULL, NULL, NULL),
(7, 'yoyo', 'yoyoatef@gmail.com', NULL, '$2y$12$ut5D.T.lM99aX1sXeGcS5eSlaGDCfFvjzUcTsrqEJL6pFuAmU0Eri', NULL, 1, NULL, NULL, '2025-02-05 15:51:13', '2025-02-05 15:51:13', NULL, NULL, NULL),
(8, 'yoyo11', 'yoyoatef1@gmail.com', NULL, '$2y$12$u95ua9VMbhujVMfY10EFGu33frP/I6XRHlEHztcn1.B7Exp2qIGDa', NULL, 1, NULL, NULL, '2025-02-05 15:53:21', '2025-02-05 15:53:21', NULL, NULL, NULL),
(9, 'Yousra_20', 'atefakl80@gmail.com', NULL, '$2y$12$/qznLKZNt2iym9QWkwgNBOJjKgdMcIxfxYGIDwUa6MBU4BzAZmmL.', NULL, 1, NULL, NULL, '2025-02-06 14:03:54', '2025-02-06 14:03:54', NULL, NULL, NULL),
(10, 'Yousra_2099', 'atefakl80999@gmail.com', NULL, '$2y$12$cnp09R7JYY/HKV63NRLGoO6DqDZsVMEA0nIImbT7UkXq5UXxxD2M6', NULL, 1, NULL, NULL, '2025-02-06 14:12:58', '2025-02-06 14:12:58', NULL, NULL, NULL),
(11, 'Yousra_2', 'yousra@ziad.com', NULL, '$2y$12$HrI8F2rmiQsAYCtZjI/f8OfR4CY3pazMQY5W45k6tXd3jOaFGlz96', NULL, 0, NULL, NULL, '2025-03-05 19:46:14', NULL, NULL, NULL, NULL);

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
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_number` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_registration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parties_created_by` (`created_by`),
  KEY `fk_parties_updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_sn`, `order_date`, `customer_id`, `notes`, `created_at`, `updated_at`, `deleted_at`, `status`, `delivery_method`, `wait_no`, `POS`, `created_by`, `updated_by`) VALUES
(16, '00000001', '2025-03-18 00:00:00', 1, NULL, '2025-03-18 16:15:01', '2025-03-29 19:11:08', NULL, 3, 1, 'OUT0001', NULL, 10, 10),
(17, '00000002', '2025-03-18 00:00:00', 1, NULL, '2025-03-18 16:20:59', '2025-03-18 16:37:54', NULL, 2, NULL, NULL, NULL, 10, 10),
(18, '00000003', '2025-03-22 23:02:26', 1, NULL, '2025-03-22 20:02:26', '2025-03-31 11:27:47', NULL, 2, NULL, 'new', NULL, 10, 9),
(19, '00000004', '2025-03-23 19:51:25', 1, NULL, '2025-03-23 16:51:25', '2025-03-23 17:19:24', NULL, 2, NULL, 'new', NULL, 10, 10),
(20, '00000005', '2025-03-23 20:23:07', 1, NULL, '2025-03-23 17:23:07', '2025-03-23 17:56:53', NULL, 2, NULL, 'new', NULL, 10, 10),
(21, '00000006', '2025-03-23 20:58:03', 1, NULL, '2025-03-23 17:58:03', '2025-03-23 17:58:03', NULL, 2, NULL, 'new', NULL, 10, NULL),
(22, '00000007', '2025-03-23 21:07:02', 1, NULL, '2025-03-23 18:07:02', '2025-03-23 18:07:02', NULL, 2, NULL, 'new', NULL, 10, NULL),
(23, '00000008', '2025-03-23 21:08:51', 1, NULL, '2025-03-23 18:08:51', '2025-03-23 18:26:38', NULL, 2, NULL, 'new', NULL, 10, 10),
(24, '00000009', '2025-03-28 21:03:19', 1, NULL, '2025-03-28 18:03:19', '2025-03-30 18:27:02', NULL, 2, NULL, 'new', NULL, 10, 10),
(25, '00000010', '2025-03-29 22:08:08', 1, NULL, '2025-03-29 19:08:08', '2025-03-29 19:09:32', NULL, 3, 1, 'OUT0010', NULL, 10, 10),
(26, '00000011', '2025-03-29 22:15:33', 1, NULL, '2025-03-29 19:15:33', '2025-03-29 19:15:54', NULL, 3, 1, 'OUT0011', NULL, 10, 10),
(27, '00000012', '2025-03-29 22:17:14', 1, NULL, '2025-03-29 19:17:14', '2025-03-29 19:17:51', NULL, 3, 1, 'OUT0012', NULL, 10, 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `category_id`, `product_id`, `order_id`, `invoice_id`, `quantity`, `unit_id`, `price`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(45, 1, 1, 16, 44, 1, 1, 400.00, NULL, '2025-03-29 19:10:28', '2025-03-29 19:11:08', 10, 10),
(46, 46, 4, 16, 44, 1, 1, 700.00, NULL, '2025-03-29 19:10:33', '2025-03-29 19:11:08', 10, 10),
(47, 1, 1, 26, 45, 1, 1, 400.00, NULL, '2025-03-29 19:15:42', '2025-03-29 19:15:54', 10, 10),
(48, 1, 1, 27, 46, 1, 1, 400.00, NULL, '2025-03-29 19:17:22', '2025-03-29 19:17:51', 10, 10),
(49, 1, 3, 27, 46, 2, 1, 500.00, NULL, '2025-03-29 19:17:27', '2025-03-29 19:17:51', 10, 10),
(50, 46, 4, 27, 46, 1, 1, 700.00, NULL, '2025-03-29 19:17:31', '2025-03-29 19:17:51', 10, 10),
(51, 1, 1, 24, NULL, 3, 1, 400.00, NULL, '2025-03-30 16:40:54', '2025-03-30 18:26:31', 10, NULL),
(52, 1, 3, 24, NULL, 1, 1, 500.00, NULL, '2025-03-30 16:41:03', '2025-03-30 16:41:03', 10, NULL),
(53, 46, 4, 24, NULL, 1, 1, 700.00, NULL, '2025-03-30 18:26:32', '2025-03-30 18:26:32', 10, NULL),
(54, 46, 5, 24, NULL, 1, 1, 350.00, NULL, '2025-03-30 18:26:41', '2025-03-30 18:26:41', 10, NULL),
(55, 46, 6, 24, NULL, 1, 1, 355.00, NULL, '2025-03-30 18:26:41', '2025-03-30 18:26:41', 10, NULL),
(56, 1, 14, 24, NULL, 1, 1, 500.00, NULL, '2025-03-30 18:26:58', '2025-03-30 18:26:58', 10, NULL),
(57, 1, 15, 24, NULL, 1, 1, 500.00, NULL, '2025-03-30 18:26:59', '2025-03-30 18:26:59', 10, NULL),
(58, 1, 13, 24, NULL, 1, 1, 400.00, NULL, '2025-03-30 18:27:00', '2025-03-30 18:27:00', 10, NULL),
(59, 46, 8, 24, NULL, 1, 1, 450.00, NULL, '2025-03-30 18:27:02', '2025-03-30 18:27:02', 10, NULL),
(60, 1, 3, 18, NULL, 1, 1, 500.00, NULL, '2025-03-31 11:26:11', '2025-03-31 11:26:11', 9, NULL),
(61, 46, 4, 18, NULL, 1, 1, 700.00, NULL, '2025-03-31 11:27:47', '2025-03-31 11:27:47', 9, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `invoice_id`, `payment_method`, `amount_from`, `amount_to`, `payment_date`, `status`, `from_account`, `to_account`, `note`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, NULL, 1, NULL, NULL, '2025-03-07 21:10:02', 1, 1, 1, 'سند سلفة', '2025-03-07 18:10:02', '2025-03-07 18:10:02', 10, NULL),
(2, 4, NULL, 1, 1000.00, 1000.00, '2025-03-09 19:02:45', 1, 8, 9, 'سند سلفة', '2025-03-09 16:02:45', '2025-03-09 16:02:45', 10, NULL),
(3, 4, NULL, 1, NULL, NULL, '2025-03-09 19:04:22', 1, 1, 1, 'سند سلفة', '2025-03-09 16:04:22', '2025-03-09 16:04:22', 10, NULL),
(4, 4, NULL, 1, NULL, NULL, '2025-03-09 19:04:30', 1, 1, 1, 'سند سلفة', '2025-03-09 16:04:30', '2025-03-09 16:04:30', 10, NULL),
(5, 4, NULL, 1, NULL, NULL, '2025-03-09 19:04:38', 1, 1, 1, 'سند سلفة', '2025-03-09 16:04:38', '2025-03-09 16:04:38', 10, NULL),
(6, 4, NULL, 1, NULL, NULL, '2025-03-09 19:04:45', 1, 1, 1, 'سند سلفة', '2025-03-09 16:04:45', '2025-03-09 16:04:45', 10, NULL),
(7, 4, NULL, 1, NULL, NULL, '2025-03-09 19:05:01', 1, 1, 1, 'سند سلفة', '2025-03-09 16:05:01', '2025-03-09 16:05:01', 10, NULL),
(8, 4, NULL, 1, NULL, NULL, '2025-03-09 19:05:05', 1, 1, 1, 'سند سلفة', '2025-03-09 16:05:05', '2025-03-09 16:05:05', 10, NULL),
(9, 4, NULL, 1, NULL, NULL, '2025-03-09 19:05:12', 1, 1, 1, 'سند سلفة', '2025-03-09 16:05:12', '2025-03-09 16:05:12', 10, NULL),
(10, 5, NULL, 1, NULL, NULL, '2025-03-09 21:43:59', 1, 1, 1, 'سند سلفة', '2025-03-09 18:43:59', '2025-03-09 18:43:59', 10, NULL),
(11, 5, NULL, 1, NULL, NULL, '2025-03-09 21:44:02', 1, 1, 1, 'سند سلفة', '2025-03-09 18:44:02', '2025-03-09 18:44:02', 10, NULL),
(12, 5, NULL, 1, NULL, NULL, '2025-03-09 21:46:14', 1, 1, 1, 'سند سلفة', '2025-03-09 18:46:14', '2025-03-09 18:46:14', 10, NULL),
(13, 1, NULL, 1, NULL, NULL, '2025-03-09 23:00:43', 1, 1, 1, 'سند سلفة', '2025-03-09 20:00:43', '2025-03-09 20:00:43', 10, NULL),
(14, 1, 30, 1, NULL, NULL, '2025-03-09 23:09:38', 1, 1, 1, 'سند سلفة', '2025-03-09 20:09:38', '2025-03-09 20:09:38', 10, NULL),
(15, 1, 31, 1, NULL, NULL, '2025-03-09 23:11:51', 1, 1, 1, 'سند سلفة', '2025-03-09 20:11:51', '2025-03-09 20:11:51', 10, NULL),
(16, 1, 32, 1, NULL, NULL, '2025-03-09 23:33:45', 1, 1, 1, 'سند سلفة', '2025-03-09 20:33:45', '2025-03-09 20:33:45', 10, NULL),
(17, 6, 36, 1, 500.00, 500.00, '2025-03-11 20:19:05', 1, 1, 1, 'سند سلفة', '2025-03-11 17:19:05', '2025-03-11 17:19:05', 10, NULL),
(18, 7, 37, 1, 200.00, 1000.00, '2025-03-11 20:30:12', 1, 1, 1, 'سند سلفة', '2025-03-11 17:30:12', '2025-03-11 17:30:12', 10, NULL),
(19, 7, 38, 1, 500.00, 500.00, '2025-03-11 21:15:00', 1, 1, 1, 'سند سلفة', '2025-03-11 18:15:00', '2025-03-11 18:15:00', 10, NULL),
(20, 7, 39, 1, 500.00, 500.00, '2025-03-11 21:16:38', 1, 1, 1, 'سند سلفة', '2025-03-11 18:16:38', '2025-03-11 18:16:38', 10, NULL),
(21, 8, 40, 1, 100.00, 200.00, '2025-03-12 20:58:21', 1, 1, 1, 'سند سلفة', '2025-03-12 17:58:21', '2025-03-12 17:58:21', 10, NULL),
(22, 1, 42, 1, NULL, NULL, '2025-03-12 22:18:13', 1, NULL, NULL, 'سند سلفة', '2025-03-12 19:18:13', '2025-03-12 19:18:13', 10, NULL),
(23, 11, NULL, 1, NULL, NULL, '2025-03-17 21:39:55', 1, NULL, NULL, 'سند سلفة', '2025-03-17 18:39:55', '2025-03-17 18:39:55', 10, NULL),
(24, 11, NULL, 1, NULL, NULL, '2025-03-17 21:42:38', 1, NULL, NULL, 'سند سلفة', '2025-03-17 18:42:38', '2025-03-17 18:42:38', 10, NULL),
(25, 11, NULL, 1, NULL, NULL, '2025-03-17 21:44:49', 1, NULL, NULL, 'سند سلفة', '2025-03-17 18:44:49', '2025-03-17 18:44:49', 10, NULL),
(26, 11, NULL, 1, NULL, NULL, '2025-03-17 21:47:35', 1, NULL, NULL, 'سند سلفة', '2025-03-17 18:47:35', '2025-03-17 18:47:35', 10, NULL),
(27, 12, NULL, 1, NULL, NULL, '2025-03-17 22:09:27', 1, NULL, NULL, 'سند سلفة', '2025-03-17 19:09:27', '2025-03-17 19:09:27', 10, NULL),
(28, 13, NULL, 1, NULL, NULL, '2025-03-18 12:26:51', 1, NULL, NULL, 'سند سلفة', '2025-03-18 09:26:51', '2025-03-18 09:26:51', 10, NULL),
(29, 14, NULL, 1, NULL, NULL, '2025-03-18 18:43:06', 1, NULL, NULL, 'سند سلفة', '2025-03-18 15:43:06', '2025-03-18 15:43:06', 10, NULL),
(30, 16, NULL, 1, NULL, NULL, '2025-03-18 19:15:36', 1, NULL, NULL, 'سند سلفة', '2025-03-18 16:15:36', '2025-03-18 16:15:36', 10, NULL),
(31, 16, NULL, 1, NULL, NULL, '2025-03-18 19:16:15', 1, NULL, NULL, 'سند سلفة', '2025-03-18 16:16:15', '2025-03-18 16:16:15', 10, NULL),
(32, 25, 43, 1, NULL, NULL, '2025-03-29 22:09:32', 1, NULL, NULL, 'سند سلفة', '2025-03-29 19:09:32', '2025-03-29 19:09:32', 10, NULL),
(33, 16, 44, 1, NULL, NULL, '2025-03-29 22:11:08', 1, NULL, NULL, 'سند سلفة', '2025-03-29 19:11:08', '2025-03-29 19:11:08', 10, NULL),
(34, 26, 45, 1, NULL, NULL, '2025-03-29 22:15:54', 1, NULL, NULL, 'سند سلفة', '2025-03-29 19:15:54', '2025-03-29 19:15:54', 10, NULL),
(35, 27, 46, 1, NULL, NULL, '2025-03-29 22:17:51', 1, NULL, NULL, 'سند سلفة', '2025-03-29 19:17:51', '2025-03-29 19:17:51', 10, NULL);

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `invoice_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_number` (`invoice_number`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`id`, `order_sn`, `client_id`, `vat_number`, `vat_amount`, `due_date`, `payment_method`, `payment_date`, `order_id`, `total_amount`, `amount`, `invoice_date`, `type`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `invoice_number`) VALUES
(43, NULL, NULL, '0000000001', 60.00, '2025-03-29', 1, '2025-03-29', 25, 460.00, 400.00, '2025-03-29 00:00:00', 'sales', 0, '2025-03-29 19:09:31', '2025-03-29 19:09:31', 10, NULL, 'INV-202503-0001'),
(44, NULL, NULL, '0000000001', 165.00, '2025-03-29', 1, '2025-03-29', 16, 1265.00, 1100.00, '2025-03-29 00:00:00', 'sales', 0, '2025-03-29 19:11:08', '2025-03-29 19:11:08', 10, NULL, 'INV-202503-0002'),
(45, NULL, NULL, '0000000001', 60.00, '2025-03-29', 1, '2025-03-29', 26, 460.00, 400.00, '2025-03-29 00:00:00', 'sales', 0, '2025-03-29 19:15:54', '2025-03-29 19:15:54', 10, NULL, 'INV-202503-0003'),
(46, NULL, 1, '0000000001', 315.00, '2025-03-29', 1, '2025-03-29', 27, 2415.00, 2100.00, '2025-03-29 00:00:00', 'sales', 0, '2025-03-29 19:17:51', '2025-03-29 19:17:51', 10, NULL, 'INV-202503-0004');

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
('CBAdSZeBBmOWoWkEK3TDMITJGTlU3TnAnkowvocT', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVEFqU081SG5HeUZJalRPdVBlNUZYSHNnMWhFSnQwZ1VtaVlPcnhHdCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovL3d3dy5jYXNoaWVyLmNvbS9hZG1pbi9vcmRlcnMvaW5kZXgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0OToiaHR0cDovL3d3dy5jYXNoaWVyLmNvbS9hZG1pbi9vcmRlckl0ZW1zL2NyZWF0ZS8xOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1743431268),
('sxtEZyONgdGYtHQMdwpoAP5EgJh153ryss7teqct', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieDJxQU8xTEdTNnVhUVhjSkNMcm1nSnk4TFNFNk5FaHNka3FsOUk3MSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NzoiaHR0cDovL3d3dy5jYXNoaWVyLmNvbS9hZG1pbi9pbnZvaWNlcy9jcmVhdGUvMjQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cDovL3d3dy5jYXNoaWVyLmNvbS9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1743427673);

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
