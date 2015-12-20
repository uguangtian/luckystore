-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 12 月 06 日 11:23
-- 服务器版本: 5.1.36
-- PHP 版本: 5.2.10


-- last edited in 2015 11 17 by uguangtian


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- database name: `luckystore`
--

-- --------------------------------------------------------

--
-- table struct `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- insert administrator `users`
--

INSERT INTO `users` (`id`, `admin_name`, `password`) VALUES
(0, '15677379869', 'kiuhnmj');

-- --------------------------------------------------------

--
-- table struct `luckyinfo`
--

CREATE TABLE IF NOT EXISTS `luckyinfo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `qq` char(10) NOT NULL,
  `tel` char(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `title` varchar(40) NOT NULL,
  `info` text NOT NULL,
  `time` datetime NOT NULL,
  `fabu` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=34 ;
