<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('subjects')->insert([
            ['name' => 'Hindi','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Math','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Science','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'English','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'Social Science','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => 'History','created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()]
            
            ]);
    }
}
