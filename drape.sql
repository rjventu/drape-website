-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drape`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(8) NOT NULL,
  `admin_user` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_email`, `admin_pass`) VALUES
(1, 'JustAnAdmin', 'admin@gmail.com', '$2y$10$DPBFn6rq9DDy7UCtJ7sMleLlSXs9WAExqGpXVDguWzxmv8e1Upzkq');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `prod_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `item_qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(8) NOT NULL,
  `cust_user` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_pass` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_user`, `cust_email`, `cust_pass`) VALUES
(1, 'JustACustomer', 'customer@gmail.com', '$2y$10$q1Ns9wkTEp5KhtWCqT.J8OpIQ4WNkg993i0HH.BiLkLTj164p7n0m'),
(2, 'AnotherCustomer', 'customer2@gmail.com', '$2y$10$e1jeTgBm3TWGCnoycnQNOOWJQTxLQ0f4KriQwWgtBIIwBk3I8z656');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(10) NOT NULL,
  `order_fname` varchar(50) NOT NULL,
  `order_lname` varchar(50) NOT NULL,
  `order_phone` varchar(12) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_region` varchar(255) NOT NULL,
  `order_zip` varchar(50) NOT NULL,
  `order_remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `item_id` int(11) NOT NULL,
  `item_name` int(255) NOT NULL,
  `item_price` decimal(5,2) NOT NULL,
  `item_size` varchar(10) NOT NULL,
  `item_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` decimal(5,2) NOT NULL,
  `prod_description` varchar(500) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_description`, `cat_name`) VALUES
(1, 'Smiley & Daisy Hoodie - Brown', 599.00, 'Trendy and comfy hoodie in brown', 'Hoodies'),
(2, 'Smiley & Daisy Tee - Pink', 549.00, 'Trendy tee in pink', 'Shirts'),
(3, 'Smiley & Daisy Cap - Pink', 249.00, 'Trendy cap in pink', 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`img_id`, `img_name`, `prod_id`) VALUES
(1, '662129c64c687_Smiley&Daisy_Tee_Hoodie_front.jpg', 1),
(2, '662129c64c68c_Smiley&Daisy_Tee_Hoodie_back.jpg', 1),
(3, '662129c64c68d_Size Chart.jpg', 1),
(4, '662129e51d890_Smiley&Daisy_Tee_Pink_front.jpg', 2),
(5, '662129e51d89c_Smiley&Daisy_Tee_Pink_back.jpg', 2),
(6, '662129e51d89d_Smiley&DaisyTee_model.jpg', 2),
(7, '662129e51d89e_Size Chart.jpg', 2),
(8, '66212a57bf8bb_Smiley&DaisyCap_Pink.jpg', 3),
(9, '66212a57bf8bf_Smiley&DaisyTee_model.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `stock_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stock_size` varchar(50) NOT NULL,
  `stock_qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`stock_id`, `prod_id`, `stock_size`, `stock_qty`) VALUES
(1, 1, 'XS', 10),
(2, 1, 'S', 12),
(3, 1, 'M', 5),
(4, 1, 'L', 6),
(5, 1, 'XL', 2),
(6, 1, 'XXL', 0),
(7, 2, 'XS', 0),
(8, 2, 'S', 5),
(9, 2, 'M', 2),
(10, 2, 'L', 4),
(11, 2, 'XL', 6),
(12, 2, 'XXL', 3),
(13, 3, 'XS', 0),
(14, 3, 'S', 0),
(15, 3, 'M', 20),
(16, 3, 'L', 0),
(17, 3, 'XL', 0),
(18, 3, 'XXL', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD KEY `prod_cart_fk` (`prod_id`),
  ADD KEY `cust_cart_fk` (`cust_id`),
  ADD KEY `stock_cart_fk` (`stock_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_cust_fk` (`cust_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_gallery_fk` (`prod_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `product_stock_fk` (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_cust_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_fk` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);

--
-- Constraints for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD CONSTRAINT `product_stock_fk` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
