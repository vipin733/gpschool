<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('sections')->insert([
            ['name' => 'A','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'B','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'C','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'D','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'E','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],

        ]);    
            	
    }
}

