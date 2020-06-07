<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    public $table = 'testimonios';
    public $fillable = ['calificacion','contenido','fecha'];
    public $primaryKey = 'id_testimonio';
    public $keyType = 'string';
}
