-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 10:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
  `cart_id` int(11) NOT NULL,
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
  `item_qty` int(10) NOT NULL,
  `order_id` int(11) NOT NULL
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
(1, 'Smiley & Daisy Hoodie - Brown', 599.00, 'In our latest release, it tells us to smile even in rough times. And because it\'s already Christmas time, we made a hoodie for y\'all.', 'Hoodies'),
(2, 'Smiley & Daisy Tee - Pink', 549.00, '\"Daisy\" Tee in Pink Colorway.', 'Shirts'),
(3, 'Smiley & Daisy Cap - Pink', 249.00, '\"Smiley & Daisy\" Cap in Pink Colorway.\r\n\"Happiness is similar to The tale of the flower and butterfly, the perfect partner brings out the best in you\"', 'Accessories'),
(10, 'Acid Brush - Black', 549.00, 'Drape \"Acid Brush\" in a Black Colorway.', 'Shirts'),
(11, 'Aspire to Inspire - Black', 599.00, '\"Aspire to Inspire\" Tee in Black Colorway Make a Difference in everyone\'s life. ', 'Shirts'),
(12, 'Aspire to Inspire - White', 599.00, '\"Aspire to Inspire\" Tee in White Colorway Make a Difference in everyone\'s life. ', 'Shirts'),
(14, 'Puff - Black', 549.00, 'Drape “BnW Collection”', 'Shirts'),
(15, 'Puff - White', 549.00, 'Drape “BnW Collection”', 'Shirts'),
(16, 'Blossom - White', 549.00, '\"Blossom\" Tee in White & Black Colorway. ', 'Shirts'),
(17, 'Ride or Die Tee - Black', 549.00, '\"Ride or Die\" Collab Tee Colorway. ', 'Shirts'),
(18, 'Ride or Die Tee - Blue', 549.00, '\"Ride or Die\" Collab Tee Colorway.', 'Shirts'),
(19, 'Sekai Tee - White', 499.00, 'In our newest edition of style and comfort, we tap the scenic and rigid art of Japan, thus Sekai Tee was born.', 'Shirts'),
(20, 'Sekai Tee - Black', 499.00, 'In our newest edition of style and comfort, we tap the scenic and rigid art of Japan, thus Sekai Tee was born.', 'Shirts'),
(21, 'Kisav Collection - Beige', 549.00, 'Drape \"Kisav Collection\" puff in Beige Colorway.', 'Shirts'),
(22, 'Kisav Collection - Fatigue', 549.00, 'Drape \"Kisav Collection\" puff in Fatigue Colorway.', 'Shirts'),
(23, 'Simplicitee - Pink', 500.00, '\"Simplicitee\" in Pink Colorway.\r\nAmidst of Chaos, There\'s order here.', 'Shirts'),
(24, 'Simplicitee - Cream', 500.00, '\"Simplicitee\" in Cream Colorway. Amidst of Chaos, There\'s order here.', 'Shirts'),
(25, 'Simplicitee - White', 500.00, '\"Simplicitee\" in White Colorway. Amidst of Chaos, There\'s order here.', 'Shirts'),
(26, 'Smiley & Daisy Tee - Light Blue', 549.00, '\"Daisy\" Tee in Light Blue Colorway.', 'Shirts'),
(27, 'Smiley & Daisy Cap - Blue', 249.00, '\"Smiley & Daisy\" Cap in Blue Colorway.\r\n\"Happiness is similar to The tale of the flower and butterfly, the perfect partner brings out the best in you\"', 'Accessories'),
(28, 'Simplicitee Cap - Red', 200.00, 'Amidst of Chaos, There\'s order here.', 'Accessories'),
(29, 'Simplicitee Cap - Purple', 200.00, 'Amidst of Chaos, There\'s order here.', 'Accessories'),
(30, 'Simplicitee Cap - Pink', 200.00, 'Amidst of Chaos, There\'s order here. \r\n', 'Accessories'),
(31, 'Drape Keyholder - Green', 249.00, 'Drape Keyholder in Green Colorway.', 'Accessories'),
(32, 'Drape Keyholder - White', 249.00, 'Drape Keyholder in White Colorway.', 'Accessories'),
(33, 'Drape Keyholder - Red', 249.00, 'Drape Keyholder Red Colorway.', 'Accessories'),
(34, 'Sekai Mask - White', 149.00, 'Drape \"Sekai Mask\" in White Colorway.', 'Accessories'),
(35, 'Sekai Mask - Black', 149.00, 'Drape \"Sekai Mask\" in Black Colorway.', 'Accessories'),
(36, 'All Around Facemask - Black', 100.00, 'Drape \"All Around\" Facemask in Black Colorway.', 'Accessories'),
(37, 'All Around Facemask - White', 100.00, 'Drape \"All Around\" Facemask in White Colorway.', 'Accessories'),
(38, 'Simplicitee Mask - Red', 120.00, 'Drape \"Simplicitee Mask\" in Red Colorway.\r\nAmidst of Chaos, There\'s order here.', 'Accessories'),
(39, 'Simplicitee Mask - Purple', 120.00, 'Drape \"Simplicitee Mask\" in Purple Colorway.\r\nAmidst of Chaos, There\'s order here.', 'Accessories'),
(40, 'Simplicitee Mask - Pink', 120.00, 'Drape \"Simplicitee Mask\" in Pink Colorway.\r\nAmidst of Chaos, There\'s order here.', 'Accessories');

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
(4, '662129e51d890_Smiley&Daisy_Tee_Pink_front.jpg', 2),
(5, '662129e51d89c_Smiley&Daisy_Tee_Pink_back.jpg', 2),
(8, '66212a57bf8bb_Smiley&DaisyCap_Pink.jpg', 3),
(32, '6627c11578f7b_AcidBrush.jpg', 10),
(33, '6627c11578f7f_AcidBrush_model1.jpg', 10),
(34, '6627c11578f80_AcidBrush_model2.jpg', 10),
(35, '6627c11578f81_AcidBrush_model5.jpg', 10),
(36, '6627c184cc108_AspireToInspire_Black.jpg', 11),
(37, '6627c184cc10b_AspireToInspire_Black3.jpg', 11),
(38, '6627c184cc10c_AspireToInspire_Black2.jpg', 11),
(39, '6627c184cc10d_AspireToInspire_duo2.jpg', 11),
(40, '6627c21c00025_AspireToInspireWhite.jpg', 12),
(41, '6627c21c00028_AspireToInspire_White3.jpg', 12),
(42, '6627c21c00029_AspireToInspire_White1.jpg', 12),
(43, '6627c21c0002a_AspireToInspire_duo.jpg', 12),
(48, '6627c48fc0a49_puff_3.jpg', 14),
(49, '6627c48fc0a4b_puff_4.jpg', 14),
(50, '6627c48fc0a4c_puff_5.jpg', 14),
(51, '6627c550174e5_puff_2.jpg', 15),
(52, '6627c550174e8_puff_6.jpg', 15),
(53, '6627c550174e9_puff_1.jpg', 15),
(54, '6627c5d3a193c_blossom2.jpg', 16),
(55, '6627c5d3a1940_blossom3.jpg', 16),
(56, '6627c5d3a1941_blossom4.jpg', 16),
(57, '6627c5d3a1942_blossom5.jpg', 16),
(59, '6627c6c91224a_RideorDie_model2.png', 17),
(60, '6627c6c91224b_RideorDie_model3.png', 17),
(63, '6627c712aeaae_RideorDie_model_blue2.png', 18),
(64, '6627c712aeaaf_RideorDie_model_blue1.png', 18),
(66, '6627c73b6550c_RideorDie_model_blue4.png', 18),
(67, '6627c73b6550f_RideorDie_model_blue3.png', 18),
(68, '6627c7650a0f8_RideorDie_model4.png', 17),
(69, '6627c7650a0fb_RideorDie_model1.png', 17),
(70, '6627c99628da3_SekaiTee_White.jpg', 19),
(71, '6627c99628da6_SekaiTee_White_1.jpg', 19),
(72, '6627c99628da7_SekaiTee_White_2.jpg', 19),
(73, '6627c9d456d64_SekaiTee_Black.jpg', 20),
(74, '6627c9d456d67_SekaiTee_Black_1.jpg', 20),
(75, '6627c9d456d68_SekaiTee_Black_2.jpg', 20),
(76, '6627cb9d7e2e8_kisav_beige.jpg', 21),
(77, '6627cb9d7e2eb_kisav_beige3.jpg', 21),
(78, '6627cb9d7e2ec_kisav_beige1.jpg', 21),
(79, '6627cb9d7e2ed_kisav_beige2.jpg', 21),
(80, '6627cbee804ad_kisav_fatigue.jpg', 22),
(81, '6627cbee804b0_kisav_fatigue1.jpg', 22),
(82, '6627cbee804b1_kisav_fatigue4.jpg', 22),
(83, '6627cbee804b2_kisav_fatigue3.jpg', 22),
(84, '6627d284285a7_Simplicitee_pink1.jpg', 23),
(85, '6627d284285aa_Simplicitee_pink2.jpg', 23),
(86, '6627d284285ab_Simplicitee_pink3.jpg', 23),
(91, '6627d3b4cce7d_Simplicitee_cream1.jpg', 24),
(92, '6627d3b4cce7e_Simplicitee_cream2.jpg', 24),
(93, '6627d4291985c_Simplicitee_white1.jpg', 25),
(94, '6627d42919860_Simplicitee_white2.jpg', 25),
(95, '6627d7ac4dee4_Smiley&Daisy_Tee_Pink.jpg', 26),
(96, '6627d7ac4dee9_Smiley&Daisy_Tee_Pink1.jpg', 26),
(97, '6627d7ac4deea_Smiley&Daisy_Tee_Blue1.jpg', 26),
(98, '6627d7ac4deeb_Smiley&Daisy_Tee_Blue2.jpg', 26),
(99, '6627d8bdca17e_Smiley&Daisy_Tee_Pink1.jpg', 2),
(100, '6627d8bdca181_Smiley&Daisy_Tee_Pink2.jpg', 2),
(101, '66285edae7943_Smiley&DaisyCap_Blue.jpg', 27),
(102, '66285edae7946_Smiley&DaisyCap_Blue1.jpg', 27),
(103, '66285edae7947_Smiley&DaisyCap_Blue2.jpg', 27),
(104, '66285f3d17ec8_Smiley&DaisyCap_Pink1.jpg', 3),
(105, '66285f3d17eca_Smiley&DaisyCap_Pink2.jpg', 3),
(106, '66285f3d17ecb_Smiley&DaisyTee_model.jpg', 3),
(107, '662861a257d2b_Simplicitee_cap_red.png', 28),
(108, '662861a257d2e_Simplicitee_model1.png', 28),
(109, '662861e6c11eb_Simplicitee_cap_purple.png', 29),
(110, '662861e6c11ee_Simplicitee_model1.png', 29),
(111, '66286229902b5_Simplicitee_cap_pink.png', 30),
(112, '66286229902b8_Simplicitee_model1.png', 30),
(113, '662862b2db3dd_DrapeKeyholder_Green.jpg', 31),
(114, '662862b2db3e1_DrapeKeyholder_All.jpg', 31),
(115, '662862d2807ba_DrapeKeyholder_White.jpg', 32),
(116, '662862fe32c73_DrapeKeyholder_Red.jpg', 33),
(117, '662862fe32c76_DrapeKeyholder_All.jpg', 33),
(118, '6628630d5dd25_DrapeKeyholder_All.jpg', 32),
(119, '662863a046a4e_SekaiMask_White1.jpg', 34),
(120, '662863a046a52_SekaiMask_White2.jpg', 34),
(121, '662863a046a53_SekaiMask_White3.jpg', 34),
(122, '662863d50bc2a_SekaiMask_Black2.jpg', 35),
(123, '662863d50bc2d_SekaiMask_Black3.jpg', 35),
(124, '662863d50bc2e_SekaiMask_Black1.jpg', 35),
(125, '662864d28f1d3_111.jpg', 36),
(126, '662864d28f1d6_AllAround_all2.jpg', 36),
(127, '662864fd01dac_AllAround_all.jpg', 37),
(128, '662864fd01dae_AllAround_all2.jpg', 37),
(129, '662865d1383d9_Simplicitee_maskred.jpg', 38),
(130, '662865ed2a10b_Simplicitee_maskpurple.jpg', 39),
(131, '6628660f7ecdb_Simplicitee_maskpink.jpg', 40),
(132, '6628676540e4e_Hoodie_model3.png', 1),
(133, '6628676540e50_Size Chart.jpg', 1);

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
(18, 3, 'XXL', 0),
(55, 10, 'XS', 5),
(56, 10, 'S', 10),
(57, 10, 'M', 12),
(58, 10, 'L', 5),
(59, 10, 'XL', 7),
(60, 10, 'XXL', 13),
(61, 11, 'XS', 3),
(62, 11, 'S', 6),
(63, 11, 'M', 9),
(64, 11, 'L', 7),
(65, 11, 'XL', 4),
(66, 11, 'XXL', 13),
(67, 12, 'XS', 5),
(68, 12, 'S', 10),
(69, 12, 'M', 12),
(70, 12, 'L', 5),
(71, 12, 'XL', 16),
(72, 12, 'XXL', 6),
(79, 14, 'XS', 3),
(80, 14, 'S', 6),
(81, 14, 'M', 8),
(82, 14, 'L', 2),
(83, 14, 'XL', 11),
(84, 14, 'XXL', 13),
(85, 15, 'XS', 4),
(86, 15, 'S', 6),
(87, 15, 'M', 2),
(88, 15, 'L', 7),
(89, 15, 'XL', 8),
(90, 15, 'XXL', 14),
(91, 16, 'XS', 3),
(92, 16, 'S', 4),
(93, 16, 'M', 12),
(94, 16, 'L', 7),
(95, 16, 'XL', 9),
(96, 16, 'XXL', 11),
(97, 17, 'XS', 3),
(98, 17, 'S', 5),
(99, 17, 'M', 16),
(100, 17, 'L', 2),
(101, 17, 'XL', 12),
(102, 17, 'XXL', 8),
(103, 18, 'XS', 4),
(104, 18, 'S', 7),
(105, 18, 'M', 2),
(106, 18, 'L', 2),
(107, 18, 'XL', 5),
(108, 18, 'XXL', 8),
(109, 19, 'XS', 4),
(110, 19, 'S', 5),
(111, 19, 'M', 3),
(112, 19, 'L', 2),
(113, 19, 'XL', 7),
(114, 19, 'XXL', 11),
(115, 20, 'XS', 3),
(116, 20, 'S', 5),
(117, 20, 'M', 7),
(118, 20, 'L', 2),
(119, 20, 'XL', 11),
(120, 20, 'XXL', 8),
(121, 21, 'XS', 3),
(122, 21, 'S', 5),
(123, 21, 'M', 2),
(124, 21, 'L', 6),
(125, 21, 'XL', 8),
(126, 21, 'XXL', 11),
(127, 22, 'XS', 3),
(128, 22, 'S', 1),
(129, 22, 'M', 2),
(130, 22, 'L', 7),
(131, 22, 'XL', 6),
(132, 22, 'XXL', 9),
(133, 23, 'XS', 3),
(134, 23, 'S', 6),
(135, 23, 'M', 2),
(136, 23, 'L', 6),
(137, 23, 'XL', 8),
(138, 23, 'XXL', 12),
(139, 24, 'XS', 5),
(140, 24, 'S', 7),
(141, 24, 'M', 2),
(142, 24, 'L', 3),
(143, 24, 'XL', 11),
(144, 24, 'XXL', 13),
(145, 25, 'XS', 3),
(146, 25, 'S', 6),
(147, 25, 'M', 1),
(148, 25, 'L', 2),
(149, 25, 'XL', 6),
(150, 25, 'XXL', 8),
(151, 26, 'XS', 2),
(152, 26, 'S', 5),
(153, 26, 'M', 6),
(154, 26, 'L', 1),
(155, 26, 'XL', 3),
(156, 26, 'XXL', 8),
(157, 27, 'XS', 0),
(158, 27, 'S', 0),
(159, 27, 'M', 20),
(160, 27, 'L', 0),
(161, 27, 'XL', 0),
(162, 27, 'XXL', 0),
(163, 28, 'XS', 0),
(164, 28, 'S', 0),
(165, 28, 'M', 6),
(166, 28, 'L', 0),
(167, 28, 'XL', 0),
(168, 28, 'XXL', 0),
(169, 29, 'XS', 0),
(170, 29, 'S', 0),
(171, 29, 'M', 6),
(172, 29, 'L', 0),
(173, 29, 'XL', 0),
(174, 29, 'XXL', 0),
(175, 30, 'XS', 0),
(176, 30, 'S', 0),
(177, 30, 'M', 8),
(178, 30, 'L', 0),
(179, 30, 'XL', 0),
(180, 30, 'XXL', 0),
(181, 31, 'XS', 0),
(182, 31, 'S', 0),
(183, 31, 'M', 7),
(184, 31, 'L', 0),
(185, 31, 'XL', 0),
(186, 31, 'XXL', 0),
(187, 32, 'XS', 0),
(188, 32, 'S', 0),
(189, 32, 'M', 20),
(190, 32, 'L', 0),
(191, 32, 'XL', 0),
(192, 32, 'XXL', 0),
(193, 33, 'XS', 0),
(194, 33, 'S', 0),
(195, 33, 'M', 6),
(196, 33, 'L', 0),
(197, 33, 'XL', 0),
(198, 33, 'XXL', 0),
(199, 34, 'XS', 0),
(200, 34, 'S', 0),
(201, 34, 'M', 7),
(202, 34, 'L', 0),
(203, 34, 'XL', 0),
(204, 34, 'XXL', 0),
(205, 35, 'XS', 0),
(206, 35, 'S', 0),
(207, 35, 'M', 12),
(208, 35, 'L', 0),
(209, 35, 'XL', 0),
(210, 35, 'XXL', 0),
(211, 36, 'XS', 0),
(212, 36, 'S', 0),
(213, 36, 'M', 7),
(214, 36, 'L', 0),
(215, 36, 'XL', 0),
(216, 36, 'XXL', 0),
(217, 37, 'XS', 0),
(218, 37, 'S', 0),
(219, 37, 'M', 12),
(220, 37, 'L', 0),
(221, 37, 'XL', 0),
(222, 37, 'XXL', 0),
(223, 38, 'XS', 0),
(224, 38, 'S', 0),
(225, 38, 'M', 8),
(226, 38, 'L', 0),
(227, 38, 'XL', 0),
(228, 38, 'XXL', 0),
(229, 39, 'XS', 0),
(230, 39, 'S', 0),
(231, 39, 'M', 5),
(232, 39, 'L', 0),
(233, 39, 'XL', 0),
(234, 39, 'XXL', 0),
(235, 40, 'XS', 0),
(236, 40, 'S', 0),
(237, 40, 'M', 11),
(238, 40, 'L', 0),
(239, 40, 'XL', 0),
(240, 40, 'XXL', 0);

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
  ADD PRIMARY KEY (`cart_id`),
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
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_item_fk` (`order_id`);

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
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_cust_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_fk` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`order_id`);

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
