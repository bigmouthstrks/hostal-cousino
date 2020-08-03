<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';
    protected $keyType = 'string';
    protected $fillable = ['fecha_llegada','fecha_salida','cantidad_adultos','cantidad_niños','imagen','id_usuario'];
    protected $guarded = ['id_reserva','id_usuario'];
    public $timestamps = true;

    public function usuario(){
        return $this->belongsTo('App\Usuario','id_usuario');
    }

    public function habitacion(){
        return $this->belongsToMany('App\Habitacion','id_habitacion');
    }
}
