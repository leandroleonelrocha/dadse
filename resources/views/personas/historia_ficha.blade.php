@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-file-text-o"></span>Fichas Sociales 
                  <a href="{{route('personas.nuevaFicha', $models->id )}}" class="btn btn-default pull-right">Nueva Ficha</a>
                </h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">


                    <div class="panel-body">

                        <table class="table">	
                        	<thead>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Creado</th>
                            <th></th>	
                           
                            </thead>
                        	@forelse($models->FichaObservacion as $fichas)
                        	<tr>
                        		<td>{{$fichas->id}}</td>
                                <td>{{ isset($fichas->User->fullname) ? $fichas->User->fullname : '' }}</td>
                        		<td>{{$fichas->created_at}}</td>
                        		<td><a href="{{route('personas.getEditFicha', $fichas->id)}}" class="btn btn-xs btn-default "><span class="fa fa-info"></span></a></td>

                        		
                        	</tr>
                        	@empty()
                            <tr>
                                <td>
                        	       Sin ficha sociales.
                                </td>
                            </tr>
                        	@endforelse
                        </table>

                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

