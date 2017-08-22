<?php

use Illuminate\Database\Seeder;

class AsessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asessions')->insert([
            ['name' => '2008-2009','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2009-2010','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2010-2011','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2011-2012','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2012-2013','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2013-2014','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2014-2015','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2015-2016','active' => 0,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()],
            ['name' => '2016-2017','active' => 1,'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now()]
        ]);
    }
}
