


        <tr>
            <td>
                <img width="200px" src="../public/img/minist.png">
            </td>
            <td>
                <p>Buenos Aires,{!! date('d',time()) !!} de Agosto de {!! date('Y',time()) !!}</p>
            </td>
            <td></td>
        </tr>


        <tr>
            <td><b> LIQUIDACIÓN MDS N°</b></td>
            <td>{{$model->nro_liquidacion_interna}}</td>
            <td></td>
        </tr>

        <tr>
            <td><b> FECHA LIQUIDACIÓN </b></td>
            <td>{{date('d/m/Y',strtotime($model->fecha_liquidacion))}}</td>
            <td></td>
        </tr>

        <tr>
            <td><b> Expediente E-DADSE </b></td>
            <td>{{ $model->nro_expediente_edadse }}</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>
            @if(isset($model->anexo))
                <span class="upper"><h1>Anexo I</h1></span>
            @endif
            </td>
            <td></td>
        </tr>

        <tr>
            <td>Proveedor</td>
            <td><h2>{{$model->Proveedores->razon_social}}</h2></td>
            <td>{{$model->Proveedores->domicilio_fiscal}}</td>
        </tr>


        <tr>
            <td><b> LIQUIDACIÓN N° </b></td>
            <td>{{$model->nro_liquidacion_proveedor}}</td>
            <td></td>
        </tr>

        <tr>
            <td><b> FECHA LIQUIDACIÓN </b></td>
            <td>{{date('d/m/Y',strtotime($model->fecha_liquidacion))}}</td>
            <td></td>
        </tr>

        <tr>
            <td>
                Facturación correspondiente al periodo <b>{{date('d/m/Y',strtotime($model->minFecha()->fecha_desde)) }} </b> al <b>{{date('d/m/Y',strtotime( $model->maxFecha()->fecha_hasta)) }}</b>
            </td>
            <td>
                <h2>Liquidación N° {{$model->nro_liquidacion_interna}}</h2>
            </td>
            <td></td>
        </tr>

        <tr style="background-color: #9da0a4;" >
            @if(isset($model->anexo))
                <td>
                    Fecha de Ent.
                </td>
            @else
                <td>
                    Aut. N°
                </td>
            @endif
            <td>
                Caso N°
            </td>
            <td>
                Beneficiario
            </td>
            <td>
                Documento
            </td>
            <td>
                Fecha Fact.
            </td>
            <td>
                Facura N°
            </td>
            <td>
                Importe
            </td>
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
                    <td>
                        {{$factura->Caso->PersonasFisicas->fullname or ''}} /
                        @if($factura->Caso->Mandatarios->count() > 0)
                            {{$factura->Caso->Mandatarios->fullname or ''}}
                        @endif
                    </td>
                    <td>{{$factura->Caso->PersonasFisicas->documento or ''}}/
                        @if($factura->Caso->Mandatarios->count() > 0)
                            {{$factura->Caso->Mandatarios->documento or ''}}
                        @endif
                    </td>
                    <td>{{$factura->fecha}}</td>
                    <td>{{$factura->nro_factura}}</td>
                    <td>$ {{number_format($items->precio_unitario,2)}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6"></td>
                <td>
                    <b>$ {{number_format($factura->FacturasItems()->sum('precio_unitario'),2)}}</b>
                </td>
            </tr>
        @endforeach

        <tr>
            <td colspan="5"></td>
            <td>IMPORTE TOTAL A LIQUIDAR </td>
            <td><b>$  {{ $importe_total}}</b></td>
        </tr>

        <tr>
            <td>
                <p>Son <b>${{  $importe_total }} </b> {{ $importe_total_texto }}</p>
            </td>
        </tr>
        <tr>
            <td>
                Liquidación autorizada por
            </td>
        </tr>
        <tr>
            <td>
                Dirección de Asistencia Directa por Situaciones Especiales
            </td>
        </tr>
