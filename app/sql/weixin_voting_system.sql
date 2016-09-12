-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?09 �?12 �?17:22
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
(1, '示例人员', '这是系统默认展示的示例人员信息', '2016-09-12 08:13:24', '2016-09-12 16:13:24', 1);

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
(1, 1, 'default.png', '2016-09-12 08:13:24', 1);

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
(2, '127.0.0.1', '系统管理员', '$2y$08$lJwuETjVSwdPE48imLKpDOWF.iLBLEoxbkirwtVxsJmORaVR.j9ja', NULL, '1029128229@qq.com', NULL, NULL, NULL, 'GqbtIJrf9iPjBZBEoCAqy.', 1467448011, 1473668003, 1, 'company', '12345678910'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动-广告图关联表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `vm_banner`
--

INSERT INTO `vm_banner` (`vm_banner_id`, `vm_id`, `banner`, `banner_sort`, `date_add`, `layout`) VALUES
(1, 1, 'top.png', '1', '2016-09-12 08:13:24', 1),
(2, 1, 'content.png', '1', '2016-09-12 08:13:24', 2),
(3, 1, 'footer.png', '1', '2016-09-12 08:13:24', 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与基础人员关联表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vm_bp`
--

INSERT INTO `vm_bp` (`vm_bp_id`, `vm_id`, `bp_id`, `votes`) VALUES
(1, 1, 1, '0');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='活动-人员-投票详细列表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `vm_link`
--

CREATE TABLE IF NOT EXISTS `vm_link` (
  `vml_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动链接ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `link` text NOT NULL COMMENT '活动链接',
  PRIMARY KEY (`vml_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动链接表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vm_link`
--

INSERT INTO `vm_link` (`vml_id`, `vm_id`, `link`) VALUES
(1, 1, 'http://weixin_voting_system.com/home/vote/vote_activity/index/1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动规则配置表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vm_rules`
--

INSERT INTO `vm_rules` (`vmr_id`, `vm_id`, `focus`, `vote_limit`, `select_vote_limit`, `interval_time`, `online_reg`) VALUES
(1, 1, 0, 1, '0', '60', 0);

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
(1, 1, 7);

-- --------------------------------------------------------

--
-- 表的结构 `vm_user`
--

CREATE TABLE IF NOT EXISTS `vm_user` (
  `vmu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动信息-管理员-ID',
  `vm_id` int(11) NOT NULL COMMENT '活动ID',
  `user_id` int(11) NOT NULL COMMENT '管理员ID',
  PRIMARY KEY (`vmu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动信息与管理员关联表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vm_user`
--

INSERT INTO `vm_user` (`vmu_id`, `vm_id`, `user_id`) VALUES
(1, 1, 2);

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
(1, '示例分类', 'c161b5ec86781b83392ead2029ed16d7', 1, '2016-09-12 08:13:24');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票活动信息管理' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `voting_management`
--

INSERT INTO `voting_management` (`vm_id`, `title`, `description`, `code`, `date_add`, `date_start`, `date_end`, `status`, `statusing`, `rules_config`) VALUES
(1, '投票活动例子', '这是一个默认的投票展示示例例子,简单进行数据展示!', 'c161b5ec86781b83392ead2029ed16d7', '2016-09-12 08:13:24', '2016-01-01 00:00:01', '2016-12-31 23:59:59', 1, 2, '这是活动规则的配置信息');

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
