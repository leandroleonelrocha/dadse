@extends('template/template')

@section('content')

    <div class="row">
        <div class="panel ">
            <div class="panel-body">
                @if(!isset($models))
                    {!! Form::open(['route'=>'medicos.create']) !!}
                @else
                    {!! Form::model($models,['route'=>['medicos.update',$models->id ]]) !!}
                @endif

                {!! Form::label('DNI') !!}
                {!! Form::text('dni',null,['class'=>'form-control']) !!}

                {!! Form::label('Apellido') !!}
                {!! Form::text('apellido',null,['class'=>'form-control']) !!}

                {!! Form::label('Nombre') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                {!! Form::label('Matricula Tipo') !!}
                    @if(isset($models))
                        {!! Form::select('tipo_matricula',config('custom.tipo_matriculas') , $models->tipo_matricula , ['class'=>'form-control']) !!}
                    @else
                        {!! Form::select('tipo_matricula',config('custom.tipo_matriculas') ,null, ['class'=>'form-control']) !!}
                    @endif

                {!! Form::label('Matricula') !!}
                {!! Form::text('matricula',null,['class'=>'form-control']) !!}

                {!! Form::label('Especialidad') !!}
                    @if(isset($models))
                         {!! Form::select('especialidades_id',$especialidades,$models->especialidades->first()->id , ['class'=>'multiSelect form-control']) !!}
                    @else
                        {!! Form::select('especialidades_id',$especialidades,null, ['class'=>'multiSelect form-control']) !!}
                    @endif

                    
            </div>
            <div class="panel-footer">
                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>

             {!! Form::close() !!}
        </div>

    </div>

@endsection
