<?php

Route::group(['prefix' => 'insol'], function() {
    
    Route::get('',[
  
        'as'         => 'insol.pendientes',
        'uses'       => 'InsolController@getPendientes',
        'middleware' => 'permission:listar.insol'

    ]);

    Route::get('today', [
        'as' => 'insol.pendientes.today',
        'uses' => 'InsolController@getPendientesToday'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('', [
            'as' => 'insol.pendientes.show',
            'uses' => 'InsolController@getPendientesDetail',
            'middleware' => 'permission:aceptar.insol'
        ]);

        Route::post('insol.pendientes.update', [
            'as' => 'insol.pendientes.update',
            'uses' => 'InsolController@aceptarSolicitud'
        ]);

        Route::post('insol.pendientes.rechazarSolicitud', [
            'as' => 'insol.pendientes.rechazarSolicitud',
            'uses' => 'InsolController@rechazarSolicitud'
        ]);

        Route::group(['prefix' => 'prestaciones/{idPrestacion}'], function() {

            Route::patch('', [
                'as' => 'insol.prestaciones.recategorizar',
                'uses' => 'InsolController@recategorizarPrestacion'
            ]);

        });

    });

    #Route::get('/recategorizar_prestacion/{clasificacion_id?}/{prestacion_id?}',['as'=>'recategoriar_prestacion','uses'=>$controller.'@getRecategorizarPrestacion']);

    #Route::get('/aceptar_solicitud/{solicitud_id?}',['as'=>'insol.aceptar_solicitud','uses'=>$controller.'@getAceptarSolicitud']);

});
