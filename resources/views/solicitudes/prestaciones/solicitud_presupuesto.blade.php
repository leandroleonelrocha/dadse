@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-xs-12 ">
            <h2># <span id="prestacionId" data-id="{{$producto->id}}">{{$producto->id}}</span> - {{$producto->producto}} {{$producto->descripcion}}</h2>

            <!-- START bar chart-->


                  <div class="panel panel-default">
                  <div class="panel-body">

                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                             <!--   <th><input id="check_all" type="checkbox"></th> -->
                                <th>#</th>
                                <th>Producto</th>
                                <th>$ Ref.</th>
                                <th>Estado</th>
                            </thead>
                            <?php $total = 0;?>
                                @foreach($prestaciones as $prestacion)
                                <tr>
                                   <!-- <td><input class="check_presentacion" type="checkbox"></td> -->

                                    <td>{{$prestacion->productos_id}}</td>
                                    <td>{{$prestacion->productos_detalle}} - {{$prestacion->presentaciones_detalle}}</td>
                                    <td>$ {{$prestacion->importe}}</td>
                                    <?php $total = $total + $prestacion->importe ?>
                                    <td>
                                        <a  class="modal_proveedores btn btn-xs btn-default" data-id="{{$prestacion->id}}">Presupuestar</a>
                                        @if($prestacion->Presupuestos->count()!= 0)
                                            <a  href="{{route('presupuestoDetalle', $prestacion->id)}}"class="modal_proveedores_status btn btn-xs btn-default">Solicitados <span class="label label-warning">{{$prestacion->Presupuestos->count()}}</span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            <tr>
                                <th  colspan="5"><p class=""> <strong> Total : $ <b class="text-danger">{{$total}}</b></strong></p> </th>
                            </tr>

                        </table>
                    </div>

                    </div>
                </div>

            </div>
            <!-- END bar chart-->
        </div>




@endsection

@section('modal')
        <!-- Modal Small-->
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 id="myModalLabelSmall" class="modal-title">Seleccionar Proveedor</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'postSolicitudPresupuesto']) !!}
                    <label>Fecha Limite de Presentación</label>
                    {!! Form::date('fecha_finalizacion',null,['class'=>'form-control']) !!}
                    <br>
                    {!! Form::hidden('prestaciones_productos_id',null,['id'=>'prestaciones_productos_id']) !!}
                    <table class="table table-striped">
                        @foreach($proveedores as $proveedor)
                            <tr>
                                <td><input type="checkbox" name="proveedor[{{$proveedor->id}}]"></td>
                                <td>
                                    {{$proveedor->nombre}}
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>
                <div class="modal-footer">

                    {!!  Form::submit('Solicitar',['class'=>'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection


@section('javascript')
    <script>

        $('.modal_proveedores').on('click',function(){

            $('#prestaciones_productos_id').val($(this).attr('data-id'));
           $('#myModal').modal('show');
        });

        $('.modal_proveedores_status').on('click',function(){
            $('#myModalStatus').modal('show');
        });

    </script>
@endsection

