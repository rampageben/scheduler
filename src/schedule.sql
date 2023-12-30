-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2023-12-30 11:58:55
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
  `Index_schedule` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` int NOT NULL DEFAULT '0',
  `begin_date_year` smallint NOT NULL,
  `begin_date_month` tinyint NOT NULL,
  `begin_date_day` tinyint NOT NULL,
  `begin_time_hour` tinyint NOT NULL,
  `begin_time_minute` tinyint NOT NULL,
  `finish_date_year` smallint NOT NULL,
  `finish_date_month` tinyint NOT NULL,
  `finish_date_day` tinyint NOT NULL,
  `finish_time_hour` tinyint NOT NULL,
  `finish_time_minute` tinyint NOT NULL,
  PRIMARY KEY (`Index_schedule`),
  KEY `num` (`Index_schedule`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `dolist`
--

INSERT INTO `dolist` (`Index_schedule`, `title`, `content`, `location`, `state`, `begin_date_year`, `begin_date_month`, `begin_date_day`, `begin_time_hour`, `begin_time_minute`, `finish_date_year`, `finish_date_month`, `finish_date_day`, `finish_time_hour`, `finish_time_minute`) VALUES
(1, '作業系統期末考', '考從期中到現在上完的地方', '逢甲大學，資電館', 1, 2024, 1, 4, 15, 0, 2024, 1, 4, 17, 0),
(2, '微處理機期末考試', '上機考', '逢甲大學，資電館', 1, 2024, 1, 5, 15, 0, 2024, 1, 5, 18, 0),
(3, '吃飯', '吃午餐', '還沒決定', 0, 2023, 12, 23, 11, 30, 2023, 12, 23, 13, 0),
(4, '看醫生', '記得要去掛號', '呂XX綜合診所', 1, 2023, 12, 18, 9, 15, 2023, 12, 18, 10, 30),
(5, '慶生', '得先去拿蛋糕', '298Nikuya燒肉', 0, 2024, 1, 16, 19, 0, 2024, 1, 16, 24, 0),
(6, '考多億', '提早去報到，帶雙證件', '文華高中', 0, 2024, 3, 2, 10, 30, 2024, 3, 2, 17, 0),
(8, '還書', '三本，要拔書籤', '國資圖', 0, 2024, 4, 22, 9, 0, 2024, 4, 22, 10, 0),
(9, '百老匯演奏會', '記得先去取票，然後叫白癡起床\r\n', '國家歌劇院', 0, 2024, 2, 16, 19, 0, 2024, 2, 16, 21, 0),
(10, '演講，走馬看花', '記得帶稿，訂高鐵', '臺北南港展覽館2館', 0, 2024, 5, 14, 14, 0, 2024, 5, 16, 17, 0),
(11, '打工代班', '記得要錢', '咖啡店', 0, 2023, 6, 17, 7, 0, 2023, 6, 17, 15, 0),
(12, '爬山', '防曬和小黑蚊的藥', '大坑9號步道', 0, 2024, 2, 2, 7, 30, 2023, 2, 2, 17, 0),
(13, '看牙醫', '先打電話預約', '能盛牙醫診所', 0, 2024, 4, 7, 14, 15, 2024, 4, 7, 16, 0),
(14, '看眼科', '半年檢查，預約完', '白佳欣眼科診所', 0, 2024, 5, 18, 13, 30, 2024, 5, 18, 15, 0),
(15, '續借', '開GMAIL', '電腦', 0, 2024, 1, 2, 10, 0, 2024, 1, 2, 10, 10),
(16, '去彰化玩', '帶安全帽', '扇形車庫之類的', 0, 2024, 3, 9, 10, 0, 2024, 3, 9, 21, 0),
(17, '補習班，線代', '帶第一本', '補習班本班', 0, 2024, 1, 6, 9, 50, 2024, 1, 6, 11, 30),
(18, '補習班，資結', '帶第一本', '補習班本班', 0, 2024, 1, 7, 9, 50, 2024, 1, 7, 11, 30),
(19, '找PZ', '坐客運', '台北車站', 0, 2024, 7, 1, 13, 0, 2024, 7, 7, 21, 0),
(20, '領眼鏡', '自己騎車', '豐原', 0, 2024, 6, 9, 13, 0, 2024, 6, 9, 14, 0),
(21, '洗被單', '厚、薄、連床單都要', '家', 0, 2024, 1, 6, 8, 0, 2024, 1, 6, 8, 30),
(22, '抓當兵仔出來吃飯', '提早一點', 'Home燒肉', 0, 2024, 1, 27, 11, 30, 2024, 1, 27, 15, 0),
(23, '房間大掃除', '衣櫃也是', '家', 0, 2024, 6, 22, 9, 0, 2024, 6, 22, 10, 0),
(24, '看醫生複診', '記得要去掛號，下午', '呂XX綜合診所', 1, 2024, 3, 18, 9, 15, 2024, 3, 18, 10, 30),
(25, '買衣服', '找哥們出來呼呼嘿嘿', '騎車，還沒決定', 0, 2024, 5, 19, 10, 30, 2024, 5, 19, 17, 0),
(26, '還書', '兩本，要拔書籤', '國資圖', 0, 2024, 3, 19, 13, 0, 2024, 3, 19, 15, 0),
(27, '補習班，演算法', '帶第二本', '補習班本班', 0, 2024, 6, 9, 9, 50, 2024, 6, 9, 11, 30),
(28, '掃墓', '人到就好', '跟長輩走', 0, 2024, 4, 3, 9, 15, 2024, 4, 3, 11, 30),
(29, '掃墓', '早點起來準備牲禮，叫老公帶寶貝們\r\n幫麻糬留飼料、裝水\r\n記得鎖內外門', '彰化祖厝', 0, 2024, 4, 4, 8, 30, 2024, 4, 4, 12, 30),
(30, '去銀行', '換錢，1000*30，500*10，100*50，50*100，10*500', '中信', 0, 2024, 3, 25, 9, 15, 2024, 3, 25, 11, 0),
(31, '買菜', '大蒜，蔥(用要的)，朝天椒，鳳梨，豬腰內，蛋(12)，空心菜，大陸妹，白胡椒(中藥行)，太白粉(雜貨店)，香油', '早市', 0, 2024, 3, 6, 6, 30, 2024, 3, 6, 8, 0),
(32, 'SPA', '叫好姊妹載我', '我其實也忘了', 0, 2024, 4, 28, 14, 30, 2024, 4, 28, 16, 30),
(33, '吃飯', '吃早午餐', '貝拉索Plus', 0, 2024, 12, 23, 10, 30, 2024, 12, 23, 13, 0),
(34, '續借', '開GMAIL', '電腦', 0, 2024, 3, 22, 10, 0, 2024, 3, 22, 10, 10),
(35, '喝酒', '叫那個北七載我', 'Freedom Ain\'t Free', 0, 2024, 5, 15, 21, 30, 2024, 5, 16, 2, 0),
(36, '洗被單', '厚、薄、連床單都要', '家', 0, 2024, 3, 6, 8, 0, 2024, 3, 6, 8, 30),
(37, '房間大掃除', '衣櫃也是', '家', 0, 2024, 5, 22, 9, 0, 2024, 5, 22, 10, 0),
(38, '洗車', '順便載妹仔', '我知道GOOGLE', 0, 2024, 5, 28, 14, 30, 2024, 5, 28, 16, 30),
(39, '做實驗', '上機操作', '逢甲大學 紀念館2樓', 0, 2024, 3, 12, 18, 30, 2024, 3, 12, 18, 30),
(40, '做實驗', '上機操作', '逢甲大學 紀念館2樓', 0, 2024, 3, 19, 18, 30, 2024, 3, 19, 18, 30),
(41, '報告', '檔案放雲端，帶筆電，手機開稿', '圖書館三樓', 0, 2023, 12, 30, 10, 0, 2023, 12, 30, 11, 30),
(42, '上廁所', '如題', '我家廁所', 0, 2023, 12, 30, 19, 50, 2023, 12, 30, 20, 50);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Index_user` int NOT NULL AUTO_INCREMENT COMMENT '所有人密碼都是123',
  `user_id` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_pw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Index_user`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`Index_user`, `user_id`, `user_pw`, `nickname`, `gmail`) VALUES
(1, 'D1051058', '$2y$10$mTiJX7GPaE1PoSybzJ28pu4z6GA7xXj9vBiAITAHjfq24/c6M7g/S', 'Robert', 'gmail.com'),
(2, 'D1090420', '$2y$10$mTiJX7GPaE1PoSybzJ28pu4z6GA7xXj9vBiAITAHjfq24/c6M7g/S', 'Hatlord8858', 'hipi.com'),
(3, 'D1050321', '$2y$10$mTiJX7GPaE1PoSybzJ28pu4z6GA7xXj9vBiAITAHjfq24/c6M7g/S', 'ImPlaySoBadButIDontWantoSwitch', 'IPOUY.com'),
(6, 'D4', '$2y$10$EPvCp53L.KZFVxvynel7o.Vwo20TkIRgwM9HDriunzQ7npIX.d0zO', 'terrible game', 'ay'),
(7, 'test', '$2y$10$aaJM6XgDd444.gMKU8AdjuDZ2gPhAj62vyJMFCup/nB88dDPs9Nem', 'test_account', 'test@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `user_list`
--

DROP TABLE IF EXISTS `user_list`;
CREATE TABLE IF NOT EXISTS `user_list` (
  `Index` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `schedule_index` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_list`
--

INSERT INTO `user_list` (`Index`, `user_id`, `schedule_index`) VALUES
(1, 'D1051058', '1,2,3,4,14,18'),
(2, 'D1090420', '5,9,6,13,8,41,42'),
(3, 'test', '21,22,25,26,28,30,38,39,40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
