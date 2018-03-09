<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        *{
            padding:0;
            margin: 0;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            font-size: 11px;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
        }

        html, body {
            min-height: 100%;
        }

        body {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
            margin: 15px !important;
            padding: 15px !important;
        }

        body {
            margin: 0;
            margin-top: 20px;
        }

        html {
            font-size: 10px;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }


        .img-responsive{
            width: 100%;
        }

        .font21{
            font-size: 18px;
        }

        .col-xs-12{
            width: 100%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-6{
            width: 50%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-10{
            width: 66.66%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-4{
            width: 25%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-3{
            width: 33.33%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-8{
            width: 75%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-offset-1{
            margin-left: 8.33%;
        }

        .col-xs-offset-2{
            margin-left:  17%;
        }

        .text-center{
            text-align: center;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }


        /*Tablas*/
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }

        table {
            background-color: transparent;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        .table>thead:first-child>tr:first-child>th {
            border-top: 0;
        }

        .table>thead>tr>th {
            border-bottom: 2px solid #f4f4f4;
        }

        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
            border-top: 1px solid #f4f4f4;
        }

        .table>thead>tr>th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
        }

        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

        th {
            text-align: left;
        }

        td, th {
            padding: 0;
        }

        .table-striped>thead>tr:nth-child(2) {
            background-color: #f9f9f9;
        }

        .colorWhite{
            color: white;
        }

        .bg-blue{
            background-color: #3498db;
        }

        .blue{
            color: #3498db;
        }

        #logo{
            /*width:150px;*/
        }

        .center-vertical{
            margin-top: 50px;
            height:50px;

        }

        .center-block{
            margin: auto;
        }

        .mb-40n{
            margin-bottom: -40px;
        }

        .mb-20{
            margin-bottom: 20px;
        }

        .mt-20{
            margin-top: 20px;
        }

        .mt-10{
            margin-top: 10px;
        }

        .ml-80{
            margin-left: 80px;
        }

        .pull-right{
            float: right;
        }

        .text-danger{
            color: #a94442;
        }

        .border{
            border: 1px solid #ddd;
        }

        .footer{
            width: 110px;
            margin-top:-21px;
            padding:5px;
            float:right;
        }


        .upper{
            text-transform: uppercase;
        }

        .text-right{
            text-align: right;
        }

        .p10{
            padding:10px;
        }

        .little,.little *{
            font-size: 60%;
        }

        .cierre>div{
            width:50%;
            display: inline-block;
            vertical-align: top;
        }

    </style>

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 mb-20">
            <div class="col-xs-12 text-center mb-40n">
                <img src="http://www.desarrollosocial.gob.ar/wp-content/themes/responsive/core/images/logo-ministerio-desarrollo-4.png" alt="Logo" class="center-block" id="logo">
            </div>
            <br>
            <p class="mt-20 ml-80">Direccion de Asistencia Directa por Situaciones Especiales</p>
            <h4 class="font21 text-center" style="margin-top:20px;">EVALUACIÓN SOCIAL</h4>
            <p class="text-right">Buenos Aires, {{ $model->EvaluacionSocial->created_at }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="border p10">
                <p>Señor Director de la Dirección de Asistencia Directa por Situaciones Especiales,</p>
                <p>Dr. Pablo Atchabahían:</p>
                <br>
                <p>En mi carácter de Trabajador Social, de la Dirección de Asistencia Directa por Situaciones Especiales, del Ministerio de Desarrollo Social de la Nación, con Matrícula. <b>{{$model->EvaluacionSocial->matricula}}</b>, procedo a evaluar la solicitud del/la prescripto/a.</p>
                <br>
                <p>Mi tarea profesional consiste en emitir una valoración profesional sobre la pertinencia de cobertura de lo solicitado por el Titular de Derecho ante esta Dirección, en el marco de la Resolución 2458/04.
                 </p>
            </div>

            <div class="border p10">
                <p> <b>Nombre y Apellido del Titular:</b> {{$model->Casos->PersonasFisicas->fullname}} </p>
                <p> <b>Lic. en Trabajo Social Interviniente:</b> {{$model->EvaluacionSocial->lic_trabajo_social_interviniente}}</p>
                <p> <b>Se archiva en esta Dirección:</b> 
                @if($model->EvaluacionSocial->direccion == true)
                Si, bajo número {{ $model->EvaluacionSocial->direccion_numero ? $model->EvaluacionSocial->direccion_numero : '' }}
                @else
                No
                @endif
                </p>
                <p> <b>Institución (Municipio/SS Hospital, CDR):</b> 
                {{ $model->EvaluacionSocial->institucion ? config('custom.instituciones.'.$model->EvaluacionSocial->institucion) : '' }} </p>
                <br>
                <p> <b>Posee obra social:</b>
                @if($model->EvaluacionSocial->posee_obra_social == true)
                    Si (cuál) - {{ $model->EvaluacionSocial->obra_social ? $model->EvaluacionSocial->obra_social : '' }}
                @else
                    No 
                @endif
                </p>
                <p> <b>Registra Afiliación en Incluir Salud:</b>
                @if($model->EvaluacionSocial->registra_afiliacion_salud == true)
                    Si
                @else
                 No
                @endif
                </p>
                <p> <b>Cobertura provincial (apross, Iapos, Ioma, etc):</b>
                @if($model->EvaluacionSocial->cobertura_provincial == true)
                    Si
                @else
                    No
                @endif 
                </p>
                <p> <b>Certificación negativa de ANSES:</b>
                @if($model->EvaluacionSocial->certificacion_negativa == true)
                    Si
                @else
                    No
                @endif
                </p>
                <p> <b>Observación (Ej. Sólo registra iniciación de Prestación Previsional):</b> {{ $model->EvaluacionSocial->observaciones}}</p>

                <br>

                <p> <b>Negativa Municipal del insumo:</b>
                @if($model->EvaluacionSocial->negativa_municipal == true)
                    Si
                @else
                    No
                @endif
                </p>
                <p> <b>Negativa Provincial del insumo:</b>
                @if($model->EvaluacionSocial->negativa_provincial == true)
                    Si
                @else
                    No
                @endif    
                </p>
                <p> <b>Coparticipación Provincial:</b>  {{$model->EvaluacionSocial->coparticipacion_provincial}} </p>

                <br>

                <p> <b>Otra negativa en caso de corresponder (Banco Nacional de Drogas Oncológicas, etc.):</b> {{$model->EvaluacionSocial->otra_negativa}} </p>

                <br>

                <strong>Aproximación Diagnóstico</strong>
                <p>{{$model->EvaluacionSocial->consideraciones}}</p>

                <br>

                <strong>Conclusión</strong>
                <p> {{$model->EvaluacionSocial->valoracion_profesional}}</p>


                <p><b>Realizada la evaluación social, y frente a la falta/dificultad de respuesta integral desde otras dependencias estatales, quedando el Titular de Derecho y su grupo familiar en situación de vulnerabilidad social, se da curso favorable desde esta Dirección, a la solicitud, a los fines de garantizar el derecho a la salud.</b></p>


            </div>

        </div>
    </div>
     <div class="row">
        <div class="col-xs-12">
            <div class="border p10">
                <p> <b>Evaluación social realizada por:</b> {{$model->EvaluacionSocial->lic_trabajo_social_interviniente}} </p>
                <p> <b>Matrícula:</b> {{$model->EvaluacionSocial->matricula}} </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
