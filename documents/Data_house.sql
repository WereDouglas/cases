-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2016 at 08:22 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE IF NOT EXISTS `appraisal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `attachment` varchar(500) DEFAULT NULL,
  `objectives` text,
  `rating` varchar(50) DEFAULT NULL,
  `submitted` varchar(50) DEFAULT NULL,
  `approved` text,
  `by` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appraisal`
--

INSERT INTO `appraisal` (`id`, `user`, `attachment`, `objectives`, `rating`, `submitted`, `approved`, `by`) VALUES
(1, '4', 'CC_lists_And_Group_messaging1.pdf', 'User role management', '4', '2016-05-10 15:15:04', 'T', NULL),
(2, '3', 'CC_errors_2.0', 'Monitary fund', '5', '2016-05-13 12:17:46', 'F', NULL),
(3, '5', 'dsdTaxi.apk', 'Water level determination', '2', '2016-05-17 16:25:33', 'T', NULL),
(4, '2', '308375_2459913737260_1134567992_n.jpg', 'Testing the  mailer', '1', '2016-05-17 16:31:19', 'T', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checktime` varchar(50) DEFAULT NULL,
  `dated` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `endtime` varchar(50) DEFAULT NULL,
  `userID` varchar(50) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=286 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `checktime`, `dated`, `time`, `endtime`, `userID`, `created`) VALUES
(184, '11/05/2016 19:23:42', '2016-05-11', '19:23', '08:30', '5', '2016-05-20 20:07:51'),
(185, '19/05/2016 18:57:04', '2016-05-19', '18:57', '16:16', '5', '2016-05-20 20:07:53'),
(186, '19/05/2016 08:00:12', '2016-05-19', '08:00', '14:55', '18', '2016-05-20 20:07:56'),
(187, '11/05/2016 08:19:21', '2016-05-11', '08:19', '17:48', '8', '2016-05-20 20:07:58'),
(188, '14/05/2016 16:04:55', '2016-05-14', '16:04', '08:14', '6', '2016-05-20 20:08:01'),
(189, '11/05/2016 10:05:26', '2016-05-11', '10:05', '10:05', '29', '2016-05-20 20:08:03'),
(190, '19/05/2016 18:08:09', '2016-05-19', '18:08', '18:08', '128', '2016-05-20 20:08:04'),
(191, '20/05/2016 18:48:47', '2016-05-20', '18:48', '07:10', '88', '2016-05-20 20:08:05'),
(192, '19/05/2016 18:58:35', '2016-05-19', '18:58', '07:53', '127', '2016-05-20 20:08:08'),
(193, '11/05/2016 08:12:23', '2016-05-11', '08:12', '17:56', '129', '2016-05-20 20:08:10'),
(194, '5/1/2016 10:15:35 AM', '2016-05-01', '10:15', '10:15', '22', '2016-05-20 20:23:53'),
(195, '5/1/2016 10:21:52 AM', '2016-05-01', '10:21', '10:21', '39', '2016-05-20 20:23:58'),
(196, '5/2/2016 6:12:37 PM', '2016-05-02', '18:12', '18:12', '14', '2016-05-20 20:24:07'),
(197, '5/2/2016 6:21:03 PM', '2016-05-02', '18:21', '18:21', '21', '2016-05-20 20:24:10'),
(198, '5/2/2016 6:29:54 PM', '2016-05-02', '18:29', '18:29', '124', '2016-05-20 20:24:13'),
(199, '5/2/2016 6:33:38 PM', '2016-05-02', '18:33', '18:33', '24', '2016-05-20 20:24:15'),
(200, '5/2/2016 6:43:15 PM', '2016-05-02', '18:43', '18:43', '20', '2016-05-20 20:24:17'),
(201, '5/2/2016 6:43:20 PM', '2016-05-02', '18:43', '18:43', '22', '2016-05-20 20:24:24'),
(202, '5/2/2016 7:43:59 PM', '2016-05-02', '19:43', '19:43', '51', '2016-05-20 20:24:27'),
(203, '5/2/2016 8:30:19 PM', '2016-05-02', '20:30', '20:30', '86', '2016-05-20 20:24:30'),
(204, '5/3/2016 6:36:26 AM', '2016-05-03', '06:36', '06:36', '118', '2016-05-20 20:24:33'),
(205, '5/3/2016 6:49:00 AM', '2016-05-03', '06:49', '06:49', '18', '2016-05-20 20:24:37'),
(206, '5/3/2016 6:55:50 AM', '2016-05-03', '06:55', '06:55', '11', '2016-05-20 20:24:42'),
(207, '5/3/2016 6:59:54 AM', '2016-05-03', '06:59', '06:59', '116', '2016-05-20 20:24:45'),
(208, '5/3/2016 7:08:54 AM', '2016-05-03', '07:08', '07:08', '21', '2016-05-20 20:24:49'),
(209, '5/3/2016 7:12:25 AM', '2016-05-03', '07:12', '07:12', '132', '2016-05-20 20:24:54'),
(210, '5/3/2016 7:23:29 AM', '2016-05-03', '07:23', '07:23', '14', '2016-05-20 20:25:02'),
(211, '5/3/2016 7:25:22 AM', '2016-05-03', '07:25', '07:25', '115', '2016-05-20 20:25:06'),
(212, '5/3/2016 7:30:12 AM', '2016-05-03', '07:30', '07:30', '35', '2016-05-20 20:25:11'),
(213, '5/3/2016 7:34:30 AM', '2016-05-03', '07:34', '07:34', '112', '2016-05-20 20:25:17'),
(214, '5/3/2016 7:35:08 AM', '2016-05-03', '07:35', '07:35', '130', '2016-05-20 20:25:23'),
(215, '5/3/2016 7:40:08 AM', '2016-05-03', '07:40', '07:40', '27', '2016-05-20 20:25:29'),
(216, '5/3/2016 7:41:43 AM', '2016-05-03', '07:41', '07:41', '15', '2016-05-20 20:25:35'),
(217, '5/3/2016 7:43:51 AM', '2016-05-03', '07:43', '07:43', '128', '2016-05-20 20:25:40'),
(218, '5/3/2016 7:44:02 AM', '2016-05-03', '07:44', '07:44', '51', '2016-05-20 20:25:47'),
(219, '5/3/2016 7:44:49 AM', '2016-05-03', '07:44', '07:44', '134', '2016-05-20 20:26:27'),
(220, '5/3/2016 7:45:06 AM', '2016-05-03', '07:45', '07:45', '12', '2016-05-20 20:26:41'),
(221, '5/3/2016 7:45:50 AM', '2016-05-03', '07:45', '', '49', '2016-05-20 20:26:48'),
(222, '5/3/2016 7:57:58 AM', '2016-05-03', '07:57', '', '24', '2016-05-20 20:26:56'),
(223, '5/3/2016 8:05:57 AM', '2016-05-03', '08:05', '', '13', '2016-05-20 20:27:05'),
(224, '5/3/2016 8:06:05 AM', '2016-05-03', '08:06', '', '30', '2016-05-20 20:27:14'),
(225, '5/3/2016 8:10:13 AM', '2016-05-03', '08:10', '', '111', '2016-05-20 20:27:23'),
(226, '5/3/2016 8:19:46 AM', '2016-05-03', '08:19', '', '88', '2016-05-20 20:28:27'),
(227, '5/3/2016 8:24:25 AM', '2016-05-03', '08:24', '', '32', '2016-05-20 20:28:41'),
(228, '5/3/2016 8:24:38 AM', '2016-05-03', '08:24', '', '34', '2016-05-20 20:29:55'),
(229, '5/3/2016 8:30:26 AM', '2016-05-03', '08:30', '', '114', '2016-05-20 20:30:22'),
(230, '5/3/2016 8:33:08 AM', '2016-05-03', '08:33', '', '20', '2016-05-20 20:30:39'),
(231, '5/3/2016 8:45:29 AM', '2016-05-03', '08:45', '', '37', '2016-05-20 20:30:51'),
(232, '5/3/2016 8:48:36 AM', '2016-05-03', '08:48', '', '33', '2016-05-20 20:31:05'),
(233, '5/3/2016 9:02:46 AM', '2016-05-03', '09:02', '', '29', '2016-05-20 20:31:20'),
(234, '5/3/2016 9:34:38 AM', '2016-05-03', '09:34', '', '26', '2016-05-20 20:31:36'),
(235, '5/3/2016 9:37:48 AM', '2016-05-03', '09:37', '', '16', '2016-05-20 20:31:53'),
(236, '5/3/2016 10:11:43 AM', '2016-05-03', '10:11', '', '22', '2016-05-20 20:32:11'),
(237, '4/1/2016 6:13:10 AM', '2016-04-01', '06:13', '06:13', '118', '2016-05-20 20:46:54'),
(238, '4/1/2016 6:17:12 AM', '2016-04-01', '06:17', '06:17', '22', '2016-05-20 20:46:57'),
(239, '4/1/2016 6:49:17 AM', '2016-04-01', '06:49', '06:49', '18', '2016-05-20 20:46:59'),
(240, '4/1/2016 6:59:46 AM', '2016-04-01', '06:59', '07:08', '86', '2016-05-20 20:47:01'),
(241, '4/1/2016 7:18:41 AM', '2016-04-01', '07:18', '07:18', '11', '2016-05-20 20:47:04'),
(242, '4/1/2016 7:19:09 AM', '2016-04-01', '07:19', '07:19', '130', '2016-05-20 20:47:07'),
(243, '4/1/2016 7:19:53 AM', '2016-04-01', '07:19', '07:19', '33', '2016-05-20 20:47:10'),
(244, '4/1/2016 7:31:06 AM', '2016-04-01', '07:31', '07:33', '27', '2016-05-20 20:47:14'),
(245, '4/1/2016 7:32:30 AM', '2016-04-01', '07:32', '07:32', '112', '2016-05-20 20:47:17'),
(246, '4/2/2016 6:01:22 PM', '2016-04-02', '18:01', '18:01', '32', '2016-05-20 20:47:26'),
(247, '4/2/2016 6:01:42 PM', '2016-04-02', '18:01', '18:01', '22', '2016-05-20 20:47:30'),
(248, '4/2/2016 7:28:37 PM', '2016-04-02', '19:28', '19:51', '16', '2016-05-20 20:47:52'),
(249, '4/3/2016 7:45:32 AM', '2016-04-03', '07:45', '08:12', '88', '2016-05-20 20:47:58'),
(250, '4/3/2016 1:20:30 PM', '2016-04-03', '13:20', '15:41', '128', '2016-05-20 20:48:12'),
(251, '4/3/2016 1:32:36 PM', '2016-04-03', '13:32', '14:16', '39', '2016-05-20 20:48:17'),
(252, '4/3/2016 2:51:38 PM', '2016-04-03', '14:51', '14:51', '88', '2016-05-20 20:48:26'),
(253, '4/3/2016 2:58:01 PM', '2016-04-03', '14:58', '14:58', '12', '2016-05-20 20:48:32'),
(254, '4/3/2016 3:28:36 PM', '2016-04-03', '15:28', '15:28', '44', '2016-05-20 20:48:38'),
(255, '4/3/2016 3:31:41 PM', '2016-04-03', '15:31', '15:31', '25', '2016-05-20 20:48:44'),
(256, '4/3/2016 3:46:46 PM', '2016-04-03', '15:46', '16:25', '132', '2016-05-20 20:48:58'),
(257, '4/3/2016 5:17:36 PM', '2016-04-03', '17:17', '17:19', '22', '2016-05-20 20:49:46'),
(258, '4/4/2016 6:44:22 AM', '2016-04-04', '06:44', '06:44', '118', '2016-05-20 20:51:09'),
(259, '4/4/2016 6:50:57 AM', '2016-04-04', '06:50', '06:50', '33', '2016-05-20 20:51:24'),
(260, '4/4/2016 6:55:13 AM', '2016-04-04', '06:55', '06:55', '11', '2016-05-20 20:51:40'),
(261, '4/4/2016 7:01:25 AM', '2016-04-04', '07:01', '07:01', '132', '2016-05-20 20:51:57'),
(262, '4/4/2016 7:18:10 AM', '2016-04-04', '07:18', '07:18', '112', '2016-05-20 20:52:16'),
(263, '4/4/2016 7:26:54 AM', '2016-04-04', '07:26', '07:26', '21', '2016-05-20 20:52:35'),
(264, '4/4/2016 7:29:54 AM', '2016-04-04', '07:29', '07:29', '25', '2016-05-20 20:52:56'),
(265, '4/4/2016 7:38:15 AM', '2016-04-04', '07:38', '07:38', '20', '2016-05-20 20:53:20'),
(266, '4/4/2016 7:38:48 AM', '2016-04-04', '07:38', '07:38', '129', '2016-05-20 20:53:44'),
(267, '4/4/2016 7:43:09 AM', '2016-04-04', '07:43', '07:43', '15', '2016-05-20 20:54:10'),
(268, '4/4/2016 7:44:04 AM', '2016-04-04', '07:44', '07:44', '128', '2016-05-20 20:54:36'),
(269, '4/4/2016 7:48:45 AM', '2016-04-04', '07:48', '07:48', '27', '2016-05-20 20:55:04'),
(270, '4/4/2016 7:50:06 AM', '2016-04-04', '07:50', '07:50', '86', '2016-05-20 20:55:33'),
(271, '4/4/2016 7:52:39 AM', '2016-04-04', '07:52', '07:52', '44', '2016-05-20 20:56:05'),
(272, '4/4/2016 7:57:46 AM', '2016-04-04', '07:57', '07:57', '111', '2016-05-20 20:56:38'),
(273, '4/4/2016 7:57:51 AM', '2016-04-04', '07:57', '07:57', '130', '2016-05-20 20:57:14'),
(274, '4/4/2016 8:08:55 AM', '2016-04-04', '08:08', '08:08', '22', '2016-05-20 20:57:51'),
(275, '4/4/2016 8:12:21 AM', '2016-04-04', '08:12', '08:12', '14', '2016-05-20 20:58:32'),
(276, '4/4/2016 8:20:03 AM', '2016-04-04', '08:20', '08:20', '19', '2016-05-20 20:59:14'),
(277, '4/4/2016 8:20:33 AM', '2016-04-04', '08:20', '08:20', '9', '2016-05-20 21:00:01'),
(278, '4/4/2016 8:22:30 AM', '2016-04-04', '08:22', '', '24', '2016-05-20 21:00:52'),
(279, '4/4/2016 8:26:08 AM', '2016-04-04', '08:26', '', '29', '2016-05-20 21:01:46'),
(280, '4/4/2016 8:28:58 AM', '2016-04-04', '08:28', '', '26', '2016-05-20 21:02:44'),
(281, '4/4/2016 8:35:52 AM', '2016-04-04', '08:35', '', '12', '2016-05-20 21:03:47'),
(282, '4/4/2016 9:12:33 AM', '2016-04-04', '09:12', '', '34', '2016-05-20 21:04:59'),
(283, '4/4/2016 9:19:46 AM', '2016-04-04', '09:19', '', '8', '2016-05-20 21:06:21'),
(284, '4/1/2016 7:35:20 AM', '2016-04-01', '07:35', '07:35', '51', '2016-05-20 21:07:53'),
(285, '4/1/2016 7:35:41 AM', '2016-04-01', '07:35', '', '128', '2016-05-20 21:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `benefit`
--

CREATE TABLE IF NOT EXISTS `benefit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `rate` varchar(50) DEFAULT NULL,
  `period` text,
  `effect` text,
  `tax` text,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `benefit`
--

INSERT INTO `benefit` (`id`, `name`, `rate`, `period`, `effect`, `tax`, `user`) VALUES
(1, 'PAYE', '200000', 'Monthly', 'Credit', 'No', '2'),
(2, 'NSSF', '30%', 'Monthly', 'Debit', 'No', '2');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `name`) VALUES
(1, 'NSSF'),
(2, 'PAYE');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`) VALUES
(1, 'Central'),
(2, 'Eastern'),
(3, 'Uganda'),
(4, 'Uganda Western Region'),
(5, 'mayuge');

-- --------------------------------------------------------

--
-- Table structure for table `deadlines`
--

CREATE TABLE IF NOT EXISTS `deadlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `start` varchar(50) DEFAULT NULL,
  `end` varchar(50) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  `active` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Accounting and Finance'),
(2, 'Procurement and logistics'),
(3, 'Administration'),
(4, 'Information systems');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE IF NOT EXISTS `doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id`, `user`, `name`) VALUES
(1, '2', 'Application_Form_-_UN_Youth_Innovators_Hangout_2014.pdf'),
(2, '2', 'Clinic_Communicator_Alternative_SMS_solution1.pdf'),
(3, '5', 'Akeezimbira_SACCO_LTD1.pdf'),
(4, '5', 'Cylindrical_vertical_tank_installation_guide.pdf'),
(5, '4', 'Clinic_Communicator_Alternative_SMS_solution2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `institute` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `completion` varchar(50) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user`, `institute`, `qualification`, `grade`, `completion`, `created`, `image`) VALUES
(1, '2', 'Makerere University', 'Bsc.Computer science', '3.4', '2012', '2016-05-16', 'company.jpg'),
(2, '2', 'Dental Uganda', 'PGD ', '4.5', '2016', '2016-05-16', 'human-tooth-chart-21352925.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `institution` text,
  `qualification` text,
  `completed` varchar(100) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user`, `institution`, `qualification`, `completed`, `details`, `attachment`) VALUES
(1, '2', 'Lugogo Vocational Institute', 'Certificate in Welding', '2013', 'Mechanical works', 'Underground_spherical_water_tank_installation_guide.pdf'),
(2, '2', 'Makerere University', 'Degree Bsc.IT', '2016', 'information technology', 'PROPOSAL_WEBSITE_DESIGN_NOVARISS.pdf'),
(3, '2', 'Makerere University', 'Msc.IT', '2007', '', 'CC_lists_And_Group_messaging.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `subject` text,
  `schedule` varchar(50) DEFAULT NULL,
  `reciever` varchar(255) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  `sent` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `message`, `subject`, `schedule`, `reciever`, `created`, `sent`) VALUES
(1, 'james@gmail.com  Has uploaded his appraisal', 'APPRAISAL UPLOAD', '2016-05-12', 'weredouglas@gmail.com', '2016-05-17 16:25:33', 'true'),
(2, 'weredouglas@gmail.com  Has uploaded his appraisal', 'APPRAISAL UPLOAD', '2016-05-17', 'weredouglas@gmail.com', '2016-05-17 16:31:19', 'true'),
(3, '  has requested  for leave starting <b>2016-05-18</b> for 4', 'LEAVE REQUEST', '2016-05-17', 'weredouglas@gmail.com', '2016-05-17 16:48:36', 'true'),
(4, 'weredouglas@yahoo.com Your Password has been changed to  <b>7FD86x</b> for Afenet HR login panel', 'CHANGED PASSWORD FOR YOUR AFENET HR LOGIN ACCOUNT', '2016-05-17', 'weredouglas@yahoo.com', '2016-05-17 16:51:57', 'true'),
(5, 'weredouglas@yahoo.com Your Password has been changed to  <b>ZoB6qq</b> for Afenet HR login panel', 'CHANGED PASSWORD FOR YOUR AFENET HR LOGIN ACCOUNT', '2016-05-17', 'weredouglas@yahoo.com', '2016-05-17 16:52:43', 'true'),
(6, 'weredouglas@yahoo.com Your Password has been changed to  <b>YDdf9M</b> for Afenet HR login panel', 'CHANGED PASSWORD FOR YOUR AFENET HR LOGIN ACCOUNT', '2016-05-18', 'weredouglas@yahoo.com', '2016-05-18 17:24:43', 'true'),
(7, 'weredouglas@gmail.com Your Password has been changed to  <b>KG0Obj</b> for Afenet HR login panel', 'CHANGED PASSWORD FOR YOUR AFENET HR LOGIN ACCOUNT', '2016-05-18', 'weredouglas@gmail.com', '2016-05-18 17:27:39', 'true'),
(8, 'weredouglas@gmail.com Your Password has been changed to  <b>DNeycN</b> for Afenet HR login panel', 'CHANGED PASSWORD FOR YOUR AFENET HR LOGIN ACCOUNT', '2016-05-18', 'weredouglas@gmail.com', '2016-05-18 17:30:26', 'true'),
(9, 'gatamamichael@gmail.com Your Password has been changed to  <b>qanXcd</b> for Afenet HR login panel', 'CHANGED PASSWORD FOR YOUR AFENET HR LOGIN ACCOUNT', '2016-05-18', 'gatamamichael@gmail.com', '2016-05-18 17:31:24', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `employ_type`
--

CREATE TABLE IF NOT EXISTS `employ_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employ_type`
--

INSERT INTO `employ_type` (`id`, `name`) VALUES
(1, 'none'),
(2, 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `company` text,
  `role` text,
  `address` text,
  `period` varchar(50) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `user`, `company`, `role`, `address`, `period`, `attachment`, `description`) VALUES
(1, '2', 'Makere University', 'Administrator', 'Kampala Makerere', '2', 'Akeezimbira_SACCO_LTD.pdf', 'Senate Admin'),
(2, '2', 'Access Mobile Uganda Ltd', 'Accountant', 'Hive Colab Kanjokya House', '4', 'Clinic_Communicator_Alternative_SMS_solution.pdf', 'Accounting and finance');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `status` text,
  `contract` varchar(100) DEFAULT NULL,
  `offer` varchar(100) DEFAULT NULL,
  `probation` varchar(100) DEFAULT NULL,
  `end` varchar(50) DEFAULT NULL,
  `description` text,
  `days` varchar(100) DEFAULT NULL,
  `hours` varchar(100) DEFAULT NULL,
  `week` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `accbranch` text,
  `acc` varchar(100) DEFAULT NULL,
  `accno` varchar(100) DEFAULT NULL,
  `nssf` varchar(100) DEFAULT NULL,
  `tin` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `ext` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `reports` text,
  `approver` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `user`, `status`, `contract`, `offer`, `probation`, `end`, `description`, `days`, `hours`, `week`, `bank`, `accbranch`, `acc`, `accno`, `nssf`, `tin`, `branch`, `department`, `role`, `email`, `phone`, `ext`, `skype`, `linkedin`, `reports`, `approver`) VALUES
(5, '3', 'False', 'Permanent', '09-03-2014', '09-05-2016', '14-05-2016', 'Management', '5', '8', '40', 'Stanbic', 'Speke Road', 'Nasali Mary', '0412789000', '323423234546', '7800000232', 'Eastern', 'Accounting and Finance', 'Human Resource', 'mary@efenet.org', '0412328900', '340', NULL, 'nasali.marylinkedin', '', 'Nasali Mary'),
(6, '2', 'True', 'Permanent', '09-03-2014', '20-05-2016', '19-05-2016', 'Management', '5', '8', '40', 'Stanbic', 'Speke Road', 'Nasali Mary', '0412789000', '323423234546', '7800000232481', 'Eastern', 'Accounting and Finance', 'Human Resource', 'mary@efenet.org', '0412328900', '340', 'mary.Nasali', '', '', 'Nasali Mary'),
(7, '4', 'True', 'none', '09-03-2014', '26-05-2015', '21-05-2019', 'Operations and organisation', '5', '8', '45', 'Housinf Finance', 'Mukono', 'Monica M', '4509129087', '9023940809890', '670098', 'Uganda Western Region', 'Procurement and logistics', 'Procurement Officer', 'monica@gmail.com', '0370998912', '45', 'monica', 'mutesii  ', '', 'Nasali Mary');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `period` int(11) DEFAULT NULL,
  `default` varchar(50) DEFAULT NULL,
  `bookable` text,
  `authorised` text,
  `paid` text,
  `deduct` text,
  `color` varchar(50) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `start` varchar(50) DEFAULT NULL,
  `end` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `name`, `description`, `period`, `default`, `bookable`, `authorised`, `paid`, `deduct`, `color`, `user`, `start`, `end`) VALUES
(5, 'Sick', 'HE is sick ', 3, 'days', 'yes', 'yes', 'yes', 'yes', '#ffff', '3', '2016-05-12', '2016-05-27'),
(9, 'Annual', 'Her leave', 2, 'days', 'yes', 'yes', 'yes', 'yes', '', '2', '2016-05-20', '2016-05-23'),
(10, 'Annual', 'Anual away period', 4, 'days', 'yes', 'yes', 'yes', 'yes', '', '5', '2016-05-17', ''),
(11, 'Sick', 'In need of rest', 4, 'days', 'yes', 'yes', 'yes', 'yes', '', '4', '2016-05-18', ''),
(12, 'Sick', 'In need of rest', 4, 'days', 'yes', 'yes', 'yes', 'yes', '', '4', '2016-05-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE IF NOT EXISTS `leave_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `period` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `name`, `period`) VALUES
(1, 'Annual', NULL),
(2, 'Sick', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opening`
--

CREATE TABLE IF NOT EXISTS `opening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `category` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `location` text,
  `country` text,
  `description` text,
  `responsibility` text,
  `requirement` text,
  `industry` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `maxage` varchar(100) DEFAULT NULL,
  `minage` varchar(100) DEFAULT NULL,
  `positions` varchar(100) DEFAULT NULL,
  `minsal` varchar(100) DEFAULT NULL,
  `maxsal` varchar(100) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `deadline` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `created` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `opening`
--

INSERT INTO `opening` (`id`, `title`, `category`, `code`, `location`, `country`, `description`, `responsibility`, `requirement`, `industry`, `role`, `maxage`, `minage`, `positions`, `minsal`, `maxsal`, `experience`, `deadline`, `user`, `created`, `qualification`) VALUES
(1, 'Division Director - Research Quality Management', ' MU-JHU Care Ltd (MUJHU)', ' MU-JHU Care Ltd (MUJHU)', 'Kampala, Uganda', 'Uganda', 'The Division Director - Research Quality Management takes the overall responsibility for promoting excellent data quality for all MU-JHU research studies including those sponsored by the U.S. National Institutes of Health (both HIV research networks and investigator driven R grants). The incumbent also leads a multidisciplinary division of more than 30 staff in 4 sections responsible for Quality Assurance, Quality Control, Data Management and Records Management. The jobholder will work in liaison with the section supervisors and senior research staff on a day to day basis to promote efficiency and effectiveness. The incumbent also works as part of the management team to support overall organizational planning and management including human resource allocations responding to changing study workloads.', 'The Division Director - Research Quality Management takes the overall responsibility for promoting excellent data quality for all MU-JHU research studies including those sponsored by the U.S. National Institutes of Health (both HIV research networks and investigator driven R grants). The incumbent also leads a multidisciplinary division of more than 30 staff in 4 sections responsible for Quality Assurance, Quality Control, Data Management and Records Management. The jobholder will work in liaison with the section supervisors and senior research staff on a day to day basis to promote efficiency and effectiveness. The incumbent also works as part of the management team to support overall organizational planning and management including human resource allocations responding to changing study workloads.', 'The applicant should hold an MBChB (or equivalent medical training), Master’s Degree in Statistical Science or Data Management\r\nA minimum of five years’ experience working with medical research institutions; and experience in QC/QA would be an advantage.\r\nPrevious experience in data management and or quality control/assurance is an added advantage.\r\nA highly motivated individual with a critical eye for detail to ensure proper research documentation and good quality.\r\nKnowledgeable about Good Clinical Practice (GCP) and proper documentation in research setting.\r\nBe a good team player\r\nExcellent organizational, leadership and communication skills.\r\nAn excellent planner and good time manager, who is able to prioritize work tasks and work under time pressure. ', 'IT', 'Human Resource', '', '', '2', '', '', '', '2016-05-13', NULL, '2016-05-13', 'Msc.Eng'),
(2, 'Jr Customer Service Agent', 'Ethiopian Airlines', 'Ethiopian Airlines', 'Jinja', 'Uganda', 'Ethiopian Airlines is Ethiopia’s flag carrier and is wholly owned by the country''s government. EAL was founded on 21 December 1945 and commenced operations on 8 April 1946, expanding to international flights in 1951. The firm became a share company in 1965, and changed its name from Ethiopian Air Lines to Ethiopian Airlines. The airline has been a member of the International Air Transport Association since 1959, and of the African Airlines Association (AFRAA) since 1968. ', 'Ethiopian Airlines is Ethiopia’s flag carrier and is wholly owned by the country''s government. EAL was founded on 21 December 1945 and commenced operations on 8 April 1946, expanding to international flights in 1951. The firm became a share company in 1965, and changed its name from Ethiopian Air Lines to Ethiopian Airlines. The airline has been a member of the International Air Transport Association since 1959, and of the African Airlines Association (AFRAA) since 1968. ', ' Qualifications, Skills and Experience:  \r\n\r\n    The ideal candidate for Ethiopian Airlines Jr Customer Service Agent job placement should possess a degree in Tourism or Marketing\r\n    At least two years’ experience in a travel industry especially in Reservation and Ticketing\r\n    The applicant should possess excellent communication skills\r\n    Possess working knowledge of booking systems', 'Permanent', 'IT Help Desk Support', '18', '34', '4', '0', '0', '3', '2016-05-25', NULL, '2016-05-13', 'BSc');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Accountant'),
(2, 'Human Resource'),
(3, 'Procurement Officer'),
(4, 'IT Help Desk Support');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`) VALUES
(1, 'Mr'),
(2, 'Mrs'),
(10, 'Miss'),
(11, 'Dr'),
(13, 'Leader'),
(14, 'Counsel');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `no` varchar(300) DEFAULT NULL,
  `name` text,
  `dob` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `job` text,
  `gender` text,
  `image` varchar(800) DEFAULT NULL,
  `country` text,
  `password` varchar(800) DEFAULT NULL,
  `marital` text,
  `location` text,
  `city` text,
  `region` text,
  `created` varchar(50) DEFAULT NULL,
  `status` text,
  `level` varchar(50) DEFAULT NULL,
  `reports` varchar(255) DEFAULT NULL,
  `approver` varchar(255) DEFAULT NULL,
  `accessID` varchar(50) DEFAULT NULL,
  `badgeNo` varchar(50) DEFAULT NULL,
  `accessName` text,
  `application` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `no`, `name`, `dob`, `contact`, `email`, `job`, `gender`, `image`, `country`, `password`, `marital`, `location`, `city`, `region`, `created`, `status`, `level`, `reports`, `approver`, `accessID`, `badgeNo`, `accessName`, `application`) VALUES
(2, 'Miss', NULL, 'Nasali Mary ', '16-03-1991', '0789023423', 'weredouglas@gmail.com', NULL, 'female', 'nasali.jpg', 'Uganda', '9Qexla+Wfl9ZFnknUKJ+eS7Ft8GX9QRtC7rTWvk1YKTCCP9QC+Q+YVNEo8BA6SXtw4ivRRLjQaokrt5UdA1rNw==', 'single', 'Jinja, Eastern Region, Uganda', 'Jinja', 'Eastern Region', '2016-04-25 14:01:53', 'True', NULL, NULL, NULL, '88', '', '', '1'),
(3, 'Mr', NULL, 'Vonze Richard ', '16-5-1991', '0782120367', 'gatamamichael@gmail.com', NULL, 'male', 'richard_(1).jpg', 'Uganda', 'hkBV2MmuhU38A+L5LKZw/Dmq31Av7I3gNIu+rFSv16pYDPs8FlqWcZlAtK4bVS62qTxcIr0ug1MsJxxGG2NVXA==', 'married', 'Jinja, Eastern Region, Uganda', 'Jinja', 'Eastern Region', '2016-04-25 16:30:30', 'True', NULL, NULL, NULL, '33', '', '', NULL),
(4, 'Miss', NULL, 'Monica Mutesi ', '8-05-1991', '078923423', 'monica@gmail.com', NULL, 'female', 'mutesi.jpg', 'Uganda', 'KvN6Kp2wgXRbLa+JxngbuXCtckW+DeNzG+8YQ3K0KO4CFhMn2ogxmjZfzROeC4uLZ2x3oAwgrGNg0OPXdIduVQ==', 'single', 'Najjera, Central Region, Uganda', 'Najjera', 'Central Region', '2016-04-26 11:48:10', 'True', NULL, NULL, NULL, '112', '', '', NULL),
(5, 'Mr', NULL, 'James Makumbi ', '16-5-1990', '07823334567', 'james@gmail.com', NULL, 'male', 'hamilton.jpg', 'Uganda', '7mlppguZae8AfYzCOxbrDJ/2Q5Ibdzf+wZdj550gJYrYsbzRcd+bq4TvzDfPSqHhYDToAq5VXzFGAARFvgNCAg==', 'single', 'Jinja, Eastern Region, Uganda', 'Jinja', 'Eastern Region', '2016-05-02 07:31:43', 'True', NULL, NULL, NULL, '21', '', '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
