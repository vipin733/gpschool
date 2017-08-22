<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Varanasi','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Jaunpur','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Balia','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Gaazipur','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Gorakhpur','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
        	
        	]);
    }
}
