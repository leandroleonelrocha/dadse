@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-xs-12 ">
            <h2># <span id="prestacionId" data-id="{{$producto->id}}">{{$producto->id}}</span> - {{$producto->producto}}</h2>
            <!-- START bar chart-->

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$producto->descripcion}}
                </div>
                    <div class="panel-body">

                            <div class="col-xs-6" >
                                <h4>Medicamentos en KAIROS</h4>
                                <div class="input-group">
                                    <input id="text_search_kairos" type="text" class="form-control" placeholder="Buscar producto de referencia en KAIROS">
                                         <span class="input-group-btn">
                                            <button id="search_kairos" type="button" class="btn btn-default">Buscar</button>
                                         </span>
                                </div>

                                <div id="results" >
                                    <ul class="ul" >
                                    </ul>
                                </div>
                            </div>

                        <div class="col-xs-6" >
                            <h4>Prótesis</h4>
                            <div class="input-group">
                                <input id="text_search_protesis" type="text" class="form-control" placeholder="Buscar Prótesis">
                                         <span class="input-group-btn">
                                            <button id="search_protesis" type="button" class="btn btn-default">Buscar</button>
                                         </span>
                            </div>

                            <div id="results_protesis" >
                                <ul class="ul" >
                                </ul>
                            </div>
                        </div>




                        <div class="tabla_presentaciones col-xs-12 ">
                        <h3 id="nombre_producto"></h3>
                            <table id="tabla_detalle" class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>Importe</th>
                                    <th></th>
                                </tr>
                            </table>
                     </div>

                    </div>
                  </div>

                  <div class="panel panel-default">
                  <div class="panel-body">

                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                                <th>Cant.</th>
                                <th>Tipo</th>
                                <th>Producto</th>
                                <th>Importe</th>
                                <th></th>
                            </thead>
                            <?php $total = 0;?>
                                @foreach($prestaciones as $prestacion)
                                <tr>
                                    <td>{{$prestacion->productos_id}}</td>
                                    <td>{{$prestacion->tipos}}</td>
                                    <td>{{$prestacion->productos_detalle}} - {{$prestacion->presentaciones_detalle}}</td>
                                    <td>$ {{$prestacion->importe}}</td>
                                    <?php $total = $total + $prestacion->importe ?>
                                    <td>
                                      <a href="{{route('prestacionesProductosDelete',$prestacion->id)}}" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            <tr>
                                <th  colspan="5"><p class="label label-green"> Total : $ {{$total}} </p class="label"> </th>
                            </tr>

                        </table>
                    </div>

                    </div>
                </div>
                <div class="panel-footer">
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection



@section('javascript')
    <script>

       $('#search_kairos').on('click',function(){
           var data = $('#text_search_kairos').val();
          console.log(data);
           $.get('../../search_kairos/'+data , function( resp ) {

               $('#results .ul').remove();
               $('#results').append('<ul class="ul"></ul>');
               $('#results').css('display','block');

               $.each(resp['results'] ,function( key, value ){
                    $('#results .ul').append('<li class="producto"  data-id='+value['id']+'>'+value['descripcion']+'</li>');
                   });
           });
       });

       $('#search_protesis').on('click',function(){
           var data = $('#text_search_protesis').val();
           var idPrestacion     = $('#prestacionId').attr('data-id');


           $.get('../../search_protesis/'+data , function( resp ) {

               $('#results_protesis .ul').remove();
               $('#results_protesis').append('<ul class="ul"></ul>');
               $('#results_protesis').css('display','block');


               $.each(resp['results'] ,function( key, value ){
                   //$('#results .ul').append('<li class="protesis" data-valor='+value['valor']+' data-id='+value['id']+'>'+value['nombre']+' - $ '+ value['valor']+'</li>');
                   $('#tabla_detalle').append('<tr class="tr_data"><td>'+value['id']+'</td><td>'+value['nombre']+'</td><td> $ '+value['valor']+'</td><td><a href="asignar_producto/protesis/null/'+value['id']+'/'+idPrestacion+'">Asignar</a></td></tr>');
               });
           });
       });

       $('#results').on('dblclick','.producto',function(){

           var idProducto       = $(this).attr('data-id');
           var nombreProducto   = $(this).text();
           var idPrestacion     = $('#prestacionId').attr('data-id');


           $('#results .ul').remove();
           $('#results').append('<ul class="ul"></ul>');

           $('.tr_data').remove();

           $.get('../../search_kairos_presentaciones/'+idProducto , function( resp ) {

              // $('#nombre_producto').html(nombreProducto);

               $.each(resp['result']['presentaciones'] ,function( key, value ){
                   $('#tabla_detalle').append('<tr class="tr_data"><td>'+value['clave']+'</td><td>'+nombreProducto+' -  '+value['descripcion']+'</td><td> $ '+value['precio']+'</td><td><a href="asignar_producto/medicamentos/'+idPrestacion+'/'+idProducto+'/'+value['clave']+'">Asignar</a></td></tr>');
               });
           });

           $('#results').css('display','none');
           $('.tabla_presentaciones').removeClass('hidden');
       });


    </script>
@endsection

