<?php

use Cox\Storage\Entry\EntryRepositoryInterface as Entry;
use Cox\Storage\Order\OrderRepositoryInterface as Order;
//use Cox\Storage\product\ProductRepositoryInterface as Product;
//use Cox\Storage\Ptype\PtypeRepositoryInterface as Ptype;
//use Cox\Storage\Pmethod\PmethodRepositoryInterface as Pmethod;

class EntriesController extends BaseController {

	/**
	 * Entry Repository
	 *
	 * @var Entry
	 */
	protected $entry;
	//protected $order;

	public function __construct(
		Entry $entry,
		Order $order
		//Product $product, Ptype $ptype, Pmethod $pmethod
		)
	{
		$this->entry = $entry;
		$this->order = $order;
		//$this->product = $product;
		//$this->pmethod = $pmethod;
		//$this->ptype = $ptype;
		//$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		// $this->beforeFilter('auth', array('only' => array('change')));
		// $this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}
	
	public function index()
	{
		return $this->entry->all();	
	}

	public function create($id)
	{
				
	}
	
	public function store()
	{
				
		$result = $this->entry->store(Input::all());

		if($result['success'])
		{				
			//Session::flash('success', 'This Product ' . $sku . ' has been saved to Products');
			$entries = $this->entry->all();
			return $entries;
		}
		else 
		{
			Session::flash('error', $result['message']);			
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
		return $this->entry->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($order_id, $id)
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
		$result = $this->entry->update($id, Input::all());
		$entry = $this->entry->find($id);
		Event::fire(UpdateEntriesEventHandler::EVENT, array($entry));
		/*if ($result['success'])
		{		
			//Event::fire(UpdateEntriesStatusEventHandler::EVENT, array($entry) );
			Session::flash('success', $result['message']);			
		}
		else
		{			
			Session::flash('error', $result['message']);
		}*/
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($entry_id)
	{
		$entry = $this->entry->find($entry_id);
		$orders = $this->order->all();
		$result = $this->entry->destroy($entry_id);
		if($result['success'])
		{
			Session::flash('success', $result['message']);
			//Event::fire(DeleteEntriesEventHandler::EVENT, array($entry));	
			return $orders;
			
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
	}


	public function seteventdata($id)
	{
		$entry = $this->entry->find($id);	
		Event::fire(StoreEntriesEventHandler::EVENT, array('entry' => $entry));
	}

}














