@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user-md"></span> Listado De {{$seccion}}</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('medicos.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>DNI</th>
                            <th>Nombre Completo</th>
                            <th>Especialidad</th>
                            <th>Matricula</th>
                            <th class="col-xs-1"></th>
                            </thead>
                            @foreach($model as $medico)
                                <tr>
                                    <td>{{$medico->dni}}</td>
                                    <td>{{$medico->fullName}}</td>
                                    <td>
                                        @foreach($medico->especialidades as $especialidad)
                                            {{$especialidad->nombre}}
                                        @endforeach
                                    </td>
                                    <td>{{$medico->tipoMatricula()}} : {{$medico->matricula}}</td>
                                    <td>
                                        {{--
                                        <a href="{{route('medicos.detalle', $medico->id)}}" class="btn btn-xs btn-default"><span class="fa fa-info"></span></a>
                                        --}}
                                        <a href="{{route('medicos.editar',$medico->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                        <a href="{{route('medicos.eliminar',$medico->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
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

