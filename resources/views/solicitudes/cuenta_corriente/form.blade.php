<table class="table table-striped">

	@if(count($solicitud->AyudaDirecta) > 0)
		
		@foreach($solicitud->AyudaDirecta as $ayuda )
	  		
	        <tr>
	            <td> Prestacion # 
		            {{$ayuda->Prestaciones->id}}
	            </td>
	            <td>
	 				<small class="text-muted">Importe autorizado.</small>

	                <p><strong> $ {{ $ayuda == TRUE ? $ayuda->importe_autorizado : '0.00'    }}</strong></p>
	            </td>
	            
	        </tr>
	       

	    @endforeach
	    	 <tr>
	            <td>
		           <div class="text-bold text-danger">TOTAL</div>	
	            </td>
	            <td>
	 				<div class="text-bold text-danger">$ {{$solicitud->AyudaDirecta->sum('importe_autorizado')}}</div>	
	             
	            </td>
	            
	        </tr>
	
	@endif    
</table>
