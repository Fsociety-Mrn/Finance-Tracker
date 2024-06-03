<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('Auth',['filter' => 'authFilter'],static function($routes){
    // Login
    $routes->post('Login', 'AuthAPIController::login');
});

