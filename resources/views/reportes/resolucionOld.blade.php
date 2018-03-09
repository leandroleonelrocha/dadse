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
            font-size: 10px;
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
                    <img src="http://www.desarrollosocial.gob.ar/wp-content/themes/responsive/core/images/logo-ministerio-desarrollo-4.png" alt="Logo" class="center-block" id="logo">
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
                <div class="border mb-20">
             
                A: SUBSECRETARIA DE IDENTIFICACION Y ATENCION DE NECESIDADES CRITICAS <br><br>
                Vienen a consideración de la DIRECCION DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES las actuaciones de referencia, mediante las cuales se tramita el otorgamiento de un Subsidio Personal a favor de <strong class="upper"> {{$prestacion->Casos->PersonasFisicas->fullname}} {{ $prestacion->Casos->PersonasFisicas->tipo_documento}}  Nº  {{ $prestacion->Casos->PersonasFisicas->documento}}</strong> , por la suma de <strong class="upper"> PESOS {{$total}} (${{$prestacion->PresupuestoAdjudicado->total}},00.-) </strong>, destinado a la provisión de <strong class="upper">MEDICAMENTOS</strong>  para el tratamiento de <strong class="upper">MIELOMA MULTIPLE.</strong> <br>
                Hecha la evaluación socioeconómica correspondiente y acompañada con la documentación exigida por la normativa vigente, se considera que lo peticionado precedentemente encuadra en los criterios básicos para el otorgamiento de Subsidios Personales, sin perjuicio de los principios de subsidiariedad y supletoriedad, los cuales orientan la acción estatal en la materia.<br>
                Se deja constancia, tal surge de lo actuado, que atento el estado de salud del/la Titular de derecho y a efectos que el subsidio peticionado cumpla con su finalidad y sea oportuno,  ha sido imprescindible autorizar la provisión anticipada, de lo prescripto por el médico tratante.<br>
                Por todo lo expuesto, se estima procedente dar curso favorable a lo solicitado sin formular observaciones, a los fines de permitir la prosecución del trámite respectivo.<br><br>
                En caso de compartir el criterio, se solicita al Señor Subsecretario eleve las presentes actuaciones a la DIRECCION DE PROGRAMACION Y EJECUCION PRESUPUESTARIA, con el fin de realizar la afectación presupuestaria correspondiente.<br>
                Cumplido lo expresado precedentemente, se solicita que las presentes sean giradas a la DIRECCION GENERAL DE ASUNTOS JURIDICOS.<br><br>





                VISTO el expediente Nº <strong class="upper">{{$prestacion->expediente}}</strong> del Registro del MINISTERIO DE DESARROLLO SOCIAL, y
                CONSIDERANDO:<br>
                Que mediante las actuaciones de referencia,  <strong class="upper"> {{$prestacion->Casos->PersonasFisicas->fullname}} </strong>, ha solicitado un Subsidio Personal destinado a la provisión de <strong class="upper">MEDICAMENTOS</strong> para el tratamiento de <strong class="upper">MIELOMA MULTIPLE</strong>, cumplimentando para tal efecto los requisitos administrativos correspondientes.<br>
                Que el Banco Nacional de Drogas Oncológicas dependiente del Ministerio de Salud de la Nación, informó que la medicación solicitada no se encuentra en el vademécum de dicho Banco.<br>
                Que la DIRECCION DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES, atento el estado de salud del/la Titular de Derecho y a efectos que el subsidio peticionado cumpla con su finalidad y sea oportuno, autorizó la provisión anticipada de lo prescripto por el médico tratante.<br>
                Que la DIRECCION DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES, en razón que el caso encuadra en la normativa aplicable, propicia el dictado de la presente medida, con arreglo a lo establecido en la Resolución <strong class="upper">MDS Nº {{ $prestacion->resolucion }}  .</strong><br>
                Que la SUBSECRETARIA DE IDENTIFICACION Y ATENCION DE NECESIDADES CRITICAS ha prestado conformidad al otorgamiento del presente subsidio.<br>
                Que la DIRECCION DE PROGRAMACION Y EJECUCION PRESUPUESTARIA ha efectuado la correspondiente afectación presupuestaria.<br>
                Que la DIRECCION GENERAL DE ASUNTOS JURIDICOS ha tomado la intervención de su competencia.<br>
                Que el presente acto se dicta en el marco del PROGRAMA DE SUBSIDIOS A PERSONAS FISICAS reglado por la Resolución <strong class="upper">MDS Nº {{$prestacion->resolucion}}</strong> y en virtud de lo dispuesto en la Ley de Ministerios, y sus normas modificatorias y complementarias, Ley N° 24.156 de ADMINISTRACIÓN FINANCIERA Y DE LOS SISTEMAS DE CONTROL DEL SECTOR PÚBLICO NACIONAL y su Decreto Reglamentario N° 1344/2007 y modificatorios, Ley Nº 25.506, Decreto Nº 434/2016 y sus normas complementarias, Decreto Nº 561/2016 y sus normas complementarias, Decreto Nº 357/2002 y sus normas modificatorias y complementarias y Decreto Nº 140 de fecha 16 de diciembre de 2015.<br><br>

                Por ello,<br>
                EL SECRETARIO DE GESTION Y ARTICULACION INSTITUCIONAL<br>
                RESUELVE:<br><br>
                ARTICULO 1º.- Otórgase un Subsidio Personal a <strong class="upper"> {{$prestacion->Casos->PersonasFisicas->fullname}}  {{ $prestacion->Casos->PersonasFisicas->tipo_documento}}  Nº  {{ $prestacion->Casos->PersonasFisicas->documento}} </strong>, con domicilio en la calle <strong class="upper">{{$prestacion->Casos->PersonasFisicas->Hogar ? $prestacion->Casos->PersonasFisicas->Hogar->calle_slug : ""}} N° {{$prestacion->Casos->PersonasFisicas->Hogar ? $prestacion->Casos->PersonasFisicas->Hogar->numero : ""}}</strong> de la Localidad de <strong class="upper">{{$prestacion->Casos->PersonasFisicas->Hogar ? $prestacion->Casos->PersonasFisicas->Hogar->partido : ""}}</strong>, Provincia de <strong class="upper">{{$prestacion->Casos->PersonasFisicas->Hogar ? $prestacion->Casos->PersonasFisicas->Hogar->provincia : ""}}</strong>, por la suma de <strong class="upper"> PESOS {{$total}} (${{$prestacion->PresupuestoAdjudicado->total}}) </strong>, destinado a la provisión de <strong class="upper"> MEDICAMENTOS</strong> para tratamiento de <strong class="upper">MIELOMA MULTIPLE</strong>, designando a <strong class="upper">{{$prestacion->PresupuestoAdjudicado->Proveedores->razon_social}} </strong> para  realizar su entrega.<br>
                ARTICULO 2º.- El medicamento referido en el Artículo precedente es el detallado a continuación: <strong class="upper"> {{$prestacion->getProductos()}} </strong>, por la suma de <strong class="upper"> PESOS {{$total}} (${{$prestacion->PresupuestoAdjudicado->total}},00.-) </strong> presupuesto adjudicado a <strong class="upper">{{$prestacion->PresupuestoAdjudicado->Proveedores->razon_social}} </strong><br>
                ARTICULO 3º.- Gírese a la DIRECCION DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES, para notificar a las partes involucradas, el otorgamiento del subsidio.<br>
                ARTICULO 4º.- Dispónese que, mediando la pertinente comunicación de la DIRECCION DE ASISTENCIA DIRECTA POR SITUACIONES ESPECIALES respecto de la recepción de los MEDICAMENTOS conforme a lo referido en el Artículo 2º de la presente Resolución, por parte del/la Titular <strong class="upper">{{$prestacion->Casos->PersonasFisicas->fullname}}</strong>, la DIRECCION DE PROGRAMACION Y EJECUCION PRESUPUESTARIA, dependiente de la DIRECCION GENERAL DE ADMINISTRACION, podrá efectuar el pago de la/s factura/s contra entrega de remito/s, remito/s de procedencia, stickers, y/o troquel/es, o getin y número de serie del medicamento, certificado de importación, según corresponda.<br>
                ARTICULO 5º.- Establécese que, las constancias, tanto de recepción de los <strong class="upper">MEDICAMENTOS</strong> por parte del/la Titular, comprobada con la entrega de remito/s, remito/s de procedencia, stickers, y/o troquel/es, o getin y número de serie del medicamento, certificado de importación, según corresponda, como la del efectivo pago de la/s factura/s presentada/s, constituirán prueba suficiente de la rendición de cuentas documentada de la inversión de los fondos otorgados conforme el destino previsto en el subsidio otorgado mediante la presente Resolución.<br>
                ARTICULO 6º.- El gasto que demande la presente Resolución será afectado al presupuesto del ejercicio del correspondiente año.<br>
                ARTICULO 7º.- Comuníquese y archívese.<br>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
