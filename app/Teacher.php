<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Teacher extends Model
{



    
    protected $fillable = [
        'teacher_name','date_of_joining','last_school','reg_no','experience',
         'status', 'father_name','mother_name', 'date_of_birth', 'gender','emergency_no', 'mob_no', 'email','address','city_id','state_id','zip_pin', 'address1','tcity_id', 'tstate_id', 'avatar','tzip_pin','type','avatar','transportation','stopage_id'
    ];

     protected $dates = ['date_of_birth','date_of_joining'];

   public function setDateOfBirthAttribute($value)
    {
         //dd($value);
        $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y',$value);
    }

     public function setDateOfJoiningAttribute($value)
    {
         //dd($value);
        $this->attributes['date_of_joining'] = Carbon::createFromFormat('d/m/Y',$value);
    }
     
       public function isActive()
    {
        if ($this->status) {
           return true;
        }

         return false;
    }

     public function isStaff()
    {
        if ($this->type) {
           return true;
        }

         return false;
    }

     public function TransportationTaken()
    {
        if ($this->transportation) {
           return true;
        }

         return false;
    }

    public function stopages()
    {
        return $this->belongsTo(Stopage::Class,'stopage_id');
    }

     public function getAddressAttribute($value)

    {
        return ucwords($value);
    }


     public function getAddress1Attribute($value)

    {
        return ucwords($value);
    }


     public function getTeacherNameAttribute($value)

    {
        return ucwords($value);
    }

     public function getFatherNameAttribute($value)

    {
        return ucwords($value);
    }

    public function getMotherNameAttribute($value)

    {
        return ucwords($value);
    }

    public function city()
    {
    	return $this->belongsTo(City::Class,'city_id');
    } 

     public function states()
    {
    	return $this->belongsTo(State::Class,'state_id');
    } 

     public function tcity()
    {
        return $this->belongsTo(City::Class,'tcity_id');
    } 

     public function tstates()
    {
        return $this->belongsTo(State::Class,'tstate_id');
    } 
 

}
