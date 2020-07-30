<?php

namespace App\Rules;

use DateTime;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class RuleAñoInforme implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $fecha_primera_reserva = DB::table('reservas')->min('created_at');
        $fecha = new DateTime($fecha_primera_reserva);
        $año_primera_reserva = intval($fecha->format('Y'));
        $año_actual = intval(date('Y'));

        return $value >= $año_primera_reserva && $value <= $año_actual;
    }

    public function message()
    {
        return 'No es un año válido.';
    }
}
