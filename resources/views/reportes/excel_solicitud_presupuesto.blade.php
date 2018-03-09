<table>
    <tr>
        <td>Orden</td>
        <td>Presupuesto_Nro</td>
              
        <td>Caso_Nro/Prestacion_Nro</td>
        <td>Codigo_Expediente</td>
        <td>Paciente</td>
        <td>Residencia</td>
        
   
        <td>Producto</td>
        
        <td>Um</td>

        <td>Precio_Unitario</td>
        <td>Precio_Total </td>
        <td>Cantidad_Ofertada</td>
        <td>Cantidad_Solicitada</td>
        <td>Fecha_Solicitud</td>
        <td>Fecha_Apertura</td>
        <td>Fecha_Cierre</td>
        <td>Observaciones</td>
       
       
        
    </tr>
    @if(isset($proveedor))
        @foreach($proveedor->Presupuestos as $pr )
        
            @if($pr->estado == 7)
                <tr>
                 
                    @foreach($pr->Prestaciones as $prestacion)

                        <td>{{$prestacion->Casos->id}}</td>    
                        <td>{{$pr->id}}</td>
                        <td>{{$prestacion->Casos->id}}/{{$prestacion->id}}</td>
                        <td>{{$prestacion->numero_expediente}}</td>
                        <td>{{$prestacion->Casos->PersonasFisicas->fullname}}</td>
                        <td>
                        {{isset($prestacion->Casos->PersonasFisicas->Hogar->ciudad) ? $prestacion->Casos->PersonasFisicas->Hogar->ciudad : ''  }}    
                        {{isset($prestacion->Casos->PersonasFisicas->Hogar->provincia) ? $prestacion->Casos->PersonasFisicas->Hogar->provincia : ''  }}
                        </td>
                        <td>{{$prestacion->descripcion}}</td>
                        <td>{{$prestacion->unidad_medida}}</td>
                        
                        <td></td>
                        <td></td>
                        <td></td>  
                        
                    @endforeach
                    <td>{{$pr->Pedido->cantidad_solicitada}}</td>
                    <td>{{$pr->fecha_solicitud}}</td>
                    <td>{{$pr->fecha_apertura_sobre}}</td>
                    <td>{{$pr->fecha_cierre}}</td>
                    <td>{{$pr->observacion}}</td>
                
              
                </tr>
            @endif

        
        @endforeach
    @endif

</table>
