-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2014 at 01:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE IF NOT EXISTS `deposits` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `amount` int(150) NOT NULL,
  `rm` int(10) NOT NULL,
  `planet` int(200) NOT NULL,
  `terrain` int(10) NOT NULL,
  `x` int(2) NOT NULL,
  `y` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE IF NOT EXISTS `planets` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `size` int(2) NOT NULL,
  `system` int(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `name`, `size`, `system`) VALUES
(1, 'Tython', 9, 1),
(2, 'Tython II', 19, 1),
(3, 'Falleen', 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rm`
--

CREATE TABLE IF NOT EXISTS `rm` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `rm`
--

INSERT INTO `rm` (`id`, `name`, `img`) VALUES
(1, 'Quantum', 'deposit1.gif'),
(2, 'Meleenium', 'deposit2.gif'),
(3, 'Ardanium', 'deposit3.gif'),
(4, 'Rudic', 'deposit4.gif'),
(5, 'Ryll', 'deposit5.gif'),
(6, 'Duracrete', 'deposit6.gif'),
(7, 'Alazhi', 'deposit7.gif'),
(8, 'Laboi', 'deposit8.gif'),
(9, 'Adegan', 'deposit9.gif'),
(10, 'Rockivory', 'deposit10.gif'),
(11, 'Tibannagas', 'deposit11.gif'),
(12, 'Nova', 'deposit12.gif'),
(13, 'Varium', 'deposit13.gif'),
(14, 'Varmigio', 'deposit14.gif'),
(15, 'Lommite', 'deposit15.gif'),
(16, 'Hibridium', 'deposit16.gif'),
(17, 'Durelium', 'deposit17.gif'),
(18, 'Lowickan', 'deposit18.gif'),
(19, 'Vertex', 'deposit19.gif'),
(20, 'Berubian', 'deposit20.gif');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `name`) VALUES
(1, 'Veragi'),
(2, 'Braxant'),
(3, 'Obtrexta'),
(4, 'Sector 5'),
(5, 'Dolomar'),
(6, 'Darpa'),
(7, 'Doldur'),
(8, 'Hapes Cluster'),
(9, 'Inner Cluster'),
(10, 'Kiffex'),
(11, 'Farlax'),
(12, 'Farrfin'),
(13, 'Coruscant'),
(14, 'Corporate Sector');

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE IF NOT EXISTS `systems` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sector` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `name`, `sector`) VALUES
(1, 'Tython', 4),
(2, 'Coruscant', 13),
(3, 'Twith', 5),
(4, 'Panto', 5),
(5, 'Thokos', 13),
(6, 'Falleen', 7),
(7, 'Doldur', 7),
(8, 'Notak', 7),
(9, 'Azurbani', 9),
(10, 'Hiit', 14),
(11, 'Hapes', 8),
(12, 'Gallinore', 8),
(13, 'Ult', 8),
(14, 'Lemmi', 8),
(15, 'Tinta', 8),
(16, 'Wodan', 8),
(17, 'Divora', 8),
(18, 'Novi', 8),
(19, 'Calfa', 8),
(20, 'Ket', 8),
(21, 'Maad', 8);

-- --------------------------------------------------------

--
-- Table structure for table `terrain`
--

CREATE TABLE IF NOT EXISTS `terrain` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `terrain`
--

INSERT INTO `terrain` (`id`, `name`, `img`) VALUES
(1, 'Black Hole Terrain', 'terrain1.gif'),
(2, 'Forest', 'terrain2.gif'),
(3, 'Jungle', 'terrain3.gif'),
(4, 'Rock', 'terrain4.gif'),
(5, 'Cave', 'terrain5.gif'),
(6, 'Gas Giant', 'terrain6.gif'),
(7, 'Mountain', 'terrain7.gif'),
(8, 'Sun Terrain', 'terrain8.gif'),
(9, 'Crater', 'terrain9.gif'),
(10, 'Glacier', 'terrain10.gif'),
(11, 'Ocean', 'terrain11.gif'),
(12, 'Swamp', 'terrain12.gif'),
(13, 'Desert', 'terrain13.gif'),
(14, 'Grassland', 'terrain14.gif'),
(15, 'River', 'terrain15.gif'),
(16, 'Volcanic', 'terrain16.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
