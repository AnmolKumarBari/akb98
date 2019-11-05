-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2017 at 04:02 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.10RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `funds`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `raise_data`()
    NO SQL
SELECT * from raisefund$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calcProfit`(cost FLOAT, price FLOAT) RETURNS decimal(9,2)
BEGIN
  DECLARE profit DECIMAL(9,2);
  SET profit = price-cost;
  RETURN profit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_det`
--

CREATE TABLE IF NOT EXISTS `bank_det` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `accno` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `ifsccode` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_det`
--

INSERT INTO `bank_det` (`id`, `username`, `accno`, `bankname`, `ifsccode`, `balance`) VALUES
(1, 'hola', 'fsdf', 'fds', 'fd', '55'),
(2, 'hola', '3333333333', 'SBU', 'SBIN0002722', '55'),
(3, 'hi', '8527419630', 'SBIU', 'BSBH852', '50000'),
(4, 'kkm', '222225454654', 'JOU', 'JOU6d78s9', '800000');

-- --------------------------------------------------------

--
-- Table structure for table `made_payment`
--

CREATE TABLE IF NOT EXISTS `made_payment` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `toorg` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `debitthru` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `made_payment`
--

INSERT INTO `made_payment` (`id`, `username`, `toorg`, `amount`, `debitthru`, `status`) VALUES
(1, 'hola', 'Paytm', '1000', 'Debit Card', 'Sent'),
(2, 'amityv', 'Paytm', '1000', 'Debit Card', 'Sent'),
(3, 'mrhola', 'Health', '5000', 'Debit Card', 'Sent'),
(4, 'bye', 'Relief', '50000', 'Debit Card', 'Sent'),
(5, 'pp', 'Education', '', 'Debit Card', 'Sent'),
(6, 'pp', 'Education', '', 'Debit Card', 'Sent'),
(7, 'pp', 'Others', '', 'Debit Card', 'Sent'),
(8, 'pp', 'Others', '', 'Debit Card', 'Sent'),
(9, 'pp', 'Education', '', 'Debit Card', 'Sent'),
(10, 'pp', 'Others', '', 'Debit Card', 'Sent');

-- --------------------------------------------------------

--
-- Table structure for table `payment_det`
--

CREATE TABLE IF NOT EXISTS `payment_det` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `card_no` varchar(50) DEFAULT NULL,
  `exp_date` varchar(100) DEFAULT NULL,
  `cvv` varchar(10) DEFAULT NULL,
  `total_amount` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_det`
--

INSERT INTO `payment_det` (`id`, `username`, `card_no`, `exp_date`, `cvv`, `total_amount`) VALUES
(4, 'hola', '7070 5555 5555 5555', '15/2019', '888', '47990'),
(6, 'hola', 'fdsdf', 'fsdf', 'fsd', '50000'),
(7, 'bye', '7418529637418529', '02/2025', '225', '-100000'),
(8, 'pp', '855225522222', '02/2025', '852', '-880055'),
(9, 'pp', '855225522222', '02/2025', '852', '-10000'),
(10, 'mrhola', 'df', 'fds', 'dfs', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `raisefund`
--

CREATE TABLE IF NOT EXISTS `raisefund` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `org` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `descs` varchar(500) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `thruorg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raisefund`
--

INSERT INTO `raisefund` (`id`, `username`, `org`, `title`, `descs`, `amount`, `phone`, `email`, `thruorg`) VALUES
(1, 'hola', 'Flipkart', 'dfff', 'fd', '50000', '555', 'hola@hola.com', 'hola'),
(2, 'hola', 'Amazon', '50dsf', 'fsdfds', '50000', '555', 'hola@hola.com', 'hola'),
(3, 'hola', 'Amazon', '50dsf', 'fsdfds', '50000', '555', 'hola@hola.com', 'hola'),
(9, 'amityv', 'Paytm', 'School Fee', 'Money payment for fund', '1000', '789456123', 'ay@ay.com', 'AY FIRM'),
(10, 'mrhola', 'Health', 'sdfds', 'fsddsf', '5000', 'flkjdlk', 'kdflj@ljlkf', 'jlkfjsdlk'),
(11, 'bye', 'Relief', 'Flood Fund', 'ENjoy', '50000', '7459852222', 'bye@bye.com', 'BYE'),
(12, 'pp', 'Education', '', '', '', '855', 'pp@pp.com', 'pp'),
(13, 'pp', 'Education', '', '', '', '855', 'pp@pp.com', 'pp'),
(14, 'pp', 'Others', '', '', '', '855', 'pp@pp.com', 'pp'),
(15, 'pp', 'Others', '', '', '', '855', 'pp@pp.com', 'pp'),
(16, 'pp', 'Education', '', '', '', '855', 'pp@pp.com', 'pp'),
(17, 'pp', 'Others', '', '', '', '855', 'pp@pp.com', 'pp');

-- --------------------------------------------------------

--
-- Table structure for table `raise_log`
--

CREATE TABLE IF NOT EXISTS `raise_log` (
  `time` datetime NOT NULL,
  `work_done` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raise_log`
--

INSERT INTO `raise_log` (`time`, `work_done`, `status`) VALUES
('2017-11-25 21:26:41', 'Funded', 'Pending For Review'),
('2017-11-25 21:26:48', 'Funded', 'Pending For Review'),
('2017-11-25 21:31:21', 'Funded', 'Pending For Review');

-- --------------------------------------------------------

--
-- Table structure for table `requestfund`
--

CREATE TABLE IF NOT EXISTS `requestfund` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `org` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `descs` varchar(500) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestfund`
--

INSERT INTO `requestfund` (`id`, `username`, `org`, `title`, `descs`, `amount`, `phone`, `status`) VALUES
(1, 'hola', 'Paytm', 'fsdf', 'fsd', '55', '555', 'Paid'),
(2, 'hola', 'Paytm', 'hola', ' hola', '50000', '55655', 'Paid'),
(9, 'hi', 'NGO', 'Flood Fund', 'House building', '50000', '748596123', 'Paid'),
(10, 'kkm', 'Others', 'groinf', 'joi', '60000', '85552222', 'Paid'),
(11, 'kkm', 'Health', 'Hospital Bill', 'Cancer Patient needs fund', '100000', '8529637415', 'Paid'),
(12, 'kkm', 'NGO', 'Skill India', 'Building Skilled labour for job opputunity', '5000000', '8498393939', 'Paid'),
(13, 'kkm', 'Relief', 'Natural Disaster', 'flood in bihar', '800000', '7485655555', 'Paiddfsdfsd');

--
-- Triggers `requestfund`
--
DELIMITER $$
CREATE TRIGGER `raise_trig` BEFORE UPDATE ON `requestfund`
 FOR EACH ROW BEGIN
IF(NEW.amount>500000) THEN
INSERT INTO raise_log VALUES(NOW(),'Funded','Pending For Review');
ELSE
INSERT INTO raise_log VALUES(NOW(),'Funded','Done');
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `org` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `address`, `mobile`, `org`, `email`, `password`, `user_type`) VALUES
(1, 'hola', 'hola hola', 'holahola', '555', 'Paytm', 'hola@hola.com', '4d186321c1a7f0f354b297e8914ab240', 1),
(7, 'r', 'r', 'r', '88900404000', 'r', 'r@r.com', '4b43b0aee35624cd95b910189b3dc231', NULL),
(9, 'mrhola', 'fsdfsdfsdf', 'fdjslk', 'flkjdlk', 'Paytm', 'kdflj@ljlkf', '4d186321c1a7f0f354b297e8914ab240', 2),
(10, 'hi', 'hi', 'hi', '8227185582', 'Hi', 'hi@hi.com', '49f68a5c8493ec2c0bf489821c21fc3b', 1),
(11, 'bye', 'BYe', 'BYE', '7459852222', 'BYE', 'bye@bye.com', 'bfa99df33b137bc8fb5f5407d7e58da8', 2),
(12, 'kkm', 'kkm', 'kkm', '990909009', 'kkm', 'kkm@kkm', '4c4c62c41d067ae024ab441daa6bb2cf', 1),
(13, 'pp', 'pp', 'pp', '855', 'pp', 'pp@pp.com', 'c483f6ce851c9ecd9fb835ff7551737c', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_det`
--
ALTER TABLE `bank_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `made_payment`
--
ALTER TABLE `made_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_det`
--
ALTER TABLE `payment_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raisefund`
--
ALTER TABLE `raisefund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestfund`
--
ALTER TABLE `requestfund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_det`
--
ALTER TABLE `bank_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `made_payment`
--
ALTER TABLE `made_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `payment_det`
--
ALTER TABLE `payment_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `raisefund`
--
ALTER TABLE `raisefund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `requestfund`
--
ALTER TABLE `requestfund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
