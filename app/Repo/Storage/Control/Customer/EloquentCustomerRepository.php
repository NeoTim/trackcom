<?php

namespace Repo\Storage\Control\Customer;

use Customer;

class EloquentCustomerRepository implements CustomerInterface {


	public function find($id)
	{
		$customer = $this->find($id);

		//if(!$order) throw new NotFoundException('Order Not Found');
		return $customer;
	}
	


	public function all()
	{
	
		return $this->all();
	
	}

	public function paginate($limit = null)
	{
		//return Order::paginate($limit);
	}

	public function create($data)
	{
		$result = array();		
		if($customer->save($data))
		{
			$result['success'] = true;
			$result['message'] = trans('validation.customer.customer_created');
		}
		else
		{
			// $result['success'] = false;
			// $result['message'] = trans('validarion.customer.customer_createError');
			print "there was an error";
		}
		return $result;	
	}

	public function update($id)
	{
		$result = array();
		$customer = $this->find($id);
		if($customer->save(\Input::all()))
		{
			$result['success'] = true;
			$result['message'] = trans('validation.customer_created');
		}
		else
		{
			$result['success'] = false;
			$result['message'] = trans('customers.customer_PcreateError');
		}
		return $result;	
	}

	public function destroy($id)
	{
		$customer = $this->find($id);
		$customer->delete();
		return true;
	}

	
	public function instance($data = array())
	{
		return new Customer($data);
	}

}