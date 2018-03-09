<div class="row">
    <div class="col-xs-12">
        {{-- Errors --}}
        @if ($errors->count() > 0)
            <div class="alert alert-danger">

                @if ($errors->count() > 1)
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @else
                    {!! $errors->first() !!}
                @endif
            </div>
        @endif

        {{-- Success --}}
        @if (session()->has('msg_success') || isset($msg_ok))
            <div class="alert alert-success">
                <strong><em class="fa fa-check-circle"></em> ¡Éxito!</strong><br />
                @if (session()->has('msg_success'))
                    {!! session('msg_success') !!}
                @else
                    {!! $msg_success!!}
                @endif
            </div>
        @endif

        {{-- info --}}
        @if (session()->has('msg_info') || isset($msg_ok))
            <div class="alert alert-info">
                <strong><em class="fa fa-check-circle"></em> ¡Info!</strong><br />
                @if (session()->has('msg_info'))
                    {!! session('msg_info') !!}
                @else
                    {!! $msg_info !!}
                @endif
            </div>
        @endif

        {{-- danger --}}
        @if (session()->has('msg_danger') || isset($msg_ok))
            <div class="alert alert-danger">
                <strong><em class="fa fa-check-circle"></em> ¡Alerta!</strong><br />
                @if (session()->has('msg_danger'))
                    {!! session('msg_danger') !!}
                @else
                    {!! $msg_danger !!}
                @endif
            </div>
        @endif


    </div>
</div>