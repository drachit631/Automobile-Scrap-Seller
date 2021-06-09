-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2021 at 04:06 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

DROP TABLE IF EXISTS `admin_master`;
CREATE TABLE IF NOT EXISTS `admin_master` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`username`, `password`) VALUES
('admin', 'Pass'),
('admin', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `u_id` varchar(6) NOT NULL,
  `prod_id` int(4) NOT NULL,
  `prod_qty` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(4) NOT NULL AUTO_INCREMENT,
  `cat_nm` varchar(40) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_nm`) VALUES
(1, 'Active Body Control'),
(2, 'Aftermarket exhaust parts'),
(3, 'Air filter'),
(4, 'Battery indicator'),
(5, 'Bell housing'),
(6, 'Bench seat'),
(7, 'Blind spot monitor'),
(8, 'Block heater'),
(9, 'Car alarm'),
(10, 'Car hydraulics'),
(11, 'Car seat'),
(12, 'Dashboard'),
(13, 'Drive wheel'),
(14, 'Electronic control unit'),
(15, 'Heat shield'),
(16, 'Hubcap'),
(17, 'Ignition system'),
(18, 'Jumper cable'),
(19, 'TorqueFlite');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `State_Id` int(29) NOT NULL,
  `City_Id` int(100) NOT NULL AUTO_INCREMENT,
  `City_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`City_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`State_Id`, `City_Id`, `City_Name`) VALUES
(1, 1, 'Amaravati'),
(1, 2, 'Bhimavaram'),
(1, 3, 'Chirala'),
(1, 4, 'Chittoor');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(4) NOT NULL AUTO_INCREMENT,
  `prod_id` int(4) NOT NULL,
  `prod_img` longblob NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `prod_id`, `prod_img`) VALUES
(1, 1, 0x696d672f204375727469735f3132333653452d353632315f48504556535f41432d32305f4437323931302e6a7067),
(2, 2, 0x696d672f20416d61726f6e5f4361725f426174746572795f2e6a706567),
(3, 4, 0x696d672f20416d61726f6e5f4361725f426174746572795f2e6a706567),
(4, 3, 0x696d672f20416d61726f6e5f4361725f426174746572795f2e6a706567),
(5, 6, 0x696d672f20416d61726f6e5f4361725f426174746572795f2e6a706567),
(6, 5, 0x696d672f20416d61726f6e5f4361725f426174746572795f4432323531302e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` varchar(6) NOT NULL,
  `prod_id` int(4) NOT NULL,
  `u_id` varchar(6) NOT NULL,
  `d_id` varchar(6) NOT NULL,
  `o_date` timestamp NOT NULL,
  `prod_qty` int(3) NOT NULL,
  `price` int(4) NOT NULL,
  `o_status` tinyint(1) DEFAULT NULL,
  `canc_stat` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_id`
--

DROP TABLE IF EXISTS `order_id`;
CREATE TABLE IF NOT EXISTS `order_id` (
  `o_id` varchar(6) NOT NULL,
  `u_id` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_forget`
--

DROP TABLE IF EXISTS `password_forget`;
CREATE TABLE IF NOT EXISTS `password_forget` (
  `u_id` varchar(6) NOT NULL,
  `f_id` int(6) NOT NULL,
  UNIQUE KEY `f_id` (`f_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(4) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(6) NOT NULL,
  `prod_nm` varchar(30) NOT NULL,
  `prod_price` int(10) NOT NULL,
  `prod_details` varchar(400) NOT NULL,
  `prod_specs` varchar(250) NOT NULL,
  `prod_stock` int(4) NOT NULL,
  `cat_id` int(4) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `u_id`, `prod_nm`, `prod_price`, `prod_details`, `prod_specs`, `prod_stock`, `cat_id`) VALUES
(1, 'D72910', 'Curtis 1236SE-5621 HPEVS AC-20', 70000, 'Brushless AC Motor Kit - 48 ', 'HPEVS AC-20', 2, 1),
(2, 'D22510', 'Amaron Car Battery', 6904, 'Brand\r\nAmaron\r\nModel Number\r\n95D26R\r\nBattery capacity\r\n35 Ah', '\r\nVoltage Output\r\n12 V', 7, 1),
(6, 'D72910', 'Car Hydraulic', 24999, 'Vestil VPJ-12 Hydraulic Vehicle Positioning Jack, Steel, 12 Tire Width, 1500 lbs Capacity', '-Motor controlled functioning\r\n-Greater lifting capacity\r\n-Suitable for multiple car models\r\n-Improved lifting speed\r\n-No damage risk\r\n-Completely secure lifting', 2, 2),
(3, 'D72910', 'Car Dashboard', 7899, 'precise dimensions, abrasion resistant, tensile strength, excellent performance, long functional life and others, our products are widely acknowledged among vast clientele.', 'Brand : Aeromate India\r\nState/Form : Aerosol\r\nPackaging Size : 300*500 inch\r\nWeight : 1KG ', 1, 1),
(5, 'D72910', 'Engine Air Filter', 2399, 'Remove dust, dirt and soot particles from the intake air.\r\nDamaging particles can be entering your engine causing increased engine wear.\r\nThe air filter is an essential supply for the health of both you and your motor vehicle.\r\nWe recommend replacement of the air filter every 4 months.', 'Weight : 900 g\r\nWidth: 500Inches\r\nHeight : 800 inches', 3, 3),
(4, 'D72910', 'Battery Indicator', 2999, 'The battery meter has 10 LEDS that will light to show the battery condition. When fully charged, only the 10th LED will light show.', 'Power Required: +10V\r\nColor: Green, Yellow\r\nWater Resistant : Yes\r\nBrand: Amron', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `u_id` varchar(6) NOT NULL,
  `f_name` varchar(35) NOT NULL,
  `email_id` varchar(39) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `passwrd` varchar(35) NOT NULL,
  `address` varchar(100) NOT NULL,
  `State_Name` varchar(50) NOT NULL,
  `City_Name` varchar(50) NOT NULL,
  `post_code` varchar(6) NOT NULL,
  `gst_no` varchar(15) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`u_id`, `f_name`, `email_id`, `contact_no`, `type`, `passwrd`, `address`, `State_Name`, `City_Name`, `post_code`, `gst_no`, `hash`, `active`) VALUES
('D22510', 'Pujan', 'penguin123@gmail.com', '9879651515', 1, '123', '4 padmavati villa\nnr satyamev jayate ,lane 12/13, sterling city', 'Andra Pradesh', 'Amaravati', '380058', '07AAACB5343E1Z3', 'c81e728d9d4c2f636f067f89cc14862c', 1),
('C24310', 'Pujan', 'pengui@gmail.com', '7096551513', NULL, '123', ' 4 padmavati villa nr satyamev jayate ,lane 12/13, sterling city', 'Andra Pradesh', 'Amaravati', '380058', '07AAACB5343E1Z3', '7c590f01490190db0ed02a5070e20f01', 1),
('D72910', 'pujan', 'penguin@gmail.com', '9879651515', 1, '123', '4 padmavati villa\nnr satyamev jayate ,lane 12/13, sterling city', 'Andra Pradesh', 'Amaravati', '380058', '07AAACB5343E1Z3', '7143d7fbadfa4693b9eec507d9d37443', 1),
('C77770', 'Vidhi Patel', 'vidhi@gmail.com', '1234567890', NULL, '123456789', 'Ahmedabad', 'Andra Pradesh', 'Amaravati', '123456', NULL, '8c6744c9d42ec2cb9e8885b54ff744d0', 1),
('C57790', 'Rachit Desai', 'drachit22@gmail.com', '4332299887', NULL, '123', 'asdadasdasdasdasdads', 'Andra Pradesh', 'Chirala', '123456', NULL, 'a1140a3d0df1c81e24ae954d935e8926', 1),
('C53920', 'Rachit Desai', 'drachit361@gmail.com', '1234567890', NULL, '123', 'askdnajsbajbndihihvihn', 'Andra Pradesh', 'Bhimavaram', '123456', NULL, 'a8f15eda80c50adb0e71943adc8015cf', 1),
('C49600', 'asdsa', 'pujan007mm@gmail.com', '7778884561', NULL, '123', 'adsad', 'Andra Pradesh', 'Bhimavaram', '123456', NULL, 'ad972f10e0800b49d76fed33a21f6698', NULL),
('C79300', 'asdsa', 'pujan007mm@gmail.com', '7778884561', NULL, '123', 'adsad', 'Andra Pradesh', 'Bhimavaram', '123456', NULL, 'fbd7939d674997cdb4692d34de8633c4', NULL),
('C66430', 'asdsa', 'vamsiknight0@gmail.com', '7778884561', NULL, '123', 'adsad', 'Andra Pradesh', 'Bhimavaram', '123456', NULL, '8fe0093bb30d6f8c31474bd0764e6ac0', NULL),
('C72910', 'Deepak Nathani', 'thepujan007@hotmail.com', '1234567890', NULL, '1234', 'Chandkheda', 'Andra Pradesh', 'Amaravati', '380058', NULL, 'fb7b9ffa5462084c5f4e7e85a093e6d7', 1),
('C72640', 'asdsa', 'pujan007mm@gmail.com', '7778884561', NULL, '123', 'adsad', 'Andra Pradesh', 'Bhimavaram', '123456', NULL, '9e3cfc48eccf81a0d57663e129aef3cb', NULL),
('C18820', 'asdsa', 'pujan007mm@gmail.com', '7778884561', NULL, '123', 'adsad', 'Andra Pradesh', 'Bhimavaram', '123456', NULL, 'e44fea3bec53bcea3b7513ccef5857ac', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `State_Id` int(29) NOT NULL AUTO_INCREMENT,
  `State_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`State_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`State_Id`, `State_Name`) VALUES
(1, 'Andra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jammu and Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(14, 'Madya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Orissa'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telagana'),
(26, 'Tripura'),
(27, 'Uttaranchal'),
(28, 'Uttar Pradesh'),
(29, 'West Bengal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
