<?php

class PtypesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('ptypes')->truncate();

		$ptypes = array(
				array(
					"name"	=>	"Alkyd",
					"color"	=>	"blue"
				),
				array(
					"name"	=>	"Latex",
					"color"	=>	"orange"
				),
				array(
					"name"	=>	"In Stock",
					"color"	=>	"green"
				),
				array(
					"name"	=>	"Sundry",
					"color"	=>	"red"
				)
		);

		// Uncomment the below to run the seeder
		DB::table('ptypes')->insert($ptypes);
	}

}
