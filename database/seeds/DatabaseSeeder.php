<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
       $this->call(CityTableSeeder::class);
      $this->call(CourseTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
      $this->call(SectionTableSeeder::class);
       $this->call(StopageTableSeeder::class);
       //$this->call(AsessionTableSeeder::class);
       //$this->call(TeacherTabelSeeder::class);
      //$this->call(StudentsTabelSeeder::class);
    }
}
