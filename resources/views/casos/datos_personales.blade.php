@if($caso->destinatario_type == 'persona')
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal p-20">

                <div class="form-group">
                    <div class="col-sm-4">Nombre completo: </div>
                    <div class="col-sm-8">

                        <strong>{{ $caso->PersonasFisicas->fullname }}</strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">{{config('custom.tipo_documento.'.$caso->PersonasFisicas->tipo_documento) }}:</div>
                    <div class="col-sm-8">
                        <strong> {{ $caso->PersonasFisicas->documento }} </strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Nacimiento:</div>
                    <div class="col-sm-8">
                        <strong>{{$caso->PersonasFisicas->persona_fecha_nacimiento}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">E-mail:</div>
                    <div class="col-sm-8">
                        <strong>{{$caso->PersonasFisicas->email}}</strong>
                    </div>
                </div>

            </form>
        </div>

        <div class="col-md-6">
            <form class="form-horizontal p-20">

                <div class="form-group">
                    <div class="col-sm-4">Provincia: </div>
                    <div class="col-sm-8">
                        <strong>{{$caso->PersonasFisicas->Hogar ? $caso->PersonasFisicas->Hogar->provincia : ""}}</strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Ciudad:</div>
                    <div class="col-sm-8">
                        <strong>{{$caso->PersonasFisicas->Hogar ? $caso->PersonasFisicas->Hogar->ciudad : ""}}</strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Calle:</div>
                    <div class="col-sm-8">
                        <strong>{{$caso->PersonasFisicas->Hogar ? $caso->PersonasFisicas->Hogar->calle_slug : ""}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Nro:</div>
                    <div class="col-sm-8">
                        <strong>{{$caso->PersonasFisicas->Hogar ? $caso->PersonasFisicas->Hogar->numero : ""}}</strong>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <a href="{!! route('casos.voucher',$caso->id) !!}" target="_blank" class="pull-right btn btn-default btn-sm">
                <em class="fa fa-print text-primary"></em>
                Imprimir voucher
            </a>
        </div>
    </div>

@endif
