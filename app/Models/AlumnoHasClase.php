<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoHasClase extends Model
{
    protected $table="alumno_has_clase";
    //protected $primaryKey="";
    public $timestamps = false;

    protected $fillable = ['alumno_idalumno','clase_idclase'];
}
