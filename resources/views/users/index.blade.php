@extends('template/template')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1>Usuarios</h1>

            <!-- START bar chart-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-right">
                            <a href="{{route('users.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                </div>
                <div class="panel-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <th>#</th>
                        <th>Nombre Completo</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Estado Actual</th>
                        <th></th>
                        
                        </thead>
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->fullname}}</td>
                                <td>{{$model->username}}</td>
                                <td>{{$model->email}}</td>
                                <th>
                                    @if($model->is_active == 'Activo')    
                                    <label class="label label-info">{{$model->is_active}}</label>
                                    @else
                                     <label class="label label-warning">{{$model->is_active}}</label>
                                    @endif

                                    </th>
                                <td>
                                    <a href="{{route('users.editar',$model->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                    <a href="{{route('users.eliminar',$model->id)}}" class="msgDelete btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
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
