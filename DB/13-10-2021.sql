-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 03:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smilealigners`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_sex` varchar(16) NOT NULL,
  `patient_address` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `sub_option_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `answer` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(265) NOT NULL DEFAULT 'Order Received',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arc_treated`
--

CREATE TABLE `arc_treated` (
  `arc_id` int(11) NOT NULL,
  `arc_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `cur_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arc_treated`
--

INSERT INTO `arc_treated` (`arc_id`, `arc_name`, `status`, `cur_date`) VALUES
(1, 'Upper', 1, ''),
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
  `des` text DEFAULT NULL,
  `cur_date` varchar(60) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `unique_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '8215cdd43a9628f716ec934233e0d0fd', 'Dispatched', '2018-01-08 09:24:07', '0000-00-00 00:00:00'),
(2, '595b5033a5350f44ca345f198e4dbb16', 'Dispatched', '2018-01-08 09:25:05', '0000-00-00 00:00:00'),
(3, '8215cdd43a9628f716ec934233e0d0fd', 'Order Received', '2018-01-08 09:25:24', '0000-00-00 00:00:00'),
(4, '8215cdd43a9628f716ec934233e0d0fd', 'Processing', '2018-01-09 11:33:27', '0000-00-00 00:00:00'),
(5, '595b5033a5350f44ca345f198e4dbb16', 'Dispatched', '2018-01-10 12:10:56', '0000-00-00 00:00:00'),
(6, '595b5033a5350f44ca345f198e4dbb16', 'Delivered', '2018-01-10 12:11:38', '0000-00-00 00:00:00'),
(7, '595b5033a5350f44ca345f198e4dbb16', 'Processing', '2018-01-10 12:14:58', '0000-00-00 00:00:00'),
(8, '9f890bf60e4a46f7cf28b8085b65053c', 'Processing', '2018-01-29 11:05:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pt_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT 1,
  `pt_firstname` varchar(200) DEFAULT NULL,
  `pt_lastname` varchar(200) DEFAULT NULL,
  `pt_gender` varchar(20) DEFAULT NULL,
  `pt_email` varchar(100) DEFAULT NULL,
  `pt_age` int(11) DEFAULT NULL,
  `pt_img` varchar(200) DEFAULT NULL,
  `pt_scan_impression` varchar(30) DEFAULT NULL,
  `pt_objective` text DEFAULT NULL,
  `pt_referal` varchar(20) DEFAULT NULL,
  `type_of_treatment` varchar(200) DEFAULT NULL,
  `type_of_case` varchar(200) DEFAULT NULL,
  `arc_treated` varchar(100) DEFAULT NULL,
  `ipr_performed` varchar(50) DEFAULT NULL,
  `attachment_placed` varchar(100) DEFAULT NULL,
  `pt_treatment_plan` text DEFAULT NULL,
  `pt_approval` varchar(40) DEFAULT NULL,
  `pt_approval_date` varchar(60) DEFAULT NULL,
  `pt_custom_status` varchar(50) DEFAULT NULL,
  `pt_case_type` varchar(20) DEFAULT NULL,
  `pt_aligners` varchar(30) DEFAULT NULL,
  `pt_aligners_dispatch` varchar(50) DEFAULT NULL,
  `pt_cost_plan` varchar(30) DEFAULT '0',
  `pt_amount_paid` varchar(10) DEFAULT '0',
  `pt_shipping_details` text DEFAULT NULL,
  `pt_billing_address` text DEFAULT NULL,
  `pt_dispatch_date` varchar(70) DEFAULT NULL,
  `pt_status` varchar(20) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `cur_date` varchar(50) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pt_id`, `doctor_id`, `pt_firstname`, `pt_lastname`, `pt_gender`, `pt_email`, `pt_age`, `pt_img`, `pt_scan_impression`, `pt_objective`, `pt_referal`, `type_of_treatment`, `type_of_case`, `arc_treated`, `ipr_performed`, `attachment_placed`, `pt_treatment_plan`, `pt_approval`, `pt_approval_date`, `pt_custom_status`, `pt_case_type`, `pt_aligners`, `pt_aligners_dispatch`, `pt_cost_plan`, `pt_amount_paid`, `pt_shipping_details`, `pt_billing_address`, `pt_dispatch_date`, `pt_status`, `added_by`, `cur_date`, `status`) VALUES
(27, 269, 'Mr. Waqas', 'Ali', 'male', 'client@test.com', 23, '', NULL, '', '', NULL, NULL, NULL, '0', '0', '', '', '', '', '', '', '', '0', '0', '20', '588 Gabe Forge Apt. 569, kolkata, india', '', '1', 1, '2021-10-06', 'Pending'),
(28, 269, 'Mr. ABC', 'Patient', 'male', 'client@test.com', 23, '', NULL, '', '', NULL, NULL, NULL, '1', '1', '', '', '', '', '', '', '', '0', '0', '27', '588 Gabe Forge Apt. 569, kolkata, india', '', '1', 1, '2021-10-06', 'Pending'),
(29, 269, 'Mr. Ali', 'Patient', 'male', 'client@test.com', 23, '', NULL, '', '272', NULL, NULL, NULL, '1', '1', '', '', '', '', '', '', '', '0', '0', '11', '588 Gabe Forge Apt. 569, kolkata, india', '', '1', 1, '2021-10-06', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `photos_id` int(100) DEFAULT NULL,
  `invoice_no` int(100) DEFAULT NULL,
  `deposit_date` date DEFAULT NULL,
  `patient_id` int(100) NOT NULL,
  `deposit_amount` varchar(255) DEFAULT NULL,
  `deposit_type` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `amount_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `hint` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `hint`, `created_at`, `updated_at`) VALUES
(1, 'FASTER TIME', '', '2017-11-07 09:03:09', '2017-11-07 09:03:09'),
(2, 'TEETH NOT TO BE MOVED', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(3, 'ATTACHMENT TO BE AVOIDED', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(4, 'MIDLINES', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(5, 'OVERJET', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(6, 'OVERBITE', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(7, 'AP RELATION', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(8, 'REFERENCE FOR LEVELING OF TEETH', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(9, 'RESOLVE SPACING', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(10, 'RESOLVE CROWDING', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(11, 'POSTERIOR CROSS BITE', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(12, 'OVERCORRECTION', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53'),
(13, 'SPECIAL INSTRUCTIONS', '', '2017-11-07 09:06:53', '2017-11-07 09:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `q_options`
--

CREATE TABLE `q_options` (
  `id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `parent_option_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_options`
--

INSERT INTO `q_options` (`id`, `option_value`, `parent_option_id`, `question_id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Full Treatment', 0, 1, 'no-cats', '2017-11-07 09:21:10', '2017-11-17 06:59:46'),
(2, 'Social 6', 0, 1, 'no-cats', '2017-11-07 09:23:51', '2017-11-17 06:59:46'),
(3, 'Simulation & Aligners for Single arch only', 0, 1, 'no-cats', '2017-11-07 09:23:51', '2017-11-17 06:59:46'),
(4, 'Simulation for U/L, Aligners only for Single arch U/L', 0, 1, 'no-cats', '2017-11-07 09:23:51', '2017-11-17 06:59:46'),
(5, 'Bridges', 0, 2, 'no-cats', '2017-11-07 09:25:22', '2017-11-17 06:59:46'),
(6, 'Ankylosed', 0, 2, 'no-cats', '2017-11-07 09:25:22', '2017-11-17 06:59:46'),
(7, 'Implants', 0, 2, 'no-cats', '2017-11-07 09:26:45', '2017-11-17 06:59:46'),
(8, 'Diciduous', 0, 2, 'no-cats', '2017-11-07 09:26:45', '2017-11-17 06:59:46'),
(9, 'Poor Prognosis', 0, 2, 'no-cats', '2017-11-07 09:27:03', '2017-11-17 06:59:46'),
(10, 'Restorations', 0, 3, 'no-cats', '2017-11-07 09:32:07', '2017-11-17 06:59:46'),
(11, 'Crowns', 0, 3, 'no-cats', '2017-11-07 09:32:07', '2017-11-17 06:59:46'),
(12, 'Onlays', 0, 3, 'no-cats', '2017-11-07 09:32:22', '2017-11-17 06:59:46'),
(13, 'Maintain Upper', 0, 4, 'UPPER', '2017-11-07 09:33:04', '2017-11-07 09:37:24'),
(14, 'Move Upper to Right', 0, 4, 'UPPER', '2017-11-07 09:33:04', '2017-11-07 09:37:15'),
(15, '1-2 mm', 14, 4, 'UPPER', '2017-11-07 09:33:45', '2017-11-10 10:26:21'),
(16, '>2 mm', 14, 4, 'UPPER', '2017-11-07 09:33:45', '2017-11-10 10:26:24'),
(17, 'Move Upper to Left', 0, 4, 'UPPER', '2017-11-07 09:34:38', '2017-11-07 09:37:08'),
(18, '1-2 mm', 17, 4, 'UPPER', '2017-11-07 09:35:15', '2017-11-10 10:26:25'),
(19, '>2 mm', 17, 4, 'UPPER', '2017-11-07 09:35:15', '2017-11-10 10:26:27'),
(20, 'Maintain Lower', 0, 4, 'LOWER', '2017-11-07 09:37:56', '2017-11-07 09:37:56'),
(21, 'Move Lower to Right', 0, 4, 'LOWER', '2017-11-07 09:38:36', '2017-11-07 09:38:36'),
(22, '1-2 MM', 21, 4, 'LOWER', '2017-11-07 09:39:31', '2017-11-10 10:26:33'),
(23, '>2 mm', 21, 4, 'LOWER', '2017-11-07 09:39:31', '2017-11-10 10:26:35'),
(24, 'Move Lower to Right', 0, 4, 'LOWER', '2017-11-07 09:38:36', '2017-11-07 09:38:36'),
(25, '1-2 MM', 24, 4, 'LOWER', '2017-11-07 09:39:31', '2017-11-10 10:26:38'),
(26, '>2 mm', 24, 4, 'LOWER', '2017-11-07 09:39:31', '2017-11-10 10:27:38'),
(27, 'Maintain', 0, 5, 'no-cats', '2017-11-07 09:40:48', '2017-11-17 06:59:46'),
(28, 'Improve', 0, 5, 'no-cats', '2017-11-07 09:40:48', '2017-11-17 06:59:46'),
(29, 'Maintain', 0, 6, 'no-cats', '2017-11-07 09:42:55', '2017-11-17 06:59:46'),
(30, 'Improve', 0, 6, 'no-cats', '2017-11-07 09:42:55', '2017-11-17 06:59:46'),
(31, 'Other Instructions', 0, 6, 'no-cats', '2017-11-07 09:43:17', '2017-11-17 06:59:46'),
(32, 'Maintain', 0, 7, 'no-cats', '2017-11-07 09:43:56', '2017-11-17 06:59:46'),
(33, 'Right', 32, 7, 'no-cats', '2017-11-07 09:44:34', '2017-11-17 06:59:46'),
(34, 'Left', 32, 7, 'no-cats', '2017-11-07 09:44:34', '2017-11-17 06:59:46'),
(35, 'Change', 0, 7, 'no-cats', '2017-11-07 09:44:55', '2017-11-17 06:59:46'),
(36, 'Right Canine', 35, 7, 'no-cats', '2017-11-07 09:45:43', '2017-11-17 06:59:46'),
(37, 'Right Molar', 35, 7, 'no-cats', '2017-11-07 09:45:43', '2017-11-17 06:59:46'),
(38, 'Left Canine', 35, 7, 'no-cats', '2017-11-07 09:46:10', '2017-11-17 06:59:46'),
(39, 'Left Molar', 35, 7, 'no-cats', '2017-11-07 09:46:10', '2017-11-17 06:59:46'),
(40, 'How to change?', 0, 7, 'no-cats', '2017-11-07 09:47:47', '2017-11-17 06:59:46'),
(41, 'IPR', 40, 7, 'no-cats', '2017-11-07 09:47:47', '2017-11-17 06:59:46'),
(42, 'Left', 41, 7, 'no-cats', '2017-11-07 09:50:12', '2017-11-17 06:59:46'),
(43, 'Right', 41, 7, 'no-cats', '2017-11-07 09:50:12', '2017-11-17 06:59:46'),
(44, 'Bottom', 41, 7, 'no-cats', '2017-11-07 09:50:51', '2017-11-17 06:59:46'),
(45, 'Elastics', 40, 7, 'no-cats', '2017-11-07 09:50:51', '2017-11-17 06:59:46'),
(46, 'Distalization', 40, 7, 'no-cats', '2017-11-07 09:51:25', '2017-11-17 06:59:46'),
(47, 'Gindival Margins as Reference', 0, 8, 'no-cats', '2017-11-07 09:52:06', '2017-11-17 06:59:46'),
(48, 'Incisal Edges as Reference', 0, 8, 'no-cats', '2017-11-07 09:52:06', '2017-11-17 06:59:46'),
(49, 'Close all the spaces in both the arches', 0, 9, 'no-cats', '2017-11-07 09:52:51', '2017-11-17 06:59:46'),
(50, 'IPR in one arch and space closure in opposing arch', 0, 9, 'no-cats', '2017-11-07 09:52:51', '2017-11-17 06:59:46'),
(51, 'Leave space distal to lateral (Bolton Discrepancy)', 0, 9, 'no-cats', '2017-11-07 09:54:03', '2017-11-17 06:59:46'),
(52, 'Leave space distal to canine', 0, 9, 'no-cats', '2017-11-07 09:54:03', '2017-11-17 06:59:46'),
(53, 'Leave space for built-up/prosthesis', 0, 9, 'no-cats', '2017-11-07 09:54:03', '2017-11-17 06:59:46'),
(54, 'Assisted Expansion', 0, 10, 'UPPER', '2017-11-07 09:55:08', '2017-11-07 09:55:08'),
(55, 'Dental expansion with aligners', 0, 10, 'UPPER', '2017-11-07 09:55:08', '2017-11-07 09:55:08'),
(56, 'Proclination', 0, 10, 'UPPER', '2017-11-07 09:56:17', '2017-11-07 09:56:17'),
(57, 'Assisted Expansion', 0, 10, 'LOWER', '2017-11-07 09:56:17', '2017-11-07 09:56:17'),
(58, 'Dental expansion with aligners', 0, 10, 'LOWER', '2017-11-07 09:56:17', '2017-11-07 09:56:17'),
(59, 'Proclination', 0, 10, 'LOWER', '2017-11-07 09:56:17', '2017-11-07 09:56:17'),
(60, 'Maintain', 0, 11, 'Maintain', '2017-11-07 09:57:02', '2017-11-10 13:20:52'),
(61, 'Assisted Expansion', 0, 11, 'CORRECT', '2017-11-07 09:57:02', '2017-11-07 09:57:02'),
(62, 'Dental expansion with aligners', 0, 11, 'CORRECT', '2017-11-07 09:57:02', '2017-11-10 13:20:26');

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
(29, 185, '2021-08-30 09:04:25pm'),
(30, 241, '2021-09-26 11:45:37am'),
(32, 250, '2021-09-29 05:02:32pm'),
(33, 250, '2021-09-29 05:58:38pm'),
(34, 253, '2021-09-29 06:27:49pm'),
(35, 253, '2021-09-29 06:32:36pm');

-- --------------------------------------------------------

--
-- Table structure for table `selected_questions`
--

CREATE TABLE `selected_questions` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(225) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_name` varchar(225) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_sex` varchar(16) NOT NULL,
  `patient_address` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` varchar(11) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'Order Received',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_questions`
--

INSERT INTO `selected_questions` (`id`, `unique_id`, `doctor_id`, `patient_name`, `patient_age`, `patient_sex`, `patient_address`, `question_id`, `option_id`, `comment`, `status`, `created_at`, `update_at`) VALUES
(1, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 1, '1', 'gefdf', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(2, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 2, '5', 'gfffg', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(3, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 3, '11', 'dfgdafg', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(4, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 4, '13,21,22', 'gdfgad', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(5, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 5, '27', 'dfgda', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(6, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 6, '30', 'gadsg', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(7, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 7, '37,38,39,46', 'gdf', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(8, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 8, '47', 'gdgadssf', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(9, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 9, '49', 'fasdfasdg', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(10, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 10, '58,59', 'gsdgsg', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(11, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 11, '60', 'dsfsdg', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(12, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 12, '', 'SDFsd', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(13, '595b5033a5350f44ca345f198e4dbb16', 4, 'poonam', 15, 'Male', '', 13, '', 'fSDF', 'Order Received', '2018-01-08 09:22:47', '2018-01-08 09:22:47'),
(14, '8215cdd43a9628f716ec934233e0d0fd', 3, 'Vishal', 40, 'Male', '', 1, '1', '', 'Order Received', '2018-01-08 09:22:55', '2018-01-08 09:22:55'),
(15, '8215cdd43a9628f716ec934233e0d0fd', 3, 'Vishal', 40, 'Male', '', 10, '54,55,56,59', '', 'Order Received', '2018-01-08 09:22:55', '2018-01-08 09:22:55'),
(16, 'b4ddcc4dc5d344351345ac0ef401e03e', 6, 'Piyush goel', 21, 'Select Gender', '', 1, '1', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(17, 'b4ddcc4dc5d344351345ac0ef401e03e', 6, 'Piyush goel', 21, 'Select Gender', '', 4, '13,20', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(18, 'b4ddcc4dc5d344351345ac0ef401e03e', 6, 'Piyush goel', 21, 'Select Gender', '', 5, '27', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(19, 'b4ddcc4dc5d344351345ac0ef401e03e', 6, 'Piyush goel', 21, 'Select Gender', '', 6, '30', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(20, 'b4ddcc4dc5d344351345ac0ef401e03e', 6, 'Piyush goel', 21, 'Select Gender', '', 8, '48', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(21, 'b4ddcc4dc5d344351345ac0ef401e03e', 6, 'Piyush goel', 21, 'Select Gender', '', 9, '49', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(22, 'd84b371a79ca54370c5068968395724b', 6, 'Piyush goel', 21, 'Select Gender', '', 1, '1', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(23, 'd84b371a79ca54370c5068968395724b', 6, 'Piyush goel', 21, 'Select Gender', '', 4, '13,20', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(24, 'd84b371a79ca54370c5068968395724b', 6, 'Piyush goel', 21, 'Select Gender', '', 5, '27', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(25, 'd84b371a79ca54370c5068968395724b', 6, 'Piyush goel', 21, 'Select Gender', '', 6, '30', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(26, 'd84b371a79ca54370c5068968395724b', 6, 'Piyush goel', 21, 'Select Gender', '', 8, '48', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(27, 'd84b371a79ca54370c5068968395724b', 6, 'Piyush goel', 21, 'Select Gender', '', 9, '49', '', 'Order Received', '2018-01-11 06:48:48', '2018-01-11 06:48:48'),
(28, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 1, '1', '', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(29, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 4, '13,20', '', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(30, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 5, '28', '', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(31, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 6, '30', '', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(32, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 7, '32,33,35,38', '', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(33, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 8, '47', '', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(34, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 10, '55,58', '', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(35, '52b59b46b8c991d2871af6fd4f597099', 8, 'Uma Patel', 24, 'Female', '', 13, '', 'Patient is leaving india after getting aligners and will not be under my observation. so in this case we do not need any attachments on any teeth. Left side there is an end on relation, if correction of class II molar  required more aligners then we do not need it. only maintain posterior occlusion and correct upper and lower anterior. ', 'Order Received', '2018-01-12 14:01:21', '2018-01-12 14:01:21'),
(36, 'e985e5e72c5169c233ff4ebc4c4f2ec5', 10, 'Dipesh Somale', 21, 'Male', 'Naigaon, Maharashtra, India', 1, '1,3', '', 'Order Received', '2018-01-19 14:22:37', '2018-01-20 07:03:27'),
(37, 'e985e5e72c5169c233ff4ebc4c4f2ec5', 10, 'Dipesh', 21, 'Male', 'Naigaon', 2, '6', '', 'Order Received', '2018-01-19 14:22:37', '2018-01-19 14:22:37'),
(38, 'e985e5e72c5169c233ff4ebc4c4f2ec5', 10, 'Dipesh', 21, 'Male', 'Naigaon', 3, '11', '', 'Order Received', '2018-01-19 14:22:37', '2018-01-19 14:22:37'),
(39, 'e985e5e72c5169c233ff4ebc4c4f2ec5', 10, 'Dipesh', 21, 'Male', 'Naigaon', 4, '14,15,16,18', '', 'Order Received', '2018-01-19 14:22:37', '2018-01-19 14:22:37'),
(40, 'e985e5e72c5169c233ff4ebc4c4f2ec5', 10, 'Dipesh', 21, 'Male', 'Naigaon', 5, '28', '', 'Order Received', '2018-01-19 14:22:37', '2018-01-19 14:22:37'),
(41, 'e985e5e72c5169c233ff4ebc4c4f2ec5', 10, 'Dipesh', 21, 'Male', 'Naigaon', 13, '', 'asdasdasdasd', 'Order Received', '2018-01-19 14:22:37', '2018-01-19 14:22:37'),
(42, 'c78c7f099e65d562855e6f81a07d6061', 10, 'Ghanta', 23, 'Male', 'Borivali', 1, '1', 'asdasdasd', 'Order Received', '2018-01-20 07:57:52', '2018-01-20 07:57:52'),
(43, 'b989f56a5c8a2457484a810c320cacb9', 10, 'Ghanta', 23, 'Male', 'Borivali', 1, '1', 'asdasdasd', 'Order Received', '2018-01-20 07:58:22', '2018-01-20 07:58:22'),
(44, '3b3cbdfe7c42df258a08007cc9dac678', 10, 'Milanwa', 21, 'Female', 'Borivali', 1, '1,2,3,4', 'saasdasdasd', 'Order Received', '2018-01-20 08:01:27', '2018-01-20 08:01:27'),
(45, '79df5fb3f7408085e0cbbaa07f074fb9', 10, 'banana', 566666, 'Male', 'dsadsadasdasd', 1, '1,2,3,4', 'asdasdasd', 'Order Received', '2018-01-20 08:05:14', '2018-01-20 08:05:14'),
(46, 'a374447a274f171748b12c2b46de936d', 10, 'asdasd', 423423, 'Male', 'sdrfsdfsd', 1, '1,2,3,4', 'sdfsdfdsf', 'Order Received', '2018-01-20 08:07:29', '2018-01-20 08:07:29'),
(47, 'c35ee3157ff28750dcb183ba94551709', 10, 'qwqweqwe', 45, 'Male', 'sdfsdfsd', 1, '1', 'sdfsdf', 'Order Received', '2018-01-20 08:08:48', '2018-01-20 08:08:48'),
(48, 'aedc4e4d2395ef0b782a2696ed0da343', 10, 'sdfsdf', 23, 'Female', 'asdasd', 1, '1', 'asdasdas', 'Order Received', '2018-01-20 08:09:56', '2018-01-20 08:09:56'),
(49, '9f890bf60e4a46f7cf28b8085b65053c', 10, 'asdas', 23423, 'Male', 'erwer', 1, '1', '', 'Order Received', '2018-01-20 08:10:57', '2018-01-20 08:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(100) DEFAULT NULL,
  `default_shipping_address` int(11) NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_by` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `doctor_id`, `country`, `state`, `city`, `street_address`, `zip_code`, `default_shipping_address`, `added_by`, `created_by`, `updated_by`) VALUES
(1, 265, 'pakistan', 'punjab', 'karachi', 'Rocking Street', '3242343', 1, NULL, '2021-10-05 17:35:15', '2021-10-05 17:35:15'),
(2, 266, 'china', 'punjab', 'lahore', 'Street1', '31232', 0, 1, '2021-10-05 18:16:02', '2021-10-05 18:16:02'),
(3, 266, 'japan', 'shangai', 'tokyo', 'Street2', '312312', 0, 1, '2021-10-05 18:22:35', '2021-10-05 18:22:35'),
(4, 266, 'pakistan', 'punjab', 'karachi', 'Street3', '3131', 0, 1, '2021-10-05 18:23:23', '2021-10-05 18:23:23'),
(5, 266, 'china', 'sindh', 'karachi', 'Street4', '1231', 1, 1, '2021-10-05 18:23:54', '2021-10-05 18:23:54'),
(6, 267, 'pakistan', 'sindh', 'lahore', 'Street1', '312312', 1, 1, '2021-10-05 18:27:22', '2021-10-05 18:27:22'),
(7, 0, 'pakistan', 'punjab', 'karachi', 'Street1', 'e3123', 0, 1, '2021-10-05 18:59:57', '2021-10-05 18:59:57'),
(8, 266, 'pakistan', 'punjab', 'lahore', 'Lahore pakistan', '54660', 0, 1, '2021-10-06 05:31:52', '2021-10-06 05:31:52'),
(11, 269, 'pakistan', 'punjab', 'shangai', 'Street 000', '51393-5197', 0, 1, '2021-10-06 07:57:24', '2021-10-06 07:57:24'),
(17, 269, 'pakistan', 'kolkata', 'kolkata', 'Street 121', '55000', 0, 1, '2021-10-06 11:08:46', '2021-10-06 11:08:46'),
(18, 269, 'pakistan', 'punjab', 'kolkata', 'Shad Bagh', '51393-5197', 1, 1, '2021-10-06 11:08:58', '2021-10-06 11:08:58'),
(19, 269, 'pakistan', 'kolkata', 'kolkata', 'Street 121', '55000', 0, 1, '2021-10-06 11:20:21', '2021-10-06 11:20:21'),
(20, 269, 'pakistan', 'punjab', 'shangai', 'Street 787', '51393-5197', 0, 1, '2021-10-06 12:14:41', '2021-10-06 12:14:41'),
(23, 270, 'pakistan', 'kolkata', 'kolkata', 'Street 121', '55000', 1, 1, '2021-10-06 12:19:33', '2021-10-06 12:19:33'),
(24, 270, 'pakistan', 'kolkata', 'kolkata', 'Street 1213', '55000', 0, 1, '2021-10-06 12:34:38', '2021-10-06 12:34:38'),
(25, 270, 'pakistan', 'sindh', 'karachi', '588 Gabe Forge Apt. 569', '51393-5197', 0, 1, '2021-10-06 12:34:45', '2021-10-06 12:34:45'),
(26, 269, 'pakistan', 'kolkata', 'kolkata', 'Street 8979', '55000', 0, 1, '2021-10-06 12:43:11', '2021-10-06 12:43:11'),
(27, 269, 'pakistan', 'sindh', 'karachi', 'yahoo street', '51393-5197', 0, 1, '2021-10-06 12:46:19', '2021-10-06 12:46:19'),
(28, 273, 'pakistan', 'punjab', 'lahore', '588 Gabe Forge Apt. 569', '51393-5197', 1, NULL, '2021-10-06 13:45:59', '2021-10-06 13:45:59'),
(29, 274, 'pakistan', 'punjab', 'kolkata', 'Street 121', '9800', 1, NULL, '2021-10-06 13:50:16', '2021-10-06 13:50:16');

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
(0, 1, '::1', '2021-10-05 19:27:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
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
(300, 1, '49.36.120.162', '2021-08-21 20:53:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36');
INSERT INTO `tbl_login_log` (`login_id`, `user_id`, `ip_address`, `login_date`, `login_agent`) VALUES
(301, 1, '1.38.149.108', '2021-08-21 21:36:58', 'Mozilla/5.0 (Linux; Android 10; Nokia 6.1 Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36'),
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
(545, 1, '154.192.234.4', '2021-09-01 08:36:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(546, 185, '::1', '2021-09-01 12:24:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(547, 1, '::1', '2021-09-01 12:24:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(548, 185, '::1', '2021-09-01 12:26:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(549, 1, '::1', '2021-09-01 15:13:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(550, 1, '::1', '2021-09-03 05:42:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(551, 186, '::1', '2021-09-03 11:29:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(552, 185, '::1', '2021-09-03 11:31:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(553, 186, '::1', '2021-09-03 11:31:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(554, 186, '::1', '2021-09-03 11:32:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(555, 186, '::1', '2021-09-03 11:32:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(556, 186, '::1', '2021-09-03 12:21:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(557, 186, '::1', '2021-09-03 12:26:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(558, 186, '::1', '2021-09-03 12:27:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(559, 186, '::1', '2021-09-03 12:27:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(560, 186, '::1', '2021-09-03 12:29:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(561, 185, '::1', '2021-09-03 12:30:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(562, 186, '::1', '2021-09-03 12:30:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(563, 1, '::1', '2021-09-03 12:35:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(564, 1, '::1', '2021-09-03 20:37:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(565, 192, '::1', '2021-09-05 08:35:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'),
(566, 1, '::1', '2021-09-08 06:20:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(567, 193, '::1', '2021-09-08 11:33:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(568, 193, '::1', '2021-09-08 13:09:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(569, 193, '::1', '2021-09-08 13:27:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(570, 1, '::1', '2021-09-08 13:41:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(571, 1, '::1', '2021-09-08 14:09:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(572, 193, '::1', '2021-09-08 14:15:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(573, 1, '::1', '2021-09-10 06:15:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(574, 193, '::1', '2021-09-10 06:16:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(575, 1, '::1', '2021-09-10 12:35:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(576, 1, '::1', '2021-09-10 13:05:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(577, 1, '::1', '2021-09-10 13:06:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(578, 1, '::1', '2021-09-10 13:08:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(579, 1, '::1', '2021-09-10 13:09:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(580, 1, '::1', '2021-09-10 13:11:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(581, 193, '::1', '2021-09-10 14:49:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(582, 1, '::1', '2021-09-10 14:50:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(583, 1, '::1', '2021-09-13 11:27:08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(584, 193, '::1', '2021-09-13 12:18:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(585, 1, '::1', '2021-09-13 13:11:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(586, 1, '::1', '2021-09-13 13:28:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(587, 1, '::1', '2021-09-13 14:31:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(588, 1, '::1', '2021-09-13 14:37:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(589, 1, '::1', '2021-09-13 14:41:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(590, 1, '::1', '2021-09-13 15:29:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(591, 1, '::1', '2021-09-13 16:08:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(592, 1, '::1', '2021-09-13 17:03:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(593, 193, '::1', '2021-09-13 17:10:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(594, 193, '::1', '2021-09-13 18:02:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(595, 1, '::1', '2021-09-14 06:38:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(596, 193, '::1', '2021-09-14 08:12:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(597, 193, '::1', '2021-09-14 08:51:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(598, 193, '::1', '2021-09-14 09:03:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(599, 193, '::1', '2021-09-14 09:05:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(600, 1, '::1', '2021-09-15 06:30:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36');
INSERT INTO `tbl_login_log` (`login_id`, `user_id`, `ip_address`, `login_date`, `login_agent`) VALUES
(601, 1, '::1', '2021-09-15 06:31:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(602, 1, '::1', '2021-09-15 06:33:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(603, 1, '::1', '2021-09-15 06:33:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(604, 1, '::1', '2021-09-15 07:12:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(605, 1, '::1', '2021-09-15 07:58:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'),
(606, 1, '::1', '2021-09-16 12:42:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(607, 1, '::1', '2021-09-16 17:20:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(608, 1, '::1', '2021-09-16 17:59:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(609, 235, '::1', '2021-09-16 18:08:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(610, 1, '::1', '2021-09-19 09:40:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(611, 1, '::1', '2021-09-19 22:18:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(612, 1, '::1', '2021-09-20 07:41:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(613, 1, '::1', '2021-09-20 13:11:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(614, 1, '::1', '2021-09-22 17:54:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(615, 1, '::1', '2021-09-23 02:05:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(616, 1, '::1', '2021-09-23 12:55:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(617, 1, '::1', '2021-09-23 13:29:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(618, 1, '::1', '2021-09-23 20:55:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(619, 1, '::1', '2021-09-23 22:31:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(620, 1, '::1', '2021-09-24 08:16:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(621, 1, '::1', '2021-09-24 13:49:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(622, 1, '::1', '2021-09-24 13:51:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(623, 1, '::1', '2021-09-24 22:37:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(624, 1, '::1', '2021-09-25 11:55:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(625, 1, '::1', '2021-09-25 18:20:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(626, 1, '::1', '2021-09-26 09:24:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(627, 1, '::1', '2021-09-26 11:40:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(628, 239, '::1', '2021-09-26 13:16:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(629, 239, '::1', '2021-09-26 19:03:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(630, 1, '::1', '2021-09-26 19:09:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(631, 1, '::1', '2021-09-27 07:27:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(632, 1, '::1', '2021-09-27 09:41:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(633, 239, '::1', '2021-09-27 16:12:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(634, 240, '::1', '2021-09-27 16:29:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(635, 239, '::1', '2021-09-27 16:51:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(636, 1, '::1', '2021-09-28 05:28:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(637, 1, '::1', '2021-09-28 09:42:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(638, 1, '::1', '2021-09-28 09:52:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(639, 242, '::1', '2021-09-28 15:31:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(640, 242, '::1', '2021-09-28 15:33:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(641, 1, '::1', '2021-09-28 19:34:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(642, 1, '::1', '2021-09-29 12:59:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(643, 1, '::1', '2021-09-29 13:00:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(644, 1, '::1', '2021-09-29 13:00:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(645, 1, '::1', '2021-09-29 13:01:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(646, 1, '::1', '2021-09-29 13:01:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(647, 249, '::1', '2021-09-29 15:46:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(648, 1, '::1', '2021-09-29 18:03:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36'),
(649, 252, '::1', '2021-09-29 18:55:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(650, 1, '::1', '2021-09-30 06:21:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(651, 252, '::1', '2021-09-30 06:37:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(652, 1, '::1', '2021-09-30 08:48:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(653, 1, '::1', '2021-09-30 12:47:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(654, 1, '::1', '2021-09-30 14:31:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(655, 1, '::1', '2021-09-30 17:55:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(656, 1, '::1', '2021-10-01 19:44:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(657, 252, '::1', '2021-10-01 20:13:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(658, 258, '::1', '2021-10-01 20:54:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(659, 1, '::1', '2021-10-02 06:21:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(660, 1, '::1', '2021-10-02 06:23:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(661, 1, '::1', '2021-10-02 10:52:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(662, 1, '::1', '2021-10-02 20:26:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(663, 1, '::1', '2021-10-03 06:45:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(664, 252, '::1', '2021-10-03 07:10:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(665, 252, '::1', '2021-10-03 07:13:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(666, 258, '::1', '2021-10-03 07:15:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(667, 252, '::1', '2021-10-03 07:17:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(668, 252, '::1', '2021-10-03 07:19:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(669, 252, '::1', '2021-10-03 07:26:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(670, 258, '::1', '2021-10-03 07:58:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(671, 258, '::1', '2021-10-03 16:21:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(672, 252, '::1', '2021-10-03 16:54:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(673, 1, '::1', '2021-10-04 07:11:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(674, 1, '::1', '2021-10-04 07:39:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(675, 1, '::1', '2021-10-04 12:06:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(676, 258, '::1', '2021-10-04 12:27:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(677, 259, '::1', '2021-10-04 17:39:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(678, 1, '::1', '2021-10-05 10:34:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(679, 1, '::1', '2021-10-05 11:21:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(680, 259, '::1', '2021-10-05 13:45:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(681, 259, '::1', '2021-10-05 17:56:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(682, 1, '::1', '2021-10-06 05:34:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(683, 1, '::1', '2021-10-06 07:28:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(684, 269, '::1', '2021-10-06 12:42:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(685, 269, '::1', '2021-10-06 12:42:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(686, 269, '::1', '2021-10-06 12:42:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(687, 1, '::1', '2021-10-06 12:55:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(688, 1, '::1', '2021-10-06 17:55:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(689, 269, '::1', '2021-10-06 18:27:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36'),
(690, 1, '::1', '2021-10-06 19:24:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `CustomerName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(1, 'Shaibal Saha', '31-12-2020', 'voter@example.com', 'Debidwar,comilla', '1711111111');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `tr_id` int(11) NOT NULL,
  `tr_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
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
(14, 'Misshappen teeth', 1, ''),
(15, 'Other', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_case`
--

CREATE TABLE `treatment_case` (
  `trcase_id` int(11) NOT NULL,
  `case_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
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
  `last_name` varchar(255) DEFAULT NULL,
  `material_status` varchar(50) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `password_reset_token` varchar(200) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(100) DEFAULT NULL,
  `default_billing_address` int(11) NOT NULL,
  `payer_address` text DEFAULT NULL,
  `address_one` text DEFAULT NULL,
  `address_two` text DEFAULT NULL,
  `address_three` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gst_no` varchar(50) DEFAULT NULL,
  `refer_by` varchar(100) DEFAULT NULL,
  `refer_text` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `notification_alert` varchar(255) DEFAULT 'off',
  `user_type_id` tinyint(2) DEFAULT NULL COMMENT '1=admin,2=doctor,3=patient,4=treatmentplanners,5=businessdevelopers',
  `is_active` tinyint(1) DEFAULT 0 COMMENT '0=pending,1=accept,2=decline',
  `added_by` int(11) DEFAULT 0,
  `source` int(11) DEFAULT 0 COMMENT '0=web,1=app',
  `created` varchar(40) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `material_status`, `date_of_birth`, `phone_number`, `email`, `password`, `password_reset_token`, `shipping_address`, `billing_address`, `country`, `state`, `city`, `street_address`, `zip_code`, `default_billing_address`, `payer_address`, `address_one`, `address_two`, `address_three`, `age`, `gst_no`, `refer_by`, `refer_text`, `profile_image`, `gender`, `notification_alert`, `user_type_id`, `is_active`, `added_by`, `source`, `created`, `updated`) VALUES
(1, 'admins', 'Admin', NULL, 'demo@gmail.com', 'english', 'demo@gmail.com', '05a8ea5382b9fd885261bb3eed0527d1d3b07262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1594994804Screenshot_2.png', NULL, 'off', 1, 1, 0, 0, '2018-08-18', '2021-10-03 05:33:01'),
(269, 'Dr. Omer', 'Rashid', NULL, NULL, '67290840834598', 'omer@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, NULL, 'india', 'punjab', 'kolkata', '588 Gabe Forge Apt. 569', '51393-5197', 1, NULL, NULL, NULL, NULL, 43, '899', NULL, NULL, '1633503744.png', 'male', 'off', 2, 1, 1, 0, '2021-10-06', '2021-10-06 10:23:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photos_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_options`
--
ALTER TABLE `q_options`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `selected_questions`
--
ALTER TABLE `selected_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_log`
--
ALTER TABLE `tbl_login_log`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arc_treated`
--
ALTER TABLE `arc_treated`
  MODIFY `arc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `q_options`
--
ALTER TABLE `q_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `refer_doctor`
--
ALTER TABLE `refer_doctor`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rejected_history`
--
ALTER TABLE `rejected_history`
  MODIFY `rej_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `selected_questions`
--
ALTER TABLE `selected_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_login_log`
--
ALTER TABLE `tbl_login_log`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=691;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `treatment_case`
--
ALTER TABLE `treatment_case`
  MODIFY `trcase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
