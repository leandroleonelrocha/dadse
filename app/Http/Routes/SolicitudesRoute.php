<?php
// modelo
$model = 'solicitudes';

Route::group(['prefix' => $model], function() {

    //var controlador
    $controller = 'SolicitudesController';

    Route::get('', [
        'as' => 'solicitudes.index',
        'uses' => 'SolicitudesController@index'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('', [
            'as' => 'solicitudes.show',
            'uses' => 'SolicitudesController@show'
        ]);


    });

    Route::get('/nueva_solicitud',['as' => 'solicitudes.nuevo', 'uses' => $controller.'@getNew']);

    Route::post('/solicitarAltoCosto',['as'=>'solicitar_alto_costo','uses'=>$controller.'@solicitarAltoCosto']);

});

$model = 'prestaciones';

Route::group(['prefix' => $model], function(){

    //var controlador
    $controller = 'PrestacionesController';

    Route::get('/prestaciones_informes/{idPrestaciones?}',['as' => 'prestaciones.informes', 'uses' => $controller.'@getInformes']);
    Route::post('/prestaciones_informes',['as' => 'prestaciones.post.informes', 'uses' => $controller.'@postInformes']);


    Route::get('/prestaciones_asignar/{idPrestaciones?}',['as' => 'prestaciones.asignar', 'uses' => $controller.'@getAsignar']);
    Route::post('/prestaciones_asignar/{idPrestaciones?}',['as' => 'prestaciones.post.asignar', 'uses' => $controller.'@postAsignar']);

    Route::get('/solicitud_presupuesto/{idPrestaciones?}',['as' => 'solicitud_presupuesto', 'uses' => $controller.'@getSolicitudPresupuesto']);


    Route::get('/prestaciones_asignar/asignar_producto/{tipo?}/{idPrestaciones?}/{idProducto?}/{idPresentacion?}',['as' => 'prestaciones.asignar_producto', 'uses' => $controller.'@getAsignarProducto']);

    Route::get('/prestaciones_asignar/search_kairos/{search_text?}',$controller.'@getSearch');
    Route::get('/prestaciones_asignar/search_kairos_producto/{id_producto?}',$controller.'@getProducto');

    Route::get('/prestaciones_delete/{id?}',['as'=>'prestacionesProductosDelete','uses'=>$controller.'@getPrestacionesProductosDelete']);

    Route::post('/solicitud_presupuesto/{idPrestaciones?}',['as' => 'postSolicitudPresupuesto', 'uses' => $controller.'@postSolicitudPresupuesto']);


    Route::get('/presupuesto_detalle/{idPresentaciones?}',['as'=>'presupuestoDetalle','uses'=>$controller.'@getPresupuestoDetalle']);

    Route::get('/altoCosto/{idPresentaciones?}',['as'=>'altoCosto','uses'=>$controller.'@altoCosto']);




});

