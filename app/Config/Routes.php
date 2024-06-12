<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/addBook','Home::addBook');
$routes->get('/addBook','admin::addBook');
$routes->get('/Home','Home::Home');