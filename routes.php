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


Route::get("*", function(){
	if(!Sentry::check())
	{
		return Redirect::to('login');
	}
});

Route::get('/', array('as' => 'home', function()
{
	if(Sentry::check())
	{
		return Redirect::to('dashboard');
	}
	else
	{
		return Redirect::to('login');
	}
}));
Route::get('/dashboard', array('as' => 'home', function()
{
	if(Sentry::check())
	{	
		$activities = DB::table('activities')->orderBy('id', 'desc')->take(10)->get();
		$order_activities = DB::table('activities')->where('section', '=', 'order')
													->orWhere('section', '=', 'entry')
													->orWhere('section', '=', 'production')
													->orderBy('id', 'desc')->take(10)->get();
		$production_activities = DB::table('activities')->where('section', '=', 'production')->orderBy('id', 'desc')->take(10)->get();
		$updates = DB::table('activities')->where('type', '=', 'update')->orderBy('id', 'desc')->take(10)->get();
		$trucks = Truck::all();
		$entries = Entry::paginate(5);
		return View::make('dashboard.index', compact('activities', 'orders', 'order_activities', 'production_activities', 'updates', 'trucks', 'entries'));
	}
	else
	{
		return Redirect::to('login');
	}
}));
Route::get('dashboard/entries', function(){
	$entries = Entry::paginate(5);
	return View::make('dashboard.sections.slider', compact('entries'));
});

// Session Routes
Route::get('login',  array('as' => 'login', 'uses' => 'SessionController@create'));
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionController@destroy'));
Route::resource('sessions', 'SessionController', array('only' => array('create', 'store', 'destroy')));

// User Routes
Route::get('register', 'UserController@create');
Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
Route::get('resend', array('as' => 'resendActivationForm', function()
{
	return View::make('users.resend');
}));
Route::post('resend', 'UserController@resend');
Route::get('forgot', array('as' => 'forgotPasswordForm', function()
{
	return View::make('users.forgot');
}));
Route::post('forgot', 'UserController@forgot');
Route::post('users/{id}/change', 'UserController@change');
Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
Route::get('users/{id}/suspend', array('as' => 'suspendUserForm', function($id)
{
	return View::make('users.suspend')->with('id', $id);
}));
Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
Route::resource('users', 'UserController');

// Group Routes
Route::resource('groups', 'GroupController');


Route::post('data/customers', function(){
	$customers = Customer::all()->toArray();
	$data = array(
			  "sEcho" => 1,
			  "iTotalRecords" => "1000",
			  "iTotalDisplayRecords" => "1000",
			  "aaData" => $customers,
			 );
	
	return $data;
});
Route::post('data/orders/store', function(){
	$input = Input::all();
	$order = new Order;
	$order->create($input);
	$data = array(
			  "sEcho" => 1,
			  "iTotalRecords" => "1000",
			  "iTotalDisplayRecords" => "1000",
			  "aaData" => $order,
			 );
	
	return $data;
});
Route::post('data/orders/delete', function($id){
	
	$order = Order::find($id);
	$order->delete();
	$data = array(
			  "sEcho" => 1,
			  "iTotalRecords" => "1000",
			  "iTotalDisplayRecords" => "1000",
			  "aaData" => $order,
			 );
	
	return $data;
});
Route::post('data/orders', function(){
	$orders = Order::all()->toArray();
	$data = array(
			  "sEcho" => 1,
			  "iTotalRecords" => "1000",
			  "iTotalDisplayRecords" => "1000",
			  "aaData" => $orders,
			 );
	
	return $data;
});

Route::post('data/orders/update', function($id){
	$order = Order::find($id);
	$order->update(Input::all());
	
	$data = array(
			  "sEcho" => $id,
			  "iTotalRecords" => "57",
			  "iTotalDisplayRecords" => "57",
			  "aaData" => $order
			 );
	return $data;
});

Route::get('collect/orders', function(){

	return Order::all()->toArray();
});
Route::post('collect/orders/update/{id}', function(){

	
	$order = $this->order->find($id);
	$order->update(Input::all());
	
	return Response::json(array('id' => $order->id, 'start' => $order->start));
});

Route::get('collect/categories', function(){

	return Category::all()->toArray();
});
Route::get('collect/entries', function(){

	return Entry::all()->toArray();
});
Route::get('collect/entries/paginate', function(){

	return Entry::paginate(5)->toArray();
});


Route::get('umessages/inbox', 'UmessagesController@inbox');
Route::get('umessages/sent', 'UmessagesController@sent');
Route::get('umessages/draft', 'UmessagesController@draft');
Route::get('umessages/trash', 'UmessagesController@trash');

// App::missing(function($exception)
// {
//     App::abort(404, 'Page not found');
//     //return Response::view('errors.missing', array(), 404);
// });




Route::get("toentries/", function($id){
	return View::make('entries.portlets.create', compact('id'));
});

Route::resource('calendars', 'CalendarController');

Route::resource('productions', "ProductionController");

Route::resource('orders', 'OrdersController');

Route::resource('customers', 'CustomersController');

Route::resource('pmethods', 'PmethodsController');

Route::resource('dmethods', 'DmethodsController');

Route::resource('products', 'ProductsController');

Route::resource('activities', 'ActivitiesController');

Route::resource('orders.entries', 'EntriesController');

Route::resource('ptypes', 'PtypesController');

Route::resource('dtypes', 'DtypesController');

Route::resource('documents', 'DocumentsController');

Route::resource('categories', 'CategoriesController');

Route::resource('docscats', 'DocscatsController');

Route::resource('sub_cats', 'Sub_catsController');

Route::resource('categories', 'CategoriesController');

Route::resource('contacts', 'ContactsController');

Route::resource('deliveries', 'DeliveriesController');


Route::resource('umessages', 'UmessagesController');

Route::resource('notifications', 'NotificationsController');

Route::resource('trucks', 'TrucksController');
