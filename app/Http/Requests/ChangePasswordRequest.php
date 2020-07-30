<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => 'required',
            'new_password' => ['required','confirmed','min:5'],
            'new_password_confirmation' => 'required',
        ];
    }

    public function messages(){
        return[
            'new_password.min' => 'El largo mínimo de la Nueva contraseña es de 5 carácteres.',
            'new_password.confirmed' => 'Las contraseñas deben coincidir.',
            'new_password.required' => 'Debe ingresar la nueva contraseña para continuar.',
            'new_password_confirmation.required' => 'Debe confirmar la contraseña para continuar.',
            'current_password.required' => 'Debe ingresar su contraseña actual para continuar.',
        ];
    }
}
