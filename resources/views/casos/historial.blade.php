@extends('template/template')
@section('content')
<ol class="breadcrumb">
   <li><a href="#">Home</a>
   </li>
   <li><a href="{{route('casos.index')}}">Casos</a></li>
   <li class="active">Historial - Personas</li>
</ol>
<div class="panel panel-default">
    <div class="panel-body">
        <legend>Historial -<small class="m0 text-muted"> {{$casos->first()->PersonasFisicas->fullname}}</small></legend>
  
        <ul class="timeline">

               @foreach($casos as $caso)
                 
                 <li class="timeline-separator" data-datetime="Caso #{{$caso->id}} - {{date('d/m/Y',strtotime($caso->created_at))}}"></li>
                
                 @foreach($caso->Prestaciones as $prestacion)

                   @if($prestacion->AltoCosto)
                     <!--
                      {{ $prestacion->id%2==0 ? 'inverted' : 'badge'}}
                      -->
                     <li class="timeline-{{ $prestacion->id%2==0 ? 'inverted' : 'badge'}}">
                        
                        <div class="timeline-panel">
                           <div class="popover">
                              <h4 class="popover-title">Nro. Prestación: #{{$prestacion->id}}</h4>

                              <div class="arrow"></div>
                              <div class="popover-content">
                                  <p>
                                    Producto: {{$prestacion->descripcion}}
                                  
                                    {{$prestacion->unidad}}
                                    <br>
                                    Cantidad: {{$prestacion->cantidad}}
                                    <br>
                                    Importe: ${{$prestacion->importe_asignado}}

                                  </p>
                                  <a href="javascript:void(0)" data-id="{{$prestacion->id}}" data-toggle="collapse" data-target="#demo{{$prestacion->id}}" >
                                    <em class="fa fa-info-circle"></em>
                                    Detalles
                                  </a>
                                  
                                    <div id="demo{{$prestacion->id}}" class="collapse">
                                      @if(count($prestacion->Presupuestos()->where('adjudicado',1)->get()) > 0 )

                                     @foreach($prestacion->Presupuestos as $pre)
                                            @if($pre->adjudicado == 1)
                                            <div class="media bb p">
                                              
                                             
                                              <div class="media-body">
                                                 <div class="media-heading">
                                                    <p class="m0">
                                                           <small>
                                                    Presupuesto:
                                                        <em>#{{$pre->id}}</em> &nbsp;-&nbsp;
                                                    </small>
                                                    <small>
                                                        Cantidad Ofertada: <em>{{$pre->cantidad_ofertada}}</em>

                                                    </small>
                                                    <small>
                                                        &nbsp;-&nbsp;<em>{{$pre->Proveedores->razon_social}}: ${{$pre->total}}</em>

                                                    </small>
                                                    </p>
                                                      @foreach($pre->Adelantos as $adelanto)
                                                        <small class="m0 text-muted"> Se adelantó: {{$adelanto->cantidad}}</small> 
                                                        <small class="pull-right text-muted">  {{ date('d/m/Y',strtotime($adelanto->created_at)) }}</small>
                                                        <br> 
                                                        
                                                      @endforeach

                                                 </div>
                                              </div>
                                            </div>    
                                            @endif
                                        @endforeach
                                      @else
                                      <small class=" text-muted">
                                       Sin presupuestos.
                                     </small>
                                      @endif
                                    </div>
                              </div>


                           </div>
                        </div>
                     </li>
                      

            
                   @endif

                 @endforeach



               @endforeach
              
            </ul>
    </div>
</div>
@endsection

