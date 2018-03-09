@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-xs-12 ">
            <h2># <span id="prestacionId" data-id="{{$producto->id}}">{{$producto->id}}</span>
                - {{$producto->producto}} {{$producto->descripcion}}</h2>
            <!-- START bar chart-->
            @if(isset($model) || is_null($model))
                {!! Form::model($model,['route' =>'prestaciones.post.informes']) !!}
            @else
                {!! Form::open(['route' =>'prestaciones.post.informes']) !!}
            @endif

            <div class="panel panel-default">
                <div class="panel-body">
                    <legend>Productos</legend>
                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                            <!--   <th><input id="check_all" type="checkbox"></th> -->
                            <th>#</th>

                            <th>Cant.</th>
                            <th>Um.</th>
                            <th>Producto</th>
                            <th>$ P. Unitario</th>
                            <th>$ S. Total</th>
                            <th>Urgente</th>
                            <th></th>
                            </thead>
                            @foreach($prestaciones as $prestacion)
                                <tr>
                                    <!-- <td><input class="check_presentacion" type="checkbox"></td> -->
                                    {!! Form::hidden('productos_id[]',$prestacion->id) !!}
                                    <td>{{$prestacion->id}}</td>

                                    <td>{{$prestacion->cantidad}}</td>
                                    <td>{{$prestacion->unidad_medida}} </td>
                                    <td> {{$prestacion->descripcion}}</td>
                                    <td>$ {{$prestacion->importe_asignado}}</td>
                                    <td>$ {{$prestacion->cantidad * $prestacion->importe_asignado}}</td>
                                    <td>
                                        <label class="switch switch">
                                            <input name="urgente[]"  {{ $prestacion->urgente == 1 ? 'checked="checked"': '' }}value="{{$prestacion->id}}" type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>

                                    <td>
                                        <a href="{{route('prestacionesProductosDelete',$prestacion->id)}}"
                                           class="btn btn-xs btn-default"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <a href="{{route('prestaciones.asignar',$producto->id)}}" class="pull-right btn btn-xs btn-warning">
                        Asignar Nuevo Producto</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading ">
                    <legend>Informe</legend>
                </div>
                <div class="panel-body">

                    {!! Form::hidden('prestaciones_id',$producto->id) !!}
                    <div class="form-group col-xs-6">
                        <label>Medico Tratante</label>
                        {!! Form::text('hospital_tratante',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-xs-2">
                        <label>Tipo Matricula</label>
                        {!! Form::select('tipo_matricula',['0'=>'Seleccionar','nacional'=>'Nacional','provincial'=>'Provincial'],null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-xs-4">
                        <label>Nro. Matricula</label>
                        {!! Form::text('matricula',null,['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group col-xs-12">
                        <label>Diagnóstico Médico</label>
                        {!! Form::textArea('diagnostico',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-xs-12">
                        <label>Observaciones</label>
                        {!! Form::textArea('observaciones',null,['class'=>'form-control']) !!}
                    </div>

                    {!! Form::submit('Guardar Informe',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- END bar chart-->
    </div>




@endsection


