{!! Form::model($models, ['route'=>['proveedores.update',$models->id]]) !!}

{!! Form::label('Logo') !!}
{!! Form::file('logo',['class'=>'form-control']) !!}

{!! Form::label('Nombre') !!}
{!! Form::text('nombre',null,['class'=>'form-control']) !!}

{!! Form::label('Razón Social') !!}
{!! Form::text('razon_social',null,['class'=>'form-control']) !!}

{!! Form::label('Tipo de Proveedor') !!}



{!! Form::select('proveedores_tipos_id[]',$tipos ,null ,['class'=>'multiSelect form-control','multiple']) !!}

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