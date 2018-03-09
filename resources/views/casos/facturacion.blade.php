@extends('template/template')
@section('content')
<ol class="breadcrumb">
   <li><a href="#">Home</a>
   </li>
   <li><a href="{{route('casos.index')}}">Casos</a></li>
    <li><a href="{{route('casos.show',$caso->id)}}"> Caso {{$caso->id}} </a></li>
   <li class="active">Facturación</li>
</ol>
<div class="panel panel-default">
    <div class="panel-body">
        <legend>Facturación</legend>
        <div>
            <table class="table">
                <thead>
                <th>Fecha</th>
                <th>Nro. Factura</th>
                <th>Total</th>
               </thead>
                @foreach($caso->Facturaciones as $facturacion)
                    <tr>
                    <td>{{$facturacion->fecha}}</td>
                    <td><a href="{{route('proveedores.detalle_factura', $facturacion->nro_factura)}}">{{$facturacion->nro_factura}}</a></td>
                    <td>$ {{ number_format($facturacion->FacturasItems->sum('precio_unitario'),2)}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection