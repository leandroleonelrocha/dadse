@extends('template/template')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li><a href="{{route('casos.show',$model->Casos->id)}}">Caso # {{ $model->Casos->id }}</a></li>
        <li><a href="{{route('prestaciones.detalles',$model->id)}}">Prestación # {{ $model->id }}</a></li>
        <li class="active">Adelantos</li>
    </ol>

    <div class="row">
        <div class="col-xs-12 ">

            <div class="panel panel-default">
                <div class="panel-heading">
                    ADELANTOS
                </div>
                <div class="panel-body bt">
                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                            <!--   <th><input id="check_all" type="checkbox"></th> -->
                            <th>Presupuesto</th>
                            <th>Proveedor</th>
                            <th>Um.</th>
                            <th>Producto</th>
                            <th>Cantidad Presupuestada</th>
                            <th>Valor Total</th>
                            <th></th>

                            </thead>
                            @foreach($model->Presupuestos()->where('adjudicado',1)->get() as $presupuesto)
                            <tr>
                                <td># {{$presupuesto->id}}</td>
                                <td>{{$presupuesto->Proveedores->razon_social}} </td>
                                <td>{{$presupuesto->Pedido->Prestacion->unidad_medida}} </td>
                                <td>{{$presupuesto->Pedido->Prestacion->descripcion}} </td>
                          
                                <td>{{$presupuesto->cantidad_ofertada }} </td>
                                <td>$ {{$presupuesto->total}}</td>
                                <td><button class="mb-sm btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal" type="button" data-cantidad="{{$presupuesto->cantidad_ofertada}}" data-presupuesto="{{$presupuesto->id}}">Adelanto</button></td>

                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      ADELANTOS SOLICITADOS
                    </div>
                    <div class="panel-body bt ">    
                        <!--
                        {{--
                        <table class="table table-bordered">
                            @if(count($model->PresupuestoAdjudicado) > 0)
                            <?php  $cant = 0; ?>
                            @foreach($model->PresupuestoAdjudicado->Adelantos as $adelanto)
                                <tr>
                                    <td>{{$adelanto->id}}</td>
                                    <td>{{$adelanto->created_at}}</td>
                                    <td>{{$adelanto->cantidad}}</td>
                                    <td>{{$adelanto->User->username}}</td>
                                    <?php $cant = $cant + $adelanto->cantidad ?>
                                    <td><a target="_blank" class="btn btn-xs btn-default"
                                           href="prestaciones/getAdelantos/{{$adelanto->id}}/{{$model->id}}"><span
                                                    class="fa fa-print "></span></a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"><strong class="text-danger"> TOTAL ADEUDADO
                                        : {{$model->cantidad -  $cant}}</strong>
                                </td>
                            </tr>
                            @endif
                        </table>
                        --}}
                        -->

                        <table class="table table-bordered">
                            <?php  $cant = 0; ?>

                            @foreach($model->Presupuestos()->where('adjudicado',1)->get() as $pre)
                                @if(count($pre->Adelantos)>0)
                                    @foreach($pre->Adelantos as $adelanto)
                                    <?php $cant = $cant + $adelanto->cantidad ?>
                                    <tr>

                                        <td class="text-left">Nro.Presupuesto #{{$adelanto->presupuestos_id}}</td>
                                        <td class="text-left">Cantidad: {{$adelanto->cantidad}}</td>
                                        <td class="text-left">Usuario: {{$adelanto->User->fullname}}</td>
                                        <td class="text-left"></td>
                                        <td class="text-left"><a target="_blank" class="btn btn-xs btn-default"
                                           href="prestaciones/getAdelantos/{{$adelanto->id}}/{{$model->id}}"><span
                                                    class="fa fa-print "></span></a></td>
                                        
                                    </tr>

                                    @endforeach
                                   
                                @endif
                                
                            @endforeach
                            
                        
                        </table>

                    </div>

                </div>
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
                    
                    <div class="panel panel-body">
                        {!! Form::open(['route'=>'prestaciones_post_adelantos']) !!}
                        {!! Form::hidden('presupuestos_id') !!}
                        {!! Form::hidden('users_id',\Illuminate\Support\Facades\Auth::user()->id) !!}

                        {!! Form::label('Cantidad Solicitada') !!}
                        {{--
                        {!! Form::number('cantidad',null,['class'=>'form-control','max'=> $model->cantidad,'min'=>0]) !!}
                        --}}
                         {!! Form::number('cantidad',null,['class'=>'form-control']) !!}
                       

                    </div>

                </div>
                <div class="modal-footer">
                    {!! Form::submit('Solicitar',['class'=>'btn']) !!}
                </div>
                 {!! Form::close() !!}
            </div>
        </div>
    </div>



@endsection


@section('javascript')
<script type="text/javascript">
    $('#myModal').on('show.bs.modal', function(e) {
    var presupuesto_id = $(e.relatedTarget).data('presupuesto');

    $(e.currentTarget).find('input[name="presupuestos_id"]').val(presupuesto_id);
    
});

</script>
@endsection



