<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ayuda Directa</title>
  </head>
  <body>


  <table width="100%" border="1">
      <tr>
          <td>
              <img width="500px" src="../public/img/minist.png">
          </td>
      </tr>
  </table>

  <table width="100%" border="1">
      <tr>
          <td align="center">
              <h3>SUBSIDIO N° {{$solicitud->id}}</h3>
          </td>
          <td align="center">
              <h3>AUTORIZACION N° {{$solicitud->id}}</h3>
          </td>
      </tr>
  </table>

  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
              ** TITULAR
          </td>
          <td align="center">
              <table cellspacing="4" cellpadding="4">
                  <thead>
                      <tr>
                          <td>** TITULAR</td>
                      </tr>
                  </thead>

                  <tbody>
                  <tr>
                      <td>Nombre y apellido</td>
                      <td>{{$solicitud->PersonasFisicas->persona_fullname}}</td>
                  </tr>
                  <tr>
                      <td>Numero documento</td>
                      <td>{{$solicitud->PersonasFisicas->persona_tipo_documento}}
                          : {{$solicitud->PersonasFisicas->persona_documento}}</td>
                  </tr>
                  <tr>
                      <td>Fecha nacimiento</td>
                      <td>{{$solicitud->PersonasFisicas->persona_fecha_nacimiento }}</td>
                  </tr>
                  <tr>
                      <td>Reside en</td>
                      <td>{{$solicitud->PersonasFisicas->persona_domicilio_calle }}</td>
                  </tr>
                  <tr>
                      <td>Teléfono</td>
                      <td>{{$solicitud->PersonasFisicas->persona_telefono }}</td>
                  </tr>
                  </tbody>

              </table>
          </td>
      </tr>
      <tr>
          <td align="center">
              ** RETIRA EN FARMACIA
          </td>
          <td align="center">
              <table cellspacing="4" cellpadding="4">
                  <tr>
                      <td>Nombre y apellido</td>
                      <td>{{$solicitud->PersonasFisicas->persona_fullname}}</td>
                  </tr>
                  <tr>
                      <td>Numero documento</td>
                      <td>{{$solicitud->PersonasFisicas->persona_tipo_documento}}
                          : {{$solicitud->PersonasFisicas->persona_documento}}</td>
                  </tr>
              </table>
          </td>
      </tr>

  </table>

  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td>
              ** SUBSIDIO SOLICITADO : AYUDA DIRECTA
          </td>
      </tr>
  </table>

  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
              Importe Neto Autorizado<br>
              son : $ {{$solicitud->AyudaDirecta->importe_autorizado}}
          </td>
          <td align="center">
              <table cellspacing="4" cellpadding="4">
                  <tr>
                      <td>Cantidad de recetas</td>
                      <td>{{$solicitud->AyudaDirecta->cant_recetas}}</td>
                  </tr>
                  <tr>
                      <td>Cantidad de medicamentos</td>
                      <td>{{$solicitud->AyudaDirecta->cant_medicamentos}}</td>
                  </tr>
                  <tr>
                      <td>Cantidad de insumos y/o elementos</td>
                      <td>{{$solicitud->AyudaDirecta->cant_insumos }}</td>
                  </tr>
              </table>
          </td>
      </tr>

  </table>

  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
              La presente autorización faculta al proveedor a suministrar los medicamentos y/o elementos, según
              prescripción médica detallada en receata/s adjunta/s, las cuales deben contener sello y firma del
              profesional autorizante de la Dirección de Asistencia Directa por Situaciones Especiales del Ministerio de
              Desarrollo Social de la Nación únicamente, debiendo el profesional farmacéutico hacer cumplir las
              disposiciones legales vigentes del recetario exigible.-
          </td>
      </tr>
  </table>
  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
              El Ministerio de Desarrollo Social por intermedio de la Dirección de Asistencia Directa por Situaciones
              Especiales autoriza por cuenta y orden del beneficiario designado a adquirir lo detallado en ?, Hasta la
              suma de ...
          </td>
      </tr>
  </table>
  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
              DERIVADO DESDE : {{dd($solicitud->AyudaDirecta->SolicitudesInformes)}}
          </td>
          <td align="center">
              DR : {{$solicitud->AyudaDirecta->firmante_receta}}
          </td>
          <td align="center">
              MATRICULA: {{$solicitud->AyudaDirecta->matricula}}
          </td>
          <td align="center">
              EXPEDIDO: {{$solicitud->AyudaDirecta->tipo_matricula}}
          </td>
      </tr>
  </table>
  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
              >>> NOTA A FARMACIA VALIDA UNICAMENTE PARA ESTA AUTORIZACION <<
          </td>
      </tr>
      <tr>
          <td align="center">
              {{$solicitud->AyudaDirecta->observaciones}}
          </td>
      </tr>
  </table>
  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
             >>> Sr. Proveedor : si esta autorizacion contiene leyendas Manuscritas  NO DEBE SER ACEPTADA NI ATENDIDA <<
          </td>
      </tr>
  </table>
  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
             Recibi en un todo conforme lo detallado en la receta adjunta.
          </td>
          <td align="center">
              SELLO
          </td>
      </tr>
  </table>

  <table width="100%" cellpadding="10" border="1">
      <tr>
          <td align="center">
            <p>FARMACIAS AUTORIZADAS</p>

              @foreach($solicitud->AyudaDirecta->Proveedores()  as $proveedor)
                 @if($proveedor->sedes_id == \Illuminate\Support\Facades\Auth::user()->sedes_id)

                  - {{$proveedor->nombre}} | {{$proveedor->direccion}} | {{$proveedor->ciudad}} | {{$proveedor->provincia}} <br>
              
                @endif
              @endforeach

          </td>
          <td align="center">
              Emitida el {{$solicitud->AyudaDirecta->created_at}}
          </td>
      </tr>
  </table>

  

  </body>

</html>