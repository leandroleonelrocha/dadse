@extends('template/template')

@section('content')
	   <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="{{route('hospitales.index')}}">Hospitales</a></li>
            
            <li class="active">@if(!isset($model)) Nuevo @else {{$model->descripcion}} @endif</li>
        </ol>

    <div class="row">
	    <div class="col-xs-12">
	        <div class="panel">
	            <div class="panel-body">
	                @if(!isset($model))
	                    {!! Form::open(['route'=>'hospitales.create']) !!}
	                @else
	                    {!! Form::model($model,['route'=>['hospitales.update',$model->id ]]) !!}
	                @endif

	                {!! Form::label('Nombre') !!}
	                {!! Form::text('descripcion',null,['class'=>'form-control']) !!}

	                {!! Form::label('Ciudad') !!}
	                {!! Form::text('ciudad',null,['class'=>'form-control']) !!}

	                {!! Form::label('Provincia') !!}
	                {!! Form::text('provincia',null,['class'=>'form-control']) !!}

	                    
	            </div>
	            <div class="panel-footer">
	                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
	            </div>

	             {!! Form::close() !!}
	        </div>
	    </div>
    </div>

@endsection
