@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-xs-12 ">

            <div class="panel panel-default">
                <div class="panel-body">
                    <legend>Prestación</legend>
                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                            <!--   <th><input id="check_all" type="checkbox"></th> -->
                            <th>Cant.</th>
                            <th>Um.</th>
                            <th>Producto</th>
                            <th>$ P. Unitario</th>
                            <th>$ S. Total</th>
                            </thead>
                            <tr>
                                <!-- <td><input class="check_presentacion" type="checkbox"></td> -->
                                <td>{{$model->cantidad}}</td>
                                <td>{{$model->unidad_medida}} </td>
                                <td> {{$model->descripcion}}</td>
                                <td>$ {{$model->importe_asignado}}</td>
                                <td>$ {{$model->cantidad * $model->importe_asignado}}</td>


                                {{--
                                <td>
                                    <a href="{{route('prestacionesProductosDelete',$producto->id)}}"
                                       class="btn btn-xs btn-default"><span class="fa fa-trash"></span></a>
                                </td>
                                --}}

                            </tr>

                        </table>
                    </div>
                    {{--
                    <a href="{{route('prestaciones.asignar',$producto->id)}}" class="pull-right btn btn-xs btn-warning">
                        Asignar Nuevo Producto</a>
                        --}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading ">
                    <legend>Resolución</legend>
                </div>
                <div class="panel-body">
                    {!! Form::model($model,['route' =>'prestaciones.post.asignarResolucion']) !!}
                    {!! Form::hidden('prestaciones_id',$model->id) !!}
                    <div class="form-group col-xs-6">
                        <label>Número de Expediente</label>
                        {!! Form::text('expediente',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-xs-6">
                        <label>Número de Resolución</label>
                        {!! Form::text('resolucion',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-xs-12">

                    {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- END bar chart-->
    </div>




@endsection


