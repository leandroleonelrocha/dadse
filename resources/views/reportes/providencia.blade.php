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
            font-size: 15px;
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
            line-height: 1.72857143;
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

        .mt-40{
            margin-top: 40px;
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

        .text-gray{
            color: #666666;
        }

        .border{
            border: 1px solid #ddd;
            padding:5px;
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
            font-size: 90%;
        }

        .cierre>div{
            width:50%;
            display: inline-block;
            vertical-align: top;
        }

        h1{
            font-size: 200%;
        }

        h3{
            font-size: 150%;
        }

        .w50{
            width: 50%;
        }

        .inline-block{
            display: inline-block !important;
            vertical-align: top;
        }

    </style>

</head>
<body>
       
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 mb-20">
                <div class="col-xs-12 mb-40n">
                    <img width="200px" src="../public/img/minist.png" alt="Logo" class="center-block" id="logo">
                </div>
                <br>
                <p class="mt-20 ml-80">Direccion de Asistencia Directa por Situaciones Especiales</p>
                <p class="text-right"> “2017-Año de las Energías Renovables”.</p>
                <p class="text-right">Buenos Aires, {!! date('d-m-Y',time()) !!} </p>

             
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class=" mb-20" style="text-align: justify">

                    <strong>{{$model->nro_expediente_electronico}}</strong> <br>
                    A: SUBSECRETARIA DE IDENTIFICACION Y ATENCION DE NECESIDADES CRITICAS<br>

                    Vienen a consideración de la DIRECCION DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES las actuaciones de referencia,
                    mediante las cuales se tramitó el otorgamiento de SUBSIDIOS PERSONALES POR AYUDAS ECONÓMICAS MENORES destinadas a
                    ADQUISICIÓN DE MEDICAMENTOS O INSUMOS MÉDICOS según recetas adjuntas, correspondiente a la Facturación del Período comprendido entre el
                    {{date('d/m/Y',strtotime($model->minFecha()->fecha_desde)) }}  y el  {{date('d/m/Y',strtotime( $model->maxFecha()->fecha_hasta)) }}, a favor de las personas mencionadas en el Anexo (<strong>{{$model->nro_if_anexo}}</strong>) que forma parte del Proyecto
                    de Resolución, por la suma total de PESOS <strong>{{$importe_total_texto}} (${{$importe_total}})</strong>.<br>
                    Hecha la evaluación socioeconómica correspondiente y acompañada con la documentación exigida por la normativa vigente, se considera que
                    lo peticionado precedentemente encuadra en los criterios básicos para el otorgamiento de Subsidios Personales, sin perjuicio de los principios
                    de subsidiariedad y supletoriedad, los cuales orientan la acción estatal en la materia.<br>
                    Por lo tanto, conforme a la documentación obrante en el expediente se desprende que las órdenes de entrega de medicamentos y/o insumos médicos
                    fueron autorizadas por la Dirección y que los mismos fueron entregados a los titulares correspondientes.<br>
                    En esta instancia, se solicita que, se arbitren los medios necesarios para cancelar la facturación presentada por <strong>{{$model->Proveedores->razon_social}}</strong> ,
                    se eleva el presente expediente sin formular observaciones, a los fines de permitir la prosecución del trámite respectivo.<br>
                    En caso de compartir el criterio, se solicita al Señor Subsecretario eleve las presentes actuaciones de la DIRECCION DE PROGRAMACION Y
                    EJECUCION PRESUPUESTARIA con el fin de realizar la afectación presupuestaria correspondiente.<br>
                    Cumplido lo expresado precedentemente, se solicita que las presentes sean giradas a la DIRECCION GENERAL DE ASUNTOS JURIDICOS. Se
                    adjunta proyecto de Resolución Nº <strong>{{$model->if_proyecto_resolucion}}</strong> y Anexo Nº <strong>{{$model->nro_if_anexo}}</strong>


                </div>
            </div>
        </div>
    </div>

</body>
</html>
