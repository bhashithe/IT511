-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2017 at 07:38 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE IF NOT EXISTS `dummy` (
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`name`, `age`) VALUES
('Kamal', 25),
('Sunil', 24);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`name`, `age`, `address`, `email`) VALUES
('John Doe', 16, 'Kandy', 'john@mail.com'),
('Kamal', 18, 'Kandy', 'kamal@mail.com'),
('Kathy Lee', 42, 'Mumbai', 'kathy@uky.edu'),
('Sunil', 47, 'Matale', 'sunil@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('first','second','third') NOT NULL,
  `train_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `train_id` (`train_id`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `type`, `train_id`, `email`, `number`) VALUES
(1, 'second', 3, 'sunil@mail.com', 1),
(2, 'first', 4, 'john@mail.com', 3),
(3, 'second', 2, 'sunil@mail.com', 1),
(4, 'third', 1, 'kamal@mail.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `train_id` int(11) NOT NULL AUTO_INCREMENT,
  `start` varchar(50) NOT NULL,
  `end` varchar(50) NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`train_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `start`, `end`, `start_time`) VALUES
(1, 'Kandy', 'Fort', '2018-01-01 05:50:00'),
(2, 'Kandy', 'Fort', '2018-01-01 06:15:00'),
(3, 'Matale', 'Kandy', '2017-12-31 08:00:00'),
(4, 'Fort', 'Kandy', '2018-01-01 15:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','normal') NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `email`, `role`) VALUES
('lcUCtXD5BGOw6', 'john@mail.com', 'admin'),
('lcx7kMa2O.iKs', 'kamal@mail.com', 'admin'),
('lcB3esXhiEfBg', 'kathy@uky.edu', 'normal'),
('lc2blOQiGdBZQ', 'sunil@mail.com', 'normal');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `train` (`train_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_email` FOREIGN KEY (`email`) REFERENCES `passenger` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
