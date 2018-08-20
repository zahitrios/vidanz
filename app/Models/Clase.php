<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table="clase";
    protected $primaryKey="idclase";    
    public $timestamps = false;

    protected $fillable = ['nombreClase'];
}
