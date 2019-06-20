<?php

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

/**
 * Authors routes
 */
Route::get('/authors', 'AuthorController@index');
Route::post('/authors', 'AuthorController@store');
Route::get('/authors/{id}', 'AuthorController@show');
Route::put('/authors/{id}', 'AuthorController@update');
Route::patch('/authors/{id}', 'AuthorController@update');
Route::delete('/authors/{id}', 'AuthorController@destroy');

/**
 * Books routes
 */
Route::get('/books', 'BookController@index');
Route::post('/books', 'BookController@store');
Route::get('/books/{id}', 'BookController@show');
Route::put('/books/{id}', 'BookController@update');
Route::patch('/books/{id}', 'BookController@update');
Route::delete('/books/{id}', 'BookController@destroy');