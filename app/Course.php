<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use DB;

class Course extends Model
{

	
     protected $fillable = [
        'name','remarks'
    ];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
    

     public function tutionfee()
    {
        return $this->hasOne(TutionFee::Class);
    }

      public function registraionfee()
    {
        return $this->hasOne(RegistraionFee::Class);
    }
    
      public function sections()
    {
        return $this->belongsToMany(Section::class,'course_section')->withTimestamps();
    }
    
    public function studentacadmic()
    {
        return $this->hasMany(StudentAcadmic::Class);
    }

    public static function coursename()
    {
        return static::select(DB::raw("name as course"))
                                 ->orderBy('id')
                                 ->get()->toArray();
    }

}
