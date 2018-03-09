<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DADSE @yield('titulo')</title>
    @include('template.style')
    @yield('css')
    <base href="{{asset("")}}">
</head>
<body>
<div class="wrapper">
    <!-- top navbar-->
    <header class="topnavbar-wrapper">
        @include('template.header')
    </header>
    <!-- sidebar-->
    <aside class="aside">
        <!-- START Sidebar (left)-->
        <div class="aside-inner">
            @include('template.navbar')
        </div>
        <!-- END Sidebar (left)-->
    </aside>

    <!-- Main section-->
    <section>
        <!-- Page content-->
        <div class="content-wrapper">
                @yield('content-header')
                @include('partials.messages')

                @yield('content')
        </div>
        <!--End Content-->
    </section>
    <!-- Page footer-->
    <footer>
        <span>&copy; 2015 - Ministerio de Desarrollo Social</span>
    </footer>
</div>
@yield('modal')
    @include('template.js')
        @yield('javascript')

</body>

</html>