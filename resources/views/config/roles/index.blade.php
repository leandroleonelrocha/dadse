@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1>Roles </h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('roles.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripción</th>
                            <th class="col-xs-1"></th>
                            
                            <th class="col-xs-1"></th>
                            
                            </thead>

                            @foreach($roles as $rol)
                                <tr>
                                    <td>{{$rol->name}}</td>
                                    <td>{{$rol->slug}}</td>
                                    <td>{{$rol->description}}</td>
                                    <td><a href="{{route('roles.permisos',$rol->id )}}" class="btn btn-xs btn-default ">Permisos</a></td>
                                    <td>
                                        <a href="{{route('roles.editar',$rol->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                        <a href="{{route('roles.eliminar',$rol->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
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

