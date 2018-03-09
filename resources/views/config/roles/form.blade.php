@extends('template/template')

@section('content')

    <div class="row">
        <div class="panel ">
            <div class="panel-body">
                @if(!isset($rol))
                    {!! Form::open(['route'=>'roles.create']) !!}
                @else
                    {!! Form::model($rol,['route'=>['roles.update',$rol->id ]]) !!}
                @endif

                {!! Form::label('Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}


                {!! Form::label('Descripción') !!}
                {!! Form::text('description',null,['class'=>'form-control']) !!}

                {!! Form::label('Level') !!}
                {!! Form::text('level',null,['class'=>'form-control']) !!}
              

            </div>
            <div class="panel-footer">
                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>

             {!! Form::close() !!}
        </div>

    </div>

@endsection
