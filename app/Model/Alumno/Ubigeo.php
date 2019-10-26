<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idubigeo
 * @property string $distrito
 * @property string $provincia
 * @property string $direccion
 * @property string $departamento
 * @property string $procedencia
 * @property Persona[] $personas
 */
class Ubigeo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ubigeo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idubigeo';

    /**
     * @var array
     */
    protected $fillable = ['distrito', 'provincia', 'direccion', 'departamento', 'procedencia'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Model\Alumno\Persona', 'idubigeo', 'idubigeo');
    }
}
