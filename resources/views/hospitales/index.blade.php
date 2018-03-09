@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user-md"></span> Hospitales</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('hospitales.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="datatable"  class="table table-striped">
                            <thead>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Provincia</th>
                            
                            <th class="col-xs-1"></th>
                            </thead>
                            @foreach($model as $hospital)
                                <tr>
                                    <td>{{$hospital->descripcion}}</td>
                                    <td>{{$hospital->ciudad}}</td>
                                    <td>{{$hospital->provincia}}</td>
                                    
                                     <td>
                                        <a href="{{route('hospitales.editar',$hospital->id )}}" class="btn btn-xs btn-default "><span class="fa fa-pencil"></span></a>
                                        <a href="{{route('hospitales.eliminar',$hospital->id)}}" class="btn btn-xs btn-default "><span class="fa fa-trash"></span></a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

