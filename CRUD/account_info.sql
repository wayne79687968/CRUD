-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-01 09:08:26
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `crud`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account_info`
--

CREATE TABLE `account_info` (
  `id` int(10) NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `account_info`
--

INSERT INTO `account_info` (`id`, `account`, `name`, `gender`, `birthday`, `email`, `remark`) VALUES
(1, 'wayne1003', 'Wayne', 1, '1995-10-03', 'wayne1003@gmail.com', 'SpaceX Nasa Mission: Astronauts on historic mission enter space station'),
(2, 'jen7', 'Jen', 0, '1999-04-04', 'jen7@gmail.com', ''),
(3, 'ruby99', 'Ruby', 0, '1997-04-30', 'ruby99@yahoo.com', 'After a wait for leak, pressure and temperature checks, the pair disembarked to join the Russian and American crew already on the ISS.'),
(4, 'dennis113', 'Dennis', 1, '1988-12-01', 'dennis113@gmail.com', ''),
(5, 'adada789', 'Ada', 0, '1999-06-17', 'adada789@hotmail.com', ''),
(6, 'benson99', 'Benson', 1, '1989-06-06', 'benson99@gmail.com', 'Theirs is the first crew outing launched from American soil since the retirement of the US space agency (Nasa) shuttles nine years ago.'),
(7, 'carter1carta', 'Carter', 1, '2000-09-13', 'carter1carta@gmail.com', 'Hurley and Behnken launched from Florida on Saturday.'),
(8, 'rick666', 'Rick', 1, '1950-06-02', 'rick666@rick.com', 'Morty'),
(9, 'clarkc8', 'Clark', 1, '1977-07-07', 'clarkc8@yahoo.com', 'This will be done exclusively by firms such as SpaceX of Hawthorne, California, which is led by tech billionaire Elon Musk.'),
(10, 'lolala333', 'Lola', 0, '2003-01-26', 'lolala333@gmail.com', ''),
(11, 'mavis123', 'Mavis123', 0, '1990-10-22', 'mavis123@hotmail.com', ''),
(12, 'ron001', 'Ron', 1, '1967-08-08', 'ron001@gmail.com', 'The docking was a fully automated process; Hurley and Behnken had no need to get involved - although they had practised some manual flying on approach.'),
(13, 'rory3441', 'Rory', 1, '1998-11-11', 'rory3441@yahoo.com', 'Bob Behnken said the pair were well rested and ready for the tasks ahead.'),
(14, 'tifa555', 'Tifa', 0, '1992-05-01', 'tifa555@gmail.com', 'Cloud'),
(15, 'thera789', 'Thera', 0, '1988-03-08', 'thera789@gmail.com', ''),
(16, 'max0417', 'Max', 1, '1985-04-07', 'max0417@yahoo.com', ''),
(17, 'king6666', 'King', 1, '2000-11-25', 'king6666@gmail.com', 'Hurley\'s and Behnken\'s job on the mission is to test all onboard systems and to give their feedback to engineers.'),
(18, 'henry3a4b', 'Henry', 1, '1994-12-31', 'henry3a4b@gmail.com', 'Who are the astronauts?'),
(19, 'gale111', 'Gale', 1, '1960-06-17', 'gale111@gmail.com', ''),
(20, 'lizzzzil01', 'Liz', 0, '1997-06-21', 'lizzzzil01@gmail.com', ''),
(21, 'joy1937', 'Joy', 0, '1990-09-24', 'joy1937@gmail.com', ''),
(22, 'dunn6834', 'Dunn', 1, '1980-04-28', 'dunn6834@gmail.com', ''),
(23, 'ina482354', 'Ina', 0, '1983-01-26', 'ina482354@gmail.com', 'It\'s somewhat uncertain how long Hurley and Behnken will stay at the ISS, but perhaps as much as four months.'),
(24, 'eric734889', 'Eric', 1, '1995-12-25', 'eric734889@gmail.com', ''),
(25, 'greg4io2', 'Greg', 1, '1992-02-04', 'greg4io2@yahoo.com', 'In that time, they will become members of the current ISS Expedition 63 crew, taking part in the platform\'s everyday science and maintenance activities.'),
(26, 'gail3ig3', 'Gail', 0, '1999-06-30', 'gail3ig3@gmail.com', 'It\'s somewhat uncertain how long Hurley and Behnken will stay at the ISS, but perhaps as much as four months.'),
(27, 'jeangroi33', 'Jean', 0, '1987-10-03', 'jeangroi33@gmail.com', ''),
(28, 'len4o9w2', 'Len', 1, '1999-09-02', 'len4o9w2@gmail.com', 'Key questions about the mission'),
(29, 'nicko3o222', 'Nick', 1, '1990-05-18', 'nicko3o222@gmail.com', 'Evolution of the spacesuit'),
(30, 'verne3992', 'Verne', 1, '1997-06-11', 'verne3992@gmail.com', ''),
(31, 'ziv38tii456', 'Ziv', 1, '1990-03-10', 'ziv38tii456@gmail.com', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
