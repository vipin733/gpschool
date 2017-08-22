<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharCer extends Model
{
    protected $fillable = [
        'year_10','year_12','grade_10','grade_12'
    ];

    public function students()
    {
    	return $this->belongsTo(Student::Class,'student_id');
    }
}
