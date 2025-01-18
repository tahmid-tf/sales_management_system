-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('arafat3@gmail.com|127.0.0.1', 'i:2;', 1736939946),
('arafat3@gmail.com|127.0.0.1:timer', 'i:1736939946;', 1736939946);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'Electronics', '2024-12-29 13:00:00', '2024-12-29 12:52:39', '2024-12-29 13:00:00'),
(3, 'Desktop', 'dwdwd2', '2024-12-30 03:46:28', '2024-12-30 01:31:22', '2024-12-30 03:46:28'),
(4, 'Laptop', 'Laptop Category', NULL, '2024-12-30 02:29:11', '2025-01-16 07:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `warehouse_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '20', '2025-01-03 10:17:10', '2025-01-14 04:33:43', NULL),
(3, 3, 2, '20', '2025-01-03 11:19:04', '2025-01-03 11:19:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(8, '2024_12_25_100121_create_user_profiles_table', 2),
(9, '2024_12_26_082038_create_products_table', 3),
(10, '2024_12_26_082046_create_categories_table', 3),
(12, '2025_01_03_102827_create_warehouses_table', 4),
(16, '2025_01_03_114219_create_suppliers_table', 5),
(17, '2025_01_03_153524_create_inventories_table', 6),
(19, '2025_01_05_071736_create_warehouse_assign_to_staffs_table', 7),
(21, '2025_01_07_101136_create_order_data_table', 8),
(22, '2025_01_15_080742_add_soft_deletes_and_holding_column_to_users', 9);

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `items_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items_ids`)),
  `total_amount` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending',
  `warehouse_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`id`, `name`, `email`, `phone`, `address`, `items`, `items_ids`, `total_amount`, `order_date`, `status`, `warehouse_id`, `manager_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 'Tahmid', 'arafat@gmail.com', '01656655566', 'fesf', '[{\"product_id\":3,\"name\":\"HP Laptop\",\"sku\":\"grdg\",\"price\":\"44.00\",\"inventory_id\":1,\"quantity\":3,\"maxQuantity\":\"25\"}]', '[3]', 132, '2025-01-13', 'accepted', 1, 2, 3, '2025-01-13 03:02:07', '2025-01-14 04:33:43'),
(2, 'Ahmed', 'arafat@gmail.com', '01656655566', 'fesf', '[{\"product_id\":3,\"name\":\"HP Laptop\",\"sku\":\"grdg\",\"price\":\"44.00\",\"inventory_id\":1,\"quantity\":2,\"maxQuantity\":\"25\"}]', '[3]', 88, '2025-01-13', 'rejected', 1, 2, 3, '2025-01-13 07:39:48', '2025-01-14 04:39:13'),
(3, 'arafat@gmail.com', 'arafat@gmail.com', '01656655566', 'fesf', '[{\"product_id\":3,\"name\":\"HP Laptop\",\"sku\":\"grdg\",\"price\":\"44.00\",\"inventory_id\":1,\"quantity\":3,\"maxQuantity\":\"23\"}]', '[3]', 132, '2025-01-13', 'pending', 1, 2, 3, '2025-01-13 08:05:30', '2025-01-13 08:05:30'),
(4, 'arafat@gmail.com', 'arafat@gmail.com', '01656655566', 'fesf', '[{\"product_id\":3,\"name\":\"HP Laptop\",\"sku\":\"grdg\",\"price\":\"44.00\",\"inventory_id\":1,\"quantity\":12,\"maxQuantity\":\"23\",\"cost\":\"528.00\"}]', '[3]', 528, '2025-01-13', 'pending', 1, 2, 3, '2025-01-13 08:08:49', '2025-01-13 08:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `description`, `price`, `stock`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dwad', 'wdawd', 'dwad', 22.12, 22, '4', '2024-12-30 12:30:58', '2024-12-30 07:38:39', '2024-12-30 12:30:58'),
(2, 'fesfesf', 'fesfesf', 'fesfesf', 33.00, 333, '4', '2024-12-30 12:12:34', '2024-12-30 11:26:03', '2024-12-30 12:12:34'),
(3, 'HP Laptop', 'Laptop', 'HP Laptop', 44.00, 330, '4', NULL, '2024-12-30 12:31:09', '2025-01-16 07:01:58'),
(4, 'dwad', 'dwad', 'dwad', 22.00, 22, '4', '2024-12-30 12:41:33', '2024-12-30 12:40:10', '2024-12-30 12:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bqm0wDntnsesnw4hedG4VmjXixW02KPDmoSnCCp0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSk9Za1cycUVRZ3pTQjRJUDUzckFrNHN5M3NRNE0wS2VwNGwwUUZiTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VyX21hbmFnZW1lbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1737033086);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact`, `email`, `phone`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ajij Uddin', 'Dhaka', 'arafat@gmail.com', '01656655566', 'Dhaka, Bangladesh', '2025-01-03 09:21:46', '2025-01-16 07:02:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) DEFAULT 'staff',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `account_status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `account_status`) VALUES
(1, 'Tahmid Admin', 'tahmid.tf2@gmail.com', NULL, '$2y$12$WwEpachn6Ua6N3tTbeBrw.zP9hbfmuXTJVKwSHUxXEkp55R0JnVZK', 'admin', NULL, '2024-12-24 04:47:02', '2024-12-24 04:47:02', NULL, 'active'),
(2, 'Tahmid Manager', 'tahmid.tf3@gmail.com', NULL, '$2y$12$Rb4t6aHhra0sw3aXaYGrMe7AQG2PV8gPizWXsksTWlAIL9H1Qp3HK', 'manager', NULL, '2025-01-01 03:57:17', '2025-01-15 04:52:40', NULL, 'active'),
(3, 'Tahmid Staff', 'tahmid.tf1@gmail.com', NULL, '$2y$12$Rb4t6aHhra0sw3aXaYGrMe7AQG2PV8gPizWXsksTWlAIL9H1Qp3HK', 'staff', NULL, '2025-01-14 07:37:29', '2025-01-15 06:20:56', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `card_id_info` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `profile_photo`, `phone`, `address`, `card_id_info`, `position`, `dob`, `gender`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'images/sPaaUAAah3e92SJNM3VG7xmDtbFIXedQUpIR62cD.jpg', '01828665511', 'Dhaka', '001', 'dsd', '2004-08-10', 'male', '1', '2024-12-26 01:41:59', '2024-12-26 01:59:06'),
(4, 'images/odI14T7TQb3MrxougYh4XCVqOkaY2rRzVncZWOzO.jpg', '01656655566', 'Dhaka', '002', 'Manager', '2005-01-01', 'male', '2', '2025-01-01 04:35:23', '2025-01-01 04:35:23'),
(5, 'images/SYfuaMggLo6KTw6KRCj4syRBfH7Db8yJCBjPpFT0.jpg', '01828665512', 'Dhaka', '003', 'Staff', '2005-01-01', 'male', '3', '2025-01-01 07:01:52', '2025-01-01 07:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Warehouse 1', 'Dhanmondi', '2025-01-03 05:21:20', '2025-01-03 05:28:46', NULL),
(2, 'Warehouse 2', 'Faridpur', '2025-01-03 10:47:45', '2025-01-16 07:02:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_assign_to_staffs`
--

CREATE TABLE `warehouse_assign_to_staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_assign_to_staffs`
--

INSERT INTO `warehouse_assign_to_staffs` (`id`, `staff_id`, `manager_id`, `warehouse_id`, `admin_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, 1, 'active', NULL, '2025-01-05 03:11:45', '2025-01-06 21:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_assign_to_staffs`
--
ALTER TABLE `warehouse_assign_to_staffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse_assign_to_staffs`
--
ALTER TABLE `warehouse_assign_to_staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
