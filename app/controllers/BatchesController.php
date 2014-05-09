<?php

use Cox\Storage\Batch\BatchRepositoryInterface as Batch;
//use Cox\Storage\Order\OrderRepositoryInterface as Order;
//use Cox\Storage\product\ProductRepositoryInterface as Product;
//use Cox\Storage\Ptype\PtypeRepositoryInterface as Ptype;
//use Cox\Storage\Pmethod\PmethodRepositoryInterface as Pmethod;

class BatchesController extends BaseController {

	/**
	 * Batch Repository
	 *
	 * @var Batch
	 */
	protected $batch;
	//protected $order;

	public function __construct(
		Batch $batch
		//Order $order, Product $product, Ptype $ptype, Pmethod $pmethod
		)
	{
		$this->batch = $batch;
		//$this->order = $order;
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
		return $this->batch->all();	
	}

	public function create($id)
	{
				
	}
	
	public function store()
	{
				
		$result = $this->batch->store(Input::all());

		if($result['success'])
		{				
			//Session::flash('success', 'This Product ' . $sku . ' has been saved to Products');
			$batches = $this->batch->all();
			return $batches;
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
		return $this->batch->find($id);
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
		$result = $this->batch->update($id, Input::all());
		$batch = $this->batch->find($id);
		Event::fire(UpdateEntriesEventHandler::EVENT, array($batch));
		return $batch;
		/*if ($result['success'])
		{		
			//Event::fire(UpdateEntriesStatusEventHandler::EVENT, array($batch) );
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
	public function destroy($order_id, $batch_id)
	{
		$batch = $this->batch->find($batch_id);

		$result = $this->batch->destroy($batch_id);
		if($result['success'])
		{
			Session::flash('success', $result['message']);
			//Event::fire(DeleteEntriesEventHandler::EVENT, array($batch));	
			
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
	}


	public function seteventdata($id)
	{
		$batch = $this->batch->find($id);	
		Event::fire(StoreBatchesEventHandler::EVENT, array('batch' => $batch));
	}

}














