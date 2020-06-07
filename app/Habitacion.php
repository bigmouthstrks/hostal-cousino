<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    public $table = 'habitaciones';
    public $fillable = ['tipo','estado','cant_camas','precio_noche'];
    public $primaryKey = 'id_habitacion';
    public $keyType = 'string';
}
