<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCCersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_c_cers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->index();
            $table->string('failed',10);
            $table->string('subjects');
            $table->integer('lclass');
            $table->string('lschool');
            $table->string('promotion',10);
            $table->string('paid',10);
            $table->string('concession');
            $table->string('ncc');
            $table->string('struck_date');
            $table->string('couse');
            $table->integer('meeting');
            $table->integer('no_days');
            $table->string('conduct');
            $table->string('remarks');
            $table->string('reg_no_9_to_12')->nullable();
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
        Schema::dropIfExists('t_c_cers');
    }
}
