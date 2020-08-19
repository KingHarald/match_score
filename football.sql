-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2020 at 12:45 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `matchess`
--

DROP TABLE IF EXISTS `matchess`;
CREATE TABLE IF NOT EXISTS `matchess` (
  `match_id` int(200) NOT NULL AUTO_INCREMENT,
  `team_one` varchar(200) NOT NULL,
  `team_two` varchar(200) NOT NULL,
  `date_of_match` date NOT NULL,
  `team_one_score` varchar(200) NOT NULL,
  `team_two_score` varchar(200) NOT NULL,
  `match_status` varchar(200) NOT NULL,
  `match_image` text NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchess`
--

INSERT INTO `matchess` (`match_id`, `team_one`, `team_two`, `date_of_match`, `team_one_score`, `team_two_score`, `match_status`, `match_image`) VALUES
(1, 'Nepal', 'India', '2020-02-02', '2', '1  ', 'nepal wins', 'India_nepal.jpg'),
(2, 'China', 'France', '2020-05-01', '0', '0  ', 'Draw', 'hqdefault.jpg'),
(3, 'China', 'S.Korea', '2020-05-03', '2', '1 ', 'China Win', '47109941_401.jpg'),
(4, 'Italy', 'France', '2020-05-01', '2', '2', 'Draw', 'hqdefault.jpg'),
(5, 'India', 'S.Korea', '2020-02-02', '2', '2', 'Draw', 'india-nepal.jpg'),
(7, 'France', 'Spain', '2020-05-02', '0', '1 ', 'Spain Win', '47109941_401.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(200) NOT NULL AUTO_INCREMENT,
  `team_names` varchar(200) NOT NULL,
  `points` varchar(200) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_names`, `points`) VALUES
(7, 'India', '0'),
(2, 'Nepal', '4'),
(4, 'Japan', '0'),
(5, 'China', '0'),
(6, 'France', '0'),
(8, 'Usa', '0'),
(9, 'S.Korea', '0'),
(10, 'Italy', '0'),
(11, 'Spain', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_no` varchar(200) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone_no`, `user_role`, `password`) VALUES
(1, 'admin', 'admin41@gmail.com', '1234567899', 'admin', 'admin'),
(3, 'Diwas', 'diwas233@gmail.com', '9823301970', 'subscriber', 'diwas'),
(4, 'pakku', 'admin42@gmail.com', '9823301979', 'subscriber', 'pakku');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
