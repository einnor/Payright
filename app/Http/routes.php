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




Route::get('/', 'PagesController@home');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');



//Users resource
Route::resource('users', 'UsersController');

//Clients resource
Route::resource('clients', 'ClientsController');

//Clients resource
Route::resource('invoices', 'InvoicesController');


//APIs
Route::get('api/users', 'UsersController@getAllUsers');

