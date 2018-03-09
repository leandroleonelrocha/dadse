@extends('template/template')
@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li><a href="{{route('casos.show',$prestacion->Casos->id)}}">Caso # {{ $prestacion->Casos->id }}</a></li>
        <li><a href="{{route('prestaciones.detalles',$prestacion->id)}}">Prestación # {{ $prestacion->id }}</a></li>
        <li class="active">Facturar</li>
    </ol>

    <div class="panel panel-default">
        <div class="panel-body">
            <legend>Prestación</legend>
            <div class="col-xs-12">
                <table class="table table-stripped">
                    <thead>
                    <!--   <th><input id="check_all" type="checkbox"></th> -->
                    <th>Cant.</th>
                    <th>Um.</th>
                    <th>Producto</th>
                    <th>$ P. Unitario</th>
                    <th>$ S. Total</th>
                    </thead>
                    <tr>
                        <!-- <td><input class="check_presentacion" type="checkbox"></td> -->
                        <td>{{$prestacion->cantidad}}</td>
                        <td>{{$prestacion->unidad_medida}} </td>
                        <td> {{$prestacion->descripcion}}</td>
                        <td>$ {{$prestacion->importe_asignado}}</td>
                        <td>$ {{$prestacion->cantidad * $prestacion->importe_asignado}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <legend>Facturas</legend>
            <div class="col-xs-12">
                {!! Form::open(['route'=>'prestaciones.asignarFactura']) !!}
                {!! Form::hidden('prestaciones_id',$prestacion->id) !!}
                    
                <div class="col-xs-4">
                    {!! Form::label('Proveedor') !!}
                    {!! Form::select('proveedores_id', $proveedores ,null, ['id'=>'proveedores', 'class'=>'form-control ']) !!}

                </div>
                
                <div class="col-xs-6">
                    {!! Form::label('Facturas | Items') !!}
                    {!! Form::select('facturas_items_id',[] ,null, ['id'=>'facturas','class'=>'facturas_id form-control  '] ) !!}
                </div>
                <div class="col-xs-1" style="margin-top: 2.3%;">

                    {!! Form::submit('Asignar',['class'=>'btn']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            <div>
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Nro. Factura</th>
                    <th>Item Cantidad</th>
                    <th>Item Detalle</th>
                    <th>Item P. Unitario</th>

                    </thead>
                    @if(isset($prestacion))
                        @foreach($prestacion->FacturasItems as $items)
                            <tr>
                            <td>{{$items->Facturas->fecha}}</td>

                            <td><a href="{{route('proveedores.detalle_factura', $items->Facturas->nro_factura)}}"> {{$items->Facturas->nro_factura}}</a></td>
                            <td>{{$items->cantidad}}</td>
                            <td>{{$items->detalle}}</td>
                            <td>{{$items->precio_unitario}}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>

        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#proveedores').on('change',function(){
             console.log('buscando')   
            $('.facturas_id').empty();
            var id = $('#proveedores').val();

            $.get('proveedores/findFacturas/'+id, function(res)
            {

             $.each(res, function(x,y){
                        console.log(x)
                        console.log(y)

                 $('.facturas_id').append('<optgroup  label="'+ y.fecha +' '+y.nro_factura+'"');

                 $.each(y.facturas_items, function (a,b) {
                     $('.facturas_id').append('<option value='+b.id+'>'+ b.cantidad+' |  '+ b.detalle+' |  $ '+ b.precio_unitario+'</option>');
                 });

             });

            });
        });


    </script>
@endsection



