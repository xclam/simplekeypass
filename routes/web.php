<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'PasswordController@index')->name('passwords');
	Route::post('/password/add', 'PasswordController@add');
	Route::get('/password/{password}', 'PasswordController@view')->name('password.view');
	Route::patch('/password/{password}/save', 'PasswordController@save');
	Route::delete('/password/{password}', 'PasswordController@delete');

	Route::get('/environments', 'EnvironmentController@index')->name('environments');
	Route::get('/environment/add', 'EnvironmentController@add');
	Route::get('/environment/{environment}', 'EnvironmentController@view')->name('environment.view');
	Route::post('/environment/save', 'EnvironmentController@save');
	Route::patch('/environment/{environment}/save', 'EnvironmentController@save');
	Route::delete('/environment/{environment}', 'EnvironmentController@delete');
	
	
	Route::get('/groups', 'HomeController@index')->name('groups');
	Route::get('/users', 'HomeController@index')->name('users');
});



//@TODO :
// 
// 
// 
