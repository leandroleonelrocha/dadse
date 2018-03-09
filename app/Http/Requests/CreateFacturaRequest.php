<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateFacturaRequest extends Request
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
            'fecha' 			=> 'required',
            'nro_factura' 		=> 'required|numeric|unique:facturas,nro_factura',
            'total_facturado'   => 'required|numeric'
        ];
    }


    public function messages()
    {
        return [
            'fecha.required' => 'Seleccione una fecha.',
            'nro_factura.required' => 'El nro factura es requerido.',
            'nro_factura.numeric'=> 'El número de factura es numérico.',  
            'total_facturado.required'=> 'El total es requerido.',
            'total_facturado.numeric'=>  'El total facturado es numérico.', 

            'nro_factura.numeric'=> 'El numero de factura es numérico.', 
            'nro_factura.unique'=> 'El número de factura ya está en uso.' 
           
        ];
    }
}
