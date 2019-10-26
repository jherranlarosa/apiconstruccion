<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idtipoalumno
 * @property int $idciclo
 * @property string $descripcion
 * @property int $iddescripcion
 * @property Ciclo $ciclo
 * @property Alumno[] $alumnos
 */
class TipoAlumno extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipoalumno';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtipoalumno';

    /**
     * @var array
     */
    protected $fillable = ['idciclo', 'descripcion', 'iddescripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo()
    {
        return $this->belongsTo('App\Model\Alumno\Ciclo', 'idciclo', 'idciclo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->hasMany('App\Model\Alumno\Alumno', 'idtipoalumno', 'idtipoalumno');
    }
}
