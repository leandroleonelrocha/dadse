@extends('template/template')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
        <li class="active">@if(isset($models)) {{$models->razon_social}} @else Nuevo @endif</li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
        <h1>{{$models->razon_social}} - {{$models->nombre}}
             <a href="{{route('proveedores.liquidaciones_historico', $models->id)}}" class="btn btn-sm btn-default pull-right" > <em class="fa fa-history text-primary"></em>
        <span class="hidden-xs hidden-sm">Liquidaciones - histórico</span> </a>
        </h1>
       
        <div class="panel panel-default">
        <div class="panel-heading"></div>
            <div class="panel panel-body">

                <div role="tabpanel">
                    <!-- Nav tabs-->
                    <ul role="tablist" class="nav nav-tabs">
                        <li role="presentation" class="active">
                            <a href="#presupuestos_pendientes" aria-controls="profile" role="tab" data-toggle="tab">Presupuestos Pendientes </a>
                        </li>
                        <li role="presentation">
                            <a href="#presupuestos_historicos" aria-controls="home" role="tab" data-toggle="tab">Presupuestos Histórico</a>
                        </li>
                        <li role="presentation">
                            <a href="#cc" aria-controls="home" role="tab" data-toggle="tab">Cuenta Corriente</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                       
                        <div id="presupuestos_pendientes" role="tabpanel" class="tab-pane active">
                            @include('proveedores.presupuestos')
                        </div>
           
                        <div id="presupuestos_historicos" role="tabpanel" class="tab-pane">
                            @include('proveedores.historico')
                        </div>

                        <div id="cc" role="tabpanel" class="tab-pane">
                            @include('proveedores.cc')
                        </div>
                       </div>
                </div>

            </div>

            {!! Form::close() !!}
        </div>
        </div>

    </div>

@endsection
