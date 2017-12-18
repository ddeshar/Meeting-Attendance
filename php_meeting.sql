-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2017 at 04:36 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_meeting_atten`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `detail_id` int(3) NOT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `agenda` varchar(45) DEFAULT NULL,
  `president` varchar(45) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `nationalid` bigint(13) NOT NULL,
  `wat` int(5) NOT NULL,
  `position` int(2) NOT NULL,
  `name` varchar(109) DEFAULT NULL,
  `chaya` varchar(109) DEFAULT NULL,
  `lastname` varchar(105) DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `dou` timestamp NULL DEFAULT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` int(2) NOT NULL,
  `position_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `positions`
--

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `status` enum('0','100','500') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `avatar`, `status`) VALUES
(1, 'Test', 'admin', 'tester', 'ca52f8b060a57d4c985640607ed52382ae3918f67057afba39d7f9338fce452a', 'test@gmal.com', '1513593869.jpg', '500'),
(2, 'Demo', 'Deshar', 'demo', 'e8730e71bbe10d2c40a15ab4b86b2413b033ee1fa04588069f6e4444fab0c23f', 'demo@gmail.com', '1513582368.jpg', '500');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `members_nationalid` bigint(13) NOT NULL,
  `date_scan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detail_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wats`
--

CREATE TABLE IF NOT EXISTS `wats` (
  `wat_id` int(5) NOT NULL,
  `wat_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wats`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`nationalid`),
  ADD KEY `fk_members_wats1_idx` (`wat`),
  ADD KEY `fk_members_positions1_idx` (`position`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`detail_id`,`members_nationalid`),
  ADD KEY `fk_time_members_idx` (`members_nationalid`),
  ADD KEY `fk_time_detail1_idx` (`detail_id`);

--
-- Indexes for table `wats`
--
ALTER TABLE `wats`
  ADD PRIMARY KEY (`wat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `detail_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wats`
--
ALTER TABLE `wats`
  MODIFY `wat_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_members_positions1` FOREIGN KEY (`position`) REFERENCES `positions` (`position_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_members_wats1` FOREIGN KEY (`wat`) REFERENCES `wats` (`wat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `fk_time_detail1` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`detail_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_time_members` FOREIGN KEY (`members_nationalid`) REFERENCES `members` (`nationalid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
