-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2021 at 02:59 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `arc_treated`
--

CREATE TABLE `arc_treated` (
  `arc_id` int(11) NOT NULL,
  `arc_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cur_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arc_treated`
--

INSERT INTO `arc_treated` (`arc_id`, `arc_name`, `status`, `cur_date`) VALUES
(1, 'Uper', 1, ''),
(2, 'Lower', 1, ''),
(3, 'Both', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `des` text,
  `cur_date` varchar(60) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `patient_id`, `file_type`, `des`, `cur_date`, `added_by`, `status`) VALUES
(167, 84, 'Treatment Plan', 'treat', '2021-08-30', 1, 'Pending'),
(168, 84, 'Invoice', 'inv', '2021-08-30', 1, 'Pending'),
(169, 84, 'Intra Oral Images', 'yy', '2021-08-30', 1, 'Pending'),
(170, 84, 'Intra Oral Images', 'yy', '2021-08-30', 1, 'Pending'),
(171, 84, 'Intra Oral Images', 'yy', '2021-08-30', 1, 'Pending'),
(196, 98, 'Intra Oral Images', NULL, '2021-09-01', 1, 'Pending'),
(197, 98, 'OPG Images', NULL, '2021-09-01', 1, 'Pending'),
(198, 99, 'Intra Oral Images', NULL, '2021-09-01', 1, 'Pending'),
(199, 99, 'OPG Images', NULL, '2021-09-01', 1, 'Pending'),
(206, 105, 'Intra Oral Images', NULL, '2021-09-01', 1, 'Pending'),
(207, 105, 'OPG Images', NULL, '2021-09-01', 1, 'Pending'),
(208, 105, 'Treatment Plan', NULL, '2021-09-01', 1, 'Pending'),
(209, 105, 'IPR', NULL, '2021-09-01', 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pt_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `pt_firstname` varchar(200) NOT NULL,
  `pt_lastname` varchar(200) NOT NULL,
  `pt_gender` varchar(20) DEFAULT NULL,
  `pt_email` varchar(100) NOT NULL,
  `pt_img` varchar(200) DEFAULT NULL,
  `pt_scan_impression` varchar(30) DEFAULT NULL,
  `pt_objective` varchar(50) DEFAULT NULL,
  `pt_referal` varchar(20) DEFAULT NULL,
  `type_of_treatment` varchar(200) DEFAULT NULL,
  `type_of_case` varchar(200) DEFAULT NULL,
  `arc_treated` varchar(100) DEFAULT NULL,
  `ipr_performed` varchar(50) DEFAULT NULL,
  `attachment_placed` varchar(100) DEFAULT NULL,
  `pt_treatment_plan` varchar(50) DEFAULT NULL,
  `pt_approval` varchar(40) DEFAULT NULL,
  `pt_approval_date` varchar(60) DEFAULT NULL,
  `pt_custom_status` varchar(50) DEFAULT NULL,
  `pt_case_type` varchar(20) DEFAULT NULL,
  `pt_aligners` varchar(30) DEFAULT NULL,
  `pt_aligners_dispatch` varchar(50) DEFAULT NULL,
  `pt_cost_plan` varchar(30) DEFAULT NULL,
  `pt_amount_paid` varchar(10) DEFAULT NULL,
  `pt_shipping_details` text,
  `pt_billing_address` text,
  `pt_dispatch_date` varchar(70) DEFAULT NULL,
  `pt_status` varchar(20) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `cur_date` varchar(60) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pt_id`, `doctor_id`, `pt_firstname`, `pt_lastname`, `pt_gender`, `pt_email`, `pt_img`, `pt_scan_impression`, `pt_objective`, `pt_referal`, `type_of_treatment`, `type_of_case`, `arc_treated`, `ipr_performed`, `attachment_placed`, `pt_treatment_plan`, `pt_approval`, `pt_approval_date`, `pt_custom_status`, `pt_case_type`, `pt_aligners`, `pt_aligners_dispatch`, `pt_cost_plan`, `pt_amount_paid`, `pt_shipping_details`, `pt_billing_address`, `pt_dispatch_date`, `pt_status`, `added_by`, `cur_date`, `status`) VALUES
(84, 185, 'Mr. Paresh', 'Chawla', 'male', 'asf@asf.com', '1630295193.png', 'no', 'treat', '2', '[\"Crowding\"]', '[\"Class 1\"]', '[\"Uper\"]', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 185, '2021-08-30', 'Pending'),
(98, 185, 'Mr. Abdullah', 'Patient', 'male', 'client@test.com', '', NULL, '', '', '[\"Class || div 1\"]', '[\"Class 3\"]', '[\"Both\"]', '1', '1', '', '', '', 'xx', 'ccccccccc', 'xxxxxx', 'xzzzzzzz', '534', '42', '588 Gabe Forge Apt. 569', 'hhhhhhhhhhhhh', '', '1', 1, '2021-09-01', 'Pending'),
(99, 185, 'Mr. Waqas', 'ahmad', 'male', 'client@test.com', '1630489103.png', NULL, '', '', 'null', 'null', 'null', '1', '1', 'ddddddddddd', '', '', 'xx', 'ccccccccc', 'xxxxxx', 'xzzzzzzz', '534', '42', '588 Gabe Forge Apt. 569', 'ddddddddd', '', '1', 1, '2021-09-01', 'Pending'),
(105, 185, 'Mr. Ubaid', 'Patient', 'male', 'client@test.com', '', NULL, '', '', 'null', 'null', 'null', '1', '1', 'uuuuuuuuuuuuu', '', '', 'xx', 'ccccccccc', 'xxxxxx', 'xzzzzzzz', '534', '42', '588 Gabe Forge Apt. 569', 'ooooooooo', '', '1', 1, '2021-09-01', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `post_id` varchar(40) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `img` varchar(1000) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photos_id`, `key`, `type`, `post_id`, `user_id`, `img`, `created_by`, `created_at`, `status`) VALUES
(821, 'Intra Oral Images', 'patient', '0', '84', '1630295221152319944-close-up-headshot-portrait-of-smiling-vietnamese-young-woman-look-at-camera-talk-on-video-call-profi.jpg', '185', '2021-08-30 03:47:01', 'Pending'),
(822, 'OPG Images', 'patient', '0', '84', '1630295221pexels-photo-220453.jpeg', '185', '2021-08-30 03:47:01', 'Pending'),
(823, 'Lateral C Images', 'patient', '0', '84', '1630295221360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg', '185', '2021-08-30 03:47:01', 'Pending'),
(824, 'STL File(3D File)', 'patient', '0', '84', '1630295221Cube_3d_printing_sample.stl', '185', '2021-08-30 03:47:01', 'Pending'),
(825, 'Treatment Plan', 'document', '167', '84', '1630295515dummy.pdf', '1', '2021-08-30 03:51:55', 'Seen'),
(826, 'Invoice', 'document', '168', '84', '1630295594dummy.pdf', '1', '2021-08-30 03:53:14', 'Seen'),
(841, 'Intra Oral Images', 'document', '169', '84', '1630350238pexels-andrew-dick-697509.jpg', '1', '2021-08-30 19:04:06', 'Pending'),
(842, 'Intra Oral Images', 'document', '169', '84', '1630350246pexels-cottonbro-6962024.jpg', '1', '2021-08-30 19:04:11', 'Pending'),
(843, 'Intra Oral Images', 'document', '169', '84', '1630350251pexels-fauxels-3228834.jpg', '1', '2021-08-30 19:04:12', 'Pending'),
(844, 'Intra Oral Images', 'document', '169', '84', '1630350252pexels-martin-péchy-2078265.jpg', '1', '2021-08-30 19:04:16', 'Pending'),
(845, 'Intra Oral Images', 'document', '169', '84', '1630350256pexels-photo-220453.jpeg', '1', '2021-08-30 19:04:18', 'Pending'),
(846, 'Intra Oral Images', 'document', '169', '84', '1630350258pexels-pixabay-415829.jpg', '1', '2021-08-30 19:04:18', 'Pending'),
(847, 'Intra Oral Images', 'document', '170', '84', '1630350258pexels-andrew-dick-697509.jpg', '1', '2021-08-30 19:04:18', 'Pending'),
(848, 'Intra Oral Images', 'document', '170', '84', '1630350258pexels-cottonbro-6962024.jpg', '1', '2021-08-30 19:04:18', 'Pending'),
(849, 'Intra Oral Images', 'document', '170', '84', '1630350258pexels-fauxels-3228834.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(850, 'Intra Oral Images', 'document', '170', '84', '1630350259pexels-martin-péchy-2078265.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(851, 'Intra Oral Images', 'document', '170', '84', '1630350259pexels-photo-220453.jpeg', '1', '2021-08-30 19:04:19', 'Pending'),
(852, 'Intra Oral Images', 'document', '170', '84', '1630350259pexels-pixabay-415829.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(853, 'Intra Oral Images', 'document', '171', '84', '1630350259pexels-andrew-dick-697509.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(854, 'Intra Oral Images', 'document', '171', '84', '1630350259pexels-cottonbro-6962024.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(855, 'Intra Oral Images', 'document', '171', '84', '1630350259pexels-fauxels-3228834.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(856, 'Intra Oral Images', 'document', '171', '84', '1630350259pexels-martin-péchy-2078265.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(857, 'Intra Oral Images', 'document', '171', '84', '1630350259pexels-photo-220453.jpeg', '1', '2021-08-30 19:04:19', 'Pending'),
(858, 'Intra Oral Images', 'document', '171', '84', '1630350259pexels-pixabay-415829.jpg', '1', '2021-08-30 19:04:19', 'Pending'),
(947, 'Intra Oral Images', 'patient', '196', '98', '16304889702114.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(948, 'Intra Oral Images', 'patient', '196', '98', '16304889707272.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(949, 'Intra Oral Images', 'patient', '196', '98', '1630488970257304.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(950, 'Intra Oral Images', 'patient', '196', '98', '1630488970605472.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(951, 'Intra Oral Images', 'patient', '196', '98', '1630488970660691.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(952, 'Intra Oral Images', 'patient', '196', '98', '1630488970retro-mustang-wallpaper.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(953, 'Intra Oral Images', 'patient', '196', '98', '1630488970team-image1.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(954, 'Intra Oral Images', 'patient', '196', '98', '1630488970team-image2.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(955, 'Intra Oral Images', 'patient', '196', '98', '1630488970team-image3.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(956, 'Intra Oral Images', 'patient', '196', '98', '1630488970testimonial-image.jpg', '1', '2021-09-01 09:36:10', 'Pending'),
(957, 'OPG Images', 'patient', '197', '98', '1630488971195924.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(958, 'OPG Images', 'patient', '197', '98', '1630488971257005.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(959, 'OPG Images', 'patient', '197', '98', '1630488971257304.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(960, 'OPG Images', 'patient', '197', '98', '1630488971274376.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(961, 'OPG Images', 'patient', '197', '98', '1630488971345330.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(962, 'OPG Images', 'patient', '197', '98', '1630488971345529.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(963, 'OPG Images', 'patient', '197', '98', '1630488971404540.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(964, 'OPG Images', 'patient', '197', '98', '1630488971404736.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(965, 'OPG Images', 'patient', '197', '98', '1630488971435930.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(966, 'OPG Images', 'patient', '197', '98', '1630488971441539.jpg', '1', '2021-09-01 09:36:11', 'Pending'),
(967, 'Intra Oral Images', 'patient', '198', '99', '1630489327106677.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(968, 'Intra Oral Images', 'patient', '198', '99', '1630489327167316.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(969, 'Intra Oral Images', 'patient', '198', '99', '1630489327195924.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(970, 'Intra Oral Images', 'patient', '198', '99', '1630489327257005.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(971, 'Intra Oral Images', 'patient', '198', '99', '1630489327257304.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(972, 'Intra Oral Images', 'patient', '198', '99', '1630489327274376.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(973, 'Intra Oral Images', 'patient', '198', '99', '1630489327345330.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(974, 'Intra Oral Images', 'patient', '198', '99', '1630489327345356.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(975, 'Intra Oral Images', 'patient', '198', '99', '1630489327345438.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(976, 'Intra Oral Images', 'patient', '198', '99', '1630489327345529.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(977, 'Intra Oral Images', 'patient', '198', '99', '1630489327404540.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(978, 'Intra Oral Images', 'patient', '198', '99', '1630489327404736.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(979, 'Intra Oral Images', 'patient', '198', '99', '1630489327435930.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(980, 'Intra Oral Images', 'patient', '198', '99', '1630489327441539.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(981, 'OPG Images', 'patient', '199', '99', '16304893272114.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(982, 'OPG Images', 'patient', '199', '99', '16304893277272.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(983, 'OPG Images', 'patient', '199', '99', '1630489327257304.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(984, 'OPG Images', 'patient', '199', '99', '1630489327605472.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(985, 'OPG Images', 'patient', '199', '99', '1630489327660691.jpg', '1', '2021-09-01 09:42:07', 'Pending'),
(1054, 'Intra Oral Images', 'patient', '206', '105', '16304900803D-Nature-HD-Wallpaper-8.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1055, 'Intra Oral Images', 'patient', '206', '105', '16304900802114.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1056, 'Intra Oral Images', 'patient', '206', '105', '16304900807272.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1057, 'Intra Oral Images', 'patient', '206', '105', '16304900807276.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1058, 'Intra Oral Images', 'patient', '206', '105', '163049008011111.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1059, 'OPG Images', 'patient', '207', '105', '163049008026956.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1060, 'OPG Images', 'patient', '207', '105', '163049008026959.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1061, 'OPG Images', 'patient', '207', '105', '163049008026963.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1062, 'OPG Images', 'patient', '207', '105', '163049008038213.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1063, 'OPG Images', 'patient', '207', '105', '163049008038231.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1064, 'Treatment Plan', 'patient', '208', '105', '1630490080167316.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1065, 'Treatment Plan', 'patient', '208', '105', '1630490080195924.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1066, 'Treatment Plan', 'patient', '208', '105', '1630490080257005.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1067, 'Treatment Plan', 'patient', '208', '105', '1630490080257304.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1068, 'Treatment Plan', 'patient', '208', '105', '1630490080274376.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1069, 'IPR', 'patient', '209', '105', '163049008026956.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1070, 'IPR', 'patient', '209', '105', '163049008026959.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1071, 'IPR', 'patient', '209', '105', '163049008026963.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1072, 'IPR', 'patient', '209', '105', '163049008038213.jpg', '1', '2021-09-01 09:54:40', 'Pending'),
(1073, 'IPR', 'patient', '209', '105', '163049008038231.jpg', '1', '2021-09-01 09:54:40', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `refer_doctor`
--

CREATE TABLE `refer_doctor` (
  `ref_id` int(11) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `cur_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refer_doctor`
--

INSERT INTO `refer_doctor` (`ref_id`, `doctor_name`, `cur_date`) VALUES
(1, 'Mr. Dharmendra', ''),
(2, 'Mr. Jitendra', ''),
(3, 'Mr. Sachin', ''),
(4, 'Mr. Anmmol Arora', ''),
(5, 'Dr. Vishavdeep', ''),
(6, 'Mr. Vipin Narayan', ''),
(7, 'Dr. Nuaman', ''),
(8, 'Mr. Ram Kumar', ''),
(9, 'Mr. Siva Subromaniam', ''),
(10, 'Mr. Parful', ''),
(11, 'Dr. Faisal', ''),
(12, 'Dr. Adnan', ''),
(13, 'Mr. Sandip', '');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_history`
--

CREATE TABLE `rejected_history` (
  `rej_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cur_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejected_history`
--

INSERT INTO `rejected_history` (`rej_id`, `user_id`, `cur_date`) VALUES
(1, 88, '2021-08-06 02:46:26pm'),
(2, 89, '2021-08-06 02:47:44pm'),
(3, 94, '2021-08-06 09:45:59pm'),
(4, 95, '2021-08-08 12:11:07pm'),
(5, 95, '2021-08-15 04:36:50am'),
(6, 95, '2021-08-15 12:19:33pm'),
(7, 97, '2021-08-21 05:20:43pm'),
(8, 99, '2021-08-21 05:20:48pm'),
(9, 97, '2021-08-21 06:49:26pm'),
(10, 144, '2021-08-24 10:26:47pm'),
(11, 145, '2021-08-25 12:05:18pm'),
(12, 144, '2021-08-25 12:16:01pm'),
(13, 97, '2021-08-25 12:19:13pm'),
(14, 95, '2021-08-25 12:20:52pm'),
(15, 145, '2021-08-25 12:21:33pm'),
(16, 144, '2021-08-25 12:21:38pm'),
(17, 97, '2021-08-25 12:22:09pm'),
(18, 95, '2021-08-25 12:23:12pm'),
(19, 145, '2021-08-25 12:23:58pm'),
(20, 144, '2021-08-25 12:24:40pm'),
(21, 97, '2021-08-25 12:24:51pm'),
(22, 95, '2021-08-25 12:25:02pm'),
(23, 145, '2021-08-25 12:26:19pm'),
(24, 144, '2021-08-25 12:26:45pm'),
(25, 95, '2021-08-25 12:28:56pm'),
(26, 147, '2021-08-25 04:26:27pm'),
(27, 169, '2021-08-27 01:14:02am'),
(28, 174, '2021-08-28 01:19:26pm'),
(29, 185, '2021-08-30 09:04:25pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_log`
--

CREATE TABLE `tbl_login_log` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `login_date` datetime NOT NULL,
  `login_agent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login_log`
--

INSERT INTO `tbl_login_log` (`login_id`, `user_id`, `ip_address`, `login_date`, `login_agent`) VALUES
(1, 1, '::1', '2021-07-02 18:27:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(2, 1, '::1', '2021-07-02 18:47:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(3, 1, '::1', '2021-07-03 09:51:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(4, 1, '::1', '2021-07-03 10:00:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(5, 1, '::1', '2021-07-03 14:00:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(6, 1, '::1', '2021-07-04 00:09:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(7, 1, '::1', '2021-07-04 20:49:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(8, 1, '::1', '2021-07-04 21:01:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(9, 1, '::1', '2021-07-04 22:20:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(10, 1, '::1', '2021-07-04 22:29:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(11, 1, '::1', '2021-07-05 14:52:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(12, 1, '::1', '2021-07-05 15:21:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(13, 1, '::1', '2021-07-05 16:11:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(14, 1, '::1', '2021-07-05 19:15:58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(15, 1, '::1', '2021-07-06 17:48:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(16, 1, '::1', '2021-07-06 17:53:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(17, 1, '::1', '2021-07-07 12:50:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(18, 1, '::1', '2021-07-07 18:46:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(19, 1, '::1', '2021-07-07 18:50:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(20, 1, '::1', '2021-07-10 14:22:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(21, 1, '::1', '2021-07-12 14:55:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(22, 73, '::1', '2021-07-12 15:21:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(23, 73, '::1', '2021-07-12 15:22:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(24, 73, '::1', '2021-07-12 15:28:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(25, 1, '::1', '2021-07-12 19:59:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(26, 1, '::1', '2021-07-12 20:02:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(27, 1, '::1', '2021-07-12 20:28:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(28, 1, '::1', '2021-07-13 13:23:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(29, 1, '::1', '2021-07-13 14:43:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(30, 1, '::1', '2021-07-13 15:50:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(31, 1, '::1', '2021-07-13 18:24:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(32, 73, '::1', '2021-07-13 18:34:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(33, 1, '::1', '2021-07-13 18:36:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(34, 1, '::1', '2021-07-14 12:01:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(35, 1, '::1', '2021-07-15 15:11:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(36, 1, '::1', '2021-07-15 15:14:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(37, 1, '::1', '2021-07-15 19:00:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
(38, 1, '::1', '2021-07-16 15:32:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(39, 1, '::1', '2021-07-16 18:27:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(40, 1, '::1', '2021-07-17 09:25:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(41, 1, '::1', '2021-07-20 07:50:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(42, 73, '::1', '2021-07-20 07:56:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(43, 73, '::1', '2021-07-20 07:56:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(44, 73, '::1', '2021-07-20 08:28:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(45, 1, '::1', '2021-07-27 13:48:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(46, 1, '::1', '2021-07-27 14:02:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(47, 1, '::1', '2021-07-27 14:04:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(48, 1, '::1', '2021-07-27 14:07:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(49, 1, '::1', '2021-07-27 14:07:58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(50, 73, '::1', '2021-07-27 15:49:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(51, 1, '::1', '2021-07-27 15:57:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(52, 73, '::1', '2021-07-27 17:15:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(53, 1, '::1', '2021-07-27 17:40:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(54, 1, '39.37.162.255', '2021-07-27 17:28:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(55, 1, '49.36.120.138', '2021-07-27 17:29:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(56, 73, '111.119.185.35', '2021-07-27 17:39:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(57, 1, '111.119.185.35', '2021-07-27 17:39:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(58, 1, '49.36.120.138', '2021-07-27 17:49:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36'),
(59, 1, '49.36.120.138', '2021-07-27 21:52:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(60, 1, '111.119.187.44', '2021-07-28 13:28:56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(61, 1, '39.37.162.255', '2021-07-28 13:51:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55'),
(62, 1, '39.37.162.255', '2021-07-28 15:45:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55'),
(63, 1, '119.155.27.157', '2021-07-29 14:40:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.55'),
(64, 1, '49.36.120.138', '2021-07-29 18:13:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(65, 73, '49.36.120.138', '2021-07-29 18:52:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(66, 1, '49.36.120.138', '2021-07-29 18:59:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(67, 1, '49.36.120.138', '2021-08-01 14:23:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(68, 1, '119.155.27.157', '2021-08-03 11:21:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(69, 1, '49.36.120.138', '2021-08-03 17:56:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(70, 73, '49.36.120.138', '2021-08-03 17:58:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(71, 1, '49.36.120.138', '2021-08-03 18:20:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(72, 73, '49.36.120.138', '2021-08-03 18:20:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(73, 1, '119.155.27.157', '2021-08-04 12:45:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(74, 1, '119.155.27.157', '2021-08-04 13:01:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.62'),
(75, 1, '119.155.27.157', '2021-08-04 13:11:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36 Edg/92.0.902.62'),
(76, 1, '49.36.120.138', '2021-08-04 15:26:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(77, 1, '49.36.120.138', '2021-08-04 15:28:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(78, 73, '49.36.120.138', '2021-08-04 15:29:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(79, 1, '49.36.120.138', '2021-08-04 20:31:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36'),
(80, 1, '49.36.120.138', '2021-08-05 10:01:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(81, 1, '119.155.27.157', '2021-08-05 16:19:49', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(82, 1, '49.36.120.138', '2021-08-05 19:00:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(83, 1, '49.36.120.138', '2021-08-05 19:07:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(84, 73, '49.36.120.138', '2021-08-05 19:08:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(85, 1, '49.36.120.138', '2021-08-05 19:33:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(86, 1, '49.36.120.138', '2021-08-05 19:40:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(87, 73, '49.36.120.138', '2021-08-05 19:52:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(88, 1, '49.36.120.138', '2021-08-05 19:58:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(89, 73, '49.36.120.138', '2021-08-05 20:02:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(90, 1, '49.36.120.138', '2021-08-05 20:02:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(91, 1, '49.36.120.138', '2021-08-06 10:03:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(92, 1, '119.155.27.157', '2021-08-06 10:32:20', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(93, 1, '119.155.27.157', '2021-08-06 12:21:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 Edg/92.0.902.67'),
(94, 1, '119.155.27.157', '2021-08-06 13:07:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(95, 1, '119.155.27.157', '2021-08-06 13:07:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(96, 1, '119.155.27.157', '2021-08-06 13:23:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(97, 1, '49.36.120.138', '2021-08-06 13:26:29', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(98, 1, '49.36.120.138', '2021-08-06 13:34:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(99, 1, '119.155.27.157', '2021-08-06 13:46:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(100, 1, '119.155.27.157', '2021-08-06 14:27:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(101, 1, '49.36.120.138', '2021-08-06 20:21:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(102, 1, '49.36.120.138', '2021-08-06 20:24:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(103, 92, '49.36.120.138', '2021-08-06 20:25:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(104, 1, '49.36.120.138', '2021-08-06 20:33:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(105, 93, '49.36.120.138', '2021-08-06 20:34:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(106, 1, '49.36.120.138', '2021-08-06 20:38:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(107, 92, '49.36.120.138', '2021-08-06 21:12:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(108, 1, '49.36.120.138', '2021-08-06 21:14:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(109, 1, '49.36.120.138', '2021-08-06 21:38:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(110, 1, '49.36.120.138', '2021-08-06 21:44:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(111, 1, '49.36.120.138', '2021-08-06 22:24:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(112, 92, '49.36.120.138', '2021-08-06 22:24:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(113, 1, '49.36.120.138', '2021-08-06 22:37:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(114, 1, '49.36.120.138', '2021-08-08 11:08:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(115, 92, '49.36.120.138', '2021-08-08 11:08:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(116, 1, '49.36.120.138', '2021-08-08 11:36:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(117, 1, '49.36.120.138', '2021-08-08 12:09:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(118, 92, '49.36.120.138', '2021-08-08 12:29:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(119, 1, '45.119.30.12', '2021-08-08 17:56:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(120, 1, '49.36.120.138', '2021-08-08 22:25:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(121, 1, '49.36.120.138', '2021-08-10 06:32:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(122, 92, '49.36.120.138', '2021-08-10 06:34:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(123, 1, '49.36.120.138', '2021-08-10 06:49:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(124, 1, '49.36.120.138', '2021-08-10 10:56:58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(125, 1, '119.155.27.157', '2021-08-10 16:33:10', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(126, 1, '49.36.120.138', '2021-08-10 20:43:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(127, 92, '49.36.120.138', '2021-08-10 20:43:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(128, 92, '49.36.120.138', '2021-08-10 20:49:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(129, 1, '49.36.120.138', '2021-08-11 23:29:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(130, 92, '49.36.120.138', '2021-08-11 23:30:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(131, 1, '49.36.120.138', '2021-08-12 11:31:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(132, 92, '49.36.120.138', '2021-08-12 11:32:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(133, 1, '49.36.120.138', '2021-08-13 07:47:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(134, 1, '49.36.120.138', '2021-08-14 00:28:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(135, 92, '49.36.120.138', '2021-08-14 00:29:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(136, 1, '49.36.120.138', '2021-08-14 09:27:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(137, 1, '49.36.120.138', '2021-08-14 09:29:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(138, 1, '49.36.120.138', '2021-08-14 09:31:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(139, 1, '49.36.120.138', '2021-08-14 20:36:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(140, 92, '49.36.120.138', '2021-08-14 20:39:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(141, 92, '49.36.120.138', '2021-08-14 20:41:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(142, 1, '49.36.120.138', '2021-08-14 20:44:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(143, 92, '49.36.120.138', '2021-08-14 20:45:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(144, 1, '49.36.120.138', '2021-08-14 20:50:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(145, 1, '49.36.120.138', '2021-08-15 04:36:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(146, 92, '49.36.120.138', '2021-08-15 04:45:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(147, 1, '49.36.120.138', '2021-08-15 04:46:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(148, 1, '49.36.120.138', '2021-08-15 06:07:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(149, 1, '49.36.120.138', '2021-08-15 12:15:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(150, 1, '119.155.46.134', '2021-08-16 17:59:33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(151, 1, '49.36.120.138', '2021-08-16 18:37:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(152, 92, '49.36.120.138', '2021-08-16 18:39:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(153, 1, '49.36.120.138', '2021-08-16 20:04:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(154, 1, '49.36.120.138', '2021-08-17 14:35:12', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(155, 92, '49.36.120.138', '2021-08-17 14:38:15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36'),
(156, 1, '119.155.27.188', '2021-08-17 14:51:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 OPR/78.0.4093.147'),
(157, 1, '49.36.120.138', '2021-08-17 14:53:03', 'Mozilla/5.0 (Linux; Android 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.88 Mobile Safari/537.36'),
(158, 1, '119.155.27.188', '2021-08-17 14:56:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(159, 92, '49.36.120.138', '2021-08-17 14:57:26', 'Mozilla/5.0 (Linux; Android 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.88 Mobile Safari/537.36'),
(160, 1, '119.155.27.188', '2021-08-17 15:31:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(161, 90, '119.155.27.188', '2021-08-17 15:34:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(162, 1, '119.155.27.188', '2021-08-17 15:40:46', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(163, 1, '119.155.27.188', '2021-08-17 16:29:50', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(164, 1, '111.119.187.56', '2021-08-17 16:36:49', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36'),
(165, 1, '111.119.187.56', '2021-08-17 16:41:52', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(166, 90, '111.119.187.56', '2021-08-17 16:43:04', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36'),
(167, 1, '111.119.187.56', '2021-08-17 16:48:40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1'),
(168, 92, '49.36.120.138', '2021-08-17 16:50:36', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(169, 1, '49.36.120.138', '2021-08-17 16:51:16', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(170, 1, '49.36.120.138', '2021-08-17 16:55:15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36'),
(171, 1, '49.36.120.138', '2021-08-17 17:02:52', 'Mozilla/5.0 (Android 10; Mobile; rv:91.0) Gecko/91.0 Firefox/91.0'),
(172, 1, '49.36.120.138', '2021-08-17 17:13:33', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.116 Mobile Safari/537.36 EdgA/46.06.4.5161'),
(173, 92, '49.36.120.138', '2021-08-17 17:33:14', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.116 Mobile Safari/537.36 EdgA/46.06.4.5161'),
(174, 1, '49.36.120.138', '2021-08-17 17:41:45', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Mobile Safari/537.36 OPR/64.2.3282.60128'),
(175, 1, '49.36.120.138', '2021-08-18 01:29:44', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36'),
(176, 1, '49.36.120.138', '2021-08-18 01:31:10', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Mobile Safari/537.36 OPR/64.2.3282.60128'),
(177, 92, '49.36.120.138', '2021-08-18 01:34:52', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Mobile Safari/537.36 OPR/64.2.3282.60128'),
(178, 1, '49.36.120.138', '2021-08-18 01:49:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(179, 92, '49.36.120.138', '2021-08-18 02:02:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(180, 1, '119.156.69.181', '2021-08-18 13:42:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(181, 96, '119.156.69.181', '2021-08-18 13:47:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(182, 1, '49.36.120.138', '2021-08-18 14:41:37', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(183, 92, '49.36.120.138', '2021-08-18 14:43:12', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(184, 1, '49.36.120.138', '2021-08-18 14:44:15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36'),
(185, 1, '49.36.120.138', '2021-08-18 19:47:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(186, 92, '49.36.120.138', '2021-08-18 20:00:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(187, 1, '119.156.69.181', '2021-08-18 20:49:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(188, 96, '119.156.69.181', '2021-08-18 20:51:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(189, 1, '49.36.120.138', '2021-08-18 20:59:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(190, 1, '49.36.120.138', '2021-08-18 21:02:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(191, 1, '49.36.120.138', '2021-08-18 21:02:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(192, 1, '49.36.113.128', '2021-08-19 14:21:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(193, 97, '49.36.113.128', '2021-08-19 14:22:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(194, 1, '49.36.113.128', '2021-08-19 14:41:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(195, 97, '49.36.113.128', '2021-08-19 14:47:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(196, 1, '49.36.120.138', '2021-08-19 17:16:20', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(197, 1, '49.36.120.138', '2021-08-20 04:03:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(198, 92, '49.36.120.138', '2021-08-20 04:40:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(199, 1, '49.36.120.138', '2021-08-20 05:52:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(200, 1, '119.160.103.131', '2021-08-20 06:11:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(201, 92, '49.36.120.138', '2021-08-20 06:18:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(202, 1, '49.36.120.138', '2021-08-20 06:27:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(203, 1, '49.36.120.138', '2021-08-20 06:40:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(204, 92, '49.36.120.138', '2021-08-20 06:42:58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(205, 1, '202.165.224.30', '2021-08-20 06:57:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(206, 92, '202.165.224.30', '2021-08-20 06:57:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(207, 92, '119.160.103.131', '2021-08-20 07:45:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(208, 92, '49.36.120.138', '2021-08-20 08:59:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(209, 1, '49.36.120.138', '2021-08-20 09:01:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(210, 92, '49.36.120.138', '2021-08-20 09:01:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(211, 92, '49.36.120.138', '2021-08-20 09:12:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(212, 1, '49.36.120.138', '2021-08-20 09:15:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(213, 92, '49.36.120.138', '2021-08-20 09:19:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(214, 97, '49.36.120.138', '2021-08-20 09:20:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(215, 97, '49.36.120.138', '2021-08-20 09:23:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(216, 1, '49.36.120.138', '2021-08-20 09:24:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(217, 97, '49.36.120.138', '2021-08-20 09:25:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(218, 1, '49.36.120.138', '2021-08-20 09:25:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(219, 97, '49.36.120.138', '2021-08-20 09:28:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(220, 92, '119.160.103.131', '2021-08-20 09:39:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(221, 1, '49.36.120.138', '2021-08-20 09:44:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(222, 1, '202.166.169.163', '2021-08-20 09:47:59', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(223, 1, '49.36.120.138', '2021-08-20 09:48:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(224, 92, '49.36.120.138', '2021-08-20 09:48:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(225, 1, '49.36.120.138', '2021-08-20 09:55:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(226, 92, '49.36.120.138', '2021-08-20 10:09:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(227, 96, '202.166.169.163', '2021-08-20 10:59:26', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(228, 1, '49.36.120.138', '2021-08-20 11:21:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(229, 92, '49.36.120.138', '2021-08-20 11:22:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(230, 1, '111.119.187.18', '2021-08-20 11:24:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(231, 1, '111.119.187.18', '2021-08-20 11:24:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(232, 1, '111.119.187.18', '2021-08-20 11:34:39', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1'),
(233, 96, '111.119.187.18', '2021-08-20 11:41:04', 'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1'),
(234, 1, '202.166.169.163', '2021-08-20 11:59:39', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36'),
(235, 1, '202.166.169.163', '2021-08-20 12:03:07', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36'),
(236, 1, '202.166.169.163', '2021-08-20 12:06:42', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36'),
(237, 92, '49.36.120.138', '2021-08-20 12:08:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(238, 1, '49.36.120.138', '2021-08-20 12:09:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(239, 92, '49.36.120.138', '2021-08-20 12:22:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(240, 1, '49.36.120.138', '2021-08-20 12:25:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(241, 1, '202.166.169.163', '2021-08-20 12:55:48', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(242, 1, '202.166.169.163', '2021-08-20 13:02:31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(243, 1, '202.166.169.163', '2021-08-20 13:02:37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(244, 1, '49.36.120.138', '2021-08-20 13:08:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(245, 92, '49.36.120.138', '2021-08-20 13:17:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(246, 1, '202.166.169.163', '2021-08-20 14:20:56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(247, 1, '202.166.169.163', '2021-08-20 14:22:17', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36'),
(248, 1, '111.119.187.18', '2021-08-20 15:08:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(249, 1, '111.119.187.18', '2021-08-20 15:53:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 Edg/92.0.902.73'),
(250, 1, '119.160.58.58', '2021-08-20 15:57:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(251, 1, '119.160.58.58', '2021-08-20 16:14:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(252, 1, '49.36.120.138', '2021-08-20 16:46:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(253, 1, '49.36.120.138', '2021-08-20 16:49:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(254, 92, '49.36.120.138', '2021-08-20 16:49:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(255, 1, '49.36.120.138', '2021-08-20 17:01:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(256, 1, '202.166.169.163', '2021-08-20 17:08:15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(257, 1, '49.36.120.138', '2021-08-20 17:14:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(258, 92, '49.36.120.138', '2021-08-20 17:16:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(259, 1, '49.36.120.138', '2021-08-20 19:05:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'),
(260, 1, '119.156.74.123', '2021-08-20 19:34:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(261, 1, '72.255.51.209', '2021-08-20 19:47:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(262, 1, '49.36.120.138', '2021-08-20 21:07:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'),
(263, 92, '49.36.120.138', '2021-08-20 21:08:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'),
(264, 1, '49.36.120.138', '2021-08-20 21:08:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'),
(265, 92, '49.36.120.138', '2021-08-20 21:28:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'),
(266, 1, '49.36.120.138', '2021-08-20 21:57:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'),
(267, 1, '1.38.148.214', '2021-08-21 07:35:09', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(268, 1, '119.160.103.21', '2021-08-21 09:11:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(269, 1, '49.36.120.162', '2021-08-21 09:18:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(270, 92, '49.36.120.162', '2021-08-21 09:36:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(271, 1, '49.36.120.162', '2021-08-21 09:36:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(272, 92, '49.36.120.162', '2021-08-21 09:37:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(273, 1, '49.36.120.162', '2021-08-21 09:38:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(274, 92, '49.36.120.162', '2021-08-21 09:41:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(275, 1, '72.255.51.209', '2021-08-21 10:12:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(276, 1, '49.36.120.162', '2021-08-21 10:52:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(277, 92, '49.36.120.162', '2021-08-21 10:52:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(278, 1, '49.36.120.162', '2021-08-21 12:45:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(279, 92, '49.36.120.162', '2021-08-21 13:00:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(280, 1, '49.36.120.162', '2021-08-21 15:12:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(281, 1, '49.36.120.162', '2021-08-21 15:43:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(282, 1, '49.36.120.162', '2021-08-21 16:05:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(283, 1, '49.36.120.162', '2021-08-21 16:11:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(284, 1, '103.25.250.225', '2021-08-21 16:36:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(285, 1, '37.111.139.232', '2021-08-21 17:13:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(286, 1, '49.36.120.162', '2021-08-21 17:21:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(287, 1, '72.255.51.209', '2021-08-21 17:31:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(288, 1, '103.25.250.225', '2021-08-21 18:44:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(289, 1, '49.36.120.162', '2021-08-21 19:35:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(290, 1, '39.42.142.200', '2021-08-21 19:44:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(291, 1, '49.36.120.162', '2021-08-21 19:48:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(292, 1, '49.36.120.162', '2021-08-21 20:16:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(293, 1, '119.160.58.188', '2021-08-21 20:39:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36'),
(294, 1, '49.36.120.162', '2021-08-21 20:41:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(295, 92, '49.36.120.162', '2021-08-21 20:42:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(296, 1, '49.36.120.162', '2021-08-21 20:43:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(297, 1, '49.36.120.162', '2021-08-21 20:44:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(298, 92, '49.36.120.162', '2021-08-21 20:45:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(299, 1, '49.36.120.162', '2021-08-21 20:46:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(300, 1, '49.36.120.162', '2021-08-21 20:53:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(301, 1, '1.38.149.108', '2021-08-21 21:36:58', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36');
INSERT INTO `tbl_login_log` (`login_id`, `user_id`, `ip_address`, `login_date`, `login_agent`) VALUES
(302, 92, '49.36.120.162', '2021-08-21 21:42:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(303, 1, '49.36.120.162', '2021-08-21 22:22:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(304, 1, '49.36.120.162', '2021-08-21 22:24:27', 'Mozilla/5.0 (Linux; Android 10; SM-A105F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.99 Mobile Safari/537.36'),
(305, 92, '49.36.120.162', '2021-08-21 22:25:03', 'Mozilla/5.0 (Linux; Android 10; SM-A105F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.99 Mobile Safari/537.36'),
(306, 1, '119.160.58.188', '2021-08-21 22:58:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36'),
(307, 1, '49.36.120.162', '2021-08-22 00:16:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(308, 1, '37.111.238.56', '2021-08-22 01:19:14', 'Mozilla/5.0 (Linux; Android 10; V2027) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Mobile Safari/537.36'),
(309, 1, '103.105.54.183', '2021-08-22 01:44:00', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Safari/605.1.15'),
(310, 1, '72.255.51.209', '2021-08-22 05:43:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(311, 1, '49.36.120.162', '2021-08-22 06:54:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(312, 92, '49.36.120.162', '2021-08-22 07:04:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(313, 1, '49.36.120.162', '2021-08-22 07:18:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(314, 1, '49.36.120.162', '2021-08-22 07:54:40', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(315, 1, '49.36.120.162', '2021-08-22 08:32:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(316, 1, '49.36.120.162', '2021-08-22 08:34:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 Edg/92.0.902.78'),
(317, 1, '162.210.194.38', '2021-08-22 08:43:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(318, 1, '72.255.51.209', '2021-08-22 09:10:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(319, 92, '49.36.120.162', '2021-08-22 09:31:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(320, 1, '49.36.120.162', '2021-08-22 09:31:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(321, 1, '43.245.123.57', '2021-08-22 09:53:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(322, 92, '72.255.51.209', '2021-08-22 09:55:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(323, 92, '43.245.123.57', '2021-08-22 09:55:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(324, 1, '43.245.123.57', '2021-08-22 09:55:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(325, 92, '49.36.120.162', '2021-08-22 10:02:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(326, 92, '49.36.120.162', '2021-08-22 10:03:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(327, 1, '49.36.120.162', '2021-08-22 10:04:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(328, 1, '49.36.120.162', '2021-08-22 10:06:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(329, 101, '49.36.120.162', '2021-08-22 10:06:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(330, 1, '39.42.142.200', '2021-08-22 10:13:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(331, 92, '39.42.142.200', '2021-08-22 10:14:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(332, 1, '39.42.142.200', '2021-08-22 10:15:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(333, 1, '39.42.142.200', '2021-08-22 10:17:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(334, 92, '72.255.51.209', '2021-08-22 11:31:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(335, 92, '49.36.120.162', '2021-08-22 12:03:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(336, 1, '119.160.100.103', '2021-08-22 12:14:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(337, 1, '49.36.120.162', '2021-08-22 12:14:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(338, 92, '49.36.120.162', '2021-08-22 12:14:58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 Edg/92.0.902.78'),
(339, 92, '119.160.100.103', '2021-08-22 12:23:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(340, 1, '72.255.51.209', '2021-08-22 15:41:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(341, 92, '49.36.120.162', '2021-08-22 15:59:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(342, 1, '49.36.120.162', '2021-08-22 16:00:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(343, 92, '1.38.148.79', '2021-08-22 16:40:57', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(344, 1, '49.36.120.162', '2021-08-22 16:46:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(345, 1, '39.42.142.200', '2021-08-22 16:58:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(346, 105, '49.36.120.162', '2021-08-22 17:27:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(347, 1, '39.42.142.200', '2021-08-22 17:48:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(348, 107, '49.36.120.162', '2021-08-22 17:51:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(349, 107, '49.36.120.162', '2021-08-22 17:55:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(350, 107, '49.36.120.162', '2021-08-22 17:56:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(351, 1, '49.36.120.162', '2021-08-22 17:57:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(352, 107, '49.36.120.162', '2021-08-22 18:26:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(353, 107, '72.255.51.209', '2021-08-22 18:26:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(354, 1, '49.36.120.162', '2021-08-22 18:31:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(355, 92, '72.255.51.209', '2021-08-22 18:33:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(356, 107, '72.255.51.209', '2021-08-22 18:34:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(357, 107, '49.36.120.162', '2021-08-22 18:41:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(358, 107, '49.36.120.162', '2021-08-22 19:08:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(359, 1, '49.36.120.162', '2021-08-22 19:09:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(360, 1, '49.36.120.162', '2021-08-22 19:42:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(361, 92, '49.36.120.162', '2021-08-22 20:21:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(362, 1, '49.36.120.162', '2021-08-22 21:49:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(363, 107, '49.36.120.162', '2021-08-22 22:18:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(364, 1, '49.36.120.162', '2021-08-22 22:19:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(365, 1, '49.36.120.162', '2021-08-23 04:39:54', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(366, 92, '49.36.120.162', '2021-08-23 04:42:13', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(367, 92, '49.36.120.162', '2021-08-23 04:43:33', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(368, 1, '49.36.120.162', '2021-08-23 04:58:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(369, 1, '206.84.141.134', '2021-08-23 05:05:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(370, 1, '72.255.51.209', '2021-08-23 05:18:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(371, 92, '49.36.120.162', '2021-08-23 05:47:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(372, 1, '49.36.120.162', '2021-08-23 07:42:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(373, 1, '49.36.120.162', '2021-08-23 08:38:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(374, 122, '49.36.120.162', '2021-08-23 08:43:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(375, 1, '49.36.120.162', '2021-08-23 08:47:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(376, 1, '119.152.49.129', '2021-08-23 10:20:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(377, 1, '58.65.222.73', '2021-08-23 13:06:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(378, 1, '119.152.49.129', '2021-08-23 13:26:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(379, 1, '49.36.120.162', '2021-08-23 13:55:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(380, 1, '119.160.101.106', '2021-08-23 14:46:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(381, 92, '119.160.101.106', '2021-08-23 14:47:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(382, 1, '49.36.120.162', '2021-08-23 14:55:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(383, 92, '49.36.120.162', '2021-08-23 15:41:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(384, 1, '39.42.142.200', '2021-08-23 16:40:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(385, 1, '72.255.51.209', '2021-08-23 17:10:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(386, 92, '39.42.142.200', '2021-08-23 22:01:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(387, 1, '49.36.120.162', '2021-08-24 05:58:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(388, 92, '49.36.120.162', '2021-08-24 06:17:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(389, 1, '49.36.120.162', '2021-08-24 06:26:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(390, 1, '154.192.234.54', '2021-08-24 07:18:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(391, 1, '154.192.234.54', '2021-08-24 07:27:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(392, 92, '58.65.222.73', '2021-08-24 10:35:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(393, 107, '154.192.234.54', '2021-08-24 11:16:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(394, 138, '154.192.234.54', '2021-08-24 11:21:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(395, 1, '154.192.234.54', '2021-08-24 11:24:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(396, 138, '154.192.234.54', '2021-08-24 11:51:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(397, 92, '49.36.120.162', '2021-08-24 13:11:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(398, 1, '39.42.142.200', '2021-08-24 16:18:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(399, 92, '39.42.142.200', '2021-08-24 16:28:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(400, 1, '39.42.142.200', '2021-08-24 16:43:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(401, 1, '49.36.120.162', '2021-08-24 17:00:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(402, 1, '49.36.120.162', '2021-08-24 17:07:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(403, 1, '49.36.120.162', '2021-08-24 17:09:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 Edg/92.0.902.78'),
(404, 1, '39.42.142.200', '2021-08-24 17:13:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(405, 92, '39.42.142.200', '2021-08-24 17:14:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(406, 1, '39.42.142.200', '2021-08-24 17:27:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(407, 92, '39.42.142.200', '2021-08-24 17:47:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(408, 1, '49.36.120.162', '2021-08-24 18:08:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(409, 92, '49.36.120.162', '2021-08-24 18:49:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(410, 1, '39.42.142.200', '2021-08-24 19:23:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(411, 92, '39.42.142.200', '2021-08-24 19:37:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(412, 1, '39.42.142.200', '2021-08-24 19:42:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(413, 1, '49.36.120.162', '2021-08-24 22:19:09', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Mobile Safari/537.36 Edg/92.0.902.78'),
(414, 1, '49.36.120.162', '2021-08-24 22:21:40', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Mobile Safari/537.36'),
(415, 1, '49.36.120.162', '2021-08-24 22:23:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(416, 1, '49.36.120.162', '2021-08-24 22:24:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(417, 1, '49.36.120.162', '2021-08-24 22:25:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(418, 1, '49.36.113.135', '2021-08-25 05:11:11', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36'),
(419, 1, '49.36.120.162', '2021-08-25 06:39:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(420, 1, '49.36.120.162', '2021-08-25 07:40:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(421, 92, '49.36.120.162', '2021-08-25 07:52:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(422, 1, '119.152.50.76', '2021-08-25 07:54:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(423, 1, '49.36.120.162', '2021-08-25 09:12:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(424, 1, '49.36.120.162', '2021-08-25 10:24:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(425, 1, '119.152.50.76', '2021-08-25 11:38:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(426, 1, '58.65.222.73', '2021-08-25 11:55:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(427, 1, '49.36.120.162', '2021-08-25 12:00:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(428, 144, '49.36.120.162', '2021-08-25 15:35:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(429, 144, '49.36.120.162', '2021-08-25 15:41:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(430, 144, '49.36.120.162', '2021-08-25 15:42:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(431, 144, '49.36.120.162', '2021-08-25 16:10:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(432, 1, '72.255.51.209', '2021-08-25 16:16:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(433, 1, '1.38.141.187', '2021-08-25 16:17:01', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
(434, 1, '49.36.120.162', '2021-08-25 16:24:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(435, 1, '119.160.103.214', '2021-08-25 17:22:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'),
(436, 144, '49.36.120.162', '2021-08-25 17:23:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(437, 1, '39.42.142.200', '2021-08-25 17:32:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(438, 151, '49.36.120.162', '2021-08-25 17:53:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(439, 156, '49.36.120.162', '2021-08-25 18:03:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(440, 1, '49.36.120.162', '2021-08-25 18:31:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(441, 1, '39.42.142.200', '2021-08-25 18:34:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(442, 159, '39.42.142.200', '2021-08-25 18:35:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(443, 1, '49.36.120.162', '2021-08-25 18:38:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(444, 144, '49.36.120.162', '2021-08-25 18:46:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(445, 160, '49.36.120.162', '2021-08-25 18:57:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(446, 160, '39.42.142.200', '2021-08-25 18:58:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(447, 1, '1.38.141.187', '2021-08-25 19:16:28', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36'),
(448, 1, '49.36.120.162', '2021-08-25 19:47:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(449, 160, '49.36.120.162', '2021-08-25 19:47:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(450, 160, '49.36.120.162', '2021-08-25 20:01:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(451, 1, '1.38.141.187', '2021-08-25 20:05:45', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Mobile Safari/537.36 OPR/64.2.3282.60128'),
(452, 160, '1.38.141.187', '2021-08-25 20:06:06', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Mobile Safari/537.36 OPR/64.2.3282.60128'),
(453, 160, '1.38.141.187', '2021-08-25 20:07:01', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 OPR/64.2.3282.60128'),
(454, 160, '49.36.120.162', '2021-08-25 20:08:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 Edg/92.0.902.78'),
(455, 160, '49.36.120.162', '2021-08-25 20:09:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 OPR/78.0.4093.184'),
(456, 160, '49.36.120.162', '2021-08-25 20:12:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 OPR/78.0.4093.184'),
(457, 160, '23.106.249.37', '2021-08-25 20:12:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(458, 160, '23.106.249.34', '2021-08-25 21:33:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(459, 160, '39.42.142.200', '2021-08-25 21:35:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(460, 1, '72.255.51.209', '2021-08-26 04:10:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(461, 1, '49.36.120.162', '2021-08-26 06:43:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(462, 1, '111.119.187.54', '2021-08-26 07:05:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(463, 1, '111.119.187.54', '2021-08-26 07:28:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(464, 1, '36.255.100.218', '2021-08-26 07:44:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(465, 160, '49.36.120.162', '2021-08-26 08:10:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(466, 166, '49.36.120.162', '2021-08-26 08:13:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(467, 1, '36.255.100.218', '2021-08-26 09:47:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(468, 1, '36.255.100.218', '2021-08-26 09:49:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(469, 166, '36.255.100.218', '2021-08-26 10:58:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(470, 166, '36.255.100.218', '2021-08-26 11:25:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(471, 1, '49.36.120.162', '2021-08-26 11:38:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(472, 1, '49.36.120.162', '2021-08-26 11:39:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(473, 1, '49.36.120.162', '2021-08-26 11:39:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(474, 1, '36.255.100.218', '2021-08-26 12:10:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(475, 167, '36.255.100.218', '2021-08-26 13:32:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(476, 1, '49.36.120.162', '2021-08-26 17:42:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(477, 168, '49.36.120.162', '2021-08-26 17:58:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(478, 1, '72.255.51.209', '2021-08-26 18:13:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(479, 1, '49.36.120.162', '2021-08-27 00:58:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(480, 1, '49.36.120.162', '2021-08-27 01:07:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(481, 1, '154.192.234.192', '2021-08-27 04:57:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(482, 166, '154.192.234.192', '2021-08-27 05:41:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(483, 170, '154.192.234.192', '2021-08-27 07:53:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(484, 168, '154.192.234.192', '2021-08-27 08:09:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(485, 167, '154.192.234.192', '2021-08-27 08:17:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(486, 1, '72.255.51.209', '2021-08-27 08:55:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(487, 1, '49.36.120.162', '2021-08-27 09:25:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(488, 1, '49.36.120.162', '2021-08-27 09:28:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(489, 1, '49.36.120.162', '2021-08-27 09:45:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(490, 172, '49.36.120.162', '2021-08-27 09:47:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(491, 1, '49.36.120.162', '2021-08-27 10:16:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 OPR/78.0.4093.184'),
(492, 1, '49.36.120.162', '2021-08-27 10:17:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 Edg/92.0.902.78'),
(493, 171, '154.192.234.192', '2021-08-27 10:26:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(494, 171, '154.192.234.192', '2021-08-27 10:49:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(495, 1, '49.36.120.162', '2021-08-27 11:28:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(496, 1, '49.36.120.162', '2021-08-27 11:32:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(497, 1, '49.36.120.162', '2021-08-27 11:42:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(498, 1, '49.36.120.162', '2021-08-27 12:18:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(499, 97, '49.36.120.162', '2021-08-27 12:25:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(500, 173, '154.192.234.192', '2021-08-27 12:30:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(501, 1, '72.255.51.209', '2021-08-27 12:35:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(502, 1, '72.255.51.209', '2021-08-27 13:08:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(503, 1, '162.210.194.37', '2021-08-27 13:09:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0'),
(504, 1, '154.192.234.192', '2021-08-27 13:11:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0'),
(505, 1, '154.192.234.192', '2021-08-27 13:12:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(506, 173, '39.37.146.8', '2021-08-27 14:10:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0'),
(507, 173, '39.37.146.8', '2021-08-27 14:11:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0'),
(508, 1, '39.37.146.8', '2021-08-27 14:12:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0'),
(509, 173, '111.119.187.36', '2021-08-27 14:19:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0'),
(510, 1, '111.119.187.36', '2021-08-27 14:33:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0'),
(511, 1, '111.119.187.36', '2021-08-27 14:34:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 Edg/92.0.902.78'),
(512, 1, '111.119.187.36', '2021-08-27 14:36:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0'),
(513, 173, '111.119.187.36', '2021-08-27 14:37:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36 Edg/92.0.902.78'),
(514, 1, '49.36.120.162', '2021-08-28 09:39:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(515, 1, '49.36.120.162', '2021-08-28 13:09:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(516, 175, '49.36.120.162', '2021-08-28 17:12:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(517, 1, '72.255.51.209', '2021-08-28 18:09:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(518, 175, '72.255.51.209', '2021-08-28 18:15:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(519, 1, '49.36.120.162', '2021-08-29 00:21:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(520, 175, '49.36.120.162', '2021-08-29 00:31:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(521, 1, '72.255.51.209', '2021-08-29 02:31:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(522, 178, '72.255.51.209', '2021-08-29 03:53:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(523, 182, '72.255.51.209', '2021-08-29 06:20:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(524, 1, '72.255.51.209', '2021-08-29 06:25:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(525, 182, '72.255.51.209', '2021-08-29 06:28:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(526, 1, '49.36.120.162', '2021-08-29 12:50:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(527, 183, '49.36.120.162', '2021-08-29 12:54:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(528, 1, '72.255.51.209', '2021-08-29 14:13:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(529, 183, '72.255.51.209', '2021-08-29 14:13:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(530, 1, '49.36.120.162', '2021-08-29 23:45:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(531, 184, '49.36.120.162', '2021-08-29 23:52:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(532, 1, '49.36.120.162', '2021-08-30 03:24:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(533, 185, '49.36.120.162', '2021-08-30 03:28:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(534, 1, '72.255.51.209', '2021-08-30 03:34:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(535, 185, '72.255.51.209', '2021-08-30 03:40:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(536, 1, '119.152.49.176', '2021-08-30 04:47:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(537, 1, '49.36.120.162', '2021-08-30 15:56:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(538, 185, '49.36.120.162', '2021-08-30 18:31:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(539, 1, '49.36.120.162', '2021-08-30 18:42:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(540, 185, '72.255.51.209', '2021-08-30 19:53:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(541, 1, '49.36.120.162', '2021-08-30 20:59:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(542, 1, '49.36.120.162', '2021-08-31 15:34:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(543, 1, '154.192.234.4', '2021-09-01 05:52:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(544, 185, '154.192.234.4', '2021-09-01 08:29:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(545, 1, '154.192.234.4', '2021-09-01 08:36:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `tr_id` int(11) NOT NULL,
  `tr_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cur_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`tr_id`, `tr_name`, `status`, `cur_date`) VALUES
(1, 'Crowding', 1, ''),
(2, 'Spacing', 1, ''),
(3, 'Class || div 1', 1, ''),
(4, 'Class || div 2', 1, ''),
(5, 'Class |||', 1, ''),
(6, 'Open Bite', 1, ''),
(7, 'Anterior Crossbite', 1, ''),
(8, 'Posterior Crossbite', 1, ''),
(9, 'Deep bite', 1, ''),
(10, 'Narrow Arch', 1, ''),
(11, 'Flared Teeth', 1, ''),
(12, 'Overjet', 1, ''),
(13, 'Uneven Smile', 1, ''),
(14, 'Misshappen teeth', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_case`
--

CREATE TABLE `treatment_case` (
  `trcase_id` int(11) NOT NULL,
  `case_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cur_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_case`
--

INSERT INTO `treatment_case` (`trcase_id`, `case_name`, `status`, `cur_date`) VALUES
(1, 'Class 1', 1, ''),
(2, 'Class 2', 1, ''),
(3, 'Class 3', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `material_status` varchar(50) DEFAULT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `password_reset_token` varchar(200) DEFAULT NULL,
  `shipping_address` text,
  `billing_address` text,
  `payer_address` text,
  `address_one` text,
  `address_two` text,
  `address_three` text,
  `gst_no` varchar(50) DEFAULT NULL,
  `refer_by` varchar(100) DEFAULT NULL,
  `refer_text` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_type_id` tinyint(2) NOT NULL COMMENT '1=admin,2=doctor,3=patient',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=pending,1=accept,2=decline',
  `source` int(11) NOT NULL DEFAULT '0' COMMENT '0=web,1=app',
  `created` varchar(40) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `material_status`, `date_of_birth`, `phone_number`, `email`, `password`, `password_reset_token`, `shipping_address`, `billing_address`, `payer_address`, `address_one`, `address_two`, `address_three`, `gst_no`, `refer_by`, `refer_text`, `profile_image`, `user_type_id`, `is_active`, `source`, `created`, `updated`) VALUES
(1, 'admins', 'Admin', NULL, 'demo@gmail.com', 'english', 'demo@gmail.com', '05a8ea5382b9fd885261bb3eed0527d1d3b07262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1594994804Screenshot_2.png', 1, 1, 0, '2018-08-18', '2021-08-25 17:12:13'),
(185, 'Dr. Demo', 'demo', NULL, '', '1234567890', 'd@d.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, '602, Anand Bhuvan, gorewadi C.H.S, Mahim Mahim, Anand BHUVAN', '602, Anand Bhuvan, gorewadi C.H.S, Mahim Mahim, Anand BHUVAN', NULL, NULL, NULL, NULL, '04AABCU9603R1ZV', NULL, NULL, '1630294050.png', 2, 1, 0, '2021-08-30', '2021-09-01 05:52:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arc_treated`
--
ALTER TABLE `arc_treated`
  ADD PRIMARY KEY (`arc_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photos_id`);

--
-- Indexes for table `refer_doctor`
--
ALTER TABLE `refer_doctor`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `rejected_history`
--
ALTER TABLE `rejected_history`
  ADD PRIMARY KEY (`rej_id`);

--
-- Indexes for table `tbl_login_log`
--
ALTER TABLE `tbl_login_log`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `treatment_case`
--
ALTER TABLE `treatment_case`
  ADD PRIMARY KEY (`trcase_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arc_treated`
--
ALTER TABLE `arc_treated`
  MODIFY `arc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1074;

--
-- AUTO_INCREMENT for table `refer_doctor`
--
ALTER TABLE `refer_doctor`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rejected_history`
--
ALTER TABLE `rejected_history`
  MODIFY `rej_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_login_log`
--
ALTER TABLE `tbl_login_log`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=546;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `treatment_case`
--
ALTER TABLE `treatment_case`
  MODIFY `trcase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
