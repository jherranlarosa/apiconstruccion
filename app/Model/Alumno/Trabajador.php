<?php

namespace App\Model\Alumno;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idtrabajador
 * @property int $idpersona
 * @property string $tipotrabajador
 * @property int $permisoasistencia
 * @property float $montohora
 * @property Persona $persona
 * @property Usuario[] $usuarios
 */
class Trabajador extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'trabajador';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtrabajador';

    /**
     * @var array
     */
    protected $fillable = ['idpersona', 'tipotrabajador', 'permisoasistencia', 'montohora'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Model\Alumno\Persona', 'idpersona', 'idpersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Model\Alumno\Usuario', 'idtrabajador', 'idtrabajador');
    }
}
