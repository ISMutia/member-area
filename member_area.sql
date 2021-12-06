-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 01:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `member_area`
--

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_bills`
--

CREATE TABLE `m_bills` (
  `id` int(11) NOT NULL,
  `id_h_orders` int(11) NOT NULL,
  `bukti` text DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_bills`
--

INSERT INTO `m_bills` (`id`, `id_h_orders`, `bukti`, `id_status`, `total_bayar`, `created_at`, `updated_at`) VALUES
(4, 4, NULL, 2, 7000000, NULL, '2021-12-06 05:28:08'),
(5, 5, NULL, 2, 5000000, NULL, NULL),
(6, 6, NULL, 3, 0, NULL, NULL),
(7, 7, NULL, 4, 7000000, NULL, NULL),
(15, 8, NULL, 2, 7000000, '2021-12-06 04:55:03', '2021-12-06 05:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `m_domain`
--

CREATE TABLE `m_domain` (
  `id` int(11) NOT NULL,
  `id_price` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_domain`
--

INSERT INTO `m_domain` (`id`, `id_price`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '.com', NULL, NULL),
(2, 2, '.com', NULL, NULL),
(3, 3, '.com', NULL, NULL),
(4, 3, '.co.id', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_price`
--

CREATE TABLE `m_price` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_price`
--

INSERT INTO `m_price` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'silver', 3500000, 'Perpanjangan Rp. 1.500.000 / Tahun\r\nNama Domain .Com\r\nKapasitas Penyimpanan Data Unlimited\r\nBandwidth Unlimited\r\nDesain Web Sesuai Permintaan\r\nFasilitas Halaman Admin\r\nTraining Halaman Admin\r\n1 Akun Webmail\r\nMaintenance Google Ads 1 Minggu\r\nTraining Optimasi Website', NULL, NULL),
(2, 'gold', 5000000, 'Perpanjangan Rp. 2.500.000 / Tahun\r\nNama Domain .Com\r\nKapasitas Penyimpanan Data Unlimited\r\nBandwidth Unlimited\r\nDesain Web Sesuai Permintaan\r\nFasilitas Halaman Admin\r\nTraining Halaman Admin\r\nAkun Webmail Unlimited\r\nMaintenance Google Ads 1 Bulan\r\nTraining Optimasi Website\r\nTraining Optimasi Media Sosial', NULL, NULL),
(3, 'platinum', 7000000, 'Perpanjangan Rp. 7.000.000 /Tahun\r\nNama Domain .Com dan .Co.Id\r\nKapasitas Penyimpanan Data Unlimited\r\nBandwidth Unlimited\r\nDesain Web Sesuai Permintaan\r\nFasilitas Halaman Admin\r\nTraining dan Modul Halaman Admin\r\nAkun Webmail Unlimited\r\nAkses Login CPanel\r\nMaintenance Google Ads 1 Bulan\r\nTraining Optimasi Website & Media Sosial\r\n', NULL, NULL),
(5, 'mmmmmmmmmm', 6000000, 'aaaaaaaaaaaaaaaaaaaaa', '2021-12-05 23:32:56', '2021-12-06 05:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'active', NULL, NULL),
(2, 'succes', NULL, NULL),
(3, 'failed', NULL, NULL),
(4, 'on progress', NULL, NULL),
(13, 'kkkkkk', NULL, '2021-12-06 04:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'OktimBug4ZU1MbGtADGQDq1PEDBZQrZBwtuiPshu', NULL, 'http://localhost', 1, 0, 0, '2021-12-05 01:46:46', '2021-12-05 01:46:46'),
(2, NULL, 'Laravel Password Grant Client', '7MUcX8tPFXkXId2sNEVOVIuKXL2tXJF4m8x57tTC', 'users', 'http://localhost', 0, 1, 0, '2021-12-05 01:46:46', '2021-12-05 01:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-05 01:46:46', '2021-12-05 01:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trans_d_orders`
--

CREATE TABLE `trans_d_orders` (
  `id` int(11) NOT NULL,
  `id_h_orders` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_d_orders`
--

INSERT INTO `trans_d_orders` (`id`, `id_h_orders`, `progress`, `created_at`, `updated_at`) VALUES
(3, 5, 100, NULL, NULL),
(4, 4, 90, NULL, NULL),
(6, 6, 0, NULL, NULL),
(7, 7, 70, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_h_orders`
--

CREATE TABLE `trans_h_orders` (
  `id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `id_customers` int(11) NOT NULL,
  `id_price` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `lama_p` varchar(50) NOT NULL,
  `mulai_p` date NOT NULL,
  `selesai_p` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_h_orders`
--

INSERT INTO `trans_h_orders` (`id`, `project_name`, `id_customers`, `id_price`, `id_domain`, `lama_p`, `mulai_p`, `selesai_p`, `created_at`, `updated_at`) VALUES
(4, 'Fathforce', 1, 3, 3, '2 bulan', '2021-10-01', '2021-11-30', NULL, NULL),
(5, 'Memberarea', 2, 2, 2, '2 bulan', '2021-10-01', '2021-11-30', NULL, NULL),
(6, 'LacLaundry', 5, 3, 3, '2 bulan', '2021-10-01', '2021-11-30', NULL, NULL),
(7, 'Kasir Boba', 3, 3, 2, '2 bulan', '2021-10-01', '2021-11-30', NULL, '2021-12-05 23:24:41'),
(8, 'SmartQuran', 4, 2, 2, '2 bulan', '2021-10-01', '2021-11-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_h_testimonial`
--

CREATE TABLE `trans_h_testimonial` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_customers` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_h_testimonial`
--

INSERT INTO `trans_h_testimonial` (`id`, `description`, `id_customers`, `created_at`, `updated_at`) VALUES
(1, 'good', 1, NULL, NULL),
(2, 'nice', 3, NULL, NULL),
(3, 'amazing', 2, NULL, NULL),
(4, 'wow', 4, NULL, NULL),
(5, 'mantap', 5, NULL, NULL),
(6, 'good', 18, '2021-12-06 05:18:32', '2021-12-06 05:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `gambar` text DEFAULT NULL,
  `status` enum('admin','customer','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `date_birth`, `email`, `password`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mutia', '2000-10-04', 'adikmutia@gmail.com', '12345678', NULL, 'customer', NULL, '2021-12-02 00:00:51'),
(2, 'lin', '2021-05-03', 'lin1234@gmail.com', '12345678', NULL, 'customer', NULL, '2021-12-02 00:00:46'),
(3, 'fina', '2000-11-06', 'fina1234@gmail.com', '12345678', NULL, 'customer', NULL, '2021-12-02 00:00:40'),
(4, 'putri', '2000-10-14', 'putri1234@gmail.com', '12345678', NULL, 'customer', NULL, '2021-12-02 00:00:35'),
(5, 'doni', '1998-01-21', 'doni1234@gmail.com', '12345678', NULL, 'customer', NULL, '2021-12-02 00:00:28'),
(6, 'admin', '2000-10-04', 'admin1234@gmail.com', '12345678', NULL, 'admin', NULL, NULL),
(18, 'kkkkkkkk', '2000-10-09', 'hhhhh@gmail.com', '12345678', NULL, 'customer', '2021-12-05 20:42:40', '2021-12-06 05:23:00');

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
-- Indexes for dumped tables
--

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
-- Indexes for table `m_bills`
--
ALTER TABLE `m_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_h_orders` (`id_h_orders`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `m_domain`
--
ALTER TABLE `m_domain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_price` (`id_price`);

--
-- Indexes for table `m_price`
--
ALTER TABLE `m_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `trans_d_orders`
--
ALTER TABLE `trans_d_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_h_orders` (`id_h_orders`);

--
-- Indexes for table `trans_h_orders`
--
ALTER TABLE `trans_h_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customers` (`id_customers`),
  ADD KEY `id_price` (`id_price`),
  ADD KEY `id_domain` (`id_domain`);

--
-- Indexes for table `trans_h_testimonial`
--
ALTER TABLE `trans_h_testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customers` (`id_customers`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_bills`
--
ALTER TABLE `m_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_domain`
--
ALTER TABLE `m_domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_price`
--
ALTER TABLE `m_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_d_orders`
--
ALTER TABLE `trans_d_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trans_h_orders`
--
ALTER TABLE `trans_h_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trans_h_testimonial`
--
ALTER TABLE `trans_h_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_bills`
--
ALTER TABLE `m_bills`
  ADD CONSTRAINT `m_bills_ibfk_1` FOREIGN KEY (`id_h_orders`) REFERENCES `trans_h_orders` (`id`),
  ADD CONSTRAINT `m_bills_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `m_status` (`id`);

--
-- Constraints for table `m_domain`
--
ALTER TABLE `m_domain`
  ADD CONSTRAINT `m_domain_ibfk_1` FOREIGN KEY (`id_price`) REFERENCES `m_price` (`id`);

--
-- Constraints for table `trans_d_orders`
--
ALTER TABLE `trans_d_orders`
  ADD CONSTRAINT `trans_d_orders_ibfk_1` FOREIGN KEY (`id_h_orders`) REFERENCES `trans_h_orders` (`id`);

--
-- Constraints for table `trans_h_orders`
--
ALTER TABLE `trans_h_orders`
  ADD CONSTRAINT `trans_h_orders_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `trans_h_orders_ibfk_2` FOREIGN KEY (`id_price`) REFERENCES `m_price` (`id`),
  ADD CONSTRAINT `trans_h_orders_ibfk_3` FOREIGN KEY (`id_domain`) REFERENCES `m_domain` (`id`);

--
-- Constraints for table `trans_h_testimonial`
--
ALTER TABLE `trans_h_testimonial`
  ADD CONSTRAINT `trans_h_testimonial_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
