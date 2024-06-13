<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); /*the first parameter is whatever view you wanna call and the
                                    the second parameter is the controller and the name of the method(index) */

$routes->get('/addBook','Home::addBook');
$routes->get('/addBook','admin::addBook');
$routes->get('/Home','Home::index');