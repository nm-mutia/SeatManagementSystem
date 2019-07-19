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

//menu utama
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//admin

//menu fitur
$route['tabeldet/(:any)'] = '$1/';
$route['details/(:any)/(:any)'] = 'adminDashboard/detail/$1/$2';
$route['admin'] = 'adminDashboard';

// menu aset
$route['Purchase_Order'] = 'porder';
$route['Purchase_Order/add/(:any)/addDetail'] = 'porder/setDetail';
$route['Purchase_Order/add/(:any)'] = 'porder/setAll';
$route['Purchase_Order/(:any)'] = 'porder/detail/$1';

$route['aset'] = 'aset/getAll';
$route['aset/(:any)'] = 'aset/setAll';
$route['aset/det/(:any)'] = 'aset/kesAsetDetail/$1';

$route['Aset_tersedia'] = 'aset';
$route['Aset_tersedia/(:any)'] = 'Aset/detail/$1';


//menu Histori
$route['history'] = 'history/getAll';
$route['history/det/(:any)'] = 'history/detail/$1';
$route['history/History/addDetail'] = 'history/setDetailHistory';
$route['history/(:any)'] = 'history/setDetail';

$route['historyKaryawan/(:any)'] = 'history/detKaryawan/$1';
$route['historyKaryawan'] = 'history/karyawan';

$route['historyAset/(:any)'] = 'history/detAset/$1';
$route['historyAset'] = 'history/aset';


//menu vendor
$route['vendor_list'] = 'vendor';
$route['vendor_list/add/(:any)'] = 'vendor/setAll';
$route['vendor_list/(:any)'] = 'vendor/list/$1';
