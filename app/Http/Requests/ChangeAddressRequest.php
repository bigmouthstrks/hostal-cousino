<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'new_address' => ['required','min:5'],
            'new_country' => ['required','min:3'],
            'new_city' => ['required','min:3']
        ];
    }

    public function messages(){
        return[
            'new_address.required' => 'La nueva dirección es requerida.',
            'new_country.required' => 'El nuevo país es requerido',
            'new_city.required' => 'La nueva ciudad es requerida.',
            'new_address.min' => 'El largo mínimo del campo dirección es de 5 carácteres.',
            'new_country.min' => 'El largo mínimo del campo país es de 3 carácteres.',
            'new_city.min' => 'El largo mínimo del campo ciudad es de 3 carácteres.',
        ];
    }
}
