<?php

Route::group(['prefix' => 'permisos'], function() {

    Route::get('',[
        'as' => 'permisos.index',
        'uses' => 'PermisosController@index',
        'middleware' => 'permission:listar.permisos.configuracion'
    ]);

    Route::get('/nuevo',[
        'as' => 'permisos.nuevo',
        'uses' => 'PermisosController@create',
        'middleware' => 'permission:crear.permisos.configuracion'     
    ]);

    Route::post('/crear', [
        'as' => 'permisos.create',
        'uses' => 'PermisosController@store'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'permisos.editar',
            'uses' => 'PermisosController@edit'
        ]);

        Route::get('/eliminar', [
            'as' => 'permisos.eliminar',
            'uses' => 'PermisosController@delete',
            'middleware' => 'permission:borrar.permisos.configuracion'   
           
        ]);

        Route::post('/update', [
            'as' => 'permisos.update',
            'uses' => 'PermisosController@update'
        ]);

        

    });

});
