<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateItemsRequest extends Request
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
            'cantidad' 			=> 'required|numeric',
            'detalle' 			=> 'required',
            'precio_unitario'   => 'required|numeric'
           
        ];
    }


    public function messages()
    {
        return [
            'cantidad.required' 		=> 'La cantidad es requerida.',
            'cantidad.numeric'          => 'La cantidad es requerida.',
            'detalle.required'			=> 'El detalle es requerido.',  
            'precio_unitario.required'	=> 'Escriba un precio.', 
            'precio_unitario.numeric'   =>  'El precio unitario es numérico.'
           
           
        ];
    }
}
