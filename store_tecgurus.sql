-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2020 at 10:46 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_tecgurus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `status`) VALUES
(1, 'CellPhone', 1),
(2, 'SmartBand', 1),
(3, 'SmartWatch', 1),
(4, 'Accessory', 1),
(5, 'Protector', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(5) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `price` varchar(20) DEFAULT NULL,
  `discount` varchar(5) NOT NULL,
  `id_category` int(5) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `price`, `discount`, `id_category`, `image`, `status`) VALUES
(1, 'Xiaomi Redmi Note 9', '', '4249', '13', 1, '1281058452Thumb_Xiaomi_Redmi_Note_9_Dual_SIM_128_GB_Blanco_polar_4_GB_RAM.webp', 1),
(2, 'Xiaomi Redmi Note 9S', '', '5589', '', 1, '949502358Thumb_Xiaomi_Redmi_Note_9S_Dual_SIM_128_GB_Gris_interestelar_6_GB_RAM.webp', 1),
(3, 'Xiaomi Mi Band 4 ', '', '749', '', 2, '1075793509Thumb_Xiaomi_Mi_Band_4_Smart_Pulsera_Nueva_100_Original_Garantia.webp', 1),
(4, 'Protectos Galaxy S10', '', '284', '5', 5, '1532329594Thumb_Funda_Protector_De_Pantalla_De_Vidrio_Templado_Psamsung.webp', 1),
(5, 'Moto G7 Play 32 GB', '', '5000', '', 1, '1396779761Thumb_moto_g7_play_32.webp', 1),
(6, 'iPhone 6s 16 GB Gris', '', '4299', '', 1, '1597973497Thumb_iphone_se_64.webp', 1),
(7, 'Xiaomi Redmi Note 9 + Airdots', '', '4598', '', 1, '276741167Thumb_Xiaomi_Redmi_Note_9_Global_4gb_128gb_48mpx_Tws_Airdots_S.webp', 1),
(8, 'Fossil SmartWatch Q', '', '5643', '15', 3, '35038672Thumb_fossil_smartwatch_reloj2.webp', 1),
(9, 'Extensible Tipo Hermès', '', '329', '', 4, '267466679Thumb_extensible_hermes_watch.webp', 1),
(10, 'Xiaomi Mi Smart Band 5', '', '1039', '24', 2, '1879758281Thumb_Xiaomi_mi_band_5_reloj_inteligente.webp', 1),
(11, 'Protector Case Rigido Iphone', '', '268', '', 5, '1484144786Thumb_protector_case_rigido_iphone_11.webp', 1),
(12, 'Audifonos Bluetooth Xiaomi Air', '', '1119', '', 4, '1721751428Thumb_audifonos_xiaomi_airdots_pro.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@tecgurus.net', '751cb3f4aa17c36186f4856c8982bf27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
