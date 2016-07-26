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

$route['login'] = 'auth/login';
$route['admin/dashboard'] = 'dashboard';
$route['auth/create'] = 'auth/create_user';

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
$route['admin/basic_personnel'] = 'admin/user/Basic_Personnel';//投票分类
$route['admin/basic_personnel/add'] = 'admin/user/Basic_Personnel/add';//投票活动-新增
$route['admin/basic_personnel/edit/(:any)'] = 'admin/user/Basic_Personnel/edit/$1';//投票活动-编辑
$route['admin/basic_personnel/delete/(:any)'] = 'admin/user/Basic_Personnel/delete/$1';//投票活动-删除


//----------------------------------前台投票访问路径-----------------------------------------//
$route['home/vote/vote_activity/index/(:any)'] = 'home/vote/Vote_Activity/index/$1'; //投票

//----------------------------------菜单配置模块---------------------------------------//
$route['admin/menu'] = 'admin/menu/Menu'; //菜单配置
$route['admin/menu/add'] = 'admin/menu/Menu/add'; //菜单配置
$route['admin/menu/edit/(:any)'] = 'admin/menu/Menu/edit/$1';//菜单配-编辑
$route['admin/menu/delete/(:any)'] = 'admin/menu/Menu/delete/$1';//菜单配-删除
$route['admin/menu/auto_compare'] = "admin/menu/Menu/auto_compare";//自动比较