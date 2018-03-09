@extends('template/template')
@section('titulo')
    Prestación # {{$model->id}}
@endsection

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li><a href="{{route('casos.show',$model->Casos->id)}}">Caso # {{ $model->Casos->id }}</a></li>
        <li class="active">Prestación # {{$model->id}}</li>
    </ol>

    <div class="row">
        <div class="col-xs-12 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Prestación</h4>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Precio unitario</th>
                            <th>Total</th>
                            <th>Estado</th>
                            </thead>
                            <tr>
                                <td>{{$model->cantidad}} {{$model->unidad_medida}}</td>
                                <td>{{$model->descripcion}}</td>
                                <td>$ {{number_format($model->importe_asignado,2)}}</td>
                                <td>$ {{number_format($model->cantidad * $model->importe_asignado,2)}}</td>
                                <td><label class="label label-primary">{{$model->estadoNombre}}</label></td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-12 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Intervenciones</h4>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                                <th>#</th>
                                <th>Acción</th>
                                <th></th>
                                <th></th>
                            </thead>

                            @if($model->estado == 2 || $model->estado == 12)
                            <tr>
                                <td> 1</td>
                                <td>Informe Médico</td>
                                <td>
                                    <a href="{{route('prestaciones.informes',$model->id)}}"
                                       class="btn btn-default text-sm" title="Informe"><span
                                                class="text-bold text-primary">IM</span></a>
                                </td>
                                <td></td>

                            </tr>
                            @endif
                            @if($model->estado == 10 || $model->estado == 11 || $model->estado == 12)
                            <tr>
                                <td> 2</td>
                                <td>Dictamen Médico</td>
                                <td>
                                    <a href="{{route('dictamenMedico.index',$model->id)}}"
                                       class="btn btn-default text-sm"><span class="text-bold text-primary">DM</span></a>
                                </td>
                                <td>
                                    @if( $model->estado == 12)
                                        <a target="_blank" href="{!! route('prestaciones.imprimirPresupuestos',$model->id) !!}"
                                           class="btn btn-xs btn-default  "><span class="fa fa-print"></span></a>
                                    @endif
                                </td>

                            </tr>
                            @endif
                            @if($model->estado == 12)
                            <tr>
                                <td> 3</td>
                                <td>Adelantos</td>
                                <td>
                                    <a href="{{route('prestaciones.adelantos',$model->id)}}"
                                       class="btn btn-default"><span class="text-bold text-primary">AL</span>
                                    </a>

                                </td>
                                <td></td>

                            </tr>
                            @endif
                            @if($model->estado == 7 )
                            <tr>
                                <td>4</td>
                                <td>Ayuda Directa</td>
                                <td class="text-left">
                                     <a target="_blank" href="{!! route('ayudaDirecta.pdf',$model->id) !!}" class="btn btn-sm btn-default">
                                         <em class="fa fa-print"></em>
                                         <span class="hidden-xs hidden-sm">Imprimir</span>
                                     </a>
                                </td>

                                <tr>
                            @endif

                            {{--
                                @if($model->estado == 12 || $model->estado == 7)
                                <tr>
                                    <td>5</td>
                                    <td>Facturación</td>
                                    <td>
                                        <a href="{{route('prestaciones.facturar', $model->id)}}"
                                           class="btn btn-default text-sm" title="Facturar"><span
                                                    class="text-bold text-primary">FC</span></a>
                                    </td>
                                    <td></td>
                                </tr>
                                @endif
                            --}}

                            @if($model->estado == 10 ||  $model->estado == 11  ||  $model->estado == 12 )
                                @if($model->Presupuestos->count() > 0)
                                    <tr>
                                        <td> 6</td>
                                        <td>Presupuestos Solicitados</td>
                                        <td>
                                            <button class="btn btn-default  "><span class="text-bold text-primary">PR</span></button>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{!! route('prestaciones.imprimirPresupuestos',$model->id) !!}"
                                               class="btn btn-xs btn-default  "><span class="fa fa-print"></span></a>
                                        </td>

                                    </tr>

                                @endif
                            @endif

                            @if($model->estado == 12)
                            <tr>
                                <td>7</td>
                                <td>Adjudicación de Presupuesto</td>
                                <td>
                                    <button class="btn btn-default"><span class="text-bold text-primary">AP</span></button>
                                </td>
                                <td>
                                    <a target="_blank" href="{!! route('dictamenMedico.imprimirAdjudicacion',$model->id) !!}"
                                       class="btn btn-xs btn-default  "><span class="fa fa-print"></span></a>
                                </td>
                            </tr>
                            @endif

                            <tr>
                                <td> 8</td>
                                <td>Resolución</td>
                                <td>
                                    @if(empty($model->resolucin))
                                    <a href="{!! route('prestaciones.asignarResolucion',$model->id) !!}" class="btn btn-sm btn-default">
                                        <em class="fa fa-plus-square text-success"></em>
                                        <span class="hidden-xs hidden-sm">Ingresar</span>
                                    </a>
                                    @else
                                    <label class="label label-success">{{ $model->resolucion }}</label>
                                    @endif
                                </td>
                                <td></td>
                                {{--
                                <td>
                                    <a href="{!! route('prestaciones.imprimirResolucion',$model->id) !!}"
                                       class="btn btn-xs btn-default" target="_blank" ><span class="fa fa-print"></span></a>
                                </td>
                                --}}
                            </tr>
                            @if($model->estado != 4 && $model->estado != 7)
                            <tr>
                                <td> 9</td>
                                <td>Evaluación social</td>
                                <td>
                                    @if(count($model->EvaluacionSocial) > 0)
                                        @if($model->EvaluacionSocial->users_id == Auth::user()->id)
                                            <a href="{{ route('prestacion.evaluacionSocial',$model->id) }}" class="btn btn-sm btn-default" title="Informe">
                                                <em class="fa fa-folder-open text-primary"></em>
                                                <span class="hidden-sm hidden-xs"></span>
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default" title="Informe" disabled="disabled">
                                                <em class="fa fa-folder-open text-primary"></em>
                                                <span class="hidden-sm hidden-xs"></span>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{route('prestacion.evaluacionSocial',$model->id)}}" class="btn btn-sm btn-default" title="Informe">
                                            <em class="fa fa-plus-square text-success"></em>
                                            <span class="hidden-xs hidden-sm">Ingresar</span>
                                        </a>
                                    @endif    
                                   
                                </td>
                                <td>
                                    @if(count($model->EvaluacionSocial) > 0)
                                      <a target="_blank" href="{!! route('prestaciones.imprimirResolucionSocial',$model->id) !!}"
                                           class="btn btn-xs btn-default  "><span class="fa fa-print"></span></a>
                                    @endif       
                                </td>
                            </tr>
                            @endif
                            @if(count($model->EvaluacionSocial) > 0)
                            <tr>
                                <td> 10</td>
                                <td>Solicitar alto costo</td>
                                <td>

                                    @if(count($model->AltoCosto) == 0)
                                    <a href="{{route('altoCosto',$model->id)}}"
                                       class="btn btn-default text-sm" title="Alto costo">
                                       <span class="text-bold text-primary">AC</span>
                                    </a>
                                    @else
                                     <a href="javascript:void(0)" class="btn btn-default text-sm" title="Alto costo">
                                       <span class="text-bold text-primary">AC</span>
                                    </a>
                                    @endif
                               
                                </td>
                                <td>
                               
                                </td>
                            </tr>
                            @endif
                            
                            {{--
                            @if($model->estado == 4 )
                            <tr>
                                <td>7</td>
                                <td>Ayuda Directa</td>
                                <td>
                                    <a href="{{route('ayudaDirecta.nuevo', $model->id)}}" class="btn btn-default"><span class="text-bold text-primary">AD</span></a>
                                </td>
                                <td>

                                </td>
                            </tr>
                            @endif
                            --}}
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

