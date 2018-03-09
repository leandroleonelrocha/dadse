<?php

Route::group(['prefix' => 'proveedores_tipos'], function() {

    Route::get('',[
        'as' => 'proveedores_tipos.index',
        'uses' => 'ProveedoresTiposController@getIndex',
        'middleware' => 'permission:listar.tipo.proveedores'
    ]);

    Route::get('/nuevo',[
        'as' => 'proveedores_tipos.nuevo',
        'uses' => 'ProveedoresTiposController@getNew',
        'middleware' => 'permission:crear.tipo.proveedores'
    ]);

    Route::post('/crear', [
        'as' => 'proveedores_tipos.create',
        'uses' => 'ProveedoresTiposController@postCreate'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'proveedores_tipos.editar',
            'uses' => 'ProveedoresTiposController@getEdit'
        ]);

        Route::get('/eliminar', [
            'as' => 'proveedores_tipos.eliminar',
            'uses' => 'ProveedoresTiposController@getDelete',
            'middleware' => 'permission:borrar.tipo.proveedores'
        ]);

        Route::post('/update', [
            'as' => 'proveedores_tipos.update',
            'uses' => 'ProveedoresTiposController@postUpdate'
        ]);
    });

});

