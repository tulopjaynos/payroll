-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 03:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(250) NOT NULL,
  `TIMEIN` varchar(250) NOT NULL,
  `TIMEOUT` varchar(250) NOT NULL,
  `LOGDATE` varchar(250) NOT NULL,
  `STATUS` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `STUDENTID`, `TIMEIN`, `TIMEOUT`, `LOGDATE`, `STATUS`) VALUES
(199, 'WY387c4a8d09ca3762af61e59520943dc26494f8941b', '05:46:38 AM', '', '2021-10-24', '0'),
(200, 'WY377c4a8d09ca3762af61e59520943dc26494f8941b', '05:47:19 AM', '', '2021-10-24', '0'),
(201, 'WY37', '05:52:52 AM', '', '2021-10-24', '0'),
(202, 'WY38', '00:15:43 AM', '01:12:06 AM', '2021-10-30', '1'),
(203, 'WY38', '00:19:53 AM', '01:12:06 AM', '2021-10-30', '1'),
(204, 'WY38', '00:21:52 AM', '01:12:06 AM', '2021-10-30', '1'),
(205, 'WY38', '01:12:05 AM', '01:12:06 AM', '2021-10-30', '1'),
(206, 'WY38', '02:06:02 AM', '02:06:10 AM', '2021-11-06', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wy_admin`
--

CREATE TABLE `wy_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_admin`
--

INSERT INTO `wy_admin` (`admin_id`, `admin_code`, `admin_name`, `admin_email`, `admin_password`, `admin_time`) VALUES
(1, 'WY00', 'Admin', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-04-18 02:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `wy_attendance`
--

CREATE TABLE `wy_attendance` (
  `attendance_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL,
  `action_name` enum('punchin','punchout') NOT NULL,
  `action_time` time NOT NULL,
  `emp_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_attendance`
--

INSERT INTO `wy_attendance` (`attendance_id`, `emp_code`, `attendance_date`, `action_name`, `action_time`, `emp_desc`) VALUES
(2, 'WY01', '2021-04-13', 'punchin', '10:41:27', '21'),
(3, 'WY01', '2021-04-13', 'punchout', '17:37:36', '220'),
(4, 'WY02', '2021-04-14', 'punchin', '15:05:42', 'D114'),
(5, 'WY02', '2021-04-14', 'punchout', '22:19:14', 'out-144'),
(6, 'WY03', '2021-04-14', 'punchin', '10:30:30', 'IN'),
(7, 'WY03', '2021-04-14', 'punchout', '17:30:52', 'OUT'),
(8, 'WY04', '2021-04-14', 'punchin', '10:00:59', 'IS1'),
(9, 'WY04', '2021-04-14', 'punchout', '14:31:27', 'IS1'),
(10, 'WY05', '2021-04-14', 'punchin', '19:11:29', 'In'),
(11, 'WY05', '2021-04-14', 'punchout', '19:13:02', 'Outt');

-- --------------------------------------------------------

--
-- Table structure for table `wy_employees`
--

CREATE TABLE `wy_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `merital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `identity_doc` varchar(255) NOT NULL,
  `identity_no` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `pf_account` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `middle_name` varchar(150) NOT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_employees`
--

INSERT INTO `wy_employees` (`emp_id`, `emp_code`, `emp_password`, `first_name`, `last_name`, `dob`, `gender`, `merital_status`, `nationality`, `address`, `city`, `state`, `country`, `email`, `mobile`, `telephone`, `identity_doc`, `identity_no`, `emp_type`, `joining_date`, `blood_group`, `photo`, `designation`, `department`, `pan_no`, `bank_name`, `account_no`, `ifsc_code`, `pf_account`, `created`, `middle_name`, `qr_code`) VALUES
(6, 'WY01', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Will', 'Williams', '04/01/1995', 'male', 'Single', 'American', '2424  Boggess Street', 'Dallas', 'TX', 'US', 'williams@gmail.com', '2457878540', '014577854', 'Passport', '012345678', 'Permanent position', '01/29/2019', 'B+', 'WY01.jpg', 'Developer', 'WEB', '14785424', 'Demo Bank', '012457854512', '12458', '11452', '2021-04-12 13:54:49', '', ''),
(7, 'WY02', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Leo', 'Allen', '04/01/1993', 'male', 'Registered partnership', 'American', '4265  Jefferson Street', 'Norfolk', 'VA', 'US', 'leoallen06905@gmail.com', '2450157695', '1245785540', 'Passport', '914575421', 'Permanent position', '04/01/2020', 'AB+', 'WY02.jpg', 'Chief Marketing Officer', 'Marketing', '2014578540', 'Grand Summit Bank Inc.', '69529712540', 'GRSB0069961', 'GB LAD 054110 000 000542', '2021-04-14 13:18:32', '', ''),
(8, 'WY03', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Christen', 'Moore', '04/20/1995', 'female', 'Single', 'American', '518  Evergreen Lane', 'Los Angeles', 'CA', 'US', 'moorechristen@gmail.com', '4578545555', '4547854520', 'Passport', '100035420', 'Part-time employee', '04/01/2021', 'A+', 'WY03.jpg', 'Executive Assistant', 'General', '1450578569', 'Crest Bank', '87529722555', 'CBSB0096960', 'CB LAD 094169 000 000111', '2021-04-14 14:23:30', '', ''),
(9, 'WY04', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Stephen', 'Denn', '10/12/1992', 'male', 'Registered partnership', 'American', '3007  Carolina Avenue', 'Loveland', 'CO', 'US', 'stephen@gmail.com', '3457856970', '1045786310', 'Passport', '321457852', 'Intern', '04/14/2021', 'A-', 'WY04.jpg', 'Internship Period', 'IT', '2222060446', 'Federal Bank', '273794443158', 'FBSB00139980', 'FB LAD 033385 000 000135', '2021-04-14 15:49:34', '', ''),
(10, 'WY05', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Agnes', 'Miller', '07/29/1993', 'female', 'Single', 'American', '4211 Rubaiyt Road', 'Grand Rapids', 'Michign', 'US', 'agnesm88d@gmail.com', '3247548880', '2457778540', 'Passport', '245785000', 'Permanent position', '10/15/2020', 'B+', 'WY05.jpg', 'Chief Technology Officer', 'IT', '425569690', 'Centreville Bank', '4201483626', 'CVCB0011377', 'CB LAD 032425 000 000753', '2021-04-14 19:22:17', '', ''),
(11, 'WY06', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Denver', 'Tulop', '03/14/1997', 'male', 'Single', 'Filipino', 'San Miguel', 'Pasig', 'Philippines', 'Philippines', 'kaitodik14@gmail.com', '1231231241', '12345465', 'SSS ID or SSS UMID Card', '1241412515', 'Intern', '10/12/2021', 'Quality Admin', 'WY06.png', '', '', '', '', '', '', '', '2021-10-24 10:00:39', '', ''),
(12, 'WY07', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Hilda', 'Tulop', '03/14/1997', 'female', 'Single', 'Filipino', 'San Miguel', 'Pasig', 'Philippines', 'Philippines', 'kaitodik14@gmail.com', '1231231241', '12345465', 'SSS ID or SSS UMID Card', '1241412515', 'Intern', '10/12/2021', 'Quality Admin', 'WY07.png', '', '', '', '', '', '', '', '2021-10-24 10:06:45', 'Madrona	', ''),
(13, 'WY08', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Dandave', 'Tulop', '03/14/1997', 'male', 'Single', 'Filipino', 'San Miguel', 'Pasig', 'Philippines', 'Philippines', 'kaitodik14@gmail.com', '1231231241', '12345465', 'SSS ID or SSS UMID Card', '1241412515', 'Intern', '10/12/2021', 'Quality Admin', 'WY08.png', '', '', '', '', '', '', '', '2021-10-24 10:17:20', 'Madrona	', ''),
(14, 'WY09', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Ana', 'Tulop', '03/04/1997', 'female', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY09.png', '', '', '', '', '', '', '', '2021-10-24 10:24:18', 'Madrona', 'WY09\'emp_password	'),
(15, 'WY10', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'John', 'Tulop', '03/04/1997', 'male', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY10.png', '', '', '', '', '', '', '', '2021-10-24 10:29:01', 'Madrona', '0'),
(16, 'WY11', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Mike', 'Tulop', '03/04/1997', 'male', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY11.png', '', '', '', '', '', '', '', '2021-10-24 10:30:07', 'Madrona', 'WY11+emp_password'),
(17, 'WY12', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Odette', 'Tulop', '03/04/1997', 'female', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY12.png', '', '', '', '', '', '', '', '2021-10-24 10:31:15', 'Madrona', 'WY12\'emp_password'),
(18, 'WY13', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Max', 'Tulop', '03/04/1997', 'female', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY13.png', '', '', '', '', '', '', '', '2021-10-24 10:32:58', 'Madrona', '123456'),
(19, 'WY14', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Alvin', 'Tulop', '03/04/1997', 'male', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY14.png', '', '', '', '', '', '', '', '2021-10-24 10:34:11', 'Madrona', '0'),
(20, 'WY15', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Irvin', 'Tulop', '03/04/1997', 'male', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY15.png', '', '', '', '', '', '', '', '2021-10-24 10:34:43', 'Madrona', '$emp_code$emp_password'),
(21, 'WY16', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Sam', 'Tulop', '03/04/1997', 'male', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY16.png', '', '', '', '', '', '', '', '2021-10-24 10:45:10', 'Madrona', ''),
(22, 'WY17', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Erika', 'Tulop', '03/04/1997', 'male', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY17.png', '', '', '', '', '', '', '', '2021-10-24 10:51:21', 'Madrona', ''),
(23, 'WY18', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Hello', 'Tulop', '03/04/1997', 'male', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '286961972', 'Voter Id', '1858120941', 'Holiday worker', '09/06/2021', 'Travel Consultant', 'WY18.png', '', '', '', '', '', '', '', '2021-10-24 10:55:07', 'Madrona', ''),
(24, 'WY19', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Denver2', 'Tulop', '03/11/1997', 'male', 'Single', 'Filipino', 'Blk12 Lot17 Sampaguita St. Villa Eusebio, San Miguel', 'Pasig City', 'Philippines', 'Philippines', 'tulopjaynos@gmail.com', '214124122', '324', 'NBI Clearance', '32424242', 'Intern', '10/12/2021', 'Travel Consultant', 'WY19.png', '', '', '', '', '', '', '', '2021-10-24 10:57:24', 'Tulop', ''),
(25, 'WY20', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Arina', 'Tulop', '03/11/1997', 'female', 'Single', 'Filipino', 'Blk12 Lot17 Sampaguita St. Villa Eusebio, San Miguel', 'Pasig City', 'Philippines', 'Philippines', 'tulopjaynos@gmail.com', '214124122', '324', 'NBI Clearance', '32424242', 'Intern', '10/12/2021', 'Travel Consultant', 'WY20.png', '', '', '', '', '', '', '', '2021-10-24 10:58:40', 'Tulop', ''),
(26, 'WY21', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Arina1', 'Tulop', '03/11/1997', 'female', 'Single', 'Filipino', 'Blk12 Lot17 Sampaguita St. Villa Eusebio, San Miguel', 'Pasig City', 'Philippines', 'Philippines', 'tulopjaynos@gmail.com', '214124122', '324', 'NBI Clearance', '32424242', 'Intern', '10/12/2021', 'Travel Consultant', 'WY21.png', '', '', '', '', '', '', '', '2021-10-24 10:59:14', 'Tulop', ''),
(27, 'WY22', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Arina2', 'Tulop', '03/11/1997', 'female', 'Single', 'Filipino', 'Blk12 Lot17 Sampaguita St. Villa Eusebio, San Miguel', 'Pasig City', 'Philippines', 'Philippines', 'tulopjaynos@gmail.com', '214124122', '324', 'NBI Clearance', '32424242', 'Intern', '10/12/2021', 'Travel Consultant', 'WY22.png', '', '', '', '', '', '', '', '2021-10-24 10:59:50', 'Tulop', ''),
(28, 'WY23', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Arina3', 'Tulop', '03/11/1997', 'female', 'Single', 'Filipino', 'Blk12 Lot17 Sampaguita St. Villa Eusebio, San Miguel', 'Pasig City', 'Philippines', 'Philippines', 'tulopjaynos@gmail.com', '214124122', '324', 'NBI Clearance', '32424242', 'Intern', '10/12/2021', 'Travel Consultant', 'WY23.png', '', '', '', '', '', '', '', '2021-10-24 11:00:52', 'Tulop', '.123456'),
(29, 'WY24', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Arina5', 'Tulop', '03/11/1997', 'female', 'Single', 'Filipino', 'Blk12 Lot17 Sampaguita St. Villa Eusebio, San Miguel', 'Pasig City', 'Philippines', 'Philippines', 'tulopjaynos@gmail.com', '214124122', '324', 'NBI Clearance', '32424242', 'Intern', '10/12/2021', 'Travel Consultant', 'WY24.png', '', '', '', '', '', '', '', '2021-10-24 11:04:58', 'Tulop', '..\'.123456.'),
(30, 'WY25', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'anerina', 'Tulop', '03/04/1997', 'female', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '21412412', 'Voter Id', '010262875641', 'Intern', '10/28/2021', 'Quality Admin', 'WY25.png', '', '', '', '', '', '', '', '2021-10-24 11:10:03', 'madrona', 'WY25.123456'),
(31, 'WY26', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'anerina5', 'Tulop', '03/04/1997', 'female', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '21412412', 'Voter Id', '010262875641', 'Intern', '10/28/2021', 'Quality Admin', 'WY26.png', '', '', '', '', '', '', '', '2021-10-24 11:10:42', 'madrona', 'WY26123456'),
(32, 'WY27', 'b7c5c7d8d8c2e40aa0fb3e6703f76e51571b3a8e', 'anerina5', 'Tulop', '03/04/1997', 'female', 'Married', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '21412412', 'Voter Id', '010262875641', 'Intern', '10/28/2021', 'Quality Admin', 'WY27.png', '', '', '', '', '', '', '', '2021-10-24 11:11:33', 'madrona', 'WY27.hulaanmo'),
(33, 'WY28', 'fa49d3117c820b424570fe15f4994e4e709d72fb', 'saf', 'Madrona', '03/11/1997', 'female', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '214124122', 'GSIS ID or GSIS UMID Card', '1858120941', 'Intern', '10/20/2021', 'Quality Admin', 'WY28.png', '', '', '', '', '', '', '', '2021-10-24 11:12:42', 'Madrona', 'WY28.hulaanmo2'),
(34, 'WY29', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'saf', 'Madrona', '03/11/1997', 'female', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '214124122', 'GSIS ID or GSIS UMID Card', '1858120941', 'Intern', '10/20/2021', 'Quality Admin', 'WY29.png', '', '', '', '', '', '', '', '2021-10-24 11:13:31', 'Madrona', 'WY29.123456'),
(35, 'WY30', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'saf', 'Madrona', '03/11/1997', 'female', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'tulopjaynos@gmail.com', '6961972', '214124122', 'GSIS ID or GSIS UMID Card', '1858120941', 'Intern', '10/20/2021', 'Quality Admin', 'WY30.png', '', '', '', '', '', '', '', '2021-10-24 11:14:24', 'Madrona', '..\'.123456'),
(36, 'WY31', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Payroll', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY31.png', '', '', '', '', '', '', '', '2021-10-24 11:15:53', 'Madrona', 'WY31.123456'),
(37, 'WY32', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Payroll1', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY32.png', '', '', '', '', '', '', '', '2021-10-24 11:17:11', 'Madrona', '123456'),
(38, 'WY33', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Payroll1', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY33.png', '', '', '', '', '', '', '', '2021-10-24 11:18:56', 'Madrona', ''),
(39, 'WY34', '48efc4851e15940af5d477d3c0ce99211a70a3be', 'Pagodna', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY34.png', '', '', '', '', '', '', '', '2021-10-24 11:20:40', 'Madrona', 'WY34.1q2w3e4r'),
(40, 'WY35', 'e71bf3faabe17bbb7af0e842b315811db5ed8f1f', 'Pagodna1', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY35.png', '', '', '', '', '', '', '', '2021-10-24 11:21:12', 'Madrona', 'WY35paddwordtoh'),
(41, 'WY36', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pagodna2', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY36.png', '', '', '', '', '', '', '', '2021-10-24 11:22:56', 'Madrona', '(123456)'),
(42, 'WY37', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pagodna3', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY37.png', '', '', '', '', '', '', '', '2021-10-24 11:23:48', 'Madrona', 'WY377c4a8d09ca3762af61e59520943dc26494f8941b'),
(43, 'WY38', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pagodna4', 'Madrona', '03/04/1997', 'male', 'Cohabitation', 'Filipino', 'Sampaguita St.', 'CITY OF PASIG', 'METRO MANILA', 'Philippines', 'kaitodik14@gmail.com', '6961972', '214124122', 'Voter Id', '32424242', 'Holiday worker', '10/20/2021', 'Travel Consultant', 'WY38.png', '', '', '', '', '', '', '', '2021-10-24 11:39:48', 'Madrona', 'WY387c4a8d09ca3762af61e59520943dc26494f8941b'),
(44, 'WY39', '504f126bef09ebda58db99ebe89adebc10a70125', 'Maricris', 'Christel', '07/06/1994', 'female', 'Cohabitation', 'Filipino', 'Blk12 Lot17 Sampaguita St. Villa Eusebio, San Miguel', 'Pasig City', 'Philippines', 'Philippines', 'tulopjaynos@gmail.com', '286961972d', '13213213213123f', 'Voter Id', '010262875641', 'Intern', '10/20/2021', 'B+', 'WY39.png', 'fvv', 'vv', 'b', 'qwd', 'ioj', 'ojn', 'on', '2021-11-06 09:13:57', 'Chris', 'WY39cbfdac6008f9cab4083784cbd1874f76618d2a97');

-- --------------------------------------------------------

--
-- Table structure for table `wy_holidays`
--

CREATE TABLE `wy_holidays` (
  `holiday_id` int(11) NOT NULL,
  `holiday_title` varchar(255) NOT NULL,
  `holiday_desc` varchar(255) NOT NULL,
  `holiday_date` varchar(50) NOT NULL,
  `holiday_type` enum('compulsory','restricted') NOT NULL DEFAULT 'compulsory'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_holidays`
--

INSERT INTO `wy_holidays` (`holiday_id`, `holiday_title`, `holiday_desc`, `holiday_date`, `holiday_type`) VALUES
(1, 'Labor Day', 'Labor Day 2020', '05/01/2020', 'compulsory'),
(2, 'Thanksgiving Day', 'Thanksgiving Day 2020', '11/26/2020', 'restricted'),
(9, 'Independence Day', 'Independence Day 2020', '08/15/2020', 'compulsory'),
(16, 'Memorial Day', 'Memorial Day 2020', '05/25/2020', 'restricted'),
(17, 'Martin Luther King, Jr. Birthday', 'Martin Luther King, Jr. Birthday 2020', '01/20/2020', 'compulsory'),
(18, 'Christmas Day', 'Christmas Day 2020', '12/25/2020', 'compulsory'),
(21, 'New Year', 'New Year 2021', '01/01/2021', 'compulsory');

-- --------------------------------------------------------

--
-- Table structure for table `wy_leaves`
--

CREATE TABLE `wy_leaves` (
  `leave_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `leave_subject` varchar(255) NOT NULL,
  `leave_dates` varchar(255) NOT NULL,
  `leave_message` longtext NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `leave_status` enum('pending','approve','reject') NOT NULL DEFAULT 'pending',
  `apply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_leaves`
--

INSERT INTO `wy_leaves` (`leave_id`, `emp_code`, `leave_subject`, `leave_dates`, `leave_message`, `leave_type`, `leave_status`, `apply_date`) VALUES
(1, 'WY01', 'Requesting for leave days', '04/13/2021', 'this is a demo leave message', 'Sick Leave', 'approve', '2021-04-13 10:09:02'),
(3, 'WY03', 'Leave for 2 days', '04/15/2021,04/17/2021', 'Dear admin, i\'d like to apply leave for 2 days as i\'ve been a regular employee since my first day at office. And now, i finally got to rest and spend some time with my family too!', 'Casual Leave', 'reject', '2021-04-14 15:47:06'),
(4, 'WY05', 'Leave for a week', '04/15/2021,04/23/2021', 'i wont be able to join office as i\'ve been suffering from a rough common cold and fever. so, i\'d like to request a leave for week', 'Sick Leave', 'approve', '2021-04-14 19:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `wy_payheads`
--

CREATE TABLE `wy_payheads` (
  `payhead_id` int(11) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `payhead_desc` varchar(255) NOT NULL,
  `payhead_type` enum('earnings','deductions') NOT NULL DEFAULT 'earnings'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_payheads`
--

INSERT INTO `wy_payheads` (`payhead_id`, `payhead_name`, `payhead_desc`, `payhead_type`) VALUES
(1, 'Basic Salary', 'Basic Salary', 'earnings'),
(2, 'Dearness Allowance', 'Dearness Allowance', 'deductions'),
(3, 'House Rent Allowance', 'House Rent Allowance', 'deductions'),
(4, 'Conveyance Allowance', 'Conveyance Allowance', 'deductions'),
(5, 'Medical Allowance', 'Medical Allowance', 'deductions'),
(7, 'Overtime', 'Overtime', 'earnings'),
(8, 'Traveling Expenses', 'Traveling Expenses', 'earnings'),
(9, 'Loans & Advance', 'Loans & Advance', 'earnings'),
(10, 'Other Allowance', 'Other Allowance', 'earnings'),
(11, 'Professional Tax', 'Professional Tax', 'deductions'),
(12, 'Income Tax', 'Income Tax', 'deductions'),
(13, 'Employee Provident Fund', 'Employee Provident Fund', 'deductions'),
(14, 'Loans & Advance', 'Loans & Advance', 'deductions'),
(15, 'Other Deductions', 'Other Deductions', 'deductions');

-- --------------------------------------------------------

--
-- Table structure for table `wy_pay_structure`
--

CREATE TABLE `wy_pay_structure` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_id` int(11) NOT NULL,
  `default_salary` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_pay_structure`
--

INSERT INTO `wy_pay_structure` (`salary_id`, `emp_code`, `payhead_id`, `default_salary`) VALUES
(129, 'WY01', 1, 45000.00),
(130, 'WY01', 15, 5000.00),
(131, 'WY03', 7, 5500.00),
(132, 'WY03', 1, 21000.00),
(133, 'WY05', 1, 51500.00),
(134, 'WY05', 7, 6500.00),
(135, 'WY05', 12, 5510.00),
(136, 'WY04', 1, 39000.00),
(137, 'WY04', 7, 5600.00),
(138, 'WY04', 12, 4250.00),
(139, 'WY02', 1, 21000.00),
(140, 'WY02', 7, 6500.00),
(141, 'WY39', 1, 50000.00),
(142, 'WY39', 12, 1500.00),
(143, 'WY39', 14, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `wy_salaries`
--

CREATE TABLE `wy_salaries` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `pay_amount` float(11,2) NOT NULL,
  `earning_total` float(11,2) NOT NULL,
  `deduction_total` float(11,2) NOT NULL,
  `net_salary` float(11,2) NOT NULL,
  `pay_type` enum('earnings','deductions') NOT NULL,
  `pay_month` varchar(255) NOT NULL,
  `generate_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_salaries`
--

INSERT INTO `wy_salaries` (`salary_id`, `emp_code`, `payhead_name`, `pay_amount`, `earning_total`, `deduction_total`, `net_salary`, `pay_type`, `pay_month`, `generate_date`) VALUES
(244, 'WY01', 'Basic Salary', 45000.00, 45000.00, 0.00, 45000.00, 'earnings', 'March, 2021', '2021-04-12 13:48:19'),
(245, 'WY03', 'Overtime', 5500.00, 39500.00, 0.00, 39500.00, 'earnings', 'March, 2021', '2021-04-14 16:09:02'),
(246, 'WY03', 'Basic Salary', 34000.00, 39500.00, 0.00, 39500.00, 'earnings', 'March, 2021', '2021-04-14 16:09:02'),
(247, 'WY05', 'Basic Salary', 51500.00, 58000.00, 5510.00, 52490.00, 'earnings', 'April, 2021', '2021-04-14 19:17:13'),
(248, 'WY05', 'Overtime', 6500.00, 58000.00, 5510.00, 52490.00, 'earnings', 'April, 2021', '2021-04-14 19:17:13'),
(249, 'WY05', 'Income Tax', 5510.00, 58000.00, 5510.00, 52490.00, 'deductions', 'April, 2021', '2021-04-14 19:17:14'),
(250, 'WY04', 'Basic Salary', 39000.00, 44600.00, 4250.00, 40350.00, 'earnings', 'April, 2021', '2021-04-14 19:22:25'),
(251, 'WY04', 'Overtime', 5600.00, 44600.00, 4250.00, 40350.00, 'earnings', 'April, 2021', '2021-04-14 19:22:25'),
(252, 'WY04', 'Income Tax', 4250.00, 44600.00, 4250.00, 40350.00, 'deductions', 'April, 2021', '2021-04-14 19:22:25'),
(253, 'WY39', 'Basic Salary', 50000.00, 50000.00, 1700.00, 48300.00, 'earnings', 'November, 2021', '2021-11-06 10:12:13'),
(254, 'WY39', 'Income Tax', 1500.00, 50000.00, 1700.00, 48300.00, 'deductions', 'November, 2021', '2021-11-06 10:12:13'),
(255, 'WY39', 'Loans & Advance', 200.00, 50000.00, 1700.00, 48300.00, 'deductions', 'November, 2021', '2021-11-06 10:12:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wy_admin`
--
ALTER TABLE `wy_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_code` (`admin_code`);

--
-- Indexes for table `wy_attendance`
--
ALTER TABLE `wy_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_employees`
--
ALTER TABLE `wy_employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  ADD PRIMARY KEY (`payhead_id`);

--
-- Indexes for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`),
  ADD KEY `payhead_id` (`payhead_id`);

--
-- Indexes for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `wy_admin`
--
ALTER TABLE `wy_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wy_attendance`
--
ALTER TABLE `wy_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wy_employees`
--
ALTER TABLE `wy_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  MODIFY `payhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
