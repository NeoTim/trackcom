<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('singlepage');
});

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
Route::resource('contacts', 'ContactsController');
Route::resource('customers', 'CustomersController');
Route::resource('drivers', 'DriversController');
Route::resource('entries', 'EntriesController');
Route::resource('groups', 'GroupsController');
Route::resource('methods', 'MethodsController');
Route::resource('orders', 'OrdersController');
Route::resource('products', 'ProductsController');
Route::resource('batches', 'BatchesController');


/*
	Route::resource('comments', 'CommentController', 
		array('except' => array('create', 'edit', 'update')));*/
});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
	return View::make('index');
});


// Route::post('/auth/login', array('before' => 'csrf_json', 'uses' => 'AuthController@login'));
// Route::get('/auth/logout', 'AuthController@logout');
// Route::get('/auth/status', 'AuthController@status');
// Route::get('/auth/secrets','AuthController@secrets');

