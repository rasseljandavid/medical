<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Patient;

class Test extends Model
{
	protected $guarded = ['id', 'report_id'];
    

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
