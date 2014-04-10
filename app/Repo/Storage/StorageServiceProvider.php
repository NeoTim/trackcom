<?php 

namespace Repo\Storage;

use Illuminate\Support\ServiceProvider;
use Repo\Storage\Control\Customer;
use Repo\Storage\Control\Order;

class StorageServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Repo\Storage\Control\Customer\CustomerInterface',
			'Repo\Storage\Control\Customer\EloquentCustomerRepository'
		);
		$this->app->bind(
			'Repo\Storage\Control\Order\OrderInterface',
			'Repo\Storage\Control\Order\EloquentOrderRepository'
		);
	}




}