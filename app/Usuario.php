<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticable
{
    use Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $keyType = 'string';
    protected $guarded = 'id_usuario';

    public function reserva(){
        return $this->hasMany('App\Reserva','id_usuario');
    }

    public function testimonio(){
        return $this->hasMany('App\Testimonio');
    }
}
