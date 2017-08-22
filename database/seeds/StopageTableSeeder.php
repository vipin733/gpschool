<?php

use Illuminate\Database\Seeder;

class StopageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('stopages')->insert([
            ['name' => 'Baragaon','bus_id'=>1,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Babatpur','bus_id'=>1,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Shivpur','bus_id'=>1,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Ardly Bazaar','bus_id'=>1,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Gilat Bazaar','bus_id'=>1,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],

        ]);  
    }
}
