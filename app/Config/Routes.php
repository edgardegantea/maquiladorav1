<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'FrontendController::index');
// $routes->get('/', 'Home::index');
$routes->get('/', 'UserController::login', ["filter" => "noauth"]);

$routes->get('registro', 'RegistroController::new');
$routes->post('registro', 'RegistroController::create');

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);




$routes->get('contacto', 'FrontendController::contacto');


// Rutas para la recuperación de contraseña
/* $routes->get('forgot-password', 'UserController::forgotPasswordForm');
$routes->post('forgot-password', 'UserController::forgotPassword');
$routes->get('reset-password/(:any)', 'UserController::resetPasswordForm/$1');
$routes->post('reset-password', 'UserController::resetPassword'); */


// Rutas para el administrador
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');

    $routes->get('usuarios/edit_password/(:num)', 'Admin\UsuarioController::editPassword/$1');
    $routes->post('usuarios/update_password/(:num)', 'Admin\UsuarioController::updatePassword/$1');

    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);

}
);
