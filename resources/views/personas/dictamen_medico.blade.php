@extends('template/template')
@section('css')
    <style>
        .mt10 {
            margin-top: 10px;
        }

        textarea {
            resize: none;
        }

        thead > tr > th {
            font-size: 13px;
            text-align: center;
        }

    </style>
@endsection

@section('content')
     <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li><a href="{{route('casos.show',$prestacion->Casos->id)}}">Caso # {{ $prestacion->Casos->id }}</a></li>
        <li><a href="{{route('prestaciones.detalles',$prestacion->id)}}"> Prestacion # {{$prestacion->id}}</a></li>
        <li class="active">Dictamen Médico</li>
        
    </ol>
    
    <div class="row">
        <div class="col-xs-12 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading">
                        <h4 class="m0">Dictámen médico</h4>
                        @if($prestacion->PresupuestoAdjudicado)
                        <a target="_blank" href="{{ route('dictamenMedico.imprimirAdjudicacion', $prestacion->id) }}" class="btn btn-default pull-right "><span class="fa fa-print"></span>Imprimir</a>
                        @endif
                    </div>
                    <div class="col-xs-12">
                        <div role="tabpanel">
                            <!-- Nav tabs-->
                            <ul role="tablist" class="nav nav-tabs">
                                <li data-class="tabs" role="presentation" class="active"><a href="#prestacion"
                                                                             aria-controls="prestacion" role="tab"
                                                                             data-toggle="tab"><strong>Prestación
                                            #{!! $prestacion->id !!}</strong></a>
                                </li>

                            </ul>

                            <div class="tab-content">

                             

                                        @if($prestacion->PresupuestoAdjudicado != null)
                                            @if($prestacion->PresupuestoAdjudicado->estado == 4)
                                                <span class="pull-right label label-success">Presupuesto adjudicada</span>
                                            @endif
                                        @else
                                            <a href="{!! route('dictamenMedico.noAdjudicar',$prestacion->id) !!}"
                                               class="btn btn-warning btn-xs pull-right">No Adjudicar</a>
                                        @endif
                                        <p>
                                            <a href="{{route('casos.show',$prestacion->Casos->id)}}">
                                                <small class="text-muted">Caso : {{$prestacion->Casos->id}} </small>
                                            </a>
                                        </p>
                                        <p>
                                            <small class="text-muted">Prestación:</small>
                                            <strong>{{$prestacion->id}}</strong>
                                        </p>
                                        <p>
                                            <small class="text-muted">Cantidad</small>
                                            <strong>{{$prestacion->cantidad}}</strong>
                                            <a href="{!! route('prestaciones.adelantos',$prestacion->id) !!}"
                                               class="btn btn-info btn-xs pull-right">ADELANTOS</a>
                                        </p>
                                        <p>
                                            <small class="text-muted">Categoría</small>
                                            <strong>{{$prestacion->categoria_id}}</strong>
                                        </p>
                                        <p>
                                            <small class="text-muted">Descripción</small>
                                            <strong>{{$prestacion->descripcion}}</strong>
                                        </p>

                                        <p>
                                            <small class="text-muted">Informe médico</small>
                                            <strong>{{isset($prestacion->Informe->medico_tratante) ? $prestacion->Informe->medico_tratante : '' }} - {{isset($prestacion->Informe->hospital_tratante) ? $prestacion->Informe->hospital_tratante : ''}}</strong>
                                        </p>
                                    </div>
                                    

                            </div>

                            <hr>

                            <table class="table table-striped">
                                <thead>
                                <th>Presupuesto Nro.</th>
                                <th>Proveedor</th>
                             
                                <th>Fecha Solicitud</th>
                                <th>Vencimiento</th>
                                <th>Apertura de Sobre</th>
                                <th>Cant Solicitada</th>
                                
                                <th>Cant Ofertada</th>
                                <th>$ Total Presupuestado</th>
                                <th>Observación</th>
                                <th class="text-right">Adjudicado</th>
                                <th></th>
                                <th></th>
                                </thead>
                                @forelse($prestacion->Presupuestos()->orderBy('total','asc')->get() as $presupuesto)
                                    <tr>
                                        <td class="text-center">
                                            #{{ $presupuesto->id }}
                                        </td>

                                        <td class="text-center">
                                            {{ $presupuesto->Proveedores->nombre }}: {{ $presupuesto->Proveedores->razon_social }}
                                        </td>

                                   


                                        <td class="text-center">
                                            {{ date('d/m/Y' ,strtotime($presupuesto->fecha_solicitud)) }}
                                        </td>

                                        <td class="text-center">
                                             @if($presupuesto->caracter)
                                                {{ date('d/m/Y' ,strtotime($presupuesto->fecha_cierre)) }}
                                            @endif
                                        </td>

                                        <td class="text-center">
                                               {{ isset($presupuesto->Compulsas->fecha_apertura_sobre) ? $presupuesto->Compulsas->fecha_apertura_sobre : ''  }}
                                        </td>
                                         <td class="text-center">
                                            {{ isset($presupuesto->Pedido->cantidad_solicitada) ? $presupuesto->Pedido->cantidad_solicitada : '' }}
                                        </td>

                                        <td class="text-center">
                                             @if(in_array($presupuesto->estado,[2,4]))
                                            {{ isset($presupuesto->cantidad_ofertada) ? $presupuesto->cantidad_ofertada : '' }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(in_array($presupuesto->estado,[2,4]))
                                                $ {{ $presupuesto->total }}
                                            @else
                                                <label class="label bg-danger">No cargado</label>
                                            @endif
                                        </td>

                                        <td class="text-center text-muted">
                                            {{ $presupuesto->observacion }}
                                        </td>


                                        <td class="text-center">

                                                @if($presupuesto->adjudicado == 0)
                                                    @if($presupuesto->total != 0)
                                                    <a href="#" class="btn btn-xs btn-success" data-toggle="modal"
                                                       data-target="#myModal" data-id="{{$presupuesto->id}}"><i
                                                                class="fa fa-check-square-o"></i></a>
                                                    @endif            
                                                @endif

                                                @if($presupuesto->adjudicado == 2)
                                                    <label>ANULADO</label>

                                                @endif
                                                @if($presupuesto->adjudicado == 1)
                                                    <label>ADJUDICADO</label>

                                                @endif

                                         
                                        </td>
                                        @if($presupuesto->adjudicado == 1)
                                        <td>
                                            <a target="_blank" href="{{ route('prestaciones.dictamen_medico', $presupuesto->id) }}" class="btn btn-default btn-xs"><span class="fa fa-print"></span></a>
                                        </td>
                                        <td>
                                           <a href="#" class="btn btn-xs btn-default" data-toggle="modal"
                                                       data-target="#modalRechazar" data-id="{{$presupuesto->id}}"><i
                                                                class="fa fa-trash"></i></a>
                                        </td>
                                        @endif
                                    </tr>
                                @empty
                                    <p>En espera de presupuestos.</p>
                                @endforelse

                            </table>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    @endsection

    @section('modal')

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Presupuesto <B>Adjudicado</B></h4>
                </div>
                <div class="modal-body">
                    <div class="panel ">
                        <div class="panel panel-body">
                            {!! Form::open(['route'=>'dictamenMedico.presupuestoAdjudicado','method' => 'post']) !!}
                            <p class="text-primary">*Ingrese una observación que acompañe al dictámen</p>
                            {!! Form::label('Observación') !!}
                            {!! Form::textarea('observacion_adjudicacion',null,['class'=>'form-control']) !!}
                            {!! Form::hidden('presupuesto_id') !!}
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRechazar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Anular Presupuesto</h4>
                </div>
                <div class="modal-body">
                    <div class="panel ">
                        <div class="panel panel-body">
                            {!! Form::open(['route'=>'dictamenMedico.anularAdjudicar','method' => 'post']) !!}
                            <p class="text-primary">*Ingrese una observación que acompañe a la Anulación</p>
                            {!! Form::label('Observación') !!}
                            {!! Form::textarea('observacion_adjudicacion',null,['class'=>'form-control']) !!}
                            {!! Form::hidden('presupuesto_id') !!}
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $('#modalRechazar').on('show.bs.modal', function (e) {
            var presupuesto_id = $(e.relatedTarget).data('id');
            console.log(presupuesto_id)
            $(e.currentTarget).find('input[name="presupuesto_id"]').val(presupuesto_id);

        });


    </script>
    <script type="text/javascript">
        $('#myModal').on('show.bs.modal', function (e) {
            var presupuesto_id = $(e.relatedTarget).data('id');
            console.log(presupuesto_id)
            $(e.currentTarget).find('input[name="presupuesto_id"]').val(presupuesto_id);

        });


    </script>
@endsection