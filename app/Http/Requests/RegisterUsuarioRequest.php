<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUsuarioRequest extends FormRequest
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
            'nombre'                => 'required',
            'apellido'              => 'required',
            'email'                 => 'required|unique:usuarios,email',
            'password'              => ['required','confirmed'],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages(){
        return[
            'nombre.required'                 => 'Debe ingresar su nombre.',
            'apellido.required'               => 'Debe ingresar su apellido.',
            'email.required'                  => 'Debe ingresar un email.',
            'email.unique'                    => 'Este email ya se encuentra registrado.',
            'password.required'               => 'Debe ingresar la contraseña.',
            'password.confirmed'              => 'Las contraseñas deben coincidir.',
            'password_confirmation.required'  => 'Debe confirmar la contraseña.',
        ];
    }
}
