@extends('template/template')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <h1>Cuenta corriente </h1>

                <!-- START bar chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{route('cuenta_corriente.nuevo')}}" class="btn btn-sm btn-default "><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>Dia</th>
                            <th>Slug</th>
                            <th>Descripción</th>
                            <th>Modelo</th>
                            <th class="col-xs-1"></th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END bar chart-->
        </div>

@endsection

