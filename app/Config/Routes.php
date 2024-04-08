<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/','StudentController::index');
$routes->get('/register','StudentController::register');
$routes->post('/register/user','StudentController::registeruser');
$routes->get('/user-delete/(:num)', 'StudentController::deleteuser/$1');
$routes->get('/user-edit/(:num)', 'StudentController::edituser/$1');
$routes->post('/user-update/(:num)', 'StudentController::updateuser/$1');
