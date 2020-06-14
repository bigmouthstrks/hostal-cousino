<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacionRequest extends FormRequest
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
            'estado'          => ['required'],
            'cant_camas'      => ['required','min:1','max:5'],
            'precio_noche'    => ['required','min:10000','max:100000'],
            'numero'          => ['required','min:1','max:999'],
        ];
    }

    public function messages()
    {
        return [
            'estado.required'                    => 'Debe ingresar el estado inicial de la habitación.',
            'cant_camas.required'                => 'Debe ingresar cantidad de camas para la habitación.',
            'cant_camas.min'                     => 'La cantidad mínima de camas es de 1 por habitación.',
            'cant_camas.max'                     => 'La cantidad máxima de camas es de 5 por habitación.',
            'precio_noche.required'              => 'Debe ingresar un valor para cada noche en la habitación.',
            'precio_noche.min'                   => 'El precio mínimo para una habitación es de $10.000',
            'precio_noche.max'                   => 'El precio máximo para una habitación es de $100.000',
            'numero.required'                    => 'Debe ingresar un número para la habitación.',
        ];
    }
}
