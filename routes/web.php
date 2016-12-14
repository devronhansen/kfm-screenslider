<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('posts', 'HomeController@getPosts');

Route::get('posts/table', 'PostController@table');
Route::post('posts', 'PostController@store');
Route::patch('posts/{post}', 'PostController@update');
Route::delete('posts/{post}', 'PostController@destroy');

Route::get('/home', 'PostController@table');