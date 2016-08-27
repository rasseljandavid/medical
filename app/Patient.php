<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = ['id'];

    public function reports()
    {
    	return $this->hasMany(Report::class);
    }
}