<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePhoneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'new_phone' => ['required','digits_between:9,12']
        ];
    }

    public function messages()
    {
        return [
            'new_phone.required' => 'El nuevo número de teléfono es requerido.',
            'new_phone.digits_between' => 'El nuevo número de teléfono debe tener entre :min y :max digitos.'
        ];
    }
}
