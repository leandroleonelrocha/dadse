@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-xs-12 ">
            <h2>Solicitud de Alto Costo</h2>
            <!-- START bar chart-->
                  <div class="panel panel-default">
                  <div class="panel-body">

                    <div class="col-xs-12">
                        {!! Form::open(['route'=>'solicitar_alto_costo']) !!}
                        {!! Form::hidden('prestaciones_id', $prestaciones_id) !!}
                        <table id="datatable" class="table table-stripped">
                            <thead>
                             <!--   <th><input id="check_all" type="checkbox"></th> -->
                                <th>
                                </th>
                                <th>Médico</th>
                                <th>Especialidad</th>
                            </thead>
                            <tbody>
                            @foreach($medicos as $medico)
                                <tr>
                                    <td class="col-xs-1">
                                        <div class="checkbox c-checkbox">
                                            <label>
                                                <input name="medicos_id[]" value="{{$medico->id}}"  type="checkbox">
                                                <span class="fa fa-check"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{$medico->fullName}}</td>
                                    <td>
                                        @foreach($medico->especialidades as $especialidad )
                                                {{$especialidad->nombre}}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <button  class="btn btn-block btn-primary">Enviar</button>

                        {!! Form::close() !!}
                    </div>


                    </div>
                </div>

            </div>
            <!-- END bar chart-->
        </div>




@endsection



