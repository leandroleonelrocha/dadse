<?php
// modelo
$model = 'presupuestos';

Route::group(['prefix' => $model], function() {

    //var controlador
    $controller = 'PresupuestosController';

    Route::get('/',['as' => 'presupuestos.index', 'uses' => $controller.'@getIndex', 'middleware'=>'permission:listar.sector.presupuestos' ]);
    Route::get('/nuevo_presupuesto',['as' => 'presupuestos.nuevo', 'uses' => $controller.'@getNew', 'middleware'=>'permission:solicitar_presupuesto.sector.presupuestos']);
    Route::get('/detalle_presupuesto/{id?}',['as'=>'presupuestos.detalle','uses' => $controller.'@getDetalle']);

    Route::post('/create',['as' => 'presupuestos.create','uses' => $controller.'@postCreate']);
    Route::get('/cargar_monto',['as' => 'presupuestos.cargar_monto','uses' => $controller.'@cargar_monto', 'middleware'=>'permission:cargar_monto.sector.presupuestos' ]);
    Route::post('/post_cargar_monto',['as' => 'presupuestos.post_cargar_monto','uses' => $controller.'@postCargarMonto']);
   
    Route::get('/urgentes',['as' => 'presupuestos.urgentes','uses' => $controller.'@urgentes' ]);
   	Route::post('/anularAdjudicar',['as' => 'presupuestos.anularAdjudicar', 'uses'=> $controller.'@anularAdjudicar']);


    Route::get('/test', function(){

        $pres = \App\Entities\Presupuestos::where('estado', 8)->get();
     

       return view('casos.prestaciones.mails.mail_presupuesto_proveedor',compact('pres'));     
    });


});

