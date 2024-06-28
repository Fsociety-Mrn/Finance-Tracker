<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthAPIController::index');
$routes->group('Auth',['filter' => 'authFilter'],static function($routes){
    // Login
    $routes->post('Login', 'AuthAPIController::login');
});

