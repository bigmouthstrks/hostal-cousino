<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = 'check-in';
    protected $fillable = ['cant_noches','fecha_llegada','hora_llegada'];
    protected $primaryKey = 'id_check_in';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = 'id_check_in';
}
