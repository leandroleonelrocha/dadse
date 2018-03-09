@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1><span class="fa fa-1x fa-user"></span> Buscador {{$seccion}}
                  <a href="{{route('personas.createLegajo')}}" class="btn btn-default pull-right">Nueva Persona</a>
                </h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">

                        {!!  Form::open(['route'=>'personas.buscar']) !!}
                            <label></label>
                       
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="form-group">

                                        <select class="form-control" id="mySelect" name="tipo"><option value="documento">DNI</option><option value="cuil">CUIL</option><option value="fullname">NOMBRE</option></select>
                                    </div>
                                </div>
                                
                                <div class="col-xs-10">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control " type="text" name="search" placeholder="Buscar en Dadse">
                                            <div class="input-group-btn">
                                              <button class="btn btn-default" type="submit">  <i class="fa fa-search icon-white"></i> Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="ball-clip-rotate"  style="display: none"> </div>
                                </div>
                        
                              </div>

                        {!!  Form::close() !!}

                    <div class="panel-body">

                        <table class="table">

                              @if(isset($models))
                                  @forelse($models as $model)
                                      <tr>
                                          <td>Tipo Doc: {{config('custom.tipo_documento.'.$model->tipo_documento) }} </td>
                                          <td>{{$model->documento}}</td>
                                          <td>{{$model->fullname}}</td>
                                          <td>
                                            <a href="{{route('personas.historia_ficha', $model->id)}}" class="btn btn-default">
                                            <em class="fa fa-file-text-o"></em> Ficha Social</a>
                                          </span><br/>

                                          </td>
                                          <td><a href="{{route('personas.legajo', $model->id)}}" class="btn btn-default pull-right"><em class="fa fa-list-alt"></em> Legajo</a></td>
                                  
                                       </tr>
                                    @empty()
                                        <span class="text-danger"> Sin datos en Dadse. </span>
                                        <br>
                                        <h4>Búsqueda en Sintys</h4>
                                        @forelse($sintys as $s)
                                           <tr>
                                              <td>Tipo Doc: {{$s['tipo_documento']}} </td>
                                              <td>{{$s['documento']}} </td>
                                              <td>{{$s['fullname']}}</td>
                                              <td>{{$s['full_legajo']}}</td>
                                              <td><a href="{{route('personas.createLegajo', array($s['documento'],$s['fullname']) )}}" class="btn btn-info btn-xs"> Ingresar</a></td>
                                           </tr>
                                        @empty()
                                          sin datos en Renaper.
                                        @endforelse
                                  @endforelse
                              @endif


                        </table>

                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

