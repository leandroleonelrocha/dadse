
@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Solicitud # {{ $solicitud->id }}</h1>
            <!-- START bar chart-->

            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                    <div class="panel-body">


                        <div role="tabpanel" class="tabsnav">
                            <!-- Nav tabs-->
                            <ul role="tablist" class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Personales</a></li>
                                <li role="presentation profile"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Prestaciones</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Movimientos</a></li>
                                <li role="presentation"><a href="#cuenta" aria-controls="cuenta" role="tab" data-toggle="tab">Cuenta Corriente</a></li>
                            </ul>
                            <!-- Tab panes-->
                            <div class="tab-content">
                                <div id="home" role="tabpanel" class="tab-pane active">@include('solicitudes.datos_personales')</div>
                                <div id="profile" role="tabpanel" class="tab-pane">@include('solicitudes.prestaciones')</div>
                               <!-- <div id="inform" role="tabpanel" class="tab-pane">@include('solicitudes.informes')</div> -->
                                <div id="messages" role="tabpanel" class="tab-pane">@include('solicitudes.movimientos')</div>
                                <div id="cuenta" role="tabpanel" class="tab-pane">@include('solicitudes.cuenta_corriente.form')</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">

                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection





