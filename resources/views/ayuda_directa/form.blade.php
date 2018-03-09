@extends('template/template')
@section('titulo')
    Ayuda directa
@endsection

@section('content')

    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('casos.index') }}">Casos</a></li>
        <li><a href="{{ route('casos.show',$models->id) }}">Caso # {{ $models->id }}</a></li>
        <li class="active">Ayuda directa</li>
    </ol>
 
    <div class="row">
        <div class="col-xs-12 ">  
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ $seccion }}</h4>
                </div>
                <div class="panel-body">

                    <legend>Titular</legend>

                    <div class="row">
                        <div class="col-xs-6">
                            <dl class="dl-horizontal">
                                <dt>Nombre completo: </dt>
                                <dd>{{$models->PersonasFisicas->fullname}}</dd>
                                <dt>Tipo N° documento: </dt>
                                <dd>{{config('custom.tipo_documento.'.$models->PersonasFisicas->tipo_documento) }} {{$models->PersonasFisicas->persona_documento }}</dd>
                                <dt>Fecha de Nacimiento: </dt>
                                <dd>{{$models->PersonasFisicas->persona_fecha_nacimiento }}</dd>
                                <dt>Reside en: </dt>
                                <dd>{{$models->PersonasFisicas->persona_domicilio_calle }}</dd>
                                <dt>Teléfono: </dt>
                                <dd>{{$models->PersonasFisicas->telefono_particular }}</dd>
                            </dl>
                        </div>
                        <div class="col-xs-6">
                                <h4>Importe disponible hasta el período actual: </h4>
                                <h4>$ {{$importe_autorizado}}</h4>
                        </div>
                    </div>

                    <legend>Prestaciones</legend>

                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Prestación</th>
                                        <th>Cantidad</th>
                                        <th>Unidad</th>
                                        <th>Descripción</th>
                                        <th>P.Unitario</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($prestacion_solicitud))
                                        @foreach($prestacion_solicitud->Prestaciones as $prestacion)
                                            <tr>
                                                <td># {{$prestacion->id}}</td>
                                                <td>{{$prestacion->cantidad}}</td>
                                                <td>{{$prestacion->unidad_medida}}</td>
                                                <td>{{$prestacion->descripcion}}</td>
                                                <td>$ {{number_format($prestacion->importe_asignado,2)}}</td>
                                                <td><strong>$ {{number_format($prestacion->cantidad * $prestacion->importe_asignado,2)}}</strong></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach($models->Prestaciones as $prestacion)
                                            @if($prestacion->estado == 4)
                                                <tr>
                                                    <td># {{$prestacion->id}}</td>
                                                    <td>{{$prestacion->cantidad}}</td>
                                                    <td>{{$prestacion->unidad_medida}}</td>
                                                    <td>{{$prestacion->descripcion}}</td>
                                                    <td>$ {{number_format($prestacion->importe_asignado,2)}}</td>
                                                    <td><strong>$ {{number_format($prestacion->cantidad * $prestacion->importe_asignado,2)}}</strong></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br class="clearfix">
                    <legend>Datos de la Autorización</legend>

                    @if(isset($prestacion_solicitud))
                        {!! Form::model($prestacion_solicitud,['route'=>['ayudaDirecta.update',$prestacion_solicitud->id], 'id' => 'form_ayuda' ]) !!}
                            {!! form::hidden('ayuda_id',$prestacion_solicitud->id) !!}
                    @else
                        {!! Form::open(['route'=>'ayudaDirecta.create', 'id' => 'form_ayuda' ]) !!}
                    @endif

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Cantidad de Recetas Autorizadas') !!}
                                {!! Form::number('cant_recetas',null,['class'=>'form-control' ]) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Cantidad de Medicamentos') !!}
                                {!! Form::number('cant_medicamentos',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Cantidad Insumos/Elementos') !!}
                                {!! Form::number('cant_insumos',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Importe Total Autorizado') !!}
                                {!! Form::number('importe_autorizado',null , ['class'=>'form-control importe_autorizado']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Hospital ') !!}
                                @if(isset($prestacion_solicitud->SolicitudesInformes))
                                    {!! Form::select('hospitales_id',$hospitales,$prestacion_solicitud->SolicitudesInformes->Hospitales,['class'=>'form-control', 'id' => 'select2-1' ]) !!}
                                @else
                                    {!! Form::select('hospitales_id',$hospitales,null,['class'=>'form-control', 'id'=>'select2-1']) !!}
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Firmante de Receta') !!}
                                @if(isset($prestacion_solicitud->PrestacionesInformes))
                                    {!! Form::text('medico_tratante',$prestacion_solicitud->PrestacionesInformes->medico_tratante,['class'=>'form-control']) !!}
                                @else
                                    {!! Form::text('medico_tratante',null,['class'=>'form-control']) !!}
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Matricula N°') !!}
                                @if(isset($prestacion_solicitud->PrestacionesInformes))
                                    {!! Form::text('matricula',$prestacion_solicitud->PrestacionesInformes->matricula,['class'=>'form-control']) !!}
                                @else
                                    {!! Form::text('matricula',null,['class'=>'form-control']) !!}
                                @endif
                                <small id="emailHelp" class="form-text text-muted">Las matrículas insertadas en 0 se guardarán como ILEGIBLE.</small>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Matricula Tipo') !!}
                                @if(isset($prestacion_solicitud->PrestacionesInformes))
                                    <select name="tipo_matricula" class="form-control">
                                        @foreach($tipos_de_matriculas as $t => $k)
                                            <option value="{{$t}}" {{ $prestacion_solicitud->PrestacionesInformes->tipo_matricula === lcfirst($tipos_de_matriculas[$t])  ? 'selected' : '' }}  >{{$tipos_de_matriculas[$t]}} </option>
                                        @endforeach
                                    </select>
                                @else
                                    {!! Form::select('tipo_matricula',config('custom.tipo_matriculas') ,null, ['class'=>'form-control']) !!}
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Proveedores') !!}
                                <select multiple class="multiSelect form-control"  name="proveedores[]">
                                    @foreach($proveedores as $key => $p)
                                        <option value="{{$p->id}}" selected>{{$p->razon_social}} - {{$p->direccion}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {!! Form::label('Observaciones') !!}
                                @if(isset($prestacion_solicitud->PrestacionesInformes))
                                    {!! Form::textarea('observaciones',$prestacion_solicitud->PrestacionesInformes->observaciones,['class'=>'form-control', 'rows' => 4]) !!}
                                @else
                                    {!! Form::textarea('observaciones',null,['class'=>'form-control', 'rows' => 4]) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer text-right">
                    <button class="btn btn-sm btn-default">
                        <em class="fa fa-save text-primary"></em>
                        Guardar
                    </button>
                    @if(isset($prestacion_solicitud))
                        <a class="btn btn-default" href="{{route('ayudaDirecta.pdf', $prestacion_solicitud->Prestaciones()->first()->id)}}" type="button" target="_blank">
                            <em class="fa fa-print"></em>
                            Imprimir
                        </a>
                    @endif
                    @if(session()->has('prestacion_solicitud'))
                        <a class="btn btn-default" href="{{route('ayudaDirecta.pdf', session()->get('prestacion_solicitud') )}}" type="button" target="_blank">
                            <em class="fa fa-print"></em>
                            Imprimir
                        </a>
                    @endif
                </div>

                {!! Form::hidden('casos_id', $models->id, ['id' => 'casos_id']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script type="text/javascript">
    
    $('#select2-1').select2();


</script>

@endsection


<!--
<script>
$(document).ready(function(){

    $('.btn_form').on('click',function(e){
    
      var valor     = $(".importe_autorizado").val();
      var casos_id  = $('#casos_id').val();
      
        $.ajax({
                url: "ayudaDirecta/nuevo/consultar_importe",
                type: "POST",
                data: {valor: valor, casos_id: casos_id},
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result){
              
              if(result.estado == 'error'){
                alert('Error en el importe, monto disponible: $' + result.disponible );
              } 

              if(result.estado == 'error_fecha'){
                alert('Error en la fecha de cuenta corriente');
              } 

              if(result == 'ok'){
                alert('Se está enviando el formulario');
                $('#form_ayuda').submit();
              } 
               
            }
        });
     

    });
 

}); 
</script>
-->