@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-xs-12 ">
            <h2># <span id="prestacionId" data-id="{{$producto->id}}">{{$producto->id}}</span> - {{$producto->producto}}
            </h2>
            <!-- START bar chart-->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-gray">Solicitado :</p>

                    Cant: <strong>{{$producto->cantidad}}</strong> | <strong>{{$producto->descripcion}}</strong> |
                    <strong>{{$producto->producto}}</strong>
                </div>
                <div class="panel-body">
                    {!!  Form::open(['route'=>'prestaciones.post.asignar'])!!}
                    {!! Form::hidden('prestaciones_id',$producto->id) !!}
                    <div class="col-xs-1">
                        <label>Cant.</label>
                        {!! Form::text('cantidad',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label>U. Medida</label>
                        {!! Form::text('unidad_medida',null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-5">
                        <label>Descripción</label>
                        {!! Form::text('descripcion',null,['class'=>'form-control']) !!}

                        {!! Form::hidden('kairos_detalle_id') !!}
                        {!! Form::hidden('kairos_descripcion') !!}
                        {!! Form::hidden('kairos_presentaciones_clave') !!}
                        {!! Form::hidden('kairos_presentaciones_detalle') !!}
                        {!! Form::hidden('kairos_presentaciones_importe') !!}
                        {!! Form::hidden('protesis_id') !!}

                        <div class="text-left referencia">

                        </div>
                        <div class="text-left protesis">

                        </div>
                    </div>

                    <div class="col-xs-2">
                        <label> $ P.Unitario</label>
                        {!! Form::text('importe_asignado',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-2">
                        <label> Referencia</label>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal_kairos">
                            Kairos
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal_protesis">
                            Protesis
                        </button>
                    </div>

                </div>

                <div class="panel-footer">
                    <button class="btn btn-block btn-default">Asignar</button>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-xs-12">
                        <table class="table table-stripped">
                            <thead>
                            <th>Cant.</th>
                            <th>Um.</th>
                            <th>Detalle</th>
                            <th>$ P.Unitario</th>
                            <th>$ Total</th>
                            <th></th>
                            </thead>
                            @foreach($prestaciones as $prestacion)
                                <tr>
                                    <td>{{$prestacion->cantidad}}</td>
                                    <td>{{$prestacion->unidad_medida}}</td>
                                    <td>
                                        {{$prestacion->descripcion}} <br>
                                        <p class="text-muted text-sm">{{$prestacion->Referencias->kairos_descripcion}}
                                            | {{ $prestacion->Referencias->kairos_presentaciones_detalle }} |
                                            $ {{$prestacion->Referencias->kairos_presentaciones_importe}}</p>
                                        <p class="text-muted text-sm">{{ isset($prestacion->Referencias->Protesis->fullname)  }}  </p>    
                                    </td>
                                    <td>$ {{$prestacion->importe_asignado}}</td>
                                    <td class="text-danger">
                                        $ {{$prestacion->cantidad * $prestacion->importe_asignado}}</td>
                                    <td>
                                        <a href="{{route('prestacionesProductosDelete',$prestacion->id)}}"
                                           class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach

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

    @section('modal')
            <!-- Large modal -->
    <div class="modal fade modal_kairos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Kairos</h4>
                </div>
                <div class="modal-body">
                    <div ng-app="myApp">
                        <div ng-controller="myCtrl">
                            <div class="input-group">
                                <input ng-model="name" id="text_search_kairos" type="text" class="form-control"
                                       placeholder="Buscar producto de referencia en KAIROS">
                                    <span class="input-group-btn">
                                        <button ng-click="search()" id="search_kairos" type="button"
                                                class="btn btn-default">Buscar
                                        </button>
                                </span>
                            </div>
                            <div id="accordion1" class="panel-group">
                                <div ng-repeat="x in records" class="panel ">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#@{{x.id}}"
                                               class="collapsed" aria-expanded="false">
                                                <small>@{{x.descripcion}}</small>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="@{{x.id}}" class="panel-collapse collapse" aria-expanded="false"
                                         style="height: 0px;">
                                        <div class="panel-body">
                                            <div ng-repeat="p in x.presentacion">
                                                <div class="col-xs-6"> @{{p.descripcion}}</div>
                                                <div class="col-xs-5">$ @{{p.precio}} </div>
                                                <div class="col-xs-1">
                                                    <button ng-click="add($event)"
                                                            data-descripcion="@{{x.descripcion}} | @{{p.descripcion}} :  $ @{{p.precio}}"
                                                            kairos-descripcion="@{{x.descripcion}}"
                                                            kairos-detalle-id="@{{x.id}}"
                                                            kairos-presentaciones-clave="@{{p.clave}}"
                                                            kairos-presentaciones-detalle="@{{p.descripcion}}"
                                                            kairos-presentaciones-importe="@{{p.precio}}"
                                                            class="btn btn-xs btn-default "><span
                                                                class="fa fa-mail-forward"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('solicitudes.partials.modal_protesis')

@endsection

@section('javascript')
    <script>

        var app = angular.module("myApp", []);

        app.controller("myCtrl", function ($scope, $http) {

            $scope.search = function () {
                
              //$http.get("../../search_kairos/" + $scope.name)
                $http.get("search_kairos/" + $scope.name)

                        .then(function (response) {
                            console.table(response.data);
                            $scope.records = response.data;
                        });
            };

            $scope.add = function (item) {
                $('.referencia').html('Referencia: <strong>' + item.currentTarget.getAttribute("data-descripcion") + '</strong>');

                $("input[name='kairos_detalle_id']").val(item.currentTarget.getAttribute("kairos-detalle-id"));
                $("input[name='kairos_descripcion']").val(item.currentTarget.getAttribute("kairos-descripcion"));
                $("input[name='kairos_presentaciones_clave']").val(item.currentTarget.getAttribute("kairos-presentaciones-clave"));
                $("input[name='kairos_presentaciones_detalle']").val(item.currentTarget.getAttribute("kairos-presentaciones-detalle"));
                $("input[name='kairos_presentaciones_importe']").val(item.currentTarget.getAttribute("kairos-presentaciones-importe"));

            };
        });
        
        
        $("#select2-1").change(function(){
            var d = $(this).find(':selected').data("protesis-name");
            var p = $(this).val();
            $("input[name='protesis_id'").val(p);
            add(d);

        });

        function add(d){
            $(".add_protesis" ).on( "click", function() {
                $('.protesis').html('Prótesis: <strong>' + d + '</strong>');
            });
        }


    </script>
@endsection

