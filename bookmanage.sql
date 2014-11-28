-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 28 日 13:55
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bookmanage`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(30) DEFAULT NULL,
  `bookdes` varchar(200) DEFAULT NULL,
  `bookauthor` varchar(15) DEFAULT NULL,
  `booktype` varchar(15) DEFAULT NULL,
  `bookdata` date DEFAULT NULL,
  `bookprice` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `bookname`, `bookdes`, `bookauthor`, `booktype`, `bookdata`, `bookprice`) VALUES
(2, 'java programing', 'this is a java  book!', 'k&r', 'computer', '2014-01-11', 400),
(3, 'banking', 'this is a banking book!', 'hit', 'financial', '2014-01-01', 200),
(4, 'philosophy', 'this is a philosophy book!', 'hit', 'philosophy', '2012-01-01', 200),
(5, 'sea', 'this is a literature book!', 'hit', 'literature', '2012-01-01', 200),
(6, 'wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200),
(7, 'wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200),
(8, 'wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200),
(9, 'wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
