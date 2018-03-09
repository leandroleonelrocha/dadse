@extends('template/template')

@section('content')

    <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
				@if(!isset($models))
				    {!! Form::open(['route'=>'personas.postLegajo']) !!}
				@else
				    {!! Form::model($models,['route'=>['personas.postLegajo']]) !!}
				    {!! Form::hidden('personas_id', $models->id) !!}
				@endif
                  <h1>Legajo</h1>

                  <div class="panel panel-default" id="panelDemo14">
                     <div class="panel-heading"><h4>{{ isset($models) ? $models->fullname : '' }} {{isset($fullname) ? $fullname : ''}}</h4></div>
                     <div class="panel-body">
                        <div role="tabpanel">
                           <!-- Nav tabs-->
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="active" role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Personales</a>
                              </li>
                              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Hogar</a>
                              </li>
                             <li role="presentation"><a href="#tramite" aria-controls="tramite" role="tab" data-toggle="tab">Trámite</a>
                              </li>

                           </ul>
                           <!-- Tab panes-->
                           <div class="tab-content">
                              <div class="tab-pane active" id="home" role="tabpanel">
                              
				                <div class="row">
					                <div class="col-xs-8">
						                <div class="form-group">
							                {!! Form::label('Nombre Completo') !!}
						                	@if(isset($fullname))
							                {!! Form::text('fullname',$fullname,['class'=>'form-control']) !!}
						            		@else
						            		{!! Form::text('fullname',null,['class'=>'form-control']) !!}
						            		@endif
						            	</div>
					            	</div>
					            	<div class="col-xs-4">
					                	<div class="form-group">
						                {!! Form::label('Estado Civil') !!}
						                {!! Form::select('estado_civil',$estadoCivil,null,['class'=>'form-control']) !!}
						            	</div>
					            	</div>
				            	</div>
				            	<div class="row">
					                <div class="col-xs-4">
					                	<div class="form-group">	
					                	{!! Form::label('Tipo De Documento') !!}
					                	{!! Form::select('tipo_documento',$tipoDocumento, null,['class'=>'form-control']) !!}
					            		</div>
					            	</div>
					            	<div class="col-xs-4">
					            		<div class="form-group">
					                	{!! Form::label('Documento') !!}
					                	@if(isset($documento))
				                		{!! Form::text('documento',isset($documento) ? $documento : '',['class'=>'form-control']) !!}
					            		@else
										{!! Form::text('documento',null,['class'=>'form-control']) !!}
					            	
					            		@endif
					            		</div>
					            	</div>
					            	<div class="col-xs-4">
						            	<div class="form-group">
						                {!! Form::label('Cuil') !!}
					                	{!! Form::text('cuil',null,['class'=>'form-control']) !!}
						            	</div>
					            	</div>
				            	</div>
				                 <div class="row">
					                <div class="col-xs-4">
						                <div class="form-group">
							            {!! Form::label('Sexo') !!}
							            {!! Form::select('sexo',$sexo,null,['class'=>'form-control']) !!}
						            	</div>
					            	</div>
					            	<div class="col-xs-4">
					                	<div class="form-group">
						                {!! Form::label('País de nacimiento') !!}
						                {!! Form::select('nacionalidad',$nacionalidad,null,['class'=>'form-control']) !!}
						            	</div>
					            	</div>
					            	<div class="col-xs-4">
					                	<div class="form-group">
						                {!! Form::label('Fecha Nacimiento') !!}
						                {!! Form::text('fecha_nacimiento',null,['class'=>'form-control date_picker']) !!}
						            	</div>
					            	</div>
				            	</div>
				            	<h5>Datos De Contacto</h5><hr>
				            	<div class="row">
					                <div class="col-xs-4">
						                <div class="form-group">
							            {!! Form::label('Email') !!}
							            {!! Form::text('email',null,['class'=>'form-control']) !!}
						            	</div>
					            	</div>
					            	<div class="col-xs-4">
					                	<div class="form-group">
						                {!! Form::label('Teléfono Particular') !!}
						                {!! Form::text('telefono_particular',null,['class'=>'form-control']) !!}
						            	</div>
					            	</div>
					            	<div class="col-xs-4">
					                	<div class="form-group">
						                {!! Form::label('Teléfono Móvil') !!}
						                {!! Form::text('telefono_movil',null,['class'=>'form-control']) !!}
						            	</div>
					            	</div>
				            	</div>


                              </div>
                              <div class="tab-pane" id="profile" role="tabpanel">
                            
				            	<div class="row">
					                <div class="col-xs-6">
					                	<div class="form-group">
					                	{!! Form::label('Domicilio') !!}
					                	{!! Form::text('domicilio',null,['class'=>'form-control']) !!}
					            		</div>
					            	</div>
					            	<div class="col-xs-6">
					            		<div class="form-group">
					                	{!! Form::label('Provincia') !!}
				                		{!! Form::select('provincia',[0 => 'Seleccionar...'],null, ['class'=>'form-control','id'=>'provincias']) !!}
					            		</div>
					            	</div>
					          	</div>

				                <div class="row">
					                <div class="col-xs-6">
						                <div class="form-group">
							            {!! Form::label('Municipio') !!}
							            {!! Form::select('municipio',[],null,['class'=>'form-control','id'=>'municipios']) !!}
						            	</div>
					            	</div>
					            	<div class="col-xs-6">
					                	<div class="form-group">
						                {!! Form::label('Localidad') !!}
						                {!! Form::select('localidad',[],null,['class'=>'form-control','id'=>'localidades']) !!}
						            	</div>
					            	</div>

				            	</div>

				            
                              </div>

                            <div class="tab-pane" id="tramite" role="tabpanel">
                            	
				            <div class="row">
	                                <div class="col-xs-4 col-lg-4">
	                                	<h4>Trámite</h4>
	                                    <table class="table" border="1">
	                                        <tbody>
	                                            <tr>
	                                                <td>
	                                                    <input type="radio" name="tipo_tramite" value="dadse.ayuda.directa">
	                                                </td>
	                                                <td>
	                                                    <strong>AYUDA DIRECTA</strong><br />
	                                                    Dirección de Asistencia Directa en Situaciones Especiales<br />
	                                                    Ministerio de Desarrollo Social<br /><br />
	                                                    Saldo Disponible: <span class="text-maroon text-bold">${{isset($disponibleMensual) ? $disponibleMensual : ''  }} {{isset($valorMensual) ? $valorMensual : '' }}</span><br />
	                                                  
	                                                </td>
	                                            </tr>

	                                            <tr>
	                                                <td>
	                                                    <input type="radio" name="tipo_tramite" value="dadse.alto.costo">
	                                                </td>
	                                                <td>
	                                                    <strong>ALTO COSTO</strong><br />
	                                                    Dirección de Asistencia Directa en Situaciones Especiales<br />
	                                                    Ministerio de Desarrollo Social<br /><br />
	                                                </td>
	                                            </tr>
	                                        </tbody>
	                                    </table>
	                                </div>

	                                <div class="col-xs-8 col-lg-8">
	                                 		<h4>Mandatario</h4>

				                            <div class="row">
			                                    <div class="col-xs-4">
			                                        <div class="form-group">

			                                            <select class="form-control" id="mySelect" name="tipo_busqueda"><option value="documento">DNI</option><option value="cuil">CUIL</option><option value="fullname">NOMBRE</option></select>
			                                        </div>
			                                    </div>
			                                    
			                                    <div class="col-xs-8">
			                                        <div class="form-group">
			                                            <div class="input-group">
			                                                <input class="form-control " type="text" name="search" placeholder="Buscar en Renaper">
			                                                <div class="input-group-btn">
			                                                    <a class="btn btn-default" href="javascript:void(0)" id="buscar_renaper">
			                                                    	<i class="fa fa-search icon-white"></i> Buscar </a>
			                                                </div>
			                                            </div>
			                                        </div>
			                                    </div>
			                                    <div class="col-md-3">
                 			                        <div class="ball-clip-rotate"  style="display: none">
							                           <div></div>
							                        </div>
                                            	</div>
				                            
	                                		</div>

	                                		<div class="row ">

	                                			<div class="col-xs-12">
	                                				<table class="table table-condensed table-vertical datosRenaper">
			                                            <thead>
			                                            <tr>
			                                                <th>Seleccionar</th>
			                                                <th>Nombre Completo</th>
			                                                <th>Documento</th>
			                                                <th>Cuil</th>
			                                                <th>Género</th>
			                                                <th>Legajo</th>			                                               
			                                            </tr>
			                                            </thead>
			                                            <tbody>

			                                       

			                                            </tbody>
			                                        </table>
	                                			</div>
	                                		</div>
				              		</div>
                          	</div>


                        </div>

                     </div>

                  </div>
              
					            
               </div>
               	
            </div>
            <div class="row">
                    <div class="col-sm-12 col-xs-12">
            		<div class="form-group">
                        {!! Form::submit('Guardar',['class'=>'btn btn-primary pull-right']) !!}
                       </div>
                    </div>
	            </div>
	            

	        	{!! Form::close() !!}
        </div>    

@endsection

@section('javascript')
<script type="text/javascript">

var provincias ;


$.ajax({
	'url': '{{ url('/provincias') }}',
	'success': function(data) {
	   $.each(data, function(i,v){
	       $('#provincias').append('<option value='+i+'>'+v+'</option>');
	   })
	}
});

$('#provincias').on('change',function (){

    $('#municipios').empty();
    $('#localidades').empty();


    var id = $('#provincias').val();

    $.ajax({
        'url': 'municipios/'+id ,
        'success': function(data) {
            $.each(data, function(i,v){
                $('#municipios').append('<option value='+i+'>'+v+'</option>');
            })
        }
    });
});

$('#municipios').on('change',function (){

    $('#localidades').empty();

    var id = $('#municipios').val();

    $.ajax({
        'url': 'localidades/'+id ,
        'success': function(data) {
            $.each(data, function(i,v){
                $('#localidades').append('<option value='+i+'>'+v+'</option>');
            })
        }
    });
});


$(".date_picker").datetimepicker({
        locale: 'es',
        format: 'YYYY-MM-DD',
        sideBySide: false
})


$("#buscar_renaper").on('click',function(){

	var parameter = $('[name=search]').val();
	var parameter2 = $('#mySelect').find('option:selected').val();
	/*
    $.get("{{route('personas.getRenaper')}}", {valor:parameter, tipo:parameter2} ,function(data, status) {
    	console.log(status);
  		$(".result" ).html( data );
  		
	});
	*/
	//$('#loading').html('<img src="loading.gif"> loading...');
    
    // run ajax request
    $.ajax({
        type: "GET",
        data:{valor:parameter, tipo:parameter2},
        url: "{{route('personas.getRenaper')}}",
		beforeSend: function () {
		    //$("#resultado").html("Procesando, espere por favor...");
			$('.datosRenaper tbody').empty();
		    $('.ball-clip-rotate').show();
		},
		success:  function (response) {
		    $('.ball-clip-rotate').hide();
		   
		    for (var i = 0; i < response.results.length; i++) {
		    	console.log(response.results[i]);
		    	$('.datosRenaper tbody').append(tableTr(response.results[i].fullname,response.results[i].documento,response.results[i].cuil,response.results[i].genero,response.results[i].full_legajo, i, response.results[i].tipo_documento));
			}
		}
        
  

    });

	function tableTr(nombre,documento,cuil,genero,full_legajo, posicion, tipo_documento){
		var tab =	'<tr>'+
			'<td><input type="checkbox" name="data[seleccionar]['+posicion+']"  value="check"></td>'+
			'<td><input type="hidden" name="data[nombre][]" value="'+nombre+'">'+nombre+'</td>'+
			'<td><input type="hidden" name="data[documento][]" value="'+documento+'">'+documento+'</td>'+
			'<td><input type="hidden" name="data[cuil][]" value="'+cuil+'">'+cuil+'</td>'+
			'<td><input type="hidden" name="data[genero][]" value="'+genero+'">'+genero+'</td>'+
			'<td><input type="hidden" name="data[full_legajo][]" value="'+full_legajo+'">'+full_legajo+'</td>'+
			'<input type="hidden" name="data[tipo_documento][]" value="'+tipo_documento+'">'
		'</tr>';

		return tab;

	}  
});

</script>
@endsection