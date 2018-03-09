@extends('template/template')
@section('titulo')
    INSOL CASO #{{ $casos->id }}
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
           
            <h1>INSOL - Caso # {{ $casos->id }}</h1>
            <!-- START bar chart-->

            <div class="panel panel-default">

                    <div class="panel-body">
                    @if($casos->destinatario_type == 'persona')
                        <div class="row">

                            <div class="col-sm-12">
                                @if(!is_null($beneficiario->imagen))
                                    <img width="50" class="img-thumbnail " src="{{$beneficiario->imagen}}">
                                @else
                                    <p class="img-thumbnail img-circle"><span  class="icon-user"></span></p>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <p class="lead bb">Datos Personales</p>
                                <form class="form-horizontal p-20">

                                    <div class="form-group">
                                        <div class="col-sm-4">Apellido Nombre: </div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->fullname}}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">{{$beneficiario->tipo_documento->nombre}}:</div>
                                        <div class="col-sm-8">
                                            <strong> {{$beneficiario->documento}} </strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Nacimiento:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->fecha_nacimiento}}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">E-mail:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->email}}</strong>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <p class="lead bb">Ubicación</p>
                                <form class="form-horizontal p-20">

                                    <div class="form-group">
                                        <div class="col-sm-4">Provincia:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->vivienda->provincia or '' }}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Ciudad:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->vivienda->ciudad or '' }}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Calle:</div>
                                        <div class="col-sm-8">
                                            <strong>{{ $beneficiario->hogar->vivienda->tipo_calle->nombre or '' }},  {{ $beneficiario->hogar->vivienda->calle or '' }}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Nro:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->vivienda->numero or ''}}</strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">Piso:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->vivienda->piso or ''}}</strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">Barrio:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->vivienda->barrio or '' }}</strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">CP:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->vivienda->codigo_postal or '' }}</strong>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    @else
                        <div class="row">


                            <div class="col-md-6">
                                <p class="lead bb">Datos Organización</p>
                                <form class="form-horizontal p-20">

                                    <div class="form-group">
                                        <div class="col-sm-4"> Nombre: </div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->orgNombre}}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Cuit:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->orgCuit }}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">E-mail:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->orgEmail}}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Teléfono:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->orgTelefono}}</strong>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-6">
                                <p class="lead bb">Ubicación</p>
                                <form class="form-horizontal p-20">

                                    <div class="form-group">
                                        <div class="col-sm-4">Provincia:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->calle}}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Ciudad:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario->hogar->ciudad}}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Calle:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario}}</strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">Nro:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario}}</strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">Piso:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario}}</strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">Barrio:</div>
                                        <div class="col-sm-8">
                                            <strong>{{$beneficiario}}</strong>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif

                     {!! Form::open(['route' => ['insol.pendientes.update', $casos->id], 'method' => 'post', 'id' => 'frm-aceptar-solicitud']) !!}
                        {{--
                        <div class="form-group">
                            <p class="lead bb">Intervenciones</p>
                           <div class="col-sm-10">
                              <div class="checkbox c-checkbox needsclick">
                                 <label class="needsclick">
                                    <input type="checkbox" value="1" name="ayuda_directa" class="needsclick">
                                    <span class="fa fa-check"></span>Ayuda directa</label>
                              </div>
                              <div class="checkbox c-checkbox needsclick">
                                 <label class="needsclick">
                                    <input type="checkbox" value="1" name="alto_costo"  class="needsclick">
                                    <span class="fa fa-check"></span>Alto costo</label>
                              </div>
                           </div>
                        </div>    
                        --}}


                    
                    <div class="row">

                            <div class="col-md-6">
                                <p class="lead bb">Intervención</p>
                                <form class="form-horizontal p-20">

                                    <div class="form-group">
                                        <div class="col-sm-4">Tipo: </div>
                                        <div class="col-sm-8">
                                            <strong>{{$casos->tipo->nombre}}</strong>
                                        </div>
                                    </div>
                                 
                                </form>
                            </div>

                            <div class="col-md-6">
                                <p class="lead bb">Mandatarios o Solicitante</p>
                                <form class="form-horizontal p-20">
                                  
                                    @if(!is_null($casos->mandatarios))
                                          @foreach($casos->mandatarios as $mandatario)
                                                <div class="col-sm-4"> Nombre y Apellido:</div> <strong>{{ $mandatario->fullname }}</strong>
                                                <div class="col-sm-8"> Documento:</div> <strong>{{ $mandatario->tipo_documento->nombre }} {{ $mandatario->documento }}</strong>
                                          @endforeach
                                    @endif

                                      @if(!is_null($casos->solicitante))
                                            <div class="col-sm-4"> Nombre y Apellido: </div><strong>{{ $casos->solicitante->fullname }}</strong><br />
                                             <div class="col-sm-8"> Documento:</div> <strong>{{ $casos->solicitante->tipo_documento->nombre }} {{  $casos->solicitante->documento }}</strong>
                                      @endif

                                      @if(empty($casos->mandatarios) && is_null($casos->solicitante) )
                                          <strong> Retira el Titular. </strong>
                                      @endif
                            
                                 
                                </form>
                            </div>
                   </div>    

                    {!! Form::open(['route' => ['insol.pendientes.update', $casos->id], 'method' => 'post', 'id' => 'frm-aceptar-solicitud']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['route' => ['insol.pendientes.rechazarSolicitud', $casos->id], 'method' => 'post', 'id' => 'frm-rechazar-solicitud']) !!}
                    {!! Form::close() !!}
                    
                </div>
            </div>
            <div class="panel-footer">
                <a href="javascript:;" role="button" id="btn-aceptar-solicitud" class="btn btn-primary btn-block">Aceptar CASO</a>
                <a href="javascript:;" role="button" id="btn-rechazar-solicitud" class="btn btn-danger btn-block">Rechazar CASO</a>
            </div>
            
        </div>
            <!-- END bar chart-->
    </div>

    {{-- Formularios --}}
    {{--{!! Form::open(['route' => ['insol.prestaciones.recategorizar', $casos->id, ':idPrestacion:'], 'method' => 'patch', 'id' => 'frm-recategorizar-prestacion']) !!}--}}
        {{--<input type="hidden" name="clasificacion_id" value="0" id="recategorizar-prestacion-clasificacion-id">--}}
    {{--{!! Form::close() !!}--}}

@endsection

{{--@section('modal')--}}
    {{--<!-- Modal Small-->--}}
    {{--<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" class="modal fade">--}}
        {{--<div class="modal-dialog modal-md">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" data-dismiss="modal" aria-label="Close" class="close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                    {{--<h4 id="myModalLabelSmall" class="modal-title">Clasificaciones</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                   {{--{!! Form::open() !!}--}}

                        {{--<table class="table table-striped">--}}


                        {{--</table>--}}

                    {{--{!! Form::close() !!}--}}

                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

@section('javascript')
    <script type="text/javascript">
//        var prestacion_id = 0;
//        var formRecategorizarPrestacion = $('#frm-recategorizar-prestacion');
//
//        $('.recategorizar_prestacion').on('click',function(){
//             prestacion_id = $(this).data('id');
//        });
//
//        $('.btn-recategorizar-prestacion').on('click', function(e) {
//
//            e.preventDefault();
//
//            if (confirm('¿Está seguro de querer recategorizar esta prestación?'))
//            {
//                var action = formRecategorizarPrestacion.attr('action');
//                formRecategorizarPrestacion.attr('action', action.replace(':idPrestacion:', prestacion_id));
//                $('#recategorizar-prestacion-clasificacion-id').val($(this).data('id'));
//                formRecategorizarPrestacion.submit();
//            }
//
//        });

        $('#btn-aceptar-solicitud').on('click', function(e) {
            e.preventDefault();

            if (confirm('¿Desea aceptar el CASO?'))
                $('#frm-aceptar-solicitud').submit();
        });

        $('#btn-rechazar-solicitud').on('click',function(e){
            if(confirm('¿Desea rechazar el CASO?'))
                $('#frm-rechazar-solicitud').submit();
        });
    </script>
@endsection

