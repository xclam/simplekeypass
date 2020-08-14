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
	Route::patch('/password/{password}', 'PasswordController@save')->name('password.save');
	Route::delete('/password/{password}', 'PasswordController@delete');

	Route::get('/environments', 'EnvironmentController@index')->name('environments');
	Route::get('/environment', 'EnvironmentController@create')->name('environment.create');
	Route::get('/environment/{environment}', 'EnvironmentController@view')->name('environment.view');
	Route::post('/environment/save', 'EnvironmentController@save')->name('environment.save');
	Route::patch('/environment/{environment}/save', 'EnvironmentController@save');
	Route::delete('/environment/{environment}', 'EnvironmentController@delete');
	
	
	Route::get('/groups', 'HomeController@index')->name('groups');
	
	Route::get('/users', 'UserController@index')->name('users');
	Route::get('/user', 'UserController@create')->name('user.create');
	Route::post('/user', 'UserController@store')->name('user.store');
	Route::get('/user/{user}', 'UserController@show')->name('user.show');
	Route::patch('/user/{user}', 'UserController@update')->name('user.update');
});



//@TODO :
// 
// 
// 
