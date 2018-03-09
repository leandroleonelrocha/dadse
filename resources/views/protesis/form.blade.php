@extends('template/template')

@section('content')
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="{{route('protesis.index')}}">Insumos</a></li>
            <li class="active">@if(isset($models)) {{$models->nombre}} @else Nuevo @endif </li>
        </ol>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel ">
                <div class="panel-body">
              
                    @if(!isset($models))
                        {!! Form::open(['route'=>'protesis.create']) !!}
                    @else
                        {!! Form::model($models,['route'=>['protesis.update',$models->id ]]) !!}
                    @endif

                    {!! Form::label('Nombre') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                    {!! Form::label('Descripción') !!}
                    {!! Form::text('descripcion',null,['class'=>'form-control']) !!}

                   
                    {!! Form::label('Estado') !!}
                    @if(isset($models))
                        {!! Form::select('estado',config('custom.protesis') , $models->estado , ['class'=>'form-control']) !!}
                    @else
                        {!! Form::select('estado',config('custom.protesis') ,null, ['class'=>'form-control']) !!}
                    @endif

                    {!! Form::label('Categoría') !!}
                    {!! Form::select('categoria',$categorias,null,['class'=>'form-control']) !!}

                    {!! Form::label('Importe') !!}
                    {!! Form::text('importe',null,['class'=>'form-control']) !!}
                            

                </div>
                <div class="panel-footer">
                        {!! Form::submit('Guardar',['class'=>'btn ']) !!}
                </div>

                 {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection
