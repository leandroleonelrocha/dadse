@extends('template/template')

@section('content')

    <div class="row">

        <div class="panel ">
            <div class="panel panel-body">

            {!! Form::open() !!}

            {!! Form::label('Logo') !!}
            {!! Form::file('nombre',['class'=>'form-control']) !!}

            {!! Form::label('Nombre') !!}
            {!! Form::text('nombre',null,['class'=>'form-control']) !!}

            {!! Form::label('Razón Social') !!}
            {!! Form::text('razon_social',null,['class'=>'form-control']) !!}

            {!! Form::label('Cuit') !!}
            {!! Form::text('cuit',null,['class'=>'form-control']) !!}

            {!! Form::label('Tel.') !!}
            {!! Form::text('tel',null,['class'=>'form-control']) !!}

            {!! Form::label('E-Mail.') !!}
            {!! Form::text('mail',null,['class'=>'form-control']) !!}

            {!! Form::label('Contacto.') !!}
            {!! Form::text('contacto',null,['class'=>'form-control']) !!}
            <hr>
            {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>

@endsection
