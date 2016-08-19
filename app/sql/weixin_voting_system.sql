-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?08 �?19 �?17:36
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
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `bc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '基础设置ID',
  `key` varchar(255) NOT NULL COMMENT '键',
  `value` varchar(255) NOT NULL COMMENT '值',
  PRIMARY KEY (`bc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='基础设置表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`bc_id`, `key`, `value`) VALUES
(1, 'bp_upload_path', './upload/basic_personnel/'),
(2, 'vm_upload_path', './upload/voting_management/'),
(3, 'vm_music_upload_path', './upload/music/'),
(4, 'root_upload', './upload/'),
(5, 'allow_image_type', 'gif|jpg|png|jpeg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单配置' AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `level`, `belong_to`, `routing`, `icon`, `date_add`, `date_update`, `status`) VALUES
(1, '控制面板', 1, 0, 'admin/dashboard', 'fa fa-home', '2016-07-23 06:08:55', '2016-08-06 11:38:34', 1),
(2, '投票活动', 2, 30, '#', 'fa fa-share', '2016-07-23 06:18:44', '2016-08-12 11:59:00', 1),
(3, '基础人员信息管理', 1, 0, '#', 'fa fa-user', '2016-07-23 06:19:21', '2016-07-23 14:19:21', 1),
(4, '菜单配置', 2, 13, 'admin/menu', 'fa fa-bars', '2016-07-23 06:20:04', '2016-08-06 11:44:15', 1),
(5, '投票活动分类', 3, 2, 'admin/voting_classification', 'fa fa-circle-o', '2016-07-23 06:21:24', '2016-08-12 11:59:16', 1),
(6, '投票活动管理', 3, 2, 'admin/voting_management', 'fa fa-circle-o', '2016-07-23 06:24:39', '2016-08-12 11:59:32', 1),
(7, '人员信息', 2, 3, 'admin/basic_personnel', 'fa fa-user', '2016-07-23 06:25:34', '2016-07-23 14:25:34', 1),
(8, '图片空间', 2, 3, 'admin/image_space', 'fa fa-photo', '2016-07-23 09:26:45', '2016-07-26 16:53:10', 1),
(10, '在线文件管理器', 2, 12, 'admin/tool/file_manager', 'fa fa-folder-open-o', '2016-07-28 01:30:52', '2016-08-06 11:32:18', 1),
(11, '图片管理器', 2, 12, 'admin/tool/upload', 'fa fa-cloud-upload', '2016-07-28 07:01:38', '2016-08-06 11:32:07', 1),
(12, '管理工具', 1, 0, '#', 'fa fa-cogs', '2016-08-06 03:29:06', '2016-08-06 11:31:54', 1),
(13, '系统设置', 1, 0, '#', 'fa fa-tachometer', '2016-08-06 03:38:20', '2016-08-06 11:38:20', 1),
(31, '系统配置', 2, 13, 'admin/config/config', 'fa fa-cog', '2016-08-15 06:48:25', '2016-08-15 14:49:09', 1),
(16, '微信WeChat', 1, 0, '#', 'fa fa-weixin', '2016-08-06 03:56:35', '2016-08-06 11:56:35', 1),
(17, '数据库', 2, 12, '#', 'fa fa-database', '2016-08-06 03:58:32', '2016-08-15 09:28:16', 1),
(18, '文件管理', 2, 12, '#', 'fa fa-folder', '2016-08-06 04:03:06', '2016-08-06 12:03:06', 1),
(19, '管理员入口', 1, 0, '#', 'fa fa-sliders', '2016-08-10 03:52:13', '2016-08-10 11:52:13', 1),
(20, '用户管理', 2, 19, 'admin/auth/index', 'fa fa-user', '2016-08-10 04:03:24', '2016-08-10 16:29:34', 1),
(22, '公众号类型', 2, 16, 'admin/weixin_type', 'fa fa-wechat', '2016-08-12 03:26:35', '2016-08-16 15:36:32', 1),
(23, '公众号', 2, 16, 'admin/weixin_public', 'fa fa-wechat', '2016-08-12 03:28:04', '2016-08-16 15:36:53', 1),
(25, '模板管理', 1, 0, '#', 'fa fa-puzzle-piece', '2016-08-12 03:39:32', '2016-08-12 11:39:32', 1),
(26, '云市场', 1, 0, '#', 'fa fa-cart-plus', '2016-08-12 03:41:07', '2016-08-12 11:41:07', 1),
(27, '大数据', 1, 0, '#', 'fa fa-bar-chart', '2016-08-12 03:43:08', '2016-08-12 11:43:08', 1),
(28, '问卷调查', 2, 30, '#', 'fa fa-pencil-square-o', '2016-08-12 03:51:32', '2016-08-12 11:58:28', 1),
(29, '相册幻灯片', 2, 30, '#', 'fa fa-file-image-o', '2016-08-12 03:55:09', '2016-08-12 11:58:10', 1),
(30, '功能模块', 1, 0, '#', 'fa fa-cubes', '2016-08-12 03:57:05', '2016-08-17 09:11:58', 1),
(32, '选项配置', 1, 0, '#', 'fa fa-cog', '2016-08-17 01:20:16', '2016-08-17 09:20:16', 1),
(33, '选项类型', 2, 32, 'admin/option_type', 'fa fa-tags', '2016-08-17 01:22:53', '2016-08-17 09:22:53', 1),
(34, '选项值', 2, 32, 'admin/option_value', 'fa fa-tag', '2016-08-17 01:23:36', '2016-08-17 09:23:36', 1),
(35, '粉丝关注', 2, 16, 'admin/weixin_fans', 'fa fa-smile-o', '2016-08-19 02:01:04', '2016-08-19 10:01:04', 1);

-- --------------------------------------------------------

--
-- 表的结构 `option_type`
--

CREATE TABLE IF NOT EXISTS `option_type` (
  `ot_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '选项ID',
  `name` varchar(255) NOT NULL COMMENT '选项名',
  `type` varchar(255) NOT NULL COMMENT '类型',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `date_edit` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`ot_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='常规选项表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `option_type`
--

INSERT INTO `option_type` (`ot_id`, `name`, `type`, `date_add`, `date_edit`) VALUES
(1, '单选框', 'radio', '2016-08-17 06:54:50', '2016-08-17 15:12:31'),
(2, '复选框', 'checkbox', '2016-08-17 06:57:16', '2016-08-17 15:12:37'),
(3, '下拉框', 'select', '2016-08-17 06:57:33', '2016-08-17 15:12:29');

-- --------------------------------------------------------

--
-- 表的结构 `option_value`
--

CREATE TABLE IF NOT EXISTS `option_value` (
  `ov_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '选项值ID',
  `ot_id` int(11) NOT NULL COMMENT '选项类型',
  `key` varchar(255) NOT NULL COMMENT '键名',
  `value` varchar(255) NOT NULL COMMENT '键值',
  PRIMARY KEY (`ov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='常规选项值表' AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `option_value`
--

INSERT INTO `option_value` (`ov_id`, `ot_id`, `key`, `value`) VALUES
(1, 1, 'sex', '男'),
(2, 1, 'sex', '女'),
(3, 2, 'like', '猫'),
(4, 2, 'like', '狗'),
(5, 2, 'like', '老鼠'),
(6, 3, 'country', '中国'),
(7, 3, 'country', '日本'),
(8, 3, 'country', '美国'),
(9, 3, 'country', '韩国'),
(11, 1, 'select_vote_limit', '1'),
(12, 1, 'select_vote_limit', '2'),
(13, 1, 'select_vote_limit', '3'),
(14, 1, 'select_vote_limit', '5'),
(15, 1, 'select_vote_limit', '10'),
(16, 1, 'interval_time', '5'),
(17, 1, 'interval_time', '10'),
(18, 1, 'interval_time', '30'),
(19, 1, 'interval_time', '60'),
(20, 1, 'select_vote_limit', '0'),
(21, 1, 'interval_time', '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', NULL, 'mr2M2btTX.Zzt5chLDF3Y.a55e9920b4ffb49fc8', 1467446402, NULL, 1268889823, 1467448103, 1, 'ADMIN', '0'),
(2, '127.0.0.1', 'jiaxu chen', '$2y$08$lJwuETjVSwdPE48imLKpDOWF.iLBLEoxbkirwtVxsJmORaVR.j9ja', NULL, '1029128229@qq.com', NULL, NULL, NULL, 'GqbtIJrf9iPjBZBEoCAqy.', 1467448011, 1471586209, 1, 'company', '12345678910');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动-广告图关联表' AUTO_INCREMENT=46 ;

--
-- 转存表中的数据 `vm_banner`
--

INSERT INTO `vm_banner` (`vm_banner_id`, `vm_id`, `banner`, `banner_sort`, `date_add`, `layout`) VALUES
(26, 1, 'pexels_photo_133074_large.jpg', '2', '2016-08-10 03:23:51', 2),
(25, 1, '1medium.jpg', '1', '2016-08-10 03:23:51', 1),
(24, 1, '2.jpg', '1', '2016-08-10 03:23:51', 3),
(27, 1, 'pexels_photo_medium.jpg', '2', '2016-08-10 03:23:51', 1),
(28, 2, 'secondarytile.png', '1', '2016-08-18 07:59:37', 1),
(29, 2, 'smalllogo.png', '2', '2016-08-18 07:59:37', 2),
(30, 2, 'index_about.jpg', '3', '2016-08-18 07:59:37', 3),
(31, 3, 'new_product.jpg', '1', '2016-08-18 08:11:46', 1),
(32, 4, 'index_about1.jpg', '1', '2016-08-18 08:12:29', 1),
(33, 5, 'index_about1.jpg', '1', '2016-08-18 08:13:56', 1),
(34, 6, '1.png', '1', '2016-08-18 08:18:20', 1),
(35, 6, '8.png', '2', '2016-08-18 08:18:20', 1),
(36, 6, '9.png', '3', '2016-08-18 08:18:20', 1),
(37, 6, '2.png', '1', '2016-08-18 08:18:20', 2),
(38, 6, '6.png', '2', '2016-08-18 08:18:20', 2),
(39, 6, '4.png', '3', '2016-08-18 08:18:20', 2),
(40, 6, '3.png', '1', '2016-08-18 08:18:20', 3),
(41, 6, '5.png', '1', '2016-08-18 08:18:20', 3),
(45, 7, '91.png', '1', '2016-08-18 08:31:43', 3),
(44, 7, '81.png', '1', '2016-08-18 08:31:43', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='活动信息与基础人员关联表' AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `vm_bp`
--

INSERT INTO `vm_bp` (`vm_bp_id`, `vm_id`, `bp_id`, `votes`) VALUES
(26, 1, 1, 1),
(27, 1, 2, 0),
(28, 1, 3, 0),
(29, 1, 4, 0),
(30, 1, 5, 0),
(31, 2, 1, 0),
(32, 2, 2, 0),
(33, 2, 3, 0),
(34, 2, 4, 0),
(35, 2, 5, 0),
(36, 3, 1, 0),
(37, 3, 2, 0),
(38, 3, 3, 0),
(39, 3, 4, 0),
(40, 3, 5, 0),
(41, 4, 1, 0),
(42, 4, 2, 0),
(43, 4, 3, 0),
(44, 4, 4, 0),
(45, 5, 1, 0),
(46, 5, 2, 0),
(47, 5, 3, 0),
(48, 5, 4, 0),
(49, 6, 1, 0),
(50, 6, 2, 0),
(51, 6, 3, 0),
(52, 6, 4, 0),
(53, 6, 5, 0),
(65, 7, 1, 0),
(66, 7, 2, 0),
(67, 7, 3, 0),
(68, 7, 4, 0),
(69, 7, 5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `vm_rules`
--

CREATE TABLE IF NOT EXISTS `vm_rules` (
  `vmr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动规则配置ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `focus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '关注后投票0:否1:是',
  `vote_limit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '投票次数限制0:无限制1:有限制',
  `select_vote_limit` varchar(255) NOT NULL DEFAULT '0' COMMENT '可投票次数0:无限制',
  `interval_time` varchar(255) NOT NULL COMMENT '投票间隔时间0:不限制',
  PRIMARY KEY (`vmr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动规则配置表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `vm_rules`
--

INSERT INTO `vm_rules` (`vmr_id`, `vm_id`, `focus`, `vote_limit`, `select_vote_limit`, `interval_time`) VALUES
(1, 2, 1, 1, '1', '1'),
(2, 1, 1, 1, '1', '1'),
(3, 1, 1, 1, '1', '1'),
(4, 1, 1, 1, '1', '1'),
(5, 1, 1, 1, '1', '1'),
(9, 7, 1, 1, '5', '30');

-- --------------------------------------------------------

--
-- 表的结构 `vm_traffic`
--

CREATE TABLE IF NOT EXISTS `vm_traffic` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '访问流量ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `traffic` int(11) NOT NULL DEFAULT '0' COMMENT '流量ID',
  PRIMARY KEY (`vt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票活动访问总流量' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `vm_traffic`
--

INSERT INTO `vm_traffic` (`vt_id`, `vm_id`, `traffic`) VALUES
(1, 1, 13),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 1);

-- --------------------------------------------------------

--
-- 表的结构 `vm_vc`
--

CREATE TABLE IF NOT EXISTS `vm_vc` (
  `vm_vc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动信息与活动分类关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `vc_id` int(11) NOT NULL COMMENT '活动分类ID',
  PRIMARY KEY (`vm_vc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与活动分类关联表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `vm_vc`
--

INSERT INTO `vm_vc` (`vm_vc_id`, `vm_id`, `vc_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1);

-- --------------------------------------------------------

--
-- 表的结构 `voting_classification`
--

CREATE TABLE IF NOT EXISTS `voting_classification` (
  `vc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投票分类ID',
  `name` varchar(255) NOT NULL COMMENT '分类名称',
  `code` varchar(255) NOT NULL COMMENT '标识码',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '1:启用0:未启用',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`vc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='投票活动分类表' AUTO_INCREMENT=2 ;

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
  `statusing` int(1) NOT NULL DEFAULT '1' COMMENT '1:未进行2:进行中3:已结束',
  `rules_config` text COMMENT '规则配置',
  PRIMARY KEY (`vm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='投票活动信息管理' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `voting_management`
--

INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`, `rules_config`) VALUES
(1, 'NBA全明星投票', 'NBA全明星投票NBA全明星投票NBA全明星投票NBA全明星投票NBA全明星投票', '04bbbf28e36ddb41c8b98ee30fd98b29', '2016-08-10 02:57:32', '2016-08-11 00:00:35', '2016-08-31 00:00:19', 1, 2, '11111111111111111111111111111111111111111111111111111111111111111111111                                                                                                                                                                                                                            '),
(2, '123456', 'qwertyuiopasdfghjklzxcvbnm', '6a0d86b26b5c88b21d8b220d0fdc0c3b', '2016-08-18 07:59:37', '2016-08-18 15:58:24', '2016-08-19 15:55:09', 0, 1, '1231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313123123131312312313131231231313'),
(3, '123', 'abc', 'd2e913ec1ba4d770c1a7c916966e84c5', '2016-08-18 08:11:46', '2016-08-18 16:11:07', '2016-08-20 00:00:55', 0, 1, 'ssssssssssssssssssssssssssss'),
(4, '123', '123', '1cf08e3c1a6a4f7e893906c22a5c182b', '2016-08-18 08:12:29', '2016-08-18 16:12:10', '2016-08-18 16:12:11', 0, 1, '123213131'),
(5, '123', '123', '1d88543121b0d9974f7079aa9904679d', '2016-08-18 08:13:56', '2016-08-18 16:12:10', '2016-08-18 16:12:11', 0, 1, '123213131'),
(6, 'abcdefghijklmnopqrstuvwxyz', 'abcdefghijklmnopqrstuvwxyz', 'da461aefc422a3488bf93dbdd56efb42', '2016-08-18 08:18:20', '2016-08-18 16:17:08', '2016-08-19 16:15:09', 0, 1, '123333333333333333333333333333333333333333333333333333333332222222222222222222221111111111111111111'),
(7, '123', '12312', '9991379271c8aa98d6531706e35f8e57', '2016-08-18 08:25:28', '2016-08-18 16:25:17', '2016-08-19 00:25:14', 1, 2, '123123213213                                                                                                                                    ');

-- --------------------------------------------------------

--
-- 表的结构 `weixin_attention`
--

CREATE TABLE IF NOT EXISTS `weixin_attention` (
  `wxa_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '关注微信公众号ID',
  `wxp_id` int(11) NOT NULL COMMENT '微信公众号ID',
  `wxf_id` int(11) NOT NULL COMMENT '粉丝ID',
  PRIMARY KEY (`wxa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户关注公众号表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `weixin_attention`
--

INSERT INTO `weixin_attention` (`wxa_id`, `wxp_id`, `wxf_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `weixin_fans`
--

CREATE TABLE IF NOT EXISTS `weixin_fans` (
  `wxf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '微信粉丝ID',
  `subscribe` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1粉丝关注',
  `openid` varchar(255) NOT NULL COMMENT '用户的标识，对当前公众号唯一',
  `nickname` varchar(255) NOT NULL COMMENT '昵称',
  `sex` tinyint(1) NOT NULL COMMENT '性别男1女2未知0',
  `language` varchar(255) NOT NULL COMMENT '城市',
  `city` varchar(255) NOT NULL COMMENT '国家',
  `province` varchar(255) NOT NULL COMMENT '省份',
  `country` varchar(255) NOT NULL COMMENT '语言',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '头像',
  `subscribe_time` varchar(255) NOT NULL COMMENT '最后关注时间时间戳',
  `unionid` varchar(255) NOT NULL COMMENT '用户将公众号绑定',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `groupid` int(11) NOT NULL COMMENT '用户所在的分组ID',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`wxf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='关注微信公众号粉丝信息表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `weixin_fans`
--

INSERT INTO `weixin_fans` (`wxf_id`, `subscribe`, `openid`, `nickname`, `sex`, `language`, `city`, `province`, `country`, `headimgurl`, `subscribe_time`, `unionid`, `remark`, `groupid`, `date_add`) VALUES
(1, 1, 'o6_bmjrPTlm6_2sgVt7hMZOPfL2M', '该装就_装', 1, 'zh_CN', '潮州', '广东', '中国', 'http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0', '1382694957', 'o6_bmasdasdsad6_2sgVt7hMZOPfL', NULL, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `weixin_public`
--

CREATE TABLE IF NOT EXISTS `weixin_public` (
  `wxp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公众号ID',
  `appid` varchar(255) NOT NULL COMMENT 'AppID',
  `secret` varchar(255) NOT NULL COMMENT 'AppSecret',
  `wxt_id` int(11) NOT NULL COMMENT '公众号类型',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态:0未启用1启用',
  `sort` varchar(255) NOT NULL COMMENT '排序',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  `date_edit` datetime NOT NULL COMMENT '修改日期',
  `name` varchar(255) NOT NULL COMMENT '公众号名称',
  PRIMARY KEY (`wxp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='微信公众号表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `weixin_public`
--

INSERT INTO `weixin_public` (`wxp_id`, `appid`, `secret`, `wxt_id`, `status`, `sort`, `date_add`, `date_edit`, `name`) VALUES
(1, '123456', 'qwertyuiop', 1, 1, '1', '2016-08-16 08:14:18', '2016-08-16 16:14:18', '潮州一哥'),
(2, 'aaaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbbbbbbbbbbb', 2, 1, '2', '2016-08-16 08:14:37', '2016-08-16 16:14:37', '潮州二姐'),
(3, '333333333333333333', 'asdfghjklasdfghjklasdfghjkl', 3, 1, '3', '2016-08-16 08:14:58', '2016-08-16 16:14:58', '潮州三妹'),
(4, '44444', 'zxcvbnmzxcvbnmzxcvbnmzxcvbnm', 4, 1, '4', '2016-08-16 08:15:18', '2016-08-16 16:15:18', '潮州四弟');

-- --------------------------------------------------------

--
-- 表的结构 `weixin_type`
--

CREATE TABLE IF NOT EXISTS `weixin_type` (
  `wxt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公众号类型ID',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `sort` tinyint(2) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态0未启用1启用',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  PRIMARY KEY (`wxt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='公众号类型' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `weixin_type`
--

INSERT INTO `weixin_type` (`wxt_id`, `name`, `sort`, `status`, `date_add`) VALUES
(1, '订阅号', 1, 1, '2016-08-16 03:20:28'),
(2, '订阅号--未认证', 2, 1, '2016-08-16 03:24:31'),
(3, '服务号', 3, 1, '2016-08-16 03:24:42'),
(4, '服务号--未认证', 4, 1, '2016-08-16 03:24:54');

-- --------------------------------------------------------

--
-- 表的结构 `wx_at`
--

CREATE TABLE IF NOT EXISTS `wx_at` (
  `wxp_id` int(11) NOT NULL COMMENT '公众号ID',
  `access_token` varchar(255) NOT NULL COMMENT 'ACCESS_TOKEN',
  `expires_in` varchar(255) NOT NULL COMMENT '有效期',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='access_token表';

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
