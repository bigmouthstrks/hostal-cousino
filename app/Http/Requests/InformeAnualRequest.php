<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformeAnualRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
