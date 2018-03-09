<!doctype html>
<html lang="en">

<head>
    <title>Voucher</title>

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
            width:150px;
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

<div class="row mt-40">
    <table class="bloque1 no-border">
        <tr>
            <td class="col-xs-8">
                <span class="fs20 bold ">Caso #{!! $caso->id !!}</span>

            </td>

            <td class="col-xs-4 fecha">
                <div class="pull-right">
                    <span>{!! date('d',strtotime($caso->created_at)) !!}</span><span>{!! date('m',strtotime($caso->created_at)) !!}</span><span>{!! date('Y',strtotime($caso->created_at)) !!}</span>
                    <span>
                
                    {{ $caso->getFechaActual()}}
                    </span>
                   
                </div>

            </td>
        </tr>
    </table>
</div>

<div class="separador"></div>

<div class="row">

    <table class="bloque1 no-border ml20 mb-20">
        <tr>
            <td class="col-xs-4">
                <p><span class="upper"><b>Nombre y Apellido: </b></span> <span class="upper">{!! $caso->PersonasFisicas->fullname !!}</span></p>
            </td>
            <td class="col-xs-4">
                <p><span class="upper"><b>{{config('custom.tipo_documento.'.$caso->PersonasFisicas->tipo_documento) }}: </b></span> <span class="upper">{!! $caso->PersonasFisicas->documento !!}</span></p>
            </td>
            <td class="col-xs-4">
                <p><span class="upper"><b>Nacimiento: </b></span> <span class="upper">{!! $caso->PersonasFisicas->persona_fecha_nacimiento !!}</span></p>
            </td>
        </tr>

        <tr>
            <td class="col-xs-4">
                <p><span class="upper"><b>Email: </b></span> <span class="upper">{!! $caso->PersonasFisicas->email !!}</span></p>
            </td>
            <td class="col-xs-8" colspan="2">
                <p><span class="upper"><b>Provincia: </b></span> <span class="upper">{!! $caso->PersonasFisicas->Hogar ? $caso->PersonasFisicas->Hogar->ciudad : "" !!}</span></p>
            </td>
        </tr>
        <tr>
            <td class="col-xs-4">
                <p><span class="upper"><b>Calle: </b></span> <span class="upper">{!! $caso->PersonasFisicas->Hogar ? $caso->PersonasFisicas->Hogar->calle_slug : "" !!}</span></p>
            </td>
            <td class="col-xs-8" colspan="2">
                <p><span class="upper"><b>Número: </b></span> <span class="upper">{!! $caso->PersonasFisicas->Hogar ? $caso->PersonasFisicas->Hogar->numero : "" !!}</span></p>
            </td>
        </tr>

    </table>
</div>



</body>
</html>
