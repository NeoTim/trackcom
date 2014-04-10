<?php

namespace Repository\Storage\Order;

use Order;

class EloquentOrderRepository implements OrderRepositoryInterface {

	public function find($id)
	{
		$order = Order::find($id);

		//if(!$order) throw new NotFoundException('Order Not Found');
		return $order;
	}
	


	public function all()
	{
	
		return Order::all();
	
	}

	public function paginate($limit = null)
	{
		//return Order::paginate($limit);
	}

	public function create($data)
	{
		
		
		$order = new Order;
		$order->customer = $data['customer'];
		$order->order_number = $data['order_number'];
		$order->save();
		return $order;
		
	}

	public function update($id)
	{
		$order = $this->find($id);
		$order->customer = \Input::get('customer');
		$order->order_number = \Input::get('order_number');
		$order->save();
		return $order;
	}

	public function destroy($id)
	{
		$order = $this->find($id);
		$order->delete();
		return true;
	}

	
	public function instance($data = array())
	{
		return new Order($data);
	}

}