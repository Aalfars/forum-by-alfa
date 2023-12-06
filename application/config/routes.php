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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Auth'] = 'Auth';
$route['Admin'] = 'Admin';
$route['User'] = 'User';
$route['Admin/adduser'] = 'Admin/adduser';
$route['Auth/Login'] = 'Auth/login_process';
$route['admin/Caraousel'] = 'admin/caraousel';
$route['admin/Caraousel/simpan'] = 'admin/caraousel/simpan';
$route['admin/Caraousel/delete'] = 'admin/caraousel/delete';
$route['admin/Caraousel/update'] = 'admin/caraousel/update';
$route['admin/Kategori'] = 'admin/kategori';
$route['admin/Kategori/simpan'] = 'admin/kategori/simpan';
$route['admin/Kategori/delete'] = 'admin/kategori/delete';
$route['admin/Kategori/update'] = 'admin/kategori/update';
$route['admin/Konten'] = 'admin/konten';
$route['admin/Konten/simpan'] = 'admin/konten/simpan';
$route['Admin/Konten/delete/(:any)'] = 'Admin/Konten/delete/$1';
$route['admin/Konten/update'] = 'admin/konten/update';
$route['admin/Konten/detail'] = 'admin/konten/detail';
$route['admin/Konten/addkonten'] = 'admin/konten/add';
$route['admin/Saran'] = 'admin/saran';
$route['admin/Saran/delete'] = 'admin/saran/delete';
$route['admin/configuration'] = 'admin/configuration';














