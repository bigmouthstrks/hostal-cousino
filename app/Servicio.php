<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';
    protected $fillable = ['nombre_servicio', 'precio_servicio'];
    public $timestamps = false;
    protected $keyType = 'string';
    protected $guarded = 'id_servicio';
}
