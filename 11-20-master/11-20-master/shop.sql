-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-16 08:47:24
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `CID` int(11) NOT NULL,
  `A` int(8) NOT NULL,
  `B` int(8) NOT NULL,
  `C` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `company`
--

INSERT INTO `company` (`CID`, `A`, `B`, `C`) VALUES
(1, 1000, 500, 1000);

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `TID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `Thing` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Volumn` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `item`
--

INSERT INTO `item` (`TID`, `SID`, `Thing`, `Volumn`) VALUES
(1, 1, '甲', 20),
(2, 1, '乙', 50),
(3, 1, '丙', 10),
(4, 2, '甲', 20),
(5, 2, '乙', 50),
(6, 2, '丙', 10),
(7, 3, '甲', 0),
(8, 3, '乙', 0),
(9, 3, '丙', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `stand`
--

CREATE TABLE `stand` (
  `SID` int(11) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `stand`
--

INSERT INTO `stand` (`SID`, `UID`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `UID` int(11) NOT NULL,
  `Name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Money` int(8) NOT NULL,
  `Picture` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`UID`, `Name`, `Password`, `Money`, `Picture`) VALUES
(1, 'jay', '123', 4700, 'http://img.ltn.com.tw/Upload/ent/page/800/2015/04/21/phpVgz2dJ.jpeg');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CID`);

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`TID`);

--
-- 資料表索引 `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`SID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `stand`
--
ALTER TABLE `stand`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
