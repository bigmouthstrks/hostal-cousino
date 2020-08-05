<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Articulo extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id_articulo';
    protected $fillable = ['nombre_articulo'];
    public $timestamps = true;
    protected $keyType = 'string';
    protected $guarded = 'id_articulo';

    public function habitaciones()
    {
        return $this->belongsToMany('App\Habitacion');
    }


}
