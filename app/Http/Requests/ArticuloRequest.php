<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_articulo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_articulo.required',
        ];
    }
}
