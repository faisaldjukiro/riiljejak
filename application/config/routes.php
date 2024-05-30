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
$route['default_controller'] = 'BerandaController';
$route['404_override'] = 'errors/page_missing';
$route['translate_uri_dashes'] = FALSE;
//frontend
$route['beranda']   = 'BerandaController';
$route['home']      = 'BerandaController';
$route['berita']    = 'ListBeritaController';
$route['detail']    = 'DetailBeritaController';
$route['detail']    = 'DetailBeritaController';
$route['berita']    = 'BeritaController';
$route['internasional']    = 'BeritaController/internasional';
$route['nasional']    = 'BeritaController/nasional';
$route['nasional/hukum']    = 'BeritaController/hukum';
$route['nasional/politik']    = 'BeritaController/politik';
$route['nasional/pemerintahan']    = 'BeritaController/pemerintahan';
$route['daerah']    = 'BeritaController/daerah';
$route['daerah/sulawesi-utara']    = 'BeritaController/sulawesi_utara';
$route['daerah/sulawesi-utara/bolmut']    = 'BeritaController/bolmut';
$route['daerah/sulawesi-utara/bolsel']    = 'BeritaController/bolsel';
$route['daerah/sulawesi-utara/boltim']    = 'BeritaController/boltim';
$route['daerah/gorontalo']    = 'BeritaController/gorontalo';
$route['daerah/gorontalo/kota-gorontalo']    = 'BeritaController/kota_gorontalo';
$route['daerah/gorontalo/kabupaten-gorontalo']    = 'BeritaController/kabupaten_gorontalo';
$route['daerah/gorontalo/gorontalo-utara']    = 'BeritaController/gorontalo_utara';
$route['ragam']    = 'BeritaController/ragam';
$route['ragam/budaya']    = 'BeritaController/budaya';
$route['ragam/seni']    = 'BeritaController/seni';
$route['ragam/keanekaragaman-hayati']    = 'BeritaController/keanekaragaman_hayati';
$route['ragam/pariwisata']    = 'BeritaController/pariwisata';
$route['ragam/komoditas']    = 'BeritaController/komoditas';
$route['ragam/kuliner']    = 'BeritaController/kuliner';
$route['ragam/lingkungan']    = 'BeritaController/lingkungan';
$route['ragam/kesehatan']    = 'BeritaController/kesehatan';
$route['ragam/olahraga']    = 'BeritaController/olahraga';
$route['ragam/religi']    = 'BeritaController/religi';
$route['infografis']    = 'BeritaController/infografis';
$route['detail/(:any)/(:any)'] = 'BeritaController/detail/$1/$2';




$route['tentang-kami'] = "FooterController/tentang_kami";
$route['redaksi'] = "FooterController/redaksi";
$route['kontak'] = "FooterController/kontak";
$route['pedoman-pemberitaan'] = "FooterController/pedoman_pemberitaan";
$route['privacy'] = "FooterController/privacy";
//end backend

// login
$route['rj/login'] = 'LoginController';
$route['rj/auth'] = 'LoginController';
$route['rj/auth/blocked'] = 'LoginController/blocked';
$route['registrasi'] = 'LoginController/registration';
$route['lupapassword'] = 'LoginController/forgotPassword';
// end login

// beranda
$route['rj/beranda'] = 'backend/BerandaController';
// end beranda

// settings
$route['rj/profile'] = 'SettingController/profile';
$route['rj/settings'] = 'SettingsController';
$route['rj/settings/editmenu'] = 'SettingsController/editMenu';
$route['rj/settings/hapusmenu'] = 'SettingsController/hapusMenu';
$route['rj/settings/submenu'] = 'SettingsController/submenu';
$route['rj/settings/editsubmenu'] = 'SettingsController/editSubmenu';
$route['rj/settings/hapussubmenu'] = 'SettingsController/hapusSubmenu';
$route['rj/settings/user'] = 'SettingsController/user';
$route['rj/settings/edit_user'] = 'SettingsController/edit_user';
$route['rj/settings/role'] = 'SettingsController/role';
$route['rj/settings/changeAccess'] = 'SettingsController/changeAccess';
$route['rj/settings/roleaccess/(:any)'] = 'SettingsController/roleaccess/$1';
$route['rj/settings/editrole'] = 'SettingsController/editRole';
$route['rj/settings/hapusrole'] = 'SettingsController/hapusRole';
// settings



//Berita Backend
$route['rj/berita'] = 'backend/BeritaController';
$route['rj/berita/tambah'] = 'backend/BeritaController/t_berita';
$route['rj/berita/detail/(:any)'] = 'backend/BeritaController/detail/$1';
$route['rj/berita/edit/(:any)'] = 'backend/BeritaController/edit/$1';