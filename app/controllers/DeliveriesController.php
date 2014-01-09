<?php


use Cox\Storage\Dtype\DtypeRepositoryInterface as Dtype;
use Cox\Storage\Dmethod\DmethodRepositoryInterface as Dmethod;


class DeliveriesController extends BaseController {

	public function __construct(Dtype $dtype, Dmethod $dmethod)
	{
		$this->dtype = $dtype;
		$this->dmethod = $dmethod;

	}

	public function getIndex()
	{
		$dtypes = $this->dtype->all();
		$dmethods = $this->dmethod->all();

		return View::make('deliveries.index', compact('dtypes', 'dmethods'));
	}




}