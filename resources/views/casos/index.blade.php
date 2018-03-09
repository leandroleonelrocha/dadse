@extends('template/template')
@section('titulo')
    Casos
@endsection


@section('content')
   
        <ol class="breadcrumb">
               <li><a href="#">Home</a>
               </li>
               <li class="active">Casos</li>
        </ol>

        <div class="row">
            <div class="col-xs-12">
                <h1>Casos</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        {!! Form::open(['route'=> 'casos.index', 'method'=>'GET']) !!}
                        <div class="input-group margin">
                            <input class="form-control" type="text" name="search" >
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i></button>
                                </span>
                        </div>
                        {!! Form::close() !!}

                        <table class="table table-striped table-condensed">
                            <thead>
                                <th>Nro.</th>
                                <th>Fecha</th>
                                <th>Destinatario</th>
                                <th>Nro Documento</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>

                            <tbody>
                            @foreach($casos as $caso)
                                <tr>

                                    <td>{{$caso->id}}</td>
                                    <td>{{$caso->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ isset($caso->PersonasFisicas->fullname) ? $caso->PersonasFisicas->fullname : '' }} </td>
                                    <td>{{ isset($caso->PersonasFisicas->documento) ? $caso->PersonasFisicas->documento : ''}}</td>
                                    <td><label class="label label-{{ $caso->estado_type }}"> {{ $caso->estado_nombre }} </label></td>
                                    <td class="text-right">
                                        <a href="{{route('casos.show', $caso->id)}}" class="btn btn-sm btn-default">
                                            <em class="fa fa-folder-open text-primary"></em>
                                            <span class="hidden-xs hidden-sm">Abrir</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="5" align="center">
                                        @if(isset($search))
                                            {!! $casos->appends(['search'=> $search])->render() !!}
                                        @else
                                            {!! $casos->render() !!}
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

