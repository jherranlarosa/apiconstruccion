<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property UserModuleRol[] $userModuleRols
 * @property User[] $users
 */
class UserRol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_rol';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userModuleRols()
    {
        return $this->hasMany('App\UserModuleRol', 'rolId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'rolId');
    }
}
