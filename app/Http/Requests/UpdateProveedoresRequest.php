<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProveedoresRequest extends Request
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
            'nombre' => 'required|string',
            'razon_social' => 'string|required',
            'cuit' => 'numeric|required',
            'telefono' => 'numeric',
            'mail' => 'email|required',
            'contacto' => 'string'
        ];
    }
}
