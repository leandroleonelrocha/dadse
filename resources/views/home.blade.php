@extends('template/template')
@section('content')
	
	@if($user->is('medico'))
    <div class="row">
      <div class="col-xs-12">
        <h2>{{$user->fullname }}</h2>
       
              <div class="panel panel-default">
                <div role="tabpanel">

                    <ul role="tablist" class="nav nav-tabs">
                        <li  class="active" role="presupuestos_pendientes"><a href="#presupuestos_pendientes" aria-controls="presupuestos_pendientes" role="tab" data-toggle="tab">Informes Pendientes <span class="label label-warning"></span></a></li>
                    	<li  role="presupuestos_realizados"><a href="#presupuestos_realizados" aria-controls="presupuestos_realizados" role="tab" data-toggle="tab">Informes Realizados <span class="label label-warning"></span></a></li>
                    	
                    	<li  role="perfil"><a href="#perfil" aria-controls="profile" role="tab" data-toggle="tab">Perfil <span class="label label-warning"></span></a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="presupuestos_pendientes" role="tabpanel" class="tab-pane active">
                        @if(count($user->Medico) > 0)  

                            @foreach($user->Medico->AltoCostoMedicos as $altoCosto)
                               @if(!isset($altoCosto->AltoCosto->Prestaciones->Informe))
                                    <a href="{{route('prestaciones.informes',$altoCosto->AltoCosto->Prestaciones->id)}}" > Caso # {{$altoCosto->AltoCosto->Prestaciones->casos_id}} - Prestación # {{$altoCosto->AltoCosto->prestaciones_id}}  - {{$altoCosto->fecha_envio}}</a><br>
                                    <label class="label label-warning"></label>
                               @endif
                            @endforeach
                        @endif
    
                        </div>

                        <div id="presupuestos_realizados" role="tabpanel" class="tab-pane">
                        @if(count($user->Medico) > 0)   
                            @foreach($user->Medico->AltoCostoMedicos()->orderBy('id','DESC')->get() as $altoCosto)
                                @if(isset($altoCosto->AltoCosto->Prestaciones->Informe))
                                    <a href="{{route('prestaciones.informes',$altoCosto->AltoCosto->Prestaciones->id)}}" > Caso # {{$altoCosto->AltoCosto->Prestaciones->casos_id}} - Prestación # {{$altoCosto->AltoCosto->prestaciones_id}}  - {{$altoCosto->fecha_envio}}</a><br>
                                    <label class="label label-warning"></label>    
                                @endif                           
                            @endforeach
                        @endif
                        </div>

                         <div id="perfil" role="tabpanel" class="tab-pane">
                            @if(!isset($user->Medico))
                                {!! Form::open(['route'=>'medicos.create']) !!}
                            @else
                                {!! Form::model($user->Medico,['route'=>['medicos.update',$user->Medico->id ]]) !!}
                            @endif

                            {!! Form::label('DNI') !!}
                            {!! Form::text('dni',null,['class'=>'form-control']) !!}

                            {!! Form::label('Apellido') !!}
                            {!! Form::text('apellido',null,['class'=>'form-control']) !!}

                            {!! Form::label('Nombre') !!}
                            {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                            {!! Form::label('Matricula Tipo') !!}
                                @if(isset($user->Medico))
                                    {!! Form::select('tipo_matricula',config('custom.tipo_matriculas') , $user->tipo_matricula , ['class'=>'form-control']) !!}
                                @else
                                    {!! Form::select('tipo_matricula',config('custom.tipo_matriculas') ,null, ['class'=>'form-control']) !!}
                                @endif

                            {!! Form::label('Matricula') !!}
                            {!! Form::text('matricula',null,['class'=>'form-control']) !!}
                            
                            {!! Form::label('Especialidad') !!}
                                        
                                @if(isset($user->Medico))
                            
                                     {!! Form::select('especialidades_id[]',$especialidades,null , ['class'=>'multiSelect multiple form-control' , 'multiple'=>'', 'style'=>'width:100%']) !!}
                                @else
                                    {!! Form::select('especialidades_id[]',$especialidades,null , ['class'=>'multiSelect form-control','style'=>'width:100%']) !!}
                                @endif
                            <br>
                            <br>
                            {!! Form::submit('Guardar',['class'=>'btn ']) !!}   
                        </div>


                    </div>
                </div>
            </div>
        </div>
  
    </div>
    @endif
    @if($user->is('auditor.medico'))
    
    <div class="row">
        <div class="col-xs-12">
            <h2>{{$user->fullname }}</h2>
            <div class="panel panel-default">
             
                    <table class="table table-striped">
                      <thead>
                         <tr>
                            <th class="h4" style="width: 50%;">Informes Realizados</th>
                         </tr>
                      </thead>
                      <tbody>

                        @foreach($prestaciones_informes as $altoCosto)
                          @if(count($altoCosto->Prestaciones)>0)
                            <tr>
                                <td>
                                   <h5>
                                      <a href="{{route('prestaciones.informes',$altoCosto->Prestaciones->id)}}">
                                             <strong>Caso # {{$altoCosto->Prestaciones->casos_id}} - Prestación # {{$altoCosto->Prestaciones->id}}</strong>
                                          </a>
                                          /
                                          <a href="{{route('dictamenMedico.index',$altoCosto->Prestaciones->id)}}">
                                             <strong>Dictamen Médico</strong>
                                          </a>
                                   </h5>
                                
                                   <div class="text-muted text-sm">
                                      <span> <strong class="mr-sm">{{$altoCosto->created_at}}</strong></span>
                                   </div>
                                   
                                </td>

                                <td class="text-right hidden-xs hidden-sm" >
                                
                                  <a href="{{route('casos.personas', $altoCosto->Prestaciones->Casos->PersonasFisicas->id)}}" class="btn btn-xs btn-default btn-sm">
                                  <em class="fa fa-history text-primary"></em>
                                  <span class="hidden-xs hidden-sm">Historial</span>
                                  </a>
                                  
                                </td>
                             </tr>
                          @endif
                        @endforeach
                    </tbody>   
                  </table>

            </div>
        </div>
    </div>
    @endif

@endsection