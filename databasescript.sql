-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2015 at 04:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whdc_services`
--
CREATE DATABASE IF NOT EXISTS `whdc_services` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `whdc_services`;

-- --------------------------------------------------------
-- 
-- Create user 
--
DROP USER 'whdc_admin'@'localhost'; 
CREATE USER 'whdc_admin'@'localhost' IDENTIFIED BY 'whdc_password'; 
GRANT ALL on whdc_services.* TO 'whdc_admin'@'localhost'; 


--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Health Services - Physical', 'Looking after yourself physically is really important. Here are some interesting services in the local area.'),
(2, 'Health Services - Mental', 'Looking after yourself mentally is really important. Here are some interesting services in the local area.'),
(3, 'Community Organisations', 'Here are some great local groups to help you.'),
(4, 'Financial Assistance and Youth grants', 'Money will help you support yourself and make your dreams come true!'),
(5, 'Disability support services', ''),
(6, 'Education and training services', ''),
(7, 'Employment services', ''),
(8, 'Accommodation and housing', ''),
(9, 'Legal assistance', ''),
(10, 'Koori support services', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `web` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `address`, `city`, `postcode`, `phone`, `web`, `contact`, `category_id`) VALUES
(1, 'Kid''s Helpline', '200 Sydney Street', 'Wollongong', '2500', '1800551800', 'http://www.kidshelp.com.au', 'Bob Jones', 2),
(2, 'Mr. Nick''s Upstairs Medical School', '27 Wallaby Way', 'Sydney', '2000', '180055555', 'http://www.outlook.com', 'John Smith', 1),
(3, 'CHANGE R U OK Day', '199 James Street', 'Albion Park', '1234', '1800121212', 'http://yourstruly.org.au/', 'John Smith', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
