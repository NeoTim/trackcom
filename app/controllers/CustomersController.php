<?php

use Cox\Storage\Customer\CustomerRepositoryInterface as Customer;
use Cox\Storage\Contact\ContactRepositoryInterface as Contact;

class CustomersController extends BaseController {

	
	protected $customer;
	protected $contact;

	public function __construct(
		Customer $customer,
		Contact $contact
		)
	{
		$this->customer = $customer;
		$this->contact = $contact;
		//$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		//$this->beforeFilter('auth', array('only' => array('change')));
		//$this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}

	// INDEX

	public function index()
	{

		return $this->customer->all()->toJson();

		
	}

	// CREATE CUSTOMER
	public function create() 
	{

	}

	// STORE CUSTOMER

	public function store()
	{
		$result = $this->customer->store(Input::all());

		if ($result['success'])
		{
			
			Session::flash('success', $result['message']);
			return Response::make($result['customer']);
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
	}

	// SHOW CUSTOMER

	public function show($id)
	{	
		$customer = $this->customer->find($id);
		///$customer['contacts'] = $this->contact->findByCustomer($id);
		return $customer;
	}

	// EDIT CUSTOMER

	public function edit($id)
	{

	}

	// UPDATE CUSTOMER

	public function update($id)
	{		
		$result = $this->customer->update($id, Input::all());

		if ($result['success'])
		{
			$customer = $this->customer->find($id);
			Session::flash('success', $result['message']);
			return Response::make($customer, 200);
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
	}

	// DELETE CUSTOMER
	
	public function destroy($id)
	{
		$result = $this->customer->destroy($id);
		
		if($result['success'])
		{
			Session::flash('success', $result['message']);			
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
	}

}
