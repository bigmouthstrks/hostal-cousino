<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ruta_imagen' => ['required','unique'],
            'id_imagen' => ['required','unique'],
            'habitacion_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ruta_imagen.required' => 'El campo Imágen es obligatorio.',
            'ruta_imagen.unique' => 'La imágen seleccionada ya existe.',
            'id_imagen.required' => 'El campo Id Imagen es requerido',
            'id_imagen.unique' => 'El Id Imagen ingresado ya existe.',
            'habitacion_id.required' => 'El campo Id Habitación es obligatorio.'
        ];
    }
}
