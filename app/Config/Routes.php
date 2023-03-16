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
$routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setDefaultMethod('wah');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->addPlaceholder('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');

$routes->group('logs', static function ($routes){
    $routes->get('/', 'Logs::index');
    $routes->get('list', 'Logs::list');
    $routes->get('listlates/(:num)', 'Logs::listLatest/$1');
    $routes->get('getAkun', 'Logs::getAkun');
    $routes->post('catat', 'Logs::catat');
});

$routes->group('rekening', static function ($routes){
    $routes->get('/', 'Rekening::view');
    $routes->get('list/(:alphanum)', 'Rekening::list/$1');
    $routes->post('add/(:alphanum)', 'Rekening::add/$1');
    $routes->post('edit/(:uuid)', 'Rekening::edit/$1');
    $routes->post('edithutang/(:uuid)', 'Rekening::editHutang/$1');
    $routes->post('remove/(:alpha)/(:uuid)', 'Rekening::remove/$1/$2');
});

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
