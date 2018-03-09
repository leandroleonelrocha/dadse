	{!! Form::label('Logo') !!}
    {!! Form::file('logo',['class'=>'form-control']) !!}
    <!--
    {!! Form::label('Nombre') !!}
    {!! Form::text('nombre',null,['class'=>'form-control']) !!}
    -->
    {!! Form::label('Tipo de Proveedor') !!}<br> 
    {!! Form::select('proveedores_tipos_id[]',$tipos , null,['class'=>'multiSelect form-control']) !!}
    <br> 

    {!! Form::label('Razón Social') !!}
    {!! Form::text('razon_social',null,['class'=>'form-control']) !!}

    {!! Form::label('Cuit') !!}
    {!! Form::text('cuit',null,['class'=>'form-control']) !!}


    {!! Form::label('Dirección') !!}
    {!! Form::text('direccion',null,['class'=>'form-control']) !!}

    {!! Form::label('Ciudad') !!}
    {!! Form::text('ciudad',null,['class'=>'form-control']) !!}

    {!! Form::label('Provincia') !!}
    {!! Form::text('provincia',null,['class'=>'form-control']) !!}

    {!! Form::label('CP') !!}
    {!! Form::text('cp',null,['class'=>'form-control']) !!}

    {!! Form::label('Tel.') !!}
    {!! Form::text('tel',null,['class'=>'form-control']) !!}


    {!! Form::label('Contacto.') !!}
    {!! Form::text('contacto',null,['class'=>'form-control']) !!}
           
    <br>
    <a id="agregarCampo" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
    <br>     
    
    {!! Form::label('E-Mail.') !!}

    <div id="contenedor"></div>