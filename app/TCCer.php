<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TCCer extends Model
{
    protected $fillable = [
        'failed','subjects','lclass','lschool','promotion','paid','concession','ncc','struck_date','couse','meeting','no_days','conduct','remarks','reg_no_9_to_12'
    ];

    public function students()
    {
    	return $this->belongsTo(Student::Class,'student_id');
    }

    public function getSubjectsAttribute($value)

    {
        return mb_strtoupper($value);
    }

    public function getCouseAttribute($value)

    {
        return mb_strtoupper($value);
    }

    public function getRemarksAttribute($value)

    {
        return mb_strtoupper($value);
    }
}
