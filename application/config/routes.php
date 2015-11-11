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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['^(en|vn)/contact'] = 'home/contact';
$route['^(en|vn)/detail_project/(:num)'] = 'project/detail_project/$2';
$route['^(en|vn)/detail_news/(:num)'] = 'news/detail_news/$2';
$route['^(en|vn)/about'] = 'home/about';
$route['^(en|vn)/officetel'] = 'home/officetel';
$route['^(en|vn)/apartment'] = 'home/apartment';
$route['^(en|vn)/house'] = 'home/house';
$route['^(en|vn)/villas'] = 'home/villas';
$route['^(en|vn)/retail'] = 'home/retail';
$route['^(en|vn)/(.+)$'] = "$2";

$route['^(en|vn)$'] = $route['default_controller'];
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'home/index';
$route['example'] = 'example';
$route['admin/login'] = "admin/login";
$route['about'] = 'home/about';
$route['officetel'] = 'home/officetel';
$route['apartment'] = 'home/apartment';
$route['house'] = 'home/house';
$route['villas'] = 'home/villas';
$route['retail'] = 'home/retail';
$route['contact'] = 'home/contact';

$route['search_project'] = 'search_project';
$route['detail_project/(:num)'] = 'project/detail_project/$1';
$route['detail_news/(:num)'] = 'news/detail_news/$1';
