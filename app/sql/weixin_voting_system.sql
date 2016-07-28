-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?07 �?28 �?17:30
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='基础人员信息管理表' AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `basic_personnel`
--

INSERT INTO `basic_personnel` (`bp_id`, `name`, `description`, `date_add`, `date_update`, `status`, `image`) VALUES
(5, '张三', '这是张三的个人描述！', '2016-07-09 03:03:28', '2016-07-09 11:04:17', 1, 'bp/1.png'),
(6, '李四', '这是李四的个人描述', '2016-07-09 03:03:40', '2016-07-09 11:04:23', 1, 'bp/2.png'),
(7, '王五', '这是王五的个人描述内容', '2016-07-09 03:03:52', '2016-07-09 11:04:27', 1, 'bp/3.png'),
(8, '赵六', '这是赵六的个人信息', '2016-07-09 03:04:04', '2016-07-09 11:04:30', 1, 'bp/4.png'),
(9, 'a', '我是小a', '2016-07-11 14:28:55', '2016-07-11 22:28:55', 1, 'bp/5.png'),
(10, 'b', '我是小B', '2016-07-11 14:29:13', '2016-07-11 22:29:13', 1, 'bp/6.png'),
(11, 'c', '我是小c', '2016-07-11 14:29:28', '2016-07-11 22:29:28', 1, 'bp/7.png'),
(12, 'd', '我是小D', '2016-07-11 14:29:43', '2016-07-11 22:29:43', 1, 'bp/8.png'),
(17, '123', '123', '2016-07-28 09:09:46', '2016-07-28 17:09:46', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `bp_image`
--

CREATE TABLE IF NOT EXISTS `bp_image` (
  `bp_image_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '基础人员-图片表',
  `bp_id` int(11) NOT NULL COMMENT '基础人员ID',
  `image` varchar(255) NOT NULL COMMENT '图片名',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`bp_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='基础人员-图片关联表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `bp_image`
--

INSERT INTO `bp_image` (`bp_image_id`, `bp_id`, `image`, `date_add`) VALUES
(1, 17, '112.png', '2016-07-28 09:09:46'),
(2, 17, '35.png', '2016-07-28 09:09:46'),
(3, 17, '212.png', '2016-07-28 09:09:46');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单配置' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `level`, `belong_to`, `routing`, `icon`, `date_add`, `date_update`, `status`) VALUES
(1, '控制面板', 1, 0, 'admin/dashboard', 'fa fa-dashboard', '2016-07-23 06:08:55', '2016-07-23 14:08:55', 1),
(2, '投票活动', 1, 0, '#', 'fa fa-share', '2016-07-23 06:18:44', '2016-07-23 14:18:44', 1),
(3, '基础人员信息管理', 1, 0, '#', 'fa fa-user', '2016-07-23 06:19:21', '2016-07-23 14:19:21', 1),
(4, '菜单配置', 1, 0, 'admin/menu', 'fa fa-dashboard', '2016-07-23 06:20:04', '2016-07-23 14:20:04', 1),
(5, '投票活动分类', 2, 2, 'admin/voting_classification', 'fa fa-circle-o', '2016-07-23 06:21:24', '2016-07-23 14:21:24', 1),
(6, '投票活动管理', 2, 2, 'admin/voting_management', 'fa fa-circle-o', '2016-07-23 06:24:39', '2016-07-23 14:24:39', 1),
(7, '人员信息', 2, 3, 'admin/basic_personnel', 'fa fa-user', '2016-07-23 06:25:34', '2016-07-23 14:25:34', 1),
(8, '图片空间', 2, 3, 'admin/image_space', 'fa fa-photo', '2016-07-23 09:26:45', '2016-07-26 16:53:10', 1),
(10, '在线文件管理器', 1, 0, 'admin/tool/file_manager', 'fa fa-folder-open-o', '2016-07-28 01:30:52', '2016-07-28 09:31:11', 1),
(11, '图片管理器', 1, 0, 'admin/tool/upload', 'fa fa-cloud-upload', '2016-07-28 07:01:38', '2016-07-28 15:01:38', 1);

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
(2, '127.0.0.1', 'jiaxu chen', '$2y$08$lJwuETjVSwdPE48imLKpDOWF.iLBLEoxbkirwtVxsJmORaVR.j9ja', NULL, '1029128229@qq.com', NULL, NULL, NULL, NULL, 1467448011, 1469684788, 1, 'jiaxu', 'chen', 'company', '12345678910'),
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
-- 表的结构 `vm_bp`
--

CREATE TABLE IF NOT EXISTS `vm_bp` (
  `vm_bp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动与基础人员关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `bp_id` int(11) NOT NULL COMMENT '基础人员ID',
  `votes` int(11) NOT NULL DEFAULT '0' COMMENT '票数',
  PRIMARY KEY (`vm_bp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='活动信息与基础人员关联表' AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `vm_bp`
--

INSERT INTO `vm_bp` (`vm_bp_id`, `vm_id`, `bp_id`, `votes`) VALUES
(25, 35, 5, 4),
(26, 35, 6, 2),
(27, 35, 7, 0),
(28, 35, 8, 1),
(29, 35, 9, 1),
(30, 35, 10, 0),
(31, 35, 11, 1),
(32, 35, 12, 2);

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
(1, 35, 92);

-- --------------------------------------------------------

--
-- 表的结构 `vm_vc`
--

CREATE TABLE IF NOT EXISTS `vm_vc` (
  `vm_vc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动信息与活动分类关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `vc_id` int(11) NOT NULL COMMENT '活动分类ID',
  PRIMARY KEY (`vm_vc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与活动分类关联表' AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `vm_vc`
--

INSERT INTO `vm_vc` (`vm_vc_id`, `vm_id`, `vc_id`) VALUES
(26, 35, 51);

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
) ENGINE=InnoDB  DEFAULT CHARSET=gbk COMMENT='投票活动分类表' AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `voting_classification`
--

INSERT INTO `voting_classification` (`vc_id`, `name`, `code`, `status`, `date_add`) VALUES
(51, '健身交流活动', '105f87d5d62fd654d196992ed3b545d6', 1, '2016-07-11 14:30:04');

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
  PRIMARY KEY (`vm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='投票活动信息管理' AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `voting_management`
--

INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`) VALUES
(35, '测试投票活动', '这只是一个简单的测试投票活动的例子', '7acd3b38a93c54afc0e3e0817c1ad26c', '2016-07-14 14:22:31', '2016-07-14 22:22:09', '2016-07-15 22:20:44', 1, 3);

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
