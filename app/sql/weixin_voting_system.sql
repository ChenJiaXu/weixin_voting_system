-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?09 �?14 �?09:16
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
  PRIMARY KEY (`bp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='基础人员信息管理表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `basic_personnel`
--

INSERT INTO `basic_personnel` (`bp_id`, `name`, `description`, `date_add`, `date_update`, `status`) VALUES
(1, '示例人员', '这是系统默认展示的示例人员信息', '2016-09-13 06:41:15', '2016-09-13 14:41:15', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='基础人员-图片关联表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bp_image`
--

INSERT INTO `bp_image` (`bp_image_id`, `bp_id`, `image`, `date_add`, `main_image`) VALUES
(1, 1, 'default.png', '2016-09-13 06:41:15', 1);

-- --------------------------------------------------------

--
-- 表的结构 `bp_user`
--

CREATE TABLE IF NOT EXISTS `bp_user` (
  `bpu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '人员-管理员自增ID',
  `bp_id` int(11) NOT NULL COMMENT '人员ID',
  `user_id` int(11) NOT NULL COMMENT '管理员ID',
  PRIMARY KEY (`bpu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='基础人员与管理员关联表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bp_user`
--

INSERT INTO `bp_user` (`bpu_id`, `bp_id`, `user_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `bc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '基础设置ID',
  `key` varchar(255) NOT NULL COMMENT '键',
  `value` varchar(255) NOT NULL COMMENT '值',
  PRIMARY KEY (`bc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='基础设置表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`bc_id`, `key`, `value`) VALUES
(1, 'bp_upload_path', './upload/basic_personnel/'),
(2, 'vm_upload_path', './upload/voting_management/'),
(3, 'vm_music_upload_path', './upload/music/'),
(4, 'root_upload', './upload/'),
(5, 'allow_image_type', 'gif|jpg|png|jpeg'),
(6, 'bp_image_limit', '2'),
(7, 'global_groups', '1'),
(8, 'default_bp_image_name', 'default.png');

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
(1, 'admin', '超级管理员'),
(2, 'members', '会员'),
(3, 'root', '管理员');

-- --------------------------------------------------------

--
-- 表的结构 `groups_menu`
--

CREATE TABLE IF NOT EXISTS `groups_menu` (
  `gm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户组-菜单ID',
  `groups_id` int(11) NOT NULL COMMENT '用户组ID',
  `menu_id` int(11) NOT NULL COMMENT '菜单ID',
  PRIMARY KEY (`gm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户组-菜单-权限关联表' AUTO_INCREMENT=361 ;

--
-- 转存表中的数据 `groups_menu`
--

INSERT INTO `groups_menu` (`gm_id`, `groups_id`, `menu_id`) VALUES
(280, 2, 6),
(279, 2, 5),
(278, 2, 2),
(277, 2, 30),
(359, 1, 33),
(276, 2, 35),
(275, 2, 23),
(274, 2, 16),
(273, 2, 7),
(272, 2, 3),
(358, 1, 32),
(357, 1, 29),
(356, 1, 28),
(355, 1, 6),
(354, 1, 5),
(353, 1, 2),
(352, 1, 30),
(351, 1, 27),
(350, 1, 26),
(349, 1, 25),
(348, 1, 36),
(347, 1, 20),
(346, 1, 19),
(345, 1, 35),
(344, 1, 23),
(343, 1, 22),
(342, 1, 16),
(341, 1, 31),
(340, 1, 4),
(339, 1, 13),
(328, 3, 29),
(327, 3, 28),
(326, 3, 6),
(325, 3, 5),
(324, 3, 2),
(323, 3, 30),
(322, 3, 27),
(321, 3, 26),
(320, 3, 25),
(319, 3, 35),
(318, 3, 23),
(317, 3, 16),
(316, 3, 10),
(315, 3, 12),
(314, 3, 7),
(271, 2, 1),
(313, 3, 3),
(312, 3, 1),
(338, 1, 39),
(337, 1, 18),
(336, 1, 17),
(335, 1, 11),
(334, 1, 10),
(333, 1, 12),
(332, 1, 8),
(331, 1, 7),
(330, 1, 3),
(329, 1, 1),
(360, 1, 34);

-- --------------------------------------------------------

--
-- 表的结构 `groups_setting`
--

CREATE TABLE IF NOT EXISTS `groups_setting` (
  `gs_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户组-参数设置-ID',
  `groups_id` int(11) NOT NULL COMMENT '用户组ID',
  `vote_more` varchar(255) NOT NULL COMMENT '投票次数',
  `level` tinyint(2) NOT NULL DEFAULT '99' COMMENT '用户组级别',
  PRIMARY KEY (`gs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户组-参数设置-ID' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `groups_setting`
--

INSERT INTO `groups_setting` (`gs_id`, `groups_id`, `vote_more`, `level`) VALUES
(7, 1, '999999999999999999999', 0),
(8, 2, '2', 2),
(9, 3, '100', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片空间' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单配置' AUTO_INCREMENT=40 ;

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
(35, '粉丝关注', 2, 16, 'admin/weixin_fans', 'fa fa-smile-o', '2016-08-19 02:01:04', '2016-08-19 10:01:04', 1),
(36, '管理组权限分配', 2, 19, 'admin/groups', 'fa fa-object-ungroup', '2016-08-22 06:55:16', '2016-08-25 15:45:34', 1),
(39, '重置系统', 2, 12, 'admin/reset_system', 'fa fa-recycle', '2016-09-06 09:25:43', '2016-09-06 17:25:43', 1);

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
  `username` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '40d63b5b3a4c280934d49dee001c2d84807f6b06', 'mr2M2btTX.Zzt5chLDF3Y.a55e9920b4ffb49fc8', 1467446402, NULL, 1268889823, 1467448103, 0, 'ADMIN', '0'),
(2, '127.0.0.1', '系统管理员', '$2y$08$lJwuETjVSwdPE48imLKpDOWF.iLBLEoxbkirwtVxsJmORaVR.j9ja', NULL, '1029128229@qq.com', NULL, NULL, NULL, 'GqbtIJrf9iPjBZBEoCAqy.', 1467448011, 1473813907, 1, 'company', '12345678910'),
(3, '127.0.0.1', '该装就_装', '$2y$08$wWqlCmSQhXR/aWxkeDeUdukdNXYBagLsVKVSahoxLTyQM45M89RqG', NULL, '1105858345@qq.com', NULL, NULL, NULL, NULL, 1471944446, 1473146455, 1, '1', '12345678'),
(4, '127.0.0.1', '极创汇', '$2y$08$KKblqHD81l4/81qJ9f8NkO2Cui0PnmQ1XGDUC5kQATiJV7hvpwAoy', NULL, 'jichuanghui@qq.com', NULL, NULL, NULL, NULL, 1473045821, 1473320339, 1, '极创汇网络科技有限公司', '123456789'),
(5, '127.0.0.1', '普通管理员', '$2y$08$QkHqL0gx.KfRjGXrY0AYceaoCY0pZQc4XuK8mSIUlNJ1Qyv3WVpQy', NULL, 'admin@qq.com', NULL, NULL, NULL, NULL, 1473045972, 1473057722, 1, '个人公司', '123456789');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- 转存表中的数据 `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(15, 1, 2),
(76, 2, 1),
(77, 2, 2),
(78, 2, 3),
(22, 3, 2),
(23, 4, 2),
(86, 5, 2),
(87, 5, 3);

-- --------------------------------------------------------

--
-- 表的结构 `vc_user`
--

CREATE TABLE IF NOT EXISTS `vc_user` (
  `vcu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动分类-管理员-id',
  `vc_id` int(11) NOT NULL COMMENT '活动分类ID',
  `user_id` int(11) NOT NULL COMMENT '管理员ID',
  PRIMARY KEY (`vcu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动分类与管理员关联表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vc_user`
--

INSERT INTO `vc_user` (`vcu_id`, `vc_id`, `user_id`) VALUES
(1, 1, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动-广告图关联表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `vm_banner`
--

INSERT INTO `vm_banner` (`vm_banner_id`, `vm_id`, `banner`, `banner_sort`, `date_add`, `layout`) VALUES
(1, 1, 'top.png', '1', '2016-09-13 06:41:15', 1),
(2, 1, 'content.png', '1', '2016-09-13 06:41:15', 2),
(3, 1, 'footer.png', '1', '2016-09-13 06:41:15', 3),
(9, 2, 'sass_less.png', '3', '2016-09-13 06:57:20', 3),
(8, 2, 'devices.png', '2', '2016-09-13 06:57:20', 2),
(7, 2, 'components.png', '1', '2016-09-13 06:57:20', 1);

-- --------------------------------------------------------

--
-- 表的结构 `vm_bp`
--

CREATE TABLE IF NOT EXISTS `vm_bp` (
  `vm_bp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动与基础人员关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `bp_id` int(11) NOT NULL COMMENT '基础人员ID',
  `votes` varchar(255) NOT NULL DEFAULT '0' COMMENT '投票合计',
  PRIMARY KEY (`vm_bp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与基础人员关联表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `vm_bp`
--

INSERT INTO `vm_bp` (`vm_bp_id`, `vm_id`, `bp_id`, `votes`) VALUES
(1, 1, 1, '0'),
(3, 2, 1, '1'),
(4, 3, 1, '0');

-- --------------------------------------------------------

--
-- 表的结构 `vm_bp_vote_list`
--

CREATE TABLE IF NOT EXISTS `vm_bp_vote_list` (
  `vbvl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动-人员-投票列表-ID',
  `vm_bp_id` int(11) NOT NULL COMMENT '当前活动对应人员ID',
  `wxf_id` int(11) DEFAULT '0' COMMENT '关注粉丝ID',
  `name` varchar(255) DEFAULT '游客' COMMENT '姓名/昵称',
  `ip` varchar(255) DEFAULT NULL COMMENT 'IP地址',
  `voting_time` datetime NOT NULL COMMENT '投票时间',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  PRIMARY KEY (`vbvl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动-人员-投票详细列表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vm_bp_vote_list`
--

INSERT INTO `vm_bp_vote_list` (`vbvl_id`, `vm_bp_id`, `wxf_id`, `name`, `ip`, `voting_time`, `vm_id`) VALUES
(1, 3, 0, '游客', '127.0.0.1', '2016-09-13 15:06:58', 2);

-- --------------------------------------------------------

--
-- 表的结构 `vm_link`
--

CREATE TABLE IF NOT EXISTS `vm_link` (
  `vml_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动链接ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `link` text NOT NULL COMMENT '活动链接',
  PRIMARY KEY (`vml_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动链接表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `vm_link`
--

INSERT INTO `vm_link` (`vml_id`, `vm_id`, `link`) VALUES
(1, 2, 'http://weixin_voting_system.com/home/vote/vote_activity/index/2'),
(2, 3, 'http://weixin_voting_system.com/home/vote/vote_activity/index/3');

-- --------------------------------------------------------

--
-- 表的结构 `vm_rules`
--

CREATE TABLE IF NOT EXISTS `vm_rules` (
  `vmr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动规则配置ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `focus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '关注后投票0:否1:是',
  `vote_limit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '投票次数限制0:关闭1:开启',
  `select_vote_limit` varchar(255) NOT NULL DEFAULT '0' COMMENT '可投票次数0:无限制',
  `interval_time` varchar(255) NOT NULL COMMENT '投票间隔时间0:不限制',
  `online_reg` tinyint(1) NOT NULL DEFAULT '0' COMMENT '在线报名0:未开启1:开启',
  PRIMARY KEY (`vmr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动规则配置表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `vm_rules`
--

INSERT INTO `vm_rules` (`vmr_id`, `vm_id`, `focus`, `vote_limit`, `select_vote_limit`, `interval_time`, `online_reg`) VALUES
(1, 1, 0, 1, '0', '60', 0),
(3, 2, 0, 1, '10', '10', 0),
(4, 3, 0, 0, '0', '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `vm_traffic`
--

CREATE TABLE IF NOT EXISTS `vm_traffic` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '访问流量ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `traffic` int(11) NOT NULL DEFAULT '0' COMMENT '流量ID',
  PRIMARY KEY (`vt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票活动访问总流量' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `vm_traffic`
--

INSERT INTO `vm_traffic` (`vt_id`, `vm_id`, `traffic`) VALUES
(1, 1, 1),
(2, 2, 27),
(3, 3, 2);

-- --------------------------------------------------------

--
-- 表的结构 `vm_user`
--

CREATE TABLE IF NOT EXISTS `vm_user` (
  `vmu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动信息-管理员-ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `user_id` int(11) NOT NULL COMMENT '管理员ID',
  PRIMARY KEY (`vmu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与管理员关联表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `vm_user`
--

INSERT INTO `vm_user` (`vmu_id`, `vm_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- 表的结构 `vm_vc`
--

CREATE TABLE IF NOT EXISTS `vm_vc` (
  `vm_vc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动信息与活动分类关联ID',
  `vm_id` int(11) NOT NULL COMMENT '活动信息ID',
  `vc_id` int(11) NOT NULL COMMENT '活动分类ID',
  PRIMARY KEY (`vm_vc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与活动分类关联表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `vm_vc`
--

INSERT INTO `vm_vc` (`vm_vc_id`, `vm_id`, `vc_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票活动分类表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `voting_classification`
--

INSERT INTO `voting_classification` (`vc_id`, `name`, `code`, `status`, `date_add`) VALUES
(1, '示例分类', 'feae1ea7a703425f49579b5198d28e01', 1, '2016-09-13 06:41:15');

-- --------------------------------------------------------

--
-- 表的结构 `voting_management`
--

CREATE TABLE IF NOT EXISTS `voting_management` (
  `vm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投票活动信息管理ID',
  `title` varchar(255) NOT NULL COMMENT '活动标题',
  `description` longtext NOT NULL COMMENT '活动描述',
  `code` varchar(255) NOT NULL COMMENT '标识码',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `date_start` datetime NOT NULL COMMENT '开始时间',
  `date_end` datetime NOT NULL COMMENT '结束时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:未启用1:启用',
  `statusing` int(1) NOT NULL DEFAULT '1' COMMENT '1:未进行2:进行中3:已结束',
  `rules_config` longtext COMMENT '规则配置',
  PRIMARY KEY (`vm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票活动信息管理' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `voting_management`
--

INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`, `rules_config`) VALUES
(1, '投票活动例子', '这是一个默认的投票展示示例例子,简单进行数据展示!', 'feae1ea7a703425f49579b5198d28e01', '2016-09-13 06:41:15', '2016-01-01 00:00:01', '2016-12-31 23:59:59', 1, 2, '这是活动规则的配置信息');
INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`, `rules_config`) VALUES
(2, '微信投票策划方案-2015年微信公众平台微信投票活动大赛', '&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px;line-height: 1.5&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;一、&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;.&amp;lt;/strong&amp;gt;&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px;line-height: 1.5&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动描述&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;br/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动主题：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2015&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;年微信公众平台微信投票活动大赛&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;赛事宗旨：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;）标题就定位：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2015&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;年明日之星微投票活动大赛&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（创意越高越好）&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;）微信文案，&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;说明活动的目的，和参与的奖项设定，活动单位。要想引到其它观点的话，那么越详细越好。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;）照片选择和活动相关的，需要美化图片，越漂亮越好，刺激用户，让其产生喜好感。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动时间：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2015&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;年&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;月&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;20&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;日&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;--2015&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;年&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;月&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;20&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;日&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;规格规模：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;面向葫芦岛地区的所有学校，进行选取&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;30&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;个孩子，进入选取，最终评出前三名。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动主办单位：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;葫芦岛&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;*******&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;文化传媒中心&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-align: center;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/ueditor/php/upload/image/20160913/1473749617925269.png&amp;quot; alt=&amp;quot;&amp;quot;/&amp;gt;&amp;lt;br/&amp;gt;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;二、&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;.&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动须知&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;本次参与评选的微信公众平台投票是明日之星，报名时，请根据自身内容特色自主选择。（文艺，书法，绘画。等才艺）&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2.&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;参与评审的裁判为葫芦岛当地居民，与葫芦岛地区无关或不具备地域特性的&amp;lt;a href=&amp;quot;http://toupiao.wanhunet.com/&amp;quot; target=&amp;quot;_blank&amp;quot; style=&amp;quot;;padding: 0px;color: rgb(123, 123, 124);cursor: pointer;outline: none&amp;quot;&amp;gt;微信投票&amp;lt;/a&amp;gt;，不在评审范围。（这点防止瞎投票，乱投。）&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;以下所有信息均为必填，请务必如实填写完整资料，并上传微信号二维码图片，资料确实审核将无法通过。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;请务必留下对接人姓名及联系方式，以便工作人员与您取得联系。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;参评的微信号一经合适存在刷票行为，或用户投诉有不实，不良等信息，立即取消评选资格。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;三、活动执行&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;报名阶段：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;*******&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;网，&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;QQ&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;群，微信公众平台。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;海选阶段：有网友参与海选投票，主板方将根据票数选出每个类别的&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;30&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;强&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;复选阶段：由参赛方进行评选，根据界面设计，关注量，内容质量，服务性，互动性，创新性，技术稳定性，后台运营管理等方面的标准，在没雷中选出&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;20&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;强。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;最终，大赛将结合网友票数和微信投票票数，评选出三个孩子。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;此外，还将评选出若干个创意孩子，如：最加创意奖，最具土豪的孩子。等&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;微信公众号大赛评选活动将于活动举报完事发布。详情见，微信公众平台，&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;*******&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;网。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;四、&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;.&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动推广&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;展示页面：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;*******&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;网站，制作专题页面，凡报名参加的人够可以在网站上展示，包括二维码，个性化功能，特色介绍等，网页可以从中获得喜欢的孩子的信息，投票给自己喜欢的孩子。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;网络广告：可以在蒲公英平台进行广告展示。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;br/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;微信在线上活动宣传：为激励广大网友投票转发，海选期间将开展（点赞就有好礼相送）分享&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;50&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;个微信好友送礼物活动&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;导入老客户，添加微信号，关注微信公众平台。推广网站，把微信二维码放入网站上，进行推广，可以换群，加群。论坛，微博。&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;QQ&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;。可以在葫芦岛市各大网站进行帖子宣传。葫芦岛论坛，葫芦岛网站，葫芦岛贴吧。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;微信投票&amp;lt;/strong&amp;gt;.&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;线下可以进行，葫芦岛广播，报纸，杂志，公交车站，商场。电影院。进行海报宣传。通过不同主题的有奖活动吸引潜在粉丝参与其中，引发转发、分享，从而不断积累人气，形成口碑效果&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;五&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;.&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动预算&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;员工工资&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;+&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动礼品&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;+&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;宣传&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;=&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动策划&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动介绍（文案）&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;br/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;一、活动意义：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;亲，准备好了吗？如果您在生活中无意拍到了自己一张满意的照片，那么请不要害羞，拿起自己的勇气，来参加微信投票大赛吧，如果您认为自己的孩子多才多艺，就请您大胆晒出来吧！&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;二、活动主题：有才你就赛出来，欢乐你我他！&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;三、主办单位：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;*******&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;网、博远传媒官方微信&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;四、投票时间：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;投票开始时间：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2015&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;年&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;月&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;20&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;日上午&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;9:00&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;投票截止时间：&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2015&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;年&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;月&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;20&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;日上午&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;9:00&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;五、报名条件：首先您必须是家长；其次您的孩子年满&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;16&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;周岁以下；最好您必须是咱本地人或是工作、生活在葫芦岛市的外地人！&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;六、奖项设置：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;）本次活动总计&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;期，每期为&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;30&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;人，微信投票&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;30&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;晋&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;6&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（每期投票为&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;10&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;天，时间到期自动截止），每期前六名为优秀奖。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;）每期前&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;6&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;名优秀奖共&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;30&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;人参加总决赛评出一、二、三等奖：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;一等奖&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;名：现金&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;300&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元＋价值&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2980&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元深圳香港澳门珠海&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;天&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;晚双人游＋神话婚纱摄影&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1088&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元个人写真集一套＋&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;XXX&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（招商中。。。&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;)&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;二等奖&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;名：现金&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;200&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元＋价值&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2980&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元深圳香港澳门珠海&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;天&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;晚双人游&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;+&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;神话婚纱摄影&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;788&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元个人写真集一套＋&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;XXX&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（招商中。。。&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;)&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;三等奖&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;名：现金&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;100&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元＋价值&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2980&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元深圳香港澳门珠海&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;天&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;晚双人游&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;+&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;神话婚纱摄影&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;458&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元个人写真集一套＋&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;XXX&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（招商中。。。&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;)&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;优秀奖&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;30&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;名： 西子名妆提供&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;168&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元美肤宝臻护透白礼盒一套＋&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;XXX&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（招商中。。。&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;)&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;参赛者&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;150&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;名 ：参赛即可获得神话婚纱摄影机构&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;268&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元个人写真一套＋西子名妆提供的&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;50&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;元韩伊芦荟水漾晶致套和西藏红花面膜&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;片＋&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;XX X&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;（招商中。。。&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;)&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2015&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;年微信公众平台微信投票活动大赛投票细则&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;投票规则：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;投票方式一：微信投票：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;、关注明日之星在线微信公众平台：“&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;mrzx&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;”回复“投票”进行投票，具体操作步骤：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;【点击微信右上角“＋”添加朋友，查找公众号：“&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;mrzx&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;”，点击关注即可投票】&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;、扫描在线微信公众平台二维码加关注投票：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 24px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;amp;lt;span style=&amp;amp;quot;;padding: 0px;font-family: &amp;amp;#39;M', '933835056b832d9252d98d0d35993593', '2016-09-13 06:55:43', '2016-09-13 14:53:44', '2016-09-30 14:50:48', 1, 2, '&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动背景：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;大学生是国家宝贵的人才资源，是民族的希望、祖国的未来。大学生的就业问题，不仅关系到千家万户的切身利益，更关系到国家的经济建设和社会稳定，关系到社会主义和谐社会的构建。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;就现在大学生就业问题&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;北京教育人才培训中心主任：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;任占忠提出了三点&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;第一个因素是定位：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;学生究竟要找什么样的工作？在这点上，定位会直接影响到相当一部分人能不能找到工作。比如我们的学生很多所读的院校名气不大，学历也不太高，能力也不是很强，那么求职时却对薪资、对单位等等要求较高，这就很难实现，必然会导致他待业。我觉得定位是影响学生就业的一个很要紧的因素，所以说要做好定位。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;第二个因素是就业竞争力：面对严峻的就业形势，学生必须提升自己的就业竞争能力，这才是最主要的。然而竞争能力是什么？实际上就是适应企业需要的能力。能力是决定学生能不能就业的一个关键性点。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;第三个因素是心态：心态主要反映在就业面试环节，有时候心理素质弱的人，求职时会有心理障碍，临场发挥不是很好。&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; “天之骄子”的失落：大学生就业面临的困境 “毕业即失业”！&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动目的：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;增加公司微信公众平台粉丝，扩大公司宣传范围，为公司业务开展做铺垫。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动主题：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;“和谐校园·放飞梦想”&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动时间：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2015年5月20日&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动地点：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;XX大学&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动对象：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;大学学生&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动内容：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;和谐校园·放飞梦想&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;目前广泛的大学生还是在就业问题上纠结，很多学生认为，就业其实很难很难。放下了学习的包袱，迈着忐忑的步伐来到了社会当中，看着社会上形形色色的人或事，感觉很是迷茫，不知自己将要何去何从。很多刚毕业的大学生为了摆脱无所事事的当下，就盲目的选择了自己所不喜欢的行业或者工作。&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;为了改变大学生面对就业问题的纠结与困难，现在，由**教育公司发出的“和谐校园·放飞梦想”投票活动，活动主题明了，为了帮助大学生更好的实现就业问题，以现在大学生就业问题展开投票活动。通过自己面对就业问题而所想到的见解或建议，编辑成图文的形式，上传至投票活动平台，用你的见解或建议寻求与你志同道合的朋友。最终你的见解或建议是否能够脱颖而出？最终你的观点是否被其他人所认可？那就赶紧来参加“和谐校园·放飞梦想”投票活动吧！&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动流程：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;主办方活动流程：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1、构建一个投票选举的活动平台，供参加活动的成员提交参加材料；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2、活动相关负责人，针对参赛方所提交的资料进行审核，审合通过，即表示可参加此次投&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp; 票活动，审核时间之内为提交资料的，亦可在活动结束之内报名提交资料参与活动；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3、随时关注平台活动数据以及微信公众平台粉丝增加数据；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4、活动期间，杜绝虚假及禁播类信息的传播，本次活动不设评委，由微友以及自己的好友&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp; 实际投票数为准；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5、活动结束之后，根据最终票数数据，选出相应奖励人员名单，并公布；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;6、主办方为获胜者准备奖品；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;承办方活动流程：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1、推荐相关负责人，进行针对此次活动的宣传工作；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2、设定活动咨询处，为参与活动的同学解答活动相关问题；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3、设定活动奖品发放处，能够让参与活动获奖者不费周折的领取到相应的奖品；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;参与方活动流程：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;margin-left: 0;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;text-indent: 0;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1、&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;通过自己的见解或建议制作属于自己的图文材料（图文并茂），文字内容在100字之内，&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp; 设计制作完成之后，通过投票网站提示，进行相关资料上传；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2、报名方式：首先关注**教育微信公众号，对话框内，输入“报名”，按照步骤进行报&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp; 名，报名申请成功之后，需要官方为其提交的资料进行审核；报名成功后，会提示你报&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp; 名成功，你的编号是XXX，如没有编号提示，表示报名未成功，请再次提交申请资料；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3、通过自己对身边朋友圈的拉票，对自己选出的照片进行投票（每个微信号每天仅限一次&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp; 投票权利）；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4、投票方式：扫描二维码关注**教育微信公众号，对话框内输入你所想投票者的编号即&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp;&amp;amp;nbsp; 可进行对应的投票；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;margin-left: 0;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;text-indent: 0;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;5、&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动从开始至结束，均可上传你心中对大学生就业问题的见解或建议来进行报名并参与&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;&amp;amp;nbsp; &amp;amp;nbsp;投票活动；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;6、获得奖品的成员，提供相关的证明资料，统一时间到指定地点领取奖品；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;备注：活动时间及地点待定；本次投票绝不弄虚作假，一切已实际投票数为准；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动报名时间：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;资料审核时间：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动结束时间：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;奖品领取时间：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动奖品领取：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动结束之后，主办方会公布本次活动获奖名单（相关数据可于参加活动官网查看，本次活动杜绝弄虚作假），获奖名单中获奖人员，可凭借参与活动时的相关资料（身份证明或照片等证明材料）至承办方办事处领取相应名次奖励；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;奖品内容：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;一等奖：一名——奖品为：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;二等奖：二名——奖品为：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;text-indent: 28px;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;三等奖：三名——奖品为：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;宣传途径：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;1、通过印刷宣传单页，在活动举办院校发放，让更多的学生了解活动内容；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;2、通过横挂条幅，于校区内；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;3、通过学生会成员，在学生课间休息时间，通过学校广播，进行活动内容的宣传；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;4、通过学校BBS网站进行活动内容的宣传；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动主办方：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;**教育&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动承办方：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;XX学校&amp;lt;/span&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动预算：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;奖品费用：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;软硬件服务费：&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;宣传单页：210*285mm 127g铜版纸 10000份 1100元&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;条幅：300*3000mm&amp;amp;nbsp; 5条&amp;amp;nbsp;&amp;amp;nbsp; 300元&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;海报：50*80cm&amp;amp;nbsp; 20张100元&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;印刷费共计：1500元&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;margin-top: 0px;margin-bottom: 0px;padding: 0px 15px;font-size: 14px;line-height: 21px;color: rgb(123, 123, 124);font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;white-space: normal;background-color: rgb(255, 255, 255)&amp;quot;&amp;gt;&amp;lt;strong style=&amp;quot;;padding: 0px&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;活动总结：&amp;lt;/span&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;span style=&amp;quot;;padding: 0px;font-family: &amp;amp;#39;Microsoft YaHei&amp;amp;#39;&amp;quot;&amp;gt;通过此次活动，微信公众平台增加粉丝数量；是否有问题产生；今后举办此类活动是否有改进之处；&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;&amp;lt;br/&amp;gt;&amp;lt;/p&amp;gt;');
INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`, `rules_config`) VALUES
(3, '123123123213', '&amp;lt;p style=&amp;quot;text-align:center&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755829101632.png&amp;quot; title=&amp;quot;1473755829101632.png&amp;quot; alt=&amp;quot;devices.png&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;span style=&amp;quot;font-size: 36px; font-family: 微软雅黑, &amp;amp;#39;Microsoft YaHei&amp;amp;#39;;&amp;quot;&amp;gt;&amp;lt;strong&amp;gt;这是活动信息的描述内容&amp;lt;/strong&amp;gt;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;', '1285cca605168b16155a6dabb52d53da', '2016-09-13 08:40:30', '2016-09-13 16:38:50', '2016-09-30 00:00:53', 1, 2, '&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755964981597.png&amp;quot; title=&amp;quot;1473755964981597.png&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755964292056.jpg&amp;quot; title=&amp;quot;1473755964292056.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965680633.jpg&amp;quot; title=&amp;quot;1473755965680633.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965111658.jpg&amp;quot; title=&amp;quot;1473755965111658.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965956682.jpg&amp;quot; title=&amp;quot;1473755965956682.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965558079.jpg&amp;quot; title=&amp;quot;1473755965558079.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965987235.jpg&amp;quot; title=&amp;quot;1473755965987235.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965132288.jpg&amp;quot; title=&amp;quot;1473755965132288.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965481697.jpg&amp;quot; title=&amp;quot;1473755965481697.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755965351053.png&amp;quot; title=&amp;quot;1473755965351053.png&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;/upload/ueditor/php/upload/image/20160913/1473755966330182.jpg&amp;quot; title=&amp;quot;1473755966330182.jpg&amp;quot;/&amp;gt;&amp;lt;/p&amp;gt;&amp;lt;p&amp;gt;&amp;lt;br/&amp;gt;&amp;lt;/p&amp;gt;');

-- --------------------------------------------------------

--
-- 表的结构 `weixin_access_token`
--

CREATE TABLE IF NOT EXISTS `weixin_access_token` (
  `wxp_id` int(11) NOT NULL COMMENT '公众号ID',
  `access_token` varchar(255) NOT NULL COMMENT 'ACCESS_TOKEN',
  `expires_in` varchar(255) NOT NULL COMMENT '有效期',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='access_token表';

-- --------------------------------------------------------

--
-- 表的结构 `weixin_attention`
--

CREATE TABLE IF NOT EXISTS `weixin_attention` (
  `wxa_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '关注微信公众号ID',
  `wxp_id` int(11) NOT NULL COMMENT '微信公众号ID',
  `wxf_id` int(11) NOT NULL COMMENT '粉丝ID',
  PRIMARY KEY (`wxa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户关注公众号表' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='关注微信公众号粉丝信息表' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='微信公众号表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `weixin_public`
--

INSERT INTO `weixin_public` (`wxp_id`, `appid`, `secret`, `wxt_id`, `status`, `sort`, `date_add`, `date_edit`, `name`) VALUES
(1, '1234567890', 'qwertyuiop', 1, 1, '1', '2016-09-05 06:34:25', '2016-09-05 14:34:25', '该装就_装'),
(2, '0987654321', 'asdfghjkl', 1, 1, '1', '2016-09-05 06:35:41', '2016-09-05 14:35:41', '极创汇');

-- --------------------------------------------------------

--
-- 表的结构 `weixin_public_users`
--

CREATE TABLE IF NOT EXISTS `weixin_public_users` (
  `wxpu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '微信公众号绑定账号ID',
  `wxp_id` int(11) NOT NULL COMMENT '公众号ID',
  `user_id` int(11) NOT NULL COMMENT '管理员账号ID',
  PRIMARY KEY (`wxpu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='微信公众号绑定管理员账号关联表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `weixin_public_users`
--

INSERT INTO `weixin_public_users` (`wxpu_id`, `wxp_id`, `user_id`) VALUES
(1, 1, 3),
(2, 2, 4);

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
