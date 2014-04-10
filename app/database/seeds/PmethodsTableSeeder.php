<?php

class PmethodsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('pmethods')->truncate();

		$pmethods = array(
				array(
					"name"		=>	"Alkyd Large Batch",
					"ptype_id"	=>	"1"
				),
				array(
					"name"		=>	"Alkyd Small Batch",
					"ptype_id"	=>	"1"
				),
				array(
					"name"		=>	"Latex Production",
					"ptype_id"	=>	"2"
				),
				array(
					"name"		=>	"Latex Store",
					"ptype_id"	=>	"2"
				),
		);

		// Uncomment the below to run the seeder
		DB::table('pmethods')->insert($pmethods);
	}

}
