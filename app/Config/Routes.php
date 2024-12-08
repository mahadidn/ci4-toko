<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::loginPost');
$routes->get('logout', 'LoginController::logout');

$routes->group('/', ['filter' => 'isLogin'], function($routes){

    $routes->get('', 'Admin\Dashboard::index');
    
});