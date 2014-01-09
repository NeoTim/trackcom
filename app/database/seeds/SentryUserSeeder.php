<?php

class SentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		Sentry::getUserProvider()->create(array(
	        'username'    => 'joelc',
	        'email'    => 'joel.design@icloud.com',
	        'password' => '091190',
	        'activated' => 1,
	    ));

	    Sentry::getUserProvider()->create(array(
	        'username'    => 'sentryuser',
	        'email'    => 'user@user.com',
	        'password' => 'sentryuser',
	        'activated' => 1,
	    ));
	}

}