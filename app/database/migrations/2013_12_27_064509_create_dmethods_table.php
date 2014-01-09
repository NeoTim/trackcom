<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDmethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dmethods', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id');
			$table->string('name');
			$table->integer('dtype_id');
			$table->string('label');
			$table->text('desc');
			$table->string('color');
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
		Schema::drop('dmethods');
	}

}
