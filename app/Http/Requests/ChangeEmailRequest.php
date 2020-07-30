<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'new_email' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'new_email.required' => 'El nuevo correo electrónico es requerido.'
        ];
    }
}
