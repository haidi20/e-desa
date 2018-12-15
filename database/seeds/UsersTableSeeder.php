<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	[
        		'username' 	=> 'kepala',
        		'role' 		=> 'kepala',
        		'password'	=> bcrypt('samarinda')
        	],
        	[
        		'username' 	=> 'pegawai',
        		'role' 		=> 'pegawai',
        		'password'	=> bcrypt('samarinda')
        	]
        ]);
    }
}
