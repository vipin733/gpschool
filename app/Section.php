<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{


      protected $fillable = [
        'name','remarks'
    ];


    public function studentacadmic()
    {
        return $this->hasMany(StudentAcadmic::Class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_section')->withTimestamps();
    }


}
