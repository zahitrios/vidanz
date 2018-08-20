<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table="lead";
    protected $primaryKey="idlead";    
    public $timestamps = false;

    protected $fillable = ['nombre','telefono','correo','notas','facebook','usuario_idusuario'];
}
