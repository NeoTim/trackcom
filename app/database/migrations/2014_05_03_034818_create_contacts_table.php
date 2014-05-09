<?php

use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function ($table) {
		      $table->increments('id');
		      $table->string('first');
		      $table->string('last');
		      $table->string('title');
		      $table->string('email');
		      $table->string('phone');
		      $table->string('customer_num');		      
		      $table->integer('customer_id');
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
		Schema::drop('contacts');
	}

}