-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2019 at 11:14 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_line`
--

CREATE TABLE `chat_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `line_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_user`
--

CREATE TABLE `chat_user` (
  `id` int(11) NOT NULL,
  `handle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events_happening`
--

CREATE TABLE `events_happening` (
  `Event_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Event_Name` varchar(255) NOT NULL,
  `Max_players` int(11) NOT NULL,
  `Min_players` int(11) NOT NULL,
  `Sport_Name` varchar(255) NOT NULL,
  `Start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `End_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_happening`
--

INSERT INTO `events_happening` (`Event_ID`, `User_ID`, `Event_Name`, `Max_players`, `Min_players`, `Sport_Name`, `Start_time`, `End_time`) VALUES
(1, 1, 'myevent', 11, 4, 'football', '2019-04-02 14:00:00', '2019-04-02 18:00:00'),
(2, 1, 'myevent', 12, 4, 'cricket', '2019-04-02 18:00:00', '2019-04-02 20:00:00'),
(21, 1, 'hammad', 11, 5, 'football', '2019-05-24 14:00:00', '2019-05-24 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Place_Name` tinytext NOT NULL,
  `Address` tinytext NOT NULL,
  `Location_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Place_Name`, `Address`, `Location_ID`) VALUES
('Jacobs Football Field', 'Jacobs University Bremen', 1),
('Jacobs Sports hall 1', 'Jacobs University Bremen', 2);

-- --------------------------------------------------------

--
-- Table structure for table `location_properties`
--

CREATE TABLE `location_properties` (
  `Weather` tinytext NOT NULL,
  `Sport_Types` mediumtext NOT NULL,
  `Surface_Type` tinytext NOT NULL,
  `Location_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_properties`
--

INSERT INTO `location_properties` (`Weather`, `Sport_Types`, `Surface_Type`, `Location_ID`) VALUES
('Cloudy', 'Football', 'Grass', 1),
('Indoor', 'Badminton, Cheerleading', 'Mat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `User_ID` int(11) NOT NULL,
  `User_Name` tinytext NOT NULL,
  `Age` int(11) NOT NULL,
  `Picture` blob NOT NULL,
  `Phone_Number` int(11) NOT NULL,
  `Email` tinytext NOT NULL,
  `Address` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`User_ID`, `User_Name`, `Age`, `Picture`, `Phone_Number`, `Email`, `Address`) VALUES
(1, 'Sanan', 21, '', 1625243071, 'sananbintahir@gmail.com', 'abc123'),
(2, 'hammad', 15, '', 1228123, 'h.imran', 'abc321'),
(3, 'usama', 12, '', 24254213, 'usama.sheikh', 'everywhere'),
(4, 'panda', 69, '', 90078601, 'panda@hotie.com', 'lost'),
(5, 'waleed', 12, '', 734739388, 'waleed123', 'helloitsme'),
(6, 'amin', 2, '', 7382728, 'yo', 'netflix and chill'),
(7, 'collegeoffice', 31, '', 7383738, 'lostchairs', 'home away from home'),
(8, 'ande wala burger', 11, '', 73737, 'shami', 'kameez'),
(9, 'batman', 34, '', 73737, 'deadparents', 'spiderman'),
(10, 'momo ki toppi', 23, '', 838347, 'kalli', 'mundi');

-- --------------------------------------------------------

--
-- Table structure for table `organizer_feedback`
--

CREATE TABLE `organizer_feedback` (
  `User_ID` int(11) NOT NULL,
  `Content` mediumtext NOT NULL,
  `Post_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizer_ratings`
--

CREATE TABLE `organizer_ratings` (
  `User_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `User_ID` int(11) NOT NULL,
  `User_Name` tinytext NOT NULL,
  `Age` int(11) NOT NULL,
  `Picture` blob NOT NULL,
  `Phone_Number` int(11) NOT NULL,
  `Email` tinytext NOT NULL,
  `Address` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`User_ID`, `User_Name`, `Age`, `Picture`, `Phone_Number`, `Email`, `Address`) VALUES
(1, 'Sanan', 21, '', 1625243071, 'sananbintahir@gmail.com', 'abc123'),
(2, 'hammad', 15, '', 1228123, 'h.imran', 'abc321'),
(3, 'usama', 12, '', 24254213, 'usama.sheikh', 'everywhere'),
(4, 'panda', 69, '', 90078601, 'panda@hotie.com', 'lost'),
(5, 'waleed', 12, '', 734739388, 'waleed123', 'helloitsme'),
(6, 'amin', 2, '', 7382728, 'yo', 'netflix and chill'),
(7, 'collegeoffice', 31, '', 7383738, 'lostchairs', 'home away from home'),
(8, 'ande wala burger', 11, '', 73737, 'shami', 'kameez'),
(9, 'batman', 34, '', 73737, 'deadparents', 'spiderman'),
(10, 'momo ki toppi', 23, '', 838347, 'kalli', 'mundi');

-- --------------------------------------------------------

--
-- Table structure for table `player_feedback`
--

CREATE TABLE `player_feedback` (
  `User_ID` int(11) NOT NULL,
  `Content` mediumtext NOT NULL,
  `Post_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `player_ratings`
--

CREATE TABLE `player_ratings` (
  `User_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `Sport_Name` varchar(255) NOT NULL,
  `Sport_Type` tinytext NOT NULL,
  `Rules` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`Sport_Name`, `Sport_Type`, `Rules`) VALUES
('badminton', 'indoor', 'hit shuttle.'),
('Cheerleading', 'indoor', 'stuff'),
('cricket', 'outdoor', 'hit ball. catch ball.'),
('Football', 'Outdoor', 'kick ball. stop ball.');

-- --------------------------------------------------------

--
-- Table structure for table `sport_details`
--

CREATE TABLE `sport_details` (
  `Sport_Name` varchar(255) NOT NULL,
  `Num_Of_Teams` tinytext NOT NULL,
  `Required_Equipement` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport_details`
--

INSERT INTO `sport_details` (`Sport_Name`, `Num_Of_Teams`, `Required_Equipement`) VALUES
('badminton', '2', 'Racquets, Shuttles'),
('Cheerleading', '1', 'Pompoms, props'),
('cricket', '2', 'Bats, Balls'),
('Football', '2', 'Footballs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `User_Name` tinytext NOT NULL,
  `Age` int(11) NOT NULL,
  `Picture` blob,
  `Phone_Number` int(11) NOT NULL,
  `Email` tinytext NOT NULL,
  `Address` tinytext NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_Name`, `Age`, `Picture`, `Phone_Number`, `Email`, `Address`, `Password`) VALUES
(1, 'Sanan', 21, '', 1625243071, 'sananbintahir@gmail.com', 'abc123', ''),
(2, 'hammad', 15, NULL, 1228123, 'h.imran', 'abc321', ''),
(3, 'usama', 12, NULL, 24254213, 'usama.sheikh', 'everywhere', ''),
(4, 'panda', 69, NULL, 90078601, 'panda@hotie.com', 'lost', ''),
(5, 'waleed', 12, NULL, 734739388, 'waleed123', 'helloitsme', ''),
(6, 'amin', 2, NULL, 7382728, 'yo', 'netflix and chill', ''),
(7, 'collegeoffice', 31, NULL, 7383738, 'lostchairs', 'home away from home', ''),
(8, 'ande wala burger', 11, NULL, 73737, 'shami', 'kameez', ''),
(9, 'batman', 34, NULL, 73737, 'deadparents', 'spiderman', ''),
(10, 'momo ki toppi', 23, NULL, 838347, 'kalli', 'mundi', ''),
(11, 'sbintahir', 21, 0x4469676974616c5f70686f746f2e6a7067, 1625243071, 'sananbintahir@gmail.com', 'College Ring 7, Mailbox 924, Jacobs University, Bremen', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_line`
--
ALTER TABLE `chat_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_id` (`chat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_happening`
--
ALTER TABLE `events_happening`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `location_properties`
--
ALTER TABLE `location_properties`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `organizer_feedback`
--
ALTER TABLE `organizer_feedback`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `organizer_ratings`
--
ALTER TABLE `organizer_ratings`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `player_feedback`
--
ALTER TABLE `player_feedback`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `player_ratings`
--
ALTER TABLE `player_ratings`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`Sport_Name`);

--
-- Indexes for table `sport_details`
--
ALTER TABLE `sport_details`
  ADD PRIMARY KEY (`Sport_Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_line`
--
ALTER TABLE `chat_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_happening`
--
ALTER TABLE `events_happening`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_line`
--
ALTER TABLE `chat_line`
  ADD CONSTRAINT `chat_line_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chat_line_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `chat_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD CONSTRAINT `chat_user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `location_properties`
--
ALTER TABLE `location_properties`
  ADD CONSTRAINT `location_properties_ibfk_1` FOREIGN KEY (`Location_ID`) REFERENCES `location` (`Location_ID`) ON DELETE CASCADE;

--
-- Constraints for table `organizers`
--
ALTER TABLE `organizers`
  ADD CONSTRAINT `organizers_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `organizer_feedback`
--
ALTER TABLE `organizer_feedback`
  ADD CONSTRAINT `organizer_feedback_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `organizers` (`User_ID`);

--
-- Constraints for table `organizer_ratings`
--
ALTER TABLE `organizer_ratings`
  ADD CONSTRAINT `organizer_ratings_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `organizers` (`User_ID`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `player_feedback`
--
ALTER TABLE `player_feedback`
  ADD CONSTRAINT `player_feedback_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `players` (`User_ID`);

--
-- Constraints for table `player_ratings`
--
ALTER TABLE `player_ratings`
  ADD CONSTRAINT `player_ratings_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `players` (`User_ID`);

--
-- Constraints for table `sport_details`
--
ALTER TABLE `sport_details`
  ADD CONSTRAINT `sport_details_ibfk_1` FOREIGN KEY (`Sport_Name`) REFERENCES `sports` (`Sport_Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
