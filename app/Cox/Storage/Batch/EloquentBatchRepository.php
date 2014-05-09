<?php

namespace Cox\Storage\Batch;

use Cox\Storage\Product\ProductRepositoryInterface as Product;
//use Cox\Storage\Activity\ActivityRepositoryInterface as Activity;
use Cox\Storage\Order\OrderRepositoryInterface as Order;
//use Cox\Storage\Ptype\PtypeRepositoryInterface as Ptype;
//use Cox\Storage\Pmethod\PmethodRepositoryInterface as Pmethod;
use Batch;

class EloquentBatchRepository implements BatchRepositoryInterface
{
	protected $batch;
	//protected $product;
	protected $order;
	//protected $activity;
	//protected $ptype;
	//protected $pmethod;

	public function __construct(
		Batch $batch,
		// Product $product,
		 Order $order
		// Activity $activity,
		// Ptype $ptype,
		// Pmethod $pmethod
		)
	{
		$this->batch = $batch;
		// $this->product = $product;
		 $this->order = $order;
		// $this->activity = $activity;
		// $this->ptype = $ptype;
		// $this->pmethod = $pmethod;
	}

	public function all()
	{
		
		return $this->batch->with('entries')->get();
	}

	public function find($id)
	{
		return $this->batch->find($id);
	}

	// FIND BY $ORDER_ID
	public function findByOrder($order_id)
	{
		return $this->batch->where('order_id', '=', $order_id);
	}

	// FIND BY TODAY
	public function findByToday()
	{
		return $this->batch->where('created_at', '=', NOW());
	}

	public function store($input)
	{
		$result = array();
		//$order = $this->order->find($input['order_id']);

		$batch = $this->batch->create($input);
		$result['batch'] = $batch;
		$result['success'] = true;
		$result['message'] = "Batchwas Successfully stored";
		return $result;




		// if(\Input::get('ptype_id'))
		// {
		// 	$ptype = $this->ptype->find($input['ptype_id']);
		// }else{
		// 	$result['success'] = false;
		// 	$result['message'] = "Please choose a production type";
		// 	return $result;
		// }
		// if(\Input::get('pmethod_id'))
		// {
		// 	$pmethod = $this->pmethod->find($input['pmethod_id']);
		// }
		// if(\Input::get('container1'))
		// {
		// 	$gal1 = \Input::get('container1') * \Input::get('qty1');
		// 	$input['gal1'] = $gal1;
		// }
		// if(\Input::get('container2'))
		// {
		// 	$gal2 = \Input::get('container2') * \Input::get('qty2');
		// 	$input['gal2'] = $gal2;
		// }
		// if(\Input::get('container3'))
		// {
		// 	$gal3 = \Input::get('container3') * \Input::get('qty3');
		// 	$input['gal3'] = $gal3;
		// }	
		// if(\Input::get('newsku'))
		// {
		// 	$product = new \Product;
		// 	$product->sku = \Input::get('newsku');

		// 	if($product->save())
		// 	{	$input['sku'] = $product->sku;
		// 		$input['product_id'] = $product->id;
				
		// 		$result['batch'] = $this->batch->create($input);
		// 		$result['success'] = true;
		// 		$result['message'] = "This product was created successfully";
		// 		$result['sku'] = $product->sku;
		// 		$result['product_id'] = $product->id;

		// 		//$this->activity->store($product->sku, 'New Product', 'Product SKU - ' . $product->sku . ' Was just Created', 'product', 'store');
		// 		//$this->activity->store($product->sku, 'Added to Order # ' . $order['number'], $product->sku . ' Was just added to ' . $order['title'], 'batch', 'store');
		// 		if(\Input::get('ptype_id'))
		// 		if($input['ptype_id'] == 1 OR $input['ptype_id'] == 2)
		// 		{
		// 			//$this->activity->store($product->sku, 'Added to production', $product->sku . ' Was just added to ' . $pmethod['name'], 'production', 'store');
		// 		}
		// 		return $result;
				
		// 	}
		// }
		// elseif (\Input::get('product_id'))
		// {
			
		// 	$product = $this->product->find($input['product_id']);
		// 	$input['sku'] = $product->sku;
		// 	$result['batch'] = $this->batch->create($input);
		// 	$result['success'] = true;
		// 	$result['message'] = "You Product has been added to this order";
		// 	$result['product_id'] = \Input::get('product_id');
		// 	//$this->activity->store($product->sku, 'Added to Order # ' . $order['number'], $product->sku . ' Was just added to ' . $order['title'], 'batch', 'store');
		// 	if($input['ptype_id'] == 1 OR $input['ptype_id'] == 2)
		// 		{
		// 			//$this->activity->store($product->sku, 'Added to production', $product->sku . ' Was just added to ' . $pmethod['name'], 'production', 'store');
		// 		}
		// 	return $result;
		// }





	}

	public function update($id, $input)
	{
		$batch = $this->batch->find($id);
		$result = array();
		//$product = $this->product->find($input['product_id']);
		//$input['sku'] = $product->sku;
		//$order = $this->order->find($batch['order_id']);

			// if($batch->update($input))
			// {
			// 	if(\Input::get('container1'))
			// {
			// 	$gal1 = \Input::get('container1') * \Input::get('qty1');
			// 	$input['gal1'] = $gal1;
			// }
			// if(\Input::get('container2'))
			// {
			// 	$gal2 = \Input::get('container2') * \Input::get('qty2');
			// 	$input['gal2'] = $gal2;
			// }
			// if(\Input::get('container3'))
			// {
			// 	$gal3 = \Input::get('container3') * \Input::get('qty3');
			// 	$input['gal3'] = $gal3;
			// }	
			// if(\Input::get('ready_date'))
			// {
			// 	$end_day_old = \Input::get('ready_date');
			// 	$end_day = date("Y-m-d H:i:s", strtotime($end_day_old));
			// 	$input['ready_date'] = $end_day;
			// }
			// else
			// {
			// 	$input['ready_date'] = null;
			// }
		if($batch->update($input)){
			$result['success'] = true;
			$result['message'] = $batch['sku'] . " Was updated successfully";
			//$this->activity->store($input['sku'], 'Product from Order # ' . $order['number'] . ' updated', $input['sku'] . ' from ' . $order['title'] . ' was just updated', 'batch', 'update');
			return $result;
			
		} else {
			$result['success'] = fasle;
			$result['message'] = "There was an error updating " . $batch['sku'] ;
			return $result;
		}
	}

	public function destroy($id)
	{
		$batch = $this->batch->find($id);
		//$order = $this->order->find($batch['order_id']);
		//$pmethod = $this->pmethod->find($batch['pmethod_id']);
		if($batch->delete())
		{
			//$this->activity->store($batch['sku'], 'Product from Order #' . $order['number'] . ' Deleted', $batch['sku'] . ' from ' . $order['title'] . ' was just Deleted', 'batch', 'delete');
			
			$result['success'] = true;
			$result['message'] = $batch['sku'] . " Was deleted successfully";
			return $result;
		}
		else
		{
			$result['success'] = false;
			$result['message'] = "There was an error deleteing " . $batch['sku'] ;
			return $result;
		}
	}
}