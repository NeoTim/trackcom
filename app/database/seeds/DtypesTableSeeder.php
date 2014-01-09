<?php

class DtypesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('dtypes')->truncate();

		$dtypes = array(
			array(
				"name"	=>	"Delivering",
				"color"	=>	"orange"
			),
			array(
				"name"	=>	"Shipping",
				"color"	=>	"Blue"
			),
			array(
				"name"	=>	"Pickup",
				"color"	=>	"green"
			),
		);

		// Uncomment the below to run the seeder
		DB::table('dtypes')->insert($dtypes);
	}

}
