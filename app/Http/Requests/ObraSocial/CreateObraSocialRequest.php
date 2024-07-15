<?php

namespace App\Http\Requests\ObraSocial;

use Illuminate\Foundation\Http\FormRequest;

class CreateObraSocialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'string'],
        ];
    }
}
