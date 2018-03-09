<?php

Route::group(['prefix' => 'personas'], function() {

    Route::get('',[
        'as' => 'personas.index',
        'uses' => 'PersonasController@getIndex',
        //'middleware' => 'permission:listar.medico'
    ]);
   
    /*
    Route::get('/nuevo',[
        'as' => 'personas.nuevo',
        'uses' => 'PersonasController@getNew',
        //'middleware' => 'permission:listar.medico'
    ]);

    Route::post('/crear', [
        'as' => 'personas.create',
        'uses' => 'PersonasController@postCreate'
    ]);
    */

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'personas.editar',
            'uses' => 'PersonasController@getEdit',
           // 'middleware' => 'permission:editar.medico'
        ]);

        Route::get('/eliminar', [
            'as' => 'personas.eliminar',
            'uses' => 'PersonasController@getDelete',
           // 'middleware' => 'permission:borrar.medico'
        ]);

        Route::post('/update', [
            'as' => 'personas.update',
            'uses' => 'PersonasController@postUpdate'
        ]);

        Route::get('/detalle', [
            'as' => 'personas.detalle',
            'uses' => 'PersonasController@getDetalle',
            //'middleware' => 'permission:detalle.medico'
        ]);

        Route::get('/getEditFicha', [
            'as' => 'personas.getEditFicha',
            'uses' => 'PersonasController@getEditFicha'
        ]);

        Route::get('/nuevaFicha',[
            'as' => 'personas.nuevaFicha',
            'uses' => 'PersonasController@nuevaFicha'
        ]);

        Route::get('/legajo',[
            'as' => 'personas.legajo',
            'uses' => 'PersonasController@getLegajo'
        ]);

        Route::get('/fichas',[
            'as' => 'personas.historia_ficha',
            'uses' => 'PersonasController@getHistoriaFicha'
        ]);

    });
    
    Route::get('nuevo/{documento?}/{fullname?}',[
        'as' => 'personas.createLegajo',
        'uses' => 'PersonasController@createLegajo'
    ]);

    Route::post('/postFicha', [
        'as' => 'personas.postFicha',
        'uses' => 'PersonasController@postFicha'
    ]);

    Route::post('/editFicha', [
        'as' => 'personas.editFicha',
        'uses' => 'PersonasController@editFicha'
    ]);

    Route::post('/buscar', [
        'as' => 'personas.buscar',
        'uses' => 'PersonasController@postBuscar'
    ]);

    Route::post('/postLegajo', [
        'as' => 'personas.postLegajo',
        'uses' => 'PersonasController@postLegajo'
    ]);

    Route::get('/getRenaper',[
        'as' => 'personas.getRenaper',
        'uses' => 'PersonasController@getRenaper'
    ]);

});
