<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterReservanteRequest extends FormRequest
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
        ];
    }

    public function messages(){
        return[
            'nombre.required'                 => 'Debe ingresar su nombre.',
            'apellido_paterno.required'       => 'Debe ingresar su apellido paterno.',
            'email.required'                  => 'Debe ingresar un email.',
            'email.unique'                    => 'Este email ya se encuentra registrado.',
        ];
    }
}
