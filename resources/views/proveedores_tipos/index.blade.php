@extends('template/template')

@section('content')
        <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Tipos Proveedores</li>
        </ol>

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user-md"></span> {{$seccion}}</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('proveedores_tipos.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>#</th>
                            <th>Tipo</th>

                            <th class="col-xs-1"></th>
                            </thead>
                            @foreach($model as $tipo)
                                <tr>
                                    <td>{{$tipo->id}}</td>
                                    <td>{{$tipo->nombre}}</td>
                                    <td>
                                        <a href="{{route('proveedores_tipos.editar',$tipo->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                        <a href="{{route('proveedores_tipos.eliminar',$tipo->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
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

