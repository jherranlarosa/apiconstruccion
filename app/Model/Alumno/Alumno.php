<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idalumno
 * @property int $idpersona
 * @property int $idtipoalumno
 * @property string $numerocarnet
 * @property Persona $persona
 * @property Tipoalumno $tipoalumno
 * @property Matricula[] $matriculas
 */
class Alumno extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'alumno';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idalumno';

    /**
     * @var array
     */
    protected $fillable = ['idpersona', 'idtipoalumno', 'numerocarnet'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Model\Alumno\Persona', 'idpersona', 'idpersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoalumno()
    {
        return $this->belongsTo('App\Model\Alumno\Tipoalumno', 'idtipoalumno', 'idtipoalumno');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany('App\Model\Alumno\Matricula', 'idalumno', 'idalumno');
    }
}
