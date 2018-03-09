@extends('template/template')

@section('content')
   
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
        <li><a href="{{route('proveedores.detalle',$models->id )}}">{{$models->razon_social}}</a></li>
        <li class="active">Liquidaciones - Histórico</li>
    </ol>

        <div class="row">
            <div class="col-xs-12">
                <h1>Liquidaciones - Históricos</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        {!! Form::open(['route'=> 'proveedores.liquidaciones_historico', 'method'=>'GET']) !!}
                        <div class="input-group margin">
                            <input class="form-control" type="text" name="search" placeholder="Búsqueda por número de liquidación" >
                            <input type="hidden" name="proveedores_id" value="{{$models->id}}">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i></button>
                                </span>
                        </div>
                        {!! Form::close() !!}

                        <table class="table table-striped table-condensed">
                            <thead>
                                <th>Fecha</th>
                                <th>N° Liquidación </th>
                                <th>N° Liquidación Interna</th>
                                <th></th>
                              
                            </thead>

                            <tbody>
                            @foreach($liquidaciones as $liquidacion)
                                <tr>
                                    <td>{{ date('d/m/Y',strtotime($liquidacion->created_at)) }}</td>
                                    <td>{{$liquidacion->nro_liquidacion_proveedor}} </td>
                                    <td>{{$liquidacion->nro_liquidacion_interna}}</td>    
                                    <td>
                                     <a type="button" href="{{route('proveedores.liquidaciones.borrar', $liquidacion->id)}}" class="btn btn-xs btn-default pull-right btn-danger msgDelete pull-right">
                                      <i class="fa fa-times"></i>
                                     </a>
                                     <div class="btn-group mb-sm pull-right">
                                       <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary btn-xs" aria-expanded="false">REPORTES
                                          <span class="caret"></span>
                                       </button>
                                       <ul role="menu" class="dropdown-menu">
                                         <li><a href="{{route('proveedores.getLiquidacion', $liquidacion->id)}}"  target="_blank">  LIQUIDACION</a>
                                          </li>

                                          <li> <a type="button" href="{{route('proveedores.getAnexo',$liquidacion->id)}}" target="_blank">ANEXO</a>
                                          </li>

                                          <li> <a href="{{route('proveedores.getResolucion', $liquidacion->id)}}"  target="_blank"> RESOLUCION </a>
                                          </li>
                                          <li><a href="{{route('proveedores.getProvidencia', $liquidacion->id)}}" target="_blank">PROVIDENCIA </a>
                                          </li>
                                       </ul>
                                    </div>

                                      <button type="button" class="btn btn-default pull-right msgLiquidacion btn-xs" data-toggle="modal" data-liquidacion="{{$liquidacion->id}}" data-target="#modalProcesarLiquidacion">PROCESAR LIQUIDACION </button>
                                    
                                    </td>                                
                                </tr>
                            @endforeach
                            </tbody>

                              <tfoot>
                                <tr>
                                    <td colspan="5" align="center">
                                        @if(isset($search))
                                            {!! $liquidaciones->appends(['search'=> $search])->render() !!}
                                        @else
                                            {!! $liquidaciones->render() !!}
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

@section('modal')
<!-- MODAL PROCESAR LIQUIDACION -->
<div class="modal fade" id="modalProcesarLiquidacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Procesar Resolucion</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>['proveedores.procesarLiquidacion'] ]) !!}
                {!! Form::hidden('proveedores_id', $models->id) !!}
                {!! Form::hidden('liquidaciones_id', null,  ['id'=> 'liquidacion_id' ]) !!}

                {!! Form::label('Expediente Electrónico') !!}
                {!! Form::text('nro_expediente_electronico', null, ['class'=>'form-control','id'=> 'nro_expediente_electronico']) !!}

                {!! Form::label('Expediente E-DADSE') !!}
                {!! Form::text('nro_expediente_edadse', null, ['class'=>'form-control','id'=> 'nro_expediente_edadse']) !!}

                {!! Form::label('IF Anexo') !!}
                {!! Form::text('nro_if_anexo', null, ['class'=>'form-control','id'=> 'nro_if_anexo']) !!}

                {!! Form::label('IF Proyecto de Resolución') !!}
                {!! Form::text('if_proyecto_resolucion', null, ['class'=>'form-control','id'=> 'if_proyecto_resolucion']) !!}

                {!! Form::label('Providencia a SubSecretaria') !!}
                {!! Form::text('if_providencia_asubse', null, ['class'=>'form-control','id'=> 'if_providencia_asubse']) !!}

                {!! Form::label('Providencia a Rendición de cuentas') !!}
                {!! Form::text('if_providencia_resolucion', null, ['class'=>'form-control','id'=> 'if_providencia_resolucion']) !!}

            </div>
            <div class="modal-footer">
                {!! Form::submit('Aceptar', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
 

    $('.msgLiquidacion').click(function(){
       if(!confirm('Desea Editar esta Liquidación?'))
           return false;
       else

             $('#modalProcesarLiquidacion').on('show.bs.modal', function(e) {

                //get data-id attribute of the clicked element
                    var bookId = $(e.relatedTarget).data('liquidacion');
                    //populate the textbox
                    $(e.currentTarget).find('input[name="liquidaciones_id"]').val(bookId);

                    $.get('proveedores/getLiquidacionAjax/'+bookId ,function(data){
                        console.log(data);
                        $('#nro_expediente_electronico').val(data.nro_expediente_electronico);
                        $('#nro_expediente_edadse').val(data.nro_expediente_edadse);
                        $('#nro_if_anexo').val(data.nro_if_anexo);
                        $('#if_proyecto_resolucion').val(data.if_proyecto_resolucion);
                        $('#if_providencia_asubse').val(data.if_providencia_asubse);
                        $('#if_providencia_resolucion').val(data.if_providencia_resolucion);


                    });
                  });
    });


</script>
@endsection