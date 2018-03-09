@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1>Permisos </h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('permisos.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripción</th>
                            <th>Modelo</th>
                            <th class="col-xs-1"></th>
                            
                            </thead>

                            @foreach($permisos as $permiso)
                                <tr>
                                    <td>{{$permiso->name}}</td>
                                    <td>{{$permiso->slug}}</td>
                                    <td>{{$permiso->description}}</td>
                                    <td>{{$permiso->model}}</td>
                                    
                                    <td>
                                        <a href="{{route('permisos.eliminar',$permiso->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
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

