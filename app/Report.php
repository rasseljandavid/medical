<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
   	protected $guarded = ['id','patient_id'];

    public function tests()
    {
    	return $this->hasMany(Test::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}