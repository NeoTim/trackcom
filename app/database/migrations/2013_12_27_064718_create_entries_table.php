<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id');
			$table->integer('product_id');
			$table->integer('order_id');
			$table->integer('ptype_id');
			$table->integer('pmethod_id');
			$table->string('sku');
			$table->string('batch');
			$table->integer('tank');
			$table->string('container1');
			$table->string('container2');
			$table->string('container3');
			$table->integer('qty1');
			$table->integer('qty2');
			$table->integer('qty3');
			$table->text('desc1');
			$table->text('desc2');
			$table->text('desc3');
			$table->integer('status');
			$table->string('color');
			$table->string ('msds');
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
