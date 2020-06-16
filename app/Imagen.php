<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public $table = 'imagenes';
    protected $fillable = ['nombre_imagen','ruta'];
    public $primaryKey = 'id_imagen';
    public $keyType = 'string';
    public $timestamps = false;
}
