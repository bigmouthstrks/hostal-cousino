<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonioRequest extends FormRequest
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
            'id_testimonio' => 'required',
            'calificacion'  => ['max:5','min:1','size:1','required'],
            'comentario'    => ['required','min:30','max:200'],
        ];
    }

    public function messages()
    {
        return [
            'calificacion.required' => 'Debe ingresar una calificación para valorar su experiencia.',
            'calificacion.max'      => 'La calificación debe ser un valor máximo de 5.',
            'calificacion.min'      => 'La calificación mínima es un 1.',
            'comentario.required'   => 'Debe ingresar algún comentario respecto a su experiencia.',
            'comentario.min'        => 'El comentario debe tener un mínimo de 30 caracteres.',
            'comentario.max'        => 'El comentario puede tener como máximo 200 caracteres.'
        ];
    }
}
