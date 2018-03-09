@extends('template/template')

@section('title')
	Ayuda directa
@endsection

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user-md"></span> {{$seccion}}</h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                  
                    <div class="panel-body">
                       <form>
                       	  <legend>Titular</legend>
						  <div class="form-group row">
						    <label class="col-sm-2 col-form-label">Apellido y Nombre/s</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_fullname}}
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Tipo/N° de Documento</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_tipo_documento}}
							 {{$models->PersonasFisicas->persona_documento}}
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_tipo_documento}}
							 {{$models->PersonasFisicas->persona_documento}}
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Reside en</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_tipo_documento}}
							 {{$models->PersonasFisicas->persona_documento}}
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">C.P./Localidad</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_tipo_documento}}
							 {{$models->PersonasFisicas->persona_documento}}
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Provincia</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_tipo_documento}}
							 {{$models->PersonasFisicas->persona_documento}}
						    </div>
						  </div>
						  <legend>Retira en Farmacia</legend>
						  <div class="form-group row">
						    <label class="col-sm-2 col-form-label">Apellido y Nombre/s</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_fullname}}
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Tipo/N° de Documento</label>
						    <div class="col-sm-10">
						     {{$models->PersonasFisicas->persona_tipo_documento}}
							 {{$models->PersonasFisicas->persona_documento}}
						    </div>
						  </div>
						 <legend>Subsidio solicitado: Ayuda Directa </legend>
						 <div class="jumbotron">
		                    	La presente autorización faculta al proveedor a suministrar los medicamentos y/o elementos, según prescripción médica detallada en receata/s adjunta/s, las cuales deben contener sello y firma del profesional autorizante de la Dirección de Asistencia Directa por Situaciones Especiales del Ministerio de Desarrollo Social de la Nación únicamente, debiendo el profesional farmacéutico hacer cumplir las disposiciones legales vigentes del recetario exigible.-
		                 </div>

		                  <div class="jumbotron">
		                     	El Ministerio de Desarrollo Social por intermedio de la Dirección de Asistencia Directa por Situaciones Especiales autoriza por cuenta y orden del beneficiario designado a adquirir lo detallado en ?, Hasta la suma de ...
		                     <div class="row row-table pv-lg">
	                           <div class="col-xs-2">
	                              <p class="m0 lead">$ 3,200.00</p>
	                                 <small>Available budget</small>
	                           </div>
	                           <div class="col-xs-10">

	                           			Sr. Proveedor: La entrega de los elementos solicitados según receta adjunta y autorizada por esta Dirección, se realizará cuando el importe a facturar no supere el valor neto autorizado. Caso contrario el beneficiario deberá solicitar a esta Dirección actualizar la autorización conforme los valores que correspondan. No será considerada para su liquidación toda factura que supere el valor autorizado.

	                           </div>
	                        	</div>
		                  </div>


						</form>
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

