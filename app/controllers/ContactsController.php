<?php

use Cox\Storage\Contact\ContactRepositoryInterface as Contact;

class ContactsController extends BaseController {

	
	protected $contact;

	public function __construct(Contact $contact)
	{
		$this->contact = $contact;
		//$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		//$this->beforeFilter('auth', array('only' => array('change')));
		//$this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}

	// INDEX

	public function index()
	{		
		return $this->contact->all();
	}

	// CREATE CUSTOMER

	public function create()
	{
		return View::make('contacts.create');
	}

	// STORE CUSTOMER

	public function store()
	{
		$result = $this->contact->store(Input::all());		
		if ($result['success'])
		{

			Session::flash('success', $result['message']);			
			return $result['contact'];
		}
		else
		{
			Session::flash('error', $result['message']);
		}
	}

	// SHOW CUSTOMER

	public function show($id)
	{
		return $this->contact->find($id);
	}

	// EDIT CUSTOMER

	public function edit($id)
	{

	}

	// UPDATE CUSTOMER

	public function update($id)
	{
		
		$result = $this->contact->update($id, Input::all());

		if($result['success'])
		{
			Session::flash('success', $result['message']);			
		}
		else
		{
			Session::flash('error', $result['message']);
		}
		
	}

	// DELETE CUSTOMER
	
	public function destroy($id)
	{
		$result = $this->contact->destroy($id);
		if($result['success'])
		{
			Session::flash('success', $result['message']);			
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
		// For AJAX
		// $contact = $this->contact->find($id);
		// $this->contact->destroy($id);
		
	}

}
