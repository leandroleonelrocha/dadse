@extends('template/template')

@section('content')

    <div class="row">
        <div class="panel ">
            <div class="panel-body">
                @if(!isset($permiso))
                    {!! Form::open(['route'=>'permisos.create']) !!}
                @else
                    {!! Form::model($permiso,['route'=>['permisos.update',$permiso->id ]]) !!}
                @endif
                {!! Form::label('Acción') !!}
                {!! Form::text('action',null,['class'=>'form-control']) !!}


                {!! Form::label('Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            

                {!! Form::label('Descripción') !!}
                {!! Form::text('description',null,['class'=>'form-control']) !!}

                {!! Form::label('Level') !!}
                {!! Form::text('level',null,['class'=>'form-control']) !!}
                
                {!! Form::label('Modelo') !!}
                {!! Form::text('model',null,['class'=>'form-control']) !!}
                            

            </div>
            <div class="panel-footer">
                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>

             {!! Form::close() !!}
        </div>

    </div>

@endsection
