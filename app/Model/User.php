<?php

namespace App\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable implements MustVerifyEmail
    {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'rolId','password','documentIdentification','userName','token'
    ];
    
    
    public function userModuleRols()
    {
        return $this->hasMany('App\Model\UserModuleRol', 'rolId');
    }
    
}
