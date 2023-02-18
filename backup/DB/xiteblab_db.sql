-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 08:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiteblab_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Smart Phones', '1676697316-category-cover-Smart Phones.jpg', 1, '2023-02-16 10:34:39', '2023-02-17 23:45:16'),
(2, 'Computer Accessories', '1676697240-category-cover-Computer Accessories.jpeg', 1, '2023-02-17 05:00:36', '2023-02-17 23:44:00'),
(3, 'Kitchen Appliances', '1676697078-category-cover-Kitchen Appliances.jpg', 1, '2023-02-17 23:41:18', '2023-02-17 23:41:18'),
(4, 'Furnitures', '1676697682-category-cover-Furnitures.jpg', 1, '2023-02-17 23:51:22', '2023-02-17 23:51:22'),
(5, 'Fitness', '1676697803-category-cover-Fitness.jpg', 1, '2023-02-17 23:53:23', '2023-02-17 23:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_02_16_105439_create_permission_tables', 1),
(5, '2023_02_16_110905_create_categories_table', 2),
(6, '2023_02_16_110920_create_subcategories_table', 2),
(7, '2023_02_16_110933_create_products_table', 2),
(8, '2023_02_17_030547_create_product_images_table', 3),
(9, '2023_02_17_122848_create_notifications_table', 4),
(10, '2023_02_18_064016_change_price_data_type_in_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'category.create', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(2, 'category.edit', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(3, 'category.list', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(4, 'subcategory.create', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(5, 'subcategory.edit', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(6, 'subcategory.list', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(7, 'product.create', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(8, 'product.edit', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(9, 'product.delete', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06'),
(10, 'product.list', 'web', '2023-02-17 21:04:06', '2023-02-17 21:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'IPhone 14 Pro MAX', 'IPhone 14 Pro MAX is now available for you in every color.', 530000, '2023-02-16 22:29:07', '2023-02-18 00:22:25'),
(3, 2, 'Nokia 3.4', 'Nokia 3.4 is now available to Purchase.', 34000, '2023-02-17 05:01:53', '2023-02-18 00:37:07'),
(4, 3, 'Samsung S22 - ULTRA', 'Samsung S22 - ULTRA is now available in store.', 333900, '2023-02-18 00:41:20', '2023-02-18 00:41:20'),
(5, 4, 'Huawei - NOVA 10 Pro', 'Huawei - NOVA 10 Pro is now available in store.', 120750, '2023-02-18 00:46:18', '2023-02-18 00:46:18'),
(6, 5, 'OPPO - F19 Pro', 'OPPO - F19 Pro is now available in store.', 169000, '2023-02-18 00:50:50', '2023-02-18 00:50:50'),
(7, 6, 'MSI - STEALTH 15M', 'MSI - STEALTH 15M is now available in store.', 629990, '2023-02-18 00:56:36', '2023-02-18 00:56:36'),
(8, 7, 'Dell - Alienware Core 19', 'Dell - Alienware Core 19 is now available at store.', 1225000, '2023-02-18 01:12:31', '2023-02-18 01:12:31'),
(9, 8, 'Abans Refrigirator', 'Abans Refrigirator is now available.', 151990, '2023-02-18 01:16:47', '2023-02-18 01:16:47'),
(10, 9, 'Hawai Sofa Set', 'Hawai Sofa Set is now available on store.', 86900, '2023-02-18 01:20:27', '2023-02-18 01:20:27'),
(11, 10, 'Treadmil BT-63-85', 'Treadmil BT-63-85 is now available on store.', 299000, '2023-02-18 01:23:44', '2023-02-18 01:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 2, '16766102772-product-1-.jpg', '2023-02-16 23:34:37', '2023-02-16 23:34:37'),
(7, 2, '16766102772-product-2-.jpg', '2023-02-16 23:34:37', '2023-02-16 23:34:37'),
(8, 2, '16766102772-product-3-.jpg', '2023-02-16 23:34:37', '2023-02-16 23:34:37'),
(12, 2, '16766159492-product-1-.jpg', '2023-02-17 01:09:09', '2023-02-17 01:09:09'),
(13, 2, '16766159492-product-2-.png', '2023-02-17 01:09:09', '2023-02-17 01:09:09'),
(38, 1, '16767002111-product-1-.jpg', '2023-02-18 00:33:31', '2023-02-18 00:33:31'),
(39, 1, '16767002111-product-2-.jpg', '2023-02-18 00:33:31', '2023-02-18 00:33:31'),
(40, 1, '16767002111-product-3-.jpg', '2023-02-18 00:33:31', '2023-02-18 00:33:31'),
(41, 1, '16767002111-product-4-.png', '2023-02-18 00:33:31', '2023-02-18 00:33:31'),
(42, 1, '16767002111-product-5-.jpg', '2023-02-18 00:33:31', '2023-02-18 00:33:31'),
(43, 3, '16767004273-product-1-.jpg', '2023-02-18 00:37:07', '2023-02-18 00:37:07'),
(44, 3, '16767004273-product-2-.png', '2023-02-18 00:37:07', '2023-02-18 00:37:07'),
(45, 3, '16767004273-product-3-.jpg', '2023-02-18 00:37:07', '2023-02-18 00:37:07'),
(46, 3, '16767004273-product-4-.jpg', '2023-02-18 00:37:07', '2023-02-18 00:37:07'),
(47, 3, '16767004273-product-5-.jpg', '2023-02-18 00:37:07', '2023-02-18 00:37:07'),
(48, 4, '16767006804-product-1-.jpg', '2023-02-18 00:41:20', '2023-02-18 00:41:20'),
(49, 4, '16767006804-product-2-.jpg', '2023-02-18 00:41:20', '2023-02-18 00:41:20'),
(50, 4, '16767006804-product-3-.jpg', '2023-02-18 00:41:20', '2023-02-18 00:41:20'),
(51, 4, '16767006804-product-4-.jpg', '2023-02-18 00:41:20', '2023-02-18 00:41:20'),
(52, 4, '16767006804-product-5-.jpg', '2023-02-18 00:41:20', '2023-02-18 00:41:20'),
(53, 5, '16767009785-product-1-.jpg', '2023-02-18 00:46:18', '2023-02-18 00:46:18'),
(54, 5, '16767009785-product-2-.jpg', '2023-02-18 00:46:18', '2023-02-18 00:46:18'),
(55, 5, '16767009785-product-3-.jpg', '2023-02-18 00:46:18', '2023-02-18 00:46:18'),
(56, 5, '16767009785-product-4-.jpg', '2023-02-18 00:46:18', '2023-02-18 00:46:18'),
(57, 5, '16767009785-product-5-.jpg', '2023-02-18 00:46:18', '2023-02-18 00:46:18'),
(58, 6, '16767012506-product-1-.jpg', '2023-02-18 00:50:50', '2023-02-18 00:50:50'),
(59, 6, '16767012506-product-2-.jpg', '2023-02-18 00:50:50', '2023-02-18 00:50:50'),
(60, 6, '16767012506-product-3-.jpg', '2023-02-18 00:50:50', '2023-02-18 00:50:50'),
(61, 6, '16767012506-product-4-.jpg', '2023-02-18 00:50:50', '2023-02-18 00:50:50'),
(62, 6, '16767012506-product-5-.jpg', '2023-02-18 00:50:50', '2023-02-18 00:50:50'),
(63, 7, '16767015967-product-1-.jpg', '2023-02-18 00:56:36', '2023-02-18 00:56:36'),
(64, 7, '16767015967-product-2-.jpg', '2023-02-18 00:56:36', '2023-02-18 00:56:36'),
(65, 7, '16767015967-product-3-.jpg', '2023-02-18 00:56:36', '2023-02-18 00:56:36'),
(66, 7, '16767015967-product-4-.jpg', '2023-02-18 00:56:36', '2023-02-18 00:56:36'),
(67, 7, '16767015967-product-5-.jpg', '2023-02-18 00:56:36', '2023-02-18 00:56:36'),
(68, 8, '16767025518-product-1-.jpg', '2023-02-18 01:12:31', '2023-02-18 01:12:31'),
(69, 8, '16767025518-product-2-.jpg', '2023-02-18 01:12:31', '2023-02-18 01:12:31'),
(70, 8, '16767025518-product-3-.jpg', '2023-02-18 01:12:31', '2023-02-18 01:12:31'),
(71, 8, '16767025518-product-4-.png', '2023-02-18 01:12:31', '2023-02-18 01:12:31'),
(72, 8, '16767025518-product-5-.jpg', '2023-02-18 01:12:31', '2023-02-18 01:12:31'),
(73, 9, '16767028079-product-1-.jpg', '2023-02-18 01:16:47', '2023-02-18 01:16:47'),
(74, 9, '16767028079-product-2-.jpg', '2023-02-18 01:16:47', '2023-02-18 01:16:47'),
(75, 9, '16767028079-product-3-.jpg', '2023-02-18 01:16:47', '2023-02-18 01:16:47'),
(76, 9, '16767028079-product-4-.jpg', '2023-02-18 01:16:47', '2023-02-18 01:16:47'),
(77, 9, '16767028079-product-5-.jpg', '2023-02-18 01:16:47', '2023-02-18 01:16:47'),
(78, 10, '167670302710-product-1-.jpg', '2023-02-18 01:20:27', '2023-02-18 01:20:27'),
(79, 10, '167670302710-product-2-.jpg', '2023-02-18 01:20:27', '2023-02-18 01:20:27'),
(80, 10, '167670302710-product-3-.jpg', '2023-02-18 01:20:27', '2023-02-18 01:20:27'),
(81, 10, '167670302710-product-4-.jpg', '2023-02-18 01:20:27', '2023-02-18 01:20:27'),
(82, 10, '167670302710-product-5-.jpg', '2023-02-18 01:20:27', '2023-02-18 01:20:27'),
(83, 11, '167670322411-product-1-.jpg', '2023-02-18 01:23:44', '2023-02-18 01:23:44'),
(84, 11, '167670322411-product-2-.jpg', '2023-02-18 01:23:44', '2023-02-18 01:23:44'),
(85, 11, '167670322411-product-3-.jpg', '2023-02-18 01:23:44', '2023-02-18 01:23:44'),
(86, 11, '167670322411-product-4-.jpeg', '2023-02-18 01:23:44', '2023-02-18 01:23:44'),
(87, 11, '167670322411-product-5-.jpg', '2023-02-18 01:23:44', '2023-02-18 01:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'staff_member', 'web', '2023-02-16 06:29:18', '2023-02-16 06:29:18'),
(2, 'user', 'web', '2023-02-16 06:29:18', '2023-02-16 06:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apple', '1676698071-subcategory-cover-Apple.jpg', 1, '2023-02-16 11:33:43', '2023-02-17 23:57:51'),
(2, 1, 'Nokia', '1676698178-subcategory-cover-Nokia.jpg', 1, '2023-02-16 11:36:04', '2023-02-17 23:59:51'),
(3, 1, 'Samsung', '1676698310-subcategory-cover-Samsung.png', 1, '2023-02-18 00:01:09', '2023-02-18 00:01:50'),
(4, 1, 'Huawei', '1676698470-subcategory-cover-Huawei.png', 1, '2023-02-18 00:02:42', '2023-02-18 00:04:30'),
(5, 1, 'Oppo', '1676698533-subcategory-cover-Oppo.jpg', 1, '2023-02-18 00:05:33', '2023-02-18 00:05:33'),
(6, 2, 'MSI', '1676698643-subcategory-cover-MSI.jpg', 1, '2023-02-18 00:07:23', '2023-02-18 00:07:23'),
(7, 2, 'Dell', '1676698719-subcategory-cover-Dell.jpg', 1, '2023-02-18 00:08:39', '2023-02-18 00:08:39'),
(8, 3, 'Refrigirator', '1676698893-subcategory-cover-Refrigirator.jpg', 1, '2023-02-18 00:11:33', '2023-02-18 00:11:33'),
(9, 4, 'Tables with Chairs', '1676698973-subcategory-cover-Tables with Chairs.jpg', 1, '2023-02-18 00:12:53', '2023-02-18 00:12:53'),
(10, 5, 'Treadmills', '1676699044-subcategory-cover-Treadmills.jpg', 1, '2023-02-18 00:14:04', '2023-02-18 00:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Staff Member', 'staffmember@gmail.com', '2023-02-16 06:30:00', '$2y$10$7uS32StKA.2guvzaCZEX3eM81AvEHx4OQuIY.EK5PxjBztvr/xZ76', NULL, '2023-02-16 06:30:00', '2023-02-16 06:30:00'),
(2, 'Unknown User', 'user@gmail.com', '2023-02-16 06:30:01', '$2y$10$SsV9ygZEb6EcCaKQOewMLu7zzn.XecoEkJODIvRo.bB1Rt5KPj65u', NULL, '2023-02-16 06:30:01', '2023-02-16 06:30:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
