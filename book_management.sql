-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 10:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `author` text NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `year_published` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `author`, `publisher`, `year_published`, `category`, `archived`) VALUES
(1, 'ne', 'deviertesss', 'silay cityasasa', 'abcss', 2004, 'asdd', 1),
(2, 'gemalyn', 'cepe', 'carmen, bohol', 'thr', 1993, 'b', 1),
(3, 'lee', 'apilinga', 'bacolod', 'fdf', 222, 'c', 0),
(4, 'julyn', 'divinagracia', 'eb magalona', 'yuyu', 2, 'd', 0),
(5, 'cristine', 'demapanag', 'talisay', 'aaaa', 44, 'd', 0),
(38, 'Viktor', 'Dimalanta', 'Igay Sawmill Sto. cristo CSJDM, Bulacan', 'bbb', 8, 'e', 0),
(39, 'Viktor', 'Dimalanta', 'Igay Sawmill Sto. cristo CSJDM, Bulacan', 'sdsd', 977, 'f', 0),
(42, 'de', 'aaaaaa', 'aaaaa', 'ds', 34, 'abfg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
