<?php


use Cox\Storage\Dtype\DtypeRepositoryInterface as Dtype;
use Cox\Storage\Dmethod\DmethodRepositoryInterface as Dmethod;
use Cox\Storage\Order\OrderRepositoryInterface as Order;


class DeliveriesController extends BaseController {

	public function __construct(Dtype $dtype, Dmethod $dmethod, Order $order, Truck $truck)
	{
		$this->dtype = $dtype;
		$this->dmethod = $dmethod;
		$this->order = $order;
		$this->truck = $truck;

	}

	public function index()
	{
		$dtypes = $this->dtype->all();
		$dmethods = $this->dmethod->all();
		$trucks = $this->truck->all();
		$orders = $this->order->all();
		$methods = $this->dmethod->listName();

		return View::make('deliveries.index', compact('dtypes', 'dmethods', 'orders', 'trucks', 'methods'));
	}

	public function creat()
	{

	}

	public function store()
	{

	}

	public function edit()
	{

	}



	public function update($id)
	{
		$order = $this->order->find($id);
		$truck = $this->truck->find(Input::get('truck_id'));
		$order->update(Input::all());
		return Response::json(array('number' => $order->number, 'position' => $order->position, 'truck' => $truck['number'], 'dtype_id' => $order->dtype_id));
	}

	public function destroy()
	{

	}


}