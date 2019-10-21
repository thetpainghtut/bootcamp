<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Mentor extends Authenticatable
{
    use HasRoles;
    //
    protected $guard_name = 'mentor';

    protected $fillable = [
    	'name','email','password','phoneno','profile','status'
    ];

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }
}
