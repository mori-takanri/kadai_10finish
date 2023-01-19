-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-01-19 09:35:12
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ezohubsapporo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_telno` char(11) NOT NULL,
  `customer_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_telno`, `customer_address`) VALUES
(11, '森貴規', '090-5078-38', ''),
(12, '森貴規', '090-5078-38', ''),
(13, '森貴規', '090-5078-38', ''),
(20, '那珂慎二', '090-5078-38', 't-mori@satsudora.jp'),
(25, '森貴規', '090-5078-38', 't-mori@satsudora.jp'),
(27, '那珂慎二', '090-5078-38', 't-mori@satsudora.jp'),
(28, '森貴規', '090-5078-38', 't-mori@satsudora.jp'),
(34, '寺越真知子', '00000000', ''),
(35, '寺越真知子', '090-5078-38', 't-mori@satsudora.jp'),
(39, '森貴規', '090-5078-38', 't-mori@satsudora.jp'),
(42, '竹内健吾', '090-5078-38', 't-mori@satsudora.jp'),
(43, '森貴規', '090-5078-38', 't-mori@satsudora.jp');

-- --------------------------------------------------------

--
-- テーブルの構造 `reserve`
--

CREATE TABLE `reserve` (
  `reserve_no` int(11) NOT NULL,
  `reserve_date` datetime NOT NULL,
  `room_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `numbers` int(11) NOT NULL,
  `checkin_time` char(5) NOT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `reserve`
--

INSERT INTO `reserve` (`reserve_no`, `reserve_date`, `room_no`, `customer_id`, `numbers`, `checkin_time`, `message`) VALUES
(2023010302, '2023-01-03 00:00:00', 102, 11, 4, '10:00', ''),
(2023010801, '2023-01-08 00:00:00', 101, 25, 2, '9:00～', ''),
(2023010901, '2023-01-09 00:00:00', 201, 27, 2, '12:00', ''),
(2023010902, '2023-01-09 00:00:00', 101, 28, 4, '10:00', ''),
(2023011001, '2023-01-10 00:00:00', 101, 20, 6, '16:00', ''),
(2023011101, '2023-01-11 00:00:00', 101, 34, 6, '18:00', ''),
(2023011401, '2023-01-14 00:00:00', 101, 35, 4, '14:00', '真知子さん登録されました！'),
(2023011501, '2023-01-15 00:00:00', 101, 39, 2, '午前　（9', ''),
(2023011502, '2023-01-15 00:00:00', 103, 42, 6, '午前　（9', ''),
(2023011503, '2023-01-15 00:00:00', 201, 43, 2, '午後　（1', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `room`
--

CREATE TABLE `room` (
  `room_no` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `information` varchar(255) DEFAULT NULL,
  `main_image` varchar(50) NOT NULL,
  `image1` varchar(50) DEFAULT NULL,
  `image2` varchar(50) DEFAULT NULL,
  `image3` varchar(50) DEFAULT NULL,
  `amenity` varchar(255) DEFAULT NULL,
  `dayfee` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `room`
--

INSERT INTO `room` (`room_no`, `room_name`, `information`, `main_image`, `image1`, `image2`, `image3`, `amenity`, `dayfee`, `capacity`, `type_id`) VALUES
(101, 'HIGUMAHALL', '100名収容のEZOHUBSAPPORO最大の会議室です', 'HIGUMAHALL_01.png', 'HIGUMAHALL_02.jpg', 'HIGUMAHALL_03.png', 'HIGUMAHALL_04.png', '55型可動式モニター×2台、120型モニター、プロジェクター、マイク（有線×1本、無線×2本、ピン×1本）椅子×100脚、テーブル×30台', 5000, 4, 1),
(102, 'BOOKLOUNGE', '50名～100名収容のイベントスペースです。\r\n※約3,500冊の本が集積されています。', 'BOOKLOUNGE_01.png', 'BOOKLOUNGE_02.png', 'BOOKLOUNGE_03.png', 'BOOKLOUNGE_04.png', '75型可動式モニター、テーブル、椅子、Wi-Fi、希望により250型のモニターの準備もございます', 5000, 4, 1),
(103, 'HUBスペース', '100名以上収容のラウンジスペースです。', 'HUBスペース_01.png', 'HUBスペース_02.png', 'HUBスペース_03.png', 'HUBスペース_04.png', '75型可動式モニター、Wi-Fi、キッチンスペース', 5000, 4, 1),
(201, 'OWASHI-A', '20名収容の会議室です', 'OWASHI-Aroom.jpg', 'monita.png', 'boodo.png', 'wi-fi.png', '55型モニター、Wi-Fi、ホワイトボードなど完備', 1000, 3, 2),
(202, 'OWASHI-B', '26名収容の会議室です。', 'room_01.png', 'monita.png', 'boodo.png', 'wi-fi.png', '55型モニター、Wi-Fi、ホワイトボードなど完備', 1000, 3, 2),
(203, 'EZOSHIKA-A', '10名収容の会議室です。', 'EZOSHIKAroom.jpg', 'monita.png', 'boodo.png', 'wi-fi.png', '55型モニター、Wi-Fi、ホワイトボードなど完備', 1000, 3, 2),
(204, 'EZOSHIKA-B', '10名収容の会議室です。', 'EZOSHIKAroom.jpg', 'monita.png', 'boodo.png', 'wi-fi.png', '55型モニター、Wi-Fi、ホワイトボードなど完備', 1000, 3, 2),
(205, 'EZOSHIKA-C', '10名収容の会議室です。', 'EZOSHIKAroom.jpg', 'monita.png', 'boodo.png', 'EZOSHIKA-C.jpg', '55型モニター、Wi-Fi、ホワイトボードなど完備', 1000, 3, 2),
(301, 'EZORISU-A', '6名収容の会議室です。', 'EZORISUroom.jpg', 'monita.png', 'boodo.png', 'wi-fi.png', '55型モニター、Wi-Fi、ホワイトボードなど完備', 1000, 6, 3),
(302, 'EZORISU-B', '6名収容の会議室です。', 'EZORISUroom.jpg', 'monita.png', 'boodo.png', 'wi-fi.png', '55型モニター、Wi-Fi、ホワイトボードなど完備', 1000, 6, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `room_type`
--

CREATE TABLE `room_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `room_type`
--

INSERT INTO `room_type` (`type_id`, `type_name`) VALUES
(1, '大会議室'),
(2, '中会議室'),
(3, '小会議室');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- テーブルのインデックス `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_no`),
  ADD KEY `FK_reserve_0` (`room_no`),
  ADD KEY `FK_reserve_1` (`customer_id`);

--
-- テーブルのインデックス `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `FK_room_0` (`type_id`);

--
-- テーブルのインデックス `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`type_id`);

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `FK_reserve_0` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_no`),
  ADD CONSTRAINT `FK_reserve_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- テーブルの制約 `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_room_0` FOREIGN KEY (`type_id`) REFERENCES `room_type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
