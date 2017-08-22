<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Student extends Model
{
  


      protected $fillable = [
    'student_name', 'course_id','date_of_admission','last_school','reg_no','gender', 'father_name','mother_name',
    'date_of_birth', 'status','emer_no', 'father_no', 'father_email','address','city_id','state_id','zip_pin','address1','ccity_id',
    'cstate_id','avatar','zip_pin1','transportation','stopage_id',
    'created_course_id','religion','castec','occupation','caste','created_asession_id'
    ];



   protected $dates = ['date_of_birth','date_of_admission'];

   public function setDateOfBirthAttribute($value)
    {
         //dd($value);
        $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y',$value);
    }
      

   public function setDateOfAdmissionAttribute($value)
    {
         //dd($value);
        $this->attributes['date_of_admission'] = Carbon::createFromFormat('d/m/Y',$value);
    }


   public function isActive()
    {
        if ($this->status) {
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


     
     public function getAddressAttribute($value)

    {
        return ucwords($value);
    }


     public function getAddress1Attribute($value)

    {
        return ucwords($value);
    }

     public function getStudentNameAttribute($value)

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
    	return $this->belongsTo(City::Class);
    }

    public function ccity()
    {
      return $this->belongsTo(City::Class, 'ccity_id');
     }

     public function states()
    {
    	return $this->belongsTo(State::Class,'state_id');
    }


     public function sstates()
    {
      return $this->belongsTo(State::Class,'cstate_id');
    }

     public function courses()
    {
    	return $this->belongsTo(Course::Class,'course_id');
    }


    public function created_courses()
    {
        return $this->belongsTo(Course::Class,'created_course_id');
    }
    
      public function asessions()
    {
      return $this->belongsTo(Asession::Class,'created_asession_id');
    }

     public function stopages()
    {
        return $this->belongsTo(Stopage::Class,'stopage_id');
    }

      public function studentacadmic()
    {
        return $this->hasOne(StudentAcadmic::Class);
    }

      public function tutionfeecollections()
    {
        return $this->hasMany(TutionFeeCollection::Class,'student_id');
    }

      public function transportfeecollections()
    {
        return $this->hasMany(TransportFeeCollection::Class,'student_id');
    }

    public function registraionfeecollections()
    {
        return $this->hasMany(RegistraionFeeCollection::Class,'student_id');
    }


    public function char_certis()
    {
        return $this->hasOne(CharCer::class);
    }

    public function tc_certis()
    {
        return $this->hasOne(TCCer::class);
    }

    

    public static function groupbyyear()
    {

         return static::selectRaw('count(id) as student_count')                        ->groupBy('year_of_admission')
                             ->orderBy('year_of_admission')
                             ->get()->toArray();
    }

    public static function groupbyyearmale()
    {
       return static::selectRaw('count(id) as male_count, year_of_admission')
                      ->groupBy('year_of_admission')
                     ->orderBy('year_of_admission')
                      ->where('gender', '=', 2)
                     ->get();
    }

    public static function groupbyyearfemale()
    {
      return static::selectRaw('count(id) as female_count, year_of_admission')
                     ->groupBy('year_of_admission')
                     ->orderBy('year_of_admission')
                     ->where('gender', '=', 1)->get();
    }

    public static function groupbyyearsearchcours()
    {

       return static::selectRaw('count(id) as student_count')
                                    ->groupBy('year_of_admission')
                             ->orderBy('year_of_admission');

    }

    public static function yearname()
    {
      return static::selectRaw('year_of_admission as year_count')
                     ->orderBy('year_of_admission')
                     ->groupBy('year_of_admission');

    }



    public static function groupbycourse()
    {
        return static::selectRaw('count(id) as student_count')
                                       ->groupBy('course_id')
                                        ->orderBy('course_id')
                                        ->get()->toArray();
    }

    public static function groupbycoursesearchyear()
    {
           return static::selectRaw('count(id) as student_count')
                                        ->groupBy('course_id')
                                        ->orderBy('course_id');
    }


    public static function groupbycoursemale()
    {
      return static::selectRaw('count(id) as male_count')
                     ->groupBy('course_id')
                     ->orderBy('course_id')
                     ->where('gender', '=', 2)
                     ->get()->toArray();
    }

    public static function groupbycoursefemale()
    {
      return static::selectRaw('count(id) as female_count')
                     ->groupBy('course_id')
                     ->orderBy('course_id')
                     ->where('gender', '=', 1)
                     ->get()->toArray();
    }

    public static function groupbycoursesearchyearmale()
    {
       return static::selectRaw('count(id) as male_count')
                     ->groupBy('course_id')
                     ->orderBy('course_id')
                     ->where('gender', '=', 2);
    }

    public static function groupbycoursesearchyearfemale()
    {
        return static::selectRaw('count(id) as female_count')
                     ->groupBy('course_id')
                     ->orderBy('course_id')
                     ->where('gender', '=', 1);
    }

    public static function groupbyyearesearchcoursemale()
    {

                return static::selectRaw('count(id) as male_count')
                     ->groupBy('year_of_admission')
                     ->orderBy('year_of_admission')
                     ->where('gender', '=', 2);
    }


    public static function groupbyyearesearchcoursefemale()
    {
          return static::selectRaw('count(id) as female_count')
                     ->groupBy('year_of_admission')
                     ->orderBy('year_of_admission')
                      ->where('gender', '=', 1);
    }

}
