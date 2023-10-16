-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221220.e5e070c814
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 06:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_patient`
--

CREATE TABLE `add_patient` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `pres` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_patient`
--

INSERT INTO `add_patient` (`id`, `fname`, `lname`, `email`, `password`, `diagnosis`, `pres`, `phone`, `address`, `dob`, `gender`, `user_type`) VALUES
(5, 'bedagya', 'joshi', 'bedagya@gmail.com', '0', 'sick', 'synex', 9874521365, 'ktm', '2022-04-30', 'm', 'patient'),
(6, 'sanskar', 'dhungana', 'sanskar@gmail.com', '0', 'sick', 'citamol', 9841234567, 'mandikhatar', '2022-04-30', 'm', 'user'),
(7, 'gaurab ', 'karki', 'gaurab@gmail.com', '0', 'none', 'none', 9801234568, 'urlabari', '2022-04-20', 'm', 'user'),
(8, 'Ashim', 'Mainali', 'ashim@gmail.com', 'a5a324f8384b82afc51a975aa68663fc', 'Headache', 'citamol', 9801234580, 'Sarlahi', '2022-04-22', 'm', 'user'),
(9, 'ashis', 'kadel', 'ashis@gmail.com', 'ec52ecd8fe35b664ff23b8b1e0b2551f', 'none', 'none', 9805647890, 'kalopul', '2022-04-13', 'm', 'user'),
(10, 'anurag', 'giri', 'anurag@gmail.com', 'def9f7a99252d1ba29ee1c56f90be4fd', 'sick', 'citamol100mg', 9870546789, 'imadol', '2022-04-08', 'm', 'user'),
(13, 'vasker', 'pandey', 'vasker12@gmail.com', '0e686c02ca7b68ec2c0b4c494b332b9f', 'sick', 'synex', 9807654321, 'baneshwor', '2022-08-18', 'm', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `dob` date NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `fname`, `lname`, `email`, `password`, `address`, `gender`, `dob`, `user_type`) VALUES
(3, 'manish rai', 'rai', 'manish@gmail.com', '1c9a44eb2e8eaf3da1eb551da310cce7', 'kapan', '', '0000-00-00', 'admin'),
(4, 'ram', 'karki', 'ram@gmail.com', '4793ec68ecc68ddcbda0767220f0e55a', 'sifal', '', '0000-00-00', 'user'),
(5, 'shyam', 'bhusal', 'shyam@gmail.com', '5a4cd850fc787d454416aa3a47580468', 'baluwakhani', 'm', '2022-04-06', 'admin'),
(6, 'kamala', 'karki', 'kamala@gmail.com', 'a7c9fc01b4cd16552c2d678ee3d0d29b', 'sukhedhara', 'f', '2022-03-31', 'user'),
(7, 'sam', 'win', 'san@gmail.com', '9bd22039c3c23277b68f872896befa79', 'DC', 'm', '2022-04-14', 'admin'),
(8, 'dean', 'winchester', 'dean@gmail.com', 'bdc87b9c894da5168059e00ebffb9077', 'NYC', 'm', '2022-03-31', 'admin'),
(9, 'hari', 'thapa', 'hari@gmail.com', '7a2beda9750fd7523431f4c1a34c204a', 'kathmandu', 'm', '2000-01-01', 'admin'),
(12, 'bimal', 'rai', 'bimal@gmail.com', 'a4f788de55164a928ae059ab37c52d0d', 'jhumka', 'm', '2022-05-25', 'admin'),
(13, 'Mahesh', 'Rai', 'mahesh@gmail.com', '7342eece6f362e7f3e0426a81601c070', 'kathmandu', 'm', '2022-05-05', 'admin'),
(14, 'manish', 'rai', 'manish@gmail.com', '9bd22039c3c23277b68f872896befa79', 'kapan', 'm', '2002-06-16', 'admin'),
(15, '1234', '1234', 'manish123@gmail.com', '9132ae83dd1b2045e0cfd5aa70385c45', '123', 'm', '2022-08-17', 'admin'),
(16, 'pankaj', 'adfhikari', 'pankaj.adhikari@gmail.com', 'e2626c7eac664cdd9811f2ff1b86b41d', 'kathmandu', 'm', '2022-12-13', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_patient`
--
ALTER TABLE `add_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_patient`
--
ALTER TABLE `add_patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
