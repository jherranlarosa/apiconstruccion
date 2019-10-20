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
 * @property Sale[] $sales
 */
class MasterStatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'master_status';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Sale', 'masterStatusId');
    }
}
