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

Route::get('/', 'CallController@index');

Route::get('/call/edit/{id}', 'CallController@edit');

Route::post('/call/update/{id}', 'CallController@update');

Route::get('/call/delete/{id}', 'CallController@destroy');

Route::get('/www', 'CallController@www');