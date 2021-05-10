-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2021 at 12:35 PM
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
-- Table structure for table `appeals`
--

CREATE TABLE `appeals` (
  `id` int(100) NOT NULL,
  `appealId` varchar(100) NOT NULL,
  `appealCode` varchar(100) NOT NULL,
  `center` varchar(100) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `bloodType` varchar(100) NOT NULL,
  `dueDate` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appeals`
--

INSERT INTO `appeals` (`id`, `appealId`, `appealCode`, `center`, `userId`, `bloodType`, `dueDate`, `createdAt`, `status`) VALUES
(1, '60952f8ddad33', 'REQ-93LP', 'Kabarak University', '605984e5c9937', 'B+', '2021-05-07T11:38:07.365Z', '2021-05-07 12:16:13', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(100) NOT NULL,
  `appointmentId` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `center` varchar(100) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointmentId`, `code`, `date`, `center`, `userId`, `createdAt`, `status`) VALUES
(2, '609517076cb32', 'AP-6T5W', '2021-05-08T09:30:15.642Z', 'Nakuru Level 5 Hospital', '605984e5c9937', '2021-05-07 10:31:35', 'Complete');

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

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(100) NOT NULL,
  `donationId` varchar(100) NOT NULL,
  `donorId` varchar(100) NOT NULL,
  `donationCode` varchar(100) NOT NULL,
  `donorName` varchar(100) NOT NULL,
  `donationCenter` varchar(100) NOT NULL,
  `donatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `recipient` varchar(100) DEFAULT NULL,
  `donationVol` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donationId`, `donorId`, `donationCode`, `donorName`, `donationCenter`, `donatedOn`, `recipient`, `donationVol`, `status`) VALUES
(1, '6097b86b547a0', '605984e5c9937', 'DN-736P', 'MyDonor Admin', 'Nakuru Level 5 Hospital', '2021-05-09 10:24:43', NULL, '2', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `userId` varchar(30) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `town` varchar(100) NOT NULL,
  `county` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `bloodType` varchar(4) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `fullname`, `username`, `email`, `phone`, `town`, `county`, `gender`, `weight`, `height`, `bloodType`, `designation`, `password`, `added`, `status`) VALUES
(1, '605984e5c9937', 'MyDonor Admin', 'admin', 'admin@mydonor.com', '079009892', 'Nakuru', 'Nakuru', 'M', '70', '178', 'A+', 'admin', '$2y$10$eNGK8smrPlsfI6ZegicbGuSq4gHwp71iP/LsRbE/lAnq1UmGFiuxu', '2021-05-06 15:51:02', 'active'),
(2, '607d143acda9d', 'Martin Magana', 'mmagana', 'vmartxsm@gmail.com', '0900898097', 'Kenya', 'Bungoma', 'M', '68', '123', 'A+', 'Admin', '$2y$10$E69M403mB2tc5GB23nqUnOJPRtszQIeNjxqgZG/LJSKcC3emMmAmy', '2021-04-19 05:25:14', 'active'),
(3, '607d14be6f988', 'Hamisa Mobeto', 'hmobeto', 'hamisa@mobeto.co.ke', '382899232', 'Mwanza', 'Bungoma', 'F', '89', '189', 'O+', 'Manager', '$2y$10$OOnxe0o0yeY3OS8IRZ22tuPF0h53uP45W26ZxA3m3Mbsdfmd0Uj/i', '2021-04-19 05:27:26', 'active'),
(5, '6093a2d2b075e', 'Tt Tyg', 'ttyg', 'hhch@gfg', '656', 'Garissa', 'Garissa', 'F', '45', '126', 'AB-', 'user', '001', '2021-05-06 08:03:30', 'active'),
(6, '6093a5c6e195c', 'James Kimani', 'jkimani', 'kimanij@gmail.com', '649979994', 'Kenya', 'Elgeyo-Marakwet', 'M', '28', '218', 'B+', 'user', '009', '2021-05-06 08:16:06', 'active'),
(7, '6093a78c0f242', 'Kima Hdhd', 'khdhd', 'Gdhdh', '65659', 'F', 'Bomet', '', '7283', '2151', 'o+', 'user', '009', '2021-05-06 08:23:40', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
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
-- AUTO_INCREMENT for table `appeals`
--
ALTER TABLE `appeals`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
