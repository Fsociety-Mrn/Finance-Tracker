<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('Auth',['filter' => 'authFilter'],static function($routes){

    // Test API routes
    // $routes->get('/WOW', 'FinanceAPIController::index');

    // Login
    $routes->get('Login', 'AuthAPIController::login');
});

