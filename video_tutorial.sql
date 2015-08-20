-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2015 at 06:27 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(9) NOT NULL,
  `video_id` int(3) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `video_id`, `author`, `body`) VALUES
(1, 18, 'luke', 'This is our comment test'),
(14, 18, 'asdfas', 'asdfasdf'),
(15, 18, 'Maen', 'Test'),
(16, 19, 'Mae', 'Maen testing');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Users', '{"admin":0,"users":1}', '2015-08-15 22:43:13', '2015-08-15 22:43:13'),
(2, 'Administrator', '{"admin":1,"users":1}', '2015-08-16 00:49:30', '2015-08-16 00:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(4) NOT NULL DEFAULT '0',
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '0.0.0.0', 3, 0, 0, '2015-08-15 16:27:12', NULL, NULL),
(2, 2, '0.0.0.0', 4, 0, 0, '2015-08-16 16:49:12', NULL, NULL),
(3, 8, '0.0.0.0', 0, 0, 0, '2015-08-16 22:17:15', '2015-08-16 22:17:15', NULL),
(4, 9, '0.0.0.0', 4, 0, 0, '2015-08-16 17:15:06', '2015-08-16 17:13:55', NULL),
(5, 10, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(6, 11, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(7, 7, '0.0.0.0', 5, 1, 0, '2015-08-16 16:50:19', '2015-08-16 16:50:19', NULL),
(8, 12, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(9, 13, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(10, 14, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(11, 15, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(12, 16, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL),
(13, 18, '0.0.0.0', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(9, 'tin@admin.com', '$2y$10$v0eJoY2fJfw55QWvvqqTk.j6zLXRCA7fvRCCST0d7xBo4DJzCeyja', '{"view":1,"add":1,"edit":1,"delete":1}', 0, NULL, NULL, '2015-08-17 04:50:45', '$2y$10$6V2BCe9zeqjf/q9PEQmc2enXWywXolWsH4mzJCQ4GV1iax56Utmz6', NULL, 'tin', 'tin', '2015-08-15 23:53:47', '2015-08-17 00:58:59'),
(11, 'luke@hardiman.co.nz', '$2y$10$KiL2O6OGNkvmlvut8uq8fem4OlretDmoDocWRag5J8hetjVYl5p.2', '{"watch":1,"view":1,"add":1,"edit":1,"delete":1}\r\n', 1, NULL, NULL, '2015-08-18 08:14:24', '$2y$10$BRYMjm1s8VkwI.SI9j0oUutOdxBs3spnZtXWIP1JLgRQRbhCxg4cS', NULL, 'luke', 'hardiman', '2015-08-16 02:02:45', '2015-08-17 20:14:24'),
(14, 'myat@gmail.com', '$2y$10$FBq52XlcA.B3bNT8llixdeJjczDPM0j2Zo2eCPksL.HH2SCyKmf6C', '{"watch":1,"view":1}', 1, NULL, NULL, '2015-08-17 12:12:40', '$2y$10$PTUirqnvSV9YGHVBz5Zs4.hMN1QppNJ.C8A2oIKZZZlIve2OZPNru', NULL, 'myat', 'thae', '2015-08-17 00:11:17', '2015-08-17 00:12:40'),
(15, 'maen@gamil.com', '$2y$10$1KeriZMch9uiEi14NPc9R.m9kOEUX64Fc7V88TKIW2W4GuDEVyrhu', '{"watch":1,"view":1}', 1, NULL, NULL, '2015-08-17 13:03:06', '$2y$10$DJk/TD7ZIpGFK2EYKqK6fe9kCeZt4giqmicHZWMYcU84DTLBwp5eC', NULL, 'maen', 'maen', '2015-08-17 00:59:56', '2015-08-17 01:03:06'),
(16, 'sue@admin.com', '$2y$10$au9B9brwZWn1nyGFx2IcL.z8e0Ihcmjuy/NbcVA989.FX292S/LBa', '{"watch":1}', 1, 'XzYZHiO0HqHhQukRruZ1ek94q1kdYGMMZG2Q2jWmGO', NULL, '2015-08-18 07:08:56', '$2y$10$Q/dH420KSTUqs.LC2pDsHOKgekIDti0lIcwmXtY2OognB/LKnkDbG', NULL, 'sue', 'sue', '2015-08-17 01:20:05', '2015-08-17 19:08:56'),
(17, 'kevin@admin.com', '$2y$10$7TIq/HbCSVZ21C4b66kQie8Zgo5V8QPgOklPwfSJ3LWfp1ouB5suy', '{"watch":1}', 1, 'q1yRUSjEfjkcPKS0ato9G2EVEPXCbLATD3Rwnc1orh', NULL, NULL, NULL, NULL, 'kevin', 'admin', '2015-08-17 19:47:02', '2015-08-17 19:47:02'),
(18, 'manu@admin.com', '$2y$10$XL.5mVfN3AR9GjNwMa8d1O1fxw1fkqf6JUePn3O1slrZRRx8B.lCa', '{"watch":1}', 1, '9QWY8Xz8urGWU0gqrJXYhwhV3aWeqhm9KEmnHNJPeQ', NULL, '2015-08-18 08:13:46', '$2y$10$VPGKO4jumCy71J39ux9ZVO5t79nivhXaLAodwEX7oF7h/U8GgGR1W', NULL, 'manu', 'admin', '2015-08-17 19:47:56', '2015-08-17 20:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(2, 11, 1),
(3, 14, 1),
(4, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(3) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_filename` varchar(255) NOT NULL,
  `video_description` text NOT NULL,
  `video_tag` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_title`, `video_filename`, `video_description`, `video_tag`) VALUES
(17, 'LOGIN', 'minmin.mp4', '<p style="font-family: ''Courier New''; font-size: 9pt;">&nbsp;We are testing the blog post in the file</p>', 'golf'),
(18, 'Layphyu', 'lay.mp4', 'Test', ''),
(19, 'Laylay', 'layphyu.mp4', 'Test', 'video');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_activation_code_index` (`activation_code`),
  ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
