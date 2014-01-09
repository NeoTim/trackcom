<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('categories')->truncate();

		$categories = array(
			array(
				"name"		=>	"categories",
				"position"	=>	"0",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"customers",
				"position"	=>	"1",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"dmethods",
				"position"	=>	"2",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"dtypes",
				"position"	=>	"3",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"ptypes",
				"position"	=>	"4",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"pmethods",
				"position"	=>	"5",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"products",
				"position"	=>	"6",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"orders",
				"position"	=>	"7",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"documents",
				"position"	=>	"8",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"users",
				"position"	=>	"9",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"groups",
				"position"	=>	"10",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"sub_cats",
				"position"	=>	"11",
				"visible"	=>	"1"
			),
			array(
				"name"		=>	"entries",
				"position"	=>	"12",
				"visible"	=>	"1"
			)



		);

		// Uncomment the below to run the seeder
		DB::table('categories')->insert($categories);
	}

}
