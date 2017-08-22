<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('teacher_name');
            $table->boolean('type');
            $table->date('date_of_joining');
            $table->string('experience')->nullable();
            $table->string('last_school')->nullable();
            // $table->string('reg_no')->unique();
            $table->string('reg_no');
            $table->boolean('status');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('date_of_birth');
            $table->boolean('gender');
            $table->string('emergency_no');
            $table->string('mob_no');
            $table->string('email')->nullable();
            $table->string('address');
            $table->integer('city_id')->unsigned()->index();
            $table->integer('state_id')->unsigned()->index();
            $table->integer('zip_pin');
            $table->string('address1');
            $table->integer('tcity_id')->unsigned()->index();
            $table->integer('tstate_id')->unsigned()->index();
            $table->integer('tzip_pin');
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
        Schema::dropIfExists('teachers');
    }
}
