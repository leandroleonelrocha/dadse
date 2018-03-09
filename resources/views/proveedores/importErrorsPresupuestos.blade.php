@extends('template/template')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="">Proveedores</a></li>
        <li class="active"></li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
            <h1></h1>
            <div class="panel panel-default ">
                <div class="panel panel-body">
                
                    {!! Form::open(['route'=>'proveedores.procesar.presupuesto']) !!}
                    {!! Form::hidden('proveedor_id', $proveedor) !!}
                    <div class="table-responsive">
  
                     <table class="table">
                        <thead>
                            <tr class="row">
                                <th class="col-sm-1">Orden</th>
                                <th class="col-sm-1">Presupuesto_Nro</th>
                                <th class="col-sm-1">Caso_Nro/Prestacion_Nro</th>

                                <th class="col-sm-1">Cantidad_Solicitada</th>
                                <th class="col-sm-1">Producto</th>
                                
                                <th class="col-sm-1">Um</th>
                                <th class="col-sm-1">Precio_Unitario</th>
                                <th class="col-sm-1">Precio_Total</th>
                                <th class="col-sm-1">Cantidad_Ofertada</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr class="row">
                                      
                                <td class="col-sm-1">{!! Form::text('', $d->orden,['class'=>'form-control']) !!} </td>
                                <td class="col-sm-1">{!! Form::text('data[presupuesto_nro][]', $d->presupuesto_nro , ['class'=>'form-control']) !!} </td>
                                <td class="col-sm-1">{!! Form::text('', $d->caso_nroprestacion_nro , ['class'=>'form-control']) !!}  </td>
                                
                                <td class="col-sm-1">{!! Form::text('', $d->cantidad_solicitada , ['class'=>'form-control']) !!}  </td>
                                <td class="col-sm-1">{!! Form::text('', $d->producto , ['class'=>'form-control']) !!}  </td>
                                <td class="col-sm-1">{!! Form::text('', $d->um , ['class'=>'form-control']) !!} </td>
                               
                                <td class="col-sm-1">{!! Form::text('data[precio_unitario][]', $d->precio_unitario , ['class'=>'form-control']) !!} </td>
                                <td class="col-sm-1">{!! Form::text('data[precio_total][]', $d->precio_total , ['class'=>'form-control']) !!} </td>
                                <td class="col-sm-1">{!! Form::text('data[cantidad_ofertada][]', $d->cantidad_ofertada , ['class'=>'form-control']) !!} </td>
                                

                                {{--
                                <td><a href="javascript:void(0)" class="btn-delete btn btn-xs btn-default"><span class="fa fa-trash"></span></a></td>
                                <td><input type="hidden" value="{{$d->error}}" name="error"></td>
                                <td>{{($d->error)}}</td>
                                --}}    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    </div>
                    <div class="panel-footer">
                        {!! Form::submit('Actualizar Presupuestos',['class'=>'btn ']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
<script type="text/javascript">
    $('.btn-delete').click(function(e)
    {
        var result = confirm("Confirma que desea eliminar.?");
        if (!result) {
            return;
        }
        e.preventDefault();
        var row = $(this).parents('tr');
        row.fadeOut();
   
    });
</script>
@endsection