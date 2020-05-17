<?php

use Laravel\Lumen\Routing\Router;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var Router $router */

$router->group([], function () use ($router) {
    $router->get('/', [
        'as' => 'default',
        'uses' => 'IndexController@index'
    ]);
});

$router->group([
    'prefix' => 'login',
    'namespace' => 'Login',
], function () use ($router) {
    $router->post('/', [
        'as' => 'login',
        'uses' => 'LoginController@login'
    ]);
});

$router->group([
    'prefix' => 'user',
    'namespace' => 'User'
               ], function () use ($router) {
    $router->get('/', [
        'as' => 'listUsers',
        'uses' => 'UserController@index'
    ]);
});
