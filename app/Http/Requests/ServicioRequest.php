<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_servicio' => 'required',
            'precio_servicio' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre_servicio.required' => 'El campo Nombre servicio es obligatorio.',
            'precio_servicio.required' => 'El campo Precio servicio es obligatorio.'
        ];
    }
}
