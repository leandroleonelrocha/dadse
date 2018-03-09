@extends('template/template')

@section('content')

    <div class="row">

        <div class="panel ">
            <div class="panel panel-body">

                <h2>{{$models->apellido}}, {{$models->nombre}}</h2>

                <div role="tabpanel">
                    <!-- Nav tabs-->
                    <ul role="tablist" class="nav nav-tabs">
                        <li  class="active" role="presentation"><a href="#presupuestos_pendientes" aria-controls="profile" role="tab" data-toggle="tab">Informes Pendientes <span class="label label-warning">{{$models->AltoCostoMedicos->count()}}</span></a></li>
                    </ul>
                    <!-- Tab panes-->
                    <div class="tab-content">
                        <div id="presupuestos_pendientes" role="tabpanel" class="tab-pane active">
                           @foreach($models->AltoCostoMedicos as $altoCosto)
                                <a href="{{route('prestaciones.informes',$altoCosto->AltoCosto->Prestaciones->id)}}" > Caso # {{$altoCosto->AltoCosto->Prestaciones->casos_id}} - Prestacion # {{$altoCosto->AltoCosto->prestaciones_id}}  - {{$altoCosto->fecha_envio}}</a><br>
                               <label class="label label-warning"></label>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            {!! Form::close() !!}
        </div>

    </div>

@endsection