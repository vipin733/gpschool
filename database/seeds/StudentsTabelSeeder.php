<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class StudentsTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$facker =Faker::create('App\Student');


    	foreach (range(1,500) as $index)
    {

          DB::table('students')->insert([
            'student_name' => $facker->name,
            'year_of_admission' => $facker->randomElement(['2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016']),
            'last_school' => $facker->name,
            'reg_no' => $facker->unique()->numerify('GRN2017######'), //,
            'father_name' => $facker->name,
            'mother_name' => $facker->name,
            'date_of_birth' => '200'.mt_rand(0,4).'-'.mt_rand(1,12).'-'.mt_rand(1,26) ,
            'emer_no' => $facker->numerify('##########'),
            'father_no' => $facker->numerify('##########'),
            'father_email' => $facker->unique()->safeEmail,
            'address' => $facker->streetAddress,

            'religion' => $facker->randomElement(['Hindu','Muslim','Christian','Sikh','                 Buddhism']),
            'castec' => $facker->randomElement(['General','OBC','ST','SC']),
            'occupation' => $facker->randomElement(['Agriculutre','Private Job','                   Government Job','Buesiness']),

            'caste' => $facker->randomElement(['Patel','Singh','Khumaar','Baniya','']),

            'zip_pin' => $facker->numberBetween($min = 100000, $max = 999999),
            'address1' => $facker->streetAddress,
            'zip_pin1' => $facker->numberBetween($min = 100000, $max = 999999),
            'section_id' => $facker->numberBetween(1,5),
            'course_id' => $facker->numberBetween(1,15),
            'created_course_id' => $facker->numberBetween(1,15),
            'city_id' => $facker->numberBetween(1,5),
            'state_id' => $facker->numberBetween(1,5),
            'ccity_id' => $facker->numberBetween(1,5),
            'cstate_id' => $facker->numberBetween(1,5),
            'gender' => $facker->numberBetween(1,2),
            'status' => $facker->numberBetween(2,1),
            //'user_id' => $facker->numberBetween(2,1),
            'transportation' => 1,
            'stopage_id' => $facker->numberBetween(1,5),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' =>\Carbon\Carbon::now(),
        ]);
    }


    }
}
