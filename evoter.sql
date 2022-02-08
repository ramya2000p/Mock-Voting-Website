-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 04:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoter`
--

-- --------------------------------------------------------

--
-- Table structure for table `ballot`
--

CREATE TABLE `ballot` (
  `ballot_id` int(11) NOT NULL,
  `voter_id` int(255) NOT NULL,
  `candidate_id` int(255) NOT NULL,
  `election_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ballot`
--

INSERT INTO `ballot` (`ballot_id`, `voter_id`, `candidate_id`, `election_id`) VALUES
(1, 2, 3, 1),
(3, 1, 1, 1),
(4, 4, 3, 1),
(5, 5, 2, 1),
(6, 8, 1, 1),
(7, 9, 23, 1),
(8, 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `party` varchar(255) NOT NULL,
  `total_votes` int(255) NOT NULL,
  `election_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `name`, `party`, `total_votes`, `election_id`) VALUES
(1, 'Wong Yin Zi', 'Banana Party', 3, 1),
(2, 'Arianne Arshwani', 'Apple Party', 1, 1),
(3, 'Clarence Ng', 'Honeydew Party', 2, 1),
(23, 'Nicole Danielle', 'Pomegranate Party', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `election_id` int(11) NOT NULL,
  `election_name` varchar(255) NOT NULL,
  `date_due` date NOT NULL,
  `time_due` time NOT NULL,
  `winner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`election_id`, `election_name`, `date_due`, `time_due`, `winner`) VALUES
(1, '2021 Penang State Election', '2021-11-30', '23:59:00', 'Wong Yin Zi');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `city` varchar(255) NOT NULL,
  `voters` int(11) NOT NULL,
  `num_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`city`, `voters`, `num_votes`) VALUES
('Air Itam', 1, 1),
('Alma', 0, 0),
('Ara Kuda', 0, 0),
('Bagan Ajam', 0, 0),
('Bagan Dalam', 0, 0),
('Bagan Lalang', 0, 0),
('Bagan Luar', 0, 0),
('Bagan Nyior', 1, 1),
('Balik Pulau', 0, 0),
('Bandar Cassia', 2, 1),
('Bandar Perai Jaya', 0, 0),
('Bandar Perda', 0, 0),
('Bandar Sri Pinang', 0, 0),
('Bandar Tasek Mutiara', 0, 0),
('Batu Ferringhi', 0, 0),
('Batu Kawan', 0, 0),
('Batu Lanchang', 0, 0),
('Batu Maung', 0, 0),
('Batu Uban', 1, 1),
('Bayan Baru', 0, 0),
('Bayan Lepas', 2, 2),
('Berapit', 0, 0),
('Bukit Berangan', 0, 0),
('Bukit Gambir', 0, 0),
('Bukit Gedung', 0, 0),
('Bukit Jambul', 0, 0),
('Bukit Mertajam', 0, 0),
('Bukit Minyak', 0, 0),
('Bukit Tambun', 0, 0),
('Bukit Tengah', 0, 0),
('Bukit Tok Alang', 0, 0),
('Bumbung Lima', 0, 0),
('Butterworth', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `voter_id` int(11) NOT NULL,
  `ic_num` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `street_add` varchar(255) NOT NULL,
  `postcode` int(7) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `ballot_id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`voter_id`, `ic_num`, `name`, `dob`, `gender`, `street_add`, `postcode`, `city`, `state`, `ballot_id`, `password`) VALUES
(1, '001220070858', 'Ramya Pandian', '2000-12-20', 'Female', 'No. 7, Pintasan Kelicap 3, Sunway Merica', 11900, 'Bayan Lepas', 'Penang', 3, 'waterbottle123'),
(2, '002902070858', 'Mark Ling', '2000-02-29', 'Male', 'No. 7, Pintasan Kelicap 3, Sunway Merica', 11900, 'Bayan Lepas', 'Penang', 1, 'monstermt07'),
(4, '730713094582', 'Paragati Radha', '1973-07-13', 'Female', 'No. 2, Lorong Buku', 11487, 'Batu Kawan', 'Penang', 4, 'ilikebooks123'),
(5, '030729070568', 'Harish Ramachandra', '2003-07-29', 'Male', 'No. 8, Denai 6', 11900, 'Bandar Cassia', 'Penang', 5, 'spiderman'),
(7, '1234', 'Admin', '0000-00-00', '[value-', '[value-6]', 0, '[value-8]', '[value-9]', 0, 'admin'),
(8, '981215046581', 'Julia Roberts', '1998-12-15', 'Female', 'No. 10, Lorong Susu', 11455, 'Air Itam', 'Penang', 6, 'ilikemovies'),
(9, '011220084562', 'Marcus Leong', '2001-12-20', 'Male', 'No. 3, Jalan Tongkat, Taman Pewira', 11458, 'Bagan Nyior', 'Penang', 7, 'marcusleong'),
(10, '000420147596', 'Muhammed Fiqri', '2000-04-20', 'Male', 'No. 1, Jalan Sultan Idris ', 11855, 'Batu Uban', 'Penang', 8, 'fiqri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ballot`
--
ALTER TABLE `ballot`
  ADD PRIMARY KEY (`ballot_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`election_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD UNIQUE KEY `city` (`city`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ballot`
--
ALTER TABLE `ballot`
  MODIFY `ballot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `voter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
