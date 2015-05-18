-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2014 at 11:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_user`
--
Use test;

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `detail` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4570 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `address`, `phone`, `email`, `detail`) VALUES
(1, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(12, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(13, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(14, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(15, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(16, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(17, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(67, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(70, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(78, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(87, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(4568, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', ''),
(4569, 'Amrit Tamang', 'Biratnagar', '+9779842411793', 'amt.tmg@gmail.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
