-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2023 at 12:55 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_rapat`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori` bigint(20) NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(6, 1, 'Rapat Bulanan', '2023-03-22 00:38:34', '2023-03-22 00:38:34'),
(7, 2, 'Rapat Tahunan', '2023-03-22 00:38:46', '2023-03-22 00:38:46'),
(8, 3, 'Rapat Mingguan', '2023-03-22 00:39:08', '2023-03-22 00:39:08'),
(9, 4, 'Diskusi', '2023-03-22 00:50:30', '2023-03-22 00:50:30'),
(10, 6, 'coba', '2023-03-22 03:22:50', '2023-03-22 03:22:50'),
(11, 7, 'sembarang', '2023-03-22 03:23:06', '2023-03-22 03:23:06');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2023_02_27_040332_create_rapat_table', 1),
(16, '2023_02_28_144233_create_kategori_table', 1),
(17, '2023_03_17_133901_add_image_to_users_table', 2),
(19, '2023_03_18_024011_create_kategori_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rapat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_rapat` date NOT NULL,
  `waktu_rapat` time NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_rapat` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`id`, `nama_rapat`, `tanggal_rapat`, `waktu_rapat`, `kategori`, `gambar`, `hasil_rapat`, `created_at`, `updated_at`) VALUES
(28, 'dawdaw', '2023-03-18', '09:17:00', 'Rapat Bulanan', NULL, 'awdwa', '2023-03-17 18:17:39', '2023-03-17 23:39:41'),
(29, 'dawdwad', '2023-03-18', '09:17:00', 'Rapat Bulanan', NULL, 'dwadw', '2023-03-17 18:17:49', '2023-03-17 18:17:49'),
(30, 'awdawd', '2023-03-25', '09:17:00', 'Rapat Bulanan', NULL, 'dawdaw', '2023-03-17 18:17:59', '2023-03-17 18:17:59'),
(31, 'dawdawd', '2023-03-25', '09:18:00', 'Rapat Bulanan', NULL, 'dawdawd', '2023-03-17 18:18:10', '2023-03-17 18:18:10'),
(32, 'kepo amat se', '2023-03-25', '09:18:00', 'Rapat Bulanan', '(NULL)', 'sembarang wes', '2023-03-17 18:18:26', '2023-03-21 06:25:34'),
(34, 'coba', '2023-04-07', '15:05:00', 'Rapat Bulanan', NULL, 'dawdaw', '2023-03-18 00:05:51', '2023-03-18 00:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `image`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '18-03-2023_69_logo smk cerme new.png', 'Administrator', 'admin@gmail.com', NULL, '$2y$10$V6htVisM6iVJ2OQ6bCmnK.j0YZhTgOC8UsXaGEtSSaM.K27JiwbQy', NULL, '2023-03-04 17:48:38', '2023-03-21 17:09:19'),
(2, 'Fikri Zumar', '22-03-2023_931_fotoku.jpg', 'Administrator', 'fikrizumar@gmail.com', NULL, '$2y$10$Y45.Xb81NPf4Cnv3peX31.cnQOcquM3yfMgdmma7Gzlh9bg3JG2Re', NULL, '2023-03-04 17:54:20', '2023-03-22 00:10:49'),
(3, 'Zumar', NULL, NULL, 'zumar@gmail.com', NULL, '$2y$10$CrAFT/u5t0jCrsUDByrXq.RJ0.qq0E6SuGDsKycyEWfRb83kvbp7G', NULL, '2023-03-04 20:00:59', '2023-03-04 20:00:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
