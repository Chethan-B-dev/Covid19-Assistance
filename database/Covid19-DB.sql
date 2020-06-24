-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 07:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctorlogin`
--

CREATE TABLE `doctorlogin` (
  `id` mediumint(9) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorlogin`
--

INSERT INTO `doctorlogin` (`id`, `email`, `pass`) VALUES
(1, 'chethanborigin@gmail', 'Bhavika95');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logindoctor`
--

CREATE TABLE `logindoctor` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindoctor`
--

INSERT INTO `logindoctor` (`id`, `email`, `pass`, `username`) VALUES
(4, 'test@test.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(3) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `location`) VALUES
(1, 'chethan', 19, 'bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `patientadd`
--

CREATE TABLE `patientadd` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `age` int(3) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `loc` varchar(1000) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `cond` text DEFAULT NULL,
  `allergy` text NOT NULL,
  `emergency` text NOT NULL,
  `mh` text NOT NULL,
  `dob` text NOT NULL,
  `blood` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientadd`
--

INSERT INTO `patientadd` (`id`, `name`, `age`, `phone`, `loc`, `medicine`, `cond`, `allergy`, `emergency`, `mh`, `dob`, `blood`) VALUES
(178, 'Chethan B', 21, 9591833072, '#51,4th ccoss,Vidyanagar,Bommasandra,Bangalore-560099', ' idc', '      sadsasadasdadaddsa  ', ' sadasdsad', 'dafdsafs', '      sadsadsadsads  ', '', ''),
(179, 'Chethan B', 21, 9591833072, '#51,4th ccoss,Vidyanagar,Bommasandra,Bangalore-560099', ' idc', '      sadsasadasdadaddsa  ', ' sadasdsad', 'asdada', '      sadsadsadsads  ', '', ''),
(180, 'aasim', 21, 9591833072, '#51,4th ccoss,Vidyanagar,Bommasandra,Bangalore-560099', ' asdasdasdsadasdsad', '                idsadasdk        ', ' sadsad', 'asdsadad', '                  sdfsdfsdfdgfdgdfg', '', ''),
(181, 'dasdas', 2147483647, 9591833072, 'asdasd', ' asdasdasd', '  asdasdasd ', ' asdasdas', 'sadas', 'idk please leave me alone', '', ''),
(182, 'Chethan B', 21, 9591833072, '51 4th cross bommasandra', ' idc', '      sadsasadasdadaddsa  ', ' sadasdsad', 'Idk', '      sadsadsadsads  ', '', ''),
(183, 'Chethan B', 21, 9591833072, '#51,4th ccoss,Vidyanagar,Bommasandra,Bangalore-560099', ' idc', '      sadsasadasdadaddsa  ', ' sadasdsad', 'asdasd', '      sadsadsadsads  ', '13 May, 2020', 'sadsad'),
(184, 'Chethan B', 57, 9591833072, '#51,4th ccoss,Vidyanagar,Bommasandra,Bangalore-560099', ' rat poison', '  dead', 'dead doesn\'t matter', 'asdas', '      crack head', '6 April, 2000', 'a+'),
(185, 'Chethan B', 12, 9591833072, '#51,4th ccoss,Vidyanagar,Bommasandra,Bangalore-560099', ' ascsaad', '  sadas ', ' asdsad', 'asdad', 'idk lol he is dead maybe', '19 May, 2020', 'A+'),
(186, 'Chethan B', 21, 9591833072, '51 4th cross bommasandra', 'dsad', 'sad', 'dasdasd', 'asdsa', 'sdfsdfsdfsf', '7 May, 2020', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `perlogin`
--

CREATE TABLE `perlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perlogin`
--

INSERT INTO `perlogin` (`id`, `email`, `pass`, `username`) VALUES
(1, 'test@test.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `query1`
--

CREATE TABLE `query1` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `location` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query1`
--

INSERT INTO `query1` (`id`, `name`, `email`, `phone`, `location`, `message`) VALUES
(202, 'chethan', 'admin@test.com', 8212913213, 'sadsadsad', 'asdsadsadad'),
(203, 'chethan', 'admin@mail.comasdasd', 9591833072, 'sadsad', 'sadasdasdasdsad');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `user`, `pass`) VALUES
(1, 'hello', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `input` varchar(1000) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `input`, `name`, `age`) VALUES
(74, 'hello', ' Chethan B ', 21),
(75, 'hi there nice to meet you', ' Chethan B ', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorlogin`
--
ALTER TABLE `doctorlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `logindoctor`
--
ALTER TABLE `logindoctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientadd`
--
ALTER TABLE `patientadd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perlogin`
--
ALTER TABLE `perlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query1`
--
ALTER TABLE `query1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctorlogin`
--
ALTER TABLE `doctorlogin`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logindoctor`
--
ALTER TABLE `logindoctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patientadd`
--
ALTER TABLE `patientadd`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `perlogin`
--
ALTER TABLE `perlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `query1`
--
ALTER TABLE `query1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
