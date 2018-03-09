<table class="table table-striped">
@if(count($caso->AyudaDirecta) > 0)
	@foreach($caso->AyudaDirecta as $ayuda)
		<tr>
			<td>
				Ayuda #
				{{$ayuda->id}}
			</td>
			<td>
				@foreach($caso->Prestaciones as $prestacion)
					@if($prestacion->ayuda_directa_id == $ayuda->id)
						Prestación #
						{{ $prestacion->id }}
						<br>
						@if($prestacion->estado == 14)
							<div class="media-box-heading text-danger" >Cancelada</div>
						@endif
					@endif
				@endforeach
			</td>
			<td>
				<small class="text-muted">Importe autorizado.</small>
				<p><strong>$ {{$ayuda->importe_autorizado }}</strong></p>
			</td>
			<td class="col-xs-3 text-right">
				<div class="btn-group">
					<button class="btn btn-default" data-toggle="dropdown">
						<em class="fa fa-cog text-primary"></em>
						Acciones
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						@permission('editar.ayuda.directa')
						<li>
							<a href="{{route('ayudaDirecta.nuevo',[$ayuda->id,1])}}">
								<em class="fa fa-edit text-warning"></em>
								Modificar
							</a>
						</li>
						@endpermission

						@permission('borrar.ayuda.directa')
						<li>
							<a href="{{route('ayudaDirecta.delete',$ayuda->id)}}">
								<span class="fa fa-trash text-danger"></span>
								Eliminar
							</a>
						</li>
						@endpermission
						@if(count($ayuda->Prestaciones) > 0)
						<li>
							<a href="{{route('ayudaDirecta.pdf',$ayuda->Prestaciones()->first()->id)}}" target="blank">
								<em class="fa fa-print"></em>
								Imprimir
							</a>
						</li>
						@endif
					</ul>
				</div>




			</td>

		</tr>
	@endforeach
@endif

 	<tr>
		<td>
			<div class="text-bold">TOTAL</div>
		</td>
		<td></td>
		<td>
			<div class="text-bold">$ {{$suma_monto}}</div>
		</td>
		<td></td>
	</tr>
</table>

