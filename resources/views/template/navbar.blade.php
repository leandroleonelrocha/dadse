<nav data-sidebar-anyclick="close" class="sidebar">
    <!-- START sidebar nav-->
    <ul class="nav">
        <!-- Iterates over all sidebar items-->
        <li class="nav-heading ">
            <span data-localize="sidebar.heading.HEADER">Menú Principal</span>
        </li>

        <li {!! Request::segment(1) ? "" : 'class = "active"' !!}>
            <a href="{{route('dashboard.index')}}"><em class="icon-home"></em><span> Inicio</span></a>
        </li>

        @role('configuracion|administrador|supervisor')
        <li {!! in_array(Request::segment(1), ['permisos','roles','users','cuenta_corriente']) ? 'class = "active" ' : ""!!}>
            <a href="#permisos" title="permisos" data-toggle="collapse" >
                <em class="icon-settings"></em>

                <span data-localize="sidebar.nav.permisos">Configuración</span>
            </a>
            <ul id="permisos" class="nav sidebar-subnav {!! in_array(Request::segment(1), ['permisos','roles','users','cuenta_corriente']) ? '' : "collapse"!!}">
                @role('configuracion|administrador')
                <li {!! Request::segment(1) == "permisos" ? 'class="active"' : "" !!}><a href="{{route('permisos.index')}}">Permisos</a>
                </li>
                <li {!! Request::segment(1) == "roles" ? 'class="active"' : "" !!}><a href="{{route('roles.index')}}">Roles</a>
                </li>
                <li {!! Request::segment(1) == "users" ? 'class="active"' : "" !!}><a href="{{route('users.index')}}">Usuarios</a>
                </li>
                <li {!! Request::segment(1) == "cuenta_corriente" ? 'class="active"' : "" !!}><a href="{{route('cuenta_corriente.index')}}">Cuenta Corriente</a>
                </li>
                @endrole
                @role('supervisor')
                  <li {!! Request::segment(1) == "cuenta_corriente" ? 'class="active"' : "" !!}><a href="{{route('cuenta_corriente.index')}}">Cuenta Corriente</a>
                    </li>
                @endrole
            </ul>
        </li>
        @endrole

        <li {!! in_array(Request::segment(1), ['prestaciones','casos','insol']) ? 'class = "active" ' : ""!!}>
            <a href="#1" title="permisos" data-toggle="collapse">
                <em class="icon-book-open"></em>
                <span data-localize="sidebar.nav.permisos">Casos </span>
            </a>
            <ul id="1" class="nav sidebar-subnav {!! in_array(Request::segment(1), ['casos','prestaciones','insol','dictamenMedico','finalizados']) ? '' : "collapse"!!}">
                <li {!! in_array(Request::segment(1), ['prestaciones','casos']) ? 'class="active"' : "" !!}>
                    <a href="{{route('casos.index')}}"><span>Activos</span></a>
                </li>
                <li {!! Request::segment(1) == "insol/today" ? 'class="active"' : "" !!}>
                    <a href="{{route('insol.pendientes.today')}}">Nuevos <small class="text-warning">HOY</small></a>
                </li>
                <li {!! Request::segment(1) == "insol" ? 'class="active"' : "" !!}>
                    <a href="{{route('insol.pendientes')}}">Nuevos</a>
                </li>
                <li {!! Request::segment(1) == "finalizados" ? 'class="active"' : "" !!}>
                    <a href="{{route('casos.finalizados')}}">Finalizados</a>
                </li>    
            </ul>
        </li>

        <li {!! in_array(Request::segment(1), ['destinatarios','personas']) ? 'class = "active" ' : ""!!}>
            <a href="#7" title="permisos" data-toggle="collapse">
                <em class="icon-user"></em>
                <span data-localize="sidebar.nav.permisos">Destinatarios </span>
            </a>
            <ul id="7" class="nav sidebar-subnav {!! in_array(Request::segment(1), ['destinatarios','personas']) ? '' : "collapse"!!}">
                <li {!! in_array(Request::segment(1), ['destinatarios','personas']) ? 'class="active"' : "" !!}>
                    <a href="{{route('personas.index')}}"><span>Personas</span></a>
                </li>
            </ul>
        </li>

        @role('Farmacias|administrador')
        <li {!! in_array(Request::segment(1), ['proveedores','proveedores_tipos']) ? 'class = "active" ' : ""!!}>
            <a href="#2" title="permisos" data-toggle="collapse">
                <em class="icon-briefcase"></em>
                <span data-localize="sidebar.nav.permisos">Proveedores</span>
            </a>
            <ul id="2" class="nav sidebar-subnav {!! in_array(Request::segment(1), ['proveedores','proveedores_tipos']) ? '' : "collapse"!!}">
                <li {!! Request::segment(1) == "proveedores" ? 'class="active"' : "" !!}>
                    <a href="{{route('proveedores.index')}}">Lista de Proveedores</a>
                </li>
                <li {!! Request::segment(1) == "proveedores_tipos" ? 'class="active"' : "" !!}>
                    <a href="{{route('proveedores_tipos.index')}}">Tipo de Servicios</a>
                </li>
            </ul>
        </li>
        @endrole
        <li {!! in_array(Request::segment(1), ['presupuestos']) ? 'class = "active" ' : ""!!}>
            <a href="#4" title="permisos" data-toggle="collapse">
                <em class="fa fa-money"></em>
                <span data-localize="sidebar.nav.permisos">Presupuestos <span class="badge bg-danger">{{(\App\Entities\PrestacionesPedidos::where('estado',8)->get()->count() + \App\Entities\PrestacionesPedidos::where('estado',9)->get()->count())}}</span> </span>
            </a>
            <ul id="4" class="nav sidebar-subnav {!! in_array(Request::segment(1), ['presupuestos']) ? '' : "collapse"!!}">
                <li {!! Request::segment(1) == "presupuestos" && Request::segment(2) != 'cargar_monto' ? 'class="active"' : "" !!}>
                    <a href="{{route('presupuestos.index')}}">Lista de Presupuestos</a>
                </li>

                <li {!! Request::segment(2) == "cargar_monto" ? 'class="active"' : "" !!}>
                    <a href="{{route('presupuestos.cargar_monto')}}">Compulsas</a>
                </li>

                                <li {!! Request::segment(2) == "urgentes" ? 'class="active"' : "" !!}>
                    <a href="{{route('presupuestos.urgentes')}}">Urgentes</a>
                </li>
            </ul>
        </li>

        <li {!! in_array(Request::segment(1), ['protesis']) ? 'class = "active" ' : ""!!}>
            <a href="#5" title="permisos" data-toggle="collapse">
                <em class="icon-heart"></em>
                <span data-localize="sidebar.nav.permisos">Insumos</span>
            </a>
            <ul id="5" class="nav sidebar-subnav {!! in_array(Request::segment(1), ['protesis']) ? '' : "collapse"!!}">
                <li {!! Request::segment(1) == "protesis" ? 'class="active"' : "" !!}>
                    <a href="{{route('protesis.index')}}">Lista de Insumos</a>
                </li>
               
            </ul>
        </li>

        <li {!! in_array(Request::segment(1), ['hospitales']) ? 'class = "active" ' : ""!!}>
            <a href="#6" title="permisos" data-toggle="collapse">
                <em class="fa fa-hospital-o"></em>
                <span data-localize="sidebar.nav.permisos">Hospitales</span>
            </a>
            <ul id="6" class="nav sidebar-subnav {!! in_array(Request::segment(1), ['hospitales']) ? '' : "collapse"!!}">
                <li {!! Request::segment(1) == "hospitales" ? 'class="active"' : "" !!}>
                    <a href="{{route('hospitales.index')}}">Lista de Hospitales</a>
                </li>
               
            </ul>
        </li>
        @role('configuracion|administrador')
        <li {!! in_array(Request::segment(1), ['medicos','especialidades']) ? 'class = "active" ' : ""!!}>
            <a href="#3" title="permisos" data-toggle="collapse">
                <em class="fa fa-user-md"></em>
                <span data-localize="sidebar.nav.permisos">Médicos</span>
            </a>
            <ul id="3" class="nav sidebar-subnav  {!! in_array(Request::segment(1), ['medicos','especialidades']) ? '' : "collapse"!!}">
                <li {!! Request::segment(1) == "medicos" ? 'class="active"' : "" !!}>
                    <a href="{{route('medicos.index')}}">Lista de Médicos</a>
                </li>
                <li {!! Request::segment(1) == "especialidades" ? 'class="active"' : "" !!}>
                    <a href="{{route('especialidades.index')}}">Especialidades</a>
                </li>

            </ul>
        </li>
        @endrole
        <li>
         <a href="{{env('SSO_URL')}}/auth/logout?redirect={{route('dashboard.index')}}">
             <em class="icon-logout"></em>
             <span>Cerrar sesión</span>
             </a>
        </li>

    </ul>
    <!-- END sidebar nav-->
</nav>

