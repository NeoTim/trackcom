<?php

use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function ($table) {
		      $table->increments('id');
		      $table->integer('product_id');
		      $table->integer('order_id');
		      $table->integer('order_number');
		      $table->integer('location');
		      $table->integer('pmethod_id');
		      $table->string('groupBy');
		      $table->string('priority');
		      $table->string('sku');
		      $table->string('batch');
		      $table->string('tank');
		      $table->string('containers');
		      $table->string('status');
		      $table->string('color');
		      $table->string('label');
		      $table->string('ready_date');
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
		Schema::drop('entries');
	}

}