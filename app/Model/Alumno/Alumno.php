<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idalumno
 * @property int $idpersona
 * @property int $idtipoalumno
 * @property string $numerocarnet
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

}
