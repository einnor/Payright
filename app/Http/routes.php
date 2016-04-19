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

//Invoices resource
Route::resource('invoices', 'InvoicesController');

//Attachments
Route::post('invoices/{invoice_id}/attachments', ['as' => 'store_attachment_path', 'uses' =>  'AttachmentsController@store']);

//Comments
Route::post('invoices/{invoice_id}/comments', ['as' => 'store_comment_path', 'uses' =>  'CommentsController@store']);


//APIs
Route::get('api/users', 'UsersController@getAllUsers');
Route::get('api/clients', 'ClientsController@getAllClients');

