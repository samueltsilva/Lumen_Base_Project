<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('index', function () use($router){
    return redirect()->route('testers');
});

$router->get('teste/{id}', ['as' => 'testers', function ($id) use ($router){
    return 'Hello world!';
}]);

$router->post('curso/conclusao', ['uses' => 'ConclusaoCursoController@index', 'as' => 'curso/conclusao']);
