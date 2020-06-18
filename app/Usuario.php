<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticable
{
    use Notifiable;
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    public $keyType = 'string';

    public function reserva(){
        return $this->hasMany('App\Reserva','id_usuario');
    }
}
