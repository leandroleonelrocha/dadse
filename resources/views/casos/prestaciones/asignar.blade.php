@extends('template/template')
@section('titulo')
    Nueva prestación
@endsection

@section('css')
    <style>
        .loading{
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,.4);
            position: fixed;
            top:0;
            left:0;
            z-index: 1051;
            display:none;
        }

        .loading>img{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 21px;
        }


    </style>

@endsection

@section('content')
     <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{{route('casos.index')}}">Casos</a></li>
        <li><a href="{{route('casos.show',$caso_id)}}">Caso # {{ $caso_id }}</a></li>
        @if(isset($model))
        <li><a href="{{route('prestaciones.detalles',$model->id)}}">Prestación # {{ $model->id }}</a></li>
        @endif
        <li class="active">Nueva Prestación</li>
    </ol>

    <div class="row">
        <div class="col-xs-12 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Nueva Prestación</h4>
                </div>
                
                <div class="panel-body">

                    @if(isset($edit) && $edit)
                      {!! Form::model($model,['route'=>'prestaciones.postUpdateAsignar'])!!}
                      {!! Form::hidden('prestaciones_id',$prestaciones_id) !!}
                    @else
                    {!! Form::open(['route'=>'prestaciones.post.asignar'])!!}
                    {!! Form::hidden('estado',1) !!}
                    @endif
                    {!! Form::hidden('casos_id',$caso_id) !!}

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cantidad</label>
                                {!! Form::text('cantidad',isset($model->cantidad) ? $model->cantidad : '1',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Unidad de medida</label>
                                {!! Form::text('unidad_medida', isset($model->unidad_medida) ? $model->unidad_medida : 'unidad', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Precio unitario</label>
                                {!! Form::text('importe_asignado',isset($model->importe_asignado) ? $model->importe_asignado : '0.00',['class'=>'form-control']) !!}
                            </div>
                        </div>
                       
                        <div class="col-md-3">
                            <label>Referencia</label>
                            <br>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal_kairos">
                                Kairos
                            </button>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal_protesis">
                                Insumos
                            </button>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                {!! Form::textarea('descripcion',isset($model->descripcion) ? $model->descripcion : 'Medicamentos según recetas adjuntas',['class'=>'form-control', 'size'=>'30x5', 'maxlength' => '255']) !!}
                            </div>
                        </div>
                    </div>

                  
                    <div class="col-lg-4 col-xs-5 col-sm-3">
                       

                        {!! Form::hidden('kairos_detalle_id') !!}
                        {!! Form::hidden('kairos_descripcion') !!}
                        {!! Form::hidden('kairos_presentaciones_clave') !!}
                        {!! Form::hidden('kairos_presentaciones_detalle') !!}
                        {!! Form::hidden('kairos_presentaciones_importe') !!}
                        {!! Form::hidden('protesis_id') !!}
                        @if(isset($tipo_intervencion))
                        {!! Form::hidden('tipo_intervencion',$tipo_intervencion) !!}
                        @endif
                        <div class="text-left referencia">

                        </div>
                        <div class="text-left protesis">

                        </div>
                    </div>

            

                </div>

                <div class="panel-footer text-right">
                    <button class="btn btn-default">
                        <em class="fa fa-save text-primary"></em>
                        Guardar
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- END bar chart-->
    </div>


    @endsection

    @section('modal')

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

    @include('casos.partials.modal_protesis')

@endsection

<div class="loading"><img src="{!! asset('img/preload.gif') !!}" /></div>

@section('javascript')
    <script>

        var app = angular.module("myApp", []);

        {{--app.directive('loading', function () {--}}
            {{--return {--}}
                {{--restrict: 'E',--}}
                {{--replace: true,--}}
                {{--template: '<div class="loading"><img src="{!! asset('img/preload.gif') !!}" /></div>',--}}
                {{--link: function (scope, element, attr) {--}}
                    {{--scope.$watch('loading', function (val) {--}}
                        {{--if (val)--}}
                            {{--$(element).show();--}}
                        {{--else--}}
                            {{--$(element).hide();--}}
                    {{--});--}}
                {{--}--}}
            {{--}--}}
        {{--})--}}

        app.controller("myCtrl", function ($scope, $http) {

            $scope.search = function () {
                if($('.loading').css('display') == 'none')
                    $('.loading').css('display','block')

                $http.get("search_kairos/" + $scope.name)

                        .then(function (response) {
                            console.table(response.data);
                            $scope.records = response.data;
                            $scope.loading = false;
                            $('.loading').css('display','none')
                        })

            };

            $scope.add = function (item) {
                $('.protesis').empty();
                $('.referencia').html('Referencia: <strong>' + item.currentTarget.getAttribute("data-descripcion") + '</strong>');

                $("input[name='kairos_detalle_id']").val(item.currentTarget.getAttribute("kairos-detalle-id"));
                $("input[name='kairos_descripcion']").val(item.currentTarget.getAttribute("kairos-descripcion"));
                $("input[name='kairos_presentaciones_clave']").val(item.currentTarget.getAttribute("kairos-presentaciones-clave"));
                $("input[name='kairos_presentaciones_detalle']").val(item.currentTarget.getAttribute("kairos-presentaciones-detalle"));
                $("input[name='kairos_presentaciones_importe']").val(item.currentTarget.getAttribute("kairos-presentaciones-importe"));

                $('.modal').modal('hide')
            };
        });
        
        /*
        $("#select2-1").change(function(){

            var d = $(this).find(':selected').data("protesis-name");
            console.log(d);
            var p = $(this).val();
          
            $("input[name='protesis_id'").val(p);

            add(d);

        });

        function add(d){
            $(".add_protesis" ).on( "click", function() {

                $('.protesis').html('Prótesis: <strong>' + d + '</strong>');
            });
        }
    $('#select2-1').on("select2:select", function(event) { 
            //Do stuff
          var value = $(event.currentTarget).find("option:selected").data('nombre');
       
    });
    */

    </script>
    <script type="text/javascript">

    $("#select2-1").select2();
    $('#select2-1').on('change', function() {
        $('.protesis').empty();
        $('.referencia').empty();
        $('.protesis').append($('#select2-1 :selected').text());
        $("input[name='protesis_id'").val($('#select2-1 :selected').val());
    });

    // console.log($('#select2-1 :selected').text());
    /*
    
    $(document).ready(function() {
      //$("#select2-1").select2();
       var url = "{{ route('protesis.search')}}";

      
      function onInitialize()
      {$("#select2-1").select2({allowClear:!0,
        language:"es",
        ajax:{url:url,
        dataType:"json",
        delay:250,
        data:function(e){
            return{search:e.term,page:e.page}},
        processResults:function(e,t){
           
            return{results:e.results,pagination:{more:e.metadata.resultset.count>=10}}},cache:!0},minimumInputLength:1,templateResult:templateResultSede,templateSelection:templateSelectionSede})}
    function templateResultSede(e){
        return e.id?$("<span><strong>"+e.nombre+"</strong> "+"<br /><small>"+e.valor+"</small></span>"):e.text}
    function templateSelectionSede(e){
       // $("#fullnameID").empty();
       // $('#documentoID').empty();
      
        $("input[name='protesis_id'").val(e.id);
        console.log(e)
        $('.protesis').append(e.nombre)
        return e.nombre?"["+e.valor+"] "+e.nombre:e.text}$(document).on("ready",onInitialize);


    });
    */
    </script>
@endsection

