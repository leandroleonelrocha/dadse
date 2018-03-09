<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class CreateEvaluacionSocialRequest extends Request
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
            'informe_social' 						=> 'required',
            'lic_trabajo_social_interviniente' 		=> 'required',
            'matricula'                             => 'required|numeric',
            
            'direccion'  							=> 'required',

            //'direccion_numero'						=> 'required',
            'institucion' 							=> 'required',
            'posee_obra_social'						=> 'required',
            //'obra_social'							=> 'required',
            'registra_afiliacion_salud'				=> 'required',
            'cobertura_provincial'					=> 'required',
            'certificacion_negativa'				=> 'required',
            //'observaciones'							=> 'required',
            'negativa_municipal'					=> 'required',
            //'negativa_provincial'					=> 'required',
            //'coparticipacion_provincial'			=> 'required',
            //'otra_negativa'							=> 'required',
            //'consideraciones'						=> 'required',
            //'valoracion_profesional'				=> 'required'
        ];
    }


    public function messages()
    {
        return [
            'informe_social.required' 						=> 'Informe social requerido.',
            'lic_trabajo_social_interviniente.required' 	=> 'Escriba el trabajador/a social interviniente',
            'matricula.required'                            => 'Ingrese una matrícula',
            'matricula.numeric'                             => 'La matrícula es numérica',
            'direccion.required'   							=> 'La direccion requerido',
            //'direccion_numero.required'						=> 'required',
            'institucion.required' 							=> 'El campo institución es requerido',
            'posee_obra_social.required'					=> 'El campo obra social es requerido',
            //'obra_social.required'							=> 'required',
            'registra_afiliacion_salud.required'			=> 'El campo registra afiliación es requerido',
            'cobertura_provincial.required'					=> 'El campo cobertura provincial es requerido',
            'certificacion_negativa.required'				=> 'El campo certificación negativa es requerido',
            //'observaciones.required'						=> 'required',
            'negativa_municipal.required'					=> 'El campo negativa municipal es requerido',
            //'negativa_provincial.required'					=> 'required',
            //'coparticipacion_provincial.required'			=> 'required',
            //'otra_negativa.required'						=> 'required',
            //'consideraciones.required'						=> 'required',
            //'valoracion_profesional.required'				=> 'required'
        
           
        ];
    }
}
