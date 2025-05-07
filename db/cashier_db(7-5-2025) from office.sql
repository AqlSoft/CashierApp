-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07 مايو 2025 الساعة 14:11
-- إصدار الخادم: 9.1.0
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
-- بنية الجدول `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ISO 4217 currency code',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Currency name',
  `symbol` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Currency symbol',
  `symbol_position` enum('before','after') COLLATE utf8mb4_unicode_ci DEFAULT 'before' COMMENT 'Position of symbol relative to amount',
  `decimal_places` tinyint UNSIGNED DEFAULT '2' COMMENT 'Number of decimal places to display',
  `decimal_separator` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '.' COMMENT 'Decimal separator character',
  `thousands_separator` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT ',' COMMENT 'Thousands separator character',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '1 if this is the default currency',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '1 if currency is active',
  `exchange_rate` decimal(15,6) DEFAULT '1.000000' COMMENT 'Exchange rate relative to default currency',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL COMMENT 'User who created the record',
  `updated_by` int UNSIGNED DEFAULT NULL COMMENT 'User who last updated the record',
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_code_unique` (`code`),
  KEY `currencies_is_default_index` (`is_default`),
  KEY `currencies_is_active_index` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='System currencies table';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
