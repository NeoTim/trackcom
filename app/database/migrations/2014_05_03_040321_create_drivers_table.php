<?php

use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drivers', function ($table) {
		      $table->increments('id');
		      $table->string('name');
		      $table->string('location');
		      $table->string('method');
		      $table->string('m_id');
		      $table->string('truck');
		      $table->integer('method_id');
		      $table->integer('truck_id');		      
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
		Schema::drop('drivers');
	}

}