<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{


      protected $fillable = [
        'name','remarks'
    ];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }

     public function teachers()
    {
    	return $this->hasMany(Teacher::class);
    }


}
