@extends('template/template')
@section('content')
    
    <div class="row">
        <div class="panel ">
            <div class="panel-body">

                @if(!isset($models))
                    {!! Form::open(['route'=>'users.create']) !!}
                @else
                    {!! Form::model($models,['route'=>['users.update',$models->id ]]) !!}
                @endif

                {!! Form::label('Usuario') !!}

                {!! Form::text('username',null,['class'=>'form-control ']) !!}

                {!! Form::label('Email') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}

                {!! Form::label('Estado') !!}
                <select name="is_active" class="form-control">
                    @if(isset($models))   
                        <option value="">Seleccionar estado</option>
                        <option value="1" {{ $models->is_active === 'Activo'  ? 'selected' : '' }} >Activo</option>
                        <option value="0" {{ $models->is_active === 'Inactivo'  ? 'selected' : '' }} >Inactivo</option>
                    @else
                        <option value="">Seleccionar estado</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>

                    @endif 
                </select>
            

                @if(isset($models))
                    {!! Form::label('Rol') !!}
                    <select name="roles_id[]" class="form-control multiSelect" multiple >
                        @foreach($roles_edit as $rol)

                          <option value="{{$rol->id}}" {{ $models->isOne($rol->id)  ? 'selected' : '' }}>{{ $rol->name}}</option>
                        @endforeach
                    </select>
                @else
                    {!! Form::label('Rol') !!}
                    {!! Form::select('roles_id[]',$roles , null ,['class'=>'multiSelect form-control', 'multiple'=>'']) !!}

                @endif

                {{--
                <select name="rol_id" class="form-control multiSelect">
                   
                    @foreach($roles as $rol)
                      @if(!isset($models))
                      <option value="{{$rol->id}}">{{ $rol->name}}</option>
                      @else
                      <option value="{{$rol->id}}" {{ $models->isOne($rol->id)  ? 'selected' : '' }}>{{ $rol->name}}</option>
                      @endif
                    @endforeach
                </select>
                --}}

                {!! Form::label('Sede') !!}
                @if(isset($models))


                 <select name="sedes_id" class="form-control" id="select2-1" style="width:100%;" >
                    @foreach($sedes as $sede)
                                <option value="{{$sede->id}}" {{ $models->sedes_id == $sede->id  ? 'selected' : '' }}>{{$sede->nombre}}</option>
                    @endforeach
                </select>
                @else
                <select name="sedes_id" class="form-control" id="select2-1" style="width:100%;" >
                    @foreach($sedes as $sede)
                                <option value="{{$sede->id}}" >{{$sede->nombre}}</option>
                    @endforeach
                </select>

                @endif

            </div>

            <div class="panel-footer">
                {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>

             {!! Form::close() !!}
        </div>

    </div>

@endsection

@section('javascript')
<script type="text/javascript">
   
    
    $('#select2-1').select2();

</script>    

@endsection    