-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 07:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordering_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(115) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(115) NOT NULL,
  `prod_id` int(115) NOT NULL,
  `qty` int(115) NOT NULL,
  `total` int(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(115) NOT NULL,
  `imagepath` text NOT NULL,
  `product_name` text NOT NULL,
  `category` text NOT NULL,
  `price` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `imagepath`, `product_name`, `category`, `price`) VALUES
(3, 'Images/groupmeals.png', 'Yum burger', 'Group Meals', 15.00),
(15, 'Images/burger.png', 'BigMac', 'Group Meals', 99.00),
(16, 'Images/chicken.png', 'Chicken Fillet', 'Group Meals', 55.00),
(17, 'Images/dessert.png', 'Mcdonald Sundae', 'Group Meals', 35.00),
(18, 'Images/others.png', 'Happy Meal (Manny Pacquiao Action Figure)', 'Group Meals', 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(115) NOT NULL,
  `product_id` int(115) NOT NULL,
  `quantity` int(115) NOT NULL,
  `total` float(7,2) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `quantity`, `total`, `date`) VALUES
(4, 16, 3, 165.00, '05/24/2022'),
(5, 16, 7, 385.00, '05/24/2022'),
(6, 16, 3, 165.00, '05/24/2022'),
(7, 16, 7, 385.00, '05/24/2022'),
(8, 3, 5, 75.00, '05/24/2022'),
(9, 16, 4, 220.00, '05/24/2022'),
(10, 15, 2, 198.00, '05/24/2022'),
(11, 18, 2, 300.00, '05/24/2022'),
(12, 19, 3, 135.00, '05/25/2022'),
(13, 19, 4, 180.00, '05/25/2022'),
(14, 3, 3, 45.00, '05/25/2022'),
(15, 18, 3, 450.00, '05/25/2022'),
(16, 18, 3, 450.00, '05/25/2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
