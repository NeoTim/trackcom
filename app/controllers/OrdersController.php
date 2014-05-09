<?php



use Cox\Storage\Order\OrderRepositoryInterface as Order;
//use Cox\Storage\Entry\EntryRepositoryInterface as Entry;
//use Cox\Storage\Customer\CustomerRepositoryInterface as Customer;
//use Cox\Storage\Dtype\DtypeRepositoryInterface as Dtype;
//use Cox\Storage\Dmethod\DmethodRepositoryInterface as Dmethod;
//use Cox\Storage\Ptype\PtypeRepositoryInterface as Ptype;
//use Cox\Storage\Pmethod\PmethodRepositoryInterface as Pmethod;
//use Cox\Storage\Product\ProductRepositoryInterface as Product;


class OrdersController extends BaseController {

	/**
	 * Order Cox Repository
	 *
	 * @var Order
	 */
	protected $order;
	//protected $entry;
	//protected $dtypes;
	public function __construct(
		Order $order
		/*Entry $entry,
		Customer $customer,
		Dtype $dtype,
		Dmethod $dmethod,
		Ptype $ptype,
		Pmethod $pmethod,
		Product $product*/
		)
	{
		$this->order = $order;
		// $this->entry = $entry;
		// $this->customer = $customer;
		// $this->dtype = $dtype;
		// $this->dmethod = $dmethod;
		// $this->ptype = $ptype;
		// $this->pmethod = $pmethod;
		// $this->product = $product;
		//$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		//$this->beforeFilter('auth', array('only' => array('change')));
		//$this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{			
		return $this->order->all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{		
		$result = $this->order->store(Input::all());
		if($result['success'])
		{
			$order = $this->order->find(Input::get('id'));
			if(Input::get('group_id')){
				Event::fire(UpdateOrdersEventHandler::EVENT, array($order));
			} else {
				Event::fire(StoreOrdersEventHandler::EVENT, array($order));
			}
			Session::flash('success', 'You Order was Successfully created!!');
		}
		else
		{
			Session::flash('error', 'There was an errror creating your order!!');			
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{		
		return $this->order->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{		
		$result = $this->order->update($id, Input::all());

		if ($result['success'])
		{	
			//$order = $this->order->find($id);
			if(Input::get(!input::get('grpColor'))){
				$orders = $this->order->all();
				$orders['allOrders'] = 'true';
				Event::fire(UpdateOrdersEventHandler::EVENT, array($orders));		
			} else {
				Event::fire(UpdateOrdersEventHandler::EVENT, array($result['order']));			
			}
			Session::flash('success', $result['message']);
			return Response::make($result['message'], 200);	
		}
		else
		{
			Session::flash('error', $result['message']);
			return Response::make($result['message'], 404);
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result = $this->order->destroy($id);		
		if($result['success'])
		{
			Session::flash('success', $result['message']);
			//Event::fire(DeleteOrdersEventHandler::EVENT, array($order));			
		}
		else
		{
			Session::flash('error', $result['message']);			
		}

	}


	public function trash()
	{		
		return $this->order->trash();
	}

	public function restore($id)
	{
		$result = $this->order->restoreOrder($id);
		if($result['success'])
		{
			Session::flash('success', $result['message']);			
		}else{
			Session::flash('error', $result['message']);			
		}
	}

	public function remove($id)
	{
		$result = $this->order->remove($id);
		if($result['success'])
		{
			Session::flash('success', $result['message']);			
		}else{
			Session::flash('error', $result['message']);			
		}
	}

	

}
