<?php

class DmethodsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('dmethods')->truncate();

		$dmethods = array(
				array(
					"name"		=>	"Shipping Latex",
					"dtype_id"	=>	"2"
				),
				array(
					"name"		=>	"Shipping Alkyd",
					"dtype_id"	=>	"2"
				),
				array(
					"name"		=>	"Monday North",
					"dtype_id"	=>	"1"
				),
				array(
					"name"		=>	"Tuesday East",
					"dtype_id"	=>	"1"
				),
				array(
					"name"		=>	"Wednesday South",
					"dtype_id"	=>	"1"
				),
				array(
					"name"		=>	"Thursday West",
					"dtype_id"	=>	"1"
				),
				array(
					"name"		=>	"Local",
					"dtype_id"	=>	"1"
				),
				array(
					"name"		=>	"Pickup Alkyd",
					"dtype_id"	=>	"3"
				),
				array(
					"name"		=>	"Pickup Reno",
					"dtype_id"	=>	"3"
				),
				array(
					"name"		=>	"Pickup South",
					"dtype_id"	=>	"3"
				),
				array(
					"name"		=>	"Pickup North",
					"dtype_id"	=>	"3"
				)
		);

		// Uncomment the below to run the seeder
		DB::table('dmethods')->insert($dmethods);
	}

}
