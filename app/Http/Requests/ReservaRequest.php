<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha_llegada'     => ['required'],
            'fecha_salida'      => ['required'],
            'cantidad_adultos'  => ['required'],
            'cantidad_niños'    => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'fecha_llegada.required'     => 'Debe ingresar una fecha de llegada.',
            'fecha_salida.required'      => 'Debe ingresar una fecha de salida.',
            'cantidad_adultos.required'  => 'Debe ingresar una cantidad de adultos.',
            'cantidad_niños.required'    => 'Debe ingresar una cantidad de niños.',
        ];
    }
}
