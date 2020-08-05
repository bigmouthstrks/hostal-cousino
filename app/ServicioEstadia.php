<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioEstadia extends Model
{
    protected $table = 'servicio_estadia';
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = ['fecha_servicio','hora_servicio','cantidad'];

}
