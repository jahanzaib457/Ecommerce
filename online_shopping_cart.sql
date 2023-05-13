-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 07:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `heading`, `description`) VALUES
(1, 'Free Delivery', 'Free delivery on above 2000 order'),
(2, 'Fast delivery', 'We deliver as soon as possible, When you ordered'),
(4, 'Best Quality', 'We have best quality in the world..... Oh my God'),
(5, 'Tyres', 'hamari gari k tyre b new han jo apko delivery dene aye gi'),
(6, 'Shopping Bag free', 'ham apko shopping bag b free de rahe han'),
(7, 'Discount', 'ham discount b den gen Allah ki qasam');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(1, 'Admin', 'Admin@gmail.com', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `address`, `email`, `telephone`) VALUES
(2, 'aptech', 'aptech@gmail.com', 216546784);

-- --------------------------------------------------------

--
-- Table structure for table `table_categories`
--

CREATE TABLE `table_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_categories`
--

INSERT INTO `table_categories` (`id`, `name`, `description`) VALUES
(5, 'Cosmetic', 'We have all cosmetics stocks '),
(6, 'Flower & Planet', 'flowers or plants b han'),
(7, 'Jeans', 'larka larki ki jeans b hain');

-- --------------------------------------------------------

--
-- Table structure for table `table_employee`
--

CREATE TABLE `table_employee` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_employee`
--

INSERT INTO `table_employee` (`id`, `full_name`, `employee_id`, `designation`, `contact_number`, `salary`, `picture`) VALUES
(1, 'Waqas', 1001, 'General Manager', 2147483647, '200000', '../../profileimages/male.webp'),
(3, 'Malaika', 1002, 'Incharge', 2147483647, '50000', '../../profileimages/femlae.png');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `id` int(11) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `product_Price` bigint(20) NOT NULL,
  `product_Quantity` tinyint(4) NOT NULL,
  `product_Category` int(11) NOT NULL,
  `product_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`id`, `product_Name`, `product_Price`, `product_Quantity`, `product_Category`, `product_Image`) VALUES
(6, 'Mascara', 300, 2, 5, '../../profileimages/mascara.jpg'),
(7, 'lipstick', 350, 5, 5, '../../profileimages/lipstick.jpg'),
(8, 'Eyeliner', 3000, 127, 5, '../../profileimages/fashion-show-g05af32889_1920.jpg'),
(9, 'Guldasta', 150, 7, 5, '../../profileimages/flowers.jpg'),
(10, 'Red Roses', 200, 6, 6, '../../profileimages/cd0d165e9302c73978d21d8cbf01c48a_7_384.webp'),
(11, 'Men Jeans', 900, 3, 7, '../../profileimages/mens.webp'),
(12, 'Men Jeans', 1300, 4, 7, '../../profileimages/men jeans.jpg'),
(14, 'Women Jeans', 2000, 9, 7, '../../profileimages/women.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `Adderss` varchar(250) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_contact_us`
--

CREATE TABLE `user_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_contact_us`
--

INSERT INTO `user_contact_us` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'hamza', 'H@gmail.com', 'get to gether', 'Specially invited'),
(2, 'Ali Afzaal', 'alisonu14th@gmail.com', 'Whatever', 'good'),
(3, 'kamran', 'jahanzaib@Gail.com', 'MATH', 'HI HELLO HOW ARE YOU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_categories`
--
ALTER TABLE `table_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `table_employee`
--
ALTER TABLE `table_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_contact_us`
--
ALTER TABLE `user_contact_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_categories`
--
ALTER TABLE `table_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_employee`
--
ALTER TABLE `table_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_contact_us`
--
ALTER TABLE `user_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
