-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 12:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `170204067_170204115`
--
CREATE DATABASE IF NOT EXISTS `170204067_170204115` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `170204067_170204115`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ap_sl_no` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `appointment_time` date NOT NULL,
  `consult_date` date NOT NULL,
  `consult_time` varchar(20) NOT NULL,
  `problems` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ap_sl_no`, `userID`, `doctor_id`, `doctor_name`, `appointment_time`, `consult_date`, `consult_time`, `problems`) VALUES
(1, 12, 12, 'Dr.Javed Omar', '2020-09-14', '2020-09-24', '10-00AM -12.00PM', 'Leg Pain'),
(2, 15, 15, 'Dr.Junaid Bhuiyan', '2020-09-14', '2020-09-02', '4:00PM - 9.00PM', 'Heart Surgery'),
(3, 14, 14, 'Dr.Imran Tahir', '2020-09-14', '2020-09-30', '4:00PM - 9.00PM', 'Eye Problem'),
(4, 16, 16, 'Dr.Shuvo Ahmed', '2020-09-15', '2020-09-27', '7:00PM - 11.00PM', 'Toothache'),
(6, 12, 12, 'Dr.Javed Omar', '2020-09-17', '2020-09-09', '9:00PM - 11.30PM', 'Leg Pain'),
(8, 13, 13, 'Dr.Karim Haidar', '2020-09-17', '2020-09-10', '4:00PM - 9.00PM', 'Skin'),
(9, 12, 12, 'Dr.Javed Omar', '2020-09-18', '1970-01-01', '10-00AM -12.00PM', 'Leg Pain'),
(10, 12, 12, 'Dr.Javed Omar', '2020-09-18', '2020-09-26', '3:00PM - 9.00PM', 'Leg Pain'),
(12, 14, 12, 'Dr.Javed Omar', '2020-09-18', '2020-10-02', '10-00AM -12.00PM', 'Heart Surgery'),
(13, 14, 12, 'Dr.Javed Omar', '2020-09-18', '2020-09-30', '10-00AM -12.00PM', 'Heart Surgery'),
(14, 14, 13, 'Dr.Karim Haidar', '2020-09-18', '2020-09-24', '4:00PM - 9.00PM', 'Leg Pain'),
(15, 14, 15, 'Dr.Junaid Bhuiyan', '2020-09-18', '2020-09-24', '1:00PM - 9.00PM', 'Heart Surgery'),
(16, 14, 13, 'Dr.Karim Haidar', '2020-09-18', '2020-09-25', '4:00PM - 9.00PM', 'aa'),
(17, 14, 12, 'Dr.Javed Omar', '2020-09-18', '2020-09-26', '3:00PM - 9.00PM', 'Eye Problem'),
(18, 14, 12, 'Dr.Javed Omar', '2020-09-18', '2020-10-07', '10-00AM -12.00PM', 'aa'),
(19, 14, 14, 'Dr.Imran Tahir', '2020-09-19', '2020-09-30', '4:00PM - 9.00PM', 'Eye Problem'),
(20, 14, 13, 'Dr.Karim Haidar', '2020-09-19', '2020-09-19', '4:00PM - 9.00PM', 'qq'),
(21, 14, 14, 'Dr.Imran Tahir', '2020-09-19', '2020-09-30', '4:00PM - 9.00PM', 'aa'),
(22, 23, 13, 'Dr.Karim Haidar', '2020-09-19', '2020-09-30', '4:00PM - 9.00PM', 'aaax'),
(23, 14, 12, 'Dr.Javed Omar', '2020-09-19', '2020-09-21', '10-00AM -12.00PM', 'aa'),
(24, 14, 12, 'Dr.Javed Omar', '2020-09-19', '2020-09-25', '10-00AM -12.00PM', 'pain'),
(25, 14, 18, 'Dr.Yousuf Mia', '2020-09-19', '2020-09-30', '9:00PM - 11.30PM', 'pet betha'),
(26, 27, 11, 'Dr.Aminur Rahman', '2020-09-19', '2020-09-23', '7.00PM - 10.00PM', 'pain'),
(27, 27, 13, 'Dr.Karim Haidar', '2020-09-19', '2020-09-30', '4:00PM - 9.00PM', 'pet betha'),
(28, 27, 13, 'Dr.Karim Haidar', '2020-09-19', '2020-09-19', '4:00PM - 9.00PM', 'pain');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `contactID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `subject` text,
  `message` text,
  `messageDate` datetime NOT NULL,
  `reply` text,
  `replyDate` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`contactID`, `name`, `email`, `contactno`, `country`, `subject`, `message`, `messageDate`, `reply`, `replyDate`, `status`) VALUES
(1, 'md moniruzzaman', 'joyultimates@gmail.com', '01234', 'Bangladesh', 'test ', 'test test', '0000-00-00 00:00:00', 'welcome', '0000-00-00 00:00:00', 1),
(3, 'test7', 'test7@gmial.com', '3', 'India', 'test 7', 't', '0000-00-00 00:00:00', 'y', '0000-00-00 00:00:00', 0),
(6, 'test7', 'test7@gmial.com', '7576', 'USA', 'test 7', 'We are always here to help. If your have requirements/queries about our services; fill up the contact form below and we\'ll do our best to reply within 24 hours Alternatively simply pickup the phone and give us a call.', '0000-00-00 00:00:00', 'We are always here to help. If your have requirements/queries about our services; fill up the contact form below and we\'ll do our best to reply within 24 hours Alternatively simply pickup the phone and give us a call.', '0000-00-00 00:00:00', 0),
(7, 'user', 'j@g.com', '0123647', 'USA', 'user user', 'We are always here to help. If your have requirements/queries about our services; fill up the contact form below and we\'ll do our best to reply within 24 hours Alternatively simply pickup the phone and give us a call.', '2020-09-15 04:15:27', 'date time successfull\r\n', '2020-09-15 04:25:27', 1),
(8, 'test7', 'test@gmail.com', '', 'Country', '', 'yrx', '2020-09-20 03:44:01', NULL, '0000-00-00 00:00:00', 0),
(9, 'test7', 'test@gmail.com', '', 'Country', '', 'yrx', '2020-09-20 03:45:07', NULL, '0000-00-00 00:00:00', 0),
(10, 'test7', 'test@gmail.com', '', 'Country', '', 'yrx', '2020-09-20 03:45:11', NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT 'Dhaka',
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `degree`, `category`, `hospital`, `email`, `address`, `phone`) VALUES
(11, 'Dr.Aminur Rahman', 'MBBS', 'General Medicine', 'LabAid Hospital', 'amin@gmail.com', '12/A,Gulshan', '0152811234'),
(12, 'Dr.Javed Omar', 'MBBS,FCPS', 'Orthopedic', 'GreenLife Hospital', 'javed@gmail.com', '13/B,Dhanmondi', '0172513254'),
(13, 'Dr.Karim Haidar', 'FRCS', 'Oculoplasty', 'HolyFamily Hospital', 'haidar@yahoo.com', '122/A,Malibagh', '0152151425'),
(14, 'Dr.Imran Tahir', 'BDS', 'Opthalmology', 'Apollo Hospital', 'tahir@gmail.com', '20/C,Moghbazar', '0174101531'),
(15, 'Dr.Junaid Bhuiyan', 'MBBS', 'General Medicine', 'Kurmitola Hospital', 'junayed123@gmail.com', '14/D,Rampura', '0182171374'),
(16, 'Dr.Shuvo Ahmed', 'MBBS,FRCS', 'Dental', 'Alpha Hospital', 'shuvo@gmail.com', '110C/A,Banani', '0162941234'),
(17, 'Dr Mostofa Kaiser', 'Phd,MBChB', 'Nephrology', 'ICD Hospital', 'kaiser@yahoo.com', '15/E,Malibagh', '0194351254'),
(18, 'Dr.Yousuf Mia', 'BMBS', 'Kidney Specialist', 'ICD Hospital', 'yousuf@site.com', '15/A Mohammadpur', '0142100260');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_time`
--

CREATE TABLE `doctor_time` (
  `doctor_id` int(11) NOT NULL,
  `available_time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_time`
--

INSERT INTO `doctor_time` (`doctor_id`, `available_time`) VALUES
(11, '11-00AM -1.00PM'),
(11, '7.00PM - 10.00PM'),
(12, '10-00AM -12.00PM'),
(12, '3:00PM - 9.00PM'),
(13, '4:00PM - 9.00PM'),
(14, '4:00PM - 9.00PM'),
(15, '4:00PM - 9.00PM'),
(15, '1:00PM - 9.00PM'),
(15, '7:00PM - 11.00PM'),
(16, '7:00PM - 11.00PM'),
(17, '6:00PM - 11.30PM'),
(18, '9:00PM - 11.30PM');

-- --------------------------------------------------------

--
-- Table structure for table `home_image`
--

CREATE TABLE `home_image` (
  `imageID` int(11) NOT NULL,
  `image_src` varchar(255) DEFAULT NULL,
  `image_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_image`
--

INSERT INTO `home_image` (`imageID`, `image_src`, `image_category`) VALUES
(1, '../assets/home_image/title_lifey_favicon.png', 'title'),
(2, '../assets/home_image/header1_lifey_favicon.png', 'header1'),
(3, '../assets/home_image/header2_unnamed.png', 'header2'),
(4, '../assets/home_image/section1_1_132848.jpg', 'section1_1'),
(5, '../assets/home_image/section4_1_500854a.jpg', 'section4_1'),
(6, '../assets/home_image/section4_2_1_15743310.jpg', 'section4_2_1'),
(7, '../assets/home_image/section4_2_2_15743303.jpg', 'section4_2_2'),
(8, '../assets/home_image/section4_3_1655257.jpg', 'section4_3');

-- --------------------------------------------------------

--
-- Table structure for table `home_text`
--

CREATE TABLE `home_text` (
  `textID` int(11) NOT NULL,
  `text_category` varchar(255) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_text`
--

INSERT INTO `home_text` (`textID`, `text_category`, `text`) VALUES
(1, 'h1', 'Lifey: Lifey is life'),
(2, 'h2', 'SECURE LIFE'),
(3, 'h3', ' Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(4, 'h4', 'SIGN IN'),
(5, 's1t1', 'Lifey'),
(6, 's1t2', 'Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(7, 's1t3', ' Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(8, 's2t1', 'Our registered Clint'),
(9, 's2t2', 'it means to be full of life'),
(10, 's3t1', 'Download Our App'),
(11, 's3t2', 'Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(12, 's4t1', 'What our Clint Say about us'),
(13, 's4t2', 'Lifey has several possible meanings'),
(14, 's4t3', 'Dr.Strange'),
(15, 's4t4', 'Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(16, 's4t5', 'MBBS FCPS'),
(17, 's4t6', 'DHAKA MEDICAL'),
(18, 's4t7', 'ABUL MAL'),
(19, 's4t8', 'Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(20, 's4t8', 'Cancer'),
(21, 's4t9', 'Noakhali'),
(22, 's4t10', 'Sokina'),
(23, 's4t11', 'Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(24, 's4t12', 'Tummy sickness'),
(25, 's4t13', 'Cumilla'),
(26, 's4t14', 'Business man'),
(27, 's4t15', 'Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one\'s life.'),
(28, 's4t16', 'Salman F R.'),
(29, 's4t17', 'Under Cover Agent');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_url`) VALUES
(1, '../images/appointment.jpg'),
(2, '../images/appointmentlist.jpg'),
(3, '../images/prescription.jpg'),
(4, '../images/services.jpg'),
(5, '../images/image%20(1).jpg'),
(6, '../images/image%20(7).jpg'),
(7, '../images/image%20(3).jpg'),
(8, '../images/about_us1.jpg'),
(9, '../images/about_us2.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `doctor_name` varchar(40) NOT NULL,
  `problems` varchar(100) NOT NULL,
  `test` varchar(50) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `UserID`, `doctor_id`, `user_name`, `doctor_name`, `problems`, `test`, `medicine`, `date`) VALUES
(1, 12, 13, 'Sadman', 'doc doc', 'Pain', 'X-Ray', 'Napa 400mg', ''),
(2, 11, 13, 'Sad', 'doc doc', 'qq', 's', 'sada', '2020-09-19'),
(3, 14, 13, 'Abir', 'doc doc', 'Gastric', 'XrAY', 'Seclo', '2020-09-19'),
(4, 14, 13, 'abir', 'doc doc', '1234', 'aa', 'adsa', '2020-09-19'),
(5, 14, 13, 'mnh', 'doc doc', 'pet betha', 'scan', 'do it ', '2020-09-19'),
(6, 27, 13, 'md moniruzzaman', 'doc doc', 'pet betha', 'scan', 'k', '2020-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `registerDate` datetime DEFAULT NULL,
  `role_play` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`userID`, `firstName`, `lastName`, `email`, `password`, `token`, `active`, `profileImage`, `registerDate`, `role_play`) VALUES
(6, 'moniruzzaman', 'joy', 'joy@gmail.com', '$2y$10$YjJmZGNjYzNlYTc0ZTI3MOlSazikbYzWLoumpV1XHB.E0d2pDP8/C', '508a6797f4dd1e499d3e290be8e65f32a52258d4e31a3d4e9f62c639f12ed0e95cb7b90f023185d2', 'On', '../assets/profile/joyultimates.jpg', '2020-06-12 13:13:14', 1),
(7, 'abir', 'chika', 'abir@g', '$2y$10$NjQxOGM2YTk0MTdhZmRiYOwe5iJl5Hn.z94fGRwxIypQl9ni1WWU2', '9109f11756e921873078e318cd273bc57ef99143808d4bbd34b524f71bccc4931723c0b5dc830ef9', 'On', '../assets/profile/download.png', '2020-06-26 21:25:12', 0),
(13, 'Dr.Karim', 'Haidar', 'doc@gmail.com', '$2y$10$ZTFlZjYwZTVhMTAwNmJhNegQAARPzh5FxR9m/gM4LSm85PzeT5l5m', '258c10a7a767e3912b16b53997345a7d08cf9778de278d75aa96ea5e9710f62f395b16092945517f', 'On', '../assets/profile/500854a.jpg', '2020-09-12 09:09:14', 2),
(14, 'user', 'user', 'user@gmail.com', '$2y$10$OWE1ZWVjZjAzOGJjYzk3NeqPw1hIRJd0bGgefcCesyCbaK5w/4rme', '065001a1c397944fdfc7434b462fb48bdc4c030f551b545add5ea883e9d291a7a091d4548f38d6ea', 'On', '../assets/profile/15743303.jpg', '2020-09-12 09:11:15', 0),
(15, 'admin', 'admin', 'admin@gmail.com', '$2y$10$OTJlYjE3MTJiNDU2OTAwMO8rN9dgQfR.UKyCHl7Hin8QDKJrPrZBu', '40cc71e02dbfd5b897c93ca8bd6c993cd74f29f4f7f678c833c24a72407ede9b2b91887ff0c40f9c', 'On', '../assets/profile/download.png', '2020-09-12 09:12:07', 1),
(16, 'test', 'tes', 'test@gmail.com', '$2y$10$YzRiY2UyN2QwMzcwMmE4N.4F127FQaWlXgHI5fDbk73GIcU9.bwAu', '7be94c4463e31da0af8d8c43d4c4ed82c18c5b25c794f87f6865a5fa75109f83e82406c81bda23b8', 'On', '../assets/profile/15743310.jpg', '2020-09-12 22:58:09', 2),
(17, 'test1', 't', 'test1@gmail.com', '$2y$10$NzJkMjNmNDUzNjU4NGIxO.Yg9wwXnfMooYQJT03DqtUVxvoiNpvtu', '8e175482c31096f1c9a9cf73acd6a64b915d5b0c932387ddb67108116757464b4af1350161a2232f', 'On', '../assets/profile/user_default.png', '2020-09-13 12:29:00', 2),
(18, 'test2', 't', 'test2@gmail.com', '$2y$10$ZjNlMWE5ZGY1OTNmOWUzYOmjTQU9/mf17xVJ88MkGtqyN3LSpPx76', '840848ca06b6fcbdd869232a98f976ee6ebb93fab590795d961aa252049544e5d61a608f15328604', 'On', '../assets/profile/1655257.jpg', '2020-09-13 18:10:52', 0),
(19, 'test4', 't4', 'test4@gmail.com', '$2y$10$NTEzODYwZTQ3YWJjY2Y3ZOM9G/K9ftCSm.VP.VCh.0.eZhTXAKQ3i', '5186ffab1034c8ea60229b6e39a29fd8a5453d22117d429f6c9609d2131e3bdbfdd556d45b670fbb', 'OFF', '../assets/profile/1655257.jpg', '2020-09-13 18:11:53', 0),
(20, 't5', '', 'test5@gmail.com', '$2y$10$ZGQ1ZmNlMTljNDEyMzJmYO2C7I1ysTtytfnvMjT/n6Tm63w8mWDdq', 'b62700ea4dda64ad827e764f195a63330101d6efc61aa682d72a88e531b6f57e63b47950d5f355a0', 'OFF', '../assets/profile/user_default.png', '2020-09-13 18:12:45', 0),
(21, 'd', 'd', 'd@gmail.com', '$2y$10$MmFlNjgyMDBjNzNiMWMyOOrCLNl.2Wd2x.5vVPzho2pGutzKPpRVW', '7407ae2d395150abb2992cf0712b8f096f1db386aa51a7e2924c78b120e83d969721ac75c80d1ebf', 'On', '../../assets/profile/user_default.png', '2020-09-14 02:51:00', 0),
(23, 'Mithila', 'Arman', 'mr@gmail.com', '$2y$10$ZjdhZTdhNGZhOWE5NmQ4Z.35idYGZTaUsNbVthS5tSvPZzlEaOLqu', 'f00489925c6a3f4c25f5a93d89ef3ab3df3c2afaf1667628b7eb34e19269b3f9afff6a0442206aeb', 'On', '../assets/profile/user_default.png', '2020-09-19 10:28:59', 0),
(26, 'sadman', 'jahin', 'jahin.cool61@gmail.com', '$2y$10$M2RiOWY3MDdmYzEwOTZlYuaAB0Hvv55r3vkYe/HNnrpQ5AyOLTADm', 'e98e682fb1fdb2c12b8f480c346f1aa952dbce71584d51dccce1cc20dd396b87fa23baa7dfd58e31', 'On', '../assets/profile/user_default.png', '2020-09-19 23:21:19', 0),
(28, 'moniruzzaman', 'joy', 'joyultimates@gmail.com', '$2y$10$ZDc1YjQ3MjY2OGE1YjkwM.RfvRm.LZxDePoFsFo.vQtG3QI0JHGLS', '4bafab823b3df5dcf7da117d60e4f52b34d2631b875dd755fb59e274027b83efe67fb044c250e575', 'On', '../assets/profile/about_us1.jpg', '2020-09-20 01:16:48', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ap_sl_no`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `home_image`
--
ALTER TABLE `home_image`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `home_text`
--
ALTER TABLE `home_text`
  ADD PRIMARY KEY (`textID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ap_sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home_image`
--
ALTER TABLE `home_image`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_text`
--
ALTER TABLE `home_text`
  MODIFY `textID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
