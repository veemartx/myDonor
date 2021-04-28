-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2021 at 02:09 PM
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
-- Database: `mydonor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(100) NOT NULL,
  `centerId` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `county` varchar(70) NOT NULL,
  `type` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `centerId`, `name`, `location`, `county`, `type`, `code`, `phone`, `email`, `status`) VALUES
(1, '6089279239c0d', 'MediHeal Nakuru', 'Along A104 Nakuru,Kenya', 'Nakuru', 'Hospital', 'MDL-3P16', '', '', 'active'),
(2, '608927e89a573', 'Valley Hospital Nakuru', 'opp Mt Kenya University', 'Nakuru', 'Hospital', 'MDL-8P2T', '', '', 'active'),
(3, '60892b522871c', 'Nakuru Level 5 Hospital', 'Hospital Road , Milimani ', 'Nakuru', 'Hospital', 'MDL-T70C', '090089809834', 'nakuruhospita@hsp.com', 'active'),
(4, '60892e91646d6', 'Kabarak University', 'Along Nakuru Sigor Rd Nakuru ', 'Nakuru', 'Center', 'MDL-PK7T', '0200983748', 'info@kabarak.ac.ke', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
