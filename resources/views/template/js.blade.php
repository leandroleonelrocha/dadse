
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>

<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="{{ asset('vendor/modernizr/modernizr.custom.js')}}"></script>
<!-- MATCHMEDIA POLYFILL-->
<script src="{{ asset('vendor/matchMedia/matchMedia.js') }}"></script>
<!-- JQUERY-->
<script src=" {{ asset('vendor/jquery/dist/jquery.js')}}"></script>
<!-- BOOTSTRAP-->
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- STORAGE API-->
<script src="{{ asset('vendor/jQuery-Storage-API/jquery.storageapi.js')}}"></script>
<!-- JQUERY EASING-->
<script src="{{ asset('vendor/jquery.easing/js/jquery.easing.js')}}"></script>
<!-- ANIMO-->
<script src="{{ asset('vendor/animo.js/animo.js')}}"></script>
<!-- SLIMSCROLL-->
<script src="{{ asset('vendor/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- SCREENFULL-->
<script src="{{ asset('vendor/screenfull/dist/screenfull.js')}}"></script>
<!-- LOCALIZE-->
<script src="{{ asset('vendor/jquery-localize-i18n/dist/jquery.localize.js')}}"></script>
<!-- DATATABLE-->
<script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatable-bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{ asset('vendor/datatable-bootstrap/js/dataTables.bootstrapPagination.js')}}"></script>

<script src="{{ asset('vendor/chosen_v1.2.0/chosen.jquery.min.js')}}"></script>
<script src="{{ asset('js/app.js')}}"></script>

<!-- RTL demo-->
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- SPARKLINE-->
<script src="{{ asset('vendor/sparkline/index.js')}}"></script>
<!-- FLOT CHART-->
<script src="{{ asset('vendor/Flot/jquery.flot.js')}}"></script>
<script src="{{ asset('vendor/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('vendor/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('vendor/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('vendor/Flot/jquery.flot.time.js')}}"></script>
<script src="{{ asset('vendor/Flot/jquery.flot.categories.js')}}"></script>
<script src="{{ asset('vendor/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<!-- CLASSY LOADER-->
<script src="{{ asset('vendor/jquery-classyloader/js/jquery.classyloader.min.js')}}"></script>
<!-- MOMENT JS-->
<script src="{{ asset('vendor/moment/min/moment-with-locales.min.js')}}"></script>
<!-- DEMO-->

<!-- === SEARCH CHOSEN === -->
<script src="{{ asset('vendor/chosen_v1.2.0/chosen.jquery.min.js')}}"></script>

<script src="{{ asset('vendor/select2/dist/js/select2.js')}}" ></script>

<script src="{{ asset('js/bootstrap-datepicker.js')}}" ></script>
<script src="{{ asset('js/bootstrap-datetimepicker.js')}}" ></script>
<script src="{{ asset('js/bootstrap-datepicker.es.min.js')}}" ></script>

<script src="{{ asset('js/jquery.safeform.js')}}" ></script>

<script>
    $('form').safeform({timeout: 2000});

    $('.select2').select2();

    $('#datatable').DataTable({
      //  "ordering": false
        "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }

    });
    $('#datatable1').DataTable(
    {

            "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "No se encontraron resultados",
            "sEmptyTable":    "Ningún dato disponible en esta tabla",
            "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });


    $('.multiSelect').attr('multiple','multiple').select2();
    $(".datePicker").datetimepicker({
        locale: 'es',
        format: 'DD-MM-YYYY H:m',
        sideBySide: true
    });
    $(".date").datetimepicker({
        locale: 'es',
        format: 'DD-MM-YYYY',
        sideBySide: false
    })

    $('.msgDelete').click(function(){
       if(!confirm('Desea Borrar este registro?'))
           return false;  
    });



</script>