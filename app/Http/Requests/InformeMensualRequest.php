<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformeMensualRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mes_informe' => 'required',
            'año_informe' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'mes_informe.required' => 'El campo Mes es obligatorio',
            'año_informe.required' => 'El campo Año es obligatorio',
        ];
    }
}
