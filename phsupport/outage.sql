-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 07:52 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outage`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `article_banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_date` date NOT NULL,
  `article_creator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_logs` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_11_094504_add_position_to_users', 2),
(6, '2017_05_12_095930_create_logs_table', 3),
(7, '2017_05_15_043605_create_article_table', 4),
(8, '2017_05_16_032059_add_paid_to_users', 5),
(9, '2017_05_17_035010_add_article_type_to_article', 6),
(10, '2017_05_17_035536_add_article_active_to_article', 7),
(11, '2017_05_22_091449_create_whoweare_table', 8),
(12, '2017_05_22_101113_create_whatwevalue_table', 9),
(13, '2017_05_23_035210_create_ourbrand_tabl', 10),
(14, '2017_05_23_040058_create_ourmission_table', 11),
(15, '2017_05_23_040853_create_ourvision_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ourbrand`
--

CREATE TABLE `ourbrand` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ourbrand`
--

INSERT INTO `ourbrand` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3><span style=\"color: #000000;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\">OUR BRAND</span></strong></span></h3>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; color: #000000;\">51Talk (pronounced as FIVE-ONE-TALK) can be translated as &ldquo;I want to talk&rdquo;in Chinese. In Chinese, five is pronounced similarly to the word &ldquo;I&rdquo; and one is homophonous with the word &ldquo;want.&rdquo; That being said, it is one of our goals to ensure that our students have optimal &ldquo;talk-time&rdquo; during their lessons. It also sums up the students&rsquo; aspiration to master the English language.</span></p>', '2017-05-22 20:00:17', '2017-05-22 21:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `ourmission`
--

CREATE TABLE `ourmission` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ourmission`
--

INSERT INTO `ourmission` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3><span style=\"color: #000000;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\">OUR MISSION</span></strong></span></h3>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; color: #000000;\">To deliver the best online English teaching service to our clients.</span></p>', '2017-05-22 20:06:28', '2017-05-22 23:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `ourvision`
--

CREATE TABLE `ourvision` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ourvision`
--

INSERT INTO `ourvision` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3><strong><span style=\"color: #000000; font-family: arial, helvetica, sans-serif;\">OUR VISION</span></strong></h3>\r\n<p><span style=\"color: #000000; font-family: arial, helvetica, sans-serif;\">To be recognized as the best and largest professional online English school in China and the leading online English company in the Philippines.</span></p>', '2017-05-22 20:19:27', '2017-05-22 23:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` enum('Super Admin','Admin','User') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `position`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$xk.VgWMnYPGJI1/UTa2cU.5CgDwfOmCPy9ZTFf9KPf.xF1yGFO5Ge', '6ofRYW9EuZQcud4kvUmi0UhHyasy86ehoOISQfdv69VxzO4pcQHfCFMkQ61A', '2017-05-10 13:05:11', '2017-05-10 13:05:11', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `whatwevalue`
--

CREATE TABLE `whatwevalue` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatwevalue`
--

INSERT INTO `whatwevalue` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<div id=\"Content\">\r\n<div id=\"Translation\">\r\n<h3><span style=\"color: #000000;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\">WHAT WE VALUE</span></strong></span></h3>\r\n<p><span style=\"color: #000000;\"><strong>PASSION</strong> &ndash; We believe in the importance of living and working with enthusiasm.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>CUSTOMER FOCUS</strong> &ndash; We help our clients achieve their goals and we conduct business with utmost fairness and integrity. We consistently strive for customer satisfaction in our dealings with our industrial and academic partners.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>GAME CHANGER</strong> &ndash; As a fast-growing company, we welcome change with a positive attitude.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>CAMARADERIE</strong> &ndash; We practice mutual trust and friendship with everyone.</span></p>\r\n</div>\r\n</div>', '2017-05-22 19:31:26', '2017-05-22 20:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `whoweare`
--

CREATE TABLE `whoweare` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whoweare`
--

INSERT INTO `whoweare` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3><span style=\"font-family: arial, helvetica, sans-serif; color: #000000;\"><strong>WHO WE ARE</strong></span></h3>\r\n<p><span style=\"color: #000000; font-size: 12pt; font-family: arial, helvetica, sans-serif;\">51Talk is the fastest growing online English Language Teaching (ELT) platform in China and the Philippines. 51Talk was established in China in 2011. Since 2012, it has been operating in the Philippines, creating thousands of jobs for home-based teachers. These teachers work from various parts of the Philippines.</span></p>', '2017-05-22 19:16:28', '2017-05-22 20:54:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `article_article_id_unique` (`article_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_logs`),
  ADD UNIQUE KEY `logs_id_logs_unique` (`id_logs`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourbrand`
--
ALTER TABLE `ourbrand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ourbrand_id_unique` (`id`);

--
-- Indexes for table `ourmission`
--
ALTER TABLE `ourmission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ourmission_id_unique` (`id`);

--
-- Indexes for table `ourvision`
--
ALTER TABLE `ourvision`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ourvision_id_unique` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whatwevalue`
--
ALTER TABLE `whatwevalue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `whatwevalue_id_unique` (`id`);

--
-- Indexes for table `whoweare`
--
ALTER TABLE `whoweare`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `whoweare_id_unique` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_logs` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ourbrand`
--
ALTER TABLE `ourbrand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ourmission`
--
ALTER TABLE `ourmission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ourvision`
--
ALTER TABLE `ourvision`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `whatwevalue`
--
ALTER TABLE `whatwevalue`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `whoweare`
--
ALTER TABLE `whoweare`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
