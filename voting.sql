-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 01:37 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `party` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `age`, `sex`, `party`, `image`, `description`) VALUES
(1, 'prabash paudel', 21, 'male', 'spl', '/assets/uploads/1508397994_IMG_0733.JPG', ''),
(2, 'suman', 24, 'male', 'npl', '/assets/uploads/1508398016_IMG_0736.PNG', ''),
(4, 'pramod', 22, 'male', 'spl', '/assets/uploads/1508398085_IMG_1065 (Edited).JPG', ''),
(6, 'pranil', 21, 'male', 'dpl', '/assets/uploads/1508398037_IMG_0758.JPG', ''),
(7, 'sujan', 22, 'male', 'fpl', '/assets/uploads/1508398062_FullSizeRender.jpg', ''),
(11, 'suman', 23, 'male', 'dpl', '/assets/uploads/1508398164_IMG_0733.JPG', ''),
(12, 'pratibha', 26, 'female', 'spl', '/assets/uploads/1508398142_IMG_0758.JPG', ''),
(13, 'rayman', 23, 'female', 'fpl', '/assets/uploads/1508398191_IMG_0736.PNG', ''),
(15, 'rebati', 23, 'female', 'dpl', '/assets/uploads/1508398213_IMG_0757.JPG', ''),
(21, 'viper', 21, 'male', 'spl', '/assets/uploads/1508398261_IMG_0733.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `party` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin1', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
