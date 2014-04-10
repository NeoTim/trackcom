<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUmessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Umessages', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('to_user_id');
			$table->string('from_user');
			$table->string('subject');
			$table->text('body');
			$table->boolean('global');
			$table->boolean('inbox');
			$table->boolean('sent');
			$table->boolean('archive');
			$table->boolean('trash');
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
		Schema::drop('Umessages');
	}

}
