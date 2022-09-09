-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Sep 2022 pada 08.39
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(2, 'Miranti', 'P', '00909444099', 'Kebun Sirih', '2022-08-11 13:11:18', '2022-08-11 08:12:36'),
(3, 'Intan Aryani', 'P', '081299009933', 'Bekasi Timur 2', '2022-08-11 13:27:41', '2022-08-11 08:28:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(3, 'Makanan', '2022-08-11 14:08:37', '2022-09-05 06:37:25'),
(4, 'Minuman', '2022-08-11 14:35:33', '2022-08-15 04:27:29'),
(5, 'Elektronik', '2022-09-05 11:37:51', NULL),
(8, 'Mie Instan1', '2022-09-05 13:36:51', '2022-09-05 08:37:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`, `barcode`) VALUES
(1, 'Permen Karet Merah', 3, 3, 2000, 9, 'item-220816-997ea7bb9a.png', '2022-08-12 11:39:19', '2022-08-16 04:02:13', 'B0001'),
(3, 'Kue Tar', 3, 3, 2000, 18, NULL, '2022-08-15 10:01:52', NULL, 'B0003'),
(6, 'Coca Cola', 4, 3, 2000, 0, 'item-220815-74d33cd5d4.png', '2022-08-15 16:23:44', NULL, 'B0004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(3, 'Pcs', '2022-08-11 14:08:37', '2022-08-11 11:42:39'),
(4, 'Kilogram', '2022-08-11 14:35:33', '2022-08-11 11:42:51'),
(6, 'Batang', '2022-08-11 16:45:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'PT Vantsing International Group', '08198399832', 'Jl. Dr suprapro grogol. ', NULL, '2022-08-10 14:49:50', NULL),
(2, 'PT Velocetrax', '0909490949', 'Jl Mega Kuningan', NULL, '2022-08-10 14:49:50', NULL),
(3, 'Toko Surya Kencana', '00909444099', 'Bayu', NULL, '2022-08-11 09:59:20', NULL),
(4, 'Toko Jaya Sejahtera 2', '081299009933', 'Hadi', NULL, '2022-08-11 10:01:39', '2022-08-11 05:43:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(12, 'DP2208310001', NULL, 8000, 0, 8000, 5000, -3000, '', '2022-08-31', 1, '2022-08-31 09:45:59'),
(13, 'DP2208310002', NULL, 14000, 0, 14000, 20000, 6000, 'lunas', '2022-08-31', 1, '2022-08-31 15:15:30'),
(14, 'DP2208310003', NULL, 3500, 0, 3500, 5000, 1500, 'lunas', '2022-08-31', 1, '2022-08-31 15:46:13'),
(15, 'DP2208310004', NULL, 3500, 0, 3500, 5000, 1500, 'ok', '2022-08-31', 1, '2022-08-31 15:47:52'),
(16, 'DP2208310005', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-08-31', 1, '2022-08-31 15:57:21'),
(17, 'DP2208310006', NULL, 2000, 0, 2000, 3000, 1000, '', '2022-08-31', 1, '2022-08-31 16:02:08'),
(18, 'DP2208310007', NULL, 2000, 0, 2000, 5000, 3000, 'ok', '2022-08-31', 1, '2022-08-31 16:08:45'),
(19, 'DP2208310008', NULL, 2000, 0, 2000, 5000, 3000, '', '2022-08-31', 1, '2022-08-31 16:09:48'),
(20, 'DP2208310009', NULL, 2000, 0, 2000, 5000, 3000, 'ok', '2022-08-31', 1, '2022-08-31 16:10:36'),
(21, 'DP2208310010', NULL, 2000, 0, 2000, 5000, 3000, 'ok', '2022-08-31', 1, '2022-08-31 16:11:08'),
(22, 'DP2208310011', NULL, 2000, 0, 2000, 5000, 3000, '', '2022-08-31', 1, '2022-08-31 16:13:11'),
(23, 'DP2208310012', NULL, 2000, 0, 2000, 5000, 3000, 'ok', '2022-08-31', 1, '2022-08-31 16:14:21'),
(24, 'DP2208310013', NULL, 2000, 0, 2000, 5000, 3000, 'ok', '2022-08-31', 1, '2022-08-31 16:16:20'),
(25, 'DP2208310014', NULL, 2000, 0, 2000, 5000, 3000, 'ok', '2022-08-31', 1, '2022-08-31 16:21:23'),
(28, 'DP2209010002', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:14:12'),
(29, 'DP2209010003', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:14:22'),
(30, 'DP2209010004', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:14:58'),
(31, 'DP2209010005', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:15:14'),
(32, 'DP2209010006', NULL, 2000, 0, 2000, 3000, 1000, '', '2022-09-01', 1, '2022-09-01 08:16:20'),
(33, 'DP2209010007', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:17:03'),
(34, 'DP2209010008', NULL, 2000, 0, 2000, 3000, 1000, '', '2022-09-01', 1, '2022-09-01 08:20:41'),
(35, 'DP2209010009', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:27:06'),
(36, 'DP2209010010', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:32:00'),
(37, 'DP2209010011', NULL, 2000, 0, 2000, 3000, 1000, '', '2022-09-01', 1, '2022-09-01 08:33:20'),
(38, 'DP2209010012', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:37:43'),
(39, 'DP2209010013', NULL, 2000, 0, 2000, 5000, 3000, 'ok', '2022-09-01', 1, '2022-09-01 08:43:18'),
(40, 'DP2209010014', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 08:50:50'),
(41, 'DP2209010015', NULL, 2000, 0, 2000, 3000, 1000, 'ok lagi', '2022-09-01', 1, '2022-09-01 08:53:17'),
(42, 'DP2209010016', NULL, 2000, 0, 2000, 4000, 2000, 'ok', '2022-09-01', 1, '2022-09-01 09:02:03'),
(43, 'DP2209010017', NULL, 2000, 0, 2000, 3000, 1000, 'testlzgi', '2022-09-01', 1, '2022-09-01 09:14:19'),
(44, 'DP2209010018', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 09:15:20'),
(45, 'DP2209010019', NULL, 2000, 0, 2000, 5000, 3000, 'vfdvfd', '2022-09-01', 1, '2022-09-01 09:20:24'),
(46, 'DP2209010020', NULL, 2000, 0, 2000, 5000, 3000, 'vcxvxcv', '2022-09-01', 1, '2022-09-01 09:21:12'),
(47, 'DP2209010021', NULL, 2000, 0, 2000, 5000, 3000, 'vcxvxcv', '2022-09-01', 1, '2022-09-01 09:21:15'),
(48, 'DP2209010022', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 09:22:24'),
(49, 'DP2209010023', NULL, 2000, 0, 2000, 3000, 1000, 'fgfd', '2022-09-01', 1, '2022-09-01 09:26:59'),
(50, 'DP2209010024', NULL, 4000, 0, 4000, 5000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 09:32:44'),
(51, 'DP2209010025', NULL, 6000, 0, 6000, 30000, 24000, 'gg', '2022-09-01', 1, '2022-09-01 09:39:19'),
(52, 'DP2209010026', NULL, 2000, 0, 2000, 3000, 1000, 'ok', '2022-09-01', 1, '2022-09-01 09:45:36'),
(53, 'DP2209010027', NULL, 2000, 0, 2000, 4000, 2000, 'bcbb', '2022-09-01', 1, '2022-09-01 09:46:47'),
(54, 'DP2209010028', NULL, 2000, 0, 2000, 4000, 2000, 'bvb', '2022-09-01', 1, '2022-09-01 09:47:21'),
(55, 'DP2209010029', 2, 2000, 0, 2000, 3000, 1000, 'gdfg', '2022-09-01', 1, '2022-09-01 10:21:54'),
(56, 'DP2209010030', 3, 2000, 0, 2000, 3000, 1000, 'nnnn', '2022-09-01', 1, '2022-09-01 10:26:41'),
(57, 'DP2209010031', NULL, 2000, 0, 2000, 3000, 1000, 'rtertert', '2022-09-01', 1, '2022-09-01 10:46:04'),
(58, 'DP2209010032', NULL, 2000, 0, 2000, 4000, 2000, 'bvbv', '2022-09-01', 1, '2022-09-01 10:59:24'),
(59, 'DP2209010033', 2, 2000, 0, 2000, 30000, 28000, '', '2022-09-01', 1, '2022-09-01 11:03:59'),
(60, 'DP2209010034', 2, 2000, 0, 2000, 30000, 28000, 'bvb', '2022-09-01', 1, '2022-09-01 11:05:57'),
(61, 'DP2209050001', NULL, 2000, 0, 2000, 4000, 2000, 'kasir', '2022-09-05', 2, '2022-09-05 15:04:09'),
(62, 'DP2209060001', NULL, 20000, 0, 20000, 70000, 50000, 'coba', '2022-09-06', 1, '2022-09-06 11:32:19'),
(63, 'DP2209080001', NULL, 4000, 0, 4000, 5000, 1000, 'coba', '2022-09-08', 1, '2022-09-08 13:23:24');

--
-- Trigger `t_sale`
--
DELIMITER $$
CREATE TRIGGER `del_detail` AFTER DELETE ON `t_sale` FOR EACH ROW BEGIN
	DELETE FROM t_sale_detail
    WHERE sale_id = OLD.sale_id;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(11, 12, 1, 2000, 1, 0, 2000),
(12, 12, 3, 2000, 2, 0, 8000),
(13, 13, 1, 2000, 4, 0, 8000),
(14, 13, 3, 2000, 3, 0, 6000),
(15, 14, 3, 2000, 1, 0, 2000),
(16, 14, 1, 2000, 1, 500, 1500),
(17, 15, 3, 2000, 1, 0, 2000),
(18, 15, 1, 2000, 1, 500, 1500),
(19, 16, 1, 2000, 1, 0, 2000),
(20, 17, 3, 2000, 1, 0, 2000),
(21, 18, 3, 2000, 1, 0, 2000),
(22, 19, 3, 2000, 1, 0, 2000),
(23, 20, 3, 2000, 1, 0, 2000),
(24, 21, 1, 2000, 1, 0, 2000),
(25, 22, 3, 2000, 1, 0, 2000),
(26, 23, 3, 2000, 1, 0, 2000),
(27, 24, 1, 2000, 1, 0, 2000),
(28, 25, 3, 2000, 1, 0, 2000),
(31, 28, 1, 2000, 1, 0, 2000),
(32, 31, 3, 2000, 1, 0, 2000),
(33, 32, 1, 2000, 1, 0, 2000),
(34, 33, 3, 2000, 1, 0, 2000),
(35, 34, 1, 2000, 1, 0, 2000),
(36, 35, 3, 2000, 1, 0, 2000),
(37, 36, 3, 2000, 1, 0, 2000),
(38, 37, 1, 2000, 1, 0, 2000),
(39, 38, 3, 2000, 1, 0, 2000),
(40, 39, 1, 2000, 1, 0, 2000),
(41, 40, 1, 2000, 1, 0, 2000),
(42, 41, 3, 2000, 1, 0, 2000),
(43, 42, 3, 2000, 1, 0, 2000),
(44, 43, 1, 2000, 1, 0, 2000),
(45, 44, 3, 2000, 1, 0, 2000),
(46, 48, 3, 2000, 1, 0, 2000),
(47, 51, 1, 2000, 3, 0, 6000),
(48, 52, 1, 2000, 1, 0, 2000),
(49, 53, 1, 2000, 1, 0, 2000),
(50, 54, 1, 2000, 1, 0, 2000),
(51, 55, 1, 2000, 1, 0, 2000),
(52, 56, 1, 2000, 1, 0, 2000),
(53, 57, 3, 2000, 1, 0, 2000),
(54, 58, 1, 2000, 1, 0, 2000),
(55, 59, 1, 2000, 1, 0, 2000),
(56, 60, 3, 2000, 1, 0, 2000),
(57, 61, 1, 2000, 1, 0, 2000),
(58, 62, 3, 2000, 10, 0, 20000),
(59, 63, 3, 2000, 1, 0, 2000),
(60, 63, 1, 2000, 1, 0, 2000);

--
-- Trigger `t_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `t_sale_detail` FOR EACH ROW BEGIN

UPDATE p_item SET stock = stock - NEW.qty
WHERE item_id = NEW.item_id;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_return` AFTER DELETE ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = stock + OLD.qty
    WHERE item_id = OLD.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(250) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `updated`, `user_id`) VALUES
(4, 3, 'in', 'warna merah', NULL, 30, '2022-08-19', '2022-08-19 13:37:17', NULL, 1),
(5, 1, 'in', 'barang masuk', 1, 20, '2022-08-22', '2022-08-22 15:18:09', NULL, 1),
(7, 1, 'in', 'Rusak', NULL, 2, '2022-08-22', '2022-08-22 15:32:41', NULL, 1),
(8, 1, 'out', 'Rusak', NULL, 3, '2022-08-22', '2022-08-22 15:52:31', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text,
  `level` int(1) NOT NULL COMMENT '1: admin, 2: kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Nurul Hidayat', 'JL. Pelumpang Raya no.29', 1),
(2, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'fauzi', 'Bekasi Timur pondok ungu', 2),
(5, 'miranti', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Miranti Ayunda', 'Cakung Timur', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `p_item_ibfk_1` (`category_id`),
  ADD KEY `p_item_ibfk_2` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `t_stock_ibfk_2` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
