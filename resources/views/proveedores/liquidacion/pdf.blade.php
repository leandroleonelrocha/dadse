<!doctype html>
<html lang="en">


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

    <table width="100%">
        <tr>
            <td>
                <table>
                    <tr>
                        <td><b> LIQUIDACIÓN MDS N°</b></td>
                        <td>{{$model->nro_liquidacion_interna}}</td>
                    </tr>
                    <tr>
                        <td><b> FECHA LIQUIDACIÓN </b></td>
                        <td>{{date('d/m/Y',strtotime($model->fecha_liquidacion))}}</td>
                    </tr>
                    <tr>
                        <td><b> Expediente E-DADSE </b></td>
                        <td>{{ $model->nro_expediente_edadse }}</td>
                    </tr>
                    
                </table>
            </td>
            <td colspan="2">
                    @if(isset($model->anexo))
                           <span class="upper"><h1>Anexo I</h1></span>
                    @endif
            </td>
            <td>



                <table align="center">
                    <tr>
                        <td align="center">Proveedor</td>
                    </tr>
                    <tr>
                        <td><h2>{{$model->Proveedores->razon_social}}</h2></td>
                    </tr>
                    <tr>
                        <td align="center">{{$model->Proveedores->domicilio_fiscal}}</td>
                    </tr>
                </table>

                <hr>

                <table align="center">
                    <tr>
                        <td><b> LIQUIDACIÓN N° </b></td>
                        <td>{{$model->nro_liquidacion_proveedor}}</td>
                    </tr>
                    <tr>
                        <td><b> FECHA LIQUIDACIÓN </b></td>
                        <td>{{date('d/m/Y',strtotime($model->fecha_liquidacion))}}</td>
                    </tr>
                </table>
            </td>


        </tr>
    </table>

    <hr>

    <table width="100%" align="center">
        <tr>
            <td align="center">
                Facturación correspondiente al periodo <b>{{date('d/m/Y',strtotime($model->minFecha()->fecha_desde)) }} </b> al <b>{{date('d/m/Y',strtotime( $model->maxFecha()->fecha_hasta)) }}</b>
            </td>
            <td>
                <h2>Liquidación N° {{$model->nro_liquidacion_interna}}</h2>
            </td>
        </tr>
    </table>

    <hr>

    <table width="100%">
        <tr bgcolor="#d3d3d3">
            @if(isset($model->anexo))
                <th>
                    Fecha de Ent.
                </th>
            @else
                <th>
                    Aut. N°
                </th>
            @endif
            <th>
               Caso N°
            </th>
            <th>
                Beneficiario
            </th>
            <th>
                Documento
            </th>
            <th>
                Fecha Fact.
            </th>
            <th>
                Facura N°
            </th>
            <th>
                Importe
            </th>
         
        </tr>


        @foreach($model->Facturas as $factura)
            @foreach($factura->FacturasItems as $items)
            <tr>
                <td>


                @if(isset($model->anexo))
                        {{$items->fecha_entrega}}
                @else
                            <?php $c = 0?>
                            @foreach($factura->Caso->AyudaDirecta as $aD)

                             @if($c%2)
                            ,
                            @endif
                            {{$aD->id }}

                            <?php  $c++?>
                            @endforeach
                @endif


                </td>
                <td>{{$factura->Caso->id}}</td>
                <td class="upper">
                    {{$factura->Caso->PersonasFisicas->fullname or '' }} /<br>
                    @if($factura->Caso->Mandatarios->count() > 0)
                        {{$factura->Caso->Mandatarios->fullname or '' }}
                    @endif
                </td>
   
                <td>{{$factura->Caso->PersonasFisicas->documento or ''}}/<br>
                @if($factura->Caso->Mandatarios->count() > 0)
                    {{$factura->Caso->Mandatarios->documento or ''}}
                @endif
                </td>
                <td>{{$factura->fecha}}</td>
                <td>{{$factura->nro_factura}}</td>
                <td align="right">$ {{number_format($items->precio_unitario,2)}}</td>
            
            </tr>
            @endforeach
            <tr>
                <td colspan="7" align="right" style="border-bottom: 1px solid #d3d3d3;">
                    <b>$ {{number_format($factura->FacturasItems()->sum('precio_unitario'),2)}}</b>
                </td>
            </tr>
        @endforeach
        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td colspan="5" bgcolor="#d3d3d3" align="right">
                    <table align="center">
                        <tr>
                            <td width="80%">IMPORTE TOTAL A LIQUIDAR </td>
                            <td><b>$  {{ $importe_total}}</b></td>
                        </tr>
                    </table>
                 </td>
            </tr>
        </tfoot>
    </table>

    <hr>



    <table align="center">
        <tr>
            <td>
                <p>Son <b>${{  $importe_total }} </b> {{ $importe_total_texto }}</p>
            </td>
        </tr>
    </table>

    <hr>


    <table align="right">
        <tr>
            <td align="center">
                Liquidación autorizada por
            </td>
        </tr>

        <tr><td><br><br><br></td></tr>

        <tr>
            <td align="center">
                Dirección de Asistencia Directa por Situaciones Especiales
            </td>
        </tr>
    </table>


</body>
</html>
