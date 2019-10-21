<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
    	'namee','namem','email','phone','address','education','city','accepted_year','dob','gender','batch_id','p1','p1_phone','p1_relationship','p2','p2_phone','p2_relationship','because'
    ];

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }
}
