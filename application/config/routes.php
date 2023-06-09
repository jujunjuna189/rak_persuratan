<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'AuthController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// Auth
// Login
$route['login'] = 'AuthController/index';
$route['onLogin'] = 'AuthController/onLogin';
// $route['register'] = 'AuthController/register';
$route['onRegister'] = 'AuthController/onRegister';
// Dashboard
$route['dashboard'] = 'DashboardController/index';
// Kategori
$route['kategori'] = 'KategoriController/index';
$route['kategori/store'] = 'KategoriController/store';
$route['kategori/get-by-id'] = 'KategoriController/getById';
$route['kategori/update'] = 'KategoriController/update';
$route['kategori/delete'] = 'KategoriController/delete';
// Rak
$route['rak'] = 'RakController/index';
$route['rak/store'] = 'RakController/store';
$route['rak/get-by-id'] = 'RakController/getById';
$route['rak/update'] = 'RakController/update';
$route['rak/delete'] = 'RakController/delete';

// Rak
$route['surat'] = 'SuratController/index';
$route['surat/store'] = 'SuratController/store';
$route['surat/get-by-id'] = 'SuratController/getById';
$route['surat/update'] = 'SuratController/update';
$route['surat/delete'] = 'SuratController/delete';
$route['surat/ajukan'] = 'SuratController/ajukan';
$route['surat/updatestatus'] = 'SuratController/updatestatus';

// Laporan
$route['laporan'] = 'LaporanController/index';

// Pengguna
$route['pengguna'] = 'PenggunaController/index';
$route['pengguna/store'] = 'PenggunaController/store';
$route['pengguna/get-by-id'] = 'PenggunaController/getById';
$route['pengguna/update'] = 'PenggunaController/update';
$route['pengguna/delete'] = 'PenggunaController/delete';