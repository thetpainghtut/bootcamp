<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
    	'name','outline','fees','during','duration'
    ];

    public function batches()
    {
    	return $this->hasMany('App\Batch');   
    }
}
