@extends('template/template')

@section('content')

    <div class="row">
        <div class="col-xs-12 "> 
        <h1>Cuenta corriente </h1>
        <div class="panel panel-default">
            <div class="panel-body">
                @if(!isset($cuenta))
                    {!! Form::open(['route'=>'cuenta_corriente.store']) !!}
                @else
                    {!! Form::model($cuenta,['route'=>['cuenta_corriente.store',$cuenta->id ]]) !!}
                @endif
             
                {{--{!! Form::label('Dia Fin') !!}--}}
                {{--{!! Form::number('dia_fin_mes',null,['class'=>'form-control']) !!}--}}

                {!! Form::label('Importe Máximo mensual de la cunta corriente.') !!}
                {!! Form::text('valor',null,['class'=>'form-control']) !!}
                <span class="text-muted">El valor se acutaliza del 1 , al dia final del mes en curso.</span>

               
            </div>
            <div class="panel-footer">
                {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>

             {!! Form::close() !!}
        </div>
        </div>

    </div>

@endsection
