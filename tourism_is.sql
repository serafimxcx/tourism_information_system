-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 12:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism_is`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_activity_log`
--

CREATE TABLE `a_activity_log` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `fld_activity` varchar(255) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a_activity_log`
--

INSERT INTO `a_activity_log` (`id`, `admin_id`, `fld_activity`, `fld_datetime`) VALUES
(1, 1, ' has logged out', '2023-11-12 15:56:06'),
(2, 1, ' has logged in', '2023-11-12 16:04:19'),
(3, 1, ' has logged in', '2023-11-14 10:11:12'),
(4, 1, ' has logged in', '2023-11-14 16:54:47'),
(5, 1, ' has added a new destination [ Isdaan Floating Restaurant ]', '2023-11-14 17:52:20'),
(6, 1, ' has remove the review of [ officialFordaTravel ] for [ Isdaan Floating Restaurant ]', '2023-11-14 18:10:04'),
(7, 1, ' has remove a story [ 5 ] of [ wanderer_ ]', '2023-11-14 18:18:01'),
(8, 1, ' has remove a story [ 5 ] of [ wanderer_ ]', '2023-11-14 18:18:57'),
(9, 1, ' has remove a story [ 5 ] of [ wanderer_ ]', '2023-11-14 18:19:11'),
(10, 1, ' has remove a story [ 5 ] of [ wanderer_ ]', '2023-11-14 18:20:09'),
(11, 1, ' has remove a story [ 2 ] of [ officialFordaTravel ]', '2023-11-14 18:21:13'),
(12, 1, ' has remove a story [ 2 ] of [ officialFordaTravel ]', '2023-11-14 18:36:59'),
(14, 1, ' has remove a comment of [ officialFordaTravel ] in story [ 1 ] ', '2023-11-14 18:51:01'),
(15, 1, ' has remove a comment of [ officialFordaTravel ] in story [ 1 ] ', '2023-11-14 19:05:06'),
(16, 1, ' has remove a reply of [ officialFordaTravel ] to a comment in the story [ 1 ] ', '2023-11-14 19:06:36'),
(17, 1, ' has remove a reply of [ officialFordaTravel ] to a comment in the story [ 1 ] ', '2023-11-14 19:06:36'),
(18, 1, ' has remove a reply of [ officialFordaTravel ] to a comment in the story [ 1 ] ', '2023-11-14 19:06:36'),
(19, 1, ' has remove a reply of [ officialFordaTravel ] to a comment in the story [ 1 ] ', '2023-11-14 19:06:36'),
(20, 1, ' has logged in', '2023-11-17 14:16:55'),
(21, 1, ' has logged in', '2023-11-18 15:53:08'),
(22, 1, ' has remove a user [ eumelmaganda01 ]', '2023-11-18 15:53:19'),
(23, 1, ' has remove a user [ eumelmaganda01 ]', '2023-11-18 15:54:14'),
(24, 1, ' has remove a user [ eumelmaganda01 ]', '2023-11-18 15:54:53'),
(25, 1, ' has logged in', '2023-11-19 14:45:48'),
(26, 1, ' has remove a destination [ Seda Nuvali ]', '2023-11-19 14:45:57'),
(27, 1, ' has remove a destination [ Seda Nuvali ]', '2023-11-19 14:47:17'),
(28, 1, ' has remove a destination [ Isdaan Floating Restaurant ]', '2023-11-19 14:47:20'),
(29, 1, ' has remove an event [ Anakalang \"Lanzones\" Festival ]', '2023-11-19 14:47:28'),
(30, 1, ' has added a new destination [ Seda Nuvali ]', '2023-11-19 15:00:37'),
(31, 1, ' has added a new destination [ Technopark Hotel ]', '2023-11-19 15:07:11'),
(32, 1, ' has added a new destination [ Isdaan Floating Restaurant  ]', '2023-11-19 15:19:15'),
(33, 1, ' has added a new destination [ The Nagcarlan Underground Cemetery ]', '2023-11-19 15:27:21'),
(34, 1, ' has added a new destination [ UPLB Museum of Natural History ]', '2023-11-19 15:32:56'),
(35, 1, ' has added a new destination [ Lake Pandin ]', '2023-11-19 15:38:17'),
(36, 1, ' has added a new destination [ ELJAY\'s Pasalubong Center  ]', '2023-11-19 15:44:31'),
(37, 1, ' has added a new event [ udwdhu ]', '2023-11-19 17:32:32'),
(38, 1, ' has remove an event [ udwdhu ]', '2023-11-19 17:32:39'),
(39, 1, ' has added a new event [ dnw ]', '2023-11-19 17:36:44'),
(40, 1, ' has remove an event [ dnw ]', '2023-11-19 17:36:48'),
(41, 1, ' has added a new event [ Anakalang Festival ]', '2023-11-19 17:42:27'),
(42, 1, ' has updated a destination [ Anakalang Festival ] [ Anakalang Festival ]', '2023-11-19 17:42:56'),
(43, 1, ' has added a new event [ Tsinelas Festival ]', '2023-11-19 17:45:24'),
(44, 1, ' has added a new event [ Feast of Saint Bartholomew, the Apostle ]', '2023-11-19 17:51:14'),
(45, 1, ' has updated a destination [ Feast of Saint Bartholomew, the Apostle ] [ Feast of Saint Bartholomew, the Apostle ]', '2023-11-19 17:51:44'),
(46, 1, ' has added a new event [ Taylor Swift Eras Tour in Manila ]', '2023-11-19 17:54:26'),
(47, 1, ' has logged in', '2023-11-20 14:18:22'),
(48, 1, ' has logged in', '2023-12-04 09:36:39'),
(49, 1, ' has logged in', '2023-12-06 10:25:35'),
(50, 1, ' has logged out', '2023-12-06 10:27:50'),
(51, 6, ' has logged in', '2023-12-06 10:28:52'),
(52, 6, ' has logged out', '2023-12-06 10:30:37'),
(53, 1, ' has logged in', '2023-12-06 10:30:44'),
(54, 1, ' has logged out', '2023-12-06 10:35:14'),
(55, 6, ' has logged in', '2023-12-06 10:36:38'),
(56, 1, ' has logged in', '2023-12-06 16:49:19'),
(57, 1, ' has logged in', '2023-12-08 11:18:18'),
(58, 1, ' has remove a user [ gabi ]', '2023-12-08 11:18:25'),
(59, 1, ' has logged in', '2023-12-08 20:47:56'),
(60, 1, ' has logged in', '2023-12-09 09:12:44'),
(61, 1, ' has logged out', '2023-12-09 10:32:46'),
(62, 1, ' has logged in', '2023-12-09 10:32:52'),
(63, 1, ' has logged in', '2023-12-09 10:35:08'),
(64, 1, ' has logged in', '2023-12-09 10:36:27'),
(65, 1, ' has remove a user [ municipal_nagcarlan ]', '2023-12-09 12:06:04'),
(66, 1, ' has remove a user [ municipal_nagcarlan ]', '2023-12-09 12:07:46'),
(67, 1, ' has remove a user [ municipal_nagcarlan ]', '2023-12-09 12:55:02'),
(68, 1, ' has logged out', '2023-12-09 14:02:10'),
(69, 1, ' has logged in', '2023-12-09 14:02:18'),
(70, 1, ' has logged out', '2023-12-09 14:02:22'),
(71, 1, ' has logged in', '2023-12-09 14:02:37'),
(72, 1, ' has remove a travel guideline [ Nagcarlan Guidelines ]', '2023-12-09 14:46:26'),
(73, 9, ' has added a new travel guideline [ Nagcarlan Guidelines ]', '2023-12-09 14:47:04'),
(74, 1, ' has logged in', '2023-12-09 18:06:05'),
(75, 10, ' has added a new destination [ But First, Coffee ]', '2023-12-09 19:55:05'),
(76, 10, ' has remove a destination [ But First, Coffee ]', '2023-12-09 19:55:16'),
(77, 1, ' has logged in', '2023-12-10 09:12:58'),
(78, 1, ' has logged in', '2023-12-11 10:40:13'),
(79, 1, ' has logged in', '2023-12-11 10:40:40'),
(80, 9, ' has added a new destination [ San Bartolome Apostol Parish Church ]', '2023-12-11 16:12:52'),
(81, 9, ' has added a new destination [ Bunga Falls ]', '2023-12-11 16:23:03'),
(82, 1, ' has logged in', '2023-12-11 16:24:49'),
(83, 1, ' has remove an event [ Anakalang Festival ]', '2023-12-11 16:25:06'),
(84, 9, ' has added a new event [ Anakalang Festival ]', '2023-12-11 16:29:01'),
(85, 9, ' has added a news [ Tindahan ni Aling Babylyn at Paring Miguel ]', '2023-12-11 16:33:16'),
(86, 9, ' has added a news [ OFW Partylist, nakiisa sa Lanzones Festival sa Laguna ]', '2023-12-11 16:35:17'),
(87, 9, ' has added a new travel tip [ How to go to Bunga Falls ]', '2023-12-11 16:39:07'),
(88, 9, ' has added a new hotline [ Government Organization ]', '2023-12-11 16:40:43'),
(89, 9, ' has added a new hospital [ Nagcarlan District Hospital ]', '2023-12-11 16:45:59'),
(90, 9, ' has added a new event [ Ariana Grande: New Year in Nagcarlan ]', '2023-12-11 16:55:35'),
(91, 1, ' has logged in', '2023-12-26 20:52:32'),
(92, 1, ' has logged in', '2023-12-30 21:23:30'),
(93, 1, ' has logged in', '2024-03-02 22:24:04'),
(94, 1, ' has logged in', '2024-04-25 18:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fld_name` varchar(255) DEFAULT NULL,
  `fld_type` varchar(255) DEFAULT NULL,
  `fld_username` varchar(255) DEFAULT NULL,
  `fld_password` varchar(255) DEFAULT NULL,
  `fld_contactno` varchar(255) DEFAULT NULL,
  `fld_email` varchar(255) DEFAULT NULL,
  `admin_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fld_name`, `fld_type`, `fld_username`, `fld_password`, `fld_contactno`, `fld_email`, `admin_user_id`) VALUES
(1, 'Head Admin', 'Head Admin', 'head_admin', 'password00', '09216595845', 'headadmin@gmail.com', NULL),
(2, 'Babylyn Aragon', 'System Admin', 'admin_#01', 'aragon_01', '09876541234', 'aragon@gmail.com', NULL),
(6, 'Keith Mendoza', 'System Admin', 'admin_#02', 'mendoza_admin', '09114445678', 'kcm@gmail.com', NULL),
(9, 'Nagcarlan', 'Municipality Admin', 'municipal_nagcarlan', 'nagcarlan00', NULL, 'jg.coronado417@gmail.com', 14),
(10, 'BFC', 'Business Admin', 'bfc_coffee', 'butfirstcoffee2', NULL, 'gabrielcoronado4195@gmail.com', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `id` int(11) NOT NULL,
  `fld_amenity` varchar(200) DEFAULT NULL,
  `fld_a_icon` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`id`, `fld_amenity`, `fld_a_icon`) VALUES
(1, 'Free parking', 'free_parking.png'),
(2, 'Pool', 'pool.png'),
(3, 'Beach', 'beach.png'),
(4, 'Kids stay free', 'free_kids.png'),
(5, 'Restaurant', 'restaurant.png'),
(7, 'Playground', 'playground.png'),
(9, 'Free Internet', 'wifi.png'),
(10, 'Badminton', 'balcony.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appreviews`
--

CREATE TABLE `tbl_appreviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fld_rating` int(1) NOT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appreviews`
--

INSERT INTO `tbl_appreviews` (`id`, `user_id`, `fld_rating`, `fld_content`, `fld_datetime`) VALUES
(1, 1, 3, 'Needs an improvement', '2023-12-06 21:56:43'),
(2, 2, 4, 'Nice app. Fun to use.', '2023-11-09 17:29:16'),
(3, 14, 4, 'Nice app. Good for promoting local cultures and businesses', '2023-12-17 22:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookmarks`
--

CREATE TABLE `tbl_bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `tips_id` int(11) DEFAULT NULL,
  `guidelines_id` int(11) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookmarks`
--

INSERT INTO `tbl_bookmarks` (`id`, `user_id`, `destination_id`, `event_id`, `news_id`, `tips_id`, `guidelines_id`, `fld_datetime`) VALUES
(31, 1, NULL, NULL, 2, NULL, NULL, '2023-11-18 20:40:09'),
(32, 1, NULL, NULL, NULL, 2, NULL, '2023-11-18 20:52:02'),
(33, 1, NULL, 22, NULL, NULL, NULL, '2023-11-19 17:57:01'),
(34, 1, 6, NULL, NULL, NULL, NULL, '2023-11-20 14:17:14'),
(35, 1, NULL, 20, NULL, NULL, NULL, '2023-11-20 14:17:34'),
(44, 1, NULL, 24, NULL, NULL, NULL, '2023-12-15 14:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_commentimages` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `user_id`, `story_id`, `fld_content`, `fld_commentimages`, `fld_datetime`) VALUES
(1, 1, 6, 'Parang ang saya naman dyan !!', '', '2023-11-06 21:08:09'),
(12, 1, 1, 'yes mhiema', '', '2023-11-14 19:05:31'),
(15, 9, 6, 'ganda', '', '2023-12-08 20:56:07'),
(25, 9, 66, 'wow', '', '2023-12-10 10:52:12'),
(28, 1, 67, 'go', '', '2023-12-10 11:08:10'),
(29, 1, 67, 'hi', '', '2023-12-10 11:20:47'),
(30, 1, 66, 'keme', '', '2023-12-10 11:36:21'),
(31, 1, 68, 'me', '', '2023-12-10 11:58:30'),
(33, 9, 70, 'whats up', '', '2023-12-10 19:17:56'),
(34, 9, 1, 'okay', '', '2023-12-10 20:12:30'),
(35, 9, 56, 'wow cool', '', '2023-12-10 20:45:35'),
(36, 9, 66, 'mkay', '', '2023-12-10 20:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destinations`
--

CREATE TABLE `tbl_destinations` (
  `id` int(11) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `fld_name` varchar(250) NOT NULL,
  `fld_type` varchar(50) DEFAULT NULL,
  `fld_description` varchar(1000) DEFAULT NULL,
  `fld_address` varchar(250) DEFAULT NULL,
  `fld_longitude` varchar(255) NOT NULL,
  `fld_latitude` varchar(255) NOT NULL,
  `fld_contactno` varchar(250) DEFAULT NULL,
  `fld_email` varchar(255) NOT NULL,
  `fld_price` varchar(250) DEFAULT NULL,
  `fld_operating` varchar(250) NOT NULL,
  `fld_amenities` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fld_roomfeats` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fld_mainimage` varchar(500) NOT NULL,
  `fld_images` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fld_socials` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_destinations`
--

INSERT INTO `tbl_destinations` (`id`, `admin_id`, `fld_name`, `fld_type`, `fld_description`, `fld_address`, `fld_longitude`, `fld_latitude`, `fld_contactno`, `fld_email`, `fld_price`, `fld_operating`, `fld_amenities`, `fld_roomfeats`, `fld_mainimage`, `fld_images`, `fld_socials`) VALUES
(6, 1, 'Seda Nuvali', 'Hotel,Resort', 'Modern hotel in Laguna, at the heart of the sprawling and refreshing setting of the NUVALI eco-city.', 'Evozone Avenue, Nuvali Boulevard, Don Jose, Santa Rosa, 4026 Laguna', '121.059543', '14.238348', '(049) 255 8888', 'nuv@sedahotels.com', 'Php 5000.00 - Php 10000.00', '24 hours', 'Free parking,Pool,Restaurant,Free Internet', 'Refrigerator,Bath / shower,Flatscreen TV,Complimentary toiletries,Air conditioning', 'seda-nuvali.jpg', 'Screenshot 2023-09-05 195123.png,Screenshot 2023-09-05 195111.png,Screenshot 2023-09-05 195100.png,Screenshot 2023-09-05 195050.png,Screenshot 2023-09-05 195042.png', 'https://www.facebook.com/sedanuvalihotel'),
(7, 1, 'Technopark Hotel', 'Hotel', 'With emphasis on comfort, hospitality, and courteous service, Technopark Hotel offers a unique hotel experience to business and pleasure travelers.', 'Greenfield Pkwy, Don Jose, Santa Rosa, Laguna', '121.067858', '14.257773', '0917 867 0885', 'reservations@technoparkhotel.com', 'Php 6000.00 - Php 15000.00', '24 hours', 'Free parking,Pool,Kids stay free,Restaurant,Free Internet', 'Housekeeping,Refrigerator,Bath / shower,Private balcony,Flatscreen TV,Complimentary toiletries,Air conditioning', '240329003.jpg', 'Screenshot 2023-10-05 110220.png,Screenshot 2023-10-05 110159.png,Screenshot 2023-10-05 110149.png,Screenshot 2023-10-05 110139.png,Screenshot 2023-10-05 110118.png,Screenshot 2023-10-05 110105.png', 'https://www.facebook.com/technoparkhotel,https://www.instagram.com/technopark_hotel/,https://technoparkhotel.com/'),
(8, 1, 'Isdaan Floating Restaurant ', 'Restaurant', 'Take your family and friends to a unique and festive Filipino dining experience at Isdaan!', 'National Hwy, Bay, Laguna', '121.301974', '14.177244', '0951 320 4233', 'isdaanfloatingrestofunpark@gmail.com', 'Php 500.00 - Php 2000.00', '8:00 am to 9:00pm', 'Free parking,Restaurant,Free Internet', '', 'isdaanlogo.jpg', 'IMG_6923 (1).JPG,2023-05-20.jpg,2022-04-02.jpg,DSC_0121.JPG', 'https://www.facebook.com/isdaanrestaurant,https://www.instagram.com/isdaanrestaurant/'),
(9, 1, 'The Nagcarlan Underground Cemetery', 'Historical Landmark,Museum', 'The Nagcarlan Underground Cemetery (Filipino: Libingan sa Ilalim ng Lupa ng Nagcarlan) is a national historical landmark and museum in Barangay Bambang, Nagcarlan, Laguna supervised by the National Historical Commission of the Philippines. It was built in 1845 under the supervision of Franciscan priest, Fr. Vicente Velloc as a public burial site and its underground crypt exclusively for Spanish friars, prominent town citizens and members of elite Catholic families. It is dubbed as the only underground cemetery in the country.', 'Brgy. Bambang, Nagcarlan, Laguna', '121.415249', '14.131116', '0905 248 4147', 'N/A', 'Free Entrance Fee', '9:00 am to 4:00 pm, Closed every Monday', '', '', '2022-10-17.jpg', 'nagcarlanundergounddemetery.JPG,2022-08-27.jpg,2022-06-02.jpg,2022-10-17.jpg,2023-07-29.jpg', 'https://www.facebook.com/pages/Nagcarlan-Underground-Cemetery/670039713071348'),
(10, 1, 'UPLB Museum of Natural History', 'Museum', 'The UPLB Museum of Natural History is a natural science and natural history museum within the University of the Philippines Los Baños campus. It serves as a center for documentation, research, and information of flora and fauna of the Philippines.', 'University of the Philippines, CFNR Quadrangle Upper Campus, Los Baños, 4031 Laguna', '121.236250', '14.156043', '(049) 508 6256', 'services.mnh.uplb@up.edu.ph', 'Free Entrance Fee', '8:00 am to 5:00 pm, Closed every weekends', 'Free parking', '', 'download.png', 'microbes-700x480.jpg,snake-700x480.jpg,treecover-700x480.jpg,2016-05-03.jpeg,l0bby-700x480.jpg', 'https://www.facebook.com/UPLBMuseum'),
(11, 1, 'Lake Pandin', 'Resort,Natural Wonder', 'Lake Pandin is said to be \"the most pristine\" of the seven lakes of San Pablo.', 'Santo Angel, San Pablo City, Laguna', '121.364648', '14.112341', ' 0907 995 2983', 'N/A', 'Php 500.00 - 1500.00', '8:00 am to 6:00 pm', '', '', '11879230_1597588673602319_7971371304641951705_o.jpg', '14681779_1301720473195976_571066515198682472_n.jpg,lake-pandin-laguna-coffeehan-2-scaled.jpg,11879230_1597588673602319_7971371304641951705_o.jpg', ''),
(12, 1, 'ELJAY\'s Pasalubong Center ', 'Restaurant,Pasalubong Center', 'One stop shop for your pasalubong meals and where you can have a quick yet delicious meal before you.', 'SUERO Bus Terminal Barangay Paciano Rizal, Calamba Laguna', '121.134287', '14.212188', ' (049) 544 4612', 'N/A', 'Php 100.00 - Php 500.00', '8:00 am to 6:00pm, Closed every Sunday', 'Free parking,Restaurant', '', '294864917_392164523007464_1318940441332931156_n.jpg', 'Screenshot 2023-10-15 220401.png', 'https://www.facebook.com/eljayspasalubongcenter'),
(14, 9, 'San Bartolome Apostol Parish Church', 'Historical Landmark', 'Nagcarlan was first colonized in 1571 by Juan de Salcedo, grandson of Miguel López de Legazpi. It was founded by Franciscan priests Juan de Plasencia and Diego Oropesa in 1578. The church of Nagcarlan was first built from light materials such as nipa and wood in 1583 under the chaplaincy of its first priest, Tomas de Miranda who also pioneered the cultivation of wheat in the country. The church was dedicated to Saint Bartholomew. During Cristobal Torres\' term, a second church made of stone and bricks was built in 1752. The multicolored stones and bricks of the church were offered by the people during its construction. The church was partially destroyed by fire in 1781. Immediate repair and reconstruction was done under the term of Anatacio de Argobejo and later by Fernando de la Puebla, who built the four-storey stone and brick bell tower. Further reconstruction using adobe and renovation (including elaborately designed tiles) in 1845 and addition of the choir loft on three strong arch', 'Nagcarlan, Laguna', '121.417320', '14.136678', '(049563) 1006', 'N/A', 'Free', '7:00 am - 4:00 pm', 'Free parking', '', 'San Bartholomew Parish, Nagcarlan, Laguna, 2021 by EON Local PR (17).JPG', '9020San_Bartolome_Apostol_Parish_Church_of_Nagcarlan_-_2019_22.jpg,IMG_0075.JPG,IMG_20201113_160246-01.jpeg,San Bartholomew Parish, Nagcarlan, Laguna, 2021 by EON Local PR (17).JPG', ''),
(15, 9, 'Bunga Falls', 'Resort,Natural Wonder', 'A waterfall in Nagcarlan.', 'Brgy. Bunga, Nagcarlan, Laguna', '121.398192', '14.146013', 'n/a', 'n/a', 'Php 50.00 - Php 500.00', '9:00 am to 5:00 pm', 'Pool,Playground', '', 'tumblr_ox5egwB2Ac1rdjx0to1_1280.jpg', 'bungafalls-3.jpg,DSC00412.JPG,dda4df3178cbebacb9f5065024209eaf.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventcomments`
--

CREATE TABLE `tbl_eventcomments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_commentimages` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_eventcomments`
--

INSERT INTO `tbl_eventcomments` (`id`, `user_id`, `event_id`, `fld_content`, `fld_commentimages`, `fld_datetime`) VALUES
(2, 1, 24, 'Looking forward to this!!', 'ariana-grande-divorce-allegations-071823-tout-230550e499194da2b254c21d35d94f2f.jpg', '2023-12-17 20:14:20'),
(3, 1, 23, 'Ang saya dito sobra !!', '', '2023-12-17 21:39:51'),
(4, 1, 24, 'wow', '', '2023-12-18 16:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventreplies`
--

CREATE TABLE `tbl_eventreplies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_eventreplies`
--

INSERT INTO `tbl_eventreplies` (`id`, `user_id`, `event_id`, `comment_id`, `fld_content`, `fld_datetime`) VALUES
(2, 14, 24, 2, 'EDI WOW!! ', '2023-12-18 16:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fld_type` varchar(255) DEFAULT NULL,
  `fld_title` varchar(255) DEFAULT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_mainimage` varchar(500) DEFAULT NULL,
  `fld_images` mediumtext DEFAULT NULL,
  `fld_location` varchar(255) NOT NULL,
  `fld_startdate` date DEFAULT NULL,
  `fld_enddate` date DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `admin_id`, `fld_type`, `fld_title`, `fld_content`, `fld_mainimage`, `fld_images`, `fld_location`, `fld_startdate`, `fld_enddate`, `fld_datetime`) VALUES
(20, 1, 'Festival', 'Tsinelas Festival', 'The Municipality of Liliw’s Gat Tayaw Tsinelas Festival is a yearly celebrated festival held during the last week of April. Based from its name, this festival showcases the primary industry of the said “Footwear Capital of Laguna”.\r\n \r\nThe footwear industry that the generation of today inherited is continuously improving through the efforts of Liliw Mayor Cesar C. Sulibit. And as a result, the municipality became one of the many famous tourist spots in Laguna. Their different kinds of footwear are famous all over the Philippines because of its attractive and in-style collection of slippers, shoes, and sandals.\r\n \r\nAll footwear stores and festival booths are situated on Gat Tayaw Street. The Festival booths showcase the rich history of the town of Liliw, Disenyong Liliweño, Tsinelas Making, Uraro Biscuit Making, Eko-Turismo (Kilangin Falls), Agri-Turismo, and Lutuing Liliw. Besides these attractions, the Municipal Government of Liliw prepared a lot of fun activities that everyone will surely enjoy. \r\n \r\nAside from their footwear industry, the peaceful town of Liliw is also famous for their delicious and powdery cookies called Uraro (or sometimes called Araro). These are flower-shaped cookies with a distinctive milky taste that melts in the mouth. ', 'liliw tsinelas festival apr-may 2017.jpg', 'q_1529052543e.jpg,event_1538565450m1.jpg,343191783_568717538687946_286491022160507649_n.jpg,343186674_147084981627928_8892763627865935517_n.jpg', 'Liliw, Laguna', '2024-04-15', '2024-04-21', '2023-11-19 17:45:24'),
(21, 1, 'Fiesta', 'Feast of Saint Bartholomew, the Apostle', 'The Feast of Saint Bartholomew, the Apostle is celebrated on August 24th.  All that is known of him with certainty is that he is mentioned in the synoptic gospels and Acts of the Apostles as one of the twelve apostles. His name, a patronymic, means \"son of Tolomai\" and scholars believe he is the same as Nathanael mentioned in John, who says he is from Cana and that Jesus called him an \"Israelite...incapable of deceit.\"  The Roman Martyrology says he preached in India and Greater Armenia, where he was flayed and beheaded by King Astyages. Tradition has the place as Abanopolis on the west coast of the Caspian Sea and that he also preached in Mesopotamia, Persia, and Egypt.   In art, Bartholomew is most commonly depicted with a beard and curly hair at the time of his martyrdom. According to legends, he was skinned alive and beheaded so is often depicted holding his flayed skin or the curved flensing knife with which he was skinned.', 'image_Saint Bartholomew.jpg', '', 'Nagcarlan, Laguna', '2024-08-24', '2024-08-24', '2023-11-19 17:51:14'),
(22, 1, 'Others', 'Taylor Swift Eras Tour in Manila', 'The Eras Tour is the ongoing sixth concert tour by American singer-songwriter Taylor Swift, who described it as a journey through all of her musical \"eras\".[2] An homage to her albums, the Eras Tour is her most expansive tour yet, with 151 shows across five continents. As of August 2023, it is the highest-grossing tour ever by a woman and second highest-grossing overall based on the first 56 North American shows alone.\r\n\r\nAnnounced after the release of her tenth studio album, Midnights (2022), the Eras Tour is Swift\'s second all-stadium tour after the 2018 Reputation Stadium Tour. It commenced on March 17, 2023, in Glendale, United States, and is set to conclude on December 8, 2024, in Vancouver, Canada. The show spans over 3.5 hours, with a set list of 44 songs divided into 10 distinct acts that portray the albums conceptually. It received rave reviews from critics, who emphasized its concept, production, aesthetics and immersive ambience, as well as Swift\'s musicianship, stage presence and versatility.\r\n\r\nThe tour had a significant cultural, economic and political impact, evident in the form of unprecedented demand, ticket sales, venue attendance records, and technical obstacles that led to imposition of price regulation and anti-scalping laws; elevated economies, businesses, and tourism; domination of news cycles and social media; and tributes from governments and organizations. Ticketmaster, an official partner, was scrutinized for ineffective sales and alleged monopoly. The tour pushed Swift\'s net worth over US$1 billion, making her the first billionaire ever with music as the main source of income.', '71hSJA6E62L._AC_UF894,1000_QL80_.jpg', '', 'Pasay City, Manila', '2023-11-20', '2023-11-20', '2023-11-19 17:54:26'),
(23, 9, 'Festival', 'Anakalang Festival', 'Ana Kalang Festival is a 5-day celebration every April in Nagcarlan, Laguna, across the foot of Mt. Banahaw and Mt. Cristobal.\r\n\r\nThe festival is named after Ana, a beloved historical figure of Nagcarlan, and Kalang-kalang, the giant statues that are paraded around the town during the festivities. This festival is very popular, which focuses on spectacular native costumes made from indigenous natural materials. Cultural shows and native cuisines are also major attractions same with agricultural products and industrial produce.\r\n\r\nLanzones\r\n\r\nLanzones is the most abundant fruit in Nagcarlan, and the town is the biggest supplier of the fruit in Manila.\r\n\r\nThe major attraction of the festival is the parade and the street dancing contest. Street dancers are dressed in beautiful and colorful native costumes. They dance gracefully in the streets, moving around the giant Kalang-Kalang. The Kalang-Kalang is a unique folk art and a giant statue that is ten feet high and made of various fruits, vegetables, and indigenous materials. The parade is fun and enjoyable, with so much participation of the townspeople dancing merrily with the sounds of drums and lyre corps from different schools. You can also see beautiful majorettes in elegant uniforms.\r\n\r\nBarangays, schools, organizations, and individuals join the Kalang-Kalang making contest. Each of the statues that they make will be displayed in an exhibit and paraded around the town on the last day of the festival. You can see the creativity of the people in beautifying their statues and adorning them with glittery and colorful costumes and accessories.\r\n\r\nNipa huts are also decorated with fruits and vegetables. From afar, the decors look like colorful curtains with various designs, but when you come nearer, they’re actually vegetables like sayote, raddish, chili, upo, and tomato.\r\n\r\nOther highlights of the festival include the agro-trade fair where people can show their skills in handicraft-making and basket-weaving and showcase their products and agricultural crops like fresh fruits and vegetables, coffee and root crops. These products are also for sale to both local and foreign visitors. Cooking contest, nightly cultural shows, tours in the town’s scenic and historical spots, antique exhibits, garden shows, folk games, school bands exhibitions and a beauty pageant are the other lively activities in this festival.\r\n\r\nMyths, legends, and cultures blend together in this dynamic Ana Kalang Festival. You will witness people’s creativity and resourcefulness while having a glimpse of their rich cultural heritage.', 'Ana Kalang 1.jpg', 'dsc_2203.jpg,p_1529038986e.jpg,AnaKalang_Streetdancers.jpg,Laguna-Ana-Kalang-Festival7.jpg,IMG_0530-4-1024x768.jpg', 'Nagcarlan, Laguna', '2023-10-08', '2023-10-14', '2023-12-11 16:29:01'),
(24, 9, 'Others', 'Ariana Grande: New Year in Nagcarlan', 'The Sweetener World Tour was the fourth concert tour and third arena tour by American singer, songwriter and actress Ariana Grande in support of her fourth and fifth studio albums, Sweetener (2018) and Thank U, Next (2019). Led by Live Nation Entertainment, the tour was officially announced on October 25, 2018. It began on March 18, 2019, at the Times Union Center in Albany, New York, and concluded on December 22, 2019, in Inglewood, California at The Forum, visiting cities in North America and Europe throughout 101 dates. Frequent collaborators and backup dancers of Grande, Brian and Scott Nicholson who were enlisted by her, served as creative directors and LeRoy Bennett was enlisted as production designer.\r\n\r\nThe tour received positive reviews from critics, who complimented the stage design and Grande\'s vocals. The Sweetener World Tour was attended by 1.3 million people and grossed $146.6 million from 97 shows, surpassing her previous concert tour, the Dangerous Woman Tour, as her highest-grossing tour to date.[4] Throughout the tour, Grande partnered with nonprofit organization HeadCount to register new voters ahead of the 2020 United States presidential election, breaking its all-time voter registration record with 33,381 registrations.[5]\r\n\r\nMultiple shows across the tour were recorded for the live concert tour album, K Bye for Now (SWT Live). It was released on December 23, 2019, following the final show of the tour in Inglewood, California on December 22, 2019. A concert film documenting the tour entitled Ariana Grande: Excuse Me, I Love You, was released on Netflix on December 21, 2020, one day prior to the one year anniversary of the final show.', 'Screenshot 2023-12-11 165254.png', '', 'Plaza, Nagcarlan, Laguna', '2024-01-01', '2024-01-01', '2023-12-11 16:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_furnitures`
--

CREATE TABLE `tbl_furnitures` (
  `id` int(11) NOT NULL,
  `fld_name` varchar(250) DEFAULT NULL,
  `fld_desc` mediumtext DEFAULT NULL,
  `fld_image` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_furnitures`
--

INSERT INTO `tbl_furnitures` (`id`, `fld_name`, `fld_desc`, `fld_image`) VALUES
(1, 'Louver Window', 'Solid wooden louvers and windows, composed of parallel wooden louvers set in a frame. The louvers are joined onto a track so that they maybe tilted open and shut in unison to control airflow. Consistent airflow into home, keeping the interior cool, comfortable and healthy. Design to regulate airflow and light penetration.', 'louver.png'),
(2, 'Television Set', '1946 James Linderberg founded Bolinao electronic Company (BEC). Dubbed as “The Father of Philip;ine Television.” \r\n       1953 Antonio Quirion bought 70% of BEC, changing the name to ABS (Alto Broadcasting System). October 23, 1953 DZAQ-TV Channel 3 and DZAQ-AM Radio, first telecast covering a 50 mile radius.\r\n        1956 ABS was sold to Lopez Family, turning it to Chronicle Broadcasting Network (CBN).\r\n1966 ABS-CBN was the biggest network during martial law.\r\n', 'tv.png'),
(3, 'Everett Piano Company', 'Founded: 1883 by John J. Church Company in Boston Massachusetts.\r\n         Headquarters: South Haven Michigan, United States.\r\n         Later acquired by: Yamaha Corporation.\r\n', 'piano.png'),
(4, 'Colonnade', 'Solid hard wood Narra with intricate hand crafted designs. Consist of four (4) columns, three (3) arches and two (2) cabinets. A separation mark between the Salas and Dinning area.\r\n', 'colonnade.png'),
(5, 'Console', 'Made with Narra and Bamboo.\r\nConsole or pier table: A console table has one plain, straight side that is placed up against a wall. The other side of the table can be quite ornate. Console or pier tables of the late 17th century were accent tables that were attached to the wall, which were visually reminiscent of a pier that juts out from one end of land into the water.\r\n\r\n', 'console.png'),
(6, 'Singer Sewing Machine', 'Since the invention of the first sewing machine, generally considered to have been the work of Englishman Thomas saint in 1790. From then on the sewing machine has greatly improved the efficiency and productivity of the clothing industry.\r\n Registered Letter: EF\r\nRegister No. from: 288931 – To: 488930\r\nMachine Class Model No. 15k\r\nDate and Year: October 11, 1949\r\n\r\n', 'sewingmachine.png'),
(7, 'Vintage Bedside Lamp', 'A bedside lamp is a light that is placed next to a bed. It is usually small in size so it can fit on a nightstand or table, but basically any lamp designed to be near the bed could be called a beside lamp. Another restored vintage lamp with a floral design glass panels.\r\n', 'lamp.png'),
(8, 'Double Leaf Door and Transom Window', 'Made of hard wood that has a decorative grill iron that veil the surface of the glass, wood frame with ionic order-like on both sides. Transom window or  “ fanlight” is a window set above the transom door or larger window.\r\n', 'doorwindow.png'),
(9, 'High Ceiling Living Room', 'The house feels more spacious and luxurious. Abundant natural light. Fill a home with lots of light, giving it an open, grand look and feel. \r\n', 'ceiling.png'),
(10, 'Vintage Pottery Water Jar', 'Back in the days, clay pots are used to store drinking water because they help to keep the water cool. Drinking water from the clay pot helps improver metabolism. That’s because it is free from all harmful chemicals that are found in plastic containers. Water stored in clay pots taste sweet. Not just that, but also feels gentle on your throat.\r\n', 'jar.png'),
(11, 'Araro', ' In Filipino, araro means plow. It is a traditional farming tool that is used to till the soil and prepare it for planting. The araro is made up of a wooden frame and a metal blade that is pulled by a carabao or water buffalo.\r\n', 'araro.png'),
(12, 'Coffee Grinder', 'The first coffee mill, made specifically to grind coffee beans, was invented by Englishman Nicholas Book in the late 17th Century, Coffee was placed in the top of the lever device and was grinded into a bottom drawer. In 1798, the first American patent on an improved coffee grinding mill was granted to Thomas Bruff, Sr., a dentist, and inventor. It was a wall-mounted mill fitted with iron plates.\r\n', 'coffeegrinder.png'),
(13, 'Lusong and Halo (Mortar and Pestle)', 'It was necessity for every household until the early 20th century. It was used for processing rice, separating the husk and the grain. It can be used also for preparing cacao as pounding the seeds which separates the kernels from the shells. The last but not the least, the nilupak, grinding boiled “saba” (native banana cultivar) with grated coconut and sugar.\r\n', 'mortarpestle.png'),
(14, 'Cornisa Wood Ceiling', 'A flower like shapes on all corners of the ceiling frame, made of Narra wood, hand crafted and hammer. It  gives additional grandeur designs of the ceiling.\r\n', 'woodceiling.png'),
(15, 'Solohiya', 'More popularly known in the Philippines as Solohiya, this rattan weaving technique (also known as caning) has made its comeback in the international furniture scene in recent years. Whether as a backrest for chairs, as a screen, or for armoire doors and sideboards, its distinct sunburst pattern gives a refreshing tropical vibe that is timeless and easy on the eye.\r\n', 'solohiya.png'),
(16, 'Puyat Furniture', 'House of Puyat is continuing legacy on its ‘well-crafted, proudly Filipino made furniture. From 1920s to 1960s, the most coveted furniture pieces in the Philippines. The company’s furniture pieces were virtually found in every corner of the country, from low-cost residence, lavish mansions, the  Malacanang palace and even in national heritage sites. By 1960, the House of Puyat had become the most lucrative furniture company in the east. They are also behind in manufacturing quality billiard table and majestic narra altars in St. James the Apostle Parish Church known as Betis Church which declared a National Cultural Treasure Commission for Cultural and Arts of the Philippines (NCCA).\r\n', 'puyat.png'),
(17, 'Solomon\'s twist', 'Spiral post made by foreman master carpenter, Mang Amado, Known as the builder of the heritage in Sariaya, Lucena and other nearby Quezon Province. Additional design and distinct separation of Salas and Dining Area. Meticulously hand crafted.\r\n', 'twist.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guidelines`
--

CREATE TABLE `tbl_guidelines` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fld_title` varchar(255) DEFAULT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_images` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guidelines`
--

INSERT INTO `tbl_guidelines` (`id`, `admin_id`, `fld_title`, `fld_content`, `fld_images`, `fld_datetime`) VALUES
(3, 9, 'Nagcarlan Guidelines', 'Lorem ipsum dolor sit amet. Aut dolorem autem ut excepturi totam qui sequi minus qui dignissimos consectetur quo quia optio et quibusdam explicabo et porro repellendus. Et eveniet quia ut doloribus minima eos rerum nostrum!\r\n\r\nEst quos consequatur in eligendi dolor est labore reprehenderit hic recusandae esse aut omnis placeat. Quo perspiciatis molestiae in exercitationem consequuntur eum quia alias id velit velit quo quae consequuntur. Ab possimus nobis aut tenetur laborum ut quia voluptas quo autem iure et voluptas error et necessitatibus nihil. Ut eveniet error sit tempore ducimus est repellendus ipsam non galisum quia.\r\n\r\nId similique dolor est facilis incidunt rem reprehenderit consequuntur est quos omnis ad voluptas assumenda aut cumque quia non consequatur eius. Id ipsam veniam qui Quis porro qui officiis quae ad quos dolores 33 voluptas natus. Ad magni incidunt est veritatis incidunt sed nihil repellendus At temporibus rerum aut galisum quod est minima earum ad magnam eaque.', '', '2023-12-09 14:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospitals`
--

CREATE TABLE `tbl_hospitals` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fld_name` varchar(255) DEFAULT NULL,
  `fld_address` varchar(255) DEFAULT NULL,
  `fld_latitude` varchar(255) DEFAULT NULL,
  `fld_longitude` varchar(255) DEFAULT NULL,
  `fld_contact` varchar(255) DEFAULT NULL,
  `fld_mainimage` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hospitals`
--

INSERT INTO `tbl_hospitals` (`id`, `admin_id`, `fld_name`, `fld_address`, `fld_latitude`, `fld_longitude`, `fld_contact`, `fld_mainimage`) VALUES
(4, 1, 'Community General Hospital', '38F7+652, Colago Ave, San Pablo City, Laguna', '14.072420', '121.311150', '(049562) 8008', 'unnamed.jpg'),
(5, 9, 'Nagcarlan District Hospital', ' F. Baltazar St. Brgy. Poblacion III, Nagcarlan, Philippines', '14.133921', '121.416295', '(049563) 1016', 'Screenshot 2023-12-11 164527.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotlines`
--

CREATE TABLE `tbl_hotlines` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fld_agency` varchar(255) DEFAULT NULL,
  `fld_contact` varchar(255) DEFAULT NULL,
  `fld_special` varchar(255) DEFAULT NULL,
  `fld_area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hotlines`
--

INSERT INTO `tbl_hotlines` (`id`, `admin_id`, `fld_agency`, `fld_contact`, `fld_special`, `fld_area`) VALUES
(5, 1, 'Philippine National Police', '911', 'Police', 'Nationwide'),
(6, 9, 'Government Organization', '0936 341 9552', 'Public Information', 'Nagcarlan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_likes`
--

CREATE TABLE `tbl_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_likes`
--

INSERT INTO `tbl_likes` (`id`, `user_id`, `story_id`, `fld_datetime`) VALUES
(6, 1, 6, '2023-11-06 21:04:42'),
(25, 9, 6, '2023-12-08 20:55:55'),
(26, 1, 66, '2023-12-10 09:01:41'),
(28, 9, 66, '2023-12-10 11:08:35'),
(30, 9, 56, '2023-12-10 11:26:25'),
(31, 1, 67, '2023-12-10 11:28:07'),
(32, 9, 1, '2023-12-10 11:54:42'),
(34, 1, 68, '2023-12-10 12:11:11'),
(37, 9, 70, '2023-12-10 20:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fld_category` varchar(255) NOT NULL,
  `fld_title` varchar(255) DEFAULT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_mainimage` varchar(500) DEFAULT NULL,
  `fld_images` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `admin_id`, `fld_category`, `fld_title`, `fld_content`, `fld_mainimage`, `fld_images`, `fld_datetime`) VALUES
(2, 1, 'Lifestyle', 'Yoga is proven to be effective to cure lung problems', 'Lorem ipsum dolor sit amet. Quo itaque nihil ut perspiciatis alias ex officiis amet sit distinctio tempore. Eos dolorem dolorem et architecto architecto sit earum unde id debitis placeat.\r\n\r\nUt quos culpa vel tempore tempora eos nulla velit ab consequuntur labore est dolores consequatur et aliquid sapiente et error quia. At voluptas blanditiis ad harum provident est voluptas eveniet est quia nisi non dolore tempora sed pariatur ratione sed internos itaque. Ut nemo modi hic nostrum sunt est accusantium eaque.\r\n\r\nEst fugiat maiores ut suscipit repellat hic dolor repudiandae. Quo nostrum molestias ex esse quos aut ipsa eligendi. Eos natus reprehenderit sit deleniti atque et beatae quibusdam aut possimus corporis. Ut rerum unde qui optio cupiditate non minus mollitia a omnis quod qui praesentium tempore qui asperiores quaerat.', '20191024-reduce-inflammation-with-this-breathing-exercise.jpg', '', '2023-11-12 11:24:21'),
(3, 9, 'Business', 'Tindahan ni Aling Babylyn at Paring Miguel', 'Lorem ipsum dolor sit amet. Aut veritatis quia et quia recusandae ea quaerat repudiandae aut fugiat nulla? Est accusantium exercitationem hic internos dolore eos nesciunt atque ut deserunt suscipit et itaque eius! Ab omnis minima ea galisum voluptatem sed aliquam provident vel aliquid atque! A fugit sint eum officiis explicabo et nulla quos ex rerum assumenda!\r\n\r\nAb porro fugiat aut aliquam voluptas quo consectetur consequatur qui ipsa dolor sed ullam voluptatibus cum optio molestias. Ut ipsum sunt aut aliquam incidunt 33 laboriosam natus ut aspernatur natus sit quia ducimus id officiis minus? Est incidunt repudiandae est enim magni eum praesentium voluptate ab voluptas quas sed sunt nihil. Et omnis quam aut modi saepe est adipisci tenetur?\r\n\r\nQui accusantium perferendis sed voluptates quod est quasi facilis sed rerum officia. Ab galisum velit eos commodi velit est porro libero aut repudiandae impedit. Et corrupti dignissimos sit tempora sint ad voluptatem excepturi id itaque molestiae et voluptatem voluptatem.', 'Westside_Market_in_Manhattan,_NYC_IMG_5615.jpg', '', '2023-12-11 16:33:16'),
(4, 9, 'Entertainment', 'OFW Partylist, nakiisa sa Lanzones Festival sa Laguna', 'NAKIISA ang OFW-Partylist sa Ana Kalang Lanzones Festival 2023, na isinagawa sa Nagcarlan, Laguna araw ng Miyerkules.\r\n\r\nIba’t ibang mga pasabog at aktibidad ang tampok sa isinagawang Ana Kalang Lanzones Festival 2023 sa Nagcarlan Laguna Kabilang na rito ang drum and Lyre exhibition kung saan umarangkada sa parada ang mga batang Nagcarlangin sa naturang exhibition.\r\n\r\nBinuksan na rin ang ibinibidang mga panindang gulay at prutas sa paligid ng Municipal hall ng Nagcarlan at mga eksibisyon sa pagpipinta at marami pang iba.\r\n\r\nAyon kay Nagcarlan, Laguna Mayor Elmor Vita kilala ang Nagcarlan na isa mga pinagkukunan ng matamis at masasarap na lanzones sa Probinsya.\r\n\r\nDagdag din ng Alkalde masaya ang buong bayan ngayon ng Nagcarlan dahil sa dininig ang dalangin nilang umulan at makaani ng lanzones.\r\n\r\nSamantala, naging panauhing pandangal sa Kaganapan si OFW-Partylist Cong. Marissa ‘del Mar’ Magsino at ipinaabot nito sa mga mamamayan ng Nagcarlangan ang aktibong ginagawang pagtulong ng kanilang opisina.\r\n\r\nIbinida din ng naturang kongresista ang P1-M tulong pinansyal na ipapamahagi, katuwang ang Department of Social Welfare and Development (DSWD) sa pamamagitan ng Assistance to Individuals in Crisis Situation (AICS).', 'und2-1.jpg', '', '2023-12-11 16:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newscomments`
--

CREATE TABLE `tbl_newscomments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_commentimages` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_newscomments`
--

INSERT INTO `tbl_newscomments` (`id`, `user_id`, `news_id`, `fld_content`, `fld_commentimages`, `fld_datetime`) VALUES
(1, 1, 3, 'pupuntahan ko yan', '', '2023-12-17 22:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsreplies`
--

CREATE TABLE `tbl_newsreplies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replies`
--

CREATE TABLE `tbl_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `story_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_replies`
--

INSERT INTO `tbl_replies` (`id`, `user_id`, `story_id`, `comment_id`, `fld_content`, `fld_datetime`) VALUES
(10, 1, 6, 1, 'truuu ', '2023-11-20 14:15:30'),
(18, 9, 67, 28, 'hii ', '2023-12-10 11:08:19'),
(19, 9, 67, 29, 'che ', '2023-12-10 11:21:50'),
(20, 1, 70, 33, 'truuu ', '2023-12-15 11:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reposts`
--

CREATE TABLE `tbl_reposts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reposts`
--

INSERT INTO `tbl_reposts` (`id`, `user_id`, `story_id`, `fld_datetime`) VALUES
(9, 1, 6, '2023-11-18 17:24:16'),
(11, 1, 67, '2023-12-10 11:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviewsratings`
--

CREATE TABLE `tbl_reviewsratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `fld_locationrate` int(1) DEFAULT NULL,
  `fld_cleanrate` int(1) DEFAULT NULL,
  `fld_servicerate` int(1) DEFAULT NULL,
  `fld_valuerate` int(1) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reviewsratings`
--

INSERT INTO `tbl_reviewsratings` (`id`, `user_id`, `destination_id`, `fld_locationrate`, `fld_cleanrate`, `fld_servicerate`, `fld_valuerate`, `fld_content`, `fld_datetime`) VALUES
(5, 1, 8, 2, 1, 1, 2, 'ambagal ng everything', '2023-12-06 10:18:25'),
(6, 9, 6, 4, 3, 3, 0, 'maganda dito', '2023-12-08 20:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomfeats`
--

CREATE TABLE `tbl_roomfeats` (
  `id` int(11) NOT NULL,
  `fld_roomfeats` varchar(200) DEFAULT NULL,
  `fld_rf_icon` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roomfeats`
--

INSERT INTO `tbl_roomfeats` (`id`, `fld_roomfeats`, `fld_rf_icon`) VALUES
(2, 'Housekeeping', 'housekeep.png'),
(3, 'Refrigerator', 'ref.png'),
(4, 'Bath / shower', 'check.png'),
(5, 'Private balcony', 'balcony.png'),
(6, 'Flatscreen TV', 'check.png'),
(7, 'Complimentary toiletries', 'check.png'),
(11, 'Air conditioning', 'aircon.png'),
(12, 'Laundry services', 'check.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stores`
--

CREATE TABLE `tbl_stores` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fld_name` varchar(255) DEFAULT NULL,
  `fld_address` varchar(255) DEFAULT NULL,
  `fld_latitude` varchar(255) DEFAULT NULL,
  `fld_longitude` varchar(255) DEFAULT NULL,
  `fld_mainimage` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stores`
--

INSERT INTO `tbl_stores` (`id`, `admin_id`, `fld_name`, `fld_address`, `fld_latitude`, `fld_longitude`, `fld_mainimage`) VALUES
(2, 1, '7/11 Santa Cruz', 'Santa Cruz, Laguna', '14.185190', '121.172210', 'San02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stories`
--

CREATE TABLE `tbl_stories` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `fld_writer` varchar(255) DEFAULT NULL,
  `fld_title` varchar(255) DEFAULT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_storyimages` mediumtext DEFAULT NULL,
  `fld_date` datetime DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stories`
--

INSERT INTO `tbl_stories` (`id`, `writer_id`, `fld_writer`, `fld_title`, `fld_content`, `fld_storyimages`, `fld_date`, `destination_id`, `event_id`) VALUES
(1, 1, 'Gabriel', 'Notice for Everyone', 'Please be kind in this platform', '', '2023-10-02 22:56:50', NULL, NULL),
(6, 2, 'John', 'Anakalang Festival', 'What a fun experience !!', 'AnaKalang_Streetdancers.jpg,Laguna-Ana-Kalang-Festival7.jpg,IMG_0530-4-1024x768.jpg', '2023-10-02 23:24:44', NULL, NULL),
(56, 1, 'Gabriel ', 'My Hotel Experience in Nuvali', 'Masasabi kong isa ito sa mga pinakamagandang hotel na napuntahan ko. Very accommodating ng mga staff and the service was great.', '', '2023-11-19 21:23:13', 6, NULL),
(66, 1, 'Gabriel ', 'Liliw !!', 'Pumunta kami liliw. Sakto naabutan namen tsinelas festival. Ang dami namin nabili.', '', '2023-11-19 21:51:23', NULL, 20),
(67, 9, 'Chelsea', 'Im new here', 'Hi guys whats up', '', '2023-12-08 20:51:33', NULL, NULL),
(68, 9, 'Chelsea', 'LETS GO', 'who want to come with me', '', '2023-12-10 11:58:17', NULL, NULL),
(70, 1, 'Gabriel Coronado', 'Hi ', 'whats up', '', '2023-12-10 12:12:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tips`
--

CREATE TABLE `tbl_tips` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fld_title` varchar(255) DEFAULT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_mainimage` varchar(500) DEFAULT NULL,
  `fld_images` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tips`
--

INSERT INTO `tbl_tips` (`id`, `admin_id`, `fld_title`, `fld_content`, `fld_mainimage`, `fld_images`, `fld_datetime`) VALUES
(2, 1, 'What to do when lost in the woods.', 'Lorem ipsum dolor sit amet. Sit dolor vitae est ducimus molestias est aspernatur dolores quo pariatur veniam hic omnis quod hic mollitia rerum ut soluta fugit. Qui ipsa unde ea fugit facilis ex commodi corporis et unde quia est aliquid consequuntur id impedit ullam qui dolorem ipsa. Ut ipsam quas eum rerum voluptatibus in velit odit. Qui eius rerum et ullam similique vel aspernatur pariatur et commodi quia ea tempora nostrum vel incidunt voluptates qui sunt libero. Ea optio optio vel repudiandae ipsam est eligendi repellat qui quam explicabo At maiores sint ut corrupti nihil. Aut autem dolorum sit galisum voluptatem est doloremque dolores id possimus eligendi est blanditiis fugiat sit numquam atque sed pariatur nulla. Ea repudiandae voluptatem ut porro voluptate in vero quos qui velit libero est commodi molestias.\r\n\r\nHic quia culpa rem consectetur sunt qui illum atque et magni modi vel blanditiis facilis est facilis voluptatem. Aut quas harum sit odit laboriosam eos eius iusto aut inventore expedita et expedita labore ab natus optio. Ut labore dolores hic necessitatibus velit quo minus velit. Et placeat atque vel maiores vitae cum dolores eveniet et voluptas modi id incidunt cumque qui maxime vero qui optio quas. A incidunt iste ea alias ipsum et porro ipsam id neque aliquid et dolore excepturi.\r\n\r\nEt quia odio in nostrum consequatur ut ducimus libero aut sint aspernatur. Sed possimus dolorem sit ipsum nostrum a quidem suscipit et fuga dolores aut optio officiis vel fuga quos. Ea cumque internos sit nemo rerum hic adipisci quis rem rerum porro. Qui delectus minima hic veniam nemo et recusandae officiis ut quia itaque et excepturi velit sed omnis quia. Eum voluptate consequuntur et magni minus aut cumque atque cum internos esse rem esse repellat et animi velit ut tempora sint. Id animi eveniet qui quia odio sit internos rerum. Eos excepturi nemo a galisum facere et totam soluta vel eius alias.', '', '', '2023-11-12 13:22:49'),
(3, 9, 'How to go to Bunga Falls', 'Bunga falls is a perfect weekend destination near Manila. We recommend bringing your own car since it’s just a 2-3 hour trip. It’s also easier to sidetrip to other places like Nagcarlan Underground Cemetery, Yambo Lake, Pandin Lake, etc. if you have a car. Don’t forget to ask for directions when you’re already en route to Nagcarlan. The sign to Bunga Falls is not that noticeable. There are designated parking area for a minimal fee. The falls is just 5 minutes away from the parking lot; no long hike needed.\r\n\r\nIn Bunga, it’s best to rent a cottage so you could have a place for your things. Some cottages also have tables so you could take your lunch there. Bring packed lunch, since there are no stores in the area to buy meals. You can rent salbabidas or water tubes and swim at the base of the falls. If you have valuables, just leave them in your car just to be safe as the place could get crowded during lunch hours. A lot of locals also visit the place during weekends.', '', '', '2023-12-11 16:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usernotif`
--

CREATE TABLE `tbl_usernotif` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `notification_type` enum('like','comment','reply','repost') DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL,
  `status` enum('unread','read') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usernotif`
--

INSERT INTO `tbl_usernotif` (`id`, `user_id`, `notification_type`, `content_id`, `fld_datetime`, `status`) VALUES
(31, 1, 'like', 68, '2023-12-10 12:11:11', 'read'),
(32, 1, 'comment', 71, '2023-12-10 19:16:44', 'read'),
(33, 9, 'comment', 70, '2023-12-10 19:17:56', 'read'),
(34, 9, 'like', 70, '2023-12-10 19:59:00', 'read'),
(35, 1, 'like', 71, '2023-12-10 20:11:27', 'unread'),
(36, 9, 'comment', 1, '2023-12-10 20:12:30', 'read'),
(37, 9, 'comment', 56, '2023-12-10 20:45:35', 'read'),
(38, 9, 'like', 70, '2023-12-10 20:46:04', 'read'),
(39, 9, 'comment', 66, '2023-12-10 20:46:17', 'read'),
(40, 1, 'reply', 33, '2023-12-15 11:36:52', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fld_type` varchar(50) DEFAULT NULL,
  `fld_username` varchar(255) NOT NULL,
  `fld_password` varchar(255) NOT NULL,
  `fld_name` varchar(255) NOT NULL,
  `fld_email` varchar(255) NOT NULL,
  `fld_profpic` varchar(1000) DEFAULT NULL,
  `fld_about` mediumtext DEFAULT NULL,
  `fld_code` varchar(255) NOT NULL,
  `fld_datejoin` date DEFAULT NULL,
  `fld_isVerified` tinyint(1) NOT NULL,
  `fld_imgproof` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fld_type`, `fld_username`, `fld_password`, `fld_name`, `fld_email`, `fld_profpic`, `fld_about`, `fld_code`, `fld_datejoin`, `fld_isVerified`, `fld_imgproof`) VALUES
(1, 'User', 'officialFordaTravel', 'password00', 'Gabriel Coronado', 'jg.coronado417@gmail.com', '327138716_778157324020525_4845879566629566879_n.jpg', 'Hi. Im the head admin and creator of FordaTravel. ', '8652e09443a0ab4d033a36227519c3bf', '2023-10-01', 1, NULL),
(2, 'User', 'wanderer_', 'coronado01', 'John', 'gabrielcoronado4195@gmail.com', '356947160_1355861375317124_4860952877241839812_n.jpg', 'I like to travel.', 'f8bcda2ff46c429f709a470e94154a9c', '2023-10-01', 1, NULL),
(9, 'User', 'kimberly_c', 'kimberly01', 'Chelsea', 'ckimberlychelsea@gmail.com', '518d3608c7853580caf87e9522a20d21.jpg', 'panget ako', '8633d6d6ceea90e77e1a387a131bc3c9', '2023-12-08', 1, NULL),
(14, 'Municipality', 'municipal_nagcarlan', 'password00', 'Nagcarlan', 'jg.coronado417@gmail.com', 'noprofile.jpg', 'Official profile of municipality of Nagcarlan.', '8652e09443a0ab4d033a36227519c3bf', '2023-12-09', 1, '1R-N-C7vti2QMq474cYu6yj9aasUmZ0YA'),
(15, 'Business', 'bfc_coffee', 'butfirstcoffee2', 'BFC', 'gabrielcoronado4195@gmail.com', 'noprofile.jpg', 'but first, coffee.\r\nofficial profile.', '28a3194f3d76665d5505811a7f93d3b0', '2023-12-09', 1, '1R-N-C7vti2QMq474cYu6yj9aasUmZ0YA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_activity_log`
--
ALTER TABLE `a_activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_activity_log_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appreviews`
--
ALTER TABLE `tbl_appreviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_appreviews_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_bookmarks`
--
ALTER TABLE `tbl_bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `tips_id` (`tips_id`),
  ADD KEY `guidelines_id` (`guidelines_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_comments_ibfk_1` (`user_id`),
  ADD KEY `tbl_comments_ibfk_2` (`story_id`);

--
-- Indexes for table `tbl_destinations`
--
ALTER TABLE `tbl_destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_destinations_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_eventcomments`
--
ALTER TABLE `tbl_eventcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_eventreplies`
--
ALTER TABLE `tbl_eventreplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_eventreplies_ibfk_1` (`user_id`),
  ADD KEY `tbl_eventreplies_ibfk_2` (`event_id`),
  ADD KEY `tbl_eventreplies_ibfk_3` (`comment_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_events_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_furnitures`
--
ALTER TABLE `tbl_furnitures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guidelines`
--
ALTER TABLE `tbl_guidelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_guidelines_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_hospitals_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_hotlines`
--
ALTER TABLE `tbl_hotlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_hotlines_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_likes_ibfk_1` (`user_id`),
  ADD KEY `tbl_likes_ibfk_2` (`story_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_news_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_newscomments`
--
ALTER TABLE `tbl_newscomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `tbl_newsreplies`
--
ALTER TABLE `tbl_newsreplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `newscomment_id` (`comment_id`);

--
-- Indexes for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_replies_ibfk_1` (`user_id`),
  ADD KEY `tbl_replies_ibfk_2` (`comment_id`),
  ADD KEY `tbl_replies_ibfk_3` (`story_id`);

--
-- Indexes for table `tbl_reposts`
--
ALTER TABLE `tbl_reposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_reposts_ibfk_1` (`user_id`),
  ADD KEY `tbl_reposts_ibfk_2` (`story_id`);

--
-- Indexes for table `tbl_reviewsratings`
--
ALTER TABLE `tbl_reviewsratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_reviewsratings_ibfk_1` (`user_id`),
  ADD KEY `tbl_reviewsratings_ibfk_2` (`destination_id`);

--
-- Indexes for table `tbl_roomfeats`
--
ALTER TABLE `tbl_roomfeats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_stores_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_tips_ibfk_1` (`admin_id`);

--
-- Indexes for table `tbl_usernotif`
--
ALTER TABLE `tbl_usernotif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_usernotif_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_activity_log`
--
ALTER TABLE `a_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_appreviews`
--
ALTER TABLE `tbl_appreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bookmarks`
--
ALTER TABLE `tbl_bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_destinations`
--
ALTER TABLE `tbl_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_eventcomments`
--
ALTER TABLE `tbl_eventcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_eventreplies`
--
ALTER TABLE `tbl_eventreplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_furnitures`
--
ALTER TABLE `tbl_furnitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_guidelines`
--
ALTER TABLE `tbl_guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hotlines`
--
ALTER TABLE `tbl_hotlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_newscomments`
--
ALTER TABLE `tbl_newscomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_newsreplies`
--
ALTER TABLE `tbl_newsreplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_reposts`
--
ALTER TABLE `tbl_reposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_reviewsratings`
--
ALTER TABLE `tbl_reviewsratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_roomfeats`
--
ALTER TABLE `tbl_roomfeats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_usernotif`
--
ALTER TABLE `tbl_usernotif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `a_activity_log`
--
ALTER TABLE `a_activity_log`
  ADD CONSTRAINT `a_activity_log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_appreviews`
--
ALTER TABLE `tbl_appreviews`
  ADD CONSTRAINT `tbl_appreviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_bookmarks`
--
ALTER TABLE `tbl_bookmarks`
  ADD CONSTRAINT `tbl_bookmarks_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `tbl_destinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_bookmarks_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `tbl_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_bookmarks_ibfk_3` FOREIGN KEY (`news_id`) REFERENCES `tbl_news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_bookmarks_ibfk_4` FOREIGN KEY (`tips_id`) REFERENCES `tbl_tips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_bookmarks_ibfk_5` FOREIGN KEY (`guidelines_id`) REFERENCES `tbl_guidelines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comments_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_destinations`
--
ALTER TABLE `tbl_destinations`
  ADD CONSTRAINT `tbl_destinations_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_eventcomments`
--
ALTER TABLE `tbl_eventcomments`
  ADD CONSTRAINT `tbl_eventcomments_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `tbl_events` (`id`),
  ADD CONSTRAINT `tbl_eventcomments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_eventreplies`
--
ALTER TABLE `tbl_eventreplies`
  ADD CONSTRAINT `tbl_eventreplies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_eventreplies_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `tbl_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_eventreplies_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `tbl_eventcomments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD CONSTRAINT `tbl_events_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_guidelines`
--
ALTER TABLE `tbl_guidelines`
  ADD CONSTRAINT `tbl_guidelines_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  ADD CONSTRAINT `tbl_hospitals_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_hotlines`
--
ALTER TABLE `tbl_hotlines`
  ADD CONSTRAINT `tbl_hotlines_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD CONSTRAINT `tbl_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_likes_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD CONSTRAINT `tbl_news_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_newscomments`
--
ALTER TABLE `tbl_newscomments`
  ADD CONSTRAINT `tbl_newscomments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_newscomments_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `tbl_news` (`id`);

--
-- Constraints for table `tbl_newsreplies`
--
ALTER TABLE `tbl_newsreplies`
  ADD CONSTRAINT `tbl_newsreplies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_newsreplies_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `tbl_news` (`id`),
  ADD CONSTRAINT `tbl_newsreplies_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `tbl_newscomments` (`id`);

--
-- Constraints for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD CONSTRAINT `tbl_replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_replies_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `tbl_comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_replies_ibfk_3` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_reposts`
--
ALTER TABLE `tbl_reposts`
  ADD CONSTRAINT `tbl_reposts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reposts_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_reviewsratings`
--
ALTER TABLE `tbl_reviewsratings`
  ADD CONSTRAINT `tbl_reviewsratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reviewsratings_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `tbl_destinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD CONSTRAINT `tbl_stores_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  ADD CONSTRAINT `tbl_stories_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `tbl_destinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stories_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `tbl_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  ADD CONSTRAINT `tbl_tips_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_usernotif`
--
ALTER TABLE `tbl_usernotif`
  ADD CONSTRAINT `tbl_usernotif_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
