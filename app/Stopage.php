<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stopage extends Model
{
    protected $fillable = [
        'name','bus_id','remarks'
    ];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
    

    public function transportFee()
    {
        return $this->hasOne(TransportFee::class);
    }

     public function buses()
    {
        return $this->belongsTo(BusDetail::class,'bus_id');
    }

}
