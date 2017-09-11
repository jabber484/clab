-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2017 at 12:35 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.6.31-4+ubuntu14.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clab`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Mobile Suit','Weapon') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catalogs_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `type`, `name`, `description`) VALUES
(1, 'Mobile Suit', 'RX-78-2 Gundam', 'Prototype Mobile Suit'),
(2, 'Mobile Suit', 'RX-78GP02A Physalis', 'Prototype Nuclear Assault Mobile Suit'),
(3, 'Mobile Suit', 'RX-78GP01 Zephyranthes', 'Prototype General-Purpose Mobile Suit'),
(4, 'Mobile Suit', 'RX-0 Unicorn', 'Prototype Full Psycoframe Mobile Suit'),
(5, 'Weapon', '60mm Vulcan Gun', 'Anti-Light Armor Weapon'),
(6, 'Weapon', 'Beam Saber', 'High-energy Minovsky particles blade');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
