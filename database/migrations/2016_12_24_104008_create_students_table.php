<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->text('student_name');
            $table->integer('course_id')->unsigned()->index();
            $table->integer('created_course_id')->unsigned()->index();
            $table->integer('created_asession_id')->unsigned()->index();
              $table->date('date_of_admission');
            $table->string('last_school')->nullable();
            $table->string('reg_no');
            // $table->string('reg_no')->unique();
            $table->boolean('gender');
            $table->text('father_name');
            $table->text('mother_name');
            $table->date('date_of_birth');
            $table->boolean('status');
            $table->string('emer_no');
            $table->string('father_no')->nullable();
            $table->string('father_email')->nullable();
            $table->string('address');


            $table->string('religion')->nullable();
            $table->string('castec')->nullable();
            $table->string('caste')->nullable();
            $table->string('occupation')->nullable();


            $table->integer('city_id')->unsigned()->index();
            $table->integer('state_id')->unsigned()->index();
            $table->integer('zip_pin');
            $table->string('address1');
            $table->integer('ccity_id')->unsigned()->index();
            $table->integer('cstate_id')->unsigned()->index();
            $table->integer('zip_pin1');
            $table->string('avatar')->nullable();
            $table->boolean('transportation');
            $table->integer('stopage_id')->nullable()->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
