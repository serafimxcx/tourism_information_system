-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 04:34 AM
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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fld_name` varchar(255) DEFAULT NULL,
  `fld_type` varchar(255) DEFAULT NULL,
  `fld_username` varchar(255) DEFAULT NULL,
  `fld_password` varchar(255) DEFAULT NULL,
  `fld_contactno` varchar(255) DEFAULT NULL,
  `fld_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fld_name`, `fld_type`, `fld_username`, `fld_password`, `fld_contactno`, `fld_email`) VALUES
(1, 'Head_Admin', 'Head Admin', 'head_admin', 'password00', '09216595845', 'headadmin@gmail.com'),
(2, 'Babylyn Aragon', 'Admin', 'admin_#01', 'aragon_01', '09876541234', 'aragon@gmail.com'),
(6, 'Keith Mendoza', 'Admin', 'admin_#02', 'mendoza_admin', '09114445678', 'kcm@gmail.com');

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
(1, 1, 3, 'Needs an improvement', '2023-11-09 13:54:50'),
(2, 2, 4, 'Nice app. Fun to use.', '2023-11-09 17:29:16');

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
(5, 1, 5, 'Lets go !!', '', '2023-11-07 08:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destinations`
--

CREATE TABLE `tbl_destinations` (
  `id` int(11) NOT NULL,
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

INSERT INTO `tbl_destinations` (`id`, `fld_name`, `fld_type`, `fld_description`, `fld_address`, `fld_longitude`, `fld_latitude`, `fld_contactno`, `fld_email`, `fld_price`, `fld_operating`, `fld_amenities`, `fld_roomfeats`, `fld_mainimage`, `fld_images`, `fld_socials`) VALUES
(2, 'Seda Nuvali', 'Hotel', 'Seda Nuvali is an integral part of the Nuvali eco-city development which is envisioned to be the grow.', 'Seda Nuvali, Evozone Avenue, Nuvali Boulevard, Don Jose, Santa Rosa, 4026 Laguna', '121.059512', '14.238366', '(049) 255 8888', 'nuv@sedahotels.com', 'Php 6000.00 - 15000.00', '24 hours', 'Pool,Restaurant,Playground,Free Internet', 'Housekeeping,Refrigerator,Bath / shower,Private balcony,Flatscreen TV,Complimentary toiletries,Air conditioning,Laundry services', 'seda-nuvali.jpg', 'Screenshot 2023-09-05 195111.png,Screenshot 2023-09-05 195100.png,Screenshot 2023-09-05 195050.png,Screenshot 2023-09-05 195042.png', 'https://www.facebook.com/sedanuvalihotel'),
(4, 'Villa Gregoria', 'Resort', 'Cool, relaxing, and refreshing environment away from the city. Enjoy the variety of swimming pools.', ' Brgy. Buboy, Nagcarlan, Philippines', '121.399269', '14.205360', '0977 600 2117', 'villagregoria@yahoo.com', 'Php 350.00 - 1500.00', '24 hours', 'Free parking,Pool,Restaurant,Playground', 'Housekeeping,Bath / shower,Air conditioning', '274451174_5777595752290510_3414465101841750583_n.jpg', '349927370_586600176910857_6321847279809968103_n.jpg,348651590_1310307796506826_8267584086601072599_n.jpg,349117214_1233917810820483_8331205738637100921_n.jpg,349176058_634769001542428_293995907712078329_n.jpg,349176065_793292819052418_8920410137370097232_n.jpg,349351768_1226939067955150_6960208149775596397_n.jpg', 'https://www.facebook.com/VillaGregoriaResort'),
(6, 'Isdaan Floating Restaurant', 'Restaurant', 'Take your family and friends to a unique and festive Filipino dining experience at Isdaan!', 'Isdaan Floating Restaurant, 58G2+VQ5, National Hwy, Bay, Laguna', '121.2969668', '14.1828226', '0951 320 4233', 'isdaanfloatingrestofunpark@gmail.com', 'Php 200.00 - Php 2500.00', '8:00 am to 8:00 pm', 'Free parking', '', 'isdaanlogo.jpg', '2022-04-02.jpg,2022-11-12.jpg,isdaan (24).jpg,IMG_6923.JPG,20230106_145435.jpg', 'https://www.facebook.com/isdaanrestaurant,https://www.instagram.com/isdaanrestaurant/'),
(8, 'Nagcarlan Underground Cemetery', 'Historical Landmark', 'The Nagcarlan Underground Cemetery is a national historical landmark and museum in Barangay Bambang, Nagcarlan, Laguna supervised by the National Historical Commission of the Philippines. ', 'Barangay Bambang, Nagcarlan, Laguna', '121.4113302', '14.1251706', '0905 248 4147', 'N/A', 'Free Entrance Fee', '9:00 am - 4:00 pm', '', '', '2022-10-17.jpg', 'nagcarlanundergounddemetery.JPG,2022-08-27.jpg,2022-06-02.jpg,2023-07-29.jpg', ''),
(9, 'UPLB Museum of Natural History', 'Museum', 'The UPLB Museum of Natural History is a natural science and natural history museum within the University of the Philippines Los Baños campus. It serves as a center for documentation, research, and information of flora and fauna of the Philippines.', 'UPLB Museum of Natural History, University of the Philippines, CFNR Quadrangle Upper Campus, Los Baños, 4031 Laguna', '121.2969668', '14.1828226', '(049) 508 6256', 'services.mnh.uplb@up.edu.ph', 'Free Entrance Fee', '8:00 am - 5:00 pm', 'Free parking', '', 'download.png', 'microbes-700x480.jpg,snake-700x480.jpg,treecover-700x480.jpg,2016-05-03.jpeg,l0bby-700x480.jpg', 'https://www.facebook.com/UPLBMuseum,https://mnh.uplb.edu.ph/'),
(10, 'Technopark Hotel', 'Hotel', 'With emphasis on comfort, hospitality, and courteous service, Technopark Hotel offers a unique hotel experience to business and pleasure travelers. Calm and private, the perfect choice for the discerning long or short stay guest. Impeccably designed with your ease and convenience in mind, our 76 rooms and suites are a haven of peace and serenity where you can relax in comfort after a hectic days work.', 'Technopark Hotel, 7359+667, Greenfield Pkwy, Don Jose, Santa Rosa, Laguna', '120.9856549', '14.2580161', '(049) 541 3089', 'reservations@technoparkhotel.com', 'Php 2000.00 - 3000.00 per night', '24 hours', 'Free parking,Pool,Restaurant,Free Internet', 'Housekeeping,Refrigerator,Bath / shower,Flatscreen TV,Complimentary toiletries,Air conditioning', '240329003.jpg', 'Screenshot 2023-10-05 110220.png,Screenshot 2023-10-05 110159.png,Screenshot 2023-10-05 110149.png,Screenshot 2023-10-05 110118.png,Screenshot 2023-10-05 110105.png', 'https://www.facebook.com/technoparkhotel,https://technoparkhotel.com/'),
(11, 'Hotel Marciano', 'Hotel', 'Hotel Marciano, is a modernistic boutique hotel in the historical City of Calamba, a first-class municipality in the province of Laguna. Fifty kilometers away from the gridlock of Manila, the drive is easy and relaxed as you pass by the elevated Skyway to Alabang Viaduct which will eventually traverse the South Luzon Expressway and exit at Calamba.', 'Hotel Marciano, National Highway First PJM Compound, Real, Calamba, 4027 Laguna', '121.061124', '14.1960486', '(049) 545 0101', 'reservations.hmi@gmail.com', 'Php 2500.00 - Php 3500.00 per night', '24 hours', 'Pool,Restaurant,Free Internet', 'Refrigerator,Bath / shower,Flatscreen TV,Complimentary toiletries,Air conditioning', 'Screenshot 2023-10-05 111951.png', 'Screenshot 2023-10-05 112125.png,Screenshot 2023-10-05 112110.png,Screenshot 2023-10-05 112054.png', 'https://www.facebook.com/hotelmarcianoinc,https://hotelmarciano.com.ph/'),
(13, 'Pandin Lake', 'Natural Wonder', 'Lake Pandin is said to be \"the most pristine\" of the seven lakes of San Pablo.\r\n\r\nPandin has an area of 20.5 hectares and a maximum depth of 63 meters. It has a calculated volume of 6,600 cubic meters of water in storage.\r\n\r\nPandin is considered oligotrophic because of the abundant plant and fish life.', 'Brgy. San Lorenzo, San Pablo, Laguna', '121.368619', '14.113848', '0907 995 2983', 'N/A', 'Php 500.00 - 1500.00', '8:00 am to 6:00 pm', '', '', 'Screenshot 2023-10-15 214623.png', '14681779_1301720473195976_571066515198682472_n.jpg,lake-pandin-laguna-coffeehan-2-scaled.jpg,11879230_1597588673602319_7971371304641951705_o.jpg,11219328_1597588600268993_5543871385080902547_n.jpg,11918944_1597588590268994_5720194309731393222_n.jpg', 'https://www.facebook.com/profile.php?id=100068447562948'),
(14, 'ELJAY\'s Pasalubong Center', 'Pasalubong Center', 'One stop shop for your pasalubong meals and where you can have a quick yet delicious meal before you', 'SUERO Bus Terminal Barangay Paciano Rizal, Calamba, Laguna', '121.134125', '14.212283', '(049) 544 4612', 'N/A', 'Php 50.00 - Php 500.00', '5:00 am to 9:00 pm, Closed every Sunday', 'Restaurant', '', '294864917_392164523007464_1318940441332931156_n.jpg', 'Screenshot 2023-10-15 220401.png,27072889_2038207119785196_292697110312874872_n.jpg,294864917_392164523007464_1318940441332931156_n.jpg', 'https://www.facebook.com/eljayspasalubongcenter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `fld_writer` varchar(255) DEFAULT NULL,
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

INSERT INTO `tbl_events` (`id`, `fld_writer`, `fld_type`, `fld_title`, `fld_content`, `fld_mainimage`, `fld_images`, `fld_location`, `fld_startdate`, `fld_enddate`, `fld_datetime`) VALUES
(18, 'Gabriel Coronado', 'Festival', 'Anakalang Festival', 'The festival is named after Ana, a beloved historical figure of Nagcarlan, and Kalang-kalang, the giant statues that are paraded around the town during the festivities. This festival is very popular, which focuses on spectacular native costumes made from indigenous natural materials. Cultural shows and native cuisines are also major attractions same with agricultural products and industrial produce. Lanzones is the most abundant fruit in Nagcarlan, and the town is the biggest supplier of the fruit in Manila.\r\n\r\nAccording to the myth, Ana Kalang was known for her tremendous wealth, kindness, piety and generosity. It is said that she used to help her townspeople in times of trouble. One day, a Spaniard came to her house and upon looking out of the window, he saw branches swaying and hitting one another, and so he asked what was going on. Ana Kalang answered and said “nagkakalang sila”. The word was repeatedly mispronounced by the Spaniards until it became Nagcarlan, which is now the name of the town. It was also said that Ana Kalang saw the Virgin Sta. Ana who took the poison out of the lanzones fruits to make them edible. Now, lanzones is one of the major products of the province.\r\n\r\nNagcarlan is a second class municipality in the province of Laguna, Philippines.', 'Ana Kalang 1.jpg', 'dsc_2203.jpg,p_1529038986e.jpg,AnaKalang_Streetdancers.jpg,Laguna-Ana-Kalang-Festival7.jpg,IMG_0530-4-1024x768.jpg', 'Nagcarlan, Laguna', '2023-10-02', '2023-10-08', '2023-10-12 11:07:33'),
(19, 'Gabriel Coronado', 'Fiesta', 'Feast of Saint Bartholomew, the Apostle', 'The Feast of Saint Bartholomew, the Apostle is celebrated on August 24th. All that is known of him with certainty is that he is mentioned in the synoptic gospels and Acts of the Apostles as one of the twelve apostles. His name, a patronymic, means \"son of Tolomai\" and scholars believe he is the same as Nathanael mentioned in John, who says he is from Cana and that Jesus called him an \"Israelite...incapable of deceit.\"\r\n\r\nThe Roman Martyrology says he preached in India and Greater Armenia, where he was flayed and beheaded by King Astyages. Tradition has the place as Abanopolis on the west coast of the Caspian Sea and that he also preached in Mesopotamia, Persia, and Egypt. \r\n\r\nIn art, Bartholomew is most commonly depicted with a beard and curly hair at the time of his martyrdom. According to legends, he was skinned alive and beheaded so is often depicted holding his flayed skin or the curved flensing knife with which he was skinned.', 'image_Saint Bartholomew.jpg', '', 'Nagcarlan, Laguna', '2023-10-24', '2023-10-24', '2023-10-12 11:08:16'),
(20, 'Babylyn Aragon', 'Others', 'Calamba Beauty Pageant', 'Lorem ipsum dolor sit amet. Ad deleniti assumenda ut vero nostrum eos aspernatur earum rem officia unde. Vel numquam quos ex corrupti laborum aut dolore repudiandae eos nulla quaerat. Vel sunt reprehenderit et quis voluptas rem explicabo nihil et fuga doloribus est minus autem non officiis omnis aut quidem dolorum.\r\n\r\nQuo culpa dignissimos id veniam dignissimos in aliquid quasi aut pariatur mollitia? Est perferendis illum qui possimus nobis et consequatur galisum. Hic officiis repellendus sit beatae dolorum et laborum earum ut nemo adipisci sit dolorum tempore ab amet enim. Ut similique cumque et fugit maiores aut incidunt ipsum.\r\n\r\nEst repellendus neque aut explicabo molestias id officiis inventore ut repudiandae sequi non aspernatur consequatur non tenetur mollitia. Sed nemo neque a dolores architecto sit reprehenderit dolor aut earum aspernatur qui consequatur odit qui sequi provident sed asperiores provident? Est laboriosam accusantium ea similique atque aut doloremque officia sed galisum eaque est voluptatem magnam ea ipsa molestiae. Quo minima nobis ut quod commodi ea deserunt nobis qui internos magni!', 'beauty-pageant-flyer-design-template-a32d76b601b7cdb4c2d0e659c8e12bae.jpg', '', 'Calamba, Laguna', '2023-10-28', '2023-10-28', '2023-10-12 11:56:06'),
(21, 'Babylyn Aragon', 'Others', 'The Eras Tour San Pablo', 'Et quaerat itaque et molestias illo aut galisum recusandae sit quasi veniam At quia repellat in distinctio voluptates ut voluptatem ullam. Et illum animi qui rerum sint id ipsa praesentium qui sint deserunt a repellat sunt est error voluptas. Ut necessitatibus ipsam in rerum quia in ullam amet et perspiciatis tenetur id tenetur distinctio et incidunt necessitatibus. A harum officia qui ipsum totam et veniam placeat.\r\n\r\nEx totam voluptatem quo tempora quia ex veniam aperiam et aspernatur velit. Eum ratione autem eos libero quibusdam et odio necessitatibus. Sed quia adipisci qui cupiditate rerum sit tenetur quam. Et corrupti tempore aut possimus vero hic dolorem dolorem ea omnis enim!', '71hSJA6E62L._AC_UF894,1000_QL80_.jpg', '', 'San Pablo City, Laguna', '2023-12-16', '2023-12-16', '2023-10-12 11:58:12'),
(24, 'Gabriel Coronado', 'Festival', 'Gat Tayaw Tsinelas Festival', '\r\nThe Municipality of Liliw’s Gat Tayaw Tsinelas Festival is a yearly celebrated festival held during the last week of April. Based from its name, this festival showcases the primary industry of the said “Footwear Capital of Laguna”.\r\n \r\nThe footwear industry that the generation of today inherited is continuously improving through the efforts of Liliw Mayor Cesar C. Sulibit. And as a result, the municipality became one of the many famous tourist spots in Laguna. Their different kinds of footwear are famous all over the Philippines because of its attractive and in-style collection of slippers, shoes, and sandals.\r\n \r\nAll footwear stores and festival booths are situated on Gat Tayaw Street. The Festival booths showcase the rich history of the town of Liliw, Disenyong Liliweño, Tsinelas Making, Uraro Biscuit Making, Eko-Turismo (Kilangin Falls), Agri-Turismo, and Lutuing Liliw. Besides these attractions, the Municipal Government of Liliw prepared a lot of fun activities that everyone will surely enjoy. \r\n \r\nAside from their footwear industry, the peaceful town of Liliw is also famous for their delicious and powdery cookies called Uraro (or sometimes called Araro). These are flower-shaped cookies with a distinctive milky taste that melts in the mouth. ', 'liliw tsinelas festival apr-may 2017.jpg', 'q_1529052543e.jpg,event_1538565450m1.jpg,343191783_568717538687946_286491022160507649_n.jpg,343186674_147084981627928_8892763627865935517_n.jpg', 'Liliw, Laguna', '2023-04-24', '2023-04-30', '2023-10-12 19:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guidelines`
--

CREATE TABLE `tbl_guidelines` (
  `id` int(11) NOT NULL,
  `fld_writer` varchar(255) DEFAULT NULL,
  `fld_title` varchar(255) DEFAULT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_images` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guidelines`
--

INSERT INTO `tbl_guidelines` (`id`, `fld_writer`, `fld_title`, `fld_content`, `fld_images`, `fld_datetime`) VALUES
(3, 'Gabriel Coronado', 'Nagcarlan Guidelines', 'Lorem ipsum dolor sit amet. Qui sunt enim ea excepturi quia ut ratione excepturi in dicta consequuntur. Qui perferendis optio est eveniet magni non culpa cumque qui sunt harum eos ipsum galisum. Ab voluptates alias non omnis itaque et mollitia quam hic enim rerum. Id modi voluptas vel beatae obcaecati rem explicabo corrupti non voluptatem aspernatur qui consequatur nihil.\r\n\r\nSed alias similique non voluptatem enim nam rerum reprehenderit et tenetur similique et perspiciatis Quis. Qui odit itaque est omnis eligendi est tenetur sint. Qui pariatur dolores eos nemo fugiat et assumenda laborum ex earum soluta. Qui assumenda velit ab voluptas sint qui incidunt blanditiis.\r\n\r\nUt asperiores veritatis ea dolore architecto ea ullam nihil et consequuntur dolorem. Eum rerum incidunt qui rerum officiis 33 velit Quis quo dolor eaque est quos assumenda.', '', '2023-09-13 20:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospitals`
--

CREATE TABLE `tbl_hospitals` (
  `id` int(11) NOT NULL,
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

INSERT INTO `tbl_hospitals` (`id`, `fld_name`, `fld_address`, `fld_latitude`, `fld_longitude`, `fld_contact`, `fld_mainimage`) VALUES
(1, 'Community General Hospital', 'Community General Hospital, 38F7+652, Colago Ave, San Pablo City, Laguna', '14.072420', '121.311150', '(049562) 8008', 'unnamed.jpg'),
(3, 'Calamba Doctors Hospital', 'Calamba Doctors Hospital, KM 49, San Cristobal Bridge, Calamba, 4027 Laguna', '14.226040', '121.151500', '121.151500', '2022-02-14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotlines`
--

CREATE TABLE `tbl_hotlines` (
  `id` int(11) NOT NULL,
  `fld_agency` varchar(255) DEFAULT NULL,
  `fld_contact` varchar(255) DEFAULT NULL,
  `fld_special` varchar(255) DEFAULT NULL,
  `fld_area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hotlines`
--

INSERT INTO `tbl_hotlines` (`id`, `fld_agency`, `fld_contact`, `fld_special`, `fld_area`) VALUES
(1, 'Philippine Red Cross', '143', 'Humanitarian aid / Blood donation', 'Nationwide'),
(3, 'Philippine National Police', '117 / 911', 'Police', 'Nationwide'),
(5, 'Bureau of Fire Protection', '160 / 911', 'Firefighting', 'Nationwide'),
(6, 'National Complaint Hotline', '8888', 'Public Service', 'Nationwide'),
(7, 'Department of Health', '1555', 'Medical emergency', 'Nationwide'),
(8, 'Land Transportation Franchising and Regulatory Board', '1342', 'Public transport', 'Nationwide'),
(9, 'Metropolitan Manila Development Authority', '136', 'Road Traffic Safety', 'Metro Manila');

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
(6, 1, 6, '2023-11-06 21:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `fld_writer` varchar(255) DEFAULT NULL,
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

INSERT INTO `tbl_news` (`id`, `fld_writer`, `fld_category`, `fld_title`, `fld_content`, `fld_mainimage`, `fld_images`, `fld_datetime`) VALUES
(6, 'Gabriel Coronado', 'News Info', 'Water Interruption in October 24-25', 'Nam beatae saepe qui odit sapiente et ducimus beatae? Ut obcaecati reprehenderit non iure officiis ut voluptates alias et vitae maiores et maiores sequi nam voluptatem consequatur. Aut consequatur beatae ut quae voluptas et numquam aspernatur rem quidem autem qui labore dignissimos cum esse perferendis.\r\n\r\nSit laboriosam nobis qui rerum quas non optio repudiandae. In harum dolores vel error omnis ex facilis deleniti aut quod galisum. At voluptas mollitia aut eaque nulla aut voluptatem tempore cum quod sunt!', 'download.jpg', '', '2023-10-13 13:17:33'),
(7, 'Gabriel Coronado', 'Business', 'New Cafe in Los Banos, Laguna', 'Id accusantium odit sit accusamus quasi aut maiores nemo cum omnis ducimus est rerum mollitia qui blanditiis dolor! Cum modi labore ex provident ratione ut quia architecto non eaque commodi.\r\n\r\nQui velit earum eum nulla provident ut quae enim est voluptate repellendus nam eligendi tempore At velit obcaecati non dignissimos esse. Ut voluptas nobis est nihil ullam et voluptatibus eligendi et autem dicta nam modi veritatis. Sit vitae adipisci qui dolor perspiciatis sed facilis voluptatem a quas magni sed dolores similique aut saepe voluptas et magni culpa. In voluptas reiciendis id optio itaque in nobis quia non enim excepturi ab consequuntur animi et maiores facilis.', 'cafe-scaled-e1654147258161.jpg', 'Screenshot 2023-10-13 132657.png,hota-cafe-45-jpg.jpg', '2023-10-13 13:28:25'),
(8, 'Gabriel Coronado', 'Lifestyle', 'Drinking tea helps a man for his medication to cure his disease', 'Lorem ipsum dolor sit amet. Et consequatur enim ut corrupti cumque et quisquam voluptatem est veniam harum. In blanditiis repellat ut architecto quod eos eaque recusandae. Ut nesciunt perspiciatis et consequatur corrupti et magnam galisum. Et autem ipsam ab deserunt accusantium eos sint dolor ut tempore voluptatem eum vero numquam!\r\n\r\nQui dolores corrupti ab aliquid facere et aliquid vitae. Sed dolor esse est similique nobis qui earum corrupti eum quod tempore et laborum obcaecati eum debitis perferendis? Aut saepe architecto vel explicabo quasi in harum aperiam.', '20191024-reduce-inflammation-with-this-breathing-exercise.jpg', '', '2023-10-13 13:30:22'),
(9, 'Gabriel Coronado', 'Entertainment', 'New Rising Artist', 'Et magni soluta aut corporis mollitia a dignissimos velit et repudiandae asperiores! Cum voluptatem facere sed tempora ratione non autem praesentium et unde aspernatur.\r\n\r\nVel accusamus dolor a soluta animi eum enim voluptas 33 alias quia non consequatur rerum. Qui facilis illum ut nihil neque et excepturi rerum et nesciunt rerum aut iste sunt.\r\n\r\nUt galisum atque in veritatis nisi est provident temporibus cum expedita sint qui repudiandae perferendis. Ut quas totam aut repellat officia in molestias dolor et repudiandae magni est autem pariatur aut galisum voluptatem. Nam reprehenderit laborum ut quia expedita non velit voluptas. Sit fuga aliquid qui deserunt voluptatem qui rerum earum ut minima eveniet non adipisci porro qui autem voluptas qui ipsum dolorem.', 'Screenshot 2023-10-14 094305.png', '', '2023-10-13 13:33:31'),
(10, 'Gabriel Coronado', 'Technology', 'New device with the implementation of AI', 'Lorem ipsum dolor sit amet. Id porro nulla qui debitis minima sit possimus minus sed animi maiores. Id perspiciatis exercitationem qui voluptatibus voluptatibus qui porro dolor et quibusdam voluptas aut reprehenderit voluptatem et provident consequatur. Eum iste quam At consequatur ipsa rem internos quidem ut animi nihil ut debitis vitae est nesciunt molestias. Vel consequatur vero ut consectetur galisum et magnam voluptates qui error magnam qui cumque quia.\r\n\r\nId fugit amet aut eligendi repudiandae et harum officiis et magnam voluptas sit ipsa incidunt. Quo aspernatur laborum ex voluptatem explicabo nam aspernatur vitae aut autem vitae nam ipsa dolores et voluptatem nisi ut maiores voluptas.', 'Screenshot 2023-10-13 133615.png', '', '2023-10-13 13:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replies`
--

CREATE TABLE `tbl_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `fld_content` varchar(1000) DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_replies`
--

INSERT INTO `tbl_replies` (`id`, `user_id`, `comment_id`, `fld_content`, `fld_datetime`) VALUES
(5, 2, 1, 'satru lang ', '2023-11-06 22:35:02');

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
(4, 1, 6, '2023-11-08 10:46:01');

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
(2, 1, 2, 5, 5, 4, 4, 'Best hotel I\'ve checked in so far.', '2023-10-12 16:09:59'),
(3, 1, 10, 5, 4, 4, 5, 'Price are reasonable. Good Place', '2023-10-12 16:08:34'),
(4, 1, 4, 5, 4, 3, 5, 'The place is nice. Many swimming pools. Perfect for a summer outing.', '2023-10-12 16:10:47'),
(5, 2, 10, 4, 4, 3, 4, 'Love everything. Accomodating place.', '2023-10-12 16:05:00'),
(6, 1, 6, 5, 5, 5, 5, 'Foods are nice. Not too expensive. Definitely would visit again ', '2023-10-12 16:11:59');

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
  `fld_name` varchar(255) DEFAULT NULL,
  `fld_address` varchar(255) DEFAULT NULL,
  `fld_latitude` varchar(255) DEFAULT NULL,
  `fld_longitude` varchar(255) DEFAULT NULL,
  `fld_mainimage` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stores`
--

INSERT INTO `tbl_stores` (`id`, `fld_name`, `fld_address`, `fld_latitude`, `fld_longitude`, `fld_mainimage`) VALUES
(1, '7/11 - 790 Santa Cruz 2', 'National Hwy, Santa Cruz, Laguna', '14.185190', '121.172210', 'Screenshot 2023-09-14 123916.png'),
(3, 'Super 8 Grocery Warehouse - United (San Pedro)', 'Lot 3-A-2 National Highway, San Antonio, San Pedro, Laguna', '14.185190', '121.172210', 'San02.jpg');

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
  `fld_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stories`
--

INSERT INTO `tbl_stories` (`id`, `writer_id`, `fld_writer`, `fld_title`, `fld_content`, `fld_storyimages`, `fld_date`) VALUES
(1, 1, 'Gabriel', 'Notice for Everyone', 'Please be kind in this platform', '', '2023-10-02 22:56:50'),
(2, 1, 'Gabriel', 'Lake Exploration', 'Masaya dito. Malamig ang tubig.', '11879230_1597588673602319_7971371304641951705_o.jpg', '2023-10-02 22:57:31'),
(3, 1, 'Gabriel', 'Try Video', 'This is an mp4 file.', '0914.mp4', '2023-10-02 22:58:07'),
(5, 2, 'John', 'New Member', 'Hello. I just joined this community. Looking for travel buddy', '', '2023-10-02 23:22:43'),
(6, 2, 'John', 'Anakalang Festival', 'What a fun experience !!', 'AnaKalang_Streetdancers.jpg,Laguna-Ana-Kalang-Festival7.jpg,IMG_0530-4-1024x768.jpg', '2023-10-02 23:24:44'),
(14, 1, 'Admin - Gabriel ', 'Let\'s Go ', 'Who wants to travel with me?', '', '2023-10-09 21:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tips`
--

CREATE TABLE `tbl_tips` (
  `id` int(11) NOT NULL,
  `fld_writer` varchar(255) DEFAULT NULL,
  `fld_title` varchar(255) DEFAULT NULL,
  `fld_content` mediumtext DEFAULT NULL,
  `fld_mainimage` varchar(500) DEFAULT NULL,
  `fld_images` mediumtext DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tips`
--

INSERT INTO `tbl_tips` (`id`, `fld_writer`, `fld_title`, `fld_content`, `fld_mainimage`, `fld_images`, `fld_datetime`) VALUES
(3, 'Gabriel Coronado', 'How To Go To Nagcarlan From Lipa', '1. Ride a van to san pablo.\r\n2. Near the cathedral, ride a jeep to nagcarlan.\r\n\r\nEst enim modi ad cumque iusto est dolore odio ea quia quasi. Non officiis impedit cum dolorem natus in voluptatem facilis sit temporibus quia est itaque beatae ut consequatur molestiae sit ratione ducimus. Ut soluta velit a impedit asperiores qui natus veritatis eum itaque quidem ut fugiat alias.\r\n\r\nEx corrupti ipsam rem debitis veritatis est quia atque vel reprehenderit recusandae ut molestiae illo et voluptatem labore 33 minus distinctio. Et mollitia fuga qui consequuntur consequatur qui odit dolorem et saepe velit? Non numquam galisum est maxime rerum qui pariatur perspiciatis.', '', '', '2023-09-12 19:42:13'),
(5, 'Head_Admin', 'Essential travel safety tips', 'Travel can be an exciting, eye-opening experience. It’s easy to get caught up in the thrill of adventure. But don’t forget about travel security and safety considerations while you’re abroad.\r\n\r\nFollow these 7 travel safety tips to help you take a trip that’s memorable for all the right reasons.\r\n\r\n1. Do your research\r\nGet to know your destination in depth before you arrive. Read traveler reviews and consult with locals for information about the safest neighborhoods, places to stay and incidences of crime. Check the State Department\'s website for country updates and enroll in the Smart Traveler Enrollment Program (STEP).\r\n\r\nAnother important travel security precaution is to know whom to call in an emergency. Get the contact information for the nearest embassy or consulate, police station, and other local emergency departments.\r\n\r\n2. Don’t draw attention\r\nPeople who look like they’re from out of town are especially vulnerable to crime, so try to blend in as much as you can. Choose inconspicuous clothing that won\'t attract attention. Be discreet when looking at maps and approach people carefully if you need to ask for directions.\r\n\r\nAlso consider investing in protective clothing and gear that will make it more difficult for pickpockets to steal money and other personal items.\r\n\r\n3. Make copies of important documents\r\nYou never know when you might need a copy of your passport, driver’s license or another form of identification. Scan these documents to save online and print out several hard copies. That way, you won’t be scrambling to find proper documentation if you need to get home.\r\n\r\n4. Keep your friends and family updated\r\nNo matter whether you’re going, on an overnight jaunt or a month-long international journey, it’s always a good idea to let friends or family back home know. Before you leave, send a copy of your itinerary to a few trusted people who can keep tabs on your whereabouts. Check in regularly with your contacts so they know you’re where you’re supposed to be.\r\n\r\n5. Be wary of public Wi-Fi\r\nDon’t let the convenience of Internet access cloud your judgment. When you use public Wi-Fi, hackers looking to steal valuable information can access your data including credit card or Social Security numbers. If you do need wireless Internet service, set up a virtual private network (VPN) that will allow you to access the Internet securely while traveling.\r\n\r\n6. Safeguard your hotel room\r\nEven if your hotel has strong security measures in place, there are steps you can take to make your room safer. Lock and dead-bolt the door and keep your windows shut. You can buy a jammer, which is a portable device that slips under the door for another layer of protection.\r\n\r\nTry to give the impression that you’re in your room even when you’re away, such as placing the Do Not Disturb sign on the outside of your door and keeping the blinds or windows closed.\r\n\r\nDon’t let any strangers into your room, even if they say they work for the hotel. You can always call the front desk to check whether someone was ordered by hotel staff to come to your room.\r\n\r\n7. Be aware of your surroundings\r\nDon’t let your guard down to snap the perfect picture for your social media platforms. Keep an eye on your personal belongings at all times and use good judgment when talking to strangers. A big part of the joy of traveling is the opportunities it affords to meet new people and learn about their cultures. But if someone near you is acting suspiciously, or if you feel uncomfortable, leave the area immediately.\r\n\r\nFollowing these tips can help you travel safely, but no matter how many precautions you take the unexpected can always happen. Stay protected with travel insurance from Nationwide, and get peace of mind no matter where you go.\r\n\r\nSource: https://www.nationwide.com/lc/resources/home/articles/travel-safety-tips', '', '', '2023-10-14 10:52:01'),
(6, 'Head_Admin', 'How to Get Found if You’re Lost in the Woods', 'How to Get Found if You’re Lost in the Woods\r\n\r\nKnowing how to get found if you’re lost in the woods could save your life in the backcountry.\r\n\r\n\r\nExcerpted and adapted from Essential Guide to Winter Recreation, from AMC Books.\r\n\r\nGetting lost in the woods can happen to anyone, especially in the winter and even to the most seasoned hiker. You make a wrong turn, you lose your bearings in whiteout conditions, or you accidentally get separated from your group. If you find yourself lost in the woods, don’t panic! The most important thing you can do is keep a positive mental attitude (PMA). According to survival experts, PMA allows you to combat stress, think more clearly, and make better and safer decisions, increasing your chances of getting found. Also consider that, despite the cold, winter can actually help lost persons get found in a variety of ways. You can often trace your own footprints back to camp or to the correct trail, and others can track your footprints to find you more easily. Winter clothes are also often colorful and bright, making it easier for rescuers to spot you. If you’re certain you’re lost, you can take many steps to help yourself. The following is an easy-to-follow guide for how to get found.\r\n\r\n \r\n\r\nBlow Your Whistle. Every hiker should have a whistle for just this purpose. Three short blasts is the universal distress signal.\r\n\r\nMark Your Territory. It’s a good idea to make yourself as visible as possible. If you’re in the woods, hang brightly colored clothing or stuff sacks or whatever you can spare from trees. These items help searchers spot you. At night, hang cyalume sticks (a.k.a. glow sticks), if you have them. Build a fire. Not only does a fire provide heat and comfort, it sends up smoke signals during the day and casts a glow at night.\r\n\r\n\r\nAlways enter the backcountry prepared to spend an unexpected night in the woods.\r\n\r\n\r\nBuild Camp. In most cases, it’s best to stay in one place, unless you are confident of your navigation skills. The other members of your group are probably already looking for you, and it’s likely they are not far away. Keeping an eye on the time and the weather conditions, consider the chance you’ll be out overnight. By midafternoon, you should establish a camp, setting up some sort of shelter. If you have your backpack and all of the supplies you need, put up your tent. It’s another spot of color, and you’ll be prepared come nightfall. If not, start looking for natural shelter. This might mean a spot beneath a dense evergreen, if the conditions are right; an overhang; or a snow den. Try to find some sort of natural insulator to keep yourself off the ground. Boughs are ideal for this. Cut or break off some leafy branches from nearby conifers and arrange them in layers for a bed. If you don’t have a sleeping bag, find as much dry, natural material—leaves, moss, etcetera—as you can and fill your jacket with it. Believe it or not, this will keep you warmer. One of the simplest, most effective shelters is a lean-to built of evergreen branches with a fire in front of it.\r\n\r\nWalk with a Plan. If you think you are capable of self-rescue, make a plan. Aimless walking only gets you more lost, more tired, and even farther away from your group. Consult your map and compass if you have one. See if you can identify any nearby landmarks. Try to recall how you ended up where you are. Did you cross a trail or see a body of water? Do your best to pinpoint your location on a map and look for logical routes out. If you don’t have a map, study the landscape around you. Do you recognize any features? Listen. Can you hear water or a road?\r\n\r\n\r\nSearch for a more familiar area by incrementally hiking in each of the cardinal directions, marking your steps as you go.\r\n \r\n\r\nFind Your Way Out. If all else fails, it makes sense to search for a more familiar area by incrementally hiking in each of the cardinal directions. Starting from your base camp, walk five minutes in the direction you think is most likely to bring you to a recognizable place. Mark your way, either by prints, building snow cairns, or using branches arranged in an arrow. Blow your whistle as you go. If you don’t see anything you recognize, turn back to your base camp. Do the same in the opposite direction, going for five minutes and creating a path. Again, if you find nothing, turn back for camp. Move out in the other two directions for five minutes each. If you still can’t find anything useful, try hiking in the first direction again, going five minutes farther this time. Repeat this grid until you come across a landmark or a trail, always returning to your base camp and always blowing your whistle.  Keep your ears tuned for water or human-made sounds. This approach, if performed in a disciplined manner, can help you find your way out of the woods, but it can also get you further lost, so be cautious and keep a clear head. The beauty of the cross grid is that even if you can’t find your way out, you’ve created trails leading rescuers directly to your location.\r\n\r\nSource: https://www.outdoors.org/resources/amc-outdoors/outdoor-resources/how-to-get-found-if-youre-lost-in-the-woods/', '', 'Maine-Woods-at-night-Photo-by-Paula-Champagne-e1610742520364.jpg,Picture1.png', '2023-10-14 10:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fld_username` varchar(255) NOT NULL,
  `fld_password` varchar(255) NOT NULL,
  `fld_name` varchar(255) NOT NULL,
  `fld_email` varchar(255) NOT NULL,
  `fld_profpic` varchar(1000) DEFAULT NULL,
  `fld_about` mediumtext DEFAULT NULL,
  `fld_code` varchar(255) NOT NULL,
  `fld_datejoin` date DEFAULT NULL,
  `fld_isVerified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fld_username`, `fld_password`, `fld_name`, `fld_email`, `fld_profpic`, `fld_about`, `fld_code`, `fld_datejoin`, `fld_isVerified`) VALUES
(1, 'officialFordaTravel', 'fordatravel01', 'Gabriel ', 'jg.coronado417@gmail.com', '327138716_778157324020525_4845879566629566879_n.jpg', 'Hi. Im the head admin and creator of FordaTravel. ', 'ff8204cb43083daa01429c13d01b92b0', '2023-10-01', 1),
(2, 'wanderer_', 'coronado01', 'John', 'gabrielcoronado4195@gmail.com', '356947160_1355861375317124_4860952877241839812_n.jpg', 'I like to travel.', 'f8bcda2ff46c429f709a470e94154a9c', '2023-10-01', 1);

--
-- Indexes for dumped tables
--

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
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `story_id` (`story_id`);

--
-- Indexes for table `tbl_destinations`
--
ALTER TABLE `tbl_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guidelines`
--
ALTER TABLE `tbl_guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotlines`
--
ALTER TABLE `tbl_hotlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `story_id` (`story_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `tbl_reposts`
--
ALTER TABLE `tbl_reposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `story_id` (`story_id`);

--
-- Indexes for table `tbl_reviewsratings`
--
ALTER TABLE `tbl_reviewsratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomfeats`
--
ALTER TABLE `tbl_roomfeats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_appreviews`
--
ALTER TABLE `tbl_appreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_destinations`
--
ALTER TABLE `tbl_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_guidelines`
--
ALTER TABLE `tbl_guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_hotlines`
--
ALTER TABLE `tbl_hotlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_reposts`
--
ALTER TABLE `tbl_reposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_reviewsratings`
--
ALTER TABLE `tbl_reviewsratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_roomfeats`
--
ALTER TABLE `tbl_roomfeats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_appreviews`
--
ALTER TABLE `tbl_appreviews`
  ADD CONSTRAINT `tbl_appreviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_comments_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`id`);

--
-- Constraints for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD CONSTRAINT `tbl_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_likes_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`id`);

--
-- Constraints for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD CONSTRAINT `tbl_replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_replies_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `tbl_comments` (`id`);

--
-- Constraints for table `tbl_reposts`
--
ALTER TABLE `tbl_reposts`
  ADD CONSTRAINT `tbl_reposts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_reposts_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
