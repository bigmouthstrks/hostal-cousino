<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $fecha_actual = date('Y-m-d');

        return [
            'fecha_llegada' => ['required','date', "after: $fecha_actual"],
            'fecha_salida' => ['required','date','after:fecha_llegada']
        ];
    }

    public function messages()
    {
        return [
            'fecha_llegada.required' => 'Debe ingresar la fecha de llegada.',
            'fecha_llegada.date' => 'Debe ingresar la fecha de llegada en formato (AAAA-MM-DD).',
            'fecha_salida.required' => 'Debe ingresar la fecha de salida.',
            'fecha_salida.date' => 'Debe ingresar la fecha de salida en formato (AAAA-MM-DD).',
            'fecha_salida.after' => 'La fecha de salida debe ser posterior a la de llegada.',
            'fecha_llegada.after' => 'La fecha de llegada debe ser posterior a la fecha actual'
        ];
    }
}
