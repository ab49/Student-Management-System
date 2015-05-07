<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view('auth.login');	
});
//Route::get('/', 'Auth\AuthController');

Route::get('home', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');
Route::resource('std','StdController');
Route::resource('stdinfo','StdinfoController');
Route::get('stdinfo/create/{id}','StdinfoController@create');
//Route::get('std','StdController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
