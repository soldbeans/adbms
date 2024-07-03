<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Set the default route to ChooseLogin/index
$routes->get('/', 'ChooseLogin::index');

// Admin routes
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/catalog', 'AdminController::catalog');
$routes->get('/admin/checkouts', 'AdminController::checkouts');
$routes->get('/admin/members', 'AdminController::members');
$routes->get('/admin/reports', 'AdminController::reports');
$routes->get('/admin/addBook', 'AdminController::addBook');
$routes->post('/admin/saveBook', 'AdminController::saveBook');
$routes->post('/admin/updateBook', 'AdminController::updateBook');
$routes->post('/admin/deleteBook', 'AdminController::deleteBook');
$routes->post('/admin/addMember', 'AdminController::addMember');
$routes->post('/admin/updateMember', 'AdminController::updateMember');
$routes->post('/admin/deleteMember', 'AdminController::deleteMember');
$routes->get('/admin/getMemberDetails/(:num)', 'AdminController::getMemberDetails/$1');


$routes->get('/admin/login', 'AdminController::login', ['as' => 'admin.login']);
$routes->post('/admin/login', 'AdminController::login', ['as' => 'admin.login.post']);
$routes->get('/admin/logout', 'AdminController::logout', ['as' => 'admin.logout']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to use the environment-specific routes file. require() that
 * file here to make sure it is loaded, and adjust as needed.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
