-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2014 at 01:47 PM
-- Server version: 5.1.69
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `mes_id` int(5) NOT NULL AUTO_INCREMENT,
  `msg` varchar(50) NOT NULL,
  PRIMARY KEY (`mes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mes_id`, `msg`) VALUES
(1, 'efsdfsdf'),
(2, 'sdfsdfsd'),
(3, 'sdtgfsdgs'),
(4, 'sfdsdfgsd'),
(5, 'sdfsdfsd'),
(6, 'sdfsdfsd'),
(7, 'sdfsdfsd'),
(8, 'dsfsdfsd'),
(9, 'dfsdfsdf'),
(10, 'sdfsdfsdfs'),
(11, 'dsfsdfsd'),
(12, 'sfsdfsd'),
(13, 'sdfsdfsd'),
(14, 'sdfsdf'),
(15, 'sdfsdfds'),
(16, 'sdfsdfds'),
(17, 'dsfsdfs'),
(18, 'sdfsdf'),
(19, 'sdfsdfs'),
(20, 'dsfsdf'),
(21, 'dgdfg'),
(22, 'fdgdfgfd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
