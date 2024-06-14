<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); /*the first parameter is whatever view you wanna call and the
                                    the second parameter is the controller and the name of the method(index) */


$routes->get('/Home','Home::index');

$routes->get('/Catalog','Home::Catalog');

$routes->get('/Checkouts','Home::Checkouts');

$routes->get('/Members','Home::Members');

$routes->get('/Reports','Home::Reports');

$routes->get('/addBook','Home::addBook');

$routes->post('/home/saveBook', 'Home::saveBook');