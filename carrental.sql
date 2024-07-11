-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2024 at 03:46 PM
-- Server version: 8.0.37
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Show Logs` ()  NO SQL SELECT * FROM logs$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowBrand` ()  NO SQL SELECT * FROM tblbrands$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '8d804a5c53b69a7342c5c3c7ddc5364d', '2024-07-09 11:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `ID` varchar(20) NOT NULL,
  `Name` int NOT NULL,
  `TestM` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int DEFAULT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `Status` int DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `Status`, `PostingDate`, `totalPrice`) VALUES
(11, 'lim@gmail.com', 7, '2024-06-10', '2024-06-12', 0, '2024-07-04 01:45:45', '600000.00'),
(12, 'lim@gmail.com', 7, '2024-06-10', '2024-06-12', 0, '2024-07-04 01:50:38', '600000.00'),
(13, 'lim@gmail.com', 10, '2024-06-10', '2024-06-12', 1, '2024-07-04 06:43:15', '700000.00'),
(14, 'rizal@gmail.com', 12, '2024-07-11', '2024-07-12', 0, '2024-07-10 01:05:10', '200000.00'),
(16, 'rizal@gmail.com', 39, '2024-07-11', '2024-07-12', 0, '2024-07-10 01:13:51', '250000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Toyota', '2021-01-19 16:07:46', '2021-01-20 06:18:48'),
(2, 'Honda', '2021-01-19 16:17:05', '2021-01-22 10:23:13'),
(3, 'Yamaha', '2021-01-19 16:20:31', NULL),
(4, 'Suzuki', '2021-01-19 16:23:50', NULL),
(5, 'Daihatsu', '2021-01-19 16:26:23', NULL),
(6, 'Kawasaki', '2021-01-19 16:29:53', NULL),
(7, 'Mitsubishi', '2021-01-19 16:31:27', NULL),
(8, 'Nissan', '2021-01-20 08:49:01', NULL),
(17, 'BMW', '2024-07-10 03:13:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int NOT NULL,
  `Address` tinytext,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Jl. Kenangan, Sebelah Rumah Pak Lurah Dusun Mangga Muda																				', 'info@gokgok.com', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'M SHOAIB NUMAANULLA BAIG', 'shoaib121@wecars.com', '9008560282', 'Can  I know the exact reason why my booking was declined??', '2021-01-20 05:19:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '										<p align=\"justify\"><font size=\"2\"><strong><font color=\"#990000\">(1) ACCEPTANCE OF TERMS</font><br><br></strong></font></p><ul style=\"outline: none; color: rgb(119, 137, 155); font-family: Proxima-Nova;\"><li style=\"outline: none; font-size: 15px; line-height: 1.5; margin-top: 16px; margin-bottom: 16px;\"><span style=\"font-weight: bold;\">(1.1) The driver of the vehicle shall be considered to be the user and all transactions will be executed solely between the user and Drivezy. The following agreement is between the user and WeCars. The agreement governs the terms and conditions of usage of Drivezy services such as our website, iOS and android application and rental service.</span></li><li style=\"outline: none; font-size: 15px; line-height: 1.5; margin-top: 16px; margin-bottom: 16px;\"><span style=\"font-weight: bold;\">(1.2) Drivezy reserves the right to make any necessary changes in the terms and conditions of the agreement without any prior notice. In the case of any alterations to the agreement, the user will be notified through on the Drivezy website or Mobile Application. An email will also be sent to the user.</span></li><li style=\"outline: none; font-size: 15px; line-height: 1.5; margin-top: 16px; margin-bottom: 16px;\"><span style=\"font-weight: bold;\">(1.3) It is considered that a user has read and agreed to the latest terms and conditions at the time of booking the vehicle. A booking is confirmed once the payment has been processed and any such payment is considered an agreement by the respective user to abide by the terms and conditions mentioned herein. In case a user is found to violate any criteria listed in this document, Drivezy may revoke his/her membership and/or refuse service without any prior notice.</span></li></ul>\r\n										'),
(2, 'Privacy Policy', 'privacy', '<div class=\"vertical-center\" style=\"outline: none; flex: 1 1 0%; min-width: 200px; align-items: center; color: rgb(0, 0, 0); font-family: Proxima-Nova; font-size: medium; background-color: rgb(221, 226, 232);\"><h2 class=\"seperator-line\" style=\"outline: none; color: rgb(31, 45, 61); font-size: 16px; font-weight: 600; line-height: 20px;\">Rent a&nbsp;Car or Bike&nbsp;in&nbsp;Bengaluru</h2><p style=\"outline: none; font-size: 14px; color: rgb(119, 137, 155); line-height: 20px;\">Rent&nbsp;cars for self drive in&nbsp;Bengaluru. WeCars is the most preferred brand for self drive&nbsp;car&nbsp;rentals in&nbsp;Bengaluru.<span style=\"outline: none;\">&nbsp;You can also rent a bike in&nbsp;Bengaluru&nbsp;with Drivezy.</span><span style=\"outline: none;\">&nbsp;Self drive car rentals&nbsp;</span><span style=\"outline: none;\">and&nbsp;</span><span style=\"outline: none;\">self drive bike rental&nbsp;</span><span style=\"outline: none;\">options&nbsp;</span>are getting extremely popular in&nbsp;Bengaluru.<span style=\"outline: none;\">&nbsp;Rent an Activa,&nbsp;</span><span style=\"outline: none;\">Rent a Swift&nbsp;</span><span style=\"outline: none;\">or&nbsp;</span><span style=\"outline: none;\">Rent a Royal Enfield</span>&nbsp;and enjoy the freedom to drive on your own with Drivezy.</p></div><div class=\"vertical-center\" style=\"outline: none; flex: 1 1 0%; min-width: 200px; align-items: center; color: rgb(0, 0, 0); font-family: Proxima-Nova; font-size: medium; background-color: rgb(221, 226, 232);\"><h2 class=\"seperator-line\" style=\"outline: none; color: rgb(31, 45, 61); font-size: 16px; font-weight: 600; line-height: 20px;\">Car or Bike&nbsp;Rental Locations in&nbsp;Bengaluru</h2><div class=\"text-box\" style=\"outline: none; font-size: 14px; color: rgb(119, 137, 155); line-height: 20px;\">Hire a&nbsp;car&nbsp;for self drive from different locations. You can rent a self drive&nbsp;Car or Bike&nbsp;from these locations in&nbsp;Bengaluru:<ul class=\"list list-item\" style=\"outline: none; line-height: 17px; display: flex; flex-wrap: wrap;\"><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=5&amp;name=Kalyan%20Nagar%20-%20Hormavu%20Junction&amp;description=Kalyan%20Nagar%20-%20Hormavu%20Junction&amp;latitude=13.016656&amp;longitude=77.655193\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Kalyan Nagar - Hormavu Junction</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=139&amp;name=Bommanahalli&amp;description=Bommanahalli&amp;latitude=12.9034&amp;longitude=77.63093\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Bommanahalli</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=140&amp;name=Mysore%20Road%20(Near%20R.V%20College%20of%20Engineering)&amp;description=Mysore%20Road%20(Near%20R.V%20College%20of%20Engineering)&amp;latitude=12.926699&amp;longitude=77.501466\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Mysore Road (Near R.V College of Engineering)</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=147&amp;name=Bellandur%20-%20Green%20Glen%20Layout&amp;description=Bellandur%20-%20Green%20Glen%20Layout&amp;latitude=12.92854977&amp;longitude=77.67241669\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Bellandur - Green Glen Layout</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=163&amp;name=Vijayanagar&amp;description=Vijayanagar&amp;latitude=12.97714806&amp;longitude=77.54511261\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Vijayanagar</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=188&amp;name=Koramangala%20Agara&amp;description=Koramangala%20Agara&amp;latitude=12.924503&amp;longitude=77.651638\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Koramangala Agara</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=1&amp;venue_id=366&amp;name=K%20R%20Puram%20(New)&amp;description=K%20R%20Puram%20(New)&amp;latitude=13.023004&amp;longitude=77.6986\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">K R Puram (New)</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=378&amp;name=Mysore%20Road%20Satellite%20Bus%20Stand&amp;description=Mysore%20Road%20Satellite%20Bus%20Stand&amp;latitude=12.955371&amp;longitude=77.541974\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Mysore Road Satellite Bus Stand</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=433&amp;name=Indiranagar&amp;description=Indiranagar&amp;latitude=12.983759&amp;longitude=77.640111\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Indiranagar</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=463&amp;name=Mathikere&amp;description=Mathikere&amp;latitude=13.027458&amp;longitude=77.559345\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Mathikere</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=1&amp;venue_id=471&amp;name=BTM%20Layout&amp;description=BTM%20Layout&amp;latitude=12.905961&amp;longitude=77.604482\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">BTM Layout</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=475&amp;name=Manpho%20Convention%20Center%20(NEW)&amp;description=Manpho%20Convention%20Center%20(NEW)&amp;latitude=13.0420701&amp;longitude=77.6153623\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Manpho Convention Center (NEW)</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=477&amp;name=Ashwath%20Nagar%20(HBR%20Layout)&amp;description=Ashwath%20Nagar%20(HBR%20Layout)&amp;latitude=13.0408958&amp;longitude=77.626717\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Ashwath Nagar (HBR Layout)</a></span></li><li class=\"list-element\" style=\"outline: none; margin-bottom: 4px; padding-right: 24px; display: flex;\"><span class=\"trigger view\" style=\"outline: none;\"><a class=\"venue-text\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://drivezy.com/Bengaluru/search?booking_type=18&amp;is_bike=0&amp;venue_id=481&amp;name=MS%20Palya%20-%20New&amp;description=MS%20Palya%20-%20New&amp;latitude=13.0873659&amp;longitude=77.5498497\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">MS Palya - New</a></span></li></ul></div></div><div class=\"vertical-center\" style=\"outline: none; flex: 1 1 0%; min-width: 200px; align-items: center; color: rgb(0, 0, 0); font-family: Proxima-Nova; font-size: medium; background-color: rgb(221, 226, 232);\"><h2 class=\"seperator-line\" style=\"outline: none; color: rgb(31, 45, 61); font-size: 16px; font-weight: 600; line-height: 20px;\">Self Drive Rentals in India</h2><p style=\"outline: none; font-size: 14px; color: rgb(119, 137, 155); line-height: 20px;\">WeCars is present in various locations in India:</p><ul class=\"list list-item\" style=\"outline: none; color: rgb(119, 137, 155); font-size: 14px; line-height: 17px; display: flex; flex-wrap: wrap;\"><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Mumbai</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Bengaluru</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Pune</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Mysuru</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;bike</span>&nbsp;in&nbsp;Goa</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Hyderabad</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Nagpur</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Hubli</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Delhi</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Amritsar</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Chandigarh</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Chennai</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Coimbatore</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Madurai</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Tirupur</a></li><li class=\"list-element cursor-pointer pointer\" style=\"outline: none; cursor: pointer; margin-bottom: 4px; padding-right: 24px; display: flex;\"><a class=\"venue-text\" href=\"https://drivezy.com/privacy-policy\" style=\"outline: none; color: rgb(119, 137, 155); transition: color 0.3s ease 0s;\">Rent a<span style=\"outline: none;\">&nbsp;car</span>&nbsp;in&nbsp;Amravati</a></li></ul><p style=\"outline: none; font-size: 14px; color: rgb(119, 137, 155); line-height: 20px;\">WeCars is the most affordable brand that provides self drive cars and self drive bikes for rent across India. Rent a car for self drive, Rent a scooter, hire cars of your choice.</p></div>'),
(3, 'About Us ', 'aboutus', '																														<div><span style=\"color: rgb(119, 137, 155); text-align: justify; font-family: Proxima-Nova;\">The invention of the motor car can be termed as a quantum leap at the peak of the European Industrial Revolution. However, since the days of Karl Benz, little has been done to disrupt the way cars are bought. We at WeCars are on a mission to transform the way cars are purchased, rented and sold. The concept of car rentals is yet to spread its wings in India. As pioneers in the Indian self drive car rental industry, we believe in the mantra-&nbsp;</span><b style=\"text-align: justify; font-family: Proxima-Nova; outline: none; color: rgb(31, 45, 61); opacity: 0.9;\">“Why buy a car, when you can rent one?”</b><br></div><ul class=\"tc-content-section\" style=\"outline: none; color: rgb(0, 0, 0); font-family: Proxima-Nova; font-size: medium;\"><h6 style=\"outline: none; font-weight: 600; margin-top: 24px; font-size: 16px; color: rgb(31, 45, 61);\">WHY WE DO IT?</h6><li class=\"tc-question question-one\" style=\"outline: none; line-height: 2em; font-size: 12px; text-align: justify;\"><div class=\"cd-tc-first\" style=\"outline: none;\"><p class=\"para-content\" style=\"outline: none; margin-bottom: 16px; color: rgb(119, 137, 155); line-height: 2em; font-size: 14px;\">Transport is the backbone of any modern economy. However, rapid motorisation effectuates its own set of issues. While on one hand the burgeoning number of cars on the road has become a menace in metros across India, a number of cities suffer from lack of good urban commuting solutions. The concept of car rentals may be simple, but it holds immense potential. Be it the positive impact of rental cars on the environment or reducing the number of cars out on the streets, the shared economy of self drive car rentals is a promising solution to a number of problems plaguing urban India.</p></div></li><h6 style=\"outline: none; font-weight: 600; margin-top: 24px; font-size: 16px; color: rgb(31, 45, 61);\">HOW WE DO IT?</h6><li class=\"tc-question question-one\" style=\"outline: none; line-height: 2em; font-size: 12px; text-align: justify;\"><div class=\"cd-tc-first\" style=\"outline: none;\"><p class=\"para-content\" style=\"outline: none; margin-bottom: 16px; color: rgb(119, 137, 155); line-height: 2em; font-size: 14px;\">Even the most complex of problems has a simple yet elegant solution. At WeCars&nbsp;we don’t just rent cars, we create products which complete the existing ecosystem. We build technology which provides a comprehensive solution to the issue of urban commute by connecting commuters to vendors in the self drive car rental business. Our vision at WeCars&nbsp;is to provide a platform where car owners can engage customers and conduct business seamlessly. We concentrate our efforts on simplifying the process of hiring cars by creating scalable mechanisms to conduct and facilitate transactions while providing an economical mode of transport to all.</p></div></li></ul>\r\n										\r\n										\r\n										'),
(11, 'FAQs', 'faqs', '										<div><span style=\"color: rgb(22, 32, 64); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\">Kami di GOKGOK, mengembangkan teknologi yang menyediakan solusi menyeluruh untuk masalah perjalanan perkotaan dengan menghubungkan para pengguna dengan penyedia layanan rental kendaraan mandiri. Kami fokus pada penyederhanaan proses penyewaan kendaraan dengan menciptakan mekanisme yang skalabel untuk melakukan dan memfasilitasi transaksi, sekaligus menyediakan moda transportasi yang ekonomis untuk semua.</span><br></div>\r\n										');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(3, 'lim@gmail.com', '2024-07-09 03:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(4, 'shoaib121@wecars.com', 'Had a great experience.', '2021-01-19 17:38:37', 1),
(5, 'caestro@wecars.com', 'Good Service.', '2021-01-20 09:30:50', 0),
(6, 'caestro@wecars.com', 'Bad Service', '2021-01-24 14:51:38', 1),
(7, 'lim@gmail.com', 'yohoho', '2024-07-06 13:50:57', 0),
(8, 'lim@gmail.com', 'kendaraan yang tersedia hampir lengkap, fasilitasnya juga oke', '2024-07-08 01:36:57', 1),
(9, 'rizal@gmail.com', 'Alah web gk jelas', '2024-07-10 11:43:58', 0);

--
-- Triggers `tbltestimonial`
--
DELIMITER $$
CREATE TRIGGER `TestM` BEFORE DELETE ON `tbltestimonial` FOR EACH ROW INSERT INTO logs VALUES(Null, OLD.UserEmail, OLD.Testimonial)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(9, 'Halim', 'lim@gmail.com', '499e0d7e3f2f15a72fb4d114388bcb0a', '0812345678', '', 'Jl. Kenangan', 'Surabaya', 'Indonesia', '2024-07-04 01:44:39', '2024-07-09 17:52:20'),
(10, 'Rizal', 'rizal@gmail.com', '150fb021c56c33f82eef99253eb36ee1', '0812348765', NULL, NULL, NULL, NULL, '2024-07-09 17:53:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehicleType` enum('Mobil','Motor') NOT NULL,
  `VehiclesBrand` int DEFAULT NULL,
  `VehiclesOverview` longtext,
  `PricePerDay` int DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int DEFAULT NULL,
  `SeatingCapacity` int DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `Helmet` tinyint(1) DEFAULT NULL,
  `RainCoat` tinyint(1) DEFAULT NULL,
  `SecurityLock` tinyint(1) DEFAULT NULL,
  `ExtraStorage` tinyint(1) DEFAULT NULL,
  `HandGuard` tinyint(1) DEFAULT NULL,
  `ExtraMirrors` tinyint(1) DEFAULT NULL,
  `EngineGuard` tinyint(1) DEFAULT NULL,
  `KneeGuards` tinyint(1) DEFAULT NULL,
  `ElbowGuards` tinyint(1) DEFAULT NULL,
  `AirConditioner` int DEFAULT NULL,
  `PowerDoorLocks` int DEFAULT NULL,
  `AntiLockBrakingSystem` int DEFAULT NULL,
  `BrakeAssist` int DEFAULT NULL,
  `PowerSteering` int DEFAULT NULL,
  `DriverAirbag` int DEFAULT NULL,
  `PassengerAirbag` int DEFAULT NULL,
  `PowerWindows` int DEFAULT NULL,
  `CDPlayer` int DEFAULT NULL,
  `CentralLocking` int DEFAULT NULL,
  `CrashSensor` int DEFAULT NULL,
  `LeatherSeats` int DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehicleType`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `Helmet`, `RainCoat`, `SecurityLock`, `ExtraStorage`, `HandGuard`, `ExtraMirrors`, `EngineGuard`, `KneeGuards`, `ElbowGuards`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(12, 'Ninja 250', 'Motor', 6, 'Motor sport yang cepat dan stylish.', 200000, 'Bensin', 2021, 2, 'Ninja 250.png', 'Ninja 250.png', 'Ninja 250.png', 'Ninja 250.png', NULL, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-19 16:29:53', '2024-07-11 15:30:06'),
(13, ' Pajero Sport', 'Mobil', 7, 'Mobil SUV yang tangguh dan mewah.', 500000, 'Bensin', 2020, 7, 'pajero.png', 'pajero.png', 'pajero.png', 'pajero.png', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-19 16:31:27', '2024-07-11 12:15:10'),
(14, ' Fortuner', 'Mobil', 1, 'Mobil SUV yang kuat dan elegan.', 450000, 'Diesel', 2020, 7, 'fortuner.png', 'fortuner.png', 'fortuner.png', 'fortuner.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 16:33:39', '2024-07-09 02:06:38'),
(15, ' CR-V', 'Mobil', 2, 'Mobil SUV yang nyaman dan canggih.', 400000, 'Bensin', 2020, 7, 'crv.png', 'crv.png', 'crv.png', 'crv.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 16:34:57', '2024-07-09 02:06:38'),
(17, ' Baleno', 'Mobil', 4, 'Mobil hatchback yang stylish dan irit.', 250000, 'Bensin', 2020, 5, 'baleno.png', 'baleno.png', 'baleno.png', 'baleno.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 16:40:26', '2024-07-09 02:06:38'),
(18, ' Jazz', 'Mobil', 2, 'Mobil hatchback yang sporty dan irit.', 270000, 'Bensin', 2020, 5, 'jazz.png', 'jazz.png', 'jazz.png', 'jazz.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 16:42:04', '2024-07-09 02:06:38'),
(19, ' Yaris', 'Mobil', 1, 'Mobil hatchback yang modern dan irit.', 260000, 'Bensin', 2020, 5, 'yaris.png', 'yaris.png', 'yaris.png', 'yaris.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 16:43:43', '2024-07-09 02:06:38'),
(20, ' Terios', 'Mobil', 5, 'Mobil SUV yang tangguh dan irit.', 350000, 'Bensin', 2020, 7, 'terios.png', 'terios.png', 'terios.png', 'terios.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 16:44:54', '2024-07-09 02:06:38'),
(21, ' X-Trail', 'Mobil', 8, 'Mobil SUV yang nyaman dan bertenaga.', 400000, 'Bensin', 2020, 7, 'xtrail.png', 'xtrail.png', 'xtrail.png', 'xtrail.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 08:49:01', '2024-07-09 02:06:38'),
(22, 'Kijang Innova', 'Mobil', 1, 'Mobil keluarga yang luas dan nyaman.', 350000, 'Diesel', 2020, 7, 'innova.png', 'innova.png', 'innova.png', 'innova.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 08:58:31', '2024-07-08 00:11:41'),
(29, ' Pajero Sport', 'Mobil', 7, 'Mobil SUV yang tangguh dan mewah.', 500000, 'Diesel', 2020, 7, 'pajero.png', 'pajero.png', 'pajero.png', 'pajero.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 09:31:27', '2024-07-09 02:06:38'),
(30, ' Fortuner', 'Mobil', 1, 'Mobil SUV yang kuat dan elegan.', 450000, 'Diesel', 2020, 7, 'fortuner.png', 'fortuner.png', 'fortuner.png', 'fortuner.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 09:33:39', '2024-07-09 02:06:38'),
(31, ' CR-V', 'Mobil', 2, 'Mobil SUV yang nyaman dan canggih.', 400000, 'Bensin', 2020, 7, 'crv.png', 'crv.png', 'crv.png', 'crv.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 09:34:57', '2024-07-09 02:06:38'),
(33, ' Baleno', 'Mobil', 4, 'Mobil hatchback yang stylish dan irit.', 250000, 'Bensin', 2020, 5, 'baleno.png', 'baleno.png', 'baleno.png', 'baleno.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 09:40:26', '2024-07-09 02:06:38'),
(34, ' Jazz', 'Mobil', 2, 'Mobil hatchback yang sporty dan irit.', 270000, 'Bensin', 2020, 5, 'jazz.png', 'jazz.png', 'jazz.png', 'jazz.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 09:42:04', '2024-07-09 02:06:38'),
(35, ' Yaris', 'Mobil', 1, 'Mobil hatchback yang modern dan irit.', 260000, 'Bensin', 2020, 5, 'yaris.png', 'yaris.png', 'yaris.png', 'yaris.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 09:43:43', '2024-07-09 02:06:38'),
(36, ' Terios', 'Mobil', 5, 'Mobil SUV yang tangguh dan irit.', 350000, 'Bensin', 2020, 7, 'terios.png', 'terios.png', 'terios.png', 'terios.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-19 09:44:54', '2024-07-09 02:06:38'),
(37, ' X-Trail', 'Mobil', 8, 'Mobil SUV yang nyaman dan bertenaga.', 400000, 'Bensin', 2020, 7, 'xtrail.png', 'xtrail.png', 'xtrail.png', 'xtrail.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 01:49:01', '2024-07-09 02:06:38'),
(39, 'GSX-R1000', 'Motor', 4, 'Motor yang cocok untuk balap', 250000, 'Pertamax', 2019, 2, 'GSX-R1000.png', 'GSX-R1000.png', 'GSX-R1000.png', 'GSX-R1000.png', '', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-02 02:04:05', '2024-07-09 04:37:12'),
(40, 'M4 Coupe', 'Mobil', 17, 'Best Car', 500000, 'Pertamax', 2024, 2, 'BMW M4 Coupe.png', 'BMW M4 Coupe.png', 'BMW M4 Coupe.png', 'BMW M4 Coupe.png', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-10 03:34:10', '2024-07-11 08:23:56'),
(41, 'Hayabusa', 'Motor', 4, 'Motor yang bagus untuk drag', 300000, 'Solar', 2009, 1, 'Hayabusa.png', 'Hayabusa.png', 'Hayabusa.png', 'Hayabusa.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 03:37:34', NULL),
(42, 'Avanza', 'Mobil', 1, 'Cocok untuk keluarga', 300000, 'Pertalite', 2016, 6, 'Avanza.png', 'Avanza.png', 'Avanza.png', 'Avanza.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 03:55:52', NULL),
(43, 'Brio', 'Mobil', 2, 'Mobil yang cocok untuk keluarga kecil', 400000, 'Pertalite', 2016, 4, 'Brio.png', 'Brio.png', 'Brio.png', 'Brio.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 03:58:35', NULL),
(44, 'NMAX', 'Motor', 3, 'Motor yang cocok untuk berkendara jauh', 100000, 'Pertamax', 2018, 2, 'NMAX.png', 'NMAX.png', 'NMAX.png', 'NMAX.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 04:02:01', NULL),
(45, 'Mio', 'Motor', 3, 'Motor oke untuk berkendara mengelilingi dunia', 75000, 'Pertalite', 2005, 2, 'Mio Mirza.png', 'Mio Mirza.png', 'Mio Mirza.png', 'Mio Mirza.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 04:04:37', NULL),
(46, 'Ertiga', 'Mobil', 4, 'Mobil yang cocok untuk keluarga cemara', 250000, 'Pertalite', 2018, 6, 'Ertiga.png', 'Ertiga.png', 'Ertiga.png', 'Ertiga.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 04:06:37', NULL),
(47, 'Xenia', 'Mobil', 5, 'Mobil yang cocok untuk perjalan jauh', 300000, 'Solar', 2018, 6, 'Xenia.png', 'Xenia.png', 'Xenia.png', 'Xenia.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 04:08:45', NULL),
(52, 'YZF-R1', 'Motor', 3, 'Wiiiii', 100000, 'Pertamax', 2020, 2, 'YZF-R1.png', 'YZF-R1.png', 'YZF-R1.png', 'YZF-R1.png', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11 13:22:12', NULL),
(53, 'YZF-R1', 'Motor', 3, 'Suuuuu', 150000, 'Pertamax', 2020, 2, 'YZF-R1.png', 'YZF-R1.png', 'YZF-R1.png', 'YZF-R1.png', '', 1, 1, 1, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11 14:11:17', NULL),
(54, 'YZF-R1', 'Motor', 3, 'Suuuuu', 150000, 'Pertamax', 2020, 2, 'YZF-R1.png', 'YZF-R1.png', 'YZF-R1.png', 'YZF-R1.png', '', 1, 1, 1, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11 14:21:39', NULL),
(55, 'M4 Coupe', 'Mobil', 17, 'mobil keren nih', 1000000, 'Pertamax', 2024, 2, 'BMW M4 Coupe.png', 'BMW M4 Coupe.png', 'BMW M4 Coupe.png', 'BMW M4 Coupe.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2024-07-11 15:02:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
