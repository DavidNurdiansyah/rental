<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/beranda', 'Admin\DashboardController::index');

$routes->get('/dashboard', 'Admin\DashboardController::index');

//routes admin motorr
$routes->get('/login', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout'); 
$routes->get('daftar motor', 'Admin\MotorController::index');
$routes->post('daftar motor/tambah', 'Admin\MotorController::rental');
$routes->post('daftar motor/ubah/(:num)', 'Admin\MotorController::update/$1');
$routes->get('admin/motor/hapus/(:num)', 'Admin\MotorController::hapus/$1');

