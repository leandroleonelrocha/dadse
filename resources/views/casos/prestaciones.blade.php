<div class="table-responsive">

    <table class="table table-condensed">

        <thead>
            <th>Número</th>
            <th>Cantidad</th>
            <th>Detalle</th>
            <th>Acciones</th>
            <th>Estado</th>
            <th></th>

        </thead>
        @if($caso->Prestaciones->count() >= 1)

            @foreach($caso->Prestaciones as $prestacion)

               @if($prestacion->estado == 14)
               <tr class="warning">
               @else
               <tr>
               @endif
                   <td class="col-xs-1" > #{{$prestacion->id}}</td>
                   <td class="col-xs-1" >
                       <strong>{{$prestacion->cantidad}}  {{$prestacion->unidad_medida}}</strong></p>
                   </td>
                   <td class="col-xs-4">
                     <strong>{{$prestacion->descripcion}}</strong></p>
                   </td>
                   <td class="col-xs-2">

                      {{--
                       @if($prestacion->estado == 7)
                           <a target="_blank" href="{{route('ayudaDirecta.pdf', $prestacion->id)}}"
                              class="btn btn-default text-sm"><span class="fa fa-print"></span></a>

                           <a href="{{route('prestaciones.facturar', $prestacion->id)}}"
                              class="btn btn-default text-sm" title="Facturar"><span class="icon-notebook"></span></a>

                       @endif

                       @if($prestacion->estado == 2)
                           <a href="{{route('prestaciones.informes',$prestacion->id)}}"
                              class="btn btn-default text-sm">Informe
                               Médico</a>
                       @endif


                       @if($prestacion->estado == 10 || $prestacion->estado == 11 )
                           <a href="{{route('dictamenMedico.index',$prestacion->id)}}" class="btn btn-default text-sm">Dictamen
                               Médico</a>
                       @endif

    --}}
                       @if($prestacion->estado == 1)
                       {{--
                           <a href="{{route('ayudaDirecta.nuevo',$prestacion->id)}}" class="btn btn-default text-sm">Ayuda
                               Directa</a>
                           <a href="{{route('prestaciones.detalles',$prestacion->id)}}" class="btn btn-default text-sm">Alto Costo</a>
                       --}}
                       @else

                           @if($prestacion->estado == 14)
                           <a hhref="javascript:void(0)" class="btn btn-sm btn-default" disabled><span class="fa fa-cog text-primary"></span></a>
                           @else
                           <a href="{{route('prestaciones.detalles',$prestacion->id)}}" class="btn btn-default btn-sm">
                               <em class="fa fa-cog text-primary"></em>
                               <span class="hidden-xs hidden-sm">Detalles</span>
                           </a>
                           @endif

                       @endif


    {{--
                       @if($prestacion->estado == 12)
                               <a href="{{route('prestaciones.facturar', $prestacion->id)}}"
                                  class="btn btn-default text-sm" title="Facturar"><span class="icon-notebook"></span></a>

                               <a href="{{route('prestaciones.adelantos',$prestacion->id)}}" class="btn btn-default text-sm">
                               Adelantos</a>
                       @endif


                           @if($prestacion->Presupuestos->count() > 0)
                               <a target="_blank" href="{!! route('prestaciones.imprimirPresupuestos',$prestacion->id) !!}" class="btn btn-xs btn-default">Presupuestos <i class="fa fa-print"></i> </a>
                           @endif
    --}}
                   </td>
    {{--
                   <td>
                           @if($prestacion->resolucion != "")
                                <label class="label label-success"> {{$prestacion->resolucion}}</label>
                           @else
                               <a href="{{route('prestaciones.asignarResolucion',$prestacion->id)}}" class="btn btn-xs btn-default">Resolución</a>
                           @endif
                   </td>
                   <td>
                           @if($prestacion->expediente != "")
                           <label class="label label-success">{{$prestacion->expediente}}</label>
                           @else
                               <a href="{{route('prestaciones.asignarResolucion',$prestacion->id)}}" class="btn btn-xs btn-default">Expediente</a>
                           @endif
                       </td>
                   --}}

                   <td class="col-xs-1">
                       <label class="label label-inverse">{{$prestacion->estadoNombre}}</label>
                   </td>
                   <td class="col-xs-3 text-right">
                       {{--
                       @if($prestacion->estado == 14)
                       <a hhref="javascript:void(0)" class="btn btn-default btn-xs text-sm" data-id="{{$prestacion->id}}" disabled><span class="fa fa-edit" ></span></a>
                          @permission('borrar.prestaciones')
                               <a href="#" class="btn btn-default btn-xs text-sm" disabled data-toggle="modal" data-target="#myModal" data-id="{{$prestacion->id}}"><span class="fa fa-trash"></span></a>
                          @endpermission
                       @else
                       <a href="{{route('prestaciones.asignar',[$prestacion->id, 1] )}}" class="btn btn-default btn-xs text-sm"><span class="fa fa-edit" ></span></a>
                       @endif
                       --}}

                      @permission('editar.prestaciones')
                        @if($prestacion->estado == 14)
                        <a href="javascript:void(0)" class="btn btn-default btn-xs text-sm"><span class="fa fa-edit" ></span></a>
                        @else
                        <a href="{{route('prestaciones.asignar',[$prestacion->id, 1] )}}" class="btn btn-default btn-sm">
                            <em class="fa fa-edit text-warning" ></em>
                            <span class="hidden-xs hidden-sm">Editar</span>
                        </a>
                        @endif
                      @endpermission
                      @permission('borrar.prestaciones')
                        @if($prestacion->estado == 4 || $prestacion->estado == 5)
                        <a href="#" class="btn btn-default btn-sm" data-toggle="modal" id="#myModal" data-target="#myModal" data-id="{{$prestacion->id}}">
                            <em class="fa fa-trash text-danger"></em>
                            <span class="hidden-xs hidden-sm">Eliminar</span>
                        </a>

                   
                        @endif
                      @endpermission


                   </td>
               </tr>
            @endforeach
        @endif
    </table>
</div>


