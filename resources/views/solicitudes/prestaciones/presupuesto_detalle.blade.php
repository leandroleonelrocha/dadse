@extends('template/template')
@section('content')
    <div class="row">
        <div class="col-xs-12 ">


            @foreach($presupuestos as $presupuesto)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading">
                        <h4 class="m0">Presupuesto #{{$presupuesto->id}}</h4>
                        <small class="text-muted">{{$presupuesto->Proveedores->nombre}}</small>
                    </div>

                    <div class="col-xs-12">

                        <table class="table">
                            <thead>
                                <th>Producto</th>
                                <th>Importe Sugerido</th>
                                <th>Importe Presupuestado</th>
                                <th>Estado</th>
                            </thead>
                            <tr>
                                @foreach($presupuesto->Productos as $producto)
                                        <td>{{$producto->productos_detalle}} - {{$producto->presentaciones_detalle}}</td>
                                        <td>$ {{$producto->importe}}</td>
                                        <td>x</td>
                                        <td><label class="label label-primary">{{$presupuesto->estado}}</label></td>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection




