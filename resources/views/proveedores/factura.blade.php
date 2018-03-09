@extends('template/template')

@section('content')

    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
        @if(isset($proveedor))
        <li><a href="{{route('proveedores.detalle', $proveedor->id)}}"> {{$proveedor->razon_social}} </a></li>
        @endif
        <li class="active">@if(isset($models)) {{$models->razon_social}} @else Nueva Factura @endif</li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                Nueva Factura
            </div>
            <div class="panel-body">

                <div class="form-group">
                    @if(isset($models))
                        {!! Form::model($models,['route'=>'proveedores.postCrearFactura',  'id'=>'form'])  !!}

                        {!! Form::hidden('proveedores_id',$models->proveedores_id)  !!}
                    @else
                        {!! Form::open(['route'=>'proveedores.postCrearFactura',  'id'=>'form'])  !!}

                        {!! Form::hidden('proveedores_id',$proveedoresId)  !!}
                    @endif
                    <div class="col-xs-2">
                        {!! Form::label('Fecha Factura')  !!}
                        {!! Form::text('fecha',null,['class'=>'form-control date']) !!}
                    </div>
                    <div class="col-xs-2">
                        {!! Form::label('Número Factura')  !!}
                        {!! Form::text('nro_factura',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-2">
                        {!! Form::label('Importe Total')  !!}
                        {!! Form::text('total_facturado',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-2">
                        {!! Form::label('Número Liquidación')  !!}
                        {!! Form::text('nro_liquidacion',null,['class'=>'form-control']) !!}
                    </div>
                     <div class="col-xs-2">
                        {!! Form::label('Número Caso')  !!}
                        {!! Form::text('nro_caso',null,['class'=>'form-control']) !!}
                    </div>
                    {{--
                    <div class="col-xs-2">

                        {!! Form::label('Observaciones')  !!}
                        {!! Form::text('observaciones',null,['class'=>'form-control']) !!}
                    </div>
                    --}}
                    <div class="col-xs-2" style="margin-top: 2.3%">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>


                @if(isset($models))
                <div class="form-group">
                    <div class="col-xs-12">
                        <h3 class="text-center">Items</h3>
                    </div>
                    {!! Form::open(['route'=>'proveedores.postAddItems']) !!}

                    {!! Form::hidden('facturas_id',$models->id)  !!}

                    <div class="col-xs-1">
                        {!! Form::label('Cantidad')  !!}
                        <input type="text" name="cantidad" class="cantidad form-control">
                    </div>
                    <div class="col-xs-6">
                        {!! Form::label('Detalle')  !!}
                        <input type="text" name="detalle" class="detalle form-control">
                    </div>
                    <div class="col-xs-2">
                        {!! Form::label('Precio Unitario')  !!}
                        <input type="text" name="precio_unitario" class="unitario form-control">
                    </div>
                    <div class="col-xs-2">
                        {!! Form::label('Subtotal')  !!}
                        <input type="text" name="subtotal" class="subtotal form-control">
                    </div>
                    <div class="col-xs-1" style="margin-top: 2.3%">
                        <button  type="submit" class="add btn btn-primary">+</button>
                    </div>
                </div>


                <div class="col-xs-12">
                    <hr>
                    <table class="table">
                        <thead>
                        <th>Cant.</th>
                        <th>Detalle</th>
                        <th>$ Unit</th>
                        <th>S. Total</th>
                        
                        </thead>
                        <tbody class="items">
                        @if(isset($models))
                            @foreach($models->FacturasItems as $items)
                                <tr>
                                    <td>{{$items->cantidad}}</td>
                                    <td>{{$items->detalle}}</td>
                                    <td>{{$items->precio_unitario}}</td>
                                    <td>{{$items->subtotal}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                @endif

            </div>

        </div>
        </div>

    </div>

@endsection
