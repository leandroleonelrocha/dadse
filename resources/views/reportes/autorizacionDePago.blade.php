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

        .mt-60{
            margin-top: 60px;
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

        h1{
            font-size: 18px !important;
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
            <h4 class="font21 text-center" style="margin-top:20px;">AUTORIZACIÓN DE PAGO  # </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="w50 inline-block">

            </div>

            <div class="mt-20"></div>

            <b class="upper">A :  DIRECCIÓN GENERAL DE ADMINISTRACIÓN</b>
            <b class="upper">De :  DIRECCIÓN DE AYUDA DIRECTA POR SITUACIONES ESPECIALES</b>

            <p>Se comunica a Uds. que por Resolución y Expediente de la referencia, ha sido aprobado a esa Empresa:</p>
            <table class="table table-striped table-hover mt-20">
                <tr>
                    <th class="upper text-center">Ref.</th>
                    <th class="upper text-center">Beneficiario : </th>
                    <th class="upper text-center">Documento : </th>
                    <th class="upper text-center">Subsidio N° : </th>
                    <th class="upper text-center">Expediente N° : </th>
                    <th class="upper text-center">Tipo de Subsidio : </th>
                </tr>

                <tr>
                    <td class="upper text-center"></td>
                    <td class="upper text-center">{{$factura->Caso->PersonasFisicas->fullname}}</td>
                    <td class="upper text-center">{{$factura->Caso->PersonasFisicas->documento}}</td>
                    <td class="upper text-center"></td>
                    <td class="upper text-center"></td>
                    <td class="upper text-center"></td>
                </tr>
             
            </table>

            <div class="col-xs-12">

                <b>
                  Dando cumplimiento al Artículo 3° del N° de Resolución 1079/2017 de fecha 02/02/2017, considerando la documentación presentada y obrante en el expediente de referencia a fojas, se autoriza la liquidación de la factura del proveedor que se detalla, conforme a presupuesto.
                </b>
            </div>



            <div class="col-xs-4">
                <b>
                    Remito en Foja N°: {{$factura->Autorizacion->remito_foja}}
                </b>
            </div>

            <div class="col-xs-4">
                <b>
                    Factura en Foja N°: {{$factura->Autorizacion->factura_foja}}
                </b>
            </div>

            <div class="col-xs-4">
                <b>
                    Troqueles en foja N°: {{$factura->Autorizacion->troqueles_foja}}
                </b>
            </div>


            <h1 class="text-right mt-20">Autorización de pago N°  {{$factura->Autorizacion->id}} </h1>

            <div class="border">
                <div class="p10">
                    **proveedor
                    <br>
                    <b>Razon Social: <span class="upper">{{ $factura->Proveedores->razon_social }}</span></b><br>
                    <b>Domicilio: <span class="upper">{{$factura->Proveedores->direccion}}</span></b><br>
                    <b>Provincia: <span class="upper">{{$factura->Proveedores->provincia}}</span></b><br>
                    <b>Teléfono: <span class="upper">{{$factura->Proveedores->tel}}</span></b><br>
                    <b>Mail: <span class="upper">@foreach($factura->Proveedores->Email as $email) {{$email->descripcion}};  @endforeach</span></b><br>
                </div>

                <table class="table table-striped table-hover mt-20">
                    <tr>
                        <th class="upper text-center" colspan="3">Páguese a la orden de</th>
                        <th class="upper text-center">Forma de pago</th>
                    </tr>
                    <tr>
                        <th class="upper text-left" colspan="3"><b>{{$factura->Proveedores->razon_social}}</b></th>
                        <th class="upper text-left"><b>{{config('custom.forma_pago.'.$factura->forma_pago) }}</b></th>
                    </tr>

                </table>

                <table class="table table-striped table-hover mt-20">
                    <tr>
                        <th class="upper text-center">Factura N°</th>
                        <th class="upper text-center">Fecha de recepción</th>
                        <th class="upper text-center">Fecha de factura</th>
                        <th class="upper text-center">Importe de factura</th>
                    </tr>
                    <tr>
                        <th class="upper text-left">{{$factura->nro_factura}}</th>
                        <th class="upper text-left">{{$factura->fecha}}</th>
                        <th class="upper text-left">{{$factura->fecha}}</th>
                        <th class="upper text-left">$ {{$factura->FacturasItems->sum('precio_unitario')}}</th>
                    </tr>

                </table>

                <table class="table table-striped table-hover mt-20">
                    <tr>
                        <th class="upper text-left" colspan="4">Son {{$factura->monto_letra}}</th>
                    </tr>
                </table>
            </div>

            <p class="text-center">Realizado el pago conforme a los lineamientos que se detallan, continua trámite</p>

            <div class="inline-block text-right mt-60">

                <p>
                    Firma autorizada y Sello <br>
                    Por Dirección de Asistencia Directa por <br>
                    Situaciones Especiales <br>
                    Fecha {!! date('d/m/Y',time()) !!}
                </p>

            </div>
        </div>
    </div>
</div>

</body>
</html>
