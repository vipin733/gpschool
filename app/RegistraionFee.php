<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistraionFee extends Model
{
     protected $fillable = [
        
       'course_id','asession_id','registraion_fee', 'late_fee','fee_details','remarks'
    ];
   
     public function courses()
    {
    	return $this->belongsTo(Course::Class,'course_id');
    }

    public function asessions()
    {
      return $this->belongsTo(Asession::Class,'asession_id');
    }
}
