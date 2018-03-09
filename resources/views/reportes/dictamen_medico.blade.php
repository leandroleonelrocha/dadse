<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dictamen Medico</title>
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
         .left{
            display: block;
            float:left; 
            width:33%;
          }


      </style>
  </head>
  <body>
  <table style="width: 100%;" cellspacing="5">
      <tr>
          <td>
            <img width="250px" src="../public/img/minist.png">
            <tr>
              <td style="width: 50%; text-align:right; font-size: 1.1em;">
                <p>
                  Buenos Aires, {{date('d/m/Y')}} <br> 
                  Subsidio N° {{ $prestacion->Casos->id}} <br>
                  Memorando N° {{ $prestacion->Casos->id}} <br>
                  Expediente N° {{ $prestacion->Casos->id}} <br>
                </p>
              </td>
            </tr>  
          </td>
      </tr>
   
      <tr>
          <td>
              <strong>Sra. Claudia Mori</strong> <br /><hr />
          </td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%;">
                  <tr valign="top">
                      <td style="width: 25%; text-align:center; font-size: 1.3em;">
                          <strong>** TITULAR</strong>
                      </td>      
                      <td style="padding:5px; font-size: 1.3em;"> 
                          * Nombre y Apellido: <strong>{{$prestacion->Casos->PersonasFisicas->fullname}}</strong><br/>
                          * Número de documento: <strong>{{$prestacion->Casos->PersonasFisicas->tipo_documento}}: {{$prestacion->Casos->PersonasFisicas->documento}}  </strong><br />
                          * Fecha de nacimiento: <strong></strong><br />
                          * Teléfono: <strong>{{$prestacion->Casos->PersonasFisicas->telefono_particular}}</strong><br />
                          * Teléfono móvil: <strong>{{$prestacion->Casos->PersonasFisicas->telefono_movil}}</strong><br />
                         
                          * Reside en: <strong></strong>
                          
                      </td>
                  </tr>
              </table>
          </td>
      </tr>

      <tr>
          <td style="border: 1px solid #000000; padding:5px;">Del análisis de la documentación surge Subsidio Solicitado: Medicamentos</td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%; border: 1px solid #000000;">
              

                  <tr>
                      <td style="padding:5px;">Diagnóstico</td>
                      <td style="padding:5px; text-align:left;">{{$prestacion->Informe->diagnostico}}</td>
                  </tr>

                  <tr>
                      <td style="padding:5px; ">El Paciente es derivado de </td>
                      <td style="padding:5px; text-align:left;">{{$prestacion->Informe->hospital_tratante}}</td>
                  </tr>

                  <tr>
                    <td style="padding:5px;"> Certificado del Dr./Dra.</td>
                    <td style="padding:5px; text-align:left;"> {{$prestacion->Informe->Medico}}</td>
                    
                  </tr>
                  
              </table>
          </td>
      </tr>

      <tr>
          <td style="font-size: 1.1em;">
              Se entiende que el presente caso se encuentra comprendido por la Resolución N° 2458/2004 del Ministerio de Desarrollo Social
          </td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%; border: 1px solid #000000;">
                  <tr>
                      <td style="text-align: center; width: 30%; border-right: 1px solid #000000; font-weight: bold;">Intervención del Profesional Actuante </td>
                      <td style="padding: 25px;">
                         SE ADJUDICA A MENOR PRESUPUESTO A FS 22
                      </td>
                  </tr>
                  <tr>
                      <td style="border-top: 1px solid #000000; padding:5px; border-right: 1px solid #000000;"  >Entregar Subsidio En: </td>
                      <td style="border-top: 1px solid #000000; padding:5px">
                         PERSONA ASIGNADA
                      </td>
                  </tr>
                  
              </table>
          </td>
      </tr>
     
      <tr>
        <td>
          <table style="width: 100%; border: 1px solid #000000;margin: auto; width: 50%; padding: 10px; ">
              <tr>
                  <td style="border-bottom: 1px solid #000000; text-align: center; padding:5px;"> Importe Total Presupuestado</td>
                  <td style="border-bottom: 1px solid #000000; text-align: left; padding:5px;">$ 457652</td>
              </tr>
              <tr>
                <td style="text-align: center;"> A Cargo M.D.S </td>
                <td style="text-align: left;">$ 457652</td>           
              </tr>
              <tr>
                <td style="text-align: center;"> A Cargo M.D.S </td>
                <td style="text-align: left;">$ 0</td>           
              </tr>
              <tr>
                 <td style="border-top: 1px solid #000000; text-align: center;padding:5px;">
                PRESUPUESTOS ADJUDICADOS</td><td style="border-top: 1px solid #000000; text-align: center;padding:5px;"></td>           
              </tr>
          </table>
        </td>
       </tr>

      <tr>
          <td>
              <table style="width: 100%; border: 1px solid #000000;">
                  <tr>
                      <td style="text-align: center; width: 100%; border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                          DICTAMEN AUDITORIA MEDICA DE MEDICAMENTOS
                      </td>
                  </tr>
                  <tr>
                      <td style="text-align: left; width: 100%; border-top: 1px solid #000000; font-weight: bold; padding:5px;">
                          Proveedor
                          {{$presupuestos->Proveedores->razon_social}}
                      </td>
                  </tr>
                  <tr>
                      <td style="text-align: left; width: 30%; border-top: 1px solid #000000; font-weight: bold; padding:5px;">
                          El importe adjudicado asciende a: ${{$presupuestos->total}} {{$total_letras}}
                      </td>
                  </tr>
                  <tr>
                      <td style="text-align: center; width: 100%; border-top: 1px solid #000000; font-weight: bold; padding:5px;">
                          Detalle del pago<br>
                          <p>Orden de los Pagos PAGO UNICO Presupuesto N° {{$presupuestos->id}} de fecha {{date('d/m/Y',strtotime($presupuestos->fecha_solicitud))}}</p>
                      </td>
                  </tr>
              </table>
          </td>
      </tr>

      <tr>
          <td>
              <table style="width: 100%; border: 1px solid #000000;">
                  <tr>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                          Nombre comercial
                      </td>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                          Genérico
                      </td>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                          Presentación
                      </td>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                          Dosis
                      </td>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                         Cantidad
                      </td>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                         Precio Unitario
                      </td>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                         Total
                      </td>
                        <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                        A cargo
                      </td>
                      <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">
                        Precio Total
                      </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">{{$prestacion->descripcion}}</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">TRAST</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">VIAL</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">{{$prestacion->unidad_medida}}</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">{{$presupuestos->cantidad_ofertada}}</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;"> $ {{$presupuestos->precio_unitario}}</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">$ {{$presupuestos->total}}</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">0</td>
                    <td style="text-align: center;  border-right: 1px solid #000000; font-weight: bold; padding:5px;">156954</td>
                  </tr>
                  <tr>
                   <td style="text-align: center;  border-top: 1px solid #000000; font-weight: bold; padding:5px;" colspan="2">Prescripción</td>
                   <td style="text-align: center;  border-top: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold; padding:5px;" colspan="5">{{$prestacion->Informe->ciclos}} x ciclo</td>
                    <td style="text-align: center;  border-top: 1px solid #000000; font-weight: bold; padding:5px;" colspan="2">
                      <table >
                          <tr>
                            <th style="text-align:center; ">Ciclos</th>
                          </tr>
                          <tr>
                            <td>Cantidad</td>
                            <td>0</td>
                          </tr>
                          <tr>
                            <td>Entrega Cada</td>
                            <td>0 Dias</td>
                          </tr>

                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: left;  border-top: 1px solid #000000; padding:5px;" colspan="3">
                      Realizar Pago Según Corresponda a la Ordend de:<br>
                     
                    </td>
                    <td style="text-align: left;  border-top: 1px solid #000000; font-weight: bold;" colspan="6">
                      {{$presupuestos->Proveedores->razon_social}}
                    </td>
                  </tr>
              </table>
          </td>
      </tr>



     
      

  </table>
  </body>
</html>