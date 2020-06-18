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
            'tipo'            => ['required'],
            'precio_noche'    => ['required',/*'min:15000'*/],
            'tamaño'          => ['required'],
            'numero'          => ['required','min:1','max:999','unique:habitaciones,numero'],
            'imagen'          => ['required'],
            /*
            'imagen_1'        => ['required'],
            'imagen_2'        => ['required'],
            'imagen_3'        => ['required'],
            'imagen_4'        => ['required'],
            */
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
            /*
            'precio_noche.min'                   => 'El precio por noche debe ser mayor o igual a $15.000.',
            */
            'numero.required'                    => 'Debe ingresar un número para la habitación.',
            'numero.unique'                      => 'Este número de habitación ya está en uso.',
            'numero.min'                         => 'El número de habitación debe ser mayor a 1.',
            'numero.max'                         => 'El número de habitación debe ser menor a 999.',
            'imagen.required'                    => 'Debe ingresar una imagen para la habitación',
            /*
            'imagen_1.required'                  => 'Debe subir una primera imágen.',
            'imagen_2.required'                  => 'Debe subir una segunda imágen.',
            'imagen_3.required'                  => 'Debe subir una tercera imágen.',
            'imagen_4.required'                  => 'Debe subir una cuarta imágen.',
            */
        ];
    }
}
