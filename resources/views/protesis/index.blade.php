@extends('template/template')

@section('content')
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Insumos</li>
        </ol>

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user-md"></span> Insumos </h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('protesis.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Categoría</th>
                            <th>Importe</th>
                                
                            <th class="col-xs-1"></th>
                            </thead>
                            @foreach($model as $protesis)
                                <tr>
                                    <td>{{$protesis->dni}}</td>
                                    <td>{{$protesis->nombre}}</td>
                                    <td>{{$protesis->descripcion}}</td>
                                    <td>
                                        @if(config('custom.protesis.'.$protesis->estado) == 'Activo')
                                            <label class="label label-info">{{ config('custom.protesis.'.$protesis->estado) }} </label>
                                        @else
                                            <label class="label label-warning">{{config('custom.protesis.'.$protesis->estado) }} </label>
                                        @endif
                                    </td>
                                    <td>{{$protesis->categoria}}</td>
                                    <td>{{$protesis->importe}}</td>

                                    <td>
                                        <a href="{{route('protesis.editar',$protesis->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                        <a href="{{route('protesis.eliminar',$protesis->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection
