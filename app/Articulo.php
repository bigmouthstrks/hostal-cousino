<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id_articulo';
    protected $fillable = ['nombre_articulo'];
    public $timestamps = false;
    protected $keyType = 'string';
    protected $guarded = 'id_articulo';
}
