<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    public $table = 'habitaciones';
    public $fillable = ['tipo','estado','cant_camas','precio_noche','numero'];
    public $primaryKey = 'id_habitacion';
    public $keyType = 'string';
    public $timestamps = false;
}
