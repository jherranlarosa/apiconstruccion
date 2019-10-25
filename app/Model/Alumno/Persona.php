<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idpersona
 * @property string $dni
 * @property string $nombre
 * @property string $apaterno
 * @property string $sexo
 * @property string $amaterno
 * @property int $idubigeo
 * @property int $edad
 * @property string $gradoinstruccion
 * @property string $telefono
 * @property string $celular
 * @property string $foto
 * @property string $correoelectronico
 * @property string $fechanacimiento
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
    protected $fillable = ['dni', 'nombre', 'apaterno', 'sexo', 'amaterno', 'idubigeo', 'edad', 'gradoinstruccion', 'telefono', 'celular', 'foto', 'correoelectronico', 'fechanacimiento'];

}
