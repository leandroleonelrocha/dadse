<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ayuda Directa</title>
      <style>

        body{
            font-size: 11px;
            font-family: Arial, sans-serif;
        }

        hr {
            border: 0.5px solid #000000;
        }



          table{
              border-collapse: collapse;
          }

          .titulo{
              width: 100%;
              margin-top: 5px;
              margin-bottom: -15px !important;
          }

          .titulo *{
              vertical-align: middle !important;
              display: inline-block;
          }


          .titulo span{
              width: 50%;
              /*border: 1px solid red;*/
          }

          .right{
              display: inline-block;
              /*vertical-align: bottom !important*/;
              width: 50%;
          }

          .left{
              width: 50%;
              display: inline-block;
              /*vertical-align: top !important;*/
          }

          .content{
              border-top: 1px solid #c1c1c1;
              padding-top: 3px;
              /*margin-top: -40px !important;*/
          }

          .content span,.content p{
              display: inline-block;
              vertical-align: top !important;
          }

          .content span{
              width:100%;
          }

          .border{
              /*border-bottom: 1px solid black;*/
              /*margin-top: -10px;*/
              padding-top: 0 !important;
              margin-bottom: -20px !important;
              padding-bottom: 0 !important;
          }

          .datos_medicos p{
              margin:0 !important;
              padding:0 !important;
          }



      </style>
  </head>
  <body>

  <table style="width: 100%;" cellspacing="5">
      <tr>
          <td><img width="200px" src="../public/img/minist.png"></td>
      </tr>

      <tr>
          <td>
              <strong>Caso número:</strong> {{ $prestacion->Casos->id}} -- <strong>Ayuda directa número:</strong> {{$prestacion->Ayuda->id}}<br /><hr />
          </td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%;">
                  <tr valign="top">
                      <td style="width: 50%; font-size: 1.3em;">
                          <strong>** TITULAR</strong><br />
                          Nombre y Apellido: <strong>{{ $destinatario->fullname }}</strong><br />
                          Número de documento: <strong>{{ config('custom.tipo_documento.'.$destinatario->tipo_documento) }} {{ $destinatario->documento }}</strong><br />
                          Fecha de nacimiento: <strong>{{ $destinatario->fecha_nacimiento }} ({{ $destinatario->edad }} años)</strong><br />
                          Teléfono: <strong>{{ $destinatario->telefono_particular }}</strong><br />
                          Teléfono móvil: <strong>{{ $destinatario->telefono_movil }}</strong><br />
                          @if (! is_null($destinatario->hogar))
                          Reside en: <strong>{{ $destinatario->hogar->provincia }}, {{ $destinatario->hogar->partido }}</strong>
                          @endif
                      </td>
                      <td style="font-size: 1.2em;">
                          <strong>** RETIRA EN FARMACIA</strong><br />

                          @if($prestacion->Casos->Mandatarios)

                               @foreach($prestacion->Casos->Mandatarios as $mandatario)

                                    Nombre y Apellido: <strong>{{ $mandatario->fullname }}</strong><br />
                                    Documento: <strong>{{ $mandatario->tipo_documento }} {{ $mandatario->documento }}</strong><br>
                              @endforeach
                          @else    
                              Retira el Titular.
                          @endif  

                          {{--
                          @if(!is_null($mandatarios->mandatarios))
                              @foreach($mandatarios->mandatarios as $mandatario)
                                    Nombre y Apellido: <strong>{{ $mandatario->fullname }}</strong><br />
                                    Documento: <strong>{{ $mandatario->tipo_documento->nombre }} {{ $mandatario->documento }}</strong>
                              @endforeach
                          @endif

                          @if(!is_null($solicitante))
                                Nombre y Apellido: <strong>{{ $solicitante->fullname }}</strong><br />
                                Documento: <strong>{{ $solicitante->tipo_documento->nombre }} {{  $solicitante->documento }}</strong>
                          @endif

                          @if(empty($mandatarios->mandatarios) && is_null($solicitante) )
                              Retira el Titular.
                          @endif
                          --}}
                      </td>
                  </tr>
              </table>
          </td>
      </tr>

      <tr>
          <td style="border: 1px solid #000000;">** SUBSIDIO SOLICITADO: AYUDA DIRECTA</td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%; border: 1px solid #000000;">
                  <tr>
                      <td style="text-align: center; width: 30%; border-right: 1px solid #000000; font-weight: bold;">
                          Importe Neto Autorizado<br>
                          son : $ {{ $prestacion->Ayuda->importe_autorizado }}
                      </td>
                      <td style="padding-left: 3px;">
                          Cantidad de recetas: {{ $prestacion->Ayuda->cant_recetas}}<br />
                          Cantidad de medicamentos: {{ $prestacion->Ayuda->cant_medicamentos}}<br />
                          Cantidad de insumos y/o elementos: {{ $prestacion->Ayuda->cant_insumos }}
                      </td>
                  </tr>
              </table>
          </td>
      </tr>

      <tr>
          <td style="font-size: 0.8em;">
              La presente autorización faculta al proveedor a suministrar los medicamentos y/o elementos, según prescripción médica detallada en receta/s adjunta/s, las cuales deben contener sello y firma del profesional autorizante de la Dirección de Asistencia Directa por Situaciones Especiales del Ministerio de Desarrollo Social de la Nación únicamente, debiendo el profesional farmacéutico hacer cumplir las disposiciones legales vigentes del recetario exigible.-<br /><br />
              El Ministerio de Desarrollo Social por intermedio de la Dirección de Asistencia Directa por Situaciones Especiales autoriza por cuenta y orden del beneficiario designado a adquirir lo detallado en receta adjunta, hasta la suma de {!! $total  !!}
          </td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%; border: 1px solid #000000;">
                  <tr>
                      <td style="text-align: center; width: 30%; border-right: 1px solid #000000; font-weight: bold;">SON : $ {{ $prestacion->Ayuda->importe_autorizado }}</td>
                      <td style="padding-left: 3px;">
                          Sr. Proveedor: La entrega de los elementos solicitados según receta adjunta y autorizada por esta Dirección, se realizará cuando el importe a facturar no supere el valor neto autorizado, caso contrario,  el beneficiario deberá solicitar a esta Dirección actualizar la autorización conforme los valores que correspondan. No será considerada para su liquidación toda factura que supere el valor autorizado.
                      </td>
                  </tr>
              </table>
          </td>
      </tr>
      <tr>
          <td>
              <table style="width: 100%;">
                  <tr>
                      <td><strong>Derivado desde:</strong> {{ $prestacion->Ayuda->PrestacionesInformes->Hospitales ? $prestacion->Ayuda->PrestacionesInformes->Hospitales->fullname : "" }}</td>
                      <td><strong>Médico:</strong> {{ $prestacion->Ayuda->PrestacionesInformes->medico_tratante }}</td>
                  </tr>
                  <tr>
                      <td><strong>Matrícula:</strong> {{ $prestacion->Ayuda->PrestacionesInformes->matricula == 0 ? 'ILEGIBLE' : $prestacion->Ayuda->PrestacionesInformes->matricula }}</td>
                      <td><strong>Expedido:</strong> {{ ucwords($prestacion->Ayuda->PrestacionesInformes->tipo_matricula) }}</td>
                  </tr>
              </table>
          </td>
      </tr>

      <tr>
          <td style="border: 1px solid #000000; text-align: center;">>>> NOTA A FARMACIA VALIDA UNICAMENTE PARA ESTA AUTORIZACION <<</td>
      </tr>

      <tr>
          <td style="border: 1px solid #000000; height: 40px;">
              {{ $prestacion->Ayuda->PrestacionesInformes->observaciones }}
          </td>
      </tr>

      <tr>
          <td style="text-align: center;"><small><strong>Sr. Proveedor: si esta autorizacion contiene leyendas Manuscritas  NO DEBE SER ACEPTADA NI ATENDIDA.</strong></small></td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%; font-size: 0.9em;" cellspacing="15">
                  <tr valign="top">
                      <td style="width: 45%;">
                          Recibi en un todo conforme lo detallado en la receta adjunta.<br /><br /><br /><br />
                          <hr />
                          Firma del Beneficiario<br /><br /><br />
                          <hr />
                          Tipo y número de documento<br /><br />
                          <small><strong>Sr. Proveedor: Certifique que la documentación del beneficiario se corresponda con la detallada en la presente autorización.</strong></small>
                      </td>
                      <td></td>
                      <td style="width: 45%;">
                          Sello y Firma de la Persona que Autoriza Por la Dirección de Asistencia Directa por Situaciones Especiales del Ministerio de Desarrollo Social<br /><br />
                          Emitida el: <strong>{{ $prestacion->Ayuda->updated_at }}</strong><br /><br />
                          La presente autorización debe ser presentada ante el Proveedor, para su atención y suministro antes del  {{ $prestacion->Ayuda->fecha_vencimiento() }}, caso contrario deberá solicitar una nueva autorización.<br /><br />
                          @if (! is_null($prestacion->Ayuda->users))
                              Emitida por: <strong>{{ $prestacion->Ayuda->users->fullname }}</strong>
                          @endif
                      </td>
                  </tr>
              </table>
          </td>
      </tr>

      <tr>
          <td style="border: 1px solid #000000; padding-left: 3px;">
              <strong>FARMACIAS AUTORIZADAS</strong><br /><br />

              @if(count($prestacion->Ayuda->AyudaDirectaProveedores) > 0)
                  @foreach($prestacion->Ayuda->AyudaDirectaProveedores  as $model)
                      <strong>{{ $model->nombre }}:</strong> {{$model->direccion}}, <small>{{$model->ciudad}}, {{$model->provincia}}</small><br />
                  @endforeach
              @else
                  @foreach($prestacion->Ayuda->Proveedores()  as $proveedor)
                      <strong>{{$proveedor->nombre}}:</strong>, <small>{{$proveedor->direccion}}, {{$proveedor->ciudad}} | {{$proveedor->provincia}}</small><br />
                  @endforeach
              @endif
          </td>
      </tr>
  </table>
  </body>
</html>