<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
    {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'rolId','password','documentIdentification','userName'
    ];
    
    
    public function userModuleRols()
    {
        return $this->hasMany('App\Model\UserModuleRol', 'rolId');
    }
    
}
