-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2020 at 12:04 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `national_metro_mind`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_tokens`
--

CREATE TABLE `api_tokens` (
  `apiTokenId` bigint(20) UNSIGNED NOT NULL,
  `uniqueId` bigint(20) NOT NULL,
  `loginType` int(1) NOT NULL COMMENT '1 - Patient, 2-  Doctor',
  `deviceRegistrationId` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incomingToken` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_tokens`
--

INSERT INTO `api_tokens` (`apiTokenId`, `uniqueId`, `loginType`, `deviceRegistrationId`, `token`, `incomingToken`, `created`) VALUES
(33, 0, 0, '123456', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE1ODM5MTA4MDJNRVRST01JTkRQMSI.HWtp_ri8Ed4uCTguiIzb6FIqklS7g22kz9ZjRMrLnms', '', '2020-03-11 07:13:23'),
(103, 0, 0, '12345', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE1ODQ4NzA5NTRNRVRST01JTkRQMSI.2DoAs3cQrV_Pnk-20mdOWaHWcpSEikTEulssLKweOak', '', '2020-03-22 09:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `axadmin`
--

CREATE TABLE `axadmin` (
  `adminId` bigint(11) NOT NULL,
  `adminName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminEmail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminType` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axadmin`
--

INSERT INTO `axadmin` (`adminId`, `adminName`, `userName`, `password`, `adminEmail`, `adminType`, `status`) VALUES
(1, 'Administrator', 'admin', '6c89e4cc6544789cc02e8676490a3b5af14ebc6c8ebe139a4a07d441522d25a6df35dfeebd2c54b1c78b35f06e974cb49604d3ca138da94997a7a6ec4296a4f2aHw5mygBviZkJQry9k/0jrISrUOBTInWH/J0aIbsR6w=', 'jinu@ekselan.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `axappointments`
--

CREATE TABLE `axappointments` (
  `appointmentId` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `requestDate` date NOT NULL,
  `requestSession` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentSession` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insDate` datetime NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-requested,1-approved,2-rejected',
  `isCompleted` int(1) NOT NULL,
  `completedTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axappointments`
--

INSERT INTO `axappointments` (`appointmentId`, `patientId`, `doctorId`, `requestDate`, `requestSession`, `appointmentDate`, `appointmentSession`, `insDate`, `status`, `isCompleted`, `completedTime`) VALUES
(1, 1, 1, '2020-03-12', 'Evening', '0000-00-00', 'Morning', '2020-03-11 11:35:32', 3, 1, '2020-03-11 15:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `axavailablesessions`
--

CREATE TABLE `axavailablesessions` (
  `availabletSessionId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `availableDay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableSession` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableStartTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableEndTime` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axavailablesessions`
--

INSERT INTO `axavailablesessions` (`availabletSessionId`, `doctorId`, `availableDay`, `availableSession`, `availableStartTime`, `availableEndTime`, `status`) VALUES
(7, 102, 'Monday', 'Morning', '01:00:00', '01:00:00', 0),
(8, 102, 'Monday', 'Night', '01:00:00', '12:00:00', 0),
(9, 102, 'Thursday', 'Morning', '01:00:00', '01:00:00', 0),
(10, 102, 'Thursday', 'After Noon', '01:00:00', '00:00:00', 0),
(11, 102, 'Friday', 'After Noon', '01:00:00', '00:00:00', 0),
(142, 41, 'Monday', 'Morning', '08:30', '09:00', 0),
(143, 41, 'Saturday', 'Morning', '10:00', '10:00', 0),
(144, 41, 'Sunday', 'Morning', '10:30', '10:30', 0),
(177, 22, 'Monday', 'Morning', '09:00', '10:00', 0),
(178, 22, 'Monday', 'After Noon', '09:30', '08:30', 0),
(179, 22, 'Friday', 'Evening', '01:00', '12:00', 0),
(180, 22, 'Saturday', 'Night', '01:00', '01:30', 0),
(181, 22, 'Sunday', 'Morning', '09:30', '09:30', 0),
(182, 22, 'Sunday', 'Night', '08:30', '09:00', 0),
(183, 21, 'Monday', 'Morning', '12:30', '02:30', 0),
(184, 21, 'Wednesday', 'Morning', '10:30', '08:00', 0),
(187, 19, 'Monday', 'Morning', '07:30', '08:00', 0),
(188, 18, 'Monday', 'Morning', '09:00', '08:30', 0),
(190, 11, 'Monday', 'Morning', '08:00', '08:00', 0),
(191, 11, 'Monday', 'Evening', '10:00', '09:30', 0),
(192, 2, 'Monday', 'Morning', '10:30', '08:00', 0),
(202, 20, 'Monday', 'Morning', '08:00', '08:00', 0),
(203, 20, 'Monday', 'Evening', '07:00', '07:30', 0),
(231, 103, 'Monday', 'Morning', '12:30', '02:00', 0),
(232, 103, 'Monday', 'After Noon', '04:00', '01:30', 0),
(233, 103, 'Monday', 'Evening', '04:30', '01:30', 0),
(234, 103, 'Monday', 'Night', '02:30', '12:30', 0),
(235, 103, 'Tuesday', 'Morning', '11:30', '07:30', 0),
(236, 103, 'Tuesday', 'Evening', '09:00', '10:00', 0),
(237, 103, 'Sunday', 'Morning', '10:30', '10:00', 0),
(265, 1, 'Monday', 'Morning', '08:30', '06:30', 0),
(266, 1, 'Monday', 'Evening', '09:00', '08:30', 0),
(267, 1, 'Tuesday', 'Morning', '07:00', '08:30', 0),
(268, 1, 'Tuesday', 'Evening', '07:00', '08:00', 0),
(269, 1, 'Wednesday', 'Morning', '07:30', '07:00', 0),
(270, 1, 'Wednesday', 'Evening', '05:30', '01:00', 0),
(271, 1, 'Thursday', 'Morning', '01:00', '02:00', 0),
(272, 1, 'Friday', 'Morning', '12:00', '01:00', 0),
(273, 1, 'Saturday', 'Morning', '09:30', '08:00', 0),
(289, 104, 'Monday', 'Morning', '09:30', '11:00', 0),
(290, 104, 'Monday', 'Evening', '05:00', '06:30', 0),
(291, 104, 'Monday', 'Night', '08:30', '10:00', 0),
(292, 104, 'Tuesday', 'Morning', '10:30', '11:00', 0),
(293, 104, 'Tuesday', 'Night', '07:00', '10:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `axcms`
--

CREATE TABLE `axcms` (
  `pageId` bigint(20) NOT NULL,
  `pageName` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `shortDescription` longtext CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-active,0-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axcms`
--

INSERT INTO `axcms` (`pageId`, `pageName`, `description`, `shortDescription`, `status`) VALUES
(1, 'Privacy Policy', 'COMING SOON !!!', '', 1),
(2, 'Faq', 'COMING SOON !!!', '', 1),
(3, 'About us', '<p open=\"\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; width: 510px; color: rgb(135, 138, 137); font-size: 14px; line-height: 23px; text-align: justify; font-family: \">\r\n	Metro Mind is the brain child of a team of doctors<span style=\"font-size: 12px;\">of good mental health and give good </span></p>\r\n<p open=\"\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; width: 510px; color: rgb(135, 138, 137); font-size: 14px; line-height: 23px; text-align: justify; font-family: \">\r\n	<span style=\"font-size: 12px;\">services&nbsp;&nbsp;</span><span style=\"font-size: 12px;\">with experienced doctors</span></p>\r\n<p open=\"\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; width: 510px; color: rgb(135, 138, 137); font-size: 14px; line-height: 23px; text-align: justify; font-family: \">\r\n	&nbsp;</p>\r\n', '<p>\r\n	<span font-size:=\"\" open=\"\" style=\"color: rgb(135, 138, 137); font-family: \" text-align:=\"\">We, at the Metro Mind strive to the cause</span></p>\r\n<p>\r\n	<span font-size:=\"\" open=\"\" style=\"color: rgb(135, 138, 137); font-family: \" text-align:=\"\">of good mental health</span></p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `axcountries`
--

CREATE TABLE `axcountries` (
  `countryId` bigint(20) NOT NULL,
  `countryCode` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencyCode` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonePrefix` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TLD` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smallFlag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bigFlag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newCountryCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axcountries`
--

INSERT INTO `axcountries` (`countryId`, `countryCode`, `country`, `capital`, `currencyCode`, `phonePrefix`, `TLD`, `smallFlag`, `bigFlag`, `otherName`, `newCountryCode`) VALUES
(1, '13', 'Channel Island', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/13.gif', 'https://metromind.com/uploads/icons/gif1/13.png', '', '111'),
(2, '25', 'Hawaii', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/25.gif', 'https://metromind.com/uploads/icons/gif1/25.png', 'Islands Of Aloha', '120'),
(3, '33', 'Lord Howe Island', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/33.gif', 'https://metromind.com/uploads/icons/gif1/33.png', '', '128'),
(4, '35', 'Maderia Islands', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/35.gif', 'https://metromind.com/uploads/icons/gif1/35.png', '', '130'),
(5, '36', 'Macaronesia', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/36.gif', 'https://metromind.com/uploads/icons/gif1/36.png', '', '129'),
(6, '38', 'Marinas Island', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/38.gif', 'https://metromind.com/uploads/icons/gif1/38.png', '', '131'),
(7, '39', 'Palestine', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/39.gif', 'https://metromind.com/uploads/icons/gif1/39.png', '', 'PSE'),
(8, '42', 'Rodriguez Island', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/42.gif', 'https://metromind.com/uploads/icons/gif1/42.png', '', '138'),
(9, '45', 'Scott Island', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/45.gif', 'https://metromind.com/uploads/icons/gif1/45.png', '', '140'),
(10, '47', 'Trindade And Martim Vaz', NULL, NULL, NULL, NULL, 'https://metromind.com/uploads/icons/gif/47.gif', 'https://metromind.com/uploads/icons/gif1/47.png', '', '145'),
(11, '53', 'Antarctic British Islands', '', NULL, NULL, NULL, '', '', '', '147'),
(12, 'AD', 'Andorra', 'Andorra la Vella', 'EUR', '376', '.ad', 'https://metromind.com/uploads/icons/gif/ad.gif', 'https://metromind.com/uploads/icons/gif1/ad.png', '', 'AND'),
(13, 'AE', 'United Arab Emirates', 'Abu Dhabi', 'AED', '971', '.ae', 'https://metromind.com/uploads/icons/gif/ae.gif', 'https://metromind.com/uploads/icons/gif1/ae.png', 'UAE', 'ARE'),
(14, 'AF', 'Afghanistan', 'Kabul', 'AFN', '93', '.af', 'https://metromind.com/uploads/icons/gif/af.gif', 'https://metromind.com/uploads/icons/gif1/af.png', '', 'AFG'),
(15, 'AG', 'Antigua And Barbuda', 'St. Johns', 'XCD', '+1-268', '.ag', 'https://metromind.com/uploads/icons/gif/ag.gif', 'https://metromind.com/uploads/icons/gif1/ag.png', '', 'ATG'),
(16, 'AL', 'Albania', 'Tirana', 'ALL', '355', '.al', 'https://metromind.com/uploads/icons/gif/al.gif', 'https://metromind.com/uploads/icons/gif1/al.png', '', 'ALB'),
(17, 'AM', 'Armenia', 'Yerevan', 'AMD', '374', '.am', 'https://metromind.com/uploads/icons/gif/am.gif', 'https://metromind.com/uploads/icons/gif1/am.png', 'Hayastan', 'ARM'),
(18, 'AO', 'Angola', 'Luanda', 'AOA', '244', '.ao', 'https://metromind.com/uploads/icons/gif/ao.gif', 'https://metromind.com/uploads/icons/gif1/ao.png', '', 'AGO'),
(19, 'AQ', 'Antarctica', '', '', '', '.aq', 'https://metromind.com/uploads/icons/gif/aq.gif', 'https://metromind.com/uploads/icons/gif1/aq.png', '', 'ATA'),
(20, 'AR', 'Argentina', 'Buenos Aires', 'ARS', '54', '.ar', 'https://metromind.com/uploads/icons/gif/ar.gif', 'https://metromind.com/uploads/icons/gif1/ar.png', '', 'ARG'),
(21, 'AT', 'Austria', 'Vienna', 'EUR', '43', '.at', 'https://metromind.com/uploads/icons/gif/at.gif', 'https://metromind.com/uploads/icons/gif1/at.png', '', 'AUT'),
(22, 'AU', 'Australia', 'Canberra', 'AUD', '61', '.au', 'https://metromind.com/uploads/icons/gif/au.gif', 'https://metromind.com/uploads/icons/gif1/au.png', '', 'AUS'),
(23, 'AZ', 'Azerbaijan', 'Baku', 'AZN', '994', '.az', 'https://metromind.com/uploads/icons/gif/az.gif', 'https://metromind.com/uploads/icons/gif1/az.png', '', 'AZE'),
(24, 'BA', 'Bosnia And Herzegovina', 'Sarajevo', 'BAM', '387', '.ba', 'https://metromind.com/uploads/icons/gif/ba.gif', 'https://metromind.com/uploads/icons/gif1/ba.png', '', 'BIH'),
(25, 'BB', 'Barbados', 'Bridgetown', 'BBD', '+1-246', '.bb', 'https://metromind.com/uploads/icons/gif/bb.gif', 'https://metromind.com/uploads/icons/gif1/bb.png', '', 'BRB'),
(26, 'BD', 'Bangladesh', 'Dhaka', 'BDT', '880', '.bd', 'https://metromind.com/uploads/icons/gif/bd.gif', 'https://metromind.com/uploads/icons/gif1/bd.png', '', 'BGD'),
(27, 'BE', 'Belgium', 'Brussels', 'EUR', '32', '.be', 'https://metromind.com/uploads/icons/gif/be.gif', 'https://metromind.com/uploads/icons/gif1/be.png', '', 'BEL'),
(28, 'BF', 'Burkina Faso', 'Ouagadougou', 'XOF', '226', '.bf', 'https://metromind.com/uploads/icons/gif/bf.gif', 'https://metromind.com/uploads/icons/gif1/bf.png', '', 'BFA'),
(29, 'BG', 'Bulgaria', 'Sofia', 'BGN', '359', '.bg', 'https://metromind.com/uploads/icons/gif/bg.gif', 'https://metromind.com/uploads/icons/gif1/bg.png', '', 'BGR'),
(30, 'BH', 'Bahrain', 'Manama', 'BHD', '973', '.bh', 'https://metromind.com/uploads/icons/gif/bh.gif', 'https://metromind.com/uploads/icons/gif1/bh.png', '', 'BHR'),
(31, 'BI', 'Burundi', 'Bujumbura', 'BIF', '257', '.bi', 'https://metromind.com/uploads/icons/gif/bi.gif', 'https://metromind.com/uploads/icons/gif1/bi.png', '', 'BDI'),
(32, 'BJ', 'Benin', 'Porto-Novo', 'XOF', '229', '.bj', 'https://metromind.com/uploads/icons/gif/bj.gif', 'https://metromind.com/uploads/icons/gif1/bj.png', '', 'BEN'),
(33, 'BL', 'Saint Barthelemy', 'Gustavia', 'EUR', '590', '.gp', 'https://metromind.com/uploads/icons/gif/bl.gif', 'https://metromind.com/uploads/icons/gif1/bl.png', '', 'BLM'),
(34, 'BN', 'Brunei', 'Bandar Seri Begawan', 'BND', '673', '.bn', 'https://metromind.com/uploads/icons/gif/bn.gif', 'https://metromind.com/uploads/icons/gif1/bn.png', '', 'BRN'),
(35, 'BO', 'Bolivia', 'Sucre', 'BOB', '591', '.bo', 'https://metromind.com/uploads/icons/gif/bo.gif', 'https://metromind.com/uploads/icons/gif1/bo.png', '', 'BOL'),
(36, 'BR', 'Brazil', 'Brasilia', 'BRL', '55', '.br', 'https://metromind.com/uploads/icons/gif/br.gif', 'https://metromind.com/uploads/icons/gif1/br.png', '', 'BRA'),
(37, 'BS', 'Bahamas', 'Nassau', 'BSD', '+1-242', '.bs', 'https://metromind.com/uploads/icons/gif/bs.gif', 'https://metromind.com/uploads/icons/gif1/bs.png', '', 'BHS'),
(38, 'BT', 'Bhutan', 'Thimphu', 'BTN', '975', '.bt', 'https://metromind.com/uploads/icons/gif/bt.gif', 'https://metromind.com/uploads/icons/gif1/bt.png', '', 'BTN'),
(39, 'BW', 'Botswana', 'Gaborone', 'BWP', '267', '.bw', 'https://metromind.com/uploads/icons/gif/bw.gif', 'https://metromind.com/uploads/icons/gif1/bw.png', 'Bechuanaland', 'BWA'),
(40, 'BY', 'Belarus', 'Minsk', 'BYN', '375', '.by', 'https://metromind.com/uploads/icons/gif/by.gif', 'https://metromind.com/uploads/icons/gif1/by.png', 'White Russia', 'BLR'),
(41, 'BZ', 'Belize', 'Belmopan', 'BZD', '501', '.bz', 'https://metromind.com/uploads/icons/gif/bz.gif', 'https://metromind.com/uploads/icons/gif1/bz.png', '', 'BLZ'),
(42, 'CA', 'Canada', 'Ottawa', 'CAD', '1', '.ca', 'https://metromind.com/uploads/icons/gif/ca.gif', 'https://metromind.com/uploads/icons/gif1/ca.png', '', 'CAN'),
(43, 'CD', 'Democratic Republic of the Congo', 'Kinshasa', 'CDF', '243', '.cd', 'https://metromind.com/uploads/icons/gif/cd.gif', 'https://metromind.com/uploads/icons/gif1/cd.png', '', 'COD'),
(44, 'CF', 'Central African Republic', 'Bangui', 'XAF', '236', '.cf', 'https://metromind.com/uploads/icons/gif/cf.gif', 'https://metromind.com/uploads/icons/gif1/cf.png', '', 'CAF'),
(45, 'CG', 'Congo', 'Brazzaville', 'XAF', '242', '.cg', 'https://metromind.com/uploads/icons/gif/cg.gif', 'https://metromind.com/uploads/icons/gif1/cg.png', 'Zaire', 'COG'),
(46, 'CH', 'Switzerland', 'Bern', 'CHF', '41', '.ch', 'https://metromind.com/uploads/icons/gif/ch.gif', 'https://metromind.com/uploads/icons/gif1/ch.png', '', 'CHE'),
(47, 'CI', 'Ivory Coast', 'Yamoussoukro', 'XOF', '225', '.ci', 'https://metromind.com/uploads/icons/gif/ci.gif', 'https://metromind.com/uploads/icons/gif1/ci.png', '', 'TLD'),
(48, 'CL', 'Chile', 'Santiago', 'CLP', '56', '.cl', 'https://metromind.com/uploads/icons/gif/cl.gif', 'https://metromind.com/uploads/icons/gif1/cl.png', '', 'CHL'),
(49, 'CM', 'Cameroon', 'Yaounde', 'XAF', '237', '.cm', 'https://metromind.com/uploads/icons/gif/cm.gif', 'https://metromind.com/uploads/icons/gif1/cm.png', '', 'CMR'),
(50, 'CN', 'China', 'Beijing', 'CNY', '86', '.cn', 'https://metromind.com/uploads/icons/gif/cn.gif', 'https://metromind.com/uploads/icons/gif1/cn.png', '', 'CHN'),
(51, 'CO', 'Colombia', 'Bogota', 'COP', '57', '.co', 'https://metromind.com/uploads/icons/gif/co.gif', 'https://metromind.com/uploads/icons/gif1/co.png', '', 'COL'),
(52, 'CR', 'Costa Rica', 'San Jose', 'CRC', '506', '.cr', 'https://metromind.com/uploads/icons/gif/cr.gif', 'https://metromind.com/uploads/icons/gif1/cr.png', '', 'CRI'),
(53, 'CS', 'Serbia And Montenegro', 'Belgrade', 'RSD', '381', '.cs', 'https://metromind.com/uploads/icons/gif/cs.gif', 'https://metromind.com/uploads/icons/gif1/cs.png', '', '141'),
(54, 'CU', 'Cuba', 'Havana', 'CUP', '53', '.cu', 'https://metromind.com/uploads/icons/gif/cu.gif', 'https://metromind.com/uploads/icons/gif1/cu.png', '', 'CUB'),
(55, 'CV', 'Cape Verde', 'Praia', 'CVE', '238', '.cv', 'https://metromind.com/uploads/icons/gif/cv.gif', 'https://metromind.com/uploads/icons/gif1/cv.png', '', 'CPV'),
(56, 'CY', 'Cyprus', 'Nicosia', 'EUR', '357', '.cy', 'https://metromind.com/uploads/icons/gif/cy.gif', 'https://metromind.com/uploads/icons/gif1/cy.png', '', 'CYP'),
(57, 'CZ', 'Czech Republic', 'Prague', 'CZK', '420', '.cz', 'https://metromind.com/uploads/icons/gif/cz.gif', 'https://metromind.com/uploads/icons/gif1/cz.png', 'Czechia', 'CZE'),
(58, 'DE', 'Germany', 'Berlin', 'EUR', '49', '.de', 'https://metromind.com/uploads/icons/gif/de.gif', 'https://metromind.com/uploads/icons/gif1/de.png', 'Federal Republic Of Germany', 'DEU'),
(59, 'DJ', 'Djibouti', 'Djibouti', 'DJF', '253', '.dj', 'https://metromind.com/uploads/icons/gif/dj.gif', 'https://metromind.com/uploads/icons/gif1/dj.png', '', 'DJI'),
(60, 'DK', 'Denmark', 'Copenhagen', 'DKK', '45', '.dk', 'https://metromind.com/uploads/icons/gif/dk.gif', 'https://metromind.com/uploads/icons/gif1/dk.png', '', 'DNK'),
(61, 'DM', 'Dominica', 'Roseau', 'XCD', '+1-767', '.dm', 'https://metromind.com/uploads/icons/gif/dm.gif', 'https://metromind.com/uploads/icons/gif1/dm.png', '', 'DMA'),
(62, 'DO', 'Dominican Republic', 'Santo Domingo', 'DOP', '+1-809 and 1-829', '.do', 'https://metromind.com/uploads/icons/gif/do.gif', 'https://metromind.com/uploads/icons/gif1/do.png', '', 'DOM'),
(63, 'DZ', 'Algeria', 'Algiers', 'DZD', '213', '.dz', 'https://metromind.com/uploads/icons/gif/dz.gif', 'https://metromind.com/uploads/icons/gif1/dz.png', '', 'DZA'),
(64, 'EC', 'Ecuador', 'Quito', 'USD', '593', '.ec', 'https://metromind.com/uploads/icons/gif/ec.gif', 'https://metromind.com/uploads/icons/gif1/ec.png', '', 'ECU'),
(65, 'EE', 'Estonia', 'Tallinn', 'EUR', '372', '.ee', 'https://metromind.com/uploads/icons/gif/ee.gif', 'https://metromind.com/uploads/icons/gif1/ee.png', '', 'EST'),
(66, 'EG', 'Egypt', 'Cairo', 'EGP', '20', '.eg', 'https://metromind.com/uploads/icons/gif/eg.gif', 'https://metromind.com/uploads/icons/gif1/eg.png', '', 'EGY'),
(67, 'ER', 'Eritrea', 'Asmara', 'ERN', '291', '.er', 'https://metromind.com/uploads/icons/gif/er.gif', 'https://metromind.com/uploads/icons/gif1/er.png', '', 'ERI'),
(68, 'ES', 'Spain', 'Madrid', 'EUR', '34', '.es', 'https://metromind.com/uploads/icons/gif/es.gif', 'https://metromind.com/uploads/icons/gif1/es.png', '', 'ESP'),
(69, 'ET', 'Ethiopia', 'Addis Ababa', 'ETB', '251', '.et', 'https://metromind.com/uploads/icons/gif/et.gif', 'https://metromind.com/uploads/icons/gif1/et.png', '', 'ETH'),
(70, 'FI', 'Finland', 'Helsinki', 'EUR', '358', '.fi', 'https://metromind.com/uploads/icons/gif/fi.gif', 'https://metromind.com/uploads/icons/gif1/fi.png', '', 'FIN'),
(71, 'FJ', 'Fiji', 'Suva', 'FJD', '679', '.fj', 'https://metromind.com/uploads/icons/gif/fj.gif', 'https://metromind.com/uploads/icons/gif1/fj.png', 'Viti', 'FJI'),
(72, 'FM', 'Micronesia', 'Palikir', 'USD', '691', '.fm', 'https://metromind.com/uploads/icons/gif/fm.gif', 'https://metromind.com/uploads/icons/gif1/fm.png', '', 'FSM'),
(73, 'FR', 'France', 'Paris', 'EUR', '33', '.fr', 'https://metromind.com/uploads/icons/gif/fr.gif', 'https://metromind.com/uploads/icons/gif1/fr.png', '', 'FRA'),
(74, 'GA', 'Gabon', 'Libreville', 'XAF', '241', '.ga', 'https://metromind.com/uploads/icons/gif/ga.gif', 'https://metromind.com/uploads/icons/gif1/ga.png', '', 'GAB'),
(75, 'GB', 'United Kingdom', 'London', 'GBP', '44', '.uk', 'https://metromind.com/uploads/icons/gif/gb.gif', 'https://metromind.com/uploads/icons/gif1/gb.png', 'UK', 'GBR'),
(76, 'GD', 'Grenada', 'St. Georges', 'XCD', '+1-473', '.gd', 'https://metromind.com/uploads/icons/gif/gd.gif', 'https://metromind.com/uploads/icons/gif1/gd.png', '', 'GRD'),
(77, 'GE', 'Georgia', 'Tbilisi', 'GEL', '995', '.ge', 'https://metromind.com/uploads/icons/gif/ge.gif', 'https://metromind.com/uploads/icons/gif1/ge.png', 'Sakartvelo', 'GEO'),
(78, 'GG', 'Guernsey', 'St Peter Port', 'GBP', '+44-1481', '.gg', 'https://metromind.com/uploads/icons/gif/gg.gif', 'https://metromind.com/uploads/icons/gif1/gg.png', '', 'GGY'),
(79, 'GH', 'Ghana', 'Accra', 'GHS', '233', '.gh', 'https://metromind.com/uploads/icons/gif/gh.gif', 'https://metromind.com/uploads/icons/gif1/gh.png', '', 'GHA'),
(80, 'GM', 'Gambia', 'Banjul', 'GMD', '220', '.gm', 'https://metromind.com/uploads/icons/gif/gm.gif', 'https://metromind.com/uploads/icons/gif1/gm.png', '', 'GMB'),
(81, 'GN', 'Guinea', 'Conakry', 'GNF', '224', '.gn', 'https://metromind.com/uploads/icons/gif/gn.gif', 'https://metromind.com/uploads/icons/gif1/gn.png', '', 'GIN'),
(82, 'GQ', 'Equatorial Guinea', 'Malabo', 'XAF', '240', '.gq', 'https://metromind.com/uploads/icons/gif/gq.gif', 'https://metromind.com/uploads/icons/gif1/gq.png', '', 'GNQ'),
(83, 'GR', 'Greece', 'Athens', 'EUR', '30', '.gr', 'https://metromind.com/uploads/icons/gif/gr.gif', 'https://metromind.com/uploads/icons/gif1/gr.png', '', 'GRC'),
(84, 'GT', 'Guatemala', 'Guatemala City', 'GTQ', '502', '.gt', 'https://metromind.com/uploads/icons/gif/gt.gif', 'https://metromind.com/uploads/icons/gif1/gt.png', '', 'GTM'),
(85, 'GW', 'Guinea-Bissau', 'Bissau', 'XOF', '245', '.gw', 'https://metromind.com/uploads/icons/gif/gw.gif', 'https://metromind.com/uploads/icons/gif1/gw.png', '', 'GNB'),
(86, 'GY', 'Guyana', 'Georgetown', 'GYD', '592', '.gy', 'https://metromind.com/uploads/icons/gif/gy.gif', 'https://metromind.com/uploads/icons/gif1/gy.png', 'British Guiana', 'GUY'),
(87, 'HN', 'Honduras', 'Tegucigalpa', 'HNL', '504', '.hn', 'https://metromind.com/uploads/icons/gif/hn.gif', 'https://metromind.com/uploads/icons/gif1/hn.png', '', 'HND'),
(88, 'HR', 'Croatia', 'Zagreb', 'HRK', '385', '.hr', 'https://metromind.com/uploads/icons/gif/hr.gif', 'https://metromind.com/uploads/icons/gif1/hr.png', 'Hrvatska', 'HRV'),
(89, 'HT', 'Haiti', 'Port-au-Prince', 'HTG', '509', '.ht', 'https://metromind.com/uploads/icons/gif/ht.gif', 'https://metromind.com/uploads/icons/gif1/ht.png', '', 'HTI'),
(90, 'HU', 'Hungary', 'Budapest', 'HUF', '36', '.hu', 'https://metromind.com/uploads/icons/gif/hu.gif', 'https://metromind.com/uploads/icons/gif1/hu.png', '', 'HUN'),
(91, 'ID', 'Indonesia', 'Jakarta', 'IDR', '62', '.id', 'https://metromind.com/uploads/icons/gif/id.gif', 'https://metromind.com/uploads/icons/gif1/id.png', '', 'IDN'),
(92, 'IE', 'Ireland', 'Dublin', 'EUR', '353', '.ie', 'https://metromind.com/uploads/icons/gif/ie.gif', 'https://metromind.com/uploads/icons/gif1/ie.png', '', 'IRL'),
(93, 'IL', 'Israel', 'Jerusalem', 'ILS', '972', '.il', 'https://metromind.com/uploads/icons/gif/il.gif', 'https://metromind.com/uploads/icons/gif1/il.png', '', 'ISR'),
(94, 'IN', 'India', 'New Delhi', 'INR', '91', '.in', 'https://metromind.com/uploads/icons/gif/in.gif', 'https://metromind.com/uploads/icons/gif1/in.png', '', 'IND'),
(95, 'IQ', 'Iraq', 'Baghdad', 'IQD', '964', '.iq', 'https://metromind.com/uploads/icons/gif/iq.gif', 'https://metromind.com/uploads/icons/gif1/iq.png', '', 'IRQ'),
(96, 'IR', 'Iran', 'Tehran', 'IRR', '98', '.ir', 'https://metromind.com/uploads/icons/gif/ir.gif', 'https://metromind.com/uploads/icons/gif1/ir.png', '', 'IRN'),
(97, 'IS', 'Iceland', 'Reykjavik', 'ISK', '354', '.is', 'https://metromind.com/uploads/icons/gif/is.gif', 'https://metromind.com/uploads/icons/gif1/is.png', '', 'ISL'),
(98, 'IT', 'Italy', 'Rome', 'EUR', '39', '.it', 'https://metromind.com/uploads/icons/gif/it.gif', 'https://metromind.com/uploads/icons/gif1/it.png', '', 'ITA'),
(99, 'JM', 'Jamaica', 'Kingston', 'JMD', '+1-876', '.jm', 'https://metromind.com/uploads/icons/gif/jm.gif', 'https://metromind.com/uploads/icons/gif1/jm.png', '', 'JAM'),
(100, 'JO', 'Jordan', 'Amman', 'JOD', '962', '.jo', 'https://metromind.com/uploads/icons/gif/jo.gif', 'https://metromind.com/uploads/icons/gif1/jo.png', '', 'JOR'),
(101, 'JP', 'Japan', 'Tokyo', 'JPY', '81', '.jp', 'https://metromind.com/uploads/icons/gif/jp.gif', 'https://metromind.com/uploads/icons/gif1/jp.png', '', 'JPN'),
(102, 'KE', 'Kenya', 'Nairobi', 'KES', '254', '.ke', 'https://metromind.com/uploads/icons/gif/ke.gif', 'https://metromind.com/uploads/icons/gif1/ke.png', '', 'KEN'),
(103, 'KG', 'Kyrgyzstan', 'Bishkek', 'KGS', '996', '.kg', 'https://metromind.com/uploads/icons/gif/kg.gif', 'https://metromind.com/uploads/icons/gif1/kg.png', '', 'KGZ'),
(104, 'KH', 'Cambodia', 'Phnom Penh', 'KHR', '855', '.kh', 'https://metromind.com/uploads/icons/gif/kh.gif', 'https://metromind.com/uploads/icons/gif1/kh.png', '', 'KHM'),
(105, 'KI', 'Kiribati', 'Tarawa', 'AUD', '686', '.ki', 'https://metromind.com/uploads/icons/gif/ki.gif', 'https://metromind.com/uploads/icons/gif1/ki.png', 'Gilbert Islands', 'KIR'),
(106, 'KN', 'St.Kitts And Nevis', 'Basseterre', 'XCD', '+1-869', '.kn', 'https://metromind.com/uploads/icons/gif/kn.gif', 'https://metromind.com/uploads/icons/gif1/kn.png', '', 'KNA'),
(107, 'KP', 'North Korea', 'Pyongyang', 'KPW', '850', '.kp', 'https://metromind.com/uploads/icons/gif/kp.gif', 'https://metromind.com/uploads/icons/gif1/kp.png', '', '133'),
(108, 'KR', 'South Korea', 'Seoul', 'KRW', '82', '.kr', 'https://metromind.com/uploads/icons/gif/kr.gif', 'https://metromind.com/uploads/icons/gif1/kr.png', '', 'KOR'),
(109, 'KW', 'Kuwait', 'Kuwait City', 'KWD', '965', '.kw', 'https://metromind.com/uploads/icons/gif/kw.gif', 'https://metromind.com/uploads/icons/gif1/kw.png', '', 'KWT'),
(110, 'KZ', 'Kazakhstan', 'Astana', 'KZT', '7', '.kz', 'https://metromind.com/uploads/icons/gif/kz.gif', 'https://metromind.com/uploads/icons/gif1/kz.png', '', 'KAZ'),
(111, 'LA', 'Laos', 'Vientiane', 'LAK', '856', '.la', 'https://metromind.com/uploads/icons/gif/la.gif', 'https://metromind.com/uploads/icons/gif1/la.png', '', 'LAO'),
(112, 'LB', 'Lebanon', 'Beirut', 'LBP', '961', '.lb', 'https://metromind.com/uploads/icons/gif/lb.gif', 'https://metromind.com/uploads/icons/gif1/lb.png', '', 'LBN'),
(113, 'LC', 'St.Lucia', 'Castries', 'XCD', '+1-758', '.lc', 'https://metromind.com/uploads/icons/gif/lc.gif', 'https://metromind.com/uploads/icons/gif1/lc.png', '', 'LCA'),
(114, 'LI', 'Liechtenstein', 'Vaduz', 'CHF', '423', '.li', 'https://metromind.com/uploads/icons/gif/li.gif', 'https://metromind.com/uploads/icons/gif1/li.png', '', 'LIE'),
(115, 'LK', 'Sri Lanka', 'Colombo', 'LKR', '94', '.lk', 'https://metromind.com/uploads/icons/gif/lk.gif', 'https://metromind.com/uploads/icons/gif1/lk.png', '', 'LKA'),
(116, 'LR', 'Liberia', 'Monrovia', 'LRD', '231', '.lr', 'https://metromind.com/uploads/icons/gif/lr.gif', 'https://metromind.com/uploads/icons/gif1/lr.png', '', 'LBR'),
(117, 'LS', 'Lesotho', 'Maseru', 'LSL', '266', '.ls', 'https://metromind.com/uploads/icons/gif/ls.gif', 'https://metromind.com/uploads/icons/gif1/ls.png', '', 'LSO'),
(118, 'LT', 'Lithuania', 'Vilnius', 'EUR', '370', '.lt', 'https://metromind.com/uploads/icons/gif/lt.gif', 'https://metromind.com/uploads/icons/gif1/lt.png', '', 'LTU'),
(119, 'LU', 'Luxembourg', 'Luxembourg', 'EUR', '352', '.lu', 'https://metromind.com/uploads/icons/gif/lu.gif', 'https://metromind.com/uploads/icons/gif1/lu.png', '', 'LUX'),
(120, 'LV', 'Latvia', 'Riga', 'EUR', '371', '.lv', 'https://metromind.com/uploads/icons/gif/lv.gif', 'https://metromind.com/uploads/icons/gif1/lv.png', '', 'LVA'),
(121, 'LY', 'Libya', 'Tripoli', 'LYD', '218', '.ly', 'https://metromind.com/uploads/icons/gif/ly.gif', 'https://metromind.com/uploads/icons/gif1/ly.png', '', 'LBY'),
(122, 'MA', 'Morocco', 'Rabat', 'MAD', '212', '.ma', 'https://metromind.com/uploads/icons/gif/ma.gif', 'https://metromind.com/uploads/icons/gif1/ma.png', '', 'MAR'),
(123, 'MC', 'Monaco', 'Monaco', 'EUR', '377', '.mc', 'https://metromind.com/uploads/icons/gif/mc.gif', 'https://metromind.com/uploads/icons/gif1/mc.png', '', 'MCO'),
(124, 'MD', 'Moldova', 'Chisinau', 'MDL', '373', '.md', 'https://metromind.com/uploads/icons/gif/md.gif', 'https://metromind.com/uploads/icons/gif1/md.png', '', 'MDA'),
(125, 'ME', 'Montenegro', 'Podgorica', 'EUR', '382', '.me', 'https://metromind.com/uploads/icons/gif/me.gif', 'https://metromind.com/uploads/icons/gif1/me.png', '', 'MNE'),
(126, 'MF', 'St.Martin Island', 'Marigot', 'EUR', '590', '.gp', 'https://metromind.com/uploads/icons/gif/mf.gif', 'https://metromind.com/uploads/icons/gif1/mf.png', '', '144'),
(127, 'MG', 'Madagascar', 'Antananarivo', 'MGA', '261', '.mg', 'https://metromind.com/uploads/icons/gif/mg.gif', 'https://metromind.com/uploads/icons/gif1/mg.png', 'Malagasy Republic', 'MDG'),
(128, 'MH', 'Marshall Islands', 'Majuro', 'USD', '692', '.mh', 'https://metromind.com/uploads/icons/gif/mh.gif', 'https://metromind.com/uploads/icons/gif1/mh.png', '', 'MHL'),
(129, 'MK', 'Macedonia', 'Skopje', 'MKD', '389', '.mk', 'https://metromind.com/uploads/icons/gif/mk.gif', 'https://metromind.com/uploads/icons/gif1/mk.png', '', 'MKD'),
(130, 'ML', 'Mali', 'Bamako', 'XOF', '223', '.ml', 'https://metromind.com/uploads/icons/gif/ml.gif', 'https://metromind.com/uploads/icons/gif1/ml.png', '', 'MLI'),
(131, 'MM', 'Myanmar', 'Nay Pyi Taw', 'MMK', '95', '.mm', 'https://metromind.com/uploads/icons/gif/mm.gif', 'https://metromind.com/uploads/icons/gif1/mm.png', 'Burma', 'MMR'),
(132, 'MO', 'Macau', 'Macao', 'MOP', '853', '.mo', 'https://metromind.com/uploads/icons/gif/mo.gif', 'https://metromind.com/uploads/icons/gif1/mo.png', '', 'MAC'),
(133, 'MP', 'Northern Mariana Islands', 'Saipan', 'USD', '+1-670', '.mp', 'https://metromind.com/uploads/icons/gif/mp.gif', 'https://metromind.com/uploads/icons/gif1/mp.png', '', 'MNP'),
(134, 'MQ', 'Martinique Islands', 'Fort-de-France', 'EUR', '596', '.mq', 'https://metromind.com/uploads/icons/gif/mq.gif', 'https://metromind.com/uploads/icons/gif1/mq.png', '', 'MTQ'),
(135, 'MR', 'Mauritania', 'Nouakchott', 'MRO', '222', '.mr', 'https://metromind.com/uploads/icons/gif/mr.gif', 'https://metromind.com/uploads/icons/gif1/mr.png', '', 'MRT'),
(136, 'MT', 'Malta', 'Valletta', 'EUR', '356', '.mt', 'https://metromind.com/uploads/icons/gif/mt.gif', 'https://metromind.com/uploads/icons/gif1/mt.png', '', 'MLT'),
(137, 'MU', 'Mauritius', 'Port Louis', 'MUR', '230', '.mu', 'https://metromind.com/uploads/icons/gif/mu.gif', 'https://metromind.com/uploads/icons/gif1/mu.png', '', 'MUS'),
(138, 'MV', 'Maldives', 'Male', 'MVR', '960', '.mv', 'https://metromind.com/uploads/icons/gif/mv.gif', 'https://metromind.com/uploads/icons/gif1/mv.png', '', 'MDV'),
(139, 'MW', 'Malawi', 'Lilongwe', 'MWK', '265', '.mw', 'https://metromind.com/uploads/icons/gif/mw.gif', 'https://metromind.com/uploads/icons/gif1/mw.png', '', 'MWI'),
(140, 'MX', 'Mexico', 'Mexico City', 'MXN', '52', '.mx', 'https://metromind.com/uploads/icons/gif/mx.gif', 'https://metromind.com/uploads/icons/gif1/mx.png', '', 'MEX'),
(141, 'MY', 'Malaysia', 'Kuala Lumpur', 'MYR', '60', '.my', 'https://metromind.com/uploads/icons/gif/my.gif', 'https://metromind.com/uploads/icons/gif1/my.png', '', 'MYS'),
(142, 'MZ', 'Mozambique', 'Maputo', 'MZN', '258', '.mz', 'https://metromind.com/uploads/icons/gif/mz.gif', 'https://metromind.com/uploads/icons/gif1/mz.png', '', 'MOZ'),
(143, 'NA', 'Namibia', 'Windhoek', 'NAD', '264', '.na', 'https://metromind.com/uploads/icons/gif/na.gif', 'https://metromind.com/uploads/icons/gif1/na.png', '', 'NAM'),
(144, 'NC', 'New Caledonia', 'Noumea', 'XPF', '687', '.nc', 'https://metromind.com/uploads/icons/gif/nc.gif', 'https://metromind.com/uploads/icons/gif1/nc.png', '', 'NCL'),
(145, 'NE', 'Niger', 'Niamey', 'XOF', '227', '.ne', 'https://metromind.com/uploads/icons/gif/ne.gif', 'https://metromind.com/uploads/icons/gif1/ne.png', '', 'NER'),
(146, 'NG', 'Nigeria', 'Abuja', 'NGN', '234', '.ng', 'https://metromind.com/uploads/icons/gif/ng.gif', 'https://metromind.com/uploads/icons/gif1/ng.png', '', 'NGA'),
(147, 'NI', 'Nicaragua', 'Managua', 'NIO', '505', '.ni', 'https://metromind.com/uploads/icons/gif/ni.gif', 'https://metromind.com/uploads/icons/gif1/ni.png', '', 'NIC'),
(148, 'NL', 'Netherlands', 'Amsterdam', 'EUR', '31', '.nl', 'https://metromind.com/uploads/icons/gif/nl.gif', 'https://metromind.com/uploads/icons/gif1/nl.png', 'Holland', 'NLD'),
(149, 'NO', 'Norway', 'Oslo', 'NOK', '47', '.no', 'https://metromind.com/uploads/icons/gif/no.gif', 'https://metromind.com/uploads/icons/gif1/no.png', '', 'NOR'),
(150, 'NP', 'Nepal', 'Kathmandu', 'NPR', '977', '.np', 'https://metromind.com/uploads/icons/gif/np.gif', 'https://metromind.com/uploads/icons/gif1/np.png', '', 'NPL'),
(151, 'NR', 'Nauru', 'Yaren', 'AUD', '674', '.nr', 'https://metromind.com/uploads/icons/gif/nr.gif', 'https://metromind.com/uploads/icons/gif1/nr.png', '', 'NRU'),
(152, 'NU', 'Niue', 'Alofi', 'NZD', '683', '.nu', 'https://metromind.com/uploads/icons/gif/nu.gif', 'https://metromind.com/uploads/icons/gif1/nu.png', '', 'NIU'),
(153, 'NZ', 'New Zealand', 'Wellington', 'NZD', '64', '.nz', 'https://metromind.com/uploads/icons/gif/nz.gif', 'https://metromind.com/uploads/icons/gif1/nz.png', '', 'NZL'),
(154, 'OM', 'Oman', 'Muscat', 'OMR', '968', '.om', 'https://metromind.com/uploads/icons/gif/om.gif', 'https://metromind.com/uploads/icons/gif1/om.png', '', 'OMN'),
(155, 'PA', 'Panama', 'Panama City', 'PAB', '507', '.pa', 'https://metromind.com/uploads/icons/gif/pa.gif', 'https://metromind.com/uploads/icons/gif1/pa.png', '', 'PAN'),
(156, 'PE', 'Peru', 'Lima', 'PEN', '51', '.pe', 'https://metromind.com/uploads/icons/gif/pe.gif', 'https://metromind.com/uploads/icons/gif1/pe.png', '', 'PER'),
(157, 'PF', 'French Polynesia', 'Papeete', 'XPF', '689', '.pf', 'https://metromind.com/uploads/icons/gif/pf.gif', 'https://metromind.com/uploads/icons/gif1/pf.png', '', 'PYF'),
(158, 'PG', 'Papua New Guinea', 'Port Moresby', 'PGK', '675', '.pg', 'https://metromind.com/uploads/icons/gif/pg.gif', 'https://metromind.com/uploads/icons/gif1/pg.png', '', 'PNG'),
(159, 'PH', 'Philippines', 'Manila', 'PHP', '63', '.ph', 'https://metromind.com/uploads/icons/gif/ph.gif', 'https://metromind.com/uploads/icons/gif1/ph.png', '', 'PHL'),
(160, 'PK', 'Pakistan', 'Islamabad', 'PKR', '92', '.pk', 'https://metromind.com/uploads/icons/gif/pk.gif', 'https://metromind.com/uploads/icons/gif1/pk.png', '', 'PAK'),
(161, 'PL', 'Poland', 'Warsaw', 'PLN', '48', '.pl', 'https://metromind.com/uploads/icons/gif/pl.gif', 'https://metromind.com/uploads/icons/gif1/pl.png', '', 'POL'),
(162, 'PT', 'Portugal', 'Lisbon', 'EUR', '351', '.pt', 'https://metromind.com/uploads/icons/gif/pt.gif', 'https://metromind.com/uploads/icons/gif1/pt.png', '', 'PRT'),
(163, 'PW', 'Palau', 'Melekeok', 'USD', '680', '.pw', 'https://metromind.com/uploads/icons/gif/pw.gif', 'https://metromind.com/uploads/icons/gif1/pw.png', '', 'PLW'),
(164, 'PY', 'Paraguay', 'Asuncion', 'PYG', '595', '.py', 'https://metromind.com/uploads/icons/gif/py.gif', 'https://metromind.com/uploads/icons/gif1/py.png', '', 'PRY'),
(165, 'QA', 'Qatar', 'Doha', 'QAR', '974', '.qa', 'https://metromind.com/uploads/icons/gif/qa.gif', 'https://metromind.com/uploads/icons/gif1/qa.png', '', 'QAT'),
(166, 'RO', 'Romania', 'Bucharest', 'RON', '40', '.ro', 'https://metromind.com/uploads/icons/gif/ro.gif', 'https://metromind.com/uploads/icons/gif1/ro.png', 'Romanian', 'ROU'),
(167, 'RS', 'Serbia', 'Belgrade', 'RSD', '381', '.rs', 'https://metromind.com/uploads/icons/gif/rs.gif', 'https://metromind.com/uploads/icons/gif1/rs.png', '', 'SRB'),
(168, 'RU', 'Russia', 'Moscow', 'RUB', '7', '.ru', 'https://metromind.com/uploads/icons/gif/ru.gif', 'https://metromind.com/uploads/icons/gif1/ru.png', '', 'RUS'),
(169, 'RW', 'Rwanda', 'Kigali', 'RWF', '250', '.rw', 'https://metromind.com/uploads/icons/gif/rw.gif', 'https://metromind.com/uploads/icons/gif1/rw.png', '', 'RWA'),
(170, 'SA', 'Saudi Arabia', 'Riyadh', 'SAR', '966', '.sa', 'https://metromind.com/uploads/icons/gif/sa.gif', 'https://metromind.com/uploads/icons/gif1/sa.png', '', 'SAU'),
(171, 'SB', 'Solomon Islands', 'Honiara', 'SBD', '677', '.sb', 'https://metromind.com/uploads/icons/gif/sb.gif', 'https://metromind.com/uploads/icons/gif1/sb.png', '', 'SLB'),
(172, 'SC', 'Seychelles', 'Victoria', 'SCR', '248', '.sc', 'https://metromind.com/uploads/icons/gif/sc.gif', 'https://metromind.com/uploads/icons/gif1/sc.png', '', 'SYC'),
(173, 'SD', 'Sudan', 'Khartoum', 'SDG', '249', '.sd', 'https://metromind.com/uploads/icons/gif/sd.gif', 'https://metromind.com/uploads/icons/gif1/sd.png', '', 'SDN'),
(174, 'SE', 'Sweden', 'Stockholm', 'SEK', '46', '.se', 'https://metromind.com/uploads/icons/gif/se.gif', 'https://metromind.com/uploads/icons/gif1/se.png', '', 'SWE'),
(175, 'SG', 'Singapore', 'Singapore', 'SGD', '65', '.sg', 'https://metromind.com/uploads/icons/gif/sg.gif', 'https://metromind.com/uploads/icons/gif1/sg.png', '', 'SGP'),
(176, 'SI', 'Slovenia', 'Ljubljana', 'EUR', '386', '.si', 'https://metromind.com/uploads/icons/gif/si.gif', 'https://metromind.com/uploads/icons/gif1/si.png', '', 'SVN'),
(177, 'SK', 'Slovakia', 'Bratislava', 'EUR', '421', '.sk', 'https://metromind.com/uploads/icons/gif/sk.gif', 'https://metromind.com/uploads/icons/gif1/sk.png', '', 'SVK'),
(178, 'SL', 'Sierra Leone', 'Freetown', 'SLL', '232', '.sl', 'https://metromind.com/uploads/icons/gif/sl.gif', 'https://metromind.com/uploads/icons/gif1/sl.png', '', 'SLE'),
(179, 'SM', 'San Marino', 'San Marino', 'EUR', '378', '.sm', 'https://metromind.com/uploads/icons/gif/sm.gif', 'https://metromind.com/uploads/icons/gif1/sm.png', '', 'SMR'),
(180, 'SN', 'Senegal', 'Dakar', 'XOF', '221', '.sn', 'https://metromind.com/uploads/icons/gif/sn.gif', 'https://metromind.com/uploads/icons/gif1/sn.png', '', 'SEN'),
(181, 'SO', 'Somalia', 'Mogadishu', 'SOS', '252', '.so', 'https://metromind.com/uploads/icons/gif/so.gif', 'https://metromind.com/uploads/icons/gif1/so.png', '', 'SOM'),
(182, 'SR', 'Suriname', 'Paramaribo', 'SRD', '597', '.sr', 'https://metromind.com/uploads/icons/gif/sr.gif', 'https://metromind.com/uploads/icons/gif1/sr.png', 'Dutch Guiana', 'SUR'),
(183, 'SS', 'South Sudan', 'Juba', 'SSP', '211', '', 'https://metromind.com/uploads/icons/gif/ss.gif', 'https://metromind.com/uploads/icons/gif1/ss.png', '', 'SSD'),
(184, 'ST', 'Sao Tome And Principe', 'Sao Tome', 'STD', '239', '.st', 'https://metromind.com/uploads/icons/gif/st.gif', 'https://metromind.com/uploads/icons/gif1/st.png', '', 'STP'),
(185, 'SV', 'El Salvador', 'San Salvador', 'USD', '503', '.sv', 'https://metromind.com/uploads/icons/gif/sv.gif', 'https://metromind.com/uploads/icons/gif1/sv.png', '', 'SLV'),
(186, 'SX', 'Sint Maarten', 'Philipsburg', 'ANG', '599', '.sx', 'https://metromind.com/uploads/icons/gif/sx.gif', 'https://metromind.com/uploads/icons/gif1/sx.png', '', 'SXM'),
(187, 'SY', 'Syria', 'Damascus', 'SYP', '963', '.sy', 'https://metromind.com/uploads/icons/gif/sy.gif', 'https://metromind.com/uploads/icons/gif1/sy.png', '', 'SYR'),
(188, 'SZ', 'Swaziland', 'Mbabane', 'SZL', '268', '.sz', 'https://metromind.com/uploads/icons/gif/sz.gif', 'https://metromind.com/uploads/icons/gif1/sz.png', 'Eswatini', 'SWZ'),
(189, 'TD', 'Chad', 'N\'\'Djamena', 'XAF', '235', '.td', 'https://metromind.com/uploads/icons/gif/td.gif', 'https://metromind.com/uploads/icons/gif1/td.png', '', 'TCD'),
(190, 'TG', 'Togo', 'Lome', 'XOF', '228', '.tg', 'https://metromind.com/uploads/icons/gif/tg.gif', 'https://metromind.com/uploads/icons/gif1/tg.png', '', 'TGO'),
(191, 'TH', 'Thailand', 'Bangkok', 'THB', '66', '.th', 'https://metromind.com/uploads/icons/gif/th.gif', 'https://metromind.com/uploads/icons/gif1/th.png', '', 'THA'),
(192, 'TJ', 'Tajikistan', 'Dushanbe', 'TJS', '992', '.tj', 'https://metromind.com/uploads/icons/gif/tj.gif', 'https://metromind.com/uploads/icons/gif1/tj.png', '', 'TJK'),
(193, 'TL', 'Timor-Leste', 'Dili', 'USD', '670', '.tl', 'https://metromind.com/uploads/icons/gif/tl.gif', 'https://metromind.com/uploads/icons/gif1/tl.png', '', 'TLS'),
(194, 'TM', 'Turkmenistan', 'Ashgabat', 'TMT', '993', '.tm', 'https://metromind.com/uploads/icons/gif/tm.gif', 'https://metromind.com/uploads/icons/gif1/tm.png', '', 'TKM'),
(195, 'TN', 'Tunisia', 'Tunis', 'TND', '216', '.tn', 'https://metromind.com/uploads/icons/gif/tn.gif', 'https://metromind.com/uploads/icons/gif1/tn.png', '', 'TUN'),
(196, 'TO', 'Tonga', 'Nuku alofa', 'TOP', '676', '.to', 'https://metromind.com/uploads/icons/gif/to.gif', 'https://metromind.com/uploads/icons/gif1/to.png', '', 'TON'),
(197, 'TR', 'Turkey', 'Ankara', 'TRY', '90', '.tr', 'https://metromind.com/uploads/icons/gif/tr.gif', 'https://metromind.com/uploads/icons/gif1/tr.png', '', 'TUR'),
(198, 'TT', 'Trinidad And Tobago', 'Port of Spain', 'TTD', '+1-868', '.tt', 'https://metromind.com/uploads/icons/gif/tt.gif', 'https://metromind.com/uploads/icons/gif1/tt.png', '', 'TTO'),
(199, 'TV', 'Tuvalu', 'Funafuti', 'AUD', '688', '.tv', 'https://metromind.com/uploads/icons/gif/tv.gif', 'https://metromind.com/uploads/icons/gif1/tv.png', '', 'TUV'),
(200, 'TW', 'Taiwan', 'Taipei', 'TWD', '886', '.tw', 'https://metromind.com/uploads/icons/gif/tw.gif', 'https://metromind.com/uploads/icons/gif1/tw.png', '', 'TWN'),
(201, 'TZ', 'Tanzania', 'Dodoma', 'TZS', '255', '.tz', 'https://metromind.com/uploads/icons/gif/tz.gif', 'https://metromind.com/uploads/icons/gif1/tz.png', '', 'TZA'),
(202, 'UA', 'Ukraine', 'Kyiv', 'UAH', '380', '.ua', 'https://metromind.com/uploads/icons/gif/ua.gif', 'https://metromind.com/uploads/icons/gif1/ua.png', '', 'UKR'),
(203, 'UG', 'Uganda', 'Kampala', 'UGX', '256', '.ug', 'https://metromind.com/uploads/icons/gif/ug.gif', 'https://metromind.com/uploads/icons/gif1/ug.png', '', 'UGA'),
(204, 'US', 'United States Of America', 'Washington', 'USD', '1', '.us', 'https://metromind.com/uploads/icons/gif/us.gif', 'https://metromind.com/uploads/icons/gif1/us.png', 'USA', 'USA'),
(205, 'UY', 'Uruguay', 'Montevideo', 'UYU', '598', '.uy', 'https://metromind.com/uploads/icons/gif/uy.gif', 'https://metromind.com/uploads/icons/gif1/uy.png', '', 'URY'),
(206, 'UZ', 'Uzbekistan', 'Tashkent', 'UZS', '998', '.uz', 'https://metromind.com/uploads/icons/gif/uz.gif', 'https://metromind.com/uploads/icons/gif1/uz.png', '', 'UZB'),
(207, 'VA', 'Vatican', 'Vatican City', 'EUR', '379', '.va', 'https://metromind.com/uploads/icons/gif/va.gif', 'https://metromind.com/uploads/icons/gif1/va.png', '', 'VAT'),
(208, 'VC', 'St.Vincent And Grenadines', 'Kingstown', 'XCD', '+1-784', '.vc', 'https://metromind.com/uploads/icons/gif/vc.gif', 'https://metromind.com/uploads/icons/gif1/vc.png', '', 'VCT'),
(209, 'VE', 'Venezuela', 'Caracas', 'VES', '58', '.ve', 'https://metromind.com/uploads/icons/gif/ve.gif', 'https://metromind.com/uploads/icons/gif1/ve.png', '', 'VEN'),
(210, 'VN', 'Vietnam', 'Hanoi', 'VND', '84', '.vn', 'https://metromind.com/uploads/icons/gif/vn.gif', 'https://metromind.com/uploads/icons/gif1/vn.png', '', 'VNM'),
(211, 'VU', 'Vanuatu', 'Port Vila', 'VUV', '678', '.vu', 'https://metromind.com/uploads/icons/gif/vu.gif', 'https://metromind.com/uploads/icons/gif1/vu.png', '', 'VUT'),
(212, 'WS', 'Samoa', 'Apia', 'WST', '685', '.ws', 'https://metromind.com/uploads/icons/gif/ws.gif', 'https://metromind.com/uploads/icons/gif1/ws.png', '', 'WSM'),
(213, 'YE', 'Yemen', 'Sanaa', 'YER', '967', '.ye', 'https://metromind.com/uploads/icons/gif/ye.gif', 'https://metromind.com/uploads/icons/gif1/ye.png', '', 'YEM'),
(214, 'ZA', 'South Africa', 'Pretoria', 'ZAR', '27', '.za', 'https://metromind.com/uploads/icons/gif/za.gif', 'https://metromind.com/uploads/icons/gif1/za.png', '', 'ZAF'),
(215, 'ZM', 'Zambia', 'Lusaka', 'ZMW', '260', '.zm', 'https://metromind.com/uploads/icons/gif/zm.gif', 'https://metromind.com/uploads/icons/gif1/zm.png', '', 'ZMB'),
(216, 'ZW', 'Zimbabwe', 'Harare', 'ZWL', '263', '.zw', 'https://metromind.com/uploads/icons/gif/zw.gif', 'https://metromind.com/uploads/icons/gif1/zw.png', 'Rhodesia', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `axdoctors`
--

CREATE TABLE `axdoctors` (
  `doctorId` bigint(11) NOT NULL,
  `uniqueId` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorEmail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorPassword` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorMobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorImageUrl` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtubeLink` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialityId` bigint(11) NOT NULL,
  `qualification` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `knownLanguages` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorAddress` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorFee` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` int(1) NOT NULL,
  `communicationMode` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 - Video Call,2 - Audio Call,3 - Text Message',
  `status` int(1) NOT NULL,
  `seoUri` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `lastLogin` datetime NOT NULL,
  `doctorSessionDuration` double NOT NULL COMMENT 'in minutes',
  `otp` int(11) NOT NULL,
  `isVerified` int(1) NOT NULL,
  `otpSendTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `medicalLicense` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isVerifiedLicense` int(11) NOT NULL COMMENT '1-verified,2-unverified',
  `counsellingCertificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isVerifiedCertificate` int(11) NOT NULL COMMENT '1-verified,2-unverified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axdoctors`
--

INSERT INTO `axdoctors` (`doctorId`, `uniqueId`, `doctorName`, `doctorEmail`, `doctorPassword`, `doctorMobile`, `doctorImageUrl`, `youtubeLink`, `specialityId`, `qualification`, `knownLanguages`, `experience`, `doctorAddress`, `specialization`, `doctorFee`, `age`, `gender`, `communicationMode`, `status`, `seoUri`, `createdDate`, `modifiedDate`, `lastLogin`, `doctorSessionDuration`, `otp`, `isVerified`, `otpSendTime`, `medicalLicense`, `isVerifiedLicense`, `counsellingCertificate`, `isVerifiedCertificate`) VALUES
(1, 'METROMINDD1', 'Dr Thalhath P', 'jinu@ekselan.com', '8f219c6a8a105406128fb9e31f05cca791e96c6f8e7862d7cb506f90a53c4ab7df12a705366aad6f76e78e32cf70501af4082f5d5f5561f5df5cc3e693b4b8c1mL3rBTKd53ByxKtEfJp5MiRd6XRabiML36GyU2hBIm0=', '7894561231', 'DOCTOR_1.jpg', 'https://www.youtube.com', 1, 'MBBS,MD', 'Malayalam', '25 Years', 'Ernakulam\\nKerala\\nIndia', '2', 900, 0, 2, '1', 1, 'dr-thalhath-p', '2020-03-05 00:00:00', '2020-04-01 06:24:54', '2020-03-11 17:46:27', 30, 8574, 1, '2020-03-10 05:24:02', 'LICENSE_1.png', 1, 'CERTIFICATE_1.png', 2),
(2, 'METROMINDD2', 'Dr.Amrita Thomas', 'am@gmail.com', 'a0a1f016c5ab63ff3f0ddfbb1db630307827809fc76437803e2d6dbd016859ee9239a95be07bcbce8c4ea0acabbece7259f991c0ded05c8abc2b50d2fdb16ff81qIJK2fmR+k5w9MgmDZK09L4z/elOMKcvLyoMyyXUpk=', '1478529630', 'DOCTOR_2.jpg', 'https://www.youtube.com', 1, 'MBBS,MD', 'Malayalam,English', '13 Years', 'Cochin,Kerala,India', '5', 900, 35, 2, '1', 1, 'dramrita-thomas', '2020-03-05 00:00:00', '2020-04-01 03:35:19', '0000-00-00 00:00:00', 30, 0, 1, '2020-03-10 05:24:02', 'LICENSE_2.png', 1, 'CERTIFICATE_2.jpg', 1),
(11, '', 'seef', 'eeee@sss.ss', 'ORUX[^JLNPRTVXZ\\\\^`bd', '1111111111', 'DOCTOR_11.jpg', 'if($this->input->get(\'returnUrl\') <> \'\') 					redirect(base_url(\'admin/doctor\'.$this->input->get(\'returnUrl\'))); 				else{ 				redirect(base_url(\'admin/doctor\'));  				}  			}', 1, 'aa', 'Malayalam,English', '22', 'gdwigfegug', '5', 222, 23, 1, '1,2,3', 1, 'seef', '2020-03-25 19:55:59', '2020-04-01 03:33:44', '0000-00-00 00:00:00', 30, 0, 1, '2020-03-25 18:55:59', 'LICENSE_11.jpg', 1, 'CERTIFICATE_11.png', 1),
(18, '', 'www', 'a@ww.ww', 'OQSUWY[]_aRTVXZ\\\\^`bd', '1111111111111', 'DOCTOR_18.png', 'https://www.youtube.com', 1, 'ba', 'Malayalam', '2', 'trdjtffoy', '5', 233, 23, 2, '1,3', 1, 'www', '2020-03-26 17:26:44', '2020-04-01 03:20:51', '0000-00-00 00:00:00', 0, 0, 1, '2020-03-26 16:26:44', 'LICENSE_18.png', 1, 'CERTIFICATE_18.png', 1),
(19, '', 'eee', 'sf@ddd.ll', 'P@BDFHJLNPRTVXZ\\\\^`bd', '2', 'DOCTOR_19.png', 'sxs', 1, 'ww', 'Malayalam,Hindi', '33', 'x', '3', 222, 22, 1, '1', 1, 'eee', '2020-03-27 02:48:09', '2020-04-01 03:18:44', '0000-00-00 00:00:00', 0, 0, 1, '2020-03-27 01:48:09', 'LICENSE_19.png', 1, 'CERTIFICATE_19.png', 2),
(20, 'MMD20', '   rgj', 'aa@jj.jj', 'OQSUWY[LNPRTVXZ\\\\^`bd', '1111111111', 'DOCTOR_20.png', 'jjngg', 1, 'finirgni', 'English', 'ricnirni', 'iueguuiiutfni', '12', 0, 0, 1, '1,2,3', 1, 'rgj', '2020-03-27 03:02:49', '2020-04-01 04:50:53', '0000-00-00 00:00:00', 0, 0, 2, '2020-03-27 02:02:49', 'LICENSE_20.png', 1, '', 1),
(21, 'MMD21', 'rererer', 'wwww@hghh.hhj', '?????HJLNPRTVXZ\\\\^`bd', '111111111', 'DOCTOR_21.png', 'xdffg', 1, 'jhgfd', 'Malayalam,English,Hindi', 'sfghhjhgf', 'dgdtjrg', '12,3,2', 456, 24, 1, '1', 1, 'rererer', '2020-03-27 13:20:54', '2020-04-01 03:15:18', '0000-00-00 00:00:00', 0, 0, 1, '2020-03-27 12:20:54', 'LICENSE_21.jpg', 1, 'CERTIFICATE_21.png', 2),
(22, 'MMD22', 'dfgh', 'asdf@sdfg.kkk', 'ORUWWZ]LNPRTVXZ\\\\^`bd', '4852931', 'DOCTOR_22.png', 'sdfghjk', 1, 'sdfgh', 'English,Hindi', '2345', 'asdfghjkl', '5,3,2', 741, 56, 1, '1,2,3', 1, 'dfgh', '2020-03-27 14:34:50', '2020-04-01 03:12:29', '0000-00-00 00:00:00', 23, 0, 1, '2020-03-27 13:34:50', 'LICENSE_22.jpg', 1, 'CERTIFICATE_22.jpg', 1),
(41, 'MMD41', 'sasd', 'qsc@fs.kk', 'ORUXFHJLNPRTVXZ\\\\^`bd', '1234567', 'DOCTOR_41.jpg', 'hgf', 1, 'hhgf', '', 'wdfvwdff', 'qsdfbn,', '4,3,1', 2222, 65, 2, '1,2,3', 1, 'sasd', '2020-03-27 15:41:09', '2020-03-31 22:56:34', '0000-00-00 00:00:00', 0, 0, 1, '2020-03-27 14:41:09', 'LICENSE_41.jpg', 2, 'CERTIFICATE_41.jpg', 2),
(103, 'MMD103', 'dfghjk', 'strtyuhl@ddd.kk', '???????LNPRTVXZ\\\\^`bd', '2345678', 'DOCTOR_103.png', 'sdfghj', 1, 'wertyu', 'Malayalam', '8', 'tytyui', '3,2,1', 9, 234567, 1, '1,3', 1, 'dfghjk', '2020-03-27 20:18:42', '2020-04-01 05:50:15', '0000-00-00 00:00:00', 0, 0, 1, '2020-03-27 19:18:42', 'LICENSE_103.png', 2, 'CERTIFICATE_103.png', 1),
(104, 'MMD104', 'Varghese', 'varkki@gmail.com', 'ORUX[^JLNPRTVXZ\\\\^`bd', '9656436615', 'DOCTOR_104.png', 'https://www.youtube.com', 1, 'MD,MBBS', 'English', '25', 'Golden kayaloramNorth blockXII BMaradu', '2', 500, 54, 1, '1,3', 1, 'varghese', '2020-04-01 23:34:13', '2020-04-02 00:09:17', '0000-00-00 00:00:00', 30, 0, 1, '2020-04-02 04:34:13', 'LICENSE_104.png', 1, 'CERTIFICATE_104.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `axfavourites`
--

CREATE TABLE `axfavourites` (
  `favouriteId` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `insDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axfavourites`
--

INSERT INTO `axfavourites` (`favouriteId`, `patientId`, `doctorId`, `insDate`) VALUES
(1, 1, 1, '2020-03-11 12:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `axnotifications`
--

CREATE TABLE `axnotifications` (
  `notificationId` bigint(11) NOT NULL,
  `patientId` bigint(20) NOT NULL COMMENT ' ',
  `doctorId` bigint(20) NOT NULL,
  `appointmentId` bigint(20) NOT NULL,
  `notificationType` int(1) DEFAULT NULL COMMENT '0- Appointment  requested,1- Appointment  approved,2- Appointment  rejected',
  `notificationTitle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notificationDescription` longtext COLLATE utf8mb4_unicode_ci,
  `notificationTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axnotifications`
--

INSERT INTO `axnotifications` (`notificationId`, `patientId`, `doctorId`, `appointmentId`, `notificationType`, `notificationTitle`, `notificationDescription`, `notificationTime`, `status`) VALUES
(5, 1, 1, 1, 2, 'Your online appointment with METROMINDD1 is booked!', NULL, '2020-03-11 06:01:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `axpackages`
--

CREATE TABLE `axpackages` (
  `packageId` bigint(11) NOT NULL,
  `doctorId` bigint(11) NOT NULL,
  `packageName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packageDuration` int(11) NOT NULL COMMENT 'In days',
  `packageDescription` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `noOfSession` int(11) NOT NULL,
  `packagePrize` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axpackages`
--

INSERT INTO `axpackages` (`packageId`, `doctorId`, `packageName`, `packageDuration`, `packageDescription`, `noOfSession`, `packagePrize`, `status`) VALUES
(1, 1, 'Psychiatrist Package', 30, 'Get Psychiatrist doctor consultation for one month', 5, 1000, 1),
(2, 1, 'Psychology Package', 30, 'Get psychology doctor consultation for one month', 5, 2000, 1),
(3, 2, 'Psychiatrist Package', 30, 'Get Psychiatrist doctor consultation for one month', 5, 1500, 1),
(4, 2, 'Psychology Package', 30, 'Get psychology doctor consultation for one month', 5, 2500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `axpatient`
--

CREATE TABLE `axpatient` (
  `patientId` bigint(11) NOT NULL,
  `uniqueId` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seoUri` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `countryId` bigint(20) NOT NULL,
  `patientMobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patientEmail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patientPassword` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` date NOT NULL,
  `gender` int(1) NOT NULL,
  `customGender` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImgUrl` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patientAddress` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `lastLogin` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `otp` int(11) NOT NULL,
  `isVerified` int(1) NOT NULL DEFAULT '0',
  `otpSendTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axpatient`
--

INSERT INTO `axpatient` (`patientId`, `uniqueId`, `seoUri`, `countryId`, `patientMobile`, `firstName`, `lastName`, `patientEmail`, `patientPassword`, `birthDate`, `gender`, `customGender`, `profileImgUrl`, `patientAddress`, `createdDate`, `modifiedDate`, `lastLogin`, `status`, `otp`, `isVerified`, `otpSendTime`) VALUES
(1, 'METROMINDP1', 'binil1', 94, '9638527410', 'Binil', 'C A', 'binil@ekselan.com', '494d08ee23f6e025fa4c57c2c6b32c85111fc065f830542903cea123764e90e27b0d1f508d4cc61a2e886172bfc1aa404ad2fff3dc384cd75be00a94fc472107gi5PojGj1wIGvuy/wAahUuBW7c1MIrrxw3RkSmfKYLA=', '1990-10-16', 1, '', '1.jpg', 'Cochin,Kerala,India', '2020-03-11 09:57:59', '2020-03-28 08:01:02', '2020-03-11 17:46:04', 1, 5668, 1, '2020-03-11 04:27:59'),
(7, '7', 'vasanth-kumar', 0, '9656436615', 'Vasanth Kumar', 'H', 'nhvasanthkumar@gmail.com', 'ORUX[^JLNPRTVXZ\\\\^`bd', '1992-11-06', 1, '', '7.jpg', 'Naladiyil house\r\nOrramana po', '2020-03-28 07:11:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1, '2020-03-28 12:11:28'),
(8, '8', 'vishnu', 0, '9656436615', 'Vishnu', 'D', 'vishnuq123@gmail.com', 'ORUX[HJLNPRTVXZ\\\\^`bd', '2010-07-14', 1, '', '8.jpg', 'XII bangloe\r\n2nd Floor\r\nClou Villa', '2020-03-28 07:27:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, '2020-03-28 12:27:37'),
(10, 'MMP10', 'nirmal', 0, '9656436615', 'Nirmal', 'V K', 'nirmal222@gmail.com', 'OQSUWYJLNPRTVXZ\\\\^`bd', '2010-03-11', 1, '', '10.jpg', '2n Floor\r\nnort karyavattom\r\ntrivanrum', '2020-03-28 07:32:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1, '2020-03-28 12:32:52'),
(12, 'MMP12', 'eldho_80', 0, '9656436615', 'Eldho', 'John', 'elho123@hotmail.com', 'ORUX[^JLNPRTVXZ\\\\^`bd', '2020-03-11', 1, '', '12.jpg', 'mattappillil', '2020-03-28 08:03:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1, '2020-03-28 13:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `axpatientcredits`
--

CREATE TABLE `axpatientcredits` (
  `patientCreditId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `paymentId` bigint(20) NOT NULL,
  `noOfSession` int(11) NOT NULL,
  `sessionDuration` double NOT NULL,
  `status` int(1) NOT NULL,
  `insDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axpatientcredits`
--

INSERT INTO `axpatientcredits` (`patientCreditId`, `patientId`, `doctorId`, `paymentId`, `noOfSession`, `sessionDuration`, `status`, `insDate`) VALUES
(1, 1, 1, 1, 0, 45, 1, '2020-03-11 11:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `axpatientrecords`
--

CREATE TABLE `axpatientrecords` (
  `patientRecordId` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `subscriptionId` bigint(20) NOT NULL,
  `patientCreditId` bigint(20) NOT NULL,
  `communicationMode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 - Video Call,2 - Audio Call,3 - Text Message',
  `communicationDate` date NOT NULL,
  `communicationStartTime` time NOT NULL,
  `communicationEndTime` time NOT NULL,
  `communicationDuration` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axpatientrecords`
--

INSERT INTO `axpatientrecords` (`patientRecordId`, `patientId`, `doctorId`, `subscriptionId`, `patientCreditId`, `communicationMode`, `communicationDate`, `communicationStartTime`, `communicationEndTime`, `communicationDuration`, `insDate`) VALUES
(1, 1, 1, 0, 0, '2', '2020-03-11', '11:44:00', '11:49:00', '5', '2020-03-11'),
(2, 1, 1, 0, 1, '1', '2020-03-11', '12:06:00', '12:19:00', '14', '2020-03-11'),
(3, 1, 2, 0, 0, '1', '2020-03-11', '12:06:00', '12:16:00', '10', '2020-03-11'),
(4, 1, 2, 2, 0, '1', '2020-03-11', '12:06:00', '12:10:00', '4', '2020-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `axpayments`
--

CREATE TABLE `axpayments` (
  `paymentId` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `packageId` bigint(20) NOT NULL,
  `paymentAmount` double NOT NULL,
  `paymentStatus` int(1) NOT NULL,
  `paymentDate` datetime NOT NULL,
  `paymentMethod` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axpayments`
--

INSERT INTO `axpayments` (`paymentId`, `patientId`, `doctorId`, `packageId`, `paymentAmount`, `paymentStatus`, `paymentDate`, `paymentMethod`) VALUES
(1, 1, 1, 0, 1200, 1, '2020-03-11 11:52:28', 0),
(2, 1, 2, 2, 2000, 1, '2020-03-11 12:00:15', 0),
(4, 1, 0, 0, 250, 1, '2020-03-11 16:16:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `axprescriptions`
--

CREATE TABLE `axprescriptions` (
  `prescriptionId` bigint(20) NOT NULL,
  `appointmentId` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `prescriptionNotes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `insDate` datetime NOT NULL,
  `totalAmount` double NOT NULL,
  `paymentId` bigint(20) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 - Doctor added prescription,1 - Patient Requested for medicine,2 - Admin added price, 3 - Patient Completed the payment,4 - Packed,5 - Shipped, 6 - Delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axprescriptions`
--

INSERT INTO `axprescriptions` (`prescriptionId`, `appointmentId`, `patientId`, `doctorId`, `prescriptionNotes`, `insDate`, `totalAmount`, `paymentId`, `status`) VALUES
(1, 1, 1, 1, 'Tab Azee 500mg 1 once daily(3)\nTab wikoryl 1-1-1(6)\nTab meftal 250mg 1-0-1(4)\nTab Rantac 150mg 1-0-1(6)\nSyrp cheston plus 5ml 3 times', '2020-03-11 15:41:14', 250, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `axrating`
--

CREATE TABLE `axrating` (
  `ratingId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `doctorId` bigint(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insDate` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-Active,2-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axrating`
--

INSERT INTO `axrating` (`ratingId`, `patientId`, `doctorId`, `rating`, `review`, `insDate`, `status`) VALUES
(1, 1, 1, 3, 'Test 1', '2020-03-11 00:00:00', 0),
(2, 1, 1, 3, 'Test Review', '2020-03-11 11:24:23', 0),
(3, 1, 1, 0, '', '2020-03-22 14:21:42', 0),
(4, 1, 1, 0, '', '2020-03-22 15:25:47', 0),
(5, 1, 1, 0, '', '2020-03-22 15:25:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `axreportissues`
--

CREATE TABLE `axreportissues` (
  `reportIssueId` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `reportIssueTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportIssueDescription` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `insDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axreportissues`
--

INSERT INTO `axreportissues` (`reportIssueId`, `patientId`, `reportIssueTitle`, `reportIssueDescription`, `insDate`) VALUES
(1, 1, 'Test 1', 'Test Desc 1', '2020-03-11 16:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `axrequestsession`
--

CREATE TABLE `axrequestsession` (
  `requestSessionId` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `sessionDuration` double NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 - Patient requested , 1 - Admin approved',
  `insDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axrequestsession`
--

INSERT INTO `axrequestsession` (`requestSessionId`, `patientId`, `doctorId`, `sessionDuration`, `status`, `insDate`) VALUES
(1, 1, 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `axsetting`
--

CREATE TABLE `axsetting` (
  `settingId` bigint(11) NOT NULL,
  `adminEmail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospitalName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospitalAddress` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospitalLogo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospitalWebsite` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospitalPhone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospitalEmail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defaultSessionDuration` double NOT NULL COMMENT 'in minutes',
  `traillDuration` double NOT NULL COMMENT 'in minutes',
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axsetting`
--

INSERT INTO `axsetting` (`settingId`, `adminEmail`, `hospitalName`, `hospitalAddress`, `hospitalLogo`, `hospitalWebsite`, `hospitalPhone`, `hospitalEmail`, `defaultSessionDuration`, `traillDuration`, `status`) VALUES
(1, 'binil@ekselan.com', 'MetroMind', '', '', '', '', '', 30, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `axspeciality`
--

CREATE TABLE `axspeciality` (
  `specialityId` bigint(11) NOT NULL,
  `specialityName` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `allotedTime` varchar(30) NOT NULL,
  `specialityImageUrl` varchar(250) NOT NULL,
  `createdDate` datetime NOT NULL,
  `seoUri` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `axspeciality`
--

INSERT INTO `axspeciality` (`specialityId`, `specialityName`, `description`, `allotedTime`, `specialityImageUrl`, `createdDate`, `seoUri`, `status`) VALUES
(1, 'Psychiatrist', 'Psychiatrists are medical doctors who diagnose and treat mental illnesses', '50 Minutes', 'Psychiatrist1.jpg', '2020-01-21 11:07:11', 'psychiatrist', 1),
(2, 'Counselling', ' Counsellors listen to, empathise with, encourage and help to empower individuals.', '35 Minutes', 'Counselling2.png', '2020-01-21 12:24:12', 'counselling', 1),
(3, 'Psychology', 'Psychology is the science of behavior and mind.', '15 Minutes', 'Psychology3.jpg', '2020-01-24 09:01:58', 'psychology', 1),
(4, 'orthopedic', 'orthopedic', '30 Minutes', 'orthopedic4.png', '2020-03-23 18:31:38', 'orthopedic', 1),
(5, 'ortho', 'orto', '10 Minutes', 'ortho5.jpg', '2020-03-24 13:28:44', 'ortho-5', 1),
(6, 'pediatry', 'pediatry', '50 Minutes', 'pediatry6.png', '2020-03-24 13:29:51', 'pediatry', 1),
(9, 'Otrthopedic', 'orthopedic', '05 Minutes', 'Otrthopedic9.jpg', '2020-03-28 00:42:30', 'qwwer1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `axsubscription`
--

CREATE TABLE `axsubscription` (
  `subscriptionId` bigint(11) NOT NULL,
  `packageId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `subscribedDate` date NOT NULL,
  `subscriptionEndDate` date NOT NULL,
  `noOfSession` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `paymentId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axsubscription`
--

INSERT INTO `axsubscription` (`subscriptionId`, `packageId`, `patientId`, `doctorId`, `subscribedDate`, `subscriptionEndDate`, `noOfSession`, `status`, `paymentId`) VALUES
(2, 2, 1, 2, '2020-03-11', '2020-04-10', 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `axsymptoms`
--

CREATE TABLE `axsymptoms` (
  `symptomId` int(11) NOT NULL,
  `specialityId` varchar(250) NOT NULL,
  `symptomName` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `symptomImage` varchar(250) NOT NULL,
  `status` int(1) NOT NULL,
  `seoUri` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `axsymptoms`
--

INSERT INTO `axsymptoms` (`symptomId`, `specialityId`, `symptomName`, `description`, `symptomImage`, `status`, `seoUri`) VALUES
(1, '3,2,1', 'Marital & Relationship Problems', 'Marital & Relationship Problems', 'gurgr13.jpg', 1, 'marital-relationship-problems'),
(2, '3,2,1', 'De Addiction -  Drinks,Smoke', 'De Addiction -  Drinks,Smoke', 'gurgr13.jpg', 1, 'de-addiction-drinkssmoke'),
(3, '2', 'Child Psychiatrist', 'Child Psychiatrist', 'gurgr12.png', 1, 'child-psychiatrist'),
(5, '3,2,1', 'Cope With Depression,Stress & Anxiety', 'Cope With Depression,Stress & Anxiety', 'gurgr12.png', 1, 'cope-with-depressionstress-anxiety'),
(12, '9,4,1', 'Fever', 'fever with no hungry', 'Fever12.jpg', 1, 'fever');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text COLLATE utf8mb4_unicode_ci,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(3, '1adc2e7712f265fa85fe865a0d9b059b', 1, 0, 0, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_tokens`
--
ALTER TABLE `api_tokens`
  ADD PRIMARY KEY (`apiTokenId`);

--
-- Indexes for table `axadmin`
--
ALTER TABLE `axadmin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `axappointments`
--
ALTER TABLE `axappointments`
  ADD PRIMARY KEY (`appointmentId`);

--
-- Indexes for table `axavailablesessions`
--
ALTER TABLE `axavailablesessions`
  ADD PRIMARY KEY (`availabletSessionId`);

--
-- Indexes for table `axcms`
--
ALTER TABLE `axcms`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `axcountries`
--
ALTER TABLE `axcountries`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `axdoctors`
--
ALTER TABLE `axdoctors`
  ADD PRIMARY KEY (`doctorId`);

--
-- Indexes for table `axfavourites`
--
ALTER TABLE `axfavourites`
  ADD PRIMARY KEY (`favouriteId`);

--
-- Indexes for table `axnotifications`
--
ALTER TABLE `axnotifications`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `axpackages`
--
ALTER TABLE `axpackages`
  ADD PRIMARY KEY (`packageId`);

--
-- Indexes for table `axpatient`
--
ALTER TABLE `axpatient`
  ADD PRIMARY KEY (`patientId`);

--
-- Indexes for table `axpatientcredits`
--
ALTER TABLE `axpatientcredits`
  ADD PRIMARY KEY (`patientCreditId`);

--
-- Indexes for table `axpatientrecords`
--
ALTER TABLE `axpatientrecords`
  ADD PRIMARY KEY (`patientRecordId`);

--
-- Indexes for table `axpayments`
--
ALTER TABLE `axpayments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `axprescriptions`
--
ALTER TABLE `axprescriptions`
  ADD PRIMARY KEY (`prescriptionId`);

--
-- Indexes for table `axrating`
--
ALTER TABLE `axrating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `axreportissues`
--
ALTER TABLE `axreportissues`
  ADD PRIMARY KEY (`reportIssueId`);

--
-- Indexes for table `axrequestsession`
--
ALTER TABLE `axrequestsession`
  ADD PRIMARY KEY (`requestSessionId`);

--
-- Indexes for table `axsetting`
--
ALTER TABLE `axsetting`
  ADD PRIMARY KEY (`settingId`);

--
-- Indexes for table `axspeciality`
--
ALTER TABLE `axspeciality`
  ADD PRIMARY KEY (`specialityId`);

--
-- Indexes for table `axsubscription`
--
ALTER TABLE `axsubscription`
  ADD PRIMARY KEY (`subscriptionId`);

--
-- Indexes for table `axsymptoms`
--
ALTER TABLE `axsymptoms`
  ADD PRIMARY KEY (`symptomId`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_tokens`
--
ALTER TABLE `api_tokens`
  MODIFY `apiTokenId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `axadmin`
--
ALTER TABLE `axadmin`
  MODIFY `adminId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axappointments`
--
ALTER TABLE `axappointments`
  MODIFY `appointmentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axavailablesessions`
--
ALTER TABLE `axavailablesessions`
  MODIFY `availabletSessionId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `axcms`
--
ALTER TABLE `axcms`
  MODIFY `pageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `axcountries`
--
ALTER TABLE `axcountries`
  MODIFY `countryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `axdoctors`
--
ALTER TABLE `axdoctors`
  MODIFY `doctorId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `axfavourites`
--
ALTER TABLE `axfavourites`
  MODIFY `favouriteId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axnotifications`
--
ALTER TABLE `axnotifications`
  MODIFY `notificationId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `axpackages`
--
ALTER TABLE `axpackages`
  MODIFY `packageId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `axpatient`
--
ALTER TABLE `axpatient`
  MODIFY `patientId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `axpatientcredits`
--
ALTER TABLE `axpatientcredits`
  MODIFY `patientCreditId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axpatientrecords`
--
ALTER TABLE `axpatientrecords`
  MODIFY `patientRecordId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `axpayments`
--
ALTER TABLE `axpayments`
  MODIFY `paymentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `axprescriptions`
--
ALTER TABLE `axprescriptions`
  MODIFY `prescriptionId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axrating`
--
ALTER TABLE `axrating`
  MODIFY `ratingId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `axreportissues`
--
ALTER TABLE `axreportissues`
  MODIFY `reportIssueId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axrequestsession`
--
ALTER TABLE `axrequestsession`
  MODIFY `requestSessionId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axsetting`
--
ALTER TABLE `axsetting`
  MODIFY `settingId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axspeciality`
--
ALTER TABLE `axspeciality`
  MODIFY `specialityId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `axsubscription`
--
ALTER TABLE `axsubscription`
  MODIFY `subscriptionId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `axsymptoms`
--
ALTER TABLE `axsymptoms`
  MODIFY `symptomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
