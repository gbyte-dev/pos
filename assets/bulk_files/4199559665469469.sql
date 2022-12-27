-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2022 at 08:11 AM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u849633655_skote`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` int(11) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `discounted_price` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `supplier` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biller` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `currency`, `cost_price`, `selling_price`, `discounted_price`, `tax`, `supplier`, `biller`, `warehouse`, `display_image`, `sku`, `description`, `category`, `subcategory`, `status`, `quantity`) VALUES
(1, 'Realme 71', 'INR', 120001, 115001, 5001, 51, '3', NULL, '2', '1066273449395859.jpeg', 'Realme1', 'A Mobile Phone of Brand Realme1', 8, 10, '1', 9),
(2, 'testing', 'CYP', 80, 100, 90, 0, '3', NULL, '2', '5586075385764616.jpg', 'tshirt', 'tshirt', 8, 10, '1', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
