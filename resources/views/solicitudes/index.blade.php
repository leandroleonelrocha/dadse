@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1>Solicitudes</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>Nro.</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Estado Actual</th>

                            <th class="col-xs-1"></th>
                            </thead>
                            @foreach($solicitudes as $solicitud)
                                <tr>
                                    <td>{{$solicitud->id}}</td>
                                    <td>{{$solicitud->beneficiario_tipo}}</td>
                                    <td>{{$solicitud->PersonasFisicas->persona_fullname}}</td>
                                   
                                    <th><label class="label label-info"> {{ $solicitud->estado }} </label></th>
                                    <td>
                                        <a href="{{route('solicitudes.show', $solicitud->id)}}" class="btn btn btn-default"><span class="icon-info"></span> </a>
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

