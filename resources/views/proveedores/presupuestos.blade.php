<table  class="table table-striped">
    <thead>
    <td>Nro. Compulsa</td>
    <td>Fecha de Solicitud</td>
    <td>Fecha inicio </td>
    <td>Fecha fin</td>
    <td></td>
    
    </thead>
    <tbody>
   
    @foreach($models->Presupuestos()->groupBy('compulsa_id')->orderBy('id','desc')->get() as $presupuesto)
            @if(count($presupuesto->Compulsas) > 0)
            <tr>
                <td># {{$presupuesto->Compulsas->id}}</td>
                <td>{{$presupuesto->Compulsas->fecha_solicitud}}</td>
                <td>{{$presupuesto->Compulsas->fecha_apertura_sobre}} </td>
                <td>{{$presupuesto->Compulsas->fecha_cierre}} </td>
                <td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myPresupuesto">
                    <i class="fa fa-upload"></i>  Subir Excel </button>
                </td>
            </tr>
            @endif
    @endforeach
    </tbody>
</table>




@section('modal')
<!-- Modal Excel Presupuestos -->
<div class="modal fade" id="myPresupuesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Resumen</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>['proveedores.subir.presupuesto',$models->id], 'files' => true]) !!}
                {!! Form::hidden('proveedores_id', $models->id) !!}
                {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
                {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- Modal Excel Liquidacion de farmacias -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Resumen</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>['proveedores.subir.excel',$models->id], 'files' => true]) !!}
                {!! Form::hidden('proveedores_id', $models->id) !!}
                {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
                {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


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

