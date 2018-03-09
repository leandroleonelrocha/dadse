
@extends('template/template')
@section('titulo')
    Caso #{{$caso->id}}
@endsection


@section('content')
    
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li class="active">Caso # {{ $caso->id }}</li>

    </ol>

    <div class="row">
        <h1 class="text-center">Caso  # {{ $caso->id }}</h1>
        @if($caso->movimientos)
            @foreach($caso->movimientos as $movimiento)
            <div class="col-xs-12">
                @if($movimiento->estado_movimiento == 4)    
                <div class="alert alert-danger">
                     Caso Anulado el día {{$movimiento->created_at}} a las {{$movimiento->getHora()}} por {{$movimiento->usuario->fullname}}.
                </strong><br/>
                </div>
                @endif
            </div>
             <div class="col-xs-12">
                @if($movimiento->estado_movimiento == 3)    
                <div class="alert alert-success">
                     Caso Anulado el día {{$movimiento->created_at}} a las {{$movimiento->getHora()}} por {{$movimiento->usuario->fullname}}.
                </strong><br/>
                </div>
                @endif
            </div>
            @endforeach
        @endif

        <div class="col-xs-8">
            <div class=" panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Datos Personales</h4>
                </div>
                <div class="panel-body bt">
                    @include('casos.datos_personales')
                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class=" panel panel-primary">
                <div class="panel-heading"><h4 class="panel-title">Documentos</h4></div>
                <div class="panel-body bt">
                    @include('casos.documentos')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class=" panel panel-primary">
                <div class="panel-heading"><h4 class="panel-title">Prestaciones</h4></div>
                <div class="panel-body bt">
                    @include('casos.prestaciones')
                </div>

                <div class="panel-footer">

                    <div class="btn-group">
                        <button class="btn btn-default btn-sm" data-toggle="dropdown">
                            <em class="fa fa-plus-square text-success"></em>
                            Nueva Prestación
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('prestaciones.asignar_intervencion', [$caso->id, 4])}}">
                                    Ayuda Directa
                                </a>
                            </li>
                            <li>
                                <a href="{{route('prestaciones.asignar_intervencion',[$caso->id,5])}}">
                                    Alto Costo
                                </a>
                            </li>
                        </ul>
                    </div>


                    @if(count($caso->prestaciones()->where('estado','=', 4)->get()) == 0 )
                    <a class="btn btn-default btn-sm btn-flat" href="javascript:void(0)">
                    @else
                    <a class="btn btn-default btn-sm btn-flat" href="{{route('ayudaDirecta.nuevo',$caso->id )}}">
                    @endif

                    <div class="label label-warning">{{count($caso->prestaciones()->where('estado','=', 4)->get() ) }}</div>
                    Procesar Ayuda Directa</a>
                    <!--
                    Facturacion solo para administradores
                    -->
                    @role('administrador') 
                    <a class="btn btn-default btn-md" href="{{route('casos.facturacion',$caso->id)}}"><em class="fa fa-file-text-o"></em> Facturación</a>
                    @endrole
                    <div class="btn-group boton_acciones_multipes" style="display: none">
                       <!--
                       <a class="acciones_multiples btn btn-default" href="javascript:void(0)" data-ruta="{{route('ayudaDirecta.nuevo')}}">Ayuda Directa</a>
                       <button type="button" class="btn btn-default">Ayuda Directa</button>
                       <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-default" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">default</span>
                       </button>
                       <ul role="menu" class="dropdown-menu">
                          <li><a class="acciones_multiples" href="javascript:void(0)" data-ruta="{{route('prestacion.evaluacionSocial')}}">Evaluación Social</a></li>
                          <li><a class="acciones_multiples" href="javascript:void(0)" data-ruta="{{route('ayudaDirecta.nuevo')}}">Ayuda Directa</a></li>
                          <li><a class="acciones_multiples" href="javascript:void(0)" data-ruta="{{route('prestaciones.informes')}}">Informe Médico</a></li>
                          <li><a class="acciones_multiples" href="javascript:void(0)" data-ruta="{{route('dictamenMedico.index')}}">Dictamen Médico</a></li>
                          <li><a class="acciones_multiples" href="javascript:void(0)" data-ruta="{{route('prestaciones.asignarResolucion')}}">Resolución</a></li>
                          <li><a class="acciones_multiples" href="javascript:void(0)" data-ruta="{{route('altoCosto')}}">Solicitar Alto Costo</a></li>
                       </ul>
                       -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class=" panel panel-primary">
                <div class="panel-heading"> <h4 class="panel-title">Notas del Caso</h4></div>
                <div class="panel-body bt">

                    @include('casos.notas')
                </div>
                <div class="panel-footer">
                    @include('casos.notas_modal')

                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class=" panel panel-primary">
                <div class="panel-heading"><h4 class="panel-title">Ayuda Directa</h4></div>
                <div class="panel-body bt">
                    @include('casos.cuenta_corriente.form')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Otros Datos</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=>'casos.numero.expediente']) !!}
                 
                    {!! Form::label('Número Expediente') !!}
                    {!! Form::text('numero_expediente',$caso->numero_expediente,['class'=>'form-control']) !!}
                    
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sm btn-default">
                        <em class="fa fa-save text-primary"></em>
                        Guardar
                    </button>
                </div>

                 {!! Form::close() !!}
            </div>
        </div>
    </div>
    @role('administrador') 
    <div class="row">
        <div class="col-xs-6">
            <a href="{{route('casos.cerrar', $caso->id)}}" class="btn btn-danger btn-block msgCerrar"> CERRAR CASO </a>
        </div>
        <div class="col-xs-6">
            <a href="{{route('casos.anularCaso', $caso->id)}}" class="btn btn-warning btn-block msgAnular"> ANULAR CASO </a>
        </div>
        <!-- END bar chart-->
    </div>
    @endrole
@endsection


