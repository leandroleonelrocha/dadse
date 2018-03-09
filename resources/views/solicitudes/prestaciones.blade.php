<table class="table table-striped">
    @foreach($prestaciones as $prestacion)
        <tr>
            <td class="col-xs-1"> #{{$prestacion->id}}</td>
            <td class="col-xs-4">
                <p>
                    <small class="text-muted">Cant.</small>
                    <strong>{{$prestacion->cantidad}}</strong></p>
                <p>
                    <small class="text-muted">Categoria</small>
                    <strong>{{$prestacion->categoria}}</strong></p>
                <p>
                    <small class="text-muted">Producto</small>
                    <strong>{{$prestacion->producto}}</strong></p>
                <p>
                    <small class="text-muted">Descripcion</small>
                    <strong>{{$prestacion->descripcion}}</strong></p>
            </td>
            <td class="col-xs-4">


                @if($prestacion->estado == 7)
                    <a target="_blank" href="{{route('ayudaDirecta.pdf', $prestacion->id)}}" class="mb-sm btn btn-default">Imprimir</a>
                @else
                    <a href="{{route('ayudaDirecta.nuevo',$prestacion->id, $solicitud->id)}}" class="btn btn-default">Ayuda Directa</a> 
                @endif 

                @if($prestacion->estado == 2 )
                    <a href="{{route('prestaciones.informes',$prestacion->id)}}" class="btn btn-default">Informe Médico</a>
                @else
                <a href="{{route('prestaciones.asignar',$prestacion->id)}}" class="btn btn-default"> Valor
                    Indicativo <label class="label label-danger">{{$prestacion->PrestacionesProductos->count()}}</label>
                </a>
                    
                 
                
                <a href="{{route('altoCosto',$prestacion->id)}}" class="btn btn-default">Alto Costo</a>
                @endif


            </td>
            <td class="col-xs-3">
                <label class="label label-primary">{{$prestacion->estadoNombre}}</label>
            </td>
        </tr>
    @endforeach
</table>
