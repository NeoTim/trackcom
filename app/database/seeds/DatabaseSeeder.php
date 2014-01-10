<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');
		

		$this->call('OrdersTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('PmethodsTableSeeder');
		$this->call('DmethodsTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('EntriesTableSeeder');
		$this->call('PtypesTableSeeder');
		$this->call('DtypesTableSeeder');
		
		$this->call('DocumentsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('Sub_catsTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('UmessagesTableSeeder');
	}

}