-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 09:28 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `username` varchar(255) NOT NULL,
  `fnumber` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `options` longtext NOT NULL,
  `coption` tinyint(4) NOT NULL,
  `qno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`username`, `fnumber`, `question`, `options`, `coption`, `qno`) VALUES
('rohit', 1, 'jaakfkakfakkf', 'ajkjkagfgfgf', 0, 2),
('rohit', 1, 'ksnslnlkgsglg', ';s;fs;fsk;k;fsf,kslkhlsgolgsgh', 0, 3),
('rohit', 1, 'ksfklkslsjfljs', 'ajlljalf', 0, 4),
('rohit', 3, 'khdskflhlfhl?', 'aakfkgfagfkag,ajjahahfk,afkhahflah', 0, 1),
('rohit', 3, 'kjgkgkgk', 'djgkagkakdkahd,adklhadlhad', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `form_max`
--

CREATE TABLE `form_max` (
  `username` longtext NOT NULL,
  `fnumber` int(11) NOT NULL,
  `maxid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_max`
--

INSERT INTO `form_max` (`username`, `fnumber`, `maxid`) VALUES
('rohit', 1, 4),
('rohit', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gen_forms`
--

CREATE TABLE `gen_forms` (
  `username` longtext NOT NULL,
  `title` mediumtext NOT NULL,
  `fnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_forms`
--

INSERT INTO `gen_forms` (`username`, `title`, `fnumber`) VALUES
('rohit', 'my first form', 1),
('rohit', 'My second demo form', 3);

-- --------------------------------------------------------

--
-- Table structure for table `utcet`
--

CREATE TABLE `utcet` (
  `username` varchar(255) NOT NULL,
  `pass` longtext NOT NULL,
  `nform` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utcet`
--

INSERT INTO `utcet` (`username`, `pass`, `nform`) VALUES
('rohit', '$2y$10$.JI1i1z0VVKZ5aXkJXs9lOdEvA.xHLXduhHp3jwY8hj3McPpdvK0m', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utcet`
--
ALTER TABLE `utcet`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
