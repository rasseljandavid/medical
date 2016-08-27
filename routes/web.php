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

Route::resource('patients', 'PatientsController');
Route::resource('reports', 'ReportsController');
Route::resource('users', 'UsersController');

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search');

Route::post('/', 'HomeController@login');
Route::get('/detail/{report}', 'ReportsController@detail');
Route::get('/download/{report}', 'ReportsController@download');
Route::get('/email/{report}', 'ReportsController@email');