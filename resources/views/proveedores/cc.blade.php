<div id="accordion" role="tablist" aria-multiselectable="true" class="panel-group">

<h5 class="text-right"><em class="fa fa-exclamation-circle fa-lg fa-fw"></em>Liquidaciones del {{  date('d/m/Y', strtotime("-29 days")) }} al {{ date('d/m/Y') }}</h5>

 @foreach($liquidaciones as $liquidacion)
  
    <div class="panel panel-default">
      <div id="headingOne" role="tab" class="panel-heading">
         <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$liquidacion->id}}" aria-expanded="false" aria-controls="collapseOne{{$liquidacion->id}}" class="collapsed">
         Liquidación # {{$liquidacion->nro_liquidacion_interna}}</a>
         <small>{{ date('d/m/Y' ,strtotime($liquidacion->fecha_liquidacion)) }}</small>
         </h4>

      </div>
      <div id="collapseOne{{$liquidacion->id}}" role="tabpanel" aria-labelledby="headingOne" class="panel-collapse collapse" aria-expanded="false">

         <div class="panel-body">
            <div class="col-xs-12">
                <table class=" table table-striped">
                    <thead>
                        <td>Fecha Factura</td>
                        <td>N° Factura / Detalle</td>
                        <td>Total</td>
                    </thead>
                    <tbody>
                    <?php  $total = 0;?>

                    @foreach($liquidacion->Facturas as $factura)
                        <tr>
                            <td>{{$factura->fecha}}</td>
                            <td>
                              <a href="{{route('proveedores.detalle_factura',$factura->nro_factura)}}"> {{$factura->nro_factura}} </a>
                            </td>
                          
                            <td>$ {{number_format($factura->FacturasItems->sum('precio_unitario') ,2) }}</td>
                            <?php $total += $factura->FacturasItems->sum('precio_unitario') ?>
                            <td></td>
                            
                        </tr>
                    @endforeach
                </tbody>
             
                <tfoot>
                <td colspan="1"> TOTAL <span class="text-danger"> $ {{ number_format($total,2)}}</span></td>
                <td colspan="3">

                    <a type="button" href="{{route('proveedores.liquidaciones.borrar', $liquidacion->id)}}" class="btn btn-default pull-right btn-danger msgDelete pull-right">
                          <i class="fa fa-times"></i>
                        </a>
                    <div class="btn-group mb-sm pull-right">
                           <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary" aria-expanded="false">REPORTES
                              <span class="caret"></span>
                           </button>
                           <ul role="menu" class="dropdown-menu">
                             <li>
                                 <a href="{{route('proveedores.getLiquidacion', $liquidacion->id)}}"  target="_blank">  LIQUIDACION </a>

                              </li>
                               <li>
                                   <a href="{{route('proveedores.getLiquidacion', [$liquidacion->id, 1])}}"  target="_blank">  LIQUIDACION  <span class="fa fa-file-excel-o"></span> </a>

                               </li>

                              <li> <a type="button" href="{{route('proveedores.getAnexo',$liquidacion->id)}}" target="_blank">ANEXO</a>
                              </li>

                              <li> <a href="{{route('proveedores.getResolucion', $liquidacion->id)}}"  target="_blank"> RESOLUCION </a>
                              </li>

                              <li><a href="{{route('proveedores.getProvidencia', $liquidacion->id)}}" target="_blank">PROVIDENCIA </a>
                              </li>
                           </ul>
                    </div>
                        
                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-liquidacion="{{$liquidacion->id}}" data-target="#modalProcesarLiquidacion">PROCESAR LIQUIDACION </button>

                        

                  </td>
                </tfoot>

            </table>

        </div>
        

      </div>
    </div>



  </div>  

@endforeach

</div>

<a href="{{route('proveedores.crearFactura',$models->id)}}" class="btn btn-default "><i class="fa fa-plus-square"></i> Crear Factura</a>


<button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal">
<i class="fa fa-upload"></i>
    Subir Excel
</button>

<a type="button" class="btn btn-default pull-right" target="_blank" href="{{asset('excel/farmacias.xlsx')}}" download>
<i class="fa fa-download"></i>
     Descargar Excel
</a>

@section('javascript')
<script type="text/javascript">
  $('#modalProcesarLiquidacion').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var bookId = $(e.relatedTarget).data('liquidacion');
    //populate the textbox
    $(e.currentTarget).find('input[name="liquidaciones_id"]').val(bookId);

    $.get('proveedores/getLiquidacionAjax/'+bookId ,function(data){
        console.log(data);
        $('#nro_expediente_electronico').val(data.nro_expediente_electronico);
        $('#nro_expediente_edadse').val(data.nro_expediente_edadse);
        $('#nro_if_anexo').val(data.nro_if_anexo);
        $('#if_proyecto_resolucion').val(data.if_proyecto_resolucion);
        $('#if_providencia_asubse').val(data.if_providencia_asubse);
        $('#if_providencia_resolucion').val(data.if_providencia_resolucion);


    });
  });
</script>
@endsection