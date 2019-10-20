<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $moduleId
 * @property int $rolId
 * @property string $description
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property UserModule $userModule
 * @property UserRol $userRol
 */
class UserModuleRol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_module_rol';

    /**
     * @var array
     */
    protected $fillable = ['moduleId', 'rolId', 'description', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userModule()
    {
        return $this->belongsTo('App\Model\UserModule', 'moduleId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userRol()
    {
        return $this->belongsTo('App\Model\UserRol', 'rolId');
    }
}
