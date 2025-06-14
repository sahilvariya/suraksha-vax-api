<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/vaccines', 'Admin\Vaccines::index');
$routes->post('api/register', 'Api\AuthController::register');


