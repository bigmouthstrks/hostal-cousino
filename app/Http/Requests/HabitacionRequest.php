<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'estado'          => ['required'],
            'cant_camas'      => ['required','min:1','max:5'],
            'tipo'            => ['required'],
            'precio_noche'    => ['required'],
            'numero'          => ['required','min:1','max:999','unique:habitaciones,numero'],
        ];
    }

    public function messages()
    {
        return [
            'estado.required'                    => 'Debe ingresar el estado inicial de la habitación.',
            'cant_camas.required'                => 'Debe ingresar cantidad de camas para la habitación.',
            'cant_camas.min'                     => 'La cantidad mínima de camas es de 1 por habitación.',
            'cant_camas.max'                     => 'La cantidad máxima de camas es de 5 por habitación.',
            'tipo.required'                      => 'Debe ingresar un tipo de habitación.',
            'precio_noche.required'              => 'Debe ingresar un valor para cada noche en la habitación.',
            'numero.required'                    => 'Debe ingresar un número para la habitación.',
            'numero.unique'                      => 'Este número de habitación ya está en uso.',
            'numero.min'                         => 'El número de habitación debe ser mayor a 1.',
            'numero.max'                         => 'El número de habitación debe ser menor a 999.',
        ];
    }
}
