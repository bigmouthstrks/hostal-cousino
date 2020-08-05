<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|exists:usuarios,email',
            'password' => 'required',
        ];
    }

    public function messages(){
        return[
            'email.required' => 'Debe ingresar su email.',
            'email.exists' => 'El correo ingresado no está registrado.',
            'password.required' => 'Debe ingresar la contraseña.',
        ];
    }
}
