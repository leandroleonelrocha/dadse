@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user-md"></span> {{$seccion}}</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('especialidades.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>#</th>
                            <th>Especialidad</th>

                            <th class="col-xs-1"></th>
                            </thead>
                            @foreach($model as $especialidad)
                                <tr>
                                    <td>{{$especialidad->id}}</td>
                                    <td>{{$especialidad->nombre}}</td>
                                    <td>
                                        <a href="{{route('especialidades.editar',$especialidad->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                        <a href="{{route('especialidades.eliminar',$especialidad->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
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

