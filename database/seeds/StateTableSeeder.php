<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['name' => 'UTTAR PRADESH','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'BIHAR','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'PUNJAB','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'DELHI','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'KARNAATAKA','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()]
            
            ]);
    }
}
