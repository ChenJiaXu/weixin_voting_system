<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/dashboard'] = 'Dashboard';
$route['admin/auth/login'] = 'admin/auth/Auth/login';
$route['admin/auth'] = 'admin/auth/Auth/index';
$route['admin/auth/index'] = 'admin/auth/Auth/index';
$route['admin/auth/create_user'] = 'admin/auth/Auth/create_user';
$route['admin/auth/create_group'] = 'admin/auth/Auth/create_group';
$route['admin/auth/edit_group/(:any)'] = 'admin/auth/Auth/edit_group/$1';
$route['admin/auth/activate/(:any)'] = 'admin/auth/Auth/activate/$1';
$route['admin/auth/deactivate/(:any)'] = 'admin/auth/Auth/deactivate/$1';
$route['admin/auth/edit_user/(:any)'] = 'admin/auth/Auth/edit_user/$1';
$route['admin/auth/forgot_password'] = 'admin/auth/Auth/forgot_password';
$route['admin/auth/reset_password/(:any)'] = 'admin/auth/Auth/reset_password/$1';

//--------------------------投票活动模块---------------------------//
$route['admin/voting_classification'] = 'admin/vote/Voting_Classification';//投票分类
$route['admin/voting_classification/add'] = 'admin/vote/Voting_Classification/add';//投票活动-新增
$route['admin/voting_classification/edit/(:any)'] = 'admin/vote/Voting_Classification/edit/$1';//投票活动-编辑
$route['admin/voting_classification/delete/(:any)'] = 'admin/vote/Voting_Classification/delete/$1';//投票活动-删除

$route['admin/voting_management'] = 'admin/vote/Voting_Management';//投票活动信息管理
$route['admin/voting_management/add'] = 'admin/vote/Voting_Management/add';//投票活动信息管理-新增
$route['admin/voting_management/edit/(:any)'] = 'admin/vote/Voting_Management/edit/$1';//投票活动信息管理-编辑
$route['admin/voting_management/delete/(:any)'] = 'admin/vote/Voting_Management/delete/$1';//投票活动信息管理-删除
$route['admin/voting_management/ap/(:any)'] = 'admin/vote/Voting_Management/ap/$1';//活动预览
$route['admin/voting_management/votes'] = 'admin/vote/Voting_Management/votes';//投票

//--------------------------基础人员信息模块-----------------------//
$route['admin/basic_personnel'] = 'admin/user/Basic_Personnel';//基础人员
$route['admin/basic_personnel/add'] = 'admin/user/Basic_Personnel/add';//基础人员-新增
$route['admin/basic_personnel/edit/(:any)'] = 'admin/user/Basic_Personnel/edit/$1';//基础人员-编辑
$route['admin/basic_personnel/delete/(:any)'] = 'admin/user/Basic_Personnel/delete/$1';//基础人员-删除
$route['admin/basic_personnel/upload'] = 'admin/user/Basic_Personnel/upload';//基础人员-图片上传

$route['admin/image_space'] = 'admin/user/Image_Space';//图片空间
$route['admin/image_space/add'] = 'admin/user/Image_Space/add';//图片空间-新增
$route['admin/image_space/edit/(:any)'] = 'admin/user/Image_Space/edit/$1';//图片空间-编辑
$route['admin/image_space/delete/(:any)'] = 'admin/user/Image_Space/delete/$1';//图片空间-删除

//----------------------------------前台投票访问路径-----------------------------------------//
$route['home/vote/vote_activity/index/(:any)'] = 'home/vote/Vote_Activity/index/$1'; //投票

//----------------------------------菜单配置模块---------------------------------------//
$route['admin/menu'] = 'admin/menu/Menu'; //菜单配置
$route['admin/menu/add'] = 'admin/menu/Menu/add'; //菜单配置
$route['admin/menu/edit/(:any)'] = 'admin/menu/Menu/edit/$1';//菜单配-编辑
$route['admin/menu/delete/(:any)'] = 'admin/menu/Menu/delete/$1';//菜单配-删除
$route['admin/menu/auto_compare'] = "admin/menu/Menu/auto_compare";//自动比较

//---------------------------------------在线文件管理器------------------------------------//
$route['admin/init_elfinder'] = "admin/tool/File_Manager/init_elfinder";//

//---------------------------------------微信------------------------------------//

/**
 * 微信公众号类型
 */
$route['admin/weixin_type'] = 'admin/weixin/Weixin_Type';//公众号类型
$route['admin/weixin_type/add'] = 'admin/weixin/Weixin_Type/add';//公众号类型-新增
$route['admin/weixin_type/edit/(:any)'] = 'admin/weixin/Weixin_Type/edit/$1';//公众号类型-编辑
$route['admin/weixin_type/delete/(:any)'] = 'admin/weixin/Weixin_Type/delete/$1';//公众号类型-删除

/**
 * 微信公众号
 */
$route['admin/weixin_public'] = 'admin/weixin/Weixin_Public';//公众号
$route['admin/weixin_public/add'] = 'admin/weixin/Weixin_Public/add';//公众号-新增
$route['admin/weixin_public/edit/(:any)'] = 'admin/weixin/Weixin_Public/edit/$1';//公众号-编辑
$route['admin/weixin_public/delete/(:any)'] = 'admin/weixin/Weixin_Public/delete/$1';//公众号-删除

//--------------------------------------- 选项 ------------------------------------//
/**
 * 选项类型
 */
$route['admin/option_type'] = 'admin/option/Option_Type';//选项类型
$route['admin/option_type/add'] = 'admin/option/Option_Type/add';//选项类型-新增
$route['admin/option_type/edit/(:any)'] = 'admin/option/Option_Type/edit/$1';//选项类型-编辑
$route['admin/option_type/delete/(:any)'] = 'admin/option/Option_Type/delete/$1';//选项类型-删除

/**
 * 选项值
 */
$route['admin/option_value'] = 'admin/option/Option_Value';//选项值
$route['admin/option_value/add'] = 'admin/option/Option_Value/add';//选项值-新增
$route['admin/option_value/edit/(:any)'] = 'admin/option/Option_Value/edit/$1';//选项值-编辑
$route['admin/option_value/delete/(:any)'] = 'admin/option/Option_Value/delete/$1';//选项值-删除