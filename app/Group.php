<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
    	'name','batch_id'
    ];

    public function students()
    {
        return $this->belongsToMany('App\Student')
        			->withPivot('leader', 'coleader', 'member')
    				->withTimestamps();
    }

    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }

    // public function students()
    // {
    //     return $this->belongsToMany('App\Student');
    // }

    public function mentors()
    {
        return $this->belongsToMany('App\Mentor')
                    ->withTimestamps();
    }

}
