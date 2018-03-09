<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateInformeRequest extends Request
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
            'hospitales_id' 	 => 'required',
            'tipo_matricula' 	 => 'required',
            'matricula'          => 'required|numeric',
            'tipo_diagnostico'   => 'required',
            'diagnostico'        => 'required',
            'observaciones'      => 'required'
        ];
    }


    public function messages()
    {
        return [
            'fecha.required'            => 'Seleccione un médico tratante.',
            'tipo_matricula.required'   => 'Seleccione un tipo de matrícula.',
            'tipo_matricula.numerico'   => 'El número de matrícula es requerido.',
            
            'matricula.required'        => 'El número de matrícula es requerido.',  
            'tipo_diagnostico.required' => 'El tipo de diagnóstico es requerido.',
            'diagnostico.required'      => 'El diagnóstico es requerido.',
            'observaciones.required'    => 'Escriba una observación.', 

           
        ];
    }
}
