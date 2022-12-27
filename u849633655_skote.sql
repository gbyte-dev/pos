-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2022 at 05:16 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `account_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_number`, `name`, `initial`, `balance_note`) VALUES
(3, '693025874102365111', 'Test11', 'TE111', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa1111'),
(4, '12345678911', 'Ajay11', '100011', 'Nore11');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `phone` text DEFAULT NULL,
  `profile_picture` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '1=admin,2=biller'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `profile_picture`, `address`, `role`) VALUES
(1, 'test', 'admin', 'admin@gmail.com', '1234', '9876543210', NULL, 'adgdfg', 1),
(4, 'Test', 'Biller', 'testadmin@gmail.com', '1234', '98765432101', '9680973208966817.png', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 2),
(5, 'bhdfg', 'dasd', 'sdfgdfgd@sgsdf.com', 'sdfgdfgd@sgsdf.com', '423423423', '', 'sdfs', 2),
(6, 'fsdf', 'sdfsdf', 'sfsdfsdsd@gmail.com', 'sfsdfsdsd@gmail.com', '234234234', '7917468591457593.jpg', 'fsdfdsdf', 2),
(7, 'first_name', 'last_name', 'email', 'password', 'phone', NULL, 'address', 0),
(8, 'Test', 'Name', 'test@gmail.com', '1234', '9876543210', NULL, 'Test Address', 2);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_logo`, `brand_description`) VALUES
(2, 'Puma', '8073966419895553.jpg', 'Best Brand'),
(5, 'Apple', '2773299659126638.jpg', 'Too much costly '),
(7, 'aa', '1759003424336134.jpg', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(7, 'test 1'),
(8, 'Phones');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` int(11) DEFAULT NULL,
  `limit_coupon` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `min_purchase` int(11) DEFAULT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `coupon_code`, `coupon_type`, `limit_coupon`, `start_date`, `expire_date`, `min_purchase`, `max_discount`, `discount`, `discount_type`) VALUES
(1, 'Test', 'TEST100', 2, 10, '2022-11-29', '2022-12-16', 100, 100, 50, 2),
(4, 'Test2', 'demo500', 1, 10, '2022-11-01', '2022-11-29', 99, 150, 10, 1),
(5, 'Limit test', 'limit10', 1, 1, '2022-11-20', '2022-11-30', 1000, 100, 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `email`, `address`, `status`) VALUES
(5, 'Ranu', 'Mondal', '8737763421', 'modal@gmail.com', 'Bihar, Uttar Pradesh', NULL),
(8, 'Test', 'Customer', '9876543210', 'admin@gmail.com', 'Test Address', '1'),
(16, 'Anoop', 'Maurya', '9876543210', 'superadmin@gmail.com', 'Gudamba Thana Lucknow', '1'),
(17, 'She', 'Hulk', '786856523', 'she@gmail.com', 'Mars', '1'),
(18, 'Captain ', 'America', '9876543210', 'admin@gmail.com', 'Gudamba Thana Lucknow', '1'),
(19, 'first_name', 'last_name', 'phone', 'email', 'address', '1'),
(20, 'Test', 'Name', '9876543210', 'test@gmail.com', 'Test Address', '1'),
(21, 'first_name', 'last_name', 'phone', 'email', 'address', '1'),
(22, 'Test', 'Name', '9876543210', 'test@gmail.com', 'Test Address', '1'),
(24, 'Test', 'Name', '9876543210', 'test@gmail.com', 'Test Address', '1'),
(25, 'Anoop1', 'Maurya1', '9876543210', 'admin@gmail.com', 'Test Address', '1'),
(26, 'Test User', 'three', '9443987443', 'Testuser@gmail.com', 'new road, lucknow, india', '1');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `expense_category` int(11) DEFAULT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `created_date`, `expense_category`, `warehouse`, `amount`, `note`) VALUES
(2, '2022-11-23', 2, 2, 21, 'dasd'),
(3, '2022-11-23', 1, 5, 123, 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `expense_category` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `expense_category`) VALUES
(1, 'Test Category'),
(2, 'Test Category1');

-- --------------------------------------------------------

--
-- Table structure for table `final_cart`
--

CREATE TABLE `final_cart` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `product_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unitprice` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_subtotal` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unittax` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_subtax` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_finalprice` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `cart_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_subdiscount` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biller_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_cart`
--

INSERT INTO `final_cart` (`id`, `sale_id`, `product_id`, `product_qty`, `product_unitprice`, `currency`, `product_subtotal`, `product_unittax`, `product_subtax`, `product_finalprice`, `create_date`, `cart_key`, `product_discount`, `product_subdiscount`, `biller_id`) VALUES
(12, 6, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:44:17', '5962231430', '10', '20', 1),
(13, 6, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:44:17', '5962231430', '100', '200', 1),
(14, 7, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:47:27', '9219591038', '10', '20', 1),
(15, 7, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:47:27', '9219591038', '100', '200', 1),
(16, 8, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:55:20', '6641147132', '10', '20', 1),
(17, 8, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:55:20', '6641147132', '100', '200', 1),
(18, 9, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:56:05', '8485772650', '10', '20', 1),
(19, 10, '9', '5', '450', 'INR', '2250', '10', '50', '2250', '2022-11-23 06:48:58', '1881908141', '50', '250', 1),
(20, 11, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 06:54:20', '9465663008', '10', '20', 1),
(21, 11, '9', '2', '450', 'INR', '900', '10', '20', '900', '2022-11-23 06:54:20', '9465663008', '50', '100', 1),
(22, 12, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 06:55:12', '4031694513', '10', '20', 1),
(23, 12, '9', '2', '450', 'INR', '900', '10', '20', '900', '2022-11-23 06:55:12', '4031694513', '50', '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `money_transfer`
--

CREATE TABLE `money_transfer` (
  `id` int(11) NOT NULL,
  `from_account` int(11) DEFAULT NULL,
  `to_account` int(11) DEFAULT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `money_transfer`
--

INSERT INTO `money_transfer` (`id`, `from_account`, `to_account`, `amount`) VALUES
(2, 3, 4, '1000'),
(3, 4, 4, '100'),
(4, 3, 3, '111');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment`) VALUES
(1, 'Paypal'),
(3, 'UPI'),
(10, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `productImages`
--

CREATE TABLE `productImages` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productImages`
--

INSERT INTO `productImages` (`id`, `name`, `product_id`, `created_at`) VALUES
(8, '8911909262379591.png', 9, '2022-11-05 13:11:37'),
(9, '3643045031517031.png', 10, '2022-11-05 13:15:40'),
(10, '6216152919766715.png', 10, '2022-11-05 13:15:40'),
(11, '9138522892537601.png', 10, '2022-11-05 13:15:40'),
(12, '6515518845021994.png', 1, '2022-11-07 08:21:18'),
(13, '2105482333470485.png', 12, '2022-11-07 07:11:03'),
(14, '8506605186070167.png', 13, '2022-11-07 07:16:23'),
(15, '5163470537297002.png', 13, '2022-11-07 07:16:23'),
(37, '5389899236298131.png', 16, '2022-11-07 12:51:00'),
(38, '6691077921011688.png', 16, '2022-11-07 12:51:00'),
(39, '9411391835413547.png', 16, '2022-11-07 12:51:00'),
(42, '5707568173185992.jpeg', 16, '2022-11-07 13:13:53'),
(43, '4351790258093111.jpg', 17, '2022-11-08 05:15:00'),
(44, '8751888778840334.png', 17, '2022-11-08 05:15:00'),
(45, '3545518436508915.png', 17, '2022-11-08 05:15:54'),
(49, '2525912563443514.png', 18, '2022-11-08 10:40:00'),
(50, '6468089191136451.png', 18, '2022-11-08 10:40:00'),
(51, '5511545936390637.png', 19, '2022-11-09 06:21:50'),
(52, '8644230332005799.png', 19, '2022-11-09 06:21:50'),
(53, '1710345797130582.png', 20, '2022-11-09 12:00:53'),
(54, '7057779588042163.png', 20, '2022-11-09 12:00:53'),
(55, '3060893007311016.jpeg', 21, '2022-11-10 07:58:55'),
(56, '2819482195730014.jpg', 21, '2022-11-10 07:58:55'),
(57, '6027239193529828.jpeg', 22, '2022-11-10 09:53:32'),
(58, '8170757058785636.png', 29, '2022-11-11 10:24:59'),
(59, '4884409364554418.jpeg', 1, '2022-11-12 05:35:41'),
(60, '6594782057067693.jpeg', 1, '2022-11-12 05:35:41'),
(61, '1883083502789059.jpeg', 2, '2022-11-12 10:40:59'),
(62, '6888582561141283.jpg', 2, '2022-11-12 10:40:59'),
(63, '1502057839010438.png', 3, '2022-11-14 10:12:16'),
(64, '2747369085852970.png', 3, '2022-11-14 10:12:16'),
(65, '5650595807401906.png', 3, '2022-11-14 10:12:16'),
(66, '9794451343385934.png', 6, '2022-11-22 11:32:12'),
(67, '7930610843239449.png', 6, '2022-11-22 11:32:12'),
(68, '5484741868326165.png', 6, '2022-11-22 11:32:12'),
(69, '7983841535976461.png', 7, '2022-11-22 11:33:28'),
(70, '6095554913367041.png', 7, '2022-11-22 11:33:28'),
(71, '2596385337237721.png', 7, '2022-11-22 11:33:28'),
(72, '8554811953583294.jpg', 8, '2022-11-23 05:00:36'),
(73, '5493602536542252.jpg', 10, '2022-11-23 05:02:46'),
(74, '4871619585680414.jpg', 83, '2022-12-05 05:39:33');

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

INSERT INTO `products` (`id`, `product_name`, `currency`, `cost_price`, `selling_price`, `discounted_price`, `tax`, `supplier`, `warehouse`, `display_image`, `sku`, `description`, `category`, `subcategory`, `status`, `quantity`) VALUES
(8, 'Product A', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, NULL, '1', 238),
(9, 'Product B', 'INR', 400, 500, 450, 10, '10', '4', '6503606585286931.jpg', 'prob', 'Product B', 8, 11, '1', 499),
(10, 'Product C', 'INR', 800, 1000, 900, 50, '5', '5', '6373776626197850.png', 'proc', 'Product C', 8, 10, '1', 380),
(86, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 0),
(87, 'Product E', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 0),
(88, 'Product F', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 0),
(93, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', -33),
(94, 'Product A', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, NULL, '1', 50),
(95, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 0),
(96, 'Product A', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, NULL, '1', 5),
(97, 'Product E', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 7),
(98, 'Product F', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 8),
(99, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 1),
(100, 'Product E', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 2),
(101, 'Product D', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 1),
(102, 'Product E', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 0),
(103, 'Product F', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 0),
(104, 'Product A', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, NULL, '1', 1),
(105, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 1),
(106, 'Product B', 'INR', 400, 500, 450, 10, '10', '5', '6503606585286931.jpg', 'prob', 'Product B', 8, 11, '1', 1),
(107, 'Product E', 'INR', 80, 100, 90, 0, '12', '5', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 2),
(108, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 10),
(109, 'Product E', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 2),
(110, 'Product D', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 1),
(111, 'Product E', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 2),
(112, 'Product A', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, NULL, '1', 5),
(113, 'Product E', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 4),
(114, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 2),
(115, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 6),
(116, 'Product E', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 5),
(117, 'Product D', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 3),
(118, 'Product F', 'INR', 80, 100, 90, 0, '12', '2', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 3),
(119, 'Product A', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, NULL, '1', 1),
(120, 'Product E', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 2),
(121, 'Product D', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 34),
(122, 'Product D', 'INR', 80, 100, 90, 0, '12', '4', '6475027477676975.jpeg', 'proa', 'Product A', 7, 0, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `random_num` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `extra_discount` int(11) DEFAULT NULL,
  `coupon_discount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `biller_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `random_num`, `cost_price`, `sale_date`, `payment_method`, `sub_total`, `product_discount`, `extra_discount`, `coupon_discount`, `coupon_code`, `tax`, `biller_id`) VALUES
(6, 16, '5962231430', '1600', '2022-11-23', 1, 1980, 220, 80, '0', '', 100, 4),
(7, 16, '9219591038', '1600', '2022-11-23', 1, 1980, 220, 80, '0', '', 100, 4),
(8, 16, '6641147132', '1600', '2022-11-23', 1, 1980, 220, 80, '300', 'demo500', 100, 4),
(9, 16, '8485772650', '160', '2022-11-23', 1, 180, 20, 80, '0', '', 0, 4),
(10, 24, '1881908141', '2000', '2022-11-23', 1, 2250, 250, 0, '345', 'demo500', 50, 4),
(11, 8, '9465663008', '800', '2022-11-23', 1, 1080, 120, 0, '1000', 'limit10', 20, 4),
(12, 8, '4031694513', '800', '2022-11-23', 1, 1080, 120, 0, '0', '', 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer`
--

CREATE TABLE `stock_transfer` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_insert_id` int(11) DEFAULT NULL,
  `tranfer_qty` int(11) DEFAULT NULL,
  `current_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_transfer`
--

INSERT INTO `stock_transfer` (`id`, `product_id`, `last_insert_id`, `tranfer_qty`, `current_qty`) VALUES
(108, '8', 262, 50, 300),
(109, '86', 262, 1, 4),
(110, '8', 263, 5, 250),
(111, '87', 263, 7, 5),
(112, '88', 263, 8, 3),
(113, '86', 264, 1, 3),
(114, '86', 264, 1, 3),
(115, '87', 264, 2, -2),
(116, '86', 268, 1, 2),
(117, '87', 268, 0, 0),
(118, '88', 268, 0, -5),
(119, '8', 269, 1, 245),
(120, '86', 270, 1, 1),
(121, '9', 271, 1, 500),
(122, '102', 271, 2, 0),
(123, '86', 280, 10, 0),
(124, '87', 280, 2, 0),
(125, '86', 285, 1, 0),
(126, '87', 285, 2, 0),
(127, '8', 286, 5, 244),
(128, '87', 286, 4, 0),
(129, '86', 287, 2, 0),
(130, '86', 289, 6, 0),
(131, '87', 289, 5, 0),
(132, '86', 290, 3, 0),
(133, '88', 290, 3, 0),
(134, '8', 291, 1, 239),
(135, '87', 291, 2, 0),
(136, '93', 291, 34, 1),
(137, '95', 291, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `subcategory` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory`, `category`) VALUES
(9, 'Samsung s9', '8'),
(10, 'Samsung s11', '8'),
(11, 'Realme', '8');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `phone`, `email`, `state`, `city`, `zipcode`, `address`, `image`) VALUES
(3, 'ghhhgf', '3455435454', 'dtgfdfdf@dftgdhgf.hjkhj', 'gfhgfhgfh', 'gfhgfhgfh', 232322, 'gdgdfgdfg', '4708123679311983.png'),
(4, 'sf', '4234234234', 'dasdfszx@aasd.com', 'aasd', 'aa', 213242, 'asd', ''),
(5, 'supplier_name', 'phone', 'email', 'state', 'city', 0, 'address', NULL),
(6, 'Test', '9876543210', 'test@gmail.com', 'Uttar Pradesh', 'Lucknow', 227202, 'Test Address', NULL),
(7, 'payment', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'UPI', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'supplier_name', 'phone', 'email', 'state', 'city', 0, 'address', NULL),
(10, 'Test', '9876543210', 'test@gmail.com', 'Uttar Pradesh', 'Lucknow', 227202, 'Test Address', NULL),
(11, 'supplier_name', 'phone', 'email', 'state', 'city', 0, 'address', NULL),
(12, 'Test', '9876543210', 'test@gmail.com', 'Uttar Pradesh', 'Lucknow', 227202, 'Test Address', '1100048335898334.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unitprice` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_subtotal` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unittax` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_subtax` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_finalprice` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `cart_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_subdiscount` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_cart`
--

INSERT INTO `temp_cart` (`id`, `product_id`, `product_qty`, `product_unitprice`, `currency`, `product_subtotal`, `product_unittax`, `product_subtax`, `product_finalprice`, `create_date`, `cart_key`, `product_discount`, `product_subdiscount`) VALUES
(3, '9', '2', '450', 'INR', '900', '10', '20', '900', '2022-11-23 05:42:55', '6200599185', '50', '100'),
(4, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:43:45', '5962231430', '10', '20'),
(5, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:43:45', '5962231430', '100', '200'),
(6, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 05:46:29', '8956150092', '50', '150'),
(7, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:46:49', '9219591038', '10', '20'),
(8, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:46:50', '9219591038', '100', '200'),
(9, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 05:47:44', '9275473260', '50', '150'),
(10, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 05:48:21', '4572349476', '50', '150'),
(11, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:49:12', '8256447980', '10', '20'),
(12, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:49:13', '8256447980', '100', '200'),
(13, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:49:56', '1072416994', '10', '20'),
(14, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:49:56', '1072416994', '100', '200'),
(16, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:54:12', '6641147132', '10', '20'),
(17, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 05:54:12', '6641147132', '100', '200'),
(18, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 05:55:49', '8485772650', '10', '20'),
(21, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 06:38:05', '9975733939', '50', '150'),
(22, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 06:40:24', '8543621706', '50', '150'),
(23, '9', '5', '450', 'INR', '2250', '10', '50', '2250', '2022-11-23 06:47:46', '1881908141', '50', '250'),
(24, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 06:49:22', '4134543930', '50', '150'),
(25, '10', '2', '900', 'INR', '1800', '50', '100', '1800', '2022-11-23 06:49:24', '4134543930', '100', '200'),
(27, '9', '2', '450', 'INR', '900', '10', '20', '900', '2022-11-23 06:51:25', '1190221331', '50', '100'),
(29, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 06:53:08', '9465663008', '10', '20'),
(30, '9', '2', '450', 'INR', '900', '10', '20', '900', '2022-11-23 06:53:08', '9465663008', '50', '100'),
(31, '8', '2', '90', 'INR', '180', '0', '0', '180', '2022-11-23 06:54:25', '4031694513', '10', '20'),
(32, '9', '2', '450', 'INR', '900', '10', '20', '900', '2022-11-23 06:54:25', '4031694513', '50', '100'),
(40, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 08:03:39', '2206839008', '50', '150'),
(41, '9', '3', '450', 'INR', '1350', '10', '30', '1350', '2022-11-23 08:06:02', '4072895021', '50', '150'),
(51, '9', '4', '450', 'INR', '1800', '10', '40', '1800', '2022-11-23 08:32:06', '5461079507', '50', '200');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_product`
--

CREATE TABLE `transfer_product` (
  `id` int(11) NOT NULL,
  `warehouse_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfer_product`
--

INSERT INTO `transfer_product` (`id`, `warehouse_from`, `pro_qty`, `warehouse_to`, `date`) VALUES
(289, '2', '86,87', 2, '2022-12-06'),
(290, '2', '86,88', 2, '2022-12-05'),
(291, '2', '8,87,93,95', 4, '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `latitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`latitude`, `longitude`) VALUES
('26.9182838', '80.9548868'),
('26.910102', '80.960598'),
('26.763193', '80.657002');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `email`, `phone`, `country`, `city`, `zipcode`) VALUES
(2, 'Test1', 'anoopmaurya@webvire.com1', '9876543210', 'India1', 'Lucknow1', '123466'),
(4, 'name', 'email', 'phone', 'country', 'city', 'zipcode'),
(5, 'Test', 'test@gmail.com', '9876543210', 'India', 'Lucknow', '227202');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `shop_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `login_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `shop_name`, `shop_logo`, `shop_currency`, `shop_description`, `quantity`, `login_1`, `login_2`, `login_3`) VALUES
(1, 'Shopping Center', '8454180289871758.jpeg', 'INR', 'Shopping Center For Purchase', 10, 'Login 1 Para11', 'Login 2 Para11', 'Login 3 Para11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_cart`
--
ALTER TABLE `final_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_transfer`
--
ALTER TABLE `money_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productImages`
--
ALTER TABLE `productImages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_transfer`
--
ALTER TABLE `stock_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_product`
--
ALTER TABLE `transfer_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `final_cart`
--
ALTER TABLE `final_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `money_transfer`
--
ALTER TABLE `money_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productImages`
--
ALTER TABLE `productImages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_transfer`
--
ALTER TABLE `stock_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `transfer_product`
--
ALTER TABLE `transfer_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
