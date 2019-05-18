<?php

use Illuminate\Database\Seeder;
use Realmessenger\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Ing. Jorge Peralta',
        	'email' => 'jorge@gmail.com',
        	'password' => bcrypt('holamundo')
        ]);

        User::create([
            'name' => 'Lic. Carlos Miranda',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('holamundo')
        ]);
    }
}
