<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function ($table) {
			$table->increments('id');
			$table->string('company');
			$table->string('division');			
			$table->string('email')->unique();	
			$table->string('phone');
			$table->string('number');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}