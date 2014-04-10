<?php

namespace Repo\Storage\Control\Order;

use Order;

class EloquentOrderRepository implements OrderInterface {


	protected $order;

	public function __construct(Order $order)
	{
		$this->order      = $order;
		//$this->entry      = $entry;
		//$this->product    = $product;
		//$this->dtype	  = $dtype;
		//$this->dmethod	  = $dmethod;
		//$this->pmethod 	  = $pmethod;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function all()
	{
		return $this->order->all();
	}

	public function find($id)
	{
		return $this->order->find($id);
	}

	public function paginate($limit = null)
	{
		//return Order::paginate($limit);
	}

	public function create($data)
	{	
		$result = array();
	



		$order = new Order;
		$order->company	= $data['company'];
		$order->number = $data['number'];
		$order->dtype_id = $data['dtype_id'];
		$order->dmethod_id = $data['dmethod_id'];
		$order->title = $data['title'];
		$order->start = $data['start'];
		$order->end = $data['end'];
		$order->freight = $data['freight'];
		$order->tracking = $data['tracking'];
		$order->instructions = $data['instructions'];
		
		if($order->save())
		{
			$result['success'] = true;
			$result['message'] = trans('validation.order_created');
		
		}else{
		
			$result['success'] = false;
			$result['message'] = trans('validation.order_createError');
		}
		
		return $result;
		
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