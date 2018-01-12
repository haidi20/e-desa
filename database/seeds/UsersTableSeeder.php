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
            'nama'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('admin')
          ],
          [
            'name'      => 'andi',
            'email'     => 'andi@andi.com',
            'password'  => bcrypt('andi')
          ]
        ]);
    }
}
