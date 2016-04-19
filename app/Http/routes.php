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


//Passwords
Route::get('auth/password/edit', 'Auth\AuthController@edit');
Route::post('auth/password/update', 'Auth\AuthController@update');



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

Route::get('api/invoices/all', 'InvoicesController@getAllInvoices');
Route::get('api/invoices/uncommitted', 'InvoicesController@getUncommittedInvoices');
Route::get('api/invoices/committed', 'InvoicesController@getCommittedInvoices');
Route::get('api/invoices/reviewed', 'InvoicesController@getReviewedInvoices');
Route::get('api/invoices/approved', 'InvoicesController@getApprovedInvoices');
Route::get('api/invoices/settled', 'InvoicesController@getSettledInvoices');

