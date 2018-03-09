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
            <h4 class="font21 text-center" style="margin-top:20px;">AUTORIZACION DE ADELANTO</h4>
            <p class="text-right">Buenos Aires, {!! date('d-m-Y',time()) !!} </p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="border p10">

                <p>Sres. <b class="upper">{{$adelanto->Presupuestos->Proveedores->nombre}}</b></p>

                <p>Ubicación : <b>{{$adelanto->Presupuestos->Proveedores->direccion}}, {{$adelanto->Presupuestos->Proveedores->ciudad}}, {{$adelanto->Presupuestos->Proveedores->provincia}}, {{$adelanto->Presupuestos->Proveedores->cp}}</b></p>
                <p>Teléfono : <b>{{$adelanto->Presupuestos->Proveedores->tel}}</b></p>

                <p>Emails:  @foreach($adelanto->Presupuestos->Proveedores->Email as $mail)


                        <b>  {{$mail->descripcion}}</b> ;
                           @endforeach
                 </p>
            </div>

            <table class="table table-striped table-hover mt-10">
                <tr>
                    <th>REF.:</th>
                    <th>Titular:</th>
                    <td class="upper">{{$prestacion->Casos->PersonasFisicas->fullname}}</td>
                    <th>Doc.</th>
                    <td>{{$prestacion->Casos->PersonasFisicas->tipo_documento}} {{$prestacion->Casos->PersonasFisicas->documento}}</td>
                </tr>
                <tr>
                    <th></th>
                    <th>Teléfono/s</th>
                    <td colspan="3">{{$prestacion->Casos->PersonasFisicas->telefono_particular}} /  {{$prestacion->Casos->PersonasFisicas->telefono_movil}}</td>
                </tr>
                <tr>
                    <th></th>
                    <th>Subsidio N</th>
                    <td>{{$prestacion->Casos->id}}</td>
                    <th>N de Memo</th>
                    <td>{{$adelanto->id}}</td>
                </tr>
                <tr>
                    <th></th>
                    <th>Presupuesto N</th>
                    <td>{{$adelanto->Presupuestos->id}}</td>
                    <th>De fecha</th>
                    <td>{{$adelanto->Presupuestos->fecha_solicitud}}</td>
                </tr>
            </table>


            <table class="table table-striped table-hover">
                <tr>
                    <th class="upper text-center">Presupuesto del Producto</th>
                    <th class="upper text-center">Prestación/Dosis</th>
                    <th class="upper text-center">Cantidad</th>
                    <th class="upper text-center">Valor Presupuestado</th>
                </tr>
                <tr>
                    <th class="upper text-center"> {{$prestacion->descripcion}}</th>
                    <th class="upper text-center"> ...</th>
                    <th class="upper text-center"> {{$prestacion->cantidad}} {{$prestacion->unidad_medida}}</th>
                    <th class="upper text-center"> $  {{$adelanto->Presupuestos->total}}</th>
                </tr>
            </table>


            <table class="table table-striped table-hover">
                <tr>
                    <th colspan="3" class="upper text-center">adelanto autorizado</th>
                </tr>
                <tr>
                    <th class="upper text-center">Cantidad</th>
                    <th class="upper text-center">Producto</th>
                    <th class="upper text-center">Prestación/Dosis</th>
                </tr>
                <tr>
                    <td class="upper text-center"> {{$adelanto->cantidad}} {{$prestacion->unidad_medida}}</td>
                    <td class="upper text-center"> {{$prestacion->descripcion}}</td>
                    <td class="upper text-center"> ...</td>
                </tr>
            </table>

            <p class="little">
                De nuestra Consideración: <br>
                La Direccióon de Asistencia Directa por Situaciones Especiales del Ministerio de Desarrollo Social de la Nación, respecto del presupuesto de referencia cotizado por Uds oportunamente, a solicitud de
                <br>
                <b class="upper">{{$prestacion->Informe->Medicos->apellido}}, {{$prestacion->Informe->Medicos->nombre}} </b>
                <br>
                dada la urgencia del caso que nos compete, solicita la entrega en forma anticipada, a cuenta y cargo de este Ministerio de
            </p>

            <table class="table table-striped table-hover">
                <tr>
                    <th class="upper text-center">{{$adelanto->cantidad}} {{$prestacion->unidad_medida}}</th>
                    <th class="upper text-center">{{$prestacion->descripcion}}</th>
                    <th class="upper text-center">...</th>
                </tr>
            </table>

            <p class="little">
                que deberá ser recibida por la persona que se detalla
            </p>

            <table class="table table-striped table-hover">
                <tr>
                    <th class="upper text-center">Sr/a</th>
                    <th class="upper text-center">{{$prestacion->Casos->PersonasFisicas->fullname}}</th>
                    <th class="upper text-center">Doc.</th>
                    <th class="upper text-center">{{$prestacion->Casos->PersonasFisicas->tipo_documento}} {{$prestacion->Casos->PersonasFisicas->documento}}</th>
                </tr>
            </table>

            <p class="little">
                quedando registrado en esta Dirección el mencionado adelanto. <br>
                Se hace mención que esta solicitud fue consultada oportunamente por nuestra área de presupuestos y confirmada por Uds.
                <br>
                De no recibir negativa por parte de Uds. en forma fehaciente <b>(Mail, Fax, Nota)</b> dentro de las <b>24 hs</b>, asumimos la aceptación de lo solicitado.
                <br>
                Ante inconvenientes de cumplimentar lo solicitado, es importante se nos comunique a la brevedad al Teléfono <b>4121-4609/4623</b>, Fax <b>4121-4603</b><br>
                Dirección de Correo Electrónico <b>dadse_presupuestos@desarrollosocial.gob.ar</b>
            </p>

            <div class="cierre">
                <div>
                    <p class="mt-20">Atentamente</p>
                </div>

                <div>
                    <p class="mt-20">Direccion de Asistencia Directa Por Situaciones Especiales</p>
                    <p>Ministerio de Desarrollo Social de la Nación</p>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
