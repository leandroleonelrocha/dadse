@extends('template/template')

@section('titulo', 'Casos Nuevos')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h3> Casos Pendientes de Ingreso <strong class="text-danger">Locales</strong></h3>

            <!-- START bar chart-->
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <th> Caso</th>
                        <th>Fecha Creacion</th>
                        <th>Tipo</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th class="col-xs-1"></th>
                        </thead>
                        @foreach($casos as $caso => $detalle)

                            @if($detalle->canal->sede_id == \Illuminate\Support\Facades\Auth::user()->sedes_id)
                                <tr>
                                    <td>{{$detalle->id}}</td>
                                    <td>{{date('d-m-Y h:i',strtotime($detalle->created_at))}}</td>

                                    <td>{{$detalle->tipo->nombre}}</td>
                                    <td>{{$detalle->destinatario->documento}}</td>
                                    <td>{{$detalle->destinatario->fullname}}</td>
                                    <td>
                                        <label class="label label-danger">{{$detalle->estado->nombre}}</label></td>
                                    <td>
                                        <a href="{{route('insol.pendientes.show',$detalle->id)}}"
                                           class="btn btn-sm btn-default"> <em class="fa fa-folder-open text-primary"></em>
                                            <span class="hidden-xs hidden-sm">Abrir</span> </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        {{--

        @permission('listar.casos.externo') 
        --}}
            <div class="col-xs-12">
                <h3> Casos Pendientes de Ingreso <strong class="text-danger">Externos</strong></h3>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <table id="datatable1" class="table table-striped">
                            <thead>
                            <th>Caso</th>
                            <th>Fecha Creacion</th>
                            <th>Tipo</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th class="col-xs-1"></th>
                            </thead>
                            
                            @foreach($casos as $caso => $detalle)
                                
                                @if($detalle->canal->sede_id != \Illuminate\Support\Facades\Auth::user()->sedes_id)
                                    <tr>

                                        <td>{{$detalle->id}}</td>
                                        <td>{{date('d-m-Y h:i',strtotime($detalle->created_at))}}</td>

                                        <td>{{$detalle->tipo->nombre}}</td>
                                        <td>{{$detalle->destinatario->documento}}</td>
                                        <td>{{$detalle->destinatario->fullname}}</td>
                                        <td>
                                            <label class="label label-danger">{{$detalle->estado->nombre}}</label></td>
                                        <td>
                                           <a href="{{route('insol.pendientes.show',$detalle->id)}}"
                                           class="btn btn-sm btn-default"> <em class="fa fa-folder-open text-primary"></em>
                                            <span class="hidden-xs hidden-sm">Abrir</span> </a>
                                        </td>
                                    </tr>
                                @endif

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
          {{--
          
        @endpermission
          --}}  

    </div>

@endsection


