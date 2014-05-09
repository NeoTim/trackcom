<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function ($table) {
		      $table->increments('id');
		      $table->string('title');
		      $table->string('start');
		      $table->string('backgroundColor');
		      $table->string('color');
		      $table->string('label');
		      $table->string('allDay');
		      $table->string('truck');		      
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
		Schema::drop('groups');
	}

}