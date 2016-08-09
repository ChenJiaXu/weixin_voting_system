-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?08 �?09 �?17:27
-- 服务器版本: 5.5.47
-- PHP 版本: 5.5.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `weixin_voting_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `basic_personnel`
--

CREATE TABLE IF NOT EXISTS `basic_personnel` (
  `bp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '基础人员ID',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `description` text NOT NULL COMMENT '自我描述',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  `date_update` datetime NOT NULL COMMENT '更新日期',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:未启用1:启用',
  `image` varchar(255) NOT NULL COMMENT '照片',
  PRIMARY KEY (`bp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='基础人员信息管理表' AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `basic_personnel`
--

INSERT INTO `basic_personnel` (`bp_id`, `name`, `description`, `date_add`, `date_update`, `status`, `image`) VALUES
(18, '张三', '12131231', '2016-08-04 08:54:02', '2016-08-05 14:31:34', 1, ''),
(19, '李四', '1231', '2016-08-04 08:54:35', '2016-08-04 16:54:35', 1, ''),
(20, '王五', '123', '2016-08-04 08:54:51', '2016-08-04 16:54:57', 1, ''),
(21, '赵六', '123', '2016-08-04 08:58:13', '2016-08-04 16:58:13', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `bp_image`
--

CREATE TABLE IF NOT EXISTS `bp_image` (
  `bp_image_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '基础人员-图片表',
  `bp_id` int(11) NOT NULL COMMENT '基础人员ID',
  `image` varchar(255) NOT NULL COMMENT '图片名',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `main_image` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不是 1:是主图',
  PRIMARY KEY (`bp_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='基础人员-图片关联表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `bp_image`
--

INSERT INTO `bp_image` (`bp_image_id`, `bp_id`, `image`, `date_add`, `main_image`) VALUES
(4, 18, 'tom.jpg', '2016-08-04 08:54:02', 0),
(5, 19, 'nan.jpg', '2016-08-04 08:54:35', 1),
(6, 20, 'logo.png', '2016-08-04 08:54:51', 1),
(7, 21, 'banner1.jpg', '2016-08-04 08:58:13', 1),
(8, 18, 'banner3.jpg', '2016-08-05 06:31:34', 1);

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- 表的结构 `image_space`
--

CREATE TABLE IF NOT EXISTS `image_space` (
  `is_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `name` varchar(255) NOT NULL COMMENT '图片名',
  `real_name` text NOT NULL COMMENT '实际名',
  `image_path` text NOT NULL COMMENT '图片存放路径',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`is_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片空间' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `name` varchar(255) NOT NULL COMMENT '菜单名称',
  `level` int(1) NOT NULL COMMENT '级别',
  `belong_to` int(11) NOT NULL COMMENT '所属',
  `routing` varchar(255) NOT NULL COMMENT '路由',
  `icon` varchar(255) NOT NULL DEFAULT 'fa fa-circle-o' COMMENT '图标',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `date_update` datetime NOT NULL COMMENT '更新时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:未启用 1:启用',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单配置' AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `level`, `belong_to`, `routing`, `icon`, `date_add`, `date_update`, `status`) VALUES
(1, '控制面板', 1, 0, 'admin/dashboard', 'fa fa-home', '2016-07-23 06:08:55', '2016-08-06 11:38:34', 1),
(2, '投票活动', 1, 0, '#', 'fa fa-share', '2016-07-23 06:18:44', '2016-07-23 14:18:44', 1),
(3, '基础人员信息管理', 1, 0, '#', 'fa fa-user', '2016-07-23 06:19:21', '2016-07-23 14:19:21', 1),
(4, '菜单配置', 2, 13, 'admin/menu', 'fa fa-bars', '2016-07-23 06:20:04', '2016-08-06 11:44:15', 1),
(5, '投票活动分类', 2, 2, 'admin/voting_classification', 'fa fa-circle-o', '2016-07-23 06:21:24', '2016-07-23 14:21:24', 1),
(6, '投票活动管理', 2, 2, 'admin/voting_management', 'fa fa-circle-o', '2016-07-23 06:24:39', '2016-07-23 14:24:39', 1),
(7, '人员信息', 2, 3, 'admin/basic_personnel', 'fa fa-user', '2016-07-23 06:25:34', '2016-07-23 14:25:34', 1),
(8, '图片空间', 2, 3, 'admin/image_space', 'fa fa-photo', '2016-07-23 09:26:45', '2016-07-26 16:53:10', 1),
(10, '在线文件管理器', 2, 12, 'admin/tool/file_manager', 'fa fa-folder-open-o', '2016-07-28 01:30:52', '2016-08-06 11:32:18', 1),
(11, '图片管理器', 2, 12, 'admin/tool/upload', 'fa fa-cloud-upload', '2016-07-28 07:01:38', '2016-08-06 11:32:07', 1),
(12, '管理工具', 1, 0, '#', 'fa fa-cogs', '2016-08-06 03:29:06', '2016-08-06 11:31:54', 1),
(13, '系统设置', 1, 0, '#', 'fa fa-tachometer', '2016-08-06 03:38:20', '2016-08-06 11:38:20', 1),
(14, '基础设置', 2, 13, '#', 'fa fa-tasks', '2016-08-06 03:46:20', '2016-08-06 11:46:20', 1),
(15, '全局配置', 2, 13, '#', 'fa fa-th', '2016-08-06 03:48:07', '2016-08-06 11:48:07', 1),
(16, '微信WeChat', 1, 0, '#', 'fa fa-weixin', '2016-08-06 03:56:35', '2016-08-06 11:56:35', 1),
(17, '数据库', 2, 12, '#', 'fa fa-database', '2016-08-06 03:58:32', '2016-08-06 11:58:32', 1),
(18, '文件管理', 2, 12, '#', 'fa fa-folder', '2016-08-06 04:03:06', '2016-08-06 12:03:06', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', NULL, 'mr2M2btTX.Zzt5chLDF3Y.a55e9920b4ffb49fc8', 1467446402, NULL, 1268889823, 1467448103, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'jiaxu chen', '$2y$08$lJwuETjVSwdPE48imLKpDOWF.iLBLEoxbkirwtVxsJmORaVR.j9ja', NULL, '1029128229@qq.com', NULL, NULL, NULL, 'GqbtIJrf9iPjBZBEoCAqy.', 1467448011, 1470724378, 1, 'jiaxu', 'chen', 'company', '12345678910'),
(3, '127.0.0.1', '陈 家', '$2y$08$AjLQpNec1J77JFUptcxeZe8Phhs/.UGL.UpHZ9lH32rbvMfrdpRhG', NULL, '1105858345@qq.com', NULL, 'B.Ge.h8Iz.X2pnLmzPn1zOdbd3b9d45cf6849fc4', 1467615397, NULL, 1467605164, 1467614752, 1, '陈', '家', '中国', '12345678910');

-- --------------------------------------------------------

--
-- 表的结构 `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(15, 1, 2),
(13, 2, 1),
(14, 2, 2),
(16, 3, 2);

-- --------------------------------------------------------

--
-- 表的结构 `vm_banner`
--

CREATE TABLE IF NOT EXISTS `vm_banner` (
  `vm_banner` int(11) NOT NULL AUTO_INCREMENT COMMENT '广告图ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `banner` varchar(255) NOT NULL COMMENT '广告图名称',
  `banner_sort` varchar(255) NOT NULL COMMENT '排序',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  `layout` tinyint(1) NOT NULL COMMENT '布局1:顶部2:中间3:底部',
  PRIMARY KEY (`vm_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动-广告图关联表' AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `vm_banner`
--

INSERT INTO `vm_banner` (`vm_banner`, `vm_id`, `banner`, `banner_sort`, `date_add`, `layout`) VALUES
(1, 39, 'blog1.jpg', '1', '2016-08-09 07:57:09', 1),
(2, 39, 'blog2.jpg', '2', '2016-08-09 07:57:09', 2),
(3, 39, 'file_icon_xls.png', '3', '2016-08-09 07:57:09', 3),
(4, 39, 'blog3.jpg', '4', '2016-08-09 07:57:09', 1),
(5, 40, '11.png', '1', '2016-08-09 08:46:29', 2),
(6, 40, '7.png', '2', '2016-08-09 08:46:29', 2),
(7, 40, '8.png', '2', '2016-08-09 08:46:29', 1),
(8, 40, '9.png', '1', '2016-08-09 08:46:29', 1),
(9, 40, '31.png', '1', '2016-08-09 08:46:29', 3),
(10, 40, '21.png', '2', '2016-08-09 08:46:29', 3),
(11, 40, '5.png', '3', '2016-08-09 08:46:29', 3),
(12, 40, '4.png', '4', '2016-08-09 08:46:29', 3),
(13, 40, '6.png', '5', '2016-08-09 08:46:29', 3),
(14, 41, '12.png', '1', '2016-08-09 08:48:51', 3),
(15, 41, '81.png', '1', '2016-08-09 08:48:51', 1),
(16, 41, '91.png', '1', '2016-08-09 08:48:51', 2),
(17, 41, '22.png', '2', '2016-08-09 08:48:51', 3);

-- --------------------------------------------------------

--
-- 表的结构 `vm_bp`
--

CREATE TABLE IF NOT EXISTS `vm_bp` (
  `vm_bp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动与基础人员关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `bp_id` int(11) NOT NULL COMMENT '基础人员ID',
  `votes` int(11) NOT NULL DEFAULT '0' COMMENT '票数',
  PRIMARY KEY (`vm_bp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='活动信息与基础人员关联表' AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `vm_bp`
--

INSERT INTO `vm_bp` (`vm_bp_id`, `vm_id`, `bp_id`, `votes`) VALUES
(33, 36, 18, 4),
(34, 36, 19, 1),
(35, 36, 20, 3),
(36, 36, 21, 1),
(37, 37, 18, 0),
(38, 37, 19, 0),
(39, 37, 20, 0),
(40, 37, 21, 0),
(41, 38, 18, 0),
(42, 38, 19, 0),
(43, 38, 20, 0),
(44, 38, 21, 0),
(45, 39, 18, 0),
(46, 39, 19, 0),
(47, 39, 20, 0),
(48, 39, 21, 0),
(49, 40, 18, 0),
(50, 40, 19, 0),
(51, 40, 20, 0),
(52, 40, 21, 0),
(53, 41, 18, 0),
(54, 41, 19, 0),
(55, 41, 20, 0),
(56, 41, 21, 0);

-- --------------------------------------------------------

--
-- 表的结构 `vm_traffic`
--

CREATE TABLE IF NOT EXISTS `vm_traffic` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '访问流量ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `traffic` int(11) NOT NULL DEFAULT '0' COMMENT '流量ID',
  PRIMARY KEY (`vt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票活动访问总流量' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `vm_traffic`
--

INSERT INTO `vm_traffic` (`vt_id`, `vm_id`, `traffic`) VALUES
(2, 36, 33),
(3, 37, 5),
(4, 39, 11),
(5, 40, 1),
(6, 41, 1);

-- --------------------------------------------------------

--
-- 表的结构 `vm_vc`
--

CREATE TABLE IF NOT EXISTS `vm_vc` (
  `vm_vc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动信息与活动分类关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `vc_id` int(11) NOT NULL COMMENT '活动分类ID',
  PRIMARY KEY (`vm_vc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与活动分类关联表' AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `vm_vc`
--

INSERT INTO `vm_vc` (`vm_vc_id`, `vm_id`, `vc_id`) VALUES
(27, 36, 52),
(28, 37, 52),
(29, 38, 52),
(30, 39, 52),
(31, 40, 52),
(32, 41, 52);

-- --------------------------------------------------------

--
-- 表的结构 `voting_classification`
--

CREATE TABLE IF NOT EXISTS `voting_classification` (
  `vc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投票分类ID',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '分类名称',
  `code` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '标识码',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '1:启用0:未启用',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`vc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk COMMENT='投票活动分类表' AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `voting_classification`
--

INSERT INTO `voting_classification` (`vc_id`, `name`, `code`, `status`, `date_add`) VALUES
(52, '2016活动', '0e878859e21ad03e07fe35b1a113eea0', 1, '2016-08-04 08:58:49');

-- --------------------------------------------------------

--
-- 表的结构 `voting_management`
--

CREATE TABLE IF NOT EXISTS `voting_management` (
  `vm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投票活动信息管理ID',
  `title` varchar(255) NOT NULL COMMENT '活动标题',
  `description` text NOT NULL COMMENT '活动描述',
  `code` varchar(255) NOT NULL COMMENT '标识码',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `date_start` datetime NOT NULL COMMENT '开始时间',
  `date_end` datetime NOT NULL COMMENT '结束时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:未启用1:启用',
  `statusing` int(1) NOT NULL DEFAULT '1' COMMENT '0:未进行1:进行中2:已结束',
  `rules_config` text COMMENT '规则配置',
  PRIMARY KEY (`vm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='投票活动信息管理' AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `voting_management`
--

INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`, `rules_config`) VALUES
(36, '8月活动', '8月份的第一个小活动', 'd73bed5f59df7e9c1101e6bbff3753b9', '2016-08-04 09:00:17', '2016-08-04 17:00:02', '2016-08-05 17:00:04', 1, 3, ''),
(37, '123', 'ABC', '7d1c778dad5ab5e656ee5c05603cdca6', '2016-08-05 09:19:05', '2016-08-05 17:17:54', '2016-08-06 12:00:41', 1, 3, '活动规则：\r\n         1.AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA.\r\n         2.BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB.\r\n         3.CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'),
(38, '测试', '测试活动广告图存储是否正常', '2a6ac3084a054879ab8fdeaf0b1841b3', '2016-08-09 07:55:53', '2016-08-09 15:54:03', '2016-08-11 00:00:30', 1, 2, '12313223131'),
(39, '测试', '测试活动广告图存储是否正常', '584f4866a89db89341bd3400cd7be633', '2016-08-09 07:57:09', '2016-08-09 15:54:03', '2016-08-11 00:00:30', 1, 2, '12313223131'),
(40, 'NBA投票', '12312313131', '9dc70f5c7f4a3d4b04772f33822a2ccd', '2016-08-09 08:46:29', '2016-08-09 16:44:59', '2016-08-09 16:45:00', 1, 3, '堂悦坊新中式原创设计大赛第一期人气之星投票，现在开始了，“设计狮”们赶紧带动你们的亲友团一起嗨起来吧！！\r\n\r\n获评“人气之星”，即可获得新中式原创设计大赛人气奖证书，和价值588元的堂悦坊 “南风徐来”精美茶具一套，更有权威艺术设计专家点评、指点迷津哦！！\r\n\r\n\r\n投票时间：10月10日-10月17日\r\n投票方法：请先关注“堂悦坊家居”微信公众号，进入“人气之星投票专栏”，进行投票。\r\n特别提示：“人气之星”投票评选，与其他奖项评选无直接关系！'),
(41, '123123', '12312312313', 'b85bcb875b93819cc5f4f41fd2c489a6', '2016-08-09 08:48:51', '2016-08-10 00:00:03', '2016-08-31 00:00:51', 0, 1, '123213123132131231321313131313');

--
-- 限制导出的表
--

--
-- 限制表 `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
