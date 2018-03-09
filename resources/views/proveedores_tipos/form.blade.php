@extends('template/template')

@section('content')
     <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('proveedores_tipos.index')}}">Tipos Proveedores</a></li>
        <li class="active">@if(isset($models)) Editar @else Nuevo @endif</li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(!isset($models))
                        {!! Form::open(['route'=>'proveedores_tipos.create']) !!}
                    @else
                        {!! Form::model($models,['route'=>['proveedores_tipos.update',$models->id ]]) !!}
                    @endif

                    {!! Form::label('Tipo') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                </div>
                <div class="panel-footer">
                        {!! Form::submit('Guardar',['class'=>'btn ']) !!}
                </div>

                 {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection
