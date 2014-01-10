<?php


use Cox\Storage\Dtype\DtypeRepositoryInterface as Dtype;
use Cox\Storage\Dmethod\DmethodRepositoryInterface as Dmethod;
use Cox\Storage\Order\OrderRepositoryInterface as Order;


class DeliveriesController extends BaseController {

	public function __construct(Dtype $dtype, Dmethod $dmethod, Order $order)
	{
		$this->dtype = $dtype;
		$this->dmethod = $dmethod;
		$this->order = $order;

	}

	public function getIndex()
	{
		$dtypes = $this->dtype->all();
		$dmethods = $this->dmethod->all();
		$orders = $this->order->all();

		return View::make('deliveries.index', compact('dtypes', 'dmethods', 'orders'));
	}




}