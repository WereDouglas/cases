-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2017 at 01:21 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cases`
--
CREATE DATABASE `cases` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cases`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `accountID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE IF NOT EXISTS `attend` (
  `attendID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `taskID` varchar(255) DEFAULT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `action` text,
  `name` text,
  `contact` varchar(50) DEFAULT NULL,
  `sync` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`attendID`, `orgID`, `taskID`, `userID`, `action`, `name`, `contact`, `sync`) VALUES
('bf1e4036-262b-4178-b304-e9d11f9d8412', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '4272135c-34bc-4e43-b4ce-be4aaf81d719', 'BF6A4C9C-9384-484D-A440-7E0CE486DAA0', 'none', 'Paul Mayiga', '041437809', NULL),
('5a8bc715-e183-463d-b87e-b9bad2551406', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '19957691-8589-4931-850c-fa13ff6829c3', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('5a8bc715-e183-463d-b87e-b9bad2551406', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '19957691-8589-4931-850c-fa13ff6829c3', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('5a8bc715-e183-463d-b87e-b9bad2551406', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '19957691-8589-4931-850c-fa13ff6829c3', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('1b068d21-0575-44ee-99bb-f0531b3f8f87', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '24e5c683-833f-4742-b72a-70f093faf263', '805B3130-B26E-401F-AA18-9337A368BC1A', 'none', 'Michael Mayinja', '0782901287', NULL),
('1b068d21-0575-44ee-99bb-f0531b3f8f87', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '24e5c683-833f-4742-b72a-70f093faf263', '805B3130-B26E-401F-AA18-9337A368BC1A', 'none', 'Michael Mayinja', '0782901287', NULL),
('3b25da00-1b03-4b3a-b14a-d204ff4a0846', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'a38209c6-210c-4a72-a5d8-ca25a8cfe389', '805B3130-B26E-401F-AA18-9337A368BC1A', 'none', 'Michael Mayinja', '0782901287', NULL),
('3b25da00-1b03-4b3a-b14a-d204ff4a0846', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'a38209c6-210c-4a72-a5d8-ca25a8cfe389', '805B3130-B26E-401F-AA18-9337A368BC1A', 'none', 'Michael Mayinja', '0782901287', NULL),
('', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '1879f6ed-26d0-47da-ad23-a9342d4217f6', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('b8a7d6d1-c9fd-4076-945d-1180e93e6a65', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '71580dc2-92c8-4dcb-8df4-52f7ff5b7f6e', '805B3130-B26E-401F-AA18-9337A368BC1A', 'none', 'Michael Mayinja', '0782901287', NULL),
('4A67510A-9CA7-423A-B6B9-4305B27B68AB', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '0ED43DEB-CF92-4974-A343-7F18254B0EAD', '805B3130-B26E-401F-AA18-9337A368BC1A', 'none', 'Michael Mayinja', '0782901287', NULL),
('561DA3F0-A74B-42A1-9E6B-4FE4E8386F45', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '0ED43DEB-CF92-4974-A343-7F18254B0EAD', '8ebae852-0764-47a7-a81b-233024c59349', 'none', 'Morris Mugisha', '078123121', NULL),
('B4744CBC-F0E6-4E6F-A193-36132DB0A368', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'B27BF39C-436B-4C12-B922-F2EB40258BD7', 'BF6A4C9C-9384-484D-A440-7E0CE486DAA0', 'none', 'Paul Mayiga', '041437809', NULL),
('761516F3-EA9C-4013-9824-3F949DCF1A78', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'CAB689B6-BA4F-4886-951F-23B3D0FDF188', 'BF6A4C9C-9384-484D-A440-7E0CE486DAA0', 'none', 'Paul Mayiga', '041437809', NULL),
('01C65198-A87D-48ED-AF4F-2931B8EF4C8F', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'CAB689B6-BA4F-4886-951F-23B3D0FDF188', '8ebae852-0764-47a7-a81b-233024c59349', 'none', 'Morris Mugisha', '078123121', NULL),
('D0DB15B7-7F16-46BF-9D08-626AE1087011', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '9626A82A-4423-41F0-A041-ECB5988BA96A', 'BF6A4C9C-9384-484D-A440-7E0CE486DAA0', 'none', NULL, NULL, 'true'),
('07994083-C9D1-4603-ABE2-E15D2C0B46E5', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '9626A82A-4423-41F0-A041-ECB5988BA96A', '950dab29-aa54-44d3-80ae-5d9c70926d21', 'none', NULL, NULL, 'true'),
('78FE4F4B-F403-4CC3-A79A-9B0F2A57526C', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '8FA17DC6-2368-4528-A1B3-0E520BA15BE7', 'a2a9a1c2-0b43-4486-90a8-d1d8d1c41895', 'none', 'Ngong Wathio', '07823423445', NULL),
('AAACFC95-531A-4504-B7E6-1464B5C39EB1', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '8FA17DC6-2368-4528-A1B3-0E520BA15BE7', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('6B0FA8F2-059D-4A93-A5E0-7D7755518819', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '8FA17DC6-2368-4528-A1B3-0E520BA15BE7', 'BF6A4C9C-9384-484D-A440-7E0CE486DAA0', 'none', 'Paul Mayiga', '041437809', NULL),
('4A86491E-DCD9-490E-96B0-8B3B3ED221BE', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '8FA17DC6-2368-4528-A1B3-0E520BA15BE7', '805B3130-B26E-401F-AA18-9337A368BC1A', 'none', 'Michael Mayinja', '0782901287', NULL),
('15A51E5E-C07B-40A4-9F4D-0CD30FAE3BCC', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '5AF77619-5C79-49A8-A665-87943CE5A7E4', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'f745a882-6a82-46ae-ab51-515a6f42f718', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '3b9a6d71-343a-4010-944d-b119d5a277c6', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'd0efd0b0-1fcb-4feb-bd26-508941d9f4ea', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '70873fc2-dbc3-4ecf-84c5-4e47d9475604', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('f2e15c8a-76d1-486f-94df-45f1770c50c5', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '67b9217f-66ee-4e71-adc4-be272092b084', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('54b64737-0dae-46a2-96d2-069fe9466569', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'd94d5bc8-f521-40f2-aad8-4bf6d3614bc1', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '078245565', 'true'),
('D028D7A4-AC16-4302-AC1C-1E661AAA3CB4', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'FC4F47FE-E936-4094-A7ED-5A69D917D594', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('E9BB6A5D-B7D0-4E95-9448-2A564902289C', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'B7771236-76B2-40B1-B042-E3AC55D7A10D', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('ACFF4EE4-98BE-4C40-BD8A-586BAB1F5215', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '38B089C9-2DF4-4A4A-A77F-1C3D00EB260C', 'fb37ecfa-3c71-452b-ba07-de9a1ff1501d', 'none', 'Odole Maghi', '0772339810', 'false'),
('ADCB5826-7777-4390-903D-889DB3704F45', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'FA3B2A68-4AA0-480E-BF51-B4813613B736', 'fb37ecfa-3c71-452b-ba07-de9a1ff1501d', 'none', 'Odole Maghi', '0772339810', 'false'),
('4F8005BC-4027-4F2C-AAD3-6662AF302893', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '555E889C-6544-425C-8CE5-D3CD046C1814', 'BF6A4C9C-9384-484D-A440-7E0CE486DAA0', 'none', 'Paul Mayiga', '041437809', NULL),
('CCF19678-107F-41B2-834D-988BBA69432B', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'B3EAD166-E2BB-4A8E-A5B0-0D63C44F8E5F', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('BBA537A0-0111-4823-A993-6A9550E529A2', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'E35F11F8-AC69-4537-8B66-AF75946FDB69', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('DCA20C1E-D277-4561-86C6-03C5558417C0', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '6A746015-014A-4CFB-A1EC-80D01377551F', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('5463B9A3-3AA6-41F8-9ABB-8697B762AB9E', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'F18CDA21-0016-4976-BAAE-95C4A57B6E33', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('0A6C5CCF-6D5F-4BD1-BEC2-5595A89C35C6', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'E46DB765-0629-4BEA-8B8F-D8CE4AFCA085', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('DEF024BF-E25C-4917-B8ED-27F1FB266A55', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'F2B3044F-352C-480E-A18E-DD270A151DBA', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'true'),
('323361BB-55E5-48A4-85BF-3B71C89630B3', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'BA990A78-84A3-4B8C-B99A-8E73FD41BC5D', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0782481746', 'false'),
('26BA0B35-8C4E-4906-B769-1C5612E504E2', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'F4AB0EF9-5D62-4424-A0B2-654CC387BD25', 'F07271AC-BE35-4316-B883-AC4990E84092', 'none', 'Douglas Were', '0752336721', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `clientID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `status` text,
  `image` varchar(255) DEFAULT NULL,
  `address` text,
  `created` varchar(255) DEFAULT NULL,
  `action` text,
  `lawyer` varchar(255) DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `orgID`, `name`, `email`, `contact`, `status`, `image`, `address`, `created`, `action`, `lawyer`, `registration`) VALUES
('805B3130-B26E-401F-AA18-9337A368BC1A', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Michael Mayinja', 'micheal@aol.com', '0782901287', 'Active', '805B3130-B26E-401F-AA18-9337A368BC1A.jpg', 'Busia Majanji', '2016-07-07 06:28:12', 'none', NULL, NULL),
('950dab29-aa54-44d3-80ae-5d9c70926d21', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Odoki ken', 'odki@gmail.com', '0789234234', 'Active', '950dab29-aa54-44d3-80ae-5d9c70926d21.jpg', 'gulu', '04/08/2016 19:52:45', 'none', NULL, NULL),
('8adb23d8-b809-4810-92bc-e275f0d22059', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'James Okello', '', '078390128', 'Active', '8adb23d8-b809-4810-92bc-e275f0d22059.jpg', 'Ntinda', '09/08/2016 19:08:16', 'none', NULL, NULL),
('8ebae852-0764-47a7-a81b-233024c59349', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Morris Mugisha', 'get@aol.com', '078123121', 'Active', '078123121.jpg', 'Kampala', '17/08/2016 20:21:22', 'none', NULL, NULL),
('8A15733F-F062-4C1B-A94E-4E3D0639491D', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Moses Kayihura', 'moses@gmail.com', '782481745', 'Active', '8A15733F-F062-4C1B-A94E-4E3D0639491D.jpg', 'Plot 90 Kanjokya Street ,P.O.Box 35364 Kampla Uganda\r\nPlot 90 3rd Floor Suite 306 Kampala Uganda', '2016-08-25 15:15:03', 'none', NULL, NULL),
('D635ADB2-A4E2-45E3-9D77-83939BED8F4A', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Moses Maina', 'maina@gmail.com', '0782481746', 'Active', 'D635ADB2-A4E2-45E3-9D77-83939BED8F4A.jpg', 'Kampala', '2016-08-25 17:57:00', 'none', NULL, NULL),
('F70F1B03-94DB-40AC-A7FD-E0F873B00210', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Lokeris Ouma', 'lo@gmail.com', '0782481746', 'Active', 'F70F1B03-94DB-40AC-A7FD-E0F873B00210.jpg', 'Jinja', '2016-08-25 18:38:38', 'none', 'Douglas Were', NULL),
('65596515-07B4-4FA3-9DB2-DD495CCE38A7', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Musoke Imon', '', '0789238712', 'Active', '65596515-07B4-4FA3-9DB2-DD495CCE38A7.jpg', 'Kampala', '2016-09-30 10:01:25', 'none', 'Ngong Wathio', '09/13/2011'),
('1FE8409D-698B-4DE4-86EA-E2F530FB0F8B', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Joanne Awori', '', '077901234', 'Active', '1FE8409D-698B-4DE4-86EA-E2F530FB0F8B.jpg', 'Kampala', '2016-09-30 10:11:32', 'none', 'Ngong Wathio', '2016-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contactID` varchar(255) NOT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `action` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disbursements`
--

CREATE TABLE IF NOT EXISTS `disbursements` (
  `disbursementID` varchar(255) NOT NULL,
  `orgID` varchar(255) NOT NULL,
  `clientID` varchar(255) DEFAULT NULL,
  `fileID` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `lawyer` varchar(255) DEFAULT NULL,
  `paid` text,
  `invoice` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `received` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `approved` varchar(255) DEFAULT NULL,
  `signed` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disbursements`
--

INSERT INTO `disbursements` (`disbursementID`, `orgID`, `clientID`, `fileID`, `details`, `lawyer`, `paid`, `invoice`, `method`, `amount`, `received`, `balance`, `approved`, `signed`, `date`) VALUES
('20CCCA92-8B4B-4DEA-B0DB-A85CF317A7C6', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '805B3130-B26E-401F-AA18-9337A368BC1A', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Testing the application', 'Douglas Were', 'true', 'CA23/105191742', 'Cash', '120000', 'Douglas Were', '0', 'true', 'false', '2016-10-05'),
('EA2DBE70-2C63-4CDE-975E-C30380E3E9AF', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '950dab29-aa54-44d3-80ae-5d9c70926d21', NULL, 'Mantainance', 'Paul Mayiga', 'true', 'CA23/105202954', 'Cash', '200000', 'Douglas Were', '10000', 'true', 'false', '2016-10-12'),
('64EE2C63-7FF5-4A6D-8E08-113AD6983BFB', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'F70F1B03-94DB-40AC-A7FD-E0F873B00210', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Testnig the not paid option ', 'Paul Mayiga', 'true', 'CA23/105205314', 'Cash', '100000', 'Douglas Were', '0', 'true', 'Douglas Were', '2016-10-11'),
('C7A5CC57-E9EE-4B9E-B5E0-DCEB6023CFC1', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '950dab29-aa54-44d3-80ae-5d9c70926d21', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Coking the pot ', 'Douglas Were', 'true', 'CA23/106192332', 'Cheque', '900000', 'Douglas Were', '0', 'true', 'false', '2016-10-06'),
('C621548A-1E6D-4ED9-A82F-2A49CDB3B59E', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '805B3130-B26E-401F-AA18-9337A368BC1A', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Invoice nature', 'Douglas Were', 'false', 'CA23/106193311', 'Cash', '400000', 'Douglas Were', '232000', 'true', 'false', '2016-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `documentID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `fileID` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `details` text,
  `fileUrl` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `action` text,
  `lawyer` text,
  `sync` text,
  `note` text,
  `sizes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`documentID`, `orgID`, `fileID`, `name`, `client`, `details`, `fileUrl`, `created`, `action`, `lawyer`, `sync`, `note`, `sizes`) VALUES
('734B45FB-D994-4D0F-AC45-88AA5F66D4A0', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Matia Mulumba', 'Data house', 'Michael Mayinja', 'sdfs', 'Data_house.sql', '2016-09-30', 'none', 'Douglas Were', 'true', 'Gerre', '2000'),
('109A8A1F-9257-4DBA-BC90-17805E906334', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Matia Mulumba', 'Gettung with tthe data', 'James Okello', '', 'Gettung_with_tthe_data.PDF', '2016-09-30', 'none', 'Paul Mayiga', 'true', '', '54.33'),
('E042AA32-D4B5-4BD5-BED5-3342A7424D5E', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Matia Mulumba', 'Schema', 'Odoki ken', 'This file is for you ', 'Schema.pdf', '2016-10-01', 'none', 'Douglas Were', 'true', '', '158.43');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `user`, `file`, `created`, `action`, `status`, `orgID`, `date`, `hours`) VALUES
('697E9FF6-DC48-4C47-BA6E-4AE195940BEB', 'information schema', '2016-08-26T18:30:00', '2016-08-26T19:00:00', 'Douglas Were', 'Matia Mulumbas', '2016-08-26 16:34:00', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', NULL),
('CBCF3E50-F85B-4907-A751-3D310197BECC', 'File Registration', '2016-08-26T17:00:00', '2016-08-26T18:45:00', 'Douglas Were', 'Matia Mulumbas', '2016-08-26 16:37:23', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-06', NULL),
('CDC13503-BD2F-4525-892C-255C807817F4', 'Stamp duty', '2016-08-26T19:04:00', '2016-08-26T20:00:00', 'Douglas Were', 'Matia Mulumbas', '2016-08-26 16:41:18', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-06', NULL),
('77D8A99F-7160-458D-ABD7-4E2A0F58A161', 'Winter project', '2016-08-26T17:00:00', '2016-08-26T18:00:00', 'Paul Mayiga', '', '2016-08-26 16:58:19', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-06', NULL),
('8AA8967A-AF8D-48DF-A550-F47C10F1429F', 'Masajja Patrick file ', '2016-08-26T20:00:00', '2016-08-26T21:00:00', 'Douglas Were', 'House management', '2016-08-26 19:52:30', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-06', NULL),
('85BB9125-9E48-4A99-B672-0A2190EB1B3A', 'File registration ', '2016-08-26T20:00:00', '2016-08-26T21:00:00', 'Odole Maghi', 'Henry wens', '2016-08-26 19:53:12', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-27', NULL),
('767ACE98-8CFA-4BA5-B2FC-04C6E7F137F7', 'Export African Fabric and products ', '2016-08-26T22:00:00', '2016-08-26T23:00:00', 'Paul Mayiga', 'House management', '2016-08-26 19:55:43', 'none', 'Complete', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-26', NULL),
('E08B84EB-68CD-4155-9236-4BD50EDAFA0A', 'Cooler', '2016-08-27T18:00:00', '2016-08-27T19:00:00', 'Douglas Were', '', '2016-08-27 12:46:04', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-27', '1'),
('7BA6FECE-03A0-4E2F-BD79-CC43CEE7D822', 'Redding ', '2016-08-27T19:00:00', '2016-08-27T20:00:00', 'Douglas Were', '', '2016-08-27 12:48:04', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-27', '1'),
('9E8B0A1A-108F-44CE-B401-D2A23865BE3B', 'Data values', '2016-08-27T20:00:00', '2016-08-27T21:00:00', 'Douglas Were', '', '2016-08-27 12:50:49', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-27', '1'),
('1E6C4132-1217-4E35-AE65-C2D1E014DCDE', 'Information time iinterval ', '2016-08-27T15:00:00', '2016-08-27T23:00:00', 'Paul Mayiga', '', '2016-08-27 12:51:42', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-27', '8'),
('F0255C6B-FACE-4D6A-854C-65A3FA99F553', 'Keanu', '2016-08-28T12:00:00', '2016-08-28T13:00:00', 'Douglas Were', '', '2016-08-28 11:09:06', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-28', '1'),
('8866E670-345F-4A18-ABE3-E53FE1E9061B', 'Going the distance', '2016-08-28T14:00:00', '2016-08-28T15:00:00', 'Douglas Were', 'Matia Mulumbas', '2016-08-28 13:58:41', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-28', '1'),
('2E74293C-9FB2-4A72-8FEE-03E8860673C7', 'Registration file', '2016-08-29T10:00:00', '2016-08-29T11:00:00', 'Douglas Were', 'Kasirye VS UTL', '2016-08-29 09:28:13', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-29', '1'),
('DF618DDC-5856-4BF5-9179-1C2EB455282B', 'Travelling to Court', '2016-08-29T14:00:00', '2016-08-29T18:00:00', 'Douglas Were', 'House management', '2016-08-29 09:38:37', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '4'),
('15981DBE-0A29-4AC1-B975-EA07114B2D49', 'AMAMU HOUSe', '2016-08-29T19:00:00', '2016-08-29T20:00:00', 'Douglas Were', '', '2016-08-29 09:46:16', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '1'),
('A7A3CB02-CD62-41DE-B2EC-A86151870183', 'Mekanika', '2016-08-30T14:00:00', '2016-08-30T15:00:00', 'Douglas Were', '', '2016-08-30 09:22:46', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-08-30', '1'),
('1C119290-8B3F-48A4-937D-BB871191B5EB', 'meeting with sogea', '2016-08-30T15:00:00', '2016-08-30T16:00:00', 'Douglas Were', '', '2016-08-30 13:07:54', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '1'),
('B9DF77C5-C77A-4AA5-88B9-A1A61149AC08', 'This is a unique test ', '2016-09-30T10:00:00', '2016-09-30T11:00:00', 'Paul Mayiga', 'Operation Flash point', '2016-09-30 12:06:09', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-09-30', '1'),
('2E95D3E4-6EF6-4B46-92E0-2DC543D43856', 'on the phone ', '2016-10-03T06:00:00', '2016-10-03T11:00:00', 'Douglas Were', 'House management', '2016-10-02 23:55:07', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '5'),
('2BC92781-CC24-4801-B341-D5508A7D2F88', 'Mentorships', '2016-10-03T20:00:00', '2016-10-03T21:00:00', 'Douglas Were', '', '2016-10-03 18:42:22', 'none', 'Progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-06', '1'),
('0FA96930-A985-48FF-A837-394BD455980A', 'mobile application', '2016-10-03T01:00:00', '2016-10-03T02:00:00', 'Douglas Were', NULL, '2016-10-03 19:09:25', 'none', 'progressing', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '2'),
('78939D4A-81A7-45E1-AF37-132A2828F8B2', 'manage db', '2016-10-03T11:00:00', '2016-10-03T13:00:00', 'Douglas Were', NULL, '2016-10-03 19:20:08', 'none', 'complete', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '2'),
('4F914362-F953-402B-9EA5-CFD1296432F0', 'clientele', '2016-10-03T14:00:00', '2016-10-03T16:00:00', 'Douglas Were', NULL, '2016-10-03 19:20:57', 'none', 'complete', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '2'),
('7E020588-7ACB-4E51-9D77-E3E011D0587D', 'list test view', '2016-10-03T05:00:00', '2016-10-03T07:00:00', 'Douglas Were', NULL, '2016-10-03 20:25:21', 'none', 'complete', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '2016-10-03', '2');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expenseID` varchar(255) NOT NULL,
  `orgID` varchar(255) NOT NULL,
  `clientID` varchar(255) DEFAULT NULL,
  `fileID` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `lawyer` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `paid` text,
  `date` varchar(255) DEFAULT NULL,
  `approved` varchar(255) DEFAULT NULL,
  `signed` varchar(255) DEFAULT NULL,
  `reason` text,
  `outcome` text,
  `deadline` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenseID`, `orgID`, `clientID`, `fileID`, `details`, `lawyer`, `method`, `amount`, `no`, `balance`, `paid`, `date`, `approved`, `signed`, `reason`, `outcome`, `deadline`) VALUES
('F3BE181B-9792-40B2-8D80-31DB4C44CF4A', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '8ebae852-0764-47a7-a81b-233024c59349', '6f0f677f-1051-4094-9777-6f194a126c12', 'Data  mining', 'Ngong Wathio', 'Cash', '90000.00', NULL, NULL, 'false', '2016-10-12', 'false', 'Douglas Were', 'Operational', 'Good workj ethics', '2016-10-07'),
('84A58910-3FED-400F-82A0-49883C1BB596', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '8ebae852-0764-47a7-a81b-233024c59349', '6f0f677f-1051-4094-9777-6f194a126c12', 'informacs', 'Paul Mayiga', 'Cash', '340000.00', NULL, NULL, 'true', '2016-10-13', 'true', 'Douglas Were', 'informacs', 'Data dictionary', '2016-10-05'),
('21F2C7D8-DC92-47E8-8AE9-B81D50220A48', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '805B3130-B26E-401F-AA18-9337A368BC1A', '31FF0DB6-3C75-4C4F-825B-657BD1C48D6D', 'to pay rent', 'Paul Mayiga', 'Cash', '300000', NULL, NULL, 'false', '2016-10-10', 'false', 'Douglas Were', 'to pay rent', 'Clear client rent', '2016-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `feeID` varchar(255) NOT NULL,
  `orgID` varchar(255) NOT NULL,
  `clientID` varchar(255) DEFAULT NULL,
  `fileID` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `lawyer` varchar(255) DEFAULT NULL,
  `paid` text,
  `invoice` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `received` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `approved` varchar(255) DEFAULT NULL,
  `signed` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`feeID`, `orgID`, `clientID`, `fileID`, `details`, `lawyer`, `paid`, `invoice`, `vat`, `method`, `amount`, `received`, `balance`, `approved`, `signed`, `date`) VALUES
('20CCCA92-8B4B-4DEA-B0DB-A85CF317A7C6', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '805B3130-B26E-401F-AA18-9337A368BC1A', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Testing the application', 'Douglas Were', 'true', 'CA23/105191742', '14400.0', 'Cash', '120000', 'Douglas Were', '0', 'true', 'false', '2016-10-05'),
('9FEA4928-183C-4C79-BA2D-42C21A44ECA8', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '950dab29-aa54-44d3-80ae-5d9c70926d21', NULL, 'Mantainance', 'Paul Mayiga', 'true', 'CA23/105202954', '10000.0', 'Cash', '100000', 'Douglas Were', '10000', 'true', 'false', '2016-10-12'),
('64EE2C63-7FF5-4A6D-8E08-113AD6983BFB', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'F70F1B03-94DB-40AC-A7FD-E0F873B00210', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Testnig the not paid option ', 'Paul Mayiga', 'true', 'CA23/105205314', '60000.0', 'Cash', '600000', 'Douglas Were', '0', 'true', 'Douglas Were', '2016-10-11'),
('7E9A45F5-425E-43F7-8377-333267F77809', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '950dab29-aa54-44d3-80ae-5d9c70926d21', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Coking the pot ', 'Douglas Were', 'true', 'CA23/106192332', '60000.0', 'Cheque', '600000', 'Douglas Were', '0', 'true', 'false', '2016-10-06'),
('C621548A-1E6D-4ED9-A82F-2A49CDB3B59E', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '805B3130-B26E-401F-AA18-9337A368BC1A', 'DB705B91-820F-4428-BAEF-41640C4CFF11', 'Invoice nature', 'Douglas Were', 'false', 'CA23/106193311', '12000.0', 'Cash', '120000', 'Douglas Were', '232000', 'true', 'false', '2016-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `fileID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `lawyer` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `citation` varchar(255) DEFAULT NULL,
  `law` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `action` text,
  `case` varchar(255) DEFAULT NULL,
  `note` text,
  `progress` text,
  `opened` varchar(50) DEFAULT NULL,
  `due` varchar(100) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`fileID`, `orgID`, `client`, `contact`, `lawyer`, `no`, `details`, `type`, `subject`, `citation`, `law`, `name`, `created`, `status`, `action`, `case`, `note`, `progress`, `opened`, `due`, `contact_person`, `contact_number`) VALUES
('DB705B91-820F-4428-BAEF-41640C4CFF11', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Michael Mayinja', '0782481746', 'Douglas Were', 'CA567/16/07923382123', 'The managing of the data type', 'Conclusive', 'Watering a KIM', 'Versation tubular', 'Criminal', 'Matia Mulumba', '2016-07-09', 'Criminal', 'none', 'FE24', 'in operation mantaince', 'Pending', NULL, '2016-10-06', NULL, NULL),
('3312f980-afb9-4b50-93c6-8e5e93f5392f', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Michael Mayinja', NULL, 'Douglas Were', 'CA23/2016/0816210929', 'House management\n', 'Conclusive', 'Nira lones', 'kenneth', 'Criminal', 'House management', '                       2016-08-16', 'Criminal', 'none', '345', NULL, 'Pending', NULL, '2016-10-02', NULL, NULL),
('6f0f677f-1051-4094-9777-6f194a126c12', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Paul Mayiga', NULL, 'Paul Mayiga', 'CA23/2016/0816214030', 'This Information\r\n', 'General', 'System information', 'Later information', 'Civil', 'Henry wens', '2016-08-16', 'Active', 'none', NULL, 'For filing and processing', 'Closed', NULL, '2016-10-06', NULL, NULL),
('6f0f677f-1051-4094-9777-6f194a126c12', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Paul Mayiga', NULL, 'Paul Mayiga', 'CA23/2016/0816214030', 'This Information\r\n', 'General', 'System information', 'Later information', 'Civil', 'Henry wens', '2016-08-16', 'Active', 'none', NULL, 'For filing and processing', 'Closed', NULL, '2016-08-31', NULL, NULL),
('B26EB551-5ADF-44B4-89CB-9503E1FDB9B0', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Paul Mayiga', NULL, 'Douglas Were', 'CA23/G/16/082814113535', 'File on operations', 'General', 'Catering ', 'Never land', 'Civil', 'Operation Flash point', '2016-08-28', 'Active', 'none', 'CA478', 'pending review', 'Initiated', NULL, NULL, NULL, NULL),
('B5BBEA5B-459C-4ACB-813E-486E4DC4B38D', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Douglas Were', NULL, 'Paul Mayiga', 'CA23/L/16/082817574747', 'Mutebi vs NRM', 'Litigation', 'Billing and invoice', 'Mutebi Vs NRM', 'Criminal', 'Universal bill', '2016-08-28', 'Active', 'none', '34', 'prejudice', 'closed', '', NULL, NULL, NULL),
('31FF0DB6-3C75-4C4F-825B-657BD1C48D6D', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Paul Mayiga', '041437809', 'Odoki ken', 'CA23/G/16/082818451919', 'Kasirye VS UTL', 'General', 'Kasirye VS UTL', 'Kasirye VS UTL', 'Civil', 'Kasirye VS UTL', '2016-08-28', 'Active', 'none', '56/TU', 'Kasirye VS UTL', 'closed', '', '2016-10-03', NULL, '0772780954'),
('D4A9668B-DF13-40CF-94B3-797D923DB6C5', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'James Okello', NULL, 'Douglas Were', 'CA23/16/09301425707', 'Information genetics', 'General', '', '', 'Criminal', 'Mapping office space', '2016-09-30', 'Active', 'none', '', '', '', '2016-03-14', '2016-10-03', 'Awori Joanne', '071233432'),
('C5321F64-399A-4124-8F3E-24EB304387D6', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Musoke Imon', NULL, 'Douglas Were', 'CA23/16/10922573131', 'Documentation of the Visa', 'General', 'Invitation', '', 'Civil', 'Original documentations', '2016-10-09', 'Active', 'none', '', 'Nothnig', '', '2016-10-09', '2016-10-10', 'Emma Adriel', '0782481746');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `transID` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `action` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `orgID`, `transID`, `name`, `description`, `rate`, `qty`, `total`, `action`) VALUES
('24622674-C8CA-4D5D-9421-10D875816478', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'C1CD1C09-B606-40DB-970E-0D0EC2ABA208', 'Water REED', 'NOthing ', '10.00', '120.00', '1,200.00', 'none'),
('E78E45E4-D327-4B9C-A9F7-AD90B9A307F2', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '28488658-437C-4909-BFD7-7D797079DC4F', 'File Opening', 'Opening user file ', '12,000.00', '1.00', '12,000.00', 'none'),
('5C78BBA9-1655-4999-8E19-291447B41BA8', '859F71A5-53B7-471A-BB4B-2082FC3AFA29', '28488658-437C-4909-BFD7-7D797079DC4F', 'Registration', 'Stamping and registering ', '123,000.00', '1', '123,000.00', 'none'),
('F22CA5E0-8C7F-45B6-81D4-35EC13551CFF', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '7CCA886C-3B71-4ADE-9820-C89EA69269FE', 'Finance Book ', 'Financial books', '129,000.00', '2.00', '258,000.00', 'none'),
('059139f0-a235-46bf-9dc5-b1d3dc064566', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '8e611506-18bf-4ec3-8d40-1ff0270734ec', 'Registering the file', 'Registration', '30000', '2', '60000', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageID` varchar(255) NOT NULL,
  `body` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `sent` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `action` text,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `taskID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageID`, `body`, `subject`, `to`, `from`, `date`, `created`, `orgID`, `sent`, `type`, `action`, `contact`, `email`, `taskID`) VALUES
('D59DECDF-2D50-4BED-9F68-820FADE29B5F', 'PAYMENT TRANSACTION ON CLIENT Morris Mugisha FILE Henry wens', 'REQUISTION PENDING APPROVAL', 'Paul Mayiga', 'water@gmail.com', '10/13/2016', '2016-10-05 22:55:31', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', '041437809', 'paul@aol.com', NULL),
('2777E91A-4F1F-4A1F-ABF5-814D3F75F6C4', 'Reminder You have a meeting on 10/07/2016 at 01:20 to 14:45 Details: Meeting the people', 'REMINDER', 'Douglas Were', 'water@gmail.com', '10/07/2016', '2016-10-06 09:35:59', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', '0782481746', 'weredouglas@gmail.com', 'BA990A78-84A3-4B8C-B99A-8E73FD41BC5D'),
('1209C4EC-403E-4859-91F1-554478380471', 'PAYMENT TRANSACTION ON CLIENT Odoki ken FILE House management', 'INVOICE', 'Odole Maghi', 'water@gmail.com', '10/11/2016', '2016-10-06 12:43:50', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', '0772339810', 'wens@gmail.com', NULL),
('44F95DC5-99EA-46F7-9714-2EB8D9BB2D26', 'PAYMENT TRANSACTION ON CLIENT Odoki ken FILE Matia Mulumba', 'PAYMENT', NULL, 'water@gmail.com', '10/06/2016', '2016-10-06 19:26:26', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', NULL, 'weredouglas@gmail.com', NULL),
('66D3AA6F-A167-4091-B84E-7B71D5947962', 'PAYMENT TRANSACTION ON CLIENT Michael Mayinja FILE Matia Mulumba', 'INVOICE', 'Douglas Were', 'water@gmail.com', '10/04/2016', '2016-10-06 19:34:21', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', '0782481746', 'weredouglas@gmail.com', NULL),
('1B55E02E-1C1C-466E-BEAE-B99ECE51F889', 'Reminder You have a meeting on 10/06/2016 at 01:20 to 14:45 Details: Hey team please check out the update that have been made on the system we have included  Invoicing and a payment feature  please review and advise on any changes you would require...Plea', 'REMINDER', 'Douglas Were', 'water@gmail.com', '10/06/2016', '2016-10-06 22:56:21', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', '0752336721', 'weredouglas@gmail.com', 'F4AB0EF9-5D62-4424-A0B2-654CC387BD25'),
('19747850-5899-4393-8402-97E97E05A045', 'PAYMENT TRANSACTION ON CLIENT Michael Mayinja FILE Kasirye VS UTL', 'REQUISTION PENDING APPROVAL', 'Douglas Were', 'weredouglas@gmail.com', '10/10/2016', '2016-10-09 19:12:59', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', '0752336721', 'weredouglas@gmail.com', NULL),
('78363875-1265-4729-8059-9D047A02F589', 'You have been assigned to the file Original documentations ', 'REMINDER', 'Douglas Were', 'weredouglas@gmail.com', '2016-10-09', '2016-10-09', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'false', 'email', 'none', '0752336721', 'weredouglas@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `noteID` varchar(255) NOT NULL,
  `fileID` varchar(255) DEFAULT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `action` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `org`
--

CREATE TABLE IF NOT EXISTS `org` (
  `orgID` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `starts` varchar(255) DEFAULT NULL,
  `ends` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `action` text,
  `tin` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `top` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org`
--

INSERT INTO `org` (`orgID`, `name`, `license`, `starts`, `ends`, `code`, `address`, `email`, `status`, `image`, `currency`, `country`, `region`, `city`, `action`, `tin`, `vat`, `top`) VALUES
('A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Novariss Ltd', '3O687-KRWQ2-8Z2NP-PZBSW', '2016-07-06', '2017-01-06', 'CA23', 'Jinja Road Police Station, Kampala, Central Region, Uganda', 'weredouglas@gmail.com', 'Active', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962.jpg', 'UGX', 'Uganda', 'Central Region', 'Kampala', 'none', '1230007823', '34567000', 'solicitors|Commissioners for oaths | Legal'),
('A9D1EB00-5D67-4791-8A66-330C92073205', 'Novariss Ltd', '6TPPG-R2FDW-73443-AEP74', '2016-08-29', '2017-03-01', 'NOV', 'Kampala', 'novariss@gmail.com', 'Active', 'novariss.png', 'UGX', NULL, NULL, NULL, 'none', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `transID` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `recieved` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `approved` text,
  `action` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `orgID`, `transID`, `amount`, `method`, `no`, `userID`, `status`, `recieved`, `balance`, `created`, `approved`, `action`) VALUES
('CF2D909B-00D7-4DB9-AA43-3DF6C2E1E4DC', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'C1CD1C09-B606-40DB-970E-0D0EC2ABA208', '1,200.00', 'Cash', 'GAWE/16/071211144', 'Douglas Were', NULL, NULL, '0.00', '2016-07-12', 'false', NULL),
('7A9885F9-2B71-408D-A6ED-A96A7C3E3913', '859F71A5-53B7-471A-BB4B-2082FC3AFA29', '28488658-437C-4909-BFD7-7D797079DC4F', '131,000.00', 'Cash', 'GAWE/16/071214513', 'Douglas Were', NULL, 'Douglas Were', '4,000.00', '2016-07-12', 'false', NULL),
('9C9B35E2-D7A2-469B-941B-03263A710D9B', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '7CCA886C-3B71-4ADE-9820-C89EA69269FE', '0.00', 'none', 'GAWE/16/0712151434', 'Douglas Were', NULL, 'Douglas Were', '258,000.00', '2016-07-12', 'false', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `ruleID` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `period` varchar(255) DEFAULT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `action` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`ruleID`, `name`, `period`, `orgID`, `action`) VALUES
('A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'VMC', '3', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `taskID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `startTime` varchar(255) DEFAULT NULL,
  `endTime` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `trigger` varchar(255) DEFAULT NULL,
  `period` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `fileID` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `action` text,
  `court` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskID`, `orgID`, `details`, `startTime`, `endTime`, `date`, `trigger`, `period`, `priority`, `userID`, `fileID`, `created`, `action`, `court`) VALUES
('72E52F05-02C0-40E6-994C-4C10CA1FF787', '859F71A5-53B7-471A-BB4B-2082FC3AFA29', 'Invalid Information', '12:00', '13:00', '2016-08-05', 'True', '1', 'High', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-07-11', 'none', NULL),
('6C85C3EE-6836-44B8-9898-2FA8C65B6C81', '859F71A5-53B7-471A-BB4B-2082FC3AFA29', 'Meeting setttings', '06:20', '21:45', '2016-08-05', 'True', '1', 'Low', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-07-12', 'none', NULL),
('8AEA6C80-2423-4C34-836A-3499C5BC3152', '859F71A5-53B7-471A-BB4B-2082FC3AFA29', 'This is water good', '05:20', '20:45', '2016-08-05', 'True', '1', 'High', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-07-12', 'none', NULL),
('52A7242D-810A-4E65-BDAA-2082CC240CA4', '859F71A5-53B7-471A-BB4B-2082FC3AFA29', 'Documents assembly ', '01:20', '14:45', '2016-08-05', 'True', '1', 'High', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-07-12', 'none', NULL),
('9655A816-AF61-4BC4-96BA-D90155E2AAEE', '859F71A5-53B7-471A-BB4B-2082FC3AFA29', 'Documents assembly ', '01:20', '14:45', '2016-07-16', 'True', '1', 'High', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-07-12', 'none', NULL),
('38856C22-8A55-4231-8FA2-30EF84A93FCE', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Dealing with these session things ', '01:20', '14:45', '2016-07-14', 'True', '1', 'High', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-07-12', 'none', NULL),
('6FF4FC86-53BB-4C1E-8973-0FB1F8B008A3', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'tasting  Home ', '02:20', '14:45', '2016-08-05', 'True', '1', 'Low', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-07-12', 'none', NULL),
('b4cf6031-adc5-492a-98e4-8c66ae1f856b', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'User medium\\n', '08:00', '09:00', '2016-08-15', 'true', '1', 'Medium', 'Douglas Were', 'Matia Mulumbas', '2016-08-15', 'none', NULL),
('27bb539b-ffee-4d67-b35e-5f42367cd799', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Wating on the system \\n', '08:00', '10:00', '2016-08-15', 'true', '1', 'High', 'Douglas Were', 'Matia Mulumbas', '2016-08-15', 'none', NULL),
('6E523427-F97E-443E-9307-8B48E1F9CCCC', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testing ths data sync process', '01:20', '14:45', '2016-08-17', 'True', '1', 'High', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-08-16', 'none', NULL),
('afd90cd2-3856-4305-9cdd-09ed75bfbcee', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'almost Done', '04:00', '08:00', '2016-08-16', 'true', '1', 'Medium', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-08-16', 'none', NULL),
('d2dff6eb-37d0-4efb-88fe-dec09e9f3d6f', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Discovery Channel', '06:00', '07:00', '2016-08-16', 'false', '1', 'High', 'F07271AC-BE35-4316-B883-AC4990E84092', 'DB705B91-820F-4428-BAEF-41640C4CFF11', '2016-08-16', 'none', NULL),
('a7bc92ca-e2b2-4443-b0f9-d092b03ebc1f', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Bus registration services VMC', '9:00', '9:00', '2016-08-19', 'true', NULL, 'medium', 'Douglas Were', '63359634-afe4-4ad9-82df-b861a6103e84', '2016-08-16', 'none', NULL),
('baac730c-66b6-428e-bcaf-b7f1a0879022', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'House management VMC', '9:00', '9:00', '2016-08-19', 'true', NULL, 'medium', 'Douglas Were', '3312f980-afb9-4b50-93c6-8e5e93f5392f', '2016-08-16', 'none', NULL),
('cb23f54d-f617-4443-9369-9639e9fb7ef2', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Henry wens VMC', '7:00', '9:00', '2016-08-19', 'true', NULL, 'medium', 'Douglas Were', '6f0f677f-1051-4094-9777-6f194a126c12', '2016-08-16', 'none', NULL),
('fe55a246-6120-4a9f-b174-0c83c5e64a44', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Engine report\r\n', '03:00', '07:00', '2016-08-16', 'true', NULL, 'Medium', 'Douglas Were', 'Hens vs chicken', '2016-08-16', 'none', NULL),
('4272135c-34bc-4e43-b4ce-be4aaf81d719', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testing\r\n', '04:00', '06:00', '2016-08-17', 'true', '1', 'Medium', 'Douglas Were', 'Matia Mulumbas', '2016-08-17', 'none', NULL),
('19957691-8589-4931-850c-fa13ff6829c3', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testign this day of uploads \r\n', '11:00', '12:00', '2016-08-17', 'true', '1', 'Medium', 'Douglas Were', '', '2016-08-17', 'none', NULL),
('24e5c683-833f-4742-b72a-70f093faf263', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Interesting things\r\n', '09:00', '10:00', '2016-08-17', 'true', '1', 'Medium', 'Douglas Were', 'Henry wens', '2016-08-17', 'none', NULL),
('a38209c6-210c-4a72-a5d8-ca25a8cfe389', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Information dialog\r\n', '07:00', '10:00', '2016-08-18', 'true', '1', 'Medium', 'Paul Mayiga', 'Hens vs chicken', '2016-08-18', 'none', NULL),
('71580dc2-92c8-4dcb-8df4-52f7ff5b7f6e', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Support System\r\n', '11:00', '12:00', '2016-08-18', 'true', '1', '', 'Douglas Were', 'Matia Mulumbas', '2016-08-18', 'none', NULL),
('0ED43DEB-CF92-4974-A343-7F18254B0EAD', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'in this meeting online', '12:20', '12:45', '2016-08-19', 'True', '1', 'High', 'Douglas Were', 'House management', '2016-08-19', 'none', NULL),
('B27BF39C-436B-4C12-B922-F2EB40258BD7', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'interesting things ', '09:20', '10:45', '2016-08-20', 'True', '1', 'High', 'Douglas Were', 'Court Vs Maiga', '2016-08-19', 'none', NULL),
('CAB689B6-BA4F-4886-951F-23B3D0FDF188', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'office arrangement', '15:20', '16:45', '2016-08-23', 'True', '1', 'High', 'Douglas Were', 'Matia Mulumbas', '2016-08-23', 'none', NULL),
('9626A82A-4423-41F0-A041-ECB5988BA96A', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Housing and Finance bank meeting ', '01:20', '14:45', '2016-08-24', 'True', '1', 'High', 'Douglas Were', 'House management', '2016-08-23', 'none', NULL),
('3DF26AB8-D462-47E1-A0DF-4AC7D057C2A8', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'information', '01:20', '14:45', '2016-08-25', 'True', '1', 'High', 'Douglas Were', '', '2016-08-23', 'none', NULL),
('C880F3E6-49EA-46E0-8208-4797AD885E77', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testings', '01:20', '14:45', '2016-08-26', 'True', '1', 'High', 'Douglas Were', '', '2016-08-23', 'none', NULL),
('883B4A78-6532-4A8F-9529-C50CEF827234', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Wenedy', '01:20', '14:45', '2016-08-22', 'True', '1', 'High', 'Douglas Were', '', '2016-08-23', 'none', NULL),
('BE37E110-E6A1-4E09-9ABF-B637C8BD043E', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Amphibious', '01:20', '16:45', '2016-08-24', 'True', '1', 'High', 'Douglas Were', 'Matia Mulumbas', '2016-08-23', 'none', NULL),
('8FA17DC6-2368-4528-A1B3-0E520BA15BE7', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testing this file upload ', '01:20', '14:45', '2016-08-25', 'True', '1', 'High', 'Douglas Were', '', '2016-08-23', 'none', NULL),
('5AF77619-5C79-49A8-A665-87943CE5A7E4', NULL, 'Testing single email', '01:20', '14:45', '2016-08-23', 'True', '1', 'High', NULL, '', '2016-08-23', 'none', NULL),
('f745a882-6a82-46ae-ab51-515a6f42f718', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Meeting with you in this information\r\n', '10:00', '13:00', '2016-08-24', 'true', '1', 'Low', 'Douglas Were', '', '2016-08-25', 'none', NULL),
('3b9a6d71-343a-4010-944d-b119d5a277c6', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'We do the testing\r\n', '16:00', '19:00', '2016-08-24', 'true', '1', 'Medium', 'Douglas Were', 'Matia Mulumbas', '2016-08-25', 'none', NULL),
('d0efd0b0-1fcb-4feb-bd26-508941d9f4ea', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Message is in the test\r\n', '10:00', '11:00', '2016-08-24', 'true', '1', 'Medium', 'Douglas Were', 'Henry wens', '2016-08-25', 'none', NULL),
('70873fc2-dbc3-4ecf-84c5-4e47d9475604', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Information testing message service\r\n', '09:00', '10:00', '2016-08-24', 'true', '1', 'Medium', 'Douglas Were', 'Henry wens', '2016-08-25', 'none', NULL),
('67b9217f-66ee-4e71-adc4-be272092b084', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testing application\r\n', '10:00', '11:00', '2016-08-25', 'true', '1', 'Medium', 'Douglas Were', 'Matia Mulumbas', '2016-08-25', 'none', NULL),
('d94d5bc8-f521-40f2-aad8-4bf6d3614bc1', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Message operations\r\n', '10:00', '11:00', '2016-08-26', 'true', '1', 'Medium', 'Douglas Were', '', '2016-08-26', 'none', NULL),
('FC4F47FE-E936-4094-A7ED-5A69D917D594', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Data Recovery', '01:20', '14:45', '2016-08-31', 'True', '1', 'High', 'Douglas Were', 'Universal bill', '2016-08-31', 'none', NULL),
('B7771236-76B2-40B1-B042-E3AC55D7A10D', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Calendar things ', '01:20', '14:45', '2016-09-01', 'True', '1', 'High', 'Douglas Were', '', '2016-08-31', 'none', NULL),
('38B089C9-2DF4-4A4A-A77F-1C3D00EB260C', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testing this ', '01:20', '14:45', '2016-09-22', 'True', '1', 'High', 'Douglas Were', 'Henry wens', '2016-09-21', 'none', NULL),
('FA3B2A68-4AA0-480E-BF51-B4813613B736', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', '', '01:20', '14:45', '2016-09-23', 'True', '1', 'High', 'Douglas Were', 'Henry wens', '2016-09-21', 'none', NULL),
('555E889C-6544-425C-8CE5-D3CD046C1814', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Testing cause list ', '01:20', '14:45', '2016-09-24', 'True', '1', 'High', 'Douglas Were', 'House management', '2016-09-30', 'none', 'True'),
('B3EAD166-E2BB-4A8E-A5B0-0D63C44F8E5F', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'organisation structure', '23:20', '15:45', '2016-10-02', 'True', '1', 'High', 'Douglas Were', 'Kasirye VS UTL', '2016-10-01', 'none', 'True'),
('E35F11F8-AC69-4537-8B66-AF75946FDB69', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Winter soldier', '01:20', '14:45', '2016-10-04', 'True', '1', 'High', 'Douglas Were', 'House management', '2016-10-01', 'none', NULL),
('6A746015-014A-4CFB-A1EC-80D01377551F', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Click on BBC', '01:20', '14:45', '2016-10-06', 'True', '1', 'High', 'Douglas Were', '', '2016-10-01', 'none', 'True'),
('F18CDA21-0016-4976-BAAE-95C4A57B6E33', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Ethiopia as a study', '01:20', '14:45', '2016-10-09', 'True', '1', 'High', 'Douglas Were', '', '2016-10-01', 'none', 'True'),
('E46DB765-0629-4BEA-8B8F-D8CE4AFCA085', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Going to bed ', '01:20', '14:45', '2016-10-01', 'True', '1', 'High', 'Douglas Were', 'Mapping office space', '2016-10-01', 'none', 'True'),
('F2B3044F-352C-480E-A18E-DD270A151DBA', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Ware housing ', '01:20', '14:45', '2016-10-01', 'True', '1', 'High', 'Douglas Were', '', '2016-10-01', 'none', 'True'),
('BA990A78-84A3-4B8C-B99A-8E73FD41BC5D', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Meeting the people', '01:20', '14:45', '10/07/2016', 'True', '2', 'Low', 'Douglas Were', 'Kasirye VS UTL', '2016-10-06', 'none', 'True'),
('F4AB0EF9-5D62-4424-A0B2-654CC387BD25', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Hey team please check out the update that have been made on the system we have included  Invoicing and a payment feature  please review and advise on any changes you would require...Please check our your Organisation profile,Cause list the expense feature', '01:20', '14:45', '10/06/2016', 'True', '1', 'High', 'Douglas Were', '', '2016-10-06', 'none', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `fileID` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `details` text,
  `action` text,
  `sub` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `dueDate` varchar(255) DEFAULT NULL,
  `method` text,
  `invoice` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `paid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transID`, `orgID`, `staff`, `client`, `type`, `created`, `fileID`, `status`, `total`, `category`, `details`, `action`, `sub`, `vat`, `balance`, `dueDate`, `method`, `invoice`, `no`, `paid`) VALUES
('C1CD1C09-B606-40DB-970E-0D0EC2ABA208', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Douglas Were', 'Michael Mayinja', 'Income', '2016-08-28', 'Matia Mulumba', 'paid', '1,2000', 'RECEIPT', 'Payment bill', 'none', NULL, NULL, NULL, NULL, 'Cash', NULL, NULL, NULL),
('28488658-437C-4909-BFD7-7D797079DC4F', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Douglas Were', 'Michael Mayinja', 'Expense', '2016-08-29', 'Matia Mulumba', 'pending', '135,000', 'FEE NOTE', 'Invaluable', 'none', NULL, NULL, NULL, NULL, 'Cash', NULL, NULL, NULL),
('7CCA886C-3B71-4ADE-9820-C89EA69269FE', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Douglas Were', 'James Okello', 'Income', '\\n                                2016-08-28', '  none', 'paid', '258,000', 'RECEIPT', 'Data values', 'none', NULL, NULL, NULL, NULL, 'Cash', NULL, NULL, NULL),
('8e611506-18bf-4ec3-8d40-1ff0270734ec', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Douglas Were', 'Odole Maghi', 'Income', '\\n                                2016-08-29', ' none', 'In progress', '60,000', 'INVOICE', 'File Registrations', 'none', NULL, '0', '0.00', '2016-08-18', 'Cash', 'CA23/2016/0817184328', '0817184206', '60000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` varchar(255) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `action` text,
  `charge` varchar(100) DEFAULT NULL,
  `supervisor` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `orgID`, `name`, `email`, `password`, `designation`, `status`, `contact`, `image`, `address`, `category`, `created`, `action`, `charge`, `supervisor`) VALUES
('F07271AC-BE35-4316-B883-AC4990E84092', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Douglas Were', 'weredouglas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Partner', 'Active', '0752336721', 'F07271AC-BE35-4316-B883-AC4990E84092.jpg', 'Ntinda - Kisaasi Road, Kampala, Central Region, Uganda', 'Staff', '2016-07-06 22:06:59', 'none', '23000', 'Douglas Were'),
('BF6A4C9C-9384-484D-A440-7E0CE486DAA0', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Paul Mayiga', 'paul@aol.com', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 'Active', '041437809', 'BF6A4C9C-9384-484D-A440-7E0CE486DAA0.jpg', 'Jinja Road Police Station, Kampala, Central Region, Uganda', 'Staff', '2016-07-06 22:21:35', 'none', '12000', 'Douglas Were'),
('fb37ecfa-3c71-452b-ba07-de9a1ff1501d', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Odole Maghi', 'wens@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Partner', 'Active', '0772339810', 'fb37ecfa-3c71-452b-ba07-de9a1ff1501d.jpg', 'Kampala', 'Staff', '04/08/2016 22:16:42', 'none', '30000', NULL),
('a2a9a1c2-0b43-4486-90a8-d1d8d1c41895', 'A3CEA444-1F39-4F91-955D-0CA57E3C7962', 'Ngong Wathio', 'ngongo@gmail.com', '202cb962ac59075b964b07152d234b70', 'Paralegals', 'Active', '07823423445', 'a2a9a1c2-0b43-4486-90a8-d1d8d1c41895.jpg', 'Majanaja', 'Staff', '05/08/2016 08:42:59', 'none', '5000', NULL),
('FA78BC55-9122-4408-807F-19E2C2C4CEA8', 'A9D1EB00-5D67-4791-8A66-330C92073205', 'Douglas', 'weredouglas@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 'Active', '0782481746', 'default.png', 'Kampala', 'Staff', '2016-08-29 07:00:17', NULL, NULL, 'Douglas Were');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
