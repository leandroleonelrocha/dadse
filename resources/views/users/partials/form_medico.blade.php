    {!! Form::label('DNI') !!}
	{!! Form::text('dni',null,['class'=>'form-control']) !!}

    {!! Form::label('Apellido') !!}
    {!! Form::text('apellido',null,['class'=>'form-control']) !!}

    {!! Form::label('Nombre') !!}
    {!! Form::text('nombre',null,['class'=>'form-control']) !!}

    {!! Form::label('Matricula Tipo') !!}
    {!! Form::select('tipo_matricula',config('custom.tipo_matriculas') ,null, ['class'=>'form-control']) !!}
               
    {!! Form::label('Matricula') !!}
    {!! Form::text('matricula',null,['class'=>'form-control']) !!}

    {!! Form::label('Especialidad') !!} <br>
    {!! Form::select('especialidades_id',$especialidades,null, ['class'=>'multiSelect form-control']) !!}