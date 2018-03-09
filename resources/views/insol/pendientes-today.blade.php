@extends('template/template')

@section('titulo', 'Casos Nuevos del día')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Casos Nuevos del día</h4>
                </div>
                <div class="panel-body table-responsive">
                    <table id="datatable" class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Documento</th>
                            <th>Destinatario</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($casos) > 0)
                            @foreach($casos as $caso)
                                <tr>
                                    <td>
                                        <small class="text-warning">NUEVO</small>&nbsp;&nbsp;
                                        #{{ $caso->id }}
                                    </td>
                                    <td>{{ date('d-m-Y h:i',strtotime($caso->created_at)) }}</td>
                                    <td>{{ $caso->tipo->nombre }}</td>
                                    <td>{{ $caso->destinatario->documento }}</td>
                                    <td>{{ $caso->destinatario->fullname }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('insol.pendientes.show', $caso->id) }}"
                                           class="btn btn-sm btn-default"> <em class="fa fa-folder-open text-primary"></em>
                                            <span class="hidden-xs hidden-sm">Abrir</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6"><em class="fa fa-times-circle text-danger"></em> Aún no hay casos nuevos el dia de hoy.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection