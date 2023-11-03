-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2023 at 12:32 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team14`
--

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

DROP TABLE IF EXISTS `icons`;
CREATE TABLE IF NOT EXISTS `icons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'fas fa-address-book', 1, NULL, NULL, NULL, '2023-05-18 08:31:44', '2023-05-21 07:32:24'),
(3, 'far fa-circle', 1, NULL, NULL, NULL, '2023-05-18 08:34:11', '2023-05-18 08:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int DEFAULT NULL,
  `route` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `icon_id` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent`, `route`, `sort`, `icon_id`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Profile', 5, 'profile-management.show', 3, NULL, 1, NULL, NULL, NULL, '2023-05-14 04:07:11', '2023-05-14 04:07:11'),
(5, 'Profile Management', 0, 'profile-management', 1, NULL, 1, NULL, NULL, NULL, '2023-05-14 02:47:10', '2023-05-14 04:28:43'),
(7, 'Change Info', 5, 'profile-management.edit', 4, NULL, 1, NULL, NULL, NULL, '2023-05-14 04:37:23', '2023-05-14 04:37:23'),
(8, 'Change Password', 5, 'profile-management.password.change', 5, NULL, 1, NULL, NULL, NULL, '2023-05-14 04:39:17', '2023-06-04 01:41:47'),
(9, 'Menu Management', 0, 'menu-management', 2, NULL, 1, NULL, NULL, NULL, '2023-05-14 04:41:32', '2023-05-14 04:41:32'),
(10, 'Menu View', 9, 'menu-management.view', 3, NULL, 1, NULL, NULL, NULL, '2023-05-14 04:42:25', '2023-06-17 02:22:46'),
(11, 'Menu Add', 9, 'menu-management.add', 2, NULL, 1, NULL, NULL, NULL, '2023-05-14 04:43:16', '2023-10-29 04:25:06'),
(12, 'Front Menu', 0, 'frontend-menu', 5, 2, 1, NULL, NULL, '2023-10-27 20:11:52', '2023-05-16 07:36:01', '2023-10-28 00:11:52'),
(13, 'Icon View', 9, 'menu-management.icon.view', 1, NULL, 1, NULL, NULL, NULL, '2023-05-17 02:24:30', '2023-05-18 07:43:04'),
(24, 'Dashboard', NULL, 'dashboard', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(25, 'Menu Permission', 9, 'menu-management.permission.add', 3, NULL, 1, NULL, NULL, NULL, '2023-10-27 00:26:11', '2023-10-27 00:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permissions`
--

DROP TABLE IF EXISTS `menu_permissions`;
CREATE TABLE IF NOT EXISTS `menu_permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_permissions`
--

INSERT INTO `menu_permissions` (`id`, `menu_id`, `role_id`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, NULL, NULL, NULL, NULL, NULL),
(9, 6, 1, 1, NULL, NULL, NULL, '2023-10-26 22:27:32', '2023-10-26 22:27:32'),
(3, 9, 1, 1, NULL, NULL, NULL, NULL, NULL),
(12, 10, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:32', '2023-10-26 22:28:32'),
(5, 5, 2, 1, NULL, NULL, NULL, '2023-10-26 22:24:43', '2023-10-26 22:24:43'),
(39, 6, 2, 1, NULL, NULL, NULL, '2023-10-28 00:24:42', '2023-10-28 00:24:42'),
(40, 7, 2, 1, NULL, NULL, NULL, '2023-10-28 00:24:42', '2023-10-28 00:24:42'),
(41, 8, 2, 1, NULL, NULL, NULL, '2023-10-28 00:24:42', '2023-10-28 00:24:42'),
(10, 7, 1, 1, NULL, NULL, NULL, '2023-10-26 22:27:32', '2023-10-26 22:27:32'),
(11, 8, 1, 1, NULL, NULL, NULL, '2023-10-26 22:27:32', '2023-10-26 22:27:32'),
(13, 13, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:32', '2023-10-26 22:28:32'),
(14, 27, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:32', '2023-10-26 22:28:32'),
(15, 12, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:42', '2023-10-26 22:28:42'),
(16, 14, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:42', '2023-10-26 22:28:42'),
(17, 15, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:42', '2023-10-26 22:28:42'),
(18, 17, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:42', '2023-10-26 22:28:42'),
(19, 18, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:59', '2023-10-26 22:28:59'),
(20, 20, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:59', '2023-10-26 22:28:59'),
(21, 21, 1, 1, NULL, NULL, NULL, '2023-10-26 22:28:59', '2023-10-26 22:28:59'),
(22, 9, 2, 1, NULL, NULL, NULL, '2023-10-27 00:16:46', '2023-10-27 00:16:46'),
(59, 10, 2, 1, NULL, NULL, NULL, '2023-10-28 00:51:45', '2023-10-28 00:51:45'),
(60, 13, 2, 1, NULL, NULL, NULL, '2023-10-28 00:51:45', '2023-10-28 00:51:45'),
(32, 26, 2, 1, NULL, NULL, NULL, '2023-10-27 00:49:54', '2023-10-27 00:49:54'),
(33, 27, 2, 1, NULL, NULL, NULL, '2023-10-27 00:49:54', '2023-10-27 00:49:54'),
(61, 25, 2, 1, NULL, NULL, NULL, '2023-10-28 00:51:45', '2023-10-28 00:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2023_04_09_061335_create_flights_table', 1),
(27, '2023_04_09_065714_create_students_table', 1),
(28, '2023_05_02_092732_create_menus_table', 2),
(29, '2023_05_17_082854_create_icons_table', 3),
(38, '2023_06_04_111635_create_post_menus_table', 4),
(39, '2023_06_04_113114_create_front_menu_urls_table', 4),
(40, '2023_06_08_103104_create_front_menus_table', 4),
(41, '2023_06_19_112310_create_contacts_table', 4),
(42, '2023_06_25_080525_create_contact_messages_table', 4),
(43, '2023_06_27_075019_create_testimonials_table', 5),
(44, '2023_06_27_100409_create_customers_table', 6),
(45, '2023_07_11_114636_create_roles_table', 7),
(46, '2023_07_19_081632_create_user_roles_table', 7),
(47, '2023_07_19_110108_create_menu_permissions_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `functionality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `functionality`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Member', NULL, 1, NULL, NULL, NULL, '2023-10-26 22:20:24', '2023-10-26 22:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `deleted_at`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$QFEgFpkXejAGBHEc/S0sHexErmRnogBq0f6oMQzK3XTDQJ55u/6KS', '2023-04-30 08:50:31', '20230705_1688553602.png', NULL, NULL, '2023-07-05 04:40:03'),
(2, 'Redwan', 'Redwan', 'redwan@gmail.com', NULL, '$2a$12$kj4VMePPSvWT1zdFmb8FQ.I9gflgKuFx662IUAXMksoyjA4doeMh6', '2023-04-30 08:50:31', '20231026_1698352376.png', NULL, NULL, '2023-10-28 00:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, 1, NULL, NULL, NULL, NULL, '2023-10-26 22:37:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
