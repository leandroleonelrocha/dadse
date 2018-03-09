<table class="table table-striped">
    <thead>
    <td>Presupuesto Nro.</td>
    <td>Fecha de Solicitud</td>
    <td>Cantidad Ofertada</td>
    <td>Estado</td>
    <td>Precio Unitario</td>
    <td>Precio Total</td>
    
    </thead>

    <tbody>
    	@foreach($models->Presupuestos()->orderBy('created_at', 'desc')->get() as $presupuesto)
            @if(count($presupuesto) > 0)
        		<tr>
        			<td>{{$presupuesto->id}}</td>
        			<td>{{$presupuesto->created_at}}</td>	
        			<td>{{isset($presupuesto->cantidad_ofertada) ? $presupuesto->cantidad_ofertada : '' }} | {{$presupuesto->Prestaciones->first()->descripcion}}  </td>
        			<td>{{config('custom.presupuestos_estados.'.$presupuesto->estado) }} </td>	
                    <td>$ {{$presupuesto->precio_unitario}}</td>
                   	<td>$ {{$presupuesto->total}}</td>	
        		</tr>
            @endif
    	@endforeach

    </tbody>
</table>
