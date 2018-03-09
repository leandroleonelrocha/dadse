<div>
    <div class="slimScrollDiv">
        @if (count($notas) > 0)
            @foreach($notas as $nota => $k)
            <!-- START list group item-->
            <a href="javascript:void(o)" class="list-group-item">
                <div class="media-box">
                    <div class="col-xs-6">
                        <p class="fa fa-user"></p>
                        {{ $k->user->fullname }}
                        <p>
                            <small class="text-muted">{{ date('d-m-Y H:i',strtotime($k->created_at)) }}</small>
                        </p>
                    </div>
                    <div class="col-xs-6">
                        <strong class="media-box-heading ">
                            <span class=" text-left">{{ $k->mensaje }}</span></strong>

                    </div>
                </div>
            </a>
            @endforeach
        @else
            <p><em class="fa fa-times-circle"></em> No hay notas en este caso.</p>
        @endif

    </div>
</div>









