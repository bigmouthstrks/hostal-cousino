<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['ruta_imagen'];
    protected $primaryKey = 'id_imagen';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = ['id_imagen'];

    public function habitacion(){
        return $this->belongsTo('App\Habitacion','habitacion_id');
    }
}
