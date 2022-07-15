<?php

/** @var \CodeIgniter\Router\RouteCollection $routes */

if (ENVIRONMENT !== 'production') {
    $routes->group('_dusk', static function ($routes) {
        /** @var \CodeIgniter\Router\RouteCollection $routes */
        $routes->get('/login/(:any)/(:any)', 'Fluent\Dusk\Http\Controllers\UserController::login/$1/$2', ['as' => 'dusk.login']);

        $routes->get('/logout/(:any)', 'Fluent\Dusk\Http\Controllers\UserController::logout/$1', ['as' => 'dusk.logout']);

        $routes->get('/user/(:any)', 'Fluent\Dusk\Http\Controllers\UserController::user/$1', ['as' => 'dusk.user']);
    });
}