<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('C_login');
$routes->setDefaultMethod('display');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'C_login::Display');
$routes->get('/logout', 'C_login::logout');
$routes->get('/barang/display', 'C_barang::display');
$routes->get('/barang/grafik', 'C_barang::grafik');
$routes->get('/cartDisplay', 'C_barang::cartDisplay');
$routes->get('/cartDestroy', 'C_barang::cartDestroy');
$routes->get('/cartDelete/(:any)', 'C_barang::cartDelete/$1');
$routes->get('/transaksi', 'C_barang::formTransaksiDisplay');
$routes->get('/cartUpdate/(:any)/(:any)/(:any)', 'C_barang::cartUpdate/$1/$2/$3');

$routes->post('/login/auth', 'C_login::auth');
$routes->post('/barang/inputDisplay', 'C_barang::inputDisplay');
$routes->post('/barang/input', 'C_barang::input');
$routes->post('/addCart', 'C_barang::addCart');
$routes->post('/transaksi/input', 'C_transaksi::submitCheckout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
