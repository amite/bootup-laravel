<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = array(
      ['username' => 'jeffreyway', 'email' => 'jeffrey@laracasts.com', 'password' => '12435' ],
      ['username' => 'amite', 'email' => 'amite@laracasts.com', 'password' => '5ghgr65' ],
      ['username' => 'nik', 'email' => 'nik@laracasts.com', 'password' => '5ghgr65' ]
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
