-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 08:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drape1`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` varchar(50) NOT NULL,
  `prod_description` varchar(500) NOT NULL,
  `prod_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_description`, `prod_image`) VALUES
(1, 'LOOK ON WITH ENVY AND HATE', '750PHP', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(2, 'LIET-KYNES', '800PHP', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(3, 'PERDOT SHIRT NEE ARAK', '10000PHP', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(4, 'THE SAND WORM, GOD OF SAND', '1200PHP', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(5, 'SHIRT 1', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(6, 'SHIRT 2', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(7, 'SHIRT 3', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(8, 'SHIRT 4', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(9, 'HOODIES 1', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(10, 'HOODIES 2', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(11, 'HOODIES 3', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(12, 'HOODIES 4', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(13, 'ACCESSORIES 1', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(14, 'ACCESSORIES 2', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(15, 'ACCESSORIES 3', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', ''),
(16, 'ACCESSORIES 4', '999', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima veritatis odio vitae tempora, tenetur velit adipisci placeat! Delectus nemo necessitatibus ipsa tenetur tempore molestiae, ea dicta assumenda. Officia, molestias dolore.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
