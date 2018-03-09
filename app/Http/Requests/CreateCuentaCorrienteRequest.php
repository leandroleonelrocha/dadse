<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCuentaCorrienteRequest extends Request
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
            //'dia_fin_mes'             => 'required|numeric',
            'valor'                   => 'required|numeric' 
          
        ];
    }


    public function messages()
    {
        return [
           // 'dia_fin_mes.required' => 'Seleccione una fecha.',
            'valor.required' => 'Seleccione un valor.',
            //'dia_fin_mes.numeric'=> 'El número de fecha es numérico.',
            'valor.numeric'=>  'El  valor es numérico.',

        ];
    }
}

