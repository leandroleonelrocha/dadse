<?php

//Route::get('caratula',function(\Barryvdh\DomPDF\PDF $PDF){
//    return view('proveedores.liquidacion.pdf');
//    $pdf = $PDF->loadView('reportes.caratula');
//    return $pdf->stream();
//
//});

Route::get('provincias',function(){

    return response()->json(\App\Entities\Provincias::lists('name','id'));
});

Route::get('municipios/{provincias_id?}',function($provincias_id){

    $municipios =  \App\Entities\Municipios::where('provincia_id',$provincias_id)->lists('name','id');

    return response()->json($municipios);
});
Route::get('localidades/{municipios_id?}',function($municipios_id){

    $localidades =  \App\Entities\Localidades::where('municipio_id',$municipios_id)->lists('name','id');

    return response()->json($localidades);
});





Route::get('prov',function()
{

    $a = \App\Entities\Provincias::with('Municipios')->get();

    foreach ($a as $m)
    {
        foreach($m->Municipios as $l)
        {
           foreach ($l->Localidades as $loc);
            {
                echo $loc ;
            }
        }
    }

});


require(__DIR__ . '/Routes/Auth.php');

Route::group(['middleware' => 'auth'], function () {

    Route::get('evaluacion_social', function (\Barryvdh\DomPDF\PDF $PDF) {


        $pdf = $PDF->loadView('reportes.evaluacion_social');
        return $pdf->stream();
    });

    

    require(__DIR__ . '/Routes/Dashboard.php');
    require(__DIR__ . '/Routes/UsersRoute.php');
    require(__DIR__ . '/Routes/InsolRoute.php');
    require(__DIR__ . '/Routes/KairosRoute.php');
    require(__DIR__ . '/Routes/ProtesisRoute.php');
    require(__DIR__ . '/Routes/PresupuestosRoute.php');

    require(__DIR__ . '/Routes/MedicosRoute.php');
    require(__DIR__ . '/Routes/DictamenMedicoRoute.php');
    require(__DIR__ . '/Routes/EspecialidadesRoute.php');
    require(__DIR__ . '/Routes/HospitalesRoute.php');

    require(__DIR__ . '/Routes/PersonasRoute.php');
    require(__DIR__ . '/Routes/ProveedoresRoute.php');
    require(__DIR__ . '/Routes/ProveedoresTiposRoute.php');

    //require(__DIR__ . '/Routes/SolicitudesRoute.php');
    require(__DIR__ . '/Routes/CasosRoute.php');
    require(__DIR__ . '/Routes/PrestacionesRoute.php');
    require(__DIR__ . '/Routes/AyudaDirectaRoute.php');


    require(__DIR__ . '/Routes/config/RolesRoute.php');
    require(__DIR__ . '/Routes/config/PermisosRoute.php');
    require(__DIR__ . '/Routes/config/CuentaCorrienteRoute.php');


    Route::get('insertMandatarios',function(App\Http\Functions\InsolFunction $insol, App\Http\Repositories\MandatariosRepo $mandatariosRepo){

            $casos = App\Entities\Casos::all();    

            foreach ($casos as $caso) {
                
                if(!$caso->Mandatarios){

                $insolFunction = $insol;
                $insolFunction->getCasosDetalle(31788);
                //$insolFunction->getCasosDetalle($caso->id);
                
                dd($insolFunction->getResultado());

                if(!isset($insolFunction->getResultado()->error)){
                    $mandatario = $insolFunction->getResultado()->result;
                    if(!empty($mandatario)){
                        if(!empty($mandatario->mandatarios)){
                            $dato['fullname']       = $mandatario->mandatarios[0]->fullname;
                            $dato['documento']      = $mandatario->mandatarios[0]->documento;
                            $dato['tipo_documento'] = $mandatario->mandatarios[0]->tipo_documento->slug;
                            $dato['casos_id']       = $caso->id;
                            $mandatariosRepo->create($dato);
                        }
                    }
                }
            }

            dd('exito');
        }

    });

});


Route::group(['prefix' => 'api', 'middleware' => 'api', 'namespace' => 'Api'],function(){

    require (__DIR__ . '/Routes/api/ApiRoute.php');

});


