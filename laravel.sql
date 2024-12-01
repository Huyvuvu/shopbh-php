-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2024 at 02:54 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `iduser` bigint UNSIGNED NOT NULL,
  `day` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `giam` double DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billdetail`
--

CREATE TABLE `billdetail` (
  `idbill` int NOT NULL,
  `idpro` int NOT NULL,
  `soluong` int DEFAULT NULL,
  `thanhtien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `iduser` bigint UNSIGNED NOT NULL,
  `idpv` int NOT NULL,
  `soluong` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`iduser`, `idpv`, `soluong`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2024-10-28 10:15:53', '2024-10-28 10:15:53'),
(2, 16, 1, '2024-10-28 10:41:58', '2024-10-28 10:41:58'),
(2, 17, 1, '2024-10-28 10:41:58', '2024-10-28 10:41:58'),
(2, 18, 1, '2024-10-28 10:41:59', '2024-10-28 10:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ten`, `parent_id`, `mota`, `created_at`, `updated_at`) VALUES
(2, 'Laptop', NULL, 'Laptop', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Tablet', NULL, 'Tablet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'SmartWatch', NULL, 'SmartWatch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'phụ kiện', NULL, 'phụ kiện', NULL, NULL),
(6, 'iphone', 1, 'Điện thoại iphone', NULL, NULL),
(7, 'Samsung', 1, 'Điện thoại Samsung 1111', '2024-09-30 09:27:25', '2024-11-02 01:24:13'),
(8, 'Xiaomi', 1, 'Điện thoại Xiaomi', '2024-09-30 09:27:49', '2024-09-30 09:27:49'),
(9, 'Sạc dự phòng', 5, 'Sạc dự phòng', '2024-09-30 09:28:00', '2024-09-30 09:28:00'),
(10, 'Oppo', 1, 'Điện thoại Oppo', '2024-09-30 09:28:13', '2024-09-30 09:28:13'),
(11, 'Asus', 2, 'Laptop Asus', '2024-10-05 01:35:54', '2024-10-05 01:35:54'),
(12, 'Hp', 2, 'Laptop Hp', '2024-10-05 01:35:54', '2024-10-05 01:35:54'),
(13, 'MacBook', 2, 'Laptop MacBook', '2024-10-05 01:38:49', '2024-10-05 01:38:49'),
(14, 'Dell', 2, 'Laptop Dell', '2024-10-05 01:38:49', '2024-10-05 01:38:49'),
(17, 'Nokia', 1, '<p>Điện thoại Nokia1111111</p>', '2024-11-11 07:08:18', '2024-11-11 07:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idCha` int DEFAULT NULL,
  `idCat` int DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `anhien` tinyint(1) DEFAULT '1',
  `thutu` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `ten`, `slug`, `idCha`, `idCat`, `mota`, `anhien`, `thutu`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dtdd', NULL, NULL, 'Mua online điện thoại, smartphone, điện thoại thông minh giá rẻ, chính hãng. Giao nhanh, đem nhiều mẫu chọn, cà thẻ tại nhà. Trả góp 0%, bảo hành tại hơn 3000 điểm toàn quốc.', 1, 0, NULL, NULL),
(2, 'Laptop', 'laptop', NULL, 2, NULL, 1, 0, NULL, NULL),
(3, 'Tablet', 'tablet', NULL, 3, NULL, 1, 0, NULL, NULL),
(4, 'SmartWatch', 'dong-ho-thong-minh', NULL, 4, NULL, 1, 0, NULL, NULL),
(5, 'Phụ kiện', 'phu-kien', NULL, 5, 'Phụ kiện', 1, 0, '2024-09-14 01:15:10', '2024-09-14 01:15:10'),
(12, 'iphone', 'iphone', 1, 6, 'iphone', 1, 0, '2024-09-16 09:32:28', '2024-09-16 09:32:28'),
(13, 'Samsung', 'samsung', 1, 7, 'Điện thoại SamSung', 1, 0, '2024-09-23 06:22:57', '2024-09-23 06:22:57'),
(14, 'Xiaomi', 'xiaomi', 1, 8, 'Điện thoại xiaomi', 1, 0, '2024-09-23 06:24:27', '2024-09-23 06:24:27'),
(15, 'Sạc dự phòng', 'sac-du-phong', 5, 9, 'Sạc dự phòng', 1, 0, '2024-09-23 06:55:20', '2024-09-23 06:55:20'),
(16, 'Oppo', 'oppo', 1, 10, 'Điện thoại Oppo', 1, 0, '2024-09-23 07:53:24', '2024-09-23 07:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `th` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idCat` int DEFAULT NULL,
  `chitiet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thutu` int DEFAULT '0',
  `anhien` bit(1) DEFAULT b'1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `mota`, `mau`, `th`, `idCat`, `chitiet`, `images`, `thutu`, `anhien`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 15 Plus', 'iphone-15-plus', 'Điện thoại iPhone 15 Plus', '[\n{\'id\': 1, mau: \'Xanh dương nhạt\'}\n{\'id\': 2, mau: \'Đen\'}\n{\'id\': 3, mau: \'Xanh lá nhạt\'}\n{\'id\': 4, mau: \'Hồng nhạt\'}\n]', 'Apple', 6, 'iPhone 15 Plus', 'img/san-pham/iphone-15-pro-blue-thumbnew-600x600.jpg', 0, b'1', '2024-09-30 08:57:54', '2024-09-30 08:57:54'),
(2, 'iPhone 16 Pro Max', 'iphone-16-pro-max', 'iPhone 16 Pro Max', '[\r\n{\'id\': 1, mau: \'Titan tự nhiên\'}\r\n{\'id\': 2, mau: \'Titan đen\'}\r\n{\'id\': 3, mau: \'Titan xa mạc\'}]', 'Apple', 6, 'iPhone 16 Pro Max', 'img/san-pham/iphone-16-pro-max-tu-nhien-thumb-600x600.jpg', 0, b'1', '2024-09-30 09:03:07', '2024-09-30 09:03:07'),
(3, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'asus-vivobook-go-15-e1504fa-r5-7520u', 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U', NULL, 'Asus', 11, 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U', 'img/san-pham/asus-vivobook-go-15-e1504fa-r5-nj776w-thumb-600x600.jpg', 0, b'1', '2024-10-05 01:48:10', '2024-10-05 01:48:10'),
(4, 'Asus Vivobook 15 OLED A1505ZA i5 12500H', 'asus-vivobook-15-oled-a1505za-i5-12500h', 'Laptop Asus Vivobook 15 OLED A1505ZA i5 12500H', NULL, 'Asus', 11, 'Asus Vivobook 15 OLED A1505ZA i5 12500H', 'img/san-pham/asus-asus-vivobook-15-oled-a1505za-i5-ma415w-thumb-600x600.jpg', 0, b'1', '2024-10-05 01:56:58', '2024-10-05 01:56:58'),
(5, 'Samsung Galaxy A55 5G', 'samsung-galaxy-a55-5g', 'Điện thoại Samsung Galaxy A55 5G', '[{id:1, mau:\'Xanh\'},{id:2, mau:\'Tím\'},{id:3, mau:\'Đen\'}]', 'SamSung', 7, 'Điện thoại Samsung Galaxy A55 5G', 'img/san-pham/samsung-galaxy-a55-5g-xanh-thumb-1-600x600.jpg', 0, b'1', '2024-10-05 02:05:38', '2024-10-05 02:05:38'),
(6, 'Samsung Galaxy Z Fold6 5G', 'samsung-galaxy-z-fold6-5g', 'Điện thoại Samsung Galaxy Z Fold6 5G', '[{id: 1, mau: \'Xám\'},{id: 2, mau: \'Hồng\'},{id: 3, mau: \'Xanh Navy\'}]', 'SamSung', 7, 'Điện thoại Samsung Galaxy Z Fold6 5G', 'img/san-pham/samsung-galaxy-z-fold6-xam-thumbn-600x600.jpg', 0, b'1', '2024-10-05 02:11:55', '2024-10-05 02:11:55'),
(7, 'HP 15 fd0234TU i5 1334U', 'hp-15-fd0234tu-i5-1334u', 'Laptop HP 15 fd0234TU i5 1334U', NULL, 'Hp', 12, 'Laptop HP 15 fd0234TU i5 1334U', 'img/san-pham/hp-15-fd0234tu-i5-9q969pa-thumb-1-600x600.jpg', 0, b'1', '2024-10-05 02:51:01', '2024-10-05 02:51:01'),
(8, 'HP Pavilion 15 eg2081TU', 'hp-pavilion-15-eg2081tu', 'Laptop HP Pavilion 15 eg2081TU', NULL, 'Hp', 12, 'Laptop HP Pavilion 15 eg2081TU', 'img/san-pham/hp-pavilion-15-eg2081tu-i5-7c0q4pa-thumb-600x600.jpg', 0, b'1', '2024-10-05 02:53:32', '2024-10-05 02:53:32'),
(9, 'MacBook Air 13 inch M1', 'macbook-air-13-inch-m1', 'Laptop MacBook Air 13 inch M1', NULL, 'Apple', 13, 'Laptop MacBook Air 13 inch M1', 'img/san-pham/macbook-air-m1-2020-gray-600x600.jpg', 0, b'1', '2024-10-05 02:57:50', '2024-10-05 02:57:50'),
(10, 'MacBook Air 13 inch M2', 'macbook-air-13-inch-m2', 'Laptop Apple MacBook Air 13 inch M2', NULL, 'Apple', 13, 'Laptop Apple MacBook Air 13 inch M2', 'img/san-pham/apple-macbook-air-m2-2022-xanh-600x600.jpg', 0, b'1', '2024-10-05 03:00:31', '2024-10-05 03:00:31'),
(11, 'iPhone 13 Plus', 'iphone-13-plus', 'Điện thoại iPhone 13 Plus', '[\r\n{\'id\': 1, mau: \'Xanh dương nhạt\'}\r\n{\'id\': 2, mau: \'Đen\'}\r\n{\'id\': 3, mau: \'Xanh lá nhạt\'}\r\n{\'id\': 4, mau: \'Hồng nhạt\'}\r\n]', 'Apple', 6, 'iPhone 13 Plus', 'img/san-pham/iphone-13-xanh-la-thumb-new-600x600.jpg', 0, b'1', '2024-09-30 08:57:54', '2024-09-30 08:57:54'),
(12, 'iPhone 14 Plus', 'iphone-14-plus', 'Điện thoại iPhone 14 Plus', '[\r\n{\'id\': 1, mau: \'Xanh dương nhạt\'}\r\n{\'id\': 2, mau: \'Đen\'}\r\n{\'id\': 3, mau: \'Xanh lá nhạt\'}\r\n{\'id\': 4, mau: \'Hồng nhạt\'}\r\n]', 'Apple', 6, 'iPhone 14 Plus', 'img/san-pham/iPhone-14-plus-thumb-xanh-1-600x600.jpg', 0, b'1', '2024-09-30 08:57:54', '2024-09-30 08:57:54'),
(13, 'iPhone 15 ', 'iphone-15', 'Điện thoại iPhone 15', '[\r\n{\'id\': 1, mau: \'Xanh dương nhạt\'}\r\n{\'id\': 2, mau: \'Đen\'}\r\n{\'id\': 3, mau: \'Xanh lá nhạt\'}\r\n{\'id\': 4, mau: \'Hồng nhạt\'}\r\n]', 'Apple', 6, 'iPhone 15 ', 'img/san-pham/iphone-15-hong-thumb-1-600x600.jpg', 0, b'1', '2024-09-30 08:57:54', '2024-09-30 08:57:54'),
(14, 'Samsung Galaxy S23', 'samsung-galaxy S23', 'Điện thoại Samsung Galaxy S23', '[{id: 1, mau: \'Xám\'},{id: 2, mau: \'Hồng\'},{id: 3, mau: \'Xanh Navy\'}]', 'SamSung', 7, 'Điện thoại Samsung Galaxy s23', 'img/san-pham/samsung-galaxy-s23-ultra-green-thumbnew-600x600.jpg', 0, b'1', '2024-10-05 02:11:55', '2024-10-05 02:11:55'),
(15, 'iPhone 16 ', 'iphone-16', 'Điện thoại iPhone 16', '[\r\n{\'id\': 1, mau: \'Xanh dương nhạt\'}\r\n{\'id\': 2, mau: \'Đen\'}\r\n{\'id\': 3, mau: \'Xanh lá nhạt\'}\r\n{\'id\': 4, mau: \'Hồng nhạt\'}\r\n]', 'Apple', 6, 'iPhone 16', 'img/san-pham/iphone-16-blue-600x600.png', 0, b'1', '2024-09-30 08:57:54', '2024-09-30 08:57:54'),
(16, 'iPhone 11', 'iphone-11', 'Điện thoại iPhone 11', '[\r\n{\'id\': 1, mau: \'Xanh dương nhạt\'}\r\n{\'id\': 2, mau: \'Đen\'}\r\n{\'id\': 3, mau: \'Xanh lá nhạt\'}\r\n{\'id\': 4, mau: \'Hồng nhạt\'}\r\n]', 'Apple', 6, 'iPhone 11', 'img/san-pham/iphone-11-trang-600x600.jpg', 0, b'1', '2024-09-30 08:57:54', '2024-09-30 08:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int NOT NULL,
  `idPro` int DEFAULT NULL,
  `dungluong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gia` decimal(10,2) NOT NULL,
  `tonkho` int DEFAULT NULL,
  `variant` bit(1) NOT NULL DEFAULT b'0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `idPro`, `dungluong`, `gia`, `tonkho`, `variant`, `created_at`, `updated_at`) VALUES
(1, 1, '128GB', '25990000.00', 10, b'0', '2024-09-30 09:08:55', '2024-09-30 09:08:55'),
(2, 1, '256GB', '28990000.00', 5, b'1', '2024-09-30 09:10:55', '2024-09-30 09:10:55'),
(3, 1, '512GB', '34990000.00', 5, b'1', '2024-09-30 09:10:55', '2024-09-30 09:10:55'),
(4, 2, '256GB', '34990000.00', 15, b'0', '2024-09-30 09:13:37', '2024-09-30 09:13:37'),
(5, 2, '512GB', '40990000.00', 10, b'1', '2024-09-30 09:14:56', '2024-09-30 09:14:56'),
(6, 2, '1TB', '46990000.00', 5, b'1', '2024-09-30 09:14:56', '2024-09-30 09:14:56'),
(7, 3, 'Ram 16GB; SSD 512GB', '12590000.00', 10, b'0', '2024-10-05 01:50:56', '2024-10-05 01:50:56'),
(8, 4, 'Ram 16GB; SSD 512GB', '16990000.00', 2, b'0', '2024-10-05 01:59:12', '2024-10-05 01:59:12'),
(9, 5, '12GB - 256GB', '11790000.00', 15, b'0', '2024-10-05 02:06:49', '2024-10-05 02:06:49'),
(10, 5, '8GB - 128GB', '9990000.00', 4, b'1', '2024-10-05 02:08:20', '2024-10-05 02:08:20'),
(11, 5, '8GB - 256GB', '10790000.00', 5, b'1', '2024-10-05 02:08:20', '2024-10-05 02:08:20'),
(12, 6, '256GB', '41990000.00', 3, b'0', '2024-10-05 02:13:14', '2024-10-05 02:13:14'),
(13, 6, '512GB', '45990000.00', 3, b'1', '2024-10-05 02:14:33', '2024-10-05 02:14:33'),
(14, 6, '1TB', '52990000.00', 3, b'1', '2024-10-05 02:14:33', '2024-10-05 02:14:33'),
(15, 7, 'Ram 16GB; SSD 512GB', '16490000.00', 7, b'0', '2024-10-05 02:51:51', '2024-10-05 02:51:51'),
(16, 8, 'Ram 16GB; SSD 512GB', '17290000.00', 5, b'0', '2024-10-05 02:54:55', '2024-10-05 02:54:55'),
(17, 9, 'Ram 8GB; SSD 256GB', '18590000.00', 4, b'0', '2024-10-05 02:59:17', '2024-10-05 02:59:17'),
(18, 10, 'Ram 8GB; SSD 256GB', '23990000.00', 3, b'0', '2024-10-05 03:01:39', '2024-10-05 03:01:39'),
(19, 11, 'Ram 8GB; SSD 256GB', '23990000.00', 3, b'0', '2024-10-05 03:01:39', '2024-10-05 03:01:39'),
(20, 12, 'Ram 8GB; SSD 256GB', '23990000.00', 3, b'0', '2024-10-05 03:01:39', '2024-10-05 03:01:39'),
(21, 13, 'Ram 8GB; SSD 256GB', '23990000.00', 3, b'0', '2024-10-05 03:01:39', '2024-10-05 03:01:39'),
(22, 14, 'Ram 8GB; SSD 256GB', '23990000.00', 3, b'0', '2024-10-05 03:01:39', '2024-10-05 03:01:39'),
(23, 16, 'Ram 8GB; SSD 256GB', '23990000.00', 3, b'0', '2024-10-05 03:01:39', '2024-10-05 03:01:39'),
(24, 15, 'Ram 8GB; SSD 256GB', '23990000.00', 3, b'0', '2024-10-05 03:01:39', '2024-10-05 03:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullName`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@itc.edu.vn', NULL, '$2y$12$IDXGt6Shmho1iYoxOWAHT.tkZCNwC1xUo/6lBBzhmfXkMiXyFqh72', 'admin', NULL, '2024-10-12 01:00:14', '2024-10-12 01:00:14'),
(2, 'user1', 'user1', 'user1@itc.edu.vn', NULL, '$2y$12$G93j./O6buxUQJJYgr3HmeZ.Sa1bWJvdTF17y.cHc9qjphghYx.vS', 'user', NULL, '2024-10-12 01:01:49', '2024-10-12 01:01:49');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_carts`
-- (See below for the actual view)
--
CREATE TABLE `vw_carts` (
`created_at` timestamp
,`gia` decimal(10,2)
,`idpv` int
,`iduser` bigint unsigned
,`images` varchar(255)
,`name` varchar(100)
,`soluong` int
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_products`
-- (See below for the actual view)
--
CREATE TABLE `vw_products` (
`anhien` bit(1)
,`chitiet` text
,`created_at` timestamp
,`dungluong` varchar(255)
,`gia` decimal(10,2)
,`id` int
,`idCat` int
,`idv` int
,`images` varchar(255)
,`mau` varchar(255)
,`mota` text
,`name` varchar(100)
,`slug` varchar(100)
,`th` varchar(50)
,`thutu` int
,`tonkho` int
,`updated_at` timestamp
,`variant` bit(1)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_carts`
--
DROP TABLE IF EXISTS `vw_carts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_carts`  AS SELECT `c`.`name` AS `name`, `c`.`images` AS `images`, `b`.`gia` AS `gia`, `a`.`iduser` AS `iduser`, `a`.`idpv` AS `idpv`, `a`.`soluong` AS `soluong`, `a`.`created_at` AS `created_at`, `a`.`updated_at` AS `updated_at` FROM ((`carts` `a` join `product_variants` `b` on((`a`.`idpv` = `b`.`id`))) join `products` `c` on((`b`.`idPro` = `c`.`id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_products`
--
DROP TABLE IF EXISTS `vw_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_products`  AS SELECT `p`.`id` AS `id`, `p`.`name` AS `name`, `p`.`slug` AS `slug`, `p`.`mota` AS `mota`, `p`.`mau` AS `mau`, `p`.`th` AS `th`, `p`.`idCat` AS `idCat`, `p`.`chitiet` AS `chitiet`, `p`.`thutu` AS `thutu`, `p`.`anhien` AS `anhien`, `p`.`created_at` AS `created_at`, `p`.`updated_at` AS `updated_at`, `v`.`id` AS `idv`, `v`.`dungluong` AS `dungluong`, `v`.`gia` AS `gia`, `p`.`images` AS `images`, `v`.`variant` AS `variant`, `v`.`tonkho` AS `tonkho` FROM (`products` `p` join `product_variants` `v`) WHERE ((`p`.`id` = `v`.`idPro`) AND (`v`.`variant` = 0))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`idbill`,`idpro`),
  ADD KEY `idpro` (`idpro`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`iduser`,`idpv`),
  ADD KEY `idpro` (`idpv`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCat` (`idCat`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCat` (`idCat`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPro` (`idPro`);

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
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `billdetail_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billdetail_ibfk_2` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`idpv`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
