-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 05:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'assistent', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tripID` int(11) NOT NULL,
  `StartDate` datetime NOT NULL,
  `child` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `totalAmount` double NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `user_id`, `tripID`, `StartDate`, `child`, `adult`, `totalAmount`, `status`) VALUES
(3, 3, 3, '2024-08-29 00:00:00', 4, 8, 100000, 'Pending'),
(4, 5, 3, '2024-08-30 00:00:00', 2, 5, 60000, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `ID` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `contact` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`ID`, `name`, `contact`, `email`, `message`) VALUES
(2, 'abc', '4567896542', 'abc@gmail.com', 'hi'),
(3, 'test', '4567896542', 'test@gmail.com', 'ldsjbsjkdb');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `ID` int(11) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `price_adult` double NOT NULL,
  `price_child` double NOT NULL,
  `duration` varchar(25) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`ID`, `destination`, `image`, `price_adult`, `price_child`, `duration`, `description`) VALUES
(3, 'Indonesia', 'places/destination-3.jpg', 10000, 5000, '5 days', 'Indonesia trip'),
(4, 'Singapore', 'places/about-2.jpg', 6000, 3000, '6 days', 'Singapore Trip'),
(5, 'India', 'places/carousel-1.jpg', 15000, 7000, '10 days', 'Kerela'),
(6, 'Thailand', 'places/blog-2.jpg', 1500, 550, '2 days', 'Thailand Trip');

-- --------------------------------------------------------

--
-- Table structure for table `tripgoal`
--

CREATE TABLE `tripgoal` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `goal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripgoal`
--

INSERT INTO `tripgoal` (`ID`, `userid`, `goal`) VALUES
(5, 5, 'World Trip');

-- --------------------------------------------------------

--
-- Table structure for table `trippost`
--

CREATE TABLE `trippost` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(120) NOT NULL,
  `post_detail` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trippost`
--

INSERT INTO `trippost` (`ID`, `user_id`, `post_title`, `post_detail`, `image`) VALUES
(4, 3, 'Indonesia', 'It was good Trip', 'post/carousel-2.jpg'),
(5, 3, 'Singapore', 'Trip was awesome', 'post/destination-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(125) NOT NULL,
  `Address` text NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Email` varchar(125) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Address`, `Contact`, `Email`, `Password`) VALUES
(3, 'Marry', 'XYZ road, US', '9874568525', 'marry@gmail.com', '1234'),
(5, 'jack', 'test', '7896541235', 'jack@gmail.com', '4567');

-- --------------------------------------------------------

--
-- Table structure for table `usermemories`
--

CREATE TABLE `usermemories` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `location` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermemories`
--

INSERT INTO `usermemories` (`ID`, `user_id`, `image`, `location`, `description`) VALUES
(5, 3, 'memories/about-1.jpg', 'India', 'Trip was awesome'),
(6, 3, 'memories/package-4.jpg', 'Singapore', 'Nice Trip'),
(7, 5, 'memories/blog-100x100.jpg', 'Thailand', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tripID` (`tripID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tripgoal`
--
ALTER TABLE `tripgoal`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `trippost`
--
ALTER TABLE `trippost`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usermemories`
--
ALTER TABLE `usermemories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tripgoal`
--
ALTER TABLE `tripgoal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trippost`
--
ALTER TABLE `trippost`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usermemories`
--
ALTER TABLE `usermemories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`tripID`) REFERENCES `trip` (`ID`);

--
-- Constraints for table `tripgoal`
--
ALTER TABLE `tripgoal`
  ADD CONSTRAINT `tripgoal_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `trippost`
--
ALTER TABLE `trippost`
  ADD CONSTRAINT `trippost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `usermemories`
--
ALTER TABLE `usermemories`
  ADD CONSTRAINT `usermemories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
