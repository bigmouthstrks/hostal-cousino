<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ruta_imagen' => 'required',
            'id_imagen' => 'required',
            'habitacion_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ruta_imagen.required' => 'El campo Imagen es obligatorio',
            'id_imagen.required' => 'El campo Id Imagen es obligatorio',
            'habitacion_id.required' => 'El campo Id Habitacion es obligatorio'
        ];
    }
}
