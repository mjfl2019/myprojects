-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 10:15 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queuing`
--

-- --------------------------------------------------------

--
-- Table structure for table `qtable`
--

CREATE TABLE `qtable` (
  `q_id` int(11) NOT NULL,
  `queuer` varchar(45) NOT NULL,
  `q_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qtable`
--

INSERT INTO `qtable` (`q_id`, `queuer`, `q_no`) VALUES
(1, 'NewAcct', 1),
(2, 'Teller1', 2),
(3, 'Teller2', 3),
(4, 'Loans1', 4),
(5, 'Loans2', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qtable`
--
ALTER TABLE `qtable`
  ADD PRIMARY KEY (`q_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
