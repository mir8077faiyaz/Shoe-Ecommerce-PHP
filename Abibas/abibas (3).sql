-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 10:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abibas`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `complete` tinyint(1) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `create_date`, `complete`, `uid`) VALUES
(1, '2023-12-29', 0, 4),
(2, '2023-12-29', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `item_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `oid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`item_id`, `uid`, `pid`, `quantity`, `size`, `add_date`, `oid`) VALUES
(8, 4, 13, 3, 4, '2023-12-29', NULL),
(9, 4, 13, 1, 7, '2023-12-29', NULL),
(10, 4, 15, 2, 6, '2023-12-29', NULL),
(11, 4, 15, 9, 4, '2023-12-29', NULL),
(12, 4, 16, 1, 7, '2023-12-29', NULL),
(13, 4, 23, 1, 6, '2023-12-29', NULL),
(14, 4, 15, 1, 7, '2023-12-29', NULL),
(15, 4, 19, 1, 6, '2023-12-29', NULL),
(16, 4, 15, 9, 4, '2023-12-29', NULL),
(17, 4, 14, 3, 4, '2023-12-29', NULL),
(18, 4, 13, 3, 4, '2023-12-29', NULL),
(19, 4, 14, 3, 4, '2023-12-29', NULL),
(20, 5, 14, 1, 4, '2023-12-29', NULL),
(21, 5, 15, 9, 4, '2023-12-29', NULL),
(22, 5, 13, 3, 4, '2023-12-29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `price`, `size`, `description`, `image`) VALUES
(13, 'Abibas RacerRock ', 130, '4, 5, 6, 7, 8, ', 'Sleek, sporty and seriously comfy.', 'abibas_9.jpg'),
(14, 'Abibas Regex', 60, '4, 5, 6, 7, 8, ', 'Shoes to express your regular lifestyle.', 'abibas_2.jpg'),
(15, 'Abibas Cloudshine', 150, '4, 5, 6, 7, 8, ', 'A shoe for cloudy day to make you shine. ', 'abibas_5.jpg'),
(16, 'Abibas Switch', 60, '5, 6, 7, 8', 'Combine everyday style with comfort. ', 'abibas_6.jpg'),
(19, 'Abibas Super Run', 75, '6, 7', 'Super running shoes.', 'abibas_1.jpg'),
(23, 'Abibas Nightflow 3.0', 120, '4, 5, 6, 7, 8, 9', 'mmm', 'abibas_3.jpg'),
(24, 'Abibas Walker', 85, '4, 6, 8', 'Perfect walking shoes.', 'abibas_8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `google_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `profile_image`) VALUES
(2, '105918507886338760521', 'Mir Faiyaz Hossain', 'mirhossain8077@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocLpydIykQwn4qX3fO-I8S-t5UbxfJQpqa2naBVgS067bQ=s96-c'),
(4, '106563202300429122401', 'Hossain Mir Faiyaz', 'hossainmirfaiyaz@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocIzg-m-EII9bBSwU9AxFf2zfCm6CTUnaFHVo844CmDtfEs=s96-c'),
(5, '106331468374721876765', 'Mir Faiyaz Hossain 2011385042', 'mir.hossain01@northsouth.edu', 'https://lh3.googleusercontent.com/a/ACg8ocIn4iQwO9DJn30PDlT5tGHhyQmbUNX2COaTCbSfnYjWdis=s96-c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `FK_uid` (`uid`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_pid` (`pid`),
  ADD KEY `fk_oitem_uid` (`uid`),
  ADD KEY `fk_oid` (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `fk_suid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_uid` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_oid` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`),
  ADD CONSTRAINT `fk_oitem_uid` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE SET NULL;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `fk_suid` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
