<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TransportFeeCollection extends Model
{
    protected $fillable = [
        'transport_fee','month','reciept_no','remarks','late_fee','other_fee','course_id','taker_id','stopage_id','asession_id','active','deleted_at','deleted_by_id','completed'
    ];

    protected $dates = ['month'];

     public function setMonthAttribute($value)
    {
         //dd($value);
        $this->attributes['month'] = Carbon::createFromFormat('m',$value);
    }

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

    public function stopages()
    {
      return $this->belongsTo(Stopage::Class,'stopage_id');
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
