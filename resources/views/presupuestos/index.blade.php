@extends('template/template')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Presupuestos</li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
            <h1><span class="fa fa-1x fa-user-md"></span> {{$seccion}}</h1>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-right">
                            {{--
                        <a href="{{route('presupuestos.nuevo')}}" class="btn btn-sm btn-default "><span
                                    class="fa fa-plus"></span></a>
                                    --}}
                    </div>
                </div>
                <div class="panel-body">

                    <div role="tabpanel">
                        <!-- Nav tabs-->
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab"><strong class="text-danger">Urgentes</strong>
                                 <div class="label label-danger">{{$prestaciones_pedidos->where('caracter',1)->where('estado',9)->count()}}</div>
                            </a>


                            </li>
                            <li role="presentation">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                 Ordinarios
                                 <div class="label label-warning">{{$prestaciones_pedidos->where('caracter',0)->where('estado',8)->count()}}</div>

                                </a>
                                                           
                            </li>

                            <li role="presentation"><a href="#todos" aria-controls="profile" role="tab"
                                                       data-toggle="tab">Solicitados Históricos</a>
                            </li>


                        </ul>


                        {!! Form::open(['route'=>'postSolicitudPresupuesto']) !!}
                        
                        <div class="tab-content">
                            <div id="home" role="tabpanel" class="tab-pane active">
                                <table class="table table-striped">
                                    <thead>
                                    <th></th>
                                  
                                    <th>Fecha</th>
                                    <th># Caso</th>
                                    <th>Prestación</th>
                                    <th>Cant Solicitada</th>
                                    
                                    <th>Informe</th>
                                    <th>Por</th>
                                    </thead>
                                    <!-- SOLICITUDES URGENTES -->
                                     @forelse($prestaciones_pedidos->where('estado',9)->where('caracter',1) as $pedido)
                                        
                                        <tr>
                                            <td>
                                                <div class="checkbox c-checkbox">
                                                    <label>
                                                        <input class="prestaciones_urgentes_id"
                                                               name="prestaciones_urgentes_id[]"
                                                               value="{{$pedido->Prestacion->id}}" type="checkbox">
                                                        <span class="fa fa-check"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            {!! Form::hidden('prestaciones_pedidos_urgentes_id[]', $pedido->id) !!}
                                   
                                            <td>{{$pedido->Prestacion->created_at}}</td>
                                            <td>
                                                <a href="{{route('casos.show',$pedido->Prestacion->Casos->id)}}">
                                                    Casos : {{$pedido->Prestacion->Casos->id}} </a>-
                                                Prestacion : {{$pedido->Prestacion->id}}</td>
                                            <td>
                                                {{$pedido->cantidad_solicitada}}
                                                {{$pedido->Prestacion->unidad_medida}} -
                                                <strong>{{$pedido->Prestacion->descripcion}}</strong>
                                            </td>
                                            <td>
                                                <a href="{{route('prestaciones.informes',$pedido->Prestacion->id)}}"
                                                   class="btn btn-md btn-default"><span class="fa fa-info"></span></a>
                                            </td>
                                            <td></td>
                                          

                                        </tr>
                                    @empty

                                    @endforelse


                                </table>
                                <hr>

                                @if(!empty($pedido))
                                    <a class="modal_proveedores btn btn-default" data-id="{{$pedido->id}}">Solicitar
                                        Presupuesto</a>
                                    </a>
                                @endif
                            </div>
                            <!-- SOLICITUDES ORDINARIAS-->
                            <div id="profile" role="tabpanel" class="tab-pane">
                                <table class="table table-striped">
                                    <thead>
                                    <th></th>
                                    <th>Fecha</th>
                                    <th># Caso</th>
                                    <th>Producto</th>
                                    <th>Solicitada</th>
                                    
                                    <th>Informe</th>
                                    <th>Por</th>
                                    </thead>
                                    <!-- SOLICITUDES ORDINARIAS-->
                                    @forelse($prestaciones_pedidos->where('estado',8)->where('caracter',0) as $pedido)
                                        {!! Form::hidden('pedido_ordinarias', $pedido->caracter) !!}
                                        <tr>
                                            <td>
                                                <div class="checkbox c-checkbox">
                                                    <label>
                                                        <input class="prestaciones_ordinarios_id"
                                                               name="prestaciones_ordinarios_id[]"
                                                               value="{{$pedido->Prestacion->id}}" type="checkbox">
                                                        <span class="fa fa-check"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            {!! Form::hidden('prestaciones_pedidos_ordinarios_id[]', $pedido->id) !!}
                                            
                                            <td>{{$pedido->Prestacion->created_at}}</td>

                                            <td>
                                                <a href="{{route('casos.show',$pedido->Prestacion->Casos->id)}}">
                                                    Casos : {{$pedido->Prestacion->Casos->id}} </a>-
                                                Prestacion : {{$pedido->Prestacion->id}}</td>
                                            <td>
                                                {{$pedido->cantidad_solicitada}}
                                                {{$pedido->Prestacion->unidad_medida}} -
                                                <strong>{{$pedido->Prestacion->descripcion}}</strong>
                                            </td>
                                            <td>
                                                <a href="{{route('prestaciones.informes',$pedido->Prestacion->id)}}"
                                                   class="btn btn-md btn-default"><span class="fa fa-info"></span></a>
                                            </td>
                                            <td></td>
                                          

                                        </tr>
                                    @empty

                                    @endforelse
                                </table>
                                <hr>

                                @if(!empty($pedido))
                                    <a class="modal_proveedores btn btn-default" data-id="{{$pedido->id}}">Solicitar
                                        Presupuesto</a>
                                    </a>
                                @endif

                                {{--@if(count($productos_ordinarios) > 0)--}}
                                {{--@foreach($productos_ordinarios as $producto)--}}
                                {{--<tr>--}}
                                {{--<td>--}}
                                {{--<div class="checkbox c-checkbox">--}}
                                {{--<label>--}}
                                {{--<input class="prestaciones_ordinarios_id"--}}
                                {{--name="prestaciones_ordinarios_id[]"--}}
                                {{--value="{{$producto->id}}" type="checkbox">--}}
                                {{--<span class="fa fa-check"></span>--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                {{--</td>--}}
                                {{--<td>{{$producto->id}}</td>--}}
                                {{--<td>{{$producto->created_at}}</td>--}}
                                {{--<td>--}}
                                {{--<a href="{{route('casos.show',$producto->Casos->id)}}">--}}
                                {{--Caso : {{$producto->Casos->id}} </a>---}}
                                {{--Prestacion : {{$producto->id}}</td>--}}
                                {{--<td>--}}
                                {{--{{$producto->cantidad}}--}}
                                {{--{{$producto->unidad_medida}} ---}}
                                {{--<strong>{{$producto->descripcion}}</strong>--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                {{--<a href="{{route('prestaciones.informes',$producto->id)}}"--}}
                                {{--class="btn btn-md btn-default"><span class="fa fa-info"></span></a>--}}
                                {{--</td>--}}
                                {{--<td>MB</td>--}}

                                {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--@endif  --}}
                                {{--</table>--}}
                                {{--<hr>--}}
                                {{--@if(count($productos_ordinarios) > 0)--}}
                                {{--<a class="modal_proveedores btn btn-default" data-id="{{$producto->id}}">Solicitar--}}
                                {{--Presupuesto</a>--}}
                                {{--</a>--}}
                                {{--@endif--}}
                            </div>


                            <div id="todos" role="tabpanel" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($compulsas as $compulsa)
                                       <div class="panel panel-default">
                                          <div class="panel-heading" id="headingOne" role="tab">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$compulsa->id}}" aria-expanded="true" aria-controls="collapseOne"> Compulsa #{{$compulsa->id}} </a> </h4>
                                          </div>
                                          <div class="panel-collapse collapse" id="collapseOne{{$compulsa->id}}" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                 <div class="table-responsive">
                                                   <table class="table table-striped table-hover">
                                                      <thead>
                                                         <tr>
                                                            <th>#</th>
                                                            <th>Descripción</th>
                                                            <th>Caso/Prestación</th>
                                                            <th>Cantidad Solicitada</th>
                                                            <th>Cantidad Ofertada</th>
                                                            <th>Precio Unitario</th>
                                                            <th>Total</th>
                                                            <th>Estado</th>
                                                            <th>Proveedor</th>
                                                            
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach($compulsa->Presupuestos as $presupuesto)
                                                         <tr>
                                                            <td>{{$presupuesto->id}}</td>
                                                            <td>{{isset($presupuesto->Prestaciones->first()->descripcion) ? $presupuesto->Prestaciones->first()->descripcion : ''}}</td>
                                                            <td>{{isset($presupuesto->Prestaciones->first()->Casos->id) ? $presupuesto->Prestaciones->first()->Casos->id : ''}} /{{isset($presupuesto->Prestaciones->first()->id) ? $presupuesto->Prestaciones->first()->id : ''}} </td>
                                                            <td>{{isset($presupuesto->Pedido->cantidad_solicitada) ? $presupuesto->Pedido->cantidad_solicitada : ''}}</td>
                                                            <td>{{isset($presupuesto->cantidad_ofertada) ? $presupuesto->cantidad_ofertada : ''}}</td>
                                                            <td>${{$presupuesto->precio_unitario}}</td>
                                                            <td>${{$presupuesto->total}}</td>                                               
                                                            <td>{{$presupuesto->estado_nombre}}</td>
                                                            <td>{{isset($presupuesto->Proveedores->razon_social) ? $presupuesto->Proveedores->razon_social : '' }}</td>
                                                         </tr>
                                                         @endforeach
                                                      </tbody>
                                                   </table>
                                                </div>
                                                <br>
                                                @if($compulsa->Presupuestos->count() > 0 )
                                                    <a href="{{route('proveedores.actaDeApertura', $compulsa->Presupuestos->first()->Pedido->Prestacion   )}}" class="btn btn-sm btn-default pull-right" target="_blank">
                                                    <em class="fa fa-folder-open text-primary"></em>
                                                    <span class="hidden-xs hidden-sm">Acta De Apertura</span>
                                                    </a>
                                                @endif
                                            </div>
                                          </div>
                                       </div>
                                     @endforeach
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END bar chart-->
    </div>


    @endsection

    @section('modal')
            <!-- Modal Small-->
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 id="myModalLabelSmall" class="modal-title">Seleccionar Proveedor</h4>
                </div>
                <div class="modal-body">
                    <br>
                    {!! Form::hidden('prestaciones_id',null,['id'=>'prestaciones_id']) !!}

                    <div class="col-xs-4">
                        {!! Form::label('Lim. de presentación') !!}
                        {!! Form::text('fecha_cierre',null,['class'=> 'datePicker form-control']) !!}
                    </div>
                    <div class="col-xs-4" id="fecha_apertura_sobre">
                        {!! Form::label('Apertura de Sobres') !!}
                        {!! Form::text('fecha_apertura_sobre',null,['class'=> 'datePicker form-control']) !!}
                    </div>
                    
                    <table class="table table-striped">
                        <thead>
                        <th></th>
                        <th>#</th>
                        <th>Tipo de proveedor</th>
                        <th>Cantidad de proveedores</th>
                        
                        </thead>
                        <tbody>

                        @foreach($proveedores_tipo as $tipo)
                            
                            <tr>
                                <td class=" col-xs-1">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                            <input name="tipo[]" value="{{$tipo->id}}" type="checkbox">
                                            <span class="fa fa-check"></span>
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    {{$tipo->id}}
                                </td>
                                <td>
                                    {{$tipo->nombre}}
                                </td>

                                <td>{{$tipo->Proveedores()->where('sedes_id', \Illuminate\Support\Facades\Auth::user()->sedes_id)->get()->count()}}</td>
                               
                            </tr>

                        @endforeach
                        </tbody>

                    </table>

                </div>
                <div class="modal-footer">

                    {!!  Form::submit('Enviar',['class'=>'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection



@section('javascript')
    <script>


        $('.prestaciones_ordinarios_id').on('click', function () {
            $('.prestaciones_urgentes_id').removeAttr('checked');
        });

        $('.prestaciones_urgentes_id').on('click', function () {
            $('.prestaciones_ordinarios_id').removeAttr('checked');
        });

        $('.modal_proveedores').on('click', function () {
            $('#prestaciones_id').val($(this).attr('data-id'));
            $('#myModal').modal('show');
        });

        $('.modal_proveedores_status').on('click', function () {
            $('#myModalStatus').modal('show');
        });

        $("#fecha_apertura_sobre").css('display','none');

        $('a[href=#home]').on('click', function (ev) {
            $("#fecha_apertura_sobre").css('display','none');
        })

        $('a[href=#profile]').on('click', function (ev) {
            $("#fecha_apertura_sobre").css('display','block');
        })

    </script>
@endsection

