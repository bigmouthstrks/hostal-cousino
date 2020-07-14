<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $table = 'testimonios';
    protected $fillable = ['calificacion','comentario','id_usuario'];
    protected $primaryKey = 'id_testimonio';
    protected $keyType = 'string';
    public $timestamps = true;
    protected $guarded = 'id_testimonio';

    public function usuario(){
        return $this->belongsTo('App\Usuario','id_usuario');
    }
}
