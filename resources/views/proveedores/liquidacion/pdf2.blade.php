<!doctype html>
<html lang="en">

<head>
    <title>PDF</title>

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
            font-family: Helvetica,Arial,sans-serif;
            font-weight: 400;
            overflow-x: hidden;
            overflow-y: auto;
            width: 100%;
            margin: auto;

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
        }


        html {
            font-size: 10px;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }


        .img-responsive{
            width: 100%;
        }


        .row {
            margin-right: 20px;
            margin-left: 20px;
        }


        /*Tablas*/
        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        table {
            background-color: transparent;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            border: 1px solid #ddd;
            margin: 10px 0;
        }


        table.no-border {
            border-spacing: 0;
            border-collapse: collapse;
            border: none;
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
            margin-top:5px !important;
        }

        .no-border>tbody>tr>td, .no-border>tbody>tr>th, .no-border>tfoot>tr>td, .no-border>tfoot>tr>th, .no-border>thead>tr>td, .no-border>thead>tr>th{
            border: none !important;
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
            width:auto;
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


        .text-danger{
            color: #a94442;
        }


        .mt100{
            margin-top: 100px;
        }

        .logo{
            font-size: 25pt;
            line-height: 110px;

        }


        .lh100{
            margin-top: 40px;
        }

        .fs15{
            font-size: 15pt;
        }

        .fs20
        {
            font-size: 20pt;
        }

        .bold{
            font-weight: bold;
        }

        .upper{
            text-transform: uppercase;
        }

        .ml20{
            margin-left: 20px;
        }

        .separador{
            width:100%;
            height:1px;
            /*background: #9a9c9a;*/
            margin: 10px 0;
        }

        .border{
            padding-top: 5px !important;
            padding-bottom: 5px !important;
        }

        .border-bottom{
            border-bottom: 1px solid rgb(190, 190, 190);

        }

        .bloque1{
            width:100%;
        }

        .col-xs-12 {
            width: 100%;
        }
        .col-xs-11 {
            width: 91.66666667%;
        }
        .col-xs-10 {
            width: 83.33333333%;
        }
        .col-xs-9 {
            width: 75%;
        }
        .col-xs-8 {
            width: 66.66666667%;
        }
        .col-xs-7 {
            width: 58.33333333%;
        }
        .col-xs-6 {
            width: 50%;
        }
        .col-xs-5 {
            width: 41.66666667%;
        }
        .col-xs-4 {
            width: 33.33333333%;
        }
        .col-xs-3 {
            width: 25%;
        }
        .col-xs-2 {
            width: 16.66666667%;
        }
        .col-xs-1 {
            width: 8.33333333%;
        }

        .text-center{
            text-align: center;
        }

        hr{
            margin-top: 10px !important;
            margin-bottom: 10px !important;;
        }

        .ml20{
            margin-left: 20px !important;
        }

        .mb-20{
            margin-bottom: 20px !important;
            margin-top: 20px !important;
        }

        .mb-10{
            margin-bottom:10px;
        }

        .cierre{
            position:absolute;
            bottom: 30px;
            margin-right: 20px;
            margin-left: 20px;
            border:1px solid #ddd;
        }

        .fecha span{
            border: 1px solid #bcbcbc;
            color: #4f4f4f;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            width: 40px;
            height: 40px;
            display:inline-block;
            vertical-align: middle;
            font-size: 15px;
            line-height: 40px;
            text-align:center;
            margin:0 3px;
        }

        .mt-40{
            margin-top: 40px;
        }



    </style>

</head>

<body>


    <div class="row">
        <table class="bloque1 no-border" style="text-align:center">
            <tr>

                <td class="col-xs-4">
                    <img src="http://www.desarrollosocial.gob.ar/wp-content/themes/responsive/core/images/logo-ministerio-desarrollo-4.png" alt="Logo" class="center-block" style="margin-top:30px">
                    <div style="padding:5px;margin-top:50px;border:1px solid black;">
                        <p><b class="upper"> Liquidación MDS N°: </b> 00000000001</p>
                        <p><b class="upper"> Fecha liquidación: </b> 03/08/2017</p>
                    </div>
                </td>

                <td class="col-xs-5">
                    <div style="{!! !isset($model->anexo) ? 'margin-left:200px' : '' !!};margin-top:20px;">
                        <p>Buenos Aires,{!! date('d',time()) !!} de Agosto de {!! date('Y',time()) !!}</p>
                    </div>
                    <div style="margin-top:10px;margin-right:10px;margin-left:10px;margin-bottom:0;{!! !isset($model->anexo) ? 'margin-left:200px' : '' !!};padding:5px;border:1px solid black;">
                        <p>Proveedor</p>
                        <p class="upper bold">{{$model->Proveedores->razon_social}}</p>
                        <p>{{$model->Proveedores->direccion}}</p>
                    </div>

                    <div style="margin-top:0px;margin-right:10px;margin-bottom:10px;{!! !isset($model->anexo) ? 'margin-left:200px' : '' !!};padding:5px;border:1px solid black;">

                        <p><b class="upper"> Liquidación N°: </b> 00000000001</p>
                        <p><b class="upper"> Fecha liquidación: </b> 03/08/2017</p>
                    </div>
                </td>

                @if(isset($model->anexo))
                <td class="col-xs-2">
                    <div>
                        <span class="upper">Anexo I</span>
                    </div>
                </td>
                @endif
            </tr>
        </table>
    </div>


<div class="row">

    <table class="bloque1 no-border ml20 mb-20">
        <tr>
            <td class="col-xs-12">
                <p class="text-center">Facturación correspondiente al periodo <b>{{$model->Facturas->first()->fecha }}</b> al <b>{{$model->Facturas->last()->fecha }}</b></p>
            </td>
            <td class="col-xs-12">
                <h1>Liquidación N° <b>{{$model->nro_liquidacion_interna}}</b></h1>
            </td>
        </tr>
    </table>
</div>


<div class="row">

    <table class="table table-striped col-xs-12">
        <tr bgcolor="#d3d3d3">
            <th>
                Autorización N°
            </th>
            <th>
               Subsidio
            </th>
            <th>
                Beneficiario
            </th>
            <th>
                Documento
            </th>
            <th>
                Fecha de Entrega
            </th>
            <th>
                Remito
            </th>
            <th>
                Fecha Fact.
            </th>
            <th>
                Mon.
            </th>
            <th>
                Importe
            </th>
        </tr>


        @foreach($model->Facturas as $factura)
            @foreach($factura->FacturasItems as $items)
            <tr>
                <td>{{$factura->fecha}}</td>
                <td>{{$factura->Caso->id}}</td>
                <td class="upper">{{$factura->Caso->PersonasFisicas->fullname}} <br>
                    {{-- $casosRepo->getMandatariosFromApi($factura->Caso->id)->solicitante --}}

                </td>
                <td>{{$factura->Caso->PersonasFisicas->documento}}</td>
                <td>{{$factura->nro_factura}}</td>
                <td>$</td>
                <td>{{number_format($items->precio_unitario,2)}}</td>

            </tr>
            @endforeach
        @endforeach
        <tfoot>
            <tr bgcolor="#d3d3d3">
                <td colspan="4"></td>
                <td colspan="3" style="text-align: right;">IMPORTE TOTAL A LIQUIDAR</td>
                <td >$</td>
                <td > {{ $importe_total}}</td>

            </tr>
        </tfoot>
    </table>


</div>

<div class="row">

    <table class="table table-striped col-xs-12">
        <tr>
            <td colspan="9">
                <p class="upper bold">Son ${{  $importe_total }} {{ $importe_total_texto }}</p>
            </td>
        </tr>
    </table>

</div>

<div class="row">

    <table class="table no-border col-xs-12">
        <tr>
            <td colspan="9" class="col-xs-7">
            </td>
            <td class="text-center">
                Liquidación autorizada por
            </td>
        </tr>
        <tr>
            <td colspan="9" class="col-xs-7"></td>
            <td>
                Dirección de Asistencia Directa por Situaciones Especiales
            </td>
        </tr>
    </table>

</div>

</body>
</html>
