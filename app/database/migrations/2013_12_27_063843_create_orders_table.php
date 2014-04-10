<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id');
			$table->integer('customer_id');
			$table->integer('dtype_id');
			$table->integer('dmethod_id');
			$table->string('number');
			$table->string('title');
			$table->date('start');
			$table->date('end');
			$table->string('freight');
			$table->string('tracking');
			$table->text('instructions');
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
