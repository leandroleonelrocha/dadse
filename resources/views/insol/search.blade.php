@extends('template/template')
@section('titulo')
    Busqueda de personas
@endsection
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title pull-left"> Búsqueda De Personas Para Subsidiar</h3>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::open(['route'=>'subsidios_search']) !!}
                    <div class="input-group">
                        {!! Form::text('search', Request::get('search'), ['class' => 'form-control', 'placeholder'=> 'BUSCAR POR DNI, NOMBRE, APELLIDO']) !!}
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12">
                    @if(!is_null($personas))
                        <table class="table table-bordered">
                            <th>#</th>
                            <th>DNI</th>
                            <th>APELLIDO NOMBRE</th>
                            <th></th>
                            @foreach($personas as $persona )
                            <tr>
                                <td>{{$persona->id}}</td>
                                <td>{{$persona->nro_documento}} </td>
                                <td>{{$persona->getFullName()}}  </td>
                                <td><a class="btn btn-primary" href="{{ route('subsidios.index', $persona->id) }}">Subsidiar</a></td>
                            </tr>
                            @endforeach
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection