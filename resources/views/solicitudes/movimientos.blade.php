<div>
            <h4>Movimientos de Solicitud</h4>

            <div class="slimScrollDiv">
                @foreach($solicitud->movimientos as $movimiento)
                <!-- START list group item-->
                <a href="#" class="list-group-item">
                    <div class="media-box">
                        <div class="pull-left">
                            <p class="fa fa-1x fa-user"></p>
                        </div>
                        <div class="media-box-body clearfix">
                            <small class="pull-right">{{\Carbon\Carbon::now()->diffForHumans($movimiento->created_at)}}
                            <br>{{$movimiento->created_at}}
                            </small>
                            <strong class="media-box-heading text-primary">
                                <span class=" text-left"></span>{{$movimiento->usuario->fullname}}</strong>
                            <p class="mb-sm">
                                <small>{{$movimiento->estado_movimiento}}</small>
                            </p>
                        </div>
                    </div>
                </a>
                <!-- END list group item-->
                @endforeach

            </div>


</div>









