@extends('template/template')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="">Proveedores</a></li>
        <li class="active"></li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
            <p class="text-right">
                 <button onclick="myFunction()" class=" btn btn-default btn-sm">
                    <em class="fa fa-print text-primary"></em>
                    Imprimir
                </button>        
            </p>
            <div class="panel panel-default">
               
                <div class="panel panel-body">
                    {!! Form::open(['route'=>'proveedores.procesar.excel', 'id'=>'env_form_excel']) !!}
                    {!! Form::hidden('proveedor_id', $proveedor) !!}
                    
                    <table class="table">
                       
                        <thead>
                            <td>F. Venta</td>
                            <td>Producto</td>
                            <td>Droga Genérica</td>
                            <td>Cant.</td>
                            <td>F. Factura</td>
                            <td>Nro. Factura</td>
                            <td>Nro. Liquidacion</td>
                            {{--<td>Nro. Prestación</td>--}}
                            <td>Nro. Caso</td>
                            <td>Precio</td>
                            <td></td>
                            <td></td>
                        </thead>
                        <tbody>

                        @foreach($data as $key => $d)
                          
                            <tr>

                                <td>{!! Form::text('data[fecha_venta][]', $d['fecha_venta'] , ['class'=>'form-control']) !!} </td>
                                <td>{!! Form::text('data[producto][]', $d['producto'] , ['class'=>'form-control']) !!}  </td>
                                <td>{!! Form::text('data[droga_generica][]', $d['droga_generica'] , ['class'=>'form-control']) !!}    </td>
                                <td>{!! Form::text('data[cantidad][]', $d['cantidad'] , ['class'=>'form-control']) !!}  </td>
                                <td>{!! Form::text('data[fecha_factura][]', $d['fecha_factura'] , ['class'=>'form-control']) !!}  </td>
                                <td>{!! Form::text('data[n_factura][]', $d['n_factura'] , ['class'=>'form-control']) !!}  </td>
                                <td>{!! Form::text('data[n_liquidacion][]', $d['n_liquidacion'] , ['class'=>'form-control']) !!}  </td>
                                {{--<td>{!! Form::text('data[n_prestaciones][]', $d[n_prestaciones] , ['class'=>'form-control']) !!}  </td>--}}
                                <td>{!! Form::text('data[n_caso][]', $d['n_caso'] , ['class'=>'form-control']) !!}  </td>
                                <td>{!! Form::text('data[importe][]', $d['importe'] , ['class'=>'form-control']) !!}  </td>
                                <td><a href="javascript:void(0)" class="btn-delete btn btn-xs btn-default"><span class="fa fa-trash"></span></a></td>
                            </tr>
                            @if(isset($d['error']) || isset($d['error_importe']))
                            <tr class="error">
                                <td colspan="9">

                                    @if(isset($d['error']))<span class="label label-danger"> {!! $d['error']  !!} </span> <br>@endif
                                    @if(isset($d['error_importe']))
                                    <span class="label label-danger"> {!! $d['error_importe']  !!} </span>
                                    {!! Form::hidden('data[error_importe][]',$key) !!}
                                    @endif</span> 
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    
                    <div class="panel-footer">
                        {!! Form::submit('Procesar',['class'=>'btn btn_enviar pull-right']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            @if(count($error_caso) > 0)
                <div role="alert" class="alert alert-danger">
                    <strong>Error! Los siguientes casos no existen y no serán procesados: </strong><br>
                        @foreach($error_caso as $d)
                            @if($d != 0)
                                # {{$d}}<br>
                            @endif
                        @endforeach  
                </div>
            @endif  
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
        row.fadeOut(300, function(){ 
            $(this).remove();
        });

        if(row.next().hasClass('error')){
            row.next().fadeOut(300, function(){ 
                $(this).remove();
            });
        }
        
   
    });

    function myFunction() {
        window.print();
    }

    $('.btn_enviar').click(function(e){
        e.preventDefault();
        var result = confirm("Desea enviar los datos?");
        if(!result){
            return;
        }
        $('#env_form_excel').submit();
    })
    
</script>
@endsection