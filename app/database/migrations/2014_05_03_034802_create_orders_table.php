<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function ($table) {
		      $table->increments('id');
		      $table->string('number');
		      $table->string('title');
		      $table->string('status');
		      $table->string('date');		      
		      $table->string('method');
		      $table->string('customer_num');
		      $table->string('bgColor');

		      $table->integer('grp_id');
		      $table->integer('driver_id');
		      $table->integer('method_id');
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
		Schema::drop('orders');
	}

}