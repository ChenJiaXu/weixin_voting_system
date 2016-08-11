-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?08 �?11 �?17:19
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='基础人员信息管理表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `basic_personnel`
--

INSERT INTO `basic_personnel` (`bp_id`, `name`, `description`, `date_add`, `date_update`, `status`, `image`) VALUES
(1, '韦德', '123', '2016-08-10 02:49:04', '2016-08-10 10:49:27', 1, ''),
(2, '詹姆斯', '123', '2016-08-10 02:49:48', '2016-08-10 10:49:48', 1, ''),
(3, '科比', '123', '2016-08-10 02:50:14', '2016-08-10 10:50:24', 1, ''),
(4, '库里', '123', '2016-08-10 02:50:39', '2016-08-10 10:50:39', 1, ''),
(5, '麦迪', '123', '2016-08-10 02:51:00', '2016-08-10 10:51:00', 1, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='基础人员-图片关联表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `bp_image`
--

INSERT INTO `bp_image` (`bp_image_id`, `bp_id`, `image`, `date_add`, `main_image`) VALUES
(1, 1, '3.png', '2016-08-10 02:49:27', 1),
(2, 2, '6.png', '2016-08-10 02:49:48', 1),
(3, 3, '1.png', '2016-08-10 02:50:14', 1),
(4, 4, '7.png', '2016-08-10 02:50:39', 1),
(5, 5, '8.png', '2016-08-10 02:51:00', 1);

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'superroot', '超级管理员');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单配置' AUTO_INCREMENT=22 ;

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
(18, '文件管理', 2, 12, '#', 'fa fa-folder', '2016-08-06 04:03:06', '2016-08-06 12:03:06', 1),
(19, '管理员入口', 1, 0, '#', 'fa fa-sliders', '2016-08-10 03:52:13', '2016-08-10 11:52:13', 1),
(20, '用户管理', 2, 19, 'admin/auth/index', 'fa fa-user', '2016-08-10 04:03:24', '2016-08-10 16:29:34', 1);

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
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', NULL, 'mr2M2btTX.Zzt5chLDF3Y.a55e9920b4ffb49fc8', 1467446402, NULL, 1268889823, 1467448103, 1, 'ADMIN', '0'),
(2, '127.0.0.1', 'jiaxu chen', '$2y$08$lJwuETjVSwdPE48imLKpDOWF.iLBLEoxbkirwtVxsJmORaVR.j9ja', NULL, '1029128229@qq.com', NULL, NULL, NULL, 'GqbtIJrf9iPjBZBEoCAqy.', 1467448011, 1470896477, 1, 'company', '12345678910');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(15, 1, 2),
(13, 2, 1),
(14, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `vm_banner`
--

CREATE TABLE IF NOT EXISTS `vm_banner` (
  `vm_banner_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '广告图ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `banner` varchar(255) NOT NULL COMMENT '广告图名称',
  `banner_sort` varchar(255) NOT NULL COMMENT '排序',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  `layout` tinyint(1) NOT NULL COMMENT '布局1:顶部2:中间3:底部',
  PRIMARY KEY (`vm_banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动-广告图关联表' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `vm_banner`
--

INSERT INTO `vm_banner` (`vm_banner_id`, `vm_id`, `banner`, `banner_sort`, `date_add`, `layout`) VALUES
(26, 1, 'pexels_photo_133074_large.jpg', '2', '2016-08-10 03:23:51', 2),
(25, 1, '1medium.jpg', '1', '2016-08-10 03:23:51', 1),
(24, 1, '2.jpg', '1', '2016-08-10 03:23:51', 3),
(27, 1, 'pexels_photo_medium.jpg', '2', '2016-08-10 03:23:51', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='活动信息与基础人员关联表' AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `vm_bp`
--

INSERT INTO `vm_bp` (`vm_bp_id`, `vm_id`, `bp_id`, `votes`) VALUES
(26, 1, 1, 0),
(27, 1, 2, 0),
(28, 1, 3, 0),
(29, 1, 4, 0),
(30, 1, 5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `vm_traffic`
--

CREATE TABLE IF NOT EXISTS `vm_traffic` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '访问流量ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `traffic` int(11) NOT NULL DEFAULT '0' COMMENT '流量ID',
  PRIMARY KEY (`vt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票活动访问总流量' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vm_traffic`
--

INSERT INTO `vm_traffic` (`vt_id`, `vm_id`, `traffic`) VALUES
(1, 1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `vm_vc`
--

CREATE TABLE IF NOT EXISTS `vm_vc` (
  `vm_vc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动信息与活动分类关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `vc_id` int(11) NOT NULL COMMENT '活动分类ID',
  PRIMARY KEY (`vm_vc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与活动分类关联表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vm_vc`
--

INSERT INTO `vm_vc` (`vm_vc_id`, `vm_id`, `vc_id`) VALUES
(1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=gbk COMMENT='投票活动分类表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `voting_classification`
--

INSERT INTO `voting_classification` (`vc_id`, `name`, `code`, `status`, `date_add`) VALUES
(1, '2016年', 'ed735261029c3d557f1ead1815c65ef3', 1, '2016-08-10 02:51:15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='投票活动信息管理' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `voting_management`
--

INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`, `rules_config`) VALUES
(1, 'NBA全明星投票', 'NBA全明星投票NBA全明星投票NBA全明星投票NBA全明星投票NBA全明星投票', '04bbbf28e36ddb41c8b98ee30fd98b29', '2016-08-10 02:57:32', '2016-08-11 00:00:35', '2016-08-31 00:00:19', 1, 2, '11111111111111111111111111111111111111111111111111111111111111111111111                                                                                                                                                                                                                            ');

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
