-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2023-12-18 13:53:41
-- 伺服器版本： 8.0.31
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `schedule`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dolist`
--

DROP TABLE IF EXISTS `dolist`;
CREATE TABLE IF NOT EXISTS `dolist` (
  `Index` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `begin_date_year` int NOT NULL,
  `begin_date_month` int NOT NULL,
  `begin_date_day` int NOT NULL,
  `begin_time_hour` int NOT NULL,
  `begin_time_minate` int NOT NULL,
  `finish_date_year` int NOT NULL,
  `finish_date_month` int NOT NULL,
  `finish_date_day` int NOT NULL,
  `finsh_time_hour` int NOT NULL,
  `finsh_time_minate` int NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Index`),
  KEY `num` (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `dolist`
--

INSERT INTO `dolist` (`Index`, `title`, `content`, `begin_date_year`, `begin_date_month`, `begin_date_day`, `begin_time_hour`, `begin_time_minate`, `finish_date_year`, `finish_date_month`, `finish_date_day`, `finsh_time_hour`, `finsh_time_minate`, `location`, `state`) VALUES
(1, '作業系統期末考', '考從期中到現在上完的地方', 2023, 1, 4, 15, 0, 2023, 1, 4, 17, 0, '逢甲大學，資電館', 0),
(2, '微處理機期末考試', '上機考', 2023, 1, 5, 15, 0, 2023, 1, 5, 18, 0, '逢甲大學，資電館', 0),
(3, '吃飯', '吃午餐', 2023, 12, 23, 11, 30, 2023, 12, 23, 13, 0, '還沒決定', 0),
(4, '看醫生', '記得要去掛號', 2023, 12, 18, 9, 15, 2023, 12, 18, 10, 30, '呂XX綜合診所', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Index` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_pw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`Index`, `user_id`, `user_pw`, `nickname`, `gmail`) VALUES
(1, 'D1051058', '$2y$10$mTiJX7GPaE1PoSybzJ28pu4z6GA7xXj9vBiAITAHjfq24/c6M7g/S', 'Girge', 'gmail');

-- --------------------------------------------------------

--
-- 資料表結構 `user_list`
--

DROP TABLE IF EXISTS `user_list`;
CREATE TABLE IF NOT EXISTS `user_list` (
  `Index` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `schedule_index` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_list`
--

INSERT INTO `user_list` (`Index`, `user_id`, `schedule_index`) VALUES
(1, 'D1051058', '1,2,3,4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
