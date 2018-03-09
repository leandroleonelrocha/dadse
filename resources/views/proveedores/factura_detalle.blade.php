@extends('template/template')

@section('content')
    
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
        <li><a href="{{route('proveedores.detalle',$models->Proveedores->id )}}">{{$models->Proveedores->razon_social}}</a></li>
        <li class="active">@if(isset($models->Proveedores))  Factura: {{$models->nro_factura}}  @endif</li>
    </ol>

    <div class="row">
    <div class="col-xs-12">
    
        <div class="panel ">
            <div class="panel-heading">
                <h1>Factura # {{$models->nro_factura}}
                @if(isset($models->Autorizacion))
                <a target="_blank" href="{{ route('proveedores.lastAutorizacion_pago', $models->id) }}" class="btn btn-default pull-right "><span class="fa fa-print"></span>Imprimir</a>
                @endif
                </h1>
                <span class="clearfix"></span>
            </div>
            <div class="panel-body">
                <div class="col-xs-12">
                    <div class="form-group">
                        @if(isset($models))
                            {!! Form::model($models,['route'=>'proveedores.postCrearFactura',  'id'=>'form'])  !!}

                            {!! Form::hidden('proveedores_id',$models->proveedores_id)  !!}
                        @else
                            {!! Form::open(['route'=>'proveedores.postCrearFactura',  'id'=>'form'])  !!}

                            {!! Form::hidden('proveedores_id',$proveedoresId)  !!}
                        @endif
                        <div class="col-xs-4">
                            {!! Form::label('Fecha Factura')  !!}
                            {!! Form::text('fecha',null,['class'=>'form-control date']) !!}
                        </div>
                        <div class="col-xs-4">
                            {!! Form::label('Número Factura')  !!}
                            {!! Form::text('nro_factura',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-xs-4">
                            {!! Form::label('Import Total')  !!}
                            {!! Form::text('total_facturado', $models->FacturasItems->sum('precio_unitario'),['class'=>'form-control']) !!}
                        </div>
                        {{--
                        <div class="col-xs-3">

                            {!! Form::label('Observaciones')  !!}
                            {!! Form::text('observaciones',null,['class'=>'form-control']) !!}
                        </div>
                        --}}
                        <div class="col-xs-1" style="margin-top: 2.3%">
                     
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-xs-12">
                    <div class="form-group">
                            <h3>Items</h3>
                       
                        {!! Form::open(['route'=>'proveedores.postAddItems']) !!}

                        {!! Form::hidden('facturas_id',$models->id)  !!}

                        <div class="col-xs-4">
                            {!! Form::label('Cantidad')  !!}
                            <input type="text" name="cantidad" class="cantidad form-control">
                        </div>
                        <div class="col-xs-4">
                            {!! Form::label('Detalle')  !!}
                            <input type="text" name="detalle" class="detalle form-control">
                        </div>
                        <div class="col-xs-4">
                            {!! Form::label('Precio Unitario')  !!}
                            <input type="text" name="precio_unitario" class="unitario form-control">
                        </div>
                       
                        <div class="col-xs-3" style="margin-top: 2.3%">
                            <button  type="submit" class="add btn btn-primary">Agregar Item</button>
                        </div>
                         {!! Form::close() !!}
                    </div>
                </div>


                @if(isset($models))
                <div class="col-xs-12">
                    <hr>
                    <table class="table">
                        <thead>
                        <th> Cant.</th>
                        <th> Detalle</th>
                        <th> $ Importe</th>
                        <th> # N° Caso</th>
                        <th> # N° Autorización</th>
                        
                        </thead>
                        <tbody class="items">
                        @if(isset($models))
                            @foreach($models->FacturasItems as $items)
                                <tr>
                                    <td>{{$items->cantidad}}</td>
                                    <td>{{$items->detalle}}</td>
                                    <td>$ {{ number_format($items->precio_unitario,2)}}</td>
                                    <td>
                                        {{$models->casos_id}}
                                        {{--@foreach($items->Prestaciones as $prestacion)--}}
                                            {{--<a href="#">Prestacion: {{$prestacion->id}}</a>--}}
                                            {{--<label class="label label-success">Resolucion : {{$prestacion->resolucion}}</label><br>--}}
                                            {{--<a href="{{route('casos.show',$prestacion->Casos->id)}}">Caso: {{$prestacion->Casos->id}}</a>--}}
                                            {{--<br>--}}
                                        {{--@endforeach--}}
                                    </td>
                                    <td><?php $c = 0?>
                                            @foreach($models->Caso->AyudaDirecta as $aD)
                                             @if($c%2)
                                            ,
                                            @endif
                                            {{$aD->id }}
                                            <?php  $c++?>
                                            @endforeach
                                    </td>
                                     <td><a href="{{route('proveedores.deleteItem',$items->id)}}" class="btn-delete btn btn-xs btn-default"><span class="fa fa-trash"></span></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                @endif

            </div>

            {{--
            @if(count($models->FacturasItems) == count($resolucion))
                <div class="panel-footer">
                        <a href="{{route('proveedores.autorizarPago',$models->id)}}" class="btn btn-default btn-block" >Autorizar pago </a>
                </div>
            @else
            
            @endif
            --}}

            @if(count($models->Autorizacion) > 0)
            <a href="javascript:void(0)" class="btn btn-default btn-block"  >Autorizar pago </a>
            @else
            <a href="javascript:void(0)" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal" >Autorizar pago </a>
            
            @endif
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Autorización de pagos</h4>
                </div>
                <div class="modal-body">
                    <div class="panel ">
                        <div class="panel panel-body">
                            {!! Form::open(['route'=>'proveedores.autorizarPago', 'class' => 'form-modal']) !!}

                            {!! Form::label('Remito en Foja N°') !!}
                            {!! Form::text('remito_foja',null,['class'=>'form-control']) !!}


                            {!! Form::label('Factura en Foja N°') !!}
                            {!! Form::text('factura_foja',null,['class'=>'form-control']) !!}

                            {!! Form::label('Troqueles en Foj/sa N°') !!}
                            {!! Form::text('troqueles_foja',null,['class'=>'form-control']) !!}

                            {!! Form::label('Forma de Pago') !!}
                            {!! Form::select('forma_pago',config('custom.forma_pago') ,null, ['class'=>'form-control']) !!}

                            {!! Form::hidden('facturas_id', $models->id) !!}    
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
    $('.btn-delete').click(function(){
       if(!confirm('Desea Borrar este Item?'))
           return false;  
    });
</script>
@endsection