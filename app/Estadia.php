<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadia extends Model
{
    protected $table = 'estadias';
    protected $primaryKey = 'id_estadia';
    public $timestamps = false;
    protected $keyType = 'string';
    protected $guarded = 'id_estadia';
}
