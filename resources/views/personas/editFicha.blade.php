@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user"></span> Ficha Evaluación Social </h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                    </div>
                    <div class="panel-body">

                           <div class="col-sm-12">
                              <div class="panel">
                               
                               @if(isset($models)) 
        				       	        {!! Form::model($models,['route'=>['personas.editFicha']]) !!}
                               	{!! Form::hidden('fichas_id', $models->id) !!}
                               @endif
                               
                            	<label>Vivienda</label>
                               <div class="panel-body">
                               {!! Form::hidden('personas_id',$models->id) !!}
                               {!! Form::textarea('vivienda',null,['class'=>'form-control' ]) !!}
                               </div><br>
                               <label>Salud</label>
                               <div class="panel-body">
                                    {!! Form::textarea('salud',null,['class'=>'form-control' ]) !!}
                               </div><br>
                               <label>Situación Laboral</label>
                               <div class="panel-body">
                                    {!! Form::textarea('situacion_laboral',null,['class'=>'form-control' ]) !!}
                               </div><br>
                               <label>Conclusiones</label>
                               <div class="panel-body">
                                    {!! Form::textarea('conclusiones',null,['class'=>'form-control' ]) !!}
                               </div><br>

                               {!! Form::submit('Guardar',['class'=>'btn btn-primary pull-right']) !!}
                    					 {!! Form::close() !!}

                              </div>
                           </div>
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

