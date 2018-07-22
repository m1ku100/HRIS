-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 10:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msi`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptings`
--

CREATE TABLE `acceptings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edu`
--

CREATE TABLE `edu` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenjang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edu`
--

INSERT INTO `edu` (`id`, `jenjang`, `created_at`, `updated_at`) VALUES
(1, 'Sekolah Dasar', '2018-07-18 04:29:47', '2018-07-18 04:29:47'),
(2, 'Sekolah Menengah Pertama / Sederajat', '2018-07-18 04:29:47', '2018-07-18 04:29:47'),
(3, 'Sekolah Menengah Atas / Sederajat', '2018-07-18 04:29:47', '2018-07-18 04:29:47'),
(4, 'Diploma', '2018-07-18 04:29:47', '2018-07-18 04:29:47'),
(5, 'Sarjana (S1)', '2018-07-18 04:29:47', '2018-07-18 04:29:47'),
(6, 'Sarjana (S2)', '2018-07-18 04:29:47', '2018-07-18 04:29:47'),
(7, 'Sarjana (S3)', '2018-07-18 04:29:47', '2018-07-18 04:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `posisi_id` int(10) UNSIGNED NOT NULL,
  `masuk_lamaran` date NOT NULL,
  `is_atasi` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id`, `user_id`, `posisi_id`, `masuk_lamaran`, `is_atasi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2018-07-18', 0, '2018-07-19 00:54:58', '2018-07-18 04:38:57', '2018-07-19 00:54:58'),
(2, 4, 1, '2018-07-19', 0, NULL, '2018-07-18 23:42:24', '2018-07-18 23:42:24'),
(3, 2, 3, '2018-07-19', 0, NULL, '2018-07-19 00:49:28', '2018-07-19 00:49:28'),
(4, 2, 1, '2018-07-19', 0, '2018-07-19 00:55:45', '2018-07-19 00:55:32', '2018-07-19 00:55:45'),
(5, 2, 1, '2018-07-19', 0, '2018-07-19 03:59:26', '2018-07-19 03:58:56', '2018-07-19 03:59:26'),
(6, 2, 1, '2018-07-19', 0, NULL, '2018-07-19 04:03:03', '2018-07-19 04:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_12_120010_create_edus_table', 1),
(4, '2018_07_12_120348_create_posisis_table', 1),
(5, '2018_07_12_120441_create_acceptings_table', 1),
(6, '2018_07_12_125926_create_pegawai_table', 1),
(7, '2018_07_12_130124_create_sertifikat_table', 1),
(8, '2018_07_12_130219_create_pendidikan_table', 1),
(9, '2018_07_12_130256_create_lamaran_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `nama`, `tmp_lahir`, `tgl_lahir`, `gender`, `telp`, `email`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pegawai Tetap', 'Surabaya', '2018-07-20', 'Laki-Laki', '2505512552512', 'pegawai@gmail.com', NULL, '2018-07-18 04:30:21', '2018-07-18 04:55:12'),
(2, 4, 'Yusuf Christian', 'Surabaya', '2018-07-08', 'Laki-Laki', '082338434394', 'yuschri@gmail.com', NULL, '2018-07-18 23:38:33', '2018-07-18 23:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `edu_id` int(10) UNSIGNED NOT NULL,
  `instansi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `user_id`, `edu_id`, `instansi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'SDN 1 Karah Surabaya', NULL, '2018-07-18 05:50:47', '2018-07-18 05:50:47'),
(2, 2, 2, 'SMPN 36 Surabaya', NULL, '2018-07-20 22:35:23', '2018-07-20 22:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `nama`, `deskripsi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Posisi 212121', 'ilham.puji100@gmail.com', NULL, '2018-07-18 04:29:47', '2018-07-19 04:54:20'),
(2, 'Posisi 12', 'pegawai@gmail.com', '2018-07-19 05:02:21', '2018-07-18 04:29:47', '2018-07-19 05:02:21'),
(3, 'Management Trainee - Young Entrepreneur Program 2018', '<ul style=\"box-sizing: border-box; margin: 0px 0px 1em; padding: 0px 0px 0px 1em; color: #333333; font-family: ProximaNova-Regular, Helvetica, Arial, sans-serif; background-color: rgba(255, 255, 255, 0.9);\">\r\n<li style=\"box-sizing: border-box;\">Indonesian nationality </li>\r\n<li style=\"box-sizing: border-box;\">Bachelor or Master degree  (without or with working experience max. 2 years)</li>\r\n<li style=\"box-sizing: border-box;\">Proficient in active &amp; passive English </li>\r\n<li style=\"box-sizing: border-box;\">Good communication &amp; interpersonal skills </li>\r\n<li style=\"box-sizing: border-box;\">High energy &amp; dynamic with superb analytical skills</li>\r\n<li style=\"box-sizing: border-box;\">Have a leadership experience in organization</li>\r\n<li style=\"box-sizing: border-box;\">Preferably have an internship experience </li>\r\n<li style=\"box-sizing: border-box;\">Willing to undergo program rotation outside Jakarta</li>\r\n</ul>', NULL, '2018-07-18 23:46:56', '2018-07-19 04:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `keahlian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setifikat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_setifikat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dir_setifikat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `user_id`, `keahlian`, `setifikat`, `ket_setifikat`, `dir_setifikat`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Junior Web Programmer', 'Junior Web Programmer', '<p>bisa buat web laravel</p>', 'upload/photo/konachan-com-184564-animal-aqua-hair-bicolored-eyes-bubbles-chibi-city-close-fish-hatsune-miku-jpeg-artifacts-nou-tagme-twintails-vocaloidjpghzmn.jpg', NULL, '2018-07-19 02:28:28', '2018-07-19 02:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manajer', 'ilham.puji100@gmail.com', '$2y$10$BDfOUHDEpEcqeOSTGpfrZuBS.xG/eEL7LOhOY1NOaTAj/1JDMN7wG', 'manajer', NULL, 'FZJfmsRPnMz0rr3qedQ0x2MYg5YVmuVwBPZ8KJ7KT1uyolHdtBnbYtASt02P', '2018-07-18 04:29:46', '2018-07-18 04:29:46'),
(2, 'Pegawai tetap', 'pegawai@gmail.com', '$2y$10$01C.kEFbeTBB2C8ViRfij.f3EzSEfS2Z1owsAHj27Zre.3v5xmenC', 'pegawai', NULL, 'Xu0XhRkGfkoYJfErdc097zBUpzCf8zrALgQPfkU5axuXYiHU5GVs185ef3RM', '2018-07-18 04:29:46', '2018-07-20 04:53:12'),
(3, 'admin mmk', 'admin@gmail.com', '$2y$10$BOUyeTzy8ViwCiWCOtGjYukmevr9eRaeBYHY8MyNgxNeWSKSfIe..', 'admin', NULL, 'ZavXVFm9fgAORzYQbZMjqw2A8ztyyUcBK4Gyqs2FcVpFNn0FuvW6F7XOEgC5', '2018-07-18 04:29:46', '2018-07-20 00:32:19'),
(4, 'Yusuf Christian', 'yuschri@gmail.com', '$2y$10$57GRLuvYtt4Jet9yuttExO4RhVn2WjhpN1.DBl1uAF4X7aRpgX0/C', 'pegawai', NULL, 'irP52xqizmqc7swzU1oRiY0UgYhWOw7sBubhgV5eCMpBJ3JyZpleJWZOqFfM', '2018-07-18 23:33:19', '2018-07-18 23:33:19'),
(5, 'Bagas Muharom', 'bagas@gmail.com', '$2y$10$7qv6bsIJBckQQzkkrVnaW./7e45ocRrV.xC3iLCZXlDNEs.3wQQtu', 'pegawai', NULL, 'oYxyBCzHPKejq9sojPtQXliCTUpZTD6mBs39UR7KTXqB5ERTtSBE8o0S6cwP', '2018-07-21 01:48:48', '2018-07-21 01:48:48'),
(6, 'Rafy', 'rafy@gmail.com', '$2y$10$dlYFaZP2Mi48phcO7jO/LeGUCUe9kfW.Zaj7ocX5u1ueD3b/SwVTS', 'pegawai', NULL, 'my4vl80JWu8RvgZG82iByg63SiKpdtFSIP60FQQpG4KogxzNDz5K3HPS6EA9', '2018-07-21 01:49:46', '2018-07-21 01:49:46'),
(7, 'Bagus Geri', 'bagusgeri@gmail.com', '$2y$10$Snbn6f0yLdfIeJzBQrXpXupdzniFfH89CMTic3YmpvelyuxAlikra', 'manajer', NULL, NULL, '2018-07-21 02:58:32', '2018-07-21 02:58:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptings`
--
ALTER TABLE `acceptings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu`
--
ALTER TABLE `edu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lamaran_user_id_foreign` (`user_id`),
  ADD KEY `lamaran_posisi_id_foreign` (`posisi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_user_id_foreign` (`user_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendidikan_user_id_foreign` (`user_id`),
  ADD KEY `pendidikan_edu_id_foreign` (`edu_id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikat_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `acceptings`
--
ALTER TABLE `acceptings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `edu`
--
ALTER TABLE `edu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_posisi_id_foreign` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lamaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_edu_id_foreign` FOREIGN KEY (`edu_id`) REFERENCES `edu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pendidikan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
