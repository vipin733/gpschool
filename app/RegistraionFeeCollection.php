<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistraionFeeCollection extends Model
{
    
   protected $fillable = [
        'registraion_fee','late_fee','fee_details','reciept_no','remarks','course_id','taker_id','asession_id','active','deleted_at','deleted_by_id','completed'
    ];

      public function students()
    {
    	return $this->belongsTo(Student::Class,'student_id');
    }

    public function courses()
    {
        return $this->belongsTo(Course::Class,'course_id');
    }

     public function takers()
    {
      return $this->belongsTo(User::Class,'taker_id');
    }

    public function asessions()
    {
      return $this->belongsTo(Asession::Class,'asession_id');
    }

    
      public function deletedby()
    {
      return $this->belongsTo(User::Class,'deleted_by_id');
    }
}
