-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2020 lúc 08:42 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `contentcomment` text NOT NULL,
  `commenttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`idcomment`, `idpost`, `iduser`, `contentcomment`, `commenttime`) VALUES
(1, 5, 5, 'hello', '2020-12-13 03:20:35'),
(2, 5, 5, 'Hello', '2020-12-13 03:22:58'),
(3, 5, 5, 'hello', '2020-12-13 03:55:17'),
(4, 5, 5, 'hello', '2020-12-13 05:37:10'),
(5, 5, 5, 'hrllo', '2020-12-13 05:42:41'),
(6, 15, 5, 'Hi', '2020-12-15 08:19:08'),
(7, 15, 5, 'Hello', '2020-12-15 09:08:24'),
(8, 47, 5, 'hello', '2020-12-15 10:19:30'),
(9, 47, 5, 'hi', '2020-12-15 10:19:34'),
(10, 47, 5, 'he', '2020-12-15 10:20:27'),
(11, 47, 5, 'hello', '2020-12-15 10:57:44'),
(12, 47, 5, 'hi', '2020-12-15 10:57:46'),
(13, 47, 5, 'he', '2020-12-15 10:57:47'),
(14, 47, 5, 'ha', '2020-12-15 10:57:48'),
(15, 47, 5, 'he', '2020-12-15 10:58:21'),
(16, 47, 5, 'h', '2020-12-15 10:58:23'),
(17, 47, 5, 'he', '2020-12-15 10:58:26'),
(18, 47, 5, 'hu', '2020-12-15 10:58:28'),
(19, 47, 5, 'hi', '2020-12-15 10:58:30'),
(20, 48, 5, 'Hello', '2020-12-15 22:31:01'),
(21, 48, 5, 'hello', '2020-12-15 22:32:02'),
(22, 48, 5, 'H', '2020-12-15 22:33:32'),
(23, 48, 5, 'H', '2020-12-15 22:33:58'),
(24, 48, 5, 'hello', '2020-12-15 22:35:34'),
(25, 49, 5, 'Hello', '2020-12-15 22:36:28'),
(26, 50, 5, 'he', '2020-12-15 22:38:05'),
(27, 51, 5, '2', '2020-12-15 22:38:21'),
(28, 52, 5, '2', '2020-12-15 22:38:37'),
(29, 53, 5, 'h', '2020-12-15 22:39:24'),
(30, 54, 5, 'h', '2020-12-15 22:39:56'),
(31, 55, 5, 'hello', '2020-12-15 22:40:48'),
(32, 57, 5, 'h', '2020-12-15 22:43:13'),
(33, 58, 5, 'h', '2020-12-15 22:43:39'),
(34, 58, 5, 'hi', '2020-12-15 22:44:06'),
(35, 58, 5, 'hilo', '2020-12-15 22:44:28'),
(36, 57, 5, 'hello', '2020-12-15 22:45:59'),
(37, 57, 5, 'hie', '2020-12-15 22:47:14'),
(38, 57, 5, 'ha', '2020-12-15 22:47:39'),
(39, 55, 5, 'Hello', '2020-12-15 22:53:22'),
(40, 48, 5, 'hELLO', '2020-12-16 07:00:01'),
(41, 46, 5, 'Hello', '2020-12-16 07:03:15'),
(42, 47, 8, 'hello', '2020-12-16 11:29:15'),
(43, 59, 8, 'hello', '2020-12-16 11:29:49'),
(44, 59, 8, 'hi', '2020-12-16 11:31:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

CREATE TABLE `file` (
  `idfile` int(11) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group`
--

CREATE TABLE `group` (
  `idgroup` int(11) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `numofmem` int(11) NOT NULL DEFAULT 1,
  `groupcolor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `group`
--

INSERT INTO `group` (`idgroup`, `groupname`, `numofmem`, `groupcolor`) VALUES
(1, 'New Group', 1, ''),
(2, 'Nhóm Chinh tạo', 1, ''),
(16, 'Hello', 1, 'rgb(181,254,106)'),
(17, 'Hello2', 1, 'rgb(165,53,18)'),
(18, 'Mau Xau', 1, 'rgb(208,195,117)'),
(19, '1', 1, 'rgb(233,55,201)'),
(20, '2', 1, 'rgb(83,17,17)'),
(21, '3', 1, 'rgb(162,62,86)'),
(22, '4', 1, 'rgb(74,249,225)'),
(23, '5', 1, 'rgb(130,249,80)'),
(24, '6', 1, 'rgb(254,203,148)'),
(25, '7', 1, 'rgb(241,151,76)'),
(26, '8', 1, 'rgb(77,93,171)'),
(27, '9', 1, 'rgb(220,87,11)'),
(28, 'Muoi', 1, 'rgb(75,118,16)'),
(29, '10', 1, 'rgb(123,93,63)'),
(30, '10', 1, 'rgb(55,65,23)'),
(31, '10', 1, 'rgb(165,245,215)'),
(32, '10', 1, 'rgb(23,176,199)'),
(33, '10', 1, 'rgb(224,58,244)'),
(34, '10', 1, 'rgb(23,74,98)'),
(35, '10', 1, 'rgb(55,185,103)'),
(36, '11', 1, 'rgb(127,254,0)'),
(37, '11', 1, 'rgb(228,138,252)'),
(38, 'Hello', 1, 'rgb(225,222,71)'),
(39, 'Hello', 1, 'rgb(129,93,121)'),
(40, 'Helloworld', 1, 'rgb(72,113,37)'),
(41, 'Helloworld', 1, 'rgb(59,16,223)'),
(42, '12', 1, 'rgb(102,27,192)'),
(43, '12', 1, 'rgb(200,233,29)'),
(44, '12', 1, 'rgb(243,85,175)'),
(45, 'Hello2', 1, 'rgb(104,123,176)'),
(46, 'Hello3', 1, 'rgb(10,45,140)'),
(47, 'Hello3', 1, 'rgb(217,239,164)'),
(48, 'Hello', 1, 'rgb(24,179,79)'),
(49, 'Hello4', 1, 'rgb(205,116,8)'),
(50, 'Hello4', 1, 'rgb(213,147,177)'),
(51, 'Hello5', 1, 'rgb(67,94,197)'),
(52, 'AnhChinh', 1, 'rgb(88,221,2)'),
(53, 'AnhChinh', 1, 'rgb(3,77,195)'),
(54, 'AnhChinh', 1, 'rgb(113,226,180)'),
(55, '15', 1, 'rgb(82,180,211)'),
(56, 'AnhChinh2', 1, 'rgb(254,145,37)'),
(57, 'AnhChinh2', 1, 'rgb(225,158,40)'),
(58, 'AnhChinh2', 1, 'rgb(129,195,210)'),
(59, 'AnhChinh2', 1, 'rgb(50,132,82)'),
(60, 'AnhChinh2', 1, 'rgb(83,51,213)'),
(61, 'AnhChinh2', 1, 'rgb(167,125,169)'),
(62, 'AnhChinh2', 1, 'rgb(60,113,175)'),
(63, 'AnhChinh2', 1, 'rgb(32,39,196)'),
(64, 'AnhChinh2', 1, 'rgb(222,184,15)'),
(65, 'AnhChinh2', 1, 'rgb(75,245,99)'),
(66, 'AnhChinh2', 1, 'rgb(128,49,167)'),
(67, 'AnhChinh2', 1, 'rgb(94,141,137)'),
(68, 'AnhChinh2', 1, 'rgb(113,135,221)'),
(69, 'AnhChinh2', 1, 'rgb(64,222,8)'),
(70, 'AnhChinh2', 1, 'rgb(49,172,121)'),
(85, 'Chinh', 1, 'rgb(201,177,152)'),
(86, 'Chinh', 1, 'rgb(121,49,164)'),
(87, 'Chinh', 1, 'rgb(36,148,184)'),
(88, 'Chinh', 1, 'rgb(83,132,250)'),
(89, 'Chinh', 1, 'rgb(118,208,178)'),
(90, 'Chinh', 1, 'rgb(207,0,211)'),
(91, 'Chinh', 1, 'rgb(114,192,24)'),
(92, 'Chinh', 1, 'rgb(56,34,189)'),
(93, 'Chinh', 1, 'rgb(253,79,77)'),
(94, 'Chinh', 1, 'rgb(57,185,219)'),
(95, 'Anh Chinh', 1, 'rgb(108,90,10)'),
(96, 'Anh Chinh', 1, 'rgb(234,166,202)'),
(97, 'Anh Chinh', 1, 'rgb(116,239,225)'),
(98, 'Anh Chinh', 1, 'rgb(255,102,124)'),
(99, 'Anh Chinh', 1, 'rgb(194,3,125)'),
(100, 'Anh Chinh', 1, 'rgb(1,173,219)'),
(101, 'Anh Chinh', 1, 'rgb(223,6,133)'),
(102, 'Anh Chinh', 1, 'rgb(255,178,233)'),
(103, 'Anh Chinh', 1, 'rgb(206,63,150)'),
(104, 'Anh Chinh', 1, 'rgb(217,232,202)'),
(105, 'Anh Chinh', 1, 'rgb(216,217,3)'),
(106, 'Nhom1', 1, 'rgb(34,97,61)'),
(107, 'Nhom1', 1, 'rgb(108,224,29)'),
(108, 'Đức Bo', 1, 'rgb(26,157,247)'),
(109, 'Hello', 1, 'rgb(233,36,105)'),
(114, 'hello2', 1, 'rgb(47,151,154)'),
(116, 'test1', 1, 'rgb(114,42,185)'),
(117, 'test2', 1, 'rgb(177,176,178)'),
(118, 'test3', 1, 'rgb(101,19,84)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `idnotification` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `idpost` int(11) NOT NULL DEFAULT -1,
  `idcomment` int(11) NOT NULL DEFAULT -1,
  `meetingflag` int(11) NOT NULL DEFAULT -1,
  `iduser2` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT 1,
  `notificationtime` datetime NOT NULL,
  `code` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`idnotification`, `iduser`, `idgroup`, `idpost`, `idcomment`, `meetingflag`, `iduser2`, `state`, `notificationtime`, `code`) VALUES
(18, 5, 118, -1, -1, 1, 8, 0, '2020-12-16 10:57:34', 'room-vn-1-73JJ5R8BMN-1606409223367'),
(19, 5, 118, -1, -1, 1, 9, 1, '2020-12-16 10:57:34', 'room-vn-1-73JJ5R8BMN-1606409223367'),
(20, 8, 118, 59, -1, -1, 5, 0, '2020-12-16 11:31:36', 'no');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `contentpost` text NOT NULL,
  `posttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`idpost`, `iduser`, `idgroup`, `contentpost`, `posttime`) VALUES
(1, 5, 100, 'Hello world', '2020-12-12 08:39:51'),
(3, 5, 93, 'Hello', '2020-12-12 09:09:06'),
(5, 5, 93, 'Hello6', '2020-12-12 09:11:59'),
(14, 8, 108, 'Hello world', '2020-12-13 03:17:44'),
(15, 5, 118, 'Hello', '2020-12-15 08:18:48'),
(16, 5, 118, 'Hello2', '2020-12-15 09:28:04'),
(17, 5, 118, 'Hello3', '2020-12-15 09:28:09'),
(18, 5, 118, 'Hello4', '2020-12-15 09:28:13'),
(19, 5, 118, 'Hello6', '2020-12-15 09:28:18'),
(20, 5, 118, 'Hello7', '2020-12-15 09:28:23'),
(21, 5, 118, 'Hello8', '2020-12-15 09:28:38'),
(22, 5, 118, 'Hello8', '2020-12-15 09:30:03'),
(23, 5, 118, 'Hello8', '2020-12-15 09:32:00'),
(24, 5, 118, 'Hello8', '2020-12-15 09:52:38'),
(25, 5, 118, 'Hello8', '2020-12-15 09:52:54'),
(26, 5, 118, 'Hello8', '2020-12-15 09:54:18'),
(27, 5, 118, 'Hello8', '2020-12-15 09:54:43'),
(28, 5, 118, 'Hello8', '2020-12-15 09:55:45'),
(29, 5, 118, 'Hello8', '2020-12-15 09:56:03'),
(30, 5, 118, 'Hello8', '2020-12-15 09:56:52'),
(31, 5, 118, 'Hello8', '2020-12-15 09:57:26'),
(32, 5, 118, 'Hello8', '2020-12-15 09:59:06'),
(33, 5, 118, 'Hello8', '2020-12-15 09:59:15'),
(34, 5, 118, 'Hello8', '2020-12-15 09:59:45'),
(35, 5, 118, 'Hello8', '2020-12-15 10:00:54'),
(36, 5, 118, 'Hello8', '2020-12-15 10:01:36'),
(37, 5, 118, 'Hello8', '2020-12-15 10:02:00'),
(38, 5, 118, 'Hello8', '2020-12-15 10:02:53'),
(39, 5, 118, 'Hello8', '2020-12-15 10:03:41'),
(40, 5, 118, 'Hello8', '2020-12-15 10:05:51'),
(44, 5, 118, 'Hello8', '2020-12-15 10:13:31'),
(45, 5, 118, 'Hello8', '2020-12-15 10:16:36'),
(46, 5, 118, 'Hello8', '2020-12-15 10:17:02'),
(47, 5, 118, 'Hello8', '2020-12-15 10:18:17'),
(48, 8, 118, 'Hello guys', '2020-12-15 20:15:33'),
(49, 5, 117, 'Hello', '2020-12-15 22:36:22'),
(50, 5, 117, 'Hello', '2020-12-15 22:37:40'),
(51, 5, 117, 'Hello', '2020-12-15 22:38:18'),
(52, 5, 117, 'Hello', '2020-12-15 22:38:34'),
(53, 5, 117, 'Hello', '2020-12-15 22:39:21'),
(54, 5, 117, 'Hello', '2020-12-15 22:39:53'),
(55, 5, 117, 'Hello', '2020-12-15 22:40:42'),
(56, 5, 117, 'Hello', '2020-12-15 22:42:51'),
(57, 5, 117, 'Hello', '2020-12-15 22:43:10'),
(58, 5, 117, 'Hello', '2020-12-15 22:43:37'),
(59, 5, 118, 'hi', '2020-12-16 11:29:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `repcomment`
--

CREATE TABLE `repcomment` (
  `idrepcomment` int(11) NOT NULL,
  `idcomment` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `contentrepcomment` text NOT NULL,
  `repcommenttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `repcomment`
--

INSERT INTO `repcomment` (`idrepcomment`, `idcomment`, `iduser`, `contentrepcomment`, `repcommenttime`) VALUES
(1, 6, 5, 'hello', '2020-12-15 09:19:44'),
(2, 8, 5, '1', '2020-12-15 11:04:31'),
(3, 8, 5, '2', '2020-12-15 11:04:33'),
(4, 8, 5, '3', '2020-12-15 11:04:35'),
(5, 8, 5, '4', '2020-12-15 11:04:37'),
(6, 8, 5, '5', '2020-12-15 11:04:39'),
(7, 8, 5, '6', '2020-12-15 11:04:42'),
(8, 8, 5, '7', '2020-12-15 11:04:43'),
(9, 8, 5, '8', '2020-12-15 11:04:45'),
(10, 8, 5, '9', '2020-12-15 11:04:48'),
(11, 8, 5, '19', '2020-12-15 11:04:50'),
(12, 8, 5, '11', '2020-12-15 11:04:54'),
(13, 8, 5, 'hi', '2020-12-15 11:07:15'),
(14, 8, 5, '1', '2020-12-15 11:07:33'),
(15, 8, 5, 'a', '2020-12-15 11:08:04'),
(16, 8, 5, 'a', '2020-12-15 11:11:14'),
(17, 8, 5, '1', '2020-12-15 11:14:05'),
(18, 20, 5, 'hello', '2020-12-15 23:17:28'),
(19, 20, 5, 'hi', '2020-12-15 23:17:45'),
(20, 20, 5, 'he', '2020-12-15 23:17:51'),
(21, 9, 5, 'hi', '2020-12-16 08:16:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avata` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idrole` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`iduser`, `name`, `username`, `password`, `avata`, `email`, `idrole`) VALUES
(1, 'Chinh', 'goku', 'a', '1.jpg', 'chinh@gmail.com', 0),
(5, 'Vũ Khắc Chinh', 'songoku', '92eb5ffee6ae2fec3ad71c777531578f', 'avata/6.jpg', 'chinh@gmail.com', 0),
(6, 'Vũ Khắc Chinh', 'songoku2', '0cc175b9c0f1b6a831c399e269772661', '', 'chinh@gmail.com', 0),
(7, 'Vũ Khắc Chinh', 'songoku3', '0cc175b9c0f1b6a831c399e269772661', '', 'chinh@gmail.com', 0),
(8, 'Bò Đức Trân', 'giahu', '0cc175b9c0f1b6a831c399e269772661', '', 'duc@gmail.com', 0),
(9, 'Đào Minh Đức', 'daominhduc', '0cc175b9c0f1b6a831c399e269772661', '', 'minhduc@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_group`
--

CREATE TABLE `user_group` (
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `relationship` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_group`
--

INSERT INTO `user_group` (`iduser`, `idgroup`, `relationship`) VALUES
(5, 1, 1),
(5, 114, 3),
(5, 116, 3),
(6, 94, 3),
(6, 95, 3),
(6, 96, 3),
(6, 97, 3),
(6, 98, 3),
(6, 99, 3),
(6, 100, 3),
(6, 101, 3),
(6, 102, 3),
(6, 103, 3),
(6, 104, 3),
(6, 105, 3),
(7, 106, 3),
(7, 107, 3),
(8, 2, 1),
(8, 18, 1),
(8, 52, 1),
(8, 93, 3),
(8, 118, 2),
(9, 118, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idpost` (`idpost`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`idfile`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Chỉ mục cho bảng `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`idgroup`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`idnotification`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idgroup` (`idgroup`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  ADD PRIMARY KEY (`idrepcomment`),
  ADD KEY `idcomment` (`idcomment`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- Chỉ mục cho bảng `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`iduser`,`idgroup`),
  ADD KEY `idgroup` (`idgroup`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `file`
--
ALTER TABLE `file`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `group`
--
ALTER TABLE `group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `idnotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  MODIFY `idrepcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Các ràng buộc cho bảng `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Các ràng buộc cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  ADD CONSTRAINT `repcomment_ibfk_1` FOREIGN KEY (`idcomment`) REFERENCES `comment` (`idcomment`),
  ADD CONSTRAINT `repcomment_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Các ràng buộc cho bảng `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `user_group_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
