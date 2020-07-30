<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloEditRequest extends FormRequest
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
            'nombre_articulo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_articulo.required' => 'El nombre del artículo es obligatorio.',
        ];
    }
}
