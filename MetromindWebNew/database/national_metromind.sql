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
-- Database: `national_metromind`
--

-- --------------------------------------------------------

--
-- Table structure for table `axadmin`
--

CREATE TABLE `axadmin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `userName` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `emailId` varchar(300) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `userType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `axadmin`
--

INSERT INTO `axadmin` (`adminId`, `name`, `userName`, `password`, `emailId`, `status`, `userType`) VALUES
(1, 'Administrator', 'admin', 'af0fa77f12d61aed96ef8b71fe4fa1017e023d34c3afda8667a642a091dfdc4111a281cc1907c2bda2779fb23212a16d5a50e011c9fdd68577fc5e291b276e13ib4pUHEz6F/pQp5QAt9Mgybdcd7UtEMZgZat5k34fW0=', 'jinu@ekselan.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `axappoinment`
--

CREATE TABLE `axappoinment` (
  `bookingId` int(11) NOT NULL,
  `doctorId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `shiftId` bigint(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingTime` varchar(250) NOT NULL,
  `seoUri` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `axfeedback`
--

CREATE TABLE `axfeedback` (
  `feedbackId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `doctorId` bigint(11) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `axhistory`
--

CREATE TABLE `axhistory` (
  `Id` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `symptomId` bigint(11) NOT NULL,
  `packageId` bigint(11) NOT NULL,
  `specialityId` bigint(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `axorder`
--

CREATE TABLE `axorder` (
  `orderId` bigint(11) NOT NULL,
  `specialistId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `prescription` varchar(250) NOT NULL,
  `orderstatus` int(1) NOT NULL,
  `paymentStatus` varchar(250) NOT NULL,
  `deliverAddress` longtext NOT NULL,
  `orderDate` datetime NOT NULL,
  `deliverStatus` int(1) NOT NULL,
  `seoUri` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `axpackages`
--

CREATE TABLE `axpackages` (
  `packageId` bigint(11) NOT NULL,
  `specialityId` varchar(250) NOT NULL,
  `packageName` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `duration` varchar(250) NOT NULL,
  `allotedTime` varchar(250) NOT NULL,
  `cost` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `seoUri` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `axpackages`
--

INSERT INTO `axpackages` (`packageId`, `specialityId`, `packageName`, `description`, `duration`, `allotedTime`, `cost`, `createdDate`, `modifiedDate`, `seoUri`, `status`) VALUES
(1, '10,6', 'Psychology & Psychiatrist Combo', 'Get Psychology & Psychiatrist Combo in limited period', '45 Days', '25 Hours', 12000, '2020-01-24 09:03:03', '2020-01-24 12:04:15', 'psychology-psychiatrist-combo', 1),
(2, '10,7', 'Psychology & Counselling Combo', 'Get Psychology & counselling Combo only for limiter period', '30 Days', '10 Hours', 8000, '2020-01-24 11:07:09', '2020-01-24 12:04:32', 'psychology-counselling-combo', 1),
(3, '10', 'Psychology Package', 'Get psychology doctor consultation for one month', '30 Days', '9 Hours', 5000, '2020-01-24 12:07:10', '0000-00-00 00:00:00', 'psychology-package', 1);

-- --------------------------------------------------------

--
-- Table structure for table `axpatient`
--

CREATE TABLE `axpatient` (
  `patientId` bigint(11) NOT NULL,
  `patientName` varchar(250) NOT NULL,
  `patientEmail` varchar(250) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `patientAge` int(3) NOT NULL,
  `patientImage` varchar(250) NOT NULL,
  `gender` int(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `lastLogin` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `seoUri` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `axpatient`
--

INSERT INTO `axpatient` (`patientId`, `patientName`, `patientEmail`, `phoneNumber`, `password`, `patientAge`, `patientImage`, `gender`, `createdDate`, `modifiedDate`, `lastLogin`, `status`, `seoUri`) VALUES
(7, 'Jinu George', 'jiun@ekselan.com', '9658745120', 'ef1fe2ce5f686ff6f7b23a2947ecfd95d7c49cbdbbd6696b01867606c842f5c95e88b4acf4b737a78d7e9bcc996f7c4cc6d1c49049ec046d47212fbdd2f0c0791IlWM5utsVUt3KZFz12Kku0I949+vr+q9+yn58i0+kE=', 24, '7.jpg', 2, '2020-01-22 09:48:42', '2020-01-28 00:32:17', '0000-00-00 00:00:00', 1, 'jinu-george'),
(8, 'Amitha Varghese', 'amithavarghese@ekselan.com', '9658745120', '4c2c78901a28cc06e8c3d3085a9d47282e542fac686849ca4b2fe01bfd3a58ebf29ce608a7a0dc88d2dc47a8e010ec3a2f704a5a428533c1e85a4894e9fa26d2v1DxkiCQx04uICao4ofsK/tqASN6srZl1xOW0zJfKNg=', 24, '8.jpg', 2, '2020-01-23 08:49:38', '2020-01-28 00:31:56', '0000-00-00 00:00:00', 1, 'amitha-varghese');

-- --------------------------------------------------------

--
-- Table structure for table `axrating`
--

CREATE TABLE `axrating` (
  `ratingId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `packageId` bigint(11) NOT NULL,
  `specialityId` bigint(11) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `review` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `axsetting`
--

CREATE TABLE `axsetting` (
  `settingId` bigint(11) NOT NULL,
  `adminEmail` varchar(250) NOT NULL,
  `hospitalName` varchar(250) NOT NULL,
  `hospitalAddress` longtext NOT NULL,
  `hospitalLogo` varchar(250) NOT NULL,
  `hospitalWebsite` varchar(250) NOT NULL,
  `hospitalPhone` varchar(20) NOT NULL,
  `hospitalEmail` varchar(250) NOT NULL,
  `totalPackages` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `axshifts`
--

CREATE TABLE `axshifts` (
  `shiftId` bigint(11) NOT NULL,
  `doctorId` bigint(11) NOT NULL,
  `availableDay` varchar(10) NOT NULL,
  `availableShift` varchar(20) NOT NULL,
  `availableTime` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `axspecialist`
--

CREATE TABLE `axspecialist` (
  `doctorId` bigint(11) NOT NULL,
  `specialityId` bigint(11) NOT NULL,
  `doctorName` varchar(250) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `doctorFee` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` int(1) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `communicationMode` varchar(250) NOT NULL,
  `doctorEmail` varchar(250) NOT NULL,
  `doctorImage` varchar(250) NOT NULL,
  `status` int(1) NOT NULL,
  `seoUri` varchar(250) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `axspecialist`
--

INSERT INTO `axspecialist` (`doctorId`, `specialityId`, `doctorName`, `qualification`, `password`, `experience`, `doctorFee`, `age`, `gender`, `phoneNumber`, `communicationMode`, `doctorEmail`, `doctorImage`, `status`, `seoUri`, `createdDate`, `modifiedDate`, `lastLogin`) VALUES
(7, 7, 'Dr.AmritaThomas', 'MBBs,MD', 'a0a1f016c5ab63ff3f0ddfbb1db630307827809fc76437803e2d6dbd016859ee9239a95be07bcbce8c4ea0acabbece7259f991c0ded05c8abc2b50d2fdb16ff81qIJK2fmR+k5w9MgmDZK09L4z/elOMKcvLyoMyyXUpk=', '23 Years', 1200, 45, 2, '9656075930', '1,2,3', 'jinu@ekselan.com', '7.jpg', 1, 'dramritathomas', '2020-01-23 06:53:41', '2020-01-28 00:31:24', '0000-00-00 00:00:00'),
(8, 6, 'Dr.Kripa Joy', 'MBBS,MD', '2533708d46659cf26e46cee23addf04c6931f0a64f3740dbfa2aa29b43f97d62126ca7766799cafd00d73999f798998cb55748dd1d1c018540664723c0c7df836yH8Ty44ncJH7+TebFNJ4s+A4NlXCctCIjGuEgLmVx4=', '12 Years', 900, 38, 2, '9658745120', '1,2', 'kripa@gmail.com', '8.jpg', 1, 'drkripa-joy', '2020-01-23 12:50:58', '2020-01-28 00:30:47', '0000-00-00 00:00:00'),
(9, 10, 'Dr.Suja Abraham', 'MBBS,MD', '7c0d321b499155872907db0bfd3c34277fae39799199e6964d35c58ee28c506e237df9c4777f4224408f36471c1c99d0fb0980b3250294557696e7594fb00e50T8WqhAlN9sFSaR+FexDGmnipTO6OBuc2hcK7/pwmmTU=', '26 Years', 14003, 45, 2, '7845126396', '1,3', 'sujaabraham@gmail.com', '9.jpg', 1, 'drsuja-abraham', '2020-01-24 05:10:20', '2020-01-28 00:30:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `axspeciality`
--

CREATE TABLE `axspeciality` (
  `specialityId` bigint(11) NOT NULL,
  `specialityName` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `allotedTime` varchar(30) NOT NULL,
  `specialityIcon` varchar(250) NOT NULL,
  `createdDate` datetime NOT NULL,
  `seoUri` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `axspeciality`
--

INSERT INTO `axspeciality` (`specialityId`, `specialityName`, `description`, `allotedTime`, `specialityIcon`, `createdDate`, `seoUri`, `status`) VALUES
(6, 'Psychiatrist', 'Psychiatrists are medical doctors who diagnose and treat mental illnesses', '10 Minutes', 'Psychiatrist6.png', '2020-01-21 11:07:11', 'psychiatrist', 1),
(7, 'Counselling', ' Counsellors listen to, empathise with, encourage and help to empower individuals.', '10 Minutes', 'Counsellor7.jpg', '2020-01-21 12:24:12', 'counselling', 1),
(10, 'Psychology', 'Psychology is the science of behavior and mind.', '10 Minutes', 'Psychology10.jpg', '2020-01-24 09:01:58', 'psychology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `axsubscription`
--

CREATE TABLE `axsubscription` (
  `subscribeId` bigint(11) NOT NULL,
  `packageId` bigint(11) NOT NULL,
  `patientId` bigint(11) NOT NULL,
  `subscribedDate` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, '6', 'Depression', 'Depression leads to sleepless ,vomiting etc', 'test1234.jpg', 1, 'depression'),
(5, '7,6', 'Headache', 'to the fhd fdy chdjsgfdhj fdbfhddfbvdhsgf dhfgdsfgdhsbf fds', 'Headache5.jpg', 1, 'headache');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `axadmin`
--
ALTER TABLE `axadmin`
  ADD PRIMARY KEY (`adminId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `axappoinment`
--
ALTER TABLE `axappoinment`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `axfeedback`
--
ALTER TABLE `axfeedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `axhistory`
--
ALTER TABLE `axhistory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `axorder`
--
ALTER TABLE `axorder`
  ADD PRIMARY KEY (`orderId`);

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
-- Indexes for table `axrating`
--
ALTER TABLE `axrating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `axsetting`
--
ALTER TABLE `axsetting`
  ADD PRIMARY KEY (`settingId`);

--
-- Indexes for table `axshifts`
--
ALTER TABLE `axshifts`
  ADD PRIMARY KEY (`shiftId`);

--
-- Indexes for table `axspecialist`
--
ALTER TABLE `axspecialist`
  ADD PRIMARY KEY (`doctorId`);

--
-- Indexes for table `axspeciality`
--
ALTER TABLE `axspeciality`
  ADD PRIMARY KEY (`specialityId`);

--
-- Indexes for table `axsubscription`
--
ALTER TABLE `axsubscription`
  ADD PRIMARY KEY (`subscribeId`);

--
-- Indexes for table `axsymptoms`
--
ALTER TABLE `axsymptoms`
  ADD PRIMARY KEY (`symptomId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `axadmin`
--
ALTER TABLE `axadmin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `axappoinment`
--
ALTER TABLE `axappoinment`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axfeedback`
--
ALTER TABLE `axfeedback`
  MODIFY `feedbackId` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axhistory`
--
ALTER TABLE `axhistory`
  MODIFY `Id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axorder`
--
ALTER TABLE `axorder`
  MODIFY `orderId` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axpackages`
--
ALTER TABLE `axpackages`
  MODIFY `packageId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `axpatient`
--
ALTER TABLE `axpatient`
  MODIFY `patientId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `axrating`
--
ALTER TABLE `axrating`
  MODIFY `ratingId` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axsetting`
--
ALTER TABLE `axsetting`
  MODIFY `settingId` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axshifts`
--
ALTER TABLE `axshifts`
  MODIFY `shiftId` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axspecialist`
--
ALTER TABLE `axspecialist`
  MODIFY `doctorId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `axspeciality`
--
ALTER TABLE `axspeciality`
  MODIFY `specialityId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `axsubscription`
--
ALTER TABLE `axsubscription`
  MODIFY `subscribeId` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `axsymptoms`
--
ALTER TABLE `axsymptoms`
  MODIFY `symptomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
