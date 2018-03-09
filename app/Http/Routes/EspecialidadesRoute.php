<?php

Route::group(['prefix' => 'especialidades'], function() {

    Route::get('',[
        'as' => 'especialidades.index',
        'uses' => 'EspecialidadesController@getIndex'
    ]);

    Route::get('/nuevo',[
        'as' => 'especialidades.nuevo',
        'uses' => 'EspecialidadesController@getNew'
    ]);

    Route::post('/crear', [
        'as' => 'especialidades.create',
        'uses' => 'EspecialidadesController@postCreate'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'especialidades.editar',
            'uses' => 'EspecialidadesController@getEdit'
        ]);

        Route::get('/eliminar', [
            'as' => 'especialidades.eliminar',
            'uses' => 'EspecialidadesController@getDelete'
        ]);

        Route::post('/update', [
            'as' => 'especialidades.update',
            'uses' => 'EspecialidadesController@postUpdate'
        ]);
    });

});

