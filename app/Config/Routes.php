<?php

namespace Config;

$routes->get('/', 'ChooseLogin::index');

// Admin routes
$routes->get('/AdminLogin', 'AdminController::loginView');
$routes->post('/admin/login', 'AdminController::login');
$routes->get('/admin/logout', 'AdminController::logout');

// Navigation Routes for admin
$routes->get('/admin/Home', 'AdminController::index');
$routes->get('/admin/Catalog', 'AdminController::catalog');
$routes->get('/admin/Checkouts', 'AdminController::checkouts');
$routes->get('/admin/Members', 'AdminController::members');
$routes->get('/admin/Reports', 'AdminController::reports');
$routes->get('/admin/addBook', 'AdminController::addBook');

$routes->post('/admin/saveBook', 'AdminController::saveBook');
$routes->post('/admin/updateBook', 'AdminController::updateBook');
$routes->post('/admin/deleteBook', 'AdminController::deleteBook');

$routes->post('/admin/addMember', 'AdminController::addMember');
$routes->get('/hash-passwords', 'PasswordHashController::hashExistingPasswords');
$routes->get('/hash-passwords', 'PasswordHashController::index');
$routes->post('/admin/updateMember', 'AdminController::updateMember');
$routes->post('/admin/deleteMember', 'AdminController::deleteMember');
$routes->get('/admin/getMemberDetails/(:num)', 'AdminController::getMemberDetails/$1');

//Login routes
$routes->get('/AdminLogin', 'ChooseLogin::adminLogin'); // Show login form
$routes->get('/UserLogin', 'ChooseLogin::memberLogin'); // Show login form
$routes->get('/member/login', 'MemberController::login'); // Handle login
$routes->get('/members/logout', 'Members::logout'); // Handle logout

// Member routes
$routes->get('/UserLogin', 'ChooseLogin::memberLogin'); // Show login form
$routes->post('/member/login', 'MemberController::login'); // Handle login
$routes->get('/member/logout', 'MemberController::logout'); // Handle logout

// Navigation Routes for members
$routes->get('/member/MHome', 'MemberController::home');
$routes->get('/member/catalog', 'MemberController::catalog');
$routes->get('/member/checkouts', 'MemberController::checkouts');
$routes->get('/member/reports', 'MemberController::reports');
$routes->get('/member/profile', 'MemberController::profile');
