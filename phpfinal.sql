-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:8889
-- 產生時間： 2017 年 06 月 17 日 10:27
-- 伺服器版本: 5.6.35
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `Final`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Comment`
--

CREATE TABLE `Comment` (
  `id` varchar(20) NOT NULL,
  `Issue_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `content` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Comment`
--

INSERT INTO `Comment` (`id`, `Issue_id`, `user_id`, `content`) VALUES
('ef982d471e62', 'ab', '123', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `Issue`
--

CREATE TABLE `Issue` (
  `Issue_id` varchar(2) NOT NULL,
  `Issue_status` tinyint(1) NOT NULL DEFAULT '0',
  `Assign_user` varchar(20) NOT NULL,
  `Issue_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Issue`
--

INSERT INTO `Issue` (`Issue_id`, `Issue_status`, `Assign_user`, `Issue_name`) VALUES
('ab', 1, '123', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `User`
--

CREATE TABLE `User` (
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `User`
--

INSERT INTO `User` (`user_id`, `user_name`, `user_pwd`) VALUES
('111', '111', '111'),
('123', '123', '123');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Issue_id` (`Issue_id`);

--
-- 資料表索引 `Issue`
--
ALTER TABLE `Issue`
  ADD PRIMARY KEY (`Issue_id`);

--
-- 資料表索引 `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Issue_id`) REFERENCES `Issue` (`Issue_id`);