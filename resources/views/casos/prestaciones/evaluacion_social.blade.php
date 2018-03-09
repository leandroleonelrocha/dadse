@extends('template/template')

@section('content')
   <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li><a href="{{route('casos.show',$model->Casos->id)}}">Caso # {{ $model->Casos->id }}</a></li>
        <li><a href="{{route('prestaciones.detalles',$model->id)}}">Prestacion # {{ $model->id }}</a></li>
        <li class="active">Evaluacion Social</li>
    </ol>

    <div class="row">
        <div class="col-xs-12 ">
            <h1><span class="icon-note"></span> Evaluación Social</h1>
            <div class="panel panel-default">
              
                <div class="panel-body">
                	@if(isset($model->EvaluacionSocial))
                    {!! Form::model($model->EvaluacionSocial,['route' =>'prestacion.postEditEvaluacionSocial']) !!}
                    {!! Form::hidden('evaluacion_id',$model->EvaluacionSocial->id) !!}
                    @else
                    {!! Form::open(['route'=>'prestacion.postEvaluacionSocial']) !!}
                	@endif
                    {!! Form::hidden('prestaciones_id',$model->id) !!}
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Informe Social</label>
                        <div class="col-sm-6">
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('informe_social', '1') !!}
                                    <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('informe_social', '0') !!}
                                    <span class="fa fa-check"></span>No</label>
                              </div>

                        </div>  
                    </div>
                    <div class="form-group col-xs-6">
                        <label>Lic. en Trabajo Social Interviente</label>
                        {!! Form::text('lic_trabajo_social_interviniente',null,['class'=>'form-control']) !!}
                    </div>
                     <div class="form-group col-xs-6">
                        <label>Matrícula</label>
                        {!! Form::text('matricula',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Se Archiva en esta Dirección</label>
                        <div class="col-sm-2">
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('direccion', '1') !!}
                                    <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('direccion', '0') !!}
                                    <span class="fa fa-check"></span>No</label>
                              </div>
                        </div>  
                        <label class="col-sm-2 control-label">Bajo número</label>
                        <div class="col-sm-4">
                            {!! Form::text('direccion_numero',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <label>Institución</label>
                        @if(isset($model->EvaluacionSocial))

                            {!! Form::select('institucion', config('custom.instituciones'), $model->EvaluacionSocial->institucion ,['class'=>'form-control']) !!}
                        @else
                           {!! Form::select('institucion', config('custom.instituciones'), null ,['class'=>'form-control']) !!}
                        @endif
                    </div>
                    <div class="form-group col-xs-12">
                        <label class="col-sm-4 control-label">Posee Obra Social</label>
                        <div class="col-sm-2">
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('posee_obra_social', '1') !!}
                                    <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('posee_obra_social', '0') !!}
                                    <span class="fa fa-check"></span>No</label>
                              </div>
                        </div>
                        <label class="col-sm-2 control-label">¿Cuál?</label>
                        <div class="col-sm-4">
                            {!! Form::text('obra_social',null,['class'=>'form-control']) !!}
                        </div>  
                    </div>
                     <div class="form-group col-xs-12">
                        <label class="col-sm-4 control-label">Registra Afiliación en Incluir Salud</label>
                        <div class="col-sm-2">
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('registra_afiliacion_salud', '1') !!}
                                    <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('registra_afiliacion_salud', '0') !!}
                                    <span class="fa fa-check"></span>No</label>
                              </div>
                        </div>
                    </div>
                      <div class="form-group col-xs-12">
                        <label class="col-sm-4 control-label">Cobertura Pronvincial</label>
                        <div class="col-sm-2">
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('cobertura_provincial', '1') !!}
                                    <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('cobertura_provincial', '0') !!}
                                    <span class="fa fa-check"></span>No</label>
                              </div>
                        </div>
                       
                    </div>                
                    <div class="form-group">
                           <label class="col-sm-4 control-label">Certificación negativa de ANSES</label>
                           <div class="col-sm-8">
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('certificacion_negativa', '1') !!}
                                    <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                <label>
                                     {!! Form::radio('certificacion_negativa', '0')!!}
                                    <span class="fa fa-check"></span>No</label>
                              </div>
                           </div>
                    </div>
                     <div class="form-group col-xs-12">
                        <label>Observaciones:</label>
                        {!! Form::textarea('observaciones',null,['class'=>'form-control','size' => '30x5','placeholder'=>'(Ej. Sólo registra Iniciación de Prestación Previsional)' ]) !!}
                    </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Negativa Municipal del Insumo</label>
                        <div class="col-sm-6">
                              <div class="radio c-radio">
                                 <label>
                                   {!! Form::radio('negativa_municipal', '1') !!}
                                   <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                 <label>
                                   {!! Form::radio('negativa_municipal', '0') !!}
                                   <span class="fa fa-check"></span>No</label>
                              </div>

                        </div>  
                    </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Negativa Provincial del Insumo </label>
                        <div class="col-sm-6">
                              <div class="radio c-radio">
                                 <label>
                                    {!! Form::radio('negativa_provincial', '1') !!}
                                    <span class="fa fa-check"></span>Si</label>
                              </div>
                              <div class="radio c-radio">
                                 <label>
                                  {!! Form::radio('negativa_provincial', '0') !!}
                                  <span class="fa fa-check"></span>No</label>
                              </div>

                        </div>  
                    </div>
                    <div class="form-group col-xs-12">
                        <label>Coparticipación Provincial</label>
                        {!! Form::text('coparticipacion_provincial',null, ['class'=>'form-control', 'placeholder'=>'% (En caso de corresonder)']) !!}
                    </div>
                    <div class="form-group col-xs-12">
                        <label>Otra Negativa</label>
                        {!! Form::text('otra_negativa',null, ['class'=>'form-control', 'placeholder'=>'(Banco Nacional de Drogas Oncológicas, etc)']) !!}
                    </div>
                    <div class="form-group col-xs-12">
                        <label>Otras consideraciones:</label>
                        {!! Form::textarea('consideraciones',null,['class'=>'form-control','size' => '30x5']) !!}
                    </div>
                    <div class="form-group col-xs-12">
                        <label>Valoración profesional:</label>
                        {!! Form::textarea('valoracion_profesional',null,['class'=>'form-control','size' => '30x5']) !!}
                    </div>
                    <div class="form-group col-xs-12">

                    {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

