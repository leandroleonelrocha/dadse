@extends('template/template')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li><a href="{{route('casos.show',$producto->Casos->id)}}">Caso # {{ $producto->Casos->id }}</a></li>
        <li><a href="{{route('prestaciones.detalles',$producto->id)}}">Prestacion # {{ $producto->id }}</a></li>
        <li class="active">Informe</li>
    </ol>

    <div class="row">
        <div class="col-xs-8"> 

            @if(isset($producto->Informe))
                {!! Form::model($producto->Informe,['route' =>'prestaciones.postUpdateinformes']) !!}
            @else
                {!! Form::open(['route' =>'prestaciones.post.informes']) !!}
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    <legend>Prestación</legend>
                        <table class="table table-stripped">
                            <thead>
                            <th>Nro. Prestación</th>
                            <th>Cantidad</th>
                            <th>Um.</th>
                            <th>Producto</th>
                            <th>$ P. Unitario</th>
                            <th>$ S. Total</th>
                            </thead>
                            @foreach($models as $producto)
                            <tr>
                                <!-- <td><input class="check_presentacion" type="checkbox"></td> -->
                                {!! Form::hidden('prestaciones_id',$producto->id) !!}
                                <td># {{$producto->id}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>{{$producto->unidad_medida}} </td>
                                <td>{{$producto->descripcion}}</td>
                                <td>$ {{$producto->importe_asignado}}</td>
                                <td>$ {{$producto->cantidad * $producto->importe_asignado}}</td>
                                {{--
                                <td>
                                    <label class="switch switch">
                                        <input name="urgente[]"
                                               {{ $producto->urgente == 1 ? 'checked="checked"': '' }}  type="checkbox">
                                        <span></span>
                                    </label>
                                </td>
                                --}}
                            </tr>
                             @endforeach   
                        </table><br>

                        @if(count($producto->Presupuestos)>0)
                            @if(count($producto->Presupuestos()->where('adjudicado',1)->get()) > 0)
                            <div class="list-group-item">
                               <div class="media-box">
                                    <div class="pull-left">
                                        <span class="fa-stack">
                                            <em class="fa fa-circle fa-stack-2x text-success"></em>
                                            <em class="fa fa-check fa-stack-1x fa-inverse text-white"></em>
                                         </span>
                                    </div>
                                    <div class="media-box-body clearfix">
                                     <div class="media-box-heading text-success m0">ADJUDICADOS</div>
                                     @foreach($producto->Presupuestos as $pre)
                                            @if($pre->adjudicado == 1)
                                            <p class="m0">
                                                <small>
                                                    Nro. Presupuesto:
                                                    <em>#{{$pre->id}}</em> &nbsp;&nbsp;-&nbsp;&nbsp;
                                                </small>
                                                <small>
                                                    Cantidad Ofertada: <em>{{$pre->cantidad_ofertada}}</em>
                                                    &nbsp;&nbsp;-&nbsp;&nbsp; <em>${{$pre->total}}</em>
                                                </small>
                                            </p>
                                            @endif
                                        @endforeach
                                    </div>
                               </div>
                            </div> 
                            @endif
                        @endif                   
                </div>
            </div>

    </div>

    <div class="col-xs-4"> 
        <div class="panel panel-default">
              
            <div class="panel-body">
                <legend>Pedidos
                     <a href="{{route('dictamenMedico.index',$producto->id)}}" class="btn btn-xs btn-default pull-right" title="Dictamen Medico">
                   
                    <em class="fa fa-folder-open text-primary"></em> <span class="hidden-sm hidden-xs"></span> Dictamen Médico </a>
                </legend>

                <table class="table table-stripped">
                    <thead>
                    <th>Nro. Pedido</th>
                    <th>Cantidad Solicitada</th>
                    <th></th>

                    </thead>
                    @foreach($models as $producto)

                        <?php $cont = 0;?>
                        @foreach($producto->Pedidos as $key => $pedido)
                            <?php $cont ++;?>    
                            <tr>
                                <td># {{$cont}}</td>
                                <td>{{$pedido->cantidad_solicitada}} </td>
                              
                                <td>
                                    @if($pedido->caracter == 1)
                                        Urgente
                                    @else
                                        Ordinaria
                                    @endif
                                </td>
                                {{--
                                <td>
                                    <br>
                                    @if($pedido->Presupuesto)    
                                        @if($pedido->Presupuesto->adjudicado == 1)
                                        <span class="label label-success ">Adjudicado</span>

                                        @endif    
                                    @endif
                                </td>
                                --}}    
                                
                            </tr>


                        @endforeach
                    @endforeach   
                </table>
            </div>
            {{--
            @if(isset($producto->Informe))    
            --}}
            <div class="panel-footer">
                    <a class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal">
                        <em class="fa fa-save text-primary"></em>
                        Generar nuevo pedido
                    </a>
            </div>
            {{--
            @endif
            --}}
        </div>
    </div>
    
</div>




<div class="row">
    <div class="col-xs-12">         
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <legend>Informe</legend>
                </div>
                <div class="panel-body">
                    <div class="form-group col-xs-6">
                        <label>Médico Tratante</label>
                        {!! Form::select('hospitales_id',$hospitales,null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-xs-3">
                        <label>Tipo Matrícula</label>
                        @if(isset($producto->Informe))
                            {!! Form::select('tipo_matricula',config('custom.tipo_matriculas'),$producto->Informe->tipo_matricula,['class'=>'form-control']) !!}
                        @else
                            {!! Form::select('tipo_matricula',config('custom.tipo_matriculas'),null,['class'=>'form-control']) !!}
                        @endif
                    </div>

                    <div class="form-group col-xs-3">
                        <label>Nro. Matrícula</label>
                        {!! Form::text('matricula',null,['class'=>'form-control']) !!}
                    </div>

                     <div class="form-group col-xs-6">
                        <label>Tipo Diagnóstico </label>
                        {!! Form::select('tipo_diagnostico',config('custom.tipo_diagnostico'),null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-xs-6">
                        <label>Cantidad Ciclos </label>
                        {!! Form::number('ciclos',null,['class'=>'form-control']) !!}
                    </div>

                 
                    <div class="form-group col-xs-12">
                        <label>Diagnóstico Médico</label>
                        {!! Form::textArea('diagnostico',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-xs-12">
                        <label>Observaciones</label>
                        {!! Form::textArea('observaciones',null,['class'=>'form-control']) !!}
                    </div>

                    {!! Form::submit('Guardar Informe',['class'=>'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Generar nuevo pedido </h4>
            </div>
                {!! Form::open(['route'=>'prestaciones.generar.pedido']) !!}
                
            <div class="modal-body">
                {!! Form::label('cantidad_solicitada') !!}

                <input type="number" name="cantidad_solicitada" class="form-control" required>

                {!! Form::hidden('prestaciones_id' ,$producto->id) !!}
                <br>
                <div class="form-contol">
                <label class="radio-inline c-radio">
                    <input id="inlineradio10" type="radio" name="caracter" value="1" required>
                    <span class="fa fa-check"></span> Urgente
                </label>
                </div>
                 <div class="form-contol">
                <label class="radio-inline c-radio">
                    <input id="inlineradio11" type="radio" name="caracter" value="0" >
                    <span class="fa fa-check"></span> Ordinaria
                </label>
                </div>

            </div>
            <div class="modal-footer">
                {!! Form::submit('Guardar',['class'=>'btn']) !!}
            </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection