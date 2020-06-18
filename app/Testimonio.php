<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $table = 'testimonios';
    protected $fillable = ['calificacion','contenido','fecha'];
    protected $primaryKey = 'id_testimonio';
    protected $keyType = 'string';
    public $timestamps = false;
}
