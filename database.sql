-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 11:31 AM
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
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `service` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `colony` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `mobile`, `type`, `service`, `date`, `timeslot`, `state`, `district`, `street`, `colony`, `pincode`, `created_at`) VALUES
(1, 'nihal', 'nihaljakhar19@gmail.com', '8755209345', 'Electrician', 'Fan Repair', '2024-07-28', '12:00-02:00pm', 'Uttar Pradesh', 'Meerut', 'sdfhiushdof', 'scuasydgsayuc', '250341', '2024-07-28 08:02:09'),
(2, 'jscscgas', 'nihaljakhar19@gmail.com', '8755209345', 'Window AC', 'Not Working', '2024-07-28', '06:00-08:00am', 'Uttar Pradesh', 'Meerut', 'kjfhidsudhhf', 'ddcvsdg', '250341', '2024-07-28 08:02:50'),
(3, 'kjciasiudui', 'nihaljakhar19@gmail.com', '8755209345', 'Sound', 'Repair', '2024-07-28', '08:00-10:00am', 'Uttar Pradesh', 'Meerut', 'hsvyucgyuas', 'hsyuyugwsugcscc', '250341', '2024-07-28 08:08:31'),
(4, ' h jscyusadc', 'nihaljakhar19@gmail.com', '8755209345', 'Plumber', 'Leakage Problem', '2024-07-28', '06:00-08:00am', 'Uttar Pradesh', 'Meerut', 'jiscuisd', 'hctsa', '250341', '2024-07-28 08:09:09'),
(5, 'hgyufcsdayucsad', 'nihaljakhar19@gmail.com', '8755209345', 'Women', 'Cutting', '2024-07-28', '06:00-08:00am', 'Uttar Pradesh', 'Meerut', 'gciugsaf', 'cg8asgcgds', '250341', '2024-07-28 08:10:19'),
(6, 'suyxausy', 'nihaljakhar19@gmail.com', '8755209345', 'Male Cleaner', 'Room Cleaning', '2024-07-28', '08:00-10:00am', 'Uttar Pradesh', 'Meerut', 'as', 'as', '250341', '2024-07-28 08:11:10'),
(7, 'giudfgfds', 'nihaljakhar19@gmail.com', '8755234555', 'Carpanter', 'Repair', '2024-07-28', '06:00-08:00pm', 'Uttar Pradesh', 'Meerut', 'YYYU', 'ygyyu', '250341', '2024-07-28 08:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `engineer` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `colony` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineer`
--
ALTER TABLE `engineer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `engineer`
--
ALTER TABLE `engineer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
