-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 09:30 AM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_220036506_ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`u-220036506`@`localhost` PROCEDURE `InsertProductSizes` ()   BEGIN
    DECLARE productID INT DEFAULT 2;
    DECLARE sizeID INT;
    
    WHILE productID <= 16 DO
        SET sizeID = 1;
        WHILE sizeID <= 6 DO
            INSERT INTO product_size (product_id, size_id, Quantity) VALUES (productID, sizeID, 100);
            SET sizeID = sizeID + 1;
        END WHILE;
        SET productID = productID + 1;
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `phone`, `address`, `city`, `state`, `postcode`, `country`, `created_at`, `updated_at`) VALUES
(1, 3, '+4474930121', '291-295 Corporation Street', 'Birmingham', 'West Midlands', 'B4 7DP', 'United Kingdom', '2024-03-22 13:57:31', '2024-03-24 22:37:05'),
(2, 1, '', 'birmingham aston university', 'birmingham', NULL, 'b723ye', 'uk', '2024-03-24 14:44:05', '2024-03-25 03:30:28'),
(3, 5, '', 'hi', 'bhx', 'dai', 'djiua', 'jduajwuyuy', '2024-03-25 02:25:06', '2024-03-25 05:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int UNSIGNED NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `created_at`, `updated_at`) VALUES
(3, 'T-shirts', '2024-03-22 16:48:29', '2024-03-22 16:48:29'),
(4, 'Tracksuits', '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(5, 'Jackets', '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(6, 'Shoes', '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(7, 'Bags', '2024-03-22 16:48:30', '2024-03-22 16:48:30');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_11_27_101346_create_users_table', 1),
(3, '2023_11_27_121013_create_password_reset_tokens_table', 1),
(4, '2023_11_27_141102_create_password_resets_table', 1),
(5, '2023_11_28_102941_create_failed_jobs_table', 1),
(6, '2023_11_28_113414_create_personal_access_tokens_table', 1),
(7, '2023_11_28_135309_create_categories_table', 1),
(8, '2023_11_29_123923_create_customers_table', 1),
(9, '2023_11_30_101155_create_products_table', 1),
(10, '2023_11_30_115430_create_orders_table', 1),
(11, '2023_11_30_121115_create_orderdetails_table', 1),
(12, '2024_03_12_145046_add__user_i_d_to_orders_table', 1),
(13, '2024_03_18_140930_remove_last_name_from_customers', 1),
(14, '2024_03_18_153045_create_reviews_table', 1),
(15, '2024_03_18_172210_add_rating_to_reviews_table', 1),
(16, '2024_03_23_161650_create_registration_codes_table', 2),
(17, '2024_03_23_173911_create_cloth_sizes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int UNSIGNED NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `Status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `UserID` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `TotalAmount`, `Status`, `created_at`, `updated_at`, `UserID`) VALUES
(1, '2024-03-22', 110.00, 'Cancelled', '2024-03-22 14:50:11', '2024-03-25 01:43:19', 3),
(2, '2024-03-22', 220.00, 'Delivered', '2024-03-22 15:37:48', '2024-03-23 01:04:24', 2),
(3, '2024-03-22', 110.00, 'Returning', '2024-03-22 15:54:42', '2024-03-25 01:54:58', 3),
(4, '2024-03-22', 51.98, 'Pending', '2024-03-22 16:56:11', '2024-03-22 16:56:11', 3),
(5, '2024-03-22', 198.97, 'Pending', '2024-03-22 16:58:51', '2024-03-22 16:58:51', 4),
(6, '2024-03-22', 15.99, 'Pending', '2024-03-22 17:25:19', '2024-03-22 17:25:19', 3),
(7, '2024-03-22', 10.99, 'Pending', '2024-03-22 18:53:49', '2024-03-22 18:53:49', 3),
(8, '2024-03-22', 15.99, 'Pending', '2024-03-22 19:51:07', '2024-03-22 19:51:07', 3),
(9, '2024-03-22', 15.99, 'Pending', '2024-03-22 21:14:55', '2024-03-22 21:14:55', 3),
(10, '2024-03-23', 10.99, 'Pending', '2024-03-23 07:42:56', '2024-03-23 07:42:56', 4),
(11, '2024-03-23', 10.99, 'Pending', '2024-03-23 07:46:23', '2024-03-23 07:46:23', 4),
(12, '2024-03-23', 10.99, 'Pending', '2024-03-23 07:47:09', '2024-03-23 07:47:09', 4),
(13, '2024-03-23', 10.99, 'Pending', '2024-03-23 07:47:11', '2024-03-23 07:47:11', 4),
(14, '2024-03-23', 10.99, 'Pending', '2024-03-23 07:47:33', '2024-03-23 07:47:33', 4),
(17, '2024-03-23', 10.99, 'Pending', '2024-03-23 07:51:18', '2024-03-23 07:51:18', 4),
(18, '2024-03-23', 15.99, 'Pending', '2024-03-23 07:54:57', '2024-03-23 07:54:57', 4),
(19, '2024-03-23', 10.99, 'Pending', '2024-03-23 07:55:11', '2024-03-23 07:55:11', 4),
(22, '2024-03-23', 10.99, 'Pending', '2024-03-23 08:04:45', '2024-03-23 08:04:45', 4),
(23, '2024-03-23', 110.00, 'Pending', '2024-03-23 08:09:01', '2024-03-23 08:09:01', 4),
(24, '2024-03-23', 7.99, 'Pending', '2024-03-23 09:17:41', '2024-03-23 09:17:41', 4),
(25, '2024-03-23', 26.98, 'Pending', '2024-03-23 09:44:32', '2024-03-23 09:44:32', 3),
(26, '2024-03-23', 10.99, 'Pending', '2024-03-23 09:47:26', '2024-03-23 09:47:26', 4),
(27, '2024-03-23', 10.99, 'Pending', '2024-03-23 09:48:28', '2024-03-23 09:48:28', 4),
(28, '2024-03-23', 26.98, 'Pending', '2024-03-23 09:49:22', '2024-03-23 09:49:22', 3),
(29, '2024-03-23', 142.98, 'Pending', '2024-03-23 10:05:21', '2024-03-23 10:05:21', 3),
(30, '2024-03-23', 51.98, 'Pending', '2024-03-23 10:20:35', '2024-03-23 10:20:35', 3),
(31, '2024-03-23', 10.99, 'Pending', '2024-03-23 11:45:14', '2024-03-23 11:45:14', 3),
(32, '2024-03-23', 26.98, 'Pending', '2024-03-23 11:48:27', '2024-03-23 11:48:27', 3),
(33, '2024-03-23', 10.99, 'Pending', '2024-03-23 12:06:59', '2024-03-23 12:06:59', 3),
(34, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:18:39', '2024-03-23 13:18:39', 3),
(35, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:18:57', '2024-03-23 13:18:57', 3),
(36, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:18:59', '2024-03-23 13:18:59', 3),
(37, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:19:01', '2024-03-23 13:19:01', 3),
(38, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:19:02', '2024-03-23 13:19:02', 3),
(39, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:19:06', '2024-03-23 13:19:06', 3),
(40, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:21:22', '2024-03-23 13:21:22', 3),
(41, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:22:06', '2024-03-23 13:22:06', 3),
(42, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:22:07', '2024-03-23 13:22:07', 3),
(43, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:22:08', '2024-03-23 13:22:08', 3),
(44, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:23:52', '2024-03-23 13:23:52', 3),
(45, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:24:08', '2024-03-23 13:24:08', 3),
(46, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:24:10', '2024-03-23 13:24:10', 3),
(47, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:24:11', '2024-03-23 13:24:11', 3),
(48, '2024-03-23', 110.00, 'Pending', '2024-03-23 13:26:19', '2024-03-23 13:26:19', 3),
(49, '2024-03-23', 110.00, 'Pending', '2024-03-23 13:32:44', '2024-03-23 13:32:44', 3),
(50, '2024-03-23', 15.99, 'Pending', '2024-03-23 13:38:11', '2024-03-23 13:38:11', 3),
(51, '2024-03-23', 16.99, 'Pending', '2024-03-23 13:44:45', '2024-03-23 13:44:45', 3),
(52, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:49:12', '2024-03-23 13:49:12', 3),
(53, '2024-03-23', 110.00, 'Pending', '2024-03-23 13:52:57', '2024-03-23 13:52:57', 3),
(54, '2024-03-23', 19.99, 'Pending', '2024-03-23 13:54:08', '2024-03-23 13:54:08', 2),
(55, '2024-03-23', 17.99, 'Pending', '2024-03-23 13:55:41', '2024-03-23 13:55:41', 3),
(56, '2024-03-23', 16.99, 'Pending', '2024-03-23 13:55:54', '2024-03-23 13:55:54', 2),
(57, '2024-03-23', 10.99, 'Pending', '2024-03-23 13:57:10', '2024-03-23 13:57:10', 3),
(58, '2024-03-23', 71.98, 'Pending', '2024-03-23 14:02:45', '2024-03-23 14:02:45', 3),
(59, '2024-03-23', 10.99, 'Pending', '2024-03-23 14:05:49', '2024-03-23 14:05:49', 3),
(60, '2024-03-23', 15.99, 'Pending', '2024-03-23 14:06:56', '2024-03-23 14:06:56', 2),
(61, '2024-03-23', 10.99, 'Pending', '2024-03-23 14:07:15', '2024-03-23 14:07:15', 3),
(62, '2024-03-23', 35.99, 'Pending', '2024-03-23 14:10:59', '2024-03-23 14:10:59', 3),
(63, '2024-03-23', 63.98, 'Pending', '2024-03-23 14:16:17', '2024-03-23 14:16:17', 3),
(64, '2024-03-23', 110.00, 'Pending', '2024-03-23 14:26:33', '2024-03-23 14:26:33', 3),
(65, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:05:06', '2024-03-23 21:05:06', 2),
(66, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:07:03', '2024-03-23 21:07:03', 2),
(67, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:11:00', '2024-03-23 21:11:00', 2),
(68, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:12:32', '2024-03-23 21:12:32', 2),
(69, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:14:28', '2024-03-23 21:14:28', 2),
(70, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:15:08', '2024-03-23 21:15:08', 2),
(71, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:15:13', '2024-03-23 21:15:13', 2),
(72, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:17:47', '2024-03-23 21:17:47', 2),
(73, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:22:04', '2024-03-23 21:22:04', 2),
(74, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:25:59', '2024-03-23 21:25:59', 2),
(75, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:27:24', '2024-03-23 21:27:24', 2),
(76, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:30:13', '2024-03-23 21:30:13', 2),
(77, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:37:42', '2024-03-23 21:37:42', 2),
(78, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:43:47', '2024-03-23 21:43:47', 2),
(79, '2024-03-23', 10.99, 'Pending', '2024-03-23 21:44:04', '2024-03-23 21:44:04', 2),
(101, '2024-03-23', 21.98, 'Pending', '2024-03-23 22:44:47', '2024-03-23 22:44:47', 11),
(103, '2024-03-23', 10.99, 'Pending', '2024-03-23 22:54:52', '2024-03-23 22:54:52', 11),
(136, '2024-03-24', 10.99, 'Pending', '2024-03-24 00:15:06', '2024-03-24 00:15:06', 2),
(137, '2024-03-24', 15.99, 'Pending', '2024-03-24 00:16:40', '2024-03-24 00:16:40', 2),
(138, '2024-03-24', 10.99, 'Pending', '2024-03-24 00:17:01', '2024-03-24 00:17:01', 2),
(139, '2024-03-24', 10.99, 'Pending', '2024-03-24 00:18:23', '2024-03-24 00:18:23', 2),
(140, '2024-03-24', 37.97, 'Pending', '2024-03-24 00:18:44', '2024-03-24 00:18:44', 11),
(141, '2024-03-24', 56.98, 'Pending', '2024-03-24 03:07:44', '2024-03-24 03:07:44', 2),
(142, '2024-03-24', 147.97, 'Pending', '2024-03-24 03:08:30', '2024-03-24 03:08:30', 2),
(143, '2024-03-24', 31.98, 'Pending', '2024-03-24 07:58:46', '2024-03-24 07:58:46', 6),
(144, '2024-03-24', 31.98, 'Pending', '2024-03-24 08:01:25', '2024-03-24 08:01:25', 6),
(145, '2024-03-24', 33.98, 'Pending', '2024-03-24 08:02:58', '2024-03-24 08:02:58', 6),
(146, '2024-03-24', 31.98, 'Pending', '2024-03-24 10:11:53', '2024-03-24 10:11:53', 3),
(147, '2024-03-24', 15.99, 'Pending', '2024-03-24 10:12:14', '2024-03-24 10:12:14', 3),
(148, '2024-03-24', 10.99, 'Pending', '2024-03-24 11:08:43', '2024-03-24 11:08:43', 1),
(149, '2024-03-24', 15.99, 'Pending', '2024-03-24 11:08:54', '2024-03-24 11:08:54', 3),
(150, '2024-03-24', 15.99, 'Pending', '2024-03-24 11:22:48', '2024-03-24 11:22:48', 1),
(151, '2024-03-24', 16.99, 'Pending', '2024-03-24 11:26:05', '2024-03-24 11:26:05', 1),
(152, '2024-03-24', 16.99, 'Refunded', '2024-03-24 11:35:12', '2024-03-25 01:40:07', 1),
(153, '2024-03-24', 16.99, 'Pending', '2024-03-24 11:53:32', '2024-03-24 11:53:32', 1),
(154, '2024-03-24', 16.99, 'Shipped', '2024-03-24 11:55:10', '2024-03-24 12:23:22', 1),
(155, '2024-03-24', 10.99, 'Shipped', '2024-03-24 12:09:38', '2024-03-24 12:18:38', 1),
(156, '2024-03-24', 15.99, 'Shipped', '2024-03-24 12:27:28', '2024-03-24 12:33:32', 1),
(157, '2024-03-24', 10.99, 'Shipped', '2024-03-24 12:37:35', '2024-03-24 12:38:04', 1),
(158, '2024-03-24', 110.00, 'Refunded', '2024-03-24 12:47:11', '2024-03-25 02:49:15', 1),
(159, '2024-03-24', 110.00, 'Delivered', '2024-03-24 13:17:10', '2024-03-24 13:17:15', 2),
(160, '2024-03-24', 10.99, 'Processing', '2024-03-24 13:18:08', '2024-03-24 13:18:22', 3),
(166, '2024-03-24', 60.99, 'Processing', '2024-03-24 16:18:41', '2024-03-24 16:18:44', 3),
(167, '2024-03-24', 31.98, 'Pending', '2024-03-24 16:19:11', '2024-03-24 16:19:11', 3),
(168, '2024-03-24', 10.99, 'Processing', '2024-03-24 16:24:57', '2024-03-24 16:24:58', 3),
(169, '2024-03-24', 10.99, 'Processing', '2024-03-24 16:36:39', '2024-03-24 16:36:40', 3),
(170, '2024-03-24', 110.00, 'Processing', '2024-03-24 17:28:00', '2024-03-24 17:28:02', 3),
(171, '2024-03-24', 10.99, 'Processing', '2024-03-24 17:55:13', '2024-03-24 17:55:15', 3),
(172, '2024-03-24', 15.99, 'Processing', '2024-03-24 18:03:21', '2024-03-24 18:03:23', 3),
(182, '2024-03-24', 120.99, 'Processing', '2024-03-24 18:09:17', '2024-03-24 18:09:18', 3),
(183, '2024-03-24', 10.99, 'Processing', '2024-03-24 18:17:24', '2024-03-24 18:17:26', 3),
(184, '2024-03-24', 25.99, 'Processing', '2024-03-24 18:21:19', '2024-03-24 18:21:21', 3),
(185, '2024-03-24', 15.99, 'Processing', '2024-03-24 18:24:59', '2024-03-24 18:25:01', 3),
(186, '2024-03-24', 16.99, 'Processing', '2024-03-24 18:36:14', '2024-03-24 18:36:15', 3),
(187, '2024-03-24', 7.99, 'Processing', '2024-03-24 18:38:33', '2024-03-24 18:38:35', 3),
(188, '2024-03-24', 33.98, 'Processing', '2024-03-24 20:03:10', '2024-03-24 20:03:13', 3),
(189, '2024-03-24', 25.99, 'Processing', '2024-03-24 20:54:35', '2024-03-24 20:54:37', 14),
(190, '2024-03-24', 21.98, 'Processing', '2024-03-24 22:18:59', '2024-03-24 22:19:01', 3),
(191, '2024-03-24', 10.99, 'Processing', '2024-03-24 23:30:23', '2024-03-24 23:30:25', 3),
(192, '2024-03-25', 132.96, 'Processing', '2024-03-25 00:09:43', '2024-03-25 00:09:46', 1),
(193, '2024-03-25', 10.99, 'Processing', '2024-03-25 00:13:19', '2024-03-25 00:13:21', 1),
(194, '2024-03-25', 10.99, 'Processing', '2024-03-25 00:20:34', '2024-03-25 00:20:37', 1),
(195, '2024-03-25', 10.99, 'Pending', '2024-03-25 00:35:02', '2024-03-25 00:35:02', 1),
(196, '2024-03-25', 10.99, 'Processing', '2024-03-25 00:47:53', '2024-03-25 00:47:55', 1),
(197, '2024-03-25', 26.98, 'Processing', '2024-03-25 00:48:20', '2024-03-25 00:48:21', 1),
(198, '2024-03-25', 10.99, 'Pending', '2024-03-25 00:49:14', '2024-03-25 00:49:14', 1),
(199, '2024-03-25', 7.99, 'Processing', '2024-03-25 00:54:38', '2024-03-25 00:54:40', 3),
(200, '2024-03-25', 110.00, 'Processing', '2024-03-25 01:01:43', '2024-03-25 01:11:02', 1),
(201, '2024-03-25', 80.99, 'Processing', '2024-03-25 01:11:09', '2024-03-25 01:12:24', 15),
(202, '2024-03-25', 440.00, 'Cancelled', '2024-03-25 01:33:40', '2024-03-25 01:45:25', 1),
(203, '2024-03-25', 110.00, 'Cancelled', '2024-03-25 01:35:40', '2024-03-25 01:44:56', 1),
(204, '2024-03-25', 330.00, 'Shipped', '2024-03-25 01:45:15', '2024-03-25 01:48:47', 1),
(205, '2024-03-25', 467.88, 'Processing', '2024-03-25 01:56:42', '2024-03-25 01:56:44', 5),
(206, '2024-03-25', 37.98, 'Processing', '2024-03-25 01:58:05', '2024-03-25 01:58:21', 5),
(207, '2024-03-25', 110.00, 'Shipped', '2024-03-25 02:03:01', '2024-03-25 02:04:41', 1),
(208, '2024-03-25', 110.00, 'Shipped', '2024-03-25 02:05:57', '2024-03-25 02:15:22', 1),
(209, '2024-03-25', 110.00, 'Shipped', '2024-03-25 02:14:37', '2024-03-25 02:15:45', 1),
(210, '2024-03-25', 110.00, 'Shipped', '2024-03-25 02:20:42', '2024-03-25 02:21:03', 1),
(211, '2024-03-25', 110.00, 'Shipped', '2024-03-25 02:25:41', '2024-03-25 02:26:08', 1),
(212, '2024-03-25', 110.00, 'Shipped', '2024-03-25 02:31:47', '2024-03-25 02:32:04', 1),
(213, '2024-03-25', 117.99, 'Shipped', '2024-03-25 02:33:20', '2024-03-25 02:34:33', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `OrderID` int UNSIGNED NOT NULL,
  `ProductID` int UNSIGNED NOT NULL,
  `Quantity` int NOT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`OrderID`, `ProductID`, `Quantity`, `size_id`) VALUES
(1, 1, 1, NULL),
(2, 1, 1, NULL),
(2, 1, 1, NULL),
(3, 1, 2, NULL),
(4, 3, 1, NULL),
(4, 7, 1, NULL),
(5, 1, 1, NULL),
(5, 4, 1, NULL),
(5, 7, 1, NULL),
(5, 13, 4, NULL),
(6, 3, 1, NULL),
(7, 2, 1, NULL),
(8, 3, 2, NULL),
(9, 3, 1, NULL),
(10, 2, 1, NULL),
(22, 2, 1, NULL),
(23, 1, 2, NULL),
(24, 5, 1, NULL),
(25, 2, 1, NULL),
(25, 3, 1, NULL),
(26, 2, 1, NULL),
(27, 2, 2, NULL),
(28, 3, 2, NULL),
(28, 2, 1, NULL),
(29, 3, 2, NULL),
(29, 4, 1, NULL),
(29, 1, 1, NULL),
(30, 3, 1, NULL),
(30, 7, 1, NULL),
(31, 2, 1, NULL),
(32, 3, 1, NULL),
(32, 2, 1, NULL),
(33, 2, 2, NULL),
(57, 2, 1, NULL),
(58, 3, 1, NULL),
(58, 15, 1, NULL),
(59, 2, 1, NULL),
(60, 3, 10, NULL),
(61, 10, 2, NULL),
(62, 7, 1, NULL),
(63, 26, 1, NULL),
(63, 14, 1, NULL),
(64, 1, 1, NULL),
(101, 2, 2, NULL),
(103, 2, 1, NULL),
(136, 2, 1, 1),
(137, 3, 1, 1),
(138, 2, 1, 1),
(139, 2, 1, 1),
(140, 2, 2, 1),
(140, 3, 1, 6),
(141, 2, 1, 4),
(141, 14, 1, 4),
(142, 2, 1, 4),
(142, 15, 1, 5),
(142, 17, 1, 22),
(143, 3, 2, 4),
(144, 3, 1, 2),
(144, 3, 1, 3),
(145, 4, 1, 1),
(145, 4, 1, 2),
(146, 3, 2, 3),
(147, 3, 1, 1),
(148, 2, 1, 1),
(149, 22, 1, 29),
(150, 3, 1, 1),
(151, 4, 1, 1),
(152, 4, 1, 1),
(153, 4, 1, 1),
(154, 4, 1, 5),
(155, 2, 1, 1),
(156, 3, 1, 2),
(157, 2, 1, 1),
(158, 1, 1, 8),
(159, 1, 1, 19),
(160, 2, 1, 4),
(166, 21, 1, 8),
(167, 3, 2, 4),
(168, 2, 1, 3),
(169, 2, 1, 4),
(170, 1, 1, 18),
(171, 2, 1, 4),
(172, 3, 1, 2),
(182, 1, 1, 17),
(182, 2, 1, 4),
(183, 2, 0, 4),
(184, 11, 0, 4),
(185, 3, 1, 1),
(186, 4, 0, 3),
(187, 5, 0, 1),
(188, 6, 0, 3),
(188, 3, 0, 4),
(189, 12, 0, 4),
(190, 2, 0, 1),
(191, 2, 0, 1),
(192, 2, 0, 3),
(192, 10, 0, 4),
(192, 25, 0, 29),
(192, 17, 0, 20),
(193, 2, 0, 5),
(194, 2, 0, 1),
(195, 2, 0, 1),
(196, 2, 1, 1),
(197, 2, 1, 1),
(197, 3, 1, 1),
(198, 2, 1, 1),
(199, 5, 1, 3),
(200, 1, 1, 26),
(201, 17, 1, 21),
(202, 1, 4, 8),
(203, 1, 1, 8),
(204, 1, 3, 8),
(205, 1, 3, 20),
(205, 2, 4, 1),
(205, 4, 1, 5),
(205, 10, 7, 3),
(206, 5, 1, 4),
(206, 25, 1, 29),
(207, 1, 1, 8),
(208, 1, 1, 8),
(209, 1, 1, 8),
(210, 1, 1, 8),
(211, 1, 1, 8),
(212, 1, 1, 8),
(213, 1, 1, 8),
(213, 5, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'mobile',
  `is_primary` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `user_id`, `phone_number`, `type`, `is_primary`, `created_at`, `updated_at`) VALUES
(1, 3, '+4474930121', 'mobile', 1, '2024-03-24 14:28:10', '2024-03-24 14:28:10'),
(2, 1, '1234567', 'mobile', 0, '2024-03-24 14:45:19', '2024-03-25 03:30:28'),
(3, 5, '1234567', 'mobile', 0, '2024-03-25 02:25:06', '2024-03-25 06:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int UNSIGNED NOT NULL,
  `ProductName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CategoryID` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customerID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Description`, `Price`, `image`, `CategoryID`, `created_at`, `updated_at`, `customerID`) VALUES
(1, 'Nike Airmax', 'Nike Airmax 97', 110.00, 'airmax.jpg', 6, '2024-03-22 14:49:55', '2024-03-23 14:26:34', NULL),
(2, 'Puma T-Shirt', 'White Puma T-Shirt', 10.99, 'puma_tshirt.jpg', 3, '2024-03-22 16:48:30', '2024-03-23 22:54:52', NULL),
(3, 'Nike T-Shirt', 'Black Nike T-Shirt', 15.99, 'nike_tshirt.webp', 3, '2024-03-22 16:48:30', '2024-03-23 14:06:56', NULL),
(4, 'Adidas T-Shirt', 'Blue Adidas T-Shirt', 16.99, 'adidas_tshirt.jpg', 3, '2024-03-22 16:48:30', '2024-03-23 13:55:54', NULL),
(5, 'Lacoste T-Shirt', 'Pink Lacoste T-Shirt', 7.99, 'lacoste_tshirt.jpg', 3, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(6, 'Under Armour T-Shirt', 'Light blue Under Armour T-Shirt', 17.99, 'underarmour_tshirt.webp', 3, '2024-03-22 16:48:30', '2024-03-23 13:55:41', NULL),
(7, 'Champion Tracksuit', 'Black, red and white Champion Tracksuit', 35.99, 'champion_tracksuit.jpg', 4, '2024-03-22 16:48:30', '2024-03-23 14:10:59', NULL),
(8, 'Donnay Tracksuit', 'Pink and black Donnay Tracksuit', 19.99, 'donnay_tracksuit.jpg', 4, '2024-03-22 16:48:30', '2024-03-23 13:54:08', NULL),
(9, 'Adidas Tracksuit', 'Black Adidas Tracksuit', 30.99, 'adidas_tracksuit.jpg', 4, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(10, 'Trapstar Tracksuit', 'Beige Trapstar Tracksuit', 10.99, 'trapstar_tracksuit.jpg', 4, '2024-03-22 16:48:30', '2024-03-23 14:07:15', NULL),
(11, 'Nike Tracksuit', 'Grey Nike Tracksuit', 25.99, 'nike_tracksuit.webp', 4, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(12, 'Columbia Jacket', 'Blue Columbia Jacket', 25.99, 'columbia_jacket.jpg', 5, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(13, 'The North Face Jacket', 'Black The North Face Puffer Jacket', 35.99, 'northface_jacket.jpg', 5, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(14, 'Nike Jacket', 'White and blue Nike Jacket', 45.99, 'nike_jacket.png', 5, '2024-03-22 16:48:30', '2024-03-23 14:16:17', NULL),
(15, 'Superdry Jacket', 'Black Superdry Jacket', 55.99, 'superdry_jacket.jpg', 5, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(16, 'Adidas Jacket', 'Blue Adidas Jacket', 53.99, 'adidas_jacket.webp', 5, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(17, 'Nike Dunk', 'Black with blue Nike Dunk', 80.99, 'dunk.jpg', 6, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(18, 'Black Jordans', 'Black with red and blue Jordan', 75.99, 'jordans.jpg', 6, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(19, 'Nike Airmax', 'Black with green Nike Airmax', 85.99, 'airmax.jpg', 6, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(20, 'New Balance', 'White New Balance 530', 99.99, 'newbalance.jpg', 6, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(21, 'Converse', 'Black Converse', 60.99, 'converse.jpg', 6, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(22, 'Adidas Bag', 'Grey and brown Adidas Bag', 15.99, 'adidas_bag.jpg', 7, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(23, 'Sports Bag', 'Black Sports Bag', 25.99, 'sports_bag.jpeg', 7, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(24, 'Nike Gym Bag', 'Black Nike Gym Bag', 9.99, 'nike_bag.jpg', 7, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(25, 'Adidas Bag', 'Pink/grey Adidas Bag', 29.99, 'adidas_bag.webp', 7, '2024-03-22 16:48:30', '2024-03-22 16:48:30', NULL),
(26, 'Under Armour Crossbody Bag', 'Black Under Armour Crossbody Bag', 17.99, 'underarmour_bag.webp', 7, '2024-03-22 16:48:30', '2024-03-23 14:16:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `product_id` int UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `Quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`product_id`, `size_id`, `Quantity`) VALUES
(1, 8, 104),
(1, 9, 99),
(1, 10, 4),
(1, 11, 100),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 1),
(1, 18, 1),
(1, 19, 1),
(1, 20, 1),
(1, 21, 1),
(1, 22, 1),
(1, 23, 1),
(1, 24, 1),
(1, 25, 1),
(1, 26, 1),
(1, 27, 1),
(1, 28, 1),
(2, 1, 86),
(2, 2, 99),
(2, 3, 98),
(2, 4, 97),
(2, 5, 99),
(2, 6, 100),
(3, 1, 96),
(3, 2, 99),
(3, 3, 97),
(3, 4, 97),
(3, 5, 100),
(3, 6, 99),
(4, 1, 97),
(4, 2, 99),
(4, 3, 99),
(4, 4, 100),
(4, 5, 100),
(4, 6, 100),
(5, 1, 99),
(5, 2, 100),
(5, 3, 99),
(5, 4, 99),
(5, 5, 100),
(5, 6, 100),
(6, 1, 100),
(6, 2, 100),
(6, 3, 99),
(6, 4, 100),
(6, 5, 100),
(6, 6, 100),
(7, 1, 100),
(7, 2, 100),
(7, 3, 100),
(7, 4, 100),
(7, 5, 100),
(7, 6, 100),
(8, 1, 100),
(8, 2, 100),
(8, 3, 100),
(8, 4, 100),
(8, 5, 100),
(8, 6, 100),
(9, 1, 100),
(9, 2, 100),
(9, 3, 100),
(9, 4, 100),
(9, 5, 100),
(9, 6, 100),
(10, 1, 100),
(10, 2, 100),
(10, 3, 100),
(10, 4, 99),
(10, 5, 100),
(10, 6, 100),
(11, 1, 100),
(11, 2, 100),
(11, 3, 100),
(11, 4, 99),
(11, 5, 100),
(11, 6, 100),
(12, 1, 100),
(12, 2, 100),
(12, 3, 100),
(12, 4, 99),
(12, 5, 100),
(12, 6, 100),
(13, 1, 100),
(13, 2, 100),
(13, 3, 100),
(13, 4, 100),
(13, 5, 100),
(13, 6, 100),
(14, 1, 100),
(14, 2, 100),
(14, 3, 100),
(14, 4, 99),
(14, 5, 100),
(14, 6, 100),
(15, 1, 100),
(15, 2, 100),
(15, 3, 100),
(15, 4, 100),
(15, 5, 99),
(15, 6, 100),
(16, 1, 100),
(16, 2, 100),
(16, 3, 100),
(16, 4, 100),
(16, 5, 100),
(16, 6, 100),
(17, 8, 100),
(17, 9, 100),
(17, 10, 100),
(17, 11, 100),
(17, 12, 100),
(17, 13, 100),
(17, 14, 100),
(17, 15, 100),
(17, 16, 100),
(17, 17, 100),
(17, 18, 100),
(17, 19, 100),
(17, 20, 99),
(17, 21, 99),
(17, 22, 99),
(17, 23, 100),
(17, 24, 100),
(17, 25, 100),
(17, 26, 100),
(17, 27, 100),
(17, 28, 100),
(18, 8, 0),
(18, 9, 0),
(18, 10, 0),
(18, 11, 0),
(18, 12, 0),
(18, 13, 0),
(18, 14, 0),
(18, 15, 0),
(18, 16, 0),
(18, 17, 0),
(18, 18, 0),
(18, 19, 0),
(18, 20, 0),
(18, 21, 0),
(18, 22, 0),
(18, 23, 0),
(18, 24, 0),
(18, 25, 0),
(18, 26, 0),
(18, 27, 0),
(18, 28, 0),
(19, 8, 0),
(19, 9, 0),
(19, 10, 0),
(19, 11, 0),
(19, 12, 0),
(19, 13, 0),
(19, 14, 0),
(19, 15, 0),
(19, 16, 0),
(19, 17, 0),
(19, 18, 0),
(19, 19, 0),
(19, 20, 0),
(19, 21, 0),
(19, 22, 0),
(19, 23, 0),
(19, 24, 0),
(19, 25, 0),
(19, 26, 0),
(19, 27, 0),
(19, 28, 0),
(20, 8, 0),
(20, 9, 0),
(20, 10, 0),
(20, 11, 0),
(20, 12, 0),
(20, 13, 0),
(20, 14, 0),
(20, 15, 0),
(20, 16, 0),
(20, 17, 0),
(20, 18, 0),
(20, 19, 0),
(20, 20, 0),
(20, 21, 0),
(20, 22, 0),
(20, 23, 0),
(20, 24, 0),
(20, 25, 0),
(20, 26, 0),
(20, 27, 0),
(20, 28, 0),
(21, 8, 0),
(21, 9, 0),
(21, 10, 0),
(21, 11, 0),
(21, 12, 0),
(21, 13, 0),
(21, 14, 0),
(21, 15, 0),
(21, 16, 0),
(21, 17, 0),
(21, 18, 0),
(21, 19, 0),
(21, 20, 0),
(21, 21, 0),
(21, 22, 0),
(21, 23, 0),
(21, 24, 0),
(21, 25, 0),
(21, 26, 0),
(21, 27, 0),
(21, 28, 0),
(22, 29, 99),
(23, 29, 100),
(24, 29, 100),
(25, 29, 99);

-- --------------------------------------------------------

--
-- Table structure for table `registration_codes`
--

CREATE TABLE `registration_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_codes`
--

INSERT INTO `registration_codes` (`id`, `code`, `expires_at`, `used`, `created_at`, `updated_at`) VALUES
(1, 'DZLTFU1HNW', '2024-03-24 16:30:46', 1, '2024-03-23 16:30:46', '2024-03-23 16:58:28'),
(2, 'T6VSTGKIWY', '2024-03-24 16:30:55', 1, '2024-03-23 16:30:55', '2024-03-23 17:33:04'),
(3, 'AUOQBL6LMN', '2024-03-24 16:39:32', 0, '2024-03-23 16:39:32', '2024-03-23 16:39:32'),
(4, 'TZ8UL4OZTB', '2024-03-25 05:33:02', 0, '2024-03-25 05:31:02', '2024-03-25 05:31:02'),
(5, 'MBMKLN6ZTN', '2024-03-25 05:33:19', 0, '2024-03-25 05:31:19', '2024-03-25 05:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `reviewer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `reviewer_name`, `review_text`, `rating`, `created_at`, `updated_at`) VALUES
(1, 16, 'John', 'Bad.', 1, '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(2, 1, 'James', 'Could be better...', 2, '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(3, 20, 'Jane', 'Bad.', 1, '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(4, 16, 'Alex', 'Bad.', 1, '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(5, 20, 'Mary', 'Very good!', 4, '2024-03-22 16:48:30', '2024-03-22 16:48:30'),
(6, 2, 'Ho', 'Great shirt, would definetly buy again', 4, '2024-03-23 09:06:47', '2024-03-23 09:06:47'),
(7, 7, 'TEST123', '1234', 3, '2024-03-24 15:33:24', '2024-03-24 15:33:24'),
(8, 2, 'TEST123', 'qwerty', 3, '2024-03-24 16:02:39', '2024-03-24 16:02:39'),
(9, 2, 'TEST2', '12', 3, '2024-03-24 17:02:24', '2024-03-24 17:02:24'),
(10, 2, 'TEST3', 'qwert', 3, '2024-03-24 17:24:57', '2024-03-24 17:24:57'),
(11, 2, 'test4', 'af', 3, '2024-03-24 17:32:01', '2024-03-24 17:32:01'),
(12, 2, 'test5', 'hjkl', 3, '2024-03-24 18:28:49', '2024-03-24 18:28:49'),
(13, 2, 'TEST 6', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 1, '2024-03-24 22:11:27', '2024-03-24 22:11:27'),
(14, 3, 'Matt', 'T-Shirt is breathable and comfy as ever !', 5, '2024-03-24 22:27:37', '2024-03-24 22:27:37'),
(15, 3, 'Za3n', 'Very good quality', 4, '2024-03-25 05:18:15', '2024-03-25 05:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `service_reviews`
--

CREATE TABLE `service_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `reviewer_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `service_reviews`
--

INSERT INTO `service_reviews` (`id`, `reviewer_name`, `review_text`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Siu Ho', 'Good website !', 3, '2024-03-24 13:44:37', '2024-03-24 13:44:37'),
(2, 'Za3n', 'Offering services at its very best !', 3, '2024-03-24 13:59:18', '2024-03-24 13:59:18'),
(3, 'Matt', 'Fantastic !', 5, '2024-03-24 14:01:25', '2024-03-24 14:01:25'),
(4, 'Muthi', 'The visuals could be improved !', 3, '2024-03-24 14:03:42', '2024-03-24 14:03:42'),
(5, 'Brian', 'Quality at it\'s best !', 5, '2024-03-24 14:14:29', '2024-03-24 14:14:29'),
(6, 'Ricky', 'The website is fine', 4, '2024-03-24 14:39:26', '2024-03-24 14:39:26'),
(8, 'Thariq', 'Its JD sports in value but with better selection of products !', 4, '2024-03-24 23:39:12', '2024-03-24 23:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'XXS'),
(2, 'XS'),
(3, 'S'),
(4, 'M'),
(5, 'L'),
(6, 'XL'),
(7, 'XXL'),
(8, '3'),
(9, '3.5'),
(10, '4'),
(11, '4.5'),
(12, '5'),
(13, '5.5'),
(14, '6'),
(15, '6.5'),
(16, '7'),
(17, '7.5'),
(18, '8'),
(19, '8.5'),
(20, '9'),
(21, '9.5'),
(22, '10'),
(23, '10.5'),
(24, '11'),
(25, '11.5'),
(26, '12'),
(27, '12.5'),
(28, '13'),
(29, 'one size');

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
  `role_as` tinyint NOT NULL DEFAULT '0' COMMENT '0=user,1=admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_as`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$fGLOl.p6Hsid1vV7/OivfOUGNib/gbFXBkFHuAAZ/arkuTD3sTCSu', NULL, 1, NULL, '2024-03-25 06:39:28'),
(2, 'user', 'user@user.com', NULL, '$2y$12$PgoeoPaGA6OKy0iSMUr9sO1pe4X4TLMZ8R69WoqUPmBTxpL9R7c3e', NULL, 0, NULL, '2024-03-24 23:17:31'),
(3, 'Matthew Brian Tahir', 'briantahirmatthew@gmail.com', NULL, '$2y$12$Ztjt8miw5aQTBjsSqMlsIO8/FyZoIt2qjaRcT.b3jB6qgcZwddxiO', NULL, 1, '2024-03-22 13:57:31', '2024-03-22 13:57:31'),
(4, 'ho', 'admin@gmail.com', NULL, '$2y$12$oroZAG.CuT6OqB1L/K4v..kwcPsa5YmnqlOM5rtXLHLwNoYQlhZHu', NULL, 1, '2024-03-22 14:08:33', '2024-03-22 14:08:33'),
(5, 'Zaen', 'Zaen@gmail.com', NULL, '$2y$12$rIGqD.m0qHt42MDSLw/ybOgy0GqnPADERmRMEKaqkUA9OwHRW27zq', NULL, 1, '2024-03-22 15:16:38', '2024-03-22 15:16:38'),
(6, 'HoUser', 'user@admin.com', NULL, '$2y$12$B397dEbYKgLukM2M0owpBO65YYq8NC7kR6Mfuzcv2lkhcEhe5.8KW', NULL, 0, '2024-03-22 19:23:55', '2024-03-22 19:23:55'),
(7, 'yeet', 'user@yourmum.com', NULL, '$2y$12$9n05eF64gTxxt68QJYhktulWfcTQxaN2zIOaL.EoL/IaKznUKeVH6', NULL, 0, '2024-03-23 15:05:50', '2024-03-23 15:05:50'),
(8, 'nao', '1235@gmail.com', NULL, '$2y$12$bHn/coM9imGC59ATGzGfZOf7/NucVsECdX7nN3GbXIA6dqGqUGKTO', NULL, 0, '2024-03-23 16:58:28', '2024-03-23 16:58:28'),
(9, '123', '123@gmail', NULL, '$2y$12$.hD7vWipczSv.pWVzcauGu/wMcPd2VJiUGYxWPzkIJzc9zaHQsI.y', NULL, 0, '2024-03-23 17:10:21', '2024-03-23 17:10:21'),
(10, 'nao', 'beee@me.com', NULL, '$2y$12$WffLsBebyIz8NP1CWGzlVeUoLXjjv0ywTYMID1304vQhdKcnuTXiq', NULL, 0, '2024-03-23 17:16:15', '2024-03-23 17:16:15'),
(11, 'nao', 'qwe@gmail.com', NULL, '$2y$12$68lxjYvPSjFvvKQMlk6g7eDDzof62h9jGxurPg/jUVLe5nVNu2Kvq', NULL, 0, '2024-03-23 17:33:04', '2024-03-23 17:33:04'),
(12, 'Siu Ho', 'siu.ho123@gmail.com', NULL, '$2y$12$Gh8CqVuodh6lzgCyrAwTBelEFguKznrdJmfWaew8vrgUOjVKmgdMS', NULL, 0, '2024-03-24 20:39:24', '2024-03-24 20:39:24'),
(13, 'Abdul Muthi', 'abdul.muthi@gmail.com', NULL, '$2y$12$8eNhjU5qdFbOxTMW36F1beagDxApIDGAOZu/ioYqQ1.Z7bRFijVmi', NULL, 0, '2024-03-24 20:44:56', '2024-03-24 20:44:56'),
(14, 'Thariq', 'thairq.sdharmawan@gmail.com', NULL, '$2y$12$eVyYwJuHSLSUe3lTLPmmqe54CEn4nfdZ7zDHu6baT/KyPD7A8tOxm', NULL, 0, '2024-03-24 20:49:06', '2024-03-24 20:49:06'),
(15, 'Kyle Walker', 'kyle@example.com', NULL, '$2y$12$1V3zim3kWUyKv2RECQmU7u5biyDHcyP93R5vw14YYdetrLSGhXA7C', NULL, 0, '2024-03-25 00:59:38', '2024-03-25 00:59:38'),
(16, 'Noctis', 'Noctis@example.com', NULL, '$2y$12$EBy4ugqX9zXweGK/nQTzIu/64p9w/hjCC2yB7ol5ofQtzlMBzBg4y', NULL, 0, '2024-03-25 06:17:33', '2024-03-25 06:17:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_addresses_users` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `orders_userid_foreign` (`UserID`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_product_orderid_foreign` (`OrderID`),
  ADD KEY `order_product_productid_foreign` (`ProductID`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_phones_users` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `products_categoryid_foreign` (`CategoryID`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`product_id`,`size_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `registration_codes`
--
ALTER TABLE `registration_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_codes_code_unique` (`code`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `service_reviews`
--
ALTER TABLE `service_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `registration_codes`
--
ALTER TABLE `registration_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service_reviews`
--
ALTER TABLE `service_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `fk_addresses_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `fk_phones_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `product_sizes_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
