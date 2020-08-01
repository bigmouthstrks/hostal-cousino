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
        return [
            'tipo_habitacion' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'tipo_habitacion.required' => 'Debe ingresar una fecha de llegada.',
        ];
    }
}
