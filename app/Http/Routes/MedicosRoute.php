<?php

Route::group(['prefix' => 'medicos'], function() {

    Route::get('',[
        'as' => 'medicos.index',
        'uses' => 'MedicosController@getIndex',
        'middleware' => 'permission:listar.medico'
    ]);

    Route::get('/nuevo',[
        'as' => 'medicos.nuevo',
        'uses' => 'MedicosController@getNew',
        'middleware' => 'permission:listar.medico'
    ]);

    Route::post('/crear', [
        'as' => 'medicos.create',
        'uses' => 'MedicosController@postCreate'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'medicos.editar',
            'uses' => 'MedicosController@getEdit',
            'middleware' => 'permission:editar.medico'
        ]);

        Route::get('/eliminar', [
            'as' => 'medicos.eliminar',
            'uses' => 'MedicosController@getDelete',
            'middleware' => 'permission:borrar.medico'
        ]);

        Route::post('/update', [
            'as' => 'medicos.update',
            'uses' => 'MedicosController@postUpdate'
        ]);

        Route::get('/detalle', [
            'as' => 'medicos.detalle',
            'uses' => 'MedicosController@getDetalle',
            'middleware' => 'permission:detalle.medico'
        ]);
    });

});
