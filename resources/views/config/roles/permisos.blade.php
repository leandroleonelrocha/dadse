@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1>Asignacion de permisos</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('permisos.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                 
                    {!! Form::model($rol,['route'=>['roles.postPermisos',$rol->id ]]) !!}
                        <table class="table table-striped">
                            <thead>
                            <th></th>
                            <th>Acción</th>
                            <th>Descripción</th>
                            

                            <th class="col-xs-1"></th>
                            </thead>
                            @foreach($permisos as $permiso)
                                <tr>


                                    <td>
                                    <input type="checkbox" value="{{$permiso->id}}" name="permission_id[]" {{$rol->permissions->contains($permiso->id) ? 'checked' :''}} >
                                    </td>
                                    <td>{{$permiso->name}}</td>
                                 	<td>{{$permiso->description}}</td>
                                 
                                </tr>
                            @endforeach
                        </table>

                         <div class="panel-footer">
                         {!! Form::submit('Guardar',['class'=>'btn ']) !!}
                         </div>

                     {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>


@endsection