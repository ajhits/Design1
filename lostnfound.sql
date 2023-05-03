-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 07:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostnfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `datefound` date NOT NULL,
  `type` varchar(500) NOT NULL,
  `othertype` varchar(500) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `color` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `location` varchar(250) NOT NULL,
  `otherloc` varchar(250) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `datefound`, `type`, `othertype`, `brand`, `color`, `date`, `description`, `location`, `otherloc`, `image_01`, `image_02`) VALUES
(1, 'AJ De Roque', '2023-04-28', 'Book', '', 'Math', 'Brown', '2023-04-30', 'Silver keychain, spiral, small', 'CED Building', '', 'image.jpg', 'image.jpg'),
(2, 'Elaine Regonia', '2023-04-29', 'Umbrella', '', 'None', 'Pink', '2023-04-30', 'Automatic umbrella, dot pattern, has name of emily', 'CEA Building', '', '16828676367445612790191973298855.jpg', '16828676680547396876557105473223.jpg'),
(3, 'Maria Reyes ', '2023-04-27', 'Wallet', '', 'None', 'Pink', '2023-04-30', '75 pesos, may multiple ID, 6 card slot', 'CEA Building', '', '16828679320856212265672946362110.jpg', '16828679548537241592778465122755.jpg'),
(4, 'testing', '2023-04-24', 'Book', '', 'sds', 'sdsd', '2023-04-30', 'sdsd', 'CEA Building', '', 'lock.png', 'lock.png'),
(5, 'Paulo Tupas', '2023-05-01', 'Ballpen', '', 'HBW', 'Black', '2023-05-02', 'Full Ink, No Cap', 'CED Building', '', 'searchicon.png', 'searchicon.png'),
(6, 'Sir Nequit', '2023-05-01', 'Other', 'Helmet', 'HJC', 'Green', '2023-05-02', 'Tinted Visor, Spoiler, Full Face', 'Park', '', 'searchicon.png', 'searchicon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
