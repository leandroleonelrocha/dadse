<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;
class CreateProveedoresRequest extends Request
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
            'razon_social' => 'required',
            'cuit' => 'required|unique:proveedores,cuit',
            'proveedores_tipos_id' => 'required',
            'tel' => 'required',
            'mail' => 'required',
            'contacto' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'provincia' => 'required',
            'contacto' => 'required',
            'cp' => 'required'
        ];
    }
}
