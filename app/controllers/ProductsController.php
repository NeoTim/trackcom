<?php

use Cox\Storage\Product\ProductRepositoryInterface as Product;

class ProductsController extends BaseController {

	/**
	 * Product Repository
	 *
	 * @var Product
	 */
	protected $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
		$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		// $this->beforeFilter('auth', array('only' => array('change')));
		// $this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->product->all();
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
		$result = $this->product->store(Input::all());

		if ($result['success'])
		{
			
			Session::flash('success', $result['message']);
	
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
		return $this->product->find($id);
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
		$result = $this->product->update($id, Input::all());

		if($result['success'])
		{
			Session::flash('success', $result['message']);			
		}
		else
		{
			Session::flash('error', $result['message']);			
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
		$result = $this->product->destroy($id);

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
