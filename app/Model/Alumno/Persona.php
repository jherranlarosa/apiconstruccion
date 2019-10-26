<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idpersona
 * @property int $idubigeo
 * @property string $dni
 * @property string $nombre
 * @property string $apaterno
 * @property string $sexo
 * @property string $amaterno
 * @property int $edad
 * @property string $gradoinstruccion
 * @property string $telefono
 * @property string $celular
 * @property string $foto
 * @property string $correoelectronico
 * @property string $fechanacimiento
 * @property string $direccion
 * @property string $numeroemergencia
 * @property Ubigeo $ubigeo
 * @property Alumno[] $alumnos
 * @property Trabajador[] $trabajadors
 */
class Persona extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'persona';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idpersona';

    /**
     * @var array
     */
    protected $fillable = ['idubigeo', 'dni', 'nombre', 'apaterno', 'sexo', 'amaterno', 'edad', 'gradoinstruccion', 'telefono', 'celular', 'foto', 'correoelectronico', 'fechanacimiento', 'direccion', 'numeroemergencia'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubigeo()
    {
        return $this->belongsTo('App\Model\Alumno\Ubigeo', 'idubigeo', 'idubigeo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->hasMany('App\Model\Alumno\Alumno', 'idpersona', 'idpersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trabajadors()
    {
        return $this->hasMany('App\Model\Alumno\Trabajador', 'idpersona', 'idpersona');
    }
}
