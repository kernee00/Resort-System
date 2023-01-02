-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 12:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(20) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `adminPhoneNo` varchar(20) NOT NULL,
  `adminEmail` varchar(30) NOT NULL,
  `adminPassword` varchar(12) NOT NULL,
  `profile_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPhoneNo`, `adminEmail`, `adminPassword`, `profile_image`) VALUES
('A01', 'Rabiatul Adawiyah', '133828644', 'rabi2248@gmail.com', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminpayment`
--

CREATE TABLE `adminpayment` (
  `adminPaymentID` int(11) NOT NULL,
  `totalAdminPayment` double(6,2) NOT NULL,
  `adminPaymentDate` date NOT NULL,
  `bookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminpayment`
--

INSERT INTO `adminpayment` (`adminPaymentID`, `totalAdminPayment`, `adminPaymentDate`, `bookingID`) VALUES
(1008, 50.00, '2023-01-02', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `totalPrice` double(6,2) DEFAULT NULL,
  `custID` varchar(20) NOT NULL,
  `resortID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `bookingDate`, `checkInDate`, `checkOutDate`, `totalPrice`, `custID`, `resortID`) VALUES
(100000, '2022-12-01', '2022-12-03', '2022-12-05', 500.00, 'syirah', 20001),
(100001, '2023-01-01', '2023-01-09', '2023-01-10', 240.00, 'syirah', 20001);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custID` varchar(20) NOT NULL,
  `custName` varchar(20) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `custEmail` varchar(30) NOT NULL,
  `custPassword` varchar(12) NOT NULL,
  `profile_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custID`, `custName`, `phoneNo`, `custEmail`, `custPassword`, `profile_image`) VALUES
('syirah', 'Rabiatul Adawiyah', '133828644', 'syirah02@gmail.com', 'syirah1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ownerID` varchar(20) NOT NULL,
  `ownerName` varchar(20) NOT NULL,
  `ownerPhoneNo` varchar(20) NOT NULL,
  `ownerEmail` varchar(30) NOT NULL,
  `accPassword` varchar(12) NOT NULL,
  `profile_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownerID`, `ownerName`, `ownerPhoneNo`, `ownerEmail`, `accPassword`, `profile_image`) VALUES
('marsya', 'Dini Marsya', '11117629', 'marsya12@gmail.com', 'marsya1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentID` int(11) NOT NULL,
  `totalPayment` double(6,2) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentType` varchar(30) NOT NULL,
  `paymentStatus` varchar(20) NOT NULL,
  `bookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentID`, `totalPayment`, `paymentDate`, `paymentType`, `paymentStatus`, `bookingID`) VALUES
(1000, 500.00, '2023-01-02', 'online banking', 'Paid', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingID` int(11) NOT NULL,
  `ratingDateTime` datetime NOT NULL,
  `marksRated` double(4,2) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `bookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resorts`
--

CREATE TABLE `resorts` (
  `resortID` int(11) NOT NULL,
  `resortName` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `resortPhoneNo` varchar(20) NOT NULL,
  `overallRatings` double(4,1) DEFAULT NULL,
  `keywords` varchar(50) DEFAULT NULL,
  `ownerID` varchar(20) NOT NULL,
  `coverPhoto` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resorts`
--

INSERT INTO `resorts` (`resortID`, `resortName`, `address`, `city`, `state`, `resortPhoneNo`, `overallRatings`, `keywords`, `ownerID`, `coverPhoto`) VALUES
(20000, 'Bunga Cengkih Resort', 'Tanjung Malai, 07000', 'Langkawi', 'Kedah', '0113872662', 4.2, 'seaview', 'marsya', NULL),
(20001, 'Hibiscus Resort', 'GH, 69000', 'Genting Highlands', 'Pahang', '0113072221', 4.7, 'genting view', 'marsya', NULL),
(20003, 'Double Tree Resort', 'Jalan Damai Laut, Manjung, 32200', 'Lumut', 'Perak', '0376777911', 3.5, 'banjaran view', 'marsya', NULL),
(20005, 'Philea Resort & Spa', 'Lot 2940, Off Jalan Plaza Tol, 75450', 'Ayer Keroh', 'Melaka', '062893399', 3.9, 'private place', 'marsya', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resort_image`
--

CREATE TABLE `resort_image` (
  `imageID` int(11) NOT NULL,
  `resortID` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomID` int(11) NOT NULL,
  `pricePerNight` double(6,2) NOT NULL,
  `capacity` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `resortID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `pricePerNight`, `capacity`, `location`, `description`, `resortID`) VALUES
(2015, 120.00, 2, 'RA1 seaview', 'A', 20000),
(2016, 120.00, 2, 'RA2 seaview', 'A', 20000),
(2017, 120.00, 2, 'RA3 seaview', 'A', 20000),
(2018, 110.00, 2, 'RB1 cityview', 'A', 20000),
(2019, 110.00, 2, 'RB2 cityview', 'A', 20000),
(2020, 110.00, 2, 'RB3 cityview', 'A', 20000),
(2021, 250.00, 2, 'RA1 seaview', 'A', 20001),
(2022, 250.00, 2, 'RA2 seaview', 'A', 20001),
(2023, 250.00, 2, 'RA3 seaview', 'A', 20001),
(2024, 240.00, 2, 'RB1 cityview', 'A', 20001),
(2025, 240.00, 2, 'RB2 cityview', 'A', 20001),
(2026, 240.00, 2, 'RB3 cityview', 'A', 20001),
(2027, 220.00, 2, 'RC1 poolview', 'A', 20001),
(2028, 220.00, 2, 'RC2 poolview', 'A', 20001),
(2029, 220.00, 2, 'RC3 poolview', 'A', 20001),
(2030, 190.00, 2, 'RA1 seaview', 'A', 20003),
(2031, 190.00, 2, 'RA2 seaview', 'A', 20003),
(2032, 190.00, 2, 'RA3 seaview', 'A', 20003),
(2033, 170.00, 2, 'RB1 cityview', 'A', 20003),
(2034, 170.00, 2, 'RB2 cityview', 'A', 20003),
(2035, 170.00, 2, 'RB3 cityview', 'A', 20003),
(2036, 150.00, 2, 'RC1 poolview', 'A', 20003),
(2037, 150.00, 2, 'RC2 poolview', 'A', 20003),
(2038, 150.00, 2, 'RC3 poolview', 'A', 20003),
(2039, 210.00, 2, 'RA1 seaview', 'A', 20005),
(2040, 210.00, 2, 'RA2 seaview', 'A', 20005),
(2041, 210.00, 2, 'RA3 seaview', 'A', 20005),
(2042, 240.00, 3, 'RB1 cityview', 'A', 20005),
(2043, 240.00, 3, 'RB2 cityview', 'A', 20005),
(2044, 240.00, 3, 'RB3 cityview', 'A', 20005),
(2045, 200.00, 2, 'RC1 poolview', 'A', 20005),
(2046, 200.00, 2, 'RC2 poolview', 'A', 20005),
(2047, 200.00, 2, 'RC3 poolview', 'A', 20005);

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE `room_booking` (
  `bookingID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `prices` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`bookingID`, `roomID`, `prices`) VALUES
(100000, 2021, 500.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `adminpayment`
--
ALTER TABLE `adminpayment`
  ADD PRIMARY KEY (`adminPaymentID`),
  ADD KEY `admin_payment_fk` (`bookingID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `booking_fk` (`custID`),
  ADD KEY `resortID_fk` (`resortID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `payment_fk` (`bookingID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingID`),
  ADD KEY `rating_fk` (`bookingID`);

--
-- Indexes for table `resorts`
--
ALTER TABLE `resorts`
  ADD PRIMARY KEY (`resortID`),
  ADD KEY `resort_fk` (`ownerID`);

--
-- Indexes for table `resort_image`
--
ALTER TABLE `resort_image`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `resort_image_fk` (`resortID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `resort_rooms_fk` (`resortID`);

--
-- Indexes for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`bookingID`,`roomID`),
  ADD KEY `room_book_fk` (`roomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpayment`
--
ALTER TABLE `adminpayment`
  MODIFY `adminPaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `resorts`
--
ALTER TABLE `resorts`
  MODIFY `resortID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20006;

--
-- AUTO_INCREMENT for table `resort_image`
--
ALTER TABLE `resort_image`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2048;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminpayment`
--
ALTER TABLE `adminpayment`
  ADD CONSTRAINT `admin_payment_fk` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `booking_fk` FOREIGN KEY (`custID`) REFERENCES `customers` (`custID`),
  ADD CONSTRAINT `resortID_fk` FOREIGN KEY (`resortID`) REFERENCES `resorts` (`resortID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_fk` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating_fk` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`);

--
-- Constraints for table `resorts`
--
ALTER TABLE `resorts`
  ADD CONSTRAINT `resort_fk` FOREIGN KEY (`ownerID`) REFERENCES `owner` (`ownerID`);

--
-- Constraints for table `resort_image`
--
ALTER TABLE `resort_image`
  ADD CONSTRAINT `resort_image_fk` FOREIGN KEY (`resortID`) REFERENCES `resorts` (`resortID`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `resort_rooms_fk` FOREIGN KEY (`resortID`) REFERENCES `resorts` (`resortID`);

--
-- Constraints for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `resort_rooms_fk2` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`),
  ADD CONSTRAINT `room_book_fk` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
