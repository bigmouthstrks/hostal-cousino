<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensajeRequest extends FormRequest
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
            'nombre' => ['required'],
            'mensaje' => ['required','min:20','max:200'],
            'correo' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'  => 'Debe ingresar su nombre.',
            'mensaje.required' => 'Debe ingresar un mensaje.',
            'mensaje.min'      => 'El largo mínimo del mensaje es de 20 carácteres.',
            'correo.required'  => 'Debe ingresar un correo electrónico.',
        ];
    }
}
