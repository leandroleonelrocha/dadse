<?php

Route::group(['prefix' => 'roles'], function() {

    Route::get('',[
        'as' => 'roles.index',
        'uses' => 'RolesController@index',
        'middleware' => 'permission:listar.roles.configuracion'
    ]);

    Route::get('/nuevo',[
        'as' => 'roles.nuevo',
        'uses' => 'RolesController@create',
        'middleware' => 'permission:crear.roles.configuracion'    
    ]);

    Route::post('/crear', [
        'as' => 'roles.create',
        'uses' => 'RolesController@store'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('/editar', [
            'as' => 'roles.editar',
            'uses' => 'RolesController@edit'
        ]);

        Route::get('/eliminar', [
            'as' => 'roles.eliminar',
            'uses' => 'RolesController@delete',
            'middleware' => 'permission:borrar.roles.configuracion' 
        ]);

        Route::post('/update', [
            'as' => 'roles.update',
            'uses' => 'RolesController@update'
        ]);

        Route::get('/permisos',[
            'as' => 'roles.permisos',
            'uses' => 'RolesController@permisos'
        ]);

        Route::post('/postPermisos',[
            'as' => 'roles.postPermisos',
            'uses' => 'RolesController@postPermisos'

        ]);
    });

});

