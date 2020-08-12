-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2020 at 11:21 PM
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
-- Database: `national_metromind_app_full`
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
(263, 0, 0, '123456', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE1ODUxMjcxMjlNRVRST01JTkRQNiI.QpoEjOCgXbud2Tz_5-kIQzH3afsFMdYsefAyUOjCHiM', '', '2020-03-25 09:05:29'),
(1093, 0, 0, '1478529630', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE1ODU2NDU5NDVNRVRST01JTkREMSI.PX1tTCVnPTh-YGlT3hIZje6YmIdNgahYIrzgxNCkoVE', '', '2020-03-31 09:12:25'),
(1097, 0, 0, '789456133', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE1ODU2NDYzMzNNRVRST01JTkRENCI.e_RS6hJktuxEc2dU75NifxOau4xOdTlnWuxa6Bxw9PY', '', '2020-03-31 09:18:53'),
(8067, 0, 0, '789456', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE1ODcxMTI2NzlNRVRST01JTkRQNjMi.zyAGfdFXesTJr-I4kkxxIt5Wy00qbhqXl-3r1BAV-sw', '', '2020-04-17 08:37:59'),
(8288, 0, 0, '12345', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE1ODcyMjIwMDRNRVRST01JTkRQMTEi.N6_KUIO-26KSE0J-WDElQuZ8UJzrZnmqweCANEV-1nE', '', '2020-04-18 15:00:04');

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
(1, 'Administrator', 'admin', 'caa7199a2086c62d7ebbfa2f37f33adf6d36037e3d4b65eb5ccf9bccfa43202b3837d4df152a78129b9045b8669b9b5e54278034cde53eb85cbc5c4417476989sArNd2MA+IPKCYRTEN9zI2UHeh6uM0BwKGDjnV+6I3E=', 'jinu@ekselan.com', 1, 1);

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
  `appointmentSession` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentStartTime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentEndTime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentNote` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `insDate` datetime NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-requested,1-approved,2-rejected',
  `isCompleted` int(1) NOT NULL,
  `completedTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axappointments`
--

INSERT INTO `axappointments` (`appointmentId`, `patientId`, `doctorId`, `requestDate`, `requestSession`, `appointmentDate`, `appointmentSession`, `appointmentStartTime`, `appointmentEndTime`, `appointmentNote`, `insDate`, `status`, `isCompleted`, `completedTime`) VALUES
(1, 1, 1, '2020-03-12', 'Evening', '2020-03-25', 'Morning', '11:00', '11:45', 'Test', '2020-03-11 11:35:32', 1, 1, '2020-03-11 15:35:13'),
(2, 1, 1, '2020-03-12', 'Evening', '2020-03-25', 'Morning', '11:00', '11:45', 'Test', '2020-03-11 11:35:32', 1, 0, '2020-03-11 15:35:13'),
(3, 1, 1, '2020-03-25', 'Evening', '0000-00-00', '', '', '', '', '2020-03-11 11:35:32', 0, 0, '2020-03-11 15:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `axavailablesessions`
--

CREATE TABLE `axavailablesessions` (
  `availabletSessionId` bigint(20) NOT NULL,
  `doctorId` bigint(20) NOT NULL,
  `availableDay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableSession` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableStartTime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableEndTime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axavailablesessions`
--

INSERT INTO `axavailablesessions` (`availabletSessionId`, `doctorId`, `availableDay`, `availableSession`, `availableStartTime`, `availableEndTime`, `status`) VALUES
(1, 1, 'Monday', 'Morning', '09::00', '11:00', 1),
(2, 1, 'Monday', 'After Noon', '11:30', '01:30', 1),
(3, 1, 'Monday', 'Evening', '03:00', '06:00', 1),
(4, 1, 'Tuesday', 'Morning', '09::00', '11:00', 1),
(5, 1, 'Tuesday', 'After Noon', '11:30', '01:30', 1),
(6, 1, 'Tuesday', 'Evening', '03:00', '06:00', 1),
(13, 1, 'Wednesday', 'Morning', '09:00', '11:00', 1),
(14, 1, 'Wednesday', 'After Noon', '12:00', '02:00', 1),
(15, 1, 'Wednesday', 'Evening', '04:00', '07:00', 1),
(16, 1, 'Thursday', 'Morning', '09:00', '11:00', 1),
(17, 1, 'Thursday', 'After Noon', '12:00', '02:00', 1),
(18, 1, 'Thursday', 'Evening', '04:00', '07:00', 1),
(19, 1, 'Friday', 'After Noon', '01:30', '03:00', 1),
(20, 1, 'Friday', 'Evening', '04:00', '06:30', 1),
(21, 1, 'Friday', 'Night', '07:00', '09:00', 1),
(22, 1, 'Saturday', 'After Noon', '02:00', '04:00', 1),
(23, 1, 'Saturday', 'Evening', '05:00', '07:00', 1),
(24, 1, 'Saturday', 'Night', '07:30', '09:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `axcms`
--

CREATE TABLE `axcms` (
  `pageId` bigint(20) NOT NULL,
  `pageName` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `shortDescription` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axcms`
--

INSERT INTO `axcms` (`pageId`, `pageName`, `description`, `shortDescription`) VALUES
(1, 'Privacy Policy', 'COMING SOON !!!', ''),
(2, 'Faq', 'COMING SOON !!!', '');

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
  `deviceRegistrationId` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicalLicense` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isVerifiedLicense` int(1) NOT NULL,
  `counsellingCertificate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isVerifiedCerificate` int(1) NOT NULL,
  `fcmToken` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatRoomNumber` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicalRegistrationNumber` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequenceOrder` int(11) NOT NULL,
  `loginStatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axdoctors`
--

INSERT INTO `axdoctors` (`doctorId`, `uniqueId`, `doctorName`, `doctorEmail`, `doctorPassword`, `doctorMobile`, `doctorImageUrl`, `youtubeLink`, `specialityId`, `qualification`, `knownLanguages`, `experience`, `doctorAddress`, `specialization`, `doctorFee`, `age`, `gender`, `communicationMode`, `status`, `seoUri`, `createdDate`, `modifiedDate`, `lastLogin`, `doctorSessionDuration`, `otp`, `isVerified`, `otpSendTime`, `deviceRegistrationId`, `medicalLicense`, `isVerifiedLicense`, `counsellingCertificate`, `isVerifiedCerificate`, `fcmToken`, `chatRoomNumber`, `medicalRegistrationNumber`, `sequenceOrder`, `loginStatus`) VALUES
(1, 'METROMINDD1', 'Dr. Thalhath. P', 'thalhath@metromind.com', '795779463ab24e112f3ca9be58a03781f55d0da7030d157b94b30f7ac22116a3b950afa16c36262bb0723d9ee537824e33b1cc3e6b7ec6f6aadfccf02886bf10CDFmi7GCyYJSQBU3zQHsXqEOE116CKb5TIe/BuF5c20=', '+917894561231', 'METROMINDD1.jpg', 'https://www.youtube.com', 1, 'MBBS,MD', 'Hindi,English,Malayalam', '25 Years', 'Ernakulam,Kerala,India', 'Consultant Psychiatrist', 900, 0, 0, '1,2', 1, 'dr-thalhath-p', '2020-03-05 00:00:00', '2020-03-25 14:47:01', '2020-04-15 16:39:56', 30, 11111, 1, '2020-03-10 05:24:02', '12345', 'POIU789456', 1, '', 0, 'cKidRK7ARsGXZK_7RNoNUh:APA91bEjxpcX_iDnlVw6S7khTfouYKl3FrEBQhDiYCDEmt_ZX-ju8emTM4E2qydUfpxiY7EsxGlII95m3LxFb5u71FYRynzOeLwTRSfI6XuJ5krh_SEn0ZoCpQIcmEG8_TysHYAVfkYm', '14040', '42842', 1, 1),
(2, 'METROMINDD2', 'Dr. Sister Liza ', 'liza@metromind.com', '8f219c6a8a105406128fb9e31f05cca791e96c6f8e7862d7cb506f90a53c4ab7df12a705366aad6f76e78e32cf70501af4082f5d5f5561f5df5cc3e693b4b8c1mL3rBTKd53ByxKtEfJp5MiRd6XRabiML36GyU2hBIm0=', '+917894561232', 'METROMINDD2.jpg', 'https://www.youtube.com', 1, 'MBBS,MD', 'English', '13 Years', 'Cochin,Kerala,India', 'Consultant Psychiatrist', 900, 35, 2, '1,2,3', 1, 'dr-amrita-thomas', '2020-03-05 00:00:00', '0000-00-00 00:00:00', '2020-04-15 10:00:25', 30, 0, 1, '2020-03-10 05:24:02', '12345', '', 0, '', 0, 'eRyYYx5KQcGjw03EC2w3rS:APA91bGPbbTK4-l3Rvyz9gAsKVukt-9RW1vgJP6v_NTXQY66sMw-topSlOGg4F4FQSHIpoQx1qg3OpEtByKj0-cOi_t0Mg_vvSTxdIrcD60AE3Va8C6Hk1JbPICGqEpSRexl2GVdaidL', '14041', '36841', 2, 1),
(3, 'METROMINDD3', 'Dr. Ashitha Nair', 'ashitha@metromind.com', '8f219c6a8a105406128fb9e31f05cca791e96c6f8e7862d7cb506f90a53c4ab7df12a705366aad6f76e78e32cf70501af4082f5d5f5561f5df5cc3e693b4b8c1mL3rBTKd53ByxKtEfJp5MiRd6XRabiML36GyU2hBIm0=', '+917894561233', 'METROMINDD3.jpg', 'https://www.youtube.com', 1, 'MBBS,MD', 'English', '13 Years', 'Cochin,Kerala,India', 'Consultant Psychiatrist', 900, 35, 2, '1,2,3', 1, 'dr-john-deo', '2020-03-05 00:00:00', '0000-00-00 00:00:00', '2020-04-11 22:58:52', 30, 0, 1, '2020-03-10 05:24:02', '12345', '', 0, '', 0, 'fZ2R6rm5SOajm3l-HUoFgQ:APA91bFw1cn0SwjontI__WCQu3pyEcZm45aIbHLB-QORv-SeeKB4COPg5NpVnS6ZvY8yCpGn5vAtAHPwunMWssyIGVJMaD8Ge2O6EorN_cMBaoI6HT7_3w98FFO5zW2eowdh3Doy0MF0', '14042', '47610', 3, 0),
(4, 'METROMINDD4', 'Dr. Sharon Thomas', 'sharon@metromind.com', '8f219c6a8a105406128fb9e31f05cca791e96c6f8e7862d7cb506f90a53c4ab7df12a705366aad6f76e78e32cf70501af4082f5d5f5561f5df5cc3e693b4b8c1mL3rBTKd53ByxKtEfJp5MiRd6XRabiML36GyU2hBIm0=', '+917894561234', 'METROMINDD4.jpg', 'https://www.youtube.com', 3, 'MBBS,MD', 'English', '13 Years', 'Cochin,Kerala,India', '\r\nClinical Psychologist,\r\nOccupational Therapist,\r\nMedical Social Worker\r\n', 900, 35, 2, '1,2,3', 1, 'dr-john-deo', '2020-03-05 00:00:00', '0000-00-00 00:00:00', '2020-04-10 14:19:53', 30, 0, 1, '2020-03-10 05:24:02', '12345', '', 0, '', 0, 'dez_8bSNQqKYuhtnAA-prJ:APA91bHvD1RFrme2yXvsZ-iPocuLoELkSjD2w1fmO7ZUVJIBA8CK4yhojFek8rxXArYcg7UOvbu6PRjcvzBvqKQDljuuB7S_c8n3zJ-IK77ZvC73sQWaSzTgQZdIyR1C8W1_bp3-B0cf', '14043', '50277', 4, 0);

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
(1, 1, 1, '2020-03-11 12:23:28'),
(2, 1, 1, '2020-03-23 16:09:35'),
(3, 1, 1, '2020-03-23 16:11:16'),
(4, 1, 1, '2020-04-17 18:31:12');

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
(7, 1, 1, 1, 1, 'Your online appointment with METROMINDD1 is booked !', NULL, '2020-03-25 04:23:30', NULL),
(6, 1, 1, 1, 1, 'Your online appointment with METROMINDD1 is booked !', NULL, '2020-03-25 04:21:37', NULL),
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
  `otpSendTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deviceRegistrationId` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcmToken` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axpatient`
--

INSERT INTO `axpatient` (`patientId`, `uniqueId`, `countryId`, `patientMobile`, `firstName`, `lastName`, `patientEmail`, `patientPassword`, `birthDate`, `gender`, `customGender`, `profileImgUrl`, `patientAddress`, `createdDate`, `modifiedDate`, `lastLogin`, `status`, `otp`, `isVerified`, `otpSendTime`, `deviceRegistrationId`, `fcmToken`) VALUES
(1, 'METROMINDP1', 94, '+919638527410', 'Binil', 'C A', 'binil@ekselan.com', '379a65512cecd1bd94230706f6f7b944f62ef9573516cfa4cbedd0c3a81db0360964bd58964be8aed785c8ced71464a1509034f7d3d859da9202a63d5118948beUuuxAVdUQeuIc7w6r4P0pWVYazAd0N3SIPzLl7MJ+c=', '1992-10-16', 1, '', 'METROMINDP1.jpg', 'Cochin,Kerala,India', '2020-03-11 09:57:59', '2020-04-15 16:50:07', '2020-04-15 16:49:47', 1, 11111, 1, '2020-03-11 04:27:59', '12345', 'jhsdhjhjhjhj9896528hhkjkhjy466weryugh'),
(2, 'METROMINDP2', 0, '+919638527411', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-03-11 17:22:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 9496, 0, '2020-03-11 11:52:49', '', ''),
(3, 'METROMINDP3', 94, '+919638527412', 'Jinu', 'Abraham', 'binilca@ekselan.com', '17f92317bf8aa0ff0e2a8d2818667dcd661df76098a31a37873305ddaa8a91960452338d3b1ddbecb0975a2da9b3a3a3c13015b41b23fee83a55118b14ba9439uj3feHBrdlQqicgRtPiICCJ3wH91Sfk7DIkRjxi1BHE=', '1992-10-16', 1, '', '', '', '2020-03-11 17:25:07', '2020-03-11 17:30:53', '0000-00-00 00:00:00', 1, 1234, 0, '2020-03-11 11:55:07', '', ''),
(4, 'METROMINDP4', 0, '+919638527413', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-03-11 17:33:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 9496, 0, '2020-03-11 12:03:04', '', ''),
(5, 'METROMINDP5', 0, '+919638527415', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-03-25 11:13:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1234, 0, '2020-03-25 05:43:50', '', ''),
(6, 'METROMINDP6', 94, '+919638527416', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-03-25 14:34:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1234, 1, '2020-03-25 09:04:35', '', ''),
(8, 'METROMINDP8', 94, '+919638527417', 'John Deo', '', '', '', '0000-00-00', 0, '', '', '', '2020-03-30 13:49:20', '0000-00-00 00:00:00', '2020-03-30 13:50:33', 1, 0, 0, '2020-03-30 08:19:20', '789456', ''),
(9, 'METROMINDP9', 94, '+919638527418', 'John Deo', '', '', 'ccc22ad35e0b98b6b0db5c42435e86ecdc8540d7ed78d7c7933a15287faca542a7ce78291f9af890d844723894a66c3cc0f02312c9b6d9339859b264201b43f4Qa5sXF4OdMvjqHNoVKKJqelEYgdtdT9S3enPJqWsvlQ=', '0000-00-00', 0, '', '', '', '2020-03-30 15:14:57', '0000-00-00 00:00:00', '2020-03-30 15:15:26', 1, 0, 0, '2020-03-30 09:44:57', '789456', ''),
(10, 'METROMINDP10', 94, '+919638527419', 'John Deo', '', '', '4aca2caac706647b25ee4367188a46845deef7d1f22b0dc898fbd485cca642dc62d495acff35c72bc835afbe5ba4ff709f5019c7cfe9dc3271afbb9180f2f2c5yY6ydc1gCJkZbQy1ig1PGDnYSJGoC2q5s0EY3NHUC5M=', '0000-00-00', 0, '', '', '', '2020-03-30 18:34:15', '0000-00-00 00:00:00', '2020-04-03 17:02:55', 1, 0, 0, '2020-03-30 13:04:15', '789456', ''),
(11, 'METROMINDP11', 0, '+918888888888', 'sujith', '', '', 'b2523eb9efdcaa2ac3e9c214cb3920bdacc06266240e38bc61d2fe4c4bf30dab8dc651be07effdd42be6d8685a5c94e3606cc75dfad8040583b99fcc7403682b8435FOdSriLvT/H7S1iNmC/MD1dm7x79OL6RaRxWn0c=', '0000-00-00', 0, '', '', '', '2020-03-31 11:48:33', '0000-00-00 00:00:00', '2020-04-17 18:29:57', 1, 11111, 0, '2020-03-31 06:18:33', '12345', 'cwUdvAJ7Qda8CH-kjaeO27:APA91bEGpL--dHXHIlWHIx2mHt0QtAkGv4QABwVkA6ny7iRnJubVzOU16Pq1nFKTE96wy3ZB5n963_hpdGazTs0pZbB2KdDGPKusvBSNj2iUi2TI93j6Z7n0NQ7B4k-LJUzC3ReRAJZQ'),
(12, 'METROMINDP12', 0, '+918888888880', 'sujith', '', '', 'cd8f0d1d939954e9f66d90e822e0bfccc68df059601692f748988de6459a710f49157ffc782a88ce7d7cb228124b1f24eb554a93300985f40ca39db472af59aaGiwetecdp+AfJxKj6BAkbx6nU3dSq7WtcPcRjjsxTVs=', '0000-00-00', 0, '', '', '', '2020-03-31 19:41:48', '0000-00-00 00:00:00', '2020-03-31 19:41:50', 1, 0, 0, '2020-03-31 14:11:48', '12345', 'dxDVZ9QGrSY:APA91bGJesJ_zygp-8dRrWj-b87oVl-ggfU8A3WNgz9C2piPZke9FySZDVbYJQqhkCdlGNUtGU74M6EX0_vubZWsT8Az49C9t5brhlDVEgA6eTqWuP2ZZ_liw6VQoPG8XFO6-vjEZcAg'),
(13, 'METROMINDP13', 0, '+917894561233', 'Ashitha', '', '', 'a6566147373f71c03ab7f729de60c5dc350834d9c95d7564152ee21d27bb403b7c9c37b6347cb567c6f8d35198144ab13610a1fd1ac364b6aa8ef01e272eae34JO/ZZBAArKelv9XDItOgwKPBhZZocsuRYV/klKO0LGs=', '0000-00-00', 0, '', '', '', '2020-04-03 17:02:53', '0000-00-00 00:00:00', '2020-04-03 17:02:57', 1, 0, 0, '2020-04-03 11:32:53', '12345', 'eVoSxcCBR1s:APA91bGDI3jMFuvuP35MN3rf1ySrfwUDNAB62zdQZnNfJTpwejnrx-WpWWm7Lb1UVuNhOqP6ECACo75SORM4Amq1Gk-5qUny_VmasXV0EurPIkZHCm7zGAG8VDxj37pNc44gFwjKeZaE'),
(15, 'METROMINDP15', 94, '+919638527421', 'John Deo', '', '', 'b03d42b7c5af6a17ba0a8cf5a2191a5498cbc02b90b13a5c9297f3abc71fe95d8b3176d9910866410b9e5b46d69c32aa0dc125da8431166cecbf2e8ffaac84d3u2t0/PZ5SKEn1YEsPhg6/ixc7hnj+rohz0Gc/otJCMA=', '0000-00-00', 0, '', '', '', '2020-04-03 17:05:39', '0000-00-00 00:00:00', '2020-04-03 17:08:39', 1, 0, 0, '2020-04-03 11:35:39', '789456', ''),
(17, 'METROMINDP17', 94, '+919638527422', 'John Deo', '', '', '6b9a5b8fe6e5b3f0882424e9721df9b256efd895e8cf0bfe13f3a7d6335fb39ddcf74450b3057fb299bfeda1e5898f721d0a852559b1e004637a640d8b16094d0q6yRQVyK6p3k5epkZsIszmvHDsXuGRfaLtRH+/6yHA=', '0000-00-00', 0, '', '', '', '2020-04-03 17:10:50', '0000-00-00 00:00:00', '2020-04-03 17:14:03', 1, 0, 0, '2020-04-03 11:40:50', '789456', ''),
(18, 'METROMINDP18', 14, '+937894561233', 'Ashitha Nair', '', '', '2519d3ee7ed6805d4679065c702df62332bae5cbf06b293cc7c2aff87d76440d4a1be23334086513359fb5cc4f94cb7c1d6c2ea2bf82298c65ffd9147c31bd53PNhCu+7pgd3XEUhOb0ymM3PXyTvTiyTlBZhpCrPiN2M=', '0000-00-00', 0, '', '', '', '2020-04-03 18:08:20', '0000-00-00 00:00:00', '2020-04-04 20:40:35', 1, 0, 0, '2020-04-03 12:38:20', '12345', 'cx1zdj3OTUWjTK4jd3HN_a:APA91bEaL-uEa_oOJ7h8Nr2CXNOPJx2LByDOtsucUnZ5-a0JRBJMDwV08frtNDN4IJBXsq5CMM2ba3ZoBfzCbfGUTLJQcx1f_KZOSBnyml9QgnwAWFOcwQdF3Pdnom61vSyVDNxGbkSn'),
(19, 'METROMINDP19', 94, '+919995803242', 'Dileep Kumar P B', '', '', '56011d9c2da92f6be63f5bc6757c39b1436688e887f81acb4283fcc8c09c76d2c6835065ac6bb955b0ca1b558fc3bde5cd239a47cc37d510878a1648c90007ebPz1F5QBMoCOCSV1ohdWBto3gvPGS+hq5/RCVm66kSpc=', '0000-00-00', 0, '', '', '', '2020-04-04 11:31:33', '0000-00-00 00:00:00', '2020-04-11 22:47:22', 1, 0, 0, '2020-04-04 06:01:33', '12345', 'fZ2R6rm5SOajm3l-HUoFgQ:APA91bFw1cn0SwjontI__WCQu3pyEcZm45aIbHLB-QORv-SeeKB4COPg5NpVnS6ZvY8yCpGn5vAtAHPwunMWssyIGVJMaD8Ge2O6EorN_cMBaoI6HT7_3w98FFO5zW2eowdh3Doy0MF0'),
(20, 'METROMINDP20', 14, '+938888888888', 'sujith', '', '', '22b1a54466f5de5e4e3ea014dcbcb5d75da4cd114a367d5377e96a5f2edc7cc3eff73843a7006bc9fbba4687d1005b4e5a38a4d1137f226716b3d765b671afacScUeVDniuK2K6SRBJa5P1qHzIpWpn4K+MjXL9GwHURw=', '0000-00-00', 0, '', '', '', '2020-04-04 14:58:21', '0000-00-00 00:00:00', '2020-04-06 21:13:44', 1, 0, 0, '2020-04-04 09:28:21', '12345', 'e3Se9vVuQKux7JGDISPOCi:APA91bEZjuwvEA-LY0Npu9oaECbu19dY08sW7BUVbrE2vTohCjsmB8ZiUzk7rgvcrK3CAsb5FZmLN0dJ8cxWbdmsdmtMJt6jguPCI8UeWuWq3VggMTSn1ctvcljYhjP1_VyD1S2fh0L9'),
(21, 'METROMINDP21', 92, '+3530872471142', 'Romy Mathew', '', '', 'f407c3847c5a7ddd352d8b5f41c465f2ed421a94c86808d4583d3307592806cd1538d80a2bdd4ac89dedd5a97317ebbb1bbb9c0e7b4afa036997419db1b0e092D1G88PyT3lCaLXg1n4FxjafedJJFG2wnQnvGA3sZqSI=', '0000-00-00', 0, '', '', '', '2020-04-04 16:28:21', '0000-00-00 00:00:00', '2020-04-04 16:28:23', 1, 0, 0, '2020-04-04 10:58:21', '12345', 'cTrGTSO4vGk:APA91bHEPsE7Yd8LI_1AsO0rTCVTdB6KKy3uVtu-pJ5tINRvbfEyUhoGGo8abQ8JThCHdqGPlPGJjtGQ6ex4mvXP3AJ2h5NZOM2K-9kT6I8D1IK3hm0F8z8_ZN6_0NFF4jviCDLfhDMR'),
(22, 'METROMINDP22', 94, '+919744543281', 'Abin V Joy', '', '', '9272b0fc463b38c2965c8c24f4269d41af2c8aab1b75aa726d6e5657bbff4a2c007725e026be41d571c321d9aef66542e7fefbf909150d5780fdd2eda8c4269cqN699dCkuGzNxtyv1Pq8WqYRHzWFyWIRPmOvwYoJVgQ=', '0000-00-00', 0, '', '', '', '2020-04-06 13:07:21', '0000-00-00 00:00:00', '2020-04-15 00:57:48', 1, 0, 0, '2020-04-06 07:37:21', '12345', 'dEu7we9HTaObRd_t-PGHGr:APA91bG55K2_VUYstXrFnxiVb3gFH47AHh23USyiVYisyDMrNbzO8rbaXV32i10B2bVbnubUk2tpxYz9C9pDe5NdOMpsO7b9Q9y9paz3yTq5wMsyJK0NaY1NmjQTKhfB77eB7MD04-IG'),
(23, 'METROMINDP23', 94, '+918891947511', 'Dileep', '', '', 'c721f1a4ea7f133c4b0d68b201097d2f8f17b89afaca05ed9e985f50e949d572f87f06e0f2f05b66850a87e9cee9683f2797ddc7223cfd7033d622e16e719247CYHrUfYQ/blw7aB4dIvjNL3hnHmZ6ul84uFVDrDong8=', '0000-00-00', 0, '', '', '', '2020-04-06 20:41:31', '0000-00-00 00:00:00', '2020-04-10 22:28:09', 1, 0, 0, '2020-04-06 15:11:31', '12345', 'fZ2R6rm5SOajm3l-HUoFgQ:APA91bFw1cn0SwjontI__WCQu3pyEcZm45aIbHLB-QORv-SeeKB4COPg5NpVnS6ZvY8yCpGn5vAtAHPwunMWssyIGVJMaD8Ge2O6EorN_cMBaoI6HT7_3w98FFO5zW2eowdh3Doy0MF0'),
(24, 'METROMINDP24', 94, '+910872471142', 'Romy Mathew', '', '', '94868e4a1601faea36855ca3ee78218a57bdaed7343877a7f376f8d0c9bccdb588611c3bdfc2fa6b735fe34f59d859331de45043a01e3fbda19c93b7f3f648b1liWI4WXJlF2MgQpfl8vhLHozLan4dW05OdpTf23J/Co=', '0000-00-00', 0, '', '', '', '2020-04-06 23:43:26', '0000-00-00 00:00:00', '2020-04-11 22:56:36', 1, 0, 0, '2020-04-06 18:13:26', '12345', 'cAYC_z6qSlG5WQwBOzM1hp:APA91bGgaI42BTyXG3lvQRxlX1Aly19T0ZKd0S3wUcEOQ6okKCSDIszTyR3FcE02FwBUMlpCW9beSNHZ-Y-r4W-2FYoagt1SOcnwCQW3CqYeD-Gx0USHDAKUnBO08kddMDRX5XWaAD_X'),
(25, 'METROMINDP25', 94, '+917012644891', 'Dr Anisa M', '', '', '2992b3e05ed925671f79ecd0e9fe5964eb9272f4875cf8a724bddf76ec1df4227da02a1dccdca06f4970421bd8a73c337087aad3f9eb8a4767623969b0948aa0qdNgtIMP+7GzwUlXaMp8ba+3emNBLinG2JKPGoMAtzI=', '0000-00-00', 0, '', '', '', '2020-04-07 21:42:32', '0000-00-00 00:00:00', '2020-04-12 21:53:00', 1, 0, 0, '2020-04-07 16:12:32', '12345', 'ffEuyAV4SzCnlxAtW6K9dr:APA91bF6FsR8KMPaGgdZGhxSUHFMzDa5JyZEfdRM60whKfwCCZ2nXKvU9Rs5JrX9XmkhM04zy9WgNnzQyzfK0gIJR06eSIB8mFujW_ydbICh-3p3CFIhBivop8FQgpS_I8kFWqQHH_rj'),
(26, 'METROMINDP26', 94, '+917012644894', 'Dr Anisa M', '', '', 'bafddb71942f5fddaf01dca9571699f5770274218110719548cde1287a11a06f3b0f3fc0bb6d35fedc5974362175391dd2aa77f80ecf47b693c53630b4a08402bqWH0Uk8g0kWLPH3wi50knzKgWRk9Fz29vwaJ/UdUnE=', '0000-00-00', 0, '', '', '', '2020-04-07 21:54:21', '0000-00-00 00:00:00', '2020-04-07 21:54:22', 1, 0, 0, '2020-04-07 16:24:21', '12345', 'fMhXERE6SzKLPX3szbKTVO:APA91bG9ZiqZrIA-vCshcVGuw03ndAymYP2PTr_oCjrIpjBWZEM4yr2X1UzWUUg12rHs_ZVDfMsm-F0hWQ8YyA4lAt4rynPOkifUZz9gHArz-P1wplPMPE0MvkngRJry0uDGcUnvBvFR'),
(27, 'METROMINDP27', 94, '+917012735765', 'Ramsi Raghunath', '', '', 'd017bedf5b9899b00fe6a61f2f9269770d3e1e7935e0edf8fc729ddde4c7e3929d735c0e2b153c2377747c6b2bfccbf1a35ed7467256a4e020100eed8fd08d54mB0BoGMqswHPZudLDp1PT/VcxB4nsosSTnC5wHdlNMU=', '0000-00-00', 0, '', '', '', '2020-04-07 22:28:56', '0000-00-00 00:00:00', '2020-04-15 09:53:16', 1, 0, 0, '2020-04-07 16:58:56', '12345', 'eRyYYx5KQcGjw03EC2w3rS:APA91bGPbbTK4-l3Rvyz9gAsKVukt-9RW1vgJP6v_NTXQY66sMw-topSlOGg4F4FQSHIpoQx1qg3OpEtByKj0-cOi_t0Mg_vvSTxdIrcD60AE3Va8C6Hk1JbPICGqEpSRexl2GVdaidL'),
(28, 'METROMINDP28', 94, '+917012329350', 'E M Mohammed', '', '', '4a68e3cd519e0dab72ece07f6e1505a7ee6875ac49b8ea4c119de39ee013f51d751bc2ecf5ef3509730e3aa07f1db30268666cc24c9c56f5d49562f897d3374a/uCH7J83La2Ru0uIaI1jRSzyNQZTM4rBVGaGhPlvqx0=', '0000-00-00', 0, '', '', '', '2020-04-07 23:22:54', '0000-00-00 00:00:00', '2020-04-12 20:03:28', 1, 0, 0, '2020-04-07 17:52:54', '12345', 'fDfalnbMSg2MAbOW4yia6l:APA91bHK94NFSftNXeVEftrTSb_4jk_5avCg4bDY7Y-95xoFmbs9uV3uMdr1ioNYlPjsLa1BTuw8RE3NyKVxwkLVyWy1-CxSrnJ6njkh2gVbJWh-gX4ptAGRad6qwiUMnL8vuwnzKzYx'),
(29, 'METROMINDP29', 94, '+917306153764', 'thaha paloli', '', '', '8f7c54762fe6d0c01db4032f1c1b8d775dafb40ff92a7045710fd61f779616ae2d99d5ca655613dff32b2ff52d20d75bec9877a13000867074fb100734472e9aVM/HNO4Pd7McetOarHpLVFqrFWvOvZX0uNMus79qESc=', '0000-00-00', 0, '', '', '', '2020-04-07 23:31:58', '0000-00-00 00:00:00', '2020-04-09 23:54:56', 1, 0, 0, '2020-04-07 18:01:58', '12345', 'dMn_ryFAQBWzkw9EbFX_Ip:APA91bE_pAXgBIWp_DEROaD0KdaOZgzW6AeS2HmV40RR3dfWnTv8R6li5ciCu4bjFz5hagzRMMQ0dbzPKYawL9UnlEmzFmxpTQrp5rJQbxSijJI29AZIP1xJY9VGaNBRueaDfEFP5kYD'),
(30, 'METROMINDP30', 94, '+917012230856', 'Shabana Ismail', '', '', '2ec81bc1668f24ea500cf14a40f1976449d7b79c25530452db5d547eaf355fa5402d1b9261ea9bda126ff8e37ebc8604b6620628a4c3590b6766eb20aaf206e4MqTEWeo22RjEXCZ9qaslAyj7kc7hoBarxVWyMtCjOCs=', '0000-00-00', 0, '', '', '', '2020-04-08 00:22:27', '0000-00-00 00:00:00', '2020-04-08 00:22:29', 1, 0, 0, '2020-04-07 18:52:27', '12345', 'cuuUumYRQ6SvBXKnCqKnub:APA91bFBab6sZh5mZVTZYulvVg1WI2r2S4PEqTm2ii_XzRlWVTPEIzOpCDY16PoPGeqpnP3HgCrGIMcZkvFTr5lIYp4B7dpAIMbK3BX0GdvhtX6-CwD1ICQtlFn5G0SeKTBOrs-88rqP'),
(31, 'METROMINDP31', 94, '+919895885599', 'Ashitha M L', '', '', '77e8c88cd29d4acb6d3066b6a4e3a378fc1aedec1dc86df1547f22cb0705aa64ea3e8f86e1d09a38fb64185d63c27b566681fef44eac76a554a207633301d823RycSMnM6Y9SVCFllB+FxSVJYg8cJZsH+3cYiEgbbRUY=', '0000-00-00', 0, '', '', '', '2020-04-08 09:44:40', '0000-00-00 00:00:00', '2020-04-11 11:28:00', 1, 0, 0, '2020-04-08 04:14:40', '12345', 'cqX-MNKiQqO2OqXrJNwuMG:APA91bGnr7i6q2Y95vMXrkCCqbEeGSJkh6KaT36vteI5NDc_jiR1vkWUP_aDhB1gkctjoQWgQQy3KhOP6fLKS6157xdReebCMZ2JzXitHppa3Y-HCBFcuLBi7L3sYEc-XdkAnnVso_d8'),
(32, 'METROMINDP32', 94, '+919446458977', 'shahnaz', '', '', '1ebc02047fe97c1255184352f3b752da12edcced23e1744368458f89cf935a99d40ce156d401841b0771b1568540bd7598966303912c6b6d57bea63b6f6699cfaxR030WZi6CAcf2SxDu6X7be9V/19viuzSVUWSllI6M=', '0000-00-00', 0, '', '', '', '2020-04-08 10:55:13', '0000-00-00 00:00:00', '2020-04-08 10:55:14', 1, 0, 0, '2020-04-08 05:25:13', '12345', 'fIAySChGTtS7sU2wW29Jo4:APA91bE1Pl88xu-W-gXmyOExo8odmNqGeSz0Dy-NEvu1CO8S6qmBr8U6wjFTJC-iY6iDUJK9BwCD-0iUBoAEa-zi_RfYYlW0eXM8QHFLHf8UXxqYKLVVrF051MuBCbq6ER9qcj5R8ERz'),
(33, 'METROMINDP33', 94, '+919495315208', 'Mohammed', '', '', '88c06c525a8bf9a3aeed9991d8885aec7293193578edc7f7d5189b244eae221acaefa1aa40e8b0cf480c47d2fa7a6740f37c020847981ecb5e16c4d3c772861dvrRmKgQmERT+2dZT/f9Wlu3f81DWpXg0NBccocQUPeo=', '0000-00-00', 0, '', '', '', '2020-04-08 11:02:24', '0000-00-00 00:00:00', '2020-04-08 11:02:24', 1, 0, 0, '2020-04-08 05:32:24', '12345', ''),
(34, 'METROMINDP34', 94, '+918921668170', 'jisam', '', '', '3c456243130e8d946b8a87e0a08d5051891b9441429b93414a0247f5193a9f6458238c070a87c4b7531c19d3b7e42b4e8d65958e234287ab52bcaecdcf6abaeb9oZ+4PJoUkzBWTvm7EpSE22EIsboDghd6LWHPE7NIYc=', '0000-00-00', 0, '', '', '', '2020-04-08 11:50:47', '0000-00-00 00:00:00', '2020-04-08 11:50:49', 1, 0, 0, '2020-04-08 06:20:47', '12345', 'eWiKkdmWTKeNIEFcMtnpIK:APA91bFghHL8D6vkfGpcD3RKO7RZZ0WzG1JKeGTQIFP7BbIFoAPphNDV2GWLiQNcXXEhCCiirawKT5UpV_APzK4Z0G9FK_dbJxsFqfbaVf7iL1L4s8_j1KX1a1g33J8D1jzhyO0pV1Ay'),
(35, 'METROMINDP35', 94, '+917902823826', 'thalhath', '', '', '29097e3ec701d0ad7c3bee6aa536a6d5abafd7360d834eaf56d04d5c99efddd104ece16884106bb0c869907137c28afe2accec16134518acc06e2fd7af97073cpKCV97gjPVV3v2ogd5vGdRkAHEg+ulUf4fJXRuc1x1o=', '0000-00-00', 0, '', '', '', '2020-04-08 12:57:02', '0000-00-00 00:00:00', '2020-04-11 21:31:26', 1, 0, 0, '2020-04-08 07:27:02', '12345', 'fEHS4-7NSAyeE7EqPKsgcY:APA91bEYg7fBgbjfGAusCmxZVDHz5eaSsMsa2ig0DQWfs9_S4k-1ybKlWa0graaU9xOz5g4ijPKrMktzQ-3DXb5qPbZvulEX5VHZeEXMnPqS4gZ0oc8pJSCe7ZWDXYOKRn5xNgGVep4g'),
(36, 'METROMINDP36', 94, '+919495509544', 'Dr. Sharon Thomas', '', '', '36c22c0d61602d133be389819245200a08f8b603d9da0b815ba9f6a5528fa5e860dade4478133c1933e99caaee2fd7ff1cb580e3ca25a2c6e5165f5506567aa4CGRaGSY73omU+gJEb6c7mWOyAAtLKqovIlRQd99Fizw=', '0000-00-00', 0, '', '', '', '2020-04-08 13:23:36', '0000-00-00 00:00:00', '2020-04-08 13:37:58', 1, 0, 0, '2020-04-08 07:53:36', '12345', 'eBZC8CpVQOCgKLLPf1sZIx:APA91bGGzBepDyPKL631TF4E7Hcmga95R8aI5hK6u3f3fx-WD415A_RzaztHjlTIW1_qZzEw7g3hz4AHsdJz5XnwKMNX_uWXRUoF4tc15yK1_bFG7mOs7FRlUnjd5f6OGa7vCr4MUQu1'),
(37, 'METROMINDP37', 94, '+917025065975', 'Jeena Sunny', '', '', '5e9a5a05ef9012f23ea17138629d25c4ca204f309ccf83e818f12258dbb4cda1c8f9ddca24be7740932bff11f96792ff6c0d01f2349f8fcffd52910356b56e9dyfieT9mb8nAwJ76wyNZat5sY8HOTMOatEAVNeCnSgqs=', '0000-00-00', 0, '', '', '', '2020-04-08 15:17:08', '0000-00-00 00:00:00', '2020-04-11 19:38:32', 1, 0, 0, '2020-04-08 09:47:08', '12345', 'csa86s4YRde27yaqDHWFjV:APA91bGpVFLP0HcGvwcowl-8sFb93OMt5gIo00_Smnv3vSB-GzJpmXBAgAcq7_hC7rAMWrUHNJH_0wMVAiTlmYF8Jqlb8fAwORulpS9KNBYcrY6u5---3RTf3F9EZjjP10TwOGO1dYET'),
(38, 'METROMINDP38', 94, '+919746512250', 'Roshan Joseph John', '', '', '7b1b08b58bcc34e81104efb29c75fb746532c13a17509819ff88252b6895a490b185a48775fbd2e01c45ef10a325b0eb4bf424b3e28e5c3c4b8a51141463c014VqRsXfEc/0WhUP7J/i4r+mWo9GQSxqceXb1tevs/qko=', '0000-00-00', 0, '', '', '', '2020-04-08 16:16:04', '0000-00-00 00:00:00', '2020-04-08 16:16:06', 1, 0, 0, '2020-04-08 10:46:04', '12345', 'c2Jt3V6HSrWuw02y5G4MO2:APA91bEb6fqZoG08r7ChVSyfR5q-EGpa4YIjkVTzAHok7WB52DZhxDoQt11ZTuc2_Zojq1_2wZWOTUYgrR8OjRb-Sn5YvesQNtkp_IPSyiUabR34tz1PTlR5_53zb-lQGloVJ3hOW38_'),
(39, 'METROMINDP39', 96, '+989048671947', 'Thayyiba navas', '', '', 'e50a92ed0c43a552902c4463797d36ea28b579b7d8dbd60306146aa296617e8c11838ae653a4bc064058bf07b1fe3c2c6265bd2409fd729ba16b195a1571bd12oXSI7U5qTjrn9ChNeVxLmCTcbD5zaVG6ouDzhxtk3Cg=', '0000-00-00', 0, '', '', '', '2020-04-09 15:23:25', '0000-00-00 00:00:00', '2020-04-09 15:23:26', 1, 0, 0, '2020-04-09 09:53:25', '12345', 'cBAgaU-AQjGmIZ273y4Nfk:APA91bH9qATjJ_Unnf-yh-Aro5QY9xKknv7fS1DlMHMW44lPT2YTNt3oDjnccP5YwvBMMem9iuJ1IaDPMIcXq4ONgUZwRqEdcBdxoFr-5tQx4xx1pt9tJFbqL64nac0XbU2y6BtbJ5xH'),
(40, 'METROMINDP40', 94, '+918921693933', 'RAMLA', '', '', '3fccde664577a3c7ecafd79aefe66b805e8b5c22c0e40d7300f674bdaaca7d75a2c1a6627cf3bb90734790de063232fa562b74083d424022c3219b539123aa45aVVtbzoAO1Z3wKrVujZyV9/g0bMAuddM2HRRO1pz3MY=', '0000-00-00', 0, '', '', '', '2020-04-09 21:19:06', '0000-00-00 00:00:00', '2020-04-09 21:27:29', 1, 0, 0, '2020-04-09 15:49:06', '12345', 'cC1ZcU1YBR75WQVEAyh2PD:APA91bH1GLdlUrO9iEj6kSyXuxcdB5S7AfYuiuJmfq6621zZnJOLED5ee8j6vCmLbKYkbTgY4TW_rroK4t-NFOUYgvC8OzHjiveE1tJIsUy4RFbC-S7gh3kC6ydhEV12prOLYzqu9Zkg'),
(41, 'METROMINDP41', 94, '+919895769158', 'Tinson John', '', '', 'a9b74175d70501166388bf6f30af1f07b7eb09082933e1c57c2741418db5ce61dbb2244727a977a8dd4c0d7df4ed9aac3028902e1dadf76ed339166ce34c082cv6QiEYLXq+0J1OJ7Unv4cXA2YKsII/Pnu2nzJXv0RGc=', '0000-00-00', 0, '', '', '', '2020-04-10 10:46:37', '0000-00-00 00:00:00', '2020-04-10 10:46:38', 1, 0, 0, '2020-04-10 05:16:37', '12345', 'cv7rTZx3Shu7kq2C8o1U9D:APA91bExIM9VAX2v3yyupUYjblN2xszVd2_V69WG9PNIkNYC-IxvBdtFs7qduOFY34lVZCgIxQcecctSiKTe7b5aSHvoAzrrKf0ZUnUJpcrqOYWvgAyzkwWAVlSJTC0A4XAdZqmPUU5N'),
(42, 'METROMINDP42', 94, '+919048671947', 'Thayyibanavas', '', '', '5b59d79c4630dd2c28fc3a432d65219a5a5d24d9fbd30812e5364b0aa93be4b891c75fcbb3879e2cecf8d30128791e9a65735d90309cb60fa746f08a5d3096afDa3z9FJ/7k7dg+ZBRE/EbugWhcelh+PIoYi4Q9MF1Lg=', '0000-00-00', 0, '', '', '', '2020-04-10 12:47:57', '0000-00-00 00:00:00', '2020-04-10 12:47:59', 1, 0, 0, '2020-04-10 07:17:57', '12345', 'f66hKz5DTz6FDqyxaE0ioi:APA91bG6kY_z4yP7wb7ShFlZYp2pbTcBJ2kThnAYS7NO_Id3Yj-HkVdMR5wzkPKuWAMI-Mu6de3NZOTtBpN8RoO1hv0JqlDCUoYaufswZ0_jitRsyMmRx-DeJCzafNjBwOy_eDtQVsJY'),
(43, 'METROMINDP43', 94, '+919495707199', 'Magdy', '', '', 'd65c4ed54f5b6b022cf3fb4b6a48a50cc0f261a31ccbefe98ea4124075f31f65d023d54fb6776d1fc80e4314669af3f1aace98c0b48b884783898e7d37dc3c6bLl1pHA7+IbG7xucRmsSsRimnSgL5dUAA7AFSDGIERhk=', '0000-00-00', 0, '', '', '', '2020-04-10 14:40:43', '0000-00-00 00:00:00', '2020-04-10 14:40:46', 1, 0, 0, '2020-04-10 09:10:43', '12345', 'eR4Ez7cNTCabBdB_bjZojh:APA91bE7zeaweSNFPj6VAjJPai9KDB-7hXD-T7XNdWgTwvMU9FXqe7XUYpAkelm92vNUB_LwagAzSKoISD5NVMMXa8wq5IRaRW_rmP7qxbNx8727maDLU0c6mBPG5x16EZ885PY_WrUf'),
(44, 'METROMINDP44', 94, '+919605989483', 'Muhammed Muhsin', '', '', '71d190fa199a66142b5da0e23d3d13cad35ab97e065620388264aba42366d1d931e618d177f6bd29ad283c0917ac77faef802562f3266b7a2d1c501c6bada7ddYqXDTC5tr0HWtVUhvQThFV2IGrpgEtTW9gRo1FRt/hg=', '0000-00-00', 0, '', '', '', '2020-04-10 15:02:20', '0000-00-00 00:00:00', '2020-04-10 15:02:21', 1, 0, 0, '2020-04-10 09:32:20', '12345', 'dtSiPjCKQSGYv00qS_3Vc4:APA91bE8ov3OtE_H2WJsPwwnukcwDZ4ohNnsr0mdUT8mfZlL0BQ8xaIWVLdi09NzACwKqOhgLbkpIlIcFklSxf773ZBksn825S2aClGC_HqpSvH15YX4ErWOJFKw9wAEIfj9j4UTpYm_'),
(45, 'METROMINDP45', 94, '+919846633361', 'Akshay', '', '', '1b1aea58c703235dfb59a96aeb0115394ae3a79dd7996c130b76649cff38d4991519194d84e9bbdb267ca8f9e037fcb01bf42fe81270e1f4082278dc43cf007bflEmXosiMm3x6Vw9PtmfwRlnQoBxHb34WDZffKX0p/c=', '0000-00-00', 0, '', '', '', '2020-04-10 15:20:41', '0000-00-00 00:00:00', '2020-04-10 15:20:43', 1, 0, 0, '2020-04-10 09:50:41', '12345', 'ft5RK74iSJ-wf9K89GaSAH:APA91bElDNOMK-O0vAp4IKNDDrvP99YVF5UGl4o18_3j59tHWFYcRvvBZZxW_JRi6YV8yARdvc0UK9HeGENl2h7Y1kKKRcjwQ-EM0T2SgJhAI4bopd1_Fbudqzs0E2sSdPD2Wmha5bRT'),
(46, 'METROMINDP46', 94, '+919605151393', 'Jethin Krishna', '', '', '09e67d8ab1877891784cb510bec879472c8ce23b37efefe878b1867fd8b17d4a3ff46e6f3f40db39d294ca87ef9462d0a33304dc457b3d4bd5b8822c265eecd4GnANbOfpeT1i8DMSvvNkmtAu6vIctY4XxZZlULnxp/8=', '0000-00-00', 0, '', '', '', '2020-04-10 16:28:40', '0000-00-00 00:00:00', '2020-04-10 16:28:42', 1, 0, 0, '2020-04-10 10:58:40', '12345', 'fdAHMgf0QGSk-i_9qBGNOU:APA91bHI_6XxHpPtHF8tUZrOw0xx6HyUZg13j-3cMUgiOwvS-B6T9Hqfsuvb1DpSw4ECi9oOtXkjwORJXdTbS6zUJXE_whAyp4jbjtPjWzCWW_ZAcw0ozH7KBqZEQH0Kp9drQdFEfGAC'),
(47, 'METROMINDP47', 94, '+919999999999', 'Tester', '', '', '3ecc50ac2ee011a6081c38a37024b5985d8d03d7556ae5245ed7d6461c419960c75c14da3949475e0db191686926a88790b617b09625ad2e74459c4ee57825beXV2sgvjrz7bq/kVPKpEcRK7y/2BayTMKvarBJdPle0c=', '0000-00-00', 0, '', '', '', '2020-04-10 16:41:33', '0000-00-00 00:00:00', '2020-04-10 16:41:35', 1, 0, 0, '2020-04-10 11:11:33', '12345', 'cXHYw3OAR8uzTFMRKK_LMv:APA91bGle7fXUO2jqOzI_WdCUGtO0Y7CEtsKBYFLEUtsdsPnc6Z_uiLZZaBqCpbNRwBMQ66ENRFYuwycnbNdE7Oz8zGwQgsRzpR_-sEzGsAkTn7p6y_Kum8VmN2A2cxjuJC64Btz6f9W'),
(48, 'METROMINDP48', 94, '+917894861232', 'Dr Sister Liza', '', '', '8bf54a0791c8c5798b5c65ad1ca24d38fd1751e5eb448270b2dce95331331f144c8ecf5bce79578453738105f6954b8a8049c150b8a86e7cfd55f78075c30896KShC94hA5sKsWnHIGHM1zh6794hExwM0IV8eU0q6XY0=', '0000-00-00', 0, '', '', '', '2020-04-10 16:41:56', '0000-00-00 00:00:00', '2020-04-10 16:41:58', 1, 0, 0, '2020-04-10 11:11:56', '12345', 'feh6VkSIRICYgj4LGlZHru:APA91bHqOAdkeH-AMaKC2D5_S_xFLAHVCXz6pI0CLiB2foZHK7tiu6PukyBz2DopVLE18zomBTt91WVzL7JdyJ_Y-NBCHwD5_V3ZPMOCRuvYRkiUM4VatHg_Ke0ZPH2l5sNdqMJ1r5Q1'),
(49, 'METROMINDP49', 94, '+919995885599', 'abitha', '', '', 'd14e704ecc14feec5e81e2dbf43911363c4b26cf55122c521f19f4fb59d45704d2901fc11fb292534b7c4abd6d560ea086652d379f0bb8807163326042260e8bi9+tShfKZhAJZdBZFagkKgzuMh9jRQKlFOw1X9dNbMk=', '0000-00-00', 0, '', '', '', '2020-04-11 11:43:04', '0000-00-00 00:00:00', '2020-04-11 11:43:06', 1, 0, 0, '2020-04-11 06:13:04', '12345', 'cQSLEmKeRc6-MDZNQNCQSJ:APA91bHc_Bd1Q-EXfM9mqJMEoMOEVRMkv7F9x5YCR2vXEpF07K7uW0G96nuymnfNSaCkSPcsC4mcm3R-r84TprHYjYCpRhzq_Zw9xnaD_y-uIAH7kv3gM1TFHPJdOiIOCV2NuBRV2WHj'),
(50, 'METROMINDP50', 94, '+918281352680', 'Mohammed', '', '', 'bfdaff2198e44100a63294ecc93b9765ac67e9af51d8429b6b69a298c1beca4e66cea23a7a8b6e4343bcd8f846a12a75091caaf0812da09a18dbec141ae1893aSYAIOD93j8zWMbp5ZPNmjYiglnscS72DRVhd4louclY=', '0000-00-00', 0, '', '', '', '2020-04-12 20:09:03', '0000-00-00 00:00:00', '2020-04-12 20:09:03', 1, 0, 0, '2020-04-12 14:39:03', '12345', ''),
(51, 'METROMINDP51', 94, '+917136523654', 'Avin', '', '', '956f6810b8c46a0c9559ce52af8a0e16ade82ad8ee3ceb925539783da2ef2f11b5ebd62f6b9855ea785d871eb3f62d273f142859d80ad4e957b4870b57c867eadnpkGIx5m7bQqyhacB6HkpXdy9GBVgjUsXrZTHRTMWA=', '0000-00-00', 0, '', '', '', '2020-04-12 23:50:51', '0000-00-00 00:00:00', '2020-04-12 23:50:52', 1, 0, 0, '2020-04-12 18:20:51', '12345', 'dqVBYYZJS8qbg_c5YlMx0I:APA91bEStWPL4cHovHFVHkGmUztLOIyeCRQ5uGtWosf526y_XQ60D4FcQy85VhmhLXx8CI39Q4sqiy4KKyZiIiSq-8kAVgIl3scJ-nYstPj50YzO10COKGdh_kazFU4pJBre67Wg0Ul9'),
(52, 'METROMINDP52', 94, '+919638527423', 'John Bosco', '', '', '00e72782ca740114592586ea22f520f6e6f2654f98d900e856d16ffa9347bf9f94fa9f54cde8d32b9760718bead80d21b4fc991d930cc078e8326acf7922caf1JXL6LzJcvlwM5mm8lkOK41SySSrfNpKWY+l6UOUyKns=', '0000-00-00', 0, '', '', '', '2020-04-15 11:04:53', '0000-00-00 00:00:00', '2020-04-15 11:06:39', 1, 11111, 0, '2020-04-15 05:34:53', '789456', ''),
(53, 'METROMINDP53', 92, '+3530879574416', 'Sojo Joseph', '', '', 'b2808915163d9a36527b34619db2f33a893654207dcbfefc337235b27c23b063c307c2ed166df440628178d7a15e05ededf9ff30edf11994532448701ac97eb4yd+OQYOxRLNj+Rx6rjw04MDxf7d1iS9Oxsq+iLbZTDo=', '0000-00-00', 0, '', '', '', '2020-04-15 14:30:28', '0000-00-00 00:00:00', '2020-04-15 14:30:29', 1, 11111, 0, '2020-04-15 09:00:28', '12345', 'dHDvHCoNSVy5t6swLwJ362:APA91bGFcFZyDSmNf4iMEaB8YLlCwZSmdZqhrJ_hJjwRRSQTGpwtPwebPt8ywh16hhzT3Fz4lVVHm3DVdqb0TcahlKPtJS-eq1CoaRO62nGkKMI6YHOgTOPjOy9KgG5saCn2NehjXs6l'),
(55, 'METROMINDP55', 94, '7777777777', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-16 11:49:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-16 06:19:31', '', ''),
(56, 'METROMINDP56', 94, '9638527428', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-16 13:45:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-16 08:15:45', '', ''),
(57, 'METROMINDP57', 94, '7777777771', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 13:12:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 07:42:51', '', ''),
(58, 'METROMINDP58', 94, '7777777772', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 13:45:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 08:15:28', '', ''),
(59, 'METROMINDP59', 94, '7777777773', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 13:50:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 08:20:52', '', ''),
(60, 'METROMINDP60', 94, '9638527429', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 14:00:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 0, '2020-04-17 08:30:36', '', ''),
(61, 'METROMINDP61', 0, '9638527430', '', '', 'binilca@eks.om', 'f75906c879ed00c9c6163a1b0f61944cb0b650c5e8eb2fedb642cf4dfd36feef9d19db686d1559d4ea90fc5b0a9f475e6806330d4a29fc79b427fe36d908bbb1goD1Yty9WgXT/LHWMquCORK3/9hRUs5G4RWzTiIZ9ME=', '0000-00-00', 0, '', '', '', '2020-04-17 14:01:19', '2020-04-17 14:08:18', '0000-00-00 00:00:00', 1, 11111, 1, '2020-04-17 08:31:19', '', ''),
(62, 'METROMINDP62', 94, '7777777774', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 14:04:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 08:34:54', '', ''),
(63, 'METROMINDP63', 94, '9638527410', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 14:05:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 08:35:08', '', ''),
(64, 'METROMINDP64', 94, '919638527410', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 14:05:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 0, '2020-04-17 08:35:20', '', ''),
(65, 'METROMINDP65', 94, '7777777775', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 14:19:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 08:49:50', '', ''),
(66, 'METROMINDP66', 94, '7777777776', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 14:37:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 09:07:12', '', ''),
(67, 'METROMINDP67', 94, '7777777778', '', '', '', '', '0000-00-00', 0, '', '', '', '2020-04-17 14:43:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 11111, 1, '2020-04-17 09:13:17', '', ''),
(68, 'METROMINDP68', 94, '7777777779', 'suj', 'ks', 'b@a.com', 'f1fdfe5c6c249e6d55c2ccebf3fd54d16acd4509604c6e0b560ffd10ddbea01106d2cb02868e436b7f6fd70c2b3037c619ce4708669cae6de256e018b9c71afaw5SDxqwBLHILNQsNd3snyNeOhxW0Y/tUkW6dcTneoiY=', '2020-04-17', 1, '', '', '', '2020-04-17 14:53:34', '2020-04-17 14:54:54', '0000-00-00 00:00:00', 1, 11111, 1, '2020-04-17 09:23:34', '', '');

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
(4, 1, 2, 2, 0, '1', '2020-03-11', '12:06:00', '12:10:00', '4', '2020-03-11'),
(5, 1, 1, 0, 0, '2', '2020-03-30', '11:44:00', '11:49:00', '5', '2020-03-30'),
(6, 1, 1, 0, 0, '2', '2020-03-30', '11:50:00', '11:58:00', '5', '2020-03-30'),
(7, 1, 1, 0, 0, '2', '2020-03-30', '06:44:00', '06:49:00', '5', '2020-03-30'),
(8, 1, 1, 0, 0, '2', '2020-03-30', '06:50:00', '06:58:00', '5', '2020-03-30'),
(9, 11, 2, 0, 0, '2', '2020-04-01', '12:08:06', '00:00:00', '', '2020-04-01'),
(10, 11, 2, 0, 0, '2', '2020-04-01', '12:52:24', '00:00:00', '', '2020-04-01'),
(11, 11, 2, 0, 0, '2', '2020-04-02', '18:10:12', '00:00:00', '', '2020-04-02'),
(12, 11, 2, 0, 0, '2', '2020-04-02', '18:11:42', '00:00:00', '', '2020-04-02'),
(13, 11, 2, 0, 0, '2', '2020-04-02', '18:12:32', '00:00:00', '', '2020-04-02'),
(14, 11, 2, 0, 0, '2', '2020-04-02', '18:18:51', '00:00:00', '', '2020-04-02'),
(15, 11, 2, 0, 0, '2', '2020-04-02', '18:19:08', '00:00:00', '', '2020-04-02'),
(16, 11, 2, 0, 0, '2', '2020-04-02', '18:27:28', '00:00:00', '', '2020-04-02'),
(17, 11, 2, 0, 0, '2', '2020-04-02', '18:28:50', '00:00:00', '', '2020-04-02'),
(18, 11, 2, 0, 0, '2', '2020-04-02', '18:29:48', '00:00:00', '', '2020-04-02'),
(19, 11, 2, 0, 0, '2', '2020-04-02', '18:34:00', '00:00:00', '', '2020-04-02'),
(20, 11, 2, 0, 0, '2', '2020-04-02', '18:38:41', '00:00:00', '', '2020-04-02'),
(21, 11, 2, 0, 0, '2', '2020-04-02', '18:40:40', '00:00:00', '', '2020-04-02'),
(22, 11, 2, 0, 0, '2', '2020-04-02', '18:40:59', '00:00:00', '', '2020-04-02'),
(23, 11, 2, 0, 0, '2', '2020-04-02', '19:21:53', '00:00:00', '', '2020-04-02'),
(24, 11, 2, 0, 0, '2', '2020-04-02', '19:24:22', '00:00:00', '', '2020-04-02'),
(25, 11, 2, 0, 0, '2', '2020-04-02', '19:46:25', '00:00:00', '', '2020-04-02'),
(26, 11, 2, 0, 0, '2', '2020-04-02', '19:52:24', '00:00:00', '', '2020-04-02'),
(27, 11, 2, 0, 0, '2', '2020-04-03', '11:53:08', '00:00:00', '', '2020-04-03'),
(28, 11, 2, 0, 0, '2', '2020-04-03', '11:55:28', '00:00:00', '', '2020-04-03'),
(29, 11, 2, 0, 0, '2', '2020-04-03', '11:59:12', '00:00:00', '', '2020-04-03'),
(30, 11, 2, 0, 0, '2', '2020-04-03', '12:03:36', '00:00:00', '', '2020-04-03'),
(31, 11, 2, 0, 0, '2', '2020-04-03', '12:37:22', '00:00:00', '', '2020-04-03'),
(32, 11, 2, 0, 0, '2', '2020-04-03', '12:43:01', '00:00:00', '', '2020-04-03'),
(33, 0, 2, 0, 0, '2', '2020-04-03', '12:43:38', '00:00:00', '', '2020-04-03'),
(34, 11, 2, 0, 0, '2', '2020-04-03', '12:48:02', '00:00:00', '', '2020-04-03'),
(35, 0, 2, 0, 0, '2', '2020-04-03', '12:48:31', '00:00:00', '', '2020-04-03'),
(36, 11, 2, 0, 0, '2', '2020-04-03', '13:09:58', '00:00:00', '', '2020-04-03'),
(37, 11, 2, 0, 0, '2', '2020-04-03', '13:28:19', '00:00:00', '', '2020-04-03'),
(38, 0, 2, 0, 0, '2', '2020-04-03', '13:28:35', '13:29:02', '00:19', '2020-04-03'),
(39, 11, 2, 0, 0, '2', '2020-04-03', '15:22:55', '00:00:00', '', '2020-04-03'),
(40, 11, 2, 0, 0, '2', '2020-04-03', '15:25:12', '00:00:00', '', '2020-04-03'),
(41, 11, 2, 0, 0, '2', '2020-04-03', '15:29:15', '15:29:39', 'Ringing...', '2020-04-03'),
(42, 11, 2, 0, 0, '2', '2020-04-03', '15:29:50', '15:30:25', 'Ringing...', '2020-04-03'),
(43, 11, 2, 0, 0, '2', '2020-04-03', '15:33:55', '15:35:49', 'Rejected', '2020-04-03'),
(44, 11, 2, 0, 0, '2', '2020-04-03', '15:36:32', '15:36:39', 'Rejected', '2020-04-03'),
(45, 11, 2, 0, 0, '2', '2020-04-03', '15:41:49', '15:43:42', '01:28', '2020-04-03'),
(46, 11, 2, 0, 0, '2', '2020-04-03', '15:44:16', '15:44:49', '00:23', '2020-04-03'),
(47, 11, 2, 0, 0, '2', '2020-04-03', '15:49:58', '15:50:19', 'Rejected', '2020-04-03'),
(48, 11, 3, 0, 0, '2', '2020-04-03', '18:09:42', '18:09:51', 'Ringing...', '2020-04-03'),
(49, 11, 3, 0, 0, '2', '2020-04-03', '18:14:53', '18:15:26', '00:24', '2020-04-03'),
(50, 0, 3, 0, 0, '2', '2020-04-03', '18:15:00', '00:00:00', '', '2020-04-03'),
(51, 11, 2, 0, 0, '2', '2020-04-03', '18:15:32', '18:15:38', 'Ringing...', '2020-04-03'),
(52, 11, 3, 0, 0, '2', '2020-04-03', '18:15:44', '18:16:10', '00:21', '2020-04-03'),
(53, 0, 3, 0, 0, '2', '2020-04-03', '18:15:48', '00:00:00', '', '2020-04-03'),
(54, 11, 3, 0, 0, '2', '2020-04-03', '18:16:15', '18:17:18', '00:37', '2020-04-03'),
(55, 0, 3, 0, 0, '2', '2020-04-03', '18:16:40', '00:00:00', '', '2020-04-03'),
(56, 11, 3, 0, 0, '2', '2020-04-03', '18:17:52', '18:19:27', '00:52', '2020-04-03'),
(57, 0, 3, 0, 0, '2', '2020-04-03', '18:18:03', '00:00:00', '', '2020-04-03'),
(58, 0, 3, 0, 0, '2', '2020-04-03', '18:18:34', '00:00:00', '', '2020-04-03'),
(59, 0, 3, 0, 0, '2', '2020-04-03', '18:19:13', '00:00:00', '', '2020-04-03'),
(60, 11, 3, 0, 0, '2', '2020-04-03', '18:19:38', '18:19:53', '00:10', '2020-04-03'),
(61, 0, 3, 0, 0, '2', '2020-04-03', '18:19:42', '00:00:00', '', '2020-04-03'),
(62, 11, 3, 0, 0, '2', '2020-04-03', '18:20:43', '18:22:13', '01:10', '2020-04-03'),
(63, 0, 3, 0, 0, '2', '2020-04-03', '18:21:01', '00:00:00', '', '2020-04-03'),
(64, 11, 3, 0, 0, '2', '2020-04-03', '18:24:18', '18:26:15', '01:30', '2020-04-03'),
(65, 0, 3, 0, 0, '2', '2020-04-03', '18:26:04', '00:00:00', '', '2020-04-03'),
(66, 11, 3, 0, 0, '2', '2020-04-03', '18:26:52', '18:27:17', '00:21', '2020-04-03'),
(67, 0, 3, 0, 0, '2', '2020-04-03', '18:26:55', '18:27:12', '00:12', '2020-04-03'),
(68, 11, 3, 0, 0, '2', '2020-04-03', '18:38:51', '18:39:20', '00:13', '2020-04-03'),
(69, 0, 3, 0, 0, '2', '2020-04-03', '18:39:02', '18:39:23', '00:16', '2020-04-03'),
(70, 19, 3, 0, 0, '2', '2020-04-04', '11:57:08', '00:00:00', '', '2020-04-04'),
(71, 19, 3, 0, 0, '2', '2020-04-04', '11:57:26', '00:00:00', '', '2020-04-04'),
(72, 11, 3, 0, 0, '2', '2020-04-04', '12:01:20', '12:01:28', 'Rejected', '2020-04-04'),
(73, 11, 3, 0, 0, '2', '2020-04-04', '12:14:30', '12:15:12', 'Ringing...', '2020-04-04'),
(74, 11, 3, 0, 0, '2', '2020-04-04', '12:16:24', '12:16:53', 'Ringing...', '2020-04-04'),
(75, 11, 3, 0, 0, '2', '2020-04-04', '12:18:38', '12:19:35', 'Ringing...', '2020-04-04'),
(76, 11, 3, 0, 0, '2', '2020-04-04', '12:39:07', '12:40:03', 'Ringing...', '2020-04-04'),
(77, 11, 2, 0, 0, '2', '2020-04-04', '12:40:21', '12:40:45', 'Rejected', '2020-04-04'),
(78, 11, 1, 0, 0, '2', '2020-04-04', '12:40:58', '12:41:37', 'Ringing...', '2020-04-04'),
(79, 11, 3, 0, 0, '2', '2020-04-04', '12:43:27', '12:43:41', 'Ringing...', '2020-04-04'),
(80, 11, 3, 0, 0, '2', '2020-04-04', '13:09:58', '13:11:23', 'Ringing...', '2020-04-04'),
(81, 11, 3, 0, 0, '2', '2020-04-04', '13:27:39', '13:28:19', 'Ringing...', '2020-04-04'),
(82, 11, 3, 0, 0, '2', '2020-04-04', '13:43:27', '00:00:00', '', '2020-04-04'),
(83, 11, 3, 0, 0, '2', '2020-04-04', '13:45:55', '13:46:31', 'Ringing...', '2020-04-04'),
(84, 11, 3, 0, 0, '2', '2020-04-04', '13:58:06', '13:58:35', 'Ringing...', '2020-04-04'),
(85, 11, 2, 0, 0, '2', '2020-04-04', '14:00:36', '14:01:30', '00:46', '2020-04-04'),
(86, 0, 2, 0, 0, '2', '2020-04-04', '14:00:43', '14:01:35', '00:46', '2020-04-04'),
(87, 11, 3, 0, 0, '2', '2020-04-04', '14:32:18', '14:33:12', 'Ringing...', '2020-04-04'),
(88, 11, 3, 0, 0, '2', '2020-04-04', '14:33:20', '14:34:12', 'Ringing...', '2020-04-04'),
(89, 11, 2, 0, 0, '2', '2020-04-04', '14:51:30', '00:00:00', '', '2020-04-04'),
(90, 11, 2, 0, 0, '2', '2020-04-04', '14:52:29', '00:00:00', '', '2020-04-04'),
(91, 11, 2, 0, 0, '2', '2020-04-04', '14:53:34', '00:00:00', '', '2020-04-04'),
(92, 11, 2, 0, 0, '2', '2020-04-04', '14:55:11', '00:00:00', '', '2020-04-04'),
(93, 20, 2, 0, 0, '2', '2020-04-04', '14:58:35', '14:58:49', 'Ringing...', '2020-04-04'),
(94, 20, 2, 0, 0, '2', '2020-04-04', '15:47:37', '15:48:04', 'Ringing...', '2020-04-04'),
(95, 20, 2, 0, 0, '2', '2020-04-04', '15:55:57', '15:56:01', 'Ringing...', '2020-04-04'),
(96, 20, 2, 0, 0, '2', '2020-04-04', '16:28:33', '00:00:00', '', '2020-04-04'),
(97, 21, 3, 0, 0, '2', '2020-04-04', '11:58:49', '00:00:00', '', '2020-04-04'),
(98, 11, 2, 0, 0, '2', '2020-04-04', '16:30:41', '16:31:14', 'Ringing...', '2020-04-04'),
(99, 20, 2, 0, 0, '2', '2020-04-04', '16:48:39', '16:48:45', 'Ringing...', '2020-04-04'),
(100, 11, 2, 0, 0, '2', '2020-04-04', '16:57:06', '00:00:00', '', '2020-04-04'),
(101, 11, 2, 0, 0, '2', '2020-04-04', '16:58:37', '00:00:00', '', '2020-04-04'),
(102, 20, 2, 0, 0, '2', '2020-04-04', '17:01:19', '00:00:00', '', '2020-04-04'),
(103, 20, 2, 0, 0, '2', '2020-04-04', '17:02:44', '17:02:58', 'Ringing...', '2020-04-04'),
(104, 20, 2, 0, 0, '2', '2020-04-04', '17:06:20', '17:06:28', 'Ringing...', '2020-04-04'),
(105, 20, 2, 0, 0, '2', '2020-04-04', '17:09:25', '17:09:33', 'Ringing...', '2020-04-04'),
(106, 20, 2, 0, 0, '2', '2020-04-04', '17:11:53', '00:00:00', '', '2020-04-04'),
(107, 20, 2, 0, 0, '2', '2020-04-04', '17:16:22', '00:00:00', '', '2020-04-04'),
(108, 11, 2, 0, 0, '2', '2020-04-04', '17:20:07', '00:00:00', '', '2020-04-04'),
(109, 11, 2, 0, 0, '2', '2020-04-04', '17:25:42', '00:00:00', '', '2020-04-04'),
(110, 20, 2, 0, 0, '2', '2020-04-04', '17:33:12', '00:00:00', '', '2020-04-04'),
(111, 20, 2, 0, 0, '2', '2020-04-04', '17:36:09', '00:00:00', '', '2020-04-04'),
(112, 11, 2, 0, 0, '2', '2020-04-04', '17:42:55', '00:00:00', '', '2020-04-04'),
(113, 11, 2, 0, 0, '2', '2020-04-04', '18:30:01', '18:30:08', 'Ringing...', '2020-04-04'),
(114, 11, 2, 0, 0, '2', '2020-04-04', '18:38:02', '18:38:16', 'Ringing...', '2020-04-04'),
(115, 11, 2, 0, 0, '2', '2020-04-04', '18:42:25', '00:00:00', '', '2020-04-04'),
(116, 11, 3, 0, 0, '2', '2020-04-04', '18:52:32', '00:00:00', '', '2020-04-04'),
(117, 11, 3, 0, 0, '2', '2020-04-04', '18:52:52', '00:00:00', '', '2020-04-04'),
(118, 11, 3, 0, 0, '2', '2020-04-04', '18:53:43', '00:00:00', '', '2020-04-04'),
(119, 11, 3, 0, 0, '2', '2020-04-04', '19:56:22', '19:56:29', 'Ringing...', '2020-04-04'),
(120, 11, 3, 0, 0, '2', '2020-04-04', '20:04:13', '00:00:00', '', '2020-04-04'),
(121, 11, 3, 0, 0, '2', '2020-04-04', '20:13:12', '20:13:16', 'Ringing...', '2020-04-04'),
(122, 11, 2, 0, 0, '2', '2020-04-04', '20:27:50', '20:28:40', 'Ringing...', '2020-04-04'),
(123, 11, 2, 0, 0, '2', '2020-04-04', '20:30:27', '20:31:03', 'Ringing...', '2020-04-04'),
(124, 11, 2, 0, 0, '2', '2020-04-04', '20:31:07', '20:31:41', 'Ringing...', '2020-04-04'),
(125, 11, 3, 0, 0, '2', '2020-04-04', '20:36:50', '20:37:33', 'Ringing...', '2020-04-04'),
(126, 11, 3, 0, 0, '2', '2020-04-04', '20:41:24', '20:41:53', 'Ringing...', '2020-04-04'),
(127, 11, 3, 0, 0, '2', '2020-04-04', '23:55:39', '23:56:31', 'Ringing...', '2020-04-04'),
(128, 11, 2, 0, 0, '2', '2020-04-04', '23:56:38', '23:57:41', 'Ringing...', '2020-04-04'),
(129, 0, 2, 0, 0, '2', '2020-04-05', '10:36:26', '10:36:52', '00:15', '2020-04-05'),
(130, 0, 2, 0, 0, '2', '2020-04-05', '10:45:54', '10:46:01', '00:04', '2020-04-05'),
(131, 11, 2, 0, 0, '2', '2020-04-05', '10:47:04', '10:47:20', 'Ringing...', '2020-04-05'),
(132, 0, 2, 0, 0, '2', '2020-04-05', '10:47:10', '10:47:22', '00:09', '2020-04-05'),
(133, 11, 3, 0, 0, '2', '2020-04-05', '13:08:22', '13:09:06', 'Ringing...', '2020-04-05'),
(134, 11, 2, 0, 0, '2', '2020-04-05', '13:09:36', '13:09:47', 'Ringing...', '2020-04-05'),
(135, 11, 4, 0, 0, '2', '2020-04-05', '13:20:29', '13:21:23', 'Ringing...', '2020-04-05'),
(136, 11, 4, 0, 0, '2', '2020-04-05', '13:22:25', '13:23:05', 'Ringing...', '2020-04-05'),
(137, 11, 2, 0, 0, '2', '2020-04-05', '13:26:02', '13:26:22', 'Ringing...', '2020-04-05'),
(138, 0, 2, 0, 0, '2', '2020-04-05', '13:26:11', '13:26:23', '00:08', '2020-04-05'),
(139, 11, 4, 0, 0, '2', '2020-04-05', '13:28:41', '13:29:12', 'Ringing...', '2020-04-05'),
(140, 11, 4, 0, 0, '2', '2020-04-05', '13:31:45', '13:34:13', 'Ringing...', '2020-04-05'),
(141, 0, 4, 0, 0, '2', '2020-04-05', '13:31:48', '00:00:00', '', '2020-04-05'),
(142, 11, 4, 0, 0, '2', '2020-04-05', '13:34:25', '00:00:00', '', '2020-04-05'),
(143, 0, 4, 0, 0, '2', '2020-04-05', '13:34:31', '00:00:00', '', '2020-04-05'),
(144, 11, 2, 0, 0, '2', '2020-04-05', '13:44:27', '13:45:50', 'Ringing...', '2020-04-05'),
(145, 0, 2, 0, 0, '2', '2020-04-05', '13:44:43', '13:45:54', '01:08', '2020-04-05'),
(146, 11, 1, 0, 0, '2', '2020-04-05', '20:27:05', '20:27:25', 'Ringing...', '2020-04-05'),
(147, 11, 1, 0, 0, '2', '2020-04-05', '20:27:33', '20:28:35', 'Ringing...', '2020-04-05'),
(148, 0, 1, 0, 0, '2', '2020-04-05', '20:27:37', '20:28:30', '00:49', '2020-04-05'),
(149, 11, 1, 0, 0, '2', '2020-04-06', '12:36:20', '12:42:34', 'Ringing...', '2020-04-06'),
(150, 0, 1, 0, 0, '2', '2020-04-06', '12:36:29', '00:00:00', '', '2020-04-06'),
(151, 11, 1, 0, 0, '2', '2020-04-06', '12:43:04', '12:43:22', 'Ringing...', '2020-04-06'),
(152, 11, 1, 0, 0, '2', '2020-04-06', '12:43:27', '12:43:52', 'Ringing...', '2020-04-06'),
(153, 11, 1, 0, 0, '2', '2020-04-06', '12:50:20', '12:50:54', 'Ringing...', '2020-04-06'),
(154, 11, 1, 0, 0, '2', '2020-04-06', '12:51:12', '12:52:04', 'Ringing...', '2020-04-06'),
(155, 11, 1, 0, 0, '2', '2020-04-06', '12:52:35', '12:52:48', 'Ringing...', '2020-04-06'),
(156, 11, 1, 0, 0, '2', '2020-04-06', '12:53:49', '12:54:13', 'Ringing...', '2020-04-06'),
(157, 11, 1, 0, 0, '2', '2020-04-06', '12:55:59', '12:57:04', 'Ringing...', '2020-04-06'),
(158, 22, 3, 0, 0, '2', '2020-04-06', '13:09:57', '13:11:20', 'Ringing...', '2020-04-06'),
(159, 22, 3, 0, 0, '2', '2020-04-06', '13:18:51', '13:18:56', 'Ringing...', '2020-04-06'),
(160, 22, 4, 0, 0, '2', '2020-04-06', '13:19:13', '13:20:52', 'Ringing...', '2020-04-06'),
(161, 0, 4, 0, 0, '2', '2020-04-06', '13:19:23', '13:20:49', '00:03', '2020-04-06'),
(162, 11, 4, 0, 0, '2', '2020-04-06', '13:21:04', '13:21:11', 'Ringing...', '2020-04-06'),
(163, 22, 4, 0, 0, '2', '2020-04-06', '13:21:08', '00:00:00', '', '2020-04-06'),
(164, 22, 4, 0, 0, '2', '2020-04-06', '13:21:53', '13:23:53', 'Ringing...', '2020-04-06'),
(165, 11, 1, 0, 0, '2', '2020-04-06', '13:27:02', '00:00:00', '', '2020-04-06'),
(166, 0, 1, 0, 0, '2', '2020-04-06', '13:27:12', '13:27:34', '00:18', '2020-04-06'),
(167, 22, 4, 0, 0, '2', '2020-04-06', '13:37:21', '13:37:57', 'Ringing...', '2020-04-06'),
(168, 11, 1, 0, 0, '2', '2020-04-06', '14:04:28', '14:05:24', 'Ringing...', '2020-04-06'),
(169, 0, 1, 0, 0, '2', '2020-04-06', '14:04:51', '14:05:33', '00:38', '2020-04-06'),
(170, 11, 1, 0, 0, '2', '2020-04-06', '14:05:40', '14:06:24', 'Ringing...', '2020-04-06'),
(171, 0, 1, 0, 0, '2', '2020-04-06', '14:06:00', '14:06:20', '00:16', '2020-04-06'),
(172, 0, 1, 0, 0, '2', '2020-04-06', '14:12:38', '14:12:42', '00:01', '2020-04-06'),
(173, 11, 1, 0, 0, '2', '2020-04-06', '15:24:13', '15:25:00', '00:43', '2020-04-06'),
(174, 0, 1, 0, 0, '2', '2020-04-06', '15:24:18', '00:00:00', '', '2020-04-06'),
(175, 11, 3, 0, 0, '2', '2020-04-06', '20:34:22', '20:35:18', 'Ringing...', '2020-04-06'),
(176, 11, 3, 0, 0, '2', '2020-04-06', '20:35:42', '20:36:18', 'Ringing...', '2020-04-06'),
(177, 23, 3, 0, 0, '2', '2020-04-06', '20:43:42', '20:44:20', 'Ringing...', '2020-04-06'),
(178, 23, 3, 0, 0, '2', '2020-04-06', '20:44:27', '20:44:41', 'Ringing...', '2020-04-06'),
(179, 23, 3, 0, 0, '2', '2020-04-06', '20:44:54', '20:50:45', '05:45', '2020-04-06'),
(180, 0, 3, 0, 0, '2', '2020-04-06', '20:45:00', '20:50:43', '05:38', '2020-04-06'),
(181, 20, 3, 0, 0, '2', '2020-04-06', '21:13:51', '21:14:37', 'Ringing...', '2020-04-06'),
(182, 20, 3, 0, 0, '2', '2020-04-06', '21:14:43', '21:15:21', 'Ringing...', '2020-04-06'),
(183, 23, 3, 0, 0, '2', '2020-04-06', '21:21:06', '21:21:13', 'Ringing...', '2020-04-06'),
(184, 23, 3, 0, 0, '2', '2020-04-06', '21:21:23', '21:22:21', '00:48', '2020-04-06'),
(185, 0, 3, 0, 0, '2', '2020-04-06', '21:21:36', '21:22:38', '00:57', '2020-04-06'),
(186, 22, 3, 0, 0, '2', '2020-04-06', '21:40:13', '21:43:10', 'Ringing...', '2020-04-06'),
(187, 22, 3, 0, 0, '2', '2020-04-06', '22:13:32', '22:17:11', '03:28', '2020-04-06'),
(188, 0, 3, 0, 0, '2', '2020-04-06', '22:13:43', '22:17:01', '03:14', '2020-04-06'),
(189, 24, 3, 0, 0, '2', '2020-04-06', '19:14:10', '19:14:17', 'Ringing...', '2020-04-06'),
(190, 24, 3, 0, 0, '2', '2020-04-06', '19:14:28', '00:00:00', '', '2020-04-06'),
(191, 1, 1, 0, 0, '2', '2020-04-07', '06:50:00', '00:00:00', '', '2020-04-07'),
(192, 1, 1, 0, 0, '2', '2020-04-07', '06:50:00', '00:00:00', '', '2020-04-07'),
(193, 1, 1, 0, 0, '1', '2020-04-07', '11:44:00', '00:00:00', '', '2020-04-07'),
(194, 0, 1, 0, 0, '2', '2020-04-07', '11:30:28', '11:30:38', '00:06', '2020-04-07'),
(195, 1, 1, 0, 0, '1', '2020-04-07', '11:44:00', '00:00:00', '', '2020-04-07'),
(196, 0, 1, 0, 0, '2', '2020-04-07', '11:33:40', '11:33:44', '00:01', '2020-04-07'),
(197, 1, 1, 0, 0, '1', '2020-04-07', '11:44:00', '00:00:00', '', '2020-04-07'),
(198, 0, 1, 0, 0, '2', '2020-04-07', '11:40:08', '11:41:03', '00:53', '2020-04-07'),
(199, 1, 1, 0, 0, '1', '2020-04-07', '11:44:00', '00:00:00', '', '2020-04-07'),
(200, 0, 1, 0, 0, '2', '2020-04-07', '11:44:43', '11:47:18', '02:31', '2020-04-07'),
(201, 11, 1, 0, 0, '2', '2020-04-07', '12:06:57', '12:07:57', 'Ringing...', '2020-04-07'),
(202, 11, 1, 0, 0, '2', '2020-04-07', '12:10:42', '12:12:10', 'Ringing...', '2020-04-07'),
(203, 11, 2, 0, 0, '2', '2020-04-07', '12:36:53', '12:37:16', 'Ringing...', '2020-04-07'),
(204, 1, 1, 0, 0, '1', '2020-04-07', '11:44:00', '00:00:00', '', '2020-04-07'),
(205, 11, 1, 0, 0, '2', '2020-04-07', '12:39:09', '12:41:06', 'Ringing...', '2020-04-07'),
(206, 0, 1, 0, 0, '2', '2020-04-07', '12:40:46', '12:41:02', '00:12', '2020-04-07'),
(207, 11, 1, 0, 0, '2', '2020-04-07', '12:49:15', '12:50:04', '00:29', '2020-04-07'),
(208, 0, 1, 0, 0, '2', '2020-04-07', '12:49:31', '12:50:08', '00:34', '2020-04-07'),
(209, 11, 1, 0, 0, '2', '2020-04-07', '13:01:12', '13:02:22', '00:46', '2020-04-07'),
(210, 0, 1, 0, 0, '2', '2020-04-07', '13:01:28', '13:02:25', '00:52', '2020-04-07'),
(211, 11, 1, 0, 0, '2', '2020-04-07', '13:08:09', '00:00:00', '', '2020-04-07'),
(212, 0, 1, 0, 0, '2', '2020-04-07', '13:08:28', '13:08:49', '00:17', '2020-04-07'),
(213, 11, 1, 0, 0, '2', '2020-04-07', '13:08:54', '13:11:34', '02:17', '2020-04-07'),
(214, 0, 1, 0, 0, '2', '2020-04-07', '13:09:17', '00:00:00', '', '2020-04-07'),
(215, 11, 1, 0, 0, '2', '2020-04-07', '14:02:08', '14:02:48', '00:17', '2020-04-07'),
(216, 0, 1, 0, 0, '2', '2020-04-07', '14:02:28', '14:02:56', '00:24', '2020-04-07'),
(217, 11, 1, 0, 0, '2', '2020-04-07', '14:11:11', '14:11:59', '00:14', '2020-04-07'),
(218, 0, 1, 0, 0, '2', '2020-04-07', '14:11:29', '14:12:01', '00:21', '2020-04-07'),
(219, 11, 1, 0, 0, '2', '2020-04-07', '15:34:48', '15:35:10', '00:10', '2020-04-07'),
(220, 0, 1, 0, 0, '2', '2020-04-07', '15:34:57', '15:35:13', '00:12', '2020-04-07'),
(221, 11, 3, 0, 0, '2', '2020-04-07', '16:15:14', '16:15:33', 'Ringing...', '2020-04-07'),
(222, 11, 1, 0, 0, '2', '2020-04-07', '16:15:55', '16:16:17', '00:12', '2020-04-07'),
(223, 0, 1, 0, 0, '2', '2020-04-07', '16:16:05', '16:16:19', '00:11', '2020-04-07'),
(224, 11, 1, 0, 0, '2', '2020-04-07', '16:32:48', '16:33:18', '00:20', '2020-04-07'),
(225, 0, 1, 0, 0, '2', '2020-04-07', '16:33:02', '16:33:16', '00:10', '2020-04-07'),
(226, 11, 1, 0, 0, '2', '2020-04-07', '16:33:32', '16:33:53', '00:13', '2020-04-07'),
(227, 0, 1, 0, 0, '2', '2020-04-07', '16:33:41', '16:33:51', '00:07', '2020-04-07'),
(228, 22, 3, 0, 0, '2', '2020-04-07', '19:56:33', '19:57:48', 'Ringing...', '2020-04-07'),
(229, 22, 1, 0, 0, '2', '2020-04-07', '19:58:25', '19:59:52', 'Ringing...', '2020-04-07'),
(230, 23, 1, 0, 0, '2', '2020-04-07', '20:04:28', '20:06:47', '02:00', '2020-04-07'),
(231, 0, 1, 0, 0, '2', '2020-04-07', '20:04:48', '20:06:53', '02:03', '2020-04-07'),
(232, 11, 1, 0, 0, '2', '2020-04-07', '20:16:28', '20:18:00', 'Ringing...', '2020-04-07'),
(233, 23, 3, 0, 0, '2', '2020-04-07', '21:18:17', '21:18:53', '00:21', '2020-04-07'),
(234, 0, 3, 0, 0, '2', '2020-04-07', '21:18:36', '21:24:20', '00:09', '2020-04-07'),
(235, 23, 3, 0, 0, '2', '2020-04-07', '21:23:48', '21:24:31', 'Ringing...', '2020-04-07'),
(236, 23, 3, 0, 0, '2', '2020-04-07', '21:24:40', '21:27:24', '02:31', '2020-04-07'),
(237, 0, 3, 0, 0, '2', '2020-04-07', '21:24:52', '21:27:21', '02:25', '2020-04-07'),
(238, 23, 3, 0, 0, '2', '2020-04-07', '21:27:33', '21:28:23', '00:26', '2020-04-07'),
(239, 0, 3, 0, 0, '2', '2020-04-07', '21:27:58', '21:28:28', '00:28', '2020-04-07'),
(240, 25, 1, 0, 0, '2', '2020-04-07', '21:44:26', '00:00:00', '', '2020-04-07'),
(241, 25, 1, 0, 0, '2', '2020-04-07', '21:45:55', '21:46:17', 'Ringing...', '2020-04-07'),
(242, 26, 3, 0, 0, '2', '2020-04-07', '21:54:57', '21:56:37', 'Ringing...', '2020-04-07'),
(243, 26, 3, 0, 0, '2', '2020-04-07', '21:56:42', '21:57:18', 'Ringing...', '2020-04-07'),
(244, 26, 1, 0, 0, '2', '2020-04-07', '21:57:25', '21:57:56', 'Ringing...', '2020-04-07'),
(245, 26, 3, 0, 0, '2', '2020-04-07', '21:58:00', '21:59:03', 'Ringing...', '2020-04-07'),
(246, 26, 3, 0, 0, '2', '2020-04-07', '21:59:12', '21:59:36', 'Ringing...', '2020-04-07'),
(247, 26, 3, 0, 0, '2', '2020-04-07', '21:59:58', '00:00:00', '', '2020-04-07'),
(248, 26, 1, 0, 0, '2', '2020-04-07', '22:02:03', '22:02:55', 'Ringing...', '2020-04-07'),
(249, 26, 1, 0, 0, '2', '2020-04-07', '22:03:42', '00:00:00', '', '2020-04-07'),
(250, 11, 3, 0, 0, '2', '2020-04-07', '22:08:20', '22:10:00', '01:26', '2020-04-07'),
(251, 0, 3, 0, 0, '2', '2020-04-07', '22:08:35', '00:00:00', '', '2020-04-07'),
(252, 11, 1, 0, 0, '2', '2020-04-07', '22:10:06', '22:10:20', 'Ringing...', '2020-04-07'),
(253, 11, 1, 0, 0, '2', '2020-04-07', '22:11:01', '22:11:36', 'Ringing...', '2020-04-07'),
(254, 11, 1, 0, 0, '2', '2020-04-07', '22:18:48', '00:00:00', '', '2020-04-07'),
(255, 0, 1, 0, 0, '2', '2020-04-07', '22:18:58', '22:19:43', '00:40', '2020-04-07'),
(256, 26, 1, 0, 0, '2', '2020-04-07', '22:20:15', '00:00:00', '', '2020-04-07'),
(257, 27, 1, 0, 0, '2', '2020-04-07', '22:29:15', '22:29:59', '00:28', '2020-04-07'),
(258, 0, 3, 0, 0, '2', '2020-04-07', '22:29:30', '22:29:58', '00:24', '2020-04-07'),
(259, 27, 3, 0, 0, '2', '2020-04-07', '22:35:06', '22:37:18', '02:02', '2020-04-07'),
(260, 0, 3, 0, 0, '2', '2020-04-07', '22:35:15', '22:37:12', '01:54', '2020-04-07'),
(261, 25, 1, 0, 0, '2', '2020-04-07', '22:46:34', '22:49:28', '02:41', '2020-04-07'),
(262, 0, 3, 0, 0, '2', '2020-04-07', '22:46:46', '22:49:27', '02:37', '2020-04-07'),
(263, 19, 3, 0, 0, '2', '2020-04-07', '22:53:36', '22:54:43', '00:53', '2020-04-07'),
(264, 0, 3, 0, 0, '2', '2020-04-07', '22:53:49', '22:54:50', '00:59', '2020-04-07'),
(265, 19, 3, 0, 0, '2', '2020-04-07', '22:54:49', '22:55:17', '00:20', '2020-04-07'),
(266, 0, 3, 0, 0, '2', '2020-04-07', '22:54:55', '22:56:58', '02:00', '2020-04-07'),
(267, 23, 3, 0, 0, '2', '2020-04-07', '22:55:33', '22:56:31', '00:50', '2020-04-07'),
(268, 27, 2, 0, 0, '2', '2020-04-07', '22:55:37', '00:00:00', '', '2020-04-07'),
(269, 0, 3, 0, 0, '2', '2020-04-07', '22:55:40', '22:56:34', '00:49', '2020-04-07'),
(270, 0, 2, 0, 0, '2', '2020-04-07', '22:56:04', '00:00:00', '', '2020-04-07'),
(271, 19, 2, 0, 0, '2', '2020-04-07', '22:56:45', '22:57:44', '00:47', '2020-04-07'),
(272, 0, 2, 0, 0, '2', '2020-04-07', '22:56:56', '00:00:00', '', '2020-04-07'),
(273, 19, 3, 0, 0, '2', '2020-04-07', '22:58:05', '22:58:49', '00:35', '2020-04-07'),
(274, 0, 3, 0, 0, '2', '2020-04-07', '22:58:12', '22:59:02', '00:47', '2020-04-07'),
(275, 23, 3, 0, 0, '2', '2020-04-07', '22:59:00', '22:59:34', '00:26', '2020-04-07'),
(276, 0, 3, 0, 0, '2', '2020-04-07', '22:59:07', '00:00:00', '', '2020-04-07'),
(277, 19, 2, 0, 0, '2', '2020-04-07', '23:00:42', '00:00:00', '', '2020-04-07'),
(278, 0, 2, 0, 0, '2', '2020-04-07', '23:00:53', '23:03:32', '02:36', '2020-04-07'),
(279, 27, 2, 0, 0, '2', '2020-04-07', '23:01:40', '23:01:50', 'Ringing...', '2020-04-07'),
(280, 19, 2, 0, 0, '2', '2020-04-07', '23:13:15', '00:00:00', '', '2020-04-07'),
(281, 0, 2, 0, 0, '2', '2020-04-07', '23:13:23', '00:00:00', '', '2020-04-07'),
(282, 19, 2, 0, 0, '2', '2020-04-07', '23:14:03', '23:17:36', '03:25', '2020-04-07'),
(283, 0, 2, 0, 0, '2', '2020-04-07', '23:14:10', '23:17:33', '03:19', '2020-04-07'),
(284, 28, 2, 0, 0, '2', '2020-04-07', '23:23:27', '23:26:48', '03:11', '2020-04-07'),
(285, 0, 2, 0, 0, '2', '2020-04-07', '23:23:37', '23:26:44', '03:04', '2020-04-07'),
(286, 28, 2, 0, 0, '2', '2020-04-07', '23:27:55', '23:28:59', '00:55', '2020-04-07'),
(287, 0, 2, 0, 0, '2', '2020-04-07', '23:28:04', '23:28:50', '00:44', '2020-04-07'),
(288, 28, 2, 0, 0, '2', '2020-04-07', '23:29:10', '00:00:00', '', '2020-04-07'),
(289, 0, 2, 0, 0, '2', '2020-04-07', '23:29:17', '23:29:55', '00:36', '2020-04-07'),
(290, 28, 2, 0, 0, '2', '2020-04-07', '23:30:45', '23:32:21', '01:29', '2020-04-07'),
(291, 0, 2, 0, 0, '2', '2020-04-07', '23:30:52', '00:00:00', '', '2020-04-07'),
(292, 29, 2, 0, 0, '2', '2020-04-07', '23:32:44', '23:34:43', '01:51', '2020-04-07'),
(293, 0, 2, 0, 0, '2', '2020-04-07', '23:32:52', '23:34:28', '01:33', '2020-04-07'),
(294, 28, 2, 0, 0, '2', '2020-04-07', '23:33:56', '23:34:00', 'Ringing...', '2020-04-07'),
(295, 0, 2, 0, 0, '2', '2020-04-07', '23:34:06', '23:34:18', '00:10', '2020-04-07'),
(296, 29, 2, 0, 0, '2', '2020-04-07', '23:34:53', '23:35:25', '00:21', '2020-04-07'),
(297, 0, 2, 0, 0, '2', '2020-04-07', '23:35:04', '23:36:14', '01:08', '2020-04-07'),
(298, 28, 2, 0, 0, '2', '2020-04-07', '23:35:08', '00:00:00', '', '2020-04-07'),
(299, 0, 2, 0, 0, '2', '2020-04-07', '23:35:14', '23:36:03', '00:46', '2020-04-07'),
(300, 29, 2, 0, 0, '2', '2020-04-07', '23:38:25', '23:42:47', '04:13', '2020-04-07'),
(301, 0, 2, 0, 0, '2', '2020-04-07', '23:38:34', '00:00:00', '', '2020-04-07'),
(302, 29, 2, 0, 0, '2', '2020-04-07', '23:42:56', '23:43:47', '00:40', '2020-04-07'),
(303, 0, 2, 0, 0, '2', '2020-04-07', '23:43:07', '23:43:51', '00:41', '2020-04-07'),
(304, 29, 1, 0, 0, '2', '2020-04-07', '23:44:34', '23:44:46', 'Ringing...', '2020-04-07'),
(305, 29, 2, 0, 0, '2', '2020-04-07', '23:48:53', '23:50:16', '01:16', '2020-04-07'),
(306, 0, 2, 0, 0, '2', '2020-04-07', '23:49:00', '23:50:25', '01:22', '2020-04-07'),
(307, 29, 2, 0, 0, '2', '2020-04-07', '23:50:25', '00:00:00', '', '2020-04-07'),
(308, 0, 2, 0, 0, '2', '2020-04-07', '23:50:34', '00:00:00', '', '2020-04-07'),
(309, 28, 2, 0, 0, '2', '2020-04-07', '23:51:47', '23:52:36', '00:33', '2020-04-07'),
(310, 0, 2, 0, 0, '2', '2020-04-07', '23:52:02', '23:53:19', '01:13', '2020-04-07'),
(311, 29, 2, 0, 0, '2', '2020-04-07', '23:53:29', '23:54:01', '00:22', '2020-04-07'),
(312, 0, 2, 0, 0, '2', '2020-04-07', '23:53:38', '23:54:49', '01:08', '2020-04-07'),
(313, 29, 2, 0, 0, '2', '2020-04-07', '23:54:05', '23:54:22', 'Ringing...', '2020-04-07'),
(314, 28, 2, 0, 0, '2', '2020-04-07', '23:54:07', '23:55:03', '00:50', '2020-04-07'),
(315, 0, 2, 0, 0, '2', '2020-04-07', '23:54:13', '23:54:43', '00:26', '2020-04-07'),
(316, 28, 2, 0, 0, '2', '2020-04-07', '23:55:51', '23:56:16', '00:18', '2020-04-07'),
(317, 0, 2, 0, 0, '2', '2020-04-07', '23:55:58', '00:00:00', '', '2020-04-07'),
(318, 28, 2, 0, 0, '2', '2020-04-07', '23:56:45', '23:57:07', 'Ringing...', '2020-04-07'),
(319, 28, 2, 0, 0, '2', '2020-04-07', '23:57:12', '23:57:14', 'Rejected', '2020-04-07'),
(320, 28, 2, 0, 0, '2', '2020-04-07', '23:57:57', '00:00:00', '', '2020-04-07'),
(321, 28, 2, 0, 0, '2', '2020-04-07', '23:58:51', '23:59:18', 'Ringing...', '2020-04-07'),
(322, 28, 3, 0, 0, '2', '2020-04-07', '00:00:22', '00:00:00', '', '2020-04-08'),
(323, 28, 2, 0, 0, '2', '2020-04-07', '00:00:25', '00:00:45', '00:16', '2020-04-08'),
(324, 0, 2, 0, 0, '2', '2020-04-07', '00:00:30', '00:07:21', '06:47', '2020-04-08'),
(325, 28, 2, 0, 0, '2', '2020-04-07', '00:00:56', '00:07:10', '06:06', '2020-04-08'),
(326, 0, 2, 0, 0, '2', '2020-04-07', '00:01:03', '00:07:11', '06:05', '2020-04-08'),
(327, 29, 2, 0, 0, '2', '2020-04-07', '00:02:43', '00:06:52', '03:58', '2020-04-08'),
(328, 0, 2, 0, 0, '2', '2020-04-07', '00:02:54', '00:07:00', '04:03', '2020-04-08'),
(329, 28, 2, 0, 0, '2', '2020-04-07', '00:12:50', '00:13:44', '00:46', '2020-04-08'),
(330, 0, 2, 0, 0, '2', '2020-04-07', '00:12:57', '00:13:33', '00:32', '2020-04-08'),
(331, 28, 2, 0, 0, '2', '2020-04-07', '00:13:50', '00:16:28', '02:31', '2020-04-08'),
(332, 0, 2, 0, 0, '2', '2020-04-07', '00:13:57', '00:00:00', '', '2020-04-08'),
(333, 31, 3, 0, 0, '2', '2020-04-07', '09:53:20', '00:00:00', '', '2020-04-08'),
(334, 0, 3, 0, 0, '2', '2020-04-07', '09:53:43', '09:54:25', '00:39', '2020-04-08'),
(335, 31, 3, 0, 0, '2', '2020-04-07', '09:57:04', '09:58:05', '00:51', '2020-04-08'),
(336, 0, 3, 0, 0, '2', '2020-04-07', '09:57:14', '09:57:59', '00:42', '2020-04-08'),
(337, 31, 3, 0, 0, '2', '2020-04-07', '09:58:21', '00:00:00', '', '2020-04-08'),
(338, 0, 3, 0, 0, '2', '2020-04-07', '09:58:30', '09:59:06', '00:33', '2020-04-08'),
(339, 31, 2, 0, 0, '2', '2020-04-07', '10:10:30', '10:13:23', '02:34', '2020-04-08'),
(340, 0, 2, 0, 0, '2', '2020-04-07', '10:10:49', '10:12:17', '01:25', '2020-04-08'),
(341, 31, 2, 0, 0, '2', '2020-04-07', '10:13:33', '10:31:30', '00:54', '2020-04-08'),
(342, 0, 2, 0, 0, '2', '2020-04-07', '10:13:51', '10:14:48', '00:53', '2020-04-08'),
(343, 28, 2, 0, 0, '2', '2020-04-07', '10:18:14', '10:21:27', '03:05', '2020-04-08'),
(344, 0, 2, 0, 0, '2', '2020-04-07', '10:18:22', '10:21:25', '03:00', '2020-04-08'),
(345, 28, 2, 0, 0, '2', '2020-04-07', '10:21:35', '10:22:12', '00:26', '2020-04-08'),
(346, 0, 2, 0, 0, '2', '2020-04-07', '10:21:46', '10:22:11', '00:20', '2020-04-08'),
(347, 31, 2, 0, 0, '2', '2020-04-08', '10:31:37', '10:32:33', 'Ringing...', '2020-04-08'),
(348, 31, 2, 0, 0, '2', '2020-04-08', '10:32:38', '10:33:54', 'Rejected', '2020-04-08'),
(349, 0, 2, 0, 0, '2', '2020-04-08', '10:32:56', '10:34:03', '01:03', '2020-04-08'),
(350, 28, 2, 0, 0, '2', '2020-04-08', '10:33:17', '10:33:26', 'Rejected', '2020-04-08'),
(351, 28, 2, 0, 0, '2', '2020-04-08', '10:49:30', '10:53:11', '03:31', '2020-04-08'),
(352, 0, 2, 0, 0, '2', '2020-04-08', '10:49:38', '10:53:07', '03:24', '2020-04-08'),
(353, 32, 2, 0, 0, '2', '2020-04-08', '11:00:12', '11:30:52', '30:31', '2020-04-08'),
(354, 0, 2, 0, 0, '2', '2020-04-08', '11:00:20', '11:30:55', '30:31', '2020-04-08'),
(355, 11, 2, 0, 0, '2', '2020-04-08', '11:47:32', '11:48:31', '00:43', '2020-04-08'),
(356, 0, 2, 0, 0, '2', '2020-04-08', '11:47:46', '11:48:27', '00:37', '2020-04-08'),
(357, 29, 2, 0, 0, '2', '2020-04-08', '11:50:13', '11:50:41', '00:17', '2020-04-08'),
(358, 0, 2, 0, 0, '2', '2020-04-08', '11:50:26', '11:51:08', '00:29', '2020-04-08'),
(359, 34, 2, 0, 0, '2', '2020-04-08', '11:53:32', '11:53:42', 'Rejected', '2020-04-08'),
(360, 29, 2, 0, 0, '2', '2020-04-08', '11:53:34', '11:53:55', 'Ringing...', '2020-04-08'),
(361, 34, 2, 0, 0, '2', '2020-04-08', '11:53:52', '00:00:00', '', '2020-04-08'),
(362, 0, 2, 0, 0, '2', '2020-04-08', '11:54:00', '11:54:55', '00:52', '2020-04-08'),
(363, 29, 2, 0, 0, '2', '2020-04-08', '11:54:57', '11:55:03', 'Rejected', '2020-04-08'),
(364, 29, 2, 0, 0, '2', '2020-04-08', '11:55:10', '11:55:35', '00:13', '2020-04-08'),
(365, 0, 2, 0, 0, '2', '2020-04-08', '11:55:22', '11:55:43', '00:18', '2020-04-08'),
(366, 34, 3, 0, 0, '2', '2020-04-08', '11:59:05', '12:00:53', '01:40', '2020-04-08'),
(367, 0, 3, 0, 0, '2', '2020-04-08', '11:59:12', '12:00:50', '01:34', '2020-04-08'),
(368, 29, 3, 0, 0, '2', '2020-04-08', '12:04:07', '12:09:15', '04:57', '2020-04-08'),
(369, 0, 3, 0, 0, '2', '2020-04-08', '12:04:15', '00:00:00', '', '2020-04-08'),
(370, 11, 4, 0, 0, '2', '2020-04-08', '12:07:42', '12:08:06', 'Ringing...', '2020-04-08'),
(371, 29, 3, 0, 0, '2', '2020-04-08', '12:09:21', '12:09:43', '00:15', '2020-04-08'),
(372, 0, 3, 0, 0, '2', '2020-04-08', '12:09:29', '00:00:00', '', '2020-04-08'),
(373, 29, 3, 0, 0, '2', '2020-04-08', '12:09:48', '12:10:13', '00:17', '2020-04-08'),
(374, 0, 3, 0, 0, '2', '2020-04-08', '12:09:57', '12:10:18', '00:18', '2020-04-08'),
(375, 29, 3, 0, 0, '2', '2020-04-08', '12:10:18', '12:10:50', '00:26', '2020-04-08'),
(376, 0, 3, 0, 0, '2', '2020-04-08', '12:10:25', '12:10:55', '00:27', '2020-04-08'),
(377, 29, 2, 0, 0, '2', '2020-04-08', '12:10:55', '12:11:23', 'Ringing...', '2020-04-08'),
(378, 29, 3, 0, 0, '2', '2020-04-08', '12:11:31', '12:11:55', '00:14', '2020-04-08'),
(379, 0, 3, 0, 0, '2', '2020-04-08', '12:11:41', '12:26:55', '15:12', '2020-04-08'),
(380, 31, 3, 0, 0, '2', '2020-04-08', '12:29:30', '00:00:00', '', '2020-04-08'),
(381, 0, 3, 0, 0, '2', '2020-04-08', '12:29:40', '12:30:16', '00:33', '2020-04-08'),
(382, 31, 3, 0, 0, '2', '2020-04-08', '12:34:05', '00:00:00', '', '2020-04-08'),
(383, 0, 3, 0, 0, '2', '2020-04-08', '12:34:14', '12:37:13', '02:57', '2020-04-08'),
(384, 31, 3, 0, 0, '2', '2020-04-08', '12:36:19', '12:37:08', '00:38', '2020-04-08'),
(385, 0, 3, 0, 0, '2', '2020-04-08', '12:36:30', '12:37:10', '00:38', '2020-04-08'),
(386, 31, 3, 0, 0, '2', '2020-04-08', '12:37:14', '00:00:00', '', '2020-04-08'),
(387, 0, 3, 0, 0, '2', '2020-04-08', '12:37:22', '12:38:34', '01:10', '2020-04-08'),
(388, 31, 3, 0, 0, '2', '2020-04-08', '12:38:40', '00:00:00', '', '2020-04-08'),
(389, 0, 3, 0, 0, '2', '2020-04-08', '12:38:47', '12:40:11', '01:23', '2020-04-08'),
(390, 31, 3, 0, 0, '2', '2020-04-08', '12:41:52', '00:00:00', '', '2020-04-08'),
(391, 0, 2, 0, 0, '2', '2020-04-08', '12:41:59', '12:42:40', '00:39', '2020-04-08'),
(392, 31, 2, 0, 0, '2', '2020-04-08', '12:43:04', '12:44:11', '00:54', '2020-04-08'),
(393, 0, 2, 0, 0, '2', '2020-04-08', '12:43:17', '00:00:00', '', '2020-04-08'),
(394, 35, 1, 0, 0, '2', '2020-04-08', '12:58:48', '12:59:12', 'Ringing...', '2020-04-08'),
(395, 35, 2, 0, 0, '2', '2020-04-08', '12:59:18', '13:00:06', '00:42', '2020-04-08'),
(396, 25, 2, 0, 0, '2', '2020-04-08', '13:22:43', '00:00:00', '', '2020-04-08'),
(397, 36, 2, 0, 0, '2', '2020-04-08', '13:33:08', '00:00:00', '', '2020-04-08'),
(398, 0, 2, 0, 0, '2', '2020-04-08', '13:33:30', '13:36:00', '02:27', '2020-04-08'),
(399, 36, 2, 0, 0, '2', '2020-04-08', '13:38:20', '13:40:43', 'Ringing...', '2020-04-08'),
(400, 28, 2, 0, 0, '2', '2020-04-08', '14:40:28', '14:41:31', '00:50', '2020-04-08'),
(401, 0, 2, 0, 0, '2', '2020-04-08', '14:40:40', '14:42:51', '02:08', '2020-04-08'),
(402, 28, 1, 0, 0, '2', '2020-04-08', '14:41:39', '14:42:08', 'Ringing...', '2020-04-08'),
(403, 28, 2, 0, 0, '2', '2020-04-08', '14:42:12', '14:42:53', '00:22', '2020-04-08'),
(404, 0, 2, 0, 0, '2', '2020-04-08', '14:42:32', '14:42:47', '00:13', '2020-04-08'),
(405, 28, 2, 0, 0, '2', '2020-04-08', '14:42:58', '14:43:41', '00:37', '2020-04-08'),
(406, 0, 2, 0, 0, '2', '2020-04-08', '14:43:05', '14:43:40', '00:32', '2020-04-08'),
(407, 28, 1, 0, 0, '2', '2020-04-08', '14:43:46', '14:44:14', 'Ringing...', '2020-04-08'),
(408, 28, 2, 0, 0, '2', '2020-04-08', '14:44:19', '14:45:08', '00:43', '2020-04-08'),
(409, 0, 2, 0, 0, '2', '2020-04-08', '14:44:25', '14:44:52', '00:23', '2020-04-08'),
(410, 25, 2, 0, 0, '2', '2020-04-08', '14:46:25', '14:46:57', '00:26', '2020-04-08'),
(411, 0, 2, 0, 0, '2', '2020-04-08', '14:46:32', '14:46:56', '00:21', '2020-04-08'),
(412, 37, 2, 0, 0, '2', '2020-04-08', '15:24:36', '15:37:02', '12:14', '2020-04-08'),
(413, 0, 2, 0, 0, '2', '2020-04-08', '15:21:33', '15:33:49', '12:13', '2020-04-08'),
(414, 37, 2, 0, 0, '2', '2020-04-08', '15:37:18', '15:37:56', '00:31', '2020-04-08'),
(415, 0, 2, 0, 0, '2', '2020-04-08', '15:34:10', '15:34:40', '00:27', '2020-04-08'),
(416, 37, 2, 0, 0, '2', '2020-04-08', '15:40:26', '15:40:55', '00:23', '2020-04-08'),
(417, 0, 2, 0, 0, '2', '2020-04-08', '15:37:18', '15:37:40', '00:18', '2020-04-08'),
(418, 37, 2, 0, 0, '2', '2020-04-08', '15:42:12', '15:42:42', '00:21', '2020-04-08'),
(419, 0, 2, 0, 0, '2', '2020-04-08', '15:39:08', '15:39:27', '00:16', '2020-04-08'),
(420, 31, 2, 0, 0, '2', '2020-04-08', '15:49:08', '00:00:00', '', '2020-04-08'),
(421, 0, 2, 0, 0, '2', '2020-04-08', '15:49:28', '15:57:39', '08:07', '2020-04-08'),
(422, 38, 2, 0, 0, '2', '2020-04-08', '16:16:29', '16:16:32', 'Rejected', '2020-04-08'),
(423, 38, 2, 0, 0, '2', '2020-04-08', '16:16:36', '16:16:39', 'Rejected', '2020-04-08'),
(424, 38, 2, 0, 0, '2', '2020-04-08', '16:16:44', '00:00:00', '', '2020-04-08'),
(425, 38, 2, 0, 0, '2', '2020-04-08', '16:18:02', '16:33:48', '15:38', '2020-04-08'),
(426, 0, 2, 0, 0, '2', '2020-04-08', '16:18:10', '00:00:00', '', '2020-04-08'),
(427, 31, 2, 0, 0, '2', '2020-04-08', '16:42:46', '00:00:00', '', '2020-04-08'),
(428, 0, 2, 0, 0, '2', '2020-04-08', '16:43:05', '16:43:25', '00:17', '2020-04-08'),
(429, 31, 2, 0, 0, '2', '2020-04-08', '16:45:50', '00:00:00', '', '2020-04-08'),
(430, 0, 2, 0, 0, '2', '2020-04-08', '16:46:10', '16:57:39', '11:26', '2020-04-08'),
(431, 11, 4, 0, 0, '2', '2020-04-08', '16:50:21', '16:50:48', 'Ringing...', '2020-04-08'),
(432, 11, 4, 0, 0, '2', '2020-04-08', '16:53:14', '16:53:21', 'Ringing...', '2020-04-08'),
(433, 11, 4, 0, 0, '2', '2020-04-08', '16:53:27', '16:53:35', 'Ringing...', '2020-04-08'),
(434, 11, 1, 0, 0, '2', '2020-04-08', '17:02:13', '17:02:25', 'Ringing...', '2020-04-08'),
(435, 11, 4, 0, 0, '2', '2020-04-08', '17:02:36', '17:03:35', '00:50', '2020-04-08'),
(436, 0, 4, 0, 0, '2', '2020-04-08', '17:02:47', '00:00:00', '', '2020-04-08'),
(437, 11, 4, 0, 0, '2', '2020-04-08', '17:03:41', '17:04:10', '00:23', '2020-04-08'),
(438, 0, 4, 0, 0, '2', '2020-04-08', '17:03:47', '00:00:00', '', '2020-04-08'),
(439, 11, 4, 0, 0, '2', '2020-04-08', '17:05:42', '17:06:48', '00:58', '2020-04-08'),
(440, 0, 4, 0, 0, '2', '2020-04-08', '17:05:50', '17:06:54', '01:01', '2020-04-08'),
(441, 31, 2, 0, 0, '2', '2020-04-08', '17:08:13', '17:08:54', 'Ringing...', '2020-04-08'),
(442, 0, 2, 0, 0, '2', '2020-04-08', '17:10:27', '17:11:51', '01:21', '2020-04-08'),
(443, 31, 2, 0, 0, '2', '2020-04-08', '17:10:28', '00:00:00', '', '2020-04-08'),
(444, 0, 2, 0, 0, '2', '2020-04-08', '17:10:47', '17:10:57', '00:07', '2020-04-08'),
(445, 31, 2, 0, 0, '2', '2020-04-08', '17:12:14', '17:12:57', '00:36', '2020-04-08'),
(446, 0, 2, 0, 0, '2', '2020-04-08', '17:12:22', '17:13:02', '00:38', '2020-04-08'),
(447, 11, 4, 0, 0, '2', '2020-04-08', '17:13:35', '17:14:16', '00:29', '2020-04-08'),
(448, 0, 4, 0, 0, '2', '2020-04-08', '17:13:46', '17:13:57', '00:07', '2020-04-08'),
(449, 11, 4, 0, 0, '2', '2020-04-08', '17:14:24', '00:00:00', '', '2020-04-08'),
(450, 31, 2, 0, 0, '2', '2020-04-08', '17:14:35', '17:15:18', '00:33', '2020-04-08'),
(451, 0, 4, 0, 0, '2', '2020-04-08', '17:14:41', '17:15:05', '00:21', '2020-04-08'),
(452, 0, 2, 0, 0, '2', '2020-04-08', '17:14:47', '17:15:07', '00:18', '2020-04-08'),
(453, 31, 2, 0, 0, '2', '2020-04-08', '17:15:26', '17:16:03', 'Ringing...', '2020-04-08'),
(454, 31, 2, 0, 0, '2', '2020-04-08', '17:16:11', '17:16:56', '00:37', '2020-04-08'),
(455, 0, 2, 0, 0, '2', '2020-04-08', '17:16:19', '17:16:59', '00:37', '2020-04-08'),
(456, 31, 3, 0, 0, '2', '2020-04-08', '17:17:01', '17:18:01', '00:53', '2020-04-08'),
(457, 31, 3, 0, 0, '2', '2020-04-08', '17:18:10', '17:18:13', 'Rejected', '2020-04-08'),
(458, 31, 3, 0, 0, '2', '2020-04-08', '17:18:22', '17:18:46', 'Ringing...', '2020-04-08'),
(459, 31, 3, 0, 0, '2', '2020-04-08', '17:19:41', '17:20:27', '00:32', '2020-04-08'),
(460, 0, 3, 0, 0, '2', '2020-04-08', '17:19:56', '17:20:23', '00:25', '2020-04-08'),
(461, 11, 4, 0, 0, '2', '2020-04-08', '18:07:34', '18:07:45', 'Ringing...', '2020-04-08'),
(462, 11, 4, 0, 0, '2', '2020-04-08', '18:08:08', '18:08:14', 'Ringing...', '2020-04-08'),
(463, 11, 4, 0, 0, '2', '2020-04-08', '18:12:28', '18:13:02', '00:24', '2020-04-08'),
(464, 0, 4, 0, 0, '2', '2020-04-08', '18:12:39', '18:13:06', 'Rejected', '2020-04-08'),
(465, 11, 4, 0, 0, '2', '2020-04-08', '18:14:21', '18:14:27', 'Ringing...', '2020-04-08'),
(466, 11, 4, 0, 0, '2', '2020-04-08', '18:18:37', '18:18:46', 'Ringing...', '2020-04-08'),
(467, 11, 4, 0, 0, '2', '2020-04-08', '18:19:34', '18:20:06', 'Ringing...', '2020-04-08'),
(468, 11, 4, 0, 0, '2', '2020-04-08', '18:21:37', '18:21:44', 'Ringing...', '2020-04-08'),
(469, 11, 4, 0, 0, '2', '2020-04-08', '18:21:51', '18:21:59', 'Ringing...', '2020-04-08'),
(470, 11, 4, 0, 0, '2', '2020-04-08', '18:22:06', '18:22:23', '00:09', '2020-04-08'),
(471, 0, 4, 0, 0, '2', '2020-04-08', '18:22:14', '18:22:26', 'Rejected', '2020-04-08'),
(472, 11, 4, 0, 0, '2', '2020-04-08', '18:37:08', '18:37:36', '00:18', '2020-04-08'),
(473, 0, 4, 0, 0, '2', '2020-04-08', '18:37:16', '18:37:28', '00:08', '2020-04-08'),
(474, 11, 4, 0, 0, '2', '2020-04-08', '18:38:59', '18:39:05', 'Ringing...', '2020-04-08'),
(475, 11, 4, 0, 0, '2', '2020-04-08', '18:39:49', '18:40:41', '00:35', '2020-04-08'),
(476, 0, 4, 0, 0, '2', '2020-04-08', '18:40:06', '18:40:45', 'Rejected', '2020-04-08'),
(477, 11, 4, 0, 0, '2', '2020-04-08', '19:40:21', '19:40:33', 'Rejected', '2020-04-08'),
(478, 11, 4, 0, 0, '2', '2020-04-08', '19:40:48', '19:40:55', 'Ringing...', '2020-04-08'),
(479, 11, 4, 0, 0, '2', '2020-04-08', '19:43:44', '00:00:00', '', '2020-04-08'),
(480, 11, 4, 0, 0, '2', '2020-04-08', '19:47:02', '19:47:20', 'Ringing...', '2020-04-08'),
(481, 11, 4, 0, 0, '2', '2020-04-08', '19:48:05', '19:48:16', 'Ringing...', '2020-04-08'),
(482, 11, 4, 0, 0, '2', '2020-04-08', '19:51:09', '19:51:20', 'Ringing...', '2020-04-08'),
(483, 11, 4, 0, 0, '2', '2020-04-08', '19:52:27', '00:00:00', '', '2020-04-08'),
(484, 11, 4, 0, 0, '2', '2020-04-08', '19:53:56', '19:54:07', 'Ringing...', '2020-04-08'),
(485, 11, 4, 0, 0, '2', '2020-04-08', '19:55:26', '19:55:53', 'Rejected', '2020-04-08'),
(486, 11, 4, 0, 0, '2', '2020-04-08', '19:57:07', '19:57:29', 'Rejected', '2020-04-08'),
(487, 11, 4, 0, 0, '2', '2020-04-08', '20:00:55', '20:01:12', 'Ringing...', '2020-04-08'),
(488, 11, 4, 0, 0, '2', '2020-04-08', '20:01:21', '20:01:32', 'Rejected', '2020-04-08'),
(489, 25, 2, 0, 0, '2', '2020-04-08', '22:09:51', '22:11:58', '01:58', '2020-04-08'),
(490, 0, 2, 0, 0, '2', '2020-04-08', '22:09:59', '00:00:00', '', '2020-04-08'),
(491, 1, 1, 0, 0, '1', '2020-04-09', '11:44:00', '00:00:00', '', '2020-04-09'),
(492, 11, 4, 0, 0, '2', '2020-04-09', '12:36:14', '12:36:37', 'Rejected', '2020-04-09'),
(493, 11, 4, 0, 0, '2', '2020-04-09', '12:41:26', '12:41:58', 'Ringing...', '2020-04-09'),
(494, 11, 4, 0, 0, '2', '2020-04-09', '12:43:29', '12:43:55', 'Ringing...', '2020-04-09'),
(495, 11, 4, 0, 0, '2', '2020-04-09', '12:44:10', '12:44:58', 'Ringing...', '2020-04-09'),
(496, 1, 1, 0, 0, '1', '2020-04-09', '11:44:00', '00:00:00', '', '2020-04-09'),
(497, 11, 4, 0, 0, '2', '2020-04-09', '13:11:42', '13:12:50', 'Ringing...', '2020-04-09'),
(498, 11, 4, 0, 0, '2', '2020-04-09', '13:13:53', '00:00:00', '', '2020-04-09'),
(499, 11, 4, 0, 0, '2', '2020-04-09', '13:16:23', '13:17:05', 'Ringing...', '2020-04-09'),
(500, 11, 4, 0, 0, '2', '2020-04-09', '13:18:09', '00:00:00', '', '2020-04-09'),
(501, 11, 4, 0, 0, '2', '2020-04-09', '13:19:55', '13:21:16', 'Ringing...', '2020-04-09'),
(502, 11, 4, 0, 0, '2', '2020-04-09', '13:27:59', '13:28:30', 'Rejected', '2020-04-09'),
(503, 11, 4, 0, 0, '2', '2020-04-09', '13:29:11', '13:29:21', 'Rejected', '2020-04-09'),
(504, 11, 4, 0, 0, '2', '2020-04-09', '13:29:29', '13:29:49', 'Ringing...', '2020-04-09'),
(505, 11, 4, 0, 0, '2', '2020-04-09', '13:29:36', '13:29:59', '00:20', '2020-04-09'),
(506, 11, 4, 0, 0, '2', '2020-04-09', '13:30:38', '13:30:42', 'Ringing...', '2020-04-09'),
(507, 11, 4, 0, 0, '2', '2020-04-09', '13:32:14', '13:32:23', 'Ringing...', '2020-04-09'),
(508, 11, 4, 0, 0, '2', '2020-04-09', '13:32:31', '13:32:53', 'Ringing...', '2020-04-09'),
(509, 11, 4, 0, 0, '2', '2020-04-09', '13:32:38', '13:32:55', 'Rejected', '2020-04-09'),
(510, 11, 4, 0, 0, '2', '2020-04-09', '13:33:17', '00:00:00', '', '2020-04-09'),
(511, 11, 4, 0, 0, '2', '2020-04-09', '13:33:29', '13:34:11', '00:39', '2020-04-09'),
(512, 11, 4, 0, 0, '2', '2020-04-09', '13:36:19', '13:37:12', 'Ringing...', '2020-04-09'),
(513, 11, 4, 0, 0, '2', '2020-04-09', '13:36:34', '00:00:00', '', '2020-04-09'),
(514, 11, 4, 0, 0, '2', '2020-04-09', '13:42:17', '13:42:37', '00:10', '2020-04-09'),
(515, 11, 4, 0, 0, '2', '2020-04-09', '13:42:26', '13:42:40', 'Rejected', '2020-04-09'),
(516, 11, 4, 0, 0, '2', '2020-04-09', '13:44:21', '13:45:31', '00:58', '2020-04-09'),
(517, 11, 4, 0, 0, '2', '2020-04-09', '13:44:30', '13:45:33', 'Rejected', '2020-04-09'),
(518, 11, 4, 0, 0, '2', '2020-04-09', '13:45:36', '13:46:25', '00:32', '2020-04-09'),
(519, 11, 4, 0, 0, '2', '2020-04-09', '13:45:51', '13:46:28', 'Rejected', '2020-04-09'),
(520, 11, 4, 0, 0, '2', '2020-04-09', '13:46:33', '13:46:51', '00:08', '2020-04-09'),
(521, 11, 4, 0, 0, '2', '2020-04-09', '13:46:41', '13:46:54', 'Rejected', '2020-04-09'),
(522, 11, 4, 0, 0, '2', '2020-04-09', '13:48:40', '13:49:17', '00:23', '2020-04-09'),
(523, 11, 4, 0, 0, '2', '2020-04-09', '13:48:52', '13:49:19', 'Rejected', '2020-04-09'),
(524, 11, 4, 0, 0, '2', '2020-04-09', '13:50:38', '13:51:10', '00:20', '2020-04-09'),
(525, 11, 4, 0, 0, '2', '2020-04-09', '13:50:48', '13:51:12', 'Rejected', '2020-04-09'),
(526, 11, 4, 0, 0, '2', '2020-04-09', '13:52:23', '00:00:00', '', '2020-04-09'),
(527, 11, 4, 0, 0, '2', '2020-04-09', '13:52:58', '13:53:28', 'Ringing...', '2020-04-09'),
(528, 11, 4, 0, 0, '2', '2020-04-09', '13:53:10', '13:53:31', 'Rejected', '2020-04-09'),
(529, 11, 4, 0, 0, '2', '2020-04-09', '13:54:17', '13:54:47', 'Ringing...', '2020-04-09'),
(530, 11, 4, 0, 0, '2', '2020-04-09', '13:54:29', '13:54:50', 'Rejected', '2020-04-09'),
(531, 11, 4, 0, 0, '2', '2020-04-09', '13:59:29', '13:59:58', '00:16', '2020-04-09'),
(532, 11, 4, 0, 0, '2', '2020-04-09', '13:59:41', '00:00:00', '', '2020-04-09'),
(533, 11, 4, 0, 0, '2', '2020-04-09', '14:00:08', '14:00:23', 'Ringing...', '2020-04-09'),
(534, 11, 4, 0, 0, '2', '2020-04-09', '14:00:37', '14:00:44', 'Ringing...', '2020-04-09'),
(535, 11, 4, 0, 0, '2', '2020-04-09', '14:00:53', '14:01:30', '00:19', '2020-04-09'),
(536, 11, 4, 0, 0, '2', '2020-04-09', '14:01:10', '14:01:49', '00:36', '2020-04-09'),
(537, 11, 4, 0, 0, '2', '2020-04-09', '14:02:38', '14:03:07', 'Ringing...', '2020-04-09'),
(538, 11, 4, 0, 0, '2', '2020-04-09', '14:03:18', '14:03:51', 'Ringing...', '2020-04-09'),
(539, 11, 4, 0, 0, '2', '2020-04-09', '14:04:09', '14:04:30', 'Ringing...', '2020-04-09'),
(540, 25, 2, 0, 0, '2', '2020-04-09', '14:04:58', '14:08:23', '03:12', '2020-04-09'),
(541, 25, 2, 0, 0, '2', '2020-04-09', '14:05:10', '14:08:45', '03:32', '2020-04-09'),
(542, 11, 4, 0, 0, '2', '2020-04-09', '14:05:30', '14:05:52', 'Ringing...', '2020-04-09'),
(543, 11, 4, 0, 0, '2', '2020-04-09', '14:07:24', '14:07:55', '00:15', '2020-04-09'),
(544, 11, 4, 0, 0, '2', '2020-04-09', '14:07:38', '14:07:58', 'Rejected', '2020-04-09'),
(545, 11, 4, 0, 0, '2', '2020-04-09', '14:08:04', '14:09:20', '00:56', '2020-04-09'),
(546, 11, 4, 0, 0, '2', '2020-04-09', '14:08:23', '14:09:23', 'Rejected', '2020-04-09'),
(547, 11, 4, 0, 0, '2', '2020-04-09', '14:09:25', '14:10:13', '00:29', '2020-04-09'),
(548, 11, 4, 0, 0, '2', '2020-04-09', '14:09:43', '14:10:16', 'Rejected', '2020-04-09'),
(549, 25, 2, 0, 0, '2', '2020-04-09', '14:04:13', '14:05:33', 'Ringing...', '2020-04-09'),
(550, 25, 2, 0, 0, '2', '2020-04-09', '14:09:57', '00:00:00', '', '2020-04-09'),
(551, 25, 2, 0, 0, '2', '2020-04-09', '14:10:04', '14:10:59', '00:48', '2020-04-09'),
(552, 25, 2, 0, 0, '2', '2020-04-09', '14:10:12', '14:13:42', '03:27', '2020-04-09'),
(553, 11, 4, 0, 0, '2', '2020-04-09', '14:12:05', '14:12:40', '00:17', '2020-04-09'),
(554, 11, 4, 0, 0, '2', '2020-04-09', '14:12:22', '14:12:44', 'Rejected', '2020-04-09'),
(555, 11, 4, 0, 0, '2', '2020-04-09', '14:16:55', '14:17:18', '00:11', '2020-04-09'),
(556, 11, 4, 0, 0, '2', '2020-04-09', '14:17:05', '14:17:21', 'Rejected', '2020-04-09'),
(557, 11, 4, 0, 0, '2', '2020-04-09', '14:19:52', '14:20:36', '00:29', '2020-04-09'),
(558, 11, 4, 0, 0, '2', '2020-04-09', '14:20:06', '14:20:39', 'Rejected', '2020-04-09'),
(559, 11, 4, 0, 0, '2', '2020-04-09', '14:24:39', '14:25:08', '00:13', '2020-04-09'),
(560, 11, 4, 0, 0, '2', '2020-04-09', '14:24:53', '14:25:12', 'Rejected', '2020-04-09'),
(561, 11, 4, 0, 0, '2', '2020-04-09', '14:25:17', '14:25:38', '00:10', '2020-04-09'),
(562, 11, 4, 0, 0, '2', '2020-04-09', '14:25:26', '14:25:42', 'Rejected', '2020-04-09'),
(563, 32, 2, 0, 0, '2', '2020-04-09', '14:59:32', '15:00:21', '00:40', '2020-04-09'),
(564, 32, 2, 0, 0, '2', '2020-04-09', '14:59:40', '15:00:21', '00:39', '2020-04-09'),
(565, 32, 2, 0, 0, '2', '2020-04-09', '15:00:25', '15:00:53', '00:21', '2020-04-09'),
(566, 32, 2, 0, 0, '2', '2020-04-09', '15:00:31', '15:00:54', '00:20', '2020-04-09'),
(567, 32, 2, 0, 0, '2', '2020-04-09', '15:03:51', '15:04:29', '00:30', '2020-04-09'),
(568, 32, 2, 0, 0, '2', '2020-04-09', '15:03:59', '15:04:29', '00:27', '2020-04-09'),
(569, 39, 2, 0, 0, '2', '2020-04-09', '12:55:20', '12:56:01', '00:33', '2020-04-09'),
(570, 39, 2, 0, 0, '2', '2020-04-09', '15:25:27', '15:25:59', '00:29', '2020-04-09'),
(571, 39, 2, 0, 0, '2', '2020-04-09', '12:56:06', '12:56:58', '00:46', '2020-04-09'),
(572, 39, 2, 0, 0, '2', '2020-04-09', '15:26:12', '15:26:53', '00:39', '2020-04-09'),
(573, 39, 2, 0, 0, '2', '2020-04-09', '12:57:03', '12:57:25', '00:15', '2020-04-09'),
(574, 39, 2, 0, 0, '2', '2020-04-09', '15:27:10', '15:27:24', '00:12', '2020-04-09'),
(575, 39, 2, 0, 0, '2', '2020-04-09', '13:01:55', '13:02:29', 'Rejected', '2020-04-09'),
(576, 39, 2, 0, 0, '2', '2020-04-09', '13:03:03', '13:04:04', '00:53', '2020-04-09'),
(577, 39, 2, 0, 0, '2', '2020-04-09', '15:33:10', '15:34:06', '00:53', '2020-04-09'),
(578, 39, 2, 0, 0, '2', '2020-04-09', '13:04:10', '13:04:52', '00:35', '2020-04-09'),
(579, 39, 2, 0, 0, '2', '2020-04-09', '15:34:16', '15:34:49', '00:29', '2020-04-09'),
(580, 11, 4, 0, 0, '2', '2020-04-09', '15:59:36', '16:00:02', '00:13', '2020-04-09'),
(581, 11, 4, 0, 0, '2', '2020-04-09', '15:59:47', '16:00:05', 'Rejected', '2020-04-09'),
(582, 11, 4, 0, 0, '2', '2020-04-09', '16:00:07', '16:00:32', '00:15', '2020-04-09'),
(583, 11, 4, 0, 0, '2', '2020-04-09', '16:00:15', '16:00:39', 'Rejected', '2020-04-09'),
(584, 11, 4, 0, 0, '2', '2020-04-09', '16:01:41', '16:02:06', '00:16', '2020-04-09'),
(585, 11, 4, 0, 0, '2', '2020-04-09', '16:01:48', '16:02:09', 'Rejected', '2020-04-09'),
(586, 11, 4, 0, 0, '2', '2020-04-09', '16:04:15', '16:05:37', '01:14', '2020-04-09'),
(587, 11, 4, 0, 0, '2', '2020-04-09', '16:04:22', '16:05:41', 'Rejected', '2020-04-09'),
(588, 11, 4, 0, 0, '2', '2020-04-09', '16:06:19', '00:00:00', '', '2020-04-09'),
(589, 11, 4, 0, 0, '2', '2020-04-09', '16:06:30', '16:07:05', '00:32', '2020-04-09'),
(590, 11, 4, 0, 0, '2', '2020-04-09', '16:07:29', '00:00:00', '', '2020-04-09'),
(591, 11, 4, 0, 0, '2', '2020-04-09', '16:09:15', '16:09:46', 'Rejected', '2020-04-09'),
(592, 11, 4, 0, 0, '2', '2020-04-09', '16:09:33', '16:09:50', '00:15', '2020-04-09'),
(593, 11, 4, 0, 0, '2', '2020-04-09', '16:09:57', '00:00:00', '', '2020-04-09'),
(594, 11, 4, 0, 0, '2', '2020-04-09', '16:10:12', '00:00:00', '', '2020-04-09');
INSERT INTO `axpatientrecords` (`patientRecordId`, `patientId`, `doctorId`, `subscriptionId`, `patientCreditId`, `communicationMode`, `communicationDate`, `communicationStartTime`, `communicationEndTime`, `communicationDuration`, `insDate`) VALUES
(595, 11, 4, 0, 0, '2', '2020-04-09', '16:11:55', '16:13:07', 'Ringing...', '2020-04-09'),
(596, 11, 4, 0, 0, '2', '2020-04-09', '16:13:18', '16:13:51', 'Ringing...', '2020-04-09'),
(597, 27, 2, 0, 0, '2', '2020-04-09', '17:25:15', '17:25:43', '00:06', '2020-04-09'),
(598, 27, 2, 0, 0, '2', '2020-04-09', '17:25:36', '17:26:28', '00:49', '2020-04-09'),
(599, 27, 2, 0, 0, '2', '2020-04-09', '17:25:49', '17:25:53', 'Ringing...', '2020-04-09'),
(600, 27, 2, 0, 0, '2', '2020-04-09', '17:25:56', '17:26:24', '00:25', '2020-04-09'),
(601, 11, 4, 0, 0, '2', '2020-04-09', '17:45:54', '17:46:51', '00:35', '2020-04-09'),
(602, 11, 4, 0, 0, '2', '2020-04-09', '17:46:15', '17:46:54', 'Rejected', '2020-04-09'),
(603, 11, 4, 0, 0, '2', '2020-04-09', '17:47:00', '17:47:18', '00:09', '2020-04-09'),
(604, 11, 4, 0, 0, '2', '2020-04-09', '17:47:07', '17:47:22', 'Rejected', '2020-04-09'),
(605, 11, 4, 0, 0, '2', '2020-04-09', '18:14:40', '18:14:51', 'Rejected', '2020-04-09'),
(606, 11, 4, 0, 0, '2', '2020-04-09', '18:15:08', '18:15:16', 'Rejected', '2020-04-09'),
(607, 11, 4, 0, 0, '2', '2020-04-09', '18:15:33', '18:15:42', 'Rejected', '2020-04-09'),
(608, 11, 4, 0, 0, '2', '2020-04-09', '19:05:43', '19:06:26', 'Ringing...', '2020-04-09'),
(609, 11, 4, 0, 0, '2', '2020-04-09', '19:06:31', '19:06:59', '00:16', '2020-04-09'),
(610, 11, 4, 0, 0, '2', '2020-04-09', '19:06:40', '19:07:03', 'Rejected', '2020-04-09'),
(611, 11, 4, 0, 0, '2', '2020-04-09', '19:16:13', '19:16:46', '00:16', '2020-04-09'),
(612, 11, 4, 0, 0, '2', '2020-04-09', '19:16:28', '19:16:55', 'Rejected', '2020-04-09'),
(613, 40, 2, 0, 0, '2', '2020-04-09', '21:23:57', '00:00:00', '', '2020-04-09'),
(614, 40, 2, 0, 0, '2', '2020-04-09', '21:24:25', '21:24:57', '00:29', '2020-04-09'),
(615, 40, 2, 0, 0, '2', '2020-04-09', '21:24:59', '21:25:40', 'Ringing...', '2020-04-09'),
(616, 40, 2, 0, 0, '2', '2020-04-09', '21:25:10', '21:26:43', '01:31', '2020-04-09'),
(617, 40, 2, 0, 0, '2', '2020-04-09', '21:25:46', '21:26:24', 'Ringing...', '2020-04-09'),
(618, 40, 2, 0, 0, '2', '2020-04-09', '21:25:52', '21:26:39', '00:44', '2020-04-09'),
(619, 40, 2, 0, 0, '2', '2020-04-09', '21:27:46', '00:00:00', '', '2020-04-09'),
(620, 40, 2, 0, 0, '2', '2020-04-09', '21:28:04', '21:28:24', '00:18', '2020-04-09'),
(621, 40, 2, 0, 0, '2', '2020-04-09', '21:31:05', '00:00:00', '', '2020-04-09'),
(622, 40, 2, 0, 0, '2', '2020-04-09', '21:32:34', '21:32:44', '00:08', '2020-04-09'),
(623, 19, 3, 0, 0, '2', '2020-04-09', '22:48:27', '22:49:05', 'Ringing...', '2020-04-09'),
(624, 19, 3, 0, 0, '2', '2020-04-09', '22:49:13', '22:50:45', '01:09', '2020-04-09'),
(625, 19, 3, 0, 0, '2', '2020-04-09', '22:49:33', '00:00:00', '', '2020-04-09'),
(626, 19, 1, 0, 0, '2', '2020-04-09', '22:53:40', '00:00:00', '', '2020-04-09'),
(627, 19, 1, 0, 0, '2', '2020-04-09', '22:53:54', '22:55:03', '01:05', '2020-04-09'),
(628, 19, 1, 0, 0, '2', '2020-04-09', '22:56:21', '00:00:00', '', '2020-04-09'),
(629, 19, 1, 0, 0, '2', '2020-04-09', '22:56:51', '22:57:28', '00:34', '2020-04-09'),
(630, 19, 1, 0, 0, '2', '2020-04-09', '22:57:33', '00:00:00', '', '2020-04-09'),
(631, 19, 1, 0, 0, '2', '2020-04-09', '22:57:42', '22:58:42', '00:56', '2020-04-09'),
(632, 19, 1, 0, 0, '2', '2020-04-09', '22:58:55', '22:59:30', 'Rejected', '2020-04-09'),
(633, 19, 1, 0, 0, '2', '2020-04-09', '22:59:05', '22:59:28', '00:19', '2020-04-09'),
(634, 19, 1, 0, 0, '2', '2020-04-09', '22:59:39', '22:59:55', '00:06', '2020-04-09'),
(635, 19, 1, 0, 0, '2', '2020-04-09', '22:59:48', '22:59:59', 'Rejected', '2020-04-09'),
(636, 29, 2, 0, 0, '2', '2020-04-09', '23:55:06', '00:02:47', 'Rejected', '2020-04-09'),
(637, 29, 2, 0, 0, '2', '2020-04-09', '23:55:22', '00:02:43', '07:18', '2020-04-09'),
(638, 29, 2, 0, 0, '2', '2020-04-09', '00:02:52', '00:13:28', '10:28', '2020-04-10'),
(639, 29, 2, 0, 0, '2', '2020-04-09', '00:02:59', '00:13:30', '10:27', '2020-04-10'),
(640, 25, 2, 0, 0, '2', '2020-04-09', '00:04:30', '00:05:03', 'Ringing...', '2020-04-10'),
(641, 29, 2, 0, 0, '2', '2020-04-09', '00:13:34', '00:16:29', '02:47', '2020-04-10'),
(642, 29, 2, 0, 0, '2', '2020-04-09', '00:13:42', '00:16:33', 'Rejected', '2020-04-10'),
(643, 29, 2, 0, 0, '2', '2020-04-09', '00:16:34', '00:18:19', 'Rejected', '2020-04-10'),
(644, 29, 2, 0, 0, '2', '2020-04-09', '00:16:43', '00:18:16', 'Rejected', '2020-04-10'),
(645, 25, 2, 0, 0, '2', '2020-04-09', '00:18:01', '00:18:12', 'Ringing...', '2020-04-10'),
(646, 29, 2, 0, 0, '2', '2020-04-09', '00:18:24', '00:19:17', 'Rejected', '2020-04-10'),
(647, 29, 2, 0, 0, '2', '2020-04-09', '00:18:30', '00:19:14', 'Rejected', '2020-04-10'),
(648, 25, 2, 0, 0, '2', '2020-04-09', '00:18:46', '00:19:11', 'Rejected', '2020-04-10'),
(649, 29, 2, 0, 0, '2', '2020-04-09', '00:19:21', '00:24:26', '04:56', '2020-04-10'),
(650, 29, 2, 0, 0, '2', '2020-04-09', '00:19:28', '00:00:00', '', '2020-04-10'),
(651, 29, 2, 0, 0, '2', '2020-04-09', '00:24:31', '00:24:52', 'Ringing...', '2020-04-10'),
(652, 29, 2, 0, 0, '2', '2020-04-09', '00:24:58', '00:00:00', '', '2020-04-10'),
(653, 29, 2, 0, 0, '2', '2020-04-09', '00:29:22', '00:29:47', '00:21', '2020-04-10'),
(654, 25, 2, 0, 0, '2', '2020-04-09', '00:32:50', '00:33:52', 'Rejected', '2020-04-10'),
(655, 25, 2, 0, 0, '2', '2020-04-09', '00:32:59', '00:33:49', '00:46', '2020-04-10'),
(656, 25, 2, 0, 0, '2', '2020-04-09', '00:34:04', '00:34:33', 'Ringing...', '2020-04-10'),
(657, 25, 2, 0, 0, '2', '2020-04-09', '00:34:38', '00:36:11', '01:23', '2020-04-10'),
(658, 25, 2, 0, 0, '2', '2020-04-09', '00:34:46', '00:00:00', '', '2020-04-10'),
(659, 25, 2, 0, 0, '2', '2020-04-09', '00:36:22', '00:37:22', 'Ringing...', '2020-04-10'),
(660, 25, 2, 0, 0, '2', '2020-04-09', '00:38:33', '00:40:57', '02:14', '2020-04-10'),
(661, 25, 2, 0, 0, '2', '2020-04-09', '00:38:43', '00:41:00', 'Rejected', '2020-04-10'),
(662, 25, 2, 0, 0, '2', '2020-04-09', '00:41:21', '00:41:57', 'Rejected', '2020-04-10'),
(663, 25, 2, 0, 0, '2', '2020-04-09', '00:41:32', '00:41:55', '00:20', '2020-04-10'),
(664, 25, 2, 0, 0, '2', '2020-04-09', '00:42:29', '00:43:03', 'Ringing...', '2020-04-10'),
(665, 25, 2, 0, 0, '2', '2020-04-09', '00:43:07', '00:43:51', '00:32', '2020-04-10'),
(666, 25, 2, 0, 0, '2', '2020-04-09', '00:43:19', '00:43:54', 'Rejected', '2020-04-10'),
(667, 11, 4, 0, 0, '2', '2020-04-09', '10:08:35', '10:09:37', 'Rejected', '2020-04-10'),
(668, 11, 4, 0, 0, '2', '2020-04-09', '10:08:45', '10:09:31', '00:38', '2020-04-10'),
(669, 11, 4, 0, 0, '2', '2020-04-09', '10:10:36', '10:11:12', '00:23', '2020-04-10'),
(670, 11, 4, 0, 0, '2', '2020-04-09', '10:10:47', '10:11:17', 'Rejected', '2020-04-10'),
(671, 25, 2, 0, 0, '2', '2020-04-09', '10:20:13', '00:00:00', '', '2020-04-10'),
(672, 25, 2, 0, 0, '2', '2020-04-09', '10:26:41', '10:27:07', '00:24', '2020-04-10'),
(673, 25, 2, 0, 0, '2', '2020-04-09', '10:27:56', '10:45:17', '17:13', '2020-04-10'),
(674, 25, 2, 0, 0, '2', '2020-04-09', '10:28:04', '10:45:19', '17:12', '2020-04-10'),
(675, 11, 4, 0, 0, '2', '2020-04-10', '10:34:28', '10:35:06', '00:27', '2020-04-10'),
(676, 11, 4, 0, 0, '2', '2020-04-10', '10:34:38', '10:35:13', 'Rejected', '2020-04-10'),
(677, 11, 4, 0, 0, '2', '2020-04-10', '10:39:37', '10:40:19', '00:24', '2020-04-10'),
(678, 11, 4, 0, 0, '2', '2020-04-10', '10:39:52', '10:42:04', 'Rejected', '2020-04-10'),
(679, 11, 4, 0, 0, '2', '2020-04-10', '10:41:15', '10:41:45', 'Rejected', '2020-04-10'),
(680, 11, 4, 0, 0, '2', '2020-04-10', '10:43:02', '10:44:18', 'Ringing...', '2020-04-10'),
(681, 11, 4, 0, 0, '2', '2020-04-10', '10:43:02', '10:43:44', '00:34', '2020-04-10'),
(682, 11, 4, 0, 0, '2', '2020-04-10', '10:43:10', '10:43:49', 'Rejected', '2020-04-10'),
(683, 11, 4, 0, 0, '2', '2020-04-10', '10:44:37', '10:45:07', '00:17', '2020-04-10'),
(684, 11, 4, 0, 0, '2', '2020-04-10', '10:44:48', '10:45:13', 'Rejected', '2020-04-10'),
(685, 11, 4, 0, 0, '2', '2020-04-10', '10:46:37', '10:47:23', '00:31', '2020-04-10'),
(686, 11, 4, 0, 0, '2', '2020-04-10', '10:46:49', '10:47:28', 'Rejected', '2020-04-10'),
(687, 41, 1, 0, 0, '2', '2020-04-10', '10:47:22', '00:00:00', '', '2020-04-10'),
(688, 11, 4, 0, 0, '2', '2020-04-10', '10:51:20', '10:52:01', '00:27', '2020-04-10'),
(689, 11, 4, 0, 0, '2', '2020-04-10', '10:51:33', '10:52:08', 'Rejected', '2020-04-10'),
(690, 11, 4, 0, 0, '2', '2020-04-10', '10:53:23', '10:55:22', '01:42', '2020-04-10'),
(691, 11, 4, 0, 0, '2', '2020-04-10', '10:53:38', '10:55:25', 'Rejected', '2020-04-10'),
(692, 11, 4, 0, 0, '2', '2020-04-10', '10:55:34', '10:57:29', '01:47', '2020-04-10'),
(693, 11, 4, 0, 0, '2', '2020-04-10', '10:55:42', '10:57:32', 'Rejected', '2020-04-10'),
(694, 11, 4, 0, 0, '2', '2020-04-10', '10:59:17', '10:59:58', '00:31', '2020-04-10'),
(695, 11, 4, 0, 0, '2', '2020-04-10', '10:59:26', '11:00:02', 'Rejected', '2020-04-10'),
(696, 11, 4, 0, 0, '2', '2020-04-10', '11:00:21', '11:00:47', 'Rejected', '2020-04-10'),
(697, 11, 4, 0, 0, '2', '2020-04-10', '11:00:35', '11:00:44', '00:06', '2020-04-10'),
(698, 31, 3, 0, 0, '2', '2020-04-10', '11:01:34', '11:02:31', 'Ringing...', '2020-04-10'),
(699, 31, 3, 0, 0, '2', '2020-04-10', '11:02:47', '11:03:59', 'Ringing...', '2020-04-10'),
(700, 11, 4, 0, 0, '2', '2020-04-10', '11:03:30', '11:04:02', '00:21', '2020-04-10'),
(701, 11, 4, 0, 0, '2', '2020-04-10', '11:03:40', '11:04:07', 'Rejected', '2020-04-10'),
(702, 11, 4, 0, 0, '2', '2020-04-10', '11:04:42', '11:05:08', '00:16', '2020-04-10'),
(703, 11, 4, 0, 0, '2', '2020-04-10', '11:04:52', '11:05:11', 'Rejected', '2020-04-10'),
(704, 31, 3, 0, 0, '2', '2020-04-10', '11:05:24', '00:00:00', '', '2020-04-10'),
(705, 31, 3, 0, 0, '2', '2020-04-10', '11:05:40', '11:08:11', '02:28', '2020-04-10'),
(706, 11, 4, 0, 0, '2', '2020-04-10', '11:06:53', '11:07:45', 'Rejected', '2020-04-10'),
(707, 11, 4, 0, 0, '2', '2020-04-10', '11:07:03', '11:07:42', '00:36', '2020-04-10'),
(708, 11, 4, 0, 0, '2', '2020-04-10', '11:09:45', '11:10:08', '00:15', '2020-04-10'),
(709, 31, 3, 0, 0, '2', '2020-04-10', '11:09:48', '00:00:00', '', '2020-04-10'),
(710, 11, 4, 0, 0, '2', '2020-04-10', '11:09:52', '11:10:17', 'Rejected', '2020-04-10'),
(711, 31, 3, 0, 0, '2', '2020-04-10', '11:09:55', '11:10:58', '01:00', '2020-04-10'),
(712, 11, 4, 0, 0, '2', '2020-04-10', '11:11:59', '11:12:26', '00:19', '2020-04-10'),
(713, 11, 4, 0, 0, '2', '2020-04-10', '11:12:07', '11:12:54', '00:35', '2020-04-10'),
(714, 31, 3, 0, 0, '2', '2020-04-10', '11:16:08', '00:00:00', '', '2020-04-10'),
(715, 31, 3, 0, 0, '2', '2020-04-10', '11:16:29', '11:17:17', '00:44', '2020-04-10'),
(716, 31, 3, 0, 0, '2', '2020-04-10', '11:19:41', '11:20:28', 'Ringing...', '2020-04-10'),
(717, 31, 3, 0, 0, '2', '2020-04-10', '11:20:33', '11:20:56', 'Ringing...', '2020-04-10'),
(718, 31, 3, 0, 0, '2', '2020-04-10', '11:21:38', '11:21:53', 'Ringing...', '2020-04-10'),
(719, 31, 3, 0, 0, '2', '2020-04-10', '11:25:25', '00:00:00', '', '2020-04-10'),
(720, 25, 2, 0, 0, '2', '2020-04-10', '11:25:31', '11:26:04', 'Ringing...', '2020-04-10'),
(721, 31, 3, 0, 0, '2', '2020-04-10', '11:26:03', '11:26:38', 'Ringing...', '2020-04-10'),
(722, 31, 3, 0, 0, '2', '2020-04-10', '11:30:16', '00:00:00', '', '2020-04-10'),
(723, 11, 4, 0, 0, '2', '2020-04-10', '11:32:10', '11:32:33', '00:15', '2020-04-10'),
(724, 11, 4, 0, 0, '2', '2020-04-10', '11:32:18', '11:32:47', 'Rejected', '2020-04-10'),
(725, 31, 3, 0, 0, '2', '2020-04-10', '11:34:51', '11:35:14', 'Ringing...', '2020-04-10'),
(726, 11, 4, 0, 0, '2', '2020-04-10', '11:36:23', '11:37:00', '00:24', '2020-04-10'),
(727, 11, 4, 0, 0, '2', '2020-04-10', '11:36:35', '11:37:05', '00:25', '2020-04-10'),
(728, 11, 4, 0, 0, '2', '2020-04-10', '11:37:54', '00:00:00', '', '2020-04-10'),
(729, 11, 4, 0, 0, '2', '2020-04-10', '11:38:04', '11:39:00', '00:51', '2020-04-10'),
(730, 11, 4, 0, 0, '2', '2020-04-10', '11:38:58', '11:39:04', 'Ringing...', '2020-04-10'),
(731, 11, 4, 0, 0, '2', '2020-04-10', '11:39:14', '00:00:00', '', '2020-04-10'),
(732, 11, 4, 0, 0, '2', '2020-04-10', '11:39:24', '11:40:45', '01:19', '2020-04-10'),
(733, 11, 4, 0, 0, '2', '2020-04-10', '11:40:44', '11:41:24', '00:21', '2020-04-10'),
(734, 11, 4, 0, 0, '2', '2020-04-10', '11:40:55', '11:42:15', '01:15', '2020-04-10'),
(735, 11, 4, 0, 0, '2', '2020-04-10', '11:43:59', '11:44:16', 'Ringing...', '2020-04-10'),
(736, 11, 4, 0, 0, '2', '2020-04-10', '11:44:33', '11:44:45', 'Ringing...', '2020-04-10'),
(737, 11, 4, 0, 0, '2', '2020-04-10', '11:44:54', '11:45:09', 'Ringing...', '2020-04-10'),
(738, 11, 4, 0, 0, '2', '2020-04-10', '11:45:39', '00:00:00', '', '2020-04-10'),
(739, 11, 4, 0, 0, '2', '2020-04-10', '11:45:48', '00:00:00', '', '2020-04-10'),
(740, 11, 4, 0, 0, '2', '2020-04-10', '11:46:30', '11:48:08', 'Ringing...', '2020-04-10'),
(741, 11, 4, 0, 0, '2', '2020-04-10', '12:02:23', '12:02:48', 'Ringing...', '2020-04-10'),
(742, 11, 4, 0, 0, '2', '2020-04-10', '12:03:15', '12:03:27', 'Ringing...', '2020-04-10'),
(743, 11, 4, 0, 0, '2', '2020-04-10', '12:04:05', '12:04:27', 'Ringing...', '2020-04-10'),
(744, 11, 4, 0, 0, '2', '2020-04-10', '12:07:45', '12:08:06', 'Ringing...', '2020-04-10'),
(745, 11, 4, 0, 0, '2', '2020-04-10', '12:10:30', '00:00:00', '', '2020-04-10'),
(746, 11, 4, 0, 0, '2', '2020-04-10', '12:10:41', '00:00:00', '', '2020-04-10'),
(747, 11, 4, 0, 0, '2', '2020-04-10', '12:11:46', '00:00:00', '', '2020-04-10'),
(748, 11, 4, 0, 0, '2', '2020-04-10', '12:18:41', '00:00:00', '', '2020-04-10'),
(749, 11, 4, 0, 0, '2', '2020-04-10', '12:22:09', '00:00:00', '', '2020-04-10'),
(750, 11, 4, 0, 0, '2', '2020-04-10', '12:23:16', '12:23:55', 'Ringing...', '2020-04-10'),
(751, 11, 4, 0, 0, '2', '2020-04-10', '12:24:51', '00:00:00', '', '2020-04-10'),
(752, 11, 4, 0, 0, '2', '2020-04-10', '12:25:47', '00:00:00', '', '2020-04-10'),
(753, 11, 4, 0, 0, '2', '2020-04-10', '12:27:33', '12:27:40', 'Ringing...', '2020-04-10'),
(754, 11, 4, 0, 0, '2', '2020-04-10', '12:28:55', '12:29:40', 'Ringing...', '2020-04-10'),
(755, 41, 1, 0, 0, '2', '2020-04-10', '12:29:11', '12:30:08', 'Ringing...', '2020-04-10'),
(756, 11, 4, 0, 0, '2', '2020-04-10', '12:29:21', '12:29:44', '00:20', '2020-04-10'),
(757, 11, 4, 0, 0, '2', '2020-04-10', '12:29:46', '12:30:16', 'Ringing...', '2020-04-10'),
(758, 11, 4, 0, 0, '2', '2020-04-10', '12:29:59', '12:30:20', '00:19', '2020-04-10'),
(759, 41, 1, 0, 0, '2', '2020-04-10', '12:31:21', '12:31:43', 'Ringing...', '2020-04-10'),
(760, 41, 1, 0, 0, '2', '2020-04-10', '12:45:51', '12:46:17', 'Ringing...', '2020-04-10'),
(761, 42, 2, 0, 0, '2', '2020-04-10', '10:18:09', '10:19:01', 'Ringing...', '2020-04-10'),
(762, 31, 3, 0, 0, '2', '2020-04-10', '13:02:16', '00:00:00', '', '2020-04-10'),
(763, 31, 3, 0, 0, '2', '2020-04-10', '13:02:25', '13:04:41', '02:13', '2020-04-10'),
(764, 31, 3, 0, 0, '2', '2020-04-10', '13:06:13', '13:06:20', 'Ringing...', '2020-04-10'),
(765, 31, 3, 0, 0, '2', '2020-04-10', '13:06:23', '13:06:29', 'Rejected', '2020-04-10'),
(766, 42, 2, 0, 0, '2', '2020-04-10', '10:37:22', '10:38:09', '00:30', '2020-04-10'),
(767, 42, 3, 0, 0, '2', '2020-04-10', '13:07:38', '13:08:13', 'Rejected', '2020-04-10'),
(768, 31, 3, 0, 0, '2', '2020-04-10', '13:07:40', '13:07:49', 'Rejected', '2020-04-10'),
(769, 31, 3, 0, 0, '2', '2020-04-10', '13:07:59', '13:08:19', 'Rejected', '2020-04-10'),
(770, 31, 3, 0, 0, '2', '2020-04-10', '13:08:29', '13:08:58', '00:15', '2020-04-10'),
(771, 31, 3, 0, 0, '2', '2020-04-10', '13:08:41', '13:09:16', '00:33', '2020-04-10'),
(772, 31, 3, 0, 0, '2', '2020-04-10', '13:09:30', '00:00:00', '', '2020-04-10'),
(773, 31, 3, 0, 0, '2', '2020-04-10', '13:09:41', '13:10:05', '00:22', '2020-04-10'),
(774, 31, 3, 0, 0, '2', '2020-04-10', '13:11:17', '13:11:44', 'Rejected', '2020-04-10'),
(775, 31, 3, 0, 0, '2', '2020-04-10', '13:11:28', '13:11:41', '00:11', '2020-04-10'),
(776, 31, 3, 0, 0, '2', '2020-04-10', '13:11:51', '13:12:07', 'Ringing...', '2020-04-10'),
(777, 31, 2, 0, 0, '2', '2020-04-10', '13:12:42', '00:00:00', '', '2020-04-10'),
(778, 31, 2, 0, 0, '2', '2020-04-10', '13:13:11', '00:00:00', '', '2020-04-10'),
(779, 31, 2, 0, 0, '2', '2020-04-10', '13:13:23', '00:00:00', '', '2020-04-10'),
(780, 31, 2, 0, 0, '2', '2020-04-10', '13:13:52', '13:14:13', 'Ringing...', '2020-04-10'),
(781, 31, 2, 0, 0, '2', '2020-04-10', '13:16:14', '00:00:00', '', '2020-04-10'),
(782, 31, 2, 0, 0, '2', '2020-04-10', '13:16:22', '13:16:48', '00:03', '2020-04-10'),
(783, 31, 2, 0, 0, '2', '2020-04-10', '13:16:25', '13:16:43', '00:15', '2020-04-10'),
(784, 31, 2, 0, 0, '2', '2020-04-10', '13:17:25', '13:19:03', '01:15', '2020-04-10'),
(785, 41, 1, 0, 0, '2', '2020-04-10', '13:17:29', '13:18:01', 'Ringing...', '2020-04-10'),
(786, 31, 2, 0, 0, '2', '2020-04-10', '13:17:39', '13:19:18', '01:36', '2020-04-10'),
(787, 41, 2, 0, 0, '2', '2020-04-10', '13:21:30', '13:33:33', '11:53', '2020-04-10'),
(788, 41, 2, 0, 0, '2', '2020-04-10', '13:21:42', '00:00:00', '', '2020-04-10'),
(789, 41, 1, 0, 0, '2', '2020-04-10', '13:33:48', '13:34:09', 'Ringing...', '2020-04-10'),
(790, 41, 2, 0, 0, '2', '2020-04-10', '13:34:14', '13:49:46', '15:21', '2020-04-10'),
(791, 41, 2, 0, 0, '2', '2020-04-10', '13:34:27', '13:49:52', 'Rejected', '2020-04-10'),
(792, 11, 4, 0, 0, '2', '2020-04-10', '13:47:25', '13:47:43', 'Ringing...', '2020-04-10'),
(793, 11, 4, 0, 0, '2', '2020-04-10', '13:47:59', '13:48:20', 'Ringing...', '2020-04-10'),
(794, 11, 4, 0, 0, '2', '2020-04-10', '13:49:41', '13:50:20', 'Ringing...', '2020-04-10'),
(795, 41, 2, 0, 0, '2', '2020-04-10', '13:49:58', '13:55:37', '05:30', '2020-04-10'),
(796, 41, 2, 0, 0, '2', '2020-04-10', '13:50:09', '13:55:37', '05:25', '2020-04-10'),
(797, 11, 4, 0, 0, '2', '2020-04-10', '13:50:29', '00:00:00', '', '2020-04-10'),
(798, 11, 4, 0, 0, '2', '2020-04-10', '13:50:37', '13:58:51', '08:10', '2020-04-10'),
(799, 41, 2, 0, 0, '2', '2020-04-10', '13:55:43', '14:08:19', '12:24', '2020-04-10'),
(800, 41, 2, 0, 0, '2', '2020-04-10', '13:55:56', '14:08:22', '12:22', '2020-04-10'),
(801, 11, 4, 0, 0, '2', '2020-04-10', '14:01:41', '14:02:18', '00:27', '2020-04-10'),
(802, 11, 4, 0, 0, '2', '2020-04-10', '14:01:49', '14:02:25', '00:33', '2020-04-10'),
(803, 11, 4, 0, 0, '2', '2020-04-10', '14:20:18', '14:21:05', '00:34', '2020-04-10'),
(804, 11, 4, 0, 0, '2', '2020-04-10', '14:20:30', '14:21:02', '00:29', '2020-04-10'),
(805, 42, 2, 0, 0, '2', '2020-04-10', '12:03:26', '12:05:53', '02:12', '2020-04-10'),
(806, 42, 2, 0, 0, '2', '2020-04-10', '14:33:39', '14:35:50', '02:07', '2020-04-10'),
(807, 42, 2, 0, 0, '2', '2020-04-10', '12:06:29', '12:06:52', 'Ringing...', '2020-04-10'),
(808, 11, 4, 0, 0, '2', '2020-04-10', '14:48:02', '00:00:00', '', '2020-04-10'),
(809, 43, 2, 0, 0, '2', '2020-04-10', '14:49:11', '00:00:00', '', '2020-04-10'),
(810, 43, 2, 0, 0, '2', '2020-04-10', '14:49:19', '14:53:19', '03:56', '2020-04-10'),
(811, 11, 4, 0, 0, '2', '2020-04-10', '14:55:09', '00:00:00', '', '2020-04-10'),
(812, 11, 4, 0, 0, '2', '2020-04-10', '14:55:21', '14:59:56', '04:27', '2020-04-10'),
(813, 42, 2, 0, 0, '2', '2020-04-10', '12:28:29', '12:28:37', 'Rejected', '2020-04-10'),
(814, 44, 2, 0, 0, '2', '2020-04-10', '15:46:51', '15:48:21', '01:21', '2020-04-10'),
(815, 44, 2, 0, 0, '2', '2020-04-10', '15:46:59', '15:48:22', '01:20', '2020-04-10'),
(816, 44, 2, 0, 0, '2', '2020-04-10', '15:48:33', '15:49:49', '01:09', '2020-04-10'),
(817, 44, 2, 0, 0, '2', '2020-04-10', '15:48:41', '15:49:49', '01:05', '2020-04-10'),
(818, 45, 2, 0, 0, '2', '2020-04-10', '16:21:05', '16:21:22', 'Rejected', '2020-04-10'),
(819, 45, 2, 0, 0, '2', '2020-04-10', '16:21:12', '16:21:19', '00:04', '2020-04-10'),
(820, 45, 2, 0, 0, '2', '2020-04-10', '16:21:43', '00:00:00', '', '2020-04-10'),
(821, 45, 2, 0, 0, '2', '2020-04-10', '16:21:50', '16:31:05', '09:12', '2020-04-10'),
(822, 47, 4, 0, 0, '2', '2020-04-10', '16:41:13', '16:42:08', '00:44', '2020-04-10'),
(823, 47, 4, 0, 0, '2', '2020-04-10', '16:42:03', '16:42:43', '00:37', '2020-04-10'),
(824, 48, 2, 0, 0, '2', '2020-04-10', '16:42:24', '16:43:14', '00:32', '2020-04-10'),
(825, 11, 4, 0, 0, '2', '2020-04-10', '16:42:33', '16:42:38', 'Ringing...', '2020-04-10'),
(826, 48, 2, 0, 0, '2', '2020-04-10', '16:42:40', '16:43:15', '00:32', '2020-04-10'),
(827, 35, 2, 0, 0, '2', '2020-04-10', '16:43:55', '16:50:40', '06:35', '2020-04-10'),
(828, 35, 2, 0, 0, '2', '2020-04-10', '16:44:02', '00:00:00', '', '2020-04-10'),
(829, 35, 2, 0, 0, '2', '2020-04-10', '16:51:52', '16:52:29', 'Ringing...', '2020-04-10'),
(830, 47, 4, 0, 0, '2', '2020-04-10', '16:52:03', '16:52:45', '00:29', '2020-04-10'),
(831, 47, 4, 0, 0, '2', '2020-04-10', '16:52:13', '16:52:50', '00:31', '2020-04-10'),
(832, 35, 2, 0, 0, '2', '2020-04-10', '16:52:53', '16:53:17', '00:21', '2020-04-10'),
(833, 35, 2, 0, 0, '2', '2020-04-10', '16:54:06', '16:55:48', '01:15', '2020-04-10'),
(834, 35, 2, 0, 0, '2', '2020-04-10', '16:54:31', '00:00:00', '', '2020-04-10'),
(835, 35, 1, 0, 0, '2', '2020-04-10', '16:55:53', '16:56:27', 'Ringing...', '2020-04-10'),
(836, 35, 2, 0, 0, '2', '2020-04-10', '16:56:47', '17:12:18', '15:22', '2020-04-10'),
(837, 35, 2, 0, 0, '2', '2020-04-10', '16:56:54', '17:12:15', '15:18', '2020-04-10'),
(838, 47, 4, 0, 0, '2', '2020-04-10', '17:00:05', '00:00:00', '', '2020-04-10'),
(839, 47, 4, 0, 0, '2', '2020-04-10', '17:00:30', '17:01:54', '01:18', '2020-04-10'),
(840, 11, 4, 0, 0, '2', '2020-04-10', '17:01:07', '17:01:15', 'Ringing...', '2020-04-10'),
(841, 11, 4, 0, 0, '2', '2020-04-10', '17:01:23', '17:01:29', 'Ringing...', '2020-04-10'),
(842, 47, 4, 0, 0, '2', '2020-04-10', '17:01:41', '17:01:47', 'Ringing...', '2020-04-10'),
(843, 47, 4, 0, 0, '2', '2020-04-10', '17:02:14', '17:03:33', '00.00', '2020-04-10'),
(844, 47, 4, 0, 0, '2', '2020-04-10', '17:02:25', '17:03:38', '01:07', '2020-04-10'),
(845, 11, 4, 0, 0, '2', '2020-04-10', '17:03:09', '17:03:13', 'Ringing...', '2020-04-10'),
(846, 47, 4, 0, 0, '2', '2020-04-10', '17:04:06', '17:05:25', '00.00', '2020-04-10'),
(847, 47, 4, 0, 0, '2', '2020-04-10', '17:04:15', '17:05:33', '01:16', '2020-04-10'),
(848, 47, 4, 0, 0, '2', '2020-04-10', '17:18:52', '17:19:31', '00:28', '2020-04-10'),
(849, 47, 4, 0, 0, '2', '2020-04-10', '17:19:01', '17:19:35', '00:31', '2020-04-10'),
(850, 40, 2, 0, 0, '2', '2020-04-10', '17:29:46', '17:30:14', 'Ringing...', '2020-04-10'),
(851, 40, 1, 0, 0, '2', '2020-04-10', '17:30:28', '17:30:41', 'Ringing...', '2020-04-10'),
(852, 37, 3, 0, 0, '2', '2020-04-10', '17:37:44', '17:42:32', '04:36', '2020-04-10'),
(853, 37, 3, 0, 0, '2', '2020-04-10', '17:34:36', '17:39:17', 'Rejected', '2020-04-10'),
(854, 47, 4, 0, 0, '2', '2020-04-10', '17:37:12', '17:37:34', '00:13', '2020-04-10'),
(855, 47, 4, 0, 0, '2', '2020-04-10', '17:37:21', '17:37:31', '00:07', '2020-04-10'),
(856, 37, 3, 0, 0, '2', '2020-04-10', '17:43:01', '18:17:22', '34:04', '2020-04-10'),
(857, 37, 3, 0, 0, '2', '2020-04-10', '17:39:59', '00:00:00', '', '2020-04-10'),
(858, 47, 4, 0, 0, '2', '2020-04-10', '17:40:30', '17:41:18', '00:36', '2020-04-10'),
(859, 47, 4, 0, 0, '2', '2020-04-10', '17:40:41', '17:41:15', '00:31', '2020-04-10'),
(860, 11, 4, 0, 0, '2', '2020-04-10', '17:40:50', '17:41:11', 'Ringing...', '2020-04-10'),
(861, 47, 4, 0, 0, '2', '2020-04-10', '17:41:30', '17:45:24', '00.00', '2020-04-10'),
(862, 47, 4, 0, 0, '2', '2020-04-10', '17:41:41', '17:45:27', '03:43', '2020-04-10'),
(863, 11, 4, 0, 0, '2', '2020-04-10', '17:41:57', '17:42:01', 'Ringing...', '2020-04-10'),
(864, 11, 4, 0, 0, '2', '2020-04-10', '17:45:13', '17:45:29', 'Ringing...', '2020-04-10'),
(865, 47, 4, 0, 0, '2', '2020-04-10', '17:45:53', '17:47:19', '01:18', '2020-04-10'),
(866, 47, 4, 0, 0, '2', '2020-04-10', '17:46:01', '17:47:17', '01:13', '2020-04-10'),
(867, 11, 4, 0, 0, '2', '2020-04-10', '17:46:18', '17:46:22', 'Ringing...', '2020-04-10'),
(868, 11, 4, 0, 0, '2', '2020-04-10', '17:46:41', '17:46:45', 'Ringing...', '2020-04-10'),
(869, 11, 4, 0, 0, '2', '2020-04-10', '17:47:00', '17:47:04', 'Ringing...', '2020-04-10'),
(870, 11, 4, 0, 0, '2', '2020-04-10', '17:47:10', '17:47:14', '00.00', '2020-04-10'),
(871, 47, 4, 0, 0, '2', '2020-04-10', '18:01:19', '00:00:00', '', '2020-04-10'),
(872, 47, 4, 0, 0, '2', '2020-04-10', '18:01:36', '00:00:00', '', '2020-04-10'),
(873, 40, 2, 0, 0, '2', '2020-04-10', '18:03:39', '18:06:38', '02:29', '2020-04-10'),
(874, 40, 2, 0, 0, '2', '2020-04-10', '18:04:08', '18:06:40', '02:29', '2020-04-10'),
(875, 40, 2, 0, 0, '2', '2020-04-10', '18:06:58', '18:08:14', 'Rejected', '2020-04-10'),
(876, 47, 4, 0, 0, '2', '2020-04-10', '18:07:03', '00:00:00', '', '2020-04-10'),
(877, 40, 2, 0, 0, '2', '2020-04-10', '18:07:07', '18:08:12', '01:02', '2020-04-10'),
(878, 47, 4, 0, 0, '2', '2020-04-10', '18:07:12', '00:00:00', '', '2020-04-10'),
(879, 11, 4, 0, 0, '2', '2020-04-10', '18:07:29', '00:00:00', '', '2020-04-10'),
(880, 11, 4, 0, 0, '2', '2020-04-10', '18:07:53', '00:00:00', '', '2020-04-10'),
(881, 40, 2, 0, 0, '2', '2020-04-10', '18:08:22', '18:12:55', 'Rejected', '2020-04-10'),
(882, 40, 2, 0, 0, '2', '2020-04-10', '18:08:37', '18:12:52', '04:12', '2020-04-10'),
(883, 11, 4, 0, 0, '2', '2020-04-10', '18:08:43', '00:00:00', '', '2020-04-10'),
(884, 11, 4, 0, 0, '2', '2020-04-10', '18:13:27', '00:00:00', '', '2020-04-10'),
(885, 11, 4, 0, 0, '2', '2020-04-10', '18:14:56', '00:00:00', '', '2020-04-10'),
(886, 31, 3, 0, 0, '2', '2020-04-10', '18:16:21', '18:16:55', 'Ringing...', '2020-04-10'),
(887, 31, 3, 0, 0, '2', '2020-04-10', '18:17:01', '00:00:00', '', '2020-04-10'),
(888, 31, 3, 0, 0, '2', '2020-04-10', '18:17:09', '18:18:51', '01:40', '2020-04-10'),
(889, 47, 4, 0, 0, '2', '2020-04-10', '18:18:04', '00:00:00', '', '2020-04-10'),
(890, 47, 4, 0, 0, '2', '2020-04-10', '18:18:13', '00:00:00', '', '2020-04-10'),
(891, 11, 4, 0, 0, '2', '2020-04-10', '18:18:23', '00:00:00', '', '2020-04-10'),
(892, 31, 3, 0, 0, '2', '2020-04-10', '18:18:32', '18:18:47', '00:13', '2020-04-10'),
(893, 11, 4, 0, 0, '2', '2020-04-10', '18:18:32', '00:00:00', '', '2020-04-10'),
(894, 11, 4, 0, 0, '2', '2020-04-10', '18:18:40', '00:00:00', '', '2020-04-10'),
(895, 11, 4, 0, 0, '2', '2020-04-10', '18:18:48', '00:00:00', '', '2020-04-10'),
(896, 11, 4, 0, 0, '2', '2020-04-10', '18:19:08', '00:00:00', '', '2020-04-10'),
(897, 11, 4, 0, 0, '2', '2020-04-10', '18:19:17', '00:00:00', '', '2020-04-10'),
(898, 31, 3, 0, 0, '2', '2020-04-10', '18:19:26', '18:22:39', 'Rejected', '2020-04-10'),
(899, 31, 3, 0, 0, '2', '2020-04-10', '18:19:35', '18:22:35', '02:58', '2020-04-10'),
(900, 11, 4, 0, 0, '2', '2020-04-10', '18:20:25', '18:20:58', '00:24', '2020-04-10'),
(901, 11, 4, 0, 0, '2', '2020-04-10', '18:20:34', '00:00:00', '', '2020-04-10'),
(902, 11, 4, 0, 0, '2', '2020-04-10', '18:22:29', '18:25:52', '03:13', '2020-04-10'),
(903, 11, 4, 0, 0, '2', '2020-04-10', '18:22:38', '18:25:48', '03:06', '2020-04-10'),
(904, 47, 4, 0, 0, '2', '2020-04-10', '18:22:54', '00:00:00', '', '2020-04-10'),
(905, 47, 4, 0, 0, '2', '2020-04-10', '18:23:02', '00:00:00', '', '2020-04-10'),
(906, 47, 4, 0, 0, '2', '2020-04-10', '18:23:26', '00:00:00', '', '2020-04-10'),
(907, 47, 4, 0, 0, '2', '2020-04-10', '18:24:17', '00:00:00', '', '2020-04-10'),
(908, 47, 4, 0, 0, '2', '2020-04-10', '18:25:13', '00:00:00', '', '2020-04-10'),
(909, 47, 4, 0, 0, '2', '2020-04-10', '18:25:41', '00:00:00', '', '2020-04-10'),
(910, 47, 4, 0, 0, '2', '2020-04-10', '18:26:06', '00:00:00', '', '2020-04-10'),
(911, 31, 3, 0, 0, '2', '2020-04-10', '18:26:14', '18:26:55', 'Ringing...', '2020-04-10'),
(912, 47, 4, 0, 0, '2', '2020-04-10', '18:26:42', '00:00:00', '', '2020-04-10'),
(913, 47, 4, 0, 0, '2', '2020-04-10', '18:27:46', '18:28:29', 'Ringing...', '2020-04-10'),
(914, 31, 3, 0, 0, '2', '2020-04-10', '18:28:31', '00:00:00', '', '2020-04-10'),
(915, 47, 4, 0, 0, '2', '2020-04-10', '18:28:34', '00:00:00', '', '2020-04-10'),
(916, 31, 3, 0, 0, '2', '2020-04-10', '18:28:40', '18:30:53', '02:11', '2020-04-10'),
(917, 11, 4, 0, 0, '2', '2020-04-10', '18:29:32', '00:00:00', '', '2020-04-10'),
(918, 11, 4, 0, 0, '2', '2020-04-10', '18:30:46', '00:00:00', '', '2020-04-10'),
(919, 37, 3, 0, 0, '2', '2020-04-10', '18:34:13', '18:34:37', 'Ringing...', '2020-04-10'),
(920, 11, 4, 0, 0, '2', '2020-04-10', '18:31:10', '18:31:45', '00:04', '2020-04-10'),
(921, 11, 4, 0, 0, '2', '2020-04-10', '18:31:45', '18:31:51', '00:03', '2020-04-10'),
(922, 11, 4, 0, 0, '2', '2020-04-10', '18:31:59', '18:32:37', '00:30', '2020-04-10'),
(923, 11, 4, 0, 0, '2', '2020-04-10', '18:32:08', '18:32:41', '00:30', '2020-04-10'),
(924, 47, 4, 0, 0, '2', '2020-04-10', '18:32:20', '00:00:00', '', '2020-04-10'),
(925, 47, 4, 0, 0, '2', '2020-04-10', '18:32:30', '00:00:00', '', '2020-04-10'),
(926, 11, 4, 0, 0, '2', '2020-04-10', '18:33:14', '18:33:35', 'Ringing...', '2020-04-10'),
(927, 11, 4, 0, 0, '2', '2020-04-10', '18:33:22', '18:33:39', '00:14', '2020-04-10'),
(928, 11, 4, 0, 0, '2', '2020-04-10', '18:35:27', '18:35:54', '00:13', '2020-04-10'),
(929, 11, 4, 0, 0, '2', '2020-04-10', '18:35:40', '18:35:58', '00:15', '2020-04-10'),
(930, 31, 1, 0, 0, '2', '2020-04-10', '18:46:30', '18:46:51', 'Ringing...', '2020-04-10'),
(931, 31, 1, 0, 0, '2', '2020-04-10', '18:48:01', '18:49:10', 'Ringing...', '2020-04-10'),
(932, 31, 1, 0, 0, '2', '2020-04-10', '18:48:10', '18:49:11', '00:58', '2020-04-10'),
(933, 31, 1, 0, 0, '2', '2020-04-10', '18:49:19', '18:49:56', 'Ringing...', '2020-04-10'),
(934, 31, 1, 0, 0, '2', '2020-04-10', '18:49:30', '18:49:57', '00:25', '2020-04-10'),
(935, 31, 1, 0, 0, '2', '2020-04-10', '18:50:47', '18:50:51', 'Rejected', '2020-04-10'),
(936, 31, 1, 0, 0, '2', '2020-04-10', '18:51:04', '00:00:00', '', '2020-04-10'),
(937, 31, 1, 0, 0, '2', '2020-04-10', '18:51:13', '19:25:29', '34:13', '2020-04-10'),
(938, 42, 2, 0, 0, '2', '2020-04-10', '18:11:04', '18:12:03', '00:32', '2020-04-10'),
(939, 42, 2, 0, 0, '2', '2020-04-10', '20:41:31', '20:42:11', 'Rejected', '2020-04-10'),
(940, 42, 2, 0, 0, '2', '2020-04-10', '18:12:14', '00:00:00', '', '2020-04-10'),
(941, 42, 2, 0, 0, '2', '2020-04-10', '20:42:22', '21:07:04', '24:39', '2020-04-10'),
(942, 42, 2, 0, 0, '2', '2020-04-10', '18:37:18', '18:38:16', '00:48', '2020-04-10'),
(943, 42, 2, 0, 0, '2', '2020-04-10', '21:07:28', '21:08:16', '00:46', '2020-04-10'),
(944, 11, 1, 0, 0, '2', '2020-04-10', '22:21:34', '22:22:16', 'Ringing...', '2020-04-10'),
(945, 11, 1, 0, 0, '2', '2020-04-10', '22:22:57', '22:23:30', 'Ringing...', '2020-04-10'),
(946, 23, 1, 0, 0, '2', '2020-04-10', '22:28:27', '22:29:31', '00.00', '2020-04-10'),
(947, 23, 1, 0, 0, '2', '2020-04-10', '22:28:36', '22:29:53', '01:15', '2020-04-10'),
(948, 19, 1, 0, 0, '2', '2020-04-10', '22:29:36', '00:00:00', '', '2020-04-10'),
(949, 19, 1, 0, 0, '2', '2020-04-10', '22:29:47', '00:00:00', '', '2020-04-10'),
(950, 23, 1, 0, 0, '2', '2020-04-10', '22:31:07', '22:35:02', '03:46', '2020-04-10'),
(951, 23, 1, 0, 0, '2', '2020-04-10', '22:31:18', '22:35:01', '03:39', '2020-04-10'),
(952, 19, 1, 0, 0, '2', '2020-04-10', '22:32:19', '00:00:00', '', '2020-04-10'),
(953, 19, 1, 0, 0, '2', '2020-04-10', '22:33:47', '00:00:00', '', '2020-04-10'),
(954, 31, 1, 0, 0, '2', '2020-04-11', '11:15:26', '11:16:11', '00:32', '2020-04-11'),
(955, 31, 1, 0, 0, '2', '2020-04-11', '11:15:41', '11:16:15', '00:31', '2020-04-11'),
(956, 31, 1, 0, 0, '2', '2020-04-11', '11:16:16', '11:17:45', '01:21', '2020-04-11'),
(957, 31, 1, 0, 0, '2', '2020-04-11', '11:16:24', '11:17:44', '01:17', '2020-04-11'),
(958, 31, 1, 0, 0, '2', '2020-04-11', '11:19:04', '11:19:44', '00:32', '2020-04-11'),
(959, 31, 1, 0, 0, '2', '2020-04-11', '11:19:11', '11:19:49', '00:36', '2020-04-11'),
(960, 31, 1, 0, 0, '2', '2020-04-11', '11:21:42', '11:23:00', '01:10', '2020-04-11'),
(961, 31, 1, 0, 0, '2', '2020-04-11', '11:21:50', '11:23:03', '01:11', '2020-04-11'),
(962, 31, 1, 0, 0, '2', '2020-04-11', '11:23:14', '11:23:48', '00.00', '2020-04-11'),
(963, 31, 1, 0, 0, '2', '2020-04-11', '11:23:26', '11:23:50', '00:22', '2020-04-11'),
(964, 31, 1, 0, 0, '2', '2020-04-11', '11:28:07', '00:00:00', '', '2020-04-11'),
(965, 31, 1, 0, 0, '2', '2020-04-11', '11:28:17', '11:29:08', '00:50', '2020-04-11'),
(966, 31, 1, 0, 0, '2', '2020-04-11', '11:36:53', '11:40:33', '00.00', '2020-04-11'),
(967, 31, 1, 0, 0, '2', '2020-04-11', '11:37:06', '11:41:13', '04:04', '2020-04-11'),
(968, 49, 1, 0, 0, '2', '2020-04-11', '11:54:22', '00:00:00', '', '2020-04-11'),
(969, 49, 1, 0, 0, '2', '2020-04-11', '11:44:01', '11:44:42', '00:39', '2020-04-11'),
(970, 49, 1, 0, 0, '2', '2020-04-11', '11:57:01', '00:00:00', '', '2020-04-11'),
(971, 49, 1, 0, 0, '2', '2020-04-11', '11:46:16', '11:47:57', '01:38', '2020-04-11'),
(972, 49, 1, 0, 0, '2', '2020-04-11', '11:59:19', '11:59:48', '00:14', '2020-04-11'),
(973, 49, 1, 0, 0, '2', '2020-04-11', '11:48:36', '11:48:55', '00:18', '2020-04-11'),
(974, 49, 1, 0, 0, '2', '2020-04-11', '12:00:19', '12:01:05', '00.00', '2020-04-11'),
(975, 49, 1, 0, 0, '2', '2020-04-11', '11:49:48', '11:50:23', '00:33', '2020-04-11'),
(976, 49, 1, 0, 0, '2', '2020-04-11', '12:01:40', '12:02:18', '00:23', '2020-04-11'),
(977, 49, 1, 0, 0, '2', '2020-04-11', '11:50:57', '11:51:18', '00:19', '2020-04-11'),
(978, 25, 2, 0, 0, '2', '2020-04-11', '12:04:11', '00:00:00', '', '2020-04-11'),
(979, 25, 2, 0, 0, '2', '2020-04-11', '12:04:35', '00:00:00', '', '2020-04-11'),
(980, 25, 1, 0, 0, '2', '2020-04-11', '12:04:38', '12:04:53', 'Ringing...', '2020-04-11'),
(981, 25, 2, 0, 0, '2', '2020-04-11', '12:04:57', '00:00:00', '', '2020-04-11'),
(982, 25, 2, 0, 0, '2', '2020-04-11', '12:12:31', '00:00:00', '', '2020-04-11'),
(983, 25, 2, 0, 0, '2', '2020-04-11', '12:12:53', '00:00:00', '', '2020-04-11'),
(984, 25, 1, 0, 0, '2', '2020-04-11', '12:12:57', '00:00:00', '', '2020-04-11'),
(985, 25, 1, 0, 0, '2', '2020-04-11', '12:21:26', '12:21:42', '00:13', '2020-04-11'),
(986, 25, 2, 0, 0, '2', '2020-04-11', '13:00:06', '00:00:00', '', '2020-04-11'),
(987, 25, 1, 0, 0, '2', '2020-04-11', '13:00:18', '00:00:00', '', '2020-04-11'),
(988, 25, 4, 0, 0, '2', '2020-04-11', '13:00:30', '00:00:00', '', '2020-04-11'),
(989, 25, 2, 0, 0, '2', '2020-04-11', '18:20:53', '00:00:00', '', '2020-04-11'),
(990, 25, 1, 0, 0, '2', '2020-04-11', '18:21:06', '00:00:00', '', '2020-04-11'),
(991, 25, 1, 0, 0, '2', '2020-04-11', '19:26:57', '00:00:00', '', '2020-04-11'),
(992, 25, 2, 0, 0, '2', '2020-04-11', '19:27:11', '00:00:00', '', '2020-04-11'),
(993, 25, 3, 0, 0, '2', '2020-04-11', '19:27:23', '00:00:00', '', '2020-04-11'),
(994, 25, 4, 0, 0, '2', '2020-04-11', '19:27:30', '00:00:00', '', '2020-04-11'),
(995, 37, 1, 0, 0, '2', '2020-04-11', '19:42:50', '19:55:37', '12:38', '2020-04-11'),
(996, 37, 1, 0, 0, '2', '2020-04-11', '19:39:41', '19:52:22', '12:39', '2020-04-11'),
(997, 37, 1, 0, 0, '2', '2020-04-11', '19:56:49', '19:57:43', '00:44', '2020-04-11'),
(998, 37, 1, 0, 0, '2', '2020-04-11', '19:53:40', '19:54:28', '00:46', '2020-04-11'),
(999, 25, 2, 0, 0, '2', '2020-04-11', '20:24:58', '00:00:00', '', '2020-04-11'),
(1000, 25, 1, 0, 0, '2', '2020-04-11', '20:25:11', '00:00:00', '', '2020-04-11'),
(1001, 25, 3, 0, 0, '2', '2020-04-11', '20:25:19', '00:00:00', '', '2020-04-11'),
(1002, 25, 2, 0, 0, '2', '2020-04-11', '20:25:34', '00:00:00', '', '2020-04-11'),
(1003, 40, 2, 0, 0, '2', '2020-04-11', '20:28:53', '20:30:13', 'Ringing...', '2020-04-11'),
(1004, 40, 2, 0, 0, '2', '2020-04-11', '20:30:25', '20:30:47', 'Ringing...', '2020-04-11'),
(1005, 40, 2, 0, 0, '2', '2020-04-11', '20:31:14', '20:31:39', 'Ringing...', '2020-04-11'),
(1006, 40, 2, 0, 0, '2', '2020-04-11', '20:31:47', '20:32:05', 'Ringing...', '2020-04-11'),
(1007, 40, 2, 0, 0, '2', '2020-04-11', '20:32:15', '20:33:25', 'Ringing...', '2020-04-11'),
(1008, 40, 2, 0, 0, '2', '2020-04-11', '20:52:41', '20:57:32', 'Rejected', '2020-04-11'),
(1009, 40, 2, 0, 0, '2', '2020-04-11', '20:52:49', '20:57:29', '04:37', '2020-04-11'),
(1010, 40, 2, 0, 0, '2', '2020-04-11', '20:57:39', '20:58:28', 'Rejected', '2020-04-11'),
(1011, 40, 2, 0, 0, '2', '2020-04-11', '20:57:48', '20:58:25', '00:35', '2020-04-11'),
(1012, 40, 2, 0, 0, '2', '2020-04-11', '21:08:18', '21:08:41', 'Rejected', '2020-04-11'),
(1013, 40, 2, 0, 0, '2', '2020-04-11', '21:08:27', '21:08:39', '00:10', '2020-04-11'),
(1014, 40, 2, 0, 0, '2', '2020-04-11', '21:08:50', '21:08:57', 'Rejected', '2020-04-11'),
(1015, 25, 2, 0, 0, '2', '2020-04-11', '21:25:26', '21:30:10', 'Ringing...', '2020-04-11'),
(1016, 25, 2, 0, 0, '2', '2020-04-11', '21:31:05', '21:35:45', '04:37', '2020-04-11'),
(1017, 35, 2, 0, 0, '2', '2020-04-11', '21:31:33', '00:00:00', '', '2020-04-11'),
(1018, 35, 2, 0, 0, '2', '2020-04-11', '21:31:40', '00:00:00', '', '2020-04-11'),
(1019, 35, 2, 0, 0, '2', '2020-04-11', '21:31:47', '00:00:00', '', '2020-04-11'),
(1020, 35, 2, 0, 0, '2', '2020-04-11', '21:31:57', '00:00:00', '', '2020-04-11'),
(1021, 35, 2, 0, 0, '2', '2020-04-11', '21:32:13', '00:00:00', '', '2020-04-11'),
(1022, 35, 2, 0, 0, '2', '2020-04-11', '21:32:25', '00:00:00', '', '2020-04-11'),
(1023, 35, 2, 0, 0, '2', '2020-04-11', '21:32:37', '00:00:00', '', '2020-04-11'),
(1024, 35, 2, 0, 0, '2', '2020-04-11', '21:32:51', '00:00:00', '', '2020-04-11'),
(1025, 35, 2, 0, 0, '2', '2020-04-11', '21:33:03', '00:00:00', '', '2020-04-11'),
(1026, 35, 2, 0, 0, '2', '2020-04-11', '21:33:10', '00:00:00', '', '2020-04-11'),
(1027, 35, 2, 0, 0, '2', '2020-04-11', '21:33:16', '00:00:00', '', '2020-04-11'),
(1028, 35, 2, 0, 0, '2', '2020-04-11', '21:34:18', '00:00:00', '', '2020-04-11'),
(1029, 35, 1, 0, 0, '2', '2020-04-11', '21:34:25', '21:35:02', 'Ringing...', '2020-04-11'),
(1030, 35, 4, 0, 0, '2', '2020-04-11', '21:35:12', '00:00:00', '', '2020-04-11'),
(1031, 35, 4, 0, 0, '2', '2020-04-11', '21:35:35', '00:00:00', '', '2020-04-11'),
(1032, 25, 1, 0, 0, '2', '2020-04-11', '21:30:16', '21:30:55', 'Ringing...', '2020-04-11'),
(1033, 35, 3, 0, 0, '2', '2020-04-11', '21:35:48', '00:00:00', '', '2020-04-11'),
(1034, 35, 1, 0, 0, '2', '2020-04-11', '21:36:39', '21:37:24', 'Ringing...', '2020-04-11'),
(1035, 25, 1, 0, 0, '2', '2020-04-11', '21:31:13', '21:31:54', 'Ringing...', '2020-04-11'),
(1036, 25, 1, 0, 0, '2', '2020-04-11', '21:37:09', '21:38:53', 'Ringing...', '2020-04-11'),
(1037, 25, 1, 0, 0, '2', '2020-04-11', '21:42:50', '21:44:18', '01:26', '2020-04-11'),
(1038, 25, 1, 0, 0, '2', '2020-04-11', '21:54:16', '00:00:00', '', '2020-04-11'),
(1039, 25, 2, 0, 0, '2', '2020-04-11', '21:54:55', '21:55:29', 'Ringing...', '2020-04-11'),
(1040, 25, 1, 0, 0, '2', '2020-04-11', '21:55:41', '00:00:00', '', '2020-04-11'),
(1041, 25, 1, 0, 0, '2', '2020-04-11', '21:56:06', '00:00:00', '', '2020-04-11'),
(1042, 25, 2, 0, 0, '2', '2020-04-11', '21:56:23', '00:00:00', '', '2020-04-11'),
(1043, 25, 1, 0, 0, '2', '2020-04-11', '21:56:05', '21:56:50', '00:33', '2020-04-11'),
(1044, 25, 1, 0, 0, '2', '2020-04-11', '22:01:50', '22:03:17', '01:25', '2020-04-11'),
(1045, 25, 1, 0, 0, '2', '2020-04-11', '22:02:18', '00:00:00', '', '2020-04-11'),
(1046, 25, 1, 0, 0, '2', '2020-04-11', '21:57:06', '00:00:00', '', '2020-04-11'),
(1047, 25, 1, 0, 0, '2', '2020-04-11', '22:02:52', '00:00:00', '', '2020-04-11'),
(1048, 25, 1, 0, 0, '2', '2020-04-11', '21:57:39', '00:00:00', '', '2020-04-11'),
(1049, 25, 1, 0, 0, '2', '2020-04-11', '21:57:48', '21:58:23', '00:24', '2020-04-11'),
(1050, 25, 1, 0, 0, '2', '2020-04-11', '22:03:30', '22:03:53', '00:20', '2020-04-11'),
(1051, 25, 1, 0, 0, '2', '2020-04-11', '21:58:28', '00:00:00', '', '2020-04-11'),
(1052, 25, 1, 0, 0, '2', '2020-04-11', '21:58:55', '22:01:06', '01:56', '2020-04-11'),
(1053, 25, 1, 0, 0, '2', '2020-04-11', '22:04:42', '22:06:35', '01:50', '2020-04-11'),
(1054, 25, 1, 0, 0, '2', '2020-04-11', '22:05:39', '00:00:00', '', '2020-04-11'),
(1055, 25, 1, 0, 0, '2', '2020-04-11', '22:06:17', '00:00:00', '', '2020-04-11'),
(1056, 25, 2, 0, 0, '2', '2020-04-11', '22:02:39', '22:03:37', '00:17', '2020-04-11'),
(1057, 25, 2, 0, 0, '2', '2020-04-11', '22:03:45', '22:05:53', '01:38', '2020-04-11'),
(1058, 25, 2, 0, 0, '2', '2020-04-11', '22:09:47', '22:11:19', '01:29', '2020-04-11'),
(1059, 25, 2, 0, 0, '2', '2020-04-11', '22:06:01', '22:08:12', '01:31', '2020-04-11'),
(1060, 25, 2, 0, 0, '2', '2020-04-11', '22:12:12', '22:13:52', '01:37', '2020-04-11'),
(1061, 25, 2, 0, 0, '2', '2020-04-11', '22:08:18', '00:00:00', '', '2020-04-11'),
(1062, 25, 2, 0, 0, '2', '2020-04-11', '22:08:27', '22:10:35', '01:32', '2020-04-11'),
(1063, 25, 2, 0, 0, '2', '2020-04-11', '22:14:34', '00:00:00', '', '2020-04-11'),
(1064, 24, 1, 0, 0, '2', '2020-04-11', '17:58:19', '00:00:00', '', '2020-04-11'),
(1065, 24, 1, 0, 0, '2', '2020-04-11', '18:01:48', '18:02:21', 'Ringing...', '2020-04-11'),
(1066, 24, 1, 0, 0, '2', '2020-04-11', '18:02:45', '18:04:22', 'Ringing...', '2020-04-11'),
(1067, 24, 1, 0, 0, '2', '2020-04-11', '22:36:57', '22:37:19', '00:20', '2020-04-11'),
(1068, 19, 1, 0, 0, '2', '2020-04-11', '22:47:24', '22:47:58', '00.00', '2020-04-11'),
(1069, 19, 3, 0, 0, '2', '2020-04-11', '22:52:43', '22:53:52', '00:58', '2020-04-11'),
(1070, 19, 3, 0, 0, '2', '2020-04-11', '18:22:55', '18:23:50', '00:53', '2020-04-11'),
(1071, 19, 3, 0, 0, '2', '2020-04-11', '22:54:28', '22:55:38', '01:02', '2020-04-11'),
(1072, 19, 3, 0, 0, '2', '2020-04-11', '18:24:36', '18:25:38', '00:59', '2020-04-11'),
(1073, 19, 3, 0, 0, '2', '2020-04-11', '22:56:00', '00:00:00', '', '2020-04-11'),
(1074, 19, 3, 0, 0, '2', '2020-04-11', '22:56:23', '00:00:00', '', '2020-04-11'),
(1075, 24, 3, 0, 0, '2', '2020-04-11', '18:29:13', '18:30:39', '00.00', '2020-04-11'),
(1076, 24, 3, 0, 0, '2', '2020-04-11', '18:30:49', '18:31:35', 'Ringing...', '2020-04-11'),
(1077, 24, 3, 0, 0, '2', '2020-04-11', '18:31:45', '18:32:05', 'Ringing...', '2020-04-11'),
(1078, 24, 2, 0, 0, '2', '2020-04-11', '18:33:45', '18:35:00', 'Ringing...', '2020-04-11'),
(1079, 0, 1, 0, 0, '2', '2020-04-13', '11:41:46', '11:41:59', '00:07', '2020-04-13'),
(1080, 41, 1, 0, 0, '2', '2020-04-13', '16:20:42', '16:21:04', 'Ringing...', '2020-04-13'),
(1081, 11, 1, 0, 0, '2', '2020-04-14', '14:37:56', '00:00:00', '', '2020-04-14'),
(1082, 11, 1, 0, 0, '2', '2020-04-14', '14:40:47', '00:00:00', '', '2020-04-14'),
(1083, 11, 1, 0, 0, '2', '2020-04-14', '14:42:46', '00:00:00', '', '2020-04-14'),
(1084, 11, 1, 0, 0, '2', '2020-04-14', '14:43:09', '00:00:00', '', '2020-04-14'),
(1085, 11, 1, 0, 0, '2', '2020-04-14', '14:45:34', '00:00:00', '', '2020-04-14'),
(1086, 11, 1, 0, 0, '2', '2020-04-14', '14:51:37', '00:00:00', '', '2020-04-14'),
(1087, 11, 1, 0, 0, '2', '2020-04-14', '14:52:06', '00:00:00', '', '2020-04-14'),
(1088, 11, 1, 0, 0, '2', '2020-04-14', '15:08:55', '15:09:20', '00:16', '2020-04-14'),
(1089, 11, 1, 0, 0, '2', '2020-04-14', '15:09:05', '15:09:22', '00:14', '2020-04-14'),
(1090, 11, 1, 0, 0, '2', '2020-04-14', '15:09:27', '15:09:50', '00:14', '2020-04-14'),
(1091, 11, 1, 0, 0, '2', '2020-04-14', '15:09:34', '15:09:52', '00:16', '2020-04-14'),
(1092, 11, 1, 0, 0, '2', '2020-04-14', '15:22:18', '15:22:39', '00:09', '2020-04-14'),
(1093, 11, 1, 0, 0, '2', '2020-04-14', '15:22:27', '15:22:41', '00:11', '2020-04-14'),
(1094, 11, 1, 0, 0, '2', '2020-04-14', '15:22:47', '15:23:20', '00:23', '2020-04-14'),
(1095, 11, 1, 0, 0, '2', '2020-04-14', '15:22:55', '15:23:22', '00:25', '2020-04-14'),
(1096, 11, 1, 0, 0, '2', '2020-04-14', '15:29:49', '15:30:14', '00:16', '2020-04-14'),
(1097, 11, 1, 0, 0, '2', '2020-04-14', '15:29:56', '15:30:10', '00:11', '2020-04-14'),
(1098, 11, 1, 0, 0, '2', '2020-04-14', '15:30:21', '15:31:00', '00:30', '2020-04-14'),
(1099, 11, 1, 0, 0, '2', '2020-04-14', '15:30:28', '15:31:03', '00:32', '2020-04-14'),
(1100, 11, 1, 0, 0, '2', '2020-04-14', '15:33:26', '15:34:17', '00:33', '2020-04-14'),
(1101, 11, 1, 0, 0, '2', '2020-04-14', '15:33:35', '15:34:23', '00:44', '2020-04-14'),
(1102, 11, 1, 0, 0, '2', '2020-04-14', '15:34:52', '00:00:00', '', '2020-04-14'),
(1103, 11, 1, 0, 0, '2', '2020-04-14', '15:35:02', '15:36:16', '01:09', '2020-04-14'),
(1104, 11, 1, 0, 0, '2', '2020-04-14', '15:36:51', '15:37:50', '00:37', '2020-04-14'),
(1105, 11, 1, 0, 0, '2', '2020-04-14', '15:37:08', '15:37:57', '00:42', '2020-04-14'),
(1106, 11, 1, 0, 0, '2', '2020-04-14', '15:39:55', '00:00:00', '', '2020-04-14'),
(1107, 11, 1, 0, 0, '2', '2020-04-14', '15:40:04', '15:40:11', '00:04', '2020-04-14'),
(1108, 11, 1, 0, 0, '2', '2020-04-14', '15:40:21', '00:00:00', '', '2020-04-14'),
(1109, 11, 1, 0, 0, '2', '2020-04-14', '15:40:34', '15:40:50', '00:13', '2020-04-14'),
(1110, 11, 1, 0, 0, '2', '2020-04-14', '15:41:07', '00:00:00', '', '2020-04-14'),
(1111, 11, 1, 0, 0, '2', '2020-04-14', '15:41:20', '15:42:04', '00:41', '2020-04-14'),
(1112, 11, 1, 0, 0, '2', '2020-04-14', '15:43:01', '15:43:33', '00:16', '2020-04-14'),
(1113, 11, 1, 0, 0, '2', '2020-04-14', '15:43:15', '15:43:39', '00:21', '2020-04-14'),
(1114, 11, 1, 0, 0, '2', '2020-04-14', '15:43:51', '15:44:15', '00:12', '2020-04-14'),
(1115, 11, 1, 0, 0, '2', '2020-04-14', '15:44:02', '15:44:20', '00:15', '2020-04-14'),
(1116, 11, 1, 0, 0, '2', '2020-04-14', '15:46:46', '15:47:20', '00:23', '2020-04-14'),
(1117, 11, 1, 0, 0, '2', '2020-04-14', '15:46:57', '15:47:26', '00:26', '2020-04-14'),
(1118, 11, 1, 0, 0, '2', '2020-04-14', '15:49:56', '15:50:22', '00.00', '2020-04-14'),
(1119, 11, 1, 0, 0, '2', '2020-04-14', '15:50:09', '15:50:38', '00:26', '2020-04-14'),
(1120, 11, 1, 0, 0, '2', '2020-04-14', '15:51:04', '15:52:00', '00.00', '2020-04-14'),
(1121, 11, 1, 0, 0, '2', '2020-04-14', '15:51:19', '15:51:48', '00.00', '2020-04-14'),
(1122, 11, 1, 0, 0, '2', '2020-04-14', '15:52:12', '15:53:31', '00.00', '2020-04-14'),
(1123, 11, 1, 0, 0, '2', '2020-04-14', '15:52:23', '15:52:33', '00.00', '2020-04-14'),
(1124, 11, 1, 0, 0, '2', '2020-04-14', '15:55:33', '00:00:00', '', '2020-04-14'),
(1125, 11, 1, 0, 0, '2', '2020-04-14', '15:55:45', '15:56:21', '00:32', '2020-04-14'),
(1126, 11, 1, 0, 0, '2', '2020-04-14', '15:57:41', '00:00:00', '', '2020-04-14'),
(1127, 11, 1, 0, 0, '2', '2020-04-14', '15:58:06', '15:58:29', '00:18', '2020-04-14'),
(1128, 11, 1, 0, 0, '2', '2020-04-14', '16:00:35', '00:00:00', '', '2020-04-14'),
(1129, 11, 1, 0, 0, '2', '2020-04-14', '16:00:50', '00:00:00', '', '2020-04-14'),
(1130, 11, 1, 0, 0, '2', '2020-04-14', '16:03:55', '16:04:54', 'Ringing...', '2020-04-14'),
(1131, 11, 1, 0, 0, '2', '2020-04-14', '16:04:09', '16:04:39', '00:20', '2020-04-14'),
(1132, 11, 1, 0, 0, '2', '2020-04-14', '16:05:44', '00:00:00', '', '2020-04-14'),
(1133, 11, 1, 0, 0, '2', '2020-04-14', '16:05:53', '00:00:00', '', '2020-04-14'),
(1134, 11, 1, 0, 0, '2', '2020-04-14', '16:07:04', '00:00:00', '', '2020-04-14'),
(1135, 11, 1, 0, 0, '2', '2020-04-14', '16:07:28', '16:08:13', '00:28', '2020-04-14'),
(1136, 11, 1, 0, 0, '2', '2020-04-14', '16:09:59', '00:00:00', '', '2020-04-14'),
(1137, 11, 1, 0, 0, '2', '2020-04-14', '16:10:15', '00:00:00', '', '2020-04-14'),
(1138, 11, 1, 0, 0, '2', '2020-04-14', '16:10:26', '00:00:00', '', '2020-04-14'),
(1139, 11, 1, 0, 0, '2', '2020-04-14', '16:12:04', '00:00:00', '', '2020-04-14'),
(1140, 11, 1, 0, 0, '2', '2020-04-14', '16:12:25', '00:00:00', '', '2020-04-14'),
(1141, 11, 1, 0, 0, '2', '2020-04-14', '16:14:12', '00:00:00', '', '2020-04-14'),
(1142, 11, 1, 0, 0, '2', '2020-04-14', '16:14:50', '16:16:03', '00:58', '2020-04-14'),
(1143, 11, 1, 0, 0, '2', '2020-04-14', '16:15:07', '16:16:00', '00:51', '2020-04-14'),
(1144, 11, 1, 0, 0, '2', '2020-04-14', '16:16:10', '16:16:57', '00:36', '2020-04-14'),
(1145, 11, 1, 0, 0, '2', '2020-04-14', '16:16:21', '16:17:07', '00:44', '2020-04-14'),
(1146, 11, 1, 0, 0, '2', '2020-04-14', '16:17:12', '16:19:11', '01:50', '2020-04-14'),
(1147, 11, 1, 0, 0, '2', '2020-04-14', '16:17:22', '16:19:35', '00.00', '2020-04-14'),
(1148, 11, 1, 0, 0, '2', '2020-04-14', '16:19:39', '16:21:15', '01:27', '2020-04-14'),
(1149, 11, 1, 0, 0, '2', '2020-04-14', '16:19:49', '16:21:13', '01:22', '2020-04-14'),
(1150, 11, 1, 0, 0, '2', '2020-04-14', '16:21:22', '16:23:03', '01:32', '2020-04-14'),
(1151, 11, 1, 0, 0, '2', '2020-04-14', '16:21:32', '16:23:07', '00.00', '2020-04-14'),
(1152, 11, 1, 0, 0, '2', '2020-04-14', '16:24:11', '16:25:24', '01:05', '2020-04-14'),
(1153, 11, 1, 0, 0, '2', '2020-04-14', '16:24:20', '00:00:00', '', '2020-04-14'),
(1154, 11, 1, 0, 0, '2', '2020-04-14', '16:30:37', '16:31:07', '00:19', '2020-04-14'),
(1155, 11, 1, 0, 0, '2', '2020-04-14', '16:30:51', '16:31:05', '00:10', '2020-04-14'),
(1156, 11, 1, 0, 0, '2', '2020-04-14', '16:31:14', '16:31:34', '00:11', '2020-04-14'),
(1157, 11, 1, 0, 0, '2', '2020-04-14', '16:31:23', '16:31:39', '00:13', '2020-04-14'),
(1158, 11, 1, 0, 0, '2', '2020-04-14', '16:32:18', '00:00:00', '', '2020-04-14'),
(1159, 11, 1, 0, 0, '2', '2020-04-14', '16:32:37', '16:33:03', '00:13', '2020-04-14'),
(1160, 11, 1, 0, 0, '2', '2020-04-14', '16:33:23', '00:00:00', '', '2020-04-14'),
(1161, 11, 1, 0, 0, '2', '2020-04-14', '16:33:35', '16:34:38', '00:48', '2020-04-14'),
(1162, 11, 1, 0, 0, '2', '2020-04-14', '16:36:26', '16:37:14', '00:30', '2020-04-14'),
(1163, 11, 1, 0, 0, '2', '2020-04-14', '16:36:45', '00:00:00', '', '2020-04-14'),
(1164, 11, 1, 0, 0, '2', '2020-04-14', '16:38:12', '16:40:08', '01:44', '2020-04-14'),
(1165, 11, 1, 0, 0, '2', '2020-04-14', '16:38:24', '00:00:00', '', '2020-04-14'),
(1166, 11, 1, 0, 0, '2', '2020-04-14', '16:40:19', '16:41:30', '01:00', '2020-04-14'),
(1167, 11, 1, 0, 0, '2', '2020-04-14', '16:40:31', '00:00:00', '', '2020-04-14'),
(1168, 11, 1, 0, 0, '2', '2020-04-14', '16:41:36', '16:41:59', '00:15', '2020-04-14'),
(1169, 11, 1, 0, 0, '2', '2020-04-14', '16:41:45', '16:41:57', '00:09', '2020-04-14'),
(1170, 11, 1, 0, 0, '2', '2020-04-14', '16:43:36', '16:44:46', '00:55', '2020-04-14'),
(1171, 11, 1, 0, 0, '2', '2020-04-14', '16:43:51', '16:44:39', '00:43', '2020-04-14'),
(1172, 11, 1, 0, 0, '2', '2020-04-14', '16:44:52', '16:46:27', '01:21', '2020-04-14'),
(1173, 11, 1, 0, 0, '2', '2020-04-14', '16:45:02', '16:46:23', '01:15', '2020-04-14'),
(1174, 11, 1, 0, 0, '2', '2020-04-14', '16:46:34', '00:00:00', '', '2020-04-14'),
(1175, 11, 1, 0, 0, '2', '2020-04-14', '16:47:23', '00:00:00', '', '2020-04-14'),
(1176, 11, 1, 0, 0, '2', '2020-04-14', '16:49:20', '00:00:00', '', '2020-04-14'),
(1177, 11, 1, 0, 0, '2', '2020-04-14', '16:51:53', '16:52:19', '00:17', '2020-04-14'),
(1178, 11, 1, 0, 0, '2', '2020-04-14', '16:52:03', '16:52:18', '00:11', '2020-04-14'),
(1179, 11, 1, 0, 0, '2', '2020-04-14', '16:52:26', '16:52:53', '00:17', '2020-04-14'),
(1180, 11, 1, 0, 0, '2', '2020-04-14', '16:52:37', '16:52:51', '00:11', '2020-04-14'),
(1181, 11, 1, 0, 0, '2', '2020-04-14', '18:10:09', '18:10:38', '00:17', '2020-04-14'),
(1182, 11, 1, 0, 0, '2', '2020-04-14', '18:10:24', '18:10:43', '00:16', '2020-04-14'),
(1183, 11, 1, 0, 0, '2', '2020-04-14', '18:17:49', '18:18:15', '00:16', '2020-04-14'),
(1184, 11, 1, 0, 0, '2', '2020-04-14', '18:17:59', '18:18:38', '00:30', '2020-04-14'),
(1185, 11, 1, 0, 0, '2', '2020-04-14', '18:18:47', '18:19:51', '00:55', '2020-04-14'),
(1186, 11, 1, 0, 0, '2', '2020-04-14', '18:18:57', '00:00:00', '', '2020-04-14');
INSERT INTO `axpatientrecords` (`patientRecordId`, `patientId`, `doctorId`, `subscriptionId`, `patientCreditId`, `communicationMode`, `communicationDate`, `communicationStartTime`, `communicationEndTime`, `communicationDuration`, `insDate`) VALUES
(1187, 11, 1, 0, 0, '2', '2020-04-14', '18:20:10', '18:20:29', '00:10', '2020-04-14'),
(1188, 11, 1, 0, 0, '2', '2020-04-14', '18:20:19', '18:20:36', '00:13', '2020-04-14'),
(1189, 11, 1, 0, 0, '2', '2020-04-14', '18:20:40', '18:21:05', '00:17', '2020-04-14'),
(1190, 11, 1, 0, 0, '2', '2020-04-14', '18:20:49', '18:21:20', '00:28', '2020-04-14'),
(1191, 11, 1, 0, 0, '2', '2020-04-14', '18:21:14', '00:00:00', '', '2020-04-14'),
(1192, 11, 1, 0, 0, '2', '2020-04-14', '18:21:25', '18:21:54', '00:22', '2020-04-14'),
(1193, 11, 1, 0, 0, '2', '2020-04-14', '18:21:34', '18:21:53', '00:16', '2020-04-14'),
(1194, 11, 1, 0, 0, '2', '2020-04-14', '18:21:59', '18:22:17', '00:10', '2020-04-14'),
(1195, 11, 1, 0, 0, '2', '2020-04-14', '18:22:08', '18:22:24', '00:13', '2020-04-14'),
(1196, 11, 1, 0, 0, '2', '2020-04-14', '18:23:22', '18:23:51', '00:17', '2020-04-14'),
(1197, 11, 1, 0, 0, '2', '2020-04-14', '18:23:34', '00:00:00', '', '2020-04-14'),
(1198, 11, 1, 0, 0, '2', '2020-04-14', '18:26:23', '18:26:59', '00:27', '2020-04-14'),
(1199, 11, 1, 0, 0, '2', '2020-04-14', '18:26:33', '18:27:14', '00:39', '2020-04-14'),
(1200, 11, 1, 0, 0, '2', '2020-04-14', '18:27:48', '00:00:00', '', '2020-04-14'),
(1201, 11, 1, 0, 0, '2', '2020-04-14', '18:28:03', '18:28:10', '00:04', '2020-04-14'),
(1202, 11, 1, 0, 0, '2', '2020-04-14', '18:37:09', '18:37:31', '00:09', '2020-04-14'),
(1203, 11, 1, 0, 0, '2', '2020-04-14', '18:37:21', '18:37:36', '00:11', '2020-04-14'),
(1204, 11, 1, 0, 0, '2', '2020-04-14', '18:37:41', '18:38:03', '00:14', '2020-04-14'),
(1205, 11, 1, 0, 0, '2', '2020-04-14', '18:37:49', '18:38:08', '00:16', '2020-04-14'),
(1206, 11, 1, 0, 0, '2', '2020-04-14', '18:40:58', '00:00:00', '', '2020-04-14'),
(1207, 11, 1, 0, 0, '2', '2020-04-14', '18:41:21', '00:00:00', '', '2020-04-14'),
(1208, 11, 1, 0, 0, '2', '2020-04-14', '18:43:18', '18:43:37', '00.00', '2020-04-14'),
(1209, 11, 1, 0, 0, '2', '2020-04-14', '18:43:28', '18:43:42', '00.00', '2020-04-14'),
(1210, 11, 1, 0, 0, '2', '2020-04-14', '18:43:46', '00:00:00', '', '2020-04-14'),
(1211, 11, 1, 0, 0, '2', '2020-04-14', '18:44:10', '00:00:00', '', '2020-04-14'),
(1212, 11, 1, 0, 0, '2', '2020-04-14', '18:45:53', '18:46:20', '00.00', '2020-04-14'),
(1213, 11, 1, 0, 0, '2', '2020-04-14', '18:46:05', '18:47:20', '00.00', '2020-04-14'),
(1214, 11, 1, 0, 0, '2', '2020-04-14', '18:47:25', '00:00:00', '', '2020-04-14'),
(1215, 11, 1, 0, 0, '2', '2020-04-14', '22:53:24', '22:53:50', '00.00', '2020-04-14'),
(1216, 11, 1, 0, 0, '2', '2020-04-14', '22:55:00', '22:55:19', '00.00', '2020-04-14'),
(1217, 11, 1, 0, 0, '2', '2020-04-14', '22:55:10', '22:55:25', '00.00', '2020-04-14'),
(1218, 11, 1, 0, 0, '2', '2020-04-14', '22:55:29', '22:55:55', '00.00', '2020-04-14'),
(1219, 11, 1, 0, 0, '2', '2020-04-14', '22:55:38', '22:55:50', '00.00', '2020-04-14'),
(1220, 11, 1, 0, 0, '2', '2020-04-14', '22:56:01', '22:56:18', '00.00', '2020-04-14'),
(1221, 11, 1, 0, 0, '2', '2020-04-14', '22:56:09', '22:56:19', '00.00', '2020-04-14'),
(1222, 22, 2, 0, 0, '2', '2020-04-14', '10:01:26', '00:00:00', '', '2020-04-15'),
(1223, 22, 2, 0, 0, '2', '2020-04-14', '10:02:53', '00:00:00', '', '2020-04-15'),
(1224, 11, 1, 0, 0, '2', '2020-04-15', '13:44:06', '13:44:30', '00.00', '2020-04-15'),
(1225, 11, 1, 0, 0, '2', '2020-04-15', '13:44:19', '13:44:34', '00.00', '2020-04-15'),
(1226, 11, 1, 0, 0, '2', '2020-04-15', '13:44:38', '13:45:03', '00.00', '2020-04-15'),
(1227, 11, 1, 0, 0, '2', '2020-04-15', '13:44:47', '13:45:11', '00.00', '2020-04-15'),
(1228, 11, 1, 0, 0, '2', '2020-04-15', '13:45:14', '13:45:37', '00.00', '2020-04-15'),
(1229, 11, 1, 0, 0, '2', '2020-04-15', '13:45:22', '13:45:40', '00.00', '2020-04-15'),
(1230, 11, 1, 0, 0, '2', '2020-04-15', '13:45:45', '13:46:16', '00.00', '2020-04-15'),
(1231, 11, 1, 0, 0, '2', '2020-04-15', '13:45:53', '13:46:14', '00.00', '2020-04-15'),
(1232, 11, 1, 0, 0, '2', '2020-04-15', '13:46:23', '13:46:49', '00.00', '2020-04-15'),
(1233, 11, 1, 0, 0, '2', '2020-04-15', '13:46:30', '13:46:47', '00.00', '2020-04-15'),
(1234, 11, 1, 0, 0, '2', '2020-04-15', '13:48:52', '13:49:30', '00:28', '2020-04-15'),
(1235, 11, 1, 0, 0, '2', '2020-04-15', '13:49:02', '13:49:26', '00:21', '2020-04-15'),
(1236, 11, 1, 0, 0, '2', '2020-04-15', '13:49:39', '13:50:14', '00:25', '2020-04-15'),
(1237, 11, 1, 0, 0, '2', '2020-04-15', '13:49:48', '13:50:19', '00:29', '2020-04-15');

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
  `insDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axrating`
--

INSERT INTO `axrating` (`ratingId`, `patientId`, `doctorId`, `rating`, `review`, `insDate`) VALUES
(1, 1, 1, 3, 'Test 1', '2020-03-11 00:00:00'),
(2, 1, 1, 3, 'Test Review', '2020-03-11 11:24:23'),
(3, 1, 1, 0, '', '2020-03-22 14:21:42'),
(4, 1, 1, 0, '', '2020-03-22 15:25:47'),
(5, 1, 1, 0, '', '2020-03-22 15:25:54'),
(6, 1, 1, 0, '', '2020-04-17 18:43:55'),
(7, 1, 1, 3, 'test', '2020-04-17 18:55:01'),
(8, 1, 1, 3, 'new reviews', '2020-04-18 16:38:15');

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
(1, 'Psychiatrist', 'Psychiatrists are medical doctors who diagnose and treat mental illnesses', '10 Minutes', 'Psychiatrist6.png', '2020-01-21 11:07:11', 'psychiatrist', 1),
(2, 'Counselling', ' Counsellors listen to, empathise with, encourage and help to empower individuals.', '10 Minutes', 'Counsellor7.jpg', '2020-01-21 12:24:12', 'counselling', 1),
(3, 'Psychology', 'Psychology is the science of behavior and mind.', '10 Minutes', 'Psychology10.jpg', '2020-01-24 09:01:58', 'psychology', 1);

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
(1, '1,2,3', 'Marital & Relationship Problems', 'Marital & Relationship Problems', 'SYMPTOMS_1.jpg', 1, 'marital-relationship-problems'),
(2, '1,2,3', 'De Addiction -  Drinks,Smoke', 'De Addiction -  Drinks,Smoke', 'SYMPTOMS_2.jpg', 1, 'de-addiction-drinks-Smoke'),
(3, '2', 'Child Psychiatrist', 'Child Psychiatrist', 'SYMPTOMS_3.jpg', 1, 'child-psychiatrist'),
(4, '3', 'Sexual Problems', 'Sexual Problems', 'SYMPTOMS_4.jpg', 1, 'sexual-problems'),
(5, '1,2,3', 'Cope With Depression,Stress & Anxiety', 'Cope With Depression,Stress & Anxiety', 'SYMPTOMS_5.jpg', 1, 'cope-with-depression-stress-anxiety');

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
  MODIFY `apiTokenId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8289;

--
-- AUTO_INCREMENT for table `axadmin`
--
ALTER TABLE `axadmin`
  MODIFY `adminId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axappointments`
--
ALTER TABLE `axappointments`
  MODIFY `appointmentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `axavailablesessions`
--
ALTER TABLE `axavailablesessions`
  MODIFY `availabletSessionId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `axcms`
--
ALTER TABLE `axcms`
  MODIFY `pageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `axcountries`
--
ALTER TABLE `axcountries`
  MODIFY `countryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `axdoctors`
--
ALTER TABLE `axdoctors`
  MODIFY `doctorId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `axfavourites`
--
ALTER TABLE `axfavourites`
  MODIFY `favouriteId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `axnotifications`
--
ALTER TABLE `axnotifications`
  MODIFY `notificationId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `axpackages`
--
ALTER TABLE `axpackages`
  MODIFY `packageId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `axpatient`
--
ALTER TABLE `axpatient`
  MODIFY `patientId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `axpatientcredits`
--
ALTER TABLE `axpatientcredits`
  MODIFY `patientCreditId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `axpatientrecords`
--
ALTER TABLE `axpatientrecords`
  MODIFY `patientRecordId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238;

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
  MODIFY `ratingId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `specialityId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `axsubscription`
--
ALTER TABLE `axsubscription`
  MODIFY `subscriptionId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `axsymptoms`
--
ALTER TABLE `axsymptoms`
  MODIFY `symptomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
