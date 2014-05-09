<?php

use Illuminate\Database\Migrations\Migration;

class CreateMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('methods', function ($table) {
		      $table->increments('id');
		      $table->string('m_id');
		      $table->string('driver');
		      $table->string('status');
		      $table->string('bgColor');
		      $table->string('title');
		      $table->integer('driver_id');
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
		Schema::drop('methods');
	}

}