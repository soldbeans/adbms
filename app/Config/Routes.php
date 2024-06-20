<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 /*the first parameter is whatever view you wanna call and the
the second parameter is the controller and the name of the method(index) */
$routes->get('/', 'Home::index');

$routes->get('/Home', 'Home::index');

$routes->get('/Catalog', 'Home::catalog');

$routes->get('/Checkouts', 'Home::checkouts');

$routes->get('/Members', 'Home::members'); // Updated route for members listing

$routes->get('/Reports', 'Home::reports');

$routes->get('/addBook', 'Home::addBook');

//routes for book management
$routes->post('/Home/saveBook', 'Home::saveBook');
$routes->post('/Home/updateBook', 'Home::updateBook');
$routes->post('/Home/deleteBook', 'Home::deleteBook');

// New routes for member management
$routes->get('/addMember', 'Home::addMember'); // Form to add new member
$routes->post('/Home/addMember', 'Home::addMember');//Add new member
$routes->post('/saveMember', 'Home::saveMember'); // Save new member
$routes->post('updateMember', 'Home::updateMember');
$routes->post('/deleteMember', 'Home::deleteMember'); // Delete member
$routes->get('/Home/getMemberDetails/(:num)', 'Home::getMemberDetails/$1');


