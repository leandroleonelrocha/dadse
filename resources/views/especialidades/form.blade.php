@extends('template/template')

@section('content')

    <div class="row">
        <div class="panel ">
            <div class="panel-body">
                @if(!isset($models))
                    {!! Form::open(['route'=>'especialidades.create']) !!}
                @else
                    {!! Form::model($models,['route'=>['especialidades.update',$models->id ]]) !!}
                @endif

                {!! Form::label('Nombre Especialidad') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}

            </div>
            <div class="panel-footer">
                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>

             {!! Form::close() !!}
        </div>

    </div>

@endsection
