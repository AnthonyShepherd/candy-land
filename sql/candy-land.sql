-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 08:48 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `candy_land`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Beacon'),
(2, 'Cadbury'),
(3, 'Nestle'),
(4, 'Manhattan'),
(5, 'Maynards'),
(6, 'Mister Sweets'),
(7, 'Halls'),
(8, 'Lindt'),
(9, 'Simba'),
(10, 'Doritos'),
(11, 'Lays');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `price` varchar(300) NOT NULL,
  `total_amt` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cart_products`
--
CREATE TABLE IF NOT EXISTS `cart_products` (
`id` int(10)
,`product_id` int(11)
,`user_id` int(10)
,`product_name` varchar(255)
,`product_image` text
,`price` varchar(300)
,`qty` int(10)
,`total_amt` varchar(300)
);
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Chips'),
(2, 'Chocolote'),
(3, 'Sweets');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `price`, `description`, `image`, `keywords`) VALUES
(1, 4, 3, 'Manhattan Marshmallows 150g', '20', 'Manhattan Marshmallows 150g', 'Manhattan Marshmallows 150g.png', 'manhattan marshmallows'),
(2, 1, 9, 'Simba Salt & Vinegar Flavoured Potato Chips 120g', '16', 'Simba Salt & Vinegar Flavoured Potato Chips 120g', 'Simba Salt & Vinegar Flavoured Potato Chips 120g.png', 'Simba'),
(3, 1, 9, 'Simba Original Ghost Pops 100g', '13', 'Simba Original Ghost Pops 100g', 'Simba Original Ghost Pops 100g.png', 'Simba'),
(4, 1, 9, 'Simba Creamy Cheddar Flavoured Potato Chips 120g', '16', 'Simba Creamy Cheddar Flavoured Potato Chips 120g', 'Simba Creamy Cheddar Flavoured Potato Chips 120g.png', 'Simba'),
(5, 1, 9, 'Simba Chipniks Original Grain Snack 100g', '19', 'Simba Chipniks Original Grain Snack 100g', 'Simba Chipniks Original Grain Snack 100g.png', 'Simba'),
(6, 1, 11, 'Lays Thai Sweet Chilli Flavoured Potato Chips 120g', '19', 'Lays Thai Sweet Chilli Flavoured Potato Chips 120g', 'Lays Thai Sweet Chilli Flavoured Potato Chips 120g.png', 'Lays'),
(7, 1, 11, 'Lays Sweet & Smoky American BBQ Flavoured Chips 120g', '17', 'Lays Sweet & Smoky American BBQ Flavoured Chips 120g', 'Lays Sweet & Smoky American BBQ Flavoured Chips 120g.png', 'Lays'),
(8, 1, 11, 'Lays Salted Potato Chips 120g', '17', 'Lays Salted Potato Chips 120g', 'Lays Salted Potato Chips 120g.png', 'Lays'),
(9, 1, 11, 'Lays Caribbean Onion & Balsamic Vinegar Flavoured Chips 120g', '17', 'Lays Caribbean Onion & Balsamic Vinegar Flavoured Chips 120g', 'Lays Caribbean Onion & Balsamic Vinegar Flavoured Chips 120g.png', 'Lays'),
(10, 1, 10, 'Doritos Sweet Chilli Flavoured Corn Chips 150g', '19', 'Doritos Sweet Chilli Flavoured Corn Chips 150g', 'Doritos Sweet Chilli Flavoured Corn Chips 150g.png', 'Doritos'),
(11, 1, 10, 'Doritos Cheese Supreme Flavoured Corn Chips 150g', '19', 'Doritos Cheese Supreme Flavoured Corn Chips 150g', 'Doritos Cheese Supreme Flavoured Corn Chips 150g.png', 'Doritos');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(900) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure for view `cart_products`
--
DROP TABLE IF EXISTS `cart_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_products` AS select `c`.`id` AS `id`,`c`.`product_id` AS `product_id`,`c`.`user_id` AS `user_id`,`p`.`name` AS `product_name`,`p`.`image` AS `product_image`,`c`.`price` AS `price`,`c`.`qty` AS `qty`,`c`.`total_amt` AS `total_amt` from (`cart` `c` join `products` `p` on((`c`.`product_id` = `p`.`id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
