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
        'name' => 'Admin',
        'email' => 'admin@gramyanchal.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        ]);
    }
}
