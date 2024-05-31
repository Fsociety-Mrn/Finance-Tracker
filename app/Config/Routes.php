<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'FinanceAPIController::index', ['filter' => 'authFilter']);
