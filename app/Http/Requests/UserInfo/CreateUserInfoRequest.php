<?php

namespace App\Http\Requests\UserInfo;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserInfoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'foto' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:255',
            'condicion_fiscal' => 'required|string|max:255',
            'cuit' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
        ];
    }
}
