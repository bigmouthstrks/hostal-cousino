<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nombre'                => 'required',
            'apellido_paterno'      => 'required',
            'email'                 => 'required|unique:usuarios,email',
            'password'              => ['required','confirmed','min:5'],
            'password_confirmation' => 'required',
        ];
    }

    public function messages(){
        return[
            'nombre.required'                 => 'Debe ingresar su nombre.',
            'apellido_paterno.required'       => 'Debe ingresar su apellido_paterno.',
            'email.required'                  => 'Debe ingresar un email.',
            'email.unique'                    => 'Este email ya se encuentra registrado.',
            'password.required'               => 'Debe ingresar la contraseña.',
            'password.min'                    => 'La contraseña debe tener :min carácteres como mínimo.',
            'password.confirmed'              => 'Las contraseñas deben coincidir.',
            'password_confirmation.required'  => 'Debe confirmar la contraseña.',
        ];
    }
}
