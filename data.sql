-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 25, 2024 lúc 10:14 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `DB_IS207`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `isDefault` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `userId`, `street`, `ward`, `city`, `state`, `isDefault`, `phone`, `receiver`, `created_at`, `updated_at`) VALUES
(1, 2, 'dsa', 'Thị trấn An Lão', 'Huyện An Lão', 'Thành phố Hải Phòng', 1, '0829004003', 'cuong', '2023-12-07 03:47:16', '2023-12-07 03:47:16'),
(2, 2, 'e12321', 'Xã Đông Hiệp', 'Huyện Cờ Đỏ', 'Thành phố Cần Thơ', 0, '0829004003', 'cuong', '2023-12-07 05:23:13', '2023-12-07 05:23:13'),
(25, 5, 'pcc', 'Xã Hồng Hà', 'Huyện Đan Phượng', 'Thành phố Hà Nội', 1, '0829004003', 'Nguyen Van A', '2023-12-08 20:19:05', '2024-01-03 23:50:00'),
(39, 5, '45 tân lập', 'Phường Đông Hòa', 'Thị xã Dĩ An', 'Tỉnh Bình Dương', 0, '0843450209', 'khánh', '2023-12-27 21:23:40', '2023-12-27 21:23:40'),
(40, 5, '321321', 'Xã Tân Thạnh', 'Huyện Thới Lai', 'Thành phố Cần Thơ', 0, '12342345234', 'test', '2023-12-28 07:09:43', '2023-12-28 07:09:43'),
(41, 7, 'dá', 'Thị trấn Trường Sơn', 'Huyện An Lão', 'Thành phố Hải Phòng', 1, '+49 89 8906650', 'dsa', '2024-01-02 18:32:20', '2024-01-02 18:32:20'),
(42, 8, 'ABC', 'Xã Tân Hiệp', 'Huyện Hóc Môn', 'Thành phố Hồ Chí Minh', 1, '0935957921', 'Thái', '2024-01-04 03:32:24', '2024-01-04 20:08:07'),
(47, 9, 'dá', 'Thị trấn Phong Điền', 'Huyện Phong Điền', 'Thành phố Cần Thơ', 1, 'da', 'test', '2024-01-04 04:06:00', '2024-01-05 00:48:49'),
(48, 9, 'dá', 'Phường Hòa Phát', 'Quận Cẩm Lệ', 'Thành phố Đà Nẵng', 0, 'dsa', 'dsa', '2024-01-04 04:06:18', '2024-01-04 04:06:18'),
(49, 9, 'dá', 'Xã Giai Xuân', 'Huyện Phong Điền', 'Thành phố Cần Thơ', 0, 'dá', 'dá', '2024-01-04 04:06:42', '2024-01-04 04:06:42'),
(50, 10, 'đâs', 'Xã Ba Trại', 'Huyện Ba Vì', 'Thành phố Hà Nội', 1, 'tesst', 'test', '2024-01-04 23:34:07', '2024-01-04 23:34:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'icon-chart-bar', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'icon-server', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'icon-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'icon-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'icon-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'icon-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'icon-history', 'auth/logs', NULL, NULL, NULL),
(8, 0, 8, 'Media manager', 'icon-file', 'media', NULL, '2023-12-14 03:37:33', '2023-12-14 03:37:33'),
(9, 0, 8, 'Helpers', 'icon-cogs', '', NULL, '2023-12-14 03:49:28', '2023-12-14 03:49:28'),
(10, 9, 9, 'Scaffold', 'icon-keyboard', 'helpers/scaffold', NULL, '2023-12-14 03:49:28', '2023-12-14 03:49:28'),
(11, 9, 10, 'Database terminal', 'icon-database', 'helpers/terminal/database', NULL, '2023-12-14 03:49:28', '2023-12-14 03:49:28'),
(12, 9, 11, 'Laravel artisan', 'icon-terminal', 'helpers/terminal/artisan', NULL, '2023-12-14 03:49:28', '2023-12-14 03:49:28'),
(13, 9, 12, 'Routes', 'icon-list-alt', 'helpers/routes', NULL, '2023-12-14 03:49:28', '2023-12-14 03:49:28'),
(17, 0, 12, 'Products', 'icon-warehouse', 'products', NULL, '2024-01-01 07:21:44', '2024-01-02 09:11:15'),
(18, 0, 12, 'Product-details', 'icon-tshirt', 'product-details', NULL, '2024-01-01 07:31:30', '2024-01-02 09:11:58'),
(19, 0, 12, 'Orders', 'icon-file-alt', 'orders', NULL, '2024-01-01 07:39:10', '2024-01-02 09:10:48'),
(20, 0, 12, 'Users', 'icon-user', 'users', NULL, '2024-01-01 09:29:02', '2024-01-02 09:12:12'),
(21, 0, 13, 'Log viewer', 'icon-exclamation-triangle', 'logs', NULL, '2024-01-03 07:53:13', '2024-01-03 07:53:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `method` varchar(10) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `input` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:15:15', '2023-10-10 05:15:15'),
(2, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-10 05:15:28', '2023-10-10 05:15:28'),
(3, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-10 05:21:54', '2023-10-10 05:21:54'),
(4, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-10 05:23:11', '2023-10-10 05:23:11'),
(5, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-10-10 05:23:16', '2023-10-10 05:23:16'),
(6, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:23:19', '2023-10-10 05:23:19'),
(7, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:24:12', '2023-10-10 05:24:12'),
(8, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:24:35', '2023-10-10 05:24:35'),
(9, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:24:36', '2023-10-10 05:24:36'),
(10, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:25:46', '2023-10-10 05:25:46'),
(11, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:26:30', '2023-10-10 05:26:30'),
(12, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-10 05:27:27', '2023-10-10 05:27:27'),
(13, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-10-10 05:27:29', '2023-10-10 05:27:29'),
(14, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-10-10 05:27:29', '2023-10-10 05:27:29'),
(15, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-10-10 05:27:30', '2023-10-10 05:27:30'),
(16, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-10-10 05:27:59', '2023-10-10 05:27:59'),
(17, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:02', '2023-10-10 05:28:02'),
(18, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:03', '2023-10-10 05:28:03'),
(19, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:05', '2023-10-10 05:28:05'),
(20, 1, 'admin/auth/permissions/create', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:43', '2023-10-10 05:28:43'),
(21, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:48', '2023-10-10 05:28:48'),
(22, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:53', '2023-10-10 05:28:53'),
(23, 1, 'admin/auth/roles/create', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:56', '2023-10-10 05:28:56'),
(24, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:58', '2023-10-10 05:28:58'),
(25, 1, 'admin/auth/roles/create', 'GET', '127.0.0.1', '[]', '2023-10-10 05:28:59', '2023-10-10 05:28:59'),
(26, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-10 05:29:34', '2023-10-10 05:29:34'),
(27, 1, 'admin/auth/users/1/edit', 'GET', '127.0.0.1', '[]', '2023-10-10 05:29:36', '2023-10-10 05:29:36'),
(28, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 05:29:39', '2023-10-10 05:29:39'),
(29, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-10 05:30:28', '2023-10-10 05:30:28'),
(30, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-10 06:48:48', '2023-10-10 06:48:48'),
(31, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:46', '2023-10-16 01:16:46'),
(32, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:51', '2023-10-16 01:16:51'),
(33, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:52', '2023-10-16 01:16:52'),
(34, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:52', '2023-10-16 01:16:52'),
(35, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:54', '2023-10-16 01:16:54'),
(36, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:55', '2023-10-16 01:16:55'),
(37, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:58', '2023-10-16 01:16:58'),
(38, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-16 01:16:59', '2023-10-16 01:16:59'),
(39, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-16 01:17:00', '2023-10-16 01:17:00'),
(40, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-10-30 05:24:49', '2023-10-30 05:24:49'),
(41, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-10-30 05:24:55', '2023-10-30 05:24:55'),
(42, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-11-12 02:26:35', '2023-11-12 02:26:35'),
(43, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-11-12 02:26:37', '2023-11-12 02:26:37'),
(44, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-11-12 02:26:39', '2023-11-12 02:26:39'),
(45, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-11-12 02:26:40', '2023-11-12 02:26:40'),
(46, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-11-12 02:26:41', '2023-11-12 02:26:41'),
(47, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-11-12 02:26:43', '2023-11-12 02:26:43'),
(48, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-11-21 21:01:33', '2023-11-21 21:01:33'),
(49, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-11-21 21:01:45', '2023-11-21 21:01:45'),
(50, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-11-21 21:05:09', '2023-11-21 21:05:09'),
(51, 1, 'admin/auth/login', 'GET', '127.0.0.1', '[]', '2023-11-21 21:05:10', '2023-11-21 21:05:10'),
(52, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-11-29 01:57:21', '2023-11-29 01:57:21'),
(53, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-11-29 01:57:26', '2023-11-29 01:57:26'),
(54, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-11-29 01:57:27', '2023-11-29 01:57:27'),
(55, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-11-29 01:57:28', '2023-11-29 01:57:28'),
(56, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-11-29 03:51:50', '2023-11-29 03:51:50'),
(57, 1, 'admin/auth/permissions/create', 'GET', '127.0.0.1', '[]', '2023-11-29 03:51:57', '2023-11-29 03:51:57'),
(58, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-11-29 03:52:00', '2023-11-29 03:52:00'),
(59, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-11-29 03:52:14', '2023-11-29 03:52:14'),
(60, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-11-29 03:52:15', '2023-11-29 03:52:15'),
(61, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:29:00', '2023-12-14 03:29:00'),
(62, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 03:29:04', '2023-12-14 03:29:04'),
(63, 1, 'admin/auth/users/create', 'GET', '127.0.0.1', '[]', '2023-12-14 03:29:07', '2023-12-14 03:29:07'),
(64, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 03:29:09', '2023-12-14 03:29:09'),
(65, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-12-14 03:29:49', '2023-12-14 03:29:49'),
(66, 1, 'admin/auth/roles/create', 'GET', '127.0.0.1', '[]', '2023-12-14 03:29:51', '2023-12-14 03:29:51'),
(67, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-12-14 03:30:09', '2023-12-14 03:30:09'),
(68, 1, 'admin/auth/permissions/create', 'GET', '127.0.0.1', '[]', '2023-12-14 03:30:21', '2023-12-14 03:30:21'),
(69, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-14 03:30:48', '2023-12-14 03:30:48'),
(70, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 03:30:54', '2023-12-14 03:30:54'),
(71, 1, 'admin/auth/users/create', 'GET', '127.0.0.1', '[]', '2023-12-14 03:30:55', '2023-12-14 03:30:55'),
(72, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 03:30:57', '2023-12-14 03:30:57'),
(73, 1, 'admin/auth/users/create', 'GET', '127.0.0.1', '[]', '2023-12-14 03:31:02', '2023-12-14 03:31:02'),
(74, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 03:31:04', '2023-12-14 03:31:04'),
(75, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:31:41', '2023-12-14 03:31:41'),
(76, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:32:03', '2023-12-14 03:32:03'),
(77, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-14 03:32:04', '2023-12-14 03:32:04'),
(78, 1, 'admin/auth/menu/2/edit', 'GET', '127.0.0.1', '[]', '2023-12-14 03:32:06', '2023-12-14 03:32:06'),
(79, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-14 03:32:08', '2023-12-14 03:32:08'),
(80, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:32:19', '2023-12-14 03:32:19'),
(81, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 03:32:29', '2023-12-14 03:32:29'),
(82, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:33:22', '2023-12-14 03:33:22'),
(83, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:38:44', '2023-12-14 03:38:44'),
(84, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:38:46', '2023-12-14 03:38:46'),
(85, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:39:32', '2023-12-14 03:39:32'),
(86, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:39:47', '2023-12-14 03:39:47'),
(87, 1, 'admin/media/download', 'GET', '127.0.0.1', '{\"file\":\".gitignore\"}', '2023-12-14 03:39:50', '2023-12-14 03:39:50'),
(88, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:41:07', '2023-12-14 03:41:07'),
(89, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:41:32', '2023-12-14 03:41:32'),
(90, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:41:34', '2023-12-14 03:41:34'),
(91, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:45', '2023-12-14 03:42:45'),
(92, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:47', '2023-12-14 03:42:47'),
(93, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:48', '2023-12-14 03:42:48'),
(94, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:48', '2023-12-14 03:42:48'),
(95, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:49', '2023-12-14 03:42:49'),
(96, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:49', '2023-12-14 03:42:49'),
(97, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:50', '2023-12-14 03:42:50'),
(98, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:50', '2023-12-14 03:42:50'),
(99, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:56', '2023-12-14 03:42:56'),
(100, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:57', '2023-12-14 03:42:57'),
(101, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:58', '2023-12-14 03:42:58'),
(102, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:42:58', '2023-12-14 03:42:58'),
(103, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:43:05', '2023-12-14 03:43:05'),
(104, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:43:06', '2023-12-14 03:43:06'),
(105, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:43:09', '2023-12-14 03:43:09'),
(106, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:43:18', '2023-12-14 03:43:18'),
(107, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:43:18', '2023-12-14 03:43:18'),
(108, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:43:19', '2023-12-14 03:43:19'),
(109, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:20', '2023-12-14 03:43:20'),
(110, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:21', '2023-12-14 03:43:21'),
(111, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:21', '2023-12-14 03:43:21'),
(112, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:45', '2023-12-14 03:43:45'),
(113, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:47', '2023-12-14 03:43:47'),
(114, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:47', '2023-12-14 03:43:47'),
(115, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:55', '2023-12-14 03:43:55'),
(116, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:43:56', '2023-12-14 03:43:56'),
(117, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:44:01', '2023-12-14 03:44:01'),
(118, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:44:01', '2023-12-14 03:44:01'),
(119, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:44:02', '2023-12-14 03:44:02'),
(120, 1, 'admin/media', 'GET', '127.0.0.1', '{\"select\":null,\"fn\":\"selectFile\"}', '2023-12-14 03:44:21', '2023-12-14 03:44:21'),
(121, 1, 'admin/media', 'GET', '127.0.0.1', '{\"path\":\"\\/imgs\"}', '2023-12-14 03:44:27', '2023-12-14 03:44:27'),
(122, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:44:29', '2023-12-14 03:44:29'),
(123, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:44:32', '2023-12-14 03:44:32'),
(124, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:44:40', '2023-12-14 03:44:40'),
(125, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:44:42', '2023-12-14 03:44:42'),
(126, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:44:44', '2023-12-14 03:44:44'),
(127, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:50:15', '2023-12-14 03:50:15'),
(128, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2023-12-14 03:50:18', '2023-12-14 03:50:18'),
(129, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2023-12-14 03:50:19', '2023-12-14 03:50:19'),
(130, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2023-12-14 03:50:20', '2023-12-14 03:50:20'),
(131, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2023-12-14 03:50:21', '2023-12-14 03:50:21'),
(132, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2023-12-14 03:50:24', '2023-12-14 03:50:24'),
(133, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2023-12-14 03:50:38', '2023-12-14 03:50:38'),
(134, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2023-12-14 03:53:22', '2023-12-14 03:53:22'),
(135, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2023-12-14 03:53:22', '2023-12-14 03:53:22'),
(136, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2023-12-14 03:53:26', '2023-12-14 03:53:26'),
(137, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:53:29', '2023-12-14 03:53:29'),
(138, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 03:56:39', '2023-12-14 03:56:39'),
(139, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2023-12-14 03:56:41', '2023-12-14 03:56:41'),
(140, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2023-12-14 03:56:43', '2023-12-14 03:56:43'),
(141, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2023-12-14 03:56:43', '2023-12-14 03:56:43'),
(142, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2023-12-14 03:56:44', '2023-12-14 03:56:44'),
(143, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 03:56:52', '2023-12-14 03:56:52'),
(144, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 03:57:13', '2023-12-14 03:57:13'),
(145, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 04:01:29', '2023-12-14 04:01:29'),
(146, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 04:01:44', '2023-12-14 04:01:44'),
(147, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-12-14 04:01:55', '2023-12-14 04:01:55'),
(148, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-12-14 04:01:57', '2023-12-14 04:01:57'),
(149, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-14 04:01:59', '2023-12-14 04:01:59'),
(150, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:02', '2023-12-14 04:02:02'),
(151, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:07', '2023-12-14 04:02:07'),
(152, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:09', '2023-12-14 04:02:09'),
(153, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:09', '2023-12-14 04:02:09'),
(154, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:10', '2023-12-14 04:02:10'),
(155, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:10', '2023-12-14 04:02:10'),
(156, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:13', '2023-12-14 04:02:13'),
(157, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:35', '2023-12-14 04:02:35'),
(158, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:37', '2023-12-14 04:02:37'),
(159, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:38', '2023-12-14 04:02:38'),
(160, 1, 'admin/auth/users/create', 'GET', '127.0.0.1', '[]', '2023-12-14 04:02:39', '2023-12-14 04:02:39'),
(161, 1, 'admin/auth/users', 'POST', '127.0.0.1', '{\"username\":\"test\",\"name\":\"test\",\"password\":\"*****-filtered-out-*****\",\"password_confirmation\":\"test\",\"roles\":[\"1\",null],\"search_terms\":null,\"permissions\":[null],\"_token\":\"sLkm5bWqAD4dMnrkbOMwjkKKnJ62IqRNUsXkMB0I\"}', '2023-12-14 04:02:59', '2023-12-14 04:02:59'),
(162, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-14 04:03:00', '2023-12-14 04:03:00'),
(163, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 07:09:31', '2023-12-14 07:09:31'),
(164, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2023-12-14 07:09:38', '2023-12-14 07:09:38'),
(165, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2023-12-14 07:09:40', '2023-12-14 07:09:40'),
(166, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2023-12-14 07:09:41', '2023-12-14 07:09:41'),
(167, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2023-12-14 07:09:41', '2023-12-14 07:09:41'),
(168, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-14 07:10:05', '2023-12-14 07:10:05'),
(169, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-28 07:11:53', '2023-12-28 07:11:53'),
(170, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-28 07:11:58', '2023-12-28 07:11:58'),
(171, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-12-28 07:11:59', '2023-12-28 07:11:59'),
(172, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-28 07:12:00', '2023-12-28 07:12:00'),
(173, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-12-28 07:12:03', '2023-12-28 07:12:03'),
(174, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-12-28 07:12:03', '2023-12-28 07:12:03'),
(175, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 06:45:32', '2024-01-01 06:45:32'),
(176, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 06:45:34', '2024-01-01 06:45:34'),
(177, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-01 06:45:35', '2024-01-01 06:45:35'),
(178, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-01 06:45:36', '2024-01-01 06:45:36'),
(179, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 06:45:38', '2024-01-01 06:45:38'),
(180, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 06:47:33', '2024-01-01 06:47:33'),
(181, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2024-01-01 06:50:20', '2024-01-01 06:50:20'),
(182, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 06:50:21', '2024-01-01 06:50:21'),
(183, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 06:54:26', '2024-01-01 06:54:26'),
(184, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 06:54:28', '2024-01-01 06:54:28'),
(185, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 06:54:32', '2024-01-01 06:54:32'),
(186, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 06:54:40', '2024-01-01 06:54:40'),
(187, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2024-01-01 06:55:00', '2024-01-01 06:55:00'),
(188, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2024-01-01 06:55:01', '2024-01-01 06:55:01'),
(189, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 06:55:01', '2024-01-01 06:55:01'),
(190, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2024-01-01 06:55:11', '2024-01-01 06:55:11'),
(191, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2024-01-01 06:55:11', '2024-01-01 06:55:11'),
(192, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 06:55:12', '2024-01-01 06:55:12'),
(193, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"products\",\"model_name\":\"App\\\\Models\\\\Product\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\ProductController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 06:57:42', '2024-01-01 06:57:42'),
(194, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 06:57:42', '2024-01-01 06:57:42'),
(195, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 06:57:50', '2024-01-01 06:57:50'),
(196, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 06:57:54', '2024-01-01 06:57:54'),
(197, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 06:57:55', '2024-01-01 06:57:55'),
(198, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-01 06:57:58', '2024-01-01 06:57:58'),
(199, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-01 06:57:59', '2024-01-01 06:57:59'),
(200, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 07:00:38', '2024-01-01 07:00:38'),
(201, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:00:40', '2024-01-01 07:00:40'),
(202, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2024-01-01 07:00:41', '2024-01-01 07:00:41'),
(203, 1, 'admin/helpers/terminal/database', 'POST', '127.0.0.1', '{\"c\":\"db:mysql\",\"q\":\"SELECT * FROM products;\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:00:50', '2024-01-01 07:00:50'),
(204, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:00:56', '2024-01-01 07:00:56'),
(205, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2024-01-01 07:00:57', '2024-01-01 07:00:57'),
(206, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:01:03', '2024-01-01 07:01:03'),
(207, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"products\",\"model_name\":\"App\\\\Models\\\\Product\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\ProductController\",\"create\":[\"migration\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":null,\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:01:20', '2024-01-01 07:01:20'),
(208, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:01:20', '2024-01-01 07:01:20'),
(209, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"products\",\"model_name\":\"App\\\\Models\\\\Product\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\ProductController\",\"create\":[\"menu_item\"],\"fields\":[{\"name\":\"productId\",\"type\":\"unsignedTinyInteger\",\"key\":\"unique\",\"default\":null,\"comment\":null},{\"name\":\"name\",\"type\":\"text\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"categoryId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"collectionId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"price\",\"type\":\"tinyInteger\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"text\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"productId\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:06:40', '2024-01-01 07:06:40'),
(210, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:06:40', '2024-01-01 07:06:40'),
(211, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:06:50', '2024-01-01 07:06:50'),
(212, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:07:00', '2024-01-01 07:07:00'),
(213, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 07:08:04', '2024-01-01 07:08:04'),
(214, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:08:06', '2024-01-01 07:08:06'),
(215, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"products\",\"model_name\":\"App\\\\Models\\\\Product\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\ProductController\",\"create\":[\"controller\",\"menu_item\"],\"fields\":[{\"name\":\"productId\",\"type\":\"unsignedTinyInteger\",\"key\":\"unique\",\"default\":null,\"comment\":null},{\"name\":\"name\",\"type\":\"text\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"price\",\"type\":\"text\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"categoryId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"collectionId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"text\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"productId\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:11:09', '2024-01-01 07:11:09'),
(216, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:09', '2024-01-01 07:11:09'),
(217, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:20', '2024-01-01 07:11:20'),
(218, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:29', '2024-01-01 07:11:29'),
(219, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:38', '2024-01-01 07:11:38'),
(220, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:39', '2024-01-01 07:11:39'),
(221, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:40', '2024-01-01 07:11:40'),
(222, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:41', '2024-01-01 07:11:41'),
(223, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:42', '2024-01-01 07:11:42'),
(224, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:43', '2024-01-01 07:11:43'),
(225, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:43', '2024-01-01 07:11:43'),
(226, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:44', '2024-01-01 07:11:44'),
(227, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:47', '2024-01-01 07:11:47'),
(228, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:53', '2024-01-01 07:11:53'),
(229, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 07:11:53', '2024-01-01 07:11:53'),
(230, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 07:12:20', '2024-01-01 07:12:20'),
(231, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 07:12:41', '2024-01-01 07:12:41'),
(232, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 07:12:50', '2024-01-01 07:12:50'),
(233, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-01 07:12:52', '2024-01-01 07:12:52'),
(234, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:12:54', '2024-01-01 07:12:54'),
(235, 1, 'admin/auth/menu/14', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:12:59', '2024-01-01 07:12:59'),
(236, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:12:59', '2024-01-01 07:12:59'),
(237, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:13:01', '2024-01-01 07:13:01'),
(238, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-01 07:13:38', '2024-01-01 07:13:38'),
(239, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 07:13:42', '2024-01-01 07:13:42'),
(240, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:13:43', '2024-01-01 07:13:43'),
(241, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2024-01-01 07:13:46', '2024-01-01 07:13:46'),
(242, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2024-01-01 07:13:46', '2024-01-01 07:13:46'),
(243, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 07:13:47', '2024-01-01 07:13:47'),
(244, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:14:26', '2024-01-01 07:14:26'),
(245, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:14:30', '2024-01-01 07:14:30'),
(246, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 07:14:36', '2024-01-01 07:14:36'),
(247, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:14:36', '2024-01-01 07:14:36'),
(248, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:14:46', '2024-01-01 07:14:46'),
(249, 1, 'admin/auth/menu/15', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:14:50', '2024-01-01 07:14:50'),
(250, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:14:50', '2024-01-01 07:14:50'),
(251, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:15:04', '2024-01-01 07:15:04'),
(252, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:15:09', '2024-01-01 07:15:09'),
(253, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:15:12', '2024-01-01 07:15:12'),
(254, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"products\",\"model_name\":\"App\\\\Models\\\\Product.php\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\AdminProductController\",\"create\":[\"controller\",\"menu_item\"],\"fields\":[{\"name\":\"productId\",\"type\":\"unsignedTinyInteger\",\"key\":\"unique\",\"default\":null,\"comment\":null},{\"name\":\"name\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"price\",\"type\":\"tinyInteger\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"categoryId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"collectionId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"productId\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:18:28', '2024-01-01 07:18:28'),
(255, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:18:28', '2024-01-01 07:18:28'),
(256, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:18:30', '2024-01-01 07:18:30'),
(257, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:18:51', '2024-01-01 07:18:51'),
(258, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 07:19:36', '2024-01-01 07:19:36'),
(259, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:19:37', '2024-01-01 07:19:37'),
(260, 1, 'admin/auth/menu/16', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:19:41', '2024-01-01 07:19:41'),
(261, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:19:41', '2024-01-01 07:19:41'),
(262, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:19:44', '2024-01-01 07:19:44'),
(263, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:19:46', '2024-01-01 07:19:46'),
(264, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"products\",\"model_name\":\"App\\\\Models\\\\Product\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\AdminProductController\",\"create\":[\"controller\",\"menu_item\"],\"fields\":[{\"name\":\"productId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":\"unique\",\"default\":null,\"comment\":null},{\"name\":\"name\",\"type\":\"unsignedTinyInteger\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"categoryId\",\"type\":\"unsignedTinyInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"collectionId\",\"type\":\"string\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"price\",\"type\":\"tinyInteger\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"productId\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:21:44', '2024-01-01 07:21:44'),
(265, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:21:44', '2024-01-01 07:21:44'),
(266, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:22:17', '2024-01-01 07:22:17'),
(267, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:22:18', '2024-01-01 07:22:18'),
(268, 1, 'admin/products/create', 'GET', '127.0.0.1', '[]', '2024-01-01 07:22:27', '2024-01-01 07:22:27'),
(269, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:22:38', '2024-01-01 07:22:38'),
(270, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:22:41', '2024-01-01 07:22:41'),
(271, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"product_details\",\"model_name\":\"App\\\\Models\\\\ProductDetail\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\ProductDetailController\",\"create\":[\"controller\",\"menu_item\"],\"fields\":[{\"name\":\"productDetailId\",\"type\":\"unsignedBigInteger\",\"key\":\"unique\",\"default\":null,\"comment\":null},{\"name\":\"productId\",\"type\":\"unsignedTinyInteger\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"img\",\"type\":\"longText\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"size\",\"type\":\"text\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"color\",\"type\":\"text\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"stock\",\"type\":\"tinyInteger\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"productDetailId\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:31:30', '2024-01-01 07:31:30'),
(272, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:30', '2024-01-01 07:31:30'),
(273, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:37', '2024-01-01 07:31:37'),
(274, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:38', '2024-01-01 07:31:38'),
(275, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:38', '2024-01-01 07:31:38'),
(276, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:38', '2024-01-01 07:31:38'),
(277, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:38', '2024-01-01 07:31:38'),
(278, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(279, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(280, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(281, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(282, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(283, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(284, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(285, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(286, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(287, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(288, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:39', '2024-01-01 07:31:39'),
(289, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:40', '2024-01-01 07:31:40'),
(290, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:40', '2024-01-01 07:31:40'),
(291, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:40', '2024-01-01 07:31:40'),
(292, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:40', '2024-01-01 07:31:40'),
(293, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:40', '2024-01-01 07:31:40'),
(294, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:40', '2024-01-01 07:31:40'),
(295, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:43', '2024-01-01 07:31:43'),
(296, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:43', '2024-01-01 07:31:43'),
(297, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(298, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(299, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(300, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(301, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(302, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(303, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(304, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(305, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(306, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(307, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:44', '2024-01-01 07:31:44'),
(308, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(309, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(310, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(311, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(312, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(313, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(314, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(315, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:45', '2024-01-01 07:31:45'),
(316, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:46', '2024-01-01 07:31:46'),
(317, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:48', '2024-01-01 07:31:48'),
(318, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:48', '2024-01-01 07:31:48'),
(319, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:48', '2024-01-01 07:31:48'),
(320, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:48', '2024-01-01 07:31:48'),
(321, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:48', '2024-01-01 07:31:48'),
(322, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:48', '2024-01-01 07:31:48'),
(323, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(324, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(325, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(326, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(327, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(328, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(329, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(330, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(331, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(332, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(333, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(334, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:49', '2024-01-01 07:31:49'),
(335, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:50', '2024-01-01 07:31:50'),
(336, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:50', '2024-01-01 07:31:50'),
(337, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:50', '2024-01-01 07:31:50'),
(338, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:51', '2024-01-01 07:31:51'),
(339, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:51', '2024-01-01 07:31:51'),
(340, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:51', '2024-01-01 07:31:51'),
(341, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:51', '2024-01-01 07:31:51'),
(342, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:51', '2024-01-01 07:31:51'),
(343, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:51', '2024-01-01 07:31:51'),
(344, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:51', '2024-01-01 07:31:51'),
(345, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(346, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(347, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(348, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(349, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(350, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(351, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(352, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(353, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(354, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(355, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:52', '2024-01-01 07:31:52'),
(356, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:53', '2024-01-01 07:31:53'),
(357, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:53', '2024-01-01 07:31:53'),
(358, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:31:53', '2024-01-01 07:31:53'),
(359, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:11', '2024-01-01 07:32:11'),
(360, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:14', '2024-01-01 07:32:14'),
(361, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:14', '2024-01-01 07:32:14'),
(362, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:14', '2024-01-01 07:32:14'),
(363, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:14', '2024-01-01 07:32:14'),
(364, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:14', '2024-01-01 07:32:14'),
(365, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:14', '2024-01-01 07:32:14'),
(366, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:14', '2024-01-01 07:32:14'),
(367, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(368, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(369, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(370, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(371, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(372, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(373, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(374, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(375, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(376, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(377, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(378, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:15', '2024-01-01 07:32:15'),
(379, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(380, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(381, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(382, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(383, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(384, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(385, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(386, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(387, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(388, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(389, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:16', '2024-01-01 07:32:16'),
(390, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(391, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(392, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(393, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(394, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(395, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(396, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(397, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(398, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(399, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(400, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:17', '2024-01-01 07:32:17'),
(401, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:18', '2024-01-01 07:32:18'),
(402, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:32:21', '2024-01-01 07:32:21'),
(403, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:33:13', '2024-01-01 07:33:13'),
(404, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:33:41', '2024-01-01 07:33:41'),
(405, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:33:42', '2024-01-01 07:33:42'),
(406, 1, 'admin/product-details', 'GET', '127.0.0.1', '{\"page\":\"2\"}', '2024-01-01 07:33:50', '2024-01-01 07:33:50'),
(407, 1, 'admin/product-details', 'GET', '127.0.0.1', '{\"page\":\"3\"}', '2024-01-01 07:33:52', '2024-01-01 07:33:52'),
(408, 1, 'admin/product-details', 'GET', '127.0.0.1', '{\"page\":\"1\"}', '2024-01-01 07:33:55', '2024-01-01 07:33:55'),
(409, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:33:57', '2024-01-01 07:33:57'),
(410, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:34:01', '2024-01-01 07:34:01'),
(411, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 07:34:06', '2024-01-01 07:34:06'),
(412, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 07:34:09', '2024-01-01 07:34:09'),
(413, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 07:34:17', '2024-01-01 07:34:17'),
(414, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:34:23', '2024-01-01 07:34:23'),
(415, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:35:44', '2024-01-01 07:35:44'),
(416, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:35:46', '2024-01-01 07:35:46'),
(417, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:35:50', '2024-01-01 07:35:50');
INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(418, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"orders\",\"model_name\":\"App\\\\Models\\\\Orders\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\OrdersController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"id\",\"type\":\"unsignedBigInteger\",\"key\":\"unique\",\"default\":null,\"comment\":null},{\"name\":\"userId\",\"type\":\"unsignedBigInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"status\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"paymentMethod\",\"type\":\"text\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"addressId\",\"type\":\"string\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"totalPrice\",\"type\":\"double\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:39:03', '2024-01-01 07:39:03'),
(419, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:39:03', '2024-01-01 07:39:03'),
(420, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"orders\",\"model_name\":\"App\\\\Models\\\\Orders\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\OrdersController\",\"create\":[\"controller\",\"menu_item\"],\"fields\":[{\"name\":\"id\",\"type\":\"unsignedBigInteger\",\"key\":\"unique\",\"default\":null,\"comment\":null},{\"name\":\"userId\",\"type\":\"unsignedBigInteger\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"status\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"paymentMethod\",\"type\":\"text\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"addressId\",\"type\":\"string\",\"nullable\":\"on\",\"key\":\"index\",\"default\":null,\"comment\":null},{\"name\":\"totalPrice\",\"type\":\"double\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 07:39:10', '2024-01-01 07:39:10'),
(421, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 07:39:10', '2024-01-01 07:39:10'),
(422, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:39:50', '2024-01-01 07:39:50'),
(423, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 07:39:51', '2024-01-01 07:39:51'),
(424, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 07:40:02', '2024-01-01 07:40:02'),
(425, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 07:40:05', '2024-01-01 07:40:05'),
(426, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-01 07:41:35', '2024-01-01 07:41:35'),
(427, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 07:41:38', '2024-01-01 07:41:38'),
(428, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 08:34:24', '2024-01-01 08:34:24'),
(429, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 08:34:30', '2024-01-01 08:34:30'),
(430, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 08:34:45', '2024-01-01 08:34:45'),
(431, 1, 'admin/auth/setting', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:04', '2024-01-01 08:35:04'),
(432, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:07', '2024-01-01 08:35:07'),
(433, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:08', '2024-01-01 08:35:08'),
(434, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:26', '2024-01-01 08:35:26'),
(435, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:27', '2024-01-01 08:35:27'),
(436, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:27', '2024-01-01 08:35:27'),
(437, 1, 'admin/product-details/create', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:28', '2024-01-01 08:35:28'),
(438, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:41', '2024-01-01 08:35:41'),
(439, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:42', '2024-01-01 08:35:42'),
(440, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:43', '2024-01-01 08:35:43'),
(441, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:45', '2024-01-01 08:35:45'),
(442, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:35:46', '2024-01-01 08:35:46'),
(443, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 08:39:38', '2024-01-01 08:39:38'),
(444, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 08:39:39', '2024-01-01 08:39:39'),
(445, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-01 08:45:39', '2024-01-01 08:45:39'),
(446, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 08:45:40', '2024-01-01 08:45:40'),
(447, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:45:41', '2024-01-01 08:45:41'),
(448, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:45:54', '2024-01-01 08:45:54'),
(449, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:45:57', '2024-01-01 08:45:57'),
(450, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:45:58', '2024-01-01 08:45:58'),
(451, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:45:59', '2024-01-01 08:45:59'),
(452, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:46:02', '2024-01-01 08:46:02'),
(453, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:46:03', '2024-01-01 08:46:03'),
(454, 1, 'admin/products/10', 'GET', '127.0.0.1', '[]', '2024-01-01 08:46:10', '2024-01-01 08:46:10'),
(455, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:46:13', '2024-01-01 08:46:13'),
(456, 1, 'admin/products/10', 'GET', '127.0.0.1', '[]', '2024-01-01 08:46:24', '2024-01-01 08:46:24'),
(457, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:46:26', '2024-01-01 08:46:26'),
(458, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:46:29', '2024-01-01 08:46:29'),
(459, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:21', '2024-01-01 08:48:21'),
(460, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:23', '2024-01-01 08:48:23'),
(461, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:24', '2024-01-01 08:48:24'),
(462, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:27', '2024-01-01 08:48:27'),
(463, 1, 'admin/product-details', 'GET', '127.0.0.1', '{\"id\":\"5\"}', '2024-01-01 08:48:32', '2024-01-01 08:48:32'),
(464, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:35', '2024-01-01 08:48:35'),
(465, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:45', '2024-01-01 08:48:45'),
(466, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:48', '2024-01-01 08:48:48'),
(467, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:50', '2024-01-01 08:48:50'),
(468, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:52', '2024-01-01 08:48:52'),
(469, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:48:53', '2024-01-01 08:48:53'),
(470, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:49:00', '2024-01-01 08:49:00'),
(471, 1, 'admin/product-details/create', 'GET', '127.0.0.1', '[]', '2024-01-01 08:49:08', '2024-01-01 08:49:08'),
(472, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:49:17', '2024-01-01 08:49:17'),
(473, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 08:50:05', '2024-01-01 08:50:05'),
(474, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-01 08:51:10', '2024-01-01 08:51:10'),
(475, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:14', '2024-01-01 08:52:14'),
(476, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:15', '2024-01-01 08:52:15'),
(477, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:16', '2024-01-01 08:52:16'),
(478, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:17', '2024-01-01 08:52:17'),
(479, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:18', '2024-01-01 08:52:18'),
(480, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:20', '2024-01-01 08:52:20'),
(481, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:22', '2024-01-01 08:52:22'),
(482, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:52:59', '2024-01-01 08:52:59'),
(483, 1, 'admin/product-details/create', 'GET', '127.0.0.1', '[]', '2024-01-01 08:53:28', '2024-01-01 08:53:28'),
(484, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:53:34', '2024-01-01 08:53:34'),
(485, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:53:42', '2024-01-01 08:53:42'),
(486, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 08:53:45', '2024-01-01 08:53:45'),
(487, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:53:54', '2024-01-01 08:53:54'),
(488, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:53:55', '2024-01-01 08:53:55'),
(489, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:54:00', '2024-01-01 08:54:00'),
(490, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:54:04', '2024-01-01 08:54:04'),
(491, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:54:36', '2024-01-01 08:54:36'),
(492, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:55:46', '2024-01-01 08:55:46'),
(493, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:57:34', '2024-01-01 08:57:34'),
(494, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:57:35', '2024-01-01 08:57:35'),
(495, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-01 08:57:46', '2024-01-01 08:57:46'),
(496, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:57:48', '2024-01-01 08:57:48'),
(497, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:58:02', '2024-01-01 08:58:02'),
(498, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:58:07', '2024-01-01 08:58:07'),
(499, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:58:11', '2024-01-01 08:58:11'),
(500, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:58:33', '2024-01-01 08:58:33'),
(501, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 08:58:37', '2024-01-01 08:58:37'),
(502, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:58:38', '2024-01-01 08:58:38'),
(503, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:58:39', '2024-01-01 08:58:39'),
(504, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 08:59:07', '2024-01-01 08:59:07'),
(505, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 08:59:11', '2024-01-01 08:59:11'),
(506, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:59:12', '2024-01-01 08:59:12'),
(507, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-01 08:59:16', '2024-01-01 08:59:16'),
(508, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 08:59:19', '2024-01-01 08:59:19'),
(509, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-01 09:01:50', '2024-01-01 09:01:50'),
(510, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 09:01:52', '2024-01-01 09:01:52'),
(511, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:03:16', '2024-01-01 09:03:16'),
(512, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-01 09:03:17', '2024-01-01 09:03:17'),
(513, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:03:50', '2024-01-01 09:03:50'),
(514, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:05:48', '2024-01-01 09:05:48'),
(515, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:05:52', '2024-01-01 09:05:52'),
(516, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:06:03', '2024-01-01 09:06:03'),
(517, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:06:07', '2024-01-01 09:06:07'),
(518, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:06:12', '2024-01-01 09:06:12'),
(519, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"userId\":\"5\",\"status\":\"Pending\",\"paymentMethod\":\"Pay at our store\",\"addressID\":\"25\",\"totalPrice\":\"64\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\",\"_method\":\"PUT\"}', '2024-01-01 09:06:17', '2024-01-01 09:06:17'),
(520, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:06:17', '2024-01-01 09:06:17'),
(521, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:06:22', '2024-01-01 09:06:22'),
(522, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:09:07', '2024-01-01 09:09:07'),
(523, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:09:10', '2024-01-01 09:09:10'),
(524, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:09:32', '2024-01-01 09:09:32'),
(525, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:09:41', '2024-01-01 09:09:41'),
(526, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:09:43', '2024-01-01 09:09:43'),
(527, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:09:45', '2024-01-01 09:09:45'),
(528, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:10:34', '2024-01-01 09:10:34'),
(529, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:10:36', '2024-01-01 09:10:36'),
(530, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:10:41', '2024-01-01 09:10:41'),
(531, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:10:53', '2024-01-01 09:10:53'),
(532, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:11:14', '2024-01-01 09:11:14'),
(533, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:12:24', '2024-01-01 09:12:24'),
(534, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:12:27', '2024-01-01 09:12:27'),
(535, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:12:54', '2024-01-01 09:12:54'),
(536, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:12:58', '2024-01-01 09:12:58'),
(537, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:13:14', '2024-01-01 09:13:14'),
(538, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:13:53', '2024-01-01 09:13:53'),
(539, 1, 'admin/orders/17/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:13:54', '2024-01-01 09:13:54'),
(540, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:13:57', '2024-01-01 09:13:57'),
(541, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:14:42', '2024-01-01 09:14:42'),
(542, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:14:44', '2024-01-01 09:14:44'),
(543, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:15:16', '2024-01-01 09:15:16'),
(544, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:13', '2024-01-01 09:19:13'),
(545, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:14', '2024-01-01 09:19:14'),
(546, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:14', '2024-01-01 09:19:14'),
(547, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(548, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(549, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(550, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(551, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(552, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(553, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(554, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(555, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(556, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(557, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(558, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:15', '2024-01-01 09:19:15'),
(559, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:16', '2024-01-01 09:19:16'),
(560, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:16', '2024-01-01 09:19:16'),
(561, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:16', '2024-01-01 09:19:16'),
(562, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:16', '2024-01-01 09:19:16'),
(563, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:16', '2024-01-01 09:19:16'),
(564, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:16', '2024-01-01 09:19:16'),
(565, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:16', '2024-01-01 09:19:16'),
(566, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:18', '2024-01-01 09:19:18'),
(567, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(568, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(569, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(570, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(571, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(572, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(573, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(574, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(575, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(576, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(577, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(578, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:19', '2024-01-01 09:19:19'),
(579, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(580, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(581, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(582, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(583, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(584, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(585, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(586, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:20', '2024-01-01 09:19:20'),
(587, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:31', '2024-01-01 09:19:31'),
(588, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:32', '2024-01-01 09:19:32'),
(589, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:19:33', '2024-01-01 09:19:33'),
(590, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:20:38', '2024-01-01 09:20:38'),
(591, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:20:40', '2024-01-01 09:20:40'),
(592, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-01 09:20:55', '2024-01-01 09:20:55'),
(593, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:20:57', '2024-01-01 09:20:57'),
(594, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:21:13', '2024-01-01 09:21:13'),
(595, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:21:17', '2024-01-01 09:21:17'),
(596, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:22:30', '2024-01-01 09:22:30'),
(597, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:23:00', '2024-01-01 09:23:00'),
(598, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:23:27', '2024-01-01 09:23:27'),
(599, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:23:43', '2024-01-01 09:23:43'),
(600, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:24:01', '2024-01-01 09:24:01'),
(601, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:24:51', '2024-01-01 09:24:51'),
(602, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:24:58', '2024-01-01 09:24:58'),
(603, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:25:28', '2024-01-01 09:25:28'),
(604, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:25:39', '2024-01-01 09:25:39'),
(605, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 09:26:54', '2024-01-01 09:26:54'),
(606, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"users\",\"model_name\":\"App\\\\Models\\\\User\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\UserController\",\"create\":[\"controller\",\"menu_item\"],\"fields\":[{\"name\":\"id\",\"type\":\"unsignedBigInteger\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"name\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"email\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"email_verified_at\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"password\",\"type\":\"string\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"remember_token\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"3EsltI80Ab14ULcLlKEJL6PupnsN4RO2WIPE3ISR\"}', '2024-01-01 09:29:02', '2024-01-01 09:29:02'),
(607, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:03', '2024-01-01 09:29:03'),
(608, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:15', '2024-01-01 09:29:15'),
(609, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:17', '2024-01-01 09:29:17'),
(610, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:23', '2024-01-01 09:29:23'),
(611, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:25', '2024-01-01 09:29:25'),
(612, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:38', '2024-01-01 09:29:38'),
(613, 1, 'admin/orders/17/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:42', '2024-01-01 09:29:42'),
(614, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:48', '2024-01-01 09:29:48'),
(615, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:29:58', '2024-01-01 09:29:58'),
(616, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:30:00', '2024-01-01 09:30:00'),
(617, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:30:02', '2024-01-01 09:30:02'),
(618, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:30:56', '2024-01-01 09:30:56'),
(619, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:30:58', '2024-01-01 09:30:58'),
(620, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:31:04', '2024-01-01 09:31:04'),
(621, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:31:35', '2024-01-01 09:31:35'),
(622, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:31:51', '2024-01-01 09:31:51'),
(623, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-01 09:31:52', '2024-01-01 09:31:52'),
(624, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-01 09:31:54', '2024-01-01 09:31:54'),
(625, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:31:58', '2024-01-01 09:31:58'),
(626, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:32:44', '2024-01-01 09:32:44'),
(627, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:07', '2024-01-01 09:33:07'),
(628, 1, 'admin/users/5', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:10', '2024-01-01 09:33:10'),
(629, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:12', '2024-01-01 09:33:12'),
(630, 1, 'admin/users/5', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:13', '2024-01-01 09:33:13'),
(631, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:14', '2024-01-01 09:33:14'),
(632, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:29', '2024-01-01 09:33:29'),
(633, 1, 'admin/users/5', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:36', '2024-01-01 09:33:36'),
(634, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:38', '2024-01-01 09:33:38'),
(635, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-01 09:33:48', '2024-01-01 09:33:48'),
(636, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:26', '2024-01-02 08:28:26'),
(637, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:29', '2024-01-02 08:28:29'),
(638, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:31', '2024-01-02 08:28:31'),
(639, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:36', '2024-01-02 08:28:36'),
(640, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:40', '2024-01-02 08:28:40'),
(641, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:42', '2024-01-02 08:28:42'),
(642, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:45', '2024-01-02 08:28:45'),
(643, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:46', '2024-01-02 08:28:46'),
(644, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 08:28:48', '2024-01-02 08:28:48'),
(645, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-02 08:29:22', '2024-01-02 08:29:22'),
(646, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-02 08:29:24', '2024-01-02 08:29:24'),
(647, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-02 08:29:26', '2024-01-02 08:29:26'),
(648, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:08:58', '2024-01-02 09:08:58'),
(649, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:12', '2024-01-02 09:09:12'),
(650, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:14', '2024-01-02 09:09:14'),
(651, 1, 'admin/helpers/terminal/artisan', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:15', '2024-01-02 09:09:15'),
(652, 1, 'admin/helpers/routes', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:16', '2024-01-02 09:09:16'),
(653, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:18', '2024-01-02 09:09:18'),
(654, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:19', '2024-01-02 09:09:19'),
(655, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:20', '2024-01-02 09:09:20'),
(656, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:21', '2024-01-02 09:09:21'),
(657, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:23', '2024-01-02 09:09:23'),
(658, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:24', '2024-01-02 09:09:24'),
(659, 1, 'admin/auth/menu/19/edit', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:26', '2024-01-02 09:09:26'),
(660, 1, 'admin/auth/menu/19', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"search_terms\":null,\"title\":\"Orders\",\"icon\":\"order\",\"uri\":\"orders\",\"roles\":[null],\"permission\":null,\"_token\":\"7Zicqi4aTJOaPYxZFBFBGsFLMz7XDttzbyRDNWtF\",\"_method\":\"PUT\"}', '2024-01-02 09:09:55', '2024-01-02 09:09:55'),
(661, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:55', '2024-01-02 09:09:55'),
(662, 1, 'admin/auth/menu/19/edit', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:57', '2024-01-02 09:09:57'),
(663, 1, 'admin/auth/menu/19', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"search_terms\":null,\"title\":\"Orders\",\"icon\":\"icon-file-alt\",\"uri\":\"orders\",\"roles\":[null],\"permission\":null,\"_token\":\"7Zicqi4aTJOaPYxZFBFBGsFLMz7XDttzbyRDNWtF\",\"_method\":\"PUT\"}', '2024-01-02 09:10:48', '2024-01-02 09:10:48'),
(664, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:10:48', '2024-01-02 09:10:48'),
(665, 1, 'admin/auth/menu/17/edit', 'GET', '127.0.0.1', '[]', '2024-01-02 09:10:54', '2024-01-02 09:10:54'),
(666, 1, 'admin/auth/menu/17', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"search_terms\":null,\"title\":\"Products\",\"icon\":\"icon-warehouse\",\"uri\":\"products\",\"roles\":[null],\"permission\":null,\"_token\":\"7Zicqi4aTJOaPYxZFBFBGsFLMz7XDttzbyRDNWtF\",\"_method\":\"PUT\"}', '2024-01-02 09:11:15', '2024-01-02 09:11:15'),
(667, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:11:15', '2024-01-02 09:11:15'),
(668, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-02 09:11:17', '2024-01-02 09:11:17'),
(669, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:11:19', '2024-01-02 09:11:19'),
(670, 1, 'admin/auth/menu/18/edit', 'GET', '127.0.0.1', '[]', '2024-01-02 09:11:22', '2024-01-02 09:11:22'),
(671, 1, 'admin/auth/menu/18', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"search_terms\":null,\"title\":\"Product-details\",\"icon\":\"icon-tshirt\",\"uri\":\"product-details\",\"roles\":[null],\"permission\":null,\"_token\":\"7Zicqi4aTJOaPYxZFBFBGsFLMz7XDttzbyRDNWtF\",\"_method\":\"PUT\"}', '2024-01-02 09:11:58', '2024-01-02 09:11:58'),
(672, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:11:58', '2024-01-02 09:11:58'),
(673, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:01', '2024-01-02 09:12:01'),
(674, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:04', '2024-01-02 09:12:04'),
(675, 1, 'admin/auth/menu/20/edit', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:06', '2024-01-02 09:12:06'),
(676, 1, 'admin/auth/menu/20', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"search_terms\":null,\"title\":\"Users\",\"icon\":\"icon-user\",\"uri\":\"users\",\"roles\":[null],\"permission\":null,\"_token\":\"7Zicqi4aTJOaPYxZFBFBGsFLMz7XDttzbyRDNWtF\",\"_method\":\"PUT\"}', '2024-01-02 09:12:12', '2024-01-02 09:12:12'),
(677, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:12', '2024-01-02 09:12:12'),
(678, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:15', '2024-01-02 09:12:15'),
(679, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:16', '2024-01-02 09:12:16'),
(680, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:19', '2024-01-02 09:12:19'),
(681, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:12:21', '2024-01-02 09:12:21'),
(682, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:13:21', '2024-01-02 09:13:21'),
(683, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-02 09:13:25', '2024-01-02 09:13:25'),
(684, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:13:30', '2024-01-02 09:13:30'),
(685, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-02 09:13:33', '2024-01-02 09:13:33'),
(686, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:13:45', '2024-01-02 09:13:45'),
(687, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:14:53', '2024-01-02 09:14:53'),
(688, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:15:01', '2024-01-02 09:15:01'),
(689, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:15:46', '2024-01-02 09:15:46'),
(690, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:22:33', '2024-01-02 09:22:33'),
(691, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:24:54', '2024-01-02 09:24:54'),
(692, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:26:29', '2024-01-02 09:26:29'),
(693, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 09:27:04', '2024-01-02 09:27:04'),
(694, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 20:53:57', '2024-01-02 20:53:57'),
(695, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 20:54:20', '2024-01-02 20:54:20'),
(696, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 20:54:49', '2024-01-02 20:54:49'),
(697, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 20:55:03', '2024-01-02 20:55:03'),
(698, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-02 20:58:13', '2024-01-02 20:58:13'),
(699, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-02 20:58:16', '2024-01-02 20:58:16'),
(700, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 03:56:34', '2024-01-03 03:56:34'),
(701, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:10', '2024-01-03 04:04:10'),
(702, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:13', '2024-01-03 04:04:13'),
(703, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:14', '2024-01-03 04:04:14'),
(704, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:28', '2024-01-03 04:04:28'),
(705, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:30', '2024-01-03 04:04:30'),
(706, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:44', '2024-01-03 04:04:44'),
(707, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:49', '2024-01-03 04:04:49'),
(708, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:52', '2024-01-03 04:04:52'),
(709, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:53', '2024-01-03 04:04:53'),
(710, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 04:04:56', '2024-01-03 04:04:56'),
(711, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:05:03', '2024-01-03 04:05:03'),
(712, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:08:14', '2024-01-03 04:08:14'),
(713, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:12:46', '2024-01-03 04:12:46'),
(714, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:12:53', '2024-01-03 04:12:53'),
(715, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:17:49', '2024-01-03 04:17:49'),
(716, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:31:09', '2024-01-03 04:31:09'),
(717, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:31:24', '2024-01-03 04:31:24'),
(718, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:31:34', '2024-01-03 04:31:34'),
(719, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:35:57', '2024-01-03 04:35:57'),
(720, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:36:50', '2024-01-03 04:36:50'),
(721, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:38:04', '2024-01-03 04:38:04'),
(722, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:38:33', '2024-01-03 04:38:33'),
(723, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:38:45', '2024-01-03 04:38:45'),
(724, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:39:42', '2024-01-03 04:39:42'),
(725, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 04:40:06', '2024-01-03 04:40:06'),
(726, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 05:43:44', '2024-01-03 05:43:44'),
(727, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 07:50:47', '2024-01-03 07:50:47'),
(728, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 07:51:05', '2024-01-03 07:51:05'),
(729, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-03 07:51:06', '2024-01-03 07:51:06'),
(730, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-03 07:51:12', '2024-01-03 07:51:12'),
(731, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 07:52:25', '2024-01-03 07:52:25'),
(732, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 07:55:10', '2024-01-03 07:55:10'),
(733, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 07:59:09', '2024-01-03 07:59:09'),
(734, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 07:59:28', '2024-01-03 07:59:28'),
(735, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:00:20', '2024-01-03 08:00:20'),
(736, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:00:59', '2024-01-03 08:00:59'),
(737, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:01:22', '2024-01-03 08:01:22'),
(738, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:02:24', '2024-01-03 08:02:24'),
(739, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:02:32', '2024-01-03 08:02:32'),
(740, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:02:37', '2024-01-03 08:02:37'),
(741, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:03:14', '2024-01-03 08:03:14'),
(742, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:05:18', '2024-01-03 08:05:18'),
(743, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:05:43', '2024-01-03 08:05:43'),
(744, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:06:09', '2024-01-03 08:06:09'),
(745, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:07:54', '2024-01-03 08:07:54'),
(746, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:08:09', '2024-01-03 08:08:09'),
(747, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:08:22', '2024-01-03 08:08:22'),
(748, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:09:02', '2024-01-03 08:09:02'),
(749, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:09:55', '2024-01-03 08:09:55'),
(750, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:11:20', '2024-01-03 08:11:20'),
(751, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:11:42', '2024-01-03 08:11:42'),
(752, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:11:49', '2024-01-03 08:11:49'),
(753, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:13:12', '2024-01-03 08:13:12'),
(754, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:13:57', '2024-01-03 08:13:57'),
(755, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:14:19', '2024-01-03 08:14:19'),
(756, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:14:59', '2024-01-03 08:14:59'),
(757, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:33:12', '2024-01-03 08:33:12'),
(758, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:33:41', '2024-01-03 08:33:41'),
(759, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:34:28', '2024-01-03 08:34:28'),
(760, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:34:55', '2024-01-03 08:34:55'),
(761, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:35:34', '2024-01-03 08:35:34'),
(762, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:35:59', '2024-01-03 08:35:59'),
(763, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:37:21', '2024-01-03 08:37:21'),
(764, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:37:30', '2024-01-03 08:37:30'),
(765, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:38:06', '2024-01-03 08:38:06'),
(766, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:38:11', '2024-01-03 08:38:11'),
(767, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:38:20', '2024-01-03 08:38:20'),
(768, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:38:26', '2024-01-03 08:38:26'),
(769, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:38:53', '2024-01-03 08:38:53'),
(770, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:39:16', '2024-01-03 08:39:16'),
(771, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:39:25', '2024-01-03 08:39:25'),
(772, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:39:40', '2024-01-03 08:39:40'),
(773, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:39:59', '2024-01-03 08:39:59'),
(774, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:41:14', '2024-01-03 08:41:14'),
(775, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:41:26', '2024-01-03 08:41:26'),
(776, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:41:37', '2024-01-03 08:41:37'),
(777, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:42:05', '2024-01-03 08:42:05'),
(778, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:42:20', '2024-01-03 08:42:20'),
(779, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:42:29', '2024-01-03 08:42:29'),
(780, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:42:47', '2024-01-03 08:42:47'),
(781, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:43:07', '2024-01-03 08:43:07'),
(782, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:44:02', '2024-01-03 08:44:02'),
(783, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:44:12', '2024-01-03 08:44:12'),
(784, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:45:16', '2024-01-03 08:45:16'),
(785, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:45:28', '2024-01-03 08:45:28'),
(786, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:45:34', '2024-01-03 08:45:34'),
(787, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:45:51', '2024-01-03 08:45:51'),
(788, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:47:09', '2024-01-03 08:47:09'),
(789, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:47:25', '2024-01-03 08:47:25'),
(790, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:47:36', '2024-01-03 08:47:36'),
(791, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:48:03', '2024-01-03 08:48:03'),
(792, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:48:11', '2024-01-03 08:48:11'),
(793, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:48:18', '2024-01-03 08:48:18'),
(794, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:49:57', '2024-01-03 08:49:57'),
(795, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:54:04', '2024-01-03 08:54:04'),
(796, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:54:19', '2024-01-03 08:54:19'),
(797, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:54:43', '2024-01-03 08:54:43'),
(798, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:54:49', '2024-01-03 08:54:49'),
(799, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:55:09', '2024-01-03 08:55:09'),
(800, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:55:39', '2024-01-03 08:55:39'),
(801, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:58:32', '2024-01-03 08:58:32'),
(802, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 08:58:58', '2024-01-03 08:58:58'),
(803, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 09:03:13', '2024-01-03 09:03:13'),
(804, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 09:04:08', '2024-01-03 09:04:08'),
(805, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 09:04:35', '2024-01-03 09:04:35'),
(806, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:43:43', '2024-01-03 20:43:43'),
(807, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:44:35', '2024-01-03 20:44:35'),
(808, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:47:17', '2024-01-03 20:47:17'),
(809, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:47:45', '2024-01-03 20:47:45'),
(810, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:49:02', '2024-01-03 20:49:02'),
(811, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:49:49', '2024-01-03 20:49:49'),
(812, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:50:55', '2024-01-03 20:50:55'),
(813, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:53:21', '2024-01-03 20:53:21'),
(814, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:53:49', '2024-01-03 20:53:49'),
(815, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:55:20', '2024-01-03 20:55:20'),
(816, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:55:35', '2024-01-03 20:55:35'),
(817, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:56:11', '2024-01-03 20:56:11'),
(818, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:56:24', '2024-01-03 20:56:24'),
(819, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:56:27', '2024-01-03 20:56:27'),
(820, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:56:33', '2024-01-03 20:56:33'),
(821, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:57:09', '2024-01-03 20:57:09'),
(822, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 20:57:27', '2024-01-03 20:57:27'),
(823, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:02:43', '2024-01-03 21:02:43'),
(824, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:02:53', '2024-01-03 21:02:53'),
(825, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:03:56', '2024-01-03 21:03:56'),
(826, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:04:24', '2024-01-03 21:04:24'),
(827, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:05:00', '2024-01-03 21:05:00'),
(828, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:05:26', '2024-01-03 21:05:26'),
(829, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:06:00', '2024-01-03 21:06:00'),
(830, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:06:33', '2024-01-03 21:06:33'),
(831, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:06:51', '2024-01-03 21:06:51'),
(832, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:09:04', '2024-01-03 21:09:04'),
(833, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:09:54', '2024-01-03 21:09:54'),
(834, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:10:28', '2024-01-03 21:10:28'),
(835, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:11:09', '2024-01-03 21:11:09'),
(836, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:11:23', '2024-01-03 21:11:23'),
(837, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:11:40', '2024-01-03 21:11:40'),
(838, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:11:47', '2024-01-03 21:11:47'),
(839, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:11:59', '2024-01-03 21:11:59'),
(840, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:12:19', '2024-01-03 21:12:19'),
(841, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:12:29', '2024-01-03 21:12:29'),
(842, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:12:52', '2024-01-03 21:12:52'),
(843, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:15:13', '2024-01-03 21:15:13'),
(844, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:15:25', '2024-01-03 21:15:25'),
(845, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:15:41', '2024-01-03 21:15:41'),
(846, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:15:47', '2024-01-03 21:15:47'),
(847, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:15:55', '2024-01-03 21:15:55'),
(848, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:17:02', '2024-01-03 21:17:02'),
(849, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:17:29', '2024-01-03 21:17:29'),
(850, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:17:45', '2024-01-03 21:17:45'),
(851, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:18:27', '2024-01-03 21:18:27'),
(852, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:18:39', '2024-01-03 21:18:39'),
(853, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:19:01', '2024-01-03 21:19:01'),
(854, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:19:12', '2024-01-03 21:19:12'),
(855, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:19:34', '2024-01-03 21:19:34'),
(856, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:19:40', '2024-01-03 21:19:40'),
(857, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:20:02', '2024-01-03 21:20:02'),
(858, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:20:10', '2024-01-03 21:20:10'),
(859, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:20:33', '2024-01-03 21:20:33'),
(860, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:20:49', '2024-01-03 21:20:49'),
(861, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:21:22', '2024-01-03 21:21:22'),
(862, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:21:34', '2024-01-03 21:21:34'),
(863, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:22:18', '2024-01-03 21:22:18'),
(864, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:22:38', '2024-01-03 21:22:38'),
(865, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:22:54', '2024-01-03 21:22:54'),
(866, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:23:11', '2024-01-03 21:23:11'),
(867, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:23:43', '2024-01-03 21:23:43'),
(868, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:24:09', '2024-01-03 21:24:09'),
(869, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:24:32', '2024-01-03 21:24:32'),
(870, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:25:31', '2024-01-03 21:25:31'),
(871, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:26:34', '2024-01-03 21:26:34'),
(872, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:26:44', '2024-01-03 21:26:44'),
(873, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:26:59', '2024-01-03 21:26:59'),
(874, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:27:00', '2024-01-03 21:27:00'),
(875, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:27:35', '2024-01-03 21:27:35'),
(876, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:27:55', '2024-01-03 21:27:55'),
(877, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:28:18', '2024-01-03 21:28:18'),
(878, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:28:44', '2024-01-03 21:28:44'),
(879, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:28:52', '2024-01-03 21:28:52'),
(880, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:29:07', '2024-01-03 21:29:07'),
(881, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:29:30', '2024-01-03 21:29:30'),
(882, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:29:42', '2024-01-03 21:29:42'),
(883, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:29:52', '2024-01-03 21:29:52'),
(884, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:31:09', '2024-01-03 21:31:09'),
(885, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:31:35', '2024-01-03 21:31:35'),
(886, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:31:47', '2024-01-03 21:31:47'),
(887, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:31:52', '2024-01-03 21:31:52'),
(888, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:31:58', '2024-01-03 21:31:58'),
(889, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:32:03', '2024-01-03 21:32:03'),
(890, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:32:18', '2024-01-03 21:32:18'),
(891, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:32:30', '2024-01-03 21:32:30'),
(892, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:32:40', '2024-01-03 21:32:40'),
(893, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:33:08', '2024-01-03 21:33:08');
INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(894, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:34:27', '2024-01-03 21:34:27'),
(895, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:34:48', '2024-01-03 21:34:48'),
(896, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:34:52', '2024-01-03 21:34:52'),
(897, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:35:33', '2024-01-03 21:35:33'),
(898, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:35:46', '2024-01-03 21:35:46'),
(899, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:36:07', '2024-01-03 21:36:07'),
(900, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:36:31', '2024-01-03 21:36:31'),
(901, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:36:52', '2024-01-03 21:36:52'),
(902, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:36:59', '2024-01-03 21:36:59'),
(903, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:37:05', '2024-01-03 21:37:05'),
(904, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:37:15', '2024-01-03 21:37:15'),
(905, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:40:01', '2024-01-03 21:40:01'),
(906, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:40:59', '2024-01-03 21:40:59'),
(907, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:49:04', '2024-01-03 21:49:04'),
(908, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:50:50', '2024-01-03 21:50:50'),
(909, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:51:04', '2024-01-03 21:51:04'),
(910, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:51:20', '2024-01-03 21:51:20'),
(911, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:51:24', '2024-01-03 21:51:24'),
(912, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:53:57', '2024-01-03 21:53:57'),
(913, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:56:14', '2024-01-03 21:56:14'),
(914, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:56:32', '2024-01-03 21:56:32'),
(915, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:56:40', '2024-01-03 21:56:40'),
(916, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:56:57', '2024-01-03 21:56:57'),
(917, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:58:36', '2024-01-03 21:58:36'),
(918, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 21:58:56', '2024-01-03 21:58:56'),
(919, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 22:01:25', '2024-01-03 22:01:25'),
(920, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 22:01:49', '2024-01-03 22:01:49'),
(921, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 22:02:22', '2024-01-03 22:02:22'),
(922, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 22:02:34', '2024-01-03 22:02:34'),
(923, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 22:03:04', '2024-01-03 22:03:04'),
(924, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 22:03:31', '2024-01-03 22:03:31'),
(925, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 22:04:00', '2024-01-03 22:04:00'),
(926, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-03 23:21:31', '2024-01-03 23:21:31'),
(927, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:21:33', '2024-01-03 23:21:33'),
(928, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:21:54', '2024-01-03 23:21:54'),
(929, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:23:40', '2024-01-03 23:23:40'),
(930, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:23:45', '2024-01-03 23:23:45'),
(931, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:24:00', '2024-01-03 23:24:00'),
(932, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:24:02', '2024-01-03 23:24:02'),
(933, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:24:16', '2024-01-03 23:24:16'),
(934, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:24:34', '2024-01-03 23:24:34'),
(935, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:01', '2024-01-03 23:25:01'),
(936, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:07', '2024-01-03 23:25:07'),
(937, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:14', '2024-01-03 23:25:14'),
(938, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:15', '2024-01-03 23:25:15'),
(939, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:16', '2024-01-03 23:25:16'),
(940, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:17', '2024-01-03 23:25:17'),
(941, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:19', '2024-01-03 23:25:19'),
(942, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:25', '2024-01-03 23:25:25'),
(943, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:27', '2024-01-03 23:25:27'),
(944, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:30', '2024-01-03 23:25:30'),
(945, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:32', '2024-01-03 23:25:32'),
(946, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:33', '2024-01-03 23:25:33'),
(947, 1, 'admin/products/create', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:36', '2024-01-03 23:25:36'),
(948, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:37', '2024-01-03 23:25:37'),
(949, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:41', '2024-01-03 23:25:41'),
(950, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:42', '2024-01-03 23:25:42'),
(951, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:45', '2024-01-03 23:25:45'),
(952, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:47', '2024-01-03 23:25:47'),
(953, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-03 23:25:57', '2024-01-03 23:25:57'),
(954, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:26:06', '2024-01-03 23:26:06'),
(955, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:26:10', '2024-01-03 23:26:10'),
(956, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:26:11', '2024-01-03 23:26:11'),
(957, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:26:14', '2024-01-03 23:26:14'),
(958, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:26:33', '2024-01-03 23:26:33'),
(959, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:26:37', '2024-01-03 23:26:37'),
(960, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:26:45', '2024-01-03 23:26:45'),
(961, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:27:18', '2024-01-03 23:27:18'),
(962, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:27:43', '2024-01-03 23:27:43'),
(963, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:27:52', '2024-01-03 23:27:52'),
(964, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:28:46', '2024-01-03 23:28:46'),
(965, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:28:57', '2024-01-03 23:28:57'),
(966, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:26', '2024-01-03 23:29:26'),
(967, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:31', '2024-01-03 23:29:31'),
(968, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:37', '2024-01-03 23:29:37'),
(969, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:42', '2024-01-03 23:29:42'),
(970, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:44', '2024-01-03 23:29:44'),
(971, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:47', '2024-01-03 23:29:47'),
(972, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:50', '2024-01-03 23:29:50'),
(973, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:53', '2024-01-03 23:29:53'),
(974, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:29:54', '2024-01-03 23:29:54'),
(975, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:08', '2024-01-03 23:30:08'),
(976, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:10', '2024-01-03 23:30:10'),
(977, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:11', '2024-01-03 23:30:11'),
(978, 1, 'admin/users/5', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:12', '2024-01-03 23:30:12'),
(979, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:16', '2024-01-03 23:30:16'),
(980, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:21', '2024-01-03 23:30:21'),
(981, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:37', '2024-01-03 23:30:37'),
(982, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:49', '2024-01-03 23:30:49'),
(983, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:30:55', '2024-01-03 23:30:55'),
(984, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"addressID\":null,\"totalPrice\":\"64\",\"_token\":\"WvgcjpOx6IHLaKcMnoTY6KtCvKQiDxnaWYOKxkGC\",\"_method\":\"PUT\"}', '2024-01-03 23:31:16', '2024-01-03 23:31:16'),
(985, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:31:16', '2024-01-03 23:31:16'),
(986, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:31:54', '2024-01-03 23:31:54'),
(987, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Canceled\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"addressID\":\"25\",\"totalPrice\":\"64\",\"_token\":\"WvgcjpOx6IHLaKcMnoTY6KtCvKQiDxnaWYOKxkGC\",\"_method\":\"PUT\"}', '2024-01-03 23:31:59', '2024-01-03 23:31:59'),
(988, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:31:59', '2024-01-03 23:31:59'),
(989, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:32:15', '2024-01-03 23:32:15'),
(990, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:32:17', '2024-01-03 23:32:17'),
(991, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:32:37', '2024-01-03 23:32:37'),
(992, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:32:38', '2024-01-03 23:32:38'),
(993, 1, 'admin/helpers/terminal/database', 'GET', '127.0.0.1', '[]', '2024-01-03 23:32:46', '2024-01-03 23:32:46'),
(994, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-03 23:32:47', '2024-01-03 23:32:47'),
(995, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-03 23:34:28', '2024-01-03 23:34:28'),
(996, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:34:31', '2024-01-03 23:34:31'),
(997, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:34:58', '2024-01-03 23:34:58'),
(998, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:35:11', '2024-01-03 23:35:11'),
(999, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:36:03', '2024-01-03 23:36:03'),
(1000, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:36:18', '2024-01-03 23:36:18'),
(1001, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:37:21', '2024-01-03 23:37:21'),
(1002, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:37:54', '2024-01-03 23:37:54'),
(1003, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:38:04', '2024-01-03 23:38:04'),
(1004, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:38:12', '2024-01-03 23:38:12'),
(1005, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:38:40', '2024-01-03 23:38:40'),
(1006, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-03 23:38:49', '2024-01-03 23:38:49'),
(1007, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:38:49', '2024-01-03 23:38:49'),
(1008, 1, 'admin/orders/25', 'GET', '127.0.0.1', '[]', '2024-01-03 23:38:59', '2024-01-03 23:38:59'),
(1009, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:39:02', '2024-01-03 23:39:02'),
(1010, 1, 'admin/orders/25', 'GET', '127.0.0.1', '[]', '2024-01-03 23:39:11', '2024-01-03 23:39:11'),
(1011, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:39:14', '2024-01-03 23:39:14'),
(1012, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:39:28', '2024-01-03 23:39:28'),
(1013, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:39:45', '2024-01-03 23:39:45'),
(1014, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:39:57', '2024-01-03 23:39:57'),
(1015, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:42:04', '2024-01-03 23:42:04'),
(1016, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:42:24', '2024-01-03 23:42:24'),
(1017, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-03 23:42:45', '2024-01-03 23:42:45'),
(1018, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-03 23:42:56', '2024-01-03 23:42:56'),
(1019, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:43:06', '2024-01-03 23:43:06'),
(1020, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:43:10', '2024-01-03 23:43:10'),
(1021, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:43:11', '2024-01-03 23:43:11'),
(1022, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:50', '2024-01-03 23:44:50'),
(1023, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:54', '2024-01-03 23:44:54'),
(1024, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:54', '2024-01-03 23:44:54'),
(1025, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:54', '2024-01-03 23:44:54'),
(1026, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:54', '2024-01-03 23:44:54'),
(1027, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:54', '2024-01-03 23:44:54'),
(1028, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:55', '2024-01-03 23:44:55'),
(1029, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:55', '2024-01-03 23:44:55'),
(1030, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:55', '2024-01-03 23:44:55'),
(1031, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:55', '2024-01-03 23:44:55'),
(1032, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:55', '2024-01-03 23:44:55'),
(1033, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:55', '2024-01-03 23:44:55'),
(1034, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:55', '2024-01-03 23:44:55'),
(1035, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1036, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1037, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1038, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1039, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1040, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1041, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1042, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:56', '2024-01-03 23:44:56'),
(1043, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:44:57', '2024-01-03 23:44:57'),
(1044, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:01', '2024-01-03 23:45:01'),
(1045, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:01', '2024-01-03 23:45:01'),
(1046, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:01', '2024-01-03 23:45:01'),
(1047, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:01', '2024-01-03 23:45:01'),
(1048, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:01', '2024-01-03 23:45:01'),
(1049, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1050, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1051, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1052, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1053, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1054, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1055, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1056, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:02', '2024-01-03 23:45:02'),
(1057, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1058, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1059, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1060, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1061, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1062, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1063, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1064, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:03', '2024-01-03 23:45:03'),
(1065, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:19', '2024-01-03 23:45:19'),
(1066, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:45:45', '2024-01-03 23:45:45'),
(1067, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:46:15', '2024-01-03 23:46:15'),
(1068, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:46:47', '2024-01-03 23:46:47'),
(1069, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:47:04', '2024-01-03 23:47:04'),
(1070, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:47:08', '2024-01-03 23:47:08'),
(1071, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:47:09', '2024-01-03 23:47:09'),
(1072, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:47:10', '2024-01-03 23:47:10'),
(1073, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-03 23:47:22', '2024-01-03 23:47:22'),
(1074, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:47:44', '2024-01-03 23:47:44'),
(1075, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:48:14', '2024-01-03 23:48:14'),
(1076, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:49:01', '2024-01-03 23:49:01'),
(1077, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:49:25', '2024-01-03 23:49:25'),
(1078, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:49:40', '2024-01-03 23:49:40'),
(1079, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Canceled\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"WvgcjpOx6IHLaKcMnoTY6KtCvKQiDxnaWYOKxkGC\",\"_method\":\"PUT\"}', '2024-01-03 23:50:00', '2024-01-03 23:50:00'),
(1080, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-03 23:50:00', '2024-01-03 23:50:00'),
(1081, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-03 23:50:30', '2024-01-03 23:50:30'),
(1082, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:51:02', '2024-01-03 23:51:02'),
(1083, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:52:12', '2024-01-03 23:52:12'),
(1084, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:52:55', '2024-01-03 23:52:55'),
(1085, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:53:07', '2024-01-03 23:53:07'),
(1086, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:53:11', '2024-01-03 23:53:11'),
(1087, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-03 23:58:03', '2024-01-03 23:58:03'),
(1088, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:00:27', '2024-01-04 00:00:27'),
(1089, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:00:39', '2024-01-04 00:00:39'),
(1090, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:00:46', '2024-01-04 00:00:46'),
(1091, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:01:26', '2024-01-04 00:01:26'),
(1092, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:01:27', '2024-01-04 00:01:27'),
(1093, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:01:28', '2024-01-04 00:01:28'),
(1094, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:01:34', '2024-01-04 00:01:34'),
(1095, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:01:44', '2024-01-04 00:01:44'),
(1096, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:02:26', '2024-01-04 00:02:26'),
(1097, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:04:41', '2024-01-04 00:04:41'),
(1098, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:05:37', '2024-01-04 00:05:37'),
(1099, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:06:13', '2024-01-04 00:06:13'),
(1100, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:06:57', '2024-01-04 00:06:57'),
(1101, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:07:08', '2024-01-04 00:07:08'),
(1102, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:07:22', '2024-01-04 00:07:22'),
(1103, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:07:39', '2024-01-04 00:07:39'),
(1104, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:07:49', '2024-01-04 00:07:49'),
(1105, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:08:59', '2024-01-04 00:08:59'),
(1106, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:09:35', '2024-01-04 00:09:35'),
(1107, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:10:09', '2024-01-04 00:10:09'),
(1108, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:10:22', '2024-01-04 00:10:22'),
(1109, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:10:29', '2024-01-04 00:10:29'),
(1110, 1, 'admin/logs', 'GET', '127.0.0.1', '[]', '2024-01-04 00:10:29', '2024-01-04 00:10:29'),
(1111, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:10:37', '2024-01-04 00:10:37'),
(1112, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:11:00', '2024-01-04 00:11:00'),
(1113, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:18:56', '2024-01-04 00:18:56'),
(1114, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:19:05', '2024-01-04 00:19:05'),
(1115, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:20:19', '2024-01-04 00:20:19'),
(1116, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:20:30', '2024-01-04 00:20:30'),
(1117, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:20:38', '2024-01-04 00:20:38'),
(1118, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:20:51', '2024-01-04 00:20:51'),
(1119, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:20:55', '2024-01-04 00:20:55'),
(1120, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:21:47', '2024-01-04 00:21:47'),
(1121, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:21:49', '2024-01-04 00:21:49'),
(1122, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:21:52', '2024-01-04 00:21:52'),
(1123, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:21:58', '2024-01-04 00:21:58'),
(1124, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:22:04', '2024-01-04 00:22:04'),
(1125, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:22:45', '2024-01-04 00:22:45'),
(1126, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:23:39', '2024-01-04 00:23:39'),
(1127, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:23:40', '2024-01-04 00:23:40'),
(1128, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:23:55', '2024-01-04 00:23:55'),
(1129, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:24:10', '2024-01-04 00:24:10'),
(1130, 1, 'admin/users/5', 'GET', '127.0.0.1', '[]', '2024-01-04 00:24:12', '2024-01-04 00:24:12'),
(1131, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:24:12', '2024-01-04 00:24:12'),
(1132, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-04 00:24:23', '2024-01-04 00:24:23'),
(1133, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:25:14', '2024-01-04 00:25:14'),
(1134, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:25:18', '2024-01-04 00:25:18'),
(1135, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:25:40', '2024-01-04 00:25:40'),
(1136, 1, 'admin/orders/17/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:25:43', '2024-01-04 00:25:43'),
(1137, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:52', '2024-01-04 00:28:52'),
(1138, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:52', '2024-01-04 00:28:52'),
(1139, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:53', '2024-01-04 00:28:53'),
(1140, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:53', '2024-01-04 00:28:53'),
(1141, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:53', '2024-01-04 00:28:53'),
(1142, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:53', '2024-01-04 00:28:53'),
(1143, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:53', '2024-01-04 00:28:53'),
(1144, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:53', '2024-01-04 00:28:53'),
(1145, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:53', '2024-01-04 00:28:53'),
(1146, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1147, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1148, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1149, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1150, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1151, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1152, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1153, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:54', '2024-01-04 00:28:54'),
(1154, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:55', '2024-01-04 00:28:55'),
(1155, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:55', '2024-01-04 00:28:55'),
(1156, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:55', '2024-01-04 00:28:55'),
(1157, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:55', '2024-01-04 00:28:55'),
(1158, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:28:58', '2024-01-04 00:28:58'),
(1159, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:29:28', '2024-01-04 00:29:28'),
(1160, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:32:02', '2024-01-04 00:32:02'),
(1161, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:32:03', '2024-01-04 00:32:03'),
(1162, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:32:05', '2024-01-04 00:32:05'),
(1163, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:32:09', '2024-01-04 00:32:09'),
(1164, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:32:11', '2024-01-04 00:32:11'),
(1165, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:32:30', '2024-01-04 00:32:30'),
(1166, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:34:12', '2024-01-04 00:34:12'),
(1167, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:34:18', '2024-01-04 00:34:18'),
(1168, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:34:21', '2024-01-04 00:34:21'),
(1169, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:34:21', '2024-01-04 00:34:21'),
(1170, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:34:22', '2024-01-04 00:34:22'),
(1171, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:34:40', '2024-01-04 00:34:40'),
(1172, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:34:45', '2024-01-04 00:34:45'),
(1173, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:34:45', '2024-01-04 00:34:45'),
(1174, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:34:45', '2024-01-04 00:34:45'),
(1175, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:35:09', '2024-01-04 00:35:09'),
(1176, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Pending\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:35:13', '2024-01-04 00:35:13'),
(1177, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:35:13', '2024-01-04 00:35:13'),
(1178, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:35:13', '2024-01-04 00:35:13'),
(1179, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:40:29', '2024-01-04 00:40:29'),
(1180, 1, 'admin/orders/19/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:40:31', '2024-01-04 00:40:31'),
(1181, 1, 'admin/orders/19', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Banking\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"35\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:40:34', '2024-01-04 00:40:34'),
(1182, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:40:34', '2024-01-04 00:40:34'),
(1183, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:40:45', '2024-01-04 00:40:45'),
(1184, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:40:47', '2024-01-04 00:40:47'),
(1185, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:40:47', '2024-01-04 00:40:47'),
(1186, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:40:47', '2024-01-04 00:40:47'),
(1187, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:42:54', '2024-01-04 00:42:54'),
(1188, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:43:24', '2024-01-04 00:43:24'),
(1189, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:43:27', '2024-01-04 00:43:27'),
(1190, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:43:27', '2024-01-04 00:43:27'),
(1191, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:44:25', '2024-01-04 00:44:25'),
(1192, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:44:29', '2024-01-04 00:44:29'),
(1193, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:44:29', '2024-01-04 00:44:29'),
(1194, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:45:10', '2024-01-04 00:45:10'),
(1195, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:45:13', '2024-01-04 00:45:13'),
(1196, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:45:13', '2024-01-04 00:45:13'),
(1197, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:45:16', '2024-01-04 00:45:16'),
(1198, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Canceled\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:45:19', '2024-01-04 00:45:19'),
(1199, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:45:19', '2024-01-04 00:45:19'),
(1200, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:45:20', '2024-01-04 00:45:20'),
(1201, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Pending\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:45:27', '2024-01-04 00:45:27'),
(1202, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:45:27', '2024-01-04 00:45:27'),
(1203, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:04', '2024-01-04 00:46:04'),
(1204, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:09', '2024-01-04 00:46:09'),
(1205, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Canceled\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:46:13', '2024-01-04 00:46:13'),
(1206, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:13', '2024-01-04 00:46:13'),
(1207, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:15', '2024-01-04 00:46:15'),
(1208, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:46:17', '2024-01-04 00:46:17'),
(1209, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:17', '2024-01-04 00:46:17'),
(1210, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:34', '2024-01-04 00:46:34'),
(1211, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Canceled\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:46:37', '2024-01-04 00:46:37'),
(1212, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:37', '2024-01-04 00:46:37'),
(1213, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:39', '2024-01-04 00:46:39'),
(1214, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:43', '2024-01-04 00:46:43'),
(1215, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:44', '2024-01-04 00:46:44'),
(1216, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:46:48', '2024-01-04 00:46:48'),
(1217, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:48', '2024-01-04 00:46:48'),
(1218, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:50', '2024-01-04 00:46:50'),
(1219, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:54', '2024-01-04 00:46:54'),
(1220, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:58', '2024-01-04 00:46:58'),
(1221, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:46:59', '2024-01-04 00:46:59'),
(1222, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:47:02', '2024-01-04 00:47:02'),
(1223, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:47:02', '2024-01-04 00:47:02'),
(1224, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:47:03', '2024-01-04 00:47:03'),
(1225, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Canceled\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:47:05', '2024-01-04 00:47:05'),
(1226, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:47:05', '2024-01-04 00:47:05'),
(1227, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:47:07', '2024-01-04 00:47:07'),
(1228, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Pending\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:47:09', '2024-01-04 00:47:09'),
(1229, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:47:09', '2024-01-04 00:47:09'),
(1230, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:48:02', '2024-01-04 00:48:02'),
(1231, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:48:03', '2024-01-04 00:48:03'),
(1232, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Canceled\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:48:06', '2024-01-04 00:48:06'),
(1233, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:48:06', '2024-01-04 00:48:06'),
(1234, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:48:08', '2024-01-04 00:48:08'),
(1235, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Pending\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:48:10', '2024-01-04 00:48:10'),
(1236, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:48:10', '2024-01-04 00:48:10'),
(1237, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"HgQKoDe5AQgOftjl1LpE3YEsp8SDKgJ2UqKVxWNP\",\"_method\":\"PUT\"}', '2024-01-04 00:48:14', '2024-01-04 00:48:14'),
(1238, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:48:14', '2024-01-04 00:48:14'),
(1239, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 00:49:43', '2024-01-04 00:49:43'),
(1240, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-04 00:49:56', '2024-01-04 00:49:56'),
(1241, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 00:50:01', '2024-01-04 00:50:01'),
(1242, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 00:50:03', '2024-01-04 00:50:03'),
(1243, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 00:50:05', '2024-01-04 00:50:05'),
(1244, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 01:36:52', '2024-01-04 01:36:52'),
(1245, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 02:08:12', '2024-01-04 02:08:12'),
(1246, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 10:32:45', '2024-01-04 10:32:45'),
(1247, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-04 10:32:50', '2024-01-04 10:32:50'),
(1248, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-01-04 10:32:53', '2024-01-04 10:32:53'),
(1249, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 10:32:54', '2024-01-04 10:32:54'),
(1250, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 10:32:55', '2024-01-04 10:32:55'),
(1251, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 10:33:01', '2024-01-04 10:33:01'),
(1252, 1, 'admin/logs', 'GET', '127.0.0.1', '[]', '2024-01-04 10:33:08', '2024-01-04 10:33:08'),
(1253, 1, 'admin/auth/setting', 'GET', '127.0.0.1', '[]', '2024-01-04 10:33:17', '2024-01-04 10:33:17'),
(1254, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-04 10:33:21', '2024-01-04 10:33:21'),
(1255, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-04 10:33:25', '2024-01-04 10:33:25'),
(1256, 1, 'admin/media', 'GET', '127.0.0.1', '[]', '2024-01-04 10:33:25', '2024-01-04 10:33:25'),
(1257, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-04 23:35:16', '2024-01-04 23:35:16'),
(1258, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 23:35:37', '2024-01-04 23:35:37'),
(1259, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 23:35:38', '2024-01-04 23:35:38'),
(1260, 1, 'admin/orders', 'GET', '127.0.0.1', '{\"page\":\"2\"}', '2024-01-04 23:35:58', '2024-01-04 23:35:58'),
(1261, 1, 'admin/orders/50', 'GET', '127.0.0.1', '[]', '2024-01-04 23:36:01', '2024-01-04 23:36:01'),
(1262, 1, 'admin/orders/50/edit', 'GET', '127.0.0.1', '[]', '2024-01-04 23:36:06', '2024-01-04 23:36:06'),
(1263, 1, 'admin/orders/50', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Cash on delivery (COD)\",\"address\":{\"receiver\":\"test\",\"phone\":\"tesst\",\"street\":\"\\u0111\\u00e2s\",\"ward\":\"X\\u00e3 Ba Tr\\u1ea1i\",\"city\":\"Huy\\u1ec7n Ba V\\u00ec\"},\"totalPrice\":\"12\",\"_token\":\"eqooEwD2jK7gp003yOftawloopQmi7L5jWXjcHdl\",\"_method\":\"PUT\"}', '2024-01-04 23:36:10', '2024-01-04 23:36:10'),
(1264, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 23:36:10', '2024-01-04 23:36:10'),
(1265, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-04 23:39:42', '2024-01-04 23:39:42'),
(1266, 1, 'admin/logs', 'GET', '127.0.0.1', '[]', '2024-01-04 23:39:46', '2024-01-04 23:39:46'),
(1267, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-04 23:39:46', '2024-01-04 23:39:46'),
(1268, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 23:39:49', '2024-01-04 23:39:49'),
(1269, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-04 23:39:49', '2024-01-04 23:39:49'),
(1270, 1, 'admin/products/create', 'GET', '127.0.0.1', '[]', '2024-01-04 23:39:57', '2024-01-04 23:39:57'),
(1271, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-04 23:39:59', '2024-01-04 23:39:59'),
(1272, 1, 'admin/products/create', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:03', '2024-01-04 23:40:03'),
(1273, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:05', '2024-01-04 23:40:05'),
(1274, 1, 'admin/products/create', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:08', '2024-01-04 23:40:08'),
(1275, 1, 'admin/products', 'POST', '127.0.0.1', '{\"name\":\"TEst\",\"categoryId\":null,\"collectionId\":null,\"price\":\"10\",\"description\":null,\"salePercent\":null,\"_token\":\"eqooEwD2jK7gp003yOftawloopQmi7L5jWXjcHdl\"}', '2024-01-04 23:40:15', '2024-01-04 23:40:15'),
(1276, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:15', '2024-01-04 23:40:15'),
(1277, 1, 'admin/products/27', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"eqooEwD2jK7gp003yOftawloopQmi7L5jWXjcHdl\"}', '2024-01-04 23:40:19', '2024-01-04 23:40:19'),
(1278, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:19', '2024-01-04 23:40:19'),
(1279, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:22', '2024-01-04 23:40:22'),
(1280, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:26', '2024-01-04 23:40:26'),
(1281, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-04 23:40:32', '2024-01-04 23:40:32'),
(1282, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-05 00:43:27', '2024-01-05 00:43:27'),
(1283, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-05 00:50:19', '2024-01-05 00:50:19'),
(1284, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:07', '2024-01-05 00:51:07'),
(1285, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:09', '2024-01-05 00:51:09'),
(1286, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:13', '2024-01-05 00:51:13'),
(1287, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Pending\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"Fjv5HgvGtUPxBDV6nMjwhMDHPQgvXwFc7dxupK7H\",\"_method\":\"PUT\"}', '2024-01-05 00:51:17', '2024-01-05 00:51:17'),
(1288, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:17', '2024-01-05 00:51:17'),
(1289, 1, 'admin/orders/16', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:28', '2024-01-05 00:51:28'),
(1290, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:32', '2024-01-05 00:51:32'),
(1291, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:37', '2024-01-05 00:51:37'),
(1292, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:38', '2024-01-05 00:51:38'),
(1293, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-05 00:51:39', '2024-01-05 00:51:39'),
(1294, 1, 'admin/logs', 'GET', '127.0.0.1', '[]', '2024-01-05 02:23:51', '2024-01-05 02:23:51'),
(1295, 1, 'admin/users', 'GET', '127.0.0.1', '[]', '2024-01-05 02:23:52', '2024-01-05 02:23:52'),
(1296, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-05 02:23:54', '2024-01-05 02:23:54'),
(1297, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-05 02:23:55', '2024-01-05 02:23:55'),
(1298, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-05 02:23:56', '2024-01-05 02:23:56'),
(1299, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:27', '2024-01-05 02:53:27'),
(1300, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:32', '2024-01-05 02:53:32'),
(1301, 1, 'admin/products/10/edit', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:33', '2024-01-05 02:53:33'),
(1302, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:36', '2024-01-05 02:53:36'),
(1303, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:37', '2024-01-05 02:53:37'),
(1304, 1, 'admin/orders/16', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Pay at our store\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"64\",\"_token\":\"Fjv5HgvGtUPxBDV6nMjwhMDHPQgvXwFc7dxupK7H\",\"_method\":\"PUT\"}', '2024-01-05 02:53:41', '2024-01-05 02:53:41');
INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1305, 1, 'admin/orders/16/edit', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:41', '2024-01-05 02:53:41'),
(1306, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:43', '2024-01-05 02:53:43'),
(1307, 1, 'admin/orders/20/edit', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:46', '2024-01-05 02:53:46'),
(1308, 1, 'admin/orders/20', 'PUT', '127.0.0.1', '{\"status\":\"Delivered\",\"search_terms\":null,\"paymentMethod\":\"Banking\",\"address\":{\"receiver\":\"Nguyen Van A\",\"phone\":\"0829004003\",\"street\":\"pcc\",\"ward\":\"X\\u00e3 H\\u1ed3ng H\\u00e0\",\"city\":\"Huy\\u1ec7n \\u0110an Ph\\u01b0\\u1ee3ng\"},\"totalPrice\":\"35\",\"_token\":\"Fjv5HgvGtUPxBDV6nMjwhMDHPQgvXwFc7dxupK7H\",\"_method\":\"PUT\"}', '2024-01-05 02:53:49', '2024-01-05 02:53:49'),
(1309, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-05 02:53:49', '2024-01-05 02:53:49'),
(1310, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-27 06:22:27', '2024-01-27 06:22:27'),
(1311, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-27 06:22:40', '2024-01-27 06:22:40'),
(1312, 1, 'admin/product-details', 'GET', '127.0.0.1', '[]', '2024-01-27 06:22:45', '2024-01-27 06:22:45'),
(1313, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-27 06:22:52', '2024-01-27 06:22:52'),
(1314, 1, 'admin/users/5', 'GET', '127.0.0.1', '[]', '2024-01-27 06:22:57', '2024-01-27 06:22:57'),
(1315, 1, 'admin/products', 'GET', '127.0.0.1', '[]', '2024-01-27 06:23:18', '2024-01-27 06:23:18'),
(1316, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2024-01-27 06:23:40', '2024-01-27 06:23:40'),
(1317, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-27 06:24:22', '2024-01-27 06:24:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `http_method` varchar(255) DEFAULT NULL,
  `http_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
(6, 'Media manager', 'ext.media-manager', '', '/media*', '2023-12-14 03:37:33', '2023-12-14 03:37:33'),
(7, 'Admin helpers', 'ext.helpers', '', '/helpers/*', '2023-12-14 03:49:28', '2023-12-14 03:49:28'),
(8, 'Logs', 'ext.log-viewer', '', '/logs*', '2024-01-03 07:53:13', '2024-01-03 07:53:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2023-10-10 05:14:42', '2023-10-10 05:14:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(1, 2, NULL, NULL),
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 1, NULL, NULL),
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 1, NULL, NULL),
(1, 1, NULL, NULL),
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$tkeSxXAtpnaVHk/Wfn9JGuOoa4aiKpe4CjwS8woZxGkAlJ8B2sfDm', 'Administrator', NULL, NULL, '2023-10-10 05:14:42', '2023-10-10 05:14:42'),
(2, 'test', '$2y$10$gY5f9AfnPL5zwuxVJFrzuui696CO6ZT/mijKUFLXQiVhC63ksqJ6G', 'test', NULL, NULL, '2023-12-14 04:03:00', '2023-12-14 04:03:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `img`, `type`) VALUES
(1, 'imgs/10007.jpg', 'home'),
(2, 'imgs/10004.jpg', 'home'),
(3, 'imgs/10001.jpg', 'home'),
(4, 'imgs/Men_product/10097.jpg', 'men'),
(5, 'imgs/women_product/10097.jpg', 'women'),
(6, 'imgs/Socks/10074.jpg', 'Socks');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `belongs`
--

CREATE TABLE `belongs` (
  `cartID` bigint(20) UNSIGNED NOT NULL,
  `detailID` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `belongs`
--

INSERT INTO `belongs` (`cartID`, `detailID`, `quantity`, `updated_at`, `created_at`) VALUES
(1, 38, 1, '2023-12-07 12:19:40', '2023-12-07 12:19:40'),
(220, 26, 2, '2024-01-03 14:54:51', '2024-01-03 14:53:38'),
(220, 30, 6, '2024-01-04 14:37:02', '2024-01-04 12:38:59'),
(221, 22, 2, '2023-12-12 03:56:34', '2023-12-12 03:56:34'),
(222, 30, 1, '2024-01-03 02:56:53', '2024-01-03 02:56:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `userId`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-12-05 11:34:24', '2023-12-05 11:34:24'),
(219, 4, '2023-12-08 03:20:46', '2023-12-08 03:20:46'),
(220, 5, '2023-12-08 03:27:58', '2023-12-08 03:27:58'),
(221, 6, '2023-12-11 20:56:06', '2023-12-11 20:56:06'),
(222, 7, '2024-01-02 18:18:39', '2024-01-02 18:18:39'),
(223, 8, '2024-01-03 04:52:13', '2024-01-03 04:52:13'),
(224, 9, '2024-01-04 03:55:41', '2024-01-04 03:55:41'),
(225, 10, '2024-01-04 23:33:34', '2024-01-04 23:33:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `img`, `name`, `parent`, `created_at`, `updated_at`) VALUES
(1, NULL, 'top', 'men', NULL, NULL),
(2, NULL, 'bottom', 'men', NULL, NULL),
(4, 'imgs/Men_product/10099.jpg', 'socks', 'men', NULL, NULL),
(5, 'imgs/Men_product/10100.jpg', 'underwear', 'men', NULL, NULL),
(6, 'imgs/Men_product/10101.jpeg', 'apparel', 'men', NULL, '2024-01-04 08:29:15'),
(7, 'imgs/Men_product/10102.jpg', 'hats & beanies', 'men', NULL, '2024-01-04 08:29:18'),
(11, NULL, 'icon crew', 'men', NULL, '2024-01-04 08:29:21'),
(12, 'imgs/women_product/10101.jpg', 'top', 'women', NULL, '2024-01-04 08:20:59'),
(13, 'imgs/women_product/10100.jpg', 'new arrivals', 'women', '2024-01-04 08:22:07', '2024-01-04 08:22:07'),
(14, 'imgs/women_product/10098.jpg', 'bottom', 'women', '2024-01-04 08:22:07', '2024-01-04 08:22:07'),
(15, 'imgs/women_product/10099.jpg', 'socks', 'women', '2024-01-04 08:22:44', '2024-01-04 08:22:44'),
(16, NULL, 'performance', 'socks', '2024-01-04 14:41:47', '2024-01-04 14:41:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collections`
--

CREATE TABLE `collections` (
  `id` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `button-label` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `collections`
--

INSERT INTO `collections` (`id`, `productId`, `img`, `intro`, `name`, `description`, `button-label`, `type`, `created_at`, `updated_at`) VALUES
(1, 12, 'imgs/10049.png', 'New Collaboration', 'AMONGST THE STARS', '\"Stance is excited to be partnering with Bethesda Game Studios on Starfield, an exciting new next-generation rpg where you embark on a journey to answer humanity’s greatest mystery.\"', 'SHOP NOW', 'home', '2023-11-12 10:31:45', '2023-12-12 08:13:33'),
(2, 13, 'imgs/WhiteQTR.jpg', 'From the icon shop', 'QUARTER HEIGHT', NULL, 'EXPLORE COLLECTION', 'home', '2023-11-12 10:33:01', '2023-12-12 08:13:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`products`)),
  `total` int(11) DEFAULT NULL,
  `salePercent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `customerId`, `products`, `total`, `salePercent`, `created_at`, `updated_at`) VALUES
(4, NULL, '\"[[{\\\"id\\\":213,\\\"customerId\\\":null,\\\"productDetailId\\\":1,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:18:06.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:18:06.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":1,\\\"productId\\\":1,\\\"size\\\":\\\"L\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]}],[{\\\"id\\\":214,\\\"customerId\\\":null,\\\"productDetailId\\\":3,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:18:06.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:18:06.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":3,\\\"productId\\\":1,\\\"size\\\":\\\"M\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]}]]\"', 20000, 0, '2023-10-13 01:18:06', '2023-10-13 01:18:06'),
(5, 3, '\"[{\\\"id\\\":215,\\\"customerId\\\":3,\\\"productDetailId\\\":3,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:18:32.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:18:32.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":3,\\\"productId\\\":1,\\\"size\\\":\\\"M\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]},{\\\"id\\\":216,\\\"customerId\\\":3,\\\"productDetailId\\\":1,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:18:32.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:18:32.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":1,\\\"productId\\\":1,\\\"size\\\":\\\"L\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]}]\"', 20000, 0, '2023-10-13 01:18:37', '2023-10-13 01:18:37'),
(6, 3, '\"[]\"', 0, 0, '2023-10-13 01:32:37', '2023-10-13 01:32:37'),
(7, 3, '\"[]\"', 0, 0, '2023-10-13 01:34:02', '2023-10-13 01:34:02'),
(8, 3, '\"[]\"', 0, 0, '2023-10-13 01:34:22', '2023-10-13 01:34:22'),
(9, 3, '\"[]\"', 0, 0, '2023-10-13 01:35:05', '2023-10-13 01:35:05'),
(10, 3, '\"[]\"', 0, 0, '2023-10-13 01:35:24', '2023-10-13 01:35:24'),
(11, 3, '\"[]\"', 0, 0, '2023-10-13 01:35:49', '2023-10-13 01:35:49'),
(12, 3, '\"[]\"', 0, 0, '2023-10-13 01:36:35', '2023-10-13 01:36:35'),
(13, 3, '\"[{\\\"id\\\":217,\\\"customerId\\\":3,\\\"productDetailId\\\":1,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":1,\\\"productId\\\":1,\\\"size\\\":\\\"L\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]},{\\\"id\\\":218,\\\"customerId\\\":3,\\\"productDetailId\\\":3,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":3,\\\"productId\\\":1,\\\"size\\\":\\\"M\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]}]\"', 20000, 0, '2023-10-13 01:41:33', '2023-10-13 01:41:33'),
(14, 3, '\"[{\\\"id\\\":217,\\\"customerId\\\":3,\\\"productDetailId\\\":1,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":1,\\\"productId\\\":1,\\\"size\\\":\\\"L\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]},{\\\"id\\\":218,\\\"customerId\\\":3,\\\"productDetailId\\\":3,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":3,\\\"productId\\\":1,\\\"size\\\":\\\"M\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]}]\"', 20000, 0, '2023-10-13 01:41:44', '2023-10-13 01:41:44'),
(15, 3, '\"[{\\\"id\\\":217,\\\"customerId\\\":3,\\\"productDetailId\\\":1,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":1,\\\"productId\\\":1,\\\"size\\\":\\\"L\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]},{\\\"id\\\":218,\\\"customerId\\\":3,\\\"productDetailId\\\":3,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":3,\\\"productId\\\":1,\\\"size\\\":\\\"M\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]}]\"', 20000, 0, '2023-10-13 01:43:42', '2023-10-13 01:43:42'),
(16, 3, '\"[{\\\"id\\\":217,\\\"customerId\\\":3,\\\"productDetailId\\\":1,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:27.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":1,\\\"productId\\\":1,\\\"size\\\":\\\"L\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:39.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]},{\\\"id\\\":218,\\\"customerId\\\":3,\\\"productDetailId\\\":3,\\\"quantity\\\":10,\\\"created_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-13T08:41:31.000000Z\\\",\\\"product_detail\\\":[{\\\"productDetailId\\\":3,\\\"productId\\\":1,\\\"size\\\":\\\"M\\\",\\\"color\\\":\\\"red\\\",\\\"stock\\\":199,\\\"created_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T08:40:51.000000Z\\\",\\\"product\\\":{\\\"productId\\\":1,\\\"name\\\":\\\"Sock A\\\",\\\"type\\\":null,\\\"price\\\":1000,\\\"description\\\":null,\\\"spec\\\":null,\\\"salePercent\\\":0,\\\"created_at\\\":\\\"2023-10-11T06:46:34.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-11T07:11:15.000000Z\\\"}}]}]\"', 20000, 0, '2023-10-13 01:44:04', '2023-10-13 01:44:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoiceId` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `shippingAddress` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_details`
--

INSERT INTO `invoice_details` (`invoiceId`, `firstName`, `lastName`, `shippingAddress`, `phone`, `created_at`, `updated_at`) VALUES
(4, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:18:06', '2023-10-13 01:18:06'),
(5, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:18:37', '2023-10-13 01:18:37'),
(6, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:32:37', '2023-10-13 01:32:37'),
(7, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:34:02', '2023-10-13 01:34:02'),
(8, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:34:22', '2023-10-13 01:34:22'),
(9, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:35:05', '2023-10-13 01:35:05'),
(10, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:35:24', '2023-10-13 01:35:24'),
(11, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:35:49', '2023-10-13 01:35:49'),
(12, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:36:35', '2023-10-13 01:36:35'),
(13, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:41:33', '2023-10-13 01:41:33'),
(14, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:41:44', '2023-10-13 01:41:44'),
(15, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:43:42', '2023-10-13 01:43:42'),
(16, 'Jey', 'Hoang', '65 hung vuong', '123456', '2023-10-13 01:44:04', '2023-10-13 01:44:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_04_173148_create_admin_tables', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_03_014905_create_roles_table', 1),
(7, '2023_10_04_062624_create_products_table', 1),
(8, '2023_10_04_091557_create_carts_table', 1),
(9, '2023_10_04_105455_create_invoices_table', 1),
(10, '2023_10_06_155335_create_invoice_details_table', 1),
(11, '2023_10_07_130807_create_product_details_table', 1),
(12, '2023_10_30_085131_create_categories_table', 1),
(13, '2023_10_30_085156_create_collections_table', 1),
(14, '2023_12_02_113015_create_sessions_table', 2),
(15, '2023_12_06_134834_create_address_table', 3),
(16, '2023_12_10_104407_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `paymentMethod` text NOT NULL,
  `addressID` bigint(20) UNSIGNED DEFAULT NULL,
  `ship_to` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalPrice` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `userId`, `status`, `paymentMethod`, `addressID`, `ship_to`, `created_at`, `updated_at`, `totalPrice`) VALUES
(16, 5, 'Canceled', 'Pay at our store', 25, '', '2023-12-11 01:18:54', '2024-01-04 00:48:06', 64.00),
(17, 5, 'Pending', 'Cash on delivery (COD)', 25, '', '2023-12-11 01:33:23', '2023-12-11 01:33:23', 35.00),
(18, 5, 'Pending', 'Cash on delivery (COD)', 25, '', '2023-12-11 01:33:38', '2023-12-11 01:33:38', 35.00),
(19, 5, 'Delivered', 'Banking', 25, '', '2023-12-19 23:51:48', '2024-01-04 00:40:34', 35.00),
(20, 5, 'Delivered', 'Banking', 25, '', '2023-12-20 00:00:29', '2024-01-05 02:53:49', 35.00),
(21, 5, 'Pending', 'Cash on delivery (COD)', 25, '', '2023-12-20 23:17:10', '2023-12-20 23:17:10', 16.00),
(22, 5, 'Pending', 'Cash on delivery (COD)', 25, '', '2023-12-24 07:59:26', '2023-12-24 07:59:26', 35.00),
(23, 5, 'Pending', 'Cash on delivery (COD)', 25, '', '2023-12-24 08:00:11', '2023-12-24 08:00:11', 20.00),
(24, 5, 'Pending', 'Cash on delivery (COD)', 25, '', '2023-12-27 21:21:44', '2023-12-27 21:21:44', 35.00),
(25, 5, 'Completed', 'Cash on delivery (COD)', 39, '', '2023-12-27 21:24:02', '2023-12-27 21:24:02', 48.00),
(26, 5, 'Canceled', 'Cash on delivery (COD)', 39, '', '2023-12-28 07:08:46', '2023-12-28 07:08:46', 20.00),
(27, 5, 'Picked up', 'Cash on delivery (COD)', 40, '', '2023-12-28 07:24:33', '2023-12-28 07:24:33', 32.00),
(28, 5, 'Pending', 'Cash on delivery (COD)', 25, '', '2024-01-03 07:50:23', '2024-01-03 07:50:23', 70.00),
(29, 9, 'Pending', 'Pay at our store', 47, '', '2024-01-04 18:39:40', '2024-01-04 18:39:40', 12.00),
(30, 9, 'Pending', 'Pay at our store', 48, '', '2024-01-04 18:40:08', '2024-01-04 18:40:08', 12.00),
(31, 9, 'Pending', 'Pay at our store', 47, '', '2024-01-04 18:48:54', '2024-01-04 18:48:54', 35.00),
(32, 9, 'Pending', 'Cash on delivery (COD)', 48, '', '2024-01-04 18:52:01', '2024-01-04 18:52:01', 35.00),
(33, 9, 'Pending', 'Cash on delivery (COD)', 47, '', '2024-01-04 18:53:42', '2024-01-04 18:53:42', 35.00),
(34, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:07:52', '2024-01-04 19:07:52', 10.00),
(35, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:17:35', '2024-01-04 19:17:35', 10.00),
(36, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:21:59', '2024-01-04 19:21:59', 10.00),
(37, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:27:14', '2024-01-04 19:27:14', 10.00),
(38, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:33:35', '2024-01-04 19:33:35', 10.00),
(39, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:34:42', '2024-01-04 19:34:42', 10.00),
(40, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:35:05', '2024-01-04 19:35:05', 10.00),
(41, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:41:03', '2024-01-04 19:41:03', 20.00),
(42, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:41:57', '2024-01-04 19:41:57', 20.00),
(43, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:43:56', '2024-01-04 19:43:56', 20.00),
(44, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:44:35', '2024-01-04 19:44:35', 20.00),
(45, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:46:20', '2024-01-04 19:46:20', 20.00),
(46, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:51:33', '2024-01-04 19:51:33', 20.00),
(47, 8, 'Pending', 'Cash on delivery (COD)', 42, '', '2024-01-04 19:53:08', '2024-01-04 19:53:08', 20.00),
(48, 9, 'Canceled', 'Cash on delivery (COD)', 47, '', '2024-01-04 21:01:51', '2024-01-04 21:01:51', 35.00),
(49, 9, 'Pending', 'Pay at our store', 47, '', '2024-01-04 21:26:06', '2024-01-04 21:26:06', 10.00),
(50, 10, 'Delivered', 'Cash on delivery (COD)', 50, NULL, '2024-01-04 23:34:48', '2024-01-04 23:36:10', 12.00),
(51, NULL, 'Pending', 'Pay at our store', NULL, 'undefined dsaundefined dá Huyện Hoàng Sa Thành phố Đà Nẵng', '2024-01-05 00:31:12', '2024-01-05 00:31:12', 35.00),
(52, NULL, 'Pending', 'Cash on delivery (COD)', NULL, 'undefined dáundefined dá Huyện Hoàng Sa Thành phố Đà Nẵng', '2024-01-05 00:33:25', '2024-01-05 00:33:25', 35.00),
(53, NULL, 'Pending', 'Pay at our store', NULL, 'undefined dáundefined dá Huyện Hoàng Sa Thành phố Đà Nẵng', '2024-01-05 00:34:05', '2024-01-05 00:34:05', 35.00),
(54, NULL, 'Pending', 'Cash on delivery (COD)', NULL, 'undefined dáundefined dá Huyện Hoàng Sa Thành phố Đà Nẵng', '2024-01-05 00:35:23', '2024-01-05 00:35:23', 16.00),
(55, NULL, 'Pending', 'Pay at our store', NULL, 'undefined dáundefined Xã Nhơn Ái Huyện Phong Điền Thành phố Cần Thơ', '2024-01-05 00:36:25', '2024-01-05 00:36:25', 35.00),
(56, NULL, 'Pending', 'Banking', NULL, 'undefined dáundefined Thị trấn Xuân Mai Huyện Chương Mỹ Thành phố Hà Nội', '2024-01-05 00:37:45', '2024-01-05 00:37:45', 16.00),
(57, NULL, 'Pending', 'Banking', NULL, 'undefined dáundefined dá dsa Thành phố Hà Nội', '2024-01-05 00:39:00', '2024-01-05 00:39:00', 35.00),
(58, NULL, 'Pending', 'Pay at our store', NULL, 'undefined dáundefined dá Huyện Hoàng Sa Thành phố Đà Nẵng', '2024-01-05 00:39:56', '2024-01-05 00:39:56', 16.00),
(59, 9, 'Pending', 'Cash on delivery (COD)', 47, NULL, '2024-01-05 00:48:57', '2024-01-05 00:48:57', 16.00),
(60, 9, 'Pending', 'Pay at our store', 47, NULL, '2024-01-05 02:53:16', '2024-01-05 02:53:16', 10.00),
(61, 9, 'Pending', 'Cash on delivery (COD)', 47, NULL, '2024-01-27 06:22:02', '2024-01-27 06:22:02', 16.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` bigint(20) UNSIGNED NOT NULL,
  `detailId` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `detailId`, `quantity`, `created_at`, `updated_at`) VALUES
(32, 16, 30, 3, '2023-12-11 01:18:54', '2023-12-11 01:18:54'),
(33, 16, 31, 1, '2023-12-11 01:18:54', '2023-12-11 01:18:54'),
(34, 16, 51, 1, '2023-12-11 01:18:54', '2023-12-11 01:18:54'),
(35, 17, 21, 1, '2023-12-11 01:33:23', '2023-12-11 01:33:23'),
(36, 18, 21, 1, '2023-12-11 01:33:38', '2023-12-11 01:33:38'),
(37, 19, 22, 1, '2023-12-19 23:51:48', '2023-12-19 23:51:48'),
(38, 20, 23, 1, '2023-12-20 00:00:29', '2023-12-20 00:00:29'),
(39, 20, 59, 1, '2023-12-20 00:00:29', '2023-12-20 00:00:29'),
(40, 21, 23, 1, '2023-12-20 23:17:10', '2023-12-20 23:17:10'),
(41, 22, 21, 1, '2023-12-24 07:59:26', '2023-12-24 07:59:26'),
(42, 23, 32, 1, '2023-12-24 08:00:11', '2023-12-24 08:00:11'),
(43, 23, 37, 1, '2023-12-24 08:00:11', '2023-12-24 08:00:11'),
(44, 24, 21, 1, '2023-12-27 21:21:44', '2023-12-27 21:21:44'),
(45, 25, 54, 2, '2023-12-27 21:24:02', '2023-12-27 21:24:02'),
(46, 26, 30, 2, '2023-12-28 07:08:46', '2023-12-28 07:08:46'),
(47, 27, 25, 1, '2023-12-28 07:24:33', '2023-12-28 07:24:33'),
(48, 27, 26, 1, '2023-12-28 07:24:33', '2023-12-28 07:24:33'),
(49, 28, 21, 2, '2024-01-03 07:50:23', '2024-01-03 07:50:23'),
(50, 29, 62, 1, '2024-01-04 18:39:40', '2024-01-04 18:39:40'),
(51, 30, 62, 1, '2024-01-04 18:40:08', '2024-01-04 18:40:08'),
(52, 31, 21, 1, '2024-01-04 18:48:54', '2024-01-04 18:48:54'),
(53, 32, 21, 1, '2024-01-04 18:52:01', '2024-01-04 18:52:01'),
(54, 33, 21, 1, '2024-01-04 18:53:42', '2024-01-04 18:53:42'),
(55, 34, 30, 1, '2024-01-04 19:07:52', '2024-01-04 19:07:52'),
(56, 35, 30, 1, '2024-01-04 19:17:35', '2024-01-04 19:17:35'),
(57, 36, 30, 1, '2024-01-04 19:21:59', '2024-01-04 19:21:59'),
(58, 37, 30, 1, '2024-01-04 19:27:14', '2024-01-04 19:27:14'),
(59, 38, 30, 1, '2024-01-04 19:33:35', '2024-01-04 19:33:35'),
(60, 39, 30, 1, '2024-01-04 19:34:42', '2024-01-04 19:34:42'),
(61, 41, 30, 2, '2024-01-04 19:41:03', '2024-01-04 19:41:03'),
(62, 42, 30, 2, '2024-01-04 19:41:57', '2024-01-04 19:41:57'),
(63, 43, 30, 2, '2024-01-04 19:43:56', '2024-01-04 19:43:56'),
(64, 44, 30, 2, '2024-01-04 19:44:35', '2024-01-04 19:44:35'),
(65, 45, 30, 2, '2024-01-04 19:46:20', '2024-01-04 19:46:20'),
(66, 46, 30, 2, '2024-01-04 19:51:33', '2024-01-04 19:51:33'),
(67, 47, 30, 2, '2024-01-04 19:53:08', '2024-01-04 19:53:08'),
(68, 48, 21, 1, '2024-01-04 21:01:51', '2024-01-04 21:01:51'),
(69, 49, 30, 1, '2024-01-04 21:26:06', '2024-01-04 21:26:06'),
(70, 50, 64, 1, '2024-01-04 23:34:48', '2024-01-04 23:34:48'),
(71, 51, 21, 1, '2024-01-05 00:31:12', '2024-01-05 00:31:12'),
(72, 52, 21, 1, '2024-01-05 00:33:25', '2024-01-05 00:33:25'),
(73, 53, 21, 1, '2024-01-05 00:34:05', '2024-01-05 00:34:05'),
(74, 54, 23, 1, '2024-01-05 00:35:23', '2024-01-05 00:35:23'),
(75, 55, 21, 1, '2024-01-05 00:36:25', '2024-01-05 00:36:25'),
(76, 56, 23, 1, '2024-01-05 00:37:45', '2024-01-05 00:37:45'),
(77, 57, 21, 1, '2024-01-05 00:39:00', '2024-01-05 00:39:00'),
(78, 58, 23, 1, '2024-01-05 00:39:56', '2024-01-05 00:39:56'),
(79, 59, 23, 1, '2024-01-05 00:48:57', '2024-01-05 00:48:57'),
(80, 60, 39, 1, '2024-01-05 02:53:16', '2024-01-05 02:53:16'),
(81, 61, 23, 1, '2024-01-27 06:22:02', '2024-01-27 06:22:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('chicuong4142@gmail.com', '$2y$10$urAu7tl3zSlWoFeYbadh9uYiGm3.FmvwbXPN8kjLn06MAAKq5ZDC6', '2024-01-04 19:48:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productId` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `categoryId` int(11) UNSIGNED DEFAULT NULL,
  `collectionId` int(11) UNSIGNED DEFAULT NULL,
  `price` double NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `salePercent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productId`, `name`, `categoryId`, `collectionId`, `price`, `description`, `salePercent`, `created_at`, `updated_at`) VALUES
(10, 'SOCKS 3 PACK', 4, 2, 35, NULL, NULL, NULL, NULL),
(11, 'STARFIELD X STANCE CREW SOCKS BOX SET', 4, 1, 35, NULL, NULL, NULL, NULL),
(12, 'STARFIELD X STANCE CREW SOCKS', 4, 1, 16, NULL, NULL, NULL, NULL),
(13, 'STANCE COTTON QUARTER SOCKS', 4, 2, 10, NULL, NULL, NULL, NULL),
(14, 'STANCE T-SHIRT WITH BUTTER BLEND™', 1, NULL, 55, NULL, NULL, NULL, NULL),
(15, 'STANCE BUTTER BLEND™ BOXER BRIEF WITH WHOLESTER™', 5, NULL, 24, NULL, NULL, NULL, NULL),
(16, 'STANCE COTTON BOXER BRIEF', 5, NULL, 19, NULL, NULL, NULL, NULL),
(17, 'ICON CREW SOCKS', 11, NULL, 12, '76% COMBED COTTON, 18% POLYESTER, 4% NYLON, 2% ELASTANE', NULL, NULL, NULL),
(18, 'WOMENS\' HAPPENINGS CROP TOP', 12, NULL, 35, NULL, NULL, NULL, NULL),
(19, 'WOMENS\' HAPPENINGS LEGGINGS', 14, NULL, 30, NULL, NULL, NULL, NULL),
(20, 'SHELTER WOMENS\' JOGGER WITH BUTTER BLEND™', 14, NULL, 85, NULL, NULL, NULL, NULL),
(21, 'WOMENS\' GET SET PERFORMANCE T-SHIRT', 12, NULL, 65, NULL, NULL, NULL, NULL),
(22, 'SARA RABIN X STANCE WOMENS\' HAPPENINGS 7/8 LEGGINGS', 14, NULL, 48.8, NULL, NULL, NULL, NULL),
(23, 'SARA RABIN X STANCE WOMENS\' HAPPENINGS CROP TOP', 12, NULL, 44.9, NULL, NULL, NULL, NULL),
(24, 'WOMENS\' HAPPENINGS ATHLETIC BIKE SHORTS', 14, NULL, 44.9, NULL, NULL, NULL, NULL),
(25, 'SHELTER WOMENS\' SHORT WITH BUTTER BLEND™', 14, NULL, 45.5, NULL, NULL, NULL, NULL),
(26, 'NO BRAND PERFORMANCE TAB SOCKS 3 PACK\r\n', 16, NULL, 39.99, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `productDetailId` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `img` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`img`)),
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`productDetailId`, `productId`, `img`, `size`, `color`, `stock`, `created_at`, `updated_at`) VALUES
(21, 11, '[\"imgs/Home/10017.jpg\",\"imgs/Home/10018.jpg\"]', 'Freesize', 'Navy', 4, NULL, '2024-01-05 07:39:00'),
(22, 11, '[\"imgs/Home/10017.jpg\",\"imgs/Home/10018.jpg\"]', 'Freesize', 'Whitesmoke', 10, NULL, '2023-11-27 06:29:28'),
(23, 12, '[\"imgs/Home/10052.jpg\",\"imgs/Home/10019.jpg\"]', 'M', 'Whitesmoke', 5, NULL, '2024-01-27 13:22:02'),
(24, 12, '[\"imgs/Home/10052.jpg\",\"imgs/Home/10019.jpg\"]', 'L', 'Whitesmoke', 5, NULL, '2023-12-12 05:34:11'),
(25, 12, '[\"imgs/Home/10015.jpg\",\"imgs/Home/10016.jpg\"]', 'M', 'Navy', 5, NULL, '2023-12-12 05:34:21'),
(26, 12, '[\"imgs/Home/10015.jpg\",\"imgs/Home/10016.jpg\"]', 'L', 'Navy', 6, NULL, '2023-12-12 05:34:23'),
(29, 13, '[\"imgs/Home/10003.webp\",\"imgs/Home/10004.webp\"]', 'L', 'Black', 6, NULL, '2023-11-30 01:34:36'),
(30, 13, '[\"imgs/Home/10003.webp\",\"imgs/Home/10004.webp\"]', 'M', 'Black', 3, NULL, '2024-01-05 04:26:06'),
(31, 13, '[\"imgs/Home/10011.webp\",\"imgs/Home/10012.webp\"]', 'M', 'White', 5, NULL, '2023-11-30 01:35:16'),
(32, 13, '[\"imgs/Home/10011.webp\",\"imgs/Home/10012.webp\"]', 'L', 'White', 5, NULL, '2023-11-30 01:35:37'),
(33, 13, '[\"imgs/Home/10009.jpg\",\"imgs/Home/10010.webp\"]', 'M', 'Grey', 4, NULL, '2023-11-30 01:36:15'),
(34, 13, '[\"imgs/Home/10009.jpg\",\"imgs/Home/10010.webp\"]', 'L', 'Grey', 3, NULL, '2023-11-30 01:36:28'),
(37, 13, '[\"imgs/Home/10013.webp\",\"imgs/Home/10014.webp\"]', 'M', 'Pink', 3, NULL, '2023-11-30 03:16:44'),
(38, 13, '[\"imgs/Home/10013.webp\",\"imgs/Home/10014.webp\"]', 'L', 'Pink', 4, NULL, '2023-11-30 03:16:46'),
(39, 13, '[\"imgs/Home/10001.webp\",\"imgs/Home/10002.webp\"]', 'M', 'Orange', 6, '2023-11-12 23:55:32', '2024-01-05 09:53:16'),
(40, 13, '[\"imgs/Home/10001.webp\",\"imgs/Home/10002.webp\"]', 'L', 'Orange', 3, '2023-11-12 23:55:32', '2023-11-30 03:17:03'),
(43, 14, '[\"imgs/Men_product/10064.jpeg\",\"imgs/Men_product/10065.jpeg\"]', 'L', 'Darkbrown', 2, '2023-11-17 10:25:41', '2023-11-28 12:45:20'),
(44, 14, '[\"imgs/Men_product/10064.jpeg\",\"imgs/Men_product/10065.jpeg\"]', 'M', 'Darkbrown', 5, '2023-11-17 10:25:41', '2023-11-28 12:45:25'),
(45, 14, '[\"imgs/Men_product/10058.jpg\",\"imgs/Men_product/10059.jpg\"]', 'L', 'Black', 3, '2023-11-17 10:30:48', '2023-11-22 03:56:23'),
(46, 14, '[\"imgs/Men_product/10058.jpg\",\"imgs/Men_product/10059.jpg\"]', 'XL', 'Black', 1, '2023-11-17 10:30:48', '2023-11-22 03:55:51'),
(47, 14, '[\"imgs/Men_product/10060.jpg\",\"imgs/Men_product/10061.jpg\"]', 'L', 'Gray', 11, '2023-11-17 10:38:10', '2023-11-22 03:55:59'),
(48, 14, '[\"imgs/Men_product/10060.jpg\",\"imgs/Men_product/10061.jpg\"]', 'XL', 'Gray', 2, '2023-11-17 10:38:10', '2023-11-22 03:56:06'),
(49, 14, '[\"imgs/Men_product/10062.jpg\",\"imgs/Men_product/10063.jpg\"]', 'L', 'White', 3, '2023-11-17 10:56:18', '2023-11-22 03:56:11'),
(50, 14, '[\"imgs/Men_product/10062.jpg\",\"imgs/Men_product/10063.jpg\"]', 'M', 'White', 6, '2023-11-17 10:56:18', '2023-11-22 03:56:16'),
(51, 15, '[\"imgs/Men_product/10013.jpg\",\"imgs/Men_product/10014.jpg\"]', 'M', 'Swankidays - Army', 2, '2023-11-18 01:30:28', '2023-11-18 01:30:28'),
(52, 15, '[\"imgs/Men_product/10013.jpg\",\"imgs/Men_product/10014.jpg\"]', 'L', 'Swankidays - Army', 4, '2023-11-18 01:30:28', '2023-11-18 01:30:28'),
(53, 15, '[\"imgs/Men_product/10017.jpg\",\"imgs/Men_product/10018.jpg\"]', 'L', 'Rikter - Navy', 4, '2023-11-18 01:32:10', '2023-11-18 01:32:10'),
(54, 15, '[\"imgs/Men_product/10017.jpg\",\"imgs/Men_product/10018.jpg\"]', 'XL', 'Rikter - Navy', 4, '2023-11-18 01:32:10', '2023-11-18 01:32:10'),
(55, 15, '[\"imgs/Men_product/10017.jpg\",\"imgs/Men_product/10018.jpg\"]', 'M', 'Rikter - Navy', 4, '2023-11-18 01:32:10', '2023-11-18 01:32:10'),
(56, 15, '[\"imgs/Men_product/10019.jpg\",\"imgs/Men_product/10020.jpg\"]', 'L', 'Bronx - Dark Navy', 3, '2023-11-18 01:36:13', '2023-11-18 01:36:13'),
(57, 15, '[\"imgs/Men_product/10019.jpg\",\"imgs/Men_product/10020.jpg\"]', 'XL', 'Bronx - Dark Navy', 2, '2023-11-18 01:36:13', '2023-11-18 01:36:13'),
(58, 16, '[\"imgs/Men_product/10024.jpg\",\"imgs/Men_product/10025.jpg\"]', 'L', 'Coastal - Offwhite', 2, '2023-11-18 01:39:17', '2023-11-18 01:39:17'),
(59, 16, '[\"imgs/Men_product/10024.jpg\",\"imgs/Men_product/10025.jpg\"]', 'XL ', 'Coastal - Offwhite', 1, '2023-11-18 01:39:17', '2023-11-18 01:39:17'),
(60, 17, '[\"imgs/Men_product/10027.jpg\",\"imgs/Men_product/10028.jpg\"]', 'M', 'Turquoise', 3, '2023-11-21 15:45:40', '2023-11-21 15:56:56'),
(61, 17, '[\"imgs/Men_product/10027.jpg\",\"imgs/Men_product/10028.jpg\"]', 'L', 'Turquoise', 2, '2023-11-21 15:45:40', '2023-11-21 15:56:56'),
(62, 17, '[\"imgs/Men_product/10029.jpg\",\"imgs/Men_product/10030.jpg\"]', 'L', 'Rosesmoke', 2, '2023-11-21 15:46:51', '2023-11-21 15:56:56'),
(63, 17, '[\"imgs/Men_product/10029.jpg\",\"imgs/Men_product/10030.jpg\"]', 'M', 'Rosesmoke', 1, '2023-11-21 15:46:51', '2023-11-21 15:56:56'),
(64, 17, '[\"imgs/Men_product/10033.jpg\",\"imgs/Men_product/10034.jpg\"]', 'L', 'Jade', 1, '2023-11-21 15:47:51', '2024-01-05 06:34:48'),
(65, 17, '[\"imgs/Men_product/10033.jpg\",\"imgs/Men_product/10034.jpg\"]', 'M', 'Jade', 2, '2023-11-21 15:47:51', '2023-11-21 15:56:56'),
(66, 17, '[\"imgs/Men_product/10031.jpg\",\"imgs/Men_product/10032.jpg\"]', 'L', 'Whiteblack', 2, '2023-11-21 15:48:50', '2023-11-21 15:56:56'),
(67, 17, '[\"imgs/Men_product/10031.jpg\",\"imgs/Men_product/10032.jpg\"]', 'M', 'Whiteblack', 2, '2023-11-21 15:48:50', '2023-11-21 15:56:56'),
(68, 18, '[\"imgs/women_product/10075.jpg\",\"imgs/women_product/10077.jpg\"]', 'L', 'Black', 3, '2024-01-04 08:05:06', '2024-01-04 08:35:24'),
(69, 18, '[\"imgs/women_product/10075.jpg\",\"imgs/women_product/10077.jpg\"]', 'XS', 'Black', 6, '2024-01-04 08:05:06', '2024-01-04 08:35:33'),
(70, 18, '[\"imgs/women_product/10075.jpg\",\"imgs/women_product/10077.jpg\"]', 'M', 'Black', 2, '2024-01-04 08:05:37', '2024-01-04 08:35:10'),
(71, 18, '[\"imgs/women_product/10075.jpg\",\"imgs/women_product/10077.jpg\"]', 'XL', 'Black', 1, '2024-01-04 08:05:37', '2024-01-04 08:35:43'),
(72, 18, '[\"imgs/women_product/10007.jpeg\",\"imgs/women_product/10008.jpeg\"]', 'XS', 'Blackbrown', 1, '2024-01-04 08:07:21', '2024-01-04 08:37:09'),
(73, 18, '[\"imgs/women_product/10007.jpeg\",\"imgs/women_product/10008.jpeg\"]', 'S', 'Blackbrown', 2, '2024-01-04 08:07:21', '2024-01-04 08:36:07'),
(74, 18, '[\"imgs/women_product/10007.jpeg\",\"imgs/women_product/10008.jpeg\"]', 'M', 'Blackbrown', 2, '2024-01-04 08:07:57', '2024-01-04 08:37:20'),
(75, 18, '[\"imgs/women_product/10007.jpeg\",\"imgs/women_product/10008.jpeg\"]', 'XL', 'Blackbrown', 0, '2024-01-04 08:07:57', '2024-01-04 08:37:24'),
(76, 19, '[\"imgs/women_product/10011.jpg\",\"imgs/women_product/10012.jpg\"]', 'XS', 'Olive', 0, '2024-01-04 08:13:21', '2024-01-04 08:36:30'),
(77, 19, '[\"imgs/women_product/10011.jpg\",\"imgs/women_product/10012.jpg\"]', 'S', 'Olive', 2, '2024-01-04 08:13:21', '2024-01-04 08:36:36'),
(78, 19, '[\"imgs/women_product/10011.jpg\",\"imgs/women_product/10012.jpg\"]', 'L', 'Olive', 1, '2024-01-04 08:13:51', '2024-01-04 08:36:43'),
(79, 19, '[\"imgs/women_product/10011.jpg\",\"imgs/women_product/10012.jpg\"]', 'XL', 'Olive', 1, '2024-01-04 08:13:51', '2024-01-04 08:36:49'),
(82, 21, '[\"imgs/women_product/10053.jpg\",\"imgs/women_product/10054.jpg\"]', 'L', 'Black', 1, '2024-01-04 08:43:43', '2024-01-04 08:46:43'),
(83, 21, '[\"imgs/women_product/10053.jpg\",\"imgs/women_product/10054.jpg\"]', 'M', 'Black', 2, '2024-01-04 08:43:43', '2024-01-04 08:46:36'),
(86, 21, '[\"imgs/women_product/10055.jpeg\",\"imgs/women_product/10056.jpeg\"]', 'L', 'Gray', 1, '2024-01-04 08:44:44', '2024-01-04 08:46:30'),
(87, 21, '[\"imgs/women_product/10055.jpeg\",\"imgs/women_product/10056.jpeg\"]', 'XL', 'Gray', 2, '2024-01-04 08:44:44', '2024-01-04 08:46:24'),
(90, 22, '[\"imgs/women_product/10039.jpg\",\"imgs/women_product/10040.jpg\"]', 'M', 'Multi', 1, '2024-01-04 08:55:10', '2024-01-04 09:08:09'),
(91, 22, '[\"imgs/women_product/10039.jpg\",\"imgs/women_product/10040.jpg\"]', 'L', 'Multi', 2, '2024-01-04 08:55:10', '2024-01-04 09:08:11'),
(92, 23, '[\"imgs/women_product/10037.jpeg\",\"imgs/women_product/10038.jpeg\"]', 'M', 'Multi', 2, '2024-01-04 08:56:19', '2024-01-04 08:56:19'),
(93, 23, '[\"imgs/women_product/10037.jpeg\",\"imgs/women_product/10038.jpeg\"]', 'L', 'Multi', 1, '2024-01-04 08:56:19', '2024-01-04 08:56:19'),
(94, 18, '[\"imgs/women_product/10118.jpg\",\"imgs/women_product/10119.jpg\"]', 'L', 'Rose', 1, '2024-01-04 09:11:21', '2024-01-04 09:11:21'),
(95, 18, '[\"imgs/women_product/10118.jpg\",\"imgs/women_product/10119.jpg\"]', 'M', 'Rose', 2, '2024-01-04 09:11:21', '2024-01-04 09:11:21'),
(96, 23, '[\"imgs/women_product/10116.jpg\",\"imgs/women_product/10117.jpg\"]', 'L', 'Red', 1, '2024-01-04 09:12:43', '2024-01-04 09:12:43'),
(97, 18, '[\"imgs/women_product/10116.jpg\",\"imgs/women_product/10117.jpg\"]', 'M', 'Red', 1, '2024-01-04 09:12:43', '2024-01-04 09:12:43'),
(98, 18, '[\"imgs/women_product/10114.jpg\",\"imgs/women_product/10115.jpg\"]', 'L', 'Offwhite', 1, '2024-01-04 09:14:38', '2024-01-04 09:14:38'),
(99, 18, '[\"imgs/women_product/10114.jpg\",\"imgs/women_product/10115.jpg\"]', 'M', 'Offwhite', 2, '2024-01-04 09:14:38', '2024-01-04 09:14:38'),
(100, 24, '[\"imgs/women_product/10041.jpg\",\"imgs/women_product/10042.jpg\"]', 'M', 'Melon', 2, '2024-01-04 09:19:07', '2024-01-04 09:19:07'),
(101, 24, '[\"imgs/women_product/10041.jpg\",\"imgs/women_product/10042.jpg\"]', 'L', 'Melon', 1, '2024-01-04 09:19:07', '2024-01-04 09:19:07'),
(102, 24, '[\"imgs/women_product/10045.jpg\",\"imgs/women_product/10046.jpg\"]', 'L', 'Leopard', 1, '2024-01-04 09:20:30', '2024-01-04 09:20:30'),
(103, 24, '[\"imgs/women_product/10045.jpg\",\"imgs/women_product/10046.jpg\"]', 'M', 'Leopard', 2, '2024-01-04 09:20:30', '2024-01-04 09:20:30'),
(104, 24, '[\"imgs/women_product/10043.jpg\",\"imgs/women_product/10044.jpg\"]', 'L', 'Black', 1, '2024-01-04 09:21:19', '2024-01-04 09:21:19'),
(105, 24, '[\"imgs/women_product/10043.jpg\",\"imgs/women_product/10044.jpg\"]', 'M', 'Black', 2, '2024-01-04 09:21:19', '2024-01-04 09:21:19'),
(106, 24, '[\"imgs/women_product/10047.jpeg\",\"imgs/women_product/10048.jpeg\"]', 'M', 'Blackbrown', 2, '2024-01-04 09:23:11', '2024-01-04 09:24:14'),
(107, 24, '[\"imgs/women_product/10047.jpeg\",\"imgs/women_product/10048.jpeg\"]', 'L', 'Blackbrown', 2, '2024-01-04 09:23:11', '2024-01-04 09:24:19'),
(108, 26, '[\"imgs/Socks/10013.jpg\"]', 'M', 'Quantum - Multi', 1, '2024-01-04 14:53:40', '2024-01-04 14:53:40'),
(109, 26, '[\"imgs/Socks/10010.jpg\"]', 'M', 'Run - Multi', 2, '2024-01-04 14:53:40', '2024-01-04 14:53:40'),
(110, 26, '[\"imgs/Socks/10013.jpg\"]', 'L', 'Quantum - Multi', 1, '2024-01-04 14:53:57', '2024-01-04 14:53:57'),
(111, 26, '[\"imgs/Socks/10010.jpg\"]', 'L', 'Run - Multi', 2, '2024-01-04 14:53:57', '2024-01-04 14:53:57'),
(112, 26, '[\"imgs/Socks/10011.jpg\"]', 'L', 'Plotter - Multi', 2, '2024-01-04 14:55:30', '2024-01-04 14:55:30'),
(113, 26, '[\"imgs/Socks/10011.jpg\"]', 'M', 'Plotter - Multi', 1, '2024-01-04 14:55:30', '2024-01-04 14:55:30'),
(114, 26, '[\"imgs/Socks/10012.jpg\"]', 'L', 'Altitudes - Multi', 2, '2024-01-04 14:56:24', '2024-01-04 14:56:24'),
(115, 26, '[\"imgs/Socks/10012.jpg\"]', 'M', 'Altitudes - Multi', 1, '2024-01-04 14:56:24', '2024-01-04 14:56:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-10-03 08:38:06', '2023-10-03 08:38:06'),
(2, 'customer', '2023-10-03 08:38:06', '2023-10-03 08:38:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0gFlJa8cxDkYp9D2lF48Dl2ZaPZbICZ515XI09oX', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnV0d2xzVndSSjJEU1pxSVVXOE1GT3prOUR4TUR6NjJpTDM2NnFqMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742345),
('0mctUKjAmaGFGN6F0wuwBos3vEkAwQY8dgzb4Tru', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGQ5dUI3SkZOalRBa1k5cFZlZGpMeHRscjRLZUtIVkZsUjJ4ZVpPWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701746537),
('1EjhsgQkCWRNO7dXnxomswuZS3U3OAohwTdH4mVV', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRURLVnE3NDFuYVJwZ0RyN1ZDTmpXMmJ6OFFnYzdnYThVdUo3N1BxWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0yOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701742351),
('1y0gz1MPdt27Q3WhnAt25ceH0rjv6yegdZwNzqeZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUdzTWUyR29LSEl0OHJzdGxxOXpqNndNOWZHazBqVm1LdHBSZ09aQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742329),
('27WsXQMr6u7nR96uqknE4OH50hJfkwzWMf2ptzbi', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXBBcW9US2FvV1RqVzZnUlZuOWx5QzN4ZFRJdWI5S1dwN1g2WldMeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93b21lbi1wcm9kdWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701742343),
('2ZzaaD8iUzRrgoj3zewvXfXfMXOZ1f4eDro9XiU9', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXNhOFFWWkxLclFibWZFMVNBaE9Eam02ZWl6ZDhwbUl5cUl6dW00MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739289),
('36nMdehVyCceQDiX0nwJIEwDGr3haMVNdzTuVYnR', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZlZTZU9LNFFpUE1CdTIwekN2OGF4Rm13cDFxQXRtM0R2Q1VCUXZaRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739300),
('5rGB1ZfHeBLMhjxV0705J7nUhqmhR7ROYQyilLn3', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXBLeHhvVFVHVFFtUHVCTVdRaExhRFkzV1dIVDdVYWR6Ukw5ZllMeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW5wcm9kdWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701742345),
('7d50wU0k4V7E7l4ASNbPLQVx8LyKHpTWDB82z5AM', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZElPd2hJR091eXR2SDBIanJjN3ZhVWVvaE1XZlZmU3g1ckxIM1hsQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMj9kZXRhaWxJRD0yNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701742336),
('94cqO0PJD08mODHhOPHLp6zvDVmxjDFeLMg0ENop', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1pRcG5nTEpDbWFMTzU2dWt6Q2x5V0F0aFJZY3BhZ2NMb05Cb0FlUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701742335),
('AEyWgBCrwkMCW6l5gwyruGXc1nNFXw6feLNP7HeI', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiektqSDVXTEpjemRtZVNuUXlJa1cwYUxnMVV2Y0hmaTlXa0hnY3NDRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739153),
('ayEv2zn54EiW54DFONaBsNNGSw4sbJKePGIFIndu', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3IyeFRZZ2tGaEZlTTZCcTJkYktSU3NMVXE4aEg5RTJienhOUm5jdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742347),
('AZtiqFMRva9L8b3k35SlEH435ooZtMW9NlsY5Nca', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHJZcVpHeEp4Z3pOR21hUnBBSkRuMFFWSU45SVpTUXNXUkM5d1dMTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739154),
('BLscaBpeVOyYJbsWohEzUl4OsgdmG650Vz7lqBkg', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclZwNzVjWUdwbVk0bU5kVzFCcG5Ya0pqNFJDN0xkaHBsd1ZkVnEweCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739169),
('BUJO7PLHY1JKvfgVecLdQFDh3qUH1MIoSWlAuhug', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFBrR054QTlpamlXSlNNUEI1RXUyTmx0Y05jZzdZVWVtcjlEOHd2eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739174),
('dqX8ByaXEl3a9q1Uwd3rZqIz4HqRdo2fIoQbl6MJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieG5aMlVGT0c0QnBWdFZNbHN1TnB0UzA0NEdxSGF5dDZUZXNWYzZOQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW5wcm9kdWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701739169),
('e5ZEnXeNrnCd2sExf2IUUhG0szEg45F5icr5RqUS', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZU9IZUN4Zm9OWTUwVGo5RDRmZTJvUmJvZ2FnVzVYMkdTYlFDcWtlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW5wcm9kdWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701739364),
('EoLfykEe677t37MFwfPKfxocjLDlqCHYQ0dODY9t', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3ZSeU40bzhoSjMwVzFTRjV6d3lTZUUyRzdPRnBkR3ZIRXBRVkxaYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701742329),
('gkgIZusIcnAM3DKBgNAQ784hgI6gWvg9weU2GHDs', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEZPSGt2SjZpaTRnUlUwZ1p4QjJJblBLcW9UZEhDd08yYjdrcmF6SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739086),
('H11sl1iOTaTDQfhPhFFhYYTvnITU88QMwtojINn6', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTEtNelNja3V1VVRkT2ZmU1lEcXlCVUFNTldtZkV6WnlVa1JzT083byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742343),
('h62f6jfHu6zucdeMi9NdNqBqDI7Aztg8UqFovIO2', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmw3dnVTTExITVN2b3NRbnRoREZreEhHRXNDdDRodkNXRjZ1aXh0diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739037),
('h6AzuD0MfjUyoR1XxwpWxYAGiJxWyNIzWtZzEMv6', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTVtQXBVMENFeDMzUHQ1SmdjMUhsbHEzMXFmeUtYamdEQVhPWUF5TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739227),
('hr2B2dgPXKVOfoWh8mgJdU4kuzAfmhqZNCtau9uR', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUZWZERwN1FlR3YxSUxySnhQOEYxRjY5VkphT2RZUTEzS21wcnNhUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739227),
('IhHEM3cJDIFdc1qoegXtK2CXf1l5cVw0085AxVWV', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUV4aFZ5bUxBNEFGaXdTeG5wUm5RQlFXcWNiQjlCUlBESWRoU1hTRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739869),
('IV2dau3rUHKIWCePYM9NeaFFLcA5AWFRyexPRslf', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjZodEtQeGZoQ3haaTlDNnIwVlY1bWRscDhYZDJDZEpYZTRyQjlabyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93b21lbi1wcm9kdWN0Ijt9fQ==', 1701739167),
('jmx3Pt2YJQwPQ7B7pTc0XrjT3jj1YPmrpWipplJI', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFJUNHRacVN2VUx1a2RFS3JFQWpab3hhSU5FRDQxVUM1UEVPRFhFUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701746538),
('Kc9UVrSUQucAYRqW1gtaOeZ75ycvtrq3qVPMDoFf', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEZOM3VUS2d1NEFYdTZydVNKaXQycko0RUd6c2NTRmh3Tm10TVFobiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701742347),
('KenG1C5sKs7lLcNTRe2caUteU6NsQxlN37GifDsn', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0FqSjNnS09WNEROWjk3SFkxeVNST1F0SERVemhrRFF0ek01MmcwaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739198),
('Kewkyxd60T2NlWD33WC8Mz0Gp8PcrDcL16aRw432', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0RXM3hDUGg1V2pZdGt0dlFpMGpmc0lwcnA2OE5OaVpXeG5aNVR4WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739300),
('KPUF6LDZCYxamx4GkRZxo0KkPX3rBzZoMyAIreu1', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0NEMmZwc1ZwcVRROFdWSDRNYlhPeHpaS1ZwbkN6S0xwUDhodzJVVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739171),
('KXVfPpYGF1XpZLgCJIbfN6moLZ5g9mHRBinjAdJe', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2dRM0J3ZDZCUTZZTkprdVdvV3hJNWR1aHcyTWNuRWpvTHFLWlpjRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739369),
('KzEjY05ai5D51dQHsHZdHAjFCzeP2FFcIjFU00VQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibllab3lMbFJpeGpKbUhxOVFPckpTVmRyd0NVZkt5T1dqa2xWcThqeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739167),
('LQbAVFeyE1gBUtFZQ3vAdMQCy1RfNfMK9ekndktb', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEpzb1dJNWdoWEZ4YW1jY08xQWcxRGxwTjFOalFKeDJ0RndlT0VaMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739348),
('LQkVEWjsLdtSEA8cJtpc6SiSHwLdy9GkENj6bk5x', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2RsSG13ZWo1MGRvOHUwWXJrd0dPejc0UEZoYlJFdFBoODNKUWJkdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739289),
('o8buhZRSdISLrIMcHProkCv2WuqIduUlbMl5Q7pY', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlBhS3pGcnNFdHVyOHJvcWl6bmxCUm5BUFRlTGFZOTJsd1NlRTMxNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739247),
('ovQp82WonenjQvUCTPfzXZHnHrtK4PBQfwcO3bQH', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGJ2V2haQzhyb3JrNUFwblJYdzJaUFNGYUZsNUNXSGxWWGZOdmJ2OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742351),
('PuFFCsCvksZDQu5vpgxxhTyLn7LsSbHPSGBCQcSJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODl2ZjZkOHFLTnZqUnBVNUl2VlVld0ZQaXlsNlVDdkoxbHJaWUwyQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739086),
('PyWnQV2g2uHGAciZwdKpyA0N5SNHs35WFiU0KuHE', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1Nzd3FEZDJyaUplS0QyS240S1JzeUVocWJBQldXdXY3WUdHMFl6aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739369),
('R3Y01ndp9r5cV6ck6TiQ0w1KDiVHGY75xYdv67VN', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYng0Qkt4SlFSMHlaZjZsbEViQjdJS2FlZW5odnNxRmtmWkF5Q1U0bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739174),
('rBbZImJ54BTweHKNBy0i2jzk2DK6vdWVEYoBTHBG', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUJhbUhEWGVCcjg0UHF2OFk4eEp1ejBtWlltNnkya3Fxa1V6a1VHVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739198),
('RCPxgDEhTF0ZdDNhWiOs8CheaBbrO2zAJlKkPQHa', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYU5TYjBwVjVHWGxrV3VhVllkT25Ycmc2czFQWUtuY0cxRnJWbmJSbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739171),
('rs0aevxDMniUDGdRvVtux2Tz0ORzyl3S7tgOTEDm', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDhqeE5oZUV1VGhXcEs0aDY5dGZnRUlaaEFHUDJxTVNJQTNoMWtCVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739248),
('S3lcbCunzn8EBIEtbPWKyWj8L9HOPzwFySV8WjQD', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTJjNEE1QmVKUHcxbHJVb3ZiQ0tFQ3dXVmx0aW9IZWFUQTMyUUpjeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742348),
('STy7ZjX9yrtuJBIk8vfFFto5LaCBEBBDfqt54Ti0', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibE1FczZtYnFMV09hZGdCYnBvaUx2ZmhGSDQ3YWxDekJIa2htdTFRNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739371),
('SWXxtpNXWlpUC5LcIacmDDctcLgkAbQYp1VrnDoV', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1BDWDNRSjBhUU13d0pMUzRNUk9odHZISXcyclpwdXNqaUgyQlBTdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742335),
('T5IchM4MTn0CQmUOKCGyDOcPDRpfco5ikq0Y6XIA', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1hWM3RJdUJiREQ0NXFKTUdKQWdtYXlVRU1pWjYyanBlZlhKZ2hjeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739869),
('T5V6LbdzF2ELYjLWSN524m6CD7jYpg77NppYVrXy', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnd1S1FWU2RwcFR6eGZ2WXFKdUV5UXlENkxCcDl5UVBUcW9IcTdWVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW5wcm9kdWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701739037),
('TFS8cilNAFhkR7v8HeUyP0UyjYEvwOyMkxPD1s5h', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMG9Pb3Q2MUNyeU5CY0hrSWNvZXJVcklRdm1XMVd5NlBjdjl4bDdxRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0yOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701742348),
('TntEFySnwZOUlCURikPRXMFE3EnAQg9sFIvP4FRN', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlFSa3dvcTE4SmRLNEFmNk8yRlRUSDV5Mnd4UzBYU2FlQ3lUeUFNNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1701739153),
('tQkjSzSyDTb1Hhv8RUEzrbABbTylLPQ1RiuVxWnU', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXJ6Y29sblEwczZJZWE4dE1FVjg5bnFqYndCbzVkVWxzcXQ3UGZIaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701746544),
('TWmKWF9BJBTWLEVZClvuUn4VHJEKZ0s2sdUvdHxe', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEVGMHNBOXdWeEU5TXY1bXlEdGxZanFKemFRaEx1WVBydng5WTBrYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701746556),
('V3tQZPlN4pSZAv3r8KyM9Xmj2LH5DRPnWjW94chc', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWw2cnc2YUZ4dlE1bXVVM2o5MkpyaDhVNjloQ0ZUeDFmc0NJWkpwbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1701739092),
('VUk2sGnctRykQG3e7sc4sud9FWkZTZXAPTNoAil9', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUml5d0xZV2p3WFdNRUlNSno4NDFMeUtlc3BISzhxcHZhd2YzUFhJQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739092),
('VuR5uR7Zu3YXXfP1HOnXNi9L4hv7LaURe2qyeKUY', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDJEc3dVeHVkY3VGc1NqdVlrTjVxZEZGVmwyWEFUa3BqZU9lanEwQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739154),
('w0bnNpC636y6P8x5BUH9v2VS43Lhw4pIbANvA5Dy', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTXNkZUNvclFyeHZleUxkUWgxMWJSaHlBTGZPcnVsWEdLWmxCN3NaNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701746557),
('WnhqBzgpWq4RGN7DIEh8JoViq0mOxWubnKMM6mIg', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1R4VDlOT1RtR00ySWtxeUp3WXlWdWNUbWxRcWVnelNSWTdpNEdQSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701746544),
('WpMEpK0JPOs8IffFRIf7SZerziEdNGsHMUJCglSY', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGtlQnY3OEg1T1hmU0N3OUdKanFKM0NUdXVMNGw0NEd2Qnk5WDNUbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701742336),
('WSekwUPxte4TB7kjjPgV8k8jCUrdQzir4phoRvOt', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjVkV1Y2cGdxdGhrV2dUWnhvN09CYjVFU0ZuUHZzRnVvRXVmMXBvTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xMz9kZXRhaWxJRD0zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739347),
('xjcgQUZetXdvp4qOVNzYYgfP78yIwPGmPUoYQ2Va', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3drSjhqWGt1eUVtamZzVnNpN0Q1SzlncnY1em1TZWxKQlV4b1FlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701739364),
('xKnMVGWSEzyOmyUajB20gx8nRfoHoSfZyTimhs6b', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGkwQVFSaFdEaGRGOFRoenpXYTRPZVZaeTBBenZxTVljZnhiWnVoZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbC8xND9kZXRhaWxJRD00NCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701739370),
('zl41h6KA3hGKOr5pTwnd9v0HFOTcZJc1s7yzxAVw', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUZNQ0ZVcDdqT1BKVTF5V1IycXJuMjBOWllDRTgwanI4TjJYZHJIQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701746556);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cuong', 'chicuong4142@gmail.com', NULL, '$2y$10$Q9nsb7xilFuC/rvFYHf8mOCIX5FfsvOVZ56Jntgfz/HvqgVSi5JGu', NULL, '2023-10-27 00:31:24', '2023-10-27 00:31:24'),
(2, 'PCC', 'chicuong5152@gmail.com', NULL, '$2y$10$4tfG3qA/8vgxSJbkaWT3mOeO8BeVVNFSI/LO6DJ/l4HswbOyAVI0m', NULL, '2023-11-13 00:57:43', '2023-12-07 23:50:21'),
(4, 'test', 'test@gmail.com', NULL, '$2y$10$cANh/Bjz41aYmLnYxYOs9uHRcn0bkp8QE9GbKXpyfIGlpFRajqGlC', NULL, '2023-12-08 03:20:46', '2023-12-08 03:20:46'),
(5, 'cuong1', 'cuong@gmail.com', NULL, '$2y$10$gKBoBZcAl9qEwyQazFYf0.NjD1IUiJV.25GC65HRLiFI9c4M0rPy6', NULL, '2023-12-08 03:27:58', '2024-01-04 03:54:17'),
(6, 'nht', 'me@nht.com', NULL, '$2y$10$YuUyUgqVj5JhzXx.wFkAXuhF7Aldi3kD7kj.J0H8RjYd7XYnFKBCK', NULL, '2023-12-11 20:56:06', '2023-12-11 20:56:06'),
(7, 'mxh', 'mxh@me.com', NULL, '$2y$10$KSYyPVkqm/dlZPy4rRptO.WSO3SPSYeKlH2mqD3OMfy4.DhZnqgrO', NULL, '2024-01-02 18:18:39', '2024-01-02 18:18:39'),
(8, 'Thai', 'thai@nht.me', NULL, '$2y$10$loCTApXoiFpbZQh5JzI0QerRjUIMvKXvkRJW1cHDvMjNWRHJj2YEK', NULL, '2024-01-03 04:52:13', '2024-01-03 04:52:13'),
(9, 'new', 'new@new.com', NULL, '$2y$10$ClIyVoFCM2adNjCavFUpX.1cqOjagqXw8hoGyVM9048HBn7ku4fdy', NULL, '2024-01-04 03:55:41', '2024-01-04 03:55:41'),
(10, 'tu', 'abc@me.com', NULL, '$2y$10$fGQJ8YFN6TaRh5kuKhzUEOlDQVFrE0qfvUAN3HG6eknf2jXq2UyLO', NULL, '2024-01-04 23:33:34', '2024-01-04 23:33:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userid_cart` (`userId`);

--
-- Chỉ mục cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Chỉ mục cho bảng `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Chỉ mục cho bảng `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Chỉ mục cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `belongs`
--
ALTER TABLE `belongs`
  ADD PRIMARY KEY (`cartID`,`detailID`),
  ADD KEY `FK_detailid` (`detailID`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CUS_ID` (`userId`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId_collection` (`productId`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userId`),
  ADD KEY `FK_address` (`addressID`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_detail_orders` (`detailId`),
  ADD KEY `FK_orderID` (`orderId`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `FK_CATEGORY` (`categoryId`),
  ADD KEY `FK_COLLECTION` (`collectionId`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`productDetailId`),
  ADD KEY `FK_PRODUCTID` (`productId`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1318;

--
-- AUTO_INCREMENT cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `productDetailId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `FK_userid_cart` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `belongs`
--
ALTER TABLE `belongs`
  ADD CONSTRAINT `FK_cartid` FOREIGN KEY (`cartID`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `FK_detailid` FOREIGN KEY (`detailID`) REFERENCES `product_details` (`productDetailId`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `FK_CUS_ID` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `productId_collection` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_address` FOREIGN KEY (`addressID`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_detail_orders` FOREIGN KEY (`detailId`) REFERENCES `product_details` (`productDetailId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orderID` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_CATEGORY` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_COLLECTION` FOREIGN KEY (`collectionId`) REFERENCES `collections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `FK_PRODUCTID` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
