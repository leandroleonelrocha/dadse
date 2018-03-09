<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>MASTER</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.min.css')  }}" >
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{asset('vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css') }}" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="maincss">
</head>

<body>
<div class="wrapper">
    <div class="block-center mt-xl wd-xl">
        <!-- START panel-->
           <hr>
        <div class="panel panel-dark panel-flat">
            <div class="panel-body">

                {!! Form::open(['route'=>'auth.authenticate', 'method' => 'post']) !!}

                    <div class="form-group has-feedback">
                        <input id="exampleInputEmail1" name="email" placeholder="Email" autocomplete="off"  class="form-control">
                        <span class="fa fa-envelope form-control-feedback text-muted"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="exampleInputPassword1" type="password" placeholder="Password" name="password"  class="form-control">
                        <span class="fa fa-lock form-control-feedback text-muted"></span>
                    </div>

                    <div class="clearfix">
                        <div class="checkbox c-checkbox pull-left mt0">
                            <label>
                                <input type="checkbox" value="" name="remember">
                                <span class="fa fa-check"></span>Recordadrme</label>
                        </div>
                        <div class="pull-right"><a href="recover.html" class="text-muted">Olvide mi password?</a>
                        </div>
                    </div>
                        {{-- Success --}}
                        @if (session()->has('msg_ok'))
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    <strong>Error!</strong><br />
                                    {{ session('msg_ok') }}
                                </div>
                            </div>
                        @endif
                    <input type="submit" class="btn btn-block btn-primary mt-lg" value="Ingresar">
                {!! Form::close() !!}
            </div>
        </div>
        <!-- END panel-->
        <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2015</span>
            <span>-</span>
            <span>MDS</span>
            <br>
            <span>Ministerio de Desarrollo Social</span>
        </div>
    </div>
</div>
<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="{{ asset('vendor/modernizr/modernizr.js') }}"></script>
<!-- JQUERY-->
<script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
<!-- BOOTSTRAP-->
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}" ></script>
<!-- STORAGE API-->
<script src="{{ asset('vendor/jQuery-Storage-API/jquery.storageapi.js') }}"></script>
<!-- PARSLEY-->
<script src="{{ asset('vendor/parsleyjs/dist/parsley.min.js') }}"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>