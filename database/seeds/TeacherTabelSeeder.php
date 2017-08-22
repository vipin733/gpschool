<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeacherTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$facker =Faker::create('App\Teacher');


    	foreach (range(1,500) as $index)
    {

          DB::table('teachers')->insert([
            'teacher_name' => $facker->name,
            'year_of_joining' => $facker->randomElement(['2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016']),
            'last_school' => $facker->name,
            'reg_no' => $facker->unique()->numerify('GRAT2017#####'), //,
            'experience' => $facker->randomElement([' 5 year in Hindi',' 4 year in Hindi','fresher']),
            'father_name' => $facker->name,
            'mother_name' => $facker->name,
            'date_of_birth' =>  $facker->date($format = 'D-m-y', $max = '2012',$min = '2012'),
            'emergency_no' => $facker->e164PhoneNumber,
            'mob_no' => $facker->e164PhoneNumber,
            'email' => $facker->unique()->safeEmail,
            'address' => $facker->streetAddress,
            'zip_pin' => $facker->numberBetween($min = 100000, $max = 999999),
            'address1' => $facker->streetAddress,
            'tzip_pin' => $facker->numberBetween($min = 100000, $max = 999999),
            'subject_id' => $facker->numberBetween(1,6),
            'city_id' => $facker->numberBetween(1,5),
            'state_id' => $facker->numberBetween(1,5),
            'tcity_id' => $facker->numberBetween(1,5),
            'tstate_id' => $facker->numberBetween(1,5),
            'gender' => $facker->numberBetween(1,0),
            'status' => $facker->numberBetween(1,0),

            'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now(),
        ]);
    }

    }
}
