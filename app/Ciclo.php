<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idciclo
 * @property string $nomciclo
 * @property Tipoalumno[] $tipoalumnos
 */
class Ciclo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ciclo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idciclo';

    /**
     * @var array
     */
    protected $fillable = ['nomciclo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoalumnos()
    {
        return $this->hasMany('App\Model\Alumno\Tipoalumno', 'idciclo', 'idciclo');
    }
}
