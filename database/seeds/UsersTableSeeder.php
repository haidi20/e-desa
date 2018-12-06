<?php

use Illuminate\Database\Seeder;

use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'email' 	=> 'admin@admin.com',
        		'username' 	=> 'admin',
        		'role' 		=> 'admin'
        		'password'	=> bcrypt('samarinda')
        	],
        	[
        		'email' 	=> 'user@user.com',
        		'username' 	=> 'user',
        		'role' 		=> 'user',
        		'password'	=> bcrypt('samarinda')
        	]
        ]);
    }
}
