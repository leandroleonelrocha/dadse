@if($solicitud->beneficiario_tipo == 'Persona')
    <div class="row">
        <div class="col-md-6">


            <p class="lead bb"> <span  class="icon-user"></span> Datos Personales</p>
            <form class="form-horizontal p-20">

                <div class="form-group">
                    <div class="col-sm-4">Apellido Nombre: </div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_fullname}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Nacionalidad:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_nacionalidad }}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">{{$beneficiario->persona_tipo_documento}}:</div>
                    <div class="col-sm-8">
                        <strong> {{$beneficiario->persona_documento}} </strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Sexo:</div>
                    <div class="col-sm-8">
                        <strong> {{$beneficiario->persona_sexo}} </strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Nacimiento:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_fecha_nacimiento}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">E-mail:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_email}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Estado Civil:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_estado_civil}}</strong>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-md-6">
            <p class="lead bb">Ubicación</p>
            <form class="form-horizontal p-20">

                <div class="form-group">
                    <div class="col-sm-4">Provincia:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_domicilio_provincia}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Ciudad:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_domicilio_ciudad}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Calle:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_domicilio_calle}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Nro:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_domicilio_numero}}</strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Piso:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_domicilio_piso}}</strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Barrio:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->persona_domicilio_barrio}}</strong>
                    </div>
                </div>

            </form>
        </div>
    </div>
@else
    <div class="row">


        <div class="col-md-6">
            <p class="lead bb">Datos Organización</p>
            <form class="form-horizontal p-20">

                <div class="form-group">
                    <div class="col-sm-4"> Nombre: </div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_nombre}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Cuit:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_cuit }}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">E-mail:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_email}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Teléfono:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_telefono}}</strong>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-md-6">
            <p class="lead bb">Ubicación</p>
            <form class="form-horizontal p-20">

                <div class="form-group">
                    <div class="col-sm-4">Provincia:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_provincia}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Ciudad:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_ciudad}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Calle:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_calle}}</strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">Nro:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_numero}}</strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Piso:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_piso}}</strong>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">Barrio:</div>
                    <div class="col-sm-8">
                        <strong>{{$beneficiario->org_barrio}}</strong>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endif
