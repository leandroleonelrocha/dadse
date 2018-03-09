@extends('template/template')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
        <li class="active">@if(isset($models)) {{$models->razon_social}} @else Nuevo @endif</li>
    </ol>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel panel-body">
                 @if(isset($models))
                    {!! Form::model($models,['route'=>['proveedores.update',$models->id]]) !!}
                @else
                    {!! Form::open(['route'=>'proveedores.create']) !!}
                @endif

                {!! Form::label('Logo') !!}
                {!! Form::file('logo',['class'=>'form-control']) !!}

                {!! Form::label('Sede') !!}
                @if(isset($models))


                 <select name="sedes_id" class="form-control" id="select2-1" style="width:100%;" >
                    @foreach($sedes as $sede)
                                <option value="{{$sede->id}}" {{ $models->sedes_id == $sede->id  ? 'selected' : '' }}>{{$sede->nombre}}</option>
                    @endforeach
                </select>
                @else
                <select name="sedes_id" class="form-control" id="select2-1" style="width:100%;" >
                    @foreach($sedes as $sede)
                                <option value="{{$sede->id}}" >{{$sede->nombre}}</option>
                    @endforeach
                </select>

                @endif

                
                {!! Form::label('Nombre') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                    {!! Form::label('Tipo de Proveedor') !!}
                    {!! Form::select('proveedores_tipos_id[]',$tipos , null,['class'=>'multiSelect form-control', 'multiple'=>'']) !!}

                {!! Form::label('Razón Social') !!}
                {!! Form::text('razon_social',null,['class'=>'form-control']) !!}

                {!! Form::label('Cuit') !!}
                {!! Form::text('cuit',null,['class'=>'form-control']) !!}

                
                     {!! Form::label('Dirección') !!}
                     {!! Form::text('direccion',null,['class'=>'form-control']) !!}

                     {!! Form::label('Domicilio Fiscal') !!}
                     {!! Form::text('domicilio_fiscal',null,['class'=>'form-control']) !!}


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

                @if(isset($models))
          
                    @foreach($models->Email as $email)

                        {!! Form::text('mail[]',$email->descripcion,['class'=>'form-control', 'id'=>'campo_'.$email->id ]) !!}
                        <a href="javascript:void(0)" class="eliminar_campo" data-id='campo_{{$email->id}}' > &times;</a>
                        <br>

                    @endforeach
                    
                    <div id="contenedor">
                    </div>
                @else

                <div id="contenedor">
                    <input type="text" class="form-control" name="mail[]">
                    <br>
                </div>
                @endif
                <hr>
                {!! Form::submit('Guardar',['class'=>'btn ']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
    
    $('#select2-1').select2();
    var MaxInputs       = 8; //Número Maximo de Campos
    var contenedor      = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos

    $(AddButton).click(function (e) {
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            //agregar campo
            $(contenedor).append('<br><div><input type="text" class="form-control" name="mail[]" id="campo_'+ FieldCount +'" placeholder="Texto '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>');
            x++; //text box increment
        }
        return false;
    });

    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });

    $(".eliminar_campo").on('click',function(e){
        
     
        $('#'+ $(this).data('id')).remove();
        $(this).remove();

        
    })
});
</script>
@endsection