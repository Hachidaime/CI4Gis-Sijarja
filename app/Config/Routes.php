<?php

namespace Config;

use App\Filters\Auth;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
if (session()->get('isLoggedIn')) {
	$routes->get('/', 'Dashboard::index');
} else {
	$routes->get('/', 'StaticPage::index');
}
$routes->get('/index', 'StaticPage::index');
$routes->get('/about', 'StaticPage::about');
$routes->get('/contact', 'StaticPage::contact');


$routes->get('/session/(:any)', 'System::setSystemSession/$1', ['filter' => 'auth']);
$routes->get('/aplikasi/sistem', 'System::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/aplikasi/sistem/search', 'System::search', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/aplikasi/sistem/tambah', 'System::add', ['filter' => 'auth']);

$routes->get('/aplikasi/menu', 'Menu::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/aplikasi/menu/tambah', 'Menu::add', ['filter' => 'auth']);

$routes->get('/gis', 'Gis::index');

$routes->get('/pengaduan', 'Pengaduan::index');

$routes->get('/galeri', 'Galeri::index');

$routes->match(['get', 'post'], '/login', 'User::login', ['filter' => 'noauth']);
$routes->get('/logout', 'User::logout');
// $routes->match(['get', 'post'], '/register', 'User::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'], '/profile', 'User::profile', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/change-password', 'User::changePassword', ['filter' => 'auth']);
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
