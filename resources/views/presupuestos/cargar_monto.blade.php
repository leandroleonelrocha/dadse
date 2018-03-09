@extends('template/template')
@section('content')
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="{{route('presupuestos.index')}}">Presupuestos</a></li>
    <li class="active">Cargar Monto</li>
</ol>

<div class="row">
    <div class="col-lg-12">
    <!-- START panel-->
        <div class="panel panel-default" id="panelDemo13">
            <div class="panel-heading"><h3>Listado de Compulsas</h3></div>
                <div class="panel-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                   @foreach($compulsas as $compulsa)
                   <div class="panel panel-default">
                      <div class="panel-heading" id="headingOne" role="tab">
                         <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#compulsa_{{$compulsa->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">  Compulsa #{{$compulsa->id}}        </a>
                         </h4>
                      </div>
                      <div class="panel-collapse collapse" id="compulsa_{{$compulsa->id}}" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                         <div class="panel-body">
                            <div class="table-responsive">
                                   <table class="table table-striped table-hover">
                                      <thead>
                                         <tr>
                                            <th>Nro. Presupuesto</th>
                                            <th>Descripción</th>
                                            <th>Caso/Prestación</th>
                                            <th>Cantidad Solicitada</th>
                                            <th>Cantidad Ofertada</th>
                                            <th>Precio Unitario</th>
                                            <th>Total</th>
                                            <th>Estado</th>
                                            <th>Proveedor</th>
                                            
                                            <th></th>
                                            
                                         </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($compulsa->Presupuestos as $presupuesto)
                                         <tr class="{{ $presupuesto->estado == 2 ? 'success' : 'warning'}}">

                                            <td># {{$presupuesto->id}}</td>
                                            <td>{{$presupuesto->Prestaciones->first()->descripcion}}</td>
                                            <td>{{$presupuesto->Prestaciones->first()->Casos->id}} /{{$presupuesto->Prestaciones->first()->id}} </td>
                                            <td>{{$presupuesto->Pedido->cantidad_solicitada}}</td>
                                            <td>{{$presupuesto->cantidad_ofertada}}</td>
                                            <td>${{$presupuesto->precio_unitario}}</td>
                                            <td>${{$presupuesto->total}}</td>                                               
                                            <td>{{$presupuesto->estado_nombre}}</td>
                                            <td>{{isset($presupuesto->Proveedores->razon_social) ? $presupuesto->Proveedores->razon_social : '' }}</td>
                                            @if(empty($presupuesto->precio_unitario))  
                                            <td><button type="button" class="btn btn-success btn-xs pull-right" data-pedido="{{$presupuesto->Pedido->id}}" data-presupuesto="{{$presupuesto->id}}" data-toggle="modal" data-target="#myModal">
                                                Cargar Monto
                                                </button>
                                            </td>
                                            @else
                                            <td></td>
                                            @endif
                                         </tr>
                                         @endforeach
                                      </tbody>
                                   </table>
                                </div><br>
                                
                                <a href="{{route('proveedores.actaDeApertura', $compulsa->Presupuestos->first()->Pedido->Prestacion )}}" class="btn btn-sm btn-default pull-right" target="_blank">
                                    <em class="fa fa-folder-open text-primary"></em>
                                    <span class="hidden-xs hidden-sm">Reporte</span>
                                </a>
                                               
                                {{--
                                <button type="button" class="btn btn-success btn-xs pull-right" data-compulsa="{{$compulsa->id}}" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-upload"></i>
                                    Subir Excel
                                </button>    
                                --}}
                        </div>
                      </div>
                   </div>
                   @endforeach
                </div>
            </div>
        </div>
    <!-- END panel-->
    </div>
</div>


@endsection

@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cargar monto</h4>
                </div>
                <div class="modal-body">
                    <div class="panel ">
                        <div class="panel panel-body">
                            {!! Form::open(['route'=>'presupuestos.post_cargar_monto']) !!}

                            {!! Form::label('$ Precio Unitario') !!}
                            {!! Form::text('precio_unitario',null,['class'=>'form-control']) !!}


                            {!! Form::label('$ Total') !!}
                            {!! Form::text('total',null,['class'=>'form-control']) !!}

                            {!! Form::label('Cantidad Ofertada') !!}
                            {!! Form::text('cantidad_ofertada',null,['class'=>'form-control']) !!}

                            

                            {!! Form::label('Observación') !!}
                            {!! Form::textarea('observacion',null,['class'=>'form-control']) !!}
                            {!! Form::hidden('presupuesto_id') !!}
                            {!! Form::hidden('pedido_id') !!}
                            
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    {!! Form::submit('Guardar',['class'=>'btn ']) !!}
                </div>
                 {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{--
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Subir Compulsa</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>['proveedores.subir.compulsas'], 'files' => true]) !!}
                    {!! Form::hidden('compulsa_id') !!}
                    {!! Form::file('file') !!}

                </div>
                <div class="modal-footer">
                    {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    --}}

@endsection

@section('javascript')
<script type="text/javascript">
    $('#myModal').on('show.bs.modal', function(e) {
    var presupuesto_id = $(e.relatedTarget).data('presupuesto');
    var pedido_id = $(e.relatedTarget).data('pedido');

    $(e.currentTarget).find('input[name="presupuesto_id"]').val(presupuesto_id);
    $(e.currentTarget).find('input[name="pedido_id"]').val(pedido_id);
    //var compulsa_id = $(e.relatedTarget).data('compulsa');
    //$(e.currentTarget).find('input[name="compulsa_id"]').val(compulsa_id);
});

</script>
@endsection
