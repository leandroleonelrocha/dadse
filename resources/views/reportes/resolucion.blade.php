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
            font-size: 14px;
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

                <h4 class="font21 text-center" style="margin-top:20px;">Resolución</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="mb-20">

                VISTO el Expediente Nº {{$model->nro_expediente_electronico}} del Registro del SISTEMA EXPEDIENTE ELECTRÓNICO, y
                    <br>
                CONSIDERANDO:
                    <br>

                    <br>
                Que en el cuerpo mencionado 'ut supra', constan los comprobantes respaldatorios y recetas médicas que corresponden a
                    la aplicación de los importes de los SUBSIDIOS POR AYUDAS ECONÓMICAS MENORES destinadas a ADQUISICIÓN DE MEDICAMENTOS O INSUMOS MÉDICOS,
                    correspondiente al período facturado comprendido entre el día {{date('d/m/Y',strtotime($model->minFecha()->fecha_desde)) }}  y el día {{date('d/m/Y',strtotime( $model->maxFecha()->fecha_hasta)) }},

                    por la DIRECCIÓN DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES, a favor de las personas físicas detalladas en el Anexo <strong>({{$model->nro_if_anexo}})</strong>
                    que forma parte de la presente Resolución, con arreglo a lo dispuesto en la Resolución MDS N° 2458/2004 Anexo III.
                    <br>
                Que, con fundamento en la indicada documentación, que obra en el expediente del Visto, la <strong>{{$model->Proveedores->razon_social}}</strong>
                    ha procedido a entregar los medicamentos y/o insumos médicos requeridos por los respectivos titulares, en base a las indicaciones efectuadas por
                    la DIRECCIÓN DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES.
                    <br>
                Que en consecuencia, corresponde proceder al pago del total de los importes de la respectiva factura agregada en la actuación indicada, por la suma total de
                    <strong>{{$importe_total_texto}}  (${{$importe_total}})</strong>  a favor de <strong>{{$model->Proveedores->razon_social}}</strong>, con domicilio en <strong class="upper"> {{$model->Proveedores->domicilio_fiscal}} {{$model->Proveedores->ciudad}} de {{$model->Proveedores->provincia}}</strong> .
                <br>
                Que la DIRECCIÓN DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES propicia la presente medida de conformidad con lo establecido en la Resolución MDS Nº 2458/2004
                    Anexo III.
                    <br>
                Que la SUBSECRETARIA DE IDENTIFICACION Y ATENCION DE NECESIDADES CRITICAS ha prestado conformidad al otorgamiento del presente subsidio.
                Que la DIRECCIÓN DE PROGRAMACIÓN Y EJECUCIÓN PRESUPUESTARIA ha efectuado la correspondiente afectación presupuestaria.
                Que la DIRECCIÓN GENERAL DE ASUNTOS JURÍDICOS ha tomado la intervención de su competencia.
                Que el presente acto se dicta en el marco del PROGRAMA DE SUBSIDIOS A  PERSONAS FISICAS reglado por la Resolución MDS Nº 2458/2004 y en virtud de lo dispuesto
                    en la Ley de Ministerios, sus normas modificatorias y complementarias, Ley N° 24.156 de ADMINISTRACIÓN FINANCIERA Y DE LOS SISTEMAS DE CONTROL DEL SECTOR PÚBLICO NACIONAL
                    y su Decreto Reglamentario N° 1344/2007 y modificatorios , Ley Nº 25.506, Decreto Nº 434/2016 y sus normas complementarias, Decreto Nº 561/2016 y sus normas complementarias, Decreto N° 357/2002 y
                    sus normas modificatorias y complementarias y Decreto Nº 140 de fecha 16 de diciembre de 2015.
                <br>
                Por ello,
                <br>
                EL SECRETARIO DE GESTION Y ARTICULACION INSTITUCIONAL
                RESUELVE:

                    <br><br>
                ARTICULO 1º: Páguese a <strong>{{$model->Proveedores->razon_social}}</strong> , con domicilio en <strong class="upper"> {{$model->Proveedores->domicilio_fiscal}} {{$model->Proveedores->ciudad}} de {{$model->Proveedores->provincia}} </strong> ,
                    por la suma total de <strong>{{$importe_total_texto}} (${{$importe_total}}) </strong>en concepto de cancelación de las facturas correspondiente al período del día {{date('d/m/Y',strtotime($model->minFecha()->fecha_desde)) }}  y el día {{date('d/m/Y',strtotime( $model->maxFecha()->fecha_hasta)) }},
                    detalladas en el Anexo ({{$model->nro_if_anexo}}) de la presente, correspondientes a la entrega de medicamentos y/o insumos médicos a favor de las personas
                    que también se detallan en el mismo Anexo <strong>({{$model->nro_if_anexo}})</strong>.<br>
                ARTICULO 2º: Efectúese transferencia bancaria por la suma total de PESOS <strong>{{$importe_total_texto}} (${{$importe_total}})</strong>  a favor de <strong>{{$model->Proveedores->razon_social}}</strong>. <br>
                ARTICULO 3º: Establécese que, las constancias de recepción de los medicamentos y/o insumos médicos, por parte de los respectivos titulares y/o personas autorizadas a
                    tal efecto, y el recibo de pago extendido por <strong>{{$model->Proveedores->razon_social}}</strong> constituirán suficiente respaldo a efectos del cumplimiento de la obligación de rendición de
                    cuentas documentada de la inversión de los fondos de los subsidios personales otorgados.<br>
                ARTICULO 4º: El gasto que demande la presente Resolución será afectado a la partida específica del presupuesto del ejercicio del correspondiente año.<br>
                ARTICULO 5º: Comuníquese y archívese.





                {{--Que la DIRECCIÓN GENERAL DE ASUNTOS JURÍDICOS ha tomado intervención de su competencia.<br>--}}
                {{--Que el presente acto se dicta en el marco del PROGRAMA DE SUBSIDIOS A PERSONAS FISICAS--}}
                {{--regaldo por la Resolución MDS N° 2453/2004 y en virtud de los dispuesto en la Ley de Ministerios,sus normas modificatorias y--}}
                {{--complementarias, Ley N° 24.156 de ADMINISTRACIÓN FINANCIERA Y DE LOS SISTEMAS DE CONTROL DEL SECTOR PÚBLICO NACIONAL y su Decreto Reglamentario--}}
                    {{--N° 561/2016 y sus normas complementarias, Decreto N° 140 de fecha 16 de diciembre de 2015. <br>--}}

                {{--Por ello, <br>--}}
                {{--EL SECRETARIO DE GESTION Y ARTICULACION INSTITUCIONAL RESUELVE: <br>--}}

                {{--ARTICULO 1º.- Páguese a <strong>{{$model->Proveedores->razon_social}}</strong>, con domicilio en <strong class="upper"> {{$model->Proveedores->domicilio_fiscal}}</strong> N° 205 de la ciudad--}}
                    {{--<strong class="upper">{{$model->Proveedores->ciudad}} de {{$model->Proveedores->provincia}} ,--}}
                        {{--por la suma total de {{$importe_total_texto}} (${{$importe_total}})  en concepto de cancelación de las facturas correspondientes al período del XX de XXXX de XXX al XXX al X de XXXXX de XXXXX , detalladas en el anexo {{$model->Proveedores->nro_anexo}} de la presente, correspondientes a la entrega de medicamentos y/o insumos médicos a favor de las personas que también se detallan en el mismo Anexo {{$model->Proveedores->nro_anexo}} </strong>--}}
               {{----}}
                {{--ARTICULO 2º.- Efectúase transferencia bancaria por la suma total de PESOS {{$importe_total_texto}} (${{$importe_total}}) a favor de {{$model->Proveedores->razon_social}} <br>--}}
               {{----}}
                {{--ARTICULO 3º.- Establécese que, las constancias de recepción de los medicamentos y/o insumos médicos, por parte de los respectivos titulares y/p personas autorizadas a tal efecto, y el recibo de pago extendido por {{$model->Proveedores->razon_social}} constituirán suficiente respaldo a efectos del cumplimiento de la obligación de rendición de cuentas documentada de la invsersión de los fondos de los subsidios personales otorgados <br>--}}

                {{--ARTICULO 4°.- El gasto que demande la presente Resolución será afectado a la partida específica del presupuesto del ejercicio del correspondiente año <br>--}}

                {{--ARTICULO 5°.- Comuníquese y archívese.--}}
                </div>
            </div>
        </div>
    </div>

</body>
</html>
