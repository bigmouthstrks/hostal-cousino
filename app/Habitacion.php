<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habitacion extends Model
{
    use SoftDeletes;
    public $table = 'habitaciones';
    public $fillable = ['tipo','estado','cant_camas','precio_noche','numero','imagen'];
    public $primaryKey = 'id_habitacion';
    public $keyType = 'string';
    public $timestamps = false;
}
