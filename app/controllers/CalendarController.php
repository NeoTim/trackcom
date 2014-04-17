<?php

use Cox\Storage\Order\OrderRepositoryInterface as Order;
use Cox\Storage\Dtype\DtypeRepositoryInterface as Dtype;
use Cox\Storage\Customer\CustomerRepositoryInterface as Customer;
use Cox\Storage\Grp\GrpRepositoryInterface as Grp;

class CalendarController extends BaseController {


	protected $order;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(Order $order, Dtype $dtype, Customer $customer, Grp $grp)
	{
		$this->order = $order;
		$this->dtype = $dtype;
		$this->customer = $customer;
		$this->grp = $grp;
		//$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		//$this->beforeFilter('auth', array('only' => array('change')));
		//$this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}
	public function index()
	{
		$orders = $this->order->all();
		$dtypes = $this->dtype->all();
		$customers = $this->customer->all();
		$grps = $this->grp->all();
        return View::make('calendars.calendar', compact('orders', 'dtypes', 'customers', 'grps'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('calendars.calendar');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_except(Input::all(), array('company', "newname"));
		$result = $this->order->store($input);
		if($result['success'])
		{
			Session::flash('success', 'You Order was Successfully created!!');
			//return Redirect::route('orders.index');
			return $result['order'];
		}
		else
		{
			Session::flash('error', 'There was an errror creating your order!!');
			//return Redirect::route('orders.create')->withInput();	
			return 'fail';
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$orders = $this->order->all();
		$result = array();
		foreach ($orders as $order)
		{
		    $result[] =  array('id' => $order->id, 'title' => $order->title, 'start' => $order->start, 'backgroundColor' => $order->backgroundColor, 'dtype_id' => $order->dtype_id, 'grp_id' => $order->grp_id);
		    
		    
		}
		return $result;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
        return $this->order->all()->toArray();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$order = $this->order->find($id);
		if(Input::get('droporder'))
		{
			
			$order->start = 0;
			$order->save();
			return Response::json(array('id' => $order['id'], 'title' => $order['title'] , 'start' => $order['start'], 'dtype_id' => $order['dtype_id'], 'backgroundColor' => $order['backgroundColor']));
		}

		if(Input::get('dtype_id'))
		{
			$dtype = $this->dtype->find(Input::get('dtype_id'));
			$order->dtype_id = Input::get('dtype_id');
			$order->backgroundColor = $dtype['color'];

			
			
			$order->title = Input::get('title');
			$order->start = Input::get('start');
			
			$order->save();
			return Response::json(array('title' => $order->title, 'start' => $order->start, 'dtype_id' => $order->dtype_id, 'backgroundColor' => $order->backgroundColor));
		}

		
		
		
		//$order->title = Input::get('title');
		//$order->start = Input::get('start');
		
		//$order->backgroundColor = Input::get('backgroundColor');
		if(Input::get('full')){
			$order->number = Input::get('number');
			$order->grp_id = Input::get('grp_id');
			$order->save();
			return $order;
		} elseif(Input::get('grp_id')){
			$order->grp_id = Input::get('grp_id');
			$order->save();
			
			return $order;
		}

		if($order->save(Input::all())){

			
		}
		//return Response::json(array('title' => $order->title, 'start' => $order->start, 'backgroundColor' => $order->backgroundColor));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
