<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table="alumno";
    protected $primaryKey="idalumno";    
    public $timestamps = false;

    protected $fillable = ['lead_idlead','nombre','telefono','correo','notas','facebook','usuario_idusuario'];
}