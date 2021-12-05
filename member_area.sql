-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 07:23 AM
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
(4, 4, NULL, 4, 7000000, NULL, NULL),
(5, 5, NULL, 2, 5000000, NULL, NULL),
(6, 6, NULL, 3, 0, NULL, NULL),
(7, 7, NULL, 4, 7000000, NULL, NULL),
(8, 8, NULL, 1, 5000000, NULL, NULL),
(10, 4, NULL, 5, 0, NULL, NULL);

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
(3, 'platinum', 7000000, 'Perpanjangan Rp. 7.000.000 /Tahun\r\nNama Domain .Com dan .Co.Id\r\nKapasitas Penyimpanan Data Unlimited\r\nBandwidth Unlimited\r\nDesain Web Sesuai Permintaan\r\nFasilitas Halaman Admin\r\nTraining dan Modul Halaman Admin\r\nAkun Webmail Unlimited\r\nAkses Login CPanel\r\nMaintenance Google Ads 1 Bulan\r\nTraining Optimasi Website & Media Sosial\r\n', NULL, NULL);

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
(5, 'expired', NULL, NULL),
(7, 'terserah', '2021-12-03 02:55:12', '2021-12-03 02:55:12'),
(8, 'terserah', '2021-12-03 02:57:42', '2021-12-03 02:57:42');

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
(7, 7, 70, NULL, NULL),
(8, 8, 100, NULL, NULL);

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
(7, 'Kasir Boba', 3, 3, 4, '2 bulan', '2021-10-01', '2021-11-30', NULL, NULL),
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
(5, 'mantap', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
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
(6, 'admin', '2000-10-04', 'admin1234@gmail.com', '12345678', NULL, 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_bills`
--
ALTER TABLE `m_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_domain`
--
ALTER TABLE `m_domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_price`
--
ALTER TABLE `m_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trans_d_orders`
--
ALTER TABLE `trans_d_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trans_h_orders`
--
ALTER TABLE `trans_h_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trans_h_testimonial`
--
ALTER TABLE `trans_h_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
