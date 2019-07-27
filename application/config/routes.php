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
// $route['Purchase_Order/add/(:any)/addDetail'] = 'porder/setDetail';
$route['Purchase_Order/add/(:any)'] = 'porder/setAll';
$route['Purchase_Order/det/(:any)'] = 'porder/detail/$1';
$route['Purchase_Order/det/(:any)/(:any)'] = 'porder/detAsetSPK/$1/$2';
$route['Purchase_Order/getData/(:any)'] = 'porder/oneList/$1';
$route['Purchase_Order/delete/(:any)'] = 'porder/deletePorder/$1';
$route['po/detailpo/(:any)'] = 'porder/formdetailpo/$1';

//aset keseluruhan
$route['aset'] = 'aset/getAll';
$route['aset/(:any)'] = 'aset/setAll';
$route['aset/addAset/(:any)/(:any)'] = 'aset/setAset/$1/$2'; //nambah aset dari PO (form)
$route['aset/det/(:any)'] = 'aset/kesAsetDetail/$1';
$route['aset/det/(:any)/(:any)'] = 'aset/kesAsetDetails/$1/$2';
// $route['aset/delete/(:any)'] = 'vendor/deleteAset/$1';

//insert to database (action)
$route['crud/aset/(:any)'] = 'aset/insAset/$1';
$route['crud/history/(:any)'] = 'history/insHistory/$1';
$route['crud/Purchase_Order'] = 'porder/insPo';
$route['crud/po/(:any)'] = 'porder/insDetPO/$1';
$route['crud/vendor_list'] = 'vendor/insVendor';

//update to database
$route['crud/update/vendor_list'] = 'vendor/upVendor';
$route['crud/update/Purchase_Order'] = 'porder/upPO';
$route['crud/update/history'] = 'history/upHistory';


$route['Aset_tersedia'] = 'aset';
$route['Aset_tersedia/(:any)'] = 'Aset/detail/$1';

//menu Histori
$route['history'] = 'history/getAll';
$route['history/det/(:any)'] = 'history/detail/$1';
$route['history/getData/(:any)/(:any)'] = 'history/oneList/$1/$2';
// $route['history/History/addDetail'] = 'history/setDetailHistory';
$route['history/(:any)'] = 'history/setDetail';

$route['historyPegawai/(:any)'] = 'history/detPegawai/$1';
$route['historyPegawai'] = 'history/pegawai';

$route['historyAset/(:any)'] = 'history/detAset/$1';
$route['historyAset'] = 'history/aset';


//menu vendor
$route['vendor_list'] = 'vendor';
$route['vendor_list/add/(:any)'] = 'vendor/setAll';
$route['vendor_list/(:any)'] = 'vendor/list/$1';
$route['vendor_list/getData/(:any)'] = 'vendor/oneList/$1';
$route['vendor_list/delete/(:any)'] = 'vendor/deleteVendor/$1';
