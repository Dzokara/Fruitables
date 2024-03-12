-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 10:55 AM
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
-- Database: `fruitables`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Login', NULL, NULL),
(2, 'Add to cart', NULL, NULL),
(3, 'Remove from cart', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Berries', NULL, '2024-03-11 20:13:45'),
(2, 'Citrus', NULL, NULL),
(3, 'Apples and Pears', NULL, NULL),
(4, 'Tropic', NULL, '2024-03-11 20:10:24'),
(5, 'Stone Fruit', NULL, NULL),
(6, 'Vegetables', NULL, NULL);

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
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `id_img` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `name`, `id_category`, `id_img`, `created_at`, `updated_at`) VALUES
(2, 'Sunny', 2, 14, NULL, '2024-03-11 18:57:33'),
(3, 'Banana', 4, 19, NULL, '2024-03-11 22:14:33'),
(4, 'Avocado', 6, 32, NULL, '2024-03-11 22:27:29'),
(5, 'Watermelon', 5, 33, NULL, '2024-03-11 22:28:01'),
(6, 'Grapes', 1, 22, NULL, '2024-03-11 22:15:22'),
(7, 'Red Apple', 3, 23, NULL, '2024-03-11 22:15:38'),
(8, 'Orange', 2, 29, NULL, '2024-03-11 22:18:15'),
(12, 'Kiwi', 4, 34, NULL, '2024-03-11 22:28:49'),
(13, 'Broccoli', 6, 25, NULL, '2024-03-11 22:16:13'),
(14, 'Potato', 6, 26, NULL, '2024-03-11 22:16:40'),
(15, 'Pepper', 6, 27, NULL, '2024-03-11 22:17:03'),
(16, 'molestiae', 6, 1, NULL, NULL),
(17, 'Cherry', 1, 35, NULL, '2024-03-11 22:29:31'),
(18, 'et', 6, 1, NULL, NULL),
(19, 'dolorum', 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `href` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `href`, `created_at`, `updated_at`) VALUES
(1, 'best-product-1.jpg', NULL, NULL),
(2, 'avatar.jpg', NULL, NULL),
(3, 'lmMs3mFSrymNh2obF4UjmzSjSTzZUImqlB0TPoJS.png', '2024-03-07 16:54:59', '2024-03-07 16:54:59'),
(4, 'Naamloos.png', '2024-03-07 21:10:12', '2024-03-07 21:10:12'),
(5, 'Naamloos.png', '2024-03-07 21:15:18', '2024-03-07 21:15:18'),
(6, 'avatar.jpg', '2024-03-07 21:27:16', '2024-03-07 21:27:16'),
(7, '65ec3c8d1620f_2024-03-09 10:40:13_testimonial-1.jpg', '2024-03-09 09:40:13', '2024-03-09 09:40:13'),
(8, '65ec3ce05e270_1709980896_testimonial-1.jpg', '2024-03-09 09:41:36', '2024-03-09 09:41:36'),
(9, '65ec3d34e0bf3_1709980980_123.PNG', '2024-03-09 09:43:00', '2024-03-09 09:43:00'),
(10, '65ec3d7b6e40f_1709981051_123.PNG', '2024-03-09 09:44:11', '2024-03-09 09:44:11'),
(11, '65ede18134ad4_1710088577_testimonial-1.jpg', '2024-03-10 15:36:17', '2024-03-10 15:36:17'),
(12, '1710186790.jpg', '2024-03-11 18:53:10', '2024-03-11 18:53:10'),
(13, '1710186851.jpg', '2024-03-11 18:54:11', '2024-03-11 18:54:11'),
(14, '1710187053.jpg', '2024-03-11 18:57:33', '2024-03-11 18:57:33'),
(15, '1710188430.jpg', '2024-03-11 19:20:30', '2024-03-11 19:20:30'),
(16, '1710188476.jpg', '2024-03-11 19:21:16', '2024-03-11 19:21:16'),
(17, '65ef7f184d48f_1710194456_65ede18134ad4_1710088577_testimonial-1.jpg', '2024-03-11 21:00:56', '2024-03-11 21:00:56'),
(18, '1710198063.jpg', '2024-03-11 22:01:03', '2024-03-11 22:01:03'),
(19, '1710198873.jpg', '2024-03-11 22:14:33', '2024-03-11 22:14:33'),
(20, '1710198888.jpg', '2024-03-11 22:14:48', '2024-03-11 22:14:48'),
(21, '1710198907.jpg', '2024-03-11 22:15:07', '2024-03-11 22:15:07'),
(22, '1710198922.jpg', '2024-03-11 22:15:22', '2024-03-11 22:15:22'),
(23, '1710198938.jpg', '2024-03-11 22:15:38', '2024-03-11 22:15:38'),
(24, '1710198954.jpg', '2024-03-11 22:15:54', '2024-03-11 22:15:54'),
(25, '1710198973.jpg', '2024-03-11 22:16:13', '2024-03-11 22:16:13'),
(26, '1710199000.jpg', '2024-03-11 22:16:40', '2024-03-11 22:16:40'),
(27, '1710199023.jpg', '2024-03-11 22:17:03', '2024-03-11 22:17:03'),
(28, '1710199045.jpg', '2024-03-11 22:17:25', '2024-03-11 22:17:25'),
(29, '1710199095.jpg', '2024-03-11 22:18:15', '2024-03-11 22:18:15'),
(30, '1710199350.PNG', '2024-03-11 22:22:30', '2024-03-11 22:22:30'),
(31, '1710199364.jpg', '2024-03-11 22:22:44', '2024-03-11 22:22:44'),
(32, '1710199558.jpg', '2024-03-11 22:25:58', '2024-03-11 22:25:58'),
(33, '1710199681.jpg', '2024-03-11 22:28:01', '2024-03-11 22:28:01'),
(34, '1710199729.jpg', '2024-03-11 22:28:49', '2024-03-11 22:28:49'),
(35, '1710199771.jpg', '2024-03-11 22:29:31', '2024-03-11 22:29:31'),
(36, '1710202099.jpg', '2024-03-11 23:08:19', '2024-03-11 23:08:19'),
(37, '1710202134.jpg', '2024-03-11 23:08:54', '2024-03-11 23:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(4, 'Đorđe Jovanović', 'ledjoxx@gmail.com', '123', '2024-03-10 10:42:06', '2024-03-10 10:42:06'),
(5, 'Aleksa Jovanovic', 'ledjoxx@gmail.com', 'Content', '2024-03-10 17:13:54', '2024-03-10 17:13:54'),
(6, 'Avvv Bbbbb', 'ledjoxx@gmail.com', 'Content 2', '2024-03-10 17:14:14', '2024-03-10 17:14:14'),
(7, 'Đorđe Jovanović', 'ledjoxx@gmail.com', 'Nice', '2024-03-11 23:04:03', '2024-03-11 23:04:03');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_27_123109_create_role_table', 1),
(6, '2024_02_27_123202_create_nav_table', 1),
(7, '2024_02_27_123210_create_message_table', 2),
(8, '2024_02_27_123240_create_categories_table', 2),
(9, '2024_02_27_123245_create_img_table', 2),
(10, '2024_02_27_123514_create_fruits_table', 3),
(11, '2024_02_27_123528_create_prices_table', 4),
(12, '2024_02_27_123558_create_users_table', 5),
(13, '2024_02_27_123626_create_product_cart_table', 5),
(14, '2024_02_27_123645_create_orders_table', 5),
(15, '2024_02_27_123734_create_rating_table', 5),
(16, '2024_02_27_125706_create_order_item_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `name`, `href`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', NULL, NULL),
(2, 'Shop', '/fruits', NULL, NULL),
(5, 'Login', '/login', NULL, NULL),
(6, 'Admin', '/admin', NULL, NULL),
(14, 'Register', '/register', NULL, NULL),
(15, 'Cart', '/cart', NULL, NULL),
(16, 'Checkout', '/checkout', NULL, NULL),
(18, 'Orders', '/orders', NULL, NULL),
(20, 'Contact', '/contact', NULL, NULL),
(21, 'Logout', '/logout', NULL, NULL),
(22, 'Author', '/author', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `total`, `address`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(11, 1, 466.00, 'Bulevar revolucije 34', '062123456789', 'wow', '2024-03-09 14:11:03', '2024-03-09 14:11:03'),
(12, 1, 149.00, 'Address 123', '062123456789', NULL, '2024-03-09 14:15:45', '2024-03-09 14:15:45'),
(13, 1, 252.00, 'Bulevar revolucije 34', '062123456789', NULL, '2024-03-09 14:23:07', '2024-03-09 14:23:07'),
(14, 1, 149.00, 'Bulevar revolucije 34', '062123456789', NULL, '2024-03-09 14:25:01', '2024-03-09 14:25:01'),
(15, 1, 228.00, 'Bulevar revolucije 34', '062123456789', 'sda', '2024-03-09 14:30:53', '2024-03-09 14:30:53'),
(16, 1, 15.00, 'Address 123', '062123456789', '123', '2024-03-09 14:31:23', '2024-03-09 14:31:23'),
(17, 9, 107.00, 'Bulevar revolucije 34', '0621234567', 'gang', '2024-03-09 15:03:47', '2024-03-09 15:03:47'),
(18, 1, 251.00, 'Bulevar revolucije 34', '062123456789', NULL, '2024-03-10 13:14:09', '2024-03-10 13:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_fruits` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `id_order`, `id_fruits`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(19, 11, 3, 1, 34.00, '2024-03-09 14:11:03', '2024-03-09 14:11:03'),
(20, 11, 4, 4, 63.00, '2024-03-09 14:11:03', '2024-03-09 14:11:03'),
(21, 11, 5, 4, 42.00, '2024-03-09 14:11:03', '2024-03-09 14:11:03'),
(22, 11, NULL, 1, 2.00, '2024-03-09 14:11:03', '2024-03-11 22:18:23'),
(23, 12, 3, 1, 34.00, '2024-03-09 14:15:45', '2024-03-09 14:15:45'),
(24, 12, 4, 1, 63.00, '2024-03-09 14:15:45', '2024-03-09 14:15:45'),
(25, 12, 5, 1, 42.00, '2024-03-09 14:15:45', '2024-03-09 14:15:45'),
(26, 13, 17, 1, 20.00, '2024-03-09 14:23:07', '2024-03-09 14:23:07'),
(27, 13, NULL, 1, 80.00, '2024-03-09 14:23:07', '2024-03-11 20:25:59'),
(28, 13, 6, 1, 52.00, '2024-03-09 14:23:07', '2024-03-09 14:23:07'),
(29, 13, NULL, 4, 2.00, '2024-03-09 14:23:07', '2024-03-11 22:18:23'),
(30, 13, 13, 1, 82.00, '2024-03-09 14:23:07', '2024-03-09 14:23:07'),
(31, 14, 3, 1, 34.00, '2024-03-09 14:25:01', '2024-03-09 14:25:01'),
(32, 14, 4, 1, 63.00, '2024-03-09 14:25:01', '2024-03-09 14:25:01'),
(33, 14, 5, 1, 42.00, '2024-03-09 14:25:01', '2024-03-09 14:25:01'),
(34, 15, 8, 1, 54.00, '2024-03-09 14:30:53', '2024-03-09 14:30:53'),
(35, 15, NULL, 1, 2.00, '2024-03-09 14:30:53', '2024-03-11 22:18:23'),
(36, 15, 13, 1, 82.00, '2024-03-09 14:30:53', '2024-03-09 14:30:53'),
(37, 15, NULL, 1, 80.00, '2024-03-09 14:30:53', '2024-03-11 20:25:59'),
(38, 16, 2, 1, 5.00, '2024-03-09 14:31:23', '2024-03-09 14:31:23'),
(39, 17, 3, 1, 34.00, '2024-03-09 15:03:47', '2024-03-09 15:03:47'),
(40, 17, 4, 1, 63.00, '2024-03-09 15:03:47', '2024-03-09 15:03:47'),
(41, 18, 2, 5, 5.00, '2024-03-10 13:14:09', '2024-03-10 13:14:09'),
(42, 18, 3, 4, 34.00, '2024-03-10 13:14:09', '2024-03-10 13:14:09'),
(43, 18, NULL, 1, 80.00, '2024-03-10 13:14:09', '2024-03-11 20:25:59');

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_fruits` bigint(20) UNSIGNED DEFAULT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `id_fruits`, `date_from`, `date_to`, `created_at`, `updated_at`) VALUES
(4, 5.00, 2, '2024-02-29 12:54:36', NULL, NULL, NULL),
(5, 34.00, 3, '2024-02-29 12:54:36', NULL, NULL, NULL),
(6, 63.00, 4, '2024-02-29 12:54:36', NULL, NULL, NULL),
(7, 42.00, 5, '2024-02-29 12:54:36', NULL, NULL, NULL),
(8, 52.00, 6, '2024-02-29 12:54:36', NULL, NULL, NULL),
(9, 36.00, 7, '2024-02-29 12:54:36', NULL, NULL, NULL),
(10, 54.00, 8, '2024-02-29 12:54:36', NULL, NULL, NULL),
(11, 2.00, NULL, '2024-02-29 12:54:36', NULL, NULL, '2024-03-11 22:18:23'),
(12, 19.00, NULL, '2024-02-29 12:54:36', NULL, NULL, '2024-03-11 22:18:26'),
(13, 50.00, NULL, '2024-02-29 12:54:36', NULL, NULL, '2024-03-11 22:18:31'),
(14, 79.00, 12, '2024-02-29 14:05:50', NULL, NULL, NULL),
(15, 82.00, 13, '2024-02-29 14:05:50', NULL, NULL, NULL),
(16, 61.00, 14, '2024-02-29 14:05:50', NULL, NULL, NULL),
(17, 59.00, 15, '2024-02-29 14:05:50', NULL, NULL, NULL),
(18, 51.00, 16, '2024-02-29 14:05:50', NULL, NULL, NULL),
(19, 96.00, 15, '2024-03-04 12:40:29', NULL, NULL, NULL),
(20, 19.00, 16, '2024-03-04 12:40:29', NULL, NULL, NULL),
(21, 20.00, 17, '2024-03-04 12:40:29', NULL, NULL, NULL),
(22, 15.00, 18, '2024-03-04 12:40:29', NULL, NULL, NULL),
(23, 60.00, 19, '2024-03-04 12:40:29', NULL, NULL, NULL),
(24, 68.00, NULL, '2024-03-04 12:40:29', NULL, NULL, '2024-03-11 20:25:59'),
(25, 21.00, NULL, '2024-03-04 12:40:29', NULL, NULL, '2024-03-11 20:25:59'),
(26, 80.00, NULL, '2024-03-04 12:40:29', NULL, NULL, '2024-03-11 20:25:59'),
(27, 20.00, 2, '2024-03-11 19:52:50', NULL, '2024-03-11 18:52:50', '2024-03-11 18:52:50'),
(28, 20.00, NULL, '2024-03-11 20:20:30', NULL, '2024-03-11 19:20:30', '2024-03-11 20:25:59'),
(29, 84.00, NULL, '2024-03-11 20:21:16', NULL, '2024-03-11 19:21:16', '2024-03-11 20:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_fruits` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cart`
--

INSERT INTO `product_cart` (`id`, `id_fruits`, `id_user`, `quantity`, `created_at`, `updated_at`) VALUES
(57, 2, 1, 1, '2024-03-11 23:07:29', '2024-03-11 23:07:29'),
(58, 12, 1, 1, '2024-03-11 23:07:38', '2024-03-11 23:07:38'),
(59, 7, 1, 1, '2024-03-12 08:52:34', '2024-03-12 08:52:34'),
(60, 8, 1, 1, '2024-03-12 08:52:52', '2024-03-12 08:52:52'),
(61, 18, 1, 1, '2024-03-12 08:52:54', '2024-03-12 08:52:54'),
(62, 19, 1, 1, '2024-03-12 08:52:55', '2024-03-12 08:52:55'),
(63, 17, 1, 1, '2024-03-12 08:52:55', '2024-03-12 08:52:55'),
(64, 14, 1, 1, '2024-03-12 08:52:56', '2024-03-12 08:52:56'),
(65, 15, 1, 1, '2024-03-12 08:52:57', '2024-03-12 08:52:57'),
(66, 16, 1, 1, '2024-03-12 08:52:57', '2024-03-12 08:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` decimal(2,1) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_fruits` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `value`, `id_user`, `id_fruits`, `description`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 4.0, 1, 14, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(3, 4.5, 1, 12, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(4, 0.5, 1, 4, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(5, 4.0, 1, 4, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(6, 2.5, 1, 6, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(7, 2.0, 1, 16, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(8, 4.5, 1, 4, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(9, 3.0, 1, 3, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(11, 2.5, 1, 15, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(12, 1.5, 1, 4, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(15, 1.0, 1, 15, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(16, 4.0, 1, 6, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(17, 4.5, 1, 14, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(18, 3.5, 1, 6, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(19, 2.0, 1, 6, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(20, 3.5, 1, 5, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(22, 2.5, 1, 13, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(23, 2.5, 1, 7, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(24, 1.0, 1, 4, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(25, 2.5, 1, 4, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(26, 4.0, 1, 14, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(28, 3.5, 1, 6, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(30, 1.5, 1, 13, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(32, 2.0, 1, 2, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(34, 4.0, 1, 4, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(35, 4.0, 1, 15, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(36, 1.5, 1, 3, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(37, 2.5, 1, 15, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(38, 0.5, 1, 12, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(39, 2.5, 1, 8, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(40, 3.0, 1, 3, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(41, 1.0, 1, 2, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(42, 4.5, 1, 2, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(48, 1.0, 1, 8, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(49, 4.0, 1, 6, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(50, 4.0, 1, 3, '[Wow an amazing product i really liked it]', '2024-03-06 00:00:00', NULL, NULL),
(51, 3.0, 1, 3, 'Affs', '2024-03-07 14:33:51', '2024-03-07 13:33:51', '2024-03-07 13:33:51'),
(52, 4.0, 1, 3, 'asdada', '2024-03-07 14:42:32', '2024-03-07 13:42:32', '2024-03-07 13:42:32'),
(53, 5.0, 1, 3, 'sadsadsad', '2024-03-07 14:46:41', '2024-03-07 13:46:41', '2024-03-07 13:46:41'),
(60, 3.0, 1, 19, 'Wow', '2024-03-07 14:59:42', '2024-03-07 13:59:42', '2024-03-07 13:59:42'),
(61, 2.0, 1, 19, 'Cool', '2024-03-07 15:02:29', '2024-03-07 14:02:29', '2024-03-07 14:02:29'),
(62, 2.0, 1, 19, 'Wow111', '2024-03-07 15:05:27', '2024-03-07 14:05:27', '2024-03-07 14:05:27'),
(63, 4.0, 1, 19, 'Wowwww', '2024-03-07 15:07:06', '2024-03-07 14:07:06', '2024-03-07 14:07:06'),
(64, 2.0, 1, 19, 'Wow', '2024-03-07 15:07:33', '2024-03-07 14:07:33', '2024-03-07 14:07:33'),
(65, 4.0, 1, 17, 'Cool!', '2024-03-07 15:08:15', '2024-03-07 14:08:15', '2024-03-07 14:08:15'),
(66, 3.0, 1, 17, 'Amaaazing', '2024-03-07 15:09:55', '2024-03-07 14:09:55', '2024-03-07 14:09:55'),
(67, 5.0, 1, 17, 'sadsad', '2024-03-07 15:10:19', '2024-03-07 14:10:19', '2024-03-07 14:10:19'),
(68, 3.0, 1, 17, 'sadsad', '2024-03-07 15:10:24', '2024-03-07 14:10:24', '2024-03-07 14:10:24'),
(69, 4.0, 1, 17, 'Wowza', '2024-03-07 15:13:23', '2024-03-07 14:13:23', '2024-03-07 14:13:23'),
(76, 3.0, 9, 3, 'Aye', '2024-03-09 16:03:14', '2024-03-09 15:03:14', '2024-03-09 15:03:14'),
(77, 2.0, 9, 3, 'Wow', '2024-03-09 16:03:21', '2024-03-09 15:03:21', '2024-03-09 15:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', NULL, NULL),
(2, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_img` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `id_img`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 'Djordje', 'Jovanovic', 'ledjoxx@gmail.com', '$2y$12$RgCqb29E43x0vWrEE8UireH/FOhAAkNvq6S55.NxBetzKM1IzFeQe', 2, 2, NULL, '2024-03-07 11:53:33'),
(9, 'Đorđ', 'Jovanović', 'aw3ron@gmail.com', '$2y$12$k580lLDYWgsar2cllGmtSO.oBK5gqPH/iERVt2XlywMoUk0PLew1q', 37, 1, '2024-03-09 09:44:11', '2024-03-11 23:08:54'),
(10, 'Luka', 'Luka', 'luka@gmail.com', '$2y$12$CeoqZ7MUN7tngiUbcbIt8OV.2ZQt3gI0.fwAdaqKP5bhHyZFkWrBy', 11, 2, '2024-03-10 15:36:17', '2024-03-10 15:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_activity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `email`, `id_activity`, `created_at`, `updated_at`) VALUES
(1, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:34', '2024-03-12 09:52:34'),
(2, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:52', '2024-03-12 09:52:52'),
(3, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:54', '2024-03-12 09:52:54'),
(4, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:55', '2024-03-12 09:52:55'),
(5, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:55', '2024-03-12 09:52:55'),
(6, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:56', '2024-03-12 09:52:56'),
(7, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:57', '2024-03-12 09:52:57'),
(8, 'ledjoxx@gmail.com', 2, '2024-03-12 09:52:57', '2024-03-12 09:52:57'),
(9, 'ledjoxx@gmail.com', 3, '2024-03-12 09:53:55', '2024-03-12 09:53:55'),
(10, 'ledjoxx@gmail.com', 3, '2024-03-12 09:53:56', '2024-03-12 09:53:56'),
(11, 'ledjoxx@gmail.com', 1, '2024-03-12 09:54:45', '2024-03-12 09:54:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fruits_id_category_foreign` (`id_category`),
  ADD KEY `fruits_id_img_foreign` (`id_img`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_user_foreign` (`id_user`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_id_order_foreign` (`id_order`),
  ADD KEY `order_item_id_fruits_foreign` (`id_fruits`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_id_fruits_foreign` (`id_fruits`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cart_id_fruits_foreign` (`id_fruits`),
  ADD KEY `product_cart_id_user_foreign` (`id_user`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_id_user_foreign` (`id_user`),
  ADD KEY `rating_id_fruits_foreign` (`id_fruits`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_img` (`id_img`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_activity` (`id_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fruits`
--
ALTER TABLE `fruits`
  ADD CONSTRAINT `fruits_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fruits_id_img_foreign` FOREIGN KEY (`id_img`) REFERENCES `img` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_id_fruits_foreign` FOREIGN KEY (`id_fruits`) REFERENCES `fruits` (`id`),
  ADD CONSTRAINT `order_item_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_id_fruits_foreign` FOREIGN KEY (`id_fruits`) REFERENCES `fruits` (`id`);

--
-- Constraints for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD CONSTRAINT `product_cart_id_fruits_foreign` FOREIGN KEY (`id_fruits`) REFERENCES `fruits` (`id`),
  ADD CONSTRAINT `product_cart_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_id_fruits_foreign` FOREIGN KEY (`id_fruits`) REFERENCES `fruits` (`id`),
  ADD CONSTRAINT `rating_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `img` (`id`),
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
