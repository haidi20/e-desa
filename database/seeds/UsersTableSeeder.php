<?php

use Illuminate\Database\Seeder;

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
            'nama'      => 'saw',
            'password'  => bcrypt('samarinda')
          ],
          [
            'name'      => 'topsis',
            'password'  => bcrypt('samarinda')
          ]
        ]);
    }
}
