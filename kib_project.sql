-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2020 at 06:27 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kib_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sabbir', 'asdfa', 'admin@gmail.com', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 0, '2020-03-03 03:38:01', '2020-03-03 03:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Gaye Holud', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:04:28', '2020-03-07 03:39:18'),
(2, 'Wedding', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:04:39', '2020-03-07 03:37:50'),
(3, 'Wedding Reception', 'mple, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:04:56', '2020-03-07 03:39:26'),
(4, 'Anniversary', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:05:09', '2020-03-07 03:39:37'),
(5, 'Birthday', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:05:21', '2020-03-07 03:39:48'),
(6, 'Corporate Lunch/Dinner', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:05:34', '2020-03-07 03:40:02'),
(7, 'Seminar', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:05:45', '2020-03-07 03:40:13'),
(8, 'Fair/Product Display', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:05:55', '2020-03-07 03:40:23'),
(9, 'Conference', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:06:07', '2020-03-07 03:40:39'),
(10, 'Training', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:06:18', '2020-03-07 03:40:49'),
(11, 'Others', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 1, NULL, NULL, '2020-02-27 03:06:30', '2020-03-07 03:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_29_045740_create_service_types_table', 1),
(4, '2020_01_29_065708_create_services_table', 1),
(5, '2020_02_04_051647_create_service_configures_table', 1),
(6, '2020_02_05_065146_create_service_bookings_table', 1),
(7, '2020_02_05_083827_create_events_table', 1),
(8, '2020_02_15_095612_create_contacts_table', 1),
(9, '2020_02_15_102924_create_settings_table', 1),
(10, '2020_02_17_070848_create_pages_table', 1),
(11, '2020_02_23_095332_create_payments_table', 1),
(12, '2020_02_25_044025_create_payment_modes_table', 1),
(13, '2020_03_01_101458_create_sliders_table', 2),
(14, '2020_03_15_044345_create_roles_table', 3),
(15, '2020_03_15_050357_create_permissions_table', 4),
(16, '2020_03_15_110425_create_userhas_roles_table', 5),
(17, '2020_03_15_110829_create_user_has_roles_table', 6),
(18, '2020_03_16_043522_create_permission_has_roles_table', 7),
(19, '2020_03_18_085252_create_permissions_table', 8),
(20, '2020_03_18_093151_create_permission_roles_table', 9),
(21, '2020_03_21_091139_create_permissions_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `slug`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'stay at Omni Cancun Resort BookVIP.com $799+pc 9-Day River Cruise | Rhine & Moselle Delights', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 'home', '1582794438.jpg', 1, NULL, NULL, '2020-02-27 03:07:18', '2020-02-27 03:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mahadi@g8ict.com', '$2y$10$FWNR1VW3ibI7R0CObZsktOQUG5rO1cqbuvgdAnBrCPHQQSO.ycUWC', '2020-03-07 23:46:36'),
('mahadi.web.86@gmail.com', '$2y$10$IEVN.VwGnGDdPtKfs54q/eJgxN0W3ImSWE0UVUOizLhU6N3iz6Osm', '2020-03-08 00:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `service_bookings_id` int(11) NOT NULL,
  `total_amount` double DEFAULT NULL,
  `due` double NOT NULL,
  `payment_modes_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `users_id`, `service_bookings_id`, `total_amount`, `due`, `payment_modes_id`, `payment_method`, `payment_date`, `status`, `created_at`, `updated_at`) VALUES
(43, 'KIBC202014', 39, 14, NULL, 2300, NULL, NULL, NULL, 0, '2020-03-06 22:15:04', '2020-03-06 22:15:04'),
(46, 'KIBC202017', 39, 17, NULL, 1725, NULL, NULL, NULL, 0, '2020-03-06 23:30:50', '2020-03-06 23:30:50'),
(47, 'KIBC202019', 39, 19, NULL, 1725, NULL, NULL, NULL, 0, '2020-03-06 23:51:39', '2020-03-06 23:51:39'),
(55, 'KIBC202023', 39, 23, NULL, 230000, NULL, NULL, NULL, 0, '2020-03-08 05:52:23', '2020-03-08 05:52:23'),
(56, 'KIBC202024', 40, 24, NULL, 175950, NULL, NULL, NULL, 0, '2020-03-09 03:03:48', '2020-03-09 03:03:48'),
(57, NULL, 39, 14, 290, 2010, 'Token Money', NULL, '2020-03-09', 0, '2020-03-09 06:26:41', '2020-03-09 06:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`, `descripation`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Token Money', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 0, NULL, NULL),
(2, 'Advance', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 0, NULL, NULL),
(3, 'Full Payment', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 0, NULL, NULL),
(4, 'Complementary', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 0, NULL, NULL),
(5, 'VIP', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Event-create', 'event', '2020-03-21 03:49:56', '2020-03-21 03:56:11'),
(3, 'Event-update', 'event', '2020-03-21 04:05:23', '2020-03-21 04:05:23'),
(4, 'Event-delete', 'event', '2020-03-21 04:05:52', '2020-03-21 04:05:52'),
(5, 'Event-list', 'event', '2020-03-21 05:52:28', '2020-03-21 05:52:28'),
(6, 'Service-create', 'service', '2020-03-21 05:53:53', '2020-03-21 05:53:53'),
(7, 'Service-update', 'service', '2020-03-21 06:28:17', '2020-03-21 06:28:17'),
(8, 'Service-delete', 'service', '2020-03-21 06:28:49', '2020-03-21 06:28:49'),
(9, 'Service-list', 'service', '2020-03-21 06:29:09', '2020-03-21 06:29:09'),
(10, 'User-create', 'user', '2020-03-21 06:29:25', '2020-03-21 06:29:25'),
(11, 'User-update', 'user', '2020-03-21 06:30:25', '2020-03-21 06:30:25'),
(12, 'User-delete', 'user', '2020-03-21 06:31:04', '2020-03-21 06:31:04'),
(13, 'User-list', 'user', '2020-03-21 06:31:25', '2020-03-21 06:31:25'),
(14, 'Serviceconfigure-create', 'serviceconfigure', '2020-03-21 06:31:43', '2020-03-21 06:31:43'),
(15, 'Serviceconfigure-update', 'serviceconfigure', '2020-03-21 06:32:02', '2020-03-21 06:32:02'),
(16, 'Serviceconfigure-delete', 'serviceconfigure', '2020-03-21 06:32:30', '2020-03-21 06:32:30'),
(17, 'Serviceconfigure-list', 'serviceconfigure', '2020-03-21 06:35:00', '2020-03-21 06:35:00'),
(18, 'Slider-create', 'slider', '2020-03-21 06:35:20', '2020-03-21 06:35:20'),
(19, 'Slider-update', 'slider', '2020-03-21 08:07:25', '2020-03-21 08:07:25'),
(20, 'Slider-delete', 'slider', '2020-03-21 08:08:29', '2020-03-21 08:08:29'),
(21, 'Slider-list', 'slider', '2020-03-21 08:10:05', '2020-03-21 08:10:05'),
(22, 'Servicebooking-update', 'servicebooking', '2020-03-21 10:40:25', '2020-03-21 10:40:25'),
(23, 'Servicebooking-delete', 'servicebooking', '2020-03-21 10:40:56', '2020-03-21 10:40:56'),
(24, 'Servicebooking-list', 'servicebooking', '2020-03-21 10:41:18', '2020-03-21 10:41:18'),
(25, 'Servicetype-create', 'servicetype', '2020-03-21 10:41:35', '2020-03-21 10:41:35'),
(26, 'Servicetype-update', 'servicetype', '2020-03-21 10:42:16', '2020-03-21 10:42:16'),
(27, 'Servicetype-delete', 'servicetype', '2020-03-21 10:42:33', '2020-03-21 10:42:33'),
(28, 'Servicetype-list', 'servicetype', '2020-03-21 10:42:52', '2020-03-21 10:42:52'),
(29, 'Payment-list', 'payment', '2020-03-21 10:43:20', '2020-03-21 10:43:20'),
(30, 'Event-menu', 'event', '2020-03-21 11:46:14', '2020-03-21 11:46:14'),
(31, 'Service-menu', 'service', '2020-03-21 11:47:39', '2020-03-21 11:47:39'),
(32, 'Servicetype-menu', 'servicetype', '2020-03-21 11:48:55', '2020-03-21 11:48:55'),
(33, 'Serviceconfigure-menu', 'serviceconfigure', '2020-03-21 11:49:11', '2020-03-21 11:49:11'),
(34, 'servicebooking-menu', 'servicebooking', '2020-03-21 11:49:33', '2020-03-21 11:49:33'),
(35, 'slider-menu', 'slider', '2020-03-21 11:49:45', '2020-03-21 11:49:45'),
(36, 'User-menu', 'user', '2020-03-21 11:49:57', '2020-03-21 11:49:57'),
(37, 'Payment-menu', 'payment', '2020-03-21 11:50:20', '2020-03-21 11:50:20'),
(38, 'Role-create', 'role', '2020-03-21 23:03:49', '2020-03-21 23:03:49'),
(39, 'Role-update', 'role', '2020-03-21 23:04:39', '2020-03-21 23:04:39'),
(40, 'Role-delete', 'role', '2020-03-21 23:04:50', '2020-03-21 23:04:50'),
(41, 'Role-list', 'role', '2020-03-21 23:05:04', '2020-03-21 23:05:04'),
(42, 'Role-menu', 'role', '2020-03-21 23:05:17', '2020-03-21 23:05:17'),
(43, 'Permission-create', 'permission', '2020-03-21 23:06:36', '2020-03-21 23:06:36'),
(44, 'Permission-update', 'permission', '2020-03-21 23:06:48', '2020-03-21 23:06:48'),
(45, 'Permission-delete', 'permission', '2020-03-21 23:07:01', '2020-03-21 23:07:01'),
(46, 'Permission-list', 'permission', '2020-03-21 23:07:14', '2020-03-21 23:07:14'),
(47, 'Permission-menu', 'permission', '2020-03-21 23:07:28', '2020-03-21 23:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(14, 4),
(14, 2),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 25),
(14, 26),
(14, 11),
(14, 12),
(14, 13),
(14, 14),
(14, 15),
(14, 17),
(14, 23),
(14, 24),
(14, 29),
(14, 18),
(14, 19),
(14, 20),
(14, 21),
(15, 3),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(15, 5),
(15, 2),
(15, 30),
(15, 21),
(15, 35),
(15, 9),
(15, 31),
(14, 30),
(14, 31),
(14, 36),
(14, 34),
(14, 37),
(14, 35),
(14, 28),
(14, 32),
(14, 27),
(14, 33),
(14, 16),
(14, 10),
(14, 22),
(14, 38),
(14, 39),
(14, 40),
(14, 41),
(14, 42),
(14, 47),
(14, 43),
(14, 46),
(14, 44),
(14, 45),
(14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'Admin', '2020-03-18 05:25:04', '2020-03-18 05:25:04'),
(15, 'Editor', '2020-03-18 05:25:34', '2020-03-18 05:25:34'),
(20, 'Author', '2020-03-21 11:40:57', '2020-03-21 11:40:57'),
(21, 'writher', '2020-03-21 21:54:16', '2020-03-21 21:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_types_id` tinyint(4) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` tinyint(4) DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_condition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_types_id`, `name`, `room`, `image`, `price`, `capacity`, `description`, `terms_condition`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Suite Room', 4, '1582786877.jpg', 3500, 50, '<p>You can specify how many words should be generated right next</p>\r\n\r\n<p>to the word &quot;lorem&quot;. For example, lorem5 will generate a</p>\r\n\r\n<p>5-words dummy text.</p>', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 01:01:17', '2020-02-27 01:01:40'),
(2, 1, 'High Deluxe Room', 6, '1582786952.jpg', 2000, 5, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:02:32', '2020-02-27 01:02:32'),
(3, 1, 'Double Bedded Room', 9, '1582786996.jpg', 2000, 5, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:03:16', '2020-02-27 01:03:16'),
(4, 1, 'Triple Bedded Room', 7, '1582787035.jpg', 2000, 5, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 01:03:55', '2020-02-29 01:56:32'),
(5, 2, 'Convention Hall -1', NULL, '1582787106.jpg', 75000, 900, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:05:06', '2020-02-27 01:05:06'),
(6, 2, 'Convention Hall -2', NULL, '1582787177.jpg', 115000, 1000, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:06:17', '2020-02-27 01:06:17'),
(7, 3, 'Training Room -1', NULL, '1582787266.jpg', 10000, 60, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 01:07:46', '2020-02-27 01:08:32'),
(8, 3, 'Training Room -2', NULL, '1582787356.jpg', 7500, 48, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:09:16', '2020-02-27 01:09:16'),
(9, 3, 'Training Room -3', NULL, '1582787406.jpg', 7500, 32, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:10:07', '2020-02-27 01:10:07'),
(10, 3, 'Training Rooms -4', NULL, '1582787477.jpg', 7500, 50, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:11:17', '2020-02-27 01:11:17'),
(11, 4, 'Auditorium', NULL, '1582787533.jpg', 150000, 975, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:12:13', '2020-02-27 01:12:13'),
(12, 5, '3D Seminar Hall', NULL, '1582787595.jpg', 20000, 260, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 01:13:15', '2020-02-29 04:46:43'),
(13, 6, 'Open Field', NULL, '1605358711slide1.jpg', 200000, 1000, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 01:14:11', '2020-03-09 00:05:15'),
(14, 7, 'Ground Floor Lobby', NULL, '1582787725.jpg', 25000, 500, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:15:26', '2020-02-27 01:15:26'),
(15, 8, 'Mukto Moncho', NULL, '1582787819.jpg', 20000, 500, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, NULL, '2020-02-27 01:16:59', '2020-02-27 01:16:59'),
(16, 9, 'Car Parking', NULL, '8741558171580989112.jpg', 60, 1, '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', '<p>You can specify how many words should be generated</p>\r\n\r\n<p>right next to the word &quot;lorem&quot;. For example,</p>\r\n\r\n<p>lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 01:17:40', '2020-03-03 03:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `service_bookings`
--

CREATE TABLE `service_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` tinyint(4) NOT NULL,
  `service_types_id` tinyint(4) NOT NULL,
  `services_id` tinyint(4) NOT NULL,
  `service_configures_id` tinyint(4) NOT NULL,
  `events_id` tinyint(4) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `room` tinyint(4) DEFAULT NULL,
  `kib_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_number` int(11) NOT NULL,
  `service_cost` double NOT NULL,
  `service_tax` double NOT NULL,
  `car_parking` double DEFAULT NULL,
  `car_tax` double DEFAULT '0',
  `discount` double DEFAULT '0',
  `total_cost` double NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `reminder` tinyint(4) NOT NULL DEFAULT '0',
  `after` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_bookings`
--

INSERT INTO `service_bookings` (`id`, `users_id`, `service_types_id`, `services_id`, `service_configures_id`, `events_id`, `from_date`, `to_date`, `room`, `kib_number`, `guest_number`, `service_cost`, `service_tax`, `car_parking`, `car_tax`, `discount`, `total_cost`, `notes`, `status`, `created_by`, `updated_by`, `reminder`, `after`, `created_at`, `updated_at`) VALUES
(14, 39, 1, 2, 2, 7, '2020-03-21', '2020-03-23', 4, NULL, 200, 2000, 300, 0, 0, 0, 2300, 'test', 1, NULL, NULL, 0, 2, '2020-03-08', '2020-03-14 01:50:41'),
(17, 39, 1, 1, 1, 7, '2020-03-21', '2020-03-24', 3, '8979', 90, 1500, 225, 0, 0, 2000, 1725, NULL, 2, NULL, 39, 0, 0, '2020-03-08', '2020-03-09 03:09:27'),
(19, 40, 1, 1, 1, 8, '2020-03-21', '2020-03-22', 1, '8979', 40, 1500, 225, 0, 0, 2000, 1725, NULL, 2, NULL, NULL, 0, 0, '2020-03-05', '2020-03-09 04:21:29'),
(23, 40, 6, 13, 15, 6, '2020-03-23', '2020-03-25', NULL, NULL, 45, 200000, 30000, 0, 0, 0, 230000, NULL, 2, NULL, NULL, 1, 0, '2020-03-06', '2020-03-14 01:50:54'),
(24, 40, 4, 11, 13, 4, '2020-03-23', '2020-03-25', NULL, NULL, 450, 150000, 22500, 3000, 450, 0, 175950, NULL, 2, NULL, NULL, 1, 0, '2020-03-09', '2020-03-14 01:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_configures`
--

CREATE TABLE `service_configures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_types_id` tinyint(4) NOT NULL,
  `services_id` tinyint(4) NOT NULL,
  `check_in` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_out` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_configures`
--

INSERT INTO `service_configures` (`id`, `service_types_id`, `services_id`, `check_in`, `check_out`, `duration`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2:00 PM', '12:00 PM', 10, 1, 2, 2, '2020-02-27 01:20:20', '2020-02-27 01:23:12'),
(2, 1, 2, '2:00 PM', '12:00 PM', 10, 1, 2, NULL, '2020-02-27 01:23:48', '2020-02-27 01:23:48'),
(3, 1, 3, '2:00 PM', '12:00 PM', 10, 1, 2, NULL, '2020-02-27 01:24:26', '2020-02-27 01:24:26'),
(4, 1, 4, '2:00 PM', '12:00 PM', 10, 1, 2, NULL, '2020-02-27 01:24:57', '2020-02-27 01:24:57'),
(5, 2, 5, '10:00 AM', '4:00 PM', 6, 1, 2, NULL, '2020-02-27 01:25:42', '2020-02-27 01:25:42'),
(6, 2, 5, '6:00 PM', '11:00 PM', 5, 1, 2, NULL, '2020-02-27 01:26:23', '2020-02-27 01:26:23'),
(7, 2, 6, '10:00 AM', '4:00 PM', 6, 1, 2, NULL, '2020-02-27 01:26:53', '2020-02-27 01:26:53'),
(8, 2, 6, '6:00 PM', '11:00 PM', 5, 1, 2, NULL, '2020-02-27 01:27:17', '2020-02-27 01:27:17'),
(9, 3, 7, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:28:18', '2020-02-27 01:28:18'),
(10, 3, 8, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:29:10', '2020-02-27 01:29:10'),
(11, 3, 9, '9:00 AM', '9:00 PM', 12, 1, 2, 2, '2020-02-27 01:30:13', '2020-02-27 01:31:26'),
(12, 3, 10, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:30:53', '2020-02-27 01:30:53'),
(13, 4, 11, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:32:09', '2020-02-27 01:32:09'),
(14, 5, 12, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:32:44', '2020-02-27 01:32:44'),
(15, 6, 13, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:33:12', '2020-02-27 01:33:12'),
(16, 7, 14, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:33:48', '2020-02-27 01:33:48'),
(17, 8, 15, '9:00 AM', '9:00 PM', 12, 1, 2, NULL, '2020-02-27 01:34:42', '2020-02-27 01:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `name`, `image`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dormitory', '6504414451582198079.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 41, '2020-02-27 00:57:36', '2020-03-14 04:46:58'),
(2, 'Convention Halls', '19206238671580989467.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:57:50', '2020-03-01 23:13:53'),
(3, 'Training Rooms', '12597750161580989316.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:58:03', '2020-03-01 23:13:42'),
(4, 'Auditorium', '11929902751580988851.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:58:19', '2020-03-01 23:09:11'),
(5, '3D Seminar Hall', '19161093211582198052.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:58:33', '2020-03-01 22:52:34'),
(6, 'Open Field', '1839639509slide2.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:58:43', '2020-03-08 22:18:06'),
(7, 'Ground Floor Lobby', '13135076291580989149.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:59:00', '2020-03-01 23:08:49'),
(8, 'Mukto Moncho', '2306952101580988851.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:59:10', '2020-03-01 23:08:40'),
(9, 'Car Parking', '7078550211582198096.jpg', '<p>You can specify how many words should be generated right next to the word &quot;lorem&quot;. For example, lorem5 will generate a 5-words dummy text.</p>', 1, 2, 2, '2020-02-27 00:59:21', '2020-03-01 23:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_slowgaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_map` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `logo`, `site_slowgaan`, `admin_email`, `phone`, `contact_map`, `address`, `copyright`, `meta_type`, `created_at`, `updated_at`) VALUES
(1, 'krishibid institute bangladesh', '1582791102.png', 'Your Ict Solution Partner', 'mahadi.web.86@gmail.com', '++8801302245408', 'https://maps.google.com/maps?q=Krishibid%20Institution%20Bangladesh&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near', '<h2><strong>কেআইবি অফিস:</strong></h2>\r\n\r\n<h2><strong>Kbd. Md. Khairul Alam(Prince)</strong></h2>\r\n\r\n<h3>Secretary General<br />\r\nKrishibid Institution Bangladesh</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Kbd. M M Mizanur Rahman</strong></h2>\r\n\r\n<h3>Office General<br />\r\nKrishibid Institution Bangladesh</h3>', 'Copyright © 2020 Krishibid Institution Bangladesh (KIB). Design, Development & Supported by:', NULL, NULL, '2020-03-08 22:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 'stay at Omni Cancun Resort BookVIP.com $799+pc 9-Day River Cruise | Rhine & Moselle Delights', '7900332911582198079.jpg', NULL, 1, NULL, NULL, '2020-03-07 03:05:17', '2020-03-07 03:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kib_number` int(11) DEFAULT NULL,
  `user_role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `kib_number`, `user_role`, `email_verified_at`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(39, 'Mahadi', 'mahadi.web.86@gmail.com', '01625509628', 8979, '14', NULL, 0, '$2y$10$uEdAGVqmYhP3.aJf6IUAN.oS/wQYKlmjrgfhVcoECQYXvVC.AEEsK', 'khrVu0V5wH05HBVxbVVmTiwu15zAa3GnrK1rJ3ASHAJfZ4yGAJyXmrKfxah5', '2020-03-06 22:12:19', '2020-03-16 04:53:00'),
(40, 'sabbir', 'mahadi@g8ict.com', '01625509628', NULL, '15', NULL, 1, '$2y$10$jzSb5h037ggtCQbvo/XQYuCwoGvmr7h5NMvyW5E1KMxnqVLtaYDhq', NULL, '2020-03-07 03:30:31', '2020-03-09 06:17:34'),
(41, 'admin', 'admin@g8ict.com', '0898587', 523452, '14', NULL, 0, '$2y$10$DYwPU6Hh.52HblU6VUx6HuU8m9jzfT7qmvm1g/RANpOgiLy3M4k1K', NULL, NULL, '2020-03-09 06:19:32'),
(54, 'rayhan', 'rayhan@gmail.com', '7467485', NULL, '14', NULL, 1, '$2y$10$tG.ZZc/1vwm..wbnf/HaX.KwnuNJESR7OQTV7qotD715tgvl4FREu', NULL, '2020-03-15 23:32:55', '2020-03-21 03:10:13'),
(55, 'Nusrat', 'nusrat@g8ict.com', '92582', NULL, '20', NULL, 1, '$2y$10$nbjmTpJ4ivtgW.ggkALD/.H5bUBobMdIo1w23poCvosmM7F0pxHNm', NULL, '2020-03-22 00:11:41', '2020-03-22 00:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 41, 14),
(2, 40, 15),
(3, 55, 20),
(4, 39, 15),
(5, 54, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_booking_id_unique` (`booking_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_bookings`
--
ALTER TABLE `service_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_configures`
--
ALTER TABLE `service_configures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `service_bookings`
--
ALTER TABLE `service_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_configures`
--
ALTER TABLE `service_configures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
