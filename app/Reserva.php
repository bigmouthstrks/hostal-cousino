<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;
    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';
    protected $keyType = 'string';
    protected $fillable = ['inicio','termino','id_usuario'];
    protected $guarded = ['id_reserva','usuario_id'];
    public $timestamps = true;

    public function usuario(){
        return $this->belongsTo('App\Usuario','usuario_id');
    }

    public function habitacion(){
        return $this->belongsToMany('App\Habitacion','habitacion_id');
    }
}
