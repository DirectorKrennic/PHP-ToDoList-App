-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2020 at 07:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(11) NOT NULL,
  `todo_title` varchar(120) NOT NULL,
  `todo_description` varchar(220) NOT NULL,
  `todo_status` varchar(60) NOT NULL,
  `todo_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo_title`, `todo_description`, `todo_status`, `todo_date`) VALUES
(1, 'Go swimming', 'Go to the pool and do 32 laps', 'Done', '02/01/2020'),
(2, 'Walk Dog', 'Bring Bubbles for a walk', 'Pending', '01/01/2020'),
(5, 'Learn React', 'Learn about the lifecycle methods', 'Pending', '02/01/2020'),
(8, 'Go for a walk', 'Walk down to the park and walk around for a while', 'Pending', '01/01/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
