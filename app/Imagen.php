<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['nombre_imagen','ruta'];
    protected $primaryKey = 'id_imagen';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = ['id_imagen'];
}
