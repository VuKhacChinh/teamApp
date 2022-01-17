-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 06:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `contentcomment` text NOT NULL,
  `commenttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idcomment`, `idpost`, `iduser`, `contentcomment`, `commenttime`) VALUES
(57, 72, 13, 'gì', '2022-01-10 13:23:31'),
(58, 72, 13, 'alo', '2022-01-10 13:27:58'),
(59, 72, 13, 'alo', '2022-01-10 13:31:25'),
(60, 72, 13, 'oie', '2022-01-10 13:34:09'),
(61, 72, 13, 'lô', '2022-01-12 15:42:08'),
(62, 72, 13, 'yeal', '2022-01-12 15:43:45'),
(63, 72, 13, 'ơi', '2022-01-12 15:46:14'),
(64, 72, 13, 'ơi', '2022-01-12 15:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `idfile` int(11) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`idfile`, `filepath`, `idgroup`) VALUES
(9, 'test.pdf', 141),
(10, 'test3.pdf', 141);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `idgroup` int(11) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `numofmem` int(11) NOT NULL DEFAULT 1,
  `groupcolor` varchar(20) NOT NULL,
  `idleader` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`idgroup`, `groupname`, `numofmem`, `groupcolor`, `idleader`) VALUES
(141, '1', 1, 'rgb(145,241,96)', 13);

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `idmess` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messenger`
--

INSERT INTO `messenger` (`idmess`, `idgroup`, `iduser`, `content`) VALUES
(1, 141, 13, 'a'),
(2, 141, 13, 'Hello'),
(3, 141, 11, 'ơi'),
(4, 141, 13, 'hello'),
(5, 141, 11, 'Úi'),
(6, 141, 13, 'a'),
(7, 141, 13, 'a'),
(8, 141, 13, 'a'),
(9, 141, 13, 'a'),
(10, 141, 13, 'a'),
(11, 141, 13, 'a'),
(12, 141, 13, 'a'),
(13, 141, 13, 'a'),
(14, 141, 13, 'a'),
(15, 141, 13, 'a'),
(16, 141, 13, 'a'),
(17, 141, 13, 'a'),
(18, 141, 13, 'd'),
(19, 141, 13, 'hihi'),
(20, 141, 13, 'a'),
(21, 141, 13, '<i class=\"fa fa-heart\" style=\"color:red; font-size:120%\" aria-hidden=\"true\"></i>'),
(22, 141, 13, 'a'),
(23, 141, 13, '<i class=\"fa fa-heart\" style=\"color:red; font-size:120%\" aria-hidden=\"true\"></i>'),
(24, 141, 13, '<i class=\"fa fa-heart\" style=\"color:red; font-size:120%\" aria-hidden=\"true\"></i>'),
(25, 141, 13, '<i class=\"fa fa-heart\" style=\"color:red; font-size:120%\" aria-hidden=\"true\"></i>'),
(26, 141, 13, '<i class=\"fa fa-heart\" style=\"color:red; font-size:120%\" aria-hidden=\"true\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `idnotification` int(11) NOT NULL,
  `idcmtuser` int(11) NOT NULL,
  `idownuser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`idnotification`, `idcmtuser`, `idownuser`, `idgroup`, `view`) VALUES
(1, 8, 13, 141, 1),
(2, 8, 13, 141, 1),
(3, 13, 13, 141, 1),
(4, 13, 13, 141, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `contentpost` text NOT NULL,
  `posttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `iduser`, `idgroup`, `contentpost`, `posttime`) VALUES
(72, 13, 141, 'a', '2022-01-10 13:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `repcomment`
--

CREATE TABLE `repcomment` (
  `idrepcomment` int(11) NOT NULL,
  `idcomment` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `contentrepcomment` text NOT NULL,
  `repcommenttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repcomment`
--

INSERT INTO `repcomment` (`idrepcomment`, `idcomment`, `iduser`, `contentrepcomment`, `repcommenttime`) VALUES
(27, 53, 13, 'gì', '2022-01-09 13:06:32'),
(28, 54, 13, 'ơi', '2022-01-09 13:06:36'),
(29, 53, 13, 'alo', '2022-01-09 13:12:36'),
(30, 53, 13, 'dgdg', '2022-01-09 13:27:02'),
(31, 57, 13, 'ơi', '2022-01-10 13:28:12'),
(32, 60, 13, 'hú', '2022-01-12 15:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avata` varchar(255) NOT NULL DEFAULT 'avata/default.jpg',
  `email` varchar(100) NOT NULL,
  `idrole` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `name`, `username`, `password`, `avata`, `email`, `idrole`) VALUES
(8, 'Bò Đức Trân', 'giahu', '0cc175b9c0f1b6a831c399e269772661', 'default3.jpg', 'duc@gmail.com', 0),
(9, 'Đào Minh Đức', 'daominhduc', '0cc175b9c0f1b6a831c399e269772661', 'default2.jpg', 'minhduc@gmail.com', 0),
(11, 'Vũ Khắc Chinh', 'songoku99', 'c4ca4238a0b923820dcc509a6f75849b', 'default4.jpg', 'vukhacchinh999@gmail.com', 0),
(13, 'Vũ Khắc Chinh', 'songoku99999', 'c4ca4238a0b923820dcc509a6f75849b', 'default.jpg', 'vukhacchinh99@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`iduser`, `idgroup`) VALUES
(8, 141),
(9, 141),
(11, 141),
(13, 141);

-- --------------------------------------------------------

--
-- Table structure for table `user_req_group`
--

CREATE TABLE `user_req_group` (
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idpost` (`idpost`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`idfile`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`idgroup`),
  ADD KEY `idleader` (`idleader`);

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`idmess`),
  ADD KEY `idgroup` (`idgroup`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`idnotification`),
  ADD KEY `idcmtuser` (`idcmtuser`),
  ADD KEY `idownuser` (`idownuser`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idgroup` (`idgroup`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `repcomment`
--
ALTER TABLE `repcomment`
  ADD PRIMARY KEY (`idrepcomment`),
  ADD KEY `idcomment` (`idcomment`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`iduser`,`idgroup`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `user_req_group`
--
ALTER TABLE `user_req_group`
  ADD PRIMARY KEY (`iduser`,`idgroup`),
  ADD KEY `idgroup` (`idgroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `messenger`
--
ALTER TABLE `messenger`
  MODIFY `idmess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `idnotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `repcomment`
--
ALTER TABLE `repcomment`
  MODIFY `idrepcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`idleader`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `messenger`
--
ALTER TABLE `messenger`
  ADD CONSTRAINT `messenger_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `messenger_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`idcmtuser`) REFERENCES `users` (`iduser`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`idownuser`) REFERENCES `users` (`iduser`),
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `user_group_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Constraints for table `user_req_group`
--
ALTER TABLE `user_req_group`
  ADD CONSTRAINT `user_req_group_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `user_req_group_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
