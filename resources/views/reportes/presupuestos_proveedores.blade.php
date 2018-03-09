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
                <p class="text-right">Buenos Aires, {!! date('d-m-Y',time()) !!} </p>
                <p class="text-right">Ref. Orden 93 - Subsidio 1543101 - <b class="upper">barrios manuel osvaldo - ex-2017-00837434</b></p>
                <h4 class="font21 text-center" style="margin-top:20px;">Solicitud de Presupuesto</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1 class="upper">presentacion de la oferta</h1>
                <div class="border">
                    <p class="upper">hasta el día <b>{!! $prestacion->Presupuestos->first()->fecha_cierre !!}</b> a las <b>{!! $prestacion->Presupuestos->first()->hora_cierre !!}</b> se recibirán los sobres y el día <b>{!! $prestacion->Presupuestos->first()->fecha_apertura_sobre !!}</b> a las <b>{!! $prestacion->Presupuestos->first()->hora_apertura_sobre !!}</b> se abrirán los mismos, en esta dirección de ayuda a personas, sitio en la calle avenida de mayo 869 piso 8² mesa de entradas, capital federal (cod. postal 1002).</p>
                </div>
                <p class="text-center little">Ante cualquier duda comunicarse al: <b>4121-4716/4121-4669</b><br>
                <b>Importante: Se ruega NOTIFICAR, EN CASO DE NO PODER PRESUPUESTAR</b></p>

                <div class="border mt-10 mb-20">
                    <p class="upper">Todos los oferentes deben haber cumplimentado los requisitos de proveedor del estado nacional y normas vigentes del anmat, los cuales se encuentran en la pagina web del anmat (http://www.anmat.gob.ar). sin este cumplimiento se invalida la oferta</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-hover">

                    <thead>
                    <tr class="bg-blue colorWhite">
                        <td colspan="9" class="text-center">Referencias</td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="upper">Orden</th>
                            <td>93</td>
                        </tr>
                        <tr>
                            <th class="upper">Subsidio</th>
                            <td>1543101</td>
                        </tr>
                        <tr>
                            <th class="upper">Paciente</th>
                            <td class="upper">{{$prestacion->Casos->PersonasFisicas->fullname}}</td>
                        </tr>
                        <tr>
                            <th class="upper">Edad</th>
                            <td class="upper">{{$prestacion->Casos->PersonasFisicas->getEdad()}}</td>
                        </tr>
                        <tr>
                            <th class="upper">Reside en</th>
                             <td class="upper">{{$prestacion->Casos->PersonasFisicas->Hogar->provincia or ''}}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-hover">

                    <thead>
                    <tr class="bg-blue colorWhite">
                        <td colspan="9" class="text-center">Detalle de lo solicitado</td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <th class="upper">{!! $prestacion->id !!}</th>
                            <td>{!! $prestacion->cantidad !!}</td>
                            <td>{!! $prestacion->descripcion !!}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="border mb-20">
                    <b class="upper">LAS COTIZACIONES SERÁN CONSIDERADAS SÓLO SI CUMPLEN CON LAS SIGUIENTES CONDICIONES:</b>
                    <p>Las ofertas deberán ser presenttadas en sobre cerrado individual, indicando nombre del paciente, N² de orden, fecha y hora de apertura, teniendo una validez de 90 días.
                        <br>
                    Los presupuestos deberán contener todos los datos del producto: <br>
                    Monodroga, Presentación, Marca, Laboratorio. Asimismo, deberán estar numerados y poseer razón social, dirección, teléfono, correo electrónico, firma y sello del responsable de la empresa, N² de CUIT y aclaración de la orden a la cual se emitirá el cheque. Si el monto superara los $50.000 - el citizante deberá comunicarse con el área Contable del Ministerio de Desarrollo Social, Avda. 9 de julio 1925 Piso 18. Tel: 4379-3600, a fin de dejar los datos necesarios para que el pago pueda efectuarse por transferencia bancaria.
                        <br>
                    La entrega del materia deberá realizarse a partir de recibir la orden de compra definitiva o provisoria.
                        <br>
                    El pago se autorizará una vez enviada la orden de compra definitiva y luego de constatada la entrega del elemento y/o servicio a partir de la presentación por parte de la empresa de las correspondientes facturas (teniendo en consideración que este Ministerio es Iva Excento), certificados de implante (o cualquier otra certificación que acompañara al material), protocolo quirúrgico y placas (en el caso de que correspondiese). Toda la documentación deberá estar firmada y sellada por el medico interviniente.</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <h1>IMPORTANTE:</h1>
                <p class="text-danger upper">Se solicita asistir con un pendrive que contenga el archivo adjuntado bajo el nombre <b>"informacion digital (compulsa {!! $prestacion->Presupuestos->first()->fecha_apertura_sobre !!} completado con la informacion suministrada en papel a los efectos de facilitar las actas de apertura</b>.</p>
                <h3>Se recuerda prestar atención a los requisitos incluidos en el pedido de presupuestos </h3>
            </div>
        </div>


        <div class="row">
            <div class="mt-20">

                <div class="w50 inline-block">
                    <div class="text-gray">
                        <p>Sector Presupuestos</p>
                        <p>D.A.D.S.E</p>
                        <p>Ministerio de Desarrollo Social</p>
                    </div>
                </div>

                
            </div>
        </div>
    </div>


    <div class="container-fluid mt-40">
        <div class="row">

            <div class="col-xs-12">
                <table class="table table-striped table-hover">

                    <thead>
                        <tr class="bg-blue colorWhite">
                            <td class="text-center">Proveedor</td>
                            <td class="text-center">Mails</td>
                        </tr>
                    </thead>
                    @foreach($prestacion->Presupuestos as $presu)
                        <tbody>
                            <tr>
                                <th>{!! $presu->Proveedores->nombre !!}</th>
                                <th>
                                    <ul>
                                        @foreach($presu->Proveedores->Email as $email)
                                            <li>
                                                {!! $email->descripcion !!}
                                            </li>
                                        @endforeach
                                        
                                    </ul>
                                </th>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</body>
</html>
