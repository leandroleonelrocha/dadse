@extends('template/template')

@section('content')
    <ol class="breadcrumb">
               <li><a href="#">Home</a>
               </li>
               <li class="active">Proveedores</li>
            </ol>

    <div class="row">
        <div class="col-xs-12">
            <h1><span class="fa fa-1x fa-user-md"></span> {{$seccion}}</h1>

            <!-- START bar chart-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-right">
                        <a href="{{route('proveedores.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <th>#</th>
                        <th>Proveedor</th>
                        <th>Cuit</th>
                        <th>Tipo</th>
                        <th>Ayuda Directa</th>

                        <th class="col-xs-1"></th>
                        </thead>
                        @foreach($model as $proveedor)
                           
                             @if($proveedor->sedes_id == \Illuminate\Support\Facades\Auth::user()->sedes_id)

                            <tr>
                                <td>{{$proveedor->id}}</td>
                                <td>
                                    <div class="col-xs-3">
                                        <img src="img/dummy.png" alt="" class="media-box-object img-responsive img-rounded thumb64">
                                    </div>
                                    <div class="col-xs-6">
                                        <strong>{{$proveedor->nombre}}</strong>
                                        <br><small>{{$proveedor->razon_social}}</small>
                                    </div>
                                </td>

                                <td>{{$proveedor->cuit }} </td>
                                <td>
                                    @foreach($proveedor->tipos as $tipo)
                                       <label class="label label-primary">{{$tipo->nombre}}</label>
                                    @endforeach

                                </td>
                                <td>
                                    @if($proveedor->ayuda_directa)
                                        <a href="{{route('proveedores.ayudaDirecta', [$proveedor->id,0])}}" class="btn btn-xs btn-default "><span class="text-success fa fa-check-square-o"></span></a>
                                    @else
                                        <a href="{{route('proveedores.ayudaDirecta', [$proveedor->id,1])}}" class="btn btn-xs btn-default"><span class="fa fa-square-o"></span></a>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('proveedores.detalle', $proveedor->id)}}" class="btn btn-xs btn-default"><span class="fa fa-info"> </span> Info</a>
                                    <a href="{{route('proveedores.editar',$proveedor->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                    <a href="{{route('proveedores.eliminar',$proveedor->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
                                </td>

                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- END bar chart-->
    </div>


@endsection

