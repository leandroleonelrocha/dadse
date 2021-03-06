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

        .w50{
            width: 50%;
        }

        .inline-block{
            display: inline-block !important;
            vertical-align: top;
        }

        .clearfix{
            clear: both;
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
            <p class="text-center">Buenos Aires, {!! date('d-m-Y',time()) !!} </p>
            <h4 class="font21 text-center" style="margin-top:20px;">NOTIFICACION N ...</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="w50 inline-block">

                <div class="p10">
                    <p>Sres. <b class="upper">{{$prestacion->PresupuestoAdjudicado->Proveedores->nombre}}</b></p>
                    <p>Ubicación : <b>{{$prestacion->PresupuestoAdjudicado->Proveedores->direccion}}, {{$prestacion->PresupuestoAdjudicado->Proveedores->cp}}</b></p>
                    <p>{{$prestacion->PresupuestoAdjudicado->Proveedores->ciudad}}, {{$prestacion->PresupuestoAdjudicado->Proveedores->provincia}}</p>
                    <p>TEL: <b>{{$prestacion->PresupuestoAdjudicado->Proveedores->tel}}</b></p>
                    <p>Mails:  @foreach($prestacion->PresupuestoAdjudicado->Proveedores->Email as $mail)
                            <b>  {{$mail->descripcion}}</b> ;
                        @endforeach</p>
                </div>
            </div>
            <div class="w50 inline-block">

                <div class="border p10">
                    <p class="text-center">Referencia</p>
                    <hr>
                    <p>Expediente N: <b>..</b></p>
                    <p>Resolución N: <b>..</b></p>
                    <p>Subsidio N: <b>..</b></p>
                </div>
            </div>
            <div class="mt-20"></div>

            <b class="upper">De nuestra consideración</b>
            <p>Se comunica a Uds. que por Resolución y Expediente de la referencia, ha sido aprobado a esa Empresa:</p>

            <table class="table table-striped table-hover">
                <tr>
                    <th class="upper text-center" rowspan="2">PRESUPUESTO N</th>
                    <th class="upper text-center" rowspan="2"><b>{{$prestacion->PresupuestoAdjudicado->id}}</b></th>
                    <th class="upper text-center">De fecha: {{$prestacion->PresupuestoAdjudicado->fecha_solicitud}} por la suma de $ {{$prestacion->PresupuestoAdjudicado->total}}</th>
                    <th class="upper text-center"> PESOS {{$total ? : ''}}</th>
                   
                </tr>

            </table>


            <table class="table table-striped table-hover">
                <tr>
                    <th colspan="3" class="upper text-center">Destinado, de acuerdo a detalle, a la provicion de</th>
                </tr>
                <tr>
                    <th class="upper text-center">Producto Cotizado</th>
                    <th class="upper text-center">Importe Adjudicado</th>
                    <th class="upper text-center">Ciclos</th>
                </tr>

                <tr>
                    <td class="upper text-center"> {{$prestacion->descripcion}}</td>
                    <td class="upper text-center"> $ {{$prestacion->PresupuestoAdjudicado->total}}</td>
                    <td class="upper text-center"> ---------</td>
                </tr>

            </table>

            <p>
                Debiendo realizarse la entrega a:
            </p>

            <table class="table table-striped table-hover">
                <tr>
                    <th class="upper text-center">Titular</th>
                    <th class="upper text-center">N Documento</th>
                    <th class="upper text-center">Teléfono</th>
                </tr>
                <tr>
                    <td class="upper text-center">{{$prestacion->Casos->PersonasFisicas->fullname}}</td>
                    <td class="upper text-center">{{$prestacion->Casos->PersonasFisicas->tipo_documento}} {{$prestacion->Casos->PersonasFisicas->documento}}</td>
                    <td class="upper text-center">{{$prestacion->Casos->PersonasFisicas->telefono_particular}} /  {{$prestacion->Casos->PersonasFisicas->telefono_movil}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center"><b>Mandatario</b></td>
                </tr>
            </table>

            <p class="little">
                Determinnandose como lugar de Entrega o Entregar a <br>
                PAC TEL: 112620779/1165628628 <br>
                Con quien deberán comunicarse a fin de acordar la entrega de lo presupuestado, para la atención del titular del subsidio de referencia.
            </p>

            <p class="little text-center"><b>Procedimientos para la presentación de la factura correspondiente</b></p>
            <div class="little mb-20">
                <ol>
                    <li>Una vez aprobado el subsidio se extenderá la "Orden de Compra"correspondiente remitiendo copia via Fax o E-mail al proveedor, en donde constara datos personales del titular y mandatario, nomina de los elementos autorizados, y lugar donde deberá realizarse la entrega del material o medicación o la prestación que se indica, debiendo dar el Proveedor conformidad de la recepción de la misma.</li>
                    <li>Recibida la conformidad de la recepción de la Orden de Compra por parte del Proveedor, esta Dirección dará conocimiento al titular para que tomen contacto con el Proveedor.</li>
                    <li>
                        La comunicación del titular con el Proveedor implica que ambas partes han sido debidamente notificados, excepto inconvenientes en sus medios de comunicación, lo cual implica dar preferencial por parte del Proveedor a la atención del titular, evitando generar ningún tipo de incertidumbre respecto de la prestación a realizar, que afecte a esta Dirección y/o al titular.
                    </li>
                    <li>
                        Las dificultades que pudieren surgir como consecuencia de imponderables sin solución por parte del Proveedor, deberá ser comunicado a esa Dirección en forma inmediata mediante Fax, E-Mail o persoonalmente en forma escrita, a efector de tomar los recaudos necesarios.
                    </li>
                    <li>
                        La factura y el protocolo quirúrgico en el cual consten los STICKERS de material, en caso de que corresponda, deberán ser entrefados en esta Dirección en los días y horarios prefijados y que constan al pie de la presente.
                    </li>
                    <li>
                        Solo será válida la entrega afectuada al titular o mandatario designado en el expediente.
                    </li>
                </ol>
            </div>

                
            <div class="inline-block w50">
                <p>Atención a proveedores <br>
                    Avda. de Mayo 869 8 Piso <br>
                    Ciudad Autónoma de Buenos Aires <br>
                    Días Lunes a Viernes <br>
                    Horario de 10 a 17 Hs.</p>

            </div>
            <div class="inline-block w50">

                <p>Sin otro particular, saludamos a Uds. muy atentamente <br>
                    Dirección de Asistencia Directa Por Situaciones Especiales</p>

            </div>
        </div>
    </div>
</div>

</body>
</html>
