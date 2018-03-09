
        <div class="panel-body">
            <div class="form-group col-xs-12">
                <label>Derivado Desde</label>
                {!! Form::text('hospital_tratante',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-xs-4">
                <label>Médico Tratante</label>
                {!! Form::text('hospital_tratante',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                <label>Tipo Matricula</label>
                {!! Form::select('tipo_matricula',['0'=>'Seleccionar','nacional'=>'Nacional','provincial'=>'Provincial'],null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                <label>Nro. Matricula</label>
                {!! Form::text('matricula',null,['class'=>'form-control']) !!}
            </div>


            <div class="form-group col-xs-12">
                <label>Diagnóstico Médico</label>
                {!! Form::textArea('diagnostico',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-xs-12">
                <label>Observaciones</label>
                {!! Form::textArea('observaciones',null,['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('Guardar Informe',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>



