<!doctype html>
<html lang="en">
<head>
  <title>Acta De Apertura</title>
</head>


<body style="font-family: 'Helvetica', 'Arial', sans-serif; font-size: 8pt;">

	<table width="100%">
		<tr>
			<td>
				<img width="200px" src="../public/img/minist.png">
			</td>
			<td>
			<p align="center">Buenos Aires,{!! date('d',time()) !!} de Agosto de {!! date('Y',time()) !!}</p>
			</td>
		</tr>
	</table>

   <div style="text-align:center;"><h1>Acta De Apertura</h1></div>

	

	<hr>

	<table width="100%">
		<tr bgcolor="#d3d3d3">
		   
			<th>
				Fecha de Soli.
			</th>
	   
			<th>
				Nro. Presupuesto 
			</th>
		  
			<th>
			  Cantidad Solicitada
			</th>
			<th>
				Nro. Caso
			</th>
			<th>
				Nro. Pretación
			</th>
			<th>
				Nro. Compulsa
			</th>
			<th>
				Proveedor
			</th>
		 
		</tr>



		@foreach($prestaciones->Presupuestos as $presupuesto)
				@if($presupuesto->Compulsas)
	          	<tr>
	          		<td>{{$presupuesto->Compulsas->created_at}}</td>
					<td>{{$presupuesto->id}}</td>
					<td>{{$presupuesto->Pedido->cantidad_solicitada}} </td>
	   				<td>{{$presupuesto->Pedido->Prestacion->Casos->id}}</td>
					<td>{{$presupuesto->Pedido->Prestacion->id}}</td>
					<td>{{$presupuesto->Compulsas->id}}</td>
					<td>{{$presupuesto->Proveedores->razon_social}}</td>
				</tr>
				@endif	
		@endforeach
		  
		
	</table>

	<hr>
	<br><br>




	    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="border mb-20">
                <b class="upper">LAS COTIZACIONES SERÁN CONSIDERADAS SÓLO SI CUMPLEN CON LAS SIGUIENTES CONDICIONES:</b>
                <p>Las ofertas deberán ser presenttadas en sobre cerrado individual, indicando nombre del paciente, N² de orden, fecha y hora de apertura, teniendo una validez de 90 días.
                    <br>
                    Los presupuestos deberán contener todos los datos del producto: <br>
                    Monodroga, Presentación, Marca, Laboratorio. Asimismo, deberán estar numerados y poseer razón social, dirección, teléfono, correo electrónico, firma y sello del responsable de la empresa, N² de CUIT y aclaración de la orden a la cual se emitirá el cheque. Si el monto superara los $50.000 - el citizante deberá comunicarse con el área Contable del Ministerio de Desarrollo Social, Avda. 9 de julio 1925 Piso 18. Tel: 4379-3600, a fin de dejar los datos necesarios para que el pago pueda efectuarse por transferencia bancaria.
                    <br>
                    La entrega del materia deberá realizarse a partir de recibir la orden de compra definitiva o provisoria.
                    <br>
                    El pago se autorizará una vez enviada la orden de compra definitiva y luego de constatada la entrega del elemento y/o servicio a partir de la presentación por parte de la empresa de las correspondientes facturas (teniendo en consideración que este Ministerio es Iva Excento), certificados de implante (o cualquier otra certificación que acompañara al material), protocolo quirúrgico y placas (en el caso de que correspondiese). Toda la documentación deberá estar firmada y sellada por el medico interviniente.</p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <h1>IMPORTANTE:</h1>
            <p class="text-danger upper">Se solicita asistir con un pendrive que contenga el archivo adjuntado bajo el nombre <b>"informacion digital (compulsa completado con la informacion suministrada en papel a los efectos de facilitar las actas de apertura</b>.</p>
            <h3>Se recuerda prestar atención a los requisitos incluidos en el pedido de presupuestos </h3>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="mt-40 text-gray">
                <p>Sector Presupuestos</p>
                <p>D.A.D.S.E</p>
                <p>Ministerio de Desarrollo Social</p>
            </div>
        </div>
    </div>


</body>
</html>
