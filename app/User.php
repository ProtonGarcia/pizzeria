<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'record',
        'email',
        
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =strtolower($value);
    }

    public function getNameAttribute($value)
    {
       return ucwords($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] =strtolower($value);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    /* 
    protected $hidden = [
        'password', 'remember_token',
    ];
    */
}
