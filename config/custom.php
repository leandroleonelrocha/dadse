<?php

return [
        
    'tipo_matriculas' =>
        [
            ''  => 'Seleccionar',
            '1' => 'Nacional',
            '2' => 'Provincial',
        ],

    'presupuestos_estados' =>
        [
            '1' => 'Solicitado',
            '2' => 'Presupuestado',
            '3' => 'Rechazado',
            '4' => 'Adjudicado',
            '5' => 'No adjudicado',
            '6' => 'Expirado',
            '7' => 'Pendiente',
            '8' => 'Pendiente de Envio',
            '9' => 'Enviado al Proveedor',
        ],

    'presupuestos_caracter' =>
        [
            '1' => 'Urgente',
            '0' => 'Ordinario',
        ],

    'movimientos' =>
    [
        '1' => 'Creado',
        '2' => 'Editado',
        '3' => 'Finalizado',
        '4' => 'Anulado',
    ],
   
    'prestaciones_estados' =>
        [
            '1' => 'Ingresada',
            '2' => 'Alto Costo : En espera de Informe Medico',
            '3' => 'Prestacion Rechazada',
            '4' => 'Ingresada por Ayuda Directa',
            '5' => 'Ingresada por Alto Costo',
            '6' => 'Prestacion Alto Costo => Medicos',
            '7' => 'Finalizado en Ayuda Directa',
            '8' => 'Por Presupuestar de Forma Ordinaria',
            '9' => 'Por Presupuestar de Forma Urgente',
            '10' => 'Presupuesto Urgente Solicitado',
            '11' => 'Presupuesto Ordinario Solicitado',
            '12' => 'Presupuesto Adjudicado',
            '13' => 'Evaluación social ingresada',
            '14' => 'Prestación Cancelada'

        ],

    'prestaciones_productos_estados' =>
        [
            '1' => 'Por Presupuestar',
            '2' => 'Presupuestado',
        ],

    'tipo_entidad' =>
        [
            '' => 'Selecionar perfil',
            'medico' => 'Medico',
            'admision' => 'Admision',
            'proveedor' => 'Proveedor',
        ],

    'protesis_categorias' =>
        [
            '1' => 'Ortopedia',
            '2' => 'Dental',
            '3' => 'Implante'
            
        ],

     'instituciones' =>
        [
            '1' => 'Municipio',
            '2' => 'SS Hospital',
            '3' => 'CDR',
            '4' => 'DADSE'
        ],

        'tipo_diagnostico' =>
        [
            '1' => 'Tipo diagnostico 1',
            '2' => 'Tipo diagnostico 2',
            '3' => 'Tipo diagnostico 3'
        ],

        'protesis' => 
        [
            ''  => 'Seleccionar',
            '1' => 'Activo',
            '2' => 'Inactivo'

        ],

        'forma_pago' => [

            '1' =>  'Transferencia',

        ],

        'sexo' => [
            ''  => '',
            '1' => 'Femenino',
            '2' => 'Masculino',
            '3' => 'Travesti',
            '4' => 'Transexual',
            '5' => 'Transgénero',
            '6' => 'Intersex',
            '7' => 'Mujer Trans',
            '8' => 'Hombre Trans',
            '98' => 'Otro'
        ],   

        'estado_civil' => [
            ''  => '',
            '1' => 'Soltero/a',
            '2' => 'Casado/a',
            '3' => 'Unido/a de hecho',
            '4' => 'Viudo/a',
            '5' => 'Unión convivencial',
            '6' => 'Separado/a',
            '7' => 'Divorciado/a'
        ],

        'nacionalidad' => [
            ''  => '',
            '1' => 'Argentina',
            '2' => 'Bolivia',
            '3' => 'Brasil',
            '4' => 'Chile',
            '5' => 'Colombia',
            '6' => 'Ecuador',
            '7' => 'Paraguay',
            '8' => 'Perú',
            '9' => 'Uruguay',
            '10' => 'Venezuela',
            '11' => 'España',
            '12' => 'Italia',
            '13' => 'Corea',
            '14' => 'China',
            '98' => 'Otro',
            '99' => 'Ns/Nc'
                  
        ],


        'tipo_documento' => [
            ''   => '',
            '1'  => 'DNI',
            '2'  => 'Doc. Extranjero',
            '3'  => 'Doc. Precaria',
            '4'  => 'Doc. Transitorio',
            '5'  => 'Doc. en Trámite',
            '97' => 'Nunca tuvo',
            '98' => 'Otros',
            '99' => 'Ns/Nc'

        ],



]


?>