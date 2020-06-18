<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habitacion extends Model
{
    use SoftDeletes;
    protected $table = 'habitaciones';
    protected $fillable = ['tipo','estado','cant_camas','precio_noche','numero','imagen'];
    protected $primaryKey = 'id_habitacion';
    protected $keyType = 'string';
    public $timestamps = true;
    protected $guarded = ['id_habitacion'];

    public function reserva(){
        $this->hasMany('App\Reserva','id_reserva');
    }
}
