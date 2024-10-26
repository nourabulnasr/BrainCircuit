-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 10:26 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,  -- Use a larger size for hashed passwords
  `UserType_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `users`
INSERT INTO `users` (`ID`, `UserName`, `Password`, `UserType_id`) VALUES
(1, 'Nada', '123', 1),
(2, 'Ahmed', '123', 2);

-- CREATE TABLE `Exam` (
--   `ID` int(11) NOT NULL AUTO_INCREMENT,
--   `Name` varchar(50) NOT NULL,
--   PRIMARY KEY (`ID`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Exams` (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  Title VARCHAR(100) NOT NULL,
  Description TEXT,
  CreatedBy INT NOT NULL,
  CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (CreatedBy) REFERENCES Users(ID)
);

CREATE TABLE `Questions` (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  ExamID INT NOT NULL,
  QuestionText TEXT NOT NULL,
  QuestionType ENUM('Multiple Choice', 'Text') NOT NULL,
  FOREIGN KEY (ExamID) REFERENCES Exams(ID)
);

CREATE TABLE `Choices`(
  ID INT PRIMARY KEY AUTO_INCREMENT,
  QuestionID INT NOT NULL,
  ChoiceText VARCHAR(255) NOT NULL,
  IsCorrect BOOLEAN NOT NULL DEFAULT FALSE,
  FOREIGN KEY (QuestionID) REFERENCES Questions(ID)
);

CREATE TABLE `UserExam` (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  UserID INT NOT NULL,
  ExamID INT NOT NULL,
  Score DECIMAL(5, 2),
  Status ENUM('Not Started', 'In Progress', 'Completed') DEFAULT 'Not Started',
  AttemptedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (UserID) REFERENCES Users(ID),
  FOREIGN KEY (ExamID) REFERENCES Exams(ID)
);
CREATE TABLE `UserAnswers` (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  UserExamID INT NOT NULL,
  QuestionID INT NOT NULL,
  AnswerText TEXT,
  ChoiceID INT,  -- Only applicable for multiple-choice questions
  IsCorrect BOOLEAN,
  FOREIGN KEY (UserExamID) REFERENCES UserExam(ID),
  FOREIGN KEY (QuestionID) REFERENCES Questions(ID),
  FOREIGN KEY (ChoiceID) REFERENCES Choices(ID)
);



CREATE TABLE `Progress` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ExamID` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`UserID`) REFERENCES `users`(`ID`),
  FOREIGN KEY (`ExamID`) REFERENCES `Exam`(`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;







-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `FreindlyName` varchar(50) NOT NULL,
  `Linkaddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `FreindlyName`, `Linkaddress`) VALUES
(1, 'Add Page', 'AddPage.php'),
(2, 'Edit Page', 'EditPage.php'),
(3, 'Add Client', 'AddClient.php'),
(4, 'Edit Client', 'EditClient.php'),
(5, 'View Profile', 'ViewProfile.php'),
(6, 'Edit Profile', 'EditProfile.php'),
(7, 'Pages Permission', 'Permission.php'),
(8, 'Login', 'login.php'),
(9, 'Sign Up', 'signup.php'),
(10, 'Delete Profile', 'delete.php'),
(11, 'Sign Out', 'signout.php');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`ID`, `Name`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Client'),
(4, 'Visitor');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

CREATE TABLE `usertype_pages` (
  `ID` int(11) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype_pages`
--

INSERT INTO `usertype_pages` (`ID`, `UserTypeID`, `PageID`) VALUES
(1, 1, 6),
(2, 1, 10),
(3, 1, 5),
(4, 1, 11),
(5, 1, 3),
(6, 1, 4),
(7, 1, 2),
(8, 1, 1),
(9, 1, 7),
(10, 2, 5),
(11, 2, 6),
(12, 2, 10),
(13, 2, 3),
(14, 2, 4),
(15, 2, 11),
(16, 4, 9),
(17, 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserTypeID` (`UserTypeID`),
  ADD KEY `PageID` (`PageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserType_id`) REFERENCES `usertypes` (`ID`);

--
-- Constraints for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD CONSTRAINT `usertype_pages_ibfk_1` FOREIGN KEY (`PageID`) REFERENCES `pages` (`ID`),
  ADD CONSTRAINT `usertype_pages_ibfk_2` FOREIGN KEY (`UserTypeID`) REFERENCES `usertypes` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
