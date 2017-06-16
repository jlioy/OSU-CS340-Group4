-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Jun 15, 2017 at 10:55 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_haleyg`
--

-- --------------------------------------------------------

--
-- Table structure for table `ActiveFires`
--

CREATE TABLE `ActiveFires` (
  `FireID` int(6) NOT NULL,
  `DateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ActiveFires`
--

INSERT INTO `ActiveFires` (`FireID`, `DateCreated`) VALUES
(111111, '2017-06-15'),
(123456, '2017-06-12'),
(222222, '2017-06-13'),
(564121, '2017-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `AdminPriv`
--

CREATE TABLE `AdminPriv` (
  `UserID` varchar(20) NOT NULL,
  `DelFires` tinyint(1) NOT NULL,
  `CreateFires` tinyint(1) NOT NULL,
  `CreateAcct` tinyint(1) NOT NULL,
  `MarkExt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AdminPriv`
--

INSERT INTO `AdminPriv` (`UserID`, `DelFires`, `CreateFires`, `CreateAcct`, `MarkExt`) VALUES
('', 0, 1, 0, 0),
('1234', 1, 1, 1, 1),
('2345', 0, 1, 0, 0),
('3456', 1, 1, 0, 1),
('5678', 1, 1, 0, 1),
('lioyj', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `DeletedFireReports`
--

CREATE TABLE `DeletedFireReports` (
  `FireID` int(16) NOT NULL,
  `DateCreated` date NOT NULL,
  `FireActivity` text NOT NULL,
  `FireSize` varchar(32) NOT NULL,
  `IncidentCommander` varchar(32) NOT NULL,
  `FireLocation` varchar(32) NOT NULL,
  `PointOfAccess` text NOT NULL,
  `FireStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DeletedFireReports`
--

INSERT INTO `DeletedFireReports` (`FireID`, `DateCreated`, `FireActivity`, `FireSize`, `IncidentCommander`, `FireLocation`, `PointOfAccess`, `FireStatus`) VALUES
(987536, '2017-04-05', 'Crowning', '1500 acres', 'John Brown', '43.621292, -119.116212', 'Radar road', 1);

--
-- Triggers `DeletedFireReports`
--
DELIMITER $$
CREATE TRIGGER `DeleteFromActiveFires` BEFORE INSERT ON `DeletedFireReports` FOR EACH ROW BEGIN
IF new.FireStatus = 1 AND new.FireID IN (SELECT FireID From ActiveFires)
THEN
DELETE FROM ActiveFires
WHERE FireID = new.FireID;
ELSEIF new.FireStatus = 0 AND new.FireID in (SELECT FireID FROM ExtinguishedFireReports)
THEN
DELETE FROM ExtinguishedFireReports
WHERE FireID = new.FireID;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `EmptyDeleted` AFTER INSERT ON `DeletedFireReports` FOR EACH ROW if((SELECT COUNT(FireID) FROM DeletedFireReports) > 50)
THEN
DELETE FROM DeletedFireReports;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ExtinguishedFireReports`
--

CREATE TABLE `ExtinguishedFireReports` (
  `FireID` int(6) NOT NULL,
  `DateExtinguished` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ExtinguishedFireReports`
--

INSERT INTO `ExtinguishedFireReports` (`FireID`, `DateExtinguished`) VALUES
(0, '0000-00-00'),
(112233, '2017-05-12'),
(123454, '0000-00-00');

--
-- Triggers `ExtinguishedFireReports`
--
DELIMITER $$
CREATE TRIGGER `DeleteFromActiveFire` AFTER INSERT ON `ExtinguishedFireReports` FOR EACH ROW BEGIN
IF new.FireID IN (SELECT FireID FROM ActiveFires)
THEN
DELETE FROM ActiveFires
WHERE new.FireID = ActiveFires.FireID;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `FireReports`
--

CREATE TABLE `FireReports` (
  `FireID` int(6) NOT NULL,
  `FireActivity` text NOT NULL,
  `FireSize` varchar(32) NOT NULL,
  `IncidentCommander` varchar(32) NOT NULL,
  `FireLocation` varchar(32) NOT NULL,
  `PointOfAccess` text NOT NULL,
  `DateCreated` date NOT NULL,
  `FireStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FireReports`
--

INSERT INTO `FireReports` (`FireID`, `FireActivity`, `FireSize`, `IncidentCommander`, `FireLocation`, `PointOfAccess`, `DateCreated`, `FireStatus`) VALUES
(0, '', '', '', '', '', '0000-00-00', 0),
(111111, 'Crowning', '250 Acres', 'Stanley Kubrick', '44.909728, -120.722706', 'Antelope post office', '2017-06-15', 1),
(112233, 'Inactive', '< 1 acre', 'Group 4', '44.562574, -123.275505', 'OSU', '2017-05-12', 0),
(123454, '', '', '', '', '', '0000-00-00', 0),
(123456, 'Crowning', '100 Acres', 'Bobby Jindal', '44.922179, -123.077461', 'Minto Brown Park', '2017-06-12', 1),
(222222, 'Crowning', '5000 acres', 'Joshua Lioy', '44.086667, -121.553848', 'Bend', '2017-06-13', 1),
(564121, 'Crowning', '50 Acres', 'Napoleon Solo', '44.383525, -123.742360', 'Alsea highway', '2017-05-17', 1);

--
-- Triggers `FireReports`
--
DELIMITER $$
CREATE TRIGGER `MoveFireToStatus` AFTER INSERT ON `FireReports` FOR EACH ROW BEGIN
IF new.FireStatus = 1
THEN
INSERT INTO ActiveFires
(FireID, DateCreated) VALUES ( new.FireID, new.DateCreated);
ELSE
INSERT INTO ExtinguishedFireReports
(FireID, DateExtinguished) VALUES ( new.FireID, new.DateCreated );
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `MoveToDelete` BEFORE DELETE ON `FireReports` FOR EACH ROW INSERT  INTO DeletedFireReports
(
 FireID,DateCreated, FireActivity,FireSize,IncidentCommander,	FireLocation,PointOfAccess,FireStatus
)
VALUES
(OLD.FireID ,OLD.DateCreated ,OLD.FireActivity, OLD.FireSize ,
 OLD.IncidentCommander , OLD.FireLocation,  OLD.PointOfAccess , OLD.FireStatus)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `UserID` varchar(20) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`UserID`, `Position`, `Name`, `Pass`) VALUES
('', 'Select One', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('1234', 'supervisor', 'John', '5d41402abc4b2a76b9719d911017c592'),
('2345', 'firefighter', 'Joe', '5d41402abc4b2a76b9719d911017c592'),
('3456', 'dispatch', 'Bob', '5d41402abc4b2a76b9719d911017c592'),
('5678', 'dispatch', 'Sue', '5d41402abc4b2a76b9719d911017c592'),
('lioyj', 'supervisor', 'Joshua Lioy', '64d1f88b9b276aece4b0edcc25b7a434');

--
-- Triggers `USERS`
--
DELIMITER $$
CREATE TRIGGER `DeleteAdminPrivs` BEFORE DELETE ON `USERS` FOR EACH ROW DELETE FROM AdminPriv
WHERE AdminPriv.UserID = old.userID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `setAdminPrivs` AFTER INSERT ON `USERS` FOR EACH ROW IF new.Position = "Dispatch"
THEN
INSERT INTO AdminPriv
(UserID, DelFires,CreateFires,CreateAcct,MarkExt) VALUES ( new.UserID, '1','1','0','1');

ELSEIF new.Position = "Supervisor"
THEN
INSERT INTO AdminPriv
(UserID, DelFires,CreateFires,CreateAcct,MarkExt) VALUES ( new.UserID, '1','1','1','1');

ELSE
INSERT INTO AdminPriv
(UserID, DelFires,CreateFires,CreateAcct,MarkExt) VALUES ( new.UserID, '0','1','0','0');
END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ActiveFires`
--
ALTER TABLE `ActiveFires`
  ADD PRIMARY KEY (`FireID`);

--
-- Indexes for table `AdminPriv`
--
ALTER TABLE `AdminPriv`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `ExtinguishedFireReports`
--
ALTER TABLE `ExtinguishedFireReports`
  ADD PRIMARY KEY (`FireID`);

--
-- Indexes for table `FireReports`
--
ALTER TABLE `FireReports`
  ADD PRIMARY KEY (`FireID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AdminPriv`
--
ALTER TABLE `AdminPriv`
  ADD CONSTRAINT `AdminPriv_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `USERS` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
