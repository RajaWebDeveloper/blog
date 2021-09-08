-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 09:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_models`
--

CREATE TABLE `blog_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_model_id` int(255) NOT NULL,
  `users_id` int(11) UNSIGNED NOT NULL,
  `blog_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_blog_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_models`
--

INSERT INTO `blog_models` (`id`, `category_model_id`, `users_id`, `blog_name`, `blog_image`, `blog_content`, `short_blog_content`, `created_at`, `updated_at`) VALUES
(4, 7, 1, 'test', '61391448ce1fd.jpg', '<p>zxnkcbhsdkbfv</p>', 'asncbsdhfv', '2021-09-08 14:21:36', '2021-09-08 14:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `category_models`
--

CREATE TABLE `category_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_models`
--

INSERT INTO `category_models` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(7, 'Architecture', '2021-09-08 14:09:02', '2021-09-08 14:09:02');

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
(0, '2021_05_22_051852_create_portfolio_models_table', 0),
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_05_13_110806_create_blog_models_table', 2),
(8, '2021_05_14_080031_create_comment_models_table', 3),
(9, '2021_05_14_110507_create_course_models_table', 3),
(11, '2021_05_15_053522_create_category_models_table', 4),
(12, '2021_05_15_053549_create_subcategory_models_table', 4),
(13, '2021_05_15_115723_create_images_table', 5),
(14, '2021_05_15_115856_create_galleries_table', 5),
(15, '2021_05_15_050716_create_settings_models_table', 6),
(16, '2021_05_18_043952_create_notifications_table', 7),
(17, '2021_05_19_063539_create_subcategory_content_models_table', 8),
(18, '2021_05_19_134940_create_youtube_models_table', 9),
(19, '2021_05_19_135002_create_testimonial_models_table', 9),
(20, '2021_05_22_051852_create_portfolio_models_table', 10);

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Sc9G1C4spwqn5AvNLlG2p.3GmzY.JhxYDaYclKy3WVMdO4/PYipka', NULL, '2021-05-13 02:33:48', '2021-05-13 02:33:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_models`
--
ALTER TABLE `blog_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_models`
--
ALTER TABLE `category_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_models`
--
ALTER TABLE `blog_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_models`
--
ALTER TABLE `category_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
