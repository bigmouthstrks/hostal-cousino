<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => ['required'],
            'password' => ['required','min:5','max:15'],
            'direccion' => ['required','min:5'],
            'pais' => ['required','min:3'],
            'ciudad' => ['required','min:3']
        ];
    }

    public function messages(){
        return[
            'email.required' => 'El campo e-mail es requerido.',
            'password.required' => 'El campo contraseña es requerido.',
            'direccion.required' => 'El campo dirección es requerido.',
            'pais.required' => 'El campo país es requerido.',
            'ciudad.required' => 'El campo ciudad es requerido.',
            'password.min' => 'El largo mínimo del campo contraseña es de 5 carácteres.',
            'password.max' => 'El largo máximo del campo contraseña es de 15 carácteres.',
            'direccion.min' => 'El largo mínimo del campo dirección es de 5 carácteres.',
            'pais.min' => 'El largo mínimo del campo país es de 3 carácteres.',
            'ciudad.min' => 'El largo mínimo del campo ciudad es de 3 carácteres.',
        ];
    }
}
