-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 11:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it-device`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2023-09-25 01:18:06', '2023-09-25 01:18:06'),
(2, 'Laptop Gaming', '2023-09-25 01:18:12', '2023-09-25 01:18:12'),
(3, 'PC KM Đặc Biệt', '2023-09-25 01:18:24', '2023-09-25 01:18:24'),
(4, 'PC Gaming', '2023-09-25 01:18:34', '2023-09-25 01:18:34'),
(5, 'PC Làm Việc', '2023-09-25 01:18:49', '2023-09-25 01:18:49'),
(6, 'Bộ Nhớ Lưu Trữ', '2023-09-25 01:19:19', '2023-09-25 01:19:19'),
(7, 'Linh Kiện PC', '2023-09-25 01:19:31', '2023-09-25 01:19:31'),
(8, 'Apple', '2023-09-25 01:19:50', '2023-09-25 01:19:50'),
(9, 'Màn Hình', '2023-09-25 01:19:58', '2023-09-25 01:19:58'),
(10, 'Bàn Phím', '2023-09-25 01:20:10', '2023-09-25 01:20:10'),
(11, 'Chuột + Lót Chuột', '2023-09-25 01:20:31', '2023-09-25 01:20:31'),
(12, 'Tai Nghe - Loa', '2023-09-25 01:20:42', '2023-09-25 01:20:42'),
(13, 'Ghế - Bàn', '2023-09-25 01:20:56', '2023-09-25 01:20:56'),
(14, 'Phần Mềm & Mạng', '2023-09-25 01:21:04', '2023-09-25 01:21:04'),
(15, 'Phụ Kiện', '2023-09-25 01:22:07', '2023-09-25 01:22:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
